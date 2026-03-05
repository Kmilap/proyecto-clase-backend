<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopLaravel - Productos</title>
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

        .btn-cart:hover { background: var(--orange-dark) !important; color: var(--white) !important; }

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

        /* ── HERO BANNER ── */
        .hero-banner {
            background: linear-gradient(135deg, var(--dark) 0%, #2D1F0D 100%);
            padding: 3rem 2.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            overflow: hidden;
            position: relative;
        }

        .hero-banner::before {
            content: '';
            position: absolute;
            right: -60px; top: -60px;
            width: 300px; height: 300px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(232,100,10,0.25) 0%, transparent 70%);
        }

        .hero-text h1 {
            font-family: 'Syne', sans-serif;
            font-size: 2.4rem;
            font-weight: 800;
            color: var(--white);
            line-height: 1.1;
        }

        .hero-text h1 span { color: var(--orange); }

        .hero-text p {
            margin-top: 0.6rem;
            color: #9E9089;
            font-size: 0.95rem;
        }

        .hero-cta {
            background: var(--orange);
            color: var(--white);
            border: none;
            padding: 0.75rem 1.8rem;
            border-radius: 8px;
            font-family: 'Syne', sans-serif;
            font-size: 0.95rem;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.2s, transform 0.15s;
            white-space: nowrap;
        }

        .hero-cta:hover { background: var(--orange-dark); transform: translateY(-2px); }

        /* ── MAIN CONTENT ── */
        main { max-width: 1200px; margin: 0 auto; padding: 2.5rem 1.5rem; }

        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.8rem;
        }

        .section-title {
            font-family: 'Syne', sans-serif;
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--dark);
        }

        .section-title span {
            display: inline-block;
            width: 10px; height: 10px;
            background: var(--orange);
            border-radius: 50%;
            margin-right: 0.5rem;
            vertical-align: middle;
        }

        .add-btn {
            background: var(--orange);
            color: var(--white);
            text-decoration: none;
            padding: 0.55rem 1.2rem;
            border-radius: 7px;
            font-size: 0.85rem;
            font-weight: 600;
            transition: background 0.2s, transform 0.15s;
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }

        .add-btn:hover { background: var(--orange-dark); transform: translateY(-1px); }

        /* ── PRODUCT GRID ── */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.8rem;
        }

        .product-card {
            background: var(--white);
            border-radius: 18px;
            overflow: hidden;
            border: 1px solid var(--border);
            transition: transform 0.28s, box-shadow 0.28s;
            display: flex;
            flex-direction: column;
            box-shadow: 0 2px 8px rgba(26,18,9,0.05);
        }

        .product-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 22px 48px rgba(26,18,9,0.13);
        }

        .product-img-wrap {
            width: 100%;
            height: 220px;
            background: var(--orange-light);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
            flex-shrink: 0;
        }

        .product-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s;
        }

        .product-card:hover .product-img-wrap img { transform: scale(1.05); }

        .product-img-placeholder {
            font-size: 5.5rem;
            line-height: 1;
            filter: drop-shadow(0 4px 12px rgba(0,0,0,0.08));
        }

        .badge-estado {
            position: absolute;
            top: 12px;
            left: 12px;
            padding: 0.22rem 0.7rem;
            border-radius: 20px;
            font-size: 0.67rem;
            font-weight: 700;
            letter-spacing: 0.6px;
            text-transform: uppercase;
        }

        .badge-activo  { background: #D4EDDA; color: #1A6B3C; }
        .badge-inactivo{ background: #F8D7DA; color: #842029; }

        .product-body {
            padding: 1.3rem 1.4rem 1.4rem;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .product-id {
            font-size: 0.7rem;
            color: #C0B5AD;
            font-weight: 500;
            margin-bottom: 0.3rem;
            letter-spacing: 0.5px;
        }

        .product-name {
            font-family: 'Syne', sans-serif;
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 0.5rem;
            line-height: 1.3;
        }

        .product-desc {
            font-size: 0.85rem;
            color: var(--gray);
            line-height: 1.6;
            flex: 1;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            margin-bottom: 1.2rem;
        }

        .product-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding-top: 1rem;
            border-top: 1px solid var(--border);
        }

        .product-price {
            font-family: 'Syne', sans-serif;
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--orange);
        }

        .btn-ver {
            background: var(--dark);
            color: var(--white);
            text-decoration: none;
            padding: 0.55rem 1.2rem;
            border-radius: 8px;
            font-size: 0.82rem;
            font-weight: 600;
            white-space: nowrap;
            transition: background 0.2s, transform 0.15s;
            flex-shrink: 0;
        }

        .btn-ver:hover { background: var(--orange); transform: translateY(-1px); }

        /* ── FOOTER ── */
        footer {
            background: var(--dark);
            color: #7A6E66;
            text-align: center;
            padding: 1.8rem 2rem;
            margin-top: 4rem;
            font-size: 0.82rem;
        }

        footer strong { color: var(--orange); }
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

<!-- HERO -->
<div class="hero-banner">
    <div class="hero-text">
        <h1>Encuentra lo que<br><span>necesitas hoy</span></h1>
        <p>Los mejores productos al mejor precio.</p>
    </div>
    <a href="{{ route('products.create') }}" class="hero-cta">+ Nuevo Producto</a>
</div>

<!-- MAIN -->
<main>
    <div class="section-header">
        <h2 class="section-title"><span></span>Listado de Productos</h2>
        <a href="{{ route('products.create') }}" class="add-btn">
            ＋ Agregar producto
        </a>
    </div>

    <div class="product-grid">

        {{-- PRODUCTO 1 --}}
        <div class="product-card">
            <div class="product-img-wrap">
                <span class="product-img-placeholder">👟</span>
                <span class="badge-estado badge-activo">Activo</span>
            </div>
            <div class="product-body">
                <div class="product-id">#001</div>
                <div class="product-name">Zapatillas Running Pro</div>
                <div class="product-desc">Zapatillas deportivas con amortiguación avanzada y suela antideslizante.</div>
                <div class="product-footer">
                    <span class="product-price">$129.900</span>
                    <a href="#" class="btn-ver">Ver más</a>
                </div>
            </div>
        </div>

        {{-- PRODUCTO 2 --}}
        <div class="product-card">
            <div class="product-img-wrap">
                <span class="product-img-placeholder">🎧</span>
                <span class="badge-estado badge-activo">Activo</span>
            </div>
            <div class="product-body">
                <div class="product-id">#002</div>
                <div class="product-name">Audífonos Bluetooth X5</div>
                <div class="product-desc">Sonido envolvente, cancelación de ruido y hasta 30h de batería.</div>
                <div class="product-footer">
                    <span class="product-price">$89.900</span>
                    <a href="#" class="btn-ver">Ver más</a>
                </div>
            </div>
        </div>

        {{-- PRODUCTO 3 --}}
        <div class="product-card">
            <div class="product-img-wrap">
                <span class="product-img-placeholder">⌚</span>
                <span class="badge-estado badge-activo">Activo</span>
            </div>
            <div class="product-body">
                <div class="product-id">#003</div>
                <div class="product-name">Smartwatch Serie 7</div>
                <div class="product-desc">Monitor cardíaco, GPS integrado y pantalla AMOLED de alta resolución.</div>
                <div class="product-footer">
                    <span class="product-price">$215.000</span>
                    <a href="#" class="btn-ver">Ver más</a>
                </div>
            </div>
        </div>

        {{-- PRODUCTO 4 --}}
        <div class="product-card">
            <div class="product-img-wrap">
                <span class="product-img-placeholder">💻</span>
                <span class="badge-estado badge-inactivo">Inactivo</span>
            </div>
            <div class="product-body">
                <div class="product-id">#004</div>
                <div class="product-name">Laptop UltraSlim 14"</div>
                <div class="product-desc">Procesador i7, 16GB RAM, SSD 512GB. Ideal para trabajo y estudio.</div>
                <div class="product-footer">
                    <span class="product-price">$1.899.000</span>
                    <a href="#" class="btn-ver">Ver más</a>
                </div>
            </div>
        </div>

        {{-- PRODUCTO 5 --}}
        <div class="product-card">
            <div class="product-img-wrap">
                <span class="product-img-placeholder">🎮</span>
                <span class="badge-estado badge-activo">Activo</span>
            </div>
            <div class="product-body">
                <div class="product-id">#005</div>
                <div class="product-name">Control Gamer Pro</div>
                <div class="product-desc">Compatible con PC y consolas, vibración háptica y conectividad inalámbrica.</div>
                <div class="product-footer">
                    <span class="product-price">$75.500</span>
                    <a href="#" class="btn-ver">Ver más</a>
                </div>
            </div>
        </div>

    </div>
</main>

<!-- FOOTER -->
<footer>
    <p>&copy; 2026 <strong>ShopLaravel</strong> — Proyecto académico MVC · Todos los derechos reservados.</p>
</footer>

</body>
</html>