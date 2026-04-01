<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $house->description }} - Casa Del Concierge</title>
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
            line-height: 1.6;
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
            padding: 0 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
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
            gap: 8px;
            transition: transform 0.3s ease;
        }
        
        .logo:hover {
            transform: scale(1.02);
            opacity: 0.92;
        }
        
        .logo img {
            height: 2.5rem;
            width: auto;
            max-height: 48px;
            object-fit: contain;
            display: block;
        }
        
        @media (max-width: 768px) {
            .logo img {
                height: 2rem;
                max-height: 40px;
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
        
        /* Page Header */
        .page-header {
            margin: 40px 0 30px;
            padding: 20px 0;
        }
        
        /* Galerie de photos Premium */
        .photo-gallery {
            margin-bottom: 60px;
            border-radius: 20px;
            overflow: hidden;
            position: relative;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        
        .gallery-main {
            position: relative;
            width: 100%;
            height: 600px;
            overflow: hidden;
            background: var(--airbnb-bg-gray);
        }
        
        .main-photo {
            width: 100%;
            height: 100%;
            object-fit: cover;
            cursor: pointer;
            transition: transform 0.5s ease;
        }
        
        .main-photo:hover {
            transform: scale(1.02);
        }
        
        .gallery-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.5));
            padding: 30px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .gallery-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .gallery-count {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
        }
        
        .view-all-photos {
            background: rgba(255, 255, 255, 0.95);
            color: var(--airbnb-black);
            padding: 10px 20px;
            border-radius: 22px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .view-all-photos:hover {
            background: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        
        .photo-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 8px;
            margin-top: 8px;
        }
        
        .photo-grid img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        
        .photo-grid img:hover {
            transform: scale(1.05);
            border-color: var(--airbnb-pink);
        }
        
        /* Contenu principal */
        .main-content {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 80px;
            margin-bottom: 100px;
        }
        
        .property-info {
            flex: 1;
        }
        
        .property-header {
            margin-bottom: 40px;
            padding-bottom: 30px;
            border-bottom: 1px solid var(--airbnb-light-gray);
        }
        
        .property-title {
            font-size: 42px;
            font-weight: 700;
            color: var(--airbnb-black);
            margin-bottom: 16px;
            line-height: 1.2;
            letter-spacing: -0.5px;
        }
        
        .property-location {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--airbnb-dark-gray);
            font-size: 16px;
            margin-bottom: 24px;
            font-weight: 500;
        }
        
        .property-location i {
            color: var(--airbnb-pink);
            font-size: 18px;
        }
        
        .property-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 24px;
            margin-top: 24px;
        }
        
        .meta-item {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--airbnb-dark-gray);
            font-size: 15px;
            font-weight: 500;
            padding: 10px 16px;
            background: var(--airbnb-bg-gray);
            border-radius: 20px;
        }
        
        .meta-item i {
            color: var(--airbnb-pink);
            font-size: 16px;
        }
        
        .property-description {
            margin-bottom: 50px;
        }
        
        .section-title {
            font-size: 28px;
            font-weight: 700;
            color: var(--airbnb-black);
            margin-bottom: 24px;
            letter-spacing: -0.3px;
        }
        
        .description-text {
            font-size: 17px;
            color: var(--airbnb-black);
            line-height: 1.8;
            white-space: pre-wrap;
        }
        
        .property-details {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
            margin-bottom: 50px;
        }
        
        .detail-card {
            background: linear-gradient(135deg, #ffffff 0%, #fafafa 100%);
            padding: 28px;
            border-radius: 16px;
            border: 1px solid var(--airbnb-light-gray);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .detail-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: var(--airbnb-pink);
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }
        
        .detail-card:hover {
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            transform: translateY(-2px);
        }
        
        .detail-card:hover::before {
            transform: scaleY(1);
        }
        
        .detail-label {
            font-size: 12px;
            color: var(--airbnb-dark-gray);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 12px;
            font-weight: 600;
        }
        
        .detail-value {
            font-size: 24px;
            font-weight: 700;
            color: var(--airbnb-black);
        }
        
        .options-section {
            margin-bottom: 50px;
        }
        
        .options-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }
        
        .option-card {
            background: var(--airbnb-white);
            border: 2px solid var(--airbnb-light-gray);
            border-radius: 16px;
            padding: 24px;
            display: flex;
            align-items: center;
            gap: 18px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .option-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--airbnb-pink);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }
        
        .option-card:hover {
            border-color: var(--airbnb-pink);
            box-shadow: 0 8px 24px rgba(255, 56, 92, 0.15);
            transform: translateY(-2px);
        }
        
        .option-card:hover::before {
            transform: scaleX(1);
        }
        
        .option-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, rgba(255, 56, 92, 0.1) 0%, rgba(255, 56, 92, 0.05) 100%);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--airbnb-pink);
            font-size: 28px;
            flex-shrink: 0;
        }
        
        .option-info {
            flex: 1;
        }
        
        .option-name {
            font-size: 18px;
            font-weight: 600;
            color: var(--airbnb-black);
            margin-bottom: 6px;
        }
        
        .option-price {
            font-size: 15px;
            color: var(--airbnb-dark-gray);
            font-weight: 500;
        }
        
        /* Sidebar de réservation Premium */
        .reservation-sidebar {
            position: sticky;
            top: 100px;
            height: fit-content;
        }
        
        .reservation-card {
            background: var(--airbnb-white);
            border: 1px solid var(--airbnb-light-gray);
            border-radius: 20px;
            padding: 32px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            position: relative;
            overflow: hidden;
        }
        
        .reservation-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--airbnb-pink) 0%, #e61e4d 100%);
        }
        
        .price-section {
            margin-bottom: 32px;
        }
        
        .price-amount {
            font-size: 32px;
            font-weight: 700;
            color: var(--airbnb-black);
            margin-bottom: 6px;
            letter-spacing: -0.5px;
        }
        
        .price-period {
            font-size: 15px;
            color: var(--airbnb-dark-gray);
            font-weight: 500;
        }
        
        .rating-section {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 32px;
            padding-bottom: 32px;
            border-bottom: 1px solid var(--airbnb-light-gray);
        }
        
        .rating-stars {
            display: flex;
            gap: 3px;
        }
        
        .rating-stars i {
            color: #FFD700;
            font-size: 16px;
        }
        
        .rating-value {
            font-weight: 700;
            color: var(--airbnb-black);
            font-size: 16px;
        }
        
        .rating-count {
            color: var(--airbnb-dark-gray);
            font-size: 14px;
        }
        
        .reservation-btn {
            width: 100%;
            background: linear-gradient(135deg, var(--airbnb-pink) 0%, #e61e4d 100%);
            color: white;
            border: none;
            border-radius: 14px;
            padding: 18px 24px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            box-shadow: 0 4px 15px rgba(255, 56, 92, 0.3);
            margin-bottom: 24px;
            text-decoration: none;
            font-family: inherit;
        }
        
        .reservation-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(255, 56, 92, 0.4);
        }
        
        .reservation-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }
        
        .security-note {
            text-align: center;
            font-size: 13px;
            color: var(--airbnb-dark-gray);
            line-height: 1.6;
            padding: 16px;
            background: var(--airbnb-bg-gray);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        
        .security-note i {
            color: var(--airbnb-pink);
        }
        
        .host-info {
            margin-top: 32px;
            padding-top: 32px;
            border-top: 1px solid var(--airbnb-light-gray);
        }
        
        .host-label {
            font-size: 12px;
            color: var(--airbnb-dark-gray);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 12px;
            font-weight: 600;
        }
        
        .host-name {
            font-size: 18px;
            font-weight: 600;
            color: var(--airbnb-black);
        }
        
        /* Modal pour les photos Premium */
        .photo-modal {
            display: none;
            position: fixed;
            z-index: 10000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.95);
            overflow: auto;
            animation: fadeIn 0.3s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .photo-modal.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .modal-content {
            max-width: 90%;
            max-height: 90%;
            object-fit: contain;
            border-radius: 12px;
            animation: zoomIn 0.3s ease;
        }
        
        @keyframes zoomIn {
            from {
                transform: scale(0.8);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }
        
        .modal-close {
            position: absolute;
            top: 30px;
            right: 30px;
            color: white;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
            z-index: 10001;
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 50%;
            transition: all 0.3s ease;
        }
        
        .modal-close:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: rotate(90deg);
        }
        
        .modal-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: white;
            font-size: 32px;
            cursor: pointer;
            width: 56px;
            height: 56px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 50%;
            transition: all 0.3s ease;
            z-index: 10001;
        }
        
        .modal-nav:hover {
            background: rgba(255, 255, 255, 0.2);
        }
        
        .modal-prev {
            left: 30px;
        }
        
        .modal-next {
            right: 30px;
        }
        
        /* Responsive Premium */
        @media (max-width: 1200px) {
            .container {
                padding: 0 40px;
            }
            
            .main-content {
                gap: 60px;
            }
        }
        
        @media (max-width: 1024px) {
            .main-content {
                grid-template-columns: 1fr;
                gap: 50px;
            }
            
            .reservation-sidebar {
                position: relative;
                top: 0;
            }
            
            .property-details {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 768px) {
            body {
                padding-top: 70px;
            }
            
            .container {
                padding: 0 20px;
            }
            
            header {
                padding: 0 20px;
            }
            
            .gallery-main {
                height: 400px;
            }
            
            .photo-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .property-title {
                font-size: 28px;
            }
            
            .property-details {
                grid-template-columns: 1fr;
            }
            
            .options-grid {
                grid-template-columns: 1fr;
            }
            
            .modal-nav {
                width: 44px;
                height: 44px;
                font-size: 24px;
            }
            
            .modal-prev {
                left: 15px;
            }
            
            .modal-next {
                right: 15px;
            }
        }
    </style>
</head>
<body>
    <!-- Header identique à la page d'accueil -->
    <header id="header">
        <a href="{{ route('welcome') }}" class="logo" title="Casa Del Concierge — Accueil">
            <img src="{{ asset('images/logo.png') }}" alt="Casa Del Concierge" width="180" height="48" loading="eager" decoding="async">
        </a>
        <a href="{{ route('houses.index') }}" class="back-link">
            <i class="fas fa-arrow-left"></i>
            Retour aux biens
        </a>
    </header>

    <div class="container">
        <div class="page-header">
            <a href="{{ route('houses.index') }}" class="back-link" style="margin-bottom: 0;">
                <i class="fas fa-arrow-left"></i>
                <span>Retour aux biens</span>
            </a>
        </div>
        
        <!-- Galerie de photos Premium -->
        <div class="photo-gallery">
            @if($house->hasPhotos() && count($house->photos) > 0)
                <div class="gallery-main">
                    <img src="{{ asset('storage/' . $house->photos[0]) }}" 
                         alt="{{ $house->description }}" 
                         class="main-photo" 
                         id="mainPhoto"
                         onclick="openModal(0)">
                    <div class="gallery-overlay">
                        <div class="gallery-info">
                            <div class="gallery-count">
                                <i class="fas fa-images"></i> {{ count($house->photos) }} photo{{ count($house->photos) > 1 ? 's' : '' }}
                            </div>
                        </div>
                        <button class="view-all-photos" onclick="openModal(0)">
                            <i class="fas fa-expand"></i>
                            Voir toutes les photos
                        </button>
                    </div>
                </div>
                
                @if(count($house->photos) > 1)
                    <div class="photo-grid">
                        @foreach(array_slice($house->photos, 1, 4) as $index => $photo)
                            <img src="{{ asset('storage/' . $photo) }}" 
                                 alt="{{ $house->description }}" 
                                 onclick="changeMainPhoto({{ $index + 1 }})"
                                 onmouseover="previewPhoto('{{ asset('storage/' . $photo) }}')">
                        @endforeach
                        @if(count($house->photos) > 5)
                            <div style="position: relative; cursor: pointer; border-radius: 12px; overflow: hidden;" onclick="openModal(0)">
                                <img src="{{ asset('storage/' . $house->photos[4]) }}" style="width: 100%; height: 150px; object-fit: cover; filter: brightness(0.7);">
                                <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; display: flex; align-items: center; justify-content: center; background: rgba(0, 0, 0, 0.4); color: white; font-weight: 700; font-size: 18px;">
                                    +{{ count($house->photos) - 5 }}
                                </div>
                            </div>
                        @endif
                    </div>
                @endif
            @else
                <div class="gallery-main">
                    <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; font-size: 80px; color: var(--airbnb-light-gray);">
                        <i class="fas fa-home"></i>
                    </div>
                </div>
            @endif
        </div>
        
        <!-- Contenu principal -->
        <div class="main-content">
            <div class="property-info">
                <!-- En-tête -->
                <div class="property-header">
                    <h1 class="property-title">{{ $house->description }}</h1>
                    <div class="property-location">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>{{ $house->lieu_exact }}</span>
                    </div>
                    <div class="property-meta">
                        <div class="meta-item">
                            <i class="fas fa-home"></i>
                            <span>{{ $house->formatted_type }}</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-ruler-combined"></i>
                            <span>{{ number_format($house->surface, 0) }} m²</span>
                        </div>
                        @if($house->rate)
                            <div class="meta-item">
                                <i class="fas fa-star"></i>
                                <span>{{ number_format($house->rate, 1) }} ({{ rand(10, 50) }} avis)</span>
                            </div>
                        @endif
                    </div>
                </div>
                
                <!-- Description -->
                <div class="property-description">
                    <h2 class="section-title">À propos de ce logement</h2>
                    <p class="description-text">{{ $house->description }}</p>
                </div>
                
                <!-- Détails -->
                <div class="property-details">
                    <div class="detail-card">
                        <div class="detail-label">Type de logement</div>
                        <div class="detail-value">{{ $house->formatted_type }}</div>
                    </div>
                    <div class="detail-card">
                        <div class="detail-label">Surface</div>
                        <div class="detail-value">{{ number_format($house->surface, 0) }} m²</div>
                    </div>
                    <div class="detail-card">
                        <div class="detail-label">Prix par nuit</div>
                        <div class="detail-value">{{ number_format($house->prix, 0, ',', ' ') }} €</div>
                    </div>
                    <div class="detail-card">
                        <div class="detail-label">Localisation</div>
                        <div class="detail-value" style="font-size: 18px;">{{ Str::limit($house->lieu_exact, 30) }}</div>
                    </div>
                </div>
                
                <!-- Options disponibles -->
                @if($house->price_breakfast || $house->price_love_room || ($house->additional_options && count($house->additional_options) > 0))
                    <div class="options-section">
                        <h2 class="section-title">Options disponibles</h2>
                        <div class="options-grid">
                            @if($house->price_breakfast)
                                <div class="option-card">
                                    <div class="option-icon">
                                        <i class="fas fa-coffee"></i>
                                    </div>
                                    <div class="option-info">
                                        <div class="option-name">Petit-déjeuner</div>
                                        <div class="option-price">
                                            @if($house->price_breakfast > 0)
                                                {{ number_format($house->price_breakfast, 0, ',', ' ') }} € par jour
                                            @else
                                                Gratuit
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                            
                            @if($house->price_love_room)
                                <div class="option-card">
                                    <div class="option-icon">
                                        <i class="fas fa-heart"></i>
                                    </div>
                                    <div class="option-info">
                                        <div class="option-name">Chambre d'amour</div>
                                        <div class="option-price">
                                            @if($house->price_love_room > 0)
                                                {{ number_format($house->price_love_room, 0, ',', ' ') }} € par séjour
                                            @else
                                                Gratuit
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                            
                            @if($house->additional_options && count($house->additional_options) > 0)
                                @foreach($house->additional_options as $option)
                                    <div class="option-card">
                                        <div class="option-icon">
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div class="option-info">
                                            <div class="option-name">{{ $option['name'] }}</div>
                                            <div class="option-price">
                                                @if($option['price'] > 0)
                                                    {{ number_format($option['price'], 0, ',', ' ') }} €
                                                @else
                                                    Gratuit
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                @endif
            </div>
            
            <!-- Sidebar de réservation Premium -->
            <div class="reservation-sidebar">
                <div class="reservation-card">
                    <div class="price-section">
                        <div class="price-amount">{{ number_format($house->prix, 0, ',', ' ') }} €</div>
                        <div class="price-period">par nuit</div>
                    </div>
                    
                    @if($house->rate)
                        <div class="rating-section">
                            <div class="rating-stars">
                                @for($i = 0; $i < 5; $i++)
                                    <i class="fas fa-star{{ $i < floor($house->rate) ? '' : '-o' }}"></i>
                                @endfor
                            </div>
                            <span class="rating-value">{{ number_format($house->rate, 1) }}</span>
                            <span class="rating-count">({{ rand(10, 50) }} avis)</span>
                        </div>
                    @endif
                    
                    @auth
                        @if(auth()->user()->role !== 'locataire')
                            <a href="{{ route('reservations.create', $house) }}" class="reservation-btn">
                                <i class="fas fa-calendar-check"></i>
                                <span>Réserver</span>
                            </a>
                        @else
                            <button class="reservation-btn" disabled>
                                <i class="fas fa-info-circle"></i>
                                <span>Réservation non disponible</span>
                            </button>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="reservation-btn">
                            <i class="fas fa-lock"></i>
                            <span>Connectez-vous pour réserver</span>
                        </a>
                    @endauth
                    
                    <p class="security-note">
                        <i class="fas fa-shield-alt"></i>
                        Vous ne serez pas débité pour le moment
                    </p>
                    
                    @if($house->user)
                        <div class="host-info">
                            <div class="host-label">Hôte</div>
                            <div class="host-name">
                                {{ $house->user->first_name }} {{ $house->user->last_name }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal pour les photos Premium -->
    <div class="photo-modal" id="photoModal" onclick="closeModalOnBackdrop(event)">
        <span class="modal-close" onclick="closeModal()">&times;</span>
        <div class="modal-nav modal-prev" onclick="event.stopPropagation(); previousPhoto()">
            <i class="fas fa-chevron-left"></i>
        </div>
        <img class="modal-content" id="modalImage" onclick="event.stopPropagation()">
        <div class="modal-nav modal-next" onclick="event.stopPropagation(); nextPhoto()">
            <i class="fas fa-chevron-right"></i>
        </div>
    </div>
    
    <script>
        const photos = @json($house->photos ?? []);
        let currentPhotoIndex = 0;
        
        function changeMainPhoto(index) {
            if (photos[index]) {
                document.getElementById('mainPhoto').src = '{{ asset("storage/") }}/' + photos[index];
                currentPhotoIndex = index;
            }
        }
        
        function previewPhoto(src) {
            document.getElementById('mainPhoto').src = src;
        }
        
        function openModal(index = 0) {
            currentPhotoIndex = index;
            const modal = document.getElementById('photoModal');
            const modalImg = document.getElementById('modalImage');
            modal.classList.add('active');
            updateModalImage();
            document.body.style.overflow = 'hidden';
        }
        
        function closeModal() {
            document.getElementById('photoModal').classList.remove('active');
            document.body.style.overflow = 'auto';
        }
        
        function closeModalOnBackdrop(event) {
            if (event.target.id === 'photoModal') {
                closeModal();
            }
        }
        
        function updateModalImage() {
            if (photos[currentPhotoIndex]) {
                document.getElementById('modalImage').src = '{{ asset("storage/") }}/' + photos[currentPhotoIndex];
            }
        }
        
        function nextPhoto() {
            currentPhotoIndex = (currentPhotoIndex + 1) % photos.length;
            updateModalImage();
        }
        
        function previousPhoto() {
            currentPhotoIndex = (currentPhotoIndex - 1 + photos.length) % photos.length;
            updateModalImage();
        }
        
        // Navigation au clavier
        document.addEventListener('keydown', function(e) {
            const modal = document.getElementById('photoModal');
            if (modal.classList.contains('active')) {
                if (e.key === 'Escape') {
                    closeModal();
                } else if (e.key === 'ArrowRight') {
                    nextPhoto();
                } else if (e.key === 'ArrowLeft') {
                    previousPhoto();
                }
            }
        });
        
        // Header Scroll Effect
        window.addEventListener('scroll', () => {
            const header = document.getElementById('header');
            if (window.pageYOffset > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    </script>
    
    <!-- Navigation Enhancements -->
    <script src="{{ asset('js/navigation-enhancements.js') }}"></script>
</body>
</html>
