@extends('layout.app')

@section('content')

<!-- PAGE HEADER -->
<div class="page-header">
    <div class="breadcrumb">
        <a href="{{ route('product.index') }}">Productos</a>
        <span class="sep">›</span>
        <span class="current">{{ $producto->name }}</span>
    </div>
</div>

<!-- MAIN -->
<div class="show-main">
    <div class="product-detail">

        <!-- COLUMNA IMAGEN -->
        <div class="detail-img-col">
            @if($producto->image)
                <img src="{{ asset('storage/' . $producto->image) }}" alt="{{ $producto->name }}">
            @else
                <img src="{{ asset('images/ProductoDefault.png') }}" alt="Sin imagen">
            @endif
            <span class="detail-badge badge-activo">Activo</span>
        </div>

        <!-- COLUMNA INFO -->
        <div class="detail-info-col">
            <div>
                <div class="detail-id">
                    Producto #{{ str_pad($producto->id, 3, '0', STR_PAD_LEFT) }}
                </div>

                <h1 class="detail-name">
                    {{ $producto->name }}
                </h1>

                <div class="detail-divider"></div>

                <div class="detail-label">Descripción</div>
                <p class="detail-desc">
                    {{ $producto->description }}
                </p>

                <div class="price-block">
                    <div>
                        <div class="price-label">Precio</div>
                        <div class="price-value">${{ number_format($producto->price, 0, ',', '.') }}</div>
                    </div>
                    <span style="font-size:2rem">🏷️</span>
                </div>

                <div class="detail-meta">
                    <div class="meta-item">
                        <div class="meta-key">ID Producto</div>
                        <div class="meta-val">#{{ str_pad($producto->id, 3, '0', STR_PAD_LEFT) }}</div>
                    </div>
                    <div class="meta-item">
                        <div class="meta-key">Estado</div>
                        <div class="meta-val">✅ Activo</div>
                    </div>
                    <div class="meta-item">
                        <div class="meta-key">Categoría</div>
                        <div class="meta-val">{{ $producto->category ? $producto->category->name : 'Sin categoría' }}</div>
                    </div>
                    <div class="meta-item">
                        <div class="meta-key">Disponibilidad</div>
                        <div class="meta-val">En stock</div>
                    </div>
                </div>
            </div>

            <div class="detail-actions">
                <a href="{{ route('product.index') }}" class="btn-volver">← Volver</a>
                @auth
                    <form action="{{ route('cart.store') }}" method="POST" style="flex:1;">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $producto->id }}">
                        <button type="submit" class="btn-comprar" style="width:100%;">🛒 Agregar al carrito</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn-comprar">🔒 Inicia sesión para comprar</a>
                @endauth
            </div>
        </div>

    </div>
</div>

@endsection