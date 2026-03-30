<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Support\AdditionalOptions;
use App\Models\DemandeLocation;
use App\Models\House;
use App\Models\Reservation;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            if ($user->isAdmin()) {
                $request->session()->regenerate();
                return redirect()->intended('/admin/dashboard');
            } else {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Accès non autorisé. Connexion admin requise.',
                ])->withInput($request->only('email'));
            }
        }

        return back()->withErrors([
            'email' => 'Les identifiants fournis ne correspondent pas à nos enregistrements.',
        ])->withInput($request->only('email'));
    }

    public function dashboard()
    {
        // Demandes de location
        $demandes = DemandeLocation::orderByDesc('created_at')->get();
        $pendingDemandes = $demandes->count();
        
        // Statistiques utilisateurs
        $totalUsers = User::count();
        $totalLocataires = User::where('role', 'locataire')->count();
        $totalAdmins = User::where('role', 'admin')->count();
        $newUsersThisMonth = User::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();
        
        // Statistiques biens
        $totalHouses = House::count();
        $housesThisMonth = House::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();
        $averagePrice = House::avg('prix') ?? 0;
        $averageSurface = House::avg('surface') ?? 0;
        $totalPhotos = House::get()->sum(function($house) {
            return $house->photos ? count($house->photos) : 0;
        });
        
        // Répartition par type
        $housesByType = House::select('type', DB::raw('count(*) as count'))
            ->groupBy('type')
            ->pluck('count', 'type')
            ->toArray();
        
        // Statistiques réservations
        $totalReservations = Reservation::count();
        $pendingReservations = Reservation::where('status', 'pending')->count();
        $confirmedReservations = Reservation::where('status', 'confirmed')->count();
        $cancelledReservations = Reservation::where('status', 'cancelled')->count();
        $reservationsThisMonth = Reservation::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();
        
        // Revenus totaux (calculés depuis les réservations confirmées)
        $totalRevenue = 0;
        $currentMonthRevenue = 0;
        $confirmedRes = Reservation::where('status', 'confirmed')
            ->with('house')
            ->get();
        
        foreach ($confirmedRes as $reservation) {
            if ($reservation->house) {
                $startDate = Carbon::parse($reservation->start_date);
                $endDate = Carbon::parse($reservation->end_date);
                $nights = $startDate->diffInDays($endDate);
                
                $basePrice = $reservation->house->prix * $nights;
                $breakfastPrice = $reservation->has_breakfast ? ($reservation->house->price_breakfast ?? 0) : 0;
                $loveRoomPrice = $reservation->has_love_room ? ($reservation->house->price_love_room ?? 0) : 0;
                
                $additionalOptionsPrice = AdditionalOptions::sumPrices(
                    is_array($reservation->additional_options) ? $reservation->additional_options : null
                );

                $reservationTotal = $basePrice + $breakfastPrice + $loveRoomPrice + $additionalOptionsPrice;
                $totalRevenue += $reservationTotal;
                
                if ($reservation->created_at->month == Carbon::now()->month && 
                    $reservation->created_at->year == Carbon::now()->year) {
                    $currentMonthRevenue += $reservationTotal;
                }
            }
        }
        
        // Réservations par mois (6 derniers mois)
        $reservationsByMonth = [];
        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $count = Reservation::whereMonth('created_at', $month->month)
                ->whereYear('created_at', $month->year)
                ->count();
            $reservationsByMonth[$month->format('M Y')] = $count;
        }
        // S'assurer que c'est un array
        $reservationsByMonth = (array) $reservationsByMonth;
        
        // Utilisateurs par mois (6 derniers mois)
        $usersByMonth = [];
        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $count = User::whereMonth('created_at', $month->month)
                ->whereYear('created_at', $month->year)
                ->count();
            $usersByMonth[$month->format('M Y')] = $count;
        }
        // S'assurer que c'est un array
        $usersByMonth = (array) $usersByMonth;
        
        // Biens récents
        $recentHouses = House::with('user')
            ->latest()
            ->take(5)
            ->get();
        
        // Réservations récentes
        $recentReservations = Reservation::with(['user', 'house'])
            ->latest()
            ->take(5)
            ->get();
        
        // Utilisateurs récents
        $recentUsers = User::where('role', 'locataire')
            ->latest()
            ->take(5)
            ->get();
        
        // Tous les utilisateurs pour la section dédiée
        $allUsers = User::withCount(['houses', 'reservations'])
            ->orderBy('created_at', 'desc')
            ->get();
        
        // Tous les biens pour la section dédiée
        $allHouses = House::with(['user', 'reservations'])
            ->withCount('reservations')
            ->orderBy('created_at', 'desc')
            ->get();
        
        // Toutes les réservations pour la section dédiée
        $allReservations = Reservation::with(['user', 'house'])
            ->orderBy('created_at', 'desc')
            ->get();
        
        // Statistiques détaillées pour la section Analyses
        $topHouses = House::with('user')
            ->withCount('reservations')
            ->orderBy('reservations_count', 'desc')
            ->take(10)
            ->get();
        
        $topUsers = User::where('role', 'locataire')
            ->withCount('reservations')
            ->orderBy('reservations_count', 'desc')
            ->take(10)
            ->get();
        
        // Revenus par mois (6 derniers mois)
        $revenueByMonth = [];
        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $monthRevenue = 0;
            $monthReservations = Reservation::where('status', 'confirmed')
                ->whereMonth('created_at', $month->month)
                ->whereYear('created_at', $month->year)
                ->with('house')
                ->get();
            
            foreach ($monthReservations as $reservation) {
                if ($reservation->house) {
                    $startDate = Carbon::parse($reservation->start_date);
                    $endDate = Carbon::parse($reservation->end_date);
                    $nights = $startDate->diffInDays($endDate);
                    
                    $basePrice = $reservation->house->prix * $nights;
                    $breakfastPrice = $reservation->has_breakfast ? ($reservation->house->price_breakfast ?? 0) : 0;
                    $loveRoomPrice = $reservation->has_love_room ? ($reservation->house->price_love_room ?? 0) : 0;
                    
                    $additionalOptionsPrice = AdditionalOptions::sumPrices(
                        is_array($reservation->additional_options) ? $reservation->additional_options : null
                    );

                    $monthRevenue += $basePrice + $breakfastPrice + $loveRoomPrice + $additionalOptionsPrice;
                }
            }
            $revenueByMonth[$month->format('M Y')] = $monthRevenue;
        }
        $revenueByMonth = (array) $revenueByMonth;
        
        // Taux de conversion (réservations / utilisateurs)
        $conversionRate = $totalLocataires > 0 ? round(($totalReservations / $totalLocataires) * 100, 2) : 0;
        
        // Taux d'occupation moyen (basé sur les réservations confirmées)
        $occupancyRate = $totalHouses > 0 ? round(($confirmedReservations / $totalHouses) * 100, 2) : 0;
        
        // ============================================
        // NOUVELLES STATISTIQUES AVANCÉES
        // ============================================
        
        // Durée moyenne de séjour (en nuits)
        $totalNights = 0;
        $reservationsWithDates = Reservation::whereNotNull('start_date')
            ->whereNotNull('end_date')
            ->get();
        foreach ($reservationsWithDates as $reservation) {
            $startDate = Carbon::parse($reservation->start_date);
            $endDate = Carbon::parse($reservation->end_date);
            $totalNights += $startDate->diffInDays($endDate);
        }
        $averageNights = $reservationsWithDates->count() > 0 ? round($totalNights / $reservationsWithDates->count(), 1) : 0;
        
        // Revenu moyen par réservation
        $averageRevenuePerReservation = $confirmedReservations > 0 ? round($totalRevenue / $confirmedReservations, 2) : 0;
        
        // Taux d'annulation
        $cancellationRate = $totalReservations > 0 ? round(($cancelledReservations / $totalReservations) * 100, 2) : 0;
        
        // Biens sans réservation
        $housesWithoutReservations = House::doesntHave('reservations')->count();
        
        // Utilisateurs actifs ce mois (qui ont fait au moins une réservation)
        $activeUsersThisMonth = User::whereHas('reservations', function($query) {
            $query->whereMonth('created_at', Carbon::now()->month)
                  ->whereYear('created_at', Carbon::now()->year);
        })->count();
        
        // Revenu total cette année
        $currentYearRevenue = 0;
        $yearReservations = Reservation::where('status', 'confirmed')
            ->whereYear('created_at', Carbon::now()->year)
            ->with('house')
            ->get();
        foreach ($yearReservations as $reservation) {
            if ($reservation->house) {
                $startDate = Carbon::parse($reservation->start_date);
                $endDate = Carbon::parse($reservation->end_date);
                $nights = $startDate->diffInDays($endDate);
                
                $basePrice = $reservation->house->prix * $nights;
                $breakfastPrice = $reservation->has_breakfast ? ($reservation->house->price_breakfast ?? 0) : 0;
                $loveRoomPrice = $reservation->has_love_room ? ($reservation->house->price_love_room ?? 0) : 0;
                
                $additionalOptionsPrice = AdditionalOptions::sumPrices(
                    is_array($reservation->additional_options) ? $reservation->additional_options : null
                );

                $currentYearRevenue += $basePrice + $breakfastPrice + $loveRoomPrice + $additionalOptionsPrice;
            }
        }
        
        // Réservations à venir (futures)
        $upcomingReservations = Reservation::where('status', 'confirmed')
            ->where('start_date', '>=', Carbon::now()->toDateString())
            ->count();
        
        // Réservations en cours
        $ongoingReservations = Reservation::where('status', 'confirmed')
            ->where('start_date', '<=', Carbon::now()->toDateString())
            ->where('end_date', '>=', Carbon::now()->toDateString())
            ->count();
        
        // Revenu moyen par bien
        $averageRevenuePerHouse = $totalHouses > 0 ? round($totalRevenue / $totalHouses, 2) : 0;
        
        // Taux de croissance des revenus (mois en cours vs mois précédent)
        $previousMonth = Carbon::now()->subMonth();
        $previousMonthRevenue = 0;
        $prevMonthReservations = Reservation::where('status', 'confirmed')
            ->whereMonth('created_at', $previousMonth->month)
            ->whereYear('created_at', $previousMonth->year)
            ->with('house')
            ->get();
        foreach ($prevMonthReservations as $reservation) {
            if ($reservation->house) {
                $startDate = Carbon::parse($reservation->start_date);
                $endDate = Carbon::parse($reservation->end_date);
                $nights = $startDate->diffInDays($endDate);
                
                $basePrice = $reservation->house->prix * $nights;
                $breakfastPrice = $reservation->has_breakfast ? ($reservation->house->price_breakfast ?? 0) : 0;
                $loveRoomPrice = $reservation->has_love_room ? ($reservation->house->price_love_room ?? 0) : 0;
                
                $additionalOptionsPrice = AdditionalOptions::sumPrices(
                    is_array($reservation->additional_options) ? $reservation->additional_options : null
                );

                $previousMonthRevenue += $basePrice + $breakfastPrice + $loveRoomPrice + $additionalOptionsPrice;
            }
        }
        $revenueGrowthRate = $previousMonthRevenue > 0 
            ? round((($currentMonthRevenue - $previousMonthRevenue) / $previousMonthRevenue) * 100, 2) 
            : ($currentMonthRevenue > 0 ? 100 : 0);
        
        // Nombre de clients uniques (utilisateurs ayant fait au moins une réservation)
        $uniqueClients = User::whereHas('reservations')->count();
        
        // Nombre moyen de photos par bien
        $averagePhotosPerHouse = $totalHouses > 0 ? round($totalPhotos / $totalHouses, 1) : 0;
        
        // Taux de confirmation (réservations confirmées / total réservations)
        $confirmationRate = $totalReservations > 0 ? round(($confirmedReservations / $totalReservations) * 100, 2) : 0;
        
        return view('admin.dashboard', compact(
            'demandes',
            'pendingDemandes',
            'totalUsers',
            'totalLocataires',
            'totalAdmins',
            'newUsersThisMonth',
            'totalHouses',
            'housesThisMonth',
            'averagePrice',
            'averageSurface',
            'totalPhotos',
            'housesByType',
            'totalReservations',
            'pendingReservations',
            'confirmedReservations',
            'cancelledReservations',
            'reservationsThisMonth',
            'totalRevenue',
            'currentMonthRevenue',
            'reservationsByMonth',
            'usersByMonth',
            'recentHouses',
            'recentReservations',
            'recentUsers',
            'allUsers',
            'allHouses',
            'allReservations',
            'topHouses',
            'topUsers',
            'revenueByMonth',
            'conversionRate',
            'occupancyRate',
            'averageNights',
            'averageRevenuePerReservation',
            'cancellationRate',
            'housesWithoutReservations',
            'activeUsersThisMonth',
            'currentYearRevenue',
            'upcomingReservations',
            'ongoingReservations',
            'averageRevenuePerHouse',
            'revenueGrowthRate',
            'uniqueClients',
            'averagePhotosPerHouse',
            'confirmationRate'
        ));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/admin/login');
    }

     public function acceptDemande($id)
    {
        $demande = DemandeLocation::findOrFail($id);

        // Crée un nouvel utilisateur avec rôle locataire
        User::create([
            'first_name' => $demande->first_name,
            'last_name'  => $demande->last_name,
            'email'      => $demande->email,
            'password'   => $demande->password, // ⚠️ déjà hashé dans la demande
            'role'       => 'locataire',
        ]);

        // Option : supprimer la demande une fois traitée
        $demande->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Demande acceptée, utilisateur créé.');
    }

    public function rejectDemande($id)
    {
        $demande = DemandeLocation::findOrFail($id);
        $demande->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Demande rejetée et supprimée.');
    }
}
