<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard Locataire | Casa Del Concierge</title>
    <link rel="icon" href="{{ asset('images/logo.jpeg') }}" type="image/jpeg">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.jpeg') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- ApexCharts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            important: '.tailwind-content',
            corePlugins: {
                preflight: false, // Désactiver le reset CSS pour éviter les conflits
            }
        }
    </script>
    
    <style>
        :root {
            --primary: #6366f1;
            --primary-light: #818cf8;
            --primary-dark: #4f46e5;
            --primary-gradient: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            --primary-gradient-radial: radial-gradient(circle at 30% 50%, rgba(99, 102, 241, 0.3), rgba(139, 92, 246, 0.1));
            --secondary: #64748b;
            --success: #10b981;
            --success-light: #34d399;
            --danger: #ef4444;
            --warning: #f59e0b;
            --info: #3b82f6;
            --bg-body: #0a0e27;
            --bg-card: rgba(255, 255, 255, 0.05);
            --bg-glass: rgba(255, 255, 255, 0.08);
            --sidebar-width: 280px;
            --border-radius: 16px;
            --border-radius-lg: 24px;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --shadow-glow: 0 0 40px rgba(99, 102, 241, 0.3);
            --transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-fast: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-slow: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            --ease-out-expo: cubic-bezier(0.19, 1, 0.22, 1);
            --ease-spring: cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        * { 
            margin: 0; 
            padding: 0; 
            box-sizing: border-box; 
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: #0a0e27;
            background-image: 
                radial-gradient(circle at 20% 50%, rgba(99, 102, 241, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(139, 92, 246, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 40% 20%, rgba(236, 72, 153, 0.1) 0%, transparent 50%),
                linear-gradient(135deg, #0a0e27 0%, #1a1f3a 50%, #0f172a 100%);
            background-attachment: fixed;
            color: #ffffff;
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background: 
                radial-gradient(circle at 50% 0%, rgba(99, 102, 241, 0.1) 0%, transparent 50%),
                url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%239C92AC' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 0;
        }

        /* --- Sidebar Premium Awwwards --- */
        .sidebar {
            width: var(--sidebar-width);
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            padding: 32px 24px;
            z-index: 1000;
            box-shadow: 
                4px 0 24px rgba(0, 0, 0, 0.3),
                inset -1px 0 0 rgba(255, 255, 255, 0.05);
            transition: var(--transition);
        }

        .sidebar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(99, 102, 241, 0.5), transparent);
        }

        .brand {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 48px;
            padding-bottom: 24px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
            animation: fadeInDown 0.6s var(--ease-out-expo);
        }

        .brand::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 2px;
            background: var(--primary-gradient);
            border-radius: 2px;
            animation: slideInLeft 0.8s var(--ease-out-expo) 0.3s both;
        }

        .brand a {
            display: block;
            line-height: 0;
        }

        .brand img.brand-logo-img {
            height: 2.5rem;
            width: auto;
            max-height: 48px;
            object-fit: contain;
        }

        .nav-menu { 
            list-style: none; 
            flex: 1; 
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 18px;
            text-decoration: none;
            color: rgba(255, 255, 255, 0.85);
            border-radius: 12px;
            font-weight: 600;
            font-size: 15px;
            transition: var(--transition-fast);
            margin-bottom: 4px;
            position: relative;
            cursor: pointer;
            border: 1px solid transparent;
            backdrop-filter: blur(10px);
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        }

        .nav-link span {
            position: relative;
            z-index: 1;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 12px;
            padding: 1px;
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.3), rgba(139, 92, 246, 0.3));
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0;
            transition: var(--transition-fast);
        }

        .nav-link i {
            width: 20px;
            text-align: center;
            font-size: 18px;
            transition: var(--transition);
        }

        .nav-link::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 0;
            background: var(--primary-gradient);
            border-radius: 0 4px 4px 0;
            transition: var(--transition);
        }

        .nav-link:hover {
            background: rgba(99, 102, 241, 0.2);
            color: #ffffff;
            transform: translateX(6px);
            border-color: rgba(99, 102, 241, 0.4);
            box-shadow: 
                0 4px 12px rgba(99, 102, 241, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.15),
                0 0 20px rgba(99, 102, 241, 0.2);
            text-shadow: 0 0 10px rgba(99, 102, 241, 0.5);
        }

        .nav-link:hover::after {
            opacity: 1;
        }

        .nav-link:hover::before {
            height: 60%;
            background: var(--primary-gradient);
            box-shadow: 0 0 12px rgba(99, 102, 241, 0.6);
        }

        .nav-link.active {
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.3) 0%, rgba(139, 92, 246, 0.2) 100%);
            color: #ffffff;
            font-weight: 700;
            border-color: rgba(99, 102, 241, 0.5);
            box-shadow: 
                0 8px 24px rgba(99, 102, 241, 0.4),
                inset 0 1px 0 rgba(255, 255, 255, 0.2),
                0 0 0 1px rgba(99, 102, 241, 0.3),
                0 0 30px rgba(99, 102, 241, 0.3);
            text-shadow: 0 0 15px rgba(99, 102, 241, 0.6);
        }

        .nav-link.active::before {
            height: 70%;
            background: var(--primary-gradient);
            box-shadow: 0 0 16px rgba(99, 102, 241, 0.8);
        }

        .nav-link.active::after {
            opacity: 1;
        }

        .nav-link.active i {
            transform: scale(1.15);
            filter: drop-shadow(0 0 8px rgba(99, 102, 241, 0.6));
        }

        /* Sections */
        .content-section {
            display: none;
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s var(--ease-out-expo), transform 0.6s var(--ease-out-expo);
        }

        .content-section.active {
            display: block;
            opacity: 1;
            transform: translateY(0);
            animation: fadeInUp 0.8s var(--ease-out-expo);
        }

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

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-20px);
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

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes pulse-glow {
            0%, 100% {
                box-shadow: 0 0 20px rgba(99, 102, 241, 0.3);
            }
            50% {
                box-shadow: 0 0 40px rgba(99, 102, 241, 0.6);
            }
        }

        /* --- Main Content --- */
        .main-content {
            margin-left: var(--sidebar-width);
            flex: 1;
            padding: 48px;
            max-width: calc(100vw - var(--sidebar-width));
            position: relative;
            z-index: 1;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 48px;
            padding-bottom: 32px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
            animation: fadeInDown 0.8s var(--ease-out-expo) 0.2s both;
        }

        header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100px;
            height: 2px;
            background: var(--primary-gradient);
            border-radius: 2px;
            animation: slideInLeft 1s var(--ease-out-expo) 0.5s both;
        }

        .user-welcome h1 { 
            font-size: 42px; 
            font-weight: 900; 
            letter-spacing: -1.2px;
            background: linear-gradient(135deg, #ffffff 0%, #a5b4fc 50%, #c7d2fe 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 12px;
            text-shadow: 0 0 40px rgba(99, 102, 241, 0.3);
            animation: fadeInDown 0.8s var(--ease-out-expo) 0.3s both;
        }

        .user-welcome p { 
            color: rgba(255, 255, 255, 0.6);
            font-size: 16px;
            font-weight: 500;
            animation: fadeInDown 0.8s var(--ease-out-expo) 0.4s both;
        }

        .user-badge {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 14px 24px;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 
                0 8px 32px rgba(0, 0, 0, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            transition: var(--transition);
            animation: scaleIn 0.8s var(--ease-out-expo) 0.5s both;
        }

        .user-badge:hover {
            transform: translateY(-2px);
            box-shadow: 
                0 12px 40px rgba(0, 0, 0, 0.4),
                inset 0 1px 0 rgba(255, 255, 255, 0.15),
                0 0 0 1px rgba(99, 102, 241, 0.3);
        }

        .user-avatar {
            width: 56px;
            height: 56px;
            background: var(--primary-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 900;
            font-size: 22px;
            box-shadow: 
                0 8px 24px rgba(99, 102, 241, 0.4),
                0 0 0 4px rgba(99, 102, 241, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.2);
            position: relative;
            animation: float 3s ease-in-out infinite;
        }

        .user-avatar::before {
            content: '';
            position: absolute;
            inset: -2px;
            border-radius: 50%;
            padding: 2px;
            background: var(--primary-gradient);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0.5;
            animation: pulse-glow 2s ease-in-out infinite;
        }

        /* --- Stats Cards Premium Awwwards --- */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 24px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            padding: 32px;
            border-radius: 24px;
            display: flex;
            align-items: flex-start;
            gap: 20px;
            transition: var(--transition);
            border: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
            overflow: hidden;
            box-shadow: 
                0 8px 32px rgba(0, 0, 0, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            animation: scaleIn 0.6s var(--ease-out-expo) both;
        }

        .stat-card:nth-child(1) { animation-delay: 0.1s; }
        .stat-card:nth-child(2) { animation-delay: 0.2s; }
        .stat-card:nth-child(3) { animation-delay: 0.3s; }
        .stat-card:nth-child(4) { animation-delay: 0.4s; }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--primary-gradient);
            transform: scaleX(0);
            transform-origin: left;
            transition: var(--transition);
            box-shadow: 0 0 20px rgba(99, 102, 241, 0.6);
        }

        .stat-card::after {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(99, 102, 241, 0.1) 0%, transparent 70%);
            opacity: 0;
            transition: var(--transition-slow);
        }

        .stat-card:hover {
            transform: translateY(-8px) scale(1.02);
            border-color: rgba(99, 102, 241, 0.4);
            box-shadow: 
                0 20px 60px rgba(0, 0, 0, 0.4),
                0 0 0 1px rgba(99, 102, 241, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.15),
                0 0 80px rgba(99, 102, 241, 0.2);
        }

        .stat-card:hover::before {
            transform: scaleX(1);
        }

        .stat-card:hover::after {
            opacity: 1;
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .stat-icon {
            width: 72px;
            height: 72px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            flex-shrink: 0;
            position: relative;
            background: rgba(99, 102, 241, 0.15);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(99, 102, 241, 0.2);
            transition: var(--transition);
        }

        .stat-icon::before {
            content: '';
            position: absolute;
            inset: -2px;
            border-radius: 20px;
            padding: 2px;
            background: var(--primary-gradient);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0;
            transition: var(--transition);
        }

        .stat-icon::after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 20px;
            background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.3), transparent);
            opacity: 0;
            transition: var(--transition);
        }

        .stat-card:hover .stat-icon {
            transform: scale(1.1) rotate(5deg);
            background: rgba(99, 102, 241, 0.25);
            box-shadow: 
                0 8px 24px rgba(99, 102, 241, 0.4),
                inset 0 1px 0 rgba(255, 255, 255, 0.2);
        }

        .stat-card:hover .stat-icon::before {
            opacity: 1;
        }

        .stat-card:hover .stat-icon::after {
            opacity: 1;
        }

        .stat-content {
            flex: 1;
        }

        .stat-label {
            color: rgba(255, 255, 255, 0.6);
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .stat-value {
            font-size: 36px;
            font-weight: 900;
            background: linear-gradient(135deg, #ffffff 0%, #c7d2fe 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 8px;
            line-height: 1.1;
            letter-spacing: -1px;
        }

        .stat-description {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.5);
            margin-top: 4px;
        }

        /* --- Tailwind Overrides for Dark Premium Theme --- */
        .tailwind-content .bg-white {
            background: rgba(255, 255, 255, 0.03) !important;
            backdrop-filter: blur(20px) saturate(180%) !important;
            -webkit-backdrop-filter: blur(20px) saturate(180%) !important;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            box-shadow: 
                0 8px 32px rgba(0, 0, 0, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.1) !important;
        }

        .tailwind-content .text-gray-900 {
            color: #ffffff !important;
        }

        .tailwind-content .text-gray-500 {
            color: rgba(255, 255, 255, 0.6) !important;
        }

        .tailwind-content .text-gray-700 {
            color: rgba(255, 255, 255, 0.8) !important;
        }

        .tailwind-content .border-gray-200 {
            border-color: rgba(255, 255, 255, 0.1) !important;
        }

        .tailwind-content .bg-gray-50 {
            background: rgba(255, 255, 255, 0.05) !important;
        }

        .tailwind-content .bg-gray-100 {
            background: rgba(255, 255, 255, 0.08) !important;
        }

        .tailwind-content input,
        .tailwind-content select {
            background: rgba(255, 255, 255, 0.05) !important;
            border-color: rgba(255, 255, 255, 0.1) !important;
            color: #ffffff !important;
        }

        .tailwind-content input::placeholder {
            color: rgba(255, 255, 255, 0.4) !important;
        }

        .tailwind-content .hover\:bg-gray-50:hover {
            background: rgba(255, 255, 255, 0.1) !important;
        }

        /* Scroll Animations */
        .fade-in-up {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s var(--ease-out-expo), transform 0.8s var(--ease-out-expo);
        }

        .fade-in-up.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Smooth Scroll */
        html {
            scroll-behavior: smooth;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(99, 102, 241, 0.5);
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: rgba(99, 102, 241, 0.7);
        }

        /* --- Action Card Premium --- */
        .action-card {
            background: var(--primary-gradient);
            border-radius: var(--border-radius-lg);
            padding: 40px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 48px;
            box-shadow: 0 20px 40px rgba(99, 102, 241, 0.3);
            position: relative;
            overflow: hidden;
        }

        .action-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .action-card-content {
            position: relative;
            z-index: 1;
        }

        .action-card h2 {
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .action-card p {
            opacity: 0.95;
            font-size: 15px;
            font-weight: 500;
        }

        .btn-white {
            background: white;
            color: var(--primary-dark);
            padding: 16px 32px;
            border-radius: 14px;
            text-decoration: none;
            font-weight: 700;
            font-size: 15px;
            transition: var(--transition);
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            position: relative;
            z-index: 1;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-white:hover {
            transform: translateY(-4px) scale(1.02);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
        }

        .btn-white:active {
            transform: translateY(-2px) scale(1);
        }

        /* --- House Cards Premium --- */
        .house-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            border-radius: var(--border-radius-lg);
            overflow: hidden;
            box-shadow: 
                0 8px 32px rgba(0, 0, 0, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            transition: var(--transition);
            border: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
        }

        .house-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 
                0 20px 60px rgba(0, 0, 0, 0.4),
                0 0 0 1px rgba(99, 102, 241, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.15),
                0 0 40px rgba(99, 102, 241, 0.2);
            border-color: rgba(99, 102, 241, 0.4);
        }

        .house-image-wrapper {
            width: 100%;
            height: 220px;
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
            position: relative;
            overflow: hidden;
        }

        .house-image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .house-card:hover .house-image-wrapper img {
            transform: scale(1.1);
        }

        .house-badge {
            position: absolute;
            top: 16px;
            right: 16px;
            background: rgba(0, 0, 0, 0.75);
            backdrop-filter: blur(10px);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .house-content {
            padding: 24px;
        }

        .house-title {
            font-size: 20px;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 12px;
            line-height: 1.4;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            letter-spacing: -0.3px;
        }

        .house-location {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 16px;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.7);
        }

        .house-location i {
            font-size: 12px;
            color: #a5b4fc;
            filter: drop-shadow(0 0 4px rgba(99, 102, 241, 0.5));
        }

        .house-price {
            font-size: 26px;
            font-weight: 900;
            background: linear-gradient(135deg, #a5b4fc 0%, #818cf8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 4px;
            text-shadow: 0 0 20px rgba(99, 102, 241, 0.3);
            filter: drop-shadow(0 2px 4px rgba(99, 102, 241, 0.2));
        }

        .house-price-unit {
            font-size: 14px;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.7);
        }

        /* --- Section Headers Premium --- */
        .section-header {
            margin-bottom: 40px;
            position: relative;
        }

        .section-title {
            font-size: 42px;
            font-weight: 900;
            background: linear-gradient(135deg, #ffffff 0%, #c7d2fe 50%, #a5b4fc 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 12px;
            letter-spacing: -1.2px;
            text-shadow: 0 0 40px rgba(99, 102, 241, 0.3);
            position: relative;
            line-height: 1.2;
            filter: drop-shadow(0 2px 8px rgba(99, 102, 241, 0.2));
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 80px;
            height: 3px;
            background: var(--primary-gradient);
            border-radius: 2px;
            box-shadow: 0 0 12px rgba(99, 102, 241, 0.6);
        }

        .section-subtitle {
            color: rgba(255, 255, 255, 0.7);
            font-size: 16px;
            font-weight: 500;
            margin-top: 8px;
            letter-spacing: 0.3px;
        }

        /* --- Empty States --- */
        .empty-state {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            border-radius: var(--border-radius-lg);
            padding: 80px 40px;
            text-align: center;
            box-shadow: 
                0 8px 32px rgba(0, 0, 0, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            border: 2px dashed rgba(255, 255, 255, 0.2);
        }

        .empty-state-icon {
            font-size: 72px;
            color: rgba(255, 255, 255, 0.6);
            margin-bottom: 24px;
            opacity: 0.8;
            filter: drop-shadow(0 0 20px rgba(99, 102, 241, 0.3));
        }

        .empty-state-title {
            font-size: 28px;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 12px;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
            letter-spacing: -0.5px;
        }

        .empty-state-text {
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 32px;
            font-size: 16px;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        }

        /* --- Modal Premium --- */
        .modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.75);
            backdrop-filter: blur(8px);
            z-index: 2000;
            align-items: center;
            justify-content: center;
            animation: fadeIn 0.3s ease-out;
        }

        .modal.show {
            display: flex;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .modal-content {
            background: var(--bg-card);
            width: 95%;
            max-width: 900px;
            max-height: 90vh;
            border-radius: var(--border-radius-lg);
            overflow-y: auto;
            position: relative;
            animation: modalSlide 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25);
        }

        @keyframes modalSlide {
            from {
                transform: translateY(40px) scale(0.95);
                opacity: 0;
            }
            to {
                transform: translateY(0) scale(1);
                opacity: 1;
            }
        }

        .modal-header {
            padding: 32px;
            border-bottom: 1px solid rgba(226, 232, 240, 0.8);
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
        }

        .modal-header h2 {
            font-weight: 800;
            font-size: 24px;
            color: #1e293b;
        }

        .modal-close {
            border: none;
            background: #f1f5f9;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 20px;
            color: var(--secondary);
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-close:hover {
            background: #e2e8f0;
            color: #1e293b;
            transform: rotate(90deg);
        }

        .modal-body {
            padding: 32px;
        }

        /* --- Form Elements Premium --- */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }

        .full-width {
            grid-column: span 2;
        }

        .input-wrapper {
            margin-bottom: 0;
        }

        .form-label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: #475569;
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            padding: 14px 18px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-family: inherit;
            font-size: 15px;
            transition: var(--transition);
            background: #f8fafc;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            background: white;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        }

        .photo-zone {
            border: 2px dashed #cbd5e1;
            padding: 48px;
            border-radius: var(--border-radius);
            text-align: center;
            cursor: pointer;
            transition: var(--transition);
            background: #f8fafc;
        }

        .photo-zone:hover {
            border-color: var(--primary);
            background: linear-gradient(135deg, #f5f7ff 0%, #f8fafc 100%);
            transform: scale(1.01);
        }

        .preview-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 16px;
            margin-top: 24px;
        }

        .preview-img {
            width: 100%;
            height: 120px;
            object-fit: cover;
            border-radius: 12px;
            position: relative;
            box-shadow: var(--shadow-md);
        }

        /* --- Notifications Premium --- */
        .notification {
            position: fixed;
            top: 32px;
            right: 32px;
            padding: 18px 24px;
            border-radius: 16px;
            color: white;
            font-weight: 600;
            z-index: 3000;
            transform: translateX(150%);
            transition: 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: var(--shadow-xl);
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 300px;
        }

        .notification.show {
            transform: translateX(0);
        }

        .bg-success {
            background: linear-gradient(135deg, var(--success) 0%, var(--success-light) 100%);
        }

        .bg-error {
            background: linear-gradient(135deg, var(--danger) 0%, #f87171 100%);
        }

        /* --- Responsive --- */
        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
                transition: var(--transition);
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                padding: 24px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }
        }

        /* --- Scrollbar Custom --- */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary);
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-dark);
        }

        /* --- Loading Animation --- */
        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
        }

        .loading {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        /* --- Additional Options Styles --- */
        .additional-option-item {
            display: grid;
            grid-template-columns: 2fr 1fr auto;
            gap: 12px;
            padding: 16px;
            background: white;
            border-radius: 12px;
            border: 2px solid rgba(226, 232, 240, 0.6);
            align-items: center;
            transition: var(--transition);
        }

        .additional-option-item:hover {
            border-color: var(--primary);
            box-shadow: var(--shadow-md);
        }

        .additional-option-item input {
            font-size: 14px;
            padding: 10px 14px;
        }

        .additional-option-item .form-label {
            font-size: 13px;
            font-weight: 700;
            color: #475569;
            margin-bottom: 6px;
        }
    </style>
</head>
<body>

    <aside class="sidebar">
        <div class="brand">
            <a href="{{ url('/') }}" title="Casa Del Concierge — Accueil">
                <img src="{{ asset('images/logo.jpeg') }}" alt="Casa Del Concierge" class="brand-logo-img" width="180" height="48" loading="eager" decoding="async">
            </a>
        </div>
        <nav class="nav-menu">
            <a href="#" class="nav-link active" data-section="dashboard">
                <i class="fas fa-grid-2"></i> 
                <span>Dashboard</span>
            </a>
            <a href="#" class="nav-link" data-section="houses">
                <i class="fas fa-building"></i> 
                <span>Mes Maisons</span>
            </a>
            <a href="#" class="nav-link" data-section="reservations">
                <i class="fas fa-calendar-check"></i> 
                <span>Réservations</span>
            </a>
            <a href="#" class="nav-link" data-section="statistiques">
                <i class="fas fa-chart-line"></i> 
                <span>Statistiques</span>
            </a>
            <a href="#" class="nav-link" data-section="profil">
                <i class="fas fa-user-gear"></i> 
                <span>Mon Profil</span>
            </a>
        </nav>
        
        <form method="POST" action="{{ route('locataire.logout') }}">
            @csrf
            <button type="submit" class="nav-link" style="background:none; border:none; width:100%; color: var(--danger); cursor:pointer; margin-top: auto;">
                <i class="fas fa-sign-out-alt"></i> 
                <span>Déconnexion</span>
            </button>
        </form>
    </aside>

    <main class="main-content">
        <!-- Section Dashboard - Awwwards Premium -->
        <div id="section-dashboard" class="content-section active tailwind-content" style="color: #ffffff;">
            <!-- Header -->
            <header class="mb-8 pb-6 border-b border-gray-200">
                <div class="flex justify-between items-center flex-wrap gap-4">
                    <div>
                        <h1 class="text-4xl font-bold text-gray-900 mb-2">Bonjour, {{ $user->first_name }} 👋</h1>
                        <p class="text-gray-500 text-lg">Heureux de vous revoir sur votre gestionnaire.</p>
                    </div>
                    <div class="flex items-center gap-4 bg-white px-6 py-3 rounded-xl shadow-sm border border-gray-200">
                        <div class="text-right">
                            <div class="font-bold text-gray-900">{{ $user->last_name }}</div>
                            <div class="text-sm text-green-600 font-semibold">Locataire Vérifié</div>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-lg shadow-lg">
                            {{ substr($user->first_name, 0, 1) }}
                        </div>
                    </div>
                </div>
            </header>

            <!-- Bento Grid Layout - KPIs Section -->
            <div class="grid grid-cols-12 gap-6 mb-8">
                <!-- KPI 1: Revenu Mensuel -->
                <div class="col-span-12 md:col-span-6 lg:col-span-3 bg-white rounded-2xl p-6 shadow-sm border border-gray-200 hover:shadow-lg transition-all duration-300 group">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-green-100 to-green-50 rounded-xl flex items-center justify-center text-green-600 group-hover:scale-110 transition-transform">
                            <i class="fas fa-wallet text-xl"></i>
                        </div>
                        <span class="px-3 py-1 bg-green-50 text-green-700 text-xs font-bold rounded-full flex items-center gap-1">
                            <i class="fas fa-arrow-up"></i> 12%
                        </span>
                    </div>
                    <div class="mb-2">
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Revenu Mensuel</p>
                        <h3 class="text-3xl font-bold text-gray-900">{{ number_format($currentMonthRevenue, 0, ',', ' ') }} €</h3>
                    </div>
                    <p class="text-sm text-gray-500">Total: {{ number_format($totalRevenue, 0, ',', ' ') }} €</p>
                </div>

                <!-- KPI 2: Taux d'Occupation -->
                @php
                    $totalNights = 0;
                    $occupiedNights = 0;
                    $currentYear = now()->year;
                    foreach ($houses as $house) {
                        $yearNights = 365;
                        $totalNights += $yearNights;
                        $houseReservations = $house->reservations()->where('status', 'confirmed')
                            ->whereYear('start_date', $currentYear)
                            ->get();
                        foreach ($houseReservations as $res) {
                            $occupiedNights += $res->start_date->diffInDays($res->end_date);
                        }
                    }
                    $occupancyRate = $totalNights > 0 ? round(($occupiedNights / $totalNights) * 100, 1) : 0;
                @endphp
                <div class="col-span-12 md:col-span-6 lg:col-span-3 bg-white rounded-2xl p-6 shadow-sm border border-gray-200 hover:shadow-lg transition-all duration-300 group">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-100 to-blue-50 rounded-xl flex items-center justify-center text-blue-600 group-hover:scale-110 transition-transform">
                            <i class="fas fa-chart-pie text-xl"></i>
                        </div>
                        <span class="px-3 py-1 bg-blue-50 text-blue-700 text-xs font-bold rounded-full flex items-center gap-1">
                            <i class="fas fa-arrow-up"></i> 5%
                        </span>
                    </div>
                    <div class="mb-2">
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Taux d'Occupation</p>
                        <h3 class="text-3xl font-bold text-gray-900">{{ $occupancyRate }}%</h3>
                    </div>
                    <p class="text-sm text-gray-500">{{ $occupiedNights }} nuits occupées</p>
                </div>

                <!-- KPI 3: Loyers en attente -->
                <div class="col-span-12 md:col-span-6 lg:col-span-3 bg-white rounded-2xl p-6 shadow-sm border border-gray-200 hover:shadow-lg transition-all duration-300 group">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-orange-100 to-orange-50 rounded-xl flex items-center justify-center text-orange-600 group-hover:scale-110 transition-transform">
                            <i class="fas fa-clock text-xl"></i>
                        </div>
                        <span class="px-3 py-1 bg-orange-50 text-orange-700 text-xs font-bold rounded-full">
                            En attente
                        </span>
                    </div>
                    <div class="mb-2">
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Réservations</p>
                        <h3 class="text-3xl font-bold text-gray-900">{{ $pendingReservations }}</h3>
                    </div>
                    <p class="text-sm text-gray-500">{{ $totalReservations }} total confirmées</p>
                </div>

                <!-- KPI 4: Mes Biens -->
                <div class="col-span-12 md:col-span-6 lg:col-span-3 bg-white rounded-2xl p-6 shadow-sm border border-gray-200 hover:shadow-lg transition-all duration-300 group">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-indigo-100 to-indigo-50 rounded-xl flex items-center justify-center text-indigo-600 group-hover:scale-110 transition-transform">
                            <i class="fas fa-home text-xl"></i>
                        </div>
                        <span class="px-3 py-1 bg-indigo-50 text-indigo-700 text-xs font-bold rounded-full flex items-center gap-1">
                            <i class="fas fa-arrow-up"></i> +2
                        </span>
                    </div>
                    <div class="mb-2">
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Mes Biens</p>
                        <h3 class="text-3xl font-bold text-gray-900">{{ $totalHouses }}</h3>
                    </div>
                    <p class="text-sm text-gray-500">Note moyenne: {{ number_format($averageRating, 1, ',', ' ') }}/5</p>
                </div>
            </div>

            <!-- Bento Grid - Charts Section -->
            <div class="grid grid-cols-12 gap-6 mb-8">
                <!-- Area Chart - Revenus -->
                <div class="col-span-12 lg:col-span-8 bg-white rounded-2xl p-6 shadow-sm border border-gray-200">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Évolution des Revenus</h3>
                            <p class="text-sm text-gray-500 mt-1">Revenus mensuels sur 12 mois</p>
                        </div>
                        <select id="revenuePeriod" class="px-4 py-2 border border-gray-200 rounded-lg text-sm font-medium text-gray-700 bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option value="12">12 mois</option>
                            <option value="6">6 mois</option>
                            <option value="3">3 mois</option>
                        </select>
                    </div>
                    <div id="revenueChart" style="min-height: 300px;"></div>
                </div>

                <!-- Donut Chart - Statuts -->
                <div class="col-span-12 lg:col-span-4 bg-white rounded-2xl p-6 shadow-sm border border-gray-200">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Statut des Biens</h3>
                    <div id="statusChart" style="min-height: 300px;"></div>
                </div>
            </div>

            <!-- CTA Card -->
            <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 rounded-2xl p-8 mb-8 shadow-xl relative overflow-hidden">
                <div class="absolute inset-0 bg-black opacity-10"></div>
                <div class="relative z-10 flex items-center justify-between flex-wrap gap-6">
                    <div class="text-white">
                        <h2 class="text-3xl font-bold mb-2">Prêt à louer un nouveau bien ?</h2>
                        <p class="text-indigo-100 text-lg">Ajoutez une maison en moins de 2 minutes avec toutes les options.</p>
                    </div>
                    <button onclick="openModal()" class="bg-white text-indigo-600 px-8 py-4 rounded-xl font-bold text-lg hover:bg-gray-50 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-1 flex items-center gap-2">
                        <i class="fas fa-plus-circle"></i> Ajouter une maison
                    </button>
                </div>
            </div>

            <!-- Data Table - Mes Biens -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-6 border-b border-gray-200">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900">Mes Biens</h3>
                            <p class="text-sm text-gray-500 mt-1">Gérez tous vos biens immobiliers</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="relative flex-1 md:w-64">
                                <input type="text" id="searchHouses" placeholder="Rechercher un bien..." 
                                       class="w-full pl-10 pr-4 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            </div>
                            <div class="relative">
                                <select id="filterStatus" class="appearance-none bg-white border border-gray-200 rounded-lg px-4 py-2.5 text-sm font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 pr-8 cursor-pointer">
                                    <option value="">Tous les statuts</option>
                                    <option value="active">Actifs</option>
                                    <option value="pending">En attente</option>
                                </select>
                                <i class="fas fa-chevron-down absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                            </div>
                            <button onclick="openModal()" class="bg-indigo-600 text-white px-5 py-2.5 rounded-lg font-semibold text-sm hover:bg-indigo-700 transition-all flex items-center gap-2 shadow-sm">
                                <i class="fas fa-plus"></i> Ajouter
                            </button>
                        </div>
                    </div>
                </div>

                @if($houses->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Bien</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Localisation</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Type</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Prix/Nuit</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Statut</th>
                                <th class="px-6 py-4 text-right text-xs font-bold text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="housesTableBody" class="divide-y divide-gray-200">
                            @foreach($houses as $house)
                            <tr class="hover:bg-gray-50 transition-colors" data-house-name="{{ strtolower($house->description) }}" data-house-location="{{ strtolower($house->lieu_exact) }}">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-4">
                                        <div class="w-16 h-16 rounded-xl overflow-hidden flex-shrink-0 bg-gray-100">
                                            @if($house->firstPhoto)
                                                <img src="{{ asset('storage/' . $house->firstPhoto) }}" alt="{{ $house->description }}" class="w-full h-full object-cover">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center text-gray-400">
                                                    <i class="fas fa-home text-2xl"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <div>
                                            <div class="font-semibold text-gray-900">{{ Str::limit($house->description, 40) }}</div>
                                            <div class="text-sm text-gray-500">{{ $house->surface }} m²</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2 text-gray-700">
                                        <i class="fas fa-map-marker-alt text-indigo-500 text-xs"></i>
                                        <span>{{ Str::limit($house->lieu_exact, 30) }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded-lg text-sm font-medium">{{ $house->formatted_type }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="font-bold text-gray-900">{{ number_format($house->prix, 0, ',', ' ') }} €</span>
                                </td>
                                <td class="px-6 py-4">
                                    @php
                                        $houseReservations = $house->reservations()->where('status', 'confirmed')->count();
                                        $isActive = $houseReservations > 0;
                                    @endphp
                                    <span class="px-3 py-1 rounded-full text-xs font-bold {{ $isActive ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                                        {{ $isActive ? 'Actif' : 'Disponible' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('locataire.house.manage', $house) }}" class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors" title="Gérer">
                                            <i class="fas fa-cog"></i>
                                        </a>
                                        <div class="relative group">
                                            <button class="p-2 text-gray-600 hover:bg-gray-100 rounded-lg transition-colors" title="Plus d'options">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all z-10">
                                                <a href="{{ route('locataire.house.manage', $house) }}" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 rounded-t-lg">
                                                    <i class="fas fa-edit w-4 mr-3"></i> Éditer
                                                </a>
                                                <a href="{{ route('houses.show', $house) }}" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50">
                                                    <i class="fas fa-eye w-4 mr-3"></i> Voir le bien
                                                </a>
                                                <div class="border-t border-gray-200"></div>
                                                <a href="#" class="block px-4 py-3 text-sm text-red-600 hover:bg-red-50 rounded-b-lg">
                                                    <i class="fas fa-trash w-4 mr-3"></i> Supprimer
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="p-16 text-center">
                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-home text-3xl text-gray-400"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Aucun bien ajouté</h3>
                    <p class="text-gray-500 mb-6">Commencez par ajouter votre premier bien immobilier !</p>
                    <button onclick="openModal()" class="bg-indigo-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition-all inline-flex items-center gap-2">
                        <i class="fas fa-plus-circle"></i> Ajouter une maison
                    </button>
                </div>
                @endif
            </div>
        </div>

        <!-- Section Mes Maisons -->
        <div id="section-houses" class="content-section">
            <header>
                <div class="section-header">
                    <h1 class="section-title">Mes Maisons</h1>
                    <p class="section-subtitle">Gérez tous vos biens immobiliers</p>
                </div>
            </header>

            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 32px;">
                <h2 style="font-size: 24px; font-weight: 800; color: #1e293b;">Tous mes biens</h2>
                <button onclick="openModal()" class="btn-white" style="padding: 14px 28px;">
                    <i class="fas fa-plus-circle"></i> Ajouter une maison
                </button>
            </div>

            @if($houses->count() > 0)
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(360px, 1fr)); gap: 28px;">
                @foreach($houses as $house)
                <div class="house-card">
                    <div class="house-image-wrapper">
                        @if($house->firstPhoto)
                            <img src="{{ asset('storage/' . $house->firstPhoto) }}" alt="{{ $house->description }}">
                        @else
                            <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: var(--secondary);">
                                <i class="fas fa-home" style="font-size: 64px; opacity: 0.3;"></i>
                            </div>
                        @endif
                        <div class="house-badge">{{ $house->formatted_type }}</div>
                    </div>
                    <div class="house-content">
                        <h3 class="house-title">{{ Str::limit($house->description, 55) }}</h3>
                        <div class="house-location">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>{{ Str::limit($house->lieu_exact, 45) }}</span>
                        </div>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 20px; padding: 16px; background: #f8fafc; border-radius: 12px;">
                            <div style="text-align: center;">
                                <div style="font-size: 12px; color: var(--secondary); margin-bottom: 6px; font-weight: 600;">Surface</div>
                                <div style="font-size: 20px; font-weight: 800; color: #1e293b;">{{ $house->surface }} m²</div>
                            </div>
                            <div style="text-align: center;">
                                <div style="font-size: 12px; color: var(--secondary); margin-bottom: 6px; font-weight: 600;">Prix</div>
                                <div style="font-size: 20px; font-weight: 800; color: var(--primary);">{{ number_format($house->prix, 0, ',', ' ') }} €</div>
                            </div>
                        </div>
                        <a href="{{ route('locataire.house.manage', $house) }}" style="display: block; background: var(--primary-gradient); color: white; padding: 14px; border-radius: 12px; text-decoration: none; font-weight: 700; font-size: 15px; text-align: center; transition: var(--transition); box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 16px rgba(99, 102, 241, 0.4)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(99, 102, 241, 0.3)'">
                            Gérer le bien <i class="fas fa-arrow-right" style="font-size: 12px; margin-left: 6px;"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="empty-state">
                <div class="empty-state-icon"><i class="fas fa-home"></i></div>
                <h3 class="empty-state-title">Aucune maison ajoutée</h3>
                <p class="empty-state-text">Commencez par ajouter votre premier bien immobilier !</p>
                <button onclick="openModal()" class="btn-white">
                    <i class="fas fa-plus-circle"></i> Ajouter une maison
                </button>
            </div>
            @endif
        </div>

        <!-- Section Réservations -->
        <div id="section-reservations" class="content-section">
            <header>
                <div class="section-header">
                    <h1 class="section-title">Réservations</h1>
                    <p class="section-subtitle">Consultez toutes les réservations de vos biens</p>
                </div>
            </header>

            @if($allReservations->count() > 0)
            <div style="display: flex; flex-direction: column; gap: 24px;">
                @foreach($allReservations as $reservation)
                <div style="background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(20px) saturate(180%); -webkit-backdrop-filter: blur(20px) saturate(180%); border-radius: 24px; padding: 32px; box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3), inset 0 1px 0 rgba(255, 255, 255, 0.1); border: 1px solid rgba(255, 255, 255, 0.1); transition: var(--transition);" onmouseover="this.style.transform='translateY(-6px) scale(1.01)'; this.style.boxShadow='0 20px 60px rgba(0, 0, 0, 0.4), 0 0 0 1px rgba(99, 102, 241, 0.3), inset 0 1px 0 rgba(255, 255, 255, 0.15), 0 0 40px rgba(99, 102, 241, 0.2)'; this.style.borderColor='rgba(99, 102, 241, 0.4)'" onmouseout="this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='0 8px 32px rgba(0, 0, 0, 0.3), inset 0 1px 0 rgba(255, 255, 255, 0.1)'; this.style.borderColor='rgba(255, 255, 255, 0.1)'">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 28px; flex-wrap: wrap; gap: 24px;">
                        <div style="flex: 1; min-width: 280px;">
                            <h3 style="font-size: 28px; font-weight: 900; background: linear-gradient(135deg, #ffffff 0%, #c7d2fe 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; margin-bottom: 16px; text-shadow: 0 0 40px rgba(99, 102, 241, 0.3); letter-spacing: -0.5px; line-height: 1.3;">{{ $reservation->house->description ?? 'Bien supprimé' }}</h3>
                            @if($reservation->house)
                                <div style="color: rgba(255, 255, 255, 0.8); font-size: 15px; margin-bottom: 24px; display: flex; align-items: center; gap: 10px;">
                                    <i class="fas fa-map-marker-alt" style="color: #a5b4fc; filter: drop-shadow(0 0 6px rgba(99, 102, 241, 0.5));"></i>
                                    <span style="text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);">{{ $reservation->house->lieu_exact }}</span>
                                </div>
                            @endif
                            <div style="display: flex; gap: 20px; flex-wrap: wrap;">
                                <div style="padding: 16px 20px; background: rgba(255, 255, 255, 0.08); backdrop-filter: blur(10px); border-radius: 16px; min-width: 140px; border: 1px solid rgba(255, 255, 255, 0.1);">
                                    <div style="font-size: 11px; color: rgba(255, 255, 255, 0.6); margin-bottom: 8px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;">Arrivée</div>
                                    <div style="font-size: 18px; font-weight: 800; color: #ffffff; text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);">{{ $reservation->start_date->format('d/m/Y') }}</div>
                                </div>
                                <div style="padding: 16px 20px; background: rgba(255, 255, 255, 0.08); backdrop-filter: blur(10px); border-radius: 16px; min-width: 140px; border: 1px solid rgba(255, 255, 255, 0.1);">
                                    <div style="font-size: 11px; color: rgba(255, 255, 255, 0.6); margin-bottom: 8px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;">Départ</div>
                                    <div style="font-size: 18px; font-weight: 800; color: #ffffff; text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);">{{ $reservation->end_date->format('d/m/Y') }}</div>
                                </div>
                                <div style="padding: 16px 20px; background: rgba(255, 255, 255, 0.08); backdrop-filter: blur(10px); border-radius: 16px; min-width: 140px; border: 1px solid rgba(255, 255, 255, 0.1);">
                                    <div style="font-size: 11px; color: rgba(255, 255, 255, 0.6); margin-bottom: 8px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;">Durée</div>
                                    <div style="font-size: 18px; font-weight: 800; color: #ffffff; text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);">{{ $reservation->start_date->diffInDays($reservation->end_date) }} nuit(s)</div>
                                </div>
                            </div>
                        </div>
                        @if($reservation->house)
                            <img src="{{ $reservation->house->first_photo ? asset('storage/' . $reservation->house->first_photo) : 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=1170&q=80' }}" 
                                 alt="{{ $reservation->house->description }}" 
                                 style="width: 160px; height: 160px; border-radius: 20px; object-fit: cover; box-shadow: 0 8px 24px rgba(0, 0, 0, 0.4), 0 0 0 2px rgba(99, 102, 241, 0.2); border: 2px solid rgba(255, 255, 255, 0.1);">
                        @endif
                    </div>
                    <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 24px;">
                        <span style="padding: 12px 24px; border-radius: 24px; font-size: 13px; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; 
                            @if($reservation->status === 'pending') 
                                background: rgba(251, 191, 36, 0.2); 
                                color: #fbbf24; 
                                border: 1px solid rgba(251, 191, 36, 0.4);
                                box-shadow: 0 0 20px rgba(251, 191, 36, 0.3);
                                text-shadow: 0 0 10px rgba(251, 191, 36, 0.5);
                            @elseif($reservation->status === 'confirmed') 
                                background: rgba(16, 185, 129, 0.2); 
                                color: #34d399; 
                                border: 1px solid rgba(16, 185, 129, 0.4);
                                box-shadow: 0 0 20px rgba(16, 185, 129, 0.3);
                                text-shadow: 0 0 10px rgba(16, 185, 129, 0.5);
                            @else 
                                background: rgba(239, 68, 68, 0.2); 
                                color: #f87171; 
                                border: 1px solid rgba(239, 68, 68, 0.4);
                                box-shadow: 0 0 20px rgba(239, 68, 68, 0.3);
                                text-shadow: 0 0 10px rgba(239, 68, 68, 0.5);
                            @endif
                            backdrop-filter: blur(10px);
                            -webkit-backdrop-filter: blur(10px);
                            display: inline-flex;
                            align-items: center;
                            gap: 8px;">
                            @if($reservation->status === 'pending')
                                <i class="fas fa-clock"></i> En attente
                            @elseif($reservation->status === 'confirmed')
                                <i class="fas fa-check-circle"></i> Confirmée
                            @else
                                <i class="fas fa-times-circle"></i> Annulée
                            @endif
                        </span>
                    </div>
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; padding-top: 24px; border-top: 1px solid rgba(255, 255, 255, 0.1);">
                        <div style="padding: 20px; background: rgba(255, 255, 255, 0.08); backdrop-filter: blur(10px); border-radius: 16px; border: 1px solid rgba(255, 255, 255, 0.1);">
                            <div style="font-size: 12px; color: rgba(255, 255, 255, 0.6); margin-bottom: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;">Prix par nuit</div>
                            <div style="font-size: 24px; font-weight: 900; background: linear-gradient(135deg, #a5b4fc 0%, #818cf8 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; text-shadow: 0 0 20px rgba(99, 102, 241, 0.3);">{{ number_format($reservation->house->prix ?? 0, 0, ',', ' ') }} €</div>
                        </div>
                        <div style="padding: 20px; background: rgba(255, 255, 255, 0.08); backdrop-filter: blur(10px); border-radius: 16px; border: 1px solid rgba(255, 255, 255, 0.1);">
                            <div style="font-size: 12px; color: rgba(255, 255, 255, 0.6); margin-bottom: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;">Total</div>
                            <div style="font-size: 24px; font-weight: 900; background: linear-gradient(135deg, #ffffff 0%, #c7d2fe 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; text-shadow: 0 0 30px rgba(99, 102, 241, 0.4);">
                                {{ number_format(($reservation->house->prix ?? 0) * $reservation->start_date->diffInDays($reservation->end_date), 0, ',', ' ') }} €
                            </div>
                        </div>
                        @if($reservation->has_breakfast)
                        <div style="padding: 20px; background: rgba(16, 185, 129, 0.15); backdrop-filter: blur(10px); border-radius: 16px; border: 1px solid rgba(16, 185, 129, 0.3);">
                            <div style="font-size: 12px; color: rgba(255, 255, 255, 0.7); margin-bottom: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;">Petit-déjeuner</div>
                            <div style="font-size: 18px; font-weight: 800; color: #34d399; text-shadow: 0 0 10px rgba(16, 185, 129, 0.5);"><i class="fas fa-check"></i> Inclus</div>
                        </div>
                        @endif
                        @if($reservation->has_love_room)
                        <div style="padding: 20px; background: rgba(16, 185, 129, 0.15); backdrop-filter: blur(10px); border-radius: 16px; border: 1px solid rgba(16, 185, 129, 0.3);">
                            <div style="font-size: 12px; color: rgba(255, 255, 255, 0.7); margin-bottom: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;">Chambre d'amour</div>
                            <div style="font-size: 18px; font-weight: 800; color: #34d399; text-shadow: 0 0 10px rgba(16, 185, 129, 0.5);"><i class="fas fa-check"></i> Inclus</div>
                        </div>
                        @endif
                        @if($reservation->additional_options && count($reservation->additional_options) > 0)
                            @foreach($reservation->additional_options as $optKey => $option)
                                @php
                                    $optName = is_array($option) ? ($option['name'] ?? 'Option') : (is_string($optKey) ? $optKey : 'Option');
                                    $optPrice = is_array($option) ? (float) ($option['price'] ?? 0) : (is_numeric($option) ? (float) $option : 0);
                                @endphp
                            <div style="padding: 20px; background: rgba(16, 185, 129, 0.15); backdrop-filter: blur(10px); border-radius: 16px; border: 1px solid rgba(16, 185, 129, 0.3);">
                                <div style="font-size: 12px; color: rgba(255, 255, 255, 0.7); margin-bottom: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;">{{ $optName }}</div>
                                <div style="font-size: 18px; font-weight: 800; color: #34d399; text-shadow: 0 0 10px rgba(16, 185, 129, 0.5);">
                                    <i class="fas fa-check"></i> 
                                    @if($optPrice > 0)
                                        +{{ number_format($optPrice, 0, ',', ' ') }} €
                                    @else
                                        Inclus
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                    @if($reservation->notes)
                    <div style="margin-top: 24px; padding: 24px; background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(10px); border-radius: 16px; border-left: 4px solid rgba(99, 102, 241, 0.6); border: 1px solid rgba(255, 255, 255, 0.1); border-left-width: 4px;">
                        <div style="font-size: 12px; color: rgba(255, 255, 255, 0.7); margin-bottom: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;">Notes</div>
                        <div style="font-size: 15px; color: rgba(255, 255, 255, 0.9); line-height: 1.7; text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);">{{ $reservation->notes }}</div>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
            @else
            <div class="empty-state">
                <div class="empty-state-icon"><i class="fas fa-calendar-times"></i></div>
                <h3 class="empty-state-title">Aucune réservation</h3>
                <p class="empty-state-text">Aucune réservation n'a encore été effectuée sur vos biens.</p>
            </div>
            @endif
        </div>

        <!-- Section Statistiques - Premium Analytics Dashboard -->
        <div id="section-statistiques" class="content-section tailwind-content">
            <header class="mb-8 pb-6 border-b border-gray-200">
                <div class="flex justify-between items-center flex-wrap gap-4">
                    <div>
                        <h1 class="text-4xl font-bold text-gray-900 mb-2">Statistiques Avancées</h1>
                        <p class="text-gray-500 text-lg">Analysez et optimisez votre portefeuille immobilier en profondeur</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <select id="statsPeriod" class="px-4 py-2 border border-gray-200 rounded-lg text-sm font-medium text-gray-700 bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option value="all">Toutes périodes</option>
                            <option value="year">Cette année</option>
                            <option value="month">Ce mois</option>
                        </select>
                    </div>
                </div>
            </header>

            @if($totalHouses > 0)
            @php
                // Statistiques avancées
                $avgPhotosPerHouse = $totalHouses > 0 ? round($totalPhotos / $totalHouses, 1) : 0;
                $priceRange = $prixMax - $prixMin;
                $surfaceRange = $surfaceMax - $surfaceMin;
                
                // Statistiques de réservations par bien
                $reservationsByHouse = [];
                $revenueByHouse = [];
                foreach ($houses as $house) {
                    $houseReservations = $house->reservations()->where('status', 'confirmed')->get();
                    $reservationsByHouse[$house->description] = $houseReservations->count();
                    $houseRevenue = 0;
                    foreach ($houseReservations as $res) {
                        $nights = $res->start_date->diffInDays($res->end_date);
                        $base = $house->prix * $nights;
                        $options = 0;
                        if ($res->has_breakfast && $house->price_breakfast) $options += $house->price_breakfast;
                        if ($res->has_love_room && $house->price_love_room) $options += $house->price_love_room;
                        $options += \App\Support\AdditionalOptions::sumPrices(is_array($res->additional_options) ? $res->additional_options : null);
                        $houseRevenue += $base + $options;
                    }
                    $revenueByHouse[$house->description] = round($houseRevenue);
                }
                
                // Top 5 biens par revenus
                arsort($revenueByHouse);
                $top5Revenue = array_slice($revenueByHouse, 0, 5, true);
                
                // Répartition par type avec pourcentages
                $repartitionTypeWithPercent = [];
                foreach ($repartitionType as $type => $count) {
                    $repartitionTypeWithPercent[$type] = [
                        'count' => $count,
                        'percent' => $totalHouses > 0 ? round(($count / $totalHouses) * 100, 1) : 0
                    ];
                }
            @endphp

            <!-- KPIs Premium Grid -->
            <div class="grid grid-cols-12 gap-6 mb-8">
                <!-- KPI 1: Total Biens -->
                <div class="col-span-12 md:col-span-6 lg:col-span-3 bg-white rounded-2xl p-6 shadow-sm border border-gray-200 hover:shadow-lg transition-all duration-300 group">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-indigo-100 to-indigo-50 rounded-xl flex items-center justify-center text-indigo-600 group-hover:scale-110 transition-transform">
                            <i class="fas fa-home text-xl"></i>
                        </div>
                        <span class="px-3 py-1 bg-indigo-50 text-indigo-700 text-xs font-bold rounded-full">Total</span>
                    </div>
                    <div class="mb-2">
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Total des Biens</p>
                        <h3 class="text-3xl font-bold text-gray-900">{{ $totalHouses }}</h3>
                    </div>
                    <p class="text-sm text-gray-500">{{ $avgPhotosPerHouse }} photos/bien en moyenne</p>
                </div>

                <!-- KPI 2: Prix Moyen -->
                <div class="col-span-12 md:col-span-6 lg:col-span-3 bg-white rounded-2xl p-6 shadow-sm border border-gray-200 hover:shadow-lg transition-all duration-300 group">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-green-100 to-green-50 rounded-xl flex items-center justify-center text-green-600 group-hover:scale-110 transition-transform">
                            <i class="fas fa-dollar-sign text-xl"></i>
                        </div>
                        <span class="px-3 py-1 bg-green-50 text-green-700 text-xs font-bold rounded-full">
                            {{ number_format($prixMin, 0, ',', ' ') }}€ - {{ number_format($prixMax, 0, ',', ' ') }}€
                        </span>
                    </div>
                    <div class="mb-2">
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Prix Moyen</p>
                        <h3 class="text-3xl font-bold text-gray-900">{{ number_format($prixMoyen, 0, ',', ' ') }}€</h3>
                    </div>
                    <p class="text-sm text-gray-500">Écart: {{ number_format($priceRange, 0, ',', ' ') }}€</p>
                </div>

                <!-- KPI 3: Surface Moyenne -->
                <div class="col-span-12 md:col-span-6 lg:col-span-3 bg-white rounded-2xl p-6 shadow-sm border border-gray-200 hover:shadow-lg transition-all duration-300 group">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-100 to-blue-50 rounded-xl flex items-center justify-center text-blue-600 group-hover:scale-110 transition-transform">
                            <i class="fas fa-ruler-combined text-xl"></i>
                        </div>
                        <span class="px-3 py-1 bg-blue-50 text-blue-700 text-xs font-bold rounded-full">
                            {{ $surfaceMin }}m² - {{ $surfaceMax }}m²
                        </span>
                    </div>
                    <div class="mb-2">
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Surface Moyenne</p>
                        <h3 class="text-3xl font-bold text-gray-900">{{ $surfaceMoyenne }}m²</h3>
                    </div>
                    <p class="text-sm text-gray-500">Écart: {{ $surfaceRange }}m²</p>
                </div>

                <!-- KPI 4: Total Photos -->
                <div class="col-span-12 md:col-span-6 lg:col-span-3 bg-white rounded-2xl p-6 shadow-sm border border-gray-200 hover:shadow-lg transition-all duration-300 group">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-100 to-purple-50 rounded-xl flex items-center justify-center text-purple-600 group-hover:scale-110 transition-transform">
                            <i class="fas fa-images text-xl"></i>
                        </div>
                        <span class="px-3 py-1 bg-purple-50 text-purple-700 text-xs font-bold rounded-full">Média</span>
                    </div>
                    <div class="mb-2">
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Total Photos</p>
                        <h3 class="text-3xl font-bold text-gray-900">{{ $totalPhotos }}</h3>
                    </div>
                    <p class="text-sm text-gray-500">{{ $avgPhotosPerHouse }} photos/bien</p>
                </div>
            </div>

            <!-- Bento Grid - Charts Section -->
            <div class="grid grid-cols-12 gap-6 mb-8">
                <!-- Pie Chart - Répartition par Type -->
                <div class="col-span-12 lg:col-span-6 bg-white rounded-2xl p-6 shadow-sm border border-gray-200">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Répartition par Type</h3>
                            <p class="text-sm text-gray-500 mt-1">Distribution de vos biens</p>
                        </div>
                    </div>
                    <div id="typePieChart" style="min-height: 350px;"></div>
                </div>

                <!-- Bar Chart - Répartition par Tranche de Prix -->
                <div class="col-span-12 lg:col-span-6 bg-white rounded-2xl p-6 shadow-sm border border-gray-200">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Répartition par Prix</h3>
                            <p class="text-sm text-gray-500 mt-1">Nombre de biens par tranche de prix</p>
                        </div>
                    </div>
                    <div id="priceBarChart" style="min-height: 350px;"></div>
                </div>
            </div>

            <!-- Bento Grid - More Charts -->
            <div class="grid grid-cols-12 gap-6 mb-8">
                <!-- Bar Chart - Répartition par Surface -->
                <div class="col-span-12 lg:col-span-6 bg-white rounded-2xl p-6 shadow-sm border border-gray-200">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Répartition par Surface</h3>
                            <p class="text-sm text-gray-500 mt-1">Nombre de biens par tranche de surface</p>
                        </div>
                    </div>
                    <div id="surfaceBarChart" style="min-height: 350px;"></div>
                </div>

                <!-- Horizontal Bar Chart - Top 5 Biens par Revenus -->
                <div class="col-span-12 lg:col-span-6 bg-white rounded-2xl p-6 shadow-sm border border-gray-200">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Top 5 Biens Performants</h3>
                            <p class="text-sm text-gray-500 mt-1">Revenus générés par bien</p>
                        </div>
                    </div>
                    <div id="topRevenueChart" style="min-height: 350px;"></div>
                </div>
            </div>

            <!-- Detailed Stats Cards -->
            <div class="grid grid-cols-12 gap-6 mb-8">
                <!-- Répartition par Type - Detailed Cards -->
                <div class="col-span-12 lg:col-span-8 bg-white rounded-2xl p-6 shadow-sm border border-gray-200">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Détails par Type de Bien</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($repartitionTypeWithPercent as $type => $data)
                        <div class="p-4 bg-gradient-to-br from-gray-50 to-white rounded-xl border border-gray-200 hover:border-indigo-300 hover:shadow-md transition-all">
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-sm font-semibold text-gray-700 uppercase">{{ $type }}</span>
                                <span class="px-2 py-1 bg-indigo-100 text-indigo-700 rounded-lg text-xs font-bold">{{ $data['percent'] }}%</span>
                            </div>
                            <div class="text-3xl font-bold text-gray-900 mb-2">{{ $data['count'] }}</div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-gradient-to-r from-indigo-500 to-purple-600 h-2 rounded-full" style="width: {{ $data['percent'] }}%"></div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="col-span-12 lg:col-span-4 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-2xl p-6 shadow-xl text-white">
                    <h3 class="text-xl font-bold mb-6">Insights Rapides</h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-3 bg-white/10 rounded-lg backdrop-blur-sm">
                            <div>
                                <p class="text-sm opacity-90">Bien le plus cher</p>
                                <p class="text-lg font-bold">{{ number_format($prixMax, 0, ',', ' ') }}€</p>
                            </div>
                            <i class="fas fa-arrow-up text-2xl opacity-50"></i>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-white/10 rounded-lg backdrop-blur-sm">
                            <div>
                                <p class="text-sm opacity-90">Bien le plus grand</p>
                                <p class="text-lg font-bold">{{ $surfaceMax }}m²</p>
                            </div>
                            <i class="fas fa-expand-arrows-alt text-2xl opacity-50"></i>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-white/10 rounded-lg backdrop-blur-sm">
                            <div>
                                <p class="text-sm opacity-90">Photos totales</p>
                                <p class="text-lg font-bold">{{ $totalPhotos }}</p>
                            </div>
                            <i class="fas fa-camera text-2xl opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reservations Stats -->
            @if(count($reservationsByHouse) > 0)
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200 mb-8">
                <h3 class="text-xl font-bold text-gray-900 mb-6">Statistiques de Réservations par Bien</h3>
                <div id="reservationsChart" style="min-height: 400px;"></div>
            </div>
            @endif

            @else
            <div class="bg-white rounded-2xl p-16 text-center shadow-sm border border-gray-200">
                <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-chart-line text-3xl text-gray-400"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Aucune donnée à analyser</h3>
                <p class="text-gray-500 mb-6">Ajoutez des maisons pour voir des statistiques détaillées.</p>
                <button onclick="openModal()" class="bg-indigo-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition-all inline-flex items-center gap-2">
                    <i class="fas fa-plus-circle"></i> Ajouter une maison
                </button>
            </div>
            @endif
        </div>

        <!-- Section Profil -->
        <div id="section-profil" class="content-section">
            <header>
                <div class="section-header">
                    <h1 class="section-title">Mon Profil</h1>
                    <p class="section-subtitle">Gérez vos informations personnelles</p>
                </div>
            </header>

            <div style="background: var(--bg-card); border-radius: var(--border-radius-lg); padding: 48px; box-shadow: var(--shadow-lg); max-width: 700px; border: 1px solid rgba(226, 232, 240, 0.6);">
                <div style="display: flex; align-items: center; gap: 28px; margin-bottom: 40px; padding-bottom: 32px; border-bottom: 2px solid rgba(226, 232, 240, 0.6);">
                    <div class="user-avatar" style="width: 100px; height: 100px; font-size: 36px; box-shadow: 0 8px 24px rgba(99, 102, 241, 0.4);">
                        {{ substr($user->first_name, 0, 1) }}
                    </div>
                    <div>
                        <h3 style="font-size: 28px; font-weight: 800; color: #1e293b; margin-bottom: 8px;">{{ $user->first_name }} {{ $user->last_name }}</h3>
                        <p style="color: var(--secondary); font-size: 15px; margin-bottom: 12px;">{{ $user->email }}</p>
                        <span style="display: inline-block; padding: 6px 16px; background: linear-gradient(135deg, rgba(16, 185, 129, 0.15), rgba(52, 211, 153, 0.15)); color: var(--success); border-radius: 20px; font-size: 13px; font-weight: 700; border: 2px solid rgba(16, 185, 129, 0.2);">✓ Locataire Vérifié</span>
                    </div>
                </div>
                <div style="display: grid; gap: 28px;">
                    <div>
                        <label style="display: block; font-size: 14px; font-weight: 700; color: var(--secondary); margin-bottom: 10px; text-transform: uppercase; letter-spacing: 0.5px;">Prénom</label>
                        <div style="padding: 16px 20px; background: linear-gradient(135deg, #f8fafc, #ffffff); border-radius: 12px; color: #1e293b; font-size: 15px; font-weight: 600; border: 2px solid rgba(226, 232, 240, 0.6);">{{ $user->first_name }}</div>
                    </div>
                    <div>
                        <label style="display: block; font-size: 14px; font-weight: 700; color: var(--secondary); margin-bottom: 10px; text-transform: uppercase; letter-spacing: 0.5px;">Nom</label>
                        <div style="padding: 16px 20px; background: linear-gradient(135deg, #f8fafc, #ffffff); border-radius: 12px; color: #1e293b; font-size: 15px; font-weight: 600; border: 2px solid rgba(226, 232, 240, 0.6);">{{ $user->last_name }}</div>
                    </div>
                    <div>
                        <label style="display: block; font-size: 14px; font-weight: 700; color: var(--secondary); margin-bottom: 10px; text-transform: uppercase; letter-spacing: 0.5px;">Email</label>
                        <div style="padding: 16px 20px; background: linear-gradient(135deg, #f8fafc, #ffffff); border-radius: 12px; color: #1e293b; font-size: 15px; font-weight: 600; border: 2px solid rgba(226, 232, 240, 0.6);">{{ $user->email }}</div>
                    </div>
                    <div>
                        <label style="display: block; font-size: 14px; font-weight: 700; color: var(--secondary); margin-bottom: 10px; text-transform: uppercase; letter-spacing: 0.5px;">Rôle</label>
                        <div style="padding: 16px 20px; background: linear-gradient(135deg, #f8fafc, #ffffff); border-radius: 12px; color: #1e293b; font-size: 15px; font-weight: 600; border: 2px solid rgba(226, 232, 240, 0.6); text-transform: capitalize;">{{ $user->role }}</div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal -->
    <div id="addHouseModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>🏠 Nouveau bien immobilier</h2>
                <button onclick="closeModal()" class="modal-close">&times;</button>
            </div>
            <div class="modal-body">
                <form id="addHouseForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-grid">
                        <div class="input-wrapper full-width">
                            <label class="form-label">Titre / Description courte *</label>
                            <input type="text" name="description" class="form-control" placeholder="Ex: Studio chic Zone 4" required>
                        </div>
                        <div class="input-wrapper">
                            <label class="form-label">Type de Logement *</label>
                            <select name="type" class="form-control" required>
                                <option value="studio">Studio</option>
                                <option value="F2">Appartement F2</option>
                                <option value="F3">Appartement F3</option>
                                <option value="villa">Villa</option>
                            </select>
                        </div>
                        <div class="input-wrapper full-width" style="margin-top: 10px; padding: 24px; background: linear-gradient(135deg, #f8fafc, #ffffff); border-radius: 16px; border: 2px solid rgba(226, 232, 240, 0.8);">
                            <label class="form-label" style="font-size: 16px; font-weight: 800; color: #1a202c; margin-bottom: 24px; display: flex; align-items: center; gap: 10px;">
                                <i class="fas fa-money-bill-wave" style="color: var(--primary); font-size: 18px;"></i>
                                Tarification
                            </label>
                            
                            <div style="margin-bottom: 24px;">
                                <label class="form-label" style="font-size: 14px; font-weight: 700; color: #475569; margin-bottom: 10px;">
                                    Prix par nuit (€) *
                                </label>
                                <input type="number" name="prix" class="form-control" placeholder="Ex: 50000" required min="0" step="any" style="font-size: 16px; font-weight: 700; padding: 16px 18px;">
                                <small style="color: var(--secondary); font-size: 12px; margin-top: 6px; display: block;">
                                    C'est le prix de base que vous facturerez par nuit pour ce bien
                                </small>
                            </div>
                            
                            <div style="padding-top: 24px; border-top: 2px solid rgba(226, 232, 240, 0.6);">
                                <label class="form-label" style="font-size: 14px; font-weight: 700; color: #1a202c; margin-bottom: 18px; display: flex; align-items: center; gap: 10px;">
                                    <i class="fas fa-star" style="color: var(--primary); font-size: 14px;"></i>
                                    Prix des options supplémentaires
                                </label>
                                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                                    <div>
                                        <label class="form-label" style="font-size: 13px; font-weight: 700; color: #1a202c; margin-bottom: 10px; display: flex; align-items: center; gap: 8px;">
                                            <i class="fas fa-coffee" style="color: var(--primary); font-size: 13px;"></i>
                                            Prix Petit-déjeuner (€)
                                        </label>
                                        <input type="number" name="price_breakfast" id="price_breakfast" class="form-control" placeholder="Ex: 5000" min="0" value="0" step="any" style="font-weight: 600;">
                                        <small style="color: var(--secondary); font-size: 11px; margin-top: 6px; display: block;">
                                            Prix ajouté si le client coche "Petit-déjeuner inclus"
                                        </small>
                                    </div>
                                    <div>
                                        <label class="form-label" style="font-size: 13px; font-weight: 700; color: #1a202c; margin-bottom: 10px; display: flex; align-items: center; gap: 8px;">
                                            <i class="fas fa-heart" style="color: #e91e63; font-size: 13px;"></i>
                                            Prix Chambre Romantique (€)
                                        </label>
                                        <input type="number" name="price_love_room" id="price_love_room" class="form-control" placeholder="Ex: 10000" min="0" value="0" step="any" style="font-weight: 600;">
                                        <small style="color: var(--secondary); font-size: 11px; margin-top: 6px; display: block;">
                                            Prix ajouté si le client coche "Chambre romantique"
                                        </small>
                                    </div>
                                </div>
                                <small style="color: var(--secondary); font-size: 12px; margin-top: 16px; display: block; font-style: italic; padding: 12px; background: linear-gradient(135deg, #f1f5f9, #f8fafc); border-radius: 10px; border-left: 4px solid var(--primary);">
                                    💡 <strong>Astuce :</strong> Définissez le prix que vous souhaitez facturer pour chaque option. Mettez 0 si vous voulez les offrir gratuitement.
                                </small>
                            </div>
                        </div>

                        <!-- Options supplémentaires dynamiques -->
                        <div class="input-wrapper full-width" style="margin-top: 20px; padding: 24px; background: linear-gradient(135deg, #f8fafc, #ffffff); border-radius: 16px; border: 2px solid rgba(226, 232, 240, 0.8);">
                            <label class="form-label" style="font-size: 16px; font-weight: 800; color: #1a202c; margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
                                <i class="fas fa-plus-circle" style="color: var(--primary); font-size: 18px;"></i>
                                Options supplémentaires personnalisées
                            </label>
                            
                            <div id="additionalOptionsContainer" style="display: flex; flex-direction: column; gap: 16px; margin-bottom: 20px;">
                                <!-- Les options seront ajoutées ici dynamiquement -->
                            </div>

                            <button type="button" onclick="addAdditionalOption()" style="padding: 12px 24px; background: var(--primary-gradient); color: white; border: none; border-radius: 12px; font-weight: 700; font-size: 14px; cursor: pointer; transition: var(--transition); box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3); display: inline-flex; align-items: center; gap: 8px;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 16px rgba(99, 102, 241, 0.4)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(99, 102, 241, 0.3)'">
                                <i class="fas fa-plus"></i> Ajouter une option
                            </button>

                            <small style="color: var(--secondary); font-size: 12px; margin-top: 16px; display: block; font-style: italic; padding: 12px; background: linear-gradient(135deg, #f1f5f9, #f8fafc); border-radius: 10px; border-left: 4px solid var(--primary);">
                                💡 <strong>Exemple :</strong> Vous pouvez ajouter "Sonna 500€", "Climatisation", "WiFi Premium", etc. Ces options seront disponibles lors de la réservation.
                            </small>
                        </div>
                        
                        <div class="input-wrapper">
                            <label class="form-label">Lieu exact *</label>
                            <input type="text" name="lieu_exact" class="form-control" placeholder="Ex: Marcory, Rue 12" required>
                        </div>
                        <div class="input-wrapper">
                            <label class="form-label">Surface (m²) *</label>
                            <input type="number" name="surface" class="form-control" placeholder="Ex: 45" required>
                        </div>

                        <div class="input-wrapper full-width">
                            <label class="form-label">Galerie Photos *</label>
                            <div class="photo-zone" onclick="document.getElementById('photoInput').click()">
                                <i class="fas fa-cloud-upload-alt" style="font-size:36px; color:var(--primary); margin-bottom:12px"></i>
                                <p style="font-weight:700; font-size:16px; margin-bottom:6px">Cliquez pour ajouter des photos</p>
                                <p style="font-size:13px; color:var(--secondary)">Jusqu'à 10 images (JPG, PNG)</p>
                                <input type="file" id="photoInput" name="photos[]" multiple hidden accept="image/*">
                            </div>
                            <div id="previewContainer" class="preview-grid"></div>
                        </div>
                    </div>

                    <div style="margin-top:40px; display:flex; gap:16px; justify-content:flex-end; padding-top:24px; border-top:2px solid rgba(226, 232, 240, 0.6);">
                        <button type="button" onclick="closeModal()" style="padding:14px 28px; border-radius:12px; border:2px solid rgba(226, 232, 240, 0.8); background:white; cursor:pointer; font-weight:700; font-size:15px; color:var(--secondary); transition:var(--transition);" onmouseover="this.style.borderColor='var(--primary)'; this.style.color='var(--primary)'" onmouseout="this.style.borderColor='rgba(226, 232, 240, 0.8)'; this.style.color='var(--secondary)'">Annuler</button>
                        <button type="submit" id="submitBtn" style="padding:14px 32px; border-radius:12px; border:none; background:var(--primary-gradient); color:white; cursor:pointer; font-weight:800; font-size:15px; transition:var(--transition); box-shadow:0 4px 12px rgba(99, 102, 241, 0.3);" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 16px rgba(99, 102, 241, 0.4)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(99, 102, 241, 0.3)'">Confirmer l'ajout</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Navigation entre sections avec animation
        function switchSection(sectionName) {
            const navLinks = document.querySelectorAll('.nav-link[data-section]');
            const sections = document.querySelectorAll('.content-section');

            navLinks.forEach(l => l.classList.remove('active'));
            sections.forEach(s => s.classList.remove('active'));

            const activeLink = document.querySelector(`.nav-link[data-section="${sectionName}"]`);
            const activeSection = document.getElementById(`section-${sectionName}`);

            if (activeLink && activeSection) {
                activeLink.classList.add('active');
                setTimeout(() => {
                    activeSection.classList.add('active');
                }, 50);
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('.nav-link[data-section]');

            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const section = this.getAttribute('data-section');
                    switchSection(section);
                });
            });

            // ============================================
            // APEXCHARTS - Revenue Area Chart
            // ============================================
            @php
                // Générer des données de revenus mensuels
                $monthlyRevenue = [];
                $months = [];
                $houseIds = $houses->pluck('id');
                for ($i = 11; $i >= 0; $i--) {
                    $date = now()->subMonths($i);
                    $months[] = $date->locale('fr')->shortMonthName;
                    // Calculer les revenus réels du mois si disponibles
                    $monthRevenue = \App\Models\Reservation::whereIn('house_id', $houseIds)
                        ->where('status', 'confirmed')
                        ->whereMonth('created_at', $date->month)
                        ->whereYear('created_at', $date->year)
                        ->with('house')
                        ->get()
                        ->sum(function($res) {
                            if (!$res->house) return 0;
                            $house = $res->house;
                            $nights = $res->start_date->diffInDays($res->end_date);
                            $base = $house->prix * $nights;
                            $options = 0;
                            if ($res->has_breakfast && $house->price_breakfast) $options += $house->price_breakfast;
                            if ($res->has_love_room && $house->price_love_room) $options += $house->price_love_room;
                            $options += \App\Support\AdditionalOptions::sumPrices(is_array($res->additional_options) ? $res->additional_options : null);
                            return $base + $options;
                        });
                    $monthlyRevenue[] = round($monthRevenue);
                }
            @endphp

            const revenueOptions = {
                series: [{
                    name: 'Revenus',
                    data: @json($monthlyRevenue)
                }],
                chart: {
                    type: 'area',
                    height: 300,
                    toolbar: { show: false },
                    fontFamily: 'Inter, sans-serif',
                },
                colors: ['#6366f1'],
                dataLabels: { enabled: false },
                stroke: {
                    curve: 'smooth',
                    width: 3
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.4,
                        opacityTo: 0.1,
                        stops: [0, 90, 100]
                    }
                },
                xaxis: {
                    categories: @json($months),
                    labels: {
                        style: { colors: '#6b7280', fontSize: '12px' }
                    }
                },
                yaxis: {
                    labels: {
                        style: { colors: '#6b7280', fontSize: '12px' },
                        formatter: function(val) {
                            return Math.round(val).toLocaleString('fr-FR') + ' €';
                        }
                    }
                },
                grid: {
                    borderColor: '#e5e7eb',
                    strokeDashArray: 4
                },
                tooltip: {
                    theme: 'light',
                    y: {
                        formatter: function(val) {
                            return val.toLocaleString('fr-FR') + ' €';
                        }
                    }
                }
            };

            const revenueChart = new ApexCharts(document.querySelector("#revenueChart"), revenueOptions);
            revenueChart.render();

            // ============================================
            // APEXCHARTS - Status Donut Chart
            // ============================================
            @php
                $occupiedHouses = 0;
                $vacantHouses = 0;
                foreach ($houses as $house) {
                    $hasActiveReservation = $house->reservations()
                        ->where('status', 'confirmed')
                        ->where(function($q) {
                            $q->where('start_date', '<=', now())
                              ->where('end_date', '>=', now());
                        })
                        ->exists();
                    if ($hasActiveReservation) {
                        $occupiedHouses++;
                    } else {
                        $vacantHouses++;
                    }
                }
            @endphp

            const statusOptions = {
                series: [{{ $occupiedHouses }}, {{ $vacantHouses }}],
                chart: {
                    type: 'donut',
                    height: 300,
                    fontFamily: 'Inter, sans-serif',
                },
                labels: ['Loué', 'Disponible'],
                colors: ['#10b981', '#e5e7eb'],
                legend: {
                    position: 'bottom',
                    fontSize: '14px',
                    fontFamily: 'Inter, sans-serif',
                    fontWeight: 600
                },
                dataLabels: {
                    enabled: true,
                    formatter: function(val) {
                        return Math.round(val) + '%';
                    },
                    style: {
                        fontSize: '14px',
                        fontWeight: 700,
                        colors: ['#fff']
                    }
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '65%',
                            labels: {
                                show: true,
                                total: {
                                    show: true,
                                    label: 'Total',
                                    fontSize: '16px',
                                    fontWeight: 700,
                                    color: '#1f2937',
                                    formatter: function() {
                                        return '{{ $totalHouses }}';
                                    }
                                }
                            }
                        }
                    }
                }
            };

            const statusChart = new ApexCharts(document.querySelector("#statusChart"), statusOptions);
            statusChart.render();

            // ============================================
            // TABLE SEARCH & FILTER
            // ============================================
            const searchInput = document.getElementById('searchHouses');
            const filterSelect = document.getElementById('filterStatus');
            const tableBody = document.getElementById('housesTableBody');

            function filterTable() {
                const searchTerm = searchInput.value.toLowerCase();
                const filterValue = filterSelect.value.toLowerCase();
                const rows = tableBody.querySelectorAll('tr');

                rows.forEach(row => {
                    const houseName = row.getAttribute('data-house-name') || '';
                    const houseLocation = row.getAttribute('data-house-location') || '';
                    const statusBadge = row.querySelector('span.bg-green-100, span.bg-gray-100');
                    const rowStatus = statusBadge ? (statusBadge.classList.contains('bg-green-100') ? 'active' : '') : '';

                    const matchesSearch = houseName.includes(searchTerm) || houseLocation.includes(searchTerm);
                    const matchesFilter = !filterValue || rowStatus === filterValue;

                    row.style.display = (matchesSearch && matchesFilter) ? '' : 'none';
                });
            }

            if (searchInput) {
                searchInput.addEventListener('input', filterTable);
            }
            if (filterSelect) {
                filterSelect.addEventListener('change', filterTable);
            }

            // ============================================
            // SCROLL ANIMATIONS & INTERSECTION OBSERVER
            // ============================================
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            // Observer tous les éléments avec fade-in-up
            document.querySelectorAll('.fade-in-up').forEach(el => {
                observer.observe(el);
            });

            // Observer les cartes de stats
            document.querySelectorAll('.stat-card').forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
            });

            // ============================================
            // PARALLAX EFFECT
            // ============================================
            let mouseX = 0;
            let mouseY = 0;

            document.addEventListener('mousemove', (e) => {
                mouseX = (e.clientX / window.innerWidth - 0.5) * 20;
                mouseY = (e.clientY / window.innerHeight - 0.5) * 20;
                
                document.querySelectorAll('.stat-card').forEach((card, index) => {
                    const speed = (index + 1) * 0.5;
                    card.style.transform = `translate(${mouseX * speed * 0.1}px, ${mouseY * speed * 0.1}px)`;
                });
            });

            // ============================================
            // CURSOR GLOW EFFECT
            // ============================================
            const cursorGlow = document.createElement('div');
            cursorGlow.style.cssText = `
                position: fixed;
                width: 400px;
                height: 400px;
                border-radius: 50%;
                background: radial-gradient(circle, rgba(99, 102, 241, 0.15) 0%, transparent 70%);
                pointer-events: none;
                z-index: 9999;
                transform: translate(-50%, -50%);
                transition: opacity 0.3s ease;
                opacity: 0;
            `;
            document.body.appendChild(cursorGlow);

            document.addEventListener('mousemove', (e) => {
                cursorGlow.style.left = e.clientX + 'px';
                cursorGlow.style.top = e.clientY + 'px';
                cursorGlow.style.opacity = '1';
            });

            document.addEventListener('mouseleave', () => {
                cursorGlow.style.opacity = '0';
            });

            // ============================================
            // SMOOTH NUMBER ANIMATION
            // ============================================
            function animateValue(element, start, end, duration) {
                let startTimestamp = null;
                const step = (timestamp) => {
                    if (!startTimestamp) startTimestamp = timestamp;
                    const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                    const easeOutExpo = progress === 1 ? 1 : 1 - Math.pow(2, -10 * progress);
                    element.textContent = Math.floor(easeOutExpo * (end - start) + start).toLocaleString('fr-FR');
                    if (progress < 1) {
                        window.requestAnimationFrame(step);
                    }
                };
                window.requestAnimationFrame(step);
            }

            // Animer les valeurs numériques au scroll
            const numberElements = document.querySelectorAll('.stat-value');
            const numberObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting && !entry.target.dataset.animated) {
                        const text = entry.target.textContent.replace(/[^\d]/g, '');
                        const value = parseInt(text);
                        if (!isNaN(value)) {
                            entry.target.dataset.animated = 'true';
                            animateValue(entry.target, 0, value, 2000);
                        }
                    }
                });
            }, { threshold: 0.5 });

            numberElements.forEach(el => numberObserver.observe(el));

            // ============================================
            // STATISTIQUES SECTION - APEXCHARTS
            // ============================================
            
            // Initialiser les graphiques seulement si la section statistiques existe
            const statsSection = document.getElementById('section-statistiques');
            if (statsSection) {
                // Pie Chart - Répartition par Type
                @php
                    $typeLabels = [];
                    $typeValues = [];
                    foreach ($repartitionType as $type => $count) {
                        $typeLabels[] = $type;
                        $typeValues[] = $count;
                    }
                @endphp
                
                const typePieOptions = {
                    series: @json($typeValues),
                    chart: {
                        type: 'pie',
                        height: 350,
                        fontFamily: 'Inter, sans-serif',
                    },
                    labels: @json($typeLabels),
                    colors: ['#6366f1', '#8b5cf6', '#ec4899', '#f59e0b', '#10b981', '#3b82f6'],
                    legend: {
                        position: 'bottom',
                        fontSize: '14px',
                        fontFamily: 'Inter, sans-serif',
                        fontWeight: 600
                    },
                    dataLabels: {
                        enabled: true,
                        formatter: function(val) {
                            return Math.round(val) + '%';
                        },
                        style: {
                            fontSize: '14px',
                            fontWeight: 700,
                            colors: ['#fff']
                        }
                    },
                    tooltip: {
                        theme: 'light',
                        y: {
                            formatter: function(val, { seriesIndex, w }) {
                                return w.globals.labels[seriesIndex] + ': ' + val + ' biens';
                            }
                        }
                    }
                };
                
                const typePieChart = new ApexCharts(document.querySelector("#typePieChart"), typePieOptions);
                typePieChart.render();

                // Bar Chart - Répartition par Prix
                const priceBarOptions = {
                    series: [{
                        name: 'Nombre de biens',
                        data: @json(array_values($tranchesPrix))
                    }],
                    chart: {
                        type: 'bar',
                        height: 350,
                        toolbar: { show: false },
                        fontFamily: 'Inter, sans-serif',
                    },
                    colors: ['#6366f1'],
                    plotOptions: {
                        bar: {
                            borderRadius: 8,
                            horizontal: false,
                            columnWidth: '60%',
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        style: {
                            fontSize: '12px',
                            fontWeight: 700,
                            colors: ['#1f2937']
                        }
                    },
                    xaxis: {
                        categories: @json(array_keys($tranchesPrix)),
                        labels: {
                            style: { colors: '#6b7280', fontSize: '12px' }
                        }
                    },
                    yaxis: {
                        labels: {
                            style: { colors: '#6b7280', fontSize: '12px' }
                        }
                    },
                    grid: {
                        borderColor: '#e5e7eb',
                        strokeDashArray: 4
                    },
                    tooltip: {
                        theme: 'light'
                    }
                };
                
                const priceBarChart = new ApexCharts(document.querySelector("#priceBarChart"), priceBarOptions);
                priceBarChart.render();

                // Bar Chart - Répartition par Surface
                const surfaceBarOptions = {
                    series: [{
                        name: 'Nombre de biens',
                        data: @json(array_values($tranchesSurface))
                    }],
                    chart: {
                        type: 'bar',
                        height: 350,
                        toolbar: { show: false },
                        fontFamily: 'Inter, sans-serif',
                    },
                    colors: ['#10b981'],
                    plotOptions: {
                        bar: {
                            borderRadius: 8,
                            horizontal: false,
                            columnWidth: '60%',
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        style: {
                            fontSize: '12px',
                            fontWeight: 700,
                            colors: ['#1f2937']
                        }
                    },
                    xaxis: {
                        categories: @json(array_keys($tranchesSurface)),
                        labels: {
                            style: { colors: '#6b7280', fontSize: '12px' }
                        }
                    },
                    yaxis: {
                        labels: {
                            style: { colors: '#6b7280', fontSize: '12px' }
                        }
                    },
                    grid: {
                        borderColor: '#e5e7eb',
                        strokeDashArray: 4
                    },
                    tooltip: {
                        theme: 'light'
                    }
                };
                
                const surfaceBarChart = new ApexCharts(document.querySelector("#surfaceBarChart"), surfaceBarOptions);
                surfaceBarChart.render();

                // Horizontal Bar Chart - Top 5 Biens par Revenus
                @if(count($top5Revenue) > 0)
                @php
                    $top5Labels = [];
                    foreach (array_keys($top5Revenue) as $name) {
                        $top5Labels[] = Str::limit($name, 25);
                    }
                @endphp
                const topRevenueOptions = {
                    series: [{
                        name: 'Revenus (€)',
                        data: @json(array_values($top5Revenue))
                    }],
                    chart: {
                        type: 'bar',
                        height: 350,
                        toolbar: { show: false },
                        fontFamily: 'Inter, sans-serif',
                    },
                    colors: ['#f59e0b'],
                    plotOptions: {
                        bar: {
                            borderRadius: 8,
                            horizontal: true,
                            barHeight: '70%',
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        formatter: function(val) {
                            return Math.round(val).toLocaleString('fr-FR') + ' €';
                        },
                        style: {
                            fontSize: '12px',
                            fontWeight: 700,
                            colors: ['#1f2937']
                        }
                    },
                    xaxis: {
                        categories: @json($top5Labels),
                        labels: {
                            style: { colors: '#6b7280', fontSize: '12px' },
                            formatter: function(val) {
                                return val.toLocaleString('fr-FR') + ' €';
                            }
                        }
                    },
                    yaxis: {
                        labels: {
                            style: { colors: '#6b7280', fontSize: '12px' }
                        }
                    },
                    grid: {
                        borderColor: '#e5e7eb',
                        strokeDashArray: 4
                    },
                    tooltip: {
                        theme: 'light',
                        y: {
                            formatter: function(val) {
                                return val.toLocaleString('fr-FR') + ' €';
                            }
                        }
                    }
                };
                
                const topRevenueChart = new ApexCharts(document.querySelector("#topRevenueChart"), topRevenueOptions);
                topRevenueChart.render();
                @endif

                // Bar Chart - Réservations par Bien
                @if(count($reservationsByHouse) > 0)
                @php
                    $reservationsLabels = [];
                    foreach (array_keys($reservationsByHouse) as $name) {
                        $reservationsLabels[] = Str::limit($name, 20);
                    }
                @endphp
                const reservationsOptions = {
                    series: [{
                        name: 'Nombre de réservations',
                        data: @json(array_values($reservationsByHouse))
                    }],
                    chart: {
                        type: 'bar',
                        height: 400,
                        toolbar: { show: false },
                        fontFamily: 'Inter, sans-serif',
                    },
                    colors: ['#ec4899'],
                    plotOptions: {
                        bar: {
                            borderRadius: 8,
                            horizontal: false,
                            columnWidth: '50%',
                            distributed: false,
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        style: {
                            fontSize: '12px',
                            fontWeight: 700,
                            colors: ['#1f2937']
                        }
                    },
                    xaxis: {
                        categories: @json($reservationsLabels),
                        labels: {
                            style: { colors: '#6b7280', fontSize: '11px' },
                            rotate: -45,
                            rotateAlways: false
                        }
                    },
                    yaxis: {
                        labels: {
                            style: { colors: '#6b7280', fontSize: '12px' }
                        }
                    },
                    grid: {
                        borderColor: '#e5e7eb',
                        strokeDashArray: 4
                    },
                    tooltip: {
                        theme: 'light',
                        y: {
                            formatter: function(val) {
                                return val + ' réservation' + (val > 1 ? 's' : '');
                            }
                        }
                    }
                };
                
                const reservationsChart = new ApexCharts(document.querySelector("#reservationsChart"), reservationsOptions);
                reservationsChart.render();
                @endif
            }
        });

        const modal = document.getElementById('addHouseModal');
        const photoInput = document.getElementById('photoInput');
        const previewContainer = document.getElementById('previewContainer');
        let selectedFiles = [];

        // Gestion des options supplémentaires dynamiques
        let optionCounter = 0;

        function addAdditionalOption(name = '', price = '') {
            const container = document.getElementById('additionalOptionsContainer');
            const optionId = `option_${optionCounter++}`;
            
            const optionDiv = document.createElement('div');
            optionDiv.id = optionId;
            optionDiv.className = 'additional-option-item';
            
            optionDiv.innerHTML = `
                <div>
                    <label class="form-label">Nom de l'option</label>
                    <input type="text" name="additional_options[${optionCounter - 1}][name]" class="form-control" placeholder="Ex: Sonna, Climatisation, WiFi Premium" value="${name}" required>
                </div>
                <div>
                    <label class="form-label">Prix (€)</label>
                    <input type="number" name="additional_options[${optionCounter - 1}][price]" class="form-control" placeholder="Ex: 500" value="${price}" min="0" step="any" required style="font-weight: 600;">
                </div>
                <button type="button" onclick="removeAdditionalOption('${optionId}')" style="padding: 10px 14px; background: linear-gradient(135deg, #ef4444, #dc2626); color: white; border: none; border-radius: 10px; cursor: pointer; font-weight: 700; font-size: 14px; transition: var(--transition); box-shadow: 0 2px 8px rgba(239, 68, 68, 0.3); align-self: flex-end;" onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 4px 12px rgba(239, 68, 68, 0.4)'" onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 2px 8px rgba(239, 68, 68, 0.3)'">
                    <i class="fas fa-trash"></i>
                </button>
            `;
            
            container.appendChild(optionDiv);
        }

        function removeAdditionalOption(optionId) {
            const option = document.getElementById(optionId);
            if (option) {
                option.remove();
                // Réorganiser les indices des options restantes
                reorganizeOptions();
            }
        }

        function reorganizeOptions() {
            const container = document.getElementById('additionalOptionsContainer');
            const options = container.querySelectorAll('div[id^="option_"]');
            let index = 0;
            
            options.forEach(option => {
                const nameInput = option.querySelector('input[name*="[name]"]');
                const priceInput = option.querySelector('input[name*="[price]"]');
                
                if (nameInput && priceInput) {
                    nameInput.name = `additional_options[${index}][name]`;
                    priceInput.name = `additional_options[${index}][price]`;
                    index++;
                }
            });
        }

        function openModal() {
            modal.classList.add('show');
            document.body.style.overflow = 'hidden';
            // Réinitialiser les options supplémentaires
            document.getElementById('additionalOptionsContainer').innerHTML = '';
            optionCounter = 0;
        }

        function closeModal() {
            modal.classList.remove('show');
            document.body.style.overflow = 'auto';
        }

        // Preview des photos
        photoInput.addEventListener('change', (e) => {
            const files = Array.from(e.target.files);
            files.forEach(file => {
                if(selectedFiles.length >= 10) return;
                selectedFiles.push(file);
                const reader = new FileReader();
                reader.onload = (event) => {
                    const div = document.createElement('div');
                    div.style.position = 'relative';
                    div.innerHTML = `
                        <img src="${event.target.result}" class="preview-img">
                        <div style="position:absolute; top:8px; right:8px; background:var(--danger); color:white; border-radius:50%; width:28px; height:28px; display:flex; align-items:center; justify-content:center; cursor:pointer; font-size:14px; font-weight:700; box-shadow:0 2px 8px rgba(0,0,0,0.2); transition:var(--transition);" 
                             onmouseover="this.style.transform='scale(1.1)'" 
                             onmouseout="this.style.transform='scale(1)'"
                             onclick="this.parentElement.remove(); selectedFiles = selectedFiles.filter(f => f !== file);">
                            ×
                        </div>
                    `;
                    previewContainer.appendChild(div);
                };
                reader.readAsDataURL(file);
            });
        });

        // Envoi AJAX
        document.getElementById('addHouseForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            const btn = document.getElementById('submitBtn');
            const originalText = btn.innerHTML;
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Chargement...';
            btn.classList.add('loading');

            const formData = new FormData(this);
            
            // Les options supplémentaires sont déjà dans le FormData grâce aux inputs avec name="additional_options[index][name]" et name="additional_options[index][price]"
            // Laravel les traitera automatiquement comme un tableau
            
            try {
                const response = await fetch('{{ route("houses.store") }}', {
                    method: 'POST',
                    headers: { 
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: formData
                });
                
                const result = await response.json();
                
                if (response.ok && result.success) {
                    showNotification("✅ Maison ajoutée avec succès !", "success");
                    setTimeout(() => window.location.reload(), 1500);
                } else {
                    let errorMessage = "❌ Une erreur est survenue.";
                    
                    if (result.message) {
                        errorMessage = "❌ " + result.message;
                    } else if (result.errors) {
                        const errorMessages = [];
                        for (const field in result.errors) {
                            if (result.errors[field]) {
                                errorMessages.push(result.errors[field][0]);
                            }
                        }
                        errorMessage = "❌ " + errorMessages.join(', ');
                    } else if (result.error) {
                        errorMessage = "❌ " + result.error;
                    }
                    
                    showNotification(errorMessage, "error");
                    btn.disabled = false;
                    btn.innerHTML = originalText;
                    btn.classList.remove('loading');
                }
            } catch (err) {
                console.error('Erreur:', err);
                showNotification("❌ Une erreur est survenue lors de l'envoi. Vérifiez votre connexion.", "error");
                btn.disabled = false;
                btn.innerHTML = originalText;
                btn.classList.remove('loading');
            }
        });

        function showNotification(msg, type) {
            const notif = document.createElement('div');
            notif.className = `notification show ${type === 'success' ? 'bg-success' : 'bg-error'}`;
            notif.innerHTML = `
                <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'}"></i>
                <span>${msg}</span>
            `;
            document.body.appendChild(notif);
            setTimeout(() => {
                notif.classList.remove('show');
                setTimeout(() => notif.remove(), 500);
            }, 4000);
        }

        // Fermer modal avec Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && modal.classList.contains('show')) {
                closeModal();
            }
        });

        // Fermer modal en cliquant à l'extérieur
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeModal();
            }
        });
    </script>
</body>
</html>
