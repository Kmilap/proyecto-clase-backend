<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión · ShopLaravel</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=syne:400,600,700,800|dm-sans:300,400,500" rel="stylesheet" />
    <style>
        :root {
            --orange: #E8640A;
            --orange-dark: #C4500A;
            --dark: #1A1209;
            --darker: #0F0B06;
            --gray: #6B6560;
            --light: #FAF8F5;
            --white: #FFFFFF;
            --border: #EDE8E2;
        }
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'DM Sans', sans-serif; background: var(--light); color: var(--dark); min-height: 100vh; overflow: hidden; }
        .auth-page { min-height: 100vh; display: flex; }
        .auth-left { width: 45%; background: var(--darker); position: relative; overflow: hidden; display: flex; align-items: center; justify-content: center; }
        .mesh-bg { position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: radial-gradient(ellipse 80% 50% at 20% 80%, rgba(232,100,10,0.08) 0%, transparent 50%), radial-gradient(ellipse 60% 80% at 80% 20%, rgba(232,100,10,0.06) 0%, transparent 50%), radial-gradient(ellipse 100% 100% at 50% 50%, rgba(45,31,13,0.8) 0%, var(--darker) 70%); animation: meshShift 12s ease-in-out infinite alternate; }
        @keyframes meshShift { 0% { background-position: 0% 0%, 100% 100%, center; } 100% { background-position: 20% 30%, 80% 70%, center; } }
        .blob { position: absolute; border-radius: 50%; filter: blur(60px); opacity: 0; animation-fill-mode: forwards; }
        .blob-1 { width: 350px; height: 350px; background: radial-gradient(circle, rgba(232,100,10,0.18) 0%, transparent 70%); top: -10%; right: -10%; animation: blobMorph1 15s ease-in-out infinite, blobAppear 2s ease-out 0.5s forwards; }
        .blob-2 { width: 250px; height: 250px; background: radial-gradient(circle, rgba(232,100,10,0.12) 0%, transparent 70%); bottom: -5%; left: -5%; animation: blobMorph2 18s ease-in-out infinite, blobAppear 2s ease-out 1s forwards; }
        .blob-3 { width: 180px; height: 180px; background: radial-gradient(circle, rgba(255,180,100,0.1) 0%, transparent 70%); top: 50%; left: 40%; transform: translate(-50%, -50%); animation: blobMorph3 10s ease-in-out infinite, blobAppear 2s ease-out 1.5s forwards; }
        @keyframes blobAppear { to { opacity: 1; } }
        @keyframes blobMorph1 { 0%, 100% { border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%; transform: translate(0, 0) scale(1); } 25% { border-radius: 70% 30% 50% 50% / 30% 30% 70% 70%; transform: translate(-20px, 20px) scale(1.05); } 50% { border-radius: 50% 60% 30% 60% / 50% 40% 70% 40%; transform: translate(-10px, -10px) scale(0.95); } 75% { border-radius: 30% 60% 70% 40% / 50% 60% 30% 60%; transform: translate(15px, 5px) scale(1.02); } }
        @keyframes blobMorph2 { 0%, 100% { border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; transform: translate(0, 0) scale(1); } 33% { border-radius: 40% 60% 70% 30% / 40% 70% 30% 60%; transform: translate(20px, -15px) scale(1.08); } 66% { border-radius: 70% 30% 40% 60% / 70% 40% 60% 30%; transform: translate(-10px, 10px) scale(0.92); } }
        @keyframes blobMorph3 { 0%, 100% { border-radius: 50%; transform: translate(-50%, -50%) scale(1); } 50% { border-radius: 40% 60% 60% 40% / 60% 40% 60% 40%; transform: translate(-50%, -50%) scale(1.3); } }
        .constellation { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
        .constellation line { stroke: var(--orange); stroke-width: 0.5; opacity: 0; animation: lineAppear 3s ease-out forwards; }
        .constellation circle { fill: var(--orange); opacity: 0; animation: dotPulse 4s ease-in-out infinite; }
        @keyframes lineAppear { 0% { opacity: 0; stroke-dashoffset: 200; } 100% { opacity: 0.15; stroke-dashoffset: 0; } }
        @keyframes dotPulse { 0%, 100% { opacity: 0.3; r: 2; } 50% { opacity: 0.7; r: 3; } }
        .embers { position: absolute; top: 0; left: 0; width: 100%; height: 100%; overflow: hidden; }
        .ember { position: absolute; bottom: -10px; border-radius: 50%; background: var(--orange); opacity: 0; animation: emberRise linear infinite; }
        @keyframes emberRise { 0% { transform: translateY(0) scale(1); opacity: 0; } 5% { opacity: 0.8; } 40% { opacity: 0.6; } 80% { opacity: 0.2; } 100% { transform: translateY(-100vh) scale(0); opacity: 0; } }
        .ember:nth-child(1)  { left: 8%;  width: 3px; height: 3px; animation-duration: 8s;  animation-delay: 0s; }
        .ember:nth-child(2)  { left: 18%; width: 2px; height: 2px; animation-duration: 11s; animation-delay: 1s; }
        .ember:nth-child(3)  { left: 30%; width: 4px; height: 4px; animation-duration: 7s;  animation-delay: 0.5s; }
        .ember:nth-child(4)  { left: 42%; width: 2px; height: 2px; animation-duration: 9s;  animation-delay: 2s; }
        .ember:nth-child(5)  { left: 55%; width: 3px; height: 3px; animation-duration: 10s; animation-delay: 0.8s; }
        .ember:nth-child(6)  { left: 65%; width: 2px; height: 2px; animation-duration: 12s; animation-delay: 3s; }
        .ember:nth-child(7)  { left: 75%; width: 5px; height: 5px; animation-duration: 6s;  animation-delay: 1.5s; }
        .ember:nth-child(8)  { left: 85%; width: 2px; height: 2px; animation-duration: 9s;  animation-delay: 4s; }
        .ember:nth-child(9)  { left: 22%; width: 3px; height: 3px; animation-duration: 13s; animation-delay: 2.5s; }
        .ember:nth-child(10) { left: 48%; width: 2px; height: 2px; animation-duration: 8s;  animation-delay: 5s; }
        .ember:nth-child(11) { left: 92%; width: 3px; height: 3px; animation-duration: 7.5s; animation-delay: 0.3s; }
        .ember:nth-child(12) { left: 5%;  width: 4px; height: 4px; animation-duration: 10.5s; animation-delay: 3.5s; }
        .scanline { position: absolute; top: 0; left: 0; width: 100%; height: 2px; background: linear-gradient(90deg, transparent 0%, var(--orange) 50%, transparent 100%); opacity: 0.12; animation: scan 6s ease-in-out infinite; }
        @keyframes scan { 0%, 100% { top: -2px; opacity: 0; } 10% { opacity: 0.12; } 90% { opacity: 0.12; } 95% { opacity: 0; } 50% { top: 100%; } }
        .corner-frame { position: absolute; width: 60px; height: 60px; opacity: 0; animation: cornerAppear 1s ease-out forwards; }
        .corner-frame::before, .corner-frame::after { content: ''; position: absolute; background: var(--orange); opacity: 0.25; }
        .corner-tl { top: 24px; left: 24px; animation-delay: 1.2s; }
        .corner-tl::before { top: 0; left: 0; width: 24px; height: 1px; }
        .corner-tl::after  { top: 0; left: 0; width: 1px; height: 24px; }
        .corner-br { bottom: 24px; right: 24px; animation-delay: 1.4s; }
        .corner-br::before { bottom: 0; right: 0; width: 24px; height: 1px; }
        .corner-br::after  { bottom: 0; right: 0; width: 1px; height: 24px; }
        @keyframes cornerAppear { to { opacity: 1; } }
        .auth-left-content { position: relative; z-index: 10; text-align: center; padding: 2rem; }
        .auth-logo { font-family: 'Syne', sans-serif; font-size: 2.4rem; font-weight: 800; color: var(--white); text-decoration: none; display: block; margin-bottom: 1.8rem; opacity: 0; animation: revealUp 1s cubic-bezier(0.16, 1, 0.3, 1) 0.3s forwards; }
        .auth-logo span { color: var(--orange); }
        .auth-left h2 { font-family: 'Syne', sans-serif; font-size: 1.9rem; font-weight: 800; color: var(--white); line-height: 1.2; margin-bottom: 0.6rem; opacity: 0; animation: revealUp 1s cubic-bezier(0.16, 1, 0.3, 1) 0.5s forwards; }
        .auth-left p { color: #8A7E74; font-size: 1rem; line-height: 1.7; opacity: 0; animation: revealUp 1s cubic-bezier(0.16, 1, 0.3, 1) 0.7s forwards; }
        .accent-line { width: 0; height: 2px; background: linear-gradient(90deg, transparent, var(--orange), transparent); margin: 1.8rem auto 0; animation: accentExpand 1.2s cubic-bezier(0.16, 1, 0.3, 1) 1s forwards; }
        @keyframes accentExpand { to { width: 120px; } }
        @keyframes revealUp { from { opacity: 0; transform: translateY(30px); filter: blur(4px); } to { opacity: 1; transform: translateY(0); filter: blur(0); } }
        .auth-right { flex: 1; display: flex; align-items: center; justify-content: center; padding: 2rem; opacity: 0; animation: fadeIn 0.8s ease-out 0.4s forwards; }
        @keyframes fadeIn { to { opacity: 1; } }
        .auth-form-container { width: 100%; max-width: 420px; }
        .auth-form-title { font-family: 'Syne', sans-serif; font-size: 1.6rem; font-weight: 800; color: var(--dark); margin-bottom: 0.3rem; }
        .auth-form-subtitle { color: var(--gray); font-size: 0.9rem; margin-bottom: 2rem; }
        .auth-form-group { margin-bottom: 1.3rem; }
        .auth-form-group label { display: block; font-size: 0.82rem; font-weight: 600; color: var(--dark); margin-bottom: 0.4rem; }
        .auth-form-group input { width: 100%; border: 1.5px solid var(--border); border-radius: 10px; padding: 0.75rem 1rem; font-family: 'DM Sans', sans-serif; font-size: 0.92rem; color: var(--dark); background: var(--white); outline: none; transition: border-color 0.3s, box-shadow 0.3s; }
        .auth-form-group input:focus { border-color: var(--orange); box-shadow: 0 0 0 3px rgba(232,100,10,0.12); }
        .auth-remember { display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem; font-size: 0.85rem; }
        .auth-remember label { display: flex; align-items: center; gap: 0.5rem; color: var(--gray); font-weight: 500; cursor: pointer; }
        .auth-remember input[type="checkbox"] { width: 16px; height: 16px; accent-color: var(--orange); cursor: pointer; }
        .auth-forgot { color: var(--orange); text-decoration: none; font-weight: 500; font-size: 0.85rem; transition: color 0.2s; }
        .auth-forgot:hover { color: var(--orange-dark); }
        .auth-submit { width: 100%; background: var(--orange); color: var(--white); border: none; padding: 0.85rem; border-radius: 10px; font-family: 'Syne', sans-serif; font-size: 1rem; font-weight: 700; cursor: pointer; transition: background 0.2s, transform 0.15s, box-shadow 0.2s; }
        .auth-submit:hover { background: var(--orange-dark); transform: translateY(-2px); box-shadow: 0 8px 24px rgba(232,100,10,0.3); }
        .auth-switch { text-align: center; margin-top: 1.5rem; font-size: 0.88rem; color: var(--gray); }
        .auth-switch a { color: var(--orange); text-decoration: none; font-weight: 600; }
        .auth-switch a:hover { text-decoration: underline; }
        .auth-error { color: #DC3545; font-size: 0.82rem; margin-top: 0.3rem; }
        .auth-alert { background: #D1E7DD; color: #0A3622; border: 1px solid #A3CFBB; border-radius: 8px; padding: 0.8rem 1rem; margin-bottom: 1.5rem; font-size: 0.88rem; }
        @media (max-width: 768px) { .auth-left { display: none; } .auth-right { padding: 1.5rem; } body { overflow: auto; } }
    </style>
</head>
<body>
    <div class="auth-page">
        <div class="auth-left">
            <div class="mesh-bg"></div>
            <div class="blob blob-1"></div>
            <div class="blob blob-2"></div>
            <div class="blob blob-3"></div>
            <svg class="constellation" viewBox="0 0 400 600" preserveAspectRatio="none">
                <line x1="50" y1="80" x2="180" y2="150" stroke-dasharray="200" style="animation-delay:1.5s"/>
                <line x1="180" y1="150" x2="320" y2="100" stroke-dasharray="200" style="animation-delay:1.8s"/>
                <line x1="320" y1="100" x2="350" y2="250" stroke-dasharray="200" style="animation-delay:2.1s"/>
                <line x1="80" y1="350" x2="200" y2="400" stroke-dasharray="200" style="animation-delay:2.4s"/>
                <line x1="200" y1="400" x2="300" y2="350" stroke-dasharray="200" style="animation-delay:2.7s"/>
                <line x1="300" y1="350" x2="370" y2="480" stroke-dasharray="200" style="animation-delay:3s"/>
                <line x1="100" y1="200" x2="250" y2="280" stroke-dasharray="200" style="animation-delay:3.3s"/>
                <line x1="250" y1="280" x2="150" y2="450" stroke-dasharray="200" style="animation-delay:3.6s"/>
                <circle cx="50" cy="80" r="2" style="animation-delay:1.5s"/>
                <circle cx="180" cy="150" r="2" style="animation-delay:1.8s"/>
                <circle cx="320" cy="100" r="2" style="animation-delay:2.1s"/>
                <circle cx="350" cy="250" r="2" style="animation-delay:2.4s"/>
                <circle cx="80" cy="350" r="2" style="animation-delay:2.7s"/>
                <circle cx="200" cy="400" r="2" style="animation-delay:3s"/>
                <circle cx="300" cy="350" r="2" style="animation-delay:3.3s"/>
                <circle cx="370" cy="480" r="2" style="animation-delay:3.6s"/>
                <circle cx="100" cy="200" r="2" style="animation-delay:3.3s"/>
                <circle cx="250" cy="280" r="2" style="animation-delay:3.6s"/>
                <circle cx="150" cy="450" r="2" style="animation-delay:3.9s"/>
            </svg>
            <div class="embers">
                <div class="ember"></div><div class="ember"></div><div class="ember"></div>
                <div class="ember"></div><div class="ember"></div><div class="ember"></div>
                <div class="ember"></div><div class="ember"></div><div class="ember"></div>
                <div class="ember"></div><div class="ember"></div><div class="ember"></div>
            </div>
            <div class="scanline"></div>
            <div class="corner-frame corner-tl"></div>
            <div class="corner-frame corner-br"></div>
            <div class="auth-left-content">
                <a href="/" class="auth-logo">Shop<span>Laravel</span></a>
                <h2>Bienvenido de vuelta</h2>
                <p>Tu experiencia de compra<br>comienza aquí</p>
                <div class="accent-line"></div>
            </div>
        </div>

        <div class="auth-right">
            <div class="auth-form-container">
                <h1 class="auth-form-title">Iniciar sesión</h1>
                <p class="auth-form-subtitle">Ingresa tus credenciales para continuar</p>

                @if (session('status'))
                    <div class="auth-alert">{{ session('status') }}</div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="auth-form-group">
                        <label for="email">Correo electrónico</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                               placeholder="tu@email.com" required autofocus>
                        @error('email')
                            <div class="auth-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="auth-form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" id="password" name="password"
                               placeholder="••••••••" required>
                        @error('password')
                            <div class="auth-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="auth-remember">
                        <label>
                            <input type="checkbox" name="remember">
                            Recordarme
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="auth-forgot">¿Olvidaste tu contraseña?</a>
                        @endif
                    </div>

                    <button type="submit" class="auth-submit">Iniciar sesión →</button>
                </form>

                <div class="auth-switch">
                    ¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate aquí</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>