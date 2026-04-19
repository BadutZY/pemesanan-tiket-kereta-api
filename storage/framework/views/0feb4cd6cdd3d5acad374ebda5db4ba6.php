<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'KAI Express'); ?> — KAI Express</title>
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('images/logo-kai.png')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&family=DM+Mono:wght@400;500&family=Fraunces:opsz,wght@9..144,700;9..144,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --bg-base: #0a0c0f;
            --bg-surface: #111318;
            --bg-surface2: #181c23;
            --bg-surface3: #1e232c;
            --border: rgba(255, 255, 255, 0.06);
            --border-hover: rgba(255, 255, 255, 0.12);
            --text-primary: #e8eaf0;
            --text-secondary: #8b92a5;
            --text-muted: #555e72;
            --accent: #c0392b;
            --accent-soft: rgba(192, 57, 43, 0.12);
            --accent-border: rgba(192, 57, 43, 0.25);
            --gold: #c8952a;
            --gold-soft: rgba(200, 149, 42, 0.10);
            --blue: #2563b0;
            --blue-soft: rgba(37, 99, 176, 0.12);
            --green: #1f7a4a;
            --green-soft: rgba(31, 122, 74, 0.12);
            --purple: #5b3fa6;
            --purple-soft: rgba(91, 63, 166, 0.12);
            --radius: 10px;
            --radius-lg: 14px;
            --sidebar-w: 260px;
            --font-body: 'DM Sans', sans-serif;
            --font-display: 'Fraunces', serif;
            --font-mono: 'DM Mono', monospace;
            --shadow-card: 0 1px 3px rgba(0, 0, 0, 0.4), 0 4px 16px rgba(0, 0, 0, 0.3);
            --shadow-hover: 0 4px 24px rgba(0, 0, 0, 0.5), 0 1px 4px rgba(0, 0, 0, 0.3);
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: var(--font-body);
            background: var(--bg-base);
            color: var(--text-primary);
            min-height: 100vh;
            font-size: 14px;
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
        }

        /* ── SIDEBAR ── */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-w);
            height: 100vh;
            background: var(--bg-surface);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            z-index: 1000;
            transition: transform .28s cubic-bezier(.4, 0, .2, 1);
        }

        .sidebar-brand {
            padding: 22px 20px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            background: #fff;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            overflow: hidden;
            padding: 4px;
        }

        .brand-icon img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .brand-name {
            font-family: var(--font-display);
            font-size: 17px;
            font-weight: 900;
            color: var(--text-primary);
            line-height: 1.1;
            letter-spacing: -0.3px;
        }

        .brand-sub {
            font-size: 10px;
            font-weight: 500;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1.2px;
            margin-top: 2px;
        }

        .sidebar-nav {
            flex: 1;
            padding: 16px 12px;
            overflow-y: auto;
        }

        .nav-label {
            font-size: 10px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--text-muted);
            padding: 8px 10px 5px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 10px;
            border-radius: var(--radius);
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 13.5px;
            font-weight: 500;
            margin-bottom: 1px;
            transition: background .15s, color .15s;
            position: relative;
        }

        .nav-item svg {
            width: 17px;
            height: 17px;
            flex-shrink: 0;
        }

        .nav-item:hover {
            background: var(--bg-surface2);
            color: var(--text-primary);
        }

        .nav-item.active {
            background: var(--accent-soft);
            color: var(--accent);
            border: 1px solid var(--accent-border);
        }

        .nav-item.active svg {
            color: var(--accent);
        }

        .sidebar-footer {
            padding: 16px 12px;
            border-top: 1px solid var(--border);
        }

        .sidebar-status {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            background: var(--bg-surface2);
            border-radius: var(--radius);
            border: 1px solid var(--border);
        }

        .status-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #2ecc71;
            box-shadow: 0 0 6px rgba(46, 204, 113, .6);
            flex-shrink: 0;
        }

        .status-text {
            font-size: 12px;
            color: var(--text-secondary);
        }

        /* ── MAIN ── */
        .main-wrapper {
            margin-left: var(--sidebar-w);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ── TOPBAR ── */
        .topbar {
            position: sticky;
            top: 0;
            background: rgba(10, 12, 15, .9);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid var(--border);
            padding: 14px 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            z-index: 900;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .btn-menu-toggle {
            display: none;
            width: 36px;
            height: 36px;
            background: var(--bg-surface2);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: var(--text-secondary);
            transition: all .15s;
        }

        .btn-menu-toggle:hover {
            color: var(--text-primary);
            border-color: var(--border-hover);
        }

        .btn-menu-toggle svg {
            width: 18px;
            height: 18px;
        }

        .breadcrumb-wrap {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            color: var(--text-muted);
        }

        .breadcrumb-wrap a {
            color: var(--text-muted);
            text-decoration: none;
            transition: color .15s;
        }

        .breadcrumb-wrap a:hover {
            color: var(--text-secondary);
        }

        .breadcrumb-wrap svg {
            width: 12px;
            height: 12px;
        }

        .breadcrumb-wrap .current {
            color: var(--text-primary);
            font-weight: 600;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .clock-badge {
            background: var(--bg-surface2);
            border: 1px solid var(--border);
            padding: 7px 14px;
            border-radius: var(--radius);
            font-family: var(--font-mono);
            font-size: 12px;
            color: var(--gold);
            letter-spacing: 0.5px;
        }

        .avatar-btn {
            width: 34px;
            height: 34px;
            background: var(--bg-surface2);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-secondary);
            cursor: pointer;
            transition: all .15s;
        }

        .avatar-btn:hover {
            border-color: var(--border-hover);
            color: var(--text-primary);
        }

        .avatar-btn svg {
            width: 16px;
            height: 16px;
        }

        /* ── PAGE ── */
        .page-content {
            flex: 1;
            padding: 28px;
        }

        .page-header {
            margin-bottom: 24px;
        }

        .page-title {
            font-family: var(--font-display);
            font-size: 26px;
            font-weight: 900;
            color: var(--text-primary);
            line-height: 1.15;
            letter-spacing: -0.5px;
        }

        .page-title span {
            color: var(--accent);
        }

        .page-subtitle {
            font-size: 13px;
            color: var(--text-muted);
            margin-top: 4px;
        }

        /* ── CARDS ── */
        .k-card {
            background: var(--bg-surface);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-card);
            transition: transform .2s, box-shadow .2s, border-color .2s;
        }

        .k-card:hover {
            box-shadow: var(--shadow-hover);
            border-color: var(--border-hover);
        }

        .k-card-header {
            padding: 16px 20px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .k-card-title {
            font-size: 13.5px;
            font-weight: 600;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .k-card-title .icon-wrap {
            width: 28px;
            height: 28px;
            border-radius: 7px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .k-card-title .icon-wrap svg {
            width: 14px;
            height: 14px;
        }

        .k-card-body {
            padding: 20px;
        }

        /* ── STAT CARDS ── */
        .stat-card {
            background: var(--bg-surface);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            padding: 20px;
            box-shadow: var(--shadow-card);
            transition: transform .2s, box-shadow .2s;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-hover);
        }

        .stat-icon-wrap {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 14px;
        }

        .stat-icon-wrap svg {
            width: 20px;
            height: 20px;
        }

        .stat-value {
            font-family: var(--font-display);
            font-size: 32px;
            font-weight: 900;
            color: var(--text-primary);
            line-height: 1;
            margin-bottom: 4px;
        }

        .stat-label {
            font-size: 12px;
            color: var(--text-muted);
            font-weight: 500;
        }

        /* ── TABLE ── */
        .k-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .k-table th {
            padding: 10px 16px;
            font-size: 10.5px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-muted);
            background: var(--bg-surface2);
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
        }

        .k-table td {
            padding: 13px 16px;
            font-size: 13.5px;
            color: var(--text-primary);
            border-bottom: 1px solid rgba(255, 255, 255, .03);
            transition: background .12s;
        }

        .k-table tbody tr:hover td {
            background: rgba(255, 255, 255, .02);
        }

        .k-table tbody tr:last-child td {
            border-bottom: none;
        }

        /* ── BADGES ── */
        .badge-kelas {
            display: inline-flex;
            align-items: center;
            padding: 3px 9px;
            border-radius: 5px;
            font-size: 10.5px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .badge-kelas.ekonomi {
            background: var(--green-soft);
            color: #4ade80;
            border: 1px solid rgba(31, 122, 74, .3);
        }

        .badge-kelas.bisnis {
            background: var(--gold-soft);
            color: var(--gold);
            border: 1px solid rgba(200, 149, 42, .25);
        }

        .badge-kelas.eksekutif {
            background: var(--purple-soft);
            color: #a78bfa;
            border: 1px solid rgba(91, 63, 166, .3);
        }

        .badge-count {
            display: inline-flex;
            align-items: center;
            padding: 3px 9px;
            border-radius: 5px;
            font-size: 11px;
            font-weight: 600;
        }

        .badge-count.high {
            background: var(--accent-soft);
            color: #f87171;
            border: 1px solid var(--accent-border);
        }

        .badge-count.low {
            background: var(--green-soft);
            color: #4ade80;
            border: 1px solid rgba(31, 122, 74, .3);
        }

        .badge-count.zero {
            background: var(--bg-surface3);
            color: var(--text-muted);
            border: 1px solid var(--border);
        }

        /* ── BUTTONS ── */
        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 18px;
            background: var(--accent);
            color: #fff;
            border: none;
            border-radius: var(--radius);
            font-family: var(--font-body);
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: background .15s, transform .15s, box-shadow .15s;
            white-space: nowrap;
        }

        .btn-primary:hover {
            background: #a93226;
            color: #fff;
            transform: translateY(-1px);
            box-shadow: 0 4px 14px rgba(192, 57, 43, .35);
        }

        .btn-primary svg {
            width: 15px;
            height: 15px;
        }

        .btn-secondary {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 8px 16px;
            background: var(--bg-surface2);
            color: var(--text-secondary);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            font-family: var(--font-body);
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            transition: all .15s;
            white-space: nowrap;
        }

        .btn-secondary:hover {
            background: var(--bg-surface3);
            color: var(--text-primary);
            border-color: var(--border-hover);
        }

        .btn-secondary svg {
            width: 14px;
            height: 14px;
        }

        .btn-icon {
            width: 30px;
            height: 30px;
            border-radius: 7px;
            border: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            text-decoration: none;
            transition: all .15s;
        }

        .btn-icon svg {
            width: 13px;
            height: 13px;
        }

        .btn-icon:hover {
            transform: scale(1.08);
        }

        .btn-icon.view {
            background: var(--blue-soft);
            color: #60a5fa;
        }

        .btn-icon.edit {
            background: var(--gold-soft);
            color: var(--gold);
        }

        .btn-icon.delete {
            background: var(--accent-soft);
            color: #f87171;
        }

        /* ── FORMS ── */
        .form-group {
            margin-bottom: 18px;
        }

        .form-label {
            display: block;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: var(--text-muted);
            margin-bottom: 7px;
        }

        .form-input {
            width: 100%;
            background: var(--bg-surface2);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 10px 14px;
            color: var(--text-primary);
            font-size: 13.5px;
            font-family: var(--font-body);
            transition: border-color .15s, box-shadow .15s;
            outline: none;
            -webkit-appearance: none;
        }

        .form-input:focus {
            border-color: var(--accent);
            background: var(--bg-surface3);
            box-shadow: 0 0 0 3px rgba(192, 57, 43, .1);
        }

        .form-input::placeholder {
            color: var(--text-muted);
        }

        .form-input option {
            background: var(--bg-surface2);
        }

        .form-input.is-invalid {
            border-color: #f87171 !important;
        }

        .invalid-msg {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 12px;
            color: #f87171;
            margin-top: 5px;
        }

        .invalid-msg svg {
            width: 13px;
            height: 13px;
            flex-shrink: 0;
        }

        /* ── SEARCH BAR ── */
        .search-wrap {
            position: relative;
        }

        .search-wrap svg {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            width: 15px;
            height: 15px;
            color: var(--text-muted);
            pointer-events: none;
        }

        .search-wrap .form-input {
            padding-left: 36px;
        }

        /* ── ALERTS ── */
        .k-alert {
            display: flex;
            align-items: flex-start;
            gap: 11px;
            padding: 13px 16px;
            border-radius: var(--radius);
            font-size: 13.5px;
            font-weight: 500;
            margin-bottom: 20px;
            animation: alertIn .3s ease;
        }

        @keyframes alertIn {
            from {
                opacity: 0;
                transform: translateY(-8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .k-alert svg {
            width: 16px;
            height: 16px;
            flex-shrink: 0;
            margin-top: 1px;
        }

        .k-alert.success {
            background: var(--green-soft);
            border: 1px solid rgba(31, 122, 74, .3);
            color: #4ade80;
        }

        .k-alert.error {
            background: var(--accent-soft);
            border: 1px solid var(--accent-border);
            color: #f87171;
        }

        /* ── ROUTE DISPLAY ── */
        .route-wrap {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .route-wrap .station {
            font-weight: 600;
            font-size: 13px;
        }

        .route-wrap svg {
            width: 13px;
            height: 13px;
            color: var(--accent);
            flex-shrink: 0;
        }

        /* ── INFO ROWS ── */
        .info-row {
            display: flex;
            gap: 16px;
            padding: 13px 0;
            border-bottom: 1px solid var(--border);
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-lbl {
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.7px;
            color: var(--text-muted);
            width: 130px;
            flex-shrink: 0;
            padding-top: 1px;
        }

        .info-val {
            font-size: 13.5px;
            color: var(--text-primary);
            font-weight: 500;
        }

        /* ── EMPTY STATE ── */
        .empty-state {
            text-align: center;
            padding: 52px 20px;
        }

        .empty-state svg {
            width: 44px;
            height: 44px;
            color: var(--text-muted);
            opacity: .3;
            margin: 0 auto 14px;
            display: block;
        }

        .empty-state p {
            color: var(--text-muted);
            font-size: 13px;
        }

        /* ── PAGINATION ── */
        .pagination .page-link {
            background: var(--bg-surface2);
            border: 1px solid var(--border);
            color: var(--text-secondary);
            font-size: 13px;
            padding: 7px 13px;
            border-radius: var(--radius) !important;
            margin: 0 2px;
            transition: all .15s;
        }

        .pagination .page-link:hover {
            background: var(--bg-surface3);
            border-color: var(--border-hover);
            color: var(--text-primary);
        }

        .pagination .page-item.active .page-link {
            background: var(--accent);
            border-color: var(--accent);
            color: #fff;
        }

        .pagination .page-item.disabled .page-link {
            opacity: .35;
        }

        /* ── MODAL ── */
        .modal-content {
            background: var(--bg-surface);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
        }

        .modal-header {
            border-bottom: 1px solid var(--border);
            padding: 18px 22px;
        }

        .modal-title {
            font-size: 15px;
            font-weight: 600;
            color: var(--text-primary);
        }

        .btn-close {
            filter: invert(1) opacity(.4);
        }

        .modal-body {
            padding: 22px;
        }

        .modal-footer {
            border-top: 1px solid var(--border);
            padding: 14px 22px;
        }

        /* ── SCROLLBAR ── */
        ::-webkit-scrollbar {
            width: 4px;
            height: 4px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, .08);
            border-radius: 10px;
        }

        /* ── FADE IN ── */
        .fade-up {
            animation: fadeUp .4s ease forwards;
            opacity: 0;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(14px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .d1 {
            animation-delay: .08s;
        }

        .d2 {
            animation-delay: .16s;
        }

        .d3 {
            animation-delay: .24s;
        }

        .d4 {
            animation-delay: .32s;
        }

        /* ── MOBILE ── */
        @media (max-width: 991px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main-wrapper {
                margin-left: 0;
            }

            .btn-menu-toggle {
                display: flex;
            }

            .page-content {
                padding: 18px 14px;
            }

            .topbar {
                padding: 12px 14px;
            }
        }

        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .55);
            z-index: 999;
        }

        .sidebar-overlay.show {
            display: block;
        }

        /* Monospace for NIK */
        .mono {
            font-family: var(--font-mono);
            font-size: 12px;
        }

        /* Time chip */
        .time-chip {
            background: rgba(200, 149, 42, .1);
            border: 1px solid rgba(200, 149, 42, .2);
            color: var(--gold);
            padding: 3px 9px;
            border-radius: 5px;
            font-family: var(--font-mono);
            font-size: 12.5px;
            font-weight: 500;
        }

        /* Avatar circle */
        .av-circle {
            width: 36px;
            height: 36px;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: var(--font-display);
            font-size: 14px;
            font-weight: 900;
            color: #fff;
            flex-shrink: 0;
        }
    </style>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>

<body>

    <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    <!-- SIDEBAR -->
    <nav class="sidebar" id="sidebar">
        <a href="<?php echo e(route('admin.dashboard')); ?>" class="sidebar-brand text-decoration-none">
            <div class="brand-icon">
                <img src="<?php echo e(asset('images/logo-kai.png')); ?>" alt="KAI Logo">
            </div>
            <div>
                <div class="brand-name">KAI Express</div>
                <div class="brand-sub">Sistem Pemesanan</div>
            </div>
        </a>

        <div class="sidebar-nav">
            <div class="nav-label">Utama</div>
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-item <?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <rect x="3" y="3" width="7" height="7" rx="1" />
                    <rect x="14" y="3" width="7" height="7" rx="1" />
                    <rect x="3" y="14" width="7" height="7" rx="1" />
                    <rect x="14" y="14" width="7" height="7" rx="1" />
                </svg>
                Dashboard
            </a>

            <div class="nav-label" style="margin-top:6px;">Data Master</div>
            <a href="<?php echo e(route('admin.penumpang.index')); ?>" class="nav-item <?php echo e(request()->routeIs('admin.penumpang.*') ? 'active' : ''); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>
                Penumpang
            </a>
            <a href="<?php echo e(route('admin.kereta.index')); ?>" class="nav-item <?php echo e(request()->routeIs('admin.kereta.*') ? 'active' : ''); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m16.5 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                </svg>
                Kereta
            </a>
            <a href="<?php echo e(route('admin.jadwal.index')); ?>" class="nav-item <?php echo e(request()->routeIs('admin.jadwal.*') ? 'active' : ''); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                </svg>
                Jadwal
            </a>

            <div class="nav-label" style="margin-top:6px;">Transaksi</div>
            <a href="<?php echo e(route('admin.pemesanan.index')); ?>" class="nav-item <?php echo e(request()->routeIs('admin.pemesanan.*') ? 'active' : ''); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                </svg>
                Pemesanan
            </a>
            <a href="<?php echo e(route('admin.laporan')); ?>" class="nav-item <?php echo e(request()->routeIs('admin.laporan') ? 'active' : ''); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                </svg>
                Laporan
            </a>
            <a href="<?php echo e(route('admin.users.index')); ?>" class="nav-item <?php echo e(request()->routeIs('admin.users.*') ? 'active' : ''); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                </svg>
                Pengguna
            </a>
        </div>

        <div class="sidebar-footer">
            <div class="sidebar-status">
                <div class="status-dot"></div>
                <div class="status-text">Sistem Aktif</div>
                <div style="margin-left:auto;font-family:var(--font-mono);font-size:11px;color:var(--text-muted);" id="sidebarTime">--:--</div>
            </div>
        </div>
    </nav>

    <!-- MAIN -->
    <div class="main-wrapper">
        <div class="topbar">
            <div class="topbar-left">
                <button class="btn-menu-toggle" onclick="toggleSidebar()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
                <nav class="breadcrumb-wrap">
                    <a href="<?php echo e(route('admin.dashboard')); ?>">KAI Express</a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                    <span class="current"><?php echo $__env->yieldContent('breadcrumb', 'Dashboard'); ?></span>
                </nav>
            </div>
            <div class="topbar-right">
                <div class="clock-badge" id="liveClock">00:00:00</div>
                <form method="POST" action="<?php echo e(route('logout')); ?>" style="display:inline;"><?php echo csrf_field(); ?><button type="submit" style="background:var(--bg-surface2);border:1px solid var(--border);border-radius:var(--radius);padding:7px 14px;font-size:12.5px;font-weight:500;color:var(--text-muted);cursor:pointer;font-family:var(--font-body);transition:all .15s;" onmouseover="this.style.borderColor='rgba(192,57,43,.4)';this.style.color='#f87171'" onmouseout="this.style.borderColor='var(--border)';this.style.color='var(--text-muted)'">Keluar</button></form>
                <div class="avatar-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="page-content">
            <?php if(session('success')): ?>
            <div class="k-alert success">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <?php echo e(session('success')); ?>

            </div>
            <?php endif; ?>
            <?php if(session('error')): ?>
            <div class="k-alert error">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                </svg>
                <?php echo e(session('error')); ?>

            </div>
            <?php endif; ?>
            <?php if($errors->any()): ?>
            <div class="k-alert error">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                </svg>
                <div><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><div><?php echo e($e); ?></div><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></div>
            </div>
            <?php endif; ?>

            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Clock
        function tick() {
            const t = new Date();
            const s = [t.getHours(), t.getMinutes(), t.getSeconds()].map(n => String(n).padStart(2, '0')).join(':');
            document.getElementById('liveClock').textContent = s;
            const st = document.getElementById('sidebarTime');
            if (st) st.textContent = s.slice(0, 5);
        }
        tick();
        setInterval(tick, 1000);

        // Sidebar
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('open');
            document.getElementById('sidebarOverlay').classList.toggle('show');
        }

        // Auto-dismiss alerts
        setTimeout(() => {
            document.querySelectorAll('.k-alert').forEach(el => {
                el.style.transition = 'opacity .4s, transform .4s';
                el.style.opacity = '0';
                el.style.transform = 'translateY(-6px)';
                setTimeout(() => el.remove(), 400);
            });
        }, 4000);

        // Delete confirm
        function confirmDelete(id) {
            if (confirm('Hapus data ini? Tindakan tidak dapat dibatalkan.')) {
                document.getElementById(id).submit();
            }
        }

        // Counter animation
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('[data-count]').forEach(el => {
                const target = parseInt(el.dataset.count);
                let n = 0;
                const step = Math.ceil(target / 25);
                const t = setInterval(() => {
                    n = Math.min(n + step, target);
                    el.textContent = n;
                    if (n >= target) clearInterval(t);
                }, 35);
            });
        });
    </script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html><?php /**PATH C:\Users\rizki\Pictures\INFOKOM-REACT\kai_new\resources\views/layouts/admin.blade.php ENDPATH**/ ?>