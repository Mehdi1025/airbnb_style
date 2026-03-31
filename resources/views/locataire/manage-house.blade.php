<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Gérer {{ $house->description }} | Casa Del Concierge</title>
    <link rel="icon" href="{{ asset('images/logo.jpeg') }}" type="image/jpeg">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.jpeg') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <style>
        :root {
            --primary: #6366f1;
            --primary-light: #818cf8;
            --primary-dark: #4f46e5;
            --primary-gradient: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            --secondary: #64748b;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --bg-body: #f8fafc;
            --bg-card: #ffffff;
            --sidebar-width: 280px;
            --border-radius: 16px;
            --border-radius-lg: 24px;
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            color: #1e293b;
            min-height: 100vh;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 40px 24px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--secondary);
            text-decoration: none;
            font-weight: 600;
            font-size: 15px;
            margin-bottom: 32px;
            padding: 10px 16px;
            background: var(--bg-card);
            border-radius: 12px;
            box-shadow: var(--shadow-lg);
            transition: var(--transition);
            border: 1px solid rgba(226, 232, 240, 0.6);
        }

        .back-link:hover {
            color: var(--primary);
            transform: translateX(-4px);
            box-shadow: var(--shadow-xl);
        }

        .header-section {
            background: var(--bg-card);
            border-radius: var(--border-radius-lg);
            padding: 40px;
            margin-bottom: 32px;
            box-shadow: var(--shadow-lg);
            border: 1px solid rgba(226, 232, 240, 0.6);
        }

        .house-title {
            font-size: 36px;
            font-weight: 900;
            color: #1e293b;
            margin-bottom: 12px;
            letter-spacing: -1px;
            background: linear-gradient(135deg, #1e293b 0%, #475569 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .house-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 24px;
            margin-top: 24px;
            padding-top: 24px;
            border-top: 2px solid rgba(226, 232, 240, 0.6);
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 20px;
            background: linear-gradient(135deg, #f8fafc, #ffffff);
            border-radius: 12px;
            border: 2px solid rgba(226, 232, 240, 0.6);
        }

        .meta-item i {
            color: var(--primary);
            font-size: 18px;
        }

        .meta-label {
            font-size: 12px;
            color: var(--secondary);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .meta-value {
            font-size: 16px;
            font-weight: 700;
            color: #1e293b;
        }

        .gallery-section {
            background: var(--bg-card);
            border-radius: var(--border-radius-lg);
            padding: 32px;
            margin-bottom: 32px;
            box-shadow: var(--shadow-lg);
            border: 1px solid rgba(226, 232, 240, 0.6);
        }

        .section-title {
            font-size: 24px;
            font-weight: 800;
            color: #1e293b;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }

        .gallery-item {
            position: relative;
            border-radius: 16px;
            overflow: hidden;
            aspect-ratio: 1;
            box-shadow: var(--shadow-lg);
            transition: var(--transition);
            cursor: pointer;
        }

        .gallery-item:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: var(--shadow-xl);
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 24px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: var(--bg-card);
            border-radius: var(--border-radius-lg);
            padding: 28px;
            box-shadow: var(--shadow-lg);
            border: 1px solid rgba(226, 232, 240, 0.6);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--primary-gradient);
        }

        .stat-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-xl);
        }

        .stat-icon {
            width: 56px;
            height: 56px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 16px;
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.15), rgba(139, 92, 246, 0.15));
            color: var(--primary);
        }

        .stat-label {
            font-size: 13px;
            color: var(--secondary);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }

        .stat-value {
            font-size: 32px;
            font-weight: 900;
            color: #1e293b;
            line-height: 1.2;
        }

        .reservations-section {
            background: var(--bg-card);
            border-radius: var(--border-radius-lg);
            padding: 32px;
            margin-bottom: 32px;
            box-shadow: var(--shadow-lg);
            border: 1px solid rgba(226, 232, 240, 0.6);
        }

        .reservation-card {
            background: linear-gradient(135deg, #f8fafc, #ffffff);
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 20px;
            border: 2px solid rgba(226, 232, 240, 0.6);
            transition: var(--transition);
        }

        .reservation-card:hover {
            transform: translateX(8px);
            border-color: var(--primary);
            box-shadow: var(--shadow-lg);
        }

        .reservation-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 16px;
            flex-wrap: wrap;
            gap: 16px;
        }

        .reservation-user {
            font-size: 18px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 8px;
        }

        .reservation-dates {
            display: flex;
            gap: 24px;
            flex-wrap: wrap;
        }

        .date-box {
            padding: 12px 16px;
            background: white;
            border-radius: 10px;
            border: 2px solid rgba(226, 232, 240, 0.6);
        }

        .date-label {
            font-size: 11px;
            color: var(--secondary);
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 4px;
        }

        .date-value {
            font-size: 15px;
            font-weight: 700;
            color: #1e293b;
        }

        .status-badge {
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-pending {
            background: linear-gradient(135deg, #FFF4E6, #FFE8CC);
            color: #E67E22;
        }

        .status-confirmed {
            background: linear-gradient(135deg, #D4EDDA, #C3E6CB);
            color: #28A745;
        }

        .status-cancelled {
            background: linear-gradient(135deg, #F8D7DA, #F5C6CB);
            color: #DC3545;
        }

        .actions-section {
            background: var(--bg-card);
            border-radius: var(--border-radius-lg);
            padding: 32px;
            box-shadow: var(--shadow-lg);
            border: 1px solid rgba(226, 232, 240, 0.6);
        }

        .action-buttons {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 14px 28px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 15px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: var(--transition);
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: var(--primary-gradient);
            color: white;
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(99, 102, 241, 0.4);
        }

        .btn-danger {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
        }

        .btn-danger:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(239, 68, 68, 0.4);
        }

        .btn-secondary {
            background: white;
            color: var(--secondary);
            border: 2px solid rgba(226, 232, 240, 0.8);
        }

        .btn-secondary:hover {
            border-color: var(--primary);
            color: var(--primary);
            transform: translateY(-2px);
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: var(--secondary);
        }

        .empty-state i {
            font-size: 64px;
            margin-bottom: 20px;
            opacity: 0.3;
        }

        .empty-state-text {
            font-size: 18px;
            font-weight: 600;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px 16px;
            }

            .house-title {
                font-size: 28px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
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
        <a href="{{ route('locataire.dashboard') }}" class="back-link">
            <i class="fas fa-arrow-left"></i>
            Retour au dashboard
        </a>

        <!-- Header Section -->
        <div class="header-section">
            <h1 class="house-title">{{ $house->description }}</h1>
            <p style="color: var(--secondary); font-size: 16px; margin-bottom: 24px;">{{ $house->lieu_exact }}</p>
            
            <div class="house-meta">
                <div class="meta-item">
                    <i class="fas fa-home"></i>
                    <div>
                        <div class="meta-label">Type</div>
                        <div class="meta-value">{{ $house->formatted_type }}</div>
                    </div>
                </div>
                <div class="meta-item">
                    <i class="fas fa-ruler-combined"></i>
                    <div>
                        <div class="meta-label">Surface</div>
                        <div class="meta-value">{{ $house->surface }} m²</div>
                    </div>
                </div>
                <div class="meta-item">
                    <i class="fas fa-euro-sign"></i>
                    <div>
                        <div class="meta-label">Prix par nuit</div>
                        <div class="meta-value">{{ number_format($house->prix, 0, ',', ' ') }} €</div>
                    </div>
                </div>
                @if($house->price_breakfast)
                <div class="meta-item">
                    <i class="fas fa-coffee"></i>
                    <div>
                        <div class="meta-label">Petit-déj.</div>
                        <div class="meta-value">{{ number_format($house->price_breakfast, 0, ',', ' ') }} €</div>
                    </div>
                </div>
                @endif
                @if($house->price_love_room)
                <div class="meta-item">
                    <i class="fas fa-heart"></i>
                    <div>
                        <div class="meta-label">Ch. romantique</div>
                        <div class="meta-value">{{ number_format($house->price_love_room, 0, ',', ' ') }} €</div>
                    </div>
                </div>
                @endif
            </div>

            @if($house->additional_options && count($house->additional_options) > 0)
            <div style="margin-top: 24px; padding-top: 24px; border-top: 2px solid rgba(226, 232, 240, 0.6);">
                <h3 style="font-size: 18px; font-weight: 700; color: #1e293b; margin-bottom: 16px; display: flex; align-items: center; gap: 10px;">
                    <i class="fas fa-star" style="color: var(--primary);"></i>
                    Options supplémentaires
                </h3>
                <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 16px;">
                    @foreach($house->additional_options as $option)
                    <div class="meta-item">
                        <i class="fas fa-check-circle" style="color: var(--success);"></i>
                        <div>
                            <div class="meta-label">{{ $option['name'] }}</div>
                            <div class="meta-value">{{ number_format($option['price'], 0, ',', ' ') }} €</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>

        <!-- Gallery Section -->
        @if($house->photos && count($house->photos) > 0)
        <div class="gallery-section">
            <h2 class="section-title">
                <i class="fas fa-images" style="color: var(--primary);"></i>
                Galerie Photos
            </h2>
            <div class="gallery-grid">
                @foreach($house->photos as $photo)
                <div class="gallery-item">
                    <img src="{{ asset('storage/' . $photo) }}" alt="Photo du bien">
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Statistics Section -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div class="stat-label">Total Réservations</div>
                <div class="stat-value">{{ $totalReservations }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background: linear-gradient(135deg, rgba(16, 185, 129, 0.15), rgba(52, 211, 153, 0.15)); color: var(--success);">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-label">Confirmées</div>
                <div class="stat-value">{{ $confirmedReservations->count() }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background: linear-gradient(135deg, rgba(251, 191, 36, 0.15), rgba(252, 211, 77, 0.15)); color: var(--warning);">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-label">En attente</div>
                <div class="stat-value">{{ $pendingReservations->count() }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background: linear-gradient(135deg, rgba(16, 185, 129, 0.15), rgba(52, 211, 153, 0.15)); color: var(--success);">
                    <i class="fas fa-wallet"></i>
                </div>
                <div class="stat-label">Revenus totaux</div>
                <div class="stat-value">{{ number_format($totalRevenue, 0, ',', ' ') }} €</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background: linear-gradient(135deg, rgba(16, 185, 129, 0.15), rgba(52, 211, 153, 0.15)); color: var(--success);">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div class="stat-label">Revenus ce mois</div>
                <div class="stat-value">{{ number_format($currentMonthRevenue, 0, ',', ' ') }} €</div>
            </div>
        </div>

        <!-- Reservations Section -->
        <div class="reservations-section">
            <h2 class="section-title">
                <i class="fas fa-list" style="color: var(--primary);"></i>
                Réservations ({{ $totalReservations }})
            </h2>

            @if($reservations->count() > 0)
                @foreach($reservations as $reservation)
                <div class="reservation-card">
                    <div class="reservation-header">
                        <div style="flex: 1;">
                            <div class="reservation-user">
                                @if($reservation->user)
                                    {{ $reservation->user->first_name }} {{ $reservation->user->last_name }}
                                @else
                                    Utilisateur supprimé
                                @endif
                            </div>
                            <div class="reservation-dates">
                                <div class="date-box">
                                    <div class="date-label">Arrivée</div>
                                    <div class="date-value">{{ $reservation->start_date->format('d/m/Y') }}</div>
                                </div>
                                <div class="date-box">
                                    <div class="date-label">Départ</div>
                                    <div class="date-value">{{ $reservation->end_date->format('d/m/Y') }}</div>
                                </div>
                                <div class="date-box">
                                    <div class="date-label">Durée</div>
                                    <div class="date-value">{{ $reservation->start_date->diffInDays($reservation->end_date) }} nuit(s)</div>
                                </div>
                                <div class="date-box">
                                    <div class="date-label">Total</div>
                                    <div class="date-value" style="color: var(--primary);">
                                        {{ number_format($house->prix * $reservation->start_date->diffInDays($reservation->end_date), 0, ',', ' ') }} €
                                    </div>
                                </div>
                            </div>
                            @if($reservation->has_breakfast || $reservation->has_love_room || ($reservation->additional_options && count($reservation->additional_options) > 0))
                            <div style="margin-top: 16px; display: flex; gap: 12px; flex-wrap: wrap;">
                                @if($reservation->has_breakfast)
                                <span style="padding: 6px 12px; background: rgba(16, 185, 129, 0.1); color: var(--success); border-radius: 8px; font-size: 12px; font-weight: 600;">
                                    <i class="fas fa-coffee"></i> Petit-déjeuner
                                </span>
                                @endif
                                @if($reservation->has_love_room)
                                <span style="padding: 6px 12px; background: rgba(16, 185, 129, 0.1); color: var(--success); border-radius: 8px; font-size: 12px; font-weight: 600;">
                                    <i class="fas fa-heart"></i> Chambre romantique
                                </span>
                                @endif
                                @if($reservation->additional_options && count($reservation->additional_options) > 0)
                                    @foreach($reservation->additional_options as $option)
                                    <span style="padding: 6px 12px; background: rgba(16, 185, 129, 0.1); color: var(--success); border-radius: 8px; font-size: 12px; font-weight: 600;">
                                        <i class="fas fa-check-circle"></i> {{ $option['name'] }}
                                        @if($option['price'] > 0)
                                            (+{{ number_format($option['price'], 0, ',', ' ') }} €)
                                        @endif
                                    </span>
                                    @endforeach
                                @endif
                            </div>
                            @endif
                            @if($reservation->notes)
                            <div style="margin-top: 16px; padding: 12px; background: white; border-radius: 10px; border-left: 4px solid var(--primary);">
                                <div style="font-size: 11px; color: var(--secondary); font-weight: 600; text-transform: uppercase; margin-bottom: 6px;">Notes</div>
                                <div style="font-size: 14px; color: #1e293b;">{{ $reservation->notes }}</div>
                            </div>
                            @endif
                        </div>
                        <div>
                            <span class="status-badge status-{{ $reservation->status }}">
                                @if($reservation->status === 'pending')
                                    <i class="fas fa-clock"></i> En attente
                                @elseif($reservation->status === 'confirmed')
                                    <i class="fas fa-check-circle"></i> Confirmée
                                @else
                                    <i class="fas fa-times-circle"></i> Annulée
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
            <div class="empty-state">
                <i class="fas fa-calendar-times"></i>
                <div class="empty-state-text">Aucune réservation pour ce bien</div>
            </div>
            @endif
        </div>

        <!-- Actions Section -->
        <div class="actions-section">
            <h2 class="section-title">
                <i class="fas fa-cog" style="color: var(--primary);"></i>
                Actions
            </h2>
            <div class="action-buttons">
                <a href="{{ route('houses.edit', $house) }}" class="btn btn-primary">
                    <i class="fas fa-edit"></i>
                    Modifier le bien
                </a>
                <a href="{{ route('houses.show', $house) }}" class="btn btn-secondary" target="_blank">
                    <i class="fas fa-external-link-alt"></i>
                    Voir la page publique
                </a>
                <form method="POST" action="{{ route('houses.destroy', $house) }}" style="display: inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce bien ? Cette action est irréversible.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash"></i>
                        Supprimer le bien
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
