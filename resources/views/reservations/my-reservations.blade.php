<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mes Réservations - Casa Del Concierge</title>
    <link rel="icon" href="{{ asset('images/logo.jpeg') }}" type="image/jpeg">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.jpeg') }}">
    
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
            padding-top: 80px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        
        .page-header {
            margin-bottom: 40px;
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
        }
        
        .reservations-list {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }
        
        .reservation-card {
            background: var(--airbnb-white);
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(255, 56, 92, 0.1);
            transition: all 0.3s ease;
        }
        
        .reservation-card:hover {
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
            transform: translateY(-2px);
        }
        
        .reservation-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .reservation-info {
            flex: 1;
            min-width: 250px;
        }
        
        .house-title {
            font-size: 20px;
            font-weight: 600;
            color: var(--airbnb-black);
            margin-bottom: 8px;
        }
        
        .house-location {
            color: var(--airbnb-dark-gray);
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 12px;
        }
        
        .house-location i {
            font-size: 12px;
        }
        
        .reservation-dates {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            margin-top: 15px;
        }
        
        .date-item {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }
        
        .date-label {
            font-size: 12px;
            color: var(--airbnb-dark-gray);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .date-value {
            font-size: 16px;
            font-weight: 600;
            color: var(--airbnb-black);
        }
        
        .status-badge {
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        
        .status-pending {
            background: #FFF4E6;
            color: #E67E22;
        }
        
        .status-confirmed {
            background: #D4EDDA;
            color: #28A745;
        }
        
        .status-cancelled {
            background: #F8D7DA;
            color: #DC3545;
        }
        
        .reservation-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid var(--airbnb-light-gray);
        }
        
        .detail-item {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }
        
        .detail-label {
            font-size: 12px;
            color: var(--airbnb-dark-gray);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .detail-value {
            font-size: 16px;
            font-weight: 600;
            color: var(--airbnb-black);
        }
        
        .house-image {
            width: 120px;
            height: 120px;
            border-radius: 12px;
            object-fit: cover;
            flex-shrink: 0;
        }
        
        .reservation-actions {
            display: flex;
            gap: 12px;
            margin-top: 20px;
            flex-wrap: wrap;
        }
        
        .btn {
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }
        
        .btn-primary {
            background: var(--airbnb-pink);
            color: white;
        }
        
        .btn-primary:hover {
            background: #e61e4d;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(255, 56, 92, 0.3);
        }
        
        .btn-secondary {
            background: transparent;
            color: var(--airbnb-dark-gray);
            border: 1px solid var(--airbnb-light-gray);
        }
        
        .btn-secondary:hover {
            background: var(--airbnb-bg-gray);
            border-color: var(--airbnb-dark-gray);
        }
        
        .btn-danger {
            background: transparent;
            color: #DC3545;
            border: 1px solid #DC3545;
        }
        
        .btn-danger:hover {
            background: #DC3545;
            color: white;
        }
        
        .empty-state {
            text-align: center;
            padding: 80px 20px;
            background: var(--airbnb-white);
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }
        
        .empty-state i {
            font-size: 64px;
            color: var(--airbnb-light-gray);
            margin-bottom: 20px;
        }
        
        .empty-state h3 {
            font-size: 24px;
            font-weight: 600;
            color: var(--airbnb-black);
            margin-bottom: 10px;
        }
        
        .empty-state p {
            color: var(--airbnb-dark-gray);
            margin-bottom: 30px;
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
        
        .notes-section {
            margin-top: 15px;
            padding: 15px;
            background: var(--airbnb-bg-gray);
            border-radius: 8px;
        }
        
        .notes-label {
            font-size: 12px;
            color: var(--airbnb-dark-gray);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }
        
        .notes-content {
            font-size: 14px;
            color: var(--airbnb-black);
            line-height: 1.6;
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 20px 15px;
            }
            
            .reservation-header {
                flex-direction: column;
            }
            
            .house-image {
                width: 100%;
                height: 200px;
            }
            
            .reservation-details {
                grid-template-columns: 1fr;
            }
            
            .reservation-dates {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div style="text-align:center;margin-bottom:16px;">
            <a href="{{ url('/') }}" title="Casa Del Concierge — Accueil" style="display:inline-block;line-height:0;">
                <img src="{{ asset('images/logo.jpeg') }}" alt="Casa Del Concierge" style="height:2.75rem;max-height:48px;width:auto;object-fit:contain;">
            </a>
        </div>
        <a href="{{ route('welcome') }}" class="back-link">
            <i class="fas fa-arrow-left"></i>
            <span>Retour à l'accueil</span>
        </a>
        
        <div class="page-header">
            <h1 class="page-title">Mes Réservations</h1>
            <p class="page-subtitle">Consultez toutes vos réservations passées et à venir</p>
        </div>
        
        @if($reservations->count() > 0)
            <div class="reservations-list">
                @foreach($reservations as $reservation)
                    <div class="reservation-card">
                        <div class="reservation-header">
                            <div class="reservation-info">
                                <h3 class="house-title">{{ $reservation->house->description ?? 'Bien supprimé' }}</h3>
                                @if($reservation->house)
                                    <div class="house-location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span>{{ $reservation->house->lieu_exact }}</span>
                                    </div>
                                @endif
                                
                                <div class="reservation-dates">
                                    <div class="date-item">
                                        <span class="date-label">Arrivée</span>
                                        <span class="date-value">{{ $reservation->start_date->format('d/m/Y') }}</span>
                                    </div>
                                    <div class="date-item">
                                        <span class="date-label">Départ</span>
                                        <span class="date-value">{{ $reservation->end_date->format('d/m/Y') }}</span>
                                    </div>
                                    <div class="date-item">
                                        <span class="date-label">Durée</span>
                                        <span class="date-value">{{ $reservation->start_date->diffInDays($reservation->end_date) }} nuit(s)</span>
                                    </div>
                                </div>
                            </div>
                            
                            @if($reservation->house)
                                <img src="{{ $reservation->house->first_photo ? asset('storage/' . $reservation->house->first_photo) : 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=1170&q=80' }}" 
                                     alt="{{ $reservation->house->description }}" 
                                     class="house-image">
                            @endif
                        </div>
                        
                        <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px;">
                            <span class="status-badge status-{{ $reservation->status }}">
                                @if($reservation->status === 'pending')
                                    <i class="fas fa-clock"></i>
                                    En attente
                                @elseif($reservation->status === 'confirmed')
                                    <i class="fas fa-check-circle"></i>
                                    Confirmée
                                @else
                                    <i class="fas fa-times-circle"></i>
                                    Annulée
                                @endif
                            </span>
                        </div>
                        
                        <div class="reservation-details">
                            <div class="detail-item">
                                <span class="detail-label">Prix par nuit</span>
                                <span class="detail-value">{{ number_format($reservation->house->prix ?? 0, 0, ',', ' ') }} €</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Total</span>
                                <span class="detail-value">
                                    {{ number_format(($reservation->house->prix ?? 0) * $reservation->start_date->diffInDays($reservation->end_date), 0, ',', ' ') }} €
                                </span>
                            </div>
                            @if($reservation->has_breakfast)
                                <div class="detail-item">
                                    <span class="detail-label">Petit-déjeuner</span>
                                    <span class="detail-value">Inclus</span>
                                </div>
                            @endif
                            @if($reservation->has_love_room)
                                <div class="detail-item">
                                    <span class="detail-label">Chambre d'amour</span>
                                    <span class="detail-value">Inclus</span>
                                </div>
                            @endif
                            @if($reservation->additional_options && count($reservation->additional_options) > 0)
                                @foreach($reservation->additional_options as $option)
                                <div class="detail-item">
                                    <span class="detail-label">{{ $option['name'] }}</span>
                                    <span class="detail-value">
                                        @if($option['price'] > 0)
                                            +{{ number_format($option['price'], 0, ',', ' ') }} €
                                        @else
                                            Inclus
                                        @endif
                                    </span>
                                </div>
                                @endforeach
                            @endif
                        </div>
                        
                        @if($reservation->notes)
                            <div class="notes-section">
                                <div class="notes-label">Notes</div>
                                <div class="notes-content">{{ $reservation->notes }}</div>
                            </div>
                        @endif
                        
                        <div class="reservation-actions">
                            @if($reservation->house)
                                <a href="{{ route('houses.show', $reservation->house) }}" class="btn btn-secondary">
                                    <i class="fas fa-eye"></i>
                                    Voir le bien
                                </a>
                            @endif
                            
                            @if($reservation->status === 'pending' && $reservation->payment_status === 'pending')
                                <a href="{{ route('payment.show', $reservation) }}" class="btn btn-primary">
                                    <i class="fas fa-credit-card"></i>
                                    Payer maintenant
                                </a>
                                <a href="{{ route('reservations.edit', $reservation) }}" class="btn btn-secondary">
                                    <i class="fas fa-edit"></i>
                                    Modifier
                                </a>
                            @endif
                            
                            @if($reservation->status !== 'cancelled' && !($reservation->status === 'pending' && $reservation->payment_status === 'pending'))
                                <button onclick="cancelReservation({{ $reservation->id }})" class="btn btn-danger">
                                    <i class="fas fa-times"></i>
                                    Annuler
                                </button>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <i class="fas fa-calendar-times"></i>
                <h3>Aucune réservation</h3>
                <p>Vous n'avez pas encore effectué de réservation.</p>
                <a href="{{ route('houses.index') }}" class="btn btn-primary">
                    <i class="fas fa-search"></i>
                    Explorer nos biens
                </a>
            </div>
        @endif
    </div>
    
    <script>
        function cancelReservation(reservationId) {
            if (!confirm('Êtes-vous sûr de vouloir annuler cette réservation ?')) {
                return;
            }
            
            fetch(`/reservations/${reservationId}/cancel`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.message) {
                    alert(data.message);
                    location.reload();
                } else if (data.error) {
                    alert(data.error);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Une erreur est survenue lors de l\'annulation.');
            });
        }
    </script>
</body>
</html>

