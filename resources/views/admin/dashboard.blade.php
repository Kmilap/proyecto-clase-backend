@extends('admin.layout.app')

@section('page-title', 'Dashboard')

@section('content')

<!-- STATS CARDS -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon stat-blue">📦</div>
        <div>
            <div class="stat-number">{{ $totalProducts }}</div>
            <div class="stat-label">Productos</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon stat-orange">🏷️</div>
        <div>
            <div class="stat-number">{{ $totalCategories }}</div>
            <div class="stat-label">Categorías</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon stat-green">🛒</div>
        <div>
            <div class="stat-number">0</div>
            <div class="stat-label">Pedidos</div>
        </div>
    </div>
</div>

<!-- LATEST PRODUCTS TABLE -->
<div class="admin-card">
    <div class="admin-card-header">
        <h2>Últimos productos agregados</h2>
    </div>
    <table class="admin-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Categoría</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($latestProducts as $product)
                <tr>
                    <td>#{{ str_pad($product->id, 3, '0', STR_PAD_LEFT) }}</td>
                    <td>{{ $product->name }}</td>
                    <td>${{ number_format($product->price, 0, ',', '.') }}</td>
                    <td>{{ $product->category ? $product->category->name : 'Sin categoría' }}</td>
                    <td>{{ $product->created_at->format('d/m/Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center; color: #9E9089;">No hay productos aún</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection