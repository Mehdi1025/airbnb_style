<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Del Concierge - Location & Conciergerie Premium</title>
    <meta name="description" content="Découvrez des hébergements d'exception avec notre service de conciergerie haut de gamme. Des séjours uniques et personnalisés.">
    
    <!-- Open Graph -->
    <meta property="og:title" content="Casa Del Concierge - Location & Conciergerie Premium">
    <meta property="og:description" content="Séjours d'exception, service de conciergerie premium et propriétés sélectionnées avec soin partout en France.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">
    
    <!-- Favicon & app icon (logo officiel) -->
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">
    
    <!-- JSON-LD Schema.org -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "RealEstateAgent",
        "name": "Casa Del Concierge",
        "url": "{{ url('/') }}",
        "description": "Conciergerie premium et location de biens d'exception en France.",
        "image": "https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=1200&q=80",
        "address": {
            "@@type": "PostalAddress",
            "addressCountry": "FR"
        }
    }
    </script>
    
    <!-- Modern Typography - Inter + Satoshi -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Navigation Enhancements -->
    <link rel="stylesheet" href="{{ asset('css/navigation-enhancements.css') }}">
    
    <!-- Lightbox CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css">
    
    <!-- Award-Winning Design System -->
    <style>
        /* ============================================
           DESIGN TOKENS - Awwwards Level System
           ============================================ */
        :root {
            /* Spacing Scale (base 8px) */
            --space-1: 0.25rem;   /* 4px */
            --space-2: 0.5rem;    /* 8px */
            --space-3: 0.75rem;   /* 12px */
            --space-4: 1rem;      /* 16px */
            --space-5: 1.25rem;   /* 20px */
            --space-6: 1.5rem;    /* 24px */
            --space-8: 2rem;      /* 32px */
            --space-10: 2.5rem;   /* 40px */
            --space-12: 3rem;     /* 48px */
            --space-16: 4rem;     /* 64px */
            --space-20: 5rem;     /* 80px */
            --space-24: 6rem;     /* 96px */
            --space-32: 8rem;     /* 128px */
            
            /* Colors - Premium Palette */
            --primary: #FF385C;
            --primary-dark: #E31C5F;
            --primary-light: #FF5A7D;
            --primary-glow: rgba(255, 56, 92, 0.4);
            
            --neutral-950: #0A0A0B;
            --neutral-900: #141416;
            --neutral-800: #1F1F23;
            --neutral-700: #2E2E35;
            --neutral-600: #52525B;
            --neutral-500: #71717A;
            --neutral-400: #A1A1AA;
            --neutral-300: #D4D4D8;
            --neutral-200: #E4E4E7;
            --neutral-100: #F4F4F5;
            --neutral-50: #FAFAFA;
            --white: #FFFFFF;
            
            /* Typography Scale (Modular - 1.25 ratio) */
            --text-xs: 0.75rem;     /* 12px */
            --text-sm: 0.875rem;    /* 14px */
            --text-base: 1rem;      /* 16px */
            --text-lg: 1.125rem;    /* 18px */
            --text-xl: 1.25rem;     /* 20px */
            --text-2xl: 1.5rem;     /* 24px */
            --text-3xl: 1.875rem;   /* 30px */
            --text-4xl: 2.25rem;    /* 36px */
            --text-5xl: 3rem;       /* 48px */
            --text-6xl: 3.75rem;    /* 60px */
            --text-7xl: 4.5rem;     /* 72px */
            --text-8xl: 6rem;       /* 96px */
            
            /* Line Heights */
            --leading-none: 1;
            --leading-tight: 1.15;
            --leading-snug: 1.375;
            --leading-normal: 1.5;
            --leading-relaxed: 1.625;
            --leading-loose: 1.8;
            
            /* Letter Spacing */
            --tracking-tighter: -0.05em;
            --tracking-tight: -0.025em;
            --tracking-normal: 0;
            --tracking-wide: 0.025em;
            --tracking-wider: 0.05em;
            --tracking-widest: 0.1em;
            
            /* Border Radius - Cohérent */
            --radius-sm: 0.375rem;   /* 6px */
            --radius-md: 0.5rem;     /* 8px */
            --radius-lg: 0.75rem;    /* 12px */
            --radius-xl: 1rem;       /* 16px */
            --radius-2xl: 1.25rem;   /* 20px */
            --radius-3xl: 1.5rem;    /* 24px */
            --radius-full: 9999px;
            
            /* Shadows - Soft & Layered */
            --shadow-xs: 0 1px 2px rgba(0, 0, 0, 0.04);
            --shadow-sm: 0 2px 4px rgba(0, 0, 0, 0.04), 0 1px 2px rgba(0, 0, 0, 0.06);
            --shadow-md: 0 4px 8px rgba(0, 0, 0, 0.04), 0 2px 4px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 8px 16px rgba(0, 0, 0, 0.06), 0 4px 8px rgba(0, 0, 0, 0.04);
            --shadow-xl: 0 16px 32px rgba(0, 0, 0, 0.08), 0 8px 16px rgba(0, 0, 0, 0.04);
            --shadow-2xl: 0 24px 48px rgba(0, 0, 0, 0.1), 0 12px 24px rgba(0, 0, 0, 0.06);
            --shadow-glow: 0 0 40px var(--primary-glow);
            --shadow-inner: inset 0 2px 4px rgba(0, 0, 0, 0.05);
            
            /* Transitions - Smooth */
            --ease-out-expo: cubic-bezier(0.16, 1, 0.3, 1);
            --ease-out-quart: cubic-bezier(0.25, 1, 0.5, 1);
            --ease-in-out-circ: cubic-bezier(0.85, 0, 0.15, 1);
            --ease-spring: cubic-bezier(0.34, 1.56, 0.64, 1);
            
            --duration-fast: 150ms;
            --duration-normal: 250ms;
            --duration-slow: 400ms;
            --duration-slower: 600ms;
            
            /* Glass Effects */
            --glass-bg: rgba(255, 255, 255, 0.7);
            --glass-border: rgba(255, 255, 255, 0.2);
            --glass-blur: 20px;
            
            /* Gradients */
            --gradient-primary: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            --gradient-shine: linear-gradient(135deg, rgba(255,255,255,0.4) 0%, rgba(255,255,255,0) 50%);
            --gradient-dark: linear-gradient(180deg, var(--neutral-900) 0%, var(--neutral-950) 100%);
            --gradient-radial: radial-gradient(circle at 50% 0%, var(--primary-glow) 0%, transparent 50%);
        }
        
        /* ============================================
           BASE RESET & TYPOGRAPHY
           ============================================ */
        *, *::before, *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        html {
            scroll-behavior: smooth;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            font-size: var(--text-base);
            line-height: var(--leading-normal);
            color: var(--neutral-900);
            background-color: var(--white);
            overflow-x: hidden;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        html {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }
        
        main {
            flex: 1;
        }
        
        /* Typography Utilities */
        .text-gradient {
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        /* ============================================
           LAYOUT - Container (Awwwards level)
           ============================================ */
        .container {
            width: 100%;
            max-width: 1320px;
            margin: 0 auto;
            padding: 0 clamp(var(--space-6), 5vw, var(--space-12));
        }
        
        @media (max-width: 1024px) {
            .container { padding: 0 var(--space-6); }
        }
        
        @media (max-width: 640px) {
            .container { padding: 0 var(--space-4); }
        }
        
        /* ============================================
           DARK MODE VARIABLES
           ============================================ */
        [data-theme="dark"] {
            --neutral-950: #FFFFFF;
            --neutral-900: #FAFAFA;
            --neutral-800: #F4F4F5;
            --neutral-700: #E4E4E7;
            --neutral-600: #D4D4D8;
            --neutral-500: #A1A1AA;
            --neutral-400: #71717A;
            --neutral-300: #52525B;
            --neutral-200: #2E2E35;
            --neutral-100: #1F1F23;
            --neutral-50: #141416;
            --white: #0A0A0B;
        }
        
        [data-theme="dark"] body {
            background-color: var(--white);
            color: var(--neutral-900);
        }
        
        [data-theme="dark"] header {
            background: rgba(10, 10, 11, 0.95);
            border-bottom-color: rgba(255, 255, 255, 0.1);
        }
        
        [data-theme="dark"] .property-card {
            background: var(--neutral-50);
            border-color: var(--neutral-100);
        }
        
        [data-theme="dark"] .section-title h2,
        [data-theme="dark"] .section-title p {
            color: var(--neutral-900);
        }
        
        [data-theme="dark"] .comparison-bar {
            background: var(--neutral-50);
            border-top-color: var(--neutral-100);
        }
        
        [data-theme="dark"] .share-modal-content {
            background: var(--neutral-50);
        }
        
        [data-theme="dark"] .share-button {
            background: var(--neutral-100);
            border-color: var(--neutral-200);
        }
        
        @media (max-width: 768px) {
            .comparison-bar-content {
                flex-direction: column;
                gap: 16px;
            }
            
            .comparison-items {
                width: 100%;
            }
            
            .comparison-actions {
                width: 100%;
                justify-content: space-between;
            }
            
            .dark-mode-toggle {
                display: none;
            }
            
        }
        
        /* ============================================
           PROPERTY ACTIONS (Favoris, Comparaison, Partage)
           ============================================ */
        .property-actions {
            position: absolute;
            top: 12px;
            right: 12px;
            display: flex;
            gap: 8px;
            z-index: 10;
            opacity: 0;
            transform: translateY(-10px);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .property-card:hover .property-actions {
            opacity: 1;
            transform: translateY(0);
        }
        
        .property-action-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            color: var(--neutral-700);
            font-size: 14px;
        }
        
        .property-action-btn:hover {
            background: var(--primary);
            color: white;
            transform: scale(1.1);
            box-shadow: 0 4px 12px rgba(255, 56, 92, 0.4);
        }
        
        .property-action-btn.active {
            background: var(--primary);
            color: white;
        }
        
        .property-action-btn.active i.fa-heart {
            animation: heartBeat 0.5s ease;
        }
        
        @keyframes heartBeat {
            0%, 100% { transform: scale(1); }
            25% { transform: scale(1.3); }
            50% { transform: scale(1.1); }
        }
        
        /* ============================================
           COMPARISON BAR (Barre de comparaison flottante)
           ============================================ */
        .comparison-bar {
            position: fixed;
            bottom: -100px;
            left: 0;
            right: 0;
            background: white;
            box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.1);
            padding: 16px 24px;
            z-index: 999;
            transition: bottom 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-top: 1px solid var(--neutral-200);
        }
        
        .comparison-bar.active {
            bottom: 0;
        }
        
        .comparison-bar-content {
            max-width: 1440px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }
        
        .comparison-items {
            display: flex;
            gap: 16px;
            flex: 1;
            overflow-x: auto;
        }
        
        .comparison-item {
            display: flex;
            align-items: center;
            gap: 12px;
            background: var(--neutral-50);
            padding: 8px 12px;
            border-radius: 8px;
            min-width: 200px;
        }
        
        .comparison-item-image {
            width: 50px;
            height: 50px;
            border-radius: 6px;
            object-fit: cover;
        }
        
        .comparison-item-info {
            flex: 1;
        }
        
        .comparison-item-name {
            font-size: 14px;
            font-weight: 600;
            color: var(--neutral-900);
            margin-bottom: 2px;
        }
        
        .comparison-item-price {
            font-size: 12px;
            color: var(--neutral-500);
        }
        
        .comparison-item-remove {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            border: none;
            background: var(--neutral-200);
            color: var(--neutral-600);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }
        
        .comparison-item-remove:hover {
            background: var(--primary);
            color: white;
        }
        
        .comparison-actions {
            display: flex;
            gap: 12px;
        }
        
        .btn-compare {
            padding: 10px 24px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .btn-compare:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }
        
        .btn-compare:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
        
        .btn-clear-comparison {
            padding: 10px 16px;
            background: transparent;
            color: var(--neutral-600);
            border: 1px solid var(--neutral-300);
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .btn-clear-comparison:hover {
            border-color: var(--primary);
            color: var(--primary);
        }
        
        /* ============================================
           SCROLL TO TOP BUTTON - Géré par navigation-enhancements.js
           ============================================ */
        
        /* ============================================
           DARK MODE TOGGLE
           ============================================ */
        .dark-mode-toggle {
            position: fixed;
            top: 50%;
            right: 0;
            transform: translateY(-50%) rotate(-90deg);
            background: var(--primary);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 8px 8px 0 0;
            cursor: pointer;
            z-index: 997;
            font-weight: 600;
            font-size: 12px;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            box-shadow: -2px 0 8px rgba(0, 0, 0, 0.1);
        }
        
        .dark-mode-toggle:hover {
            background: var(--primary-dark);
            padding-right: 24px;
        }
        
        [data-theme="dark"] .dark-mode-toggle {
            background: var(--neutral-800);
        }
        
        /* ============================================
           SHARE MODAL
           ============================================ */
        .share-modal {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
            z-index: 10000;
            display: none;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .share-modal.active {
            display: flex;
            opacity: 1;
        }
        
        .share-modal-content {
            background: white;
            border-radius: 16px;
            padding: 32px;
            max-width: 500px;
            width: 90%;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            transform: scale(0.9);
            transition: transform 0.3s ease;
        }
        
        .share-modal.active .share-modal-content {
            transform: scale(1);
        }
        
        .share-modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }
        
        .share-modal-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--neutral-900);
        }
        
        .share-modal-close {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            border: none;
            background: var(--neutral-100);
            color: var(--neutral-600);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }
        
        .share-modal-close:hover {
            background: var(--primary);
            color: white;
        }
        
        .share-buttons {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
        }
        
        .share-button {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            padding: 16px;
            border: 2px solid var(--neutral-200);
            border-radius: 12px;
            background: white;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            color: var(--neutral-700);
        }
        
        .share-button:hover {
            border-color: var(--primary);
            background: var(--neutral-50);
            transform: translateY(-2px);
        }
        
        .share-button i {
            font-size: 24px;
        }
        
        .share-button.facebook i { color: #1877F2; }
        .share-button.twitter i { color: #1DA1F2; }
        .share-button.whatsapp i { color: #25D366; }
        .share-button.email i { color: var(--primary); }
        .share-button.copy i { color: var(--neutral-600); }
        
        .share-button span {
            font-size: 12px;
            font-weight: 500;
        }
        
        .share-url-input {
            margin-top: 20px;
            padding: 12px;
            border: 1px solid var(--neutral-300);
            border-radius: 8px;
            width: 100%;
            font-size: 14px;
        }
        
        /* ============================================
           HOW IT WORKS SECTION
           ============================================ */
        .how-it-works-section {
            padding: var(--space-24) 0;
            background: linear-gradient(180deg, var(--white) 0%, var(--neutral-50) 100%);
            position: relative;
            overflow: hidden;
        }
        
        .how-it-works-section::before {
            content: '';
            position: absolute;
            top: -100px;
            right: -100px;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(255, 56, 92, 0.05) 0%, transparent 70%);
            border-radius: 50%;
        }
        
        .how-it-works-steps {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: var(--space-6);
            margin-top: var(--space-16);
            position: relative;
        }
        
        .how-it-works-step {
            text-align: center;
            position: relative;
            padding: var(--space-8);
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s var(--ease-out-expo);
        }
        
        .how-it-works-step.animate {
            opacity: 1;
            transform: translateY(0);
        }
        
        .how-it-works-step:hover .step-number {
            transform: scale(1.1);
            box-shadow: 0 8px 24px var(--primary-glow);
        }
        
        .step-number {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            background: var(--gradient-primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            font-weight: 800;
            margin: 0 auto var(--space-5);
            box-shadow: 0 4px 20px rgba(255, 56, 92, 0.35);
            transition: all 0.4s var(--ease-spring);
        }
        
        .step-title {
            font-size: clamp(1.1rem, 1.5vw, 1.35rem);
            font-weight: 700;
            color: var(--neutral-900);
            margin-bottom: var(--space-3);
            letter-spacing: -0.02em;
        }
        
        .step-description {
            font-size: var(--text-base);
            color: var(--neutral-600);
            line-height: 1.7;
        }
        
        .step-arrow {
            position: absolute;
            top: 30px;
            right: -40px;
            font-size: 32px;
            color: var(--primary-light);
            opacity: 0.3;
        }
        
        .how-it-works-steps .how-it-works-step:last-child .step-arrow {
            display: none;
        }
        
        @media (max-width: 1024px) {
            .how-it-works-steps {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .step-arrow {
                display: none;
            }
        }
        
        @media (max-width: 640px) {
            .how-it-works-steps {
                grid-template-columns: 1fr;
            }
        }
        
        /* ============================================
           ENHANCED ANIMATIONS
           ============================================ */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(36px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
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
        
        .animate-on-scroll {
            opacity: 0;
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .animate-on-scroll.animated {
            opacity: 1;
        }
        
        .animate-fade-up {
            transform: translateY(30px);
        }
        
        .animate-fade-up.animated {
            transform: translateY(0);
        }
        
        .animate-fade-left {
            transform: translateX(-30px);
        }
        
        .animate-fade-left.animated {
            transform: translateX(0);
        }
        
        .animate-fade-right {
            transform: translateX(30px);
        }
        
        .animate-fade-right.animated {
            transform: translateX(0);
        }
        
        .animate-scale {
            transform: scale(0.9);
        }
        
        .animate-scale.animated {
            transform: scale(1);
        }
        
        /* ============================================
           HEADER - Clean Light Design
           ============================================ */
        header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            min-height: 80px;
            height: auto;
            padding: 0.5rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.06);
            z-index: 1000;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        header.scrolled {
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.04);
        }
        
        /* Logo (PNG transparent — sans bordure, ombre ni fond) */
        .logo {
            color: var(--neutral-900);
            font-size: 20px;
            font-weight: 700;
            text-decoration: none;
            display: flex;
            align-items: center;
            flex-shrink: 0;
            gap: 0;
            letter-spacing: -0.02em;
            transition: opacity 0.3s ease;
            border: none;
            outline: none;
            box-shadow: none;
            background: transparent;
        }
        
        .logo:hover {
            opacity: 0.9;
        }
        
        /* Équivalent Tailwind: h-12 md:h-16 lg:h-20 */
        .logo img.site-logo-img {
            height: 3rem;
            width: auto;
            object-fit: contain;
            object-position: left center;
            display: block;
            border: none;
            outline: none;
            box-shadow: none;
            background: transparent;
            vertical-align: middle;
        }
        
        @media (min-width: 768px) {
            .logo img.site-logo-img {
                height: 4rem;
            }
            header {
                min-height: 88px;
                padding: 0.5rem 2rem;
            }
        }
        
        @media (min-width: 1024px) {
            .logo img.site-logo-img {
                height: 5rem;
            }
            header {
                min-height: 104px;
                padding: 0.625rem 2.5rem;
            }
        }
        
        /* Center Navigation */
        .nav-center {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            align-items: center;
            gap: 4px;
            padding: 4px;
            background: var(--neutral-100);
            border-radius: 50px;
            transition: all 0.3s ease;
        }
        
        .nav-center-link {
            padding: 10px 20px;
            font-size: 14px;
            font-weight: 500;
            color: var(--neutral-600);
            text-decoration: none;
            border-radius: 40px;
            transition: all 0.25s ease;
        }
        
        .nav-center-link:hover {
            color: var(--neutral-900);
        }
        
        .nav-center-link.active {
            color: var(--neutral-900);
            background: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }
        
        /* User menu */
        .user-menu {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        /* Nav buttons */
        .nav-btn {
            padding: 10px 18px;
            border-radius: 10px;
            text-decoration: none;
            color: var(--neutral-700);
            font-weight: 500;
            font-size: 14px;
            transition: all 0.25s ease;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: transparent;
        }
        
        .nav-btn:hover {
            color: var(--neutral-900);
            background: var(--neutral-100);
        }
        
        /* Primary button */
        .nav-btn.primary {
            background: var(--neutral-900);
            color: #fff;
            font-weight: 600;
            border-radius: 10px;
        }
        
        .nav-btn.primary:hover {
            background: var(--neutral-800);
            transform: translateY(-1px);
        }
        
        /* Language selector */
        .language-selector {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 10px 12px;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.25s ease;
            background: transparent;
        }
        
        .language-selector:hover {
            background: var(--neutral-100);
        }
        
        .language-selector i {
            font-size: 15px;
            color: var(--neutral-500);
        }
        
        .language-selector select {
            border: none;
            background: transparent;
            color: var(--neutral-700);
            font-weight: 500;
            font-size: 14px;
            cursor: pointer;
            outline: none;
            appearance: none;
        }
        
        /* Menu button */
        .nav-menu-btn {
            display: none;
            width: 40px;
            height: 40px;
            align-items: center;
            justify-content: center;
            background: var(--neutral-100);
            border: none;
            border-radius: 10px;
            color: var(--neutral-700);
            cursor: pointer;
            transition: all 0.25s ease;
        }
        
        .nav-menu-btn:hover {
            background: var(--neutral-200);
        }
        
        /* ============================================
           DROPDOWN MENU - Clean Style
           ============================================ */
        .nav-dropdown {
            position: relative;
        }
        
        .nav-dropdown-trigger {
            display: flex;
            align-items: center;
            gap: 6px;
        }
        
        .nav-dropdown-trigger i.fa-chevron-down {
            font-size: 10px;
            transition: transform 0.3s ease;
        }
        
        .nav-dropdown.active .nav-dropdown-trigger i.fa-chevron-down {
            transform: rotate(180deg);
        }
        
        .nav-dropdown-menu {
            position: absolute;
            top: calc(100% + 8px);
            right: 0;
            width: 260px;
            background: #fff;
            border-radius: 16px;
            box-shadow: 
                0 4px 6px rgba(0, 0, 0, 0.04),
                0 10px 40px rgba(0, 0, 0, 0.1);
            padding: 6px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-8px);
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1001;
        }
        
        .nav-dropdown.active .nav-dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        
        .nav-dropdown-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            text-decoration: none;
            border-radius: 12px;
            transition: all 0.2s ease;
        }
        
        .nav-dropdown-item:hover {
            background: var(--neutral-50);
        }
        
        .nav-dropdown-icon {
            width: 40px;
            height: 40px;
            background: var(--neutral-100);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: all 0.2s ease;
        }
        
        .nav-dropdown-icon i {
            font-size: 16px;
            color: var(--neutral-600);
        }
        
        .nav-dropdown-item:hover .nav-dropdown-icon {
            background: #FF385C;
        }
        
        .nav-dropdown-item:hover .nav-dropdown-icon i {
            color: #fff;
        }
        
        .nav-dropdown-icon.loueur i {
            color: var(--neutral-600);
        }
        
        .nav-dropdown-item:hover .nav-dropdown-icon.loueur {
            background: #3B82F6;
        }
        
        .nav-dropdown-content {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }
        
        .nav-dropdown-title {
            font-size: 14px;
            font-weight: 600;
            color: var(--neutral-900);
        }
        
        .nav-dropdown-desc {
            font-size: 12px;
            color: var(--neutral-500);
        }
        
        /* Responsive Header */
        @media (max-width: 1100px) {
            .nav-center {
                display: none;
            }
            
            .nav-menu-btn {
                display: flex;
            }
        }
        
        @media (max-width: 768px) {
            header {
                padding: 0.5rem 2rem;
                min-height: 72px;
            }
            
            .user-menu {
                gap: 6px;
            }
            
            .nav-btn {
                padding: 8px 12px;
                font-size: 13px;
            }
            
            .nav-btn span {
                display: none;
            }
            
            .nav-btn i {
                display: block;
            }
            
            .nav-btn.primary {
                width: 36px;
                height: 36px;
                padding: 0;
                justify-content: center;
            }
            
            .nav-dropdown-trigger span {
                display: none;
            }
            
            .nav-dropdown-trigger i.fa-chevron-down {
                display: none;
            }
            
            .language-selector {
                padding: 8px;
            }
            
            .language-selector select {
                display: none;
            }
            
            .nav-dropdown-menu {
                width: 240px;
                right: -60px;
            }
        }
        
        /* ============================================
           SCROLL INDICATOR - Premium
           ============================================ */
        .scroll-indicator {
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 3px;
            background: var(--gradient-primary);
            z-index: 10001;
            transition: width 0.1s linear;
            box-shadow: var(--shadow-glow);
        }
        
        /* ============================================
           PROPERTY CARDS - Award-Winning Style
           ============================================ */
        .properties-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: var(--space-8);
            padding: var(--space-10) 0;
        }
        
        .properties-carousel-wrapper {
            position: relative;
            padding: 0 var(--space-16);
        }
        
        .properties-carousel-container {
            overflow: hidden;
            position: relative;
            width: 100%;
        }
        
        .properties-carousel-track {
            display: flex;
            transition: transform var(--duration-slow) var(--ease-out-expo);
            gap: var(--space-8);
        }
        
        .property-card.carousel-item {
            min-width: 0;
            padding: 0 var(--space-4);
            flex: 0 0 calc(33.333% - var(--space-6));
            box-sizing: border-box;
        }
        
        .carousel-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 56px;
            height: 56px;
            border-radius: var(--radius-full);
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(0, 0, 0, 0.08);
            color: var(--neutral-800);
            font-size: var(--text-base);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
            transition: all 0.35s var(--ease-out-expo);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }
        
        .carousel-nav:hover {
            background: var(--gradient-primary);
            color: var(--white);
            border-color: transparent;
            transform: translateY(-50%) scale(1.08);
            box-shadow: 0 8px 32px var(--primary-glow);
        }
        
        .carousel-nav:active {
            transform: translateY(-50%) scale(0.95);
        }
        
        .carousel-prev { left: 0; }
        .carousel-next { right: 0; }
        
        .carousel-nav.disabled {
            opacity: 0.3;
            cursor: not-allowed;
            pointer-events: none;
        }
        
        .carousel-indicators {
            display: flex;
            justify-content: center;
            gap: var(--space-2);
            margin-top: var(--space-8);
        }
        
        .carousel-indicator {
            width: 8px;
            height: 8px;
            border-radius: var(--radius-full);
            background: var(--neutral-200);
            cursor: pointer;
            transition: all var(--duration-normal) var(--ease-out-expo);
        }
        
        .carousel-indicator.active {
            background: var(--gradient-primary);
            width: 32px;
            border-radius: var(--radius-sm);
        }
        
        .property-card {
            border-radius: 24px;
            overflow: hidden;
            cursor: pointer;
            transition: all 0.45s var(--ease-out-expo);
            background: var(--white);
            position: relative;
            border: 1px solid rgba(0, 0, 0, 0.06);
            box-shadow: 
                0 2px 8px rgba(0, 0, 0, 0.04),
                0 1px 2px rgba(0, 0, 0, 0.02);
        }
        
        .property-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.3) 0%, transparent 50%);
            opacity: 0;
            transition: opacity 0.4s var(--ease-out-expo);
            z-index: 1;
            pointer-events: none;
            border-radius: 24px;
        }
        
        .property-card:hover {
            transform: translateY(-12px);
            box-shadow: 
                0 24px 48px -12px rgba(0, 0, 0, 0.12),
                0 0 0 1px rgba(255, 56, 92, 0.06);
            border-color: rgba(255, 56, 92, 0.12);
        }
        
        .property-card:hover::before {
            opacity: 1;
        }
        
        .property-image-wrapper {
            position: relative;
            overflow: hidden;
            border-radius: 24px 24px 0 0;
        }
        
        .property-image {
            width: 100%;
            height: 280px;
            object-fit: cover;
            transition: transform 0.7s var(--ease-out-expo);
        }
        
        .property-card:hover .property-image {
            transform: scale(1.06);
        }
        
        .property-badge {
            position: absolute;
            top: var(--space-4);
            right: var(--space-4);
            background: var(--glass-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            color: var(--neutral-900);
            padding: var(--space-2) var(--space-3);
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            font-weight: 600;
            z-index: 2;
            border: 1px solid var(--glass-border);
            letter-spacing: var(--tracking-wide);
        }
        
        .property-info { padding: var(--space-3) 0; }
        .property-location { font-size: var(--text-sm); color: var(--neutral-500); margin-bottom: var(--space-1); }
        .property-name { font-weight: 600; margin-bottom: var(--space-2); }
        .property-price { font-weight: 700; }
        
        /* ============================================
           SECTION TITLES - Awwwards Level Hierarchy
           ============================================ */
        .section-title {
            text-align: center;
            margin-bottom: var(--space-20);
            position: relative;
        }
        
        .section-title .sub-title {
            color: var(--primary);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            display: inline-block;
            margin-bottom: var(--space-5);
            padding: var(--space-2) var(--space-5);
            background: rgba(255, 56, 92, 0.06);
            border: 1px solid rgba(255, 56, 92, 0.12);
            border-radius: var(--radius-full);
            position: relative;
            opacity: 0;
            animation: sectionTitleReveal 0.8s var(--ease-out-expo) forwards;
        }
        
        .section-title h2 {
            font-size: clamp(2.5rem, 5vw, 3.75rem);
            margin: var(--space-4) 0 var(--space-6);
            color: var(--neutral-900);
            font-weight: 800;
            line-height: 1.08;
            letter-spacing: -0.03em;
            opacity: 0;
            animation: sectionTitleReveal 0.8s var(--ease-out-expo) 0.1s forwards;
        }
        
        .section-title p {
            color: var(--neutral-600);
            max-width: 560px;
            margin: 0 auto;
            font-size: var(--text-lg);
            line-height: 1.75;
            letter-spacing: -0.01em;
            opacity: 0;
            animation: sectionTitleReveal 0.8s var(--ease-out-expo) 0.2s forwards;
        }
        
        @keyframes sectionTitleReveal {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* ============================================
           FEATURE CARDS - Bento Style
           ============================================ */
        .feature-card {
            background: var(--white);
            padding: var(--space-10) var(--space-8);
            border-radius: var(--radius-2xl);
            box-shadow: var(--shadow-md);
            text-align: center;
            transition: all var(--duration-normal) var(--ease-spring);
            border: 1px solid var(--neutral-100);
            position: relative;
            overflow: hidden;
        }
        
        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient-primary);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform var(--duration-normal) var(--ease-out-expo);
        }
        
        .feature-card::after {
            content: '';
            position: absolute;
            inset: 0;
            background: var(--gradient-radial);
            opacity: 0;
            transition: opacity var(--duration-normal) var(--ease-out-expo);
            pointer-events: none;
        }
        
        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
            border-color: rgba(255, 56, 92, 0.15);
        }
        
        .feature-card:hover::before {
            transform: scaleX(1);
        }
        
        .feature-card:hover::after {
            opacity: 1;
        }
        
        .feature-card .icon-wrapper {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, rgba(255, 56, 92, 0.1) 0%, rgba(255, 56, 92, 0.05) 100%);
            border-radius: var(--radius-xl);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto var(--space-6);
            transition: all var(--duration-normal) var(--ease-spring);
            position: relative;
            z-index: 1;
        }
        
        .feature-card:hover .icon-wrapper {
            transform: scale(1.1) rotate(3deg);
            background: linear-gradient(135deg, rgba(255, 56, 92, 0.15) 0%, rgba(255, 56, 92, 0.08) 100%);
            box-shadow: 0 8px 24px var(--primary-glow);
        }
        
        .feature-card .icon-wrapper i {
            font-size: var(--text-3xl);
            color: var(--primary);
            transition: transform var(--duration-fast) var(--ease-out-expo);
        }
        
        .feature-card:hover .icon-wrapper i {
            transform: scale(1.1);
        }
        
        /* ============================================
           SERVICE CARDS - Premium Glass Effect
           ============================================ */
        .service-card {
            background: var(--white);
            border-radius: var(--radius-2xl);
            overflow: hidden;
            box-shadow: var(--shadow-md);
            transition: all var(--duration-normal) var(--ease-spring);
            border: 1px solid var(--neutral-100);
            position: relative;
            cursor: pointer;
        }
        
        .service-card a {
            text-decoration: none;
            color: inherit;
        }
        
        .service-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient-primary);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform var(--duration-normal) var(--ease-out-expo);
        }
        
        .service-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-2xl);
            border-color: rgba(255, 56, 92, 0.15);
        }
        
        .service-card:hover::after {
            transform: scaleX(1);
        }
        
        .service-card .service-image {
            height: 200px;
            overflow: hidden;
            position: relative;
        }
        
        .service-card .service-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform var(--duration-slower) var(--ease-out-expo);
        }
        
        .service-card:hover .service-image img {
            transform: scale(1.1);
        }
        
        .service-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            font-size: var(--text-sm);
            display: inline-flex;
            align-items: center;
            gap: var(--space-2);
            transition: all var(--duration-fast) var(--ease-out-expo);
            pointer-events: none;
        }
        
        .service-link i {
            transition: transform var(--duration-fast) var(--ease-out-expo);
        }
        
        .service-card:hover .service-link i {
            transform: translateX(4px);
        }
        
        /* ============================================
           BUTTONS - Premium Interactions
           ============================================ */
        .btn-discover {
            background: var(--gradient-primary);
            color: var(--white);
            padding: var(--space-3) var(--space-6);
            border-radius: 14px;
            text-decoration: none;
            font-weight: 600;
            letter-spacing: -0.01em;
            font-size: var(--text-sm);
            transition: all var(--duration-normal) var(--ease-spring);
            display: inline-flex;
            align-items: center;
            gap: var(--space-2);
            box-shadow: 0 4px 16px var(--primary-glow);
            position: relative;
            overflow: hidden;
        }
        
        .btn-discover::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.2) 0%, transparent 50%);
            opacity: 0;
            transition: opacity var(--duration-fast) var(--ease-out-expo);
        }
        
        .btn-discover:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 28px var(--primary-glow);
        }
        
        .btn-discover:hover::before {
            opacity: 1;
        }
        
        .btn-discover:active {
            transform: translateY(-1px);
        }
        
        .btn-discover.secondary {
            background: var(--neutral-900);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
        }
        
        .btn-discover.secondary:hover {
            background: var(--neutral-800);
            box-shadow: 0 8px 28px rgba(0, 0, 0, 0.3);
        }
        
        /* ============================================
           FOOTER - Dark Premium
           ============================================ */
        footer {
            background: var(--gradient-dark);
            padding: var(--space-20) 0 var(--space-10);
            position: relative;
            overflow: hidden;
            margin-top: auto;
            margin-bottom: 0;
            width: 100%;
            flex-shrink: 0;
        }
        
        @keyframes newsletterToastIn {
            from { opacity: 0; transform: translate(-50%, 10px); }
            to { opacity: 1; transform: translate(-50%, 0); }
        }
        
        /* S'assurer que le footer colle bien en bas */
        @media (min-height: 100vh) {
            body {
                display: flex;
                flex-direction: column;
            }
            
            footer {
                margin-top: auto;
            }
        }
        
        footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent 0%, var(--primary) 50%, transparent 100%);
        }
        
        footer::after {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 400px;
            height: 200px;
            background: radial-gradient(ellipse at center, var(--primary-glow) 0%, transparent 70%);
            opacity: 0.3;
            pointer-events: none;
            z-index: 0;
        }
        
        /* Empêcher le footer::after de créer un espace en bas */
        footer {
            position: relative;
        }
        
        footer::after {
            bottom: auto;
            top: 0;
        }
        
        .footer-brand {
            text-align: center;
            padding: var(--space-10) 0 var(--space-12);
            position: relative;
            z-index: 1;
        }
        
        .footer-brand a {
            display: inline-block;
            line-height: 0;
            border: none;
            box-shadow: none;
            background: transparent;
        }
        
        .footer-brand .footer-logo-img {
            height: 3.5rem;
            width: auto;
            max-height: 64px;
            object-fit: contain;
            border: none;
            outline: none;
            box-shadow: none;
            background: transparent;
        }
        
        @media (max-width: 768px) {
            .footer-brand .footer-logo-img {
                height: 2.75rem;
                max-height: 52px;
            }
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: var(--space-12);
            position: relative;
            z-index: 1;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        
        footer .container {
            margin-bottom: 0;
            padding-bottom: 0;
        }
        
        .footer-column h4 {
            font-size: 12px;
            font-weight: 800;
            margin-bottom: var(--space-6);
            color: var(--white);
            letter-spacing: 0.12em;
            text-transform: uppercase;
            position: relative;
            padding-bottom: var(--space-4);
        }
        
        .footer-column h4::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 32px;
            height: 2px;
            background: var(--gradient-primary);
            border-radius: var(--radius-full);
            opacity: 0.9;
        }
        
        .footer-links {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: var(--space-4);
        }
        
        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            font-size: var(--text-sm);
            transition: all 0.3s var(--ease-out-expo);
            display: inline-block;
        }
        
        .footer-links a:hover {
            color: var(--primary-light);
            transform: translateX(6px);
        }
        
        /* ============================================
           ANIMATIONS
           ============================================ */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(24px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes shimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
        }
        
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px var(--primary-glow); }
            50% { box-shadow: 0 0 40px var(--primary-glow); }
        }
        
        .fade-in-up {
            opacity: 0;
            transform: translateY(40px);
            animation: fadeInUp 0.8s var(--ease-out-expo) forwards;
        }
        
        /* ============================================
           TESTIMONIALS, STATS, FAQ - Modern Styles
           ============================================ */
        .testimonial-card {
            transition: all var(--duration-normal) var(--ease-spring);
        }
        
        .testimonial-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
        }
        
        .destination-card {
            border: 1px solid transparent;
            transition: all var(--duration-normal) var(--ease-spring);
        }
        
        .destination-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: var(--shadow-2xl);
            border-color: rgba(255, 56, 92, 0.2);
        }
        
        section { position: relative; }
        
        .why-choose-us::after,
        .premium-services::after,
        .featured-properties::after,
        .testimonials-section::after,
        .destinations-section::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 2px;
            background: linear-gradient(90deg, transparent 0%, var(--primary) 50%, transparent 100%);
            border-radius: var(--radius-full);
        }
        
        .feature-card,
        .service-card,
        .testimonial-card,
        .stat-card,
        .faq-item {
            backdrop-filter: blur(8px);
        }
        
        .faq-question {
            transition: background-color var(--duration-fast) var(--ease-out-expo);
        }
        
        .faq-question:hover {
            background-color: var(--neutral-50);
        }
        
        .faq-item {
            transition: all var(--duration-normal) var(--ease-out-expo);
        }
        
        .faq-item:hover {
            box-shadow: var(--shadow-lg);
            border-color: rgba(255, 56, 92, 0.15);
        }
        
        .faq-item.active .faq-question {
            background-color: var(--neutral-50);
        }
        
        .faq-item.active .faq-question i {
            transform: rotate(180deg);
        }
        
        .faq-item.active {
            border-color: rgba(255, 56, 92, 0.2);
            box-shadow: var(--shadow-xl);
        }
        
        .faq-item.active::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: var(--gradient-primary);
            border-radius: var(--radius-full);
        }
        
        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: all var(--duration-normal) var(--ease-out-expo);
        }
        
        .faq-item.active .faq-answer {
            max-height: 500px;
            padding: 0 var(--space-6) var(--space-6) !important;
        }
        
        .newsletter-form button:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-glow);
        }
        
        .newsletter-form input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(255, 56, 92, 0.1);
        }
        
        .newsletter-form input:hover:not(:focus) {
            border-color: var(--neutral-400);
        }
        
        .stat-card {
            transition: all var(--duration-normal) var(--ease-spring);
        }
        
        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
            border-color: rgba(255, 56, 92, 0.15);
        }
        
        .stat-card:hover .stat-icon {
            transform: scale(1.1) rotate(3deg);
            box-shadow: 0 8px 24px var(--primary-glow);
        }
        
        /* ============================================
           RESPONSIVE DESIGN - Mobile First
           ============================================ */
        @media (max-width: 1024px) {
            .properties-grid {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
                gap: var(--space-6);
            }
            
            .property-card.carousel-item { flex: 0 0 50%; }
            .properties-carousel-wrapper { padding: 0 var(--space-12); }
            .section-title h2 { font-size: var(--text-4xl); }
            .footer-content { grid-template-columns: repeat(2, 1fr); gap: var(--space-10); }
        }
        
        @media (max-width: 768px) {
            .properties-grid { grid-template-columns: 1fr; gap: var(--space-5); }
            .property-card.carousel-item { flex: 0 0 100%; }
            .properties-carousel-wrapper { padding: 0 var(--space-10); }
            .carousel-nav { width: 40px; height: 40px; font-size: var(--text-base); }
            
            .section-title h2 { font-size: var(--text-3xl); }
            .section-title p { font-size: var(--text-base); }
            
            .features-grid,
            .services-grid { grid-template-columns: 1fr; gap: var(--space-5); }
            .feature-card { padding: var(--space-8) var(--space-5); }
            
            .footer-content { grid-template-columns: 1fr; gap: var(--space-8); }
            footer { padding: var(--space-10) 0 var(--space-5); }
            
            .stats-grid { grid-template-columns: repeat(2, 1fr); gap: var(--space-8); }
            .testimonials-grid { grid-template-columns: 1fr; }
            .destinations-grid { grid-template-columns: 1fr; }
            .become-host-section > .container > div { grid-template-columns: 1fr; }
            
            .newsletter-form { flex-direction: column; }
            .newsletter-form input,
            .newsletter-form button { width: 100%; }
            .newsletter-content { padding: var(--space-10) var(--space-8) !important; }
            .newsletter-content h2 { font-size: var(--text-3xl) !important; }
            .newsletter-icon { width: 72px !important; height: 72px !important; }
            .newsletter-icon i { font-size: var(--text-3xl) !important; }
            
            .faq-section { padding: var(--space-16) 0 !important; }
            .faq-section h2 { font-size: var(--text-3xl) !important; }
            .faq-item { margin-bottom: var(--space-4) !important; }
            .faq-question { padding: var(--space-5) !important; }
            .faq-question h3 { font-size: var(--text-base) !important; }
        }
        
        @media (max-width: 480px) {
            .section-title h2 { font-size: var(--text-2xl); }
            .properties-carousel-wrapper { padding: 0 var(--space-8); }
        }
        
        /* Mobile Menu Styles */
        .mobile-menu {
            position: fixed;
            inset: 0;
            z-index: 2000;
            visibility: hidden;
            transition: visibility 0.3s;
        }
        .mobile-menu.active {
            visibility: visible;
        }
        .mobile-menu-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0,0,0,0.5);
            opacity: 0;
            transition: opacity 0.3s;
        }
        .mobile-menu.active .mobile-menu-overlay {
            opacity: 1;
        }
        .mobile-menu-panel {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            width: 300px;
            background: white;
            transform: translateX(100%);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            flex-direction: column;
            padding: 24px;
        }
        .mobile-menu.active .mobile-menu-panel {
            transform: translateX(0);
        }
        .mobile-menu-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
        }
        .mobile-menu-logo {
            display: flex;
            align-items: center;
            flex-shrink: 0;
            border: none;
            outline: none;
            box-shadow: none;
            background: transparent;
            line-height: 0;
        }
        .mobile-menu-logo img.site-logo-img--drawer {
            height: 3rem;
            width: auto;
            object-fit: contain;
            object-position: left center;
            border: none;
            outline: none;
            box-shadow: none;
            background: transparent;
            display: block;
        }
        @media (min-width: 768px) {
            .mobile-menu-logo img.site-logo-img--drawer {
                height: 4rem;
            }
        }
        @media (min-width: 1024px) {
            .mobile-menu-logo img.site-logo-img--drawer {
                height: 5rem;
            }
        }
        .mobile-menu-link {
            display: block;
            padding: 12px 0;
            font-size: 18px;
            font-weight: 500;
            color: var(--neutral-900);
            text-decoration: none;
            border-bottom: 1px solid var(--neutral-100);
        }
        .mobile-menu-cta {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 20px;
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
        }
        .mobile-menu-close {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: var(--neutral-600);
        }
    </style>
