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
                    <img src="{{ asset('images/ProductoDefault.png') }}" alt="Sin imagen">
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

                    <a href="{{ route('product.show', $product->id) }}" class="btn-ver">
                         Ver más
                    </a>

                    <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                          onsubmit="return confirm('¿Estás seguro de eliminar este producto?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn">
                            🗑️ Eliminar
                        </button>
                    </form>

                </div>

            </div>

        </div>

    @endforeach

    </div>

</main>

@endsection