<?php

namespace App\Http\Controllers;

use App\Models\DemandeLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DemandeLocationController extends Controller
{
    public function create()
    {
        return view('demande_location.create');
    }

    public function store(Request $request)
    {
        // ✅ Validation incluant email et password
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'birth_date' => 'required|date',
            'biens_list' => 'required|string',
            'email'      => 'required|email|unique:demande_de_location,email',
            'password'   => 'required|string|min:8',
        ]);

        // ✅ Hash du mot de passe avant insertion
        $validated['password'] = Hash::make($validated['password']);

        // ✅ Insertion dans la base
        DemandeLocation::create($validated);

        // ✅ Redirection avec message de succès
        return redirect()
            ->route('demande-location.create')
            ->with('success', 'Votre demande a bien été enregistrée.');
    }
}
