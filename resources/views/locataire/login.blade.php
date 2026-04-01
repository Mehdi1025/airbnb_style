<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Locataire - Casa Del Concierge</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">
    
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
            background: linear-gradient(135deg, rgba(255, 56, 92, 0.05) 0%, rgba(255, 56, 92, 0.02) 100%);
            color: var(--airbnb-black);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .login-container {
            width: 100%;
            max-width: 480px;
            position: relative;
        }
        
        .login-card {
            background: var(--airbnb-white);
            border-radius: 24px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            padding: 50px 40px;
            border: 1px solid var(--airbnb-light-gray);
            position: relative;
            overflow: hidden;
        }
        
        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--airbnb-pink) 0%, #e61e4d 100%);
        }
        
        .login-header {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .login-logo {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            margin-bottom: 20px;
            transition: transform 0.3s ease, opacity 0.3s ease;
        }
        
        .login-logo:hover {
            transform: scale(1.02);
            opacity: 0.92;
        }
        
        .login-logo img {
            height: 3rem;
            width: auto;
            max-height: 52px;
            object-fit: contain;
        }
        
        @media (max-width: 480px) {
            .login-logo img {
                height: 2.5rem;
                max-height: 48px;
            }
        }
        
        .login-title {
            font-size: 32px;
            font-weight: 700;
            color: var(--airbnb-black);
            margin-bottom: 10px;
        }
        
        .login-subtitle {
            color: var(--airbnb-dark-gray);
            font-size: 16px;
        }
        
        .error-message {
            background: #FEF2F2;
            border: 2px solid #DC2626;
            color: #DC2626;
            padding: 16px 20px;
            border-radius: 12px;
            margin-bottom: 25px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
            animation: shake 0.5s ease-out;
        }
        
        .error-message i {
            font-size: 18px;
            flex-shrink: 0;
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-8px); }
            75% { transform: translateX(8px); }
        }
        
        .form-group {
            margin-bottom: 24px;
        }
        
        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: var(--airbnb-black);
            margin-bottom: 10px;
            letter-spacing: 0.3px;
        }
        
        .input-wrapper {
            position: relative;
        }
        
        .input-wrapper i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--airbnb-dark-gray);
            font-size: 16px;
            pointer-events: none;
            z-index: 1;
        }
        
        .form-input {
            width: 100%;
            padding: 16px 18px 16px 50px;
            border: 2px solid var(--airbnb-light-gray);
            border-radius: 12px;
            font-size: 16px;
            font-weight: 400;
            color: var(--airbnb-black);
            background: var(--airbnb-white);
            transition: all 0.3s ease;
            font-family: inherit;
        }
        
        .form-input:focus {
            outline: none;
            border-color: var(--airbnb-pink);
            box-shadow: 0 0 0 4px rgba(255, 56, 92, 0.1);
        }
        
        .form-input:hover:not(:focus) {
            border-color: var(--airbnb-dark-gray);
        }
        
        .form-input.is-invalid {
            border-color: #DC2626;
            box-shadow: 0 0 0 4px rgba(220, 38, 38, 0.1);
        }
        
        .submit-button {
            background: linear-gradient(135deg, var(--airbnb-pink) 0%, #e61e4d 100%);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 16px 40px;
            width: 100%;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            box-shadow: 0 4px 15px rgba(255, 56, 92, 0.3);
            margin-top: 30px;
        }
        
        .submit-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }
        
        .submit-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 56, 92, 0.4);
        }
        
        .submit-button:hover::before {
            left: 100%;
        }
        
        .submit-button:active {
            transform: translateY(0);
        }
        
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: var(--airbnb-dark-gray);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            margin-top: 30px;
            transition: all 0.3s ease;
            padding: 10px 16px;
            border-radius: 10px;
            width: 100%;
            justify-content: center;
        }
        
        .back-link:hover {
            color: var(--airbnb-pink);
            background: var(--airbnb-bg-gray);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .login-card {
                padding: 40px 30px;
                border-radius: 20px;
            }
            
            .login-title {
                font-size: 28px;
            }
            
            .login-subtitle {
                font-size: 14px;
            }
        }
        
        @media (max-width: 480px) {
            body {
                padding: 15px;
            }
            
            .login-card {
                padding: 30px 25px;
            }
            
            .login-title {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <a href="{{ url('/') }}" class="login-logo" title="Casa Del Concierge — Accueil">
                    <img src="{{ asset('images/logo.png') }}" alt="Casa Del Concierge" width="200" height="56" loading="eager" decoding="async">
                </a>
                <h1 class="login-title">Connexion Locataire</h1>
                <p class="login-subtitle">Accédez à votre espace de gestion</p>
            </div>

            @if ($errors->any())
                <div class="error-message">
                    <i class="fas fa-exclamation-circle"></i>
                    <div>
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('locataire.login') }}">
                @csrf

                <div class="form-group">
                    <label for="email" class="form-label">
                        Adresse email
                    </label>
                    <div class="input-wrapper">
                        <i class="fas fa-envelope"></i>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            class="form-input {{ $errors->has('email') ? 'is-invalid' : '' }}"
                            value="{{ old('email') }}"
                            placeholder="votre.email@exemple.com"
                            required
                            autofocus
                        >
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">
                        Mot de passe
                    </label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock"></i>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            class="form-input {{ $errors->has('password') ? 'is-invalid' : '' }}"
                            placeholder="Votre mot de passe"
                            required
                        >
                    </div>
                </div>

                <button type="submit" class="submit-button">
                    <i class="fas fa-sign-in-alt"></i>
                    <span>Accéder à mon espace</span>
                </button>
            </form>

            <a href="{{ url('/') }}" class="back-link">
                <i class="fas fa-arrow-left"></i>
                <span>Retour à l'accueil</span>
            </a>
        </div>
    </div>
</body>
</html>
