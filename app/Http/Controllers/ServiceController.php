<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Affiche la page du service Conciergerie
     */
    public function concierge()
    {
        return view('services.concierge');
    }

    /**
     * Affiche la page du service Nettoyage Professionnel
     */
    public function cleaning()
    {
        return view('services.cleaning');
    }

    /**
     * Affiche la page du service Accueil Personnalisé
     */
    public function welcome()
    {
        return view('services.welcome');
    }
}
