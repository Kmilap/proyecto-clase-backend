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
            <a href="#">Mi cuenta</a>
            <a href="#" class="btn-cart">🛒 Carrito</a>
        </div>
    </header>

    @include('layout.navbar')

    @yield('content')

    @include('layout.footer')

    @yield('scripts')

</body>
</html>