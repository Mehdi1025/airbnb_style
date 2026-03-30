<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class HouseController extends Controller
{
    /**
     * Afficher la liste de tous les biens (accès public)
     */
    public function index(Request $request)
    {
        $query = House::with('user');

        // Filtre par recherche (description ou lieu)
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('description', 'like', '%' . $searchTerm . '%')
                  ->orWhere('lieu_exact', 'like', '%' . $searchTerm . '%');
            });
        }

        // Filtre par type
        if ($request->has('type') && !empty($request->type)) {
            $query->where('type', $request->type);
        }

        // Filtre par prix minimum
        if ($request->has('min_price') && !empty($request->min_price)) {
            $query->where('prix', '>=', $request->min_price);
        }

        // Filtre par prix maximum
        if ($request->has('max_price') && !empty($request->max_price)) {
            $query->where('prix', '<=', $request->max_price);
        }

        // Filtre par surface minimum
        if ($request->has('min_surface') && !empty($request->min_surface)) {
            $query->where('surface', '>=', $request->min_surface);
        }

        // Tri
        $sort = $request->get('sort', 'latest');
        switch ($sort) {
            case 'price_asc':
                $query->orderBy('prix', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('prix', 'desc');
                break;
            case 'surface_asc':
                $query->orderBy('surface', 'asc');
                break;
            case 'surface_desc':
                $query->orderBy('surface', 'desc');
                break;
            case 'rate_desc':
                $query->orderBy('rate', 'desc');
                break;
            default:
                $query->latest();
                break;
        }

        $houses = $query->get();

        // Passer les paramètres de filtres pour les conserver dans la vue
        $filters = [
            'search' => $request->get('search', ''),
            'type' => $request->get('type', ''),
            'min_price' => $request->get('min_price', ''),
            'max_price' => $request->get('max_price', ''),
            'min_surface' => $request->get('min_surface', ''),
            'sort' => $sort,
        ];

        return view('houses.index', compact('houses', 'filters'));
    }

    /**
     * Afficher le formulaire d'ajout d'une maison
     */
    public function create()
    {
        return view('houses.create');
    }

    /**
     * Stocker une nouvelle maison
     */
    public function store(Request $request)
    {
        // Protection contre les soumissions multiples
        $cacheKey = 'house_submission_' . Auth::id() . '_' . md5($request->input('description') . $request->input('lieu_exact'));
        
        if (Cache::has($cacheKey)) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Cette maison a déjà été soumise récemment. Veuillez patienter.'
                ]);
            }
            return redirect()->back()->with('error', 'Cette maison a déjà été soumise récemment. Veuillez patienter.');
        }
        
        // Mettre en cache pour 30 secondes
        Cache::put($cacheKey, true, 30);
        
        try {
            $validated = $request->validate([
                'description' => 'required|string|max:1000',
                'lieu_exact' => 'required|string|max:255',
                'surface' => 'required|numeric|min:1|max:1000',
                'type' => 'required|in:studio,F1,F2,F3,F4,F5,villa',
                'prix' => 'required|numeric|min:0|max:99999999',
                'price_breakfast' => 'nullable|numeric|min:0|max:99999999',
                'price_love_room' => 'nullable|numeric|min:0|max:99999999',
                'additional_options' => 'nullable|array',
                'additional_options.*.name' => 'required|string|max:255',
                'additional_options.*.price' => 'required|numeric|min:0|max:99999999',
                'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            ]);

            $validated['user_id'] = Auth::id();
            $validated['rate'] = 1; // Valeur par défaut

            // Gérer les options supplémentaires
            $additionalOptions = $request->input('additional_options', []);
            $validatedOptions = [];
            
            if (is_array($additionalOptions) && !empty($additionalOptions)) {
                foreach ($additionalOptions as $option) {
                    if (isset($option['name']) && !empty(trim($option['name'])) && isset($option['price']) && $option['price'] >= 0) {
                        $validatedOptions[] = [
                            'name' => trim($option['name']),
                            'price' => floatval($option['price'])
                        ];
                    }
                }
            }
            
            $validated['additional_options'] = !empty($validatedOptions) ? $validatedOptions : null;

            // Gérer l'upload des photos
            if ($request->hasFile('photos')) {
                $photos = [];
                foreach ($request->file('photos') as $photo) {
                    if ($photo->isValid()) {
                        $filename = time() . '_' . uniqid() . '.' . $photo->getClientOriginalExtension();
                        $path = $photo->storeAs('houses', $filename, 'public');
                        $photos[] = $path;
                    }
                }
                $validated['photos'] = $photos;
            } else {
                // Si aucune photo n'est fournie, mettre un tableau vide
                $validated['photos'] = [];
            }

            $house = House::create($validated);

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Maison ajoutée avec succès !',
                    'house' => $house,
                    'redirect' => route('locataire.dashboard')
                ], 201);
            }

            return redirect()->route('locataire.dashboard')
                ->with('success', 'Maison ajoutée avec succès !');
                
        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Erreur de validation',
                    'errors' => $e->errors()
                ], 422);
            }
            return redirect()->back()->withErrors($e->errors())->withInput();
            
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Erreur lors de la création de la maison: ' . $e->getMessage());
            
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Une erreur est survenue: ' . $e->getMessage()
                ], 500);
            }
            
            return redirect()->back()
                ->with('error', 'Une erreur est survenue lors de l\'ajout de la maison.')
                ->withInput();
        }
    }

    /**
     * Afficher une maison spécifique (accès public)
     */
    public function show(House $house)
    {
        // Charger les relations nécessaires
        $house->load('user');
        
        return view('houses.show', compact('house'));
    }

    /**
     * Afficher le formulaire d'édition
     */
    public function edit(House $house)
    {
        // Vérifier que la maison appartient au locataire connecté
        if ($house->user_id !== Auth::id()) {
            abort(403, 'Accès non autorisé.');
        }

        return view('houses.edit', compact('house'));
    }

    /**
     * Mettre à jour une maison
     */
    public function update(Request $request, House $house)
    {
        // Vérifier que la maison appartient au locataire connecté
        if ($house->user_id !== Auth::id()) {
            abort(403, 'Accès non autorisé.');
        }

        $validated = $request->validate([
            'description' => 'required|string|max:1000',
            'lieu_exact' => 'required|string|max:255',
            'surface' => 'required|numeric|min:1|max:1000',
            'type' => 'required|in:studio,F1,F2,F3,F4,F5',
            'prix' => 'required|numeric|min:0|max:99999999',
            'price_breakfast' => 'nullable|numeric|min:0|max:99999999',
            'price_love_room' => 'nullable|numeric|min:0|max:99999999',
            'additional_options' => 'nullable|array',
            'additional_options.*.name' => 'required|string|max:255',
            'additional_options.*.price' => 'required|numeric|min:0|max:99999999',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Gérer les photos existantes
        $existingPhotos = [];
        if ($request->has('existing_photos')) {
            $existingPhotos = $request->input('existing_photos');
        }

        // Gérer l'upload des nouvelles photos
        if ($request->hasFile('photos')) {
            $newPhotos = [];
            foreach ($request->file('photos') as $photo) {
                if ($photo->isValid()) {
                    $filename = time() . '_' . uniqid() . '.' . $photo->getClientOriginalExtension();
                    $path = $photo->storeAs('houses', $filename, 'public');
                    $newPhotos[] = $path;
                }
            }
            
            // Combiner les photos existantes et nouvelles
            $validated['photos'] = array_merge($existingPhotos, $newPhotos);
        } else {
            $validated['photos'] = $existingPhotos;
        }

        // Supprimer les photos qui ne sont plus dans la liste
        if ($house->photos) {
            foreach ($house->photos as $oldPhoto) {
                if (!in_array($oldPhoto, $validated['photos'])) {
                    if (Storage::disk('public')->exists($oldPhoto)) {
                        Storage::disk('public')->delete($oldPhoto);
                    }
                }
            }
        }

        // Gérer les options supplémentaires
        $additionalOptions = $request->input('additional_options', []);
        $validatedOptions = [];
        
        if (is_array($additionalOptions) && !empty($additionalOptions)) {
            foreach ($additionalOptions as $option) {
                if (isset($option['name']) && !empty(trim($option['name'])) && isset($option['price']) && $option['price'] >= 0) {
                    $validatedOptions[] = [
                        'name' => trim($option['name']),
                        'price' => floatval($option['price'])
                    ];
                }
            }
        }
        
        $validated['additional_options'] = !empty($validatedOptions) ? $validatedOptions : null;

        $house->update($validated);

        // Retourner une réponse JSON si c'est une requête AJAX
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Maison mise à jour avec succès !',
                'house' => $house
            ]);
        }

        return redirect()->route('houses.index')
            ->with('success', 'Maison mise à jour avec succès !');
    }

    /**
     * Supprimer une maison
     */
    public function destroy(House $house)
    {
        // Vérifier que la maison appartient au locataire connecté
        if ($house->user_id !== Auth::id()) {
            abort(403, 'Accès non autorisé.');
        }

        // Supprimer les photos du stockage
        if ($house->photos) {
            foreach ($house->photos as $photo) {
                if (Storage::disk('public')->exists($photo)) {
                    Storage::disk('public')->delete($photo);
                }
            }
        }

        $house->delete();

        return redirect()->route('houses.index')
            ->with('success', 'Maison supprimée avec succès !');
    }
}
