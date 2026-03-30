<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Support\AdditionalOptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Stripe\Exception\ApiErrorException;

class PaymentController extends Controller
{
    public function __construct()
    {
        // Initialiser Stripe avec la clé secrète depuis .env
        Stripe::setApiKey(config('services.stripe.secret'));
    }

    /**
     * Affiche la page de paiement pour une réservation
     */
    public function show(Reservation $reservation)
    {
        // Vérifier que la réservation appartient à l'utilisateur connecté
        if ($reservation->user_id !== Auth::id()) {
            abort(403, 'Accès non autorisé.');
        }

        // Vérifier que la réservation n'est pas déjà payée
        if ($reservation->payment_status === 'paid') {
            return redirect()->route('reservations.index')
                ->with('info', 'Cette réservation a déjà été payée.');
        }

        // Charger les relations
        $reservation->load('house');

        return view('payments.checkout', compact('reservation'));
    }

    /**
     * Crée une session de paiement Stripe Checkout
     */
    public function createCheckoutSession(Reservation $reservation)
    {
        // Vérifier que la réservation appartient à l'utilisateur connecté
        if ($reservation->user_id !== Auth::id()) {
            return response()->json(['error' => 'Accès non autorisé.'], 403);
        }

        // Vérifier que la réservation n'est pas déjà payée
        if ($reservation->payment_status === 'paid') {
            return response()->json(['error' => 'Cette réservation a déjà été payée.'], 400);
        }

        try {
            $reservation->load('house');
            
            // Calculer le montant total
            $startDate = \Carbon\Carbon::parse($reservation->start_date);
            $endDate = \Carbon\Carbon::parse($reservation->end_date);
            $nights = $startDate->diffInDays($endDate);
            
            $baseAmount = $reservation->house->prix * $nights;
            $breakfastAmount = $reservation->has_breakfast ? ($reservation->house->price_breakfast ?? 0) : 0;
            $loveRoomAmount = $reservation->has_love_room ? ($reservation->house->price_love_room ?? 0) : 0;
            
            $additionalOptionsAmount = AdditionalOptions::sumPrices(
                is_array($reservation->additional_options) ? $reservation->additional_options : null
            );

            $totalAmount = $baseAmount + $breakfastAmount + $loveRoomAmount + $additionalOptionsAmount;

            // Convertir en centimes (Stripe utilise les centimes)
            $amountInCents = (int)($totalAmount * 100);

            // Créer la session Stripe Checkout
            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'eur', // EUR (Euros)
                        'product_data' => [
                            'name' => 'Réservation - ' . $reservation->house->description,
                            'description' => sprintf(
                                'Séjour du %s au %s (%d nuit%s)',
                                $startDate->format('d/m/Y'),
                                $endDate->format('d/m/Y'),
                                $nights,
                                $nights > 1 ? 's' : ''
                            ),
                        ],
                        'unit_amount' => $amountInCents,
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('payment.success', ['reservation' => $reservation->id]) . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('payment.cancel', ['reservation' => $reservation->id]),
                'customer_email' => Auth::user()->email,
                'metadata' => [
                    'reservation_id' => $reservation->id,
                    'user_id' => Auth::id(),
                ],
            ]);

            // Sauvegarder l'ID de session dans la réservation
            $reservation->update([
                'stripe_session_id' => $session->id,
            ]);

            return response()->json([
                'sessionId' => $session->id,
                'url' => $session->url,
            ]);

        } catch (ApiErrorException $e) {
            \Log::error('Erreur Stripe: ' . $e->getMessage());
            return response()->json([
                'error' => 'Une erreur est survenue lors de la création de la session de paiement.'
            ], 500);
        }
    }

    /**
     * Gère le succès du paiement
     */
    public function success(Request $request, Reservation $reservation)
    {
        $sessionId = $request->query('session_id');

        if ($sessionId && $reservation->stripe_session_id === $sessionId) {
            try {
                // Vérifier le statut de la session Stripe
                $session = Session::retrieve($sessionId);

                if ($session->payment_status === 'paid') {
                    // Mettre à jour le statut de la réservation
                    $reservation->update([
                        'payment_status' => 'paid',
                        'status' => 'confirmed',
                    ]);

                    return redirect()->route('reservations.index')
                        ->with('success', 'Paiement effectué avec succès ! Votre réservation est confirmée.');
                }
            } catch (ApiErrorException $e) {
                \Log::error('Erreur lors de la vérification du paiement: ' . $e->getMessage());
            }
        }

        return redirect()->route('reservations.index')
            ->with('error', 'Erreur lors de la confirmation du paiement.');
    }

    /**
     * Gère l'annulation du paiement
     */
    public function cancel(Reservation $reservation)
    {
        return redirect()->route('payment.show', $reservation)
            ->with('error', 'Le paiement a été annulé. Vous pouvez réessayer.');
    }

    /**
     * Webhook Stripe pour confirmer les paiements
     */
    public function webhook(Request $request)
    {
        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        $endpointSecret = config('services.stripe.webhook_secret');

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload,
                $sigHeader,
                $endpointSecret
            );
        } catch (\Exception $e) {
            \Log::error('Erreur webhook Stripe: ' . $e->getMessage());
            return response()->json(['error' => 'Invalid signature'], 400);
        }

        // Gérer l'événement
        switch ($event->type) {
            case 'checkout.session.completed':
                $session = $event->data->object;
                
                if ($session->payment_status === 'paid') {
                    $reservation = Reservation::where('stripe_session_id', $session->id)->first();
                    
                    if ($reservation) {
                        $reservation->update([
                            'payment_status' => 'paid',
                            'status' => 'confirmed',
                        ]);
                    }
                }
                break;

            case 'payment_intent.payment_failed':
                $paymentIntent = $event->data->object;
                $reservation = Reservation::where('stripe_session_id', $paymentIntent->id)->first();
                
                if ($reservation) {
                    $reservation->update([
                        'payment_status' => 'failed',
                    ]);
                }
                break;
        }

        return response()->json(['received' => true]);
    }
}

