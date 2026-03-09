@extends('layout.app')

@section('content')

<!-- PAGE HEADER -->
<div class="page-header">
    <div class="breadcrumb">
        <a href="{{ route('product.index') }}">Productos</a>
        <span class="sep">›</span>
        <span class="current">Zapatillas Running Pro</span>
        {{-- Con Laravel: <span class="current">{{ $producto->nombre }}</span> --}}
    </div>
</div>

<!-- MAIN -->
<div class="show-main">

    <div class="product-detail">

        <!-- COLUMNA IMAGEN -->
        <div class="detail-img-col">
            {{-- @if($producto->imagen)
                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}">
            @else --}}
                <span class="detail-img-placeholder">👟</span>
            {{-- @endif --}}
            <span class="detail-badge badge-activo">Activo</span>
            {{-- Con Laravel:
            <span class="detail-badge {{ $producto->estado === 'activo' ? 'badge-activo' : 'badge-inactivo' }}">
                {{ ucfirst($producto->estado) }}
            </span> --}}
        </div>

        <!-- COLUMNA INFO -->
        <div class="detail-info-col">
            <div>
                <div class="detail-id">
                    Producto #001
                    {{-- Con Laravel: Producto #{{ str_pad($producto->id_producto, 3, '0', STR_PAD_LEFT) }} --}}
                </div>

                <h1 class="detail-name">
                    Zapatillas Running Pro
                    {{-- Con Laravel: {{ $producto->nombre }} --}}
                </h1>

                <div class="detail-divider"></div>

                <div class="detail-label">Descripción</div>
                <p class="detail-desc">
                    Zapatillas deportivas con amortiguación avanzada y suela antideslizante.
                    Diseñadas para corredores que buscan rendimiento y comodidad en cada pisada.
                    {{-- Con Laravel: {{ $producto->descripcion }} --}}
                </p>

                <div class="price-block">
                    <div>
                        <div class="price-label">Precio</div>
                        <div class="price-value">$129.900</div>
                        {{-- Con Laravel: <div class="price-value">${{ number_format($producto->precio, 0, ',', '.') }}</div> --}}
                    </div>
                    <span style="font-size:2rem">🏷️</span>
                </div>

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

            <div class="detail-actions">
                <a href="{{ route('product.index') }}" class="btn-volver">← Volver</a>
                <a href="#" class="btn-comprar">🛒 Agregar al carrito</a>
            </div>
        </div>

    </div>

</div>

@endsection