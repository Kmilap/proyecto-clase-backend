<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin · ShopLaravel</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

    <div class="admin-wrapper">

        <!-- SIDEBAR -->
        <aside class="admin-sidebar">
            <div class="sidebar-logo">
                <a href="{{ route('admin.dashboard') }}">Shop<span>Admin</span></a>
            </div>

            <nav class="sidebar-nav">
                <span class="nav-label">General</span>
                <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    📊 Dashboard
                </a>

                <span class="nav-label">Gestión</span>
                <a href="#" class="nav-item">
                    📦 Productos
                </a>
                <a href="#" class="nav-item">
                    🏷️ Categorías
                </a>
                <a href="#" class="nav-item">
                    🛒 Pedidos
                </a>

                <span class="nav-label">Otros</span>
                <a href="{{ route('product.index') }}" class="nav-item">
                    🌐 Ver tienda
                </a>
            </nav>
        </aside>

        <!-- MAIN CONTENT -->
        <div class="admin-main">

            <!-- TOP BAR -->
            <header class="admin-topbar">
                <h1 class="topbar-title">@yield('page-title', 'Dashboard')</h1>
                <div class="topbar-actions">
                    <span class="topbar-user">👤 Administrador</span>
                </div>
            </header>

            <!-- CONTENT -->
            <main class="admin-content">
                @yield('content')
            </main>

        </div>

    </div>

</body>
</html>