<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Devenir Locataire Partenaire - Casa Del Concierge</title>
    
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
        }
        
        /* Header */
        .page-header {
            background: linear-gradient(135deg, var(--airbnb-pink) 0%, #e61e4d 100%);
            color: white;
            padding: 100px 0 80px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .page-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            border-radius: 50%;
        }
        
        .page-header::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -5%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            border-radius: 50%;
        }
        
        .page-header-content {
            position: relative;
            z-index: 1;
            max-width: 800px;
            margin: 0 auto;
            padding: 0 40px;
        }
        
        .page-header h1 {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
        }
        
        .page-header h1 i {
            font-size: 52px;
        }
        
        .page-header p {
            font-size: 20px;
            opacity: 0.95;
            line-height: 1.6;
        }
        
        /* Container */
        .main-container {
            max-width: 900px;
            margin: -60px auto 80px;
            padding: 0 40px;
            position: relative;
            z-index: 10;
        }
        
        /* Breadcrumb */
        .breadcrumb {
            margin-bottom: 30px;
            padding-top: 20px;
        }
        
        .breadcrumb a {
            color: var(--airbnb-dark-gray);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        
        .breadcrumb a:hover {
            color: var(--airbnb-pink);
        }
        
        .breadcrumb span {
            color: var(--airbnb-dark-gray);
            font-size: 14px;
        }
        
        /* Form Card */
        .form-card {
            background: var(--airbnb-white);
            border-radius: 24px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            padding: 50px;
            border: 1px solid var(--airbnb-light-gray);
        }
        
        /* Messages */
        .success-message {
            background: linear-gradient(135deg, #F0FDF4 0%, #DCFCE7 100%);
            border: 2px solid #22C55E;
            color: #166534;
            padding: 24px 30px;
            border-radius: 16px;
            margin-bottom: 40px;
            text-align: center;
            animation: slideDown 0.5s ease-out;
        }
        
        .success-message i {
            font-size: 32px;
            margin-bottom: 12px;
            display: block;
            color: #22C55E;
        }
        
        .error-message {
            background: #FEF2F2;
            border: 2px solid #DC2626;
            color: #DC2626;
            padding: 24px 30px;
            border-radius: 16px;
            margin-bottom: 40px;
            animation: shake 0.5s ease-out;
        }
        
        .error-message ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        
        .error-message li {
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .error-message li:before {
            content: '⚠️';
            font-size: 18px;
        }
        
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-8px); }
            75% { transform: translateX(8px); }
        }
        
        /* Form Sections */
        .form-section {
            margin-bottom: 50px;
        }
        
        .form-section:last-of-type {
            margin-bottom: 0;
        }
        
        .section-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 12px;
        }
        
        .section-header i {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, rgba(255, 56, 92, 0.1) 0%, rgba(255, 56, 92, 0.05) 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--airbnb-pink);
            font-size: 24px;
        }
        
        .section-title {
            font-size: 28px;
            font-weight: 700;
            color: var(--airbnb-black);
        }
        
        .section-subtitle {
            color: var(--airbnb-dark-gray);
            font-size: 16px;
            margin-bottom: 35px;
            margin-left: 65px;
            line-height: 1.6;
        }
        
        /* Form Groups */
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }
        
        .form-group {
            margin-bottom: 28px;
        }
        
        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: var(--airbnb-black);
            margin-bottom: 10px;
            letter-spacing: 0.3px;
        }
        
        .form-label .required {
            color: var(--airbnb-pink);
            margin-left: 4px;
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
        
        .form-textarea {
            min-height: 150px;
            resize: vertical;
            padding: 18px;
            padding-left: 50px;
            line-height: 1.6;
        }
        
        /* Requirements Box */
        .requirements-box {
            background: linear-gradient(135deg, var(--airbnb-bg-gray) 0%, #f0f0f0 100%);
            border: 2px solid var(--airbnb-light-gray);
            border-radius: 16px;
            padding: 30px;
            margin-bottom: 40px;
        }
        
        .requirements-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--airbnb-black);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .requirements-title i {
            color: var(--airbnb-pink);
            font-size: 24px;
        }
        
        .requirement-item {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
            color: var(--airbnb-black);
            font-size: 15px;
        }
        
        .requirement-item:last-child {
            margin-bottom: 0;
        }
        
        .requirement-item i {
            color: #22C55E;
            font-size: 18px;
            width: 24px;
            flex-shrink: 0;
        }
        
        /* Submit Section */
        .submit-section {
            border-top: 2px solid var(--airbnb-light-gray);
            padding-top: 40px;
            margin-top: 50px;
        }
        
        .submit-button {
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
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            box-shadow: 0 4px 15px rgba(255, 56, 92, 0.3);
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
        
        .submit-note {
            text-align: center;
            color: var(--airbnb-dark-gray);
            font-size: 14px;
            margin-top: 20px;
            line-height: 1.6;
        }
        
        /* Back Link */
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: var(--airbnb-dark-gray);
            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
            margin-top: 40px;
            transition: all 0.3s ease;
            padding: 12px 20px;
            border-radius: 10px;
        }
        
        .back-link:hover {
            color: var(--airbnb-pink);
            background: var(--airbnb-bg-gray);
        }
        
        /* Progress Bar */
        .progress-bar {
            background: var(--airbnb-bg-gray);
            height: 6px;
            border-radius: 3px;
            margin-bottom: 40px;
            overflow: hidden;
        }
        
        .progress-fill {
            background: linear-gradient(90deg, var(--airbnb-pink) 0%, #e61e4d 100%);
            height: 100%;
            width: 100%;
            border-radius: 3px;
            animation: progressFill 1.5s ease-out;
        }
        
        @keyframes progressFill {
            from { width: 0%; }
            to { width: 100%; }
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .page-header {
                padding: 60px 0 50px;
            }
            
            .page-header h1 {
                font-size: 32px;
                flex-direction: column;
                gap: 10px;
            }
            
            .page-header h1 i {
                font-size: 40px;
            }
            
            .page-header p {
                font-size: 16px;
            }
            
            .main-container {
                margin: -40px auto 60px;
                padding: 0 20px;
            }
            
            .form-card {
                padding: 35px 25px;
                border-radius: 20px;
            }
            
            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }
            
            .section-title {
                font-size: 24px;
            }
            
            .section-subtitle {
                margin-left: 0;
                margin-top: 10px;
            }
            
            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .section-header i {
                width: 45px;
                height: 45px;
                font-size: 20px;
            }
        }
        
        @media (max-width: 480px) {
            .page-header-content {
                padding: 0 20px;
            }
            
            .form-card {
                padding: 25px 20px;
            }
        }
        
        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .form-section {
            animation: fadeInUp 0.6s ease-out;
        }
        
        .form-section:nth-child(1) { animation-delay: 0.1s; }
        .form-section:nth-child(2) { animation-delay: 0.2s; }
        .form-section:nth-child(3) { animation-delay: 0.3s; }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="page-header">
        <div class="page-header-content">
            <h1>
                <i class="fas fa-home"></i>
                <span>Devenez Locataire Partenaire</span>
            </h1>
            <p>Rejoignez notre communauté de locataires de confiance et proposez vos biens d'exception pour offrir des expériences inoubliables</p>
        </div>
    </div>

    <!-- Main Container -->
    <div class="main-container">
        <!-- Breadcrumb -->
        <div class="breadcrumb">
            <a href="/">Accueil</a> <span>&gt;</span> <span>Demande de partenariat locataire</span>
        </div>

        <!-- Form Card -->
        <div class="form-card">
            <!-- Progress Bar -->
            <div class="progress-bar">
                <div class="progress-fill"></div>
            </div>

            <!-- Success Message -->
            @if (session('success'))
                <div class="success-message">
                    <i class="fas fa-check-circle"></i>
                    <div style="font-size: 18px; font-weight: 600; margin-bottom: 8px;">{{ session('success') }}</div>
                    <div style="font-size: 14px; opacity: 0.8;">
                        Nous examinerons votre demande dans les plus brefs délais et vous contacterons rapidement.
                    </div>
                </div>
            @endif

            <!-- Error Message -->
            @if ($errors->any())
                <div class="error-message">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form -->
            <form method="POST" action="{{ route('demande-location.store') }}">
                @csrf
                
                <!-- Informations Personnelles -->
                <div class="form-section">
                    <div class="section-header">
                        <i class="fas fa-user"></i>
                        <h2 class="section-title">Informations personnelles</h2>
                    </div>
                    <p class="section-subtitle">
                        Ces informations nous aideront à mieux vous connaître et à traiter votre demande efficacement.
                    </p>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label" for="first_name">
                                Prénom <span class="required">*</span>
                            </label>
                            <div class="input-wrapper">
                                <i class="fas fa-user"></i>
                                <input type="text" 
                                       id="first_name" 
                                       name="first_name" 
                                       class="form-input" 
                                       value="{{ old('first_name') }}" 
                                       placeholder="Votre prénom"
                                       required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="last_name">
                                Nom <span class="required">*</span>
                            </label>
                            <div class="input-wrapper">
                                <i class="fas fa-user"></i>
                                <input type="text" 
                                       id="last_name" 
                                       name="last_name" 
                                       class="form-input" 
                                       value="{{ old('last_name') }}" 
                                       placeholder="Votre nom"
                                       required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="birth_date">
                            Date de naissance <span class="required">*</span>
                        </label>
                        <div class="input-wrapper">
                            <i class="fas fa-calendar-alt"></i>
                            <input type="date" 
                                   id="birth_date" 
                                   name="birth_date" 
                                   class="form-input" 
                                   value="{{ old('birth_date') }}" 
                                   required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="email">
                            Adresse email <span class="required">*</span>
                        </label>
                        <div class="input-wrapper">
                            <i class="fas fa-envelope"></i>
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   class="form-input" 
                                   value="{{ old('email') }}" 
                                   placeholder="votre.email@exemple.com"
                                   required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="password">
                            Mot de passe <span class="required">*</span>
                        </label>
                        <div class="input-wrapper">
                            <i class="fas fa-lock"></i>
                            <input type="password" 
                                   id="password" 
                                   name="password" 
                                   class="form-input" 
                                   placeholder="Choisissez un mot de passe sécurisé (min. 8 caractères)"
                                   required
                                   minlength="8">
                        </div>
                    </div>
                </div>

                <!-- Vos Biens Immobiliers -->
                <div class="form-section">
                    <div class="section-header">
                        <i class="fas fa-building"></i>
                        <h2 class="section-title">Vos biens immobiliers</h2>
                    </div>
                    <p class="section-subtitle">
                        Décrivez les biens que vous souhaitez proposer à la location. Plus vous serez précis, plus nous pourrons vous accompagner efficacement.
                    </p>

                    <div class="form-group">
                        <label class="form-label" for="biens_list">
                            Description de vos biens <span class="required">*</span>
                        </label>
                        <div class="input-wrapper">
                            <i class="fas fa-home" style="top: 20px;"></i>
                            <textarea id="biens_list" 
                                      name="biens_list" 
                                      class="form-input form-textarea" 
                                      placeholder="Exemple: 

🏠 Appartement 3 pièces 75m² à Paris 11ème
• Balcon, parking, proche métro
• État excellent, rénové en 2020

🏡 Maison 4 pièces 120m² à Marseille
• Jardin, garage, vue mer
• Équipements modernes

N'hésitez pas à mentionner:
• Type et surface des biens
• Localisation précise
• Équipements particuliers
• État général
• Votre expérience en location"
                                      required>{{ old('biens_list') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Critères de Sélection -->
                <div class="requirements-box">
                    <h3 class="requirements-title">
                        <i class="fas fa-info-circle"></i>
                        Critères de sélection
                    </h3>
                    <div class="requirement-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Biens situés dans des zones attractives et bien desservies</span>
                    </div>
                    <div class="requirement-item">
                        <i class="fas fa-check-circle"></i>
                        <span>État général satisfaisant et conformité aux normes en vigueur</span>
                    </div>
                    <div class="requirement-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Engagement qualité et réactivité dans la gestion</span>
                    </div>
                    <div class="requirement-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Respect des délais et procédures établies</span>
                    </div>
                </div>

                <!-- Submit Section -->
                <div class="submit-section">
                    <button type="submit" class="submit-button">
                        <i class="fas fa-paper-plane"></i>
                        <span>Envoyer ma demande</span>
                    </button>
                    
                    <p class="submit-note">
                        En soumettant ce formulaire, vous acceptez d'être contacté par notre équipe pour traiter votre demande de partenariat.
                    </p>
                </div>
            </form>

            <!-- Back Link -->
            <a href="{{ url('/') }}" class="back-link">
                <i class="fas fa-arrow-left"></i>
                <span>Retour à l'accueil</span>
            </a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animation d'entrée pour les éléments du formulaire
            const formSections = document.querySelectorAll('.form-section');
            formSections.forEach((section, index) => {
                section.style.opacity = '0';
                section.style.transform = 'translateY(30px)';
                setTimeout(() => {
                    section.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                    section.style.opacity = '1';
                    section.style.transform = 'translateY(0)';
                }, index * 100);
            });

            // Validation en temps réel
            const inputs = document.querySelectorAll('.form-input');
            inputs.forEach(input => {
                input.addEventListener('blur', function() {
                    if (this.hasAttribute('required') && !this.value.trim()) {
                        this.classList.add('is-invalid');
                    } else {
                        this.classList.remove('is-invalid');
                    }
                });

                input.addEventListener('input', function() {
                    if (this.classList.contains('is-invalid') && this.value.trim()) {
                        this.classList.remove('is-invalid');
                    }
                });
            });

            // Validation email
            const emailInput = document.getElementById('email');
            if (emailInput) {
                emailInput.addEventListener('blur', function() {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (this.value && !emailRegex.test(this.value)) {
                        this.classList.add('is-invalid');
                    } else if (this.value) {
                        this.classList.remove('is-invalid');
                    }
                });
            }

            // Validation mot de passe
            const passwordInput = document.getElementById('password');
            if (passwordInput) {
                passwordInput.addEventListener('input', function() {
                    if (this.value.length > 0 && this.value.length < 8) {
                        this.classList.add('is-invalid');
                    } else {
                        this.classList.remove('is-invalid');
                    }
                });
            }

            // Animation du bouton de soumission
            const submitButton = document.querySelector('.submit-button');
            if (submitButton) {
                submitButton.addEventListener('click', function(e) {
                    const form = this.closest('form');
                    if (form && form.checkValidity()) {
                        this.style.transform = 'scale(0.98)';
                        setTimeout(() => {
                            this.style.transform = 'scale(1)';
                        }, 150);
                    }
                });
            }

            // Compteur de caractères pour le textarea
            const textarea = document.getElementById('biens_list');
            if (textarea) {
                const charCount = document.createElement('div');
                charCount.style.cssText = 'text-align: right; color: var(--airbnb-dark-gray); font-size: 12px; margin-top: 5px;';
                textarea.parentElement.appendChild(charCount);
                
                function updateCharCount() {
                    const count = textarea.value.length;
                    charCount.textContent = `${count} caractères`;
                }
                
                textarea.addEventListener('input', updateCharCount);
                updateCharCount();
            }
        });
    </script>
</body>
</html>

</html>