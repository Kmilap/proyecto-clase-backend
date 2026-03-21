@extends('layout.app')

@section('content')

<div class="page-header">
    <div class="breadcrumb">
        <a href="{{ route('product.index') }}">Productos</a>
        <span class="sep">›</span>
        <span class="current">Mi carrito</span>
    </div>
    <h1>Tu <span>Carrito</span></h1>
</div>

<div class="cart-main">

    @if(session('success'))
        <div class="alert-success">✅ {{ session('success') }}</div>
    @endif

    @if($cartItems->count() > 0)

        <div class="cart-card">
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $item)
                        <tr>
                            <td>
                                <div class="cart-product-info">
                                    <div class="cart-product-img">
                                        @if($item->product->image)
                                            <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}">
                                        @else
                                            <img src="{{ asset('images/ProductoDefault.png') }}" alt="Sin imagen">
                                        @endif
                                    </div>
                                    <div>
                                        <div class="cart-product-name">{{ $item->product->name }}</div>
                                        <div class="cart-product-cat">{{ $item->product->category ? $item->product->category->name : '' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>${{ number_format($item->product->price, 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('cart.update', $item->id) }}" method="POST" class="cart-qty-form">
                                    @csrf
                                    @method('PATCH')
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="cart-qty-input" onchange="this.form.submit()">
                                </form>
                            </td>
                            <td class="cart-subtotal">${{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="cart-remove-btn">✕</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="cart-footer">
                <div class="cart-total">
                    <span>Total:</span>
                    <span class="cart-total-value">${{ number_format($total, 0, ',', '.') }}</span>
                </div>
            </div>
        </div>

        <div class="cart-actions">
            <a href="{{ route('product.index') }}" class="btn-volver">← Seguir comprando</a>
        </div>

    @else
        <div class="cart-empty">
            <div class="cart-empty-icon">🛒</div>
            <h2>Tu carrito está vacío</h2>
            <p>Agrega productos desde el catálogo para comenzar.</p>
            <a href="{{ route('product.index') }}" class="btn-hero-primary">Explorar productos →</a>
        </div>
    @endif

</div>

@endsection