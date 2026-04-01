<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajouter une Maison - Casa Del Concierge</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] min-h-screen">
    <!-- Header -->
    <header class="bg-white dark:bg-[#161615] shadow-sm border-b border-[#e3e3e0] dark:border-[#3E3E3A]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center gap-3">
                    <a href="{{ url('/') }}" class="shrink-0" title="Casa Del Concierge — Accueil">
                        <img src="{{ asset('images/logo.png') }}" alt="Casa Del Concierge" class="h-10 w-auto max-h-[40px] object-contain">
                    </a>
                    <h1 class="text-xl font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">Ajouter une Maison</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-[#706f6c] dark:text-[#A1A09A]">
                        {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                    </span>
                    <a href="{{ route('houses.index') }}" class="text-[#f53003] dark:text-[#FF4433] hover:underline">
                        Mes Maisons
                    </a>
                    <form method="POST" action="{{ route('locataire.logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="bg-[#dc3545] hover:bg-[#c82333] text-white px-4 py-2 rounded-lg transition-colors duration-200">
                            Déconnexion
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white dark:bg-[#161615] rounded-lg shadow-lg p-8">
            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-2">Nouvelle maison</h2>
                <p class="text-[#706f6c] dark:text-[#A1A09A]">Remplissez les informations de votre bien immobilier</p>
            </div>

            @if ($errors->any())
                <div class="bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 text-red-700 dark:text-red-400 px-4 py-3 rounded mb-6">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('houses.store') }}" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Description -->
                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                            Description détaillée *
                        </label>
                        <textarea 
                            id="description" 
                            name="description" 
                            rows="4"
                            class="w-full px-4 py-3 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-lg focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] focus:border-transparent bg-white dark:bg-[#161615] text-[#1b1b18] dark:text-[#EDEDEC]"
                            placeholder="Décrivez votre bien en détail..."
                            required
                        >{{ old('description') }}</textarea>
                    </div>

                    <!-- Lieu exact -->
                    <div>
                        <label for="lieu_exact" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                            Lieu exact *
                        </label>
                        <input 
                            type="text" 
                            id="lieu_exact" 
                            name="lieu_exact" 
                            value="{{ old('lieu_exact') }}"
                            class="w-full px-4 py-3 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-lg focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] focus:border-transparent bg-white dark:bg-[#161615] text-[#1b1b18] dark:text-[#EDEDEC]"
                            placeholder="Adresse complète"
                            required
                        >
                    </div>

                    <!-- Surface -->
                    <div>
                        <label for="surface" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                            Surface (m²) *
                        </label>
                        <input 
                            type="number" 
                            id="surface" 
                            name="surface" 
                            value="{{ old('surface') }}"
                            step="0.01"
                            min="1"
                            max="1000"
                            class="w-full px-4 py-3 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-lg focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] focus:border-transparent bg-white dark:bg-[#161615] text-[#1b1b18] dark:text-[#EDEDEC]"
                            placeholder="Ex: 45.5"
                            required
                        >
                    </div>

                    <!-- Type -->
                    <div>
                        <label for="type" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                            Type de logement *
                        </label>
                        <select 
                            id="type" 
                            name="type" 
                            class="w-full px-4 py-3 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-lg focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] focus:border-transparent bg-white dark:bg-[#161615] text-[#1b1b18] dark:text-[#EDEDEC]"
                            required
                        >
                            <option value="">Sélectionnez un type</option>
                            <option value="studio" {{ old('type') == 'studio' ? 'selected' : '' }}>Studio</option>
                            <option value="F1" {{ old('type') == 'F1' ? 'selected' : '' }}>F1 (1 pièce)</option>
                            <option value="F2" {{ old('type') == 'F2' ? 'selected' : '' }}>F2 (2 pièces)</option>
                            <option value="F3" {{ old('type') == 'F3' ? 'selected' : '' }}>F3 (3 pièces)</option>
                            <option value="F4" {{ old('type') == 'F4' ? 'selected' : '' }}>F4 (4 pièces)</option>
                            <option value="F5" {{ old('type') == 'F5' ? 'selected' : '' }}>F5 (5 pièces)</option>
                        </select>
                    </div>

                    <!-- Prix -->
                    <div>
                        <label for="prix" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                            Prix (€) *
                        </label>
                        <input 
                            type="number" 
                            id="prix" 
                            name="prix" 
                            value="{{ old('prix') }}"
                            step="0.01"
                            min="0"
                            max="100000"
                            class="w-full px-4 py-3 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-lg focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] focus:border-transparent bg-white dark:bg-[#161615] text-[#1b1b18] dark:text-[#EDEDEC]"
                            placeholder="Ex: 850.00"
                            required
                        >
                    </div>

                    <!-- Rate -->
                    <div>
                        <label for="rate" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                            Note sur 5 *
                        </label>
                        <input 
                            type="number" 
                            id="rate" 
                            name="rate" 
                            value="{{ old('rate') }}"
                            step="0.1"
                            min="0"
                            max="5"
                            class="w-full px-4 py-3 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-lg focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] focus:border-transparent bg-white dark:bg-[#161615] text-[#1b1b18] dark:text-[#EDEDEC]"
                            placeholder="Ex: 4.5"
                            required
                        >
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex justify-end space-x-4 pt-6 border-t border-[#e3e3e0] dark:border-[#3E3E3A]">
                    <a href="{{ route('houses.index') }}" class="px-6 py-3 border border-[#e3e3e0] dark:border-[#3E3E3A] text-[#1b1b18] dark:text-[#EDEDEC] rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors duration-200">
                        Annuler
                    </a>
                    <button 
                        type="submit" 
                        class="bg-[#f53003] dark:bg-[#FF4433] text-white px-6 py-3 rounded-lg hover:bg-[#d42a02] dark:hover:bg-[#e63d2a] transition-colors duration-200"
                    >
                        Ajouter la maison
                    </button>
                </div>
            </form>
        </div>

        <!-- Back to Houses -->
        <div class="text-center mt-8">
            <a href="{{ route('houses.index') }}" class="inline-flex items-center text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors duration-200">
                <span class="mr-2">←</span>
                Retour à mes maisons
            </a>
        </div>
    </main>
</body>
</html>
