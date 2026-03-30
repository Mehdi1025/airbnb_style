<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;
use App\Models\User;

class WelcomeController extends Controller
{
    public function index()
    {
        // Récupérer toutes les maisons avec leurs utilisateurs
        $houses = House::with('user')
            ->latest()
            ->get();

        // Statistiques générales
        $totalHouses = $houses->count();
        $totalUsers = User::where('role', 'locataire')->count();
        $averagePrice = $houses->avg('prix');
        $averageSurface = $houses->avg('surface');

        // Répartition par type
        $typesDistribution = $houses->groupBy('type')
            ->map(function($group) {
                return $group->count();
            });

        // Répartition par tranche de prix
        $priceRanges = [
            '0-500€' => $houses->where('prix', '<=', 500)->count(),
            '501-1000€' => $houses->whereBetween('prix', [501, 1000])->count(),
            '1001-1500€' => $houses->whereBetween('prix', [1001, 1500])->count(),
            '1501-2000€' => $houses->whereBetween('prix', [1501, 2000])->count(),
            '2000€+' => $houses->where('prix', '>', 2000)->count(),
        ];

        // Récupérer jusqu'à 10 biens à la une de manière aléatoire
        $featuredHouses = House::with('user')->inRandomOrder()->take(10)->get();

        return view('welcome', compact(
            'houses',
            'totalHouses',
            'totalUsers',
            'averagePrice',
            'averageSurface',
            'typesDistribution',
            'priceRanges',
            'featuredHouses'
        ));
    }
}