</head>
<body>
    <!-- Scroll Indicator -->
    <div class="scroll-indicator" id="scrollIndicator"></div>
    
    <!-- Header - Cinematic Style -->
    <header id="mainHeader">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="logo" title="Casa Del Concierge — Accueil">
            <img src="{{ asset('images/logo.png') }}" alt="Casa Del Concierge" class="site-logo-img" loading="eager" decoding="async">
        </a>
        
        <!-- Center Navigation -->
        <nav class="nav-center">
            <a href="{{ route('houses.index') }}" class="nav-center-link active">Propriétés</a>
            <a href="#about" class="nav-center-link">Pourquoi nous</a>
            <a href="#services" class="nav-center-link">Services</a>
            <a href="#contact" class="nav-center-link">Contact</a>
        </nav>
        
        <!-- Right Menu -->
        <div class="user-menu">
            <div class="language-selector">
                <i class="fas fa-globe"></i>
                <select id="languageSelector" onchange="switchLanguage(this.value)">
                    <option value="fr" selected>FR</option>
                    <option value="en">EN</option>
                    <option value="de">DE</option>
                </select>
            </div>
            
            @auth
                @if(auth()->user()->role === 'locataire')
                    <a href="{{ route('locataire.dashboard') }}" class="nav-btn">
                        <i class="fas fa-th-large"></i>
                        <span>Dashboard</span>
                    </a>
                @else
                    <a href="{{ route('reservations.index') }}" class="nav-btn">
                        <i class="fas fa-calendar-check"></i>
                        <span>Réservations</span>
                    </a>
                @endif
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="nav-btn">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Déconnexion</span>
                    </button>
                </form>
            @else
                <!-- Dropdown Connexion -->
                <div class="nav-dropdown">
                    <button class="nav-btn nav-dropdown-trigger" id="loginDropdownBtn">
                        <span>Se connecter</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="nav-dropdown-menu" id="loginDropdownMenu">
                        <a href="{{ route('login') }}" class="nav-dropdown-item">
                            <div class="nav-dropdown-icon">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="nav-dropdown-content">
                                <span class="nav-dropdown-title">Espace Voyageur</span>
                                <span class="nav-dropdown-desc">Réservez votre prochain séjour</span>
                            </div>
                        </a>
                        <a href="{{ route('locataire.login.form') }}" class="nav-dropdown-item">
                            <div class="nav-dropdown-icon loueur">
                                <i class="fas fa-home"></i>
                            </div>
                            <div class="nav-dropdown-content">
                                <span class="nav-dropdown-title">Espace Loueur</span>
                                <span class="nav-dropdown-desc">Gérez vos propriétés</span>
                            </div>
                        </a>
                    </div>
                </div>
                
                <!-- Bouton Nous Rejoindre -->
                <a href="/demande-location" class="nav-btn primary">
                    <i class="fas fa-handshake"></i>
                    <span>Nous rejoindre</span>
                </a>
            @endauth
            
            <!-- Mobile menu button -->
            <button class="nav-menu-btn" id="navMenuBtn">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </header>
    
    <!-- Mobile Menu -->
    <nav id="mobileMenu" class="mobile-menu" aria-hidden="true">
        <div class="mobile-menu-overlay"></div>
        <div class="mobile-menu-panel">
            <div class="mobile-menu-header">
                <a href="{{ url('/') }}" class="mobile-menu-logo" title="Accueil">
                    <img src="{{ asset('images/logo.png') }}" alt="Casa Del Concierge" class="site-logo-img site-logo-img--drawer" loading="eager" decoding="async">
                </a>
                <button class="mobile-menu-close" id="mobileMenuClose" aria-label="Fermer le menu">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="mobile-menu-body">
                <a href="{{ route('houses.index') }}" class="mobile-menu-link">Propriétés</a>
                <a href="#about" class="mobile-menu-link">Pourquoi nous</a>
                <a href="#services" class="mobile-menu-link">Services</a>
                <a href="#how-it-works" class="mobile-menu-link">Comment ça marche</a>
            </div>
            <div class="mobile-menu-footer">
                @guest
                    <a href="{{ route('login') }}" class="mobile-menu-cta">
                        <i class="fas fa-user-circle"></i>
                        <span>Connexion</span>
                    </a>
                @endguest
                @auth
                    <a href="{{ route('locataire.dashboard') }}" class="mobile-menu-cta">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Tableau de bord</span>
                    </a>
                @endauth
            </div>
        </div>
    </nav>
    
    <main>
    <!-- ============================================
         HERO SECTION - IMMERSIVE WITH LIGHT OVERLAY
         Full image background with bright feel
         ============================================ -->
    <style>
        /* ==========================================
           HERO - IMMERSIVE LIGHT DESIGN
           ========================================== */
        .hero-immersive {
            position: relative;
            width: 100%;
            min-height: 100vh;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* Full background image */
        .hero-bg-image {
            position: absolute;
            inset: 0;
            z-index: 1;
        }
        
        .hero-bg-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }
        
        /* Light overlay - warm and bright */
        .hero-overlay {
            position: absolute;
            inset: 0;
            z-index: 2;
            background: 
                linear-gradient(135deg, 
                    rgba(255, 255, 255, 0.92) 0%,
                    rgba(255, 255, 255, 0.85) 40%,
                    rgba(255, 255, 255, 0.6) 70%,
                    rgba(255, 255, 255, 0.3) 100%
                );
        }
        
        /* Soft color accents */
        .hero-glow {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            z-index: 3;
        }
        
        .hero-glow-rose {
            width: 600px;
            height: 600px;
            top: -100px;
            left: -100px;
            background: radial-gradient(circle, rgba(255, 56, 92, 0.08) 0%, transparent 70%);
        }
        
        .hero-glow-blue {
            width: 500px;
            height: 500px;
            bottom: -100px;
            right: -50px;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.06) 0%, transparent 70%);
        }
        
        /* Main content */
        .hero-main {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 1300px;
            padding: 100px 60px;
            display: grid;
            grid-template-columns: 1.1fr 1fr;
            gap: 80px;
            align-items: center;
        }
        
        /* Left content */
        .hero-content {
            max-width: 600px;
        }
        
        /* Badge */
        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 10px 18px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(0, 0, 0, 0.06);
            border-radius: 100px;
            margin-bottom: 28px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
            opacity: 0;
            animation: fadeUp 0.8s ease forwards;
            animation-delay: 0.2s;
        }
        
        .hero-badge-icon {
            width: 8px;
            height: 8px;
            background: #10B981;
            border-radius: 50%;
            animation: pulse 2s ease-in-out infinite;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        
        .hero-badge-text {
            font-size: 13px;
            font-weight: 600;
            color: var(--neutral-700);
        }
        
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(24px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Title */
        .hero-title {
            font-size: clamp(44px, 5.5vw, 72px);
            font-weight: 700;
            line-height: 1.08;
            letter-spacing: -0.03em;
            color: var(--neutral-900);
            margin-bottom: 24px;
            opacity: 0;
            animation: fadeUp 0.8s ease forwards;
            animation-delay: 0.35s;
        }
        
        .hero-title-accent {
            color: #FF385C;
        }
        
        /* Description */
        .hero-desc {
            font-size: 19px;
            line-height: 1.75;
            color: var(--neutral-600);
            margin-bottom: 44px;
            max-width: 520px;
            opacity: 0;
            animation: fadeUp 0.8s ease forwards;
            animation-delay: 0.5s;
        }
        
        /* CTA Buttons */
        .hero-cta {
            display: flex;
            gap: 16px;
            align-items: center;
            margin-bottom: 56px;
            opacity: 0;
            animation: fadeUp 0.8s ease forwards;
            animation-delay: 0.5s;
        }
        
        .hero-btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding: 18px 36px;
            background: #FF385C;
            color: #fff;
            border: none;
            border-radius: 14px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 16px rgba(255, 56, 92, 0.35);
            position: relative;
            overflow: hidden;
        }
        
        .hero-btn-primary::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.2) 0%, transparent 50%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .hero-btn-primary:hover {
            background: #E31C5F;
            transform: translateY(-3px);
            box-shadow: 0 8px 28px rgba(255, 56, 92, 0.45);
        }
        
        .hero-btn-primary:hover::before {
            opacity: 1;
        }
        
        .hero-btn-primary i {
            font-size: 15px;
            transition: transform 0.3s ease;
        }
        
        .hero-btn-primary:hover i {
            transform: translateX(4px);
        }
        
        .hero-btn-secondary {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding: 18px 32px;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            color: var(--neutral-800);
            border: 2px solid rgba(0, 0, 0, 0.08);
            border-radius: 14px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .hero-btn-secondary:hover {
            background: #fff;
            border-color: rgba(0, 0, 0, 0.12);
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        }
        
        .hero-btn-secondary i {
            font-size: 15px;
            color: var(--primary);
            transition: transform 0.3s ease;
        }
        
        .hero-btn-secondary:hover i {
            transform: scale(1.15);
        }
        
        /* Trusted indicators */
        .hero-trusted {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 56px;
            opacity: 0;
            animation: fadeUp 0.8s ease forwards;
            animation-delay: 0.75s;
        }
        
        .hero-trusted-avatars {
            display: flex;
        }
        
        .hero-trusted-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: 3px solid #fff;
            margin-left: -10px;
            background: var(--neutral-200);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 600;
            color: var(--neutral-600);
            overflow: hidden;
        }
        
        .hero-trusted-avatar:first-child {
            margin-left: 0;
        }
        
        .hero-trusted-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .hero-trusted-text {
            font-size: 14px;
            color: var(--neutral-600);
            line-height: 1.4;
        }
        
        .hero-trusted-text strong {
            color: var(--neutral-900);
            font-weight: 700;
        }
        
        .hero-trusted-stars {
            color: #FBBF24;
            font-size: 13px;
            letter-spacing: 2px;
        }
        
        /* Stats */
        .hero-stats {
            display: flex;
            gap: 48px;
            opacity: 0;
            animation: fadeUp 0.8s ease forwards;
            animation-delay: 0.8s;
        }
        
        .hero-stat {
            text-align: left;
        }
        
        .hero-stat-value {
            font-size: 32px;
            font-weight: 700;
            color: var(--neutral-900);
            line-height: 1;
            margin-bottom: 6px;
        }
        
        .hero-stat-value span {
            color: #FF385C;
        }
        
        .hero-stat-label {
            font-size: 14px;
            color: var(--neutral-500);
        }
        
        /* Right - Cards showcase */
        .hero-showcase {
            position: relative;
            height: 520px;
            opacity: 0;
            animation: fadeUp 0.8s ease forwards;
            animation-delay: 0.5s;
        }
        
        /* Main property card */
        .showcase-card-main {
            position: absolute;
            top: 0;
            right: 0;
            width: 340px;
            background: #fff;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 
                0 20px 50px rgba(0, 0, 0, 0.1),
                0 0 0 1px rgba(0, 0, 0, 0.02);
            transition: all 0.4s ease;
        }
        
        .showcase-card-main:hover {
            transform: translateY(-8px) rotate(1deg);
            box-shadow: 
                0 30px 60px rgba(0, 0, 0, 0.15),
                0 0 0 1px rgba(0, 0, 0, 0.02);
        }
        
        .showcase-card-img {
            width: 100%;
            height: 200px;
            overflow: hidden;
            position: relative;
        }
        
        .showcase-card-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }
        
        .showcase-card-main:hover .showcase-card-img img {
            transform: scale(1.08);
        }
        
        .showcase-card-badge {
            position: absolute;
            top: 14px;
            left: 14px;
            padding: 8px 14px;
            background: #fff;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 600;
            color: var(--neutral-900);
            display: flex;
            align-items: center;
            gap: 6px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        
        .showcase-card-badge i {
            color: #FF385C;
            font-size: 11px;
        }
        
        .showcase-card-fav {
            position: absolute;
            top: 14px;
            right: 14px;
            width: 36px;
            height: 36px;
            background: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--neutral-400);
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        
        .showcase-card-fav:hover {
            color: #FF385C;
            transform: scale(1.1);
        }
        
        .showcase-card-body {
            padding: 20px;
        }
        
        .showcase-card-location {
            font-size: 13px;
            color: var(--neutral-500);
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        
        .showcase-card-location i {
            color: #FF385C;
            font-size: 11px;
        }
        
        .showcase-card-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--neutral-900);
            margin-bottom: 14px;
        }
        
        .showcase-card-details {
            display: flex;
            gap: 16px;
            padding-bottom: 14px;
            border-bottom: 1px solid var(--neutral-100);
            margin-bottom: 14px;
        }
        
        .showcase-card-detail {
            font-size: 13px;
            color: var(--neutral-600);
            display: flex;
            align-items: center;
            gap: 6px;
        }
        
        .showcase-card-detail i {
            color: var(--neutral-400);
            font-size: 12px;
        }
        
        .showcase-card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .showcase-card-price {
            font-size: 22px;
            font-weight: 700;
            color: var(--neutral-900);
        }
        
        .showcase-card-price span {
            font-size: 14px;
            font-weight: 500;
            color: var(--neutral-500);
        }
        
        .showcase-card-rating {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 8px 12px;
            background: var(--neutral-50);
            border-radius: 30px;
        }
        
        .showcase-card-rating i {
            color: #FBBF24;
            font-size: 13px;
        }
        
        .showcase-card-rating span {
            font-size: 14px;
            font-weight: 600;
            color: var(--neutral-900);
        }
        
        /* Secondary card */
        .showcase-card-secondary {
            position: absolute;
            bottom: 40px;
            left: 0;
            width: 260px;
            background: #fff;
            border-radius: 20px;
            padding: 18px;
            box-shadow: 
                0 15px 40px rgba(0, 0, 0, 0.08),
                0 0 0 1px rgba(0, 0, 0, 0.02);
            display: flex;
            align-items: center;
            gap: 14px;
            transition: all 0.4s ease;
            z-index: 2;
        }
        
        .showcase-card-secondary:hover {
            transform: translateX(8px);
            box-shadow: 
                0 20px 50px rgba(0, 0, 0, 0.12),
                0 0 0 1px rgba(0, 0, 0, 0.02);
        }
        
        .showcase-card-secondary-img {
            width: 64px;
            height: 64px;
            border-radius: 14px;
            overflow: hidden;
            flex-shrink: 0;
        }
        
        .showcase-card-secondary-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .showcase-card-secondary-info h4 {
            font-size: 15px;
            font-weight: 600;
            color: var(--neutral-900);
            margin-bottom: 4px;
        }
        
        .showcase-card-secondary-info p {
            font-size: 13px;
            color: var(--neutral-500);
            margin-bottom: 6px;
        }
        
        .showcase-card-secondary-price {
            font-size: 15px;
            font-weight: 700;
            color: #FF385C;
        }
        
        /* Live notification */
        .showcase-live {
            position: absolute;
            top: 50%;
            left: -30px;
            transform: translateY(-50%);
            background: #fff;
            border-radius: 16px;
            padding: 14px 18px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            display: flex;
            align-items: center;
            gap: 12px;
            z-index: 3;
            opacity: 0;
            animation: fadeUp 0.8s ease forwards;
            animation-delay: 1s;
        }
        
        .showcase-live-dot {
            width: 10px;
            height: 10px;
            background: #10B981;
            border-radius: 50%;
            position: relative;
        }
        
        .showcase-live-dot::after {
            content: '';
            position: absolute;
            inset: -4px;
            border: 2px solid #10B981;
            border-radius: 50%;
            animation: livePing 2s ease-out infinite;
        }
        
        @keyframes livePing {
            0% { transform: scale(1); opacity: 0.7; }
            100% { transform: scale(2); opacity: 0; }
        }
        
        .showcase-live-text strong {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: var(--neutral-900);
        }
        
        .showcase-live-text span {
            font-size: 12px;
            color: var(--neutral-500);
        }
        
        /* Scroll indicator */
        .hero-scroll {
            position: absolute;
            bottom: 32px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            opacity: 0;
            animation: fadeUp 0.8s ease forwards;
            animation-delay: 1.2s;
        }
        
        .hero-scroll-text {
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--neutral-500);
        }
        
        .hero-scroll-icon {
            width: 24px;
            height: 38px;
            border: 2px solid var(--neutral-300);
            border-radius: 12px;
            display: flex;
            justify-content: center;
            padding-top: 8px;
        }
        
        .hero-scroll-dot {
            width: 4px;
            height: 8px;
            background: #FF385C;
            border-radius: 2px;
            animation: scrollAnim 2s ease-in-out infinite;
        }
        
        @keyframes scrollAnim {
            0%, 100% { transform: translateY(0); opacity: 1; }
            50% { transform: translateY(10px); opacity: 0.3; }
        }
        
        /* ==========================================
           RESPONSIVE
           ========================================== */
        @media (max-width: 1200px) {
            .hero-main {
                padding: 100px 40px;
                gap: 60px;
            }
            
            .showcase-card-main {
                width: 300px;
            }
            
            .showcase-card-secondary {
                width: 240px;
            }
            
            .showcase-live {
                left: -10px;
            }
        }
        
        @media (max-width: 1024px) {
            .hero-main {
                grid-template-columns: 1fr;
                text-align: center;
                max-width: 650px;
                margin: 0 auto;
            }
            
            .hero-content {
                max-width: 100%;
            }
            
            .hero-desc {
                margin-left: auto;
                margin-right: auto;
            }
            
            .hero-cta {
                justify-content: center;
            }
            
            .hero-trusted {
                justify-content: center;
            }
            
            .hero-stats {
                justify-content: center;
            }
            
            .hero-showcase {
                display: none;
            }
            
            .hero-overlay {
                background: 
                    linear-gradient(180deg, 
                        rgba(255, 255, 255, 0.95) 0%,
                        rgba(255, 255, 255, 0.9) 50%,
                        rgba(255, 255, 255, 0.85) 100%
                    );
            }
        }
        
        @media (max-width: 768px) {
            .hero-main {
                padding: 90px 24px 80px;
            }
            
            .hero-title {
                font-size: clamp(32px, 9vw, 44px);
            }
            
            .hero-desc {
                font-size: 16px;
                margin-bottom: 28px;
            }
            
            .hero-cta {
                flex-direction: column;
                gap: 12px;
                margin-bottom: 40px;
            }
            
            .hero-btn-primary,
            .hero-btn-secondary {
                width: 100%;
                justify-content: center;
                padding: 16px 28px;
            }
            
            .hero-trusted {
                flex-direction: column;
                gap: 10px;
                text-align: center;
                margin-bottom: 40px;
            }
            
            .hero-stats {
                flex-wrap: wrap;
                gap: 24px;
            }
            
            .hero-stat {
                text-align: center;
            }
            
            .hero-scroll {
                display: none;
            }
        }
    </style>
        
    <section class="hero-immersive">
        <!-- Background Image -->
        <div class="hero-bg-image">
            <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=2000&q=85" alt="Beautiful luxury home">
        </div>
        
        <!-- Light Overlay -->
        <div class="hero-overlay"></div>
        
        <!-- Soft color accents -->
        <div class="hero-glow hero-glow-rose"></div>
        <div class="hero-glow hero-glow-blue"></div>
        
        <!-- Main Content -->
        <div class="hero-main">
            <!-- Left Content -->
            <div class="hero-content">
                <div class="hero-badge">
                    <span class="hero-badge-icon"></span>
                    <span class="hero-badge-text">Conciergerie Premium depuis 2018</span>
                </div>
                
                <h1 class="hero-title">
                    Trouvez votre prochain<br>
                    <span class="hero-title-accent">séjour de rêve</span>
                </h1>
                
                <p class="hero-desc">
                    Des propriétés d'exception sélectionnées avec soin pour des moments inoubliables. Découvrez le luxe accessible.
                </p>
                
                <!-- CTA Buttons -->
                <div class="hero-cta">
                    <a href="{{ route('houses.index') }}" class="hero-btn-primary">
                        <span>Explorer nos propriétés</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                    <a href="#services" class="hero-btn-secondary">
                        <i class="fas fa-concierge-bell"></i>
                        <span>Nos services</span>
                    </a>
                </div>
                
                <!-- Trusted by -->
                <div class="hero-trusted">
                    <div class="hero-trusted-avatars">
                        <div class="hero-trusted-avatar" style="background: #FFE0E6;">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="">
                        </div>
                        <div class="hero-trusted-avatar" style="background: #E0E7FF;">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="">
                        </div>
                        <div class="hero-trusted-avatar" style="background: #D1FAE5;">
                            <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="">
                        </div>
                        <div class="hero-trusted-avatar" style="background: #FEF3C7;">
                            <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="">
                        </div>
                        <div class="hero-trusted-avatar" style="background: var(--neutral-100); font-size: 11px;">+2k</div>
                    </div>
                    <div class="hero-trusted-text">
                        <div class="hero-trusted-stars">★★★★★</div>
                        <strong>15 000+ voyageurs</strong> nous font confiance
                    </div>
                </div>
                
                <!-- Stats -->
                <div class="hero-stats">
                    <div class="hero-stat">
                        <div class="hero-stat-value">500<span>+</span></div>
                        <div class="hero-stat-label">Propriétés</div>
                    </div>
                    <div class="hero-stat">
                        <div class="hero-stat-value">15k<span>+</span></div>
                        <div class="hero-stat-label">Voyageurs satisfaits</div>
                    </div>
                    <div class="hero-stat">
                        <div class="hero-stat-value">4.9<span>/5</span></div>
                        <div class="hero-stat-label">Note moyenne</div>
                    </div>
                </div>
            </div>
            
            <!-- Right - Showcase -->
            <div class="hero-showcase">
                <!-- Main Card -->
                <div class="showcase-card-main">
                    <div class="showcase-card-img">
                        <img src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?auto=format&fit=crop&w=800&q=80" alt="Villa Méditerranée">
                        <div class="showcase-card-badge">
                            <i class="fas fa-fire"></i>
                            Populaire
                        </div>
                        <div class="showcase-card-fav">
                            <i class="far fa-heart"></i>
                        </div>
                    </div>
                    <div class="showcase-card-body">
                        <div class="showcase-card-location">
                            <i class="fas fa-map-marker-alt"></i>
                            Côte d'Azur, France
                        </div>
                        <div class="showcase-card-title">Villa Méditerranée</div>
                        <div class="showcase-card-details">
                            <span class="showcase-card-detail"><i class="fas fa-bed"></i> 4 chambres</span>
                            <span class="showcase-card-detail"><i class="fas fa-bath"></i> 3 SDB</span>
                            <span class="showcase-card-detail"><i class="fas fa-ruler-combined"></i> 180m²</span>
                        </div>
                        <div class="showcase-card-footer">
                            <div class="showcase-card-price">€350 <span>/nuit</span></div>
                            <div class="showcase-card-rating">
                                <i class="fas fa-star"></i>
                                <span>4.9</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Secondary Card -->
                <div class="showcase-card-secondary">
                    <div class="showcase-card-secondary-img">
                        <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=200&q=80" alt="Loft Parisien">
                    </div>
                    <div class="showcase-card-secondary-info">
                        <h4>Loft Parisien</h4>
                        <p>Marais, Paris</p>
                        <span class="showcase-card-secondary-price">€180 /nuit</span>
                    </div>
                </div>
                
                <!-- Live notification -->
                <div class="showcase-live">
                    <div class="showcase-live-dot"></div>
                    <div class="showcase-live-text">
                        <strong>12 personnes</strong>
                        <span>consultent ce bien</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="hero-scroll" id="heroScroll">
            <span class="hero-scroll-text">Découvrir</span>
            <div class="hero-scroll-icon">
                <div class="hero-scroll-dot"></div>
            </div>
        </div>
    </section>
        
        <!-- ============================================
             WHY CHOOSE US - PREMIUM SHOWCASE SECTION
             3D Cards with reveal animations
             ============================================ -->
        <style>
            .why-section {
                padding: 160px 0;
                background: var(--white);
                position: relative;
                overflow: hidden;
            }
            
            /* Decorative background elements */
            .why-bg-pattern {
                position: absolute;
                inset: 0;
                background-image: 
                    radial-gradient(circle at 20% 80%, rgba(255, 56, 92, 0.03) 0%, transparent 50%),
                    radial-gradient(circle at 80% 20%, rgba(99, 102, 241, 0.03) 0%, transparent 50%);
                pointer-events: none;
            }
            
            .why-grid-lines {
                position: absolute;
                inset: 0;
                background-image: 
                    linear-gradient(90deg, rgba(0,0,0,0.03) 1px, transparent 1px),
                    linear-gradient(rgba(0,0,0,0.03) 1px, transparent 1px);
                background-size: 96px 96px;
                opacity: 0.6;
                pointer-events: none;
            }
            
            /* Header */
            .why-header {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 80px;
                align-items: end;
                margin-bottom: 80px;
                position: relative;
                z-index: 2;
            }
            
            .why-header-left {
                max-width: 600px;
            }
            
            .why-label {
                display: inline-flex;
                align-items: center;
                gap: 12px;
                margin-bottom: 24px;
            }
            
            .why-label-dot {
                width: 8px;
                height: 8px;
                background: var(--primary);
                border-radius: 50%;
                animation: pulseDot 2s ease-in-out infinite;
            }
            
            @keyframes pulseDot {
                0%, 100% { transform: scale(1); opacity: 1; }
                50% { transform: scale(1.5); opacity: 0.5; }
            }
            
            .why-label-text {
                font-size: 12px;
                font-weight: 700;
                letter-spacing: 3px;
                text-transform: uppercase;
                color: var(--primary);
            }
            
            .why-title {
                font-size: clamp(40px, 5vw, 64px);
                font-weight: 800;
                line-height: 1.1;
                letter-spacing: -0.03em;
                color: var(--neutral-900);
                margin-bottom: 0;
            }
            
            .why-title-line {
                display: block;
            }
            
            .why-title-accent {
                color: var(--primary);
            }
            
            .why-header-right p {
                font-size: 18px;
                line-height: 1.8;
                color: var(--neutral-600);
                max-width: 400px;
            }
            
            /* Feature Cards Grid */
            .why-cards {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 24px;
                position: relative;
                z-index: 2;
            }
            
            /* Feature Card - 3D Transform (Awwwards refined) */
            .why-card {
                position: relative;
                height: 420px;
                perspective: 1200px;
                text-decoration: none;
                color: inherit;
            }
            
            .why-card-inner {
                position: relative;
                width: 100%;
                height: 100%;
                background: var(--white);
                border-radius: 28px;
                border: 1px solid rgba(0, 0, 0, 0.06);
                padding: 40px 36px;
                display: flex;
                flex-direction: column;
                transition: all 0.5s var(--ease-out-expo);
                transform-style: preserve-3d;
                overflow: hidden;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
            }
            
            .why-card:hover .why-card-inner {
                transform: translateY(-20px) rotateX(1deg);
                border-color: rgba(255, 56, 92, 0.2);
                box-shadow: 
                    0 32px 64px -16px rgba(255, 56, 92, 0.18),
                    0 0 0 1px rgba(255, 56, 92, 0.08);
            }
            
            /* Card number */
            .why-card-number {
                position: absolute;
                top: 32px;
                right: 32px;
                font-size: 100px;
                font-weight: 900;
                line-height: 1;
                color: var(--neutral-100);
                transition: all 0.6s var(--ease-out-expo);
                z-index: 0;
            }
            
            .why-card:hover .why-card-number {
                color: rgba(255, 56, 92, 0.1);
                transform: scale(1.1);
            }
            
            /* Icon */
            .why-card-icon {
                width: 72px;
                height: 72px;
                background: linear-gradient(135deg, var(--neutral-100) 0%, var(--neutral-50) 100%);
                border-radius: 20px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 32px;
                position: relative;
                z-index: 1;
                transition: all 0.5s var(--ease-spring);
            }
            
            .why-card:hover .why-card-icon {
                background: var(--gradient-primary);
                transform: scale(1.1) rotate(-5deg);
                box-shadow: 0 20px 40px var(--primary-glow);
            }
            
            .why-card-icon i {
                font-size: 28px;
                color: var(--neutral-700);
                transition: all 0.4s ease;
            }
            
            .why-card:hover .why-card-icon i {
                color: var(--white);
                transform: scale(1.1);
            }
            
            /* Content */
            .why-card-content {
                flex: 1;
                display: flex;
                flex-direction: column;
                position: relative;
                z-index: 1;
            }
            
            .why-card-title {
                font-size: 22px;
                font-weight: 700;
                color: var(--neutral-900);
                margin-bottom: 16px;
                letter-spacing: -0.02em;
                transition: color 0.3s ease;
            }
            
            .why-card:hover .why-card-title {
                color: var(--primary);
            }
            
            .why-card-desc {
                font-size: 15px;
                line-height: 1.7;
                color: var(--neutral-500);
                flex: 1;
            }
            
            /* Card Footer */
            .why-card-footer {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding-top: 24px;
                border-top: 1px solid var(--neutral-100);
                margin-top: auto;
            }
            
            .why-card-link {
                font-size: 14px;
                font-weight: 600;
                color: var(--neutral-500);
                display: flex;
                align-items: center;
                gap: 8px;
                transition: all 0.3s ease;
            }
            
            .why-card:hover .why-card-link {
                color: var(--primary);
            }
            
            .why-card-link i {
                font-size: 12px;
                transition: transform 0.3s ease;
            }
            
            .why-card:hover .why-card-link i {
                transform: translateX(6px);
            }
            
            .why-card-arrow {
                width: 44px;
                height: 44px;
                border-radius: 50%;
                background: var(--neutral-100);
                display: flex;
                align-items: center;
                justify-content: center;
                transition: all 0.4s var(--ease-spring);
            }
            
            .why-card:hover .why-card-arrow {
                background: var(--primary);
                transform: scale(1.1);
            }
            
            .why-card-arrow i {
                font-size: 14px;
                color: var(--neutral-500);
                transition: all 0.3s ease;
            }
            
            .why-card:hover .why-card-arrow i {
                color: var(--white);
                transform: translateX(2px);
            }
            
            /* Hover shine effect */
            .why-card-inner::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(
                    90deg,
                    transparent 0%,
                    rgba(255, 255, 255, 0.4) 50%,
                    transparent 100%
                );
                transition: left 0.8s ease;
                z-index: 10;
                pointer-events: none;
            }
            
            .why-card:hover .why-card-inner::before {
                left: 100%;
            }
            
            /* Decorative line connecting cards */
            .why-cards::before {
                content: '';
                position: absolute;
                top: 50%;
                left: 5%;
                right: 5%;
                height: 1px;
                background: linear-gradient(90deg, transparent, var(--neutral-200), transparent);
                z-index: 0;
            }
            
            /* Animation on scroll */
            .why-card {
                opacity: 0;
                transform: translateY(60px);
            }
            
            .why-card.visible {
                animation: cardReveal 0.8s var(--ease-out-expo) forwards;
            }
            
            .why-card:nth-child(1).visible { animation-delay: 0s; }
            .why-card:nth-child(2).visible { animation-delay: 0.1s; }
            .why-card:nth-child(3).visible { animation-delay: 0.2s; }
            .why-card:nth-child(4).visible { animation-delay: 0.3s; }
            
            @keyframes cardReveal {
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            
            /* Bottom CTA */
            .why-bottom {
                display: flex;
                justify-content: center;
                margin-top: 80px;
                position: relative;
                z-index: 2;
            }
            
            .why-cta {
                display: inline-flex;
                align-items: center;
                gap: 16px;
                padding: 20px 40px;
                background: var(--neutral-950);
                color: var(--white);
                font-size: 15px;
                font-weight: 600;
                border-radius: 60px;
                text-decoration: none;
                transition: all 0.4s var(--ease-spring);
            }
            
            .why-cta:hover {
                transform: translateY(-4px);
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
                gap: 20px;
            }
            
            .why-cta i {
                transition: transform 0.3s ease;
            }
            
            .why-cta:hover i {
                transform: translateX(4px);
            }
            
            /* Responsive */
            @media (max-width: 1200px) {
                .why-cards {
                    grid-template-columns: repeat(2, 1fr);
                }
                
                .why-card {
                    height: 380px;
                }
            }
            
            @media (max-width: 1024px) {
                .why-section {
                    padding: 100px 0;
                }
                
                .why-header {
                    grid-template-columns: 1fr;
                    gap: 32px;
                    text-align: center;
                }
                
                .why-header-left {
                    max-width: 100%;
                }
                
                .why-label {
                    justify-content: center;
                }
                
                .why-header-right p {
                    max-width: 100%;
                    margin: 0 auto;
                }
            }
            
            @media (max-width: 768px) {
                .why-section {
                    padding: 80px 0;
                }
                
                .why-cards {
                    grid-template-columns: 1fr;
                    gap: 20px;
                }
                
                .why-card {
                    height: auto;
                    min-height: 340px;
                }
                
                .why-card-inner {
                    padding: 32px 24px;
                }
                
                .why-card-number {
                    font-size: 80px;
                    top: 24px;
                    right: 24px;
                }
                
                .why-card-icon {
                    width: 64px;
                    height: 64px;
                }
                
                .why-card-icon i {
                    font-size: 24px;
                }
                
                .why-title {
                    font-size: 36px;
                }
                
                .why-bottom {
                    margin-top: 60px;
                }
                
                .why-cta {
                    width: 100%;
                    justify-content: center;
                }
            }
        </style>
        
        <section class="why-section why-choose-us" id="about">
            <div class="why-bg-pattern"></div>
            <div class="why-grid-lines"></div>
            
            <div class="container">
                <div class="why-header">
                    <div class="why-header-left">
                        <div class="why-label">
                            <span class="why-label-dot"></span>
                            <span class="why-label-text">Pourquoi nous choisir</span>
                        </div>
                        <h2 class="why-title">
                            <span class="why-title-line">L'excellence</span>
                            <span class="why-title-line">dans chaque <span class="why-title-accent">détail</span></span>
                        </h2>
                    </div>
                    <div class="why-header-right">
                        <p>Nous redéfinissons l'expérience de location premium avec un service sur-mesure, des propriétés d'exception et une attention particulière portée à chaque moment de votre séjour.</p>
                    </div>
                </div>
                
                <div class="why-cards">
                    <a href="{{ route('features.premium-quality') }}" class="why-card">
                        <div class="why-card-inner">
                            <span class="why-card-number">01</span>
                            <div class="why-card-icon">
                                <i class="fas fa-gem"></i>
                            </div>
                            <div class="why-card-content">
                                <h3 class="why-card-title">Qualité Premium</h3>
                                <p class="why-card-desc">Chaque propriété est rigoureusement sélectionnée selon nos critères exigeants de confort, d'élégance et d'équipements haut de gamme.</p>
                            </div>
                            <div class="why-card-footer">
                                <span class="why-card-link">
                                    <span>Découvrir</span>
                                    <i class="fas fa-arrow-right"></i>
                                </span>
                                <div class="why-card-arrow">
                                    <i class="fas fa-arrow-up-right"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                    
                    <a href="{{ route('features.support') }}" class="why-card">
                        <div class="why-card-inner">
                            <span class="why-card-number">02</span>
                            <div class="why-card-icon">
                                <i class="fas fa-headset"></i>
                            </div>
                            <div class="why-card-content">
                                <h3 class="why-card-title">Support 24/7</h3>
                                <p class="why-card-desc">Notre équipe de conciergerie est disponible jour et nuit pour répondre à toutes vos demandes et garantir un séjour parfait.</p>
                            </div>
                            <div class="why-card-footer">
                                <span class="why-card-link">
                                    <span>En savoir plus</span>
                                    <i class="fas fa-arrow-right"></i>
                                </span>
                                <div class="why-card-arrow">
                                    <i class="fas fa-arrow-up-right"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                    
                    <a href="{{ route('features.locations') }}" class="why-card">
                        <div class="why-card-inner">
                            <span class="why-card-number">03</span>
                            <div class="why-card-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="why-card-content">
                                <h3 class="why-card-title">Emplacements Privilégiés</h3>
                                <p class="why-card-desc">Des adresses de prestige dans les quartiers les plus recherchés, offrant proximité et exclusivité pour un séjour mémorable.</p>
                            </div>
                            <div class="why-card-footer">
                                <span class="why-card-link">
                                    <span>Explorer</span>
                                    <i class="fas fa-arrow-right"></i>
                                </span>
                                <div class="why-card-arrow">
                                    <i class="fas fa-arrow-up-right"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                    
                    <a href="{{ route('features.security') }}" class="why-card">
                        <div class="why-card-inner">
                            <span class="why-card-number">04</span>
                            <div class="why-card-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div class="why-card-content">
                                <h3 class="why-card-title">Sécurité Totale</h3>
                                <p class="why-card-desc">Transactions sécurisées, assurances complètes et vérifications rigoureuses pour une tranquillité d'esprit absolue.</p>
                            </div>
                            <div class="why-card-footer">
                                <span class="why-card-link">
                                    <span>En savoir plus</span>
                                    <i class="fas fa-arrow-right"></i>
                                </span>
                                <div class="why-card-arrow">
                                    <i class="fas fa-arrow-up-right"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="why-bottom">
                    <a href="{{ route('houses.index') }}" class="why-cta">
                        <span>Découvrir toutes nos propriétés</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </section>
        
        
        <!-- Section Services Premium - Modern Glass Design -->
        <style>
            .services-section {
                padding: var(--space-24) 0;
                background: var(--white);
                position: relative;
                overflow: hidden;
            }
            
            /* Gradient Orbs */
            .services-section::before {
                content: '';
                position: absolute;
                top: -200px;
                left: -100px;
                width: 500px;
                height: 500px;
                background: radial-gradient(circle, rgba(255, 56, 92, 0.08) 0%, transparent 60%);
                border-radius: var(--radius-full);
                pointer-events: none;
            }
            
            .services-section::after {
                content: '';
                position: absolute;
                bottom: -150px;
                right: -100px;
                width: 400px;
                height: 400px;
                background: radial-gradient(circle, rgba(255, 56, 92, 0.06) 0%, transparent 60%);
                border-radius: var(--radius-full);
                pointer-events: none;
            }
            
            /* Services Grid */
            .services-modern-grid {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: var(--space-8);
                margin-top: var(--space-12);
            }
            
            /* Service Card - Glass Effect (Awwwards refined) */
            .service-modern-card {
                text-decoration: none;
                color: inherit;
                display: block;
                position: relative;
                border-radius: 28px;
                overflow: hidden;
                background: var(--white);
                border: 1px solid rgba(0, 0, 0, 0.06);
                box-shadow: 
                    0 2px 8px rgba(0, 0, 0, 0.04),
                    0 1px 2px rgba(0, 0, 0, 0.02);
                transition: all 0.45s var(--ease-out-expo);
            }
            
            .service-modern-card:hover {
                transform: translateY(-12px);
                box-shadow: 
                    0 24px 48px -12px rgba(0, 0, 0, 0.12),
                    0 0 0 1px rgba(255, 56, 92, 0.08);
                border-color: rgba(255, 56, 92, 0.12);
            }
            
            /* Image Container */
            .service-modern-image {
                position: relative;
                height: 260px;
                overflow: hidden;
            }
            
            .service-modern-image img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.7s var(--ease-out-expo);
            }
            
            .service-modern-card:hover .service-modern-image img {
                transform: scale(1.08);
            }
            
            /* Image Overlay */
            .service-modern-image::after {
                content: '';
                position: absolute;
                inset: 0;
                background: linear-gradient(180deg, transparent 40%, rgba(0, 0, 0, 0.6) 100%);
                pointer-events: none;
            }
            
            /* Floating Icon */
            .service-modern-icon {
                position: absolute;
                bottom: -28px;
                left: var(--space-6);
                width: 56px;
                height: 56px;
                background: var(--white);
                border-radius: var(--radius-xl);
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 2;
                box-shadow: var(--shadow-lg);
                transition: all var(--duration-normal) var(--ease-spring);
            }
            
            .service-modern-card:hover .service-modern-icon {
                transform: scale(1.1) rotate(-5deg);
                box-shadow: var(--shadow-glow);
            }
            
            .service-modern-icon i {
                font-size: var(--text-xl);
                color: var(--primary);
            }
            
            /* Content */
            .service-modern-content {
                padding: var(--space-10) var(--space-6) var(--space-6);
            }
            
            .service-modern-content h3 {
                font-size: var(--text-xl);
                font-weight: 700;
                color: var(--neutral-900);
                margin-bottom: var(--space-3);
                letter-spacing: var(--tracking-tight);
            }
            
            .service-modern-content p {
                color: var(--neutral-500);
                font-size: var(--text-sm);
                line-height: var(--leading-relaxed);
                margin-bottom: var(--space-5);
            }
            
            /* Link */
            .service-modern-link {
                display: inline-flex;
                align-items: center;
                gap: var(--space-2);
                font-size: var(--text-sm);
                font-weight: 600;
                color: var(--primary);
                transition: all var(--duration-fast) var(--ease-out-expo);
            }
            
            .service-modern-link i {
                font-size: var(--text-xs);
                transition: transform var(--duration-fast) var(--ease-out-expo);
            }
            
            .service-modern-card:hover .service-modern-link {
                gap: var(--space-3);
            }
            
            .service-modern-card:hover .service-modern-link i {
                transform: translateX(4px);
            }
            
            /* Badge */
            .service-badge {
                position: absolute;
                top: var(--space-4);
                right: var(--space-4);
                padding: var(--space-2) var(--space-3);
                background: rgba(255, 255, 255, 0.9);
                backdrop-filter: blur(8px);
                -webkit-backdrop-filter: blur(8px);
                border-radius: var(--radius-full);
                font-size: var(--text-xs);
                font-weight: 600;
                color: var(--neutral-900);
                z-index: 2;
            }
            
            /* Responsive */
            @media (max-width: 1024px) {
                .services-modern-grid {
                    grid-template-columns: repeat(2, 1fr);
                }
            }
            
            @media (max-width: 640px) {
                .services-section {
                    padding: var(--space-16) 0;
                }
                
                .services-modern-grid {
                    grid-template-columns: 1fr;
                    gap: var(--space-6);
                }
                
                .service-modern-image {
                    height: 200px;
                }
            }
        </style>
        
        <section class="services-section premium-services" id="services">
            <div class="container">
                <div class="section-title">
                    <span class="sub-title" data-i18n="services.subtitle">NOS SERVICES</span>
                    <h2 data-i18n="services.title">Découvrez nos services premium</h2>
                    <p data-i18n="services.description">Des services sur mesure pour rendre votre séjour inoubliable</p>
                </div>
                
                <div class="services-modern-grid">
                    <!-- Concierge Service -->
                    <a href="{{ route('services.concierge') }}" class="service-modern-card fade-in-up">
                        <div class="service-modern-image">
                            <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Service Conciergerie" loading="lazy">
                            <span class="service-badge">Populaire</span>
                        </div>
                        <div class="service-modern-icon">
                            <i class="fas fa-concierge-bell"></i>
                        </div>
                        <div class="service-modern-content">
                            <h3 data-i18n="services.concierge.title">Service Conciergerie</h3>
                            <p data-i18n="services.concierge.desc">Profitez d'un service de conciergerie 5 étoiles pour organiser votre séjour sur mesure. Réservations, activités, et bien plus encore.</p>
                            <span class="service-modern-link">
                                <span data-i18n="services.concierge.learn_more">En savoir plus</span>
                                <i class="fas fa-arrow-right"></i>
                            </span>
                        </div>
                    </a>
                    
                    <!-- Cleaning Service -->
                    <a href="{{ route('services.cleaning') }}" class="service-modern-card fade-in-up" style="animation-delay: 0.1s;">
                        <div class="service-modern-image">
                            <img src="https://images.unsplash.com/photo-1581578731548-c64695cc6952?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Nettoyage Professionnel" loading="lazy">
                            <span class="service-badge">Inclus</span>
                        </div>
                        <div class="service-modern-icon">
                            <i class="fas fa-sparkles"></i>
                        </div>
                        <div class="service-modern-content">
                            <h3 data-i18n="services.cleaning.title">Nettoyage Professionnel</h3>
                            <p data-i18n="services.cleaning.desc">Un nettoyage professionnel avant chaque arrivée pour garantir des conditions d'hygiène optimales et un accueil irréprochable.</p>
                            <span class="service-modern-link">
                                <span data-i18n="services.concierge.learn_more">En savoir plus</span>
                                <i class="fas fa-arrow-right"></i>
                            </span>
                        </div>
                    </a>
                    
                    <!-- Welcome Service -->
                    <a href="{{ route('services.welcome') }}" class="service-modern-card fade-in-up" style="animation-delay: 0.2s;">
                        <div class="service-modern-image">
                            <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Accueil Personnalisé" loading="lazy">
                            <span class="service-badge">Premium</span>
                        </div>
                        <div class="service-modern-icon">
                            <i class="fas fa-hand-holding-heart"></i>
                        </div>
                        <div class="service-modern-content">
                            <h3 data-i18n="services.welcome.title">Accueil Personnalisé</h3>
                            <p data-i18n="services.welcome.desc">Un accueil chaleureux et personnalisé avec présentation des lieux et conseils personnalisés pour profiter au mieux de votre séjour.</p>
                            <span class="service-modern-link">
                                <span data-i18n="services.concierge.learn_more">En savoir plus</span>
                                <i class="fas fa-arrow-right"></i>
                            </span>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        
        
        <!-- Section des propriétés en vedette avec Carousel - Premium -->
        <style>
            .properties-section {
                padding: var(--space-24) 0;
                background: linear-gradient(180deg, #FAFAFA 0%, #FFFFFF 100%);
                position: relative;
                overflow: hidden;
            }
            
            .properties-section::before {
                content: '';
                position: absolute;
                top: 10%;
                right: -5%;
                width: 400px;
                height: 400px;
                background: radial-gradient(circle, rgba(255, 56, 92, 0.06) 0%, transparent 60%);
                border-radius: var(--radius-full);
            }
            
            /* Premium Property Card */
            .property-premium-card {
                border-radius: var(--radius-2xl);
                overflow: hidden;
                cursor: pointer;
                transition: all var(--duration-normal) var(--ease-spring);
                background: var(--white);
                position: relative;
                border: 1px solid var(--neutral-100);
                box-shadow: var(--shadow-md);
            }
            
            .property-premium-card:hover {
                transform: translateY(-8px);
                box-shadow: var(--shadow-2xl);
                border-color: rgba(255, 56, 92, 0.15);
            }
            
            .property-premium-card .property-image-wrapper {
                position: relative;
                overflow: hidden;
                aspect-ratio: 4/3;
            }
            
            .property-premium-card .property-image {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform var(--duration-slower) var(--ease-out-expo);
            }
            
            .property-premium-card:hover .property-image {
                transform: scale(1.08);
            }
            
            /* Glass Badge */
            .property-premium-badge {
                position: absolute;
                top: var(--space-4);
                left: var(--space-4);
                padding: var(--space-2) var(--space-3);
                background: rgba(255, 255, 255, 0.9);
                backdrop-filter: blur(12px);
                -webkit-backdrop-filter: blur(12px);
                border-radius: var(--radius-full);
                font-size: var(--text-xs);
                font-weight: 600;
                color: var(--neutral-900);
                z-index: 2;
                display: flex;
                align-items: center;
                gap: var(--space-1);
            }
            
            /* Favorite Button */
            .property-favorite {
                position: absolute;
                top: var(--space-4);
                right: var(--space-4);
                width: 36px;
                height: 36px;
                background: rgba(255, 255, 255, 0.9);
                backdrop-filter: blur(8px);
                border-radius: var(--radius-full);
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 2;
                cursor: pointer;
                transition: all var(--duration-fast) var(--ease-out-expo);
                border: none;
            }
            
            .property-favorite:hover {
                background: var(--white);
                transform: scale(1.1);
            }
            
            .property-favorite i {
                color: var(--neutral-600);
                font-size: var(--text-sm);
                transition: all var(--duration-fast) var(--ease-out-expo);
            }
            
            .property-favorite:hover i {
                color: var(--primary);
            }
            
            /* Content */
            .property-premium-content {
                padding: var(--space-5);
            }
            
            .property-premium-header {
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                margin-bottom: var(--space-2);
            }
            
            .property-premium-location {
                font-size: var(--text-base);
                font-weight: 600;
                color: var(--neutral-900);
            }
            
            .property-premium-rating {
                display: flex;
                align-items: center;
                gap: var(--space-1);
                font-size: var(--text-sm);
                font-weight: 600;
                color: var(--neutral-900);
            }
            
            .property-premium-rating i {
                color: #FFD700;
                font-size: var(--text-xs);
            }
            
            .property-premium-desc {
                color: var(--neutral-500);
                font-size: var(--text-sm);
                line-height: var(--leading-relaxed);
                margin: var(--space-2) 0 var(--space-4);
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }
            
            .property-premium-footer {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding-top: var(--space-4);
                border-top: 1px solid var(--neutral-100);
            }
            
            .property-premium-price {
                display: flex;
                align-items: baseline;
                gap: var(--space-1);
            }
            
            .property-premium-price .amount {
                font-size: var(--text-xl);
                font-weight: 800;
                color: var(--neutral-900);
            }
            
            .property-premium-price .period {
                font-size: var(--text-sm);
                color: var(--neutral-500);
            }
            
            /* CTA Section */
            .properties-cta {
                text-align: center;
                margin-top: var(--space-12);
            }
            
            @media (max-width: 640px) {
                .properties-section {
                    padding: var(--space-16) 0;
                }
            }
        </style>
        
        <section class="properties-section featured-properties">
            <div class="container">
                <div class="section-title">
                    <span class="sub-title" data-i18n="properties.subtitle">NOS PROPRIÉTÉS</span>
                    <h2 data-i18n="properties.title">Nos Biens à la Une</h2>
                    <p data-i18n="properties.description">Découvrez nos meilleures propriétés sélectionnées avec soin pour vous offrir un confort et une élégance exceptionnels</p>
                </div>
                
                @if($featuredHouses->count() > 0)
                <div class="properties-carousel-wrapper" style="position: relative; margin-top: 40px;">
                    <!-- Flèche gauche -->
                    <button class="carousel-nav carousel-prev" id="carouselPrev" aria-label="Précédent">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    
                    <!-- Container du carousel -->
                    <div class="properties-carousel-container" id="propertiesCarousel">
                        <div class="properties-carousel-track" id="carouselTrack">
                            @foreach($featuredHouses as $index => $house)
                            <div class="property-card carousel-item fade-in-up" data-house-id="{{ $house->id }}" style="animation-delay: {{ $index * 0.1 }}s; flex: 0 0 33.333%;" onclick="window.location.href='{{ route('houses.show', $house) }}'">
                                <div class="property-image-wrapper">
                                    <img src="{{ $house->first_photo ? asset('storage/' . $house->first_photo) : 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=1170&q=80' }}" 
                                         alt="{{ $house->type }} à {{ $house->lieu_exact }}" 
                                         class="property-image"
                                         data-lightbox="property-{{ $house->id }}"
                                         data-title="{{ $house->lieu_exact }}">
                                    <div class="property-badge">
                                        {{ $house->formatted_type ?? $house->type }}
                                    </div>
                                    <!-- Action Buttons Overlay -->
                                    <div class="property-actions" onclick="event.stopPropagation();">
                                        <button class="property-action-btn property-favorite-btn" data-house-id="{{ $house->id }}" title="Ajouter aux favoris">
                                            <i class="far fa-heart"></i>
                                        </button>
                                        <button class="property-action-btn property-compare-btn" data-house-id="{{ $house->id }}" data-house-data='{"id":{{ $house->id }},"name":"{{ $house->lieu_exact }}","price":{{ $house->prix }},"type":"{{ $house->type }}","image":"{{ $house->first_photo ? asset('storage/' . $house->first_photo) : 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=1170&q=80' }}"}' title="Comparer">
                                            <i class="fas fa-balance-scale"></i>
                                        </button>
                                        <button class="property-action-btn property-share-btn" data-house-id="{{ $house->id }}" data-house-url="{{ route('houses.show', $house) }}" title="Partager">
                                            <i class="fas fa-share-alt"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="property-content" style="padding: 20px;">
                                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 10px;">
                                        <h3 style="font-size: 18px; margin: 0; color: #222222; font-weight: 600;">{{ $house->lieu_exact }}</h3>
                                        <div style="display: flex; align-items: center; gap: 4px;">
                                            <i class="fas fa-star" style="color: #FFD700; font-size: 14px;"></i>
                                            <span style="font-weight: 600; font-size: 14px;">{{ number_format($house->rate ?? 4.8, 1) }}</span>
                                        </div>
                                    </div>
                                    <p style="color: #717171; font-size: 14px; margin: 8px 0 15px; min-height: 40px; line-height: 1.5;">
                                        {{ Str::limit($house->description, 90) }}
                                    </p>
                                    <div style="display: flex; justify-content: space-between; align-items: center; padding-top: 15px; border-top: 1px solid #f0f0f0;">
                                        <div style="font-size: 22px; font-weight: 700; color: #222222;">
                                            {{ number_format($house->prix, 0, ',', ' ') }} €<span style="font-size: 14px; font-weight: 400; color: #717171;" data-i18n="properties.per_night">/nuit</span>
                                        </div>
                                        @auth
                                            <a href="{{ route('reservations.create', $house) }}" class="btn-discover" onclick="event.stopPropagation();">
                                                <i class="fas fa-calendar-check"></i> <span data-i18n="properties.book">Réserver</span>
                                            </a>
                                        @else
                                            <a href="{{ route('login') }}" class="btn-discover secondary" onclick="event.stopPropagation();">
                                                <i class="fas fa-lock"></i> <span data-i18n="properties.login_to_book">Connectez-vous</span>
                                            </a>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <!-- Flèche droite -->
                    <button class="carousel-nav carousel-next" id="carouselNext" aria-label="Suivant">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                    
                    <!-- Indicateurs de pagination -->
                    <div class="carousel-indicators" id="carouselIndicators"></div>
                </div>
                @else
                <div style="text-align: center; padding: 60px 20px; color: #717171;">
                    <i class="fas fa-home" style="font-size: 48px; margin-bottom: 20px; opacity: 0.3;"></i>
                    <p data-i18n="properties.no_available">Aucun bien disponible pour le moment.</p>
                </div>
                @endif
                
                <div style="text-align: center; margin-top: 50px;">
                    <a href="{{ route('houses.index') }}" class="btn-discover" style="padding: 14px 36px; font-size: 16px;">
                        <i class="fas fa-search" style="margin-right: 8px;"></i> <span data-i18n="properties.view_all">Voir tous nos biens</span>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Section Statistiques - Modern Counter Design -->
        <style>
            .stats-modern-section {
                padding: var(--space-20) 0;
                background: var(--white);
                position: relative;
                overflow: hidden;
            }
            
            /* Stats Grid */
            .stats-modern-grid {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: var(--space-6);
                margin-top: var(--space-12);
            }
            
            /* Stat Card */
            .stat-modern-card {
                background: var(--white);
                padding: var(--space-12) var(--space-8);
                border-radius: 28px;
                text-align: center;
                position: relative;
                overflow: hidden;
                border: 1px solid rgba(0, 0, 0, 0.06);
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
                transition: all 0.45s var(--ease-out-expo);
            }
            
            .stat-modern-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 3px;
                background: var(--gradient-primary);
                transform: scaleX(0);
                transform-origin: center;
                transition: transform 0.45s var(--ease-out-expo);
            }
            
            .stat-modern-card:hover {
                transform: translateY(-10px);
                box-shadow: 0 20px 40px -12px rgba(0, 0, 0, 0.12);
                background: var(--white);
                border-color: rgba(255, 56, 92, 0.08);
            }
            
            .stat-modern-card:hover::before {
                transform: scaleX(1);
            }
            
            /* Icon */
            .stat-modern-icon {
                width: 64px;
                height: 64px;
                background: linear-gradient(135deg, rgba(255, 56, 92, 0.1) 0%, rgba(255, 56, 92, 0.05) 100%);
                border-radius: var(--radius-xl);
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto var(--space-5);
                transition: all var(--duration-normal) var(--ease-spring);
            }
            
            .stat-modern-card:hover .stat-modern-icon {
                transform: scale(1.1) rotate(3deg);
                box-shadow: 0 8px 24px var(--primary-glow);
            }
            
            .stat-modern-icon i {
                font-size: var(--text-2xl);
                color: var(--primary);
            }
            
            /* Number */
            .stat-modern-number {
                font-size: var(--text-4xl);
                font-weight: 900;
                color: var(--neutral-900);
                line-height: var(--leading-none);
                margin-bottom: var(--space-2);
                letter-spacing: var(--tracking-tight);
            }
            
            /* Label */
            .stat-modern-label {
                font-size: var(--text-sm);
                color: var(--neutral-500);
                font-weight: 500;
            }
            
            /* Responsive */
            @media (max-width: 1024px) {
                .stats-modern-grid {
                    grid-template-columns: repeat(2, 1fr);
                }
            }
            
            @media (max-width: 640px) {
                .stats-modern-section {
                    padding: var(--space-16) 0;
                }
                
                .stats-modern-grid {
                    grid-template-columns: repeat(2, 1fr);
                    gap: var(--space-4);
                }
                
                .stat-modern-card {
                    padding: var(--space-6) var(--space-4);
                }
                
                .stat-modern-number {
                    font-size: var(--text-3xl);
                }
            }
        </style>
        
        <section class="stats-modern-section stats-section">
            <div class="container">
                <div class="section-title">
                    <span class="sub-title" data-i18n="stats.subtitle">NOS CHIFFRES</span>
                    <h2 data-i18n="stats.title">Des résultats qui parlent</h2>
                    <p data-i18n="stats.description">Découvrez l'ampleur de notre réseau et la satisfaction de nos clients</p>
                </div>
                
                <div class="stats-modern-grid">
                    <div class="stat-modern-card stat-card fade-in-up">
                        <div class="stat-modern-icon stat-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <div class="stat-modern-number stat-number">{{ $totalHouses ?? '500+' }}</div>
                        <div class="stat-modern-label" data-i18n="stats.available">Biens Disponibles</div>
                    </div>
                    
                    <div class="stat-modern-card stat-card fade-in-up" style="animation-delay: 0.1s;">
                        <div class="stat-modern-icon stat-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stat-modern-number stat-number">{{ $totalUsers ?? '15K+' }}</div>
                        <div class="stat-modern-label" data-i18n="stats.clients">Clients Satisfaits</div>
                    </div>
                    
                    <div class="stat-modern-card stat-card fade-in-up" style="animation-delay: 0.2s;">
                        <div class="stat-modern-icon stat-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="stat-modern-number stat-number">4.9</div>
                        <div class="stat-modern-label" data-i18n="stats.rating">Note Moyenne</div>
                    </div>
                    
                    <div class="stat-modern-card stat-card fade-in-up" style="animation-delay: 0.3s;">
                        <div class="stat-modern-icon stat-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="stat-modern-number stat-number">10K+</div>
                        <div class="stat-modern-label" data-i18n="stats.reservations">Réservations</div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Section Témoignages - Modern Light Design -->
        <style>
            .testimonials-section {
                padding: var(--space-24) 0;
                background: linear-gradient(180deg, #FFFFFF 0%, #FAFAFA 100%);
                position: relative;
                overflow: hidden;
            }
            
            .testimonials-section::before {
                content: '';
                position: absolute;
                top: -100px;
                left: -100px;
                width: 500px;
                height: 500px;
                background: radial-gradient(circle, rgba(255, 56, 92, 0.06) 0%, transparent 70%);
                border-radius: 50%;
                pointer-events: none;
            }
            
            .testimonials-section::after {
                content: '';
                position: absolute;
                bottom: -100px;
                right: -100px;
                width: 450px;
                height: 450px;
                background: radial-gradient(circle, rgba(59, 130, 246, 0.04) 0%, transparent 70%);
                border-radius: 50%;
                pointer-events: none;
            }
            
            .testimonials-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
                gap: var(--space-6);
                margin-top: var(--space-12);
            }
            
            .testimonial-card {
                background: #fff;
                padding: var(--space-10);
                border-radius: 28px;
                box-shadow: 
                    0 2px 8px rgba(0, 0, 0, 0.04),
                    0 1px 2px rgba(0, 0, 0, 0.02);
                border: 1px solid rgba(0, 0, 0, 0.06);
                position: relative;
                transition: all 0.45s var(--ease-out-expo);
            }
            
            .testimonial-card:hover {
                transform: translateY(-12px);
                box-shadow: 
                    0 24px 48px -12px rgba(0, 0, 0, 0.12),
                    0 0 0 1px rgba(255, 56, 92, 0.08);
                border-color: rgba(255, 56, 92, 0.12);
            }
            
            .testimonial-quote {
                position: absolute;
                top: var(--space-5);
                right: var(--space-5);
                font-size: 64px;
                color: #FF385C;
                opacity: 0.08;
                font-family: serif;
                line-height: 1;
            }
            
            .testimonial-rating {
                display: flex;
                gap: var(--space-1);
                margin-bottom: var(--space-5);
            }
            
            .testimonial-rating i {
                color: #FBBF24;
                font-size: 16px;
            }
            
            .testimonial-card p {
                color: var(--neutral-600);
                line-height: var(--leading-relaxed);
                margin-bottom: var(--space-6);
                font-size: var(--text-base);
                position: relative;
                z-index: 1;
            }
            
            .testimonial-author {
                display: flex;
                align-items: center;
                gap: var(--space-4);
            }
            
            .author-avatar {
                width: 56px;
                height: 56px;
                border-radius: 50%;
                background: linear-gradient(135deg, #FF385C 0%, #E31C5F 100%);
                display: flex;
                align-items: center;
                justify-content: center;
                color: #fff;
                font-weight: 600;
                font-size: var(--text-lg);
                flex-shrink: 0;
            }
            
            .author-name {
                font-weight: 600;
                color: var(--neutral-900);
                margin-bottom: 2px;
                font-size: var(--text-base);
            }
            
            .author-location {
                font-size: var(--text-sm);
                color: var(--neutral-500);
            }
            
            @media (max-width: 768px) {
                .testimonials-section {
                    padding: var(--space-16) 0;
                }
                
                .testimonials-grid {
                    grid-template-columns: 1fr;
                    gap: var(--space-5);
                }
            }
        </style>
        
        <section class="testimonials-section">
            <div class="container">
                <div class="section-title">
                    <span class="sub-title" data-i18n="testimonials.subtitle">TÉMOIGNAGES</span>
                    <h2 data-i18n="testimonials.title">Ce que disent nos clients</h2>
                    <p data-i18n="testimonials.description">Découvrez les expériences authentiques de nos clients satisfaits</p>
                </div>
                
                <div class="testimonials-grid">
                    <div class="testimonial-card fade-in-up">
                        <div class="testimonial-quote">"</div>
                        <div class="testimonial-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p>"Un séjour absolument parfait ! Le bien était exactement comme décrit, très propre et bien situé. Le service de conciergerie a été exceptionnel, toujours disponible pour répondre à nos questions."</p>
                        <div class="testimonial-author">
                            <div class="author-avatar">SM</div>
                            <div>
                                <div class="author-name">Sophie Martin</div>
                                <div class="author-location">Paris, France</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="testimonial-card fade-in-up" style="animation-delay: 0.1s;">
                        <div class="testimonial-quote">"</div>
                        <div class="testimonial-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p>"Service impeccable du début à la fin. La communication était excellente et le bien dépassait nos attentes. Je recommande vivement Casa Del Concierge pour vos prochaines vacances !"</p>
                        <div class="testimonial-author">
                            <div class="author-avatar">JD</div>
                            <div>
                                <div class="author-name">Jean Dubois</div>
                                <div class="author-location">Lyon, France</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="testimonial-card fade-in-up" style="animation-delay: 0.2s;">
                        <div class="testimonial-quote">"</div>
                        <div class="testimonial-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p>"Une expérience de location premium ! L'attention aux détails et le service client sont remarquables. Nous avons passé un séjour mémorable dans un cadre exceptionnel."</p>
                        <div class="testimonial-author">
                            <div class="author-avatar">ML</div>
                            <div>
                                <div class="author-name">Marie Laurent</div>
                                <div class="author-location">Marseille, France</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Section Destinations Populaires - Modern Light Design -->
        <style>
            .destinations-section {
                padding: var(--space-24) 0;
                background: linear-gradient(180deg, #FAFAFA 0%, #FFFFFF 100%);
                position: relative;
                overflow: hidden;
            }
            
            .destinations-section::before {
                content: '';
                position: absolute;
                top: -80px;
                right: 10%;
                width: 400px;
                height: 400px;
                background: radial-gradient(circle, rgba(255, 56, 92, 0.05) 0%, transparent 70%);
                border-radius: 50%;
                pointer-events: none;
            }
            
            .destinations-section::after {
                content: '';
                position: absolute;
                bottom: -100px;
                left: 8%;
                width: 450px;
                height: 450px;
                background: radial-gradient(circle, rgba(59, 130, 246, 0.04) 0%, transparent 70%);
                border-radius: 50%;
                pointer-events: none;
            }
            
            .destinations-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: var(--space-6);
                margin-top: var(--space-12);
            }
            
            .destination-card {
                position: relative;
                border-radius: 28px;
                overflow: hidden;
                cursor: pointer;
                height: 440px;
                background: #fff;
                box-shadow: 
                    0 2px 8px rgba(0, 0, 0, 0.04),
                    0 1px 2px rgba(0, 0, 0, 0.02);
                border: 1px solid rgba(0, 0, 0, 0.06);
                transition: all 0.5s var(--ease-out-expo);
            }
            
            .destination-card:hover {
                transform: translateY(-12px);
                box-shadow: 
                    0 24px 56px -16px rgba(0, 0, 0, 0.2),
                    0 0 0 1px rgba(255, 255, 255, 0.1) inset;
            }
            
            .destination-image {
                width: 100%;
                height: 100%;
                position: relative;
            }
            
            .destination-image img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform var(--duration-slower) var(--ease-out-expo);
            }
            
            .destination-card:hover .destination-image img {
                transform: scale(1.1);
            }
            
            .destination-overlay {
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                background: linear-gradient(180deg, transparent 0%, rgba(0, 0, 0, 0.8) 100%);
                padding: var(--space-10);
                transition: background 0.4s ease;
            }
            
            .destination-card:hover .destination-overlay {
                background: linear-gradient(180deg, transparent 0%, rgba(0, 0, 0, 0.85) 100%);
            }
            
            .destination-overlay h3 {
                color: #fff;
                font-size: clamp(1.5rem, 2.5vw, 2rem);
                font-weight: 700;
                margin-bottom: var(--space-2);
                letter-spacing: -0.02em;
            }
            
            .destination-overlay p {
                color: rgba(255, 255, 255, 0.95);
                font-size: var(--text-base);
                margin: 0;
            }
            
            @media (max-width: 768px) {
                .destinations-section {
                    padding: var(--space-16) 0;
                }
                
                .destinations-grid {
                    grid-template-columns: 1fr;
                    gap: var(--space-5);
                }
                
                .destination-card {
                    height: 360px;
                }
            }
        </style>
        
        <section class="destinations-section">
            <div class="container">
                <div class="section-title">
                    <span class="sub-title" data-i18n="destinations.subtitle">DESTINATIONS</span>
                    <h2 data-i18n="destinations.title">Explorez nos destinations populaires</h2>
                    <p data-i18n="destinations.description">Découvrez les lieux les plus prisés pour vos prochaines escapades</p>
                </div>
                
                <div class="destinations-grid">
                    <div class="destination-card fade-in-up">
                        <div class="destination-image">
                            <img src="https://images.unsplash.com/photo-1502602898657-3e91760cbb34?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Paris">
                            <div class="destination-overlay">
                                <h3 data-i18n="destinations.paris">Paris</h3>
                                <p data-i18n="destinations.paris.desc">La ville lumière</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="destination-card fade-in-up" style="animation-delay: 0.1s;">
                        <div class="destination-image">
                            <img src="https://images.unsplash.com/photo-1513635269975-59663e0ac1ad?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Nice">
                            <div class="destination-overlay">
                                <h3 data-i18n="destinations.nice">Nice</h3>
                                <p data-i18n="destinations.nice.desc">La baie des anges</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="destination-card fade-in-up" style="animation-delay: 0.2s;">
                        <div class="destination-image">
                            <img src="https://images.unsplash.com/photo-1515542622106-78bda8ba0e5b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Lyon">
                            <div class="destination-overlay">
                                <h3 data-i18n="destinations.lyon">Lyon</h3>
                                <p data-i18n="destinations.lyon.desc">Capitale de la gastronomie</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Section Newsletter / CTA - Premium Design -->
        <style>
            .newsletter-modern {
                padding: var(--space-24) 0;
                position: relative;
                overflow: hidden;
            }
            
            /* Dynamic Background - Light & Luminous */
            .newsletter-bg {
                position: absolute;
                inset: 0;
                background: 
                    radial-gradient(ellipse at 20% 50%, rgba(255, 56, 92, 0.08) 0%, transparent 50%),
                    radial-gradient(ellipse at 80% 50%, rgba(59, 130, 246, 0.06) 0%, transparent 50%),
                    linear-gradient(135deg, #FFFFFF 0%, #FAFAFA 100%);
            }
            
            /* Animated Grid Pattern - Light */
            .newsletter-grid-pattern {
                position: absolute;
                inset: 0;
                background-image: 
                    linear-gradient(rgba(0, 0, 0, 0.02) 1px, transparent 1px),
                    linear-gradient(90deg, rgba(0, 0, 0, 0.02) 1px, transparent 1px);
                background-size: 60px 60px;
                animation: gridMove 20s linear infinite;
            }
            
            @keyframes gridMove {
                0% { background-position: 0 0, 0 0; }
                100% { background-position: 60px 60px, 60px 60px; }
            }
            
            .newsletter-wrapper {
                position: relative;
                z-index: 1;
                max-width: 800px;
                margin: 0 auto;
                text-align: center;
            }
            
            /* Glass Card - Light (Awwwards refined) */
            .newsletter-glass-card {
                background: #fff;
                backdrop-filter: blur(20px);
                -webkit-backdrop-filter: blur(20px);
                border: 1px solid rgba(0, 0, 0, 0.06);
                border-radius: 32px;
                padding: var(--space-20) var(--space-14);
                position: relative;
                overflow: hidden;
                box-shadow: 
                    0 2px 8px rgba(0, 0, 0, 0.04),
                    0 24px 56px -16px rgba(0, 0, 0, 0.1);
                transition: all 0.4s var(--ease-out-expo);
            }
            
            .newsletter-glass-card:hover {
                box-shadow: 
                    0 4px 12px rgba(0, 0, 0, 0.06),
                    0 32px 64px -16px rgba(0, 0, 0, 0.12);
            }
            
            .newsletter-glass-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 1px;
                background: linear-gradient(90deg, transparent, rgba(255, 56, 92, 0.2), transparent);
            }
            
            /* Icon */
            .newsletter-modern-icon {
                width: 88px;
                height: 88px;
                background: var(--gradient-primary);
                border-radius: var(--radius-2xl);
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto var(--space-8);
                box-shadow: 0 16px 40px var(--primary-glow);
                animation: pulse-glow 3s ease-in-out infinite;
            }
            
            .newsletter-modern-icon i {
                font-size: var(--text-4xl);
                color: var(--white);
            }
            
            /* Typography */
            .newsletter-glass-card h2 {
                font-size: var(--text-4xl);
                font-weight: 800;
                color: var(--neutral-900);
                margin-bottom: var(--space-4);
                letter-spacing: var(--tracking-tight);
            }
            
            .newsletter-glass-card > p {
                font-size: var(--text-lg);
                color: var(--neutral-600);
                margin-bottom: var(--space-10);
                line-height: var(--leading-relaxed);
                max-width: 500px;
                margin-left: auto;
                margin-right: auto;
            }
            
            /* Form */
            .newsletter-modern-form {
                display: flex;
                gap: var(--space-3);
                max-width: 480px;
                margin: 0 auto var(--space-6);
                background: var(--neutral-50);
                border-radius: var(--radius-full);
                padding: var(--space-2);
                border: 1px solid var(--neutral-200);
                transition: all var(--duration-normal) var(--ease-out-expo);
            }
            
            .newsletter-modern-form:focus-within {
                background: #fff;
                border-color: var(--primary);
                box-shadow: 0 0 0 4px rgba(255, 56, 92, 0.1);
            }
            
            .newsletter-modern-form input {
                flex: 1;
                border: none;
                background: transparent;
                padding: var(--space-4) var(--space-5);
                font-size: var(--text-base);
                color: var(--neutral-900);
                outline: none;
            }
            
            .newsletter-modern-form input::placeholder {
                color: var(--neutral-400);
            }
            
            .newsletter-modern-form button {
                padding: var(--space-4) var(--space-8);
                background: var(--gradient-primary);
                border: none;
                border-radius: var(--radius-full);
                color: var(--white);
                font-weight: 600;
                font-size: var(--text-sm);
                cursor: pointer;
                transition: all var(--duration-normal) var(--ease-spring);
                display: flex;
                align-items: center;
                gap: var(--space-2);
                white-space: nowrap;
            }
            
            .newsletter-modern-form button:hover {
                transform: scale(1.05);
                box-shadow: 0 8px 24px var(--primary-glow);
            }
            
            .newsletter-privacy {
                font-size: var(--text-xs);
                color: var(--neutral-500);
            }
            
            /* Floating Elements */
            .newsletter-float {
                position: absolute;
                border-radius: var(--radius-full);
                background: rgba(255, 56, 92, 0.08);
                filter: blur(40px);
            }
            
            .newsletter-float-1 {
                width: 200px;
                height: 200px;
                top: 20%;
                left: 10%;
                animation: heroFloat 8s ease-in-out infinite;
            }
            
            .newsletter-float-2 {
                width: 150px;
                height: 150px;
                bottom: 20%;
                right: 10%;
                animation: heroFloat 6s ease-in-out infinite reverse;
            }
            
            /* Responsive */
            @media (max-width: 640px) {
                .newsletter-modern {
                    padding: var(--space-16) 0;
                }
                
                .newsletter-glass-card {
                    padding: var(--space-10) var(--space-6);
                    border-radius: var(--radius-2xl);
                }
                
                .newsletter-glass-card h2 {
                    font-size: var(--text-2xl);
                }
                
                .newsletter-glass-card > p {
                    font-size: var(--text-base);
                }
                
                .newsletter-modern-form {
                    flex-direction: column;
                    background: transparent;
                    padding: 0;
                    border: none;
                    gap: var(--space-4);
                }
                
                .newsletter-modern-form input {
                    background: #fff;
                    border: 1px solid var(--neutral-200);
                    border-radius: var(--radius-full);
                    text-align: center;
                }
                
                .newsletter-modern-form button {
                    width: 100%;
                    justify-content: center;
                }
                
                .newsletter-modern-icon {
                    width: 72px;
                    height: 72px;
                }
                
                .newsletter-modern-icon i {
                    font-size: var(--text-3xl);
                }
            }
        </style>
        
        <section class="newsletter-modern newsletter-section">
            <div class="newsletter-bg"></div>
            <div class="newsletter-grid-pattern"></div>
            <div class="newsletter-float newsletter-float-1"></div>
            <div class="newsletter-float newsletter-float-2"></div>
            
            <div class="container">
                <div class="newsletter-wrapper">
                    <div class="newsletter-glass-card fade-in-up">
                        <div class="newsletter-modern-icon">
                            <i class="fas fa-paper-plane"></i>
                        </div>
                        <h2 data-i18n="newsletter.title">Restez informé de nos offres</h2>
                        <p data-i18n="newsletter.description">
                            Recevez en exclusivité nos meilleures offres, nouveautés et conseils pour vos prochaines escapades.
                        </p>
                        <form class="newsletter-modern-form newsletter-form">
                            @csrf
                            <input type="email" name="email" data-i18n-placeholder="newsletter.placeholder" placeholder="Votre adresse email" required>
                            <button type="submit">
                                <span data-i18n="newsletter.subscribe">S'abonner</span>
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </form>
                        <p class="newsletter-privacy" data-i18n="newsletter.privacy">
                            En vous abonnant, vous acceptez notre politique de confidentialité. Désabonnement possible à tout moment.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Section Devenir Hôte - Modern Light Design -->
        <style>
            .become-host-section {
                padding: var(--space-24) 0;
                background: linear-gradient(135deg, rgba(255, 56, 92, 0.03) 0%, rgba(255, 56, 92, 0.01) 100%);
                position: relative;
                overflow: hidden;
            }
            
            .become-host-section::before {
                content: '';
                position: absolute;
                top: 10%;
                right: -10%;
                width: 500px;
                height: 500px;
                background: radial-gradient(circle, rgba(255, 56, 92, 0.06) 0%, transparent 70%);
                border-radius: 50%;
                pointer-events: none;
            }
            
            .become-host-section::after {
                content: '';
                position: absolute;
                bottom: 10%;
                left: -10%;
                width: 450px;
                height: 450px;
                background: radial-gradient(circle, rgba(59, 130, 246, 0.04) 0%, transparent 70%);
                border-radius: 50%;
                pointer-events: none;
            }
            
            .host-container {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: var(--space-16);
                align-items: center;
            }
            
            .host-content {
                position: relative;
                z-index: 1;
            }
            
            .host-content .sub-title {
                color: #FF385C;
                font-size: var(--text-sm);
                font-weight: 600;
                letter-spacing: 1px;
                text-transform: uppercase;
                display: inline-block;
                margin-bottom: var(--space-5);
            }
            
            .host-content h2 {
                font-size: clamp(32px, 4vw, 42px);
                font-weight: 700;
                color: var(--neutral-900);
                margin-bottom: var(--space-6);
                line-height: var(--leading-tight);
            }
            
            .host-content > p {
                color: var(--neutral-600);
                font-size: var(--text-lg);
                line-height: var(--leading-relaxed);
                margin-bottom: var(--space-8);
            }
            
            .host-features {
                list-style: none;
                padding: 0;
                margin-bottom: var(--space-10);
            }
            
            .host-feature {
                display: flex;
                align-items: flex-start;
                gap: var(--space-4);
                margin-bottom: var(--space-5);
            }
            
            .host-feature-icon {
                width: 28px;
                height: 28px;
                background: #FF385C;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-shrink: 0;
                margin-top: 2px;
            }
            
            .host-feature-icon i {
                color: #fff;
                font-size: 12px;
            }
            
            .host-feature-content h4 {
                font-size: var(--text-lg);
                font-weight: 600;
                color: var(--neutral-900);
                margin-bottom: var(--space-1);
            }
            
            .host-feature-content p {
                color: var(--neutral-500);
                line-height: var(--leading-relaxed);
                font-size: var(--text-base);
            }
            
            .host-image {
                position: relative;
                z-index: 1;
            }
            
            .host-image-wrapper {
                position: relative;
                border-radius: 28px;
                overflow: hidden;
                box-shadow: 
                    0 8px 32px rgba(0, 0, 0, 0.08),
                    0 0 0 1px rgba(0, 0, 0, 0.04);
                transition: all 0.5s var(--ease-out-expo);
            }
            
            .host-image-wrapper:hover {
                box-shadow: 
                    0 24px 56px -16px rgba(0, 0, 0, 0.16),
                    0 0 0 1px rgba(0, 0, 0, 0.04);
            }
            
            .host-image-wrapper img {
                width: 100%;
                height: 500px;
                object-fit: cover;
                display: block;
            }
            
            .host-image-stats {
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                background: linear-gradient(180deg, transparent 0%, rgba(0, 0, 0, 0.75) 100%);
                padding: var(--space-8);
                color: #fff;
            }
            
            .host-image-stats-content {
                display: flex;
                align-items: center;
                gap: var(--space-4);
            }
            
            .host-image-stats-icon {
                width: 64px;
                height: 64px;
                background: rgba(255, 56, 92, 0.95);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-shrink: 0;
            }
            
            .host-image-stats-icon i {
                font-size: var(--text-2xl);
            }
            
            .host-image-stats-text {
                flex: 1;
            }
            
            .host-image-stats-value {
                font-size: var(--text-4xl);
                font-weight: 700;
                margin-bottom: var(--space-1);
            }
            
            .host-image-stats-label {
                font-size: var(--text-sm);
                opacity: 0.9;
            }
            
            @media (max-width: 1024px) {
                .host-container {
                    grid-template-columns: 1fr;
                    gap: var(--space-12);
                }
                
                .host-image {
                    order: -1;
                }
            }
            
            @media (max-width: 768px) {
                .become-host-section {
                    padding: var(--space-16) 0;
                }
                
                .host-image-wrapper img {
                    height: 400px;
                }
            }
        </style>
        
        <section class="become-host-section">
            <div class="container">
                <div class="host-container">
                    <div class="host-content fade-in-up">
                        <span class="sub-title" data-i18n="become_host.subtitle">DEVENIR HÔTE</span>
                        <h2 data-i18n="become_host.title">Gagnez de l'argent en louant votre bien</h2>
                        <p data-i18n="become_host.description">Rejoignez notre communauté d'hôtes et transformez votre bien en source de revenus. Nous vous accompagnons à chaque étape pour maximiser vos revenus et offrir une expérience exceptionnelle à vos locataires.</p>
                        <ul class="host-features">
                            <li class="host-feature">
                                <div class="host-feature-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div class="host-feature-content">
                                    <h4 data-i18n="become_host.management.title">Gestion simplifiée</h4>
                                    <p data-i18n="become_host.management.desc">Plateforme intuitive pour gérer vos réservations et vos revenus en toute simplicité.</p>
                                </div>
                            </li>
                            <li class="host-feature">
                                <div class="host-feature-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div class="host-feature-content">
                                    <h4 data-i18n="become_host.support.title">Support dédié</h4>
                                    <p data-i18n="become_host.support.desc">Une équipe à votre écoute pour vous accompagner et répondre à toutes vos questions.</p>
                                </div>
                            </li>
                            <li class="host-feature">
                                <div class="host-feature-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div class="host-feature-content">
                                    <h4 data-i18n="become_host.revenue.title">Revenus optimisés</h4>
                                    <p data-i18n="become_host.revenue.desc">Maximisez vos revenus grâce à nos outils de tarification dynamique et nos conseils experts.</p>
                                </div>
                            </li>
                        </ul>
                        <a href="{{ route('demande-location.create') }}" class="btn-discover" style="padding: 16px 40px; font-size: 16px;">
                            <i class="fas fa-home" style="margin-right: 8px;"></i> <span data-i18n="become_host.button">Devenir hôte</span>
                        </a>
                    </div>
                    <div class="host-image fade-in-up" style="animation-delay: 0.2s;">
                        <div class="host-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Devenir hôte">
                            <div class="host-image-stats">
                                <div class="host-image-stats-content">
                                    <div class="host-image-stats-icon">
                                        <i class="fas fa-chart-line"></i>
                                    </div>
                                    <div class="host-image-stats-text">
                                        <div class="host-image-stats-value">+25%</div>
                                        <div class="host-image-stats-label" data-i18n="become_host.stats">Revenus moyens par mois</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Section FAQ - Modern Accordion -->
        <style>
            .faq-modern-section {
                padding: var(--space-24) 0;
                background: var(--neutral-50);
                position: relative;
                overflow: hidden;
            }
            
            .faq-modern-section::before {
                content: '';
                position: absolute;
                top: 0;
                left: 50%;
                transform: translateX(-50%);
                width: 600px;
                height: 300px;
                background: radial-gradient(ellipse at center, rgba(255, 56, 92, 0.06) 0%, transparent 70%);
                pointer-events: none;
            }
            
            .faq-modern-container {
                max-width: 720px;
                margin: 0 auto;
            }
            
            /* FAQ Item (Awwwards refined) */
            .faq-modern-item {
                background: var(--white);
                border-radius: 20px;
                margin-bottom: var(--space-4);
                border: 1px solid rgba(0, 0, 0, 0.06);
                overflow: hidden;
                transition: all 0.4s var(--ease-out-expo);
                position: relative;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
            }
            
            .faq-modern-item::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 4px;
                height: 100%;
                background: var(--gradient-primary);
                transform: scaleY(0);
                transform-origin: top;
                transition: transform var(--duration-normal) var(--ease-out-expo);
                border-radius: var(--radius-full);
            }
            
            .faq-modern-item:hover {
                box-shadow: var(--shadow-lg);
                border-color: rgba(255, 56, 92, 0.1);
            }
            
            .faq-modern-item.active::before {
                transform: scaleY(1);
            }
            
            .faq-modern-item.active {
                box-shadow: var(--shadow-xl);
                border-color: rgba(255, 56, 92, 0.15);
            }
            
            /* Question */
            .faq-modern-question {
                padding: var(--space-6);
                cursor: pointer;
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: var(--space-4);
                transition: background-color var(--duration-fast) var(--ease-out-expo);
            }
            
            .faq-modern-question:hover {
                background-color: var(--neutral-50);
            }
            
            .faq-modern-item.active .faq-modern-question {
                background-color: var(--neutral-50);
            }
            
            .faq-modern-question h3 {
                font-size: var(--text-base);
                font-weight: 600;
                color: var(--neutral-900);
                margin: 0;
                flex: 1;
            }
            
            /* Icon */
            .faq-modern-icon {
                width: 32px;
                height: 32px;
                background: linear-gradient(135deg, rgba(255, 56, 92, 0.1) 0%, rgba(255, 56, 92, 0.05) 100%);
                border-radius: var(--radius-md);
                display: flex;
                align-items: center;
                justify-content: center;
                flex-shrink: 0;
                transition: all var(--duration-normal) var(--ease-spring);
            }
            
            .faq-modern-item.active .faq-modern-icon {
                background: var(--gradient-primary);
                transform: rotate(180deg);
            }
            
            .faq-modern-icon i {
                font-size: var(--text-xs);
                color: var(--primary);
                transition: color var(--duration-fast) var(--ease-out-expo);
            }
            
            .faq-modern-item.active .faq-modern-icon i {
                color: var(--white);
            }
            
            /* Answer */
            .faq-modern-answer {
                max-height: 0;
                overflow: hidden;
                transition: all var(--duration-normal) var(--ease-out-expo);
            }
            
            .faq-modern-answer p {
                padding: 0 var(--space-6) var(--space-6);
                color: var(--neutral-600);
                line-height: var(--leading-relaxed);
                font-size: var(--text-sm);
                margin: 0;
            }
            
            .faq-modern-item.active .faq-modern-answer {
                max-height: 300px;
            }
            
            /* Number */
            .faq-modern-number {
                font-size: var(--text-sm);
                font-weight: 700;
                color: var(--primary);
                margin-right: var(--space-3);
                opacity: 0.6;
            }
            
            /* Responsive */
            @media (max-width: 640px) {
                .faq-modern-section {
                    padding: var(--space-16) 0;
                }
                
                .faq-modern-question {
                    padding: var(--space-5);
                }
                
                .faq-modern-question h3 {
                    font-size: var(--text-sm);
                }
                
                .faq-modern-answer p {
                    padding: 0 var(--space-5) var(--space-5);
                }
            }
        </style>
        
        <!-- Section Comment ça marche -->
        <section class="how-it-works-section" id="how-it-works">
            <div class="container">
                <div class="section-title">
                    <span class="sub-title" data-i18n="howitworks.subtitle">PROCESSUS</span>
                    <h2 data-i18n="howitworks.title">Comment ça marche</h2>
                    <p data-i18n="howitworks.description">Réservez votre séjour en quelques étapes simples</p>
                </div>
                
                <div class="how-it-works-steps">
                    <div class="how-it-works-step animate-on-scroll animate-fade-up">
                        <div class="step-number">1</div>
                        <h3 class="step-title" data-i18n="howitworks.step1.title">Recherchez</h3>
                        <p class="step-description" data-i18n="howitworks.step1.desc">Explorez notre sélection de propriétés premium et trouvez celle qui correspond à vos besoins.</p>
                        <div class="step-arrow"><i class="fas fa-arrow-right"></i></div>
                    </div>
                    
                    <div class="how-it-works-step animate-on-scroll animate-fade-up" style="transition-delay: 0.1s;">
                        <div class="step-number">2</div>
                        <h3 class="step-title" data-i18n="howitworks.step2.title">Réservez</h3>
                        <p class="step-description" data-i18n="howitworks.step2.desc">Sélectionnez vos dates, vérifiez les disponibilités et confirmez votre réservation en quelques clics.</p>
                        <div class="step-arrow"><i class="fas fa-arrow-right"></i></div>
                    </div>
                    
                    <div class="how-it-works-step animate-on-scroll animate-fade-up" style="transition-delay: 0.2s;">
                        <div class="step-number">3</div>
                        <h3 class="step-title" data-i18n="howitworks.step3.title">Profitez</h3>
                        <p class="step-description" data-i18n="howitworks.step3.desc">Bénéficiez de notre service de conciergerie 24/7 et profitez d'un séjour mémorable dans le confort.</p>
                        <div class="step-arrow"><i class="fas fa-arrow-right"></i></div>
                    </div>
                    
                    <div class="how-it-works-step animate-on-scroll animate-fade-up" style="transition-delay: 0.3s;">
                        <div class="step-number">4</div>
                        <h3 class="step-title" data-i18n="howitworks.step4.title">Partagez</h3>
                        <p class="step-description" data-i18n="howitworks.step4.desc">Laissez un avis après votre séjour et aidez d'autres voyageurs à faire leur choix.</p>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="faq-modern-section faq-section">
            <div class="container">
                <div class="section-title">
                    <span class="sub-title" data-i18n="faq.subtitle">QUESTIONS FRÉQUENTES</span>
                    <h2 data-i18n="faq.title">Tout ce que vous devez savoir</h2>
                    <p data-i18n="faq.description">Trouvez rapidement les réponses à vos questions les plus courantes</p>
                </div>
                
                <div class="faq-modern-container">
                    <div class="faq-modern-item faq-item fade-in-up">
                        <div class="faq-modern-question faq-question">
                            <h3>
                                <span class="faq-modern-number">01</span>
                                <span data-i18n="faq.reserve.question">Comment puis-je réserver un bien ?</span>
                            </h3>
                            <div class="faq-modern-icon">
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                        <div class="faq-modern-answer faq-answer">
                            <p data-i18n="faq.reserve.answer">Pour réserver un bien, créez d'abord un compte sur notre plateforme. Ensuite, parcourez nos biens disponibles, sélectionnez celui qui vous convient, choisissez vos dates de séjour et effectuez votre réservation en quelques clics.</p>
                        </div>
                    </div>
                    
                    <div class="faq-modern-item faq-item fade-in-up" style="animation-delay: 0.1s;">
                        <div class="faq-modern-question faq-question">
                            <h3>
                                <span class="faq-modern-number">02</span>
                                <span data-i18n="faq.payment.question">Quels sont les modes de paiement acceptés ?</span>
                            </h3>
                            <div class="faq-modern-icon">
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                        <div class="faq-modern-answer faq-answer">
                            <p data-i18n="faq.payment.answer">Nous acceptons les cartes bancaires (Visa, Mastercard, American Express), les virements bancaires et les paiements via PayPal. Tous les paiements sont sécurisés et cryptés pour votre protection.</p>
                        </div>
                    </div>
                    
                    <div class="faq-modern-item faq-item fade-in-up" style="animation-delay: 0.2s;">
                        <div class="faq-modern-question faq-question">
                            <h3>
                                <span class="faq-modern-number">03</span>
                                <span data-i18n="faq.cancel.question">Puis-je annuler ma réservation ?</span>
                            </h3>
                            <div class="faq-modern-icon">
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                        <div class="faq-modern-answer faq-answer">
                            <p data-i18n="faq.cancel.answer">Oui, vous pouvez annuler votre réservation jusqu'à 48 heures avant votre arrivée pour un remboursement complet. Les annulations effectuées moins de 48 heures avant l'arrivée sont soumises à nos conditions d'annulation spécifiques.</p>
                        </div>
                    </div>
                    
                    <div class="faq-modern-item faq-item fade-in-up" style="animation-delay: 0.3s;">
                        <div class="faq-modern-question faq-question">
                            <h3>
                                <span class="faq-modern-number">04</span>
                                <span data-i18n="faq.concierge.question">Le service de conciergerie est-il inclus ?</span>
                            </h3>
                            <div class="faq-modern-icon">
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                        <div class="faq-modern-answer faq-answer">
                            <p data-i18n="faq.concierge.answer">Oui, notre service de conciergerie premium est disponible 24/7 pour tous nos clients. Nous pouvons vous aider avec les réservations de restaurants, l'organisation d'activités, les services de nettoyage et bien plus encore.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    </main>
    
    <!-- Comparison Bar -->
    <div class="comparison-bar" id="comparisonBar">
        <div class="comparison-bar-content">
            <div class="comparison-items" id="comparisonItems">
                <!-- Items will be added dynamically -->
            </div>
            <div class="comparison-actions">
                <button class="btn-clear-comparison" id="clearComparison">Effacer</button>
                <button class="btn-compare" id="compareBtn" disabled>Comparer (<span id="compareCount">0</span>)</button>
            </div>
        </div>
    </div>
    
    <!-- Dark Mode Toggle -->
    <button class="dark-mode-toggle" id="darkModeToggle" aria-label="Mode sombre">
        <i class="fas fa-moon"></i> DARK
    </button>
    
    <!-- Share Modal -->
    <div class="share-modal" id="shareModal">
        <div class="share-modal-content">
            <div class="share-modal-header">
                <h3 class="share-modal-title">Partager cette propriété</h3>
                <button class="share-modal-close" id="closeShareModal">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="share-buttons">
                <a href="#" class="share-button facebook" id="shareFacebook" target="_blank">
                    <i class="fab fa-facebook-f"></i>
                    <span>Facebook</span>
                </a>
                <a href="#" class="share-button twitter" id="shareTwitter" target="_blank">
                    <i class="fab fa-twitter"></i>
                    <span>Twitter</span>
                </a>
                <a href="#" class="share-button whatsapp" id="shareWhatsapp" target="_blank">
                    <i class="fab fa-whatsapp"></i>
                    <span>WhatsApp</span>
                </a>
                <a href="#" class="share-button email" id="shareEmail">
                    <i class="fas fa-envelope"></i>
                    <span>Email</span>
                </a>
                <a href="#" class="share-button copy" id="shareCopy">
                    <i class="fas fa-link"></i>
                    <span>Copier</span>
                </a>
            </div>
            <input type="text" class="share-url-input" id="shareUrlInput" readonly>
        </div>
    </div>
    
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-brand">
                <a href="{{ url('/') }}" title="Casa Del Concierge — Accueil">
                    <img src="{{ asset('images/logo.png') }}" alt="Casa Del Concierge" class="footer-logo-img" loading="lazy" decoding="async">
                </a>
            </div>
            <div class="footer-content">
                <div class="footer-column">
                    <h4 data-i18n="footer.assistance">Assistance</h4>
                    <ul class="footer-links">
                        <li><a href="#" data-i18n="footer.help_center">Centre d'aide</a></li>
                        <li><a href="#" data-i18n="footer.safety">Informations de sécurité</a></li>
                        <li><a href="#" data-i18n="footer.cancellation">Options d'annulation</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4 data-i18n="footer.community">Communauté</h4>
                    <ul class="footer-links">
                        <li><a href="#" data-i18n="footer.become_host">Devenez hôte</a></li>
                        <li><a href="#" data-i18n="footer.meet_hosts">Rencontrez des hôtes</a></li>
                        <li><a href="#" data-i18n="footer.experienced_host">Devenez un hôte expérimenté</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4 data-i18n="footer.hosting">Accueil de voyageurs</h4>
                    <ul class="footer-links">
                        <li><a href="#" data-i18n="footer.list_property">Mettez votre logement sur CasaDelConcierge</a></li>
                        <li><a href="#" data-i18n="footer.host_protection">Protection des hôtes</a></li>
                        <li><a href="#" data-i18n="footer.host_resources">Ressources pour les hôtes</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4 data-i18n="footer.about">À propos</h4>
                    <ul class="footer-links">
                        <li><a href="#" data-i18n="footer.careers">Carrières</a></li>
                        <li><a href="#" data-i18n="footer.press">Presse</a></li>
                        <li><a href="#" data-i18n="footer.terms">Conditions générales</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    
    <script>
        // Script pour les interactions utilisateur améliorées
        document.addEventListener('DOMContentLoaded', function() {
            const header = document.getElementById('mainHeader');
            const scrollIndicator = document.getElementById('scrollIndicator');
            const scrollDown = document.querySelector('.scroll-down');
            
            // ============================================
            // MOBILE MENU - Toggle
            // ============================================
            const navMenuBtn = document.getElementById('navMenuBtn');
            const mobileMenu = document.getElementById('mobileMenu');
            const mobileMenuClose = document.getElementById('mobileMenuClose');
            const mobileMenuOverlay = document.querySelector('.mobile-menu-overlay');
            
            function openMobileMenu() {
                if (mobileMenu) {
                    mobileMenu.classList.add('active');
                    mobileMenu.setAttribute('aria-hidden', 'false');
                    document.body.style.overflow = 'hidden';
                }
            }
            
            function closeMobileMenu() {
                if (mobileMenu) {
                    mobileMenu.classList.remove('active');
                    mobileMenu.setAttribute('aria-hidden', 'true');
                    document.body.style.overflow = '';
                }
            }
            
            navMenuBtn?.addEventListener('click', openMobileMenu);
            mobileMenuClose?.addEventListener('click', closeMobileMenu);
            mobileMenuOverlay?.addEventListener('click', closeMobileMenu);
            
            document.querySelectorAll('.mobile-menu-link').forEach(link => {
                link.addEventListener('click', closeMobileMenu);
            });
            
            // ============================================
            // HERO SCROLL - Smooth scroll on click
            // ============================================
            const heroScrollBtn = document.getElementById('heroScroll');
            if (heroScrollBtn) {
                heroScrollBtn.addEventListener('click', function() {
                    const aboutSection = document.getElementById('about');
                    if (aboutSection) {
                        aboutSection.scrollIntoView({ behavior: 'smooth' });
                    } else {
                        window.scrollTo({
                            top: window.innerHeight,
                            behavior: 'smooth'
                        });
                    }
                });
            }
            
            // Add favorite heart toggle
            const favButtons = document.querySelectorAll('.hero-card-fav');
            favButtons.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const icon = this.querySelector('i');
                    if (icon.classList.contains('far')) {
                        icon.classList.remove('far');
                        icon.classList.add('fas');
                        this.style.color = 'var(--primary)';
                    } else {
                        icon.classList.remove('fas');
                        icon.classList.add('far');
                        this.style.color = 'var(--neutral-400)';
                    }
                });
            });
            
            // ============================================
            // COUNTER ANIMATION - Animated numbers
            // ============================================
            function animateCounter(element, target, duration = 2000) {
                let start = 0;
                const increment = target / (duration / 16);
                
                function updateCounter() {
                    start += increment;
                    if (start < target) {
                        element.textContent = Math.floor(start);
                        requestAnimationFrame(updateCounter);
                    } else {
                        element.textContent = target;
                    }
                }
                
                updateCounter();
            }
            
            // Observe counters
            const counterObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const target = parseInt(entry.target.dataset.target);
                        if (target) {
                            animateCounter(entry.target, target);
                        }
                        counterObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });
            
            document.querySelectorAll('.counter').forEach(counter => {
                counterObserver.observe(counter);
            });
            
            // ============================================
            // WHY CARDS - Reveal animation on scroll
            // ============================================
            const whyCards = document.querySelectorAll('.why-card');
            const whyObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, { threshold: 0.2, rootMargin: '0px 0px -50px 0px' });
            
            whyCards.forEach(card => {
                whyObserver.observe(card);
            });
            
            // ============================================
            // LOGIN DROPDOWN - Toggle menu
            // ============================================
            const loginDropdown = document.querySelector('.nav-dropdown');
            const loginDropdownBtn = document.getElementById('loginDropdownBtn');
            
            if (loginDropdownBtn && loginDropdown) {
                // Toggle dropdown on click
                loginDropdownBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    loginDropdown.classList.toggle('active');
                });
                
                // Close dropdown when clicking outside
                document.addEventListener('click', function(e) {
                    if (!loginDropdown.contains(e.target)) {
                        loginDropdown.classList.remove('active');
                    }
                });
                
                // Close dropdown on scroll
                window.addEventListener('scroll', function() {
                    loginDropdown.classList.remove('active');
                });
            }
            
            // ============================================
            // HEADER & SCROLL EFFECTS
            // ============================================
            
            // Effet de scroll sur le header
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
                
                // Scroll indicator
                const windowHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                const scrolled = (window.scrollY / windowHeight) * 100;
                scrollIndicator.style.width = scrolled + '%';
            });
            
            // Scroll down smooth
            if (scrollDown) {
                scrollDown.addEventListener('click', function() {
                    window.scrollTo({
                        top: window.innerHeight,
                        behavior: 'smooth'
                    });
                });
            }
            
            // Gestion des catégories
            const categories = document.querySelectorAll('.category');
            categories.forEach(category => {
                category.addEventListener('click', () => {
                    categories.forEach(c => c.classList.remove('active'));
                    category.classList.add('active');
                });
            });
            
            
            // Intersection Observer pour les animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);
            
            // Observer les éléments avec fade-in-up
            document.querySelectorAll('.fade-in-up').forEach(el => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(30px)';
                el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(el);
            });
            
            // Lazy loading amélioré pour les images
            if ('loading' in HTMLImageElement.prototype) {
                const images = document.querySelectorAll('img[loading="lazy"]');
                images.forEach(img => {
                    img.src = img.src;
                });
            } else {
                // Fallback pour les navigateurs qui ne supportent pas le lazy loading natif
                const script = document.createElement('script');
                script.src = 'https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js';
                document.body.appendChild(script);
            }
            
            // Carousel pour les propriétés
            const carouselTrack = document.getElementById('carouselTrack');
            const carouselPrev = document.getElementById('carouselPrev');
            const carouselNext = document.getElementById('carouselNext');
            const carouselIndicators = document.getElementById('carouselIndicators');
            
            if (carouselTrack) {
                const items = carouselTrack.querySelectorAll('.carousel-item');
                const totalItems = items.length;
                let currentIndex = 0;
                
                function getItemsPerView() {
                    if (window.innerWidth >= 1128) return 3;
                    if (window.innerWidth >= 768) return 2;
                    return 1;
                }
                
                function getTotalSlides() {
                    return Math.ceil(totalItems / getItemsPerView());
                }
                
                // Créer les indicateurs
                if (carouselIndicators && totalItems > 0) {
                    const totalSlides = getTotalSlides();
                    if (totalSlides > 1) {
                        for (let i = 0; i < totalSlides; i++) {
                            const indicator = document.createElement('div');
                            indicator.className = 'carousel-indicator' + (i === 0 ? ' active' : '');
                            indicator.addEventListener('click', () => goToSlide(i));
                            carouselIndicators.appendChild(indicator);
                        }
                    }
                }
                
                function updateCarousel() {
                    const itemsPerView = getItemsPerView();
                    const container = carouselTrack.parentElement;
                    const containerWidth = container ? container.offsetWidth : 1200;
                    
                    // Ajuster la largeur des items pour qu'ils s'adaptent au nombre d'éléments par vue
                    const itemWidthPercent = 100 / itemsPerView;
                    items.forEach(item => {
                        item.style.flex = `0 0 ${itemWidthPercent}%`;
                        item.style.maxWidth = `${itemWidthPercent}%`;
                    });
                    
                    // Calculer la translation en fonction de l'index et de la largeur du container
                    const translateX = -currentIndex * containerWidth;
                    carouselTrack.style.transform = `translateX(${translateX}px)`;
                    
                    // Mettre à jour les boutons
                    const totalSlides = getTotalSlides();
                    if (carouselPrev) {
                        carouselPrev.classList.toggle('disabled', currentIndex === 0);
                    }
                    if (carouselNext) {
                        carouselNext.classList.toggle('disabled', currentIndex >= totalSlides - 1);
                    }
                    
                    // Mettre à jour les indicateurs
                    if (carouselIndicators) {
                        const indicators = carouselIndicators.querySelectorAll('.carousel-indicator');
                        indicators.forEach((ind, idx) => {
                            ind.classList.toggle('active', idx === currentIndex);
                        });
                    }
                }
                
                function goToSlide(index) {
                    const totalSlides = getTotalSlides();
                    currentIndex = Math.max(0, Math.min(index, totalSlides - 1));
                    updateCarousel();
                }
                
                function nextSlide() {
                    const totalSlides = getTotalSlides();
                    if (currentIndex < totalSlides - 1) {
                        currentIndex++;
                        updateCarousel();
                    }
                }
                
                function prevSlide() {
                    if (currentIndex > 0) {
                        currentIndex--;
                        updateCarousel();
                    }
                }
                
                if (carouselPrev) {
                    carouselPrev.addEventListener('click', prevSlide);
                }
                
                if (carouselNext) {
                    carouselNext.addEventListener('click', nextSlide);
                }
                
                // Gérer le redimensionnement
                let resizeTimer;
                window.addEventListener('resize', () => {
                    clearTimeout(resizeTimer);
                    resizeTimer = setTimeout(() => {
                        currentIndex = 0;
                        updateCarousel();
                    }, 250);
                });
                
                // Initialiser après un court délai pour s'assurer que les dimensions sont calculées
                setTimeout(() => {
                    updateCarousel();
                }, 100);
            }
            
            // FAQ Accordéon
            const faqQuestions = document.querySelectorAll('.faq-question');
            faqQuestions.forEach(question => {
                question.addEventListener('click', function() {
                    const faqItem = this.parentElement;
                    const answer = faqItem.querySelector('.faq-answer');
                    const isOpen = faqItem.classList.contains('active');
                    
                    // Fermer toutes les autres FAQ
                    document.querySelectorAll('.faq-item').forEach(item => {
                        if (item !== faqItem) {
                            item.classList.remove('active');
                            const otherAnswer = item.querySelector('.faq-answer');
                            otherAnswer.style.maxHeight = '0';
                            otherAnswer.style.padding = '0 25px';
                        }
                    });
                    
                    // Ouvrir/fermer la FAQ actuelle
                    if (isOpen) {
                        faqItem.classList.remove('active');
                        answer.style.maxHeight = '0';
                        answer.style.padding = '0 25px';
                    } else {
                        faqItem.classList.add('active');
                        answer.style.maxHeight = answer.scrollHeight + 'px';
                        answer.style.padding = '0 25px 25px';
                    }
                });
            });
            
            // Effet hover sur les destinations
            const destinationCards = document.querySelectorAll('.destination-card');
            destinationCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    const img = this.querySelector('img');
                    img.style.transform = 'scale(1.1)';
                });
                card.addEventListener('mouseleave', function() {
                    const img = this.querySelector('img');
                    img.style.transform = 'scale(1)';
                });
            });
            
            // Newsletter form - AJAX
            const newsletterForm = document.querySelector('.newsletter-form');
            if (newsletterForm) {
                newsletterForm.addEventListener('submit', async function(e) {
                    e.preventDefault();
                    const input = this.querySelector('input[type="email"]');
                    const submitBtn = this.querySelector('button[type="submit"]');
                    const email = input?.value?.trim();
                    if (!email) return;
                    
                    const originalText = submitBtn?.innerHTML || '';
                    if (submitBtn) {
                        submitBtn.disabled = true;
                        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> <span>Envoi...</span>';
                    }
                    
                    try {
                        const response = await fetch('{{ route("newsletter.subscribe") }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': this.querySelector('input[name="_token"]')?.value || '{{ csrf_token() }}',
                                'X-Requested-With': 'XMLHttpRequest'
                            },
                            body: JSON.stringify({ email: email })
                        });
                        
                        const data = await response.json().catch(() => ({}));
                        
                        if (response.ok && data.success) {
                            if (input) input.value = '';
                            const msg = data.message || 'Merci pour votre inscription !';
                            const toast = document.createElement('div');
                            toast.className = 'newsletter-toast newsletter-toast-success';
                            toast.textContent = msg;
                            toast.style.cssText = 'position:fixed;bottom:24px;left:50%;transform:translateX(-50%);background:#10B981;color:#fff;padding:14px 24px;border-radius:12px;font-weight:500;z-index:10001;opacity:0;animation:newsletterToastIn 0.3s forwards;';
                            document.body.appendChild(toast);
                            setTimeout(() => toast.remove(), 4000);
                        } else {
                            throw new Error(data.message || 'Une erreur est survenue.');
                        }
                    } catch (err) {
                        const msg = err.message || 'Une erreur est survenue. Réessayez plus tard.';
                        const toast = document.createElement('div');
                        toast.className = 'newsletter-toast newsletter-toast-error';
                        toast.textContent = msg;
                        toast.style.cssText = 'position:fixed;bottom:24px;left:50%;transform:translateX(-50%);background:#EF4444;color:#fff;padding:14px 24px;border-radius:12px;font-weight:500;z-index:10001;opacity:0;animation:newsletterToastIn 0.3s forwards;';
                        document.body.appendChild(toast);
                        setTimeout(() => toast.remove(), 4000);
                    } finally {
                        if (submitBtn) {
                            submitBtn.disabled = false;
                            submitBtn.innerHTML = originalText;
                        }
                    }
                });
            }
            
            // Animation des statistiques au scroll
            const statCards = document.querySelectorAll('.stat-card');
            const statsObserver = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const statNumber = entry.target.querySelector('.stat-number');
                        const finalNumber = statNumber.textContent;
                        const isNumber = /^\d+/.test(finalNumber);
                        
                        if (isNumber) {
                            const target = parseInt(finalNumber);
                            let current = 0;
                            const increment = target / 50;
                            const timer = setInterval(() => {
                                current += increment;
                                if (current >= target) {
                                    statNumber.textContent = finalNumber;
                                    clearInterval(timer);
                                } else {
                                    statNumber.textContent = Math.floor(current) + (finalNumber.includes('+') ? '+' : '');
                                }
                            }, 30);
                        }
                        
                        statsObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });
            
            statCards.forEach(card => {
                statsObserver.observe(card);
            });
            
            // Système de traduction multilingue
            const translations = {
                fr: {
                    // Navigation
                    'nav.dashboard': 'Tableau de bord',
                    'nav.explore': 'Explorer',
                    'nav.my_reservations': 'Mes réservations',
                    'nav.already_host': 'Déjà hôte',
                    'nav.login': 'Connexion',
                    'nav.register': 'Inscription',
                    'nav.logout': 'Déconnexion',
                    
                    
                    // Hero
                    'hero.title': 'Découvrez des séjours d\'exception',
                    'hero.subtitle': 'Des propriétés uniques, des expériences inoubliables. Trouvez le logement parfait pour votre prochaine aventure.',
                    'hero.search_placeholder': 'Où souhaitez-vous séjourner ?',
                    'hero.search_button': 'Rechercher',
                    
                    // Why Choose
                    'why_choose.subtitle': 'POURQUOI NOUS CHOISIR',
                    'why_choose.title': 'L\'excellence dans chaque détail',
                    'why_choose.description': 'Découvrez ce qui fait de nous le choix idéal pour votre prochaine expérience de location',
                    
                    // Features
                    'features.premium_quality.title': 'Qualité Premium',
                    'features.premium_quality.desc': 'Des biens soigneusement sélectionnés pour leur confort et leur élégance exceptionnelle.',
                    'features.support.title': 'Support 24/7',
                    'features.support.desc': 'Une équipe à votre écoute à tout moment pour répondre à vos besoins.',
                    'features.locations.title': 'Emplacements Privilégiés',
                    'features.locations.desc': 'Des biens situés dans les quartiers les plus prisés et les plus sécurisés.',
                    'features.security.title': 'Sécurité Garantie',
                    'features.security.desc': 'Des mesures de sécurité optimales pour une tranquillité d\'esprit totale.',
                    
                    // Services
                    'services.subtitle': 'NOS SERVICES',
                    'services.title': 'Découvrez nos services premium',
                    'services.description': 'Des services sur mesure pour rendre votre séjour inoubliable',
                    'services.concierge.title': 'Service Conciergerie',
                    'services.concierge.desc': 'Profitez d\'un service de conciergerie 5 étoiles pour organiser votre séjour sur mesure. Réservations, activités, et bien plus encore.',
                    'services.concierge.learn_more': 'En savoir plus',
                    'services.cleaning.title': 'Nettoyage Professionnel',
                    'services.cleaning.desc': 'Un nettoyage professionnel avant chaque arrivée pour garantir des conditions d\'hygiène optimales et un accueil irréprochable.',
                    'services.welcome.title': 'Accueil Personnalisé',
                    'services.welcome.desc': 'Un accueil chaleureux et personnalisé avec présentation des lieux et conseils personnalisés pour profiter au mieux de votre séjour.',
                    
                    // Properties
                    'properties.subtitle': 'NOS PROPRIÉTÉS',
                    'properties.title': 'Nos Biens à la Une',
                    'properties.description': 'Découvrez nos meilleures propriétés sélectionnées avec soin pour vous offrir un confort et une élégance exceptionnels',
                    'properties.view_all': 'Voir tous nos biens',
                    'properties.no_available': 'Aucun bien disponible pour le moment.',
                    'properties.book': 'Réserver',
                    'properties.login_to_book': 'Connectez-vous',
                    'properties.per_night': '/nuit',
                    
                    // Stats
                    'stats.subtitle': 'NOS CHIFFRES',
                    'stats.title': 'Des résultats qui parlent',
                    'stats.description': 'Découvrez l\'ampleur de notre réseau et la satisfaction de nos clients',
                    'stats.available': 'Biens Disponibles',
                    'stats.clients': 'Clients Satisfaits',
                    'stats.rating': 'Note Moyenne',
                    'stats.reservations': 'Réservations',
                    
                    // Testimonials
                    'testimonials.subtitle': 'TÉMOIGNAGES',
                    'testimonials.title': 'Ce que disent nos clients',
                    'testimonials.description': 'Découvrez les expériences authentiques de nos clients satisfaits',
                    
                    // Destinations
                    'destinations.subtitle': 'DESTINATIONS',
                    'destinations.title': 'Explorez nos destinations populaires',
                    'destinations.description': 'Découvrez les lieux les plus prisés pour vos prochaines escapades',
                    'destinations.paris': 'Paris',
                    'destinations.paris.desc': 'La ville lumière',
                    'destinations.nice': 'Nice',
                    'destinations.nice.desc': 'La baie des anges',
                    'destinations.lyon': 'Lyon',
                    'destinations.lyon.desc': 'Capitale de la gastronomie',
                    
                    // Newsletter
                    'newsletter.title': 'Restez informé de nos offres',
                    'newsletter.description': 'Recevez en exclusivité nos meilleures offres, nouveautés et conseils pour vos prochaines escapades.',
                    'newsletter.placeholder': 'Votre adresse email',
                    'newsletter.subscribe': 'S\'abonner',
                    'newsletter.privacy': 'En vous abonnant, vous acceptez notre politique de confidentialité. Désabonnement possible à tout moment.',
                    
                    // Become Host
                    'become_host.subtitle': 'DEVENIR HÔTE',
                    'become_host.title': 'Gagnez de l\'argent en louant votre bien',
                    'become_host.description': 'Rejoignez notre communauté d\'hôtes et transformez votre bien en source de revenus. Nous vous accompagnons à chaque étape pour maximiser vos revenus et offrir une expérience exceptionnelle à vos locataires.',
                    'become_host.management.title': 'Gestion simplifiée',
                    'become_host.management.desc': 'Plateforme intuitive pour gérer vos réservations et vos revenus en toute simplicité.',
                    'become_host.support.title': 'Support dédié',
                    'become_host.support.desc': 'Une équipe à votre écoute pour vous accompagner et répondre à toutes vos questions.',
                    'become_host.revenue.title': 'Revenus optimisés',
                    'become_host.revenue.desc': 'Maximisez vos revenus grâce à nos outils de tarification dynamique et nos conseils experts.',
                    'become_host.button': 'Devenir hôte',
                    'become_host.stats': 'Revenus moyens par mois',
                    
                    // FAQ
                    'faq.subtitle': 'QUESTIONS FRÉQUENTES',
                    'faq.title': 'Tout ce que vous devez savoir',
                    'faq.description': 'Trouvez rapidement les réponses à vos questions les plus courantes',
                    'faq.reserve.question': 'Comment puis-je réserver un bien ?',
                    'faq.reserve.answer': 'Pour réserver un bien, créez d\'abord un compte sur notre plateforme. Ensuite, parcourez nos biens disponibles, sélectionnez celui qui vous convient, choisissez vos dates de séjour et effectuez votre réservation en quelques clics.',
                    'faq.payment.question': 'Quels sont les modes de paiement acceptés ?',
                    'faq.payment.answer': 'Nous acceptons les cartes bancaires (Visa, Mastercard, American Express), les virements bancaires et les paiements via PayPal. Tous les paiements sont sécurisés et cryptés pour votre protection.',
                    'faq.cancel.question': 'Puis-je annuler ma réservation ?',
                    'faq.cancel.answer': 'Oui, vous pouvez annuler votre réservation jusqu\'à 48 heures avant votre arrivée pour un remboursement complet. Les annulations effectuées moins de 48 heures avant l\'arrivée sont soumises à nos conditions d\'annulation spécifiques.',
                    'faq.concierge.question': 'Le service de conciergerie est-il inclus ?',
                    'faq.concierge.answer': 'Oui, notre service de conciergerie premium est disponible 24/7 pour tous nos clients. Nous pouvons vous aider avec les réservations de restaurants, l\'organisation d\'activités, les services de nettoyage et bien plus encore.',
                    
                    // Footer
                    'footer.assistance': 'Assistance',
                    'footer.help_center': 'Centre d\'aide',
                    'footer.safety': 'Informations de sécurité',
                    'footer.cancellation': 'Options d\'annulation',
                    'footer.community': 'Communauté',
                    'footer.become_host': 'Devenez hôte',
                    'footer.meet_hosts': 'Rencontrez des hôtes',
                    'footer.experienced_host': 'Devenez un hôte expérimenté',
                    'footer.hosting': 'Accueil de voyageurs',
                    'footer.list_property': 'Mettez votre logement sur CasaDelConcierge',
                    'footer.host_protection': 'Protection des hôtes',
                    'footer.host_resources': 'Ressources pour les hôtes',
                    'footer.about': 'À propos',
                    'footer.careers': 'Carrières',
                    'footer.press': 'Presse',
                    'footer.terms': 'Conditions générales'
                },
                en: {
                    // Navigation
                    'nav.dashboard': 'Dashboard',
                    'nav.explore': 'Explore',
                    'nav.my_reservations': 'My Reservations',
                    'nav.already_host': 'Already a host',
                    'nav.login': 'Login',
                    'nav.register': 'Sign up',
                    'nav.logout': 'Logout',
                    
                    // Search
                    'search.anywhere': 'Anywhere',
                    'search.week': 'Any week',
                    'search.add_guests': 'Add guests',
                    
                    // Hero
                    'hero.title': 'Discover exceptional stays',
                    'hero.subtitle': 'Unique properties, unforgettable experiences. Find the perfect accommodation for your next adventure.',
                    'hero.search_placeholder': 'Where do you want to stay?',
                    'hero.search_button': 'Search',
                    
                    // Why Choose
                    'why_choose.subtitle': 'WHY CHOOSE US',
                    'why_choose.title': 'Excellence in every detail',
                    'why_choose.description': 'Discover what makes us the ideal choice for your next rental experience',
                    
                    // Features
                    'features.premium_quality.title': 'Premium Quality',
                    'features.premium_quality.desc': 'Carefully selected properties for their exceptional comfort and elegance.',
                    'features.support.title': '24/7 Support',
                    'features.support.desc': 'A team available at all times to answer your needs.',
                    'features.locations.title': 'Prime Locations',
                    'features.locations.desc': 'Properties located in the most sought-after and secure neighborhoods.',
                    'features.security.title': 'Guaranteed Security',
                    'features.security.desc': 'Optimal security measures for complete peace of mind.',
                    
                    // Services
                    'services.subtitle': 'OUR SERVICES',
                    'services.title': 'Discover our premium services',
                    'services.description': 'Tailored services to make your stay unforgettable',
                    'services.concierge.title': 'Concierge Service',
                    'services.concierge.desc': 'Enjoy a 5-star concierge service to organize your tailor-made stay. Reservations, activities, and much more.',
                    'services.concierge.learn_more': 'Learn more',
                    'services.cleaning.title': 'Professional Cleaning',
                    'services.cleaning.desc': 'Professional cleaning before each arrival to guarantee optimal hygiene conditions and impeccable welcome.',
                    'services.welcome.title': 'Personalized Welcome',
                    'services.welcome.desc': 'A warm and personalized welcome with presentation of the premises and personalized advice to make the most of your stay.',
                    
                    // Properties
                    'properties.subtitle': 'OUR PROPERTIES',
                    'properties.title': 'Our Featured Properties',
                    'properties.description': 'Discover our best properties carefully selected to offer you exceptional comfort and elegance',
                    'properties.view_all': 'View all our properties',
                    'properties.no_available': 'No properties available at the moment.',
                    'properties.book': 'Book',
                    'properties.login_to_book': 'Log in',
                    'properties.per_night': '/night',
                    
                    // Stats
                    'stats.subtitle': 'OUR NUMBERS',
                    'stats.title': 'Results that speak',
                    'stats.description': 'Discover the scope of our network and customer satisfaction',
                    'stats.available': 'Available Properties',
                    'stats.clients': 'Satisfied Clients',
                    'stats.rating': 'Average Rating',
                    'stats.reservations': 'Reservations',
                    
                    // Testimonials
                    'testimonials.subtitle': 'TESTIMONIALS',
                    'testimonials.title': 'What our clients say',
                    'testimonials.description': 'Discover the authentic experiences of our satisfied clients',
                    
                    // Destinations
                    'destinations.subtitle': 'DESTINATIONS',
                    'destinations.title': 'Explore our popular destinations',
                    'destinations.description': 'Discover the most sought-after places for your next getaways',
                    'destinations.paris': 'Paris',
                    'destinations.paris.desc': 'The City of Light',
                    'destinations.nice': 'Nice',
                    'destinations.nice.desc': 'The Bay of Angels',
                    'destinations.lyon': 'Lyon',
                    'destinations.lyon.desc': 'Capital of Gastronomy',
                    
                    // Newsletter
                    'newsletter.title': 'Stay informed of our offers',
                    'newsletter.description': 'Receive exclusively our best offers, news and tips for your next getaways.',
                    'newsletter.placeholder': 'Your email address',
                    'newsletter.subscribe': 'Subscribe',
                    'newsletter.privacy': 'By subscribing, you agree to our privacy policy. Unsubscribe at any time.',
                    
                    // Become Host
                    'become_host.subtitle': 'BECOME A HOST',
                    'become_host.title': 'Earn money by renting your property',
                    'become_host.description': 'Join our community of hosts and turn your property into a source of income. We accompany you at every step to maximize your revenue and offer an exceptional experience to your tenants.',
                    'become_host.management.title': 'Simplified Management',
                    'become_host.management.desc': 'Intuitive platform to manage your reservations and revenue with ease.',
                    'become_host.support.title': 'Dedicated Support',
                    'become_host.support.desc': 'A team available to accompany you and answer all your questions.',
                    'become_host.revenue.title': 'Optimized Revenue',
                    'become_host.revenue.desc': 'Maximize your revenue thanks to our dynamic pricing tools and expert advice.',
                    'become_host.button': 'Become a host',
                    'become_host.stats': 'Average monthly revenue',
                    
                    // FAQ
                    'faq.subtitle': 'FREQUENTLY ASKED QUESTIONS',
                    'faq.title': 'Everything you need to know',
                    'faq.description': 'Quickly find answers to your most common questions',
                    'faq.reserve.question': 'How can I book a property?',
                    'faq.reserve.answer': 'To book a property, first create an account on our platform. Then, browse our available properties, select the one that suits you, choose your stay dates and make your reservation in a few clicks.',
                    'faq.payment.question': 'What payment methods are accepted?',
                    'faq.payment.answer': 'We accept credit cards (Visa, Mastercard, American Express), bank transfers and PayPal payments. All payments are secured and encrypted for your protection.',
                    'faq.cancel.question': 'Can I cancel my reservation?',
                    'faq.cancel.answer': 'Yes, you can cancel your reservation up to 48 hours before your arrival for a full refund. Cancellations made less than 48 hours before arrival are subject to our specific cancellation conditions.',
                    'faq.concierge.question': 'Is the concierge service included?',
                    'faq.concierge.answer': 'Yes, our premium concierge service is available 24/7 for all our clients. We can help you with restaurant reservations, activity organization, cleaning services and much more.',
                    
                    // Footer
                    'footer.assistance': 'Support',
                    'footer.help_center': 'Help Center',
                    'footer.safety': 'Safety Information',
                    'footer.cancellation': 'Cancellation Options',
                    'footer.community': 'Community',
                    'footer.become_host': 'Become a host',
                    'footer.meet_hosts': 'Meet hosts',
                    'footer.experienced_host': 'Become an experienced host',
                    'footer.hosting': 'Hosting travelers',
                    'footer.list_property': 'List your property on CasaDelConcierge',
                    'footer.host_protection': 'Host Protection',
                    'footer.host_resources': 'Resources for hosts',
                    'footer.about': 'About',
                    'footer.careers': 'Careers',
                    'footer.press': 'Press',
                    'footer.terms': 'Terms and Conditions'
                },
                de: {
                    // Navigation
                    'nav.dashboard': 'Dashboard',
                    'nav.explore': 'Entdecken',
                    'nav.my_reservations': 'Meine Reservierungen',
                    'nav.already_host': 'Bereits Gastgeber',
                    'nav.login': 'Anmelden',
                    'nav.register': 'Registrieren',
                    'nav.logout': 'Abmelden',
                    
                    // Search
                    'search.anywhere': 'Überall',
                    'search.week': 'Irgendwann',
                    'search.add_guests': 'Gäste hinzufügen',
                    
                    // Hero
                    'hero.title': 'Entdecken Sie außergewöhnliche Aufenthalte',
                    'hero.subtitle': 'Einzigartige Immobilien, unvergessliche Erlebnisse. Finden Sie die perfekte Unterkunft für Ihr nächstes Abenteuer.',
                    'hero.search_placeholder': 'Wo möchten Sie übernachten?',
                    'hero.search_button': 'Suchen',
                    
                    // Why Choose
                    'why_choose.subtitle': 'WARUM UNS WÄHLEN',
                    'why_choose.title': 'Exzellenz in jedem Detail',
                    'why_choose.description': 'Entdecken Sie, was uns zur idealen Wahl für Ihr nächstes Miet-Erlebnis macht',
                    
                    // Features
                    'features.premium_quality.title': 'Premium-Qualität',
                    'features.premium_quality.desc': 'Sorgfältig ausgewählte Immobilien für außergewöhnlichen Komfort und Eleganz.',
                    'features.support.title': 'Support 24/7',
                    'features.support.desc': 'Ein Team, das jederzeit für Sie da ist, um auf Ihre Bedürfnisse einzugehen.',
                    'features.locations.title': 'Privilegierte Standorte',
                    'features.locations.desc': 'Immobilien in den begehrtesten und sichersten Vierteln gelegen.',
                    'features.security.title': 'Garantierte Sicherheit',
                    'features.security.desc': 'Optimale Sicherheitsmaßnahmen für vollkommene Ruhe und Sicherheit.',
                    
                    // Services
                    'services.subtitle': 'UNSERE DIENSTLEISTUNGEN',
                    'services.title': 'Entdecken Sie unsere Premium-Services',
                    'services.description': 'Maßgeschneiderte Dienstleistungen, um Ihren Aufenthalt unvergesslich zu machen',
                    'services.concierge.title': 'Concierge-Service',
                    'services.concierge.desc': 'Genießen Sie einen 5-Sterne-Concierge-Service, um Ihren maßgeschneiderten Aufenthalt zu organisieren. Reservierungen, Aktivitäten und vieles mehr.',
                    'services.concierge.learn_more': 'Mehr erfahren',
                    'services.cleaning.title': 'Professionelle Reinigung',
                    'services.cleaning.desc': 'Eine professionelle Reinigung vor jeder Ankunft, um optimale Hygienebedingungen und einen einwandfreien Empfang zu gewährleisten.',
                    'services.welcome.title': 'Personalisierter Empfang',
                    'services.welcome.desc': 'Ein herzlicher und persönlicher Empfang mit Vorstellung der Räumlichkeiten und persönlichen Ratschlägen, um Ihren Aufenthalt optimal zu nutzen.',
                    
                    // Properties
                    'properties.subtitle': 'UNSERE IMMOBILIEN',
                    'properties.title': 'Unsere Featured Immobilien',
                    'properties.description': 'Entdecken Sie unsere besten Immobilien, die sorgfältig ausgewählt wurden, um Ihnen außergewöhnlichen Komfort und Eleganz zu bieten',
                    'properties.view_all': 'Alle unsere Immobilien anzeigen',
                    'properties.no_available': 'Derzeit sind keine Immobilien verfügbar.',
                    'properties.book': 'Buchen',
                    'properties.login_to_book': 'Anmelden',
                    'properties.per_night': '/Nacht',
                    
                    // Stats
                    'stats.subtitle': 'UNSERE ZAHLEN',
                    'stats.title': 'Ergebnisse, die für sich sprechen',
                    'stats.description': 'Entdecken Sie die Reichweite unseres Netzwerks und die Zufriedenheit unserer Kunden',
                    'stats.available': 'Verfügbare Immobilien',
                    'stats.clients': 'Zufriedene Kunden',
                    'stats.rating': 'Durchschnittliche Bewertung',
                    'stats.reservations': 'Reservierungen',
                    
                    // Testimonials
                    'testimonials.subtitle': 'TESTIMONIALS',
                    'testimonials.title': 'Was unsere Kunden sagen',
                    'testimonials.description': 'Entdecken Sie die authentischen Erfahrungen unserer zufriedenen Kunden',
                    
                    // Destinations
                    'destinations.subtitle': 'REISEZIELE',
                    'destinations.title': 'Entdecken Sie unsere beliebten Reiseziele',
                    'destinations.description': 'Entdecken Sie die begehrtesten Orte für Ihre nächsten Ausflüge',
                    'destinations.paris': 'Paris',
                    'destinations.paris.desc': 'Die Stadt des Lichts',
                    'destinations.nice': 'Nizza',
                    'destinations.nice.desc': 'Die Bucht der Engel',
                    'destinations.lyon': 'Lyon',
                    'destinations.lyon.desc': 'Hauptstadt der Gastronomie',
                    
                    // Newsletter
                    'newsletter.title': 'Bleiben Sie über unsere Angebote informiert',
                    'newsletter.description': 'Erhalten Sie exklusiv unsere besten Angebote, Neuigkeiten und Tipps für Ihre nächsten Ausflüge.',
                    'newsletter.placeholder': 'Ihre E-Mail-Adresse',
                    'newsletter.subscribe': 'Abonnieren',
                    'newsletter.privacy': 'Durch das Abonnieren stimmen Sie unserer Datenschutzrichtlinie zu. Abmeldung jederzeit möglich.',
                    
                    // Become Host
                    'become_host.subtitle': 'GASTGEBER WERDEN',
                    'become_host.title': 'Verdienen Sie Geld durch Vermietung Ihrer Immobilie',
                    'become_host.description': 'Treten Sie unserer Gemeinschaft von Gastgebern bei und verwandeln Sie Ihre Immobilie in eine Einnahmequelle. Wir begleiten Sie in jedem Schritt, um Ihre Einnahmen zu maximieren und Ihren Mietern ein außergewöhnliches Erlebnis zu bieten.',
                    'become_host.management.title': 'Vereinfachtes Management',
                    'become_host.management.desc': 'Intuitive Plattform zur einfachen Verwaltung Ihrer Reservierungen und Einnahmen.',
                    'become_host.support.title': 'Dedizierter Support',
                    'become_host.support.desc': 'Ein Team, das Ihnen zur Verfügung steht, um Sie zu begleiten und alle Ihre Fragen zu beantworten.',
                    'become_host.revenue.title': 'Optimierte Einnahmen',
                    'become_host.revenue.desc': 'Maximieren Sie Ihre Einnahmen dank unserer dynamischen Preisgestaltungstools und Expertenberatung.',
                    'become_host.button': 'Gastgeber werden',
                    'become_host.stats': 'Durchschnittliche monatliche Einnahmen',
                    
                    // FAQ
                    'faq.subtitle': 'HÄUFIG GESTELLTE FRAGEN',
                    'faq.title': 'Alles, was Sie wissen müssen',
                    'faq.description': 'Finden Sie schnell Antworten auf Ihre häufigsten Fragen',
                    'faq.reserve.question': 'Wie kann ich eine Immobilie buchen?',
                    'faq.reserve.answer': 'Um eine Immobilie zu buchen, erstellen Sie zunächst ein Konto auf unserer Plattform. Durchsuchen Sie dann unsere verfügbaren Immobilien, wählen Sie die passende aus, wählen Sie Ihre Aufenthaltsdaten und buchen Sie mit wenigen Klicks.',
                    'faq.payment.question': 'Welche Zahlungsmethoden werden akzeptiert?',
                    'faq.payment.answer': 'Wir akzeptieren Kreditkarten (Visa, Mastercard, American Express), Banküberweisungen und PayPal-Zahlungen. Alle Zahlungen sind gesichert und verschlüsselt zu Ihrem Schutz.',
                    'faq.cancel.question': 'Kann ich meine Reservierung stornieren?',
                    'faq.cancel.answer': 'Ja, Sie können Ihre Reservierung bis zu 48 Stunden vor Ihrer Ankunft für eine vollständige Rückerstattung stornieren. Stornierungen, die weniger als 48 Stunden vor der Ankunft vorgenommen werden, unterliegen unseren spezifischen Stornierungsbedingungen.',
                    'faq.concierge.question': 'Ist der Concierge-Service enthalten?',
                    'faq.concierge.answer': 'Ja, unser Premium-Concierge-Service ist 24/7 für alle unsere Kunden verfügbar. Wir können Ihnen bei Restaurantreservierungen, Aktivitätsorganisation, Reinigungsdiensten und vielem mehr helfen.',
                    
                    // Footer
                    'footer.assistance': 'Unterstützung',
                    'footer.help_center': 'Hilfezentrum',
                    'footer.safety': 'Sicherheitsinformationen',
                    'footer.cancellation': 'Stornierungsoptionen',
                    'footer.community': 'Gemeinschaft',
                    'footer.become_host': 'Gastgeber werden',
                    'footer.meet_hosts': 'Gastgeber treffen',
                    'footer.experienced_host': 'Erfahrener Gastgeber werden',
                    'footer.hosting': 'Reisende beherbergen',
                    'footer.list_property': 'Listen Sie Ihre Immobilie auf CasaDelConcierge',
                    'footer.host_protection': 'Gastgeber-Schutz',
                    'footer.host_resources': 'Ressourcen für Gastgeber',
                    'footer.about': 'Über uns',
                    'footer.careers': 'Karriere',
                    'footer.press': 'Presse',
                    'footer.terms': 'Allgemeine Geschäftsbedingungen'
                }
            };
            
            // Fonction pour switcher la langue
            function switchLanguage(lang) {
                // Sauvegarder la préférence
                localStorage.setItem('preferredLanguage', lang);
                
                // Mettre à jour le sélecteur
                const selector = document.getElementById('languageSelector');
                if (selector) {
                    selector.value = lang;
                }
                
                // Traduire tous les éléments avec data-i18n
                document.querySelectorAll('[data-i18n]').forEach(element => {
                    const key = element.getAttribute('data-i18n');
                    if (translations[lang] && translations[lang][key]) {
                        // Si l'élément contient un span, mettre à jour le span
                        const span = element.querySelector('span');
                        if (span) {
                            span.textContent = translations[lang][key];
                        } else {
                            // Sinon, mettre à jour le texte de l'élément
                            element.textContent = translations[lang][key];
                        }
                    }
                });
                
                // Traduire les placeholders
                document.querySelectorAll('[data-i18n-placeholder]').forEach(element => {
                    const key = element.getAttribute('data-i18n-placeholder');
                    if (translations[lang] && translations[lang][key]) {
                        element.placeholder = translations[lang][key];
                    }
                });
            }
            
            // Charger la langue sauvegardée ou utiliser le français par défaut
            const savedLang = localStorage.getItem('preferredLanguage') || 'fr';
            if (savedLang !== 'fr') {
                switchLanguage(savedLang);
            }
            
            // Exposer la fonction globalement
            window.switchLanguage = switchLanguage;
            
            // ============================================
            // FAVORITES SYSTEM
            // ============================================
            const favorites = JSON.parse(localStorage.getItem('favorites') || '[]');
            
            function updateFavoriteButton(btn, houseId) {
                const isFavorite = favorites.includes(houseId);
                const icon = btn.querySelector('i');
                if (isFavorite) {
                    btn.classList.add('active');
                    icon.classList.remove('far');
                    icon.classList.add('fas');
                } else {
                    btn.classList.remove('active');
                    icon.classList.remove('fas');
                    icon.classList.add('far');
                }
            }
            
            document.querySelectorAll('.property-favorite-btn').forEach(btn => {
                const houseId = parseInt(btn.getAttribute('data-house-id'));
                updateFavoriteButton(btn, houseId);
                
                btn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const index = favorites.indexOf(houseId);
                    if (index > -1) {
                        favorites.splice(index, 1);
                    } else {
                        favorites.push(houseId);
                    }
                    localStorage.setItem('favorites', JSON.stringify(favorites));
                    updateFavoriteButton(btn, houseId);
                });
            });
            
            // ============================================
            // COMPARISON SYSTEM
            // ============================================
            let comparisonItems = JSON.parse(localStorage.getItem('comparison') || '[]');
            const comparisonBar = document.getElementById('comparisonBar');
            const comparisonItemsContainer = document.getElementById('comparisonItems');
            const compareBtn = document.getElementById('compareBtn');
            const compareCount = document.getElementById('compareCount');
            const clearComparisonBtn = document.getElementById('clearComparison');
            
            function updateComparisonBar() {
                if (comparisonItems.length > 0) {
                    comparisonBar.classList.add('active');
                    comparisonItemsContainer.innerHTML = '';
                    comparisonItems.forEach(item => {
                        const div = document.createElement('div');
                        div.className = 'comparison-item';
                        div.innerHTML = `
                            <img src="${item.image}" alt="${item.name}" class="comparison-item-image">
                            <div class="comparison-item-info">
                                <div class="comparison-item-name">${item.name}</div>
                                <div class="comparison-item-price">${item.price} €/nuit</div>
                            </div>
                            <button class="comparison-item-remove" onclick="removeFromComparison(${item.id})">
                                <i class="fas fa-times"></i>
                            </button>
                        `;
                        comparisonItemsContainer.appendChild(div);
                    });
                    compareCount.textContent = comparisonItems.length;
                    compareBtn.disabled = comparisonItems.length < 2;
                } else {
                    comparisonBar.classList.remove('active');
                }
            }
            
            window.removeFromComparison = function(houseId) {
                comparisonItems = comparisonItems.filter(item => item.id !== houseId);
                localStorage.setItem('comparison', JSON.stringify(comparisonItems));
                updateComparisonBar();
                updateComparisonButtons();
            };
            
            function updateComparisonButtons() {
                document.querySelectorAll('.property-compare-btn').forEach(btn => {
                    const houseId = parseInt(btn.getAttribute('data-house-id'));
                    const isInComparison = comparisonItems.some(item => item.id === houseId);
                    if (isInComparison) {
                        btn.classList.add('active');
                    } else {
                        btn.classList.remove('active');
                    }
                });
            }
            
            document.querySelectorAll('.property-compare-btn').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const houseData = JSON.parse(btn.getAttribute('data-house-data'));
                    const existingIndex = comparisonItems.findIndex(item => item.id === houseData.id);
                    
                    if (existingIndex > -1) {
                        comparisonItems.splice(existingIndex, 1);
                    } else {
                        if (comparisonItems.length >= 3) {
                            alert('Vous ne pouvez comparer que 3 propriétés maximum');
                            return;
                        }
                        comparisonItems.push(houseData);
                    }
                    
                    localStorage.setItem('comparison', JSON.stringify(comparisonItems));
                    updateComparisonBar();
                    updateComparisonButtons();
                });
            });
            
            if (clearComparisonBtn) {
                clearComparisonBtn.addEventListener('click', function() {
                    comparisonItems = [];
                    localStorage.setItem('comparison', JSON.stringify(comparisonItems));
                    updateComparisonBar();
                    updateComparisonButtons();
                });
            }
            
            if (compareBtn) {
                compareBtn.addEventListener('click', function() {
                    if (comparisonItems.length >= 2) {
                        const ids = comparisonItems.map(item => item.id).join(',');
                        window.location.href = `{{ route('houses.index') }}?compare=${ids}`;
                    }
                });
            }
            
            updateComparisonBar();
            updateComparisonButtons();
            
            // ============================================
            // SHARE MODAL
            // ============================================
            const shareModal = document.getElementById('shareModal');
            const closeShareModal = document.getElementById('closeShareModal');
            let currentShareUrl = '';
            
            document.querySelectorAll('.property-share-btn').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    currentShareUrl = btn.getAttribute('data-house-url');
                    document.getElementById('shareUrlInput').value = window.location.origin + currentShareUrl;
                    
                    // Update share links
                    const encodedUrl = encodeURIComponent(window.location.origin + currentShareUrl);
                    const encodedTitle = encodeURIComponent('Découvrez cette propriété sur Casa Del Concierge');
                    
                    document.getElementById('shareFacebook').href = `https://www.facebook.com/sharer/sharer.php?u=${encodedUrl}`;
                    document.getElementById('shareTwitter').href = `https://twitter.com/intent/tweet?url=${encodedUrl}&text=${encodedTitle}`;
                    document.getElementById('shareWhatsapp').href = `https://wa.me/?text=${encodedTitle}%20${encodedUrl}`;
                    document.getElementById('shareEmail').href = `mailto:?subject=${encodedTitle}&body=${encodedTitle}%20${encodedUrl}`;
                    
                    shareModal.classList.add('active');
                });
            });
            
            if (closeShareModal) {
                closeShareModal.addEventListener('click', function() {
                    shareModal.classList.remove('active');
                });
            }
            
            shareModal.addEventListener('click', function(e) {
                if (e.target === shareModal) {
                    shareModal.classList.remove('active');
                }
            });
            
            document.getElementById('shareCopy').addEventListener('click', function(e) {
                e.preventDefault();
                const urlInput = document.getElementById('shareUrlInput');
                urlInput.select();
                document.execCommand('copy');
                this.innerHTML = '<i class="fas fa-check"></i><span>Copié!</span>';
                setTimeout(() => {
                    this.innerHTML = '<i class="fas fa-link"></i><span>Copier</span>';
                }, 2000);
            });
            
            // ============================================
            // SCROLL TO TOP - Géré par navigation-enhancements.js
            // ============================================
            // DARK MODE
            // ============================================
            const darkModeToggle = document.getElementById('darkModeToggle');
            const currentTheme = localStorage.getItem('theme') || 'light';
            
            if (currentTheme === 'dark') {
                document.documentElement.setAttribute('data-theme', 'dark');
                darkModeToggle.innerHTML = '<i class="fas fa-sun"></i> LIGHT';
            }
            
            darkModeToggle.addEventListener('click', function() {
                const currentTheme = document.documentElement.getAttribute('data-theme');
                if (currentTheme === 'dark') {
                    document.documentElement.setAttribute('data-theme', 'light');
                    localStorage.setItem('theme', 'light');
                    this.innerHTML = '<i class="fas fa-moon"></i> DARK';
                } else {
                    document.documentElement.setAttribute('data-theme', 'dark');
                    localStorage.setItem('theme', 'dark');
                    this.innerHTML = '<i class="fas fa-sun"></i> LIGHT';
                }
            });
            
            // ============================================
            // ENHANCED SCROLL ANIMATIONS
            // ============================================
            const animateOnScrollElements = document.querySelectorAll('.animate-on-scroll');
            
            const animateObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animated');
                        animateObserver.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });
            
            animateOnScrollElements.forEach(el => {
                animateObserver.observe(el);
            });
            
            // ============================================
            // LIGHTBOX INITIALIZATION
            // ============================================
            // Lightbox will be initialized by the library when loaded
            
            // ============================================
            // SMOOTH SCROLL POUR LES LIENS D'ANCRAGE NAVBAR
            // ============================================
            // Gérer tous les liens d'ancrage dans la navbar (#about, #services, #contact)
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    const href = this.getAttribute('href');
                    // Ignorer les liens vides ou juste "#"
                    if (href === '#' || href === '') return;
                    
                    const targetId = href.substring(1); // Enlever le #
                    const targetElement = document.getElementById(targetId);
                    
                    if (targetElement) {
                        e.preventDefault();
                        
                        // Offset = hauteur réelle du header (logo plus grand sur lg)
                        const headerHeight = header ? header.offsetHeight : 104;
                        const targetPosition = targetElement.offsetTop - headerHeight;
                        
                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });
    </script>
    
    <!-- Lightbox JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
    <script>
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true,
            'fadeDuration': 300,
            'imageFadeDuration': 300
        });
    </script>
    
    <!-- Navigation Enhancements -->
    <script src="{{ asset('js/navigation-enhancements.js') }}"></script>
</body>
</html>
