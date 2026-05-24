<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Indekos App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Plus Jakarta Sans', sans-serif; }

        body {
            background: linear-gradient(135deg, #e0e7ff 0%, #f0f4ff 45%, #faf5ff 75%, #e8f5e9 100%);
            min-height: 100vh;
        }

        .orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.38;
            pointer-events: none;
            z-index: 0;
        }

        .card {
            background: rgba(255,255,255,0.65);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255,255,255,0.6);
            border-radius: 24px;
            padding: 36px 32px;
            width: 100%;
            max-width: 420px;
        }

        .input-wrap { position: relative; }
        .input-wrap svg {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
        }

        .input-field {
            width: 100%;
            padding: 11px 14px 11px 38px;
            border-radius: 12px;
            border: 1.5px solid #e5e7eb;
            font-size: 14px;
            font-family: inherit;
            background: rgba(255,255,255,0.8);
            color: #111827;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .input-field:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99,102,241,0.12);
        }

        .eye-btn {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
            color: #9ca3af;
            display: flex;
            align-items: center;
        }
        .eye-btn:hover { color: #6366f1; }

        /* Role toggle */
        .role-toggle {
            display: flex;
            background: rgba(99,102,241,0.08);
            border-radius: 12px;
            padding: 4px;
            gap: 4px;
            margin-bottom: 22px;
        }
        .role-btn {
            flex: 1;
            padding: 9px;
            border-radius: 9px;
            border: none;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            font-family: inherit;
            transition: background 0.2s, color 0.2s, box-shadow 0.2s;
            background: transparent;
            color: #9ca3af;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }
        .role-btn.active {
            background: white;
            color: #4f46e5;
            box-shadow: 0 2px 8px rgba(99,102,241,0.15);
        }

        .btn-submit {
            width: 100%;
            padding: 12px;
            border-radius: 12px;
            border: none;
            font-size: 15px;
            font-weight: 700;
            font-family: inherit;
            cursor: pointer;
            background: linear-gradient(135deg, #6366f1, #818cf8);
            color: white;
            transition: opacity 0.2s, transform 0.15s;
        }
        .btn-submit:hover  { opacity: 0.88; transform: scale(0.99); }
        .btn-submit:active { transform: scale(0.97); }

        .alert-error {
            background: rgba(239,68,68,0.08);
            border: 1px solid rgba(239,68,68,0.2);
            color: #b91c1c;
            border-radius: 10px;
            padding: 10px 14px;
            font-size: 13px;
            margin-bottom: 18px;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(18px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .fade-up { animation: fadeUp 0.45s ease both; }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen p-5">

    {{-- Orbs --}}
    <div class="orb" style="width:360px;height:360px;background:#93c5fd;top:-80px;left:-100px;"></div>
    <div class="orb" style="width:300px;height:300px;background:#c4b5fd;top:60px;right:-80px;"></div>
    <div class="orb" style="width:260px;height:260px;background:#6ee7b7;bottom:-40px;left:38%;"></div>

    <div style="position:relative;z-index:1;width:100%;display:flex;justify-content:center;">
    <div class="card fade-up">

        {{-- Logo --}}
        <div style="text-align:center;margin-bottom:26px;">
            <div style="width:50px;height:50px;background:linear-gradient(135deg,#6366f1,#818cf8);border-radius:15px;display:flex;align-items:center;justify-content:center;margin:0 auto 12px;">
                <svg fill="none" stroke="white" viewBox="0 0 24 24" width="25" height="25">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 12l9-9 9 9M5 10v9a1 1 0 001 1h4v-5h4v5h4a1 1 0 001-1v-9"/>
                </svg>
            </div>
            <h1 style="font-size:21px;font-weight:800;background:linear-gradient(90deg,#4f46e5,#7c3aed);-webkit-background-clip:text;-webkit-text-fill-color:transparent;margin-bottom:4px;">Indekos App</h1>
            <p style="font-size:13px;color:#9ca3af;">Masuk ke akun kamu</p>
        </div>

        {{-- Error --}}
        @if(session('error'))
        <div class="alert-error">⚠️ {{ session('error') }}</div>
        @endif
        @if($errors->any())
        <div class="alert-error">⚠️ {{ $errors->first() }}</div>
        @endif

        {{-- Role Toggle (visual only, tidak mengubah action) --}}
        <div class="role-toggle">
            <button type="button" class="role-btn active" id="btnAdmin" onclick="setRole('admin')">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="14" height="14"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                Admin
            </button>
            <button type="button" class="role-btn" id="btnPenghuni" onclick="setRole('penghuni')">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="14" height="14"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                Penghuni
            </button>
        </div>

        {{-- Form — action & method tidak diubah --}}
        <form method="POST" action="/login">
            @csrf

            <div style="margin-bottom:14px;">
                <label style="font-size:13px;font-weight:600;color:#374151;display:block;margin-bottom:6px;">Username</label>
                <div class="input-wrap">
                    <svg fill="none" stroke="#9ca3af" viewBox="0 0 24 24" width="16" height="16">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    <input type="text" name="username" class="input-field"
                           placeholder="Masukkan username"
                           value="{{ old('username') }}"
                           autocomplete="username" required>
                </div>
            </div>

            <div style="margin-bottom:22px;">
                <label style="font-size:13px;font-weight:600;color:#374151;display:block;margin-bottom:6px;">Password</label>
                <div class="input-wrap">
                    <svg fill="none" stroke="#9ca3af" viewBox="0 0 24 24" width="16" height="16">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                    <input type="password" name="password" id="passInput" class="input-field"
                           placeholder="Masukkan password"
                           autocomplete="current-password"
                           style="padding-right:40px;" required>
                    <button type="button" class="eye-btn" onclick="togglePass()">
                        <svg id="eyeIcon" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="17" height="17">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </button>
                </div>
            </div>

            <button type="submit" class="btn-submit" id="btnSubmit">
                Masuk sebagai Admin
            </button>

        </form>

        {{-- Back --}}
        <div style="text-align:center;margin-top:18px;">
            <a href="/" style="font-size:13px;color:#9ca3af;text-decoration:none;display:inline-flex;align-items:center;gap:5px;"
               onmouseover="this.style.color='#6366f1'" onmouseout="this.style.color='#9ca3af'">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="13" height="13"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Kembali ke halaman utama
            </a>
        </div>

    </div>
    </div>

    <script>
    // Toggle tampilan role (visual + ubah teks tombol)
    function setRole(role) {
        var btnAdmin    = document.getElementById('btnAdmin');
        var btnPenghuni = document.getElementById('btnPenghuni');
        var btnSubmit   = document.getElementById('btnSubmit');

        if (role === 'admin') {
            btnAdmin.classList.add('active');
            btnPenghuni.classList.remove('active');
            btnSubmit.textContent = 'Masuk sebagai Admin';
        } else {
            btnPenghuni.classList.add('active');
            btnAdmin.classList.remove('active');
            btnSubmit.textContent = 'Masuk sebagai Penghuni';
        }
    }

    // Toggle show/hide password
    var passVisible = false;
    function togglePass() {
        var input = document.getElementById('passInput');
        var icon  = document.getElementById('eyeIcon');
        passVisible = !passVisible;
        input.type = passVisible ? 'text' : 'password';
        icon.innerHTML = passVisible
            ? '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>'
            : '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>';
    }
    </script>

</body>
</html>