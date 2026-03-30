<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /**
     * Affiche la page Qualité Premium
     */
    public function premiumQuality()
    {
        return view('features.premium-quality');
    }

    /**
     * Affiche la page Support 24/7
     */
    public function support()
    {
        return view('features.support');
    }

    /**
     * Affiche la page Emplacements Privilégiés
     */
    public function locations()
    {
        return view('features.locations');
    }

    /**
     * Affiche la page Sécurité Garantie
     */
    public function security()
    {
        return view('features.security');
    }
}
