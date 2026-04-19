<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Login — KAI Express</title>
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('images/logo-kai.png')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600;9..40,700&family=Fraunces:opsz,wght@9..144,700;9..144,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --accent: #c0392b;
            --bg: #0a0c0f;
            --surface: #111318;
            --surface2: #181c23;
            --border: rgba(255, 255, 255, .07);
            --text: #e8eaf0;
            --muted: #8b92a5;
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
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .auth-wrap {
            width: 100%;
            max-width: 420px;
        }

        .auth-logo {
            text-align: center;
            margin-bottom: 32px;
        }

        .auth-logo .logo-icon {
            width: 80px;
            height: 80px;
            background: #fff;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 12px;
            overflow: hidden;
            padding: 6px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, .3);
        }

        .auth-logo .logo-icon img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .auth-logo h1 {
            font-family: var(--display);
            font-size: 22px;
            font-weight: 900;
            color: var(--text);
            letter-spacing: -.3px;
        }

        .auth-logo p {
            font-size: 13px;
            color: var(--muted);
            margin-top: 3px;
        }

        .auth-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 32px;
        }

        /* Tabs */
        .auth-tabs {
            display: flex;
            border-bottom: 1px solid var(--border);
            margin-bottom: 24px;
            gap: 0;
        }

        .auth-tab {
            flex: 1;
            text-align: center;
            padding: 10px;
            font-size: 13.5px;
            font-weight: 600;
            color: var(--muted);
            cursor: pointer;
            border-bottom: 2px solid transparent;
            margin-bottom: -1px;
            transition: all .15s;
        }

        .auth-tab.active {
            color: var(--accent);
            border-bottom-color: var(--accent);
        }

        .tab-panel {
            display: none;
        }

        .tab-panel.active {
            display: block;
        }

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
            margin-bottom: 7px;
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
        }

        .form-input:focus {
            border-color: var(--accent);
        }

        .form-input::placeholder {
            color: rgba(139, 146, 165, .5);
        }

        /* Password wrap */
        .pw-wrap {
            position: relative;
        }

        .pw-wrap .form-input {
            padding-right: 42px;
        }

        .pw-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: var(--muted);
            padding: 0;
            display: flex;
            align-items: center;
            transition: color .15s;
        }

        .pw-toggle:hover {
            color: var(--text);
        }

        .pw-toggle svg {
            width: 16px;
            height: 16px;
        }

        .btn-submit {
            width: 100%;
            background: var(--accent);
            color: #fff;
            border: none;
            border-radius: 9px;
            padding: 11px;
            font-size: 14px;
            font-weight: 600;
            font-family: var(--font);
            cursor: pointer;
            transition: background .15s;
            margin-top: 4px;
        }

        .btn-submit:hover {
            background: #a93226;
        }

        .auth-foot {
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
            color: var(--muted);
        }

        .auth-foot a {
            color: var(--accent);
            text-decoration: none;
            font-weight: 600;
        }

        .err {
            background: rgba(192, 57, 43, .1);
            border: 1px solid rgba(192, 57, 43, .25);
            color: #f87171;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 13px;
            margin-bottom: 16px;
        }

        .ok {
            background: rgba(31, 122, 74, .12);
            border: 1px solid rgba(31, 122, 74, .3);
            color: #4ade80;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 13px;
            margin-bottom: 16px;
        }

        .panel-sub {
            font-size: 13px;
            color: var(--muted);
            margin-bottom: 20px;
            line-height: 1.6;
        }
    </style>
</head>

<body>
    <div class="auth-wrap">
        <div class="auth-logo">
            <div class="logo-icon"><img src="<?php echo e(asset('images/logo-kai.png')); ?>" alt="KAI Logo"></div>
            <h1>KAI Express</h1>
            <p>Sistem Pemesanan Tiket Kereta Api</p>
        </div>
        <div class="auth-card">
            <!-- Tabs -->
            <div class="auth-tabs">
                <div class="auth-tab <?php echo e(!request('tab') || request('tab')=='login' ? 'active' : ''); ?>" onclick="switchTab('login')">Masuk</div>
                <div class="auth-tab <?php echo e(request('tab')=='forgot' ? 'active' : ''); ?>" onclick="switchTab('forgot')">Lupa Password</div>
            </div>

            <!-- LOGIN PANEL -->
            <div class="tab-panel <?php echo e(!request('tab') || request('tab')=='login' ? 'active' : ''); ?>" id="tab-login">
                <?php if($errors->any() && !request('tab')): ?>
                <div class="err"><?php echo e($errors->first()); ?></div>
                <?php endif; ?>
                <?php if(session('success')): ?>
                <div class="ok"><?php echo e(session('success')); ?></div>
                <?php endif; ?>

                <form method="POST" action="<?php echo e(route('login.post')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-input" placeholder="nama@email.com" required autofocus>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <div class="pw-wrap">
                            <input type="password" name="password" id="loginPassword" class="form-input" placeholder="Masukkan password" required>
                            <button type="button" class="pw-toggle" onclick="togglePw('loginPassword', this)">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:18px;font-size:13px;">
                        <label style="display:flex;align-items:center;gap:7px;cursor:pointer;color:var(--muted);">
                            <input type="checkbox" name="remember" style="accent-color:var(--accent);"> Ingat saya
                        </label>
                        <span style="color:var(--accent);cursor:pointer;font-weight:600;" onclick="switchTab('forgot')">Lupa password?</span>
                    </div>
                    <button type="submit" class="btn-submit">Masuk</button>
                </form>
            </div>

            <!-- FORGOT PASSWORD PANEL -->
            <div class="tab-panel <?php echo e(request('tab')=='forgot' ? 'active' : ''); ?>" id="tab-forgot">
                <?php if($errors->any() && request('tab')=='forgot'): ?>
                <div class="err"><?php echo e($errors->first()); ?></div>
                <?php endif; ?>
                <?php if(session('forgot_success')): ?>
                <div class="ok"><?php echo e(session('forgot_success')); ?></div>
                <?php endif; ?>

                <p class="panel-sub">Masukkan email yang terdaftar. Kami akan menampilkan form untuk mengatur ulang password Anda.</p>

                <form method="POST" action="<?php echo e(route('forgot.verify')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label class="form-label">Email Terdaftar</label>
                        <input type="email" name="email" value="<?php echo e(old('forgot_email')); ?>" class="form-input" placeholder="nama@email.com" required>
                    </div>
                    <button type="submit" class="btn-submit">Cari Akun</button>
                </form>

                <?php if(session('reset_email')): ?>
                <div style="margin-top:20px;padding-top:20px;border-top:1px solid var(--border);">
                    <p style="font-size:13px;color:var(--muted);margin-bottom:16px;">Akun ditemukan. Silakan masukkan password baru untuk <strong style="color:var(--text);"><?php echo e(session('reset_email')); ?></strong></p>
                    <form method="POST" action="<?php echo e(route('forgot.reset')); ?>">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="email" value="<?php echo e(session('reset_email')); ?>">
                        <div class="form-group">
                            <label class="form-label">Password Baru</label>
                            <div class="pw-wrap">
                                <input type="password" id="newPw1" name="password" class="form-input" placeholder="Min. 8 karakter" required>
                                <button type="button" class="pw-toggle" onclick="togglePw('newPw1', this)">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Konfirmasi Password Baru</label>
                            <div class="pw-wrap">
                                <input type="password" id="newPw2" name="password_confirmation" class="form-input" placeholder="Ulangi password" required>
                                <button type="button" class="pw-toggle" onclick="togglePw('newPw2', this)">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <button type="submit" class="btn-submit">Simpan Password Baru</button>
                    </form>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="auth-foot">
            Belum punya akun? <a href="<?php echo e(route('register')); ?>">Daftar sekarang</a>
        </div>
    </div>
    <script>
        function switchTab(tab) {
            document.querySelectorAll('.auth-tab').forEach((t, i) => t.classList.toggle('active', (i === 0 && tab === 'login') || (i === 1 && tab === 'forgot')));
            document.getElementById('tab-login').classList.toggle('active', tab === 'login');
            document.getElementById('tab-forgot').classList.toggle('active', tab === 'forgot');
        }

        function togglePw(id, btn) {
            const input = document.getElementById(id);
            const show = input.type === 'password';
            input.type = show ? 'text' : 'password';
            btn.innerHTML = show ?
                '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88"/></svg>' :
                '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>';
        }
    </script>
</body>

</html><?php /**PATH C:\Users\rizki\Pictures\INFOKOM-REACT\Laravel\kai_project_website\resources\views/auth/login.blade.php ENDPATH**/ ?>