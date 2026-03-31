<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Paiement - Réservation {{ $reservation->id }}</title>
    <link rel="icon" href="{{ asset('images/logo.jpeg') }}" type="image/jpeg">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.jpeg') }}">
    
    <!-- Stripe.js -->
    <script src="https://js.stripe.com/v3/"></script>
    
    <!-- Airbnb-like Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cereal:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* Airbnb Color Palette */
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
        }
        
        body {
            font-family: 'Cereal', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            background-color: var(--airbnb-bg-gray);
            color: var(--airbnb-black);
            line-height: 1.6;
            min-height: 100vh;
            padding: 40px 20px;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--airbnb-dark-gray);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 30px;
            transition: color 0.3s ease;
        }
        
        .back-link:hover {
            color: var(--airbnb-pink);
        }
        
        .payment-card {
            background: var(--airbnb-white);
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 40px;
            margin-bottom: 30px;
        }
        
        .page-title {
            font-size: 32px;
            font-weight: 700;
            color: var(--airbnb-black);
            margin-bottom: 10px;
        }
        
        .page-subtitle {
            color: var(--airbnb-dark-gray);
            font-size: 16px;
            margin-bottom: 40px;
        }
        
        .reservation-summary {
            background: var(--airbnb-bg-gray);
            border-radius: 12px;
            padding: 30px;
            margin-bottom: 30px;
        }
        
        .summary-title {
            font-size: 20px;
            font-weight: 600;
            color: var(--airbnb-black);
            margin-bottom: 20px;
        }
        
        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--airbnb-light-gray);
        }
        
        .summary-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        
        .summary-label {
            color: var(--airbnb-dark-gray);
            font-size: 14px;
        }
        
        .summary-value {
            color: var(--airbnb-black);
            font-weight: 600;
            font-size: 14px;
        }
        
        .summary-item.total {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 2px solid var(--airbnb-light-gray);
        }
        
        .summary-item.total .summary-label,
        .summary-item.total .summary-value {
            font-size: 18px;
            font-weight: 700;
            color: var(--airbnb-black);
        }
        
        .payment-section {
            margin-top: 40px;
        }
        
        .payment-title {
            font-size: 20px;
            font-weight: 600;
            color: var(--airbnb-black);
            margin-bottom: 20px;
        }
        
        .stripe-button {
            background: linear-gradient(135deg, var(--airbnb-pink) 0%, #e61e4d 100%);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 18px 40px;
            width: 100%;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            box-shadow: 0 4px 15px rgba(255, 56, 92, 0.3);
            margin-top: 20px;
        }
        
        .stripe-button:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 56, 92, 0.4);
        }
        
        .stripe-button:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }
        
        .loading-spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-top-color: white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        .error-message {
            background: #FEF2F2;
            border: 2px solid #DC2626;
            color: #DC2626;
            padding: 16px 20px;
            border-radius: 12px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .info-box {
            background: #EFF6FF;
            border: 1px solid #3B82F6;
            color: #1E40AF;
            padding: 16px 20px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 14px;
        }
        
        .house-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 12px;
            margin-bottom: 20px;
        }
        
        @media (max-width: 768px) {
            body {
                padding: 20px 15px;
            }
            
            .payment-card {
                padding: 25px 20px;
            }
            
            .page-title {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div style="text-align:center;margin-bottom:20px;">
            <a href="{{ url('/') }}" title="Casa Del Concierge — Accueil" style="display:inline-block;line-height:0;">
                <img src="{{ asset('images/logo.jpeg') }}" alt="Casa Del Concierge" style="height:2.75rem;max-height:48px;width:auto;object-fit:contain;">
            </a>
        </div>
        <a href="{{ route('reservations.index') }}" class="back-link">
            <i class="fas fa-arrow-left"></i>
            <span>Retour aux réservations</span>
        </a>
        
        <div class="payment-card">
            <h1 class="page-title">Finaliser votre paiement</h1>
            <p class="page-subtitle">Complétez votre réservation en effectuant le paiement</p>
            
            @if(session('error'))
                <div class="error-message">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ session('error') }}</span>
                </div>
            @endif
            
            <div class="reservation-summary">
                @if($reservation->house->hasPhotos())
                    <img src="{{ asset('storage/' . $reservation->house->first_photo) }}" 
                         alt="{{ $reservation->house->description }}" 
                         class="house-image">
                @endif
                
                <h2 class="summary-title">Résumé de votre réservation</h2>
                
                <div class="summary-item">
                    <span class="summary-label">Bien</span>
                    <span class="summary-value">{{ $reservation->house->description }}</span>
                </div>
                
                <div class="summary-item">
                    <span class="summary-label">Localisation</span>
                    <span class="summary-value">{{ $reservation->house->lieu_exact }}</span>
                </div>
                
                <div class="summary-item">
                    <span class="summary-label">Arrivée</span>
                    <span class="summary-value">{{ $reservation->start_date->format('d/m/Y') }}</span>
                </div>
                
                <div class="summary-item">
                    <span class="summary-label">Départ</span>
                    <span class="summary-value">{{ $reservation->end_date->format('d/m/Y') }}</span>
                </div>
                
                <div class="summary-item">
                    <span class="summary-label">Durée</span>
                    <span class="summary-value">{{ $reservation->start_date->diffInDays($reservation->end_date) }} nuit(s)</span>
                </div>
                
                @php
                    $nights = $reservation->start_date->diffInDays($reservation->end_date);
                    $baseAmount = $reservation->house->prix * $nights;
                    $breakfastAmount = $reservation->has_breakfast ? ($reservation->house->price_breakfast ?? 0) : 0;
                    $loveRoomAmount = $reservation->has_love_room ? ($reservation->house->price_love_room ?? 0) : 0;
                    
                    // Calculer le prix des options supplémentaires
                    $additionalOptionsAmount = 0;
                    if ($reservation->additional_options && is_array($reservation->additional_options)) {
                        foreach ($reservation->additional_options as $option) {
                            if (isset($option['price'])) {
                                $additionalOptionsAmount += floatval($option['price']);
                            }
                        }
                    }
                    
                    $totalAmount = $baseAmount + $breakfastAmount + $loveRoomAmount + $additionalOptionsAmount;
                @endphp
                
                <div class="summary-item">
                    <span class="summary-label">{{ number_format($reservation->house->prix, 0, ',', ' ') }} € x {{ $nights }} nuit(s)</span>
                    <span class="summary-value">{{ number_format($baseAmount, 0, ',', ' ') }} €</span>
                </div>
                
                @if($reservation->has_breakfast && $breakfastAmount > 0)
                    <div class="summary-item">
                        <span class="summary-label">Petit-déjeuner</span>
                        <span class="summary-value">{{ number_format($breakfastAmount, 0, ',', ' ') }} €</span>
                    </div>
                @endif
                
                @if($reservation->has_love_room && $loveRoomAmount > 0)
                    <div class="summary-item">
                        <span class="summary-label">Chambre d'amour</span>
                        <span class="summary-value">{{ number_format($loveRoomAmount, 0, ',', ' ') }} €</span>
                    </div>
                @endif
                
                @if($reservation->additional_options && count($reservation->additional_options) > 0)
                    @foreach($reservation->additional_options as $option)
                        @if(isset($option['price']) && $option['price'] > 0)
                        <div class="summary-item">
                            <span class="summary-label">{{ $option['name'] }}</span>
                            <span class="summary-value">{{ number_format($option['price'], 0, ',', ' ') }} €</span>
                        </div>
                        @endif
                    @endforeach
                @endif
                
                <div class="summary-item total">
                    <span class="summary-label">Total</span>
                    <span class="summary-value">{{ number_format($totalAmount, 0, ',', ' ') }} €</span>
                </div>
            </div>
            
            <div class="payment-section">
                <h2 class="payment-title">Méthode de paiement</h2>
                
                <div class="info-box">
                    <i class="fas fa-shield-alt"></i>
                    <span>Paiement sécurisé par Stripe. Vos informations de paiement sont cryptées et sécurisées.</span>
                </div>
                
                <button id="checkout-button" class="stripe-button">
                    <i class="fas fa-lock"></i>
                    <span id="button-text">Payer {{ number_format($totalAmount, 0, ',', ' ') }} €</span>
                    <span id="button-spinner" class="loading-spinner" style="display: none;"></span>
                </button>
            </div>
        </div>
    </div>
    
    <script>
        const checkoutButton = document.getElementById('checkout-button');
        const buttonText = document.getElementById('button-text');
        const buttonSpinner = document.getElementById('button-spinner');
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        
        checkoutButton.addEventListener('click', async function() {
            checkoutButton.disabled = true;
            buttonText.style.display = 'none';
            buttonSpinner.style.display = 'inline-block';
            
            try {
                // Créer la session Stripe Checkout
                const response = await fetch(`/reservations/{{ $reservation->id }}/payment/create-session`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    }
                });
                
                const data = await response.json();
                
                if (!response.ok) {
                    throw new Error(data.error || 'Une erreur est survenue');
                }
                
                // Rediriger vers Stripe Checkout
                window.location.href = data.url;
                
            } catch (error) {
                console.error('Erreur:', error);
                alert('Une erreur est survenue lors de la création de la session de paiement. Veuillez réessayer.');
                checkoutButton.disabled = false;
                buttonText.style.display = 'inline';
                buttonSpinner.style.display = 'none';
            }
        });
    </script>
</body>
</html>

