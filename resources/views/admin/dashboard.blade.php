<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard Admin - Casa Del Concierge</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- ApexCharts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            important: '.admin-content',
            corePlugins: { preflight: false }
        }
    </script>
    
    <style>
        :root {
            --admin-primary: #8b5cf6;
            --admin-primary-light: #a78bfa;
            --admin-primary-dark: #7c3aed;
            --admin-secondary: #ec4899;
            --admin-accent: #f59e0b;
            --admin-success: #10b981;
            --admin-danger: #ef4444;
            --admin-warning: #f59e0b;
            --admin-info: #3b82f6;
            --admin-bg: #0f172a;
            --admin-surface: #1e293b;
            --admin-glass: rgba(255, 255, 255, 0.05);
            --sidebar-width: 280px;
            --border-radius: 16px;
            --border-radius-lg: 24px;
            --shadow-glow-purple: 0 0 40px rgba(139, 92, 246, 0.3);
            --shadow-glow-pink: 0 0 40px rgba(236, 72, 153, 0.3);
            --transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-fast: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
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
            background: #0f172a;
            background-image: 
                radial-gradient(circle at 20% 30%, rgba(139, 92, 246, 0.2) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(236, 72, 153, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 50% 50%, rgba(245, 158, 11, 0.1) 0%, transparent 50%),
                linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
            background-attachment: fixed;
            color: #ffffff;
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }
        
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%239C92AC' fill-opacity='0.02'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 0;
        }
        
        /* Sidebar Premium Admin */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(30px) saturate(180%);
            -webkit-backdrop-filter: blur(30px) saturate(180%);
            border-right: 1px solid rgba(139, 92, 246, 0.2);
            z-index: 1000;
            overflow-y: auto;
            transition: var(--transition);
            box-shadow: 
                4px 0 40px rgba(0, 0, 0, 0.5),
                inset -1px 0 0 rgba(139, 92, 246, 0.1);
        }
        
        .sidebar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(139, 92, 246, 0.6), transparent);
        }
        
        .sidebar-header {
            padding: 32px 24px;
            border-bottom: 1px solid rgba(139, 92, 246, 0.2);
            display: flex;
            align-items: center;
            gap: 16px;
            position: relative;
        }
        
        .sidebar-logo {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            flex-shrink: 0;
            background: rgba(255, 255, 255, 0.08);
            padding: 4px;
            box-shadow: 0 8px 24px rgba(139, 92, 246, 0.35);
            position: relative;
            text-decoration: none;
        }
        
        .sidebar-logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        
        @keyframes pulse-glow {
            0%, 100% { opacity: 0.5; }
            50% { opacity: 1; }
        }
        
        .sidebar-title {
            font-size: 20px;
            font-weight: 900;
            background: linear-gradient(135deg, #ffffff 0%, #c7d2fe 50%, #a78bfa 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.5px;
        }
        
        .sidebar-menu {
            padding: 24px 0;
        }
        
        .menu-section {
            margin-bottom: 32px;
        }
        
        .menu-label {
            padding: 0 24px 12px;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: rgba(255, 255, 255, 0.4);
            font-weight: 700;
        }
        
        .menu-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 24px;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: var(--transition-fast);
            position: relative;
            cursor: pointer;
            border-left: 3px solid transparent;
            margin-left: 24px;
            margin-right: 24px;
            margin-bottom: 4px;
            border-radius: 12px;
        }
        
        .menu-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 3px;
            height: 0;
            background: linear-gradient(135deg, #8b5cf6, #ec4899);
            border-radius: 0 3px 3px 0;
            transition: var(--transition-fast);
        }
        
        .menu-item:hover {
            background: rgba(139, 92, 246, 0.15);
            color: #ffffff;
            transform: translateX(6px);
            border-left-color: rgba(139, 92, 246, 0.5);
        }
        
        .menu-item:hover::before {
            height: 60%;
        }
        
        .menu-item.active {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.25) 0%, rgba(236, 72, 153, 0.15) 100%);
            color: #ffffff;
            border-left-color: #8b5cf6;
            box-shadow: 
                0 4px 16px rgba(139, 92, 246, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
        }
        
        .menu-item.active::before {
            height: 70%;
            background: linear-gradient(135deg, #8b5cf6, #ec4899);
            box-shadow: 0 0 16px rgba(139, 92, 246, 0.8);
        }
        
        .menu-item i {
            width: 22px;
            text-align: center;
            font-size: 18px;
            transition: var(--transition-fast);
        }
        
        .menu-item.active i {
            transform: scale(1.15);
            filter: drop-shadow(0 0 8px rgba(139, 92, 246, 0.6));
        }
        
        .menu-item span {
            font-size: 14px;
            font-weight: 600;
            flex: 1;
        }
        
        .menu-badge {
            margin-left: auto;
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 700;
            box-shadow: 0 0 12px rgba(239, 68, 68, 0.5);
            animation: pulse-badge 2s ease-in-out infinite;
        }
        
        @keyframes pulse-badge {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        
        .sidebar-footer {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 24px;
            border-top: 1px solid rgba(139, 92, 246, 0.2);
            background: rgba(15, 23, 42, 0.8);
        }
        
        .user-profile {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 16px;
            background: rgba(139, 92, 246, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            border: 1px solid rgba(139, 92, 246, 0.3);
        }
        
        .user-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: linear-gradient(135deg, #8b5cf6, #ec4899);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 900;
            font-size: 18px;
            color: white;
            box-shadow: 0 8px 24px rgba(139, 92, 246, 0.4);
        }
        
        .user-info {
            flex: 1;
        }
        
        .user-name {
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 4px;
            color: #ffffff;
        }
        
        .user-role {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.6);
            font-weight: 500;
        }
        
        /* Main Content */
        .main-wrapper {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            position: relative;
            z-index: 1;
        }
        
        .header {
            height: 80px;
            background: rgba(30, 41, 59, 0.8);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            border-bottom: 1px solid rgba(139, 92, 246, 0.2);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 40px;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.3);
        }
        
        .header-title {
            font-size: 28px;
            font-weight: 900;
            background: linear-gradient(135deg, #ffffff 0%, #c7d2fe 50%, #a78bfa 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -1px;
        }
        
        .header-actions {
            display: flex;
            align-items: center;
            gap: 16px;
        }
        
        .header-btn {
            padding: 12px 24px;
            border-radius: 12px;
            border: none;
            font-weight: 700;
            font-size: 14px;
            cursor: pointer;
            transition: var(--transition-fast);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }
        
        .header-btn.primary {
            background: linear-gradient(135deg, #8b5cf6, #7c3aed);
            color: white;
        }
        
        .header-btn.primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(139, 92, 246, 0.4);
        }
        
        .header-btn.logout {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
        }
        
        .header-btn.logout:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(239, 68, 68, 0.4);
        }
        
        .content {
            padding: 40px;
        }
        
        /* Stats Cards Premium */
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
            border-radius: 24px;
            padding: 32px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 
                0 8px 32px rgba(0, 0, 0, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            animation: scaleIn 0.6s var(--ease-out-expo) both;
        }
        
        .stat-card:nth-child(1) { animation-delay: 0.1s; }
        .stat-card:nth-child(2) { animation-delay: 0.2s; }
        .stat-card:nth-child(3) { animation-delay: 0.3s; }
        .stat-card:nth-child(4) { animation-delay: 0.4s; }
        .stat-card:nth-child(5) { animation-delay: 0.5s; }
        .stat-card:nth-child(6) { animation-delay: 0.6s; }
        
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
        
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #8b5cf6, #ec4899);
            transform: scaleX(0);
            transform-origin: left;
            transition: var(--transition);
            box-shadow: 0 0 20px rgba(139, 92, 246, 0.6);
        }
        
        .stat-card:hover {
            transform: translateY(-8px) scale(1.02);
            border-color: rgba(139, 92, 246, 0.4);
            box-shadow: 
                0 20px 60px rgba(0, 0, 0, 0.4),
                0 0 0 1px rgba(139, 92, 246, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.15),
                0 0 80px rgba(139, 92, 246, 0.2);
        }
        
        .stat-card:hover::before {
            transform: scaleX(1);
        }
        
        .stat-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        
        .stat-icon {
            width: 64px;
            height: 64px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            position: relative;
            transition: var(--transition);
        }
        
        .stat-icon.primary {
            background: rgba(139, 92, 246, 0.2);
            color: #a78bfa;
            border: 1px solid rgba(139, 92, 246, 0.3);
        }
        
        .stat-icon.success {
            background: rgba(16, 185, 129, 0.2);
            color: #34d399;
            border: 1px solid rgba(16, 185, 129, 0.3);
        }
        
        .stat-icon.warning {
            background: rgba(245, 158, 11, 0.2);
            color: #fbbf24;
            border: 1px solid rgba(245, 158, 11, 0.3);
        }
        
        .stat-icon.danger {
            background: rgba(239, 68, 68, 0.2);
            color: #f87171;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }
        
        .stat-icon.info {
            background: rgba(59, 130, 246, 0.2);
            color: #60a5fa;
            border: 1px solid rgba(59, 130, 246, 0.3);
        }
        
        .stat-card:hover .stat-icon {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 8px 24px rgba(139, 92, 246, 0.4);
        }
        
        .stat-value {
            font-size: 36px;
            font-weight: 900;
            background: linear-gradient(135deg, #ffffff 0%, #c7d2fe 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 8px;
            letter-spacing: -1px;
            line-height: 1.1;
        }
        
        .stat-label {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.6);
            font-weight: 600;
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .stat-change {
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 6px;
            font-weight: 700;
            padding: 6px 12px;
            border-radius: 20px;
            width: fit-content;
        }
        
        .stat-change.positive {
            background: rgba(16, 185, 129, 0.2);
            color: #34d399;
            border: 1px solid rgba(16, 185, 129, 0.3);
        }
        
        .stat-change.negative {
            background: rgba(239, 68, 68, 0.2);
            color: #f87171;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }
        
        .stat-value.positive {
            color: #34d399;
        }
        
        .stat-value.negative {
            color: #f87171;
        }
        
        /* Charts Grid */
        .charts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(500px, 1fr));
            gap: 24px;
            margin-bottom: 40px;
        }
        
        .chart-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            border-radius: 24px;
            padding: 32px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 
                0 8px 32px rgba(0, 0, 0, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
        }
        
        .chart-title {
            font-size: 20px;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 24px;
            padding-bottom: 16px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            letter-spacing: -0.5px;
        }
        
        /* Tables Premium */
        /* Content Sections */
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
        
        .table-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            border-radius: 24px;
            padding: 32px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 
                0 8px 32px rgba(0, 0, 0, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            margin-bottom: 32px;
        }
        
        .section-title {
            font-size: 36px;
            font-weight: 900;
            background: linear-gradient(135deg, #ffffff 0%, #c7d2fe 50%, #a78bfa 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 32px;
            padding-bottom: 20px;
            border-bottom: 2px solid rgba(139, 92, 246, 0.3);
            letter-spacing: -1px;
            position: relative;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100px;
            height: 3px;
            background: linear-gradient(90deg, #8b5cf6, #ec4899);
            border-radius: 2px;
            box-shadow: 0 0 12px rgba(139, 92, 246, 0.6);
        }
        
        .table-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
            flex-wrap: wrap;
            gap: 16px;
        }
        
        .table-title {
            font-size: 20px;
            font-weight: 800;
            color: #ffffff;
            letter-spacing: -0.5px;
        }
        
        .table-search {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .search-input {
            padding: 12px 20px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            color: #ffffff;
            font-size: 14px;
            width: 300px;
            transition: var(--transition-fast);
        }
        
        .search-input:focus {
            outline: none;
            border-color: rgba(139, 92, 246, 0.5);
            background: rgba(255, 255, 255, 0.08);
            box-shadow: 0 0 0 4px rgba(139, 92, 246, 0.1);
        }
        
        .search-input::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        thead {
            background: rgba(139, 92, 246, 0.1);
        }
        
        th {
            padding: 16px;
            text-align: left;
            font-size: 12px;
            font-weight: 700;
            color: rgba(255, 255, 255, 0.8);
            text-transform: uppercase;
            letter-spacing: 1px;
            border-bottom: 2px solid rgba(139, 92, 246, 0.3);
        }
        
        td {
            padding: 20px 16px;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            font-size: 14px;
            color: rgba(255, 255, 255, 0.9);
        }
        
        tr {
            transition: var(--transition-fast);
        }
        
        tbody tr:hover {
            background: rgba(139, 92, 246, 0.1);
            transform: scale(1.01);
        }
        
        .badge {
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        
        .badge-success {
            background: rgba(16, 185, 129, 0.2);
            color: #34d399;
            border: 1px solid rgba(16, 185, 129, 0.3);
        }
        
        .badge-warning {
            background: rgba(245, 158, 11, 0.2);
            color: #fbbf24;
            border: 1px solid rgba(245, 158, 11, 0.3);
        }
        
        .badge-danger {
            background: rgba(239, 68, 68, 0.2);
            color: #f87171;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }
        
        .badge-info {
            background: rgba(59, 130, 246, 0.2);
            color: #60a5fa;
            border: 1px solid rgba(59, 130, 246, 0.3);
        }
        
        .badge-primary {
            background: rgba(139, 92, 246, 0.2);
            color: #a78bfa;
            border: 1px solid rgba(139, 92, 246, 0.3);
        }
        
        .btn {
            padding: 10px 20px;
            border-radius: 10px;
            border: none;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: var(--transition-fast);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-accept {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }
        
        .btn-accept:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(16, 185, 129, 0.4);
        }
        
        .btn-reject {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
        }
        
        .btn-reject:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(239, 68, 68, 0.4);
        }
        
        /* Notifications */
        .notification {
            position: fixed;
            top: 32px;
            right: 32px;
            padding: 20px 28px;
            border-radius: 16px;
            color: white;
            font-weight: 600;
            z-index: 10000;
            transform: translateX(150%);
            transition: 0.5s var(--ease-spring);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 320px;
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .notification.show {
            transform: translateX(0);
        }
        
        .notification.success {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.9), rgba(5, 150, 105, 0.9));
        }
        
        .notification.error {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.9), rgba(220, 38, 38, 0.9));
        }
        
        .notification.warning {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.9), rgba(217, 119, 6, 0.9));
        }
        
        /* Mobile Menu */
        .mobile-menu-toggle {
            display: none;
            background: transparent;
            border: none;
            font-size: 24px;
            color: #ffffff;
            cursor: pointer;
            padding: 8px;
            border-radius: 8px;
            transition: var(--transition-fast);
        }
        
        .mobile-menu-toggle:hover {
            background: rgba(255, 255, 255, 0.1);
        }
        
        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }
        
        ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }
        
        ::-webkit-scrollbar-thumb {
            background: rgba(139, 92, 246, 0.5);
            border-radius: 5px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: rgba(139, 92, 246, 0.7);
        }
        
        /* Responsive */
        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.open {
                transform: translateX(0);
            }
            
            .main-wrapper {
                margin-left: 0;
            }
            
            .mobile-menu-toggle {
                display: block;
            }
            
            .charts-grid {
                grid-template-columns: 1fr;
            }
            
            .content {
                padding: 24px;
            }
        }
        
        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .table-search {
                width: 100%;
            }
            
            .search-input {
                width: 100%;
            }
            
            table {
                font-size: 12px;
            }
            
            th, td {
                padding: 12px 8px;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <a href="{{ url('/') }}" class="sidebar-logo" title="Casa Del Concierge — Accueil">
                <img src="{{ asset('images/logo.png') }}" alt="Casa Del Concierge">
            </a>
            <div class="sidebar-title">Admin Panel</div>
        </div>
        
        <nav class="sidebar-menu">
            <div class="menu-section">
                <div class="menu-label">Principal</div>
                <a href="#dashboard" class="menu-item active" data-section="dashboard">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
                <a href="#demandes" class="menu-item" data-section="demandes">
                    <i class="fas fa-file-alt"></i>
                    <span>Demandes</span>
                    @if($pendingDemandes > 0)
                        <span class="menu-badge">{{ $pendingDemandes }}</span>
                    @endif
                </a>
            </div>
            
            <div class="menu-section">
                <div class="menu-label">Gestion</div>
                <a href="#users" class="menu-item" data-section="users">
                    <i class="fas fa-users"></i>
                    <span>Utilisateurs</span>
                </a>
                <a href="#houses" class="menu-item" data-section="houses">
                    <i class="fas fa-building"></i>
                    <span>Biens</span>
                </a>
                <a href="#reservations" class="menu-item" data-section="reservations">
                    <i class="fas fa-calendar-check"></i>
                    <span>Réservations</span>
                </a>
            </div>
            
            <div class="menu-section">
                <div class="menu-label">Analyses</div>
                <a href="#stats" class="menu-item" data-section="stats">
                    <i class="fas fa-chart-bar"></i>
                    <span>Statistiques</span>
                </a>
            </div>
        </nav>
        
        <div class="sidebar-footer">
            <div class="user-profile">
                <div class="user-avatar">
                    {{ strtoupper(substr(Auth::user()->first_name, 0, 1) . substr(Auth::user()->last_name, 0, 1)) }}
                </div>
                <div class="user-info">
                    <div class="user-name">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</div>
                    <div class="user-role">Administrateur</div>
                </div>
            </div>
            <form action="{{ route('admin.logout') }}" method="POST" style="margin-top: 16px;">
                @csrf
                <button type="submit" class="menu-item" style="width: 100%; margin: 0; border-left: none; color: rgba(239, 68, 68, 0.8);">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Déconnexion</span>
                </button>
            </form>
        </div>
    </aside>
    
    <!-- Main Content -->
    <div class="main-wrapper admin-content">
        <!-- Header -->
        <header class="header">
            <div style="display: flex; align-items: center; gap: 20px;">
                <button class="mobile-menu-toggle" id="mobileMenuToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <h1 class="header-title">Dashboard Administrateur</h1>
            </div>
            <div class="header-actions">
                <a href="{{ route('welcome') }}" class="header-btn primary" target="_blank">
                    <i class="fas fa-external-link-alt"></i>
                    Voir le site
                </a>
            </div>
        </header>
        
        <!-- Content -->
        <div class="content">
            <!-- Section Dashboard -->
            <div id="section-dashboard" class="content-section active">
            <!-- KPIs Premium Grid -->
            <div class="stats-grid">
                <!-- KPI 1: Total Utilisateurs -->
                <div class="stat-card">
                    <div class="stat-header">
                        <div style="flex: 1;">
                            <div class="stat-value">{{ $totalUsers }}</div>
                            <div class="stat-label">Utilisateurs Total</div>
                            <div class="stat-change positive">
                                <i class="fas fa-arrow-up"></i>
                                <span>+{{ $newUsersThisMonth }} ce mois</span>
                            </div>
                        </div>
                        <div class="stat-icon primary">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
                
                <!-- KPI 2: Total Biens -->
                <div class="stat-card">
                    <div class="stat-header">
                        <div style="flex: 1;">
                            <div class="stat-value">{{ $totalHouses }}</div>
                            <div class="stat-label">Biens Disponibles</div>
                            <div class="stat-change positive">
                                <i class="fas fa-arrow-up"></i>
                                <span>+{{ $housesThisMonth }} ce mois</span>
                            </div>
                        </div>
                        <div class="stat-icon success">
                            <i class="fas fa-building"></i>
                        </div>
                    </div>
                </div>
                
                <!-- KPI 3: Total Réservations -->
                <div class="stat-card">
                    <div class="stat-header">
                        <div style="flex: 1;">
                            <div class="stat-value">{{ $totalReservations }}</div>
                            <div class="stat-label">Réservations Total</div>
                            <div class="stat-change positive">
                                <i class="fas fa-arrow-up"></i>
                                <span>+{{ $reservationsThisMonth }} ce mois</span>
                            </div>
                        </div>
                        <div class="stat-icon info">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                    </div>
                </div>
                
                <!-- KPI 4: Revenus Total -->
                <div class="stat-card">
                    <div class="stat-header">
                        <div style="flex: 1;">
                            <div class="stat-value">{{ number_format($totalRevenue, 0, ',', ' ') }} €</div>
                            <div class="stat-label">Revenus Total</div>
                            <div class="stat-change positive">
                                <i class="fas fa-arrow-up"></i>
                                <span>{{ number_format($currentMonthRevenue, 0, ',', ' ') }} € ce mois</span>
                            </div>
                        </div>
                        <div class="stat-icon warning">
                            <i class="fas fa-euro-sign"></i>
                        </div>
                    </div>
                </div>
                
                <!-- KPI 5: Réservations en attente -->
                <div class="stat-card">
                    <div class="stat-header">
                        <div style="flex: 1;">
                            <div class="stat-value">{{ $pendingReservations }}</div>
                            <div class="stat-label">Réservations en attente</div>
                        </div>
                        <div class="stat-icon warning">
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                </div>
                
                <!-- KPI 6: Demandes en attente -->
                <div class="stat-card">
                    <div class="stat-header">
                        <div style="flex: 1;">
                            <div class="stat-value">{{ $pendingDemandes }}</div>
                            <div class="stat-label">Demandes en attente</div>
                        </div>
                        <div class="stat-icon danger">
                            <i class="fas fa-file-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Charts Grid -->
            <div class="charts-grid">
                <div class="chart-card">
                    <h3 class="chart-title">Évolution des Réservations</h3>
                    <div id="reservationsChart" style="min-height: 350px;"></div>
                </div>
                
                <div class="chart-card">
                    <h3 class="chart-title">Nouveaux Utilisateurs</h3>
                    <div id="usersChart" style="min-height: 350px;"></div>
                </div>
                
                <div class="chart-card">
                    <h3 class="chart-title">Répartition par Type</h3>
                    <div id="housesTypeChart" style="min-height: 350px;"></div>
                </div>
                
                <div class="chart-card">
                    <h3 class="chart-title">Statut des Réservations</h3>
                    <div id="reservationsStatusChart" style="min-height: 350px;"></div>
                </div>
            </div>
            
            <!-- Revenue Chart -->
            <div class="chart-card" style="margin-bottom: 40px;">
                <h3 class="chart-title">Revenus par Mois</h3>
                <div id="revenueChart" style="min-height: 400px;"></div>
            </div>
            </div>
            
            <!-- Section Demandes -->
            <div id="section-demandes" class="content-section">
                <h2 class="section-title">
                    <i class="fas fa-file-alt" style="margin-right: 12px;"></i>
                    Demandes de Location
                </h2>
                <div class="table-card">
                    <div class="table-header">
                        <h3 class="table-title">Demandes en attente ({{ $pendingDemandes }})</h3>
                        <div class="table-search">
                            <input type="text" id="searchDemandes" class="search-input" placeholder="Rechercher une demande...">
                        </div>
                    </div>
                
                @if($demandes->count() > 0)
                    <div style="overflow-x: auto;">
                        <table id="demandesTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom complet</th>
                                    <th>Email</th>
                                    <th>Date de naissance</th>
                                    <th>Biens</th>
                                    <th>Soumis le</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($demandes as $demande)
                                    <tr data-search="{{ strtolower($demande->first_name . ' ' . $demande->last_name . ' ' . $demande->email) }}">
                                        <td><strong>#{{ $demande->id }}</strong></td>
                                        <td><strong style="color: #ffffff;">{{ $demande->first_name }} {{ $demande->last_name }}</strong></td>
                                        <td style="color: rgba(255, 255, 255, 0.8);">{{ $demande->email }}</td>
                                        <td>{{ \Carbon\Carbon::parse($demande->birth_date)->format('d/m/Y') }}</td>
                                        <td style="max-width: 300px; white-space: pre-wrap; font-size: 13px; color: rgba(255, 255, 255, 0.7);">{{ $demande->biens_list }}</td>
                                        <td style="color: rgba(255, 255, 255, 0.7);">{{ $demande->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('admin.demandes.accept', $demande->id) }}" style="display:inline;" class="accept-form">
                                                @csrf
                                                <button type="submit" class="btn btn-accept">
                                                    <i class="fas fa-check"></i> Accepter
                                                </button>
                                            </form>
                                            <form method="POST" action="{{ route('admin.demandes.reject', $demande->id) }}" style="display:inline; margin-left: 8px;" class="reject-form">
                                                @csrf
                                                <button type="submit" class="btn btn-reject" onclick="return confirm('Êtes-vous sûr de vouloir rejeter cette demande ?')">
                                                    <i class="fas fa-times"></i> Refuser
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div style="text-align: center; padding: 60px; color: rgba(255, 255, 255, 0.6);">
                        <i class="fas fa-inbox" style="font-size: 64px; margin-bottom: 16px; opacity: 0.5;"></i>
                        <p style="font-size: 18px; font-weight: 600;">Aucune demande en attente</p>
                    </div>
                @endif
                </div>
            </div>
            
            <!-- Section Utilisateurs -->
            <div id="section-users" class="content-section">
                <h2 class="section-title">
                    <i class="fas fa-users" style="margin-right: 12px;"></i>
                    Gestion des Utilisateurs
                </h2>
                <div class="table-card">
                    <div class="table-header">
                        <h3 class="table-title">Tous les utilisateurs ({{ $allUsers->count() }})</h3>
                        <div class="table-search">
                            <input type="text" id="searchUsers" class="search-input" placeholder="Rechercher un utilisateur...">
                            <select id="filterUsersRole" class="search-input" style="width: 200px;">
                                <option value="">Tous les rôles</option>
                                <option value="admin">Admin</option>
                                <option value="locataire">Locataire</option>
                            </select>
                        </div>
                    </div>
                @if($allUsers->count() > 0)
                    <div style="overflow-x: auto;">
                        <table id="usersTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom complet</th>
                                    <th>Email</th>
                                    <th>Rôle</th>
                                    <th>Biens</th>
                                    <th>Réservations</th>
                                    <th>Inscrit le</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allUsers as $user)
                                    <tr data-search="{{ strtolower($user->first_name . ' ' . $user->last_name . ' ' . $user->email) }}" data-role="{{ $user->role }}">
                                        <td><strong>#{{ $user->id }}</strong></td>
                                        <td><strong style="color: #ffffff;">{{ $user->first_name }} {{ $user->last_name }}</strong></td>
                                        <td style="color: rgba(255, 255, 255, 0.8);">{{ $user->email }}</td>
                                        <td>
                                            @if($user->role === 'admin')
                                                <span class="badge badge-danger">Admin</span>
                                            @elseif($user->role === 'locataire')
                                                <span class="badge badge-success">Locataire</span>
                                            @else
                                                <span class="badge badge-info">{{ ucfirst($user->role) }}</span>
                                            @endif
                                        </td>
                                        <td style="color: rgba(255, 255, 255, 0.9); font-weight: 600;">{{ $user->houses_count }}</td>
                                        <td style="color: rgba(255, 255, 255, 0.9); font-weight: 600;">{{ $user->reservations_count }}</td>
                                        <td style="color: rgba(255, 255, 255, 0.7);">{{ $user->created_at->format('d/m/Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div style="text-align: center; padding: 60px; color: rgba(255, 255, 255, 0.6);">
                        <i class="fas fa-users" style="font-size: 64px; margin-bottom: 16px; opacity: 0.5;"></i>
                        <p style="font-size: 18px; font-weight: 600;">Aucun utilisateur</p>
                    </div>
                @endif
                </div>
            </div>
            
            <!-- Section Biens -->
            <div id="section-houses" class="content-section">
                <h2 class="section-title">
                    <i class="fas fa-building" style="margin-right: 12px;"></i>
                    Gestion des Biens
                </h2>
                <div class="table-card">
                    <div class="table-header">
                        <h3 class="table-title">Tous les biens ({{ $allHouses->count() }})</h3>
                        <div class="table-search">
                            <input type="text" id="searchHouses" class="search-input" placeholder="Rechercher un bien...">
                            <select id="filterHousesType" class="search-input" style="width: 200px;">
                                <option value="">Tous les types</option>
                                @foreach(array_keys($housesByType) as $type)
                                    <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @if($allHouses->count() > 0)
                    <div style="overflow-x: auto;">
                        <table id="housesTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Description</th>
                                    <th>Lieu</th>
                                    <th>Type</th>
                                    <th>Surface</th>
                                    <th>Prix/nuit</th>
                                    <th>Propriétaire</th>
                                    <th>Réservations</th>
                                    <th>Note</th>
                                    <th>Ajouté le</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allHouses as $house)
                                    <tr data-search="{{ strtolower($house->description . ' ' . $house->lieu_exact) }}" data-type="{{ $house->type }}">
                                        <td><strong>#{{ $house->id }}</strong></td>
                                        <td style="max-width: 200px; color: #ffffff; font-weight: 600;">{{ \Illuminate\Support\Str::limit($house->description, 40) }}</td>
                                        <td style="color: rgba(255, 255, 255, 0.8);">{{ \Illuminate\Support\Str::limit($house->lieu_exact, 25) }}</td>
                                        <td><span class="badge badge-info">{{ ucfirst($house->type) }}</span></td>
                                        <td style="color: rgba(255, 255, 255, 0.9); font-weight: 600;">{{ $house->surface }} m²</td>
                                        <td><strong style="background: linear-gradient(135deg, #a78bfa, #8b5cf6); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">{{ number_format($house->prix, 0, ',', ' ') }} €</strong></td>
                                        <td style="color: rgba(255, 255, 255, 0.8);">{{ $house->user->first_name ?? 'N/A' }} {{ $house->user->last_name ?? '' }}</td>
                                        <td style="color: rgba(255, 255, 255, 0.9); font-weight: 600;">{{ $house->reservations_count }}</td>
                                        <td>
                                            @if($house->rate)
                                                <span style="color: #fbbf24; font-weight: 700;">
                                                    <i class="fas fa-star"></i> {{ $house->rate }}
                                                </span>
                                            @else
                                                <span style="color: rgba(255, 255, 255, 0.4);">-</span>
                                            @endif
                                        </td>
                                        <td style="color: rgba(255, 255, 255, 0.7);">{{ $house->created_at->format('d/m/Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div style="text-align: center; padding: 60px; color: rgba(255, 255, 255, 0.6);">
                        <i class="fas fa-building" style="font-size: 64px; margin-bottom: 16px; opacity: 0.5;"></i>
                        <p style="font-size: 18px; font-weight: 600;">Aucun bien</p>
                    </div>
                @endif
                </div>
            </div>
            
            <!-- Section Réservations -->
            <div id="section-reservations" class="content-section">
                <h2 class="section-title">
                    <i class="fas fa-calendar-check" style="margin-right: 12px;"></i>
                    Gestion des Réservations
                </h2>
                
                <!-- Guide d'explication -->
                <div style="background: rgba(139, 92, 246, 0.1); backdrop-filter: blur(20px); border-radius: 24px; padding: 32px; margin-bottom: 32px; border: 1px solid rgba(139, 92, 246, 0.3); box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);">
                    <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 24px;">
                        <div style="width: 56px; height: 56px; background: linear-gradient(135deg, #8b5cf6, #ec4899); border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 24px; color: white; box-shadow: 0 8px 24px rgba(139, 92, 246, 0.4);">
                            <i class="fas fa-info-circle"></i>
                        </div>
                        <div>
                            <h3 style="font-size: 24px; font-weight: 900; color: #ffffff; margin-bottom: 4px; letter-spacing: -0.5px;">Guide des Statuts et Paiements</h3>
                            <p style="color: rgba(255, 255, 255, 0.7); font-size: 14px;">Comprendre le fonctionnement des réservations</p>
                        </div>
                    </div>
                    
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 24px;">
                        <!-- Explication Statut -->
                        <div style="background: rgba(255, 255, 255, 0.05); border-radius: 16px; padding: 24px; border: 1px solid rgba(255, 255, 255, 0.1);">
                            <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px;">
                                <div style="width: 40px; height: 40px; background: rgba(139, 92, 246, 0.2); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #a78bfa; font-size: 20px;">
                                    <i class="fas fa-tags"></i>
                                </div>
                                <h4 style="font-size: 18px; font-weight: 800; color: #ffffff;">Statut de la Réservation</h4>
                            </div>
                            <p style="color: rgba(255, 255, 255, 0.7); font-size: 14px; line-height: 1.6; margin-bottom: 20px;">
                                Le <strong style="color: #ffffff;">statut</strong> indique l'état général de la réservation dans le processus de location.
                            </p>
                            <div style="display: flex; flex-direction: column; gap: 12px;">
                                <div style="display: flex; align-items: start; gap: 12px; padding: 12px; background: rgba(245, 158, 11, 0.1); border-radius: 12px; border-left: 3px solid #fbbf24;">
                                    <span class="badge badge-warning" style="flex-shrink: 0;">En attente</span>
                                    <div>
                                        <strong style="color: #ffffff; font-size: 13px;">Pending</strong>
                                        <p style="color: rgba(255, 255, 255, 0.6); font-size: 12px; margin-top: 4px; line-height: 1.5;">
                                            La réservation a été créée mais n'est pas encore confirmée. L'utilisateur peut encore modifier ou annuler.
                                        </p>
                                    </div>
                                </div>
                                <div style="display: flex; align-items: start; gap: 12px; padding: 12px; background: rgba(16, 185, 129, 0.1); border-radius: 12px; border-left: 3px solid #34d399;">
                                    <span class="badge badge-success" style="flex-shrink: 0;">Confirmée</span>
                                    <div>
                                        <strong style="color: #ffffff; font-size: 13px;">Confirmed</strong>
                                        <p style="color: rgba(255, 255, 255, 0.6); font-size: 12px; margin-top: 4px; line-height: 1.5;">
                                            La réservation est confirmée et le bien est réservé pour les dates indiquées. Le locataire peut accéder au bien.
                                        </p>
                                    </div>
                                </div>
                                <div style="display: flex; align-items: start; gap: 12px; padding: 12px; background: rgba(239, 68, 68, 0.1); border-radius: 12px; border-left: 3px solid #f87171;">
                                    <span class="badge badge-danger" style="flex-shrink: 0;">Annulée</span>
                                    <div>
                                        <strong style="color: #ffffff; font-size: 13px;">Cancelled</strong>
                                        <p style="color: rgba(255, 255, 255, 0.6); font-size: 12px; margin-top: 4px; line-height: 1.5;">
                                            La réservation a été annulée. Le bien redevient disponible pour ces dates.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Explication Paiement -->
                        <div style="background: rgba(255, 255, 255, 0.05); border-radius: 16px; padding: 24px; border: 1px solid rgba(255, 255, 255, 0.1);">
                            <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px;">
                                <div style="width: 40px; height: 40px; background: rgba(16, 185, 129, 0.2); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #34d399; font-size: 20px;">
                                    <i class="fas fa-credit-card"></i>
                                </div>
                                <h4 style="font-size: 18px; font-weight: 800; color: #ffffff;">Statut du Paiement</h4>
                            </div>
                            <p style="color: rgba(255, 255, 255, 0.7); font-size: 14px; line-height: 1.6; margin-bottom: 20px;">
                                Le <strong style="color: #ffffff;">statut de paiement</strong> indique si le paiement a été effectué pour cette réservation.
                            </p>
                            <div style="display: flex; flex-direction: column; gap: 12px;">
                                <div style="display: flex; align-items: start; gap: 12px; padding: 12px; background: rgba(245, 158, 11, 0.1); border-radius: 12px; border-left: 3px solid #fbbf24;">
                                    <span class="badge badge-warning" style="flex-shrink: 0;">En attente</span>
                                    <div>
                                        <strong style="color: #ffffff; font-size: 13px;">Pending</strong>
                                        <p style="color: rgba(255, 255, 255, 0.6); font-size: 12px; margin-top: 4px; line-height: 1.5;">
                                            Le paiement n'a pas encore été effectué. L'utilisateur doit finaliser le paiement pour confirmer sa réservation.
                                        </p>
                                    </div>
                                </div>
                                <div style="display: flex; align-items: start; gap: 12px; padding: 12px; background: rgba(16, 185, 129, 0.1); border-radius: 12px; border-left: 3px solid #34d399;">
                                    <span class="badge badge-success" style="flex-shrink: 0;">Payé</span>
                                    <div>
                                        <strong style="color: #ffffff; font-size: 13px;">Paid</strong>
                                        <p style="color: rgba(255, 255, 255, 0.6); font-size: 12px; margin-top: 4px; line-height: 1.5;">
                                            Le paiement a été effectué avec succès via Stripe. La réservation peut être confirmée.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Comment ça marche -->
                        <div style="background: linear-gradient(135deg, rgba(139, 92, 246, 0.2), rgba(236, 72, 153, 0.1)); border-radius: 16px; padding: 24px; border: 1px solid rgba(139, 92, 246, 0.3);">
                            <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px;">
                                <div style="width: 40px; height: 40px; background: rgba(139, 92, 246, 0.3); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #a78bfa; font-size: 20px;">
                                    <i class="fas fa-sync-alt"></i>
                                </div>
                                <h4 style="font-size: 18px; font-weight: 800; color: #ffffff;">Comment ça fonctionne ?</h4>
                            </div>
                            <div style="display: flex; flex-direction: column; gap: 16px;">
                                <div style="display: flex; gap: 12px;">
                                    <div style="width: 32px; height: 32px; background: linear-gradient(135deg, #8b5cf6, #ec4899); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 900; font-size: 14px; flex-shrink: 0;">1</div>
                                    <div>
                                        <strong style="color: #ffffff; font-size: 14px;">Création de la réservation</strong>
                                        <p style="color: rgba(255, 255, 255, 0.6); font-size: 12px; margin-top: 4px; line-height: 1.5;">
                                            L'utilisateur crée une réservation → <strong>Statut: Pending</strong> | <strong>Paiement: Pending</strong>
                                        </p>
                                    </div>
                                </div>
                                <div style="display: flex; gap: 12px;">
                                    <div style="width: 32px; height: 32px; background: linear-gradient(135deg, #8b5cf6, #ec4899); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 900; font-size: 14px; flex-shrink: 0;">2</div>
                                    <div>
                                        <strong style="color: #ffffff; font-size: 14px;">Paiement effectué</strong>
                                        <p style="color: rgba(255, 255, 255, 0.6); font-size: 12px; margin-top: 4px; line-height: 1.5;">
                                            L'utilisateur paie via Stripe → <strong>Paiement: Paid</strong> | <strong>Statut: Pending</strong> (en attente de confirmation)
                                        </p>
                                    </div>
                                </div>
                                <div style="display: flex; gap: 12px;">
                                    <div style="width: 32px; height: 32px; background: linear-gradient(135deg, #8b5cf6, #ec4899); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 900; font-size: 14px; flex-shrink: 0;">3</div>
                                    <div>
                                        <strong style="color: #ffffff; font-size: 14px;">Confirmation automatique</strong>
                                        <p style="color: rgba(255, 255, 255, 0.6); font-size: 12px; margin-top: 4px; line-height: 1.5;">
                                            Après paiement réussi → <strong>Statut: Confirmed</strong> | <strong>Paiement: Paid</strong>
                                        </p>
                                    </div>
                                </div>
                                <div style="margin-top: 8px; padding: 12px; background: rgba(255, 255, 255, 0.05); border-radius: 12px; border-left: 3px solid #fbbf24;">
                                    <p style="color: rgba(255, 255, 255, 0.8); font-size: 12px; line-height: 1.6;">
                                        <i class="fas fa-info-circle" style="color: #fbbf24; margin-right: 6px;"></i>
                                        <strong>Note :</strong> Une réservation peut être annulée à tout moment. Si elle est annulée avant le paiement, le statut passe à "Cancelled" et le paiement reste "Pending".
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="table-card">
                    <div class="table-header">
                        <h3 class="table-title">Toutes les réservations ({{ $allReservations->count() }})</h3>
                        <div class="table-search">
                            <input type="text" id="searchReservations" class="search-input" placeholder="Rechercher une réservation...">
                            <select id="filterReservationsStatus" class="search-input" style="width: 200px;">
                                <option value="">Tous les statuts</option>
                                <option value="confirmed">Confirmées</option>
                                <option value="pending">En attente</option>
                                <option value="cancelled">Annulées</option>
                            </select>
                        </div>
                    </div>
                @if($allReservations->count() > 0)
                    <div style="overflow-x: auto;">
                        <table id="reservationsTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Utilisateur</th>
                                    <th>Bien</th>
                                    <th>Date début</th>
                                    <th>Date fin</th>
                                    <th>Statut</th>
                                    <th>Paiement</th>
                                    <th>Créée le</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allReservations as $reservation)
                                    <tr data-search="{{ strtolower(($reservation->user->first_name ?? '') . ' ' . ($reservation->user->last_name ?? '') . ' ' . ($reservation->house->description ?? '')) }}" data-status="{{ $reservation->status }}">
                                        <td><strong>#{{ $reservation->id }}</strong></td>
                                        <td>
                                            <strong style="color: #ffffff;">{{ $reservation->user->first_name ?? 'N/A' }} {{ $reservation->user->last_name ?? '' }}</strong><br>
                                            <small style="color: rgba(255, 255, 255, 0.5); font-size: 12px;">{{ $reservation->user->email ?? '' }}</small>
                                        </td>
                                        <td style="color: rgba(255, 255, 255, 0.9); font-weight: 500;">{{ \Illuminate\Support\Str::limit($reservation->house->description ?? 'N/A', 30) }}</td>
                                        <td style="color: rgba(255, 255, 255, 0.8);">{{ \Carbon\Carbon::parse($reservation->start_date)->format('d/m/Y') }}</td>
                                        <td style="color: rgba(255, 255, 255, 0.8);">{{ \Carbon\Carbon::parse($reservation->end_date)->format('d/m/Y') }}</td>
                                        <td>
                                            @if($reservation->status === 'confirmed')
                                                <span class="badge badge-success">Confirmée</span>
                                            @elseif($reservation->status === 'pending')
                                                <span class="badge badge-warning">En attente</span>
                                            @elseif($reservation->status === 'cancelled')
                                                <span class="badge badge-danger">Annulée</span>
                                            @else
                                                <span class="badge badge-info">{{ ucfirst($reservation->status) }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($reservation->payment_status === 'paid')
                                                <span class="badge badge-success">Payé</span>
                                            @elseif($reservation->payment_status === 'pending')
                                                <span class="badge badge-warning">En attente</span>
                                            @else
                                                <span class="badge badge-info">{{ $reservation->payment_status ?? 'N/A' }}</span>
                                            @endif
                                        </td>
                                        <td style="color: rgba(255, 255, 255, 0.7);">{{ $reservation->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div style="text-align: center; padding: 60px; color: rgba(255, 255, 255, 0.6);">
                        <i class="fas fa-calendar-times" style="font-size: 64px; margin-bottom: 16px; opacity: 0.5;"></i>
                        <p style="font-size: 18px; font-weight: 600;">Aucune réservation</p>
                    </div>
                @endif
                </div>
            </div>
            
            <!-- Section Statistiques -->
            <div id="section-stats" class="content-section">
                <h2 class="section-title">
                    <i class="fas fa-chart-bar" style="margin-right: 12px;"></i>
                    Analyses Détaillées & Statistiques
                </h2>
                
                <!-- Graphiques Principaux -->
                <div class="charts-grid" style="margin-bottom: 40px;">
                    <!-- Graphique Revenus par Mois -->
                    <div class="chart-card">
                        <h3 class="chart-title">
                            <i class="fas fa-euro-sign" style="margin-right: 8px; color: var(--admin-success);"></i>
                            Évolution des Revenus (6 derniers mois)
                        </h3>
                        <div id="revenueStatsChart" style="min-height: 350px;"></div>
                        <div style="padding: 16px; background: rgba(139, 92, 246, 0.1); border-radius: 12px; margin-top: 16px;">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <div>
                                    <div style="font-size: 12px; color: rgba(255, 255, 255, 0.6); margin-bottom: 4px;">Revenu Total</div>
                                    <div style="font-size: 24px; font-weight: 700; color: #34d399;">{{ number_format($totalRevenue, 0, ',', ' ') }} €</div>
                                </div>
                                <div style="text-align: right;">
                                    <div style="font-size: 12px; color: rgba(255, 255, 255, 0.6); margin-bottom: 4px;">Ce Mois</div>
                                    <div style="font-size: 20px; font-weight: 600; color: #a78bfa;">{{ number_format($currentMonthRevenue, 0, ',', ' ') }} €</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Graphique Réservations par Statut -->
                    <div class="chart-card">
                        <h3 class="chart-title">
                            <i class="fas fa-calendar-check" style="margin-right: 8px; color: var(--admin-info);"></i>
                            Répartition des Réservations
                        </h3>
                        <div id="reservationsStatusStatsChart" style="min-height: 350px;"></div>
                        <div style="padding: 16px; background: rgba(59, 130, 246, 0.1); border-radius: 12px; margin-top: 16px;">
                            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px;">
                                <div>
                                    <div style="font-size: 11px; color: rgba(255, 255, 255, 0.6);">Confirmées</div>
                                    <div style="font-size: 18px; font-weight: 700; color: #34d399;">{{ $confirmedReservations }}</div>
                                </div>
                                <div>
                                    <div style="font-size: 11px; color: rgba(255, 255, 255, 0.6);">En attente</div>
                                    <div style="font-size: 18px; font-weight: 700; color: #f59e0b;">{{ $pendingReservations }}</div>
                                </div>
                                <div>
                                    <div style="font-size: 11px; color: rgba(255, 255, 255, 0.6);">Annulées</div>
                                    <div style="font-size: 18px; font-weight: 700; color: #ef4444;">{{ $cancelledReservations }}</div>
                                </div>
                                <div>
                                    <div style="font-size: 11px; color: rgba(255, 255, 255, 0.6);">Total</div>
                                    <div style="font-size: 18px; font-weight: 700; color: #ffffff;">{{ $totalReservations }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Graphique Types de Biens -->
                    <div class="chart-card">
                        <h3 class="chart-title">
                            <i class="fas fa-building" style="margin-right: 8px; color: var(--admin-primary);"></i>
                            Répartition par Type de Bien
                        </h3>
                        <div id="housesTypeStatsChart" style="min-height: 350px;"></div>
                    </div>
                    
                    <!-- Graphique Performance Utilisateurs -->
                    <div class="chart-card">
                        <h3 class="chart-title">
                            <i class="fas fa-users" style="margin-right: 8px; color: var(--admin-secondary);"></i>
                            Évolution Utilisateurs & Réservations
                        </h3>
                        <div id="usersReservationsChart" style="min-height: 350px;"></div>
                    </div>
                </div>
                
                <!-- Tableau Statistiques Détaillées -->
                <div class="table-card" style="margin-bottom: 40px;">
                    <div class="table-header">
                        <h3 class="table-title">
                            <i class="fas fa-table" style="margin-right: 8px;"></i>
                            Statistiques Détaillées
                        </h3>
                    </div>
                    <div style="overflow-x: auto;">
                        <table>
                            <thead>
                                <tr>
                                    <th>Métrique</th>
                                    <th>Valeur</th>
                                    <th>Détails</th>
                                    <th>Tendance</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong style="color: #ffffff;">Prix moyen par nuit</strong></td>
                                    <td><strong style="color: #a78bfa; font-size: 16px;">{{ number_format($averagePrice, 0, ',', ' ') }} €</strong></td>
                                    <td style="color: rgba(255, 255, 255, 0.7);">Sur {{ $totalHouses }} biens</td>
                                    <td><span style="color: #34d399;"><i class="fas fa-arrow-up"></i></span></td>
                                </tr>
                                <tr>
                                    <td><strong style="color: #ffffff;">Surface moyenne</strong></td>
                                    <td><strong style="color: #a78bfa; font-size: 16px;">{{ number_format($averageSurface, 0, ',', ' ') }} m²</strong></td>
                                    <td style="color: rgba(255, 255, 255, 0.7);">Moyenne globale</td>
                                    <td><span style="color: #34d399;"><i class="fas fa-chart-line"></i></span></td>
                                </tr>
                                <tr>
                                    <td><strong style="color: #ffffff;">Durée moyenne de séjour</strong></td>
                                    <td><strong style="color: #a78bfa; font-size: 16px;">{{ $averageNights }} nuits</strong></td>
                                    <td style="color: rgba(255, 255, 255, 0.7);">Par réservation</td>
                                    <td><span style="color: #34d399;"><i class="fas fa-moon"></i></span></td>
                                </tr>
                                <tr>
                                    <td><strong style="color: #ffffff;">Revenu moyen par réservation</strong></td>
                                    <td><strong style="color: #a78bfa; font-size: 16px;">{{ number_format($averageRevenuePerReservation, 0, ',', ' ') }} €</strong></td>
                                    <td style="color: rgba(255, 255, 255, 0.7);">Sur {{ $confirmedReservations }} réservations</td>
                                    <td><span style="color: #34d399;"><i class="fas fa-coins"></i></span></td>
                                </tr>
                                <tr>
                                    <td><strong style="color: #ffffff;">Taux de conversion</strong></td>
                                    <td><strong style="color: #a78bfa; font-size: 16px;">{{ $conversionRate }}%</strong></td>
                                    <td style="color: rgba(255, 255, 255, 0.7);">{{ $totalReservations }} réservations / {{ $totalLocataires }} locataires</td>
                                    <td><span style="color: #34d399;"><i class="fas fa-percentage"></i></span></td>
                                </tr>
                                <tr>
                                    <td><strong style="color: #ffffff;">Taux d'occupation</strong></td>
                                    <td><strong style="color: #a78bfa; font-size: 16px;">{{ $occupancyRate }}%</strong></td>
                                    <td style="color: rgba(255, 255, 255, 0.7);">{{ $confirmedReservations }} réservations / {{ $totalHouses }} biens</td>
                                    <td><span style="color: #34d399;"><i class="fas fa-chart-line"></i></span></td>
                                </tr>
                                <tr>
                                    <td><strong style="color: #ffffff;">Taux d'annulation</strong></td>
                                    <td><strong style="color: #a78bfa; font-size: 16px;">{{ $cancellationRate }}%</strong></td>
                                    <td style="color: rgba(255, 255, 255, 0.7);">{{ $cancelledReservations }} annulations</td>
                                    <td><span style="color: {{ $cancellationRate < 10 ? '#34d399' : '#ef4444' }};"><i class="fas fa-{{ $cancellationRate < 10 ? 'check' : 'exclamation-triangle' }}"></i></span></td>
                                </tr>
                                <tr>
                                    <td><strong style="color: #ffffff;">Taux de confirmation</strong></td>
                                    <td><strong style="color: #a78bfa; font-size: 16px;">{{ $confirmationRate }}%</strong></td>
                                    <td style="color: rgba(255, 255, 255, 0.7);">{{ $confirmedReservations }} confirmées</td>
                                    <td><span style="color: #34d399;"><i class="fas fa-check-circle"></i></span></td>
                                </tr>
                                <tr>
                                    <td><strong style="color: #ffffff;">Revenu moyen par bien</strong></td>
                                    <td><strong style="color: #a78bfa; font-size: 16px;">{{ number_format($averageRevenuePerHouse, 0, ',', ' ') }} €</strong></td>
                                    <td style="color: rgba(255, 255, 255, 0.7);">Sur {{ $totalHouses }} biens</td>
                                    <td><span style="color: #34d399;"><i class="fas fa-building"></i></span></td>
                                </tr>
                                <tr>
                                    <td><strong style="color: #ffffff;">Croissance revenus (mois)</strong></td>
                                    <td><strong style="color: {{ $revenueGrowthRate >= 0 ? '#34d399' : '#ef4444' }}; font-size: 16px;">{{ $revenueGrowthRate >= 0 ? '+' : '' }}{{ $revenueGrowthRate }}%</strong></td>
                                    <td style="color: rgba(255, 255, 255, 0.7);">Vs mois précédent</td>
                                    <td><span style="color: {{ $revenueGrowthRate >= 0 ? '#34d399' : '#ef4444' }};"><i class="fas fa-arrow-{{ $revenueGrowthRate >= 0 ? 'up' : 'down' }}"></i></span></td>
                                </tr>
                                <tr>
                                    <td><strong style="color: #ffffff;">Biens sans réservation</strong></td>
                                    <td><strong style="color: #a78bfa; font-size: 16px;">{{ $housesWithoutReservations }}</strong></td>
                                    <td style="color: rgba(255, 255, 255, 0.7);">Sur {{ $totalHouses }} biens</td>
                                    <td><span style="color: {{ $housesWithoutReservations < ($totalHouses * 0.2) ? '#34d399' : '#f59e0b' }};"><i class="fas fa-{{ $housesWithoutReservations < ($totalHouses * 0.2) ? 'check' : 'exclamation-triangle' }}"></i></span></td>
                                </tr>
                                <tr>
                                    <td><strong style="color: #ffffff;">Photos moyennes par bien</strong></td>
                                    <td><strong style="color: #a78bfa; font-size: 16px;">{{ $averagePhotosPerHouse }}</strong></td>
                                    <td style="color: rgba(255, 255, 255, 0.7);">{{ $totalPhotos }} photos totales</td>
                                    <td><span style="color: #34d399;"><i class="fas fa-camera"></i></span></td>
                                </tr>
                                <tr>
                                    <td><strong style="color: #ffffff;">Clients uniques</strong></td>
                                    <td><strong style="color: #a78bfa; font-size: 16px;">{{ $uniqueClients }}</strong></td>
                                    <td style="color: rgba(255, 255, 255, 0.7);">Avec au moins 1 réservation</td>
                                    <td><span style="color: #34d399;"><i class="fas fa-users"></i></span></td>
                                </tr>
                                <tr>
                                    <td><strong style="color: #ffffff;">Utilisateurs actifs ce mois</strong></td>
                                    <td><strong style="color: #a78bfa; font-size: 16px;">{{ $activeUsersThisMonth }}</strong></td>
                                    <td style="color: rgba(255, 255, 255, 0.7);">Avec réservation ce mois</td>
                                    <td><span style="color: #34d399;"><i class="fas fa-user-clock"></i></span></td>
                                </tr>
                                <tr>
                                    <td><strong style="color: #ffffff;">Réservations à venir</strong></td>
                                    <td><strong style="color: #a78bfa; font-size: 16px;">{{ $upcomingReservations }}</strong></td>
                                    <td style="color: rgba(255, 255, 255, 0.7);">Confirmées et futures</td>
                                    <td><span style="color: #34d399;"><i class="fas fa-calendar-check"></i></span></td>
                                </tr>
                                <tr>
                                    <td><strong style="color: #ffffff;">Réservations en cours</strong></td>
                                    <td><strong style="color: #a78bfa; font-size: 16px;">{{ $ongoingReservations }}</strong></td>
                                    <td style="color: rgba(255, 255, 255, 0.7);">Actuellement actives</td>
                                    <td><span style="color: #34d399;"><i class="fas fa-spinner"></i></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- Stats Cards Compactes (4 principales) -->
                <div class="stats-grid" style="margin-bottom: 40px;">
                    <div class="stat-card">
                        <div class="stat-header">
                            <div style="flex: 1;">
                                <div class="stat-value">{{ number_format($totalRevenue, 0, ',', ' ') }} €</div>
                                <div class="stat-label">Revenu Total</div>
                                <div class="stat-change {{ $revenueGrowthRate >= 0 ? 'positive' : 'negative' }}">
                                    <i class="fas fa-arrow-{{ $revenueGrowthRate >= 0 ? 'up' : 'down' }}"></i>
                                    <span>{{ $revenueGrowthRate >= 0 ? '+' : '' }}{{ $revenueGrowthRate }}% ce mois</span>
                                </div>
                            </div>
                            <div class="stat-icon primary">
                                <i class="fas fa-euro-sign"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-header">
                            <div style="flex: 1;">
                                <div class="stat-value">{{ $totalReservations }}</div>
                                <div class="stat-label">Total Réservations</div>
                                <div class="stat-change positive">
                                    <i class="fas fa-arrow-up"></i>
                                    <span>+{{ $reservationsThisMonth }} ce mois</span>
                                </div>
                            </div>
                            <div class="stat-icon success">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-header">
                            <div style="flex: 1;">
                                <div class="stat-value">{{ $conversionRate }}%</div>
                                <div class="stat-label">Taux de conversion</div>
                                <div class="stat-change positive">
                                    <i class="fas fa-chart-line"></i>
                                    <span>{{ $uniqueClients }} clients uniques</span>
                                </div>
                            </div>
                            <div class="stat-icon primary">
                                <i class="fas fa-percentage"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-header">
                            <div style="flex: 1;">
                                <div class="stat-value">{{ $occupancyRate }}%</div>
                                <div class="stat-label">Taux d'occupation</div>
                                <div class="stat-change positive">
                                    <i class="fas fa-building"></i>
                                    <span>{{ $ongoingReservations }} en cours</span>
                                </div>
                            </div>
                            <div class="stat-icon warning">
                                <i class="fas fa-chart-line"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Top Performers -->
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(500px, 1fr)); gap: 24px; margin-bottom: 40px;">
                    <div class="table-card">
                        <div class="table-header">
                            <h3 class="table-title">Top 10 Biens les plus réservés</h3>
                        </div>
                        @if($topHouses->count() > 0)
                            <div style="overflow-x: auto;">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Bien</th>
                                            <th>Propriétaire</th>
                                            <th>Réservations</th>
                                            <th>Prix</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($topHouses as $house)
                                            <tr>
                                                <td style="color: #ffffff; font-weight: 600;">{{ \Illuminate\Support\Str::limit($house->description, 30) }}</td>
                                                <td style="color: rgba(255, 255, 255, 0.8);">{{ $house->user->first_name ?? 'N/A' }}</td>
                                                <td><strong style="color: #a78bfa; font-size: 16px;">{{ $house->reservations_count }}</strong></td>
                                                <td style="color: rgba(255, 255, 255, 0.9);">{{ number_format($house->prix, 0, ',', ' ') }} €</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div style="text-align: center; padding: 40px; color: rgba(255, 255, 255, 0.6);">
                                <p>Aucun bien</p>
                            </div>
                        @endif
                    </div>
                    
                    <div class="table-card">
                        <div class="table-header">
                            <h3 class="table-title">Top 10 Utilisateurs les plus actifs</h3>
                        </div>
                        @if($topUsers->count() > 0)
                            <div style="overflow-x: auto;">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Utilisateur</th>
                                            <th>Email</th>
                                            <th>Réservations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($topUsers as $user)
                                            <tr>
                                                <td><strong style="color: #ffffff;">{{ $user->first_name }} {{ $user->last_name }}</strong></td>
                                                <td style="color: rgba(255, 255, 255, 0.8);">{{ $user->email }}</td>
                                                <td><strong style="color: #a78bfa; font-size: 16px;">{{ $user->reservations_count }}</strong></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div style="text-align: center; padding: 40px; color: rgba(255, 255, 255, 0.6);">
                                <p>Aucun utilisateur</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Notification Container -->
    <div id="notificationContainer"></div>
    
    <script>
        // Mobile menu toggle
        document.getElementById('mobileMenuToggle')?.addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('open');
        });
        
        // Menu navigation - Switch sections without scroll
        function switchSection(sectionName) {
            const navLinks = document.querySelectorAll('.menu-item[data-section]');
            const sections = document.querySelectorAll('.content-section');
            
            // Remove active from all
            navLinks.forEach(l => l.classList.remove('active'));
            sections.forEach(s => s.classList.remove('active'));
            
            // Add active to selected
            const activeLink = document.querySelector(`.menu-item[data-section="${sectionName}"]`);
            const activeSection = document.getElementById(`section-${sectionName}`);
            
            if (activeLink && activeSection) {
                activeLink.classList.add('active');
                setTimeout(() => {
                    activeSection.classList.add('active');
                }, 50);
            }
        }
        
        document.querySelectorAll('.menu-item[data-section]').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const section = this.getAttribute('data-section');
                switchSection(section);
                
                // Close mobile menu if open
                document.getElementById('sidebar').classList.remove('open');
            });
        });
        
        // ============================================
        // APEXCHARTS - Graphiques Premium
        // ============================================
        
        // Réservations par mois
        const reservationsByMonth = @json($reservationsByMonth);
        const reservationsData = Object.values(reservationsByMonth);
        const reservationsLabels = Object.keys(reservationsByMonth);
        
        const reservationsOptions = {
            series: [{
                name: 'Réservations',
                data: reservationsData
            }],
            chart: {
                type: 'area',
                height: 350,
                toolbar: { show: false },
                fontFamily: 'Inter, sans-serif',
            },
            colors: ['#8b5cf6'],
            dataLabels: { enabled: false },
            stroke: {
                curve: 'smooth',
                width: 3
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.5,
                    opacityTo: 0.1,
                    stops: [0, 90, 100]
                }
            },
            xaxis: {
                categories: reservationsLabels,
                labels: {
                    style: { colors: 'rgba(255, 255, 255, 0.6)', fontSize: '12px' }
                }
            },
            yaxis: {
                labels: {
                    style: { colors: 'rgba(255, 255, 255, 0.6)', fontSize: '12px' }
                }
            },
            grid: {
                borderColor: 'rgba(255, 255, 255, 0.1)',
                strokeDashArray: 4
            },
            tooltip: {
                theme: 'dark',
                y: {
                    formatter: function(val) {
                        return val + ' réservations';
                    }
                }
            }
        };
        
        const reservationsChart = new ApexCharts(document.querySelector("#reservationsChart"), reservationsOptions);
        reservationsChart.render();
        
        // Utilisateurs par mois
        const usersByMonth = @json($usersByMonth);
        const usersData = Object.values(usersByMonth);
        const usersLabels = Object.keys(usersByMonth);
        
        const usersOptions = {
            series: [{
                name: 'Utilisateurs',
                data: usersData
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
                    columnWidth: '60%',
                }
            },
            dataLabels: {
                enabled: true,
                style: {
                    fontSize: '12px',
                    fontWeight: 700,
                    colors: ['#ffffff']
                }
            },
            xaxis: {
                categories: usersLabels,
                labels: {
                    style: { colors: 'rgba(255, 255, 255, 0.6)', fontSize: '12px' }
                }
            },
            yaxis: {
                labels: {
                    style: { colors: 'rgba(255, 255, 255, 0.6)', fontSize: '12px' }
                }
            },
            grid: {
                borderColor: 'rgba(255, 255, 255, 0.1)',
                strokeDashArray: 4
            },
            tooltip: {
                theme: 'dark'
            }
        };
        
        const usersChart = new ApexCharts(document.querySelector("#usersChart"), usersOptions);
        usersChart.render();
        
        // Répartition par type
        const housesByType = @json($housesByType);
        const housesTypeData = Object.values(housesByType);
        const housesTypeLabels = Object.keys(housesByType);
        
        const housesTypeOptions = {
            series: housesTypeData,
            chart: {
                type: 'donut',
                height: 350,
                fontFamily: 'Inter, sans-serif',
            },
            labels: housesTypeLabels,
            colors: ['#8b5cf6', '#ec4899', '#10b981', '#f59e0b', '#3b82f6', '#ef4444'],
            legend: {
                position: 'bottom',
                fontSize: '14px',
                fontFamily: 'Inter, sans-serif',
                fontWeight: 600,
                labels: {
                    colors: 'rgba(255, 255, 255, 0.8)'
                }
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
                                color: '#ffffff',
                                formatter: function() {
                                    return '{{ $totalHouses }}';
                                }
                            }
                        }
                    }
                }
            },
            tooltip: {
                theme: 'dark'
            }
        };
        
        const housesTypeChart = new ApexCharts(document.querySelector("#housesTypeChart"), housesTypeOptions);
        housesTypeChart.render();
        
        // Statut des réservations
        const reservationsStatusOptions = {
            series: [{{ $confirmedReservations }}, {{ $pendingReservations }}, {{ $cancelledReservations }}],
            chart: {
                type: 'pie',
                height: 350,
                fontFamily: 'Inter, sans-serif',
            },
            labels: ['Confirmées', 'En attente', 'Annulées'],
            colors: ['#10b981', '#f59e0b', '#ef4444'],
            legend: {
                position: 'bottom',
                fontSize: '14px',
                fontFamily: 'Inter, sans-serif',
                fontWeight: 600,
                labels: {
                    colors: 'rgba(255, 255, 255, 0.8)'
                }
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
                theme: 'dark'
            }
        };
        
        const reservationsStatusChart = new ApexCharts(document.querySelector("#reservationsStatusChart"), reservationsStatusOptions);
        reservationsStatusChart.render();
        
        // Revenus par mois
        const revenueByMonth = @json($revenueByMonth);
        const revenueData = Object.values(revenueByMonth);
        const revenueLabels = Object.keys(revenueByMonth);
        
        const revenueOptions = {
            series: [{
                name: 'Revenus (€)',
                data: revenueData
            }],
            chart: {
                type: 'bar',
                height: 400,
                toolbar: { show: false },
                fontFamily: 'Inter, sans-serif',
            },
            colors: ['#10b981'],
            plotOptions: {
                bar: {
                    borderRadius: 8,
                    columnWidth: '50%',
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
                    colors: ['#ffffff']
                }
            },
            xaxis: {
                categories: revenueLabels,
                labels: {
                    style: { colors: 'rgba(255, 255, 255, 0.6)', fontSize: '12px' }
                }
            },
            yaxis: {
                labels: {
                    style: { colors: 'rgba(255, 255, 255, 0.6)', fontSize: '12px' },
                    formatter: function(val) {
                        return Math.round(val).toLocaleString('fr-FR') + ' €';
                    }
                }
            },
            grid: {
                borderColor: 'rgba(255, 255, 255, 0.1)',
                strokeDashArray: 4
            },
            tooltip: {
                theme: 'dark',
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
        // NOUVEAUX GRAPHIQUES STATISTIQUES
        // ============================================
        
        // Graphique Revenus par Mois (Section Stats)
        const revenueStatsOptions = {
            series: [{
                name: 'Revenus',
                data: @json(array_values($revenueByMonth))
            }],
            chart: {
                type: 'area',
                height: 350,
                toolbar: { show: true },
                zoom: { enabled: true },
                background: 'transparent'
            },
            colors: ['#34d399'],
            dataLabels: {
                enabled: true,
                formatter: function(val) {
                    return Math.round(val).toLocaleString('fr-FR') + ' €';
                },
                style: {
                    colors: ['#ffffff'],
                    fontSize: '11px',
                    fontWeight: 600
                }
            },
            stroke: {
                curve: 'smooth',
                width: 3
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0.3,
                    stops: [0, 100],
                    colorStops: [
                        { offset: 0, color: '#34d399', opacity: 0.8 },
                        { offset: 100, color: '#34d399', opacity: 0.1 }
                    ]
                }
            },
            xaxis: {
                categories: @json(array_keys($revenueByMonth)),
                labels: {
                    style: { colors: 'rgba(255, 255, 255, 0.6)', fontSize: '12px' }
                }
            },
            yaxis: {
                labels: {
                    style: { colors: 'rgba(255, 255, 255, 0.6)', fontSize: '12px' },
                    formatter: function(val) {
                        return Math.round(val).toLocaleString('fr-FR') + ' €';
                    }
                }
            },
            grid: {
                borderColor: 'rgba(255, 255, 255, 0.1)',
                strokeDashArray: 4
            },
            tooltip: {
                theme: 'dark',
                y: {
                    formatter: function(val) {
                        return val.toLocaleString('fr-FR') + ' €';
                    }
                }
            }
        };
        
        const revenueStatsChart = new ApexCharts(document.querySelector("#revenueStatsChart"), revenueStatsOptions);
        revenueStatsChart.render();
        
        // Graphique Statut des Réservations (Section Stats)
        const reservationsStatusStatsOptions = {
            series: [{{ $confirmedReservations }}, {{ $pendingReservations }}, {{ $cancelledReservations }}],
            chart: {
                type: 'donut',
                height: 350,
                background: 'transparent'
            },
            labels: ['Confirmées', 'En attente', 'Annulées'],
            colors: ['#34d399', '#f59e0b', '#ef4444'],
            legend: {
                position: 'bottom',
                labels: {
                    colors: 'rgba(255, 255, 255, 0.8)'
                }
            },
            dataLabels: {
                enabled: true,
                formatter: function(val) {
                    return Math.round(val) + '%';
                },
                style: {
                    colors: ['#ffffff'],
                    fontSize: '14px',
                    fontWeight: 600
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
                                formatter: function() {
                                    return '{{ $totalReservations }}';
                                },
                                color: '#ffffff',
                                fontSize: '16px',
                                fontWeight: 600
                            }
                        }
                    }
                }
            },
            tooltip: {
                theme: 'dark',
                y: {
                    formatter: function(val) {
                        return val + ' réservations';
                    }
                }
            }
        };
        
        const reservationsStatusStatsChart = new ApexCharts(document.querySelector("#reservationsStatusStatsChart"), reservationsStatusStatsOptions);
        reservationsStatusStatsChart.render();
        
        // Graphique Types de Biens (Section Stats)
        const housesTypeStatsData = @json($housesByType);
        const housesTypeStatsOptions = {
            series: Object.values(housesTypeStatsData),
            chart: {
                type: 'pie',
                height: 350,
                background: 'transparent'
            },
            labels: Object.keys(housesTypeStatsData),
            colors: ['#8b5cf6', '#ec4899', '#f59e0b', '#3b82f6', '#10b981', '#ef4444'],
            legend: {
                position: 'bottom',
                labels: {
                    colors: 'rgba(255, 255, 255, 0.8)'
                }
            },
            dataLabels: {
                enabled: true,
                formatter: function(val) {
                    return Math.round(val) + '%';
                },
                style: {
                    colors: ['#ffffff'],
                    fontSize: '12px',
                    fontWeight: 600
                }
            },
            tooltip: {
                theme: 'dark',
                y: {
                    formatter: function(val) {
                        return val + ' biens';
                    }
                }
            }
        };
        
        const housesTypeStatsChart = new ApexCharts(document.querySelector("#housesTypeStatsChart"), housesTypeStatsOptions);
        housesTypeStatsChart.render();
        
        // Graphique Utilisateurs & Réservations (Section Stats)
        const usersReservationsOptions = {
            series: [
                {
                    name: 'Nouveaux Utilisateurs',
                    type: 'column',
                    data: @json(array_values($usersByMonth))
                },
                {
                    name: 'Réservations',
                    type: 'line',
                    data: @json(array_values($reservationsByMonth))
                }
            ],
            chart: {
                height: 350,
                type: 'line',
                background: 'transparent',
                toolbar: { show: true }
            },
            colors: ['#8b5cf6', '#ec4899'],
            stroke: {
                width: [0, 3],
                curve: 'smooth'
            },
            dataLabels: {
                enabled: true,
                enabledOnSeries: [1],
                style: {
                    colors: ['#ffffff'],
                    fontSize: '11px',
                    fontWeight: 600
                }
            },
            xaxis: {
                categories: @json(array_keys($usersByMonth)),
                labels: {
                    style: { colors: 'rgba(255, 255, 255, 0.6)', fontSize: '12px' }
                }
            },
            yaxis: [
                {
                    title: {
                        text: 'Utilisateurs',
                        style: { color: '#8b5cf6' }
                    },
                    labels: {
                        style: { colors: 'rgba(255, 255, 255, 0.6)', fontSize: '12px' }
                    }
                },
                {
                    opposite: true,
                    title: {
                        text: 'Réservations',
                        style: { color: '#ec4899' }
                    },
                    labels: {
                        style: { colors: 'rgba(255, 255, 255, 0.6)', fontSize: '12px' }
                    }
                }
            ],
            grid: {
                borderColor: 'rgba(255, 255, 255, 0.1)',
                strokeDashArray: 4
            },
            tooltip: {
                theme: 'dark',
                shared: true,
                intersect: false
            },
            legend: {
                position: 'top',
                labels: {
                    colors: 'rgba(255, 255, 255, 0.8)'
                }
            }
        };
        
        const usersReservationsChart = new ApexCharts(document.querySelector("#usersReservationsChart"), usersReservationsOptions);
        usersReservationsChart.render();
        
        // ============================================
        // TABLE SEARCH & FILTER
        // ============================================
        
        // Recherche Demandes
        const searchDemandes = document.getElementById('searchDemandes');
        if (searchDemandes) {
            searchDemandes.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                const rows = document.querySelectorAll('#demandesTable tbody tr');
                rows.forEach(row => {
                    const searchText = row.getAttribute('data-search') || '';
                    row.style.display = searchText.includes(searchTerm) ? '' : 'none';
                });
            });
        }
        
        // Recherche Utilisateurs
        const searchUsers = document.getElementById('searchUsers');
        const filterUsersRole = document.getElementById('filterUsersRole');
        
        function filterUsersTable() {
            const searchTerm = (searchUsers?.value || '').toLowerCase();
            const filterRole = (filterUsersRole?.value || '').toLowerCase();
            const rows = document.querySelectorAll('#usersTable tbody tr');
            
            rows.forEach(row => {
                const searchText = row.getAttribute('data-search') || '';
                const role = row.getAttribute('data-role') || '';
                const matchesSearch = searchText.includes(searchTerm);
                const matchesFilter = !filterRole || role === filterRole;
                row.style.display = (matchesSearch && matchesFilter) ? '' : 'none';
            });
        }
        
        if (searchUsers) searchUsers.addEventListener('input', filterUsersTable);
        if (filterUsersRole) filterUsersRole.addEventListener('change', filterUsersTable);
        
        // Recherche Biens
        const searchHouses = document.getElementById('searchHouses');
        const filterHousesType = document.getElementById('filterHousesType');
        
        function filterHousesTable() {
            const searchTerm = (searchHouses?.value || '').toLowerCase();
            const filterType = (filterHousesType?.value || '').toLowerCase();
            const rows = document.querySelectorAll('#housesTable tbody tr');
            
            rows.forEach(row => {
                const searchText = row.getAttribute('data-search') || '';
                const type = row.getAttribute('data-type') || '';
                const matchesSearch = searchText.includes(searchTerm);
                const matchesFilter = !filterType || type === filterType;
                row.style.display = (matchesSearch && matchesFilter) ? '' : 'none';
            });
        }
        
        if (searchHouses) searchHouses.addEventListener('input', filterHousesTable);
        if (filterHousesType) filterHousesType.addEventListener('change', filterHousesTable);
        
        // Recherche Réservations
        const searchReservations = document.getElementById('searchReservations');
        const filterReservationsStatus = document.getElementById('filterReservationsStatus');
        
        function filterReservationsTable() {
            const searchTerm = (searchReservations?.value || '').toLowerCase();
            const filterStatus = (filterReservationsStatus?.value || '').toLowerCase();
            const rows = document.querySelectorAll('#reservationsTable tbody tr');
            
            rows.forEach(row => {
                const searchText = row.getAttribute('data-search') || '';
                const status = row.getAttribute('data-status') || '';
                const matchesSearch = searchText.includes(searchTerm);
                const matchesFilter = !filterStatus || status === filterStatus;
                row.style.display = (matchesSearch && matchesFilter) ? '' : 'none';
            });
        }
        
        if (searchReservations) searchReservations.addEventListener('input', filterReservationsTable);
        if (filterReservationsStatus) filterReservationsStatus.addEventListener('change', filterReservationsTable);
        
        // ============================================
        // GESTION DES ERREURS & NOTIFICATIONS
        // ============================================
        
        function showNotification(message, type = 'success') {
            const container = document.getElementById('notificationContainer');
            const notification = document.createElement('div');
            notification.className = `notification ${type} show`;
            
            const icon = type === 'success' ? 'fa-check-circle' : type === 'error' ? 'fa-exclamation-circle' : 'fa-info-circle';
            notification.innerHTML = `
                <i class="fas ${icon}"></i>
                <span>${message}</span>
            `;
            
            container.appendChild(notification);
            
            setTimeout(() => {
                notification.classList.remove('show');
                setTimeout(() => notification.remove(), 500);
            }, 5000);
        }
        
        // Afficher les notifications Laravel
        @if(session('success'))
            showNotification('{{ session('success') }}', 'success');
        @endif
        
        @if(session('error'))
            showNotification('{{ session('error') }}', 'error');
        @endif
        
        @if($errors->any())
            @foreach($errors->all() as $error)
                showNotification('{{ $error }}', 'error');
            @endforeach
        @endif
        
        // Gestion des formulaires avec feedback
        document.querySelectorAll('.accept-form, .reject-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                const button = this.querySelector('button[type="submit"]');
                const originalText = button.innerHTML;
                button.disabled = true;
                button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Traitement...';
                
                // Le formulaire sera soumis normalement, le feedback sera géré par Laravel
            });
        });
        
        // ============================================
        // ANIMATIONS AU SCROLL
        // ============================================
        
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        // Observer les cartes et tableaux
        document.querySelectorAll('.stat-card, .chart-card, .table-card').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'opacity 0.8s var(--ease-out-expo), transform 0.8s var(--ease-out-expo)';
            observer.observe(el);
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
                const value = Math.floor(easeOutExpo * (end - start) + start);
                element.textContent = value.toLocaleString('fr-FR');
                if (progress < 1) {
                    window.requestAnimationFrame(step);
                }
            };
            window.requestAnimationFrame(step);
        }
        
        // Animer les valeurs numériques
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
    </script>
</body>
</html>
