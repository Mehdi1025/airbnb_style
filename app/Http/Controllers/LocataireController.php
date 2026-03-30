<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Support\AdditionalOptions;
use App\Models\House;
use App\Models\Reservation;
use Carbon\Carbon;

class LocataireController extends Controller
{
    public function showLoginForm()
    {
        return view('locataire.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string',
        ]);

        // Rechercher l'utilisateur par email
        $user = User::where('email', $credentials['email'])->first();

        if ($user && $user->role === 'locataire') {
            // Vérifier le mot de passe
            if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
                $request->session()->regenerate();
                return redirect()->route('locataire.dashboard')->with('success', 'Connexion réussie !');
            }
        }

        return back()->withErrors([
            'email' => 'Email ou mot de passe incorrect, ou vous n\'êtes pas un locataire.',
        ])->withInput($request->only('email'));
    }

    public function dashboard()
    {
        $user = Auth::user();
        
        if ($user->role !== 'locataire') {
            return redirect('/')->with('error', 'Accès non autorisé.');
        }

        // Charger les maisons avec leurs réservations
        $allHouses = $user->houses()->with('reservations')->get();
        $houses = $user->houses()->latest()->get(); // Toutes les maisons pour la section "Mes Maisons"
        $housesDashboard = $user->houses()->latest()->take(5)->get(); // 5 dernières pour le dashboard
        
        // Statistiques pour le dashboard
        $totalHouses = $allHouses->count();
        
        // Calculer les revenus totaux (réservations confirmées uniquement)
        $totalRevenue = 0;
        $confirmedReservations = Reservation::whereIn('house_id', $allHouses->pluck('id'))
            ->where('status', 'confirmed')
            ->with('house')
            ->get();
        
        foreach ($confirmedReservations as $reservation) {
            $house = $reservation->house;
            $startDate = Carbon::parse($reservation->start_date);
            $endDate = Carbon::parse($reservation->end_date);
            $nights = $startDate->diffInDays($endDate);
            
            // Prix de base pour les nuits
            $basePrice = $house->prix * $nights;
            
            // Ajouter les options fixes
            $optionsPrice = 0;
            if ($reservation->has_breakfast && $house->price_breakfast) {
                $optionsPrice += $house->price_breakfast;
            }
            if ($reservation->has_love_room && $house->price_love_room) {
                $optionsPrice += $house->price_love_room;
            }

            $optionsPrice += AdditionalOptions::sumPrices(
                is_array($reservation->additional_options) ? $reservation->additional_options : null
            );

            $totalRevenue += $basePrice + $optionsPrice;
        }
        
        // Revenus du mois en cours
        $currentMonthRevenue = 0;
        $currentMonthReservations = Reservation::whereIn('house_id', $allHouses->pluck('id'))
            ->where('status', 'confirmed')
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->with('house')
            ->get();
        
        foreach ($currentMonthReservations as $reservation) {
            $house = $reservation->house;
            $startDate = Carbon::parse($reservation->start_date);
            $endDate = Carbon::parse($reservation->end_date);
            $nights = $startDate->diffInDays($endDate);
            
            $basePrice = $house->prix * $nights;
            $optionsPrice = 0;
            if ($reservation->has_breakfast && $house->price_breakfast) {
                $optionsPrice += $house->price_breakfast;
            }
            if ($reservation->has_love_room && $house->price_love_room) {
                $optionsPrice += $house->price_love_room;
            }
            
            $optionsPrice += AdditionalOptions::sumPrices(
                is_array($reservation->additional_options) ? $reservation->additional_options : null
            );

            $currentMonthRevenue += $basePrice + $optionsPrice;
        }
        
        // Note moyenne des biens
        $averageRating = $allHouses->avg('rate') ?? 0;
        $averageRating = round($averageRating, 1);
        
        // Nombre total de réservations confirmées
        $totalReservations = $confirmedReservations->count();
        
        // Nombre de réservations en attente
        $pendingReservations = Reservation::whereIn('house_id', $allHouses->pluck('id'))
            ->where('status', 'pending')
            ->count();
        
        // Charger toutes les réservations des maisons du locataire (pour la section Réservations)
        $allReservations = Reservation::whereIn('house_id', $allHouses->pluck('id'))
            ->with('house', 'user')
            ->latest()
            ->get();
        
        // Statistiques détaillées (pour la section Statistiques)
        $totalPhotos = $allHouses->sum(function($house) {
            return $house->photos ? count($house->photos) : 0;
        });
        
        $prixMoyen = $totalHouses > 0 ? round($allHouses->avg('prix'), 2) : 0;
        $prixMax = $allHouses->max('prix') ?? 0;
        $prixMin = $allHouses->min('prix') ?? 0;
        
        $surfaceMoyenne = $totalHouses > 0 ? round($allHouses->avg('surface'), 2) : 0;
        $surfaceMax = $allHouses->max('surface') ?? 0;
        $surfaceMin = $allHouses->min('surface') ?? 0;
        
        $repartitionType = $allHouses->groupBy('type')
            ->map(function($group) {
                return $group->count();
            });
        
        $tranchesPrix = [
            '0-500€' => $allHouses->where('prix', '<=', 500)->count(),
            '501-1000€' => $allHouses->whereBetween('prix', [501, 1000])->count(),
            '1001-1500€' => $allHouses->whereBetween('prix', [1001, 1500])->count(),
            '1501-2000€' => $allHouses->whereBetween('prix', [1501, 2000])->count(),
            '2000€+' => $allHouses->where('prix', '>', 2000)->count(),
        ];
        
        $tranchesSurface = [
            '0-50m²' => $allHouses->where('surface', '<=', 50)->count(),
            '51-100m²' => $allHouses->whereBetween('surface', [51, 100])->count(),
            '101-150m²' => $allHouses->whereBetween('surface', [101, 150])->count(),
            '151-200m²' => $allHouses->whereBetween('surface', [151, 200])->count(),
            '200m²+' => $allHouses->where('surface', '>', 200)->count(),
        ];
        
        $chartData = [
            'types' => $repartitionType->keys()->toArray(),
            'typesCount' => $repartitionType->values()->toArray(),
            'tranchesPrix' => array_keys($tranchesPrix),
            'tranchesPrixCount' => array_values($tranchesPrix),
            'tranchesSurface' => array_keys($tranchesSurface),
            'tranchesSurfaceCount' => array_values($tranchesSurface),
        ];
        
        return view('locataire.dashboard', compact(
            'user', 
            'houses',
            'housesDashboard',
            'totalHouses',
            'totalRevenue',
            'currentMonthRevenue',
            'averageRating',
            'totalReservations',
            'pendingReservations',
            'allReservations',
            'totalPhotos',
            'prixMoyen',
            'prixMax',
            'prixMin',
            'surfaceMoyenne',
            'surfaceMax',
            'surfaceMin',
            'repartitionType',
            'tranchesPrix',
            'tranchesSurface',
            'chartData'
        ));
    }

    public function statistiques()
    {
        $user = Auth::user();
        
        if ($user->role !== 'locataire') {
            return redirect('/')->with('error', 'Accès non autorisé.');
        }
        
        $houses = $user->houses;
        
        // Statistiques générales
        $totalHouses = $houses->count();
        $totalPhotos = $houses->sum(function($house) {
            return $house->photos ? count($house->photos) : 0;
        });
        
        // Statistiques de prix
        $prixMoyen = $totalHouses > 0 ? round($houses->avg('prix'), 2) : 0;
        $prixMax = $houses->max('prix') ?? 0;
        $prixMin = $houses->min('prix') ?? 0;
        
        // Statistiques de surface
        $surfaceMoyenne = $totalHouses > 0 ? round($houses->avg('surface'), 2) : 0;
        $surfaceMax = $houses->max('surface') ?? 0;
        $surfaceMin = $houses->min('surface') ?? 0;
        
        // Répartition par type
        $repartitionType = $houses->groupBy('type')
            ->map(function($group) {
                return $group->count();
            });
        
        // Répartition par tranche de prix
        $tranchesPrix = [
            '0-500€' => $houses->where('prix', '<=', 500)->count(),
            '501-1000€' => $houses->whereBetween('prix', [501, 1000])->count(),
            '1001-1500€' => $houses->whereBetween('prix', [1001, 1500])->count(),
            '1501-2000€' => $houses->whereBetween('prix', [1501, 2000])->count(),
            '2000€+' => $houses->where('prix', '>', 2000)->count(),
        ];
        
        // Répartition par tranche de surface
        $tranchesSurface = [
            '0-50m²' => $houses->where('surface', '<=', 50)->count(),
            '51-100m²' => $houses->whereBetween('surface', [51, 100])->count(),
            '101-150m²' => $houses->whereBetween('surface', [101, 150])->count(),
            '151-200m²' => $houses->whereBetween('surface', [151, 200])->count(),
            '200m²+' => $houses->where('surface', '>', 200)->count(),
        ];
        
        // Données pour les graphiques
        $chartData = [
            'types' => $repartitionType->keys()->toArray(),
            'typesCount' => $repartitionType->values()->toArray(),
            'tranchesPrix' => array_keys($tranchesPrix),
            'tranchesPrixCount' => array_values($tranchesPrix),
            'tranchesSurface' => array_keys($tranchesSurface),
            'tranchesSurfaceCount' => array_values($tranchesSurface),
        ];
        
        return view('locataire.statistiques', compact(
            'user', 'totalHouses', 'totalPhotos', 'prixMoyen', 'prixMax', 'prixMin',
            'surfaceMoyenne', 'surfaceMax', 'surfaceMin', 'repartitionType',
            'tranchesSurface', 'tranchesPrix', 'chartData'
        ));
    }

    public function manageHouse(House $house)
    {
        $user = Auth::user();
        
        if ($user->role !== 'locataire') {
            return redirect('/')->with('error', 'Accès non autorisé.');
        }

        // Vérifier que la maison appartient au locataire connecté
        if ($house->user_id !== $user->id) {
            abort(403, 'Accès non autorisé.');
        }

        // Charger les réservations du bien
        $reservations = $house->reservations()
            ->with('user')
            ->latest()
            ->get();

        // Statistiques du bien
        $totalReservations = $reservations->count();
        $confirmedReservations = $reservations->where('status', 'confirmed');
        $pendingReservations = $reservations->where('status', 'pending');
        $cancelledReservations = $reservations->where('status', 'cancelled');

        // Calculer les revenus du bien
        $totalRevenue = 0;
        foreach ($confirmedReservations as $reservation) {
            $startDate = Carbon::parse($reservation->start_date);
            $endDate = Carbon::parse($reservation->end_date);
            $nights = $startDate->diffInDays($endDate);
            
            $basePrice = $house->prix * $nights;
            $optionsPrice = 0;
            if ($reservation->has_breakfast && $house->price_breakfast) {
                $optionsPrice += $house->price_breakfast;
            }
            if ($reservation->has_love_room && $house->price_love_room) {
                $optionsPrice += $house->price_love_room;
            }
            
            $optionsPrice += AdditionalOptions::sumPrices(
                is_array($reservation->additional_options) ? $reservation->additional_options : null
            );

            $totalRevenue += $basePrice + $optionsPrice;
        }

        // Revenus du mois en cours
        $currentMonthRevenue = 0;
        $currentMonthReservations = $confirmedReservations->filter(function($reservation) {
            return Carbon::parse($reservation->created_at)->month === Carbon::now()->month &&
                   Carbon::parse($reservation->created_at)->year === Carbon::now()->year;
        });

        foreach ($currentMonthReservations as $reservation) {
            $startDate = Carbon::parse($reservation->start_date);
            $endDate = Carbon::parse($reservation->end_date);
            $nights = $startDate->diffInDays($endDate);
            
            $basePrice = $house->prix * $nights;
            $optionsPrice = 0;
            if ($reservation->has_breakfast && $house->price_breakfast) {
                $optionsPrice += $house->price_breakfast;
            }
            if ($reservation->has_love_room && $house->price_love_room) {
                $optionsPrice += $house->price_love_room;
            }
            
            $optionsPrice += AdditionalOptions::sumPrices(
                is_array($reservation->additional_options) ? $reservation->additional_options : null
            );

            $currentMonthRevenue += $basePrice + $optionsPrice;
        }

        return view('locataire.manage-house', compact(
            'house',
            'reservations',
            'totalReservations',
            'confirmedReservations',
            'pendingReservations',
            'cancelledReservations',
            'totalRevenue',
            'currentMonthRevenue'
        ));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/')->with('success', 'Déconnexion réussie.');
    }
}
