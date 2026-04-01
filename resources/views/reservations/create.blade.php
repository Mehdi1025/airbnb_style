<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Réservation - {{ $house->description }}</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Cereal:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Navigation Enhancements -->
    <link rel="stylesheet" href="{{ asset('css/navigation-enhancements.css') }}">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: #FFFFFF;
            color: #222222;
            line-height: 1.43;
            font-size: 14px;
            min-height: 100vh;
            padding: 24px 24px 80px 24px;
        }

        .container {
            max-width: 1120px;
            margin: 0 auto;
        }

        .breadcrumb {
            margin-bottom: 32px;
        }

        .breadcrumb a {
            color: #6A6A6A;
            text-decoration: none;
            font-size: 14px;
            font-weight: 400;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        .main-content {
            display: grid;
            grid-template-columns: 1fr 425px;
            gap: 48px;
            align-items: start;
        }

        @media (max-width: 1128px) {
            .main-content {
                grid-template-columns: 1fr;
                gap: 32px;
            }
            
            .reservation-card {
                order: -1;
            }
        }

        .property-section h1 {
            font-size: 32px;
            font-weight: 600;
            color: #222222;
            line-height: 36px;
            margin-bottom: 8px;
        }

        .property-details {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 24px;
            flex-wrap: wrap;
        }

        .property-details span {
            color: #6A6A6A;
            font-size: 16px;
        }

        .property-details .separator {
            color: #DDDDDD;
        }

        .property-image {
            width: 100%;
            height: 400px;
            border-radius: 12px;
            object-fit: cover;
            margin-bottom: 48px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        }

        .reservation-card {
            background: #FFFFFF;
            border: 1px solid #DDDDDD;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
            padding: 24px;
            position: sticky;
            top: 24px;
        }

        .price-section {
            margin-bottom: 24px;
        }

        .price {
            font-size: 22px;
            font-weight: 600;
            color: #222222;
        }

        .price-unit {
            font-size: 16px;
            font-weight: 400;
            color: #6A6A6A;
        }

        .date-inputs {
            border: 1px solid #DDDDDD;
            border-radius: 8px;
            margin-bottom: 16px;
            overflow: hidden;
        }

        .date-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        .date-input-group {
            padding: 12px;
            position: relative;
        }

        .date-input-group:not(:last-child) {
            border-right: 1px solid #DDDDDD;
        }

        .date-input-group label {
            font-size: 10px;
            font-weight: 600;
            text-transform: uppercase;
            color: #222222;
            letter-spacing: 0.04em;
            display: block;
            margin-bottom: 2px;
        }

        .date-input {
            border: none;
            outline: none;
            font-size: 14px;
            font-weight: 400;
            color: #6A6A6A;
            background: transparent;
            width: 100%;
            cursor: pointer;
        }

        .date-input:focus {
            color: #222222;
        }

        .options-section {
            border: 1px solid #DDDDDD;
            border-radius: 8px;
            padding: 12px;
            margin-bottom: 16px;
            transition: border-color 0.2s ease;
        }

        .options-label {
            font-size: 10px;
            font-weight: 600;
            text-transform: uppercase;
            color: #222222;
            letter-spacing: 0.04em;
            display: block;
            margin-bottom: 12px;
        }

        .options-container {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .option-checkbox {
            display: flex;
            align-items: center;
            cursor: pointer;
            padding: 8px;
            border-radius: 6px;
            transition: background-color 0.2s ease;
            user-select: none;
        }

        .option-checkbox:hover {
            background-color: #F7F7F7;
        }

        .option-checkbox input[type="checkbox"] {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        .checkbox-custom {
            position: relative;
            width: 20px;
            height: 20px;
            border: 2px solid #DDDDDD;
            border-radius: 4px;
            margin-right: 12px;
            flex-shrink: 0;
            transition: all 0.2s ease;
            background-color: #FFFFFF;
        }

        .option-checkbox input[type="checkbox"]:checked ~ .checkbox-custom {
            background-color: #E31C5F;
            border-color: #E31C5F;
        }

        .option-checkbox input[type="checkbox"]:checked ~ .checkbox-custom::after {
            content: '';
            position: absolute;
            left: 6px;
            top: 2px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }

        .option-checkbox input[type="checkbox"]:focus ~ .checkbox-custom {
            box-shadow: 0 0 0 3px rgba(227, 28, 95, 0.1);
        }

        .option-label-text {
            font-size: 14px;
            font-weight: 400;
            color: #222222;
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .option-price {
            font-size: 12px;
            font-weight: 500;
            color: #6A6A6A;
            margin-left: 8px;
        }

        .guests-section {
            border: 1px solid #DDDDDD;
            border-radius: 8px;
            padding: 12px;
            margin-bottom: 16px;
            cursor: pointer;
            transition: border-color 0.2s ease;
        }

        .guests-section:hover {
            border-color: #222222;
        }

        .guests-section label {
            font-size: 10px;
            font-weight: 600;
            text-transform: uppercase;
            color: #222222;
            letter-spacing: 0.04em;
            display: block;
            margin-bottom: 2px;
        }

        .guests-input {
            border: none;
            outline: none;
            font-size: 14px;
            font-weight: 400;
            color: #6A6A6A;
            background: transparent;
            width: 100%;
            resize: none;
            min-height: 20px;
        }

        .reserve-button {
            background: linear-gradient(to right, #E61E4D 0%, #E31C5F 50%, #D70466 100%);
            color: #FFFFFF;
            border: none;
            border-radius: 8px;
            padding: 14px;
            width: 100%;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            margin-bottom: 16px;
            transition: transform 0.1s ease;
        }

        .reserve-button:hover:not(:disabled) {
            transform: scale(1.02);
        }

        .reserve-button:active:not(:disabled) {
            transform: scale(0.98);
        }

        .reserve-button:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        .charge-notice {
            text-align: center;
            color: #6A6A6A;
            font-size: 14px;
            margin-bottom: 24px;
        }

        .availability-feedback {
            margin-bottom: 16px;
            padding: 12px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            text-align: center;
        }

        .availability-success {
            background-color: #F7F7F7;
            color: #008A05;
            border: 1px solid #00A806;
        }

        .availability-error {
            background-color: #FFF8F6;
            color: #C13515;
            border: 1px solid #C13515;
        }

        .availability-checking {
            background-color: #F7F7F7;
            color: #6A6A6A;
        }

        .price-breakdown {
            border-top: 1px solid #DDDDDD;
            padding-top: 16px;
        }

        .price-line {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-size: 16px;
        }

        .price-line.total {
            font-weight: 600;
            color: #222222;
            border-top: 1px solid #DDDDDD;
            padding-top: 16px;
            margin-top: 16px;
            margin-bottom: 0;
        }

        .price-line span:first-child {
            color: #6A6A6A;
        }

        .price-line.total span:first-child {
            color: #222222;
        }

        .success-message {
            background: #F7F7F7;
            border: 1px solid #00A806;
            color: #008A05;
            padding: 24px;
            border-radius: 12px;
            text-align: center;
            font-size: 16px;
            font-weight: 500;
            margin-bottom: 24px;
        }

        .success-message i {
            font-size: 24px;
            margin-bottom: 12px;
            display: block;
        }

        .spinner {
            width: 16px;
            height: 16px;
            border: 2px solid transparent;
            border-top: 2px solid #FFFFFF;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            display: inline-block;
            margin-left: 8px;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .hidden {
            display: none !important;
        }

        .invalid-feedback {
            color: #C13515;
            font-size: 12px;
            margin-top: 8px;
        }

        .is-invalid {
            border-color: #C13515 !important;
        }

        .date-inputs.is-invalid {
            border-color: #C13515;
        }

        .nights-display {
            font-size: 14px;
            color: #6A6A6A;
            margin-top: 16px;
            text-align: center;
        }

        @media (max-width: 768px) {
            body {
                padding: 16px;
            }
            
            .main-content {
                gap: 24px;
            }
            
            .property-section h1 {
                font-size: 26px;
                line-height: 30px;
            }
            
            .property-image {
                height: 300px;
                margin-bottom: 32px;
            }
            
            .reservation-card {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div style="text-align:center;margin-bottom:16px;">
            <a href="{{ url('/') }}" title="Casa Del Concierge — Accueil" style="display:inline-block;line-height:0;">
                <img src="{{ asset('images/logo.png') }}" alt="Casa Del Concierge" style="height:2.75rem;max-height:48px;width:auto;object-fit:contain;">
            </a>
        </div>
        <div class="breadcrumb">
            <a href="/">Accueil</a> &gt; <a href="/nos-biens">Nos biens</a> &gt; Réservation
        </div>

        <div class="main-content">
            <div class="property-section">
                <h1>{{ $house->description }}</h1>
                <div class="property-details">
                    <span><i class="fas fa-map-marker-alt"></i> {{ $house->lieu_exact }}</span>
                    <span class="separator">•</span>
                    <span>{{ ucfirst($house->type) }}</span>
                    <span class="separator">•</span>
                    <span>{{ $house->surface }} m²</span>
                    @if($house->rate)
                    <span class="separator">•</span>
                    <span><i class="fas fa-star"></i> {{ $house->rate }}</span>
                    @endif
                </div>

                <img src="{{ $house->photos ? asset('storage/' . $house->photos[0]) : 'https://via.placeholder.com/680x400/FF5A5F/ffffff?text=Propriété' }}" 
                     alt="{{ $house->description }}" class="property-image">

                <div id="success-message" class="success-message hidden">
                    <i class="fas fa-check-circle"></i>
                    Votre réservation a été confirmée avec succès !<br>
                    <small>Vous allez être redirigé vers vos réservations...</small>
                </div>
            </div>

            <div class="reservation-card">
                <div class="price-section">
                    <span class="price">{{ number_format($house->prix, 0, ',', ' ') }} €</span>
                    <span class="price-unit">par nuit</span>
                </div>

                <form id="reservationForm">
                    <div class="date-inputs" id="dateInputs">
                        <div class="date-row">
                            <div class="date-input-group">
                                <label for="start_date">ARRIVÉE</label>
                                <input type="date" class="date-input" id="start_date" name="start_date" required>
                            </div>
                            <div class="date-input-group">
                                <label for="end_date">DÉPART</label>
                                <input type="date" class="date-input" id="end_date" name="end_date" required>
                            </div>
                        </div>
                    </div>
                    <div class="invalid-feedback" id="date_error"></div>

                    <div class="options-section">
                        <label class="options-label">OPTIONS</label>
                        <div class="options-container">
                            <!-- Options fixes -->
                            <label class="option-checkbox">
                                <input type="checkbox" id="has_breakfast" name="has_breakfast" value="1">
                                <span class="checkbox-custom"></span>
                                <span class="option-label-text">
                                    Petit-déjeuner inclus
                                    @if($house->price_breakfast)
                                        <span class="option-price">(+{{ number_format($house->price_breakfast, 0, ',', ' ') }} €)</span>
                                    @else
                                        <span class="option-price">(Gratuit)</span>
                                    @endif
                                </span>
                            </label>
                            <label class="option-checkbox">
                                <input type="checkbox" id="has_love_room" name="has_love_room" value="1">
                                <span class="checkbox-custom"></span>
                                <span class="option-label-text">
                                    Chambre romantique
                                    @if($house->price_love_room)
                                        <span class="option-price">(+{{ number_format($house->price_love_room, 0, ',', ' ') }} €)</span>
                                    @else
                                        <span class="option-price">(Gratuit)</span>
                                    @endif
                                </span>
                            </label>
                            
                            <!-- Options supplémentaires dynamiques -->
                            @if($house->additional_options && count($house->additional_options) > 0)
                                @foreach($house->additional_options as $index => $option)
                                <label class="option-checkbox" style="border-top: 1px solid rgba(221, 221, 221, 0.5); padding-top: 12px; margin-top: 4px;">
                                    <input type="checkbox" 
                                           class="additional-option-checkbox" 
                                           name="additional_options[]" 
                                           value="{{ $index }}"
                                           data-name="{{ $option['name'] }}"
                                           data-price="{{ $option['price'] }}">
                                    <span class="checkbox-custom"></span>
                                    <span class="option-label-text">
                                        <span style="font-weight: 500;">{{ $option['name'] }}</span>
                                        @if($option['price'] > 0)
                                            <span class="option-price" style="font-weight: 600; color: #222222;">+{{ number_format($option['price'], 0, ',', ' ') }} €</span>
                                        @else
                                            <span class="option-price" style="color: #008A05;">Gratuit</span>
                                        @endif
                                    </span>
                                </label>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="guests-section">
                        <label for="notes">DEMANDES SPÉCIALES</label>
                        <textarea class="guests-input" id="notes" name="notes" 
                                placeholder="Ajoutez vos demandes spéciales ou commentaires..."></textarea>
                    </div>

                    <div id="availability-status"></div>

                    <button type="submit" class="reserve-button" id="submitBtn" disabled>
                        <span id="submitText">Réserver</span>
                        <span id="spinner" class="spinner hidden"></span>
                    </button>

                    <div class="charge-notice">
                        Aucun frais ne sera prélevé pour le moment
                    </div>

                    <div id="price-breakdown" class="price-breakdown hidden">
                        <div class="price-line">
                            <span id="base-price-text">{{ number_format($house->prix, 0, ',', ' ') }} € x <span id="nights-count">0</span> nuit(s)</span>
                            <span id="base-price-amount">0 €</span>
                        </div>
                        <div class="price-line" id="breakfast-price-line" style="display: none;">
                            <span>Petit-déjeuner</span>
                            <span id="breakfast-price-amount">0 €</span>
                        </div>
                        <div class="price-line" id="love-room-price-line" style="display: none;">
                            <span>Chambre romantique</span>
                            <span id="love-room-price-amount">0 €</span>
                        </div>
                        <div id="additional-options-price-lines"></div>
                        <div class="price-line total">
                            <span>Total</span>
                            <span id="total-price">0 €</span>
                        </div>
                    </div>

                    <div id="nights-display" class="nights-display hidden">
                        <span id="nights-summary"></span>
                    </div>
                </form>
                
                @if($house->user)
                <div style="margin-top: 24px; padding: 16px; background-color: #F7F7F7; border-radius: 8px; border: 1px solid #DDDDDD;">
                    <p style="font-size: 12px; color: #6A6A6A; margin-bottom: 8px; line-height: 1.5;">
                        <strong style="color: #222222;">Pour une réservation de plus de 30 jours</strong>, veuillez contacter l'hôte directement :
                    </p>
                    <div style="display: flex; flex-direction: column; gap: 6px;">
                        <a href="mailto:{{ $house->user->email }}" style="display: flex; align-items: center; gap: 8px; color: #E31C5F; text-decoration: none; font-size: 14px; font-weight: 500;">
                            <i class="fas fa-envelope"></i>
                            <span>{{ $house->user->email }}</span>
                        </a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('reservationForm');
            const startDateInput = document.getElementById('start_date');
            const endDateInput = document.getElementById('end_date');
            const submitBtn = document.getElementById('submitBtn');
            const submitText = document.getElementById('submitText');
            const spinner = document.getElementById('spinner');
            const successMessage = document.getElementById('success-message');
            const availabilityStatus = document.getElementById('availability-status');
            const priceBreakdown = document.getElementById('price-breakdown');
            const nightsCount = document.getElementById('nights-count');
            const basePriceAmount = document.getElementById('base-price-amount');
            const totalPrice = document.getElementById('total-price');
            const nightsDisplay = document.getElementById('nights-display');
            const nightsSummary = document.getElementById('nights-summary');
            const dateError = document.getElementById('date_error');
            const dateInputs = document.getElementById('dateInputs');
            
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const pricePerNight = {{ $house->prix }};
            const priceBreakfast = {{ $house->price_breakfast ?? 0 }};
            const priceLoveRoom = {{ $house->price_love_room ?? 0 }};
            const additionalOptions = @json($house->additional_options ?? []);

            // Définir la date minimale à aujourd'hui
            const today = new Date().toISOString().split('T')[0];
            startDateInput.min = today;
            
            startDateInput.addEventListener('change', function() {
                endDateInput.min = this.value;
                if (endDateInput.value && endDateInput.value <= this.value) {
                    endDateInput.value = '';
                }
                // Limiter la date de fin à 30 jours maximum
                if (this.value) {
                    const maxDate = new Date(this.value);
                    maxDate.setDate(maxDate.getDate() + 30);
                    endDateInput.max = maxDate.toISOString().split('T')[0];
                }
                updatePriceCalculation();
                checkAvailability();
                validateDates();
                clearErrors();
            });
            
            endDateInput.addEventListener('change', function() {
                updatePriceCalculation();
                checkAvailability();
                validateDates();
                clearErrors();
            });
            
            function validateDates() {
                const startDate = startDateInput.value;
                const endDate = endDateInput.value;
                
                if (startDate && endDate) {
                    const start = new Date(startDate);
                    const end = new Date(endDate);
                    const nights = Math.ceil((end - start) / (1000 * 60 * 60 * 24));
                    
                    if (nights > 30) {
                        dateInputs.classList.add('is-invalid');
                        dateError.textContent = 'La réservation ne peut pas dépasser 30 jours. Pour une réservation de plus de 30 jours, veuillez contacter l\'hôte directement.';
                        submitBtn.disabled = true;
                        return false;
                    } else {
                        dateInputs.classList.remove('is-invalid');
                        dateError.textContent = '';
                        return true;
                    }
                }
                return true;
            }

            function updatePriceCalculation() {
                const startDate = startDateInput.value;
                const endDate = endDateInput.value;

                if (startDate && endDate) {
                    const start = new Date(startDate);
                    const end = new Date(endDate);
                    const nights = Math.ceil((end - start) / (1000 * 60 * 60 * 24));
                    
                    if (nights > 0) {
                        nightsCount.textContent = nights;
                        const baseAmount = pricePerNight * nights;
                        
                        // Calculer le prix des options fixes
                        const breakfastChecked = document.getElementById('has_breakfast').checked;
                        const loveRoomChecked = document.getElementById('has_love_room').checked;
                        const breakfastPrice = breakfastChecked ? priceBreakfast : 0;
                        const loveRoomPrice = loveRoomChecked ? priceLoveRoom : 0;
                        
                        // Calculer le prix des options supplémentaires
                        let additionalOptionsPrice = 0;
                        const additionalOptionsContainer = document.getElementById('additional-options-price-lines');
                        additionalOptionsContainer.innerHTML = '';
                        
                        document.querySelectorAll('.additional-option-checkbox:checked').forEach(checkbox => {
                            const optionIndex = parseInt(checkbox.value);
                            const option = additionalOptions[optionIndex];
                            if (option && option.price) {
                                additionalOptionsPrice += parseFloat(option.price);
                                
                                // Ajouter la ligne de prix
                                const priceLine = document.createElement('div');
                                priceLine.className = 'price-line';
                                priceLine.id = `additional-option-${optionIndex}-line`;
                                priceLine.innerHTML = `
                                    <span>${option.name}</span>
                                    <span>${new Intl.NumberFormat('fr-FR').format(option.price)} €</span>
                                `;
                                additionalOptionsContainer.appendChild(priceLine);
                            }
                        });
                        
                        const optionsPrice = breakfastPrice + loveRoomPrice + additionalOptionsPrice;
                        const totalAmount = baseAmount + optionsPrice;
                        
                        basePriceAmount.textContent = new Intl.NumberFormat('fr-FR').format(baseAmount) + ' €';
                        totalPrice.textContent = new Intl.NumberFormat('fr-FR').format(totalAmount) + ' €';
                        
                        // Afficher/masquer les lignes d'options
                        const breakfastLine = document.getElementById('breakfast-price-line');
                        const loveRoomLine = document.getElementById('love-room-price-line');
                        const breakfastPriceAmount = document.getElementById('breakfast-price-amount');
                        const loveRoomPriceAmount = document.getElementById('love-room-price-amount');
                        
                        if (breakfastChecked && priceBreakfast > 0) {
                            breakfastLine.style.display = 'flex';
                            breakfastPriceAmount.textContent = new Intl.NumberFormat('fr-FR').format(priceBreakfast) + ' €';
                        } else {
                            breakfastLine.style.display = 'none';
                        }
                        
                        if (loveRoomChecked && priceLoveRoom > 0) {
                            loveRoomLine.style.display = 'flex';
                            loveRoomPriceAmount.textContent = new Intl.NumberFormat('fr-FR').format(priceLoveRoom) + ' €';
                        } else {
                            loveRoomLine.style.display = 'none';
                        }
                        
                        nightsSummary.textContent = `${nights} nuit${nights > 1 ? 's' : ''} sélectionnée${nights > 1 ? 's' : ''}`;
                        nightsDisplay.classList.remove('hidden');
                        priceBreakdown.classList.remove('hidden');
                    } else {
                        nightsDisplay.classList.add('hidden');
                        priceBreakdown.classList.add('hidden');
                    }
                } else {
                    nightsDisplay.classList.add('hidden');
                    priceBreakdown.classList.add('hidden');
                }
            }
            
            // Écouter les changements sur les checkboxes pour mettre à jour le prix
            document.getElementById('has_breakfast').addEventListener('change', updatePriceCalculation);
            document.getElementById('has_love_room').addEventListener('change', updatePriceCalculation);
            
            // Écouter les changements sur les options supplémentaires
            document.querySelectorAll('.additional-option-checkbox').forEach(checkbox => {
                checkbox.addEventListener('change', updatePriceCalculation);
            });

            function clearErrors() {
                dateInputs.classList.remove('is-invalid');
                dateError.textContent = '';
                document.querySelectorAll('.is-invalid').forEach(el => {
                    el.classList.remove('is-invalid');
                });
            }
            
            async function checkAvailability() {
                const startDate = startDateInput.value;
                const endDate = endDateInput.value;
                
                if (!startDate || !endDate) {
                    availabilityStatus.innerHTML = '';
                    submitBtn.disabled = true;
                    return;
                }
                
                try {
                    availabilityStatus.innerHTML = `
                        <div class="availability-feedback availability-checking">
                            Vérification de la disponibilité...
                        </div>
                    `;
                    
                    const response = await fetch(`/houses/{{ $house->id }}/check-availability?start_date=${startDate}&end_date=${endDate}`);
                    const data = await response.json();
                    
                    if (data.available) {
                        availabilityStatus.innerHTML = `
                            <div class="availability-feedback availability-success">
                                <i class="fas fa-check-circle"></i> Disponible pour ces dates
                            </div>
                        `;
                        submitBtn.disabled = false;
                    } else {
                        availabilityStatus.innerHTML = `
                            <div class="availability-feedback availability-error">
                                <i class="fas fa-times-circle"></i> Ces dates ne sont pas disponibles
                            </div>
                        `;
                        submitBtn.disabled = true;
                    }
                } catch (error) {
                    console.error('Erreur lors de la vérification:', error);
                    availabilityStatus.innerHTML = `
                        <div class="availability-feedback availability-error">
                            <i class="fas fa-exclamation-triangle"></i> Erreur de vérification
                        </div>
                    `;
                    submitBtn.disabled = true;
                }
            }
            
            function showValidationErrors(errors) {
                if (errors.start_date || errors.end_date) {
                    dateInputs.classList.add('is-invalid');
                    const errorMsg = errors.start_date ? errors.start_date[0] : errors.end_date[0];
                    dateError.textContent = errorMsg;
                }
                
                Object.keys(errors).forEach(field => {
                    const input = document.getElementById(field);
                    if (input && field !== 'start_date' && field !== 'end_date') {
                        input.classList.add('is-invalid');
                    }
                });
            }

            form.addEventListener('submit', async function(e) {
                e.preventDefault();
                
                // Valider les dates avant de soumettre
                if (!validateDates()) {
                    return;
                }
                
                submitBtn.disabled = true;
                submitText.textContent = 'Confirmation...';
                spinner.classList.remove('hidden');
                
                clearErrors();
                
                const formData = new FormData(form);
                const data = Object.fromEntries(formData.entries());
                data._token = csrfToken;
                
                // Gérer les checkboxes (elles ne sont pas envoyées si non cochées)
                data.has_breakfast = document.getElementById('has_breakfast').checked ? '1' : '0';
                data.has_love_room = document.getElementById('has_love_room').checked ? '1' : '0';
                
                // Gérer les options supplémentaires
                const selectedAdditionalOptions = [];
                document.querySelectorAll('.additional-option-checkbox:checked').forEach(checkbox => {
                    const optionIndex = parseInt(checkbox.value);
                    const option = additionalOptions[optionIndex];
                    if (option) {
                        selectedAdditionalOptions.push({
                            name: option.name,
                            price: option.price
                        });
                    }
                });
                data.additional_options = JSON.stringify(selectedAdditionalOptions);
                
                try {
                    const availabilityResponse = await fetch(`/houses/{{ $house->id }}/check-availability?start_date=${data.start_date}&end_date=${data.end_date}`);
                    const availabilityData = await availabilityResponse.json();
                    
                    if (!availabilityData.available) {
                        throw new Error('Ce bien n\'est plus disponible pour les dates sélectionnées.');
                    }
                    
                    const response = await fetch(`/houses/{{ $house->id }}/reservations`, {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: new URLSearchParams(data)
                    });
                    
                    const responseData = await response.json();
                    
                    if (!response.ok) {
                        if (response.status === 422 && responseData.errors) {
                            showValidationErrors(responseData.errors);
                        } else if (response.status === 401) {
                            window.location.href = '{{ route("login") }}';
                            return;
                        } else {
                            throw new Error(responseData.error || responseData.message || 'Une erreur est survenue');
                        }
                        return;
                    }
                    
                    // Rediriger vers la page de paiement
                    if (responseData.redirect) {
                        window.location.href = responseData.redirect;
                    } else {
                        // Fallback si pas de redirect
                        successMessage.classList.remove('hidden');
                        form.style.display = 'none';
                        setTimeout(() => {
                            window.location.href = '{{ route("reservations.index") }}';
                        }, 3000);
                    }
                    
                } catch (error) {
                    console.error('Erreur lors de la réservation:', error);
                    
                    availabilityStatus.innerHTML = `
                        <div class="availability-feedback availability-error">
                            <i class="fas fa-exclamation-triangle"></i> ${error.message || 'Une erreur est survenue'}
                        </div>
                    `;
                } finally {
                    submitBtn.disabled = false;
                    submitText.textContent = 'Réserver';
                    spinner.classList.add('hidden');
                }
            });
        });
    </script>
    
    <!-- Navigation Enhancements -->
    <script src="{{ asset('js/navigation-enhancements.js') }}"></script>
</body>
</html>