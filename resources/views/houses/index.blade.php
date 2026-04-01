<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Nos Biens - Découvrez nos propriétés exceptionnelles</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">
    
    <!-- Airbnb-like Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cereal:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Navigation Enhancements -->
    <link rel="stylesheet" href="{{ asset('css/navigation-enhancements.css') }}">
    
    <style>
        /* Airbnb Color Palette - Identique à la page d'accueil */
        :root {
            --airbnb-pink: #FF385C;
            --airbnb-black: #222222;
            --airbnb-dark-gray: #717171;
            --airbnb-light-gray: #DDDDDD;
            --airbnb-bg-gray: #F7F7F7;
            --airbnb-white: #FFFFFF;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Cereal', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        
        html {
            scroll-behavior: smooth;
        }
        
        body {
            color: var(--airbnb-black);
            line-height: 1.5;
            background-color: var(--airbnb-white);
            overflow-x: hidden;
            padding-top: 80px;
        }
        
        .container {
            width: 100%;
            max-width: 1760px;
            margin: 0 auto;
            padding: 0 80px;
        }
        
        /* Header identique à la page d'accueil */
        header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 80px;
            padding: 0 2.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            background-color: var(--airbnb-white);
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            transition: all 0.3s ease;
        }
        
        header.scrolled {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
            backdrop-filter: blur(10px);
        }
        
        .logo {
            color: var(--airbnb-pink);
            text-decoration: none;
            display: flex;
            align-items: center;
            flex-shrink: 0;
            gap: 0;
            transition: opacity 0.3s ease;
            border: none;
            box-shadow: none;
            background: transparent;
        }
        
        .logo:hover {
            opacity: 0.92;
        }
        
        .logo img {
            height: 2.5rem;
            width: auto;
            object-fit: contain;
            object-position: left center;
            display: block;
            border: none;
            box-shadow: none;
            background: transparent;
        }
        
        @media (min-width: 768px) {
            .logo img {
                height: 3rem;
            }
        }
        
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--airbnb-dark-gray);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            padding: 10px 16px;
            border-radius: 22px;
            transition: all 0.3s ease;
        }
        
        .back-link:hover {
            background-color: var(--airbnb-bg-gray);
            color: var(--airbnb-pink);
        }
        
        /* Hero Section avec recherche */
        .hero-section {
            padding: 60px 0 40px;
            background: linear-gradient(180deg, #ffffff 0%, #fafafa 100%);
            border-bottom: 1px solid var(--airbnb-light-gray);
        }
        
        .page-title {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .page-title .sub-title {
            color: var(--airbnb-pink);
            font-size: 14px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            display: block;
            margin-bottom: 12px;
        }
        
        .page-title h1 {
            font-size: 48px;
            font-weight: 700;
            color: var(--airbnb-black);
            margin-bottom: 16px;
            line-height: 1.2;
        }
        
        .page-title p {
            color: var(--airbnb-dark-gray);
            font-size: 18px;
            max-width: 700px;
            margin: 0 auto;
        }
        
        /* Filtres Section - Style Airbnb */
        .filters-section {
            background: var(--airbnb-white);
            border-radius: 20px;
            padding: 32px;
            margin: 40px 0;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            border: 1px solid var(--airbnb-light-gray);
        }
        
        .filters-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
            cursor: pointer;
        }
        
        .filters-title {
            font-size: 22px;
            font-weight: 700;
            color: var(--airbnb-black);
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .filters-title i {
            color: var(--airbnb-pink);
            font-size: 20px;
        }
        
        .filters-toggle {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            background: var(--airbnb-bg-gray);
            border-radius: 22px;
            font-size: 14px;
            font-weight: 500;
            color: var(--airbnb-dark-gray);
            transition: all 0.2s ease;
            border: none;
            cursor: pointer;
        }
        
        .filters-toggle:hover {
            background: var(--airbnb-light-gray);
        }
        
        .filters-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 24px;
            transition: all 0.3s ease;
        }
        
        .filters-content.collapsed {
            display: none;
        }
        
        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        
        .filter-label {
            font-size: 12px;
            font-weight: 600;
            color: var(--airbnb-dark-gray);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .filter-input,
        .filter-select {
            padding: 12px 16px;
            border: 1px solid var(--airbnb-light-gray);
            border-radius: 12px;
            font-size: 14px;
            font-weight: 500;
            color: var(--airbnb-black);
            background: var(--airbnb-white);
            transition: all 0.2s ease;
            font-family: inherit;
        }
        
        .filter-input:focus,
        .filter-select:focus {
            outline: none;
            border-color: var(--airbnb-black);
            box-shadow: 0 0 0 2px rgba(34, 34, 34, 0.1);
        }
        
        .search-input-wrapper {
            position: relative;
            grid-column: 1 / -1;
        }
        
        .search-input-wrapper i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--airbnb-dark-gray);
            font-size: 14px;
        }
        
        .search-input-wrapper .filter-input {
            padding-left: 44px;
        }
        
        /* Active Filters Tags */
        .active-filters {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 24px;
            min-height: 32px;
        }
        
        .filter-tag {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 6px 12px;
            background: var(--airbnb-pink);
            color: white;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            animation: scaleIn 0.2s ease-out;
        }
        
        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        .filter-tag i {
            font-size: 10px;
            cursor: pointer;
            transition: transform 0.2s ease;
        }
        
        .filter-tag i:hover {
            transform: scale(1.2);
        }
        
        .filters-actions {
            display: flex;
            gap: 12px;
            justify-content: flex-end;
            flex-wrap: wrap;
            padding-top: 24px;
            border-top: 1px solid var(--airbnb-light-gray);
        }
        
        .btn {
            padding: 12px 24px;
            border-radius: 22px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.2s ease;
            border: none;
            display: flex;
            align-items: center;
            gap: 8px;
            font-family: inherit;
            text-decoration: none;
        }
        
        .btn-primary {
            background: var(--airbnb-pink);
            color: white;
        }
        
        .btn-primary:hover {
            background: #e61e4d;
            box-shadow: 0 4px 12px rgba(255, 56, 92, 0.3);
        }
        
        .btn-secondary {
            background: var(--airbnb-bg-gray);
            color: var(--airbnb-black);
            border: 1px solid var(--airbnb-light-gray);
        }
        
        .btn-secondary:hover {
            background: var(--airbnb-light-gray);
        }
        
        /* Results Header */
        .results-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 40px 0 32px;
            flex-wrap: wrap;
            gap: 20px;
        }
        
        .results-count {
            font-size: 18px;
            font-weight: 600;
            color: var(--airbnb-black);
        }
        
        .results-count span {
            color: var(--airbnb-pink);
            font-size: 22px;
        }
        
        .view-controls {
            display: flex;
            gap: 16px;
            align-items: center;
        }
        
        .view-toggle {
            display: flex;
            gap: 4px;
            background: var(--airbnb-bg-gray);
            padding: 4px;
            border-radius: 22px;
        }
        
        .view-btn {
            padding: 8px 16px;
            border: none;
            background: transparent;
            border-radius: 18px;
            cursor: pointer;
            color: var(--airbnb-dark-gray);
            font-size: 14px;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 6px;
            font-weight: 500;
        }
        
        .view-btn.active {
            background: var(--airbnb-white);
            color: var(--airbnb-black);
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        
        .sort-group {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .sort-label {
            font-size: 14px;
            font-weight: 500;
            color: var(--airbnb-dark-gray);
        }
        
        .sort-select {
            padding: 10px 16px;
            border: 1px solid var(--airbnb-light-gray);
            border-radius: 12px;
            font-size: 14px;
            font-weight: 500;
            color: var(--airbnb-black);
            background: var(--airbnb-white);
            cursor: pointer;
            transition: all 0.2s ease;
            font-family: inherit;
        }
        
        .sort-select:focus {
            outline: none;
            border-color: var(--airbnb-black);
            box-shadow: 0 0 0 2px rgba(34, 34, 34, 0.1);
        }
        
        /* Properties Grid - Style identique à la page d'accueil */
        .properties-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
            gap: 40px;
            margin-bottom: 80px;
        }
        
        .properties-grid.list-view {
            grid-template-columns: 1fr;
            gap: 24px;
        }
        
        .property-card {
            background: var(--airbnb-white);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            border: 1px solid var(--airbnb-light-gray);
            transition: all 0.3s ease;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
            display: block;
            opacity: 0;
            animation: fadeInUp 0.5s ease-out forwards;
        }
        
        .property-card:nth-child(1) { animation-delay: 0.1s; }
        .property-card:nth-child(2) { animation-delay: 0.2s; }
        .property-card:nth-child(3) { animation-delay: 0.3s; }
        .property-card:nth-child(4) { animation-delay: 0.4s; }
        .property-card:nth-child(5) { animation-delay: 0.5s; }
        .property-card:nth-child(6) { animation-delay: 0.6s; }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .property-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        }
        
        .property-card.list-view {
            display: flex;
            flex-direction: row;
            max-height: 280px;
        }
        
        .property-image-wrapper {
            position: relative;
            width: 100%;
            height: 300px;
            overflow: hidden;
            background: var(--airbnb-bg-gray);
        }
        
        .property-card.list-view .property-image-wrapper {
            width: 400px;
            height: 100%;
            flex-shrink: 0;
        }
        
        .property-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .property-card:hover .property-image {
            transform: scale(1.05);
        }
        
        .property-badge {
            position: absolute;
            top: 16px;
            left: 16px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            color: var(--airbnb-black);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        
        .property-rating {
            position: absolute;
            top: 16px;
            right: 16px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            color: var(--airbnb-black);
            display: flex;
            align-items: center;
            gap: 4px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        
        .property-rating i {
            color: #FFD700;
            font-size: 12px;
        }
        
        .property-content {
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }
        
        .property-card.list-view .property-content {
            padding: 24px;
        }
        
        .property-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 10px;
        }
        
        .property-location {
            font-size: 16px;
            font-weight: 600;
            color: var(--airbnb-black);
            margin: 0;
            flex: 1;
        }
        
        .property-description {
            color: var(--airbnb-dark-gray);
            font-size: 14px;
            margin: 8px 0 16px;
            line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .property-card.list-view .property-description {
            -webkit-line-clamp: 3;
        }
        
        .property-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 16px;
            border-top: 1px solid var(--airbnb-light-gray);
            margin-top: auto;
        }
        
        .property-price {
            font-size: 22px;
            font-weight: 700;
            color: var(--airbnb-black);
        }
        
        .property-price-unit {
            font-size: 14px;
            font-weight: 400;
            color: var(--airbnb-dark-gray);
        }
        
        .btn-discover {
            padding: 10px 20px;
            background: var(--airbnb-pink);
            color: white;
            border-radius: 22px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: none;
            cursor: pointer;
        }
        
        .btn-discover:hover {
            background: #e61e4d;
            box-shadow: 0 4px 12px rgba(255, 56, 92, 0.3);
        }
        
        .btn-discover.secondary {
            background: var(--airbnb-bg-gray);
            color: var(--airbnb-black);
        }
        
        .btn-discover.secondary:hover {
            background: var(--airbnb-light-gray);
            box-shadow: none;
        }
        
        /* Empty State */
        .empty-state {
            background: var(--airbnb-white);
            border-radius: 20px;
            padding: 100px 40px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            border: 1px solid var(--airbnb-light-gray);
            margin: 40px 0;
        }
        
        .empty-icon {
            font-size: 80px;
            margin-bottom: 32px;
            opacity: 0.3;
        }
        
        .empty-title {
            font-size: 28px;
            font-weight: 700;
            color: var(--airbnb-black);
            margin-bottom: 16px;
        }
        
        .empty-desc {
            font-size: 16px;
            color: var(--airbnb-dark-gray);
            margin-bottom: 32px;
            line-height: 1.6;
        }
        
        /* Scroll to Top */
        .scroll-top {
            position: fixed;
            bottom: 32px;
            right: 32px;
            width: 48px;
            height: 48px;
            background: var(--airbnb-pink);
            color: white;
            border: none;
            border-radius: 50%;
            font-size: 18px;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(255, 56, 92, 0.4);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 999;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .scroll-top.visible {
            opacity: 1;
            visibility: visible;
        }
        
        .scroll-top:hover {
            background: #e61e4d;
            transform: translateY(-4px);
            box-shadow: 0 6px 20px rgba(255, 56, 92, 0.5);
        }
        
        /* Responsive */
        @media (max-width: 1200px) {
            .container {
                padding: 0 40px;
            }
            
            .properties-grid {
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
                gap: 32px;
            }
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 0 20px;
            }
            
            header {
                padding: 0 1.5rem;
            }
            
            .page-title h1 {
                font-size: 32px;
            }
            
            .filters-section {
                padding: 24px;
            }
            
            .filters-content {
                grid-template-columns: 1fr;
            }
            
            .properties-grid {
                grid-template-columns: 1fr;
            }
            
            .property-card.list-view {
                flex-direction: column;
                max-height: none;
            }
            
            .property-card.list-view .property-image-wrapper {
                width: 100%;
                height: 250px;
            }
            
            .results-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .scroll-top {
                bottom: 20px;
                right: 20px;
                width: 44px;
                height: 44px;
            }
        }
    </style>
</head>
<body>
    <!-- Header identique à la page d'accueil -->
    <header id="header">
        <a href="{{ route('welcome') }}" class="logo" title="Casa Del Concierge — Accueil">
            <img src="{{ asset('images/logo.png') }}" alt="Casa Del Concierge" loading="eager" decoding="async">
        </a>
        <a href="{{ route('welcome') }}" class="back-link">
            <i class="fas fa-arrow-left"></i>
            Retour à l'accueil
        </a>
    </header>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="page-title">
                <span class="sub-title">Nos Propriétés</span>
                <h1>Découvrez nos biens exceptionnels</h1>
                <p>Trouvez le logement parfait pour votre séjour parmi notre sélection de propriétés premium</p>
            </div>
        </div>
    </section>

    <!-- Container Principal -->
    <div class="container">
        <!-- Filtres Section -->
        <div class="filters-section">
            <div class="filters-header" onclick="toggleFilters()">
                <h2 class="filters-title">
                    <i class="fas fa-filter"></i>
                    Filtres de recherche
                </h2>
                <button type="button" class="filters-toggle" id="filtersToggle">
                    <i class="fas fa-chevron-down" id="filtersIcon"></i>
                    <span>Masquer</span>
                </button>
            </div>
            
            <form method="GET" action="{{ route('houses.index') }}" id="filtersForm">
                <div class="filters-content" id="filtersContent">
                    <!-- Recherche -->
                    <div class="search-input-wrapper filter-group">
                        <label class="filter-label">Rechercher</label>
                        <i class="fas fa-search"></i>
                        <input 
                            type="text" 
                            name="search" 
                            id="searchInput"
                            class="filter-input" 
                            placeholder="Lieu, description..."
                            value="{{ $filters['search'] }}"
                            autocomplete="off"
                        >
                    </div>

                    <!-- Type -->
                    <div class="filter-group">
                        <label class="filter-label">Type</label>
                        <select name="type" class="filter-select" id="typeSelect">
                            <option value="">Tous les types</option>
                            <option value="studio" {{ $filters['type'] == 'studio' ? 'selected' : '' }}>Studio</option>
                            <option value="F1" {{ $filters['type'] == 'F1' ? 'selected' : '' }}>F1</option>
                            <option value="F2" {{ $filters['type'] == 'F2' ? 'selected' : '' }}>F2</option>
                            <option value="F3" {{ $filters['type'] == 'F3' ? 'selected' : '' }}>F3</option>
                            <option value="F4" {{ $filters['type'] == 'F4' ? 'selected' : '' }}>F4</option>
                            <option value="F5" {{ $filters['type'] == 'F5' ? 'selected' : '' }}>F5</option>
                            <option value="villa" {{ $filters['type'] == 'villa' ? 'selected' : '' }}>Villa</option>
                        </select>
                    </div>

                    <!-- Prix Minimum -->
                    <div class="filter-group">
                        <label class="filter-label">Prix min (€)</label>
                        <input 
                            type="number" 
                            name="min_price" 
                            class="filter-input" 
                            placeholder="0"
                            min="0"
                            value="{{ $filters['min_price'] }}"
                        >
                    </div>

                    <!-- Prix Maximum -->
                    <div class="filter-group">
                        <label class="filter-label">Prix max (€)</label>
                        <input 
                            type="number" 
                            name="max_price" 
                            class="filter-input" 
                            placeholder="10000"
                            min="0"
                            value="{{ $filters['max_price'] }}"
                        >
                    </div>

                    <!-- Surface Minimum -->
                    <div class="filter-group">
                        <label class="filter-label">Surface min (m²)</label>
                        <input 
                            type="number" 
                            name="min_surface" 
                            class="filter-input" 
                            placeholder="0"
                            min="0"
                            value="{{ $filters['min_surface'] }}"
                        >
                    </div>
                </div>

                <!-- Active Filters -->
                <div class="active-filters" id="activeFilters"></div>

                <div class="filters-actions">
                    <button type="button" class="btn btn-secondary" onclick="resetFilters()">
                        <i class="fas fa-redo"></i>
                        Réinitialiser
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                        Rechercher
                    </button>
                </div>
            </form>
        </div>

        <!-- Results Header -->
        <div class="results-header">
            <div class="results-count">
                <span>{{ $houses->count() }}</span> bien{{ $houses->count() > 1 ? 's' : '' }} trouvé{{ $houses->count() > 1 ? 's' : '' }}
            </div>
            <div class="view-controls">
                <div class="view-toggle">
                    <button class="view-btn active" onclick="setView('grid')" data-view="grid">
                        <i class="fas fa-th"></i>
                        Grille
                    </button>
                    <button class="view-btn" onclick="setView('list')" data-view="list">
                        <i class="fas fa-list"></i>
                        Liste
                    </button>
                </div>
                <div class="sort-group">
                    <label class="sort-label">Trier par :</label>
                    <select name="sort" class="sort-select" id="sortSelect" onchange="updateSort()">
                        <option value="latest" {{ $filters['sort'] == 'latest' ? 'selected' : '' }}>Plus récent</option>
                        <option value="price_asc" {{ $filters['sort'] == 'price_asc' ? 'selected' : '' }}>Prix croissant</option>
                        <option value="price_desc" {{ $filters['sort'] == 'price_desc' ? 'selected' : '' }}>Prix décroissant</option>
                        <option value="surface_asc" {{ $filters['sort'] == 'surface_asc' ? 'selected' : '' }}>Surface croissante</option>
                        <option value="surface_desc" {{ $filters['sort'] == 'surface_desc' ? 'selected' : '' }}>Surface décroissante</option>
                        <option value="rate_desc" {{ $filters['sort'] == 'rate_desc' ? 'selected' : '' }}>Meilleure note</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Properties Grid -->
        @if($houses->count() > 0)
            <div class="properties-grid" id="propertiesGrid">
                @foreach($houses as $index => $house)
                    <a href="{{ route('houses.show', $house) }}" class="property-card" style="animation-delay: {{ ($index % 6) * 0.1 }}s">
                        <div class="property-image-wrapper">
                            @if($house->hasPhotos())
                                <img src="{{ asset('storage/' . $house->first_photo) }}" alt="{{ $house->description }}" class="property-image" loading="lazy">
                            @else
                                <div class="property-image" style="display: flex; align-items: center; justify-content: center; font-size: 64px; color: #DDDDDD;">
                                    <i class="fas fa-home"></i>
                                </div>
                            @endif
                            <div class="property-badge">{{ ucfirst($house->type) }}</div>
                            @if($house->rate)
                            <div class="property-rating">
                                <i class="fas fa-star"></i>
                                {{ number_format($house->rate, 1) }}
                            </div>
                            @endif
                        </div>
                        <div class="property-content">
                            <div class="property-header">
                                <h3 class="property-location">{{ Str::limit($house->lieu_exact, 40) }}</h3>
                            </div>
                            <p class="property-description">{{ Str::limit($house->description, 100) }}</p>
                            <div class="property-footer">
                                <div class="property-price">
                                    {{ number_format($house->prix, 0, ',', ' ') }} €<span class="property-price-unit">/nuit</span>
                                </div>
                                <div style="display: flex; gap: 8px; align-items: center;">
                                    <span style="font-size: 12px; color: var(--airbnb-dark-gray);">{{ number_format($house->surface, 0) }} m²</span>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="empty-state">
                <div class="empty-icon">🏠</div>
                <h2 class="empty-title">Aucun bien trouvé</h2>
                <p class="empty-desc">
                    Aucun bien ne correspond à vos critères de recherche.<br>
                    Essayez de modifier vos filtres pour voir plus de résultats.
                </p>
                <button type="button" class="btn btn-primary" onclick="resetFilters()">
                    <i class="fas fa-redo"></i>
                    Réinitialiser les filtres
                </button>
            </div>
        @endif
    </div>

    <!-- Scroll to Top Button -->
    <button class="scroll-top" id="scrollTop" onclick="scrollToTop()">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script>
        // View Toggle
        function setView(view) {
            const grid = document.getElementById('propertiesGrid');
            const cards = document.querySelectorAll('.property-card');
            const buttons = document.querySelectorAll('.view-btn');
            
            buttons.forEach(btn => {
                btn.classList.toggle('active', btn.dataset.view === view);
            });
            
            grid.classList.toggle('list-view', view === 'list');
            cards.forEach(card => {
                card.classList.toggle('list-view', view === 'list');
            });
            
            localStorage.setItem('housesView', view);
        }

        // Load saved view
        const savedView = localStorage.getItem('housesView') || 'grid';
        if (savedView === 'list') {
            setTimeout(() => setView('list'), 100);
        }

        // Filters Toggle
        let filtersExpanded = true;
        function toggleFilters() {
            const content = document.getElementById('filtersContent');
            const icon = document.getElementById('filtersIcon');
            const toggle = document.getElementById('filtersToggle');
            
            filtersExpanded = !filtersExpanded;
            content.classList.toggle('collapsed', !filtersExpanded);
            icon.style.transform = filtersExpanded ? 'rotate(0deg)' : 'rotate(180deg)';
            toggle.querySelector('span').textContent = filtersExpanded ? 'Masquer' : 'Afficher';
        }

        // Update Active Filters
        function updateActiveFilters() {
            const container = document.getElementById('activeFilters');
            const form = document.getElementById('filtersForm');
            const formData = new FormData(form);
            container.innerHTML = '';
            
            if (formData.get('search')) {
                container.innerHTML += `
                    <div class="filter-tag">
                        Recherche: "${formData.get('search')}"
                        <i class="fas fa-times" onclick="removeFilter('search')"></i>
                    </div>
                `;
            }
            
            if (formData.get('type')) {
                const typeNames = {
                    'studio': 'Studio',
                    'F1': 'F1',
                    'F2': 'F2',
                    'F3': 'F3',
                    'F4': 'F4',
                    'F5': 'F5',
                    'villa': 'Villa'
                };
                container.innerHTML += `
                    <div class="filter-tag">
                        Type: ${typeNames[formData.get('type')]}
                        <i class="fas fa-times" onclick="removeFilter('type')"></i>
                    </div>
                `;
            }
            
            if (formData.get('min_price')) {
                container.innerHTML += `
                    <div class="filter-tag">
                        Prix min: ${formData.get('min_price')}€
                        <i class="fas fa-times" onclick="removeFilter('min_price')"></i>
                    </div>
                `;
            }
            
            if (formData.get('max_price')) {
                container.innerHTML += `
                    <div class="filter-tag">
                        Prix max: ${formData.get('max_price')}€
                        <i class="fas fa-times" onclick="removeFilter('max_price')"></i>
                    </div>
                `;
            }
            
            if (formData.get('min_surface')) {
                container.innerHTML += `
                    <div class="filter-tag">
                        Surface min: ${formData.get('min_surface')}m²
                        <i class="fas fa-times" onclick="removeFilter('min_surface')"></i>
                    </div>
                `;
            }
        }

        function removeFilter(filterName) {
            const input = document.querySelector(`[name="${filterName}"]`);
            if (input) {
                input.value = '';
                document.getElementById('filtersForm').submit();
            }
        }

        // Update Sort
        function updateSort() {
            const sortValue = document.getElementById('sortSelect').value;
            const form = document.getElementById('filtersForm');
            const sortInput = document.createElement('input');
            sortInput.type = 'hidden';
            sortInput.name = 'sort';
            sortInput.value = sortValue;
            form.appendChild(sortInput);
            form.submit();
        }

        // Reset Filters
        function resetFilters() {
            window.location.href = '{{ route("houses.index") }}';
        }

        // Search Debounce
        let searchTimeout;
        document.getElementById('searchInput')?.addEventListener('input', function(e) {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                updateActiveFilters();
            }, 500);
        });

        // Auto-submit on filter change
        document.querySelectorAll('.filter-select').forEach(select => {
            select.addEventListener('change', function() {
                updateActiveFilters();
                document.getElementById('filtersForm').submit();
            });
        });

        // Header Scroll Effect
        window.addEventListener('scroll', () => {
            const header = document.getElementById('header');
            if (window.pageYOffset > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
            
            // Scroll to top button
            const scrollTop = document.getElementById('scrollTop');
            if (window.pageYOffset > 300) {
                scrollTop.classList.add('visible');
            } else {
                scrollTop.classList.remove('visible');
            }
        });

        // Scroll to Top
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', () => {
            updateActiveFilters();
        });
    </script>
    
    <!-- Navigation Enhancements -->
    <script src="{{ asset('js/navigation-enhancements.js') }}"></script>
</body>
</html>
