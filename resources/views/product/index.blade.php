@extends('layout.app')

@section('content')

<!-- HERO -->
<div class="hero-banner">
    <div class="hero-text">
        <h1>Encuentra lo que<br><span>necesitas hoy</span></h1>
        <p>Los mejores productos al mejor precio.</p>
    </div>

    <a href="{{ route('product.create') }}" class="hero-cta">
        + Nuevo Producto
    </a>
</div>


<!-- MAIN -->
<main>

    <div class="section-header">
        <h2 class="section-title">
            <span></span>Listado de Productos
        </h2>

        <a href="{{ route('product.create') }}" class="add-btn">
            ＋ Agregar producto
        </a>
    </div>


    <div class="product-grid">

    @foreach ($misProductos as $product)

        <div class="product-card">

            <div class="product-img-wrap">
                @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                @else
                    <img src="data:image/jpeg;base64,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" alt="">
                @endif
                <span class="badge-estado badge-activo">Activo</span>
            </div>

            <div class="product-body">

                <div class="product-id">
                    {{ $product->id }}
                </div>

                <div class="product-name">
                    {{ $product->name }}
                </div>

                <div class="product-desc">
                    {{ $product->description }}
                </div>

                <div class="product-footer">

                    <span class="product-price">
                        ${{ number_format($product->price, 0, ',', '.') }}
                    </span>

                    <a href="#" class="btn-ver">
                        Ver más
                    </a>

                </div>

            </div>

        </div>

    @endforeach

</div>

</main>

@endsection