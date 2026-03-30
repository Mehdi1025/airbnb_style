<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReservationController extends Controller
{
    /**
     * Affiche le formulaire de réservation
     */
    public function create(House $house)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter pour effectuer une réservation.');
        }
        // Charger l'hôte avec la maison
        $house->load('user');
        return view('reservations.create', compact('house'));
    }

    /**
     * Enregistre une nouvelle réservation
     */
    public function store(Request $request, House $house)
    {
        try {
            // Vérifier si l'utilisateur est connecté
            if (!Auth::check()) {
                return response()->json([
                    'error' => 'Veuillez vous connecter pour effectuer une réservation.'
                ], 401);
            }

            $user = Auth::user();
            
            // Valider les données de la requête
            $validated = $request->validate([
                'start_date' => 'required|date|after_or_equal:today',
                'end_date' => 'required|date|after:start_date',
                'notes' => 'nullable|string|max:1000',
                'additional_options' => 'nullable|string', // JSON string
            ]);

            // Convertir les dates en objet Carbon pour la vérification
            $startDate = Carbon::parse($validated['start_date']);
            $endDate = Carbon::parse($validated['end_date']);

            // Vérifier que la date de fin est bien après la date de début
            if ($endDate->lte($startDate)) {
                return response()->json([
                    'error' => 'La date de fin doit être postérieure à la date de début.'
                ], 422);
            }

            // Vérifier que la réservation ne dépasse pas 30 jours
            $nights = $startDate->diffInDays($endDate);
            if ($nights > 30) {
                return response()->json([
                    'error' => 'La réservation ne peut pas dépasser 30 jours. Pour une réservation de plus de 30 jours, veuillez contacter l\'hôte directement.'
                ], 422);
            }

            // Vérifier s'il existe déjà une réservation pending pour ce bien et cet utilisateur
            $existingPendingReservation = Reservation::where('user_id', $user->id)
                ->where('house_id', $house->id)
                ->where('status', 'pending')
                ->where('payment_status', 'pending')
                ->first();

            if ($existingPendingReservation) {
                return response()->json([
                    'error' => 'Vous avez déjà une réservation en attente de paiement pour ce bien. Veuillez finaliser le paiement ou modifier votre réservation existante.',
                    'existing_reservation_id' => $existingPendingReservation->id,
                    'redirect' => route('reservations.index')
                ], 422);
            }

            // Vérifier la disponibilité
            if (!$house->isAvailableForDates($startDate->format('Y-m-d'), $endDate->format('Y-m-d'))) {
                return response()->json([
                    'error' => 'Ce bien n\'est pas disponible pour les dates sélectionnées.'
                ], 422);
            }

            // Démarrer une transaction pour s'assurer de l'intégrité des données
            DB::beginTransaction();

            try {
                // Traiter les options supplémentaires
                $additionalOptions = null;
                if ($request->has('additional_options') && !empty($request->input('additional_options'))) {
                    $additionalOptionsJson = $request->input('additional_options');
                    if (is_string($additionalOptionsJson)) {
                        $decodedOptions = json_decode($additionalOptionsJson, true);
                        if (is_array($decodedOptions) && !empty($decodedOptions)) {
                            // Valider que les options existent dans le bien
                            $houseAdditionalOptions = $house->additional_options ?? [];
                            $validatedOptions = [];
                            
                            foreach ($decodedOptions as $selectedOption) {
                                foreach ($houseAdditionalOptions as $houseOption) {
                                    if (isset($selectedOption['name']) && 
                                        $selectedOption['name'] === $houseOption['name'] &&
                                        isset($selectedOption['price']) &&
                                        $selectedOption['price'] == $houseOption['price']) {
                                        $validatedOptions[] = $houseOption;
                                        break;
                                    }
                                }
                            }
                            
                            $additionalOptions = !empty($validatedOptions) ? $validatedOptions : null;
                        }
                    }
                }

                // Créer la réservation
                $reservation = Reservation::create([
                    'user_id' => $user->id,
                    'house_id' => $house->id,
                    'start_date' => $startDate->format('Y-m-d'),
                    'end_date' => $endDate->format('Y-m-d'),
                    'notes' => $validated['notes'] ?? null,
                    'status' => 'pending',
                    'payment_status' => 'pending',
                    'has_breakfast' => $request->has('has_breakfast') ? (bool)$request->input('has_breakfast') : false,
                    'has_love_room' => $request->has('has_love_room') ? (bool)$request->input('has_love_room') : false,
                    'additional_options' => $additionalOptions,
                ]);

                // Charger la relation house pour la réponse
                $reservation->load('house');
                
                // Valider la transaction
                DB::commit();

                // Rediriger vers la page de paiement
                return response()->json([
                    'message' => 'Réservation créée avec succès!',
                    'reservation' => $reservation,
                    'redirect' => route('payment.show', $reservation)
                ], 201);
                
            } catch (\Exception $e) {
                // En cas d'erreur, annuler la transaction
                DB::rollBack();
                throw $e;
            }
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Erreur de validation',
                'errors' => $e->errors()
            ], 422);
            
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Erreur lors de la création de la réservation: ' . $e->getMessage() . '\n' . $e->getTraceAsString());
            return response()->json([
                'error' => 'Une erreur est survenue lors de la création de la réservation: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Affiche les réservations de l'utilisateur connecté
     */
    public function myReservations()
    {
        $reservations = auth()->user()->reservations()->with('house')->latest()->get();
        return view('reservations.my-reservations', compact('reservations'));
    }

    /**
     * Annule une réservation
     */
    public function cancel(Reservation $reservation)
    {
        $user = Auth::user();
        
        if (!$user || $user->id !== $reservation->user_id) {
            return response()->json(['error' => 'Action non autorisée'], 403);
        }

        if ($reservation->status === 'cancelled') {
            return response()->json(['error' => 'Cette réservation a déjà été annulée'], 400);
        }

        $reservation->update(['status' => 'cancelled']);

        return response()->json([
            'message' => 'Réservation annulée avec succès',
            'reservation' => $reservation
        ]);
    }

    /**
     * Affiche le formulaire de modification d'une réservation
     */
    public function edit(Reservation $reservation)
    {
        $user = Auth::user();
        
        // Vérifier que la réservation appartient à l'utilisateur
        if (!$user || $user->id !== $reservation->user_id) {
            abort(403, 'Action non autorisée');
        }

        // Vérifier que la réservation peut être modifiée (pending et non payée)
        if ($reservation->status !== 'pending' || $reservation->payment_status !== 'pending') {
            return redirect()->route('reservations.index')
                ->with('error', 'Cette réservation ne peut plus être modifiée.');
        }

        $reservation->load('house');
        $house = $reservation->house;
        $house->load('user');

        return view('reservations.edit', compact('reservation', 'house'));
    }

    /**
     * Met à jour une réservation
     */
    public function update(Request $request, Reservation $reservation)
    {
        try {
            $user = Auth::user();
            
            // Vérifier que la réservation appartient à l'utilisateur
            if (!$user || $user->id !== $reservation->user_id) {
                return response()->json([
                    'error' => 'Action non autorisée'
                ], 403);
            }

            // Vérifier que la réservation peut être modifiée
            if ($reservation->status !== 'pending' || $reservation->payment_status !== 'pending') {
                return response()->json([
                    'error' => 'Cette réservation ne peut plus être modifiée.'
                ], 400);
            }

            // Valider les données
            $validated = $request->validate([
                'start_date' => 'required|date|after_or_equal:today',
                'end_date' => 'required|date|after:start_date',
                'notes' => 'nullable|string|max:1000',
                'additional_options' => 'nullable|string',
            ]);

            // Convertir les dates
            $startDate = Carbon::parse($validated['start_date']);
            $endDate = Carbon::parse($validated['end_date']);

            // Vérifier que la date de fin est bien après la date de début
            if ($endDate->lte($startDate)) {
                return response()->json([
                    'error' => 'La date de fin doit être postérieure à la date de début.'
                ], 422);
            }

            // Vérifier que la réservation ne dépasse pas 30 jours
            $nights = $startDate->diffInDays($endDate);
            if ($nights > 30) {
                return response()->json([
                    'error' => 'La réservation ne peut pas dépasser 30 jours.'
                ], 422);
            }

            // Vérifier la disponibilité (en excluant la réservation actuelle)
            $house = $reservation->house;
            $isAvailable = !Reservation::where('house_id', $house->id)
                ->where('id', '!=', $reservation->id)
                ->where('status', '!=', 'cancelled')
                ->where(function($query) use ($startDate, $endDate) {
                    $query->whereBetween('start_date', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')])
                          ->orWhereBetween('end_date', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')])
                          ->orWhere(function($q) use ($startDate, $endDate) {
                              $q->where('start_date', '<=', $startDate->format('Y-m-d'))
                                ->where('end_date', '>=', $endDate->format('Y-m-d'));
                          });
                })
                ->exists();

            if (!$isAvailable) {
                return response()->json([
                    'error' => 'Ce bien n\'est pas disponible pour les dates sélectionnées.'
                ], 422);
            }

            DB::beginTransaction();

            try {
                // Traiter les options supplémentaires
                $additionalOptions = null;
                if ($request->has('additional_options') && !empty($request->input('additional_options'))) {
                    $additionalOptionsJson = $request->input('additional_options');
                    if (is_string($additionalOptionsJson)) {
                        $decodedOptions = json_decode($additionalOptionsJson, true);
                        if (is_array($decodedOptions) && !empty($decodedOptions)) {
                            $houseAdditionalOptions = $house->additional_options ?? [];
                            $validatedOptions = [];
                            
                            foreach ($decodedOptions as $selectedOption) {
                                foreach ($houseAdditionalOptions as $houseOption) {
                                    if (isset($selectedOption['name']) && 
                                        $selectedOption['name'] === $houseOption['name'] &&
                                        isset($selectedOption['price']) &&
                                        $selectedOption['price'] == $houseOption['price']) {
                                        $validatedOptions[] = $houseOption;
                                        break;
                                    }
                                }
                            }
                            
                            $additionalOptions = !empty($validatedOptions) ? $validatedOptions : null;
                        }
                    }
                }

                // Mettre à jour la réservation
                $reservation->update([
                    'start_date' => $startDate->format('Y-m-d'),
                    'end_date' => $endDate->format('Y-m-d'),
                    'notes' => $validated['notes'] ?? null,
                    'has_breakfast' => $request->has('has_breakfast') ? (bool)$request->input('has_breakfast') : false,
                    'has_love_room' => $request->has('has_love_room') ? (bool)$request->input('has_love_room') : false,
                    'additional_options' => $additionalOptions,
                    'stripe_session_id' => null, // Réinitialiser la session Stripe
                ]);

                $reservation->load('house');
                
                DB::commit();

                return response()->json([
                    'message' => 'Réservation modifiée avec succès!',
                    'reservation' => $reservation,
                    'redirect' => route('reservations.index')
                ], 200);
                
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Erreur de validation',
                'errors' => $e->errors()
            ], 422);
            
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Erreur lors de la modification de la réservation: ' . $e->getMessage());
            return response()->json([
                'error' => 'Une erreur est survenue lors de la modification de la réservation: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Vérifie la disponibilité d'un bien pour une période donnée
     */
    public function checkAvailability(House $house, Request $request)
    {
        try {
            // Valider les paramètres de la requête
            $validated = $request->validate([
                'start_date' => 'required|date|after_or_equal:today',
                'end_date' => 'required|date|after:start_date',
            ]);

            // Convertir les dates en objets Carbon pour la cohérence
            $startDate = Carbon::parse($validated['start_date']);
            $endDate = Carbon::parse($validated['end_date']);

            // Vérifier que la date de fin est bien après la date de début
            if ($endDate->lte($startDate)) {
                return response()->json([
                    'available' => false,
                    'message' => 'La date de fin doit être postérieure à la date de début.'
                ], 422);
            }

            // Vérifier que la réservation ne dépasse pas 30 jours
            $nights = $startDate->diffInDays($endDate);
            if ($nights > 30) {
                return response()->json([
                    'available' => false,
                    'message' => 'La réservation ne peut pas dépasser 30 jours. Pour une réservation de plus de 30 jours, veuillez contacter l\'hôte directement.'
                ], 422);
            }

            // Vérifier la disponibilité
            $isAvailable = $house->isAvailableForDates(
                $startDate->format('Y-m-d'),
                $endDate->format('Y-m-d')
            );

            return response()->json([
                'available' => $isAvailable,
                'message' => $isAvailable 
                    ? 'Le bien est disponible pour ces dates.' 
                    : 'Le bien n\'est pas disponible pour les dates sélectionnées.',
                'dates' => [
                    'start_date' => $startDate->format('Y-m-d'),
                    'end_date' => $endDate->format('Y-m-d'),
                    'nights' => $startDate->diffInDays($endDate)
                ]
            ]);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'available' => false,
                'message' => 'Erreur de validation des dates.',
                'errors' => $e->errors()
            ], 422);
            
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Erreur lors de la vérification de disponibilité: ' . $e->getMessage());
            
            return response()->json([
                'available' => false,
                'message' => 'Une erreur est survenue lors de la vérification de disponibilité.'
            ], 500);
        }
    }
}