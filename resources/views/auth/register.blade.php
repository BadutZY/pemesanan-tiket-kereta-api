<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Daftar — KAI Express</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo-kai.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,400;9..40,500;9..40,600;9..40,700&family=Fraunces:opsz,wght@9..144,900&display=swap" rel="stylesheet">
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
            padding: 24px 20px;
        }

        .auth-wrap {
            width: 100%;
            max-width: 480px;
        }

        .auth-logo {
            text-align: center;
            margin-bottom: 28px;
        }

        .auth-logo .logo-icon {
            width: 72px;
            height: 72px;
            background: #fff;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
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
            font-size: 20px;
            font-weight: 900;
            color: var(--text);
        }

        .auth-logo p {
            font-size: 12px;
            color: var(--muted);
            margin-top: 2px;
        }

        .auth-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 30px;
        }

        .auth-card h2 {
            font-family: var(--display);
            font-size: 19px;
            font-weight: 900;
            margin-bottom: 4px;
        }

        .auth-card .sub {
            font-size: 13px;
            color: var(--muted);
            margin-bottom: 22px;
        }

        .form-group {
            margin-bottom: 14px;
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
        }

        .form-input:focus {
            border-color: var(--accent);
        }

        .form-input::placeholder {
            color: rgba(139, 146, 165, .5);
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
            margin-top: 6px;
        }

        .btn-submit:hover {
            background: #a93226;
        }

        .auth-foot {
            text-align: center;
            margin-top: 18px;
            font-size: 13px;
            color: var(--muted);
        }

        .auth-foot a {
            color: var(--accent);
            text-decoration: none;
            font-weight: 600;
        }

        .err-msg {
            font-size: 11.5px;
            color: #f87171;
            margin-top: 4px;
        }

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

        .err-box {
            background: rgba(192, 57, 43, .1);
            border: 1px solid rgba(192, 57, 43, .25);
            color: #f87171;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 13px;
            margin-bottom: 14px;
        }
    </style>
</head>

<body>
    <div class="auth-wrap">
        <div class="auth-logo">
            <div class="logo-icon"><img src="{{ asset('images/logo-kai.png') }}" alt="KAI Logo"></div>
            <h1>KAI Express</h1>
            <p>Buat akun baru</p>
        </div>
        <div class="auth-card">
            <h2>Daftar</h2>
            <p class="sub">Isi formulir di bawah untuk membuat akun</p>

            @if($errors->any())
            <div class="err-box">{{ $errors->first() }}</div>
            @endif

            <form method="POST" action="{{ route('register.post') }}">
                @csrf
                <div class="row g-3">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label">Nama Lengkap *</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-input" placeholder="Nama sesuai KTP" required>
                            @error('name')<div class="err-msg">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label">Email *</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-input" placeholder="nama@email.com" required>
                            @error('email')<div class="err-msg">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">NIK (16 Digit) *</label>
                            <input type="text" name="nik" value="{{ old('nik') }}" class="form-input" placeholder="3201XXXXXXXXXXXX" maxlength="16" required>
                            @error('nik')<div class="err-msg">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Nomor HP *</label>
                            <input type="text" name="no_hp" value="{{ old('no_hp') }}" class="form-input" placeholder="08XXXXXXXXXX" required>
                            @error('no_hp')<div class="err-msg">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Password *</label>
                            <div class="pw-wrap"><input type="password" name="password" id="regPw1" class="form-input" placeholder="Min. 8 karakter" required><button type="button" class="pw-toggle" onclick="togglePw('regPw1',this)"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg></button></div>
                            @error('password')<div class="err-msg">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Konfirmasi Password *</label>
                            <div class="pw-wrap"><input type="password" name="password_confirmation" id="regPw2" class="form-input" placeholder="Ulangi password" required><button type="button" class="pw-toggle" onclick="togglePw('regPw2',this)"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg></button></div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn-submit">Buat Akun</button>
            </form>
        </div>
        <div class="auth-foot">Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a></div>
    </div>
    <script>
        function togglePw(id, btn) {
            const input = document.getElementById(id);
            const show = input.type === "password";
            input.type = show ? "text" : "password";
            btn.innerHTML = show ? "<svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\" stroke-width=\"2\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88\"/></svg>" : "<svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\" stroke-width=\"2\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z\"/><path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M15 12a3 3 0 11-6 0 3 3 0 016 0z\"/></svg>";
        }
    </script>
</body>

</html>