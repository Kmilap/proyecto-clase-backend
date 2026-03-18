<!-- NAVBAR -->
<nav>
    <a href="{{ route('product.index') }}" class="{{ request()->routeIs('product.index') ? 'active' : '' }}">Productos</a>
    <a href="{{ route('product.create') }}">Agregar Producto</a>
    <a href="#">Categorías</a>
    <a href="#">Ofertas</a>
    <a href="#">Contacto</a>
</nav>