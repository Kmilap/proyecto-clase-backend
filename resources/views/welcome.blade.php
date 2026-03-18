@extends('layout.app')

@section('content')

<!-- HERO LANDING -->
<section class="landing-hero">
    <div class="landing-hero-content">
        <span class="landing-badge">🔥 Nueva colección disponible</span>
        <h1>Tu estilo,<br><span>tu elección</span></h1>
        <p>Descubre productos únicos con los mejores precios. Calidad que se nota, precios que enamoran.</p>
        <div class="landing-hero-actions">
            <a href="{{ route('product.index') }}" class="btn-hero-primary">Explorar catálogo →</a>
            <a href="#categorias" class="btn-hero-secondary">Ver categorías</a>
        </div>
    </div>
    <div class="landing-hero-visual">
        <div class="hero-card-stack">
            <div class="hero-floating-card card-1">🛍️</div>
            <div class="hero-floating-card card-2">⭐</div>
            <div class="hero-floating-card card-3">🚀</div>
        </div>
    </div>
</section>

<!-- PRODUCTOS DESTACADOS -->
<section class="landing-section">
    <div class="landing-container">
        <div class="section-header">
            <h2 class="section-title">
                <span></span>Productos destacados
            </h2>
            <a href="{{ route('product.index') }}" class="add-btn">
                Ver todos →
            </a>
        </div>

        @if($featuredProducts->count() > 0)
            <div class="landing-product-grid">
                @foreach ($featuredProducts as $product)
                    <div class="product-card">
                        <div class="product-img-wrap">
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                            @else
                                <div class="product-img-placeholder">📦</div>
                            @endif
                        </div>
                        <div class="product-body">
                            <div class="product-name">{{ $product->name }}</div>
                            <div class="product-desc">{{ $product->description }}</div>
                            <div class="product-footer">
                                <span class="product-price">${{ number_format($product->price, 0, ',', '.') }}</span>
                                <a href="{{ route('product.index') }}" class="btn-ver">Ver más</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="landing-empty">
                <p>🏪 Aún no hay productos. ¡Sé el primero en agregar uno!</p>
                <a href="{{ route('product.create') }}" class="btn-hero-primary">+ Crear producto</a>
            </div>
        @endif
    </div>
</section>

<!-- BANNER PROMOCIONAL -->
<section class="landing-banner">
    <div class="landing-container">
        <div class="banner-content">
            <div class="banner-icon">🎁</div>
            <div>
                <h3>Envío gratis en tu primera compra</h3>
                <p>Aplica para todos los productos del catálogo. Sin mínimo de compra.</p>
            </div>
            <a href="{{ route('product.index') }}" class="btn-banner">Comprar ahora</a>
        </div>
    </div>
</section>

<!-- CATEGORÍAS -->
<section class="landing-section" id="categorias">
    <div class="landing-container">
        <div class="section-header">
            <h2 class="section-title">
                <span></span>Explora por categoría
            </h2>
        </div>

        @if($categories->count() > 0)
            <div class="landing-categories-grid">
                @foreach ($categories as $category)
                    <div class="category-card">
                        <div class="category-icon">🏷️</div>
                        <h3>{{ $category->name }}</h3>
                        <p>{{ Str::limit($category->description, 60) }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <div class="landing-empty">
                <p>📂 No hay categorías registradas aún.</p>
            </div>
        @endif
    </div>
</section>

<!-- CTA FINAL -->
<section class="landing-cta">
    <h2>¿Listo para encontrar lo que buscas?</h2>
    <p>Miles de productos esperan por ti.</p>
    <a href="{{ route('product.index') }}" class="btn-hero-primary">Ir al catálogo →</a>
</section>

@endsection