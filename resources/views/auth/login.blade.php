<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion - Casa Del Concierge</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cereal:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
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

        body {
            background-color: var(--airbnb-white);
            color: var(--airbnb-black);
            line-height: 1.6;
        }

        .auth-container {
            display: flex;
            min-height: 100vh;
            width: 100%;
            justify-content: center;
            align-items: center;
            background-color: var(--airbnb-white);
            padding: 2rem;
        }

        .auth-form-container {
            width: 100%;
            max-width: 450px;
            margin: 0 auto;
        }

        .auth-form {
            max-width: 400px;
            width: 100%;
            padding: 2.5rem;
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .auth-logo {
            text-align: center;
            margin-bottom: 2rem;
        }

        .auth-logo a {
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .auth-logo img {
            height: 2.5rem;
            width: auto;
            object-fit: contain;
            border: none;
            box-shadow: none;
            background: transparent;
        }

        @media (min-width: 768px) {
            .auth-logo img {
                height: 3rem;
            }
        }

        .auth-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--airbnb-black);
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--airbnb-black);
        }

        .form-input {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 1px solid var(--airbnb-light-gray);
            border-radius: 8px;
            font-size: 0.9375rem;
            color: var(--airbnb-black);
            transition: all 0.2s ease;
            background-color: white;
        }

        .form-input:focus {
            border-color: var(--airbnb-black);
            box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.1);
            outline: none;
        }

        .form-input::placeholder {
            color: #a0a0a0;
        }

        .auth-btn {
            width: 100%;
            padding: 0.875rem 1.5rem;
            background: linear-gradient(to right, #E61E4D 0%, #E31C5F 50%, #D70466 100%);
            color: white;
            font-weight: 600;
            font-size: 1rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
            margin-top: 0.5rem;
        }

        .auth-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(230, 30, 77, 0.2);
        }


        .divider {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
            color: var(--airbnb-dark-gray);
            font-size: 0.875rem;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background-color: var(--airbnb-light-gray);
        }

        .divider::before {
            margin-right: 1rem;
        }

        .divider::after {
            margin-left: 1rem;
        }

        .form-footer {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.9375rem;
            color: var(--airbnb-dark-gray);
        }

        .form-footer a {
            color: var(--airbnb-black);
            font-weight: 500;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .form-footer a:hover {
            color: var(--airbnb-pink);
            text-decoration: underline;
        }

        .forgot-password {
            display: block;
            text-align: right;
            font-size: 0.875rem;
            color: var(--airbnb-dark-gray);
            margin-top: 0.5rem;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .forgot-password:hover {
            color: var(--airbnb-pink);
            text-decoration: underline;
        }

        .remember-me {
            display: flex;
            align-items: center;
            margin: 1rem 0;
        }

        .remember-me input {
            margin-right: 0.5rem;
        }

        .remember-me label {
            font-size: 0.9375rem;
            color: var(--airbnb-black);
        }

        /* Responsive */
        @media (min-width: 1024px) {
            .auth-form {
                padding: 3rem;
                max-width: 500px;
                margin: 0 auto;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
                border-radius: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="auth-form-container">
            <div class="auth-form">
                <div class="auth-logo">
                    <a href="{{ url('/') }}" title="Casa Del Concierge — Accueil">
                        <img src="{{ asset('images/logo.png') }}" alt="Casa Del Concierge" loading="eager" decoding="async">
                    </a>
                </div>
                <h1 class="auth-title">Bienvenue</h1>

                @if ($errors->any())
                    <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-r">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li class="text-sm">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf
                    
                    <div class="form-group">
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            value="{{ old('email') }}"
                            class="form-input"
                            placeholder="Adresse e-mail"
                            required
                            autofocus
                        >
                    </div>

                    <div class="form-group">
                        <input 
                            type="password" 
                            id="password" 
                            name="password"
                            class="form-input"
                            placeholder="Mot de passe"
                            required
                        >
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="forgot-password">
                                Mot de passe oublié ?
                            </a>
                        @endif
                    </div>

                    <div class="remember-me">
                        <input 
                            type="checkbox" 
                            id="remember" 
                            name="remember"
                            class="h-4 w-4 text-airbnb-pink focus:ring-airbnb-pink border-gray-300 rounded"
                            {{ old('remember') ? 'checked' : '' }}
                        >
                        <label for="remember">
                            Se souvenir de moi
                        </label>
                    </div>

                    <button type="submit" class="auth-btn">
                        Se connecter
                    </button>
                </form>

                <div class="form-footer">
                    <p>
                        Pas encore de compte ?
                        <a href="{{ route('register') }}">
                            S'inscrire
                        </a>
                    </p>
                </div>

            <div class="text-center mt-4">
                <a href="{{ url('/') }}" class="text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] text-sm">
                    ← Retour à l'accueil
                </a>
            </div>
            </div>
        </div>
    </div>
</body>
</html>
