<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title','KAI Express'); ?> — KAI Express</title>
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('images/logo-kai.png')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600;9..40,700&family=Fraunces:opsz,wght@9..144,700;9..144,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --accent: #c0392b;
            --bg: #0a0c0f;
            --surface: #111318;
            --surface2: #181c23;
            --surface3: #1e232c;
            --border: rgba(255, 255, 255, .06);
            --text: #e8eaf0;
            --muted: #8b92a5;
            --gold: #c8952a;
            --font: 'DM Sans', sans-serif;
            --display: 'Fraunces', serif;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: var(--font);
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            font-size: 14px;
            -webkit-font-smoothing: antialiased;
        }

        /* Navbar */
        .navbar-kai {
            background: rgba(17, 19, 24, .95);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid var(--border);
            padding: 14px 0;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .nav-logo .ni {
            width: 38px;
            height: 38px;
            background: #fff;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            padding: 3px;
        }

        .nav-logo .ni img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .nav-logo .nt {
            font-family: var(--display);
            font-size: 16px;
            font-weight: 900;
            color: var(--text);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .nav-links a {
            padding: 8px 14px;
            border-radius: 8px;
            font-size: 13.5px;
            font-weight: 500;
            color: var(--muted);
            text-decoration: none;
            transition: all .15s;
        }

        .nav-links a:hover {
            background: var(--surface2);
            color: var(--text);
        }

        .nav-links a.active {
            background: rgba(192, 57, 43, .1);
            color: var(--accent);
            border: 1px solid rgba(192, 57, 43, .2);
        }

        .nav-user {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* User dropdown */
        .user-dropdown {
            position: relative;
        }

        .user-badge {
            display: flex;
            align-items: center;
            gap: 8px;
            background: var(--surface2);
            border: 1px solid var(--border);
            border-radius: 9px;
            padding: 6px 12px;
            font-size: 13px;
            color: var(--text);
            cursor: pointer;
            transition: all .15s;
            user-select: none;
        }

        .user-badge:hover {
            border-color: rgba(255, 255, 255, .15);
            background: var(--surface3);
        }

        .user-badge .avatar {
            width: 26px;
            height: 26px;
            border-radius: 7px;
            object-fit: cover;
            border: 1px solid var(--border);
        }

        .user-badge .avatar-init {
            width: 26px;
            height: 26px;
            border-radius: 7px;
            background: var(--accent);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 700;
            color: #fff;
            flex-shrink: 0;
        }

        .user-badge svg.chevron {
            width: 13px;
            height: 13px;
            color: var(--muted);
            transition: transform .2s;
        }

        .user-dropdown.open .user-badge svg.chevron {
            transform: rotate(180deg);
        }

        .user-badge svg.icon-u {
            width: 15px;
            height: 15px;
            color: var(--muted);
        }

        /* Dropdown menu */
        .ud-menu {
            display: none;
            position: absolute;
            right: 0;
            top: calc(100% + 8px);
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 12px;
            min-width: 200px;
            box-shadow: 0 16px 40px rgba(0, 0, 0, .5);
            overflow: hidden;
            z-index: 200;
        }

        .user-dropdown.open .ud-menu {
            display: block;
            animation: ddIn .15s ease;
        }

        @keyframes ddIn {
            from {
                opacity: 0;
                transform: translateY(-6px)
            }

            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        .ud-header {
            padding: 14px 16px;
            border-bottom: 1px solid var(--border);
        }

        .ud-header .ud-name {
            font-size: 13.5px;
            font-weight: 700;
            color: var(--text);
        }

        .ud-header .ud-email {
            font-size: 11.5px;
            color: var(--muted);
            margin-top: 2px;
            word-break: break-all;
        }

        .ud-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 11px 16px;
            font-size: 13px;
            color: var(--muted);
            text-decoration: none;
            transition: background .12s;
        }

        .ud-item:hover {
            background: var(--surface2);
            color: var(--text);
        }

        .ud-item svg {
            width: 15px;
            height: 15px;
        }

        .ud-sep {
            border: none;
            border-top: 1px solid var(--border);
            margin: 0;
        }

        .ud-item.danger {
            color: #f87171;
        }

        .ud-item.danger:hover {
            background: rgba(192, 57, 43, .08);
            color: #f87171;
        }

        .btn-logout {
            display: none;
        }

        /* Page */
        .page-wrap {
            padding: 32px 0;
            min-height: calc(100vh - 65px);
        }

        /* Cards */
        .k-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 13px;
            overflow: hidden;
        }

        .k-card-body {
            padding: 20px;
        }

        /* Forms */
        .form-group {
            margin-bottom: 16px;
        }

        .form-label {
            display: block;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .8px;
            color: var(--muted);
            margin-bottom: 6px;
        }

        .form-input {
            width: 100%;
            background: var(--surface2);
            border: 1px solid var(--border);
            border-radius: 9px;
            padding: 10px 14px;
            color: var(--text);
            font-size: 13.5px;
            font-family: var(--font);
            outline: none;
            transition: border-color .15s;
            -webkit-appearance: none;
        }

        .form-input:focus {
            border-color: var(--accent);
        }

        .form-input::placeholder {
            color: rgba(139, 146, 165, .4);
        }

        .form-input option {
            background: var(--surface2);
        }

        /* Buttons */
        .btn-p {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 10px 20px;
            background: var(--accent);
            color: #fff;
            border: none;
            border-radius: 9px;
            font-size: 13.5px;
            font-weight: 600;
            font-family: var(--font);
            cursor: pointer;
            text-decoration: none;
            transition: background .15s;
        }

        .btn-p:hover {
            background: #a93226;
            color: #fff;
        }

        .btn-p svg {
            width: 15px;
            height: 15px;
        }

        .btn-s {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 18px;
            background: var(--surface2);
            color: var(--muted);
            border: 1px solid var(--border);
            border-radius: 9px;
            font-size: 13.5px;
            font-weight: 500;
            font-family: var(--font);
            cursor: pointer;
            text-decoration: none;
            transition: all .15s;
        }

        .btn-s:hover {
            background: var(--surface3);
            color: var(--text);
            border-color: rgba(255, 255, 255, .12);
        }

        .btn-s svg {
            width: 14px;
            height: 14px;
        }

        /* Alerts */
        .k-alert {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 16px;
            border-radius: 9px;
            font-size: 13.5px;
            font-weight: 500;
            margin-bottom: 18px;
            animation: alertIn .3s ease;
        }

        @keyframes alertIn {
            from {
                opacity: 0;
                transform: translateY(-6px)
            }

            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        .k-alert svg {
            width: 16px;
            height: 16px;
            flex-shrink: 0;
        }

        .k-alert.success {
            background: rgba(31, 122, 74, .12);
            border: 1px solid rgba(31, 122, 74, .3);
            color: #4ade80;
        }

        .k-alert.error {
            background: rgba(192, 57, 43, .1);
            border: 1px solid rgba(192, 57, 43, .25);
            color: #f87171;
        }

        /* Status badge */
        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 3px 10px;
            border-radius: 5px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .3px;
        }

        .status-badge.confirmed {
            background: rgba(31, 122, 74, .12);
            color: #4ade80;
            border: 1px solid rgba(31, 122, 74, .25);
        }

        .status-badge.pending {
            background: rgba(200, 149, 42, .1);
            color: var(--gold);
            border: 1px solid rgba(200, 149, 42, .2);
        }

        .status-badge.cancelled {
            background: rgba(192, 57, 43, .1);
            color: #f87171;
            border: 1px solid rgba(192, 57, 43, .25);
        }

        /* Train card */
        .jadwal-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 13px;
            padding: 20px;
            transition: border-color .2s, transform .2s;
        }

        .jadwal-card:hover {
            border-color: rgba(255, 255, 255, .12);
            transform: translateY(-2px);
        }

        .kelas-badge {
            display: inline-flex;
            align-items: center;
            padding: 3px 9px;
            border-radius: 5px;
            font-size: 10.5px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .kelas-badge.ekonomi {
            background: rgba(31, 122, 74, .12);
            color: #4ade80;
            border: 1px solid rgba(31, 122, 74, .25);
        }

        .kelas-badge.bisnis {
            background: rgba(200, 149, 42, .1);
            color: var(--gold);
            border: 1px solid rgba(200, 149, 42, .2);
        }

        .kelas-badge.eksekutif {
            background: rgba(91, 63, 166, .12);
            color: #a78bfa;
            border: 1px solid rgba(91, 63, 166, .25);
        }

        /* Table */
        .k-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .k-table th {
            padding: 10px 14px;
            font-size: 10.5px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--muted);
            background: var(--surface2);
            border-bottom: 1px solid var(--border);
        }

        .k-table td {
            padding: 13px 14px;
            font-size: 13.5px;
            border-bottom: 1px solid rgba(255, 255, 255, .03);
            transition: background .12s;
        }

        .k-table tbody tr:hover td {
            background: rgba(255, 255, 255, .02);
        }

        .k-table tbody tr:last-child td {
            border-bottom: none;
        }

        /* Page title */
        .page-title {
            font-family: var(--display);
            font-size: 24px;
            font-weight: 900;
            color: var(--text);
            letter-spacing: -.4px;
        }

        .page-title span {
            color: var(--accent);
        }

        .page-sub {
            font-size: 13px;
            color: var(--muted);
            margin-top: 4px;
        }

        /* Scrollbar */
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

        /* Pagination */
        .pagination .page-link {
            background: var(--surface2);
            border: 1px solid var(--border);
            color: var(--muted);
            font-size: 13px;
            padding: 7px 13px;
            border-radius: 8px !important;
            margin: 0 2px;
            transition: all .15s;
        }

        .pagination .page-link:hover {
            background: var(--surface3);
            color: var(--text);
        }

        .pagination .page-item.active .page-link {
            background: var(--accent);
            border-color: var(--accent);
            color: #fff;
        }

        .pagination .page-item.disabled .page-link {
            opacity: .35;
        }

        /* Route display */
        .route-d {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .route-d .stn {
            font-weight: 700;
            font-size: 14px;
        }

        .route-d svg {
            width: 14px;
            height: 14px;
            color: var(--accent);
            flex-shrink: 0;
        }

        .time-chip {
            background: rgba(200, 149, 42, .1);
            border: 1px solid rgba(200, 149, 42, .2);
            color: var(--gold);
            padding: 3px 9px;
            border-radius: 5px;
            font-size: 13px;
            font-weight: 600;
        }

        /* Footer */
        .kai-footer {
            border-top: 1px solid var(--border);
            padding: 20px 0;
            text-align: center;
            font-size: 12px;
            color: var(--muted);
            margin-top: 40px;
        }
    </style>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>

<body>
    <nav class="navbar-kai">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <a href="<?php echo e(route('user.dashboard')); ?>" class="nav-logo">
                    <div class="ni"><img src="<?php echo e(asset('images/logo-kai.png')); ?>" alt="KAI Logo"></div>
                    <span class="nt">KAI Express</span>
                </a>
                <div class="nav-links d-none d-md-flex">
                    <a href="<?php echo e(route('user.dashboard')); ?>" class="<?php echo e(request()->routeIs('user.dashboard') ? 'active' : ''); ?>">Beranda</a>
                    <a href="<?php echo e(route('user.jadwal')); ?>" class="<?php echo e(request()->routeIs('user.jadwal') ? 'active' : ''); ?>">Jadwal</a>
                    <a href="<?php echo e(route('user.tiket')); ?>" class="<?php echo e(request()->routeIs('user.tiket*') ? 'active' : ''); ?>">Tiket Saya</a>
                </div>
                <div class="nav-user">
                    <!-- User dropdown -->
                    <div class="user-dropdown d-none d-sm-flex" id="userDropdown">
                        <div class="user-badge" onclick="toggleDropdown()">
                            <?php if(Auth::user()->photo_profile): ?>
                            <img src="<?php echo e(Storage::disk('public')->url(Auth::user()->photo_profile)); ?>" alt="foto" class="avatar">
                            <?php else: ?>
                            <div class="avatar-init"><?php echo e(strtoupper(substr(Auth::user()->name, 0, 2))); ?></div>
                            <?php endif; ?>
                            <span><?php echo e(Str::limit(Auth::user()->name, 18)); ?></span>
                            <svg class="chevron" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </div>
                        <div class="ud-menu">
                            <div class="ud-header">
                                <div class="ud-name"><?php echo e(Auth::user()->name); ?></div>
                                <div class="ud-email"><?php echo e(Auth::user()->email); ?></div>
                            </div>
                            <a href="<?php echo e(route('user.profil')); ?>" class="ud-item">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0" />
                                </svg>
                                Edit Profil
                            </a>
                            <hr class="ud-sep">
                            <form method="POST" action="<?php echo e(route('logout')); ?>">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="ud-item danger" style="width:100%;background:none;border:none;text-align:left;cursor:pointer;font-family:var(--font);">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                    </svg>
                                    Keluar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="page-wrap">
        <div class="container">
            <?php if(session('success')): ?>
            <div class="k-alert success"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg><?php echo e(session('success')); ?></div>
            <?php endif; ?>
            <?php if(session('error')): ?>
            <div class="k-alert error"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                </svg><?php echo e(session('error')); ?></div>
            <?php endif; ?>
            <?php if($errors->any()): ?>
            <div class="k-alert error"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                </svg>
                <div><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><div><?php echo e($e); ?></div><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></div>
            </div>
            <?php endif; ?>
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
    <footer class="kai-footer">
        <div class="container">KAI Express &copy; <?php echo e(date('Y')); ?> — Sistem Pemesanan Tiket Kereta Api</div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleDropdown() {
            document.getElementById('userDropdown').classList.toggle('open');
        }
        document.addEventListener('click', function(e) {
            const dd = document.getElementById('userDropdown');
            if (dd && !dd.contains(e.target)) dd.classList.remove('open');
        });
        setTimeout(() => {
            document.querySelectorAll('.k-alert').forEach(el => {
                el.style.transition = 'opacity .4s';
                el.style.opacity = '0';
                setTimeout(() => el.remove(), 400);
            });
        }, 4000);
    </script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html><?php /**PATH C:\Users\rizki\Pictures\INFOKOM-REACT\kai_new\resources\views/layouts/user.blade.php ENDPATH**/ ?>