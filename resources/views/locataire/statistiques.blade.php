<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Statistiques - Casa Del Concierge</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #333;
            overflow-x: hidden;
        }

        .container {
            max-width: 1600px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header */
        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 25px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2, #f093fb, #f5576c);
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .logo-mark {
            display: block;
            line-height: 0;
            flex-shrink: 0;
        }

        .logo-mark img {
            height: 56px;
            width: auto;
            max-height: 70px;
            object-fit: contain;
            display: block;
        }

        @media (max-width: 768px) {
            .logo-mark img {
                height: 44px;
                max-height: 52px;
            }
        }

        .logo-text h1 {
            font-size: 32px;
            font-weight: 800;
            color: #2c3e50;
            margin-bottom: 8px;
            background: linear-gradient(45deg, #2c3e50, #34495e);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .logo-text p {
            color: #7f8c8d;
            font-size: 16px;
            font-weight: 500;
        }

        .back-btn {
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            box-shadow: 0 8px 25px rgba(52, 152, 219, 0.3);
            font-size: 16px;
        }

        .back-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(52, 152, 219, 0.4);
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 25px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.4s ease;
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
            background: linear-gradient(90deg, var(--card-color-1), var(--card-color-2));
        }

        .stat-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }

        .stat-card.primary {
            --card-color-1: #667eea;
            --card-color-2: #764ba2;
        }

        .stat-card.success {
            --card-color-1: #27ae60;
            --card-color-2: #2ecc71;
        }

        .stat-card.warning {
            --card-color-1: #f39c12;
            --card-color-2: #e67e22;
        }

        .stat-card.info {
            --card-color-1: #3498db;
            --card-color-2: #2980b9;
        }

        .stat-card.danger {
            --card-color-1: #e74c3c;
            --card-color-2: #c0392b;
        }

        .stat-card.purple {
            --card-color-1: #9b59b6;
            --card-color-2: #8e44ad;
        }

        .stat-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 35px;
            color: white;
            background: linear-gradient(135deg, var(--card-color-1), var(--card-color-2));
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        .stat-value {
            font-size: 42px;
            font-weight: 800;
            color: #2c3e50;
            margin-bottom: 10px;
            background: linear-gradient(45deg, var(--card-color-1), var(--card-color-2));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stat-label {
            font-size: 16px;
            color: #7f8c8d;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .stat-change {
            font-size: 14px;
            color: #27ae60;
            font-weight: 600;
            margin-top: 8px;
        }

        /* Charts Section */
        .charts-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 40px;
        }

        .chart-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 25px;
            padding: 30px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .chart-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .chart-title {
            font-size: 22px;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 25px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f8f9fa;
        }

        .chart-container {
            position: relative;
            height: 350px;
            margin-top: 20px;
        }

        /* Tables Section */
        .tables-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 40px;
        }

        .table-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 25px;
            padding: 30px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .table-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .table-title {
            font-size: 22px;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 25px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f8f9fa;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table th,
        .data-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #e9ecef;
        }

        .data-table th {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            font-weight: 700;
            color: #2c3e50;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .data-table td {
            color: #7f8c8d;
            font-size: 15px;
            font-weight: 500;
        }

        .data-table tr:hover {
            background: linear-gradient(135deg, #f8f9fa, #ffffff);
            transform: scale(1.01);
            transition: all 0.2s ease;
        }

        .percentage-bar {
            width: 100%;
            height: 12px;
            background: #e9ecef;
            border-radius: 6px;
            overflow: hidden;
            position: relative;
        }

        .percentage-fill {
            height: 100%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 6px;
            transition: width 1s ease;
            position: relative;
        }

        .percentage-fill::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            animation: shimmer 2s infinite;
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        /* Additional Stats */
        .additional-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .metric-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .metric-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .metric-title {
            font-size: 18px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .metric-value {
            font-size: 28px;
            font-weight: 700;
            color: #667eea;
            margin-bottom: 8px;
        }

        .metric-description {
            color: #7f8c8d;
            font-size: 14px;
            line-height: 1.5;
        }

        /* Empty State */
        .empty-state {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 25px;
            padding: 80px 40px;
            text-align: center;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .empty-icon {
            font-size: 100px;
            margin-bottom: 30px;
            display: block;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-20px); }
            60% { transform: translateY(-10px); }
        }

        .empty-title {
            font-size: 28px;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .empty-desc {
            color: #7f8c8d;
            font-size: 18px;
            margin-bottom: 40px;
            line-height: 1.6;
        }

        .add-house-btn {
            background: linear-gradient(135deg, #ff6b6b, #ee5a24);
            color: white;
            border: none;
            padding: 18px 35px;
            border-radius: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            box-shadow: 0 8px 25px rgba(255, 107, 107, 0.3);
            font-size: 16px;
        }

        .add-house-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(255, 107, 107, 0.4);
        }

        /* Progress Bars */
        .progress-section {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 25px;
            padding: 30px;
            margin-bottom: 40px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .progress-title {
            font-size: 24px;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 25px;
            text-align: center;
        }

        .progress-item {
            margin-bottom: 20px;
        }

        .progress-label {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2c3e50;
        }

        .progress-bar {
            width: 100%;
            height: 15px;
            background: #e9ecef;
            border-radius: 8px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 8px;
            transition: width 1.5s ease;
            position: relative;
        }

        /* Responsive */
        @media (max-width: 1400px) {
            .charts-section,
            .tables-section {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }
            
            .header-content {
                flex-direction: column;
                text-align: center;
            }
            
            .stats-grid {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            }

            .chart-container {
                height: 300px;
            }

            .logo-text h1 {
                font-size: 28px;
            }
        }

        /* Animations */
        .fade-in {
            animation: fadeIn 0.8s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .slide-in-left {
            animation: slideInLeft 0.8s ease-out;
        }

        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .slide-in-right {
            animation: slideInRight 0.8s ease-out;
        }

        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(50px); }
            to { opacity: 1; transform: translateX(0); }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header fade-in">
            <div class="header-content">
                <div class="logo">
                    <a href="{{ url('/') }}" class="logo-mark" title="Casa Del Concierge — Accueil">
                        <img src="{{ asset('images/logo.png') }}" alt="Casa Del Concierge" width="180" height="56" loading="eager" decoding="async">
                    </a>
                    <div class="logo-text">
                        <h1>Tableau de Bord Analytique</h1>
                        <p>Analysez et optimisez votre portefeuille immobilier</p>
                    </div>
                </div>
                <a href="{{ route('locataire.dashboard') }}" class="back-btn">
                    ← Retour au Dashboard
                </a>
            </div>
        </div>

        @if($totalHouses > 0)
            <!-- Stats Cards -->
            <div class="stats-grid">
                <div class="stat-card primary slide-in-left">
                    <div class="stat-icon">🏠</div>
                    <div class="stat-value">{{ $totalHouses }}</div>
                    <div class="stat-label">Total des Biens</div>
                    <div class="stat-change">+{{ $totalHouses > 0 ? round(($totalHouses / 10) * 100, 1) : 0 }}% ce mois</div>
                </div>
                
                <div class="stat-card success slide-in-left">
                    <div class="stat-icon">📷</div>
                    <div class="stat-value">{{ $totalPhotos }}</div>
                    <div class="stat-label">Total des Photos</div>
                    <div class="stat-change">+{{ $totalPhotos > 0 ? round(($totalPhotos / 20) * 100, 1) : 0 }}% ce mois</div>
                </div>
                
                <div class="stat-card warning slide-in-left">
                    <div class="stat-icon">💰</div>
                    <div class="stat-value">{{ number_format($prixMoyen, 0, ',', ' ') }}€</div>
                    <div class="stat-label">Prix Moyen</div>
                    <div class="stat-change">+{{ $prixMoyen > 0 ? round(($prixMoyen / 2000) * 100, 1) : 0 }}% vs marché</div>
                </div>
                
                <div class="stat-card info slide-in-left">
                    <div class="stat-icon">📐</div>
                    <div class="stat-value">{{ $surfaceMoyenne }}m²</div>
                    <div class="stat-label">Surface Moyenne</div>
                    <div class="stat-change">+{{ $surfaceMoyenne > 0 ? round(($surfaceMoyenne / 100) * 100, 1) : 0 }}% vs standard</div>
                </div>

                <div class="stat-card danger slide-in-left">
                    <div class="stat-icon">📈</div>
                    <div class="stat-value">{{ $prixMax }}€</div>
                    <div class="stat-label">Prix Maximum</div>
                    <div class="stat-change">Bien premium</div>
                </div>

                <div class="stat-card purple slide-in-left">
                    <div class="stat-icon">📉</div>
                    <div class="stat-value">{{ $prixMin }}€</div>
                    <div class="stat-label">Prix Minimum</div>
                    <div class="stat-change">Bien accessible</div>
                </div>
            </div>

            <!-- Progress Section -->
            <div class="progress-section slide-in-right">
                <h3 class="progress-title">📊 Répartition de votre portefeuille</h3>
                <div class="progress-item">
                    <div class="progress-label">
                        <span>Biens avec photos</span>
                        <span>{{ $totalHouses > 0 ? round(($totalPhotos / $totalHouses), 1) : 0 }} photos/bien</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: {{ $totalHouses > 0 ? min(100, ($totalPhotos / ($totalHouses * 5)) * 100) : 0 }}%"></div>
                    </div>
                </div>
                <div class="progress-item">
                    <div class="progress-label">
                        <span>Couverture photographique</span>
                        <span>{{ $totalHouses > 0 ? round(($totalPhotos / ($totalHouses * 5)) * 100, 1) : 0 }}%</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: {{ $totalHouses > 0 ? min(100, ($totalPhotos / ($totalHouses * 5)) * 100) : 0 }}%"></div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="charts-section">
                <div class="chart-card slide-in-left">
                    <h3 class="chart-title">📊 Répartition par type de logement</h3>
                    <div class="chart-container">
                        <canvas id="typeChart"></canvas>
                    </div>
                </div>
                
                <div class="chart-card slide-in-right">
                    <h3 class="chart-title">💰 Répartition par tranche de prix</h3>
                    <div class="chart-container">
                        <canvas id="prixChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Additional Charts -->
            <div class="charts-section">
                <div class="chart-card slide-in-left">
                    <h3 class="chart-title">📏 Répartition par surface</h3>
                    <div class="chart-container">
                        <canvas id="surfaceChart"></canvas>
                    </div>
                </div>
                
                <div class="chart-card slide-in-right">
                    <h3 class="chart-title">📈 Évolution des prix</h3>
                    <div class="chart-container">
                        <canvas id="evolutionChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Tables Section -->
            <div class="tables-section">
                <div class="table-card slide-in-left">
                    <h3 class="table-title">📏 Répartition détaillée par surface</h3>
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Tranche</th>
                                <th>Nombre</th>
                                <th>Pourcentage</th>
                                <th>Barre</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tranchesSurface as $tranche => $count)
                                <tr>
                                    <td><strong>{{ $tranche }}</strong></td>
                                    <td>{{ $count }}</td>
                                    <td>{{ $totalHouses > 0 ? round(($count / $totalHouses) * 100, 1) : 0 }}%</td>
                                    <td>
                                        <div class="percentage-bar">
                                            <div class="percentage-fill" style="width: {{ $totalHouses > 0 ? ($count / $totalHouses) * 100 : 0 }}%"></div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="table-card slide-in-right">
                    <h3 class="table-title">💎 Statistiques avancées</h3>
                    <table class="data-table">
                        <tbody>
                            <tr>
                                <td><strong>Prix le plus élevé</strong></td>
                                <td>{{ number_format($prixMax, 0, ',', ' ') }}€</td>
                            </tr>
                            <tr>
                                <td><strong>Prix le plus bas</strong></td>
                                <td>{{ number_format($prixMin, 0, ',', ' ') }}€</td>
                            </tr>
                            <tr>
                                <td><strong>Surface la plus grande</strong></td>
                                <td>{{ $surfaceMax }}m²</td>
                            </tr>
                            <tr>
                                <td><strong>Surface la plus petite</strong></td>
                                <td>{{ $surfaceMin }}m²</td>
                            </tr>
                            <tr>
                                <td><strong>Photos par maison</strong></td>
                                <td>{{ $totalHouses > 0 ? round($totalPhotos / $totalHouses, 1) : 0 }}</td>
                            </tr>
                            <tr>
                                <td><strong>Écart de prix</strong></td>
                                <td>{{ number_format($prixMax - $prixMin, 0, ',', ' ') }}€</td>
                            </tr>
                            <tr>
                                <td><strong>Écart de surface</strong></td>
                                <td>{{ $surfaceMax - $surfaceMin }}m²</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Additional Metrics -->
            <div class="additional-stats">
                <div class="metric-card slide-in-left">
                    <div class="metric-title">🎯 Performance du portefeuille</div>
                    <div class="metric-value">{{ $totalHouses > 0 ? round(($prixMoyen / 1000) * 100, 1) : 0 }}%</div>
                    <div class="metric-description">Rendement moyen par bien par rapport au marché local</div>
                </div>

                <div class="metric-card slide-in-left">
                    <div class="metric-title">📊 Diversification</div>
                    <div class="metric-value">{{ count($repartitionType) }}/6</div>
                    <div class="metric-description">Types de logements différents dans votre portefeuille</div>
                </div>

                <div class="metric-card slide-in-left">
                    <div class="metric-title">💰 Stratégie tarifaire</div>
                    <div class="metric-value">{{ $totalHouses > 0 ? round((($prixMax - $prixMin) / $prixMoyen) * 100, 1) : 0 }}%</div>
                    <div class="metric-description">Écart de prix relatif pour optimiser vos revenus</div>
                </div>

                <div class="metric-card slide-in-left">
                    <div class="metric-title">📸 Qualité des annonces</div>
                    <div class="metric-value">{{ $totalHouses > 0 ? round(($totalPhotos / ($totalHouses * 5)) * 100, 1) : 0 }}%</div>
                    <div class="metric-description">Couverture photographique de vos biens</div>
                </div>
            </div>
        @else
            <!-- Empty State -->
            <div class="empty-state fade-in">
                <span class="empty-icon">📊</span>
                <h2 class="empty-title">Aucune donnée à analyser</h2>
                <p class="empty-desc">Vous n'avez pas encore ajouté de maison. Commencez par ajouter votre premier bien immobilier pour voir des statistiques détaillées et des graphiques interactifs !</p>
                <a href="{{ route('locataire.dashboard') }}" class="add-house-btn">
                    🏠 Ajouter ma première maison
                </a>
            </div>
        @endif
    </div>

    @if($totalHouses > 0)
        <script>
            // Configuration des couleurs pour les graphiques
            const colors = [
                '#667eea', '#764ba2', '#f093fb', '#f5576c', '#4facfe',
                '#00f2fe', '#43e97b', '#38f9d7', '#fa7093', '#fee140',
                '#a8edea', '#fed6e3', '#ffecd2', '#fcb69f', '#ff9a9e'
            ];

            // Graphique des types (Donut 3D)
            const typeCtx = document.getElementById('typeChart').getContext('2d');
            new Chart(typeCtx, {
                type: 'doughnut',
                data: {
                    labels: @json($chartData['types']),
                    datasets: [{
                        data: @json($chartData['typesCount']),
                        backgroundColor: colors.slice(0, @json($chartData['types'])->count()),
                        borderWidth: 3,
                        borderColor: '#fff',
                        hoverBorderWidth: 5,
                        hoverBorderColor: '#fff'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                padding: 20,
                                usePointStyle: true,
                                font: {
                                    size: 14,
                                    weight: '600'
                                }
                            }
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0,0,0,0.8)',
                            titleColor: '#fff',
                            bodyColor: '#fff',
                            borderColor: '#667eea',
                            borderWidth: 2,
                            cornerRadius: 10
                        }
                    },
                    animation: {
                        animateRotate: true,
                        animateScale: true,
                        duration: 2000
                    }
                }
            });

            // Graphique des tranches de prix (Barres 3D)
            const prixCtx = document.getElementById('prixChart').getContext('2d');
            new Chart(prixCtx, {
                type: 'bar',
                data: {
                    labels: @json($chartData['tranchesPrix']),
                    datasets: [{
                        label: 'Nombre de maisons',
                        data: @json($chartData['tranchesPrixCount']),
                        backgroundColor: colors.slice(0, @json($chartData['tranchesPrix'])->count()).map(color => color + '80'),
                        borderColor: colors.slice(0, @json($chartData['tranchesPrix'])->count()),
                        borderWidth: 3,
                        borderRadius: 10,
                        borderSkipped: false,
                        hoverBackgroundColor: colors.slice(0, @json($chartData['tranchesPrix'])->count())
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0,0,0,0.8)',
                            titleColor: '#fff',
                            bodyColor: '#fff',
                            borderColor: '#667eea',
                            borderWidth: 2,
                            cornerRadius: 10
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1,
                                font: {
                                    weight: '600'
                                }
                            },
                            grid: {
                                color: 'rgba(0,0,0,0.1)'
                            }
                        },
                        x: {
                            ticks: {
                                font: {
                                    weight: '600'
                                }
                            },
                            grid: {
                                display: false
                            }
                        }
                    },
                    animation: {
                        duration: 2000,
                        easing: 'easeInOutQuart'
                    }
                }
            });

            // Graphique des surfaces (Ligne avec zones)
            const surfaceCtx = document.getElementById('surfaceChart').getContext('2d');
            new Chart(surfaceCtx, {
                type: 'line',
                data: {
                    labels: @json($chartData['tranchesSurface']),
                    datasets: [{
                        label: 'Nombre de maisons',
                        data: @json($chartData['tranchesSurfaceCount']),
                        borderColor: '#667eea',
                        backgroundColor: 'rgba(102, 126, 234, 0.1)',
                        borderWidth: 4,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#667eea',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 3,
                        pointRadius: 8,
                        pointHoverRadius: 12
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0,0,0,0.8)',
                            titleColor: '#fff',
                            bodyColor: '#fff',
                            borderColor: '#667eea',
                            borderWidth: 2,
                            cornerRadius: 10
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1,
                                font: {
                                    weight: '600'
                                }
                            },
                            grid: {
                                color: 'rgba(0,0,0,0.1)'
                            }
                        },
                        x: {
                            ticks: {
                                font: {
                                    weight: '600'
                                }
                            },
                            grid: {
                                display: false
                            }
                        }
                    },
                    animation: {
                        duration: 2000,
                        easing: 'easeInOutQuart'
                    }
                }
            });

            // Graphique d'évolution (Radar)
            const evolutionCtx = document.getElementById('evolutionChart').getContext('2d');
            new Chart(evolutionCtx, {
                type: 'radar',
                data: {
                    labels: ['Prix', 'Surface', 'Photos', 'Types', 'Qualité'],
                    datasets: [{
                        label: 'Votre portefeuille',
                        data: [
                            {{ $totalHouses > 0 ? min(100, ($prixMoyen / 2000) * 100) : 0 }},
                            {{ $totalHouses > 0 ? min(100, ($surfaceMoyenne / 100) * 100) : 0 }},
                            {{ $totalHouses > 0 ? min(100, ($totalPhotos / ($totalHouses * 5)) * 100) : 0 }},
                            {{ min(100, (count($repartitionType) / 6) * 100) }},
                            {{ $totalHouses > 0 ? min(100, ($totalPhotos / ($totalHouses * 3)) * 100) : 0 }}
                        ],
                        backgroundColor: 'rgba(102, 126, 234, 0.2)',
                        borderColor: '#667eea',
                        borderWidth: 3,
                        pointBackgroundColor: '#667eea',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2,
                        pointRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0,0,0,0.8)',
                            titleColor: '#fff',
                            bodyColor: '#fff',
                            borderColor: '#667eea',
                            borderWidth: 2,
                            cornerRadius: 10
                        }
                    },
                    scales: {
                        r: {
                            beginAtZero: true,
                            max: 100,
                            ticks: {
                                stepSize: 20,
                                font: {
                                    weight: '600'
                                }
                            },
                            grid: {
                                color: 'rgba(0,0,0,0.1)'
                            },
                            pointLabels: {
                                font: {
                                    weight: '600',
                                    size: 12
                                }
                            }
                        }
                    },
                    animation: {
                        duration: 2000,
                        easing: 'easeInOutQuart'
                    }
                }
            });

            // Animation des barres de pourcentage
            setTimeout(() => {
                const percentageBars = document.querySelectorAll('.percentage-fill');
                percentageBars.forEach(bar => {
                    const width = bar.style.width;
                    bar.style.width = '0%';
                    setTimeout(() => {
                        bar.style.width = width;
                    }, 500);
                });
            }, 1000);

            // Animation des cartes de statistiques
            const statCards = document.querySelectorAll('.stat-card');
            statCards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
            });
        </script>
    @endif
</body>
</html>
