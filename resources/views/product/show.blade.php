<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopLaravel - Detalle del Producto</title>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --orange: #E8640A;
            --orange-dark: #C4500A;
            --orange-light: #FFF3EA;
            --dark: #1A1209;
            --gray: #6B6560;
            --light: #FAF8F5;
            --white: #FFFFFF;
            --border: #EDE8E2;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--light);
            color: var(--dark);
            min-height: 100vh;
        }

        /* ── HEADER ── */
        header {
            background: var(--dark);
            padding: 0 2.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 64px;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 2px 20px rgba(0,0,0,0.35);
        }

        .logo {
            font-family: 'Syne', sans-serif;
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--white);
            text-decoration: none;
            letter-spacing: -0.5px;
        }

        .logo span { color: var(--orange); }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 1.2rem;
        }

        .header-actions a {
            color: #B8B0A6;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 0.3px;
            transition: color 0.2s;
        }

        .header-actions a:hover { color: var(--white); }

        .btn-cart {
            background: var(--orange);
            color: var(--white) !important;
            padding: 0.45rem 1.1rem;
            border-radius: 6px;
            font-weight: 600 !important;
            transition: background 0.2s !important;
        }

        .btn-cart:hover { background: var(--orange-dark) !important; }

        /* ── NAVBAR ── */
        nav {
            background: var(--white);
            border-bottom: 1px solid var(--border);
            padding: 0 2.5rem;
            display: flex;
            align-items: center;
            gap: 0.25rem;
            height: 48px;
        }

        nav a {
            text-decoration: none;
            color: var(--gray);
            font-size: 0.875rem;
            font-weight: 500;
            padding: 0.35rem 0.85rem;
            border-radius: 6px;
            transition: all 0.2s;
        }

        nav a:hover { background: var(--orange-light); color: var(--orange); }
        nav a.active { background: var(--orange-light); color: var(--orange); font-weight: 600; }

        /* ── PAGE HEADER ── */
        .page-header {
            background: linear-gradient(135deg, var(--dark) 0%, #2D1F0D 100%);
            padding: 1.8rem 2.5rem;
            position: relative;
            overflow: hidden;
        }

        .page-header::before {
            content: '';
            position: absolute;
            right: -40px; top: -40px;
            width: 220px; height: 220px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(232,100,10,0.2) 0%, transparent 70%);
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .breadcrumb a, .breadcrumb span {
            font-size: 0.78rem;
            color: #7A6E66;
            text-decoration: none;
            transition: color 0.2s;
        }

        .breadcrumb a:hover { color: var(--orange); }
        .breadcrumb .sep { color: #4A3E35; }
        .breadcrumb .current { color: #B8B0A6; }

        /* ── MAIN ── */
        main {
            max-width: 1050px;
            margin: 2.5rem auto;
            padding: 0 1.5rem 4rem;
        }

        /* ── PRODUCT DETAIL CARD ── */
        .product-detail {
            background: var(--white);
            border-radius: 20px;
            border: 1px solid var(--border);
            overflow: hidden;
            box-shadow: 0 4px 30px rgba(26,18,9,0.07);
            display: grid;
            grid-template-columns: 420px 1fr;
        }

        /* Imagen lateral */
        .detail-img-col {
            background: var(--orange-light);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 480px;
            position: relative;
            overflow: hidden;
        }

        .detail-img-col img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .detail-img-placeholder {
            font-size: 9rem;
            line-height: 1;
            filter: drop-shadow(0 8px 24px rgba(0,0,0,0.12));
        }

        .detail-badge {
            position: absolute;
            top: 16px;
            left: 16px;
            padding: 0.28rem 0.85rem;
            border-radius: 20px;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.6px;
            text-transform: uppercase;
        }

        .badge-activo   { background: #D4EDDA; color: #1A6B3C; }
        .badge-inactivo { background: #F8D7DA; color: #842029; }

        /* Info lateral */
        .detail-info-col {
            padding: 2.5rem 2.8rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .detail-id {
            font-size: 0.72rem;
            color: #C0B5AD;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 0.6rem;
        }

        .detail-name {
            font-family: 'Syne', sans-serif;
            font-size: 2rem;
            font-weight: 800;
            color: var(--dark);
            line-height: 1.2;
            margin-bottom: 0.5rem;
        }

        .detail-divider {
            width: 48px;
            height: 3px;
            background: var(--orange);
            border-radius: 2px;
            margin: 1.2rem 0;
        }

        .detail-label {
            font-size: 0.72rem;
            font-weight: 700;
            color: #B0A89E;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            margin-bottom: 0.35rem;
        }

        .detail-desc {
            font-size: 0.95rem;
            color: var(--gray);
            line-height: 1.75;
            margin-bottom: 2rem;
        }

        /* Precio grande */
        .price-block {
            background: var(--orange-light);
            border: 1px solid #F0D9C5;
            border-radius: 12px;
            padding: 1.1rem 1.4rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.8rem;
        }

        .price-label {
            font-size: 0.75rem;
            color: var(--orange-dark);
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .price-value {
            font-family: 'Syne', sans-serif;
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--orange);
            line-height: 1;
        }

        /* Ficha técnica */
        .detail-meta {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.8rem;
            margin-bottom: 2rem;
        }

        .meta-item {
            background: var(--light);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 0.8rem 1rem;
        }

        .meta-item .meta-key {
            font-size: 0.68rem;
            font-weight: 700;
            color: #B0A89E;
            letter-spacing: 0.6px;
            text-transform: uppercase;
            margin-bottom: 0.2rem;
        }

        .meta-item .meta-val {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--dark);
        }

        /* Acciones */
        .detail-actions {
            display: flex;
            gap: 0.9rem;
        }

        .btn-comprar {
            flex: 1;
            background: var(--orange);
            color: var(--white);
            border: none;
            padding: 0.85rem 1.5rem;
            border-radius: 10px;
            font-family: 'Syne', sans-serif;
            font-size: 0.95rem;
            font-weight: 700;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            transition: background 0.2s, transform 0.15s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.4rem;
        }

        .btn-comprar:hover { background: var(--orange-dark); transform: translateY(-2px); }

        .btn-volver {
            background: var(--white);
            color: var(--dark);
            border: 1.5px solid var(--border);
            padding: 0.85rem 1.3rem;
            border-radius: 10px;
            font-size: 0.88rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 0.4rem;
            white-space: nowrap;
        }

        .btn-volver:hover { border-color: var(--dark); background: var(--light); }

        /* ── FOOTER ── */
        footer {
            background: var(--dark);
            color: #7A6E66;
            text-align: center;
            padding: 1.8rem 2rem;
            font-size: 0.82rem;
        }

        footer strong { color: var(--orange); }

        @media (max-width: 760px) {
            .product-detail { grid-template-columns: 1fr; }
            .detail-img-col { min-height: 280px; }
            .detail-info-col { padding: 1.8rem 1.4rem; }
            .detail-name { font-size: 1.5rem; }
        }
    </style>
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

<!-- NAVBAR -->
<nav>
    <a href="{{ route('products.index') }}" class="active">Productos</a>
    <a href="{{ route('products.create') }}">Agregar Producto</a>
    <a href="#">Categorías</a>
    <a href="#">Ofertas</a>
    <a href="#">Contacto</a>
</nav>

<!-- PAGE HEADER -->
<div class="page-header">
    <div class="breadcrumb">
        <a href="{{ route('products.index') }}">Productos</a>
        <span class="sep">›</span>
        {{-- Si usas variable de Laravel: <span class="current">{{ $producto->nombre }}</span> --}}
        <span class="current">Zapatillas Running Pro</span>
    </div>
</div>

<!-- MAIN -->
<main>

    <div class="product-detail">

        {{-- COLUMNA IMAGEN --}}
        <div class="detail-img-col">
            {{-- Si usas variable de Laravel: --}}
            {{-- @if($producto->imagen) --}}
            {{--     <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}"> --}}
            {{-- @else --}}
                <span class="detail-img-placeholder">👟</span>
            {{-- @endif --}}

            {{-- Badge de estado --}}
            <span class="detail-badge badge-activo">Activo</span>
            {{-- Con Laravel: --}}
            {{-- <span class="detail-badge {{ $producto->estado === 'activo' ? 'badge-activo' : 'badge-inactivo' }}">{{ ucfirst($producto->estado) }}</span> --}}
        </div>

        {{-- COLUMNA INFO --}}
        <div class="detail-info-col">

            <div>
                {{-- ID --}}
                <div class="detail-id">
                    Producto #001
                    {{-- Con Laravel: Producto #{{ str_pad($producto->id_producto, 3, '0', STR_PAD_LEFT) }} --}}
                </div>

                {{-- Nombre --}}
                <h1 class="detail-name">
                    Zapatillas Running Pro
                    {{-- Con Laravel: {{ $producto->nombre }} --}}
                </h1>

                <div class="detail-divider"></div>

                {{-- Descripción --}}
                <div class="detail-label">Descripción</div>
                <p class="detail-desc">
                    Zapatillas deportivas con amortiguación avanzada y suela antideslizante.
                    Diseñadas para corredores exigentes que buscan rendimiento y comodidad
                    en cada pisada. Material transpirable y plantilla ergonómica.
                    {{-- Con Laravel: {{ $producto->descripcion }} --}}
                </p>

                {{-- Precio --}}
                <div class="price-block">
                    <div>
                        <div class="price-label">Precio</div>
                        <div class="price-value">$129.900</div>
                        {{-- Con Laravel: <div class="price-value">${{ number_format($producto->precio, 0, ',', '.') }}</div> --}}
                    </div>
                    <span style="font-size:2rem">🏷️</span>
                </div>

                {{-- Ficha técnica --}}
                <div class="detail-meta">
                    <div class="meta-item">
                        <div class="meta-key">ID Producto</div>
                        <div class="meta-val">#001</div>
                        {{-- Con Laravel: <div class="meta-val">#{{ $producto->id_producto }}</div> --}}
                    </div>
                    <div class="meta-item">
                        <div class="meta-key">Estado</div>
                        <div class="meta-val">✅ Activo</div>
                        {{-- Con Laravel: <div class="meta-val">{{ $producto->estado === 'activo' ? '✅ Activo' : '❌ Inactivo' }}</div> --}}
                    </div>
                    <div class="meta-item">
                        <div class="meta-key">Categoría</div>
                        <div class="meta-val">Deportes</div>
                    </div>
                    <div class="meta-item">
                        <div class="meta-key">Disponibilidad</div>
                        <div class="meta-val">En stock</div>
                    </div>
                </div>
            </div>

            {{-- Acciones --}}
            <div class="detail-actions">
                <a href="{{ route('products.index') }}" class="btn-volver">
                    ← Volver
                </a>
                <a href="#" class="btn-comprar">
                    🛒 Agregar al carrito
                </a>
            </div>

        </div>
    </div>

</main>

<!-- FOOTER -->
<footer>
    <p>&copy; 2024 <strong>ShopLaravel</strong> — Proyecto académico MVC · Todos los derechos reservados.</p>
</footer>

</body>
</html>