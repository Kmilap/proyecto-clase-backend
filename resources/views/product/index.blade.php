@extends('layout.app')

@section('content')

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
        <a href="{{ route('products.create') }}" class="add-btn">＋ Agregar producto</a>
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

@endsection