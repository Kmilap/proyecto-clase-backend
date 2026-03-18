<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopLaravel</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- HEADER -->
    <header>
        <a class="logo" href="#">Shop<span>Laravel</span></a>
        <div class="header-actions">
            <a href="#">Inicio</a>
            @auth
                <a href="{{ route('cart.index') }}" class="btn-cart">🛒 Carrito</a>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" style="background:none;border:none;color:#B8B0A6;font-size:0.85rem;font-weight:500;cursor:pointer;transition:color 0.2s;">
                        Cerrar sesión
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}">Iniciar sesión</a>
                <a href="{{ route('register') }}">Registrarse</a>
            @endauth
        </div>
    </header>

    @include('layout.navbar')

    @yield('content')

    @include('layout.footer')

    @yield('scripts')

</body>
</html>