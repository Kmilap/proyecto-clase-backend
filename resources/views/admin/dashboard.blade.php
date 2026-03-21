@extends('admin.layout.app')

@section('page-title', 'Dashboard')

@section('content')

<!-- STATS CARDS -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-card-left">
            <div class="stat-number">{{ number_format($totalProducts) }}</div>
            <div class="stat-label">Productos registrados</div>
        </div>
        <div class="stat-icon-lg stat-blue">📦</div>
    </div>
    <div class="stat-card">
        <div class="stat-card-left">
            <div class="stat-number">{{ number_format($totalCategories) }}</div>
            <div class="stat-label">Categorías activas</div>
        </div>
        <div class="stat-icon-lg stat-orange">🏷️</div>
    </div>
    <div class="stat-card">
        <div class="stat-card-left">
            <div class="stat-number">0</div>
            <div class="stat-label">Pedidos</div>
        </div>
        <div class="stat-icon-lg stat-green">🛒</div>
    </div>
</div>

<!-- CHARTS -->
<div class="charts-grid">
    <div class="admin-card">
        <div class="admin-card-header">
            <h2>Productos creados por fecha</h2>
        </div>
        <div class="chart-container">
            <canvas id="productsByDateChart"></canvas>
        </div>
    </div>
    <div class="admin-card">
        <div class="admin-card-header">
            <h2>Distribución de precios</h2>
        </div>
        <div class="chart-container">
            <canvas id="priceDistChart"></canvas>
        </div>
    </div>
</div>

<!-- LATEST PRODUCTS TABLE -->
<div class="admin-card" style="margin-top: 1.5rem;">
    <div class="admin-card-header">
        <h2>Últimos productos agregados</h2>
    </div>
    <table class="admin-table admin-table-striped">
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
                    <td class="td-id">#{{ str_pad($product->id, 3, '0', STR_PAD_LEFT) }}</td>
                    <td class="td-name">{{ $product->name }}</td>
                    <td class="td-price">${{ number_format($product->price, 0, ',', '.') }}</td>
                    <td>
                        <span class="category-badge">{{ $product->category ? $product->category->name : 'Sin categoría' }}</span>
                    </td>
                    <td class="td-date">{{ $product->created_at->format('d/m/Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center; color: #9E9089; padding: 2rem;">No hay productos aún</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Chart.js  -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // GRÁFICA 1: Línea de tiempo - Productos creados por fecha
    const dateLabels = {!! json_encode($productsByDate->pluck('date')) !!};
    const dateTotals = {!! json_encode($productsByDate->pluck('total')) !!};

    new Chart(document.getElementById('productsByDateChart'), {
        type: 'line',
        data: {
            labels: dateLabels,
            datasets: [{
                label: 'Productos creados',
                data: dateTotals,
                borderColor: '#E8640A',
                backgroundColor: 'rgba(232, 100, 10, 0.1)',
                fill: true,
                tension: 0.4,
                borderWidth: 2.5,
                pointBackgroundColor: '#E8640A',
                pointBorderColor: '#fff',
                pointBorderWidth: 2,
                pointRadius: 5,
                pointHoverRadius: 7
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#1A1209',
                    titleColor: '#E8640A',
                    bodyColor: '#fff',
                    padding: 12,
                    cornerRadius: 8
                }
            },
            scales: {
                x: {
                    grid: { display: false },
                    ticks: { color: '#B0A89E', font: { size: 11 } }
                },
                y: {
                    beginAtZero: true,
                    grid: { color: 'rgba(237, 232, 226, 0.5)' },
                    ticks: { color: '#B0A89E', font: { size: 11 }, stepSize: 1 }
                }
            }
        }
    });

    // GRÁFICA 2: Dona - Distribución de precios
    const priceLabels = {!! json_encode(array_keys($priceRanges)) !!};
    const priceTotals = {!! json_encode(array_values($priceRanges)) !!};

    new Chart(document.getElementById('priceDistChart'), {
        type: 'doughnut',
        data: {
            labels: priceLabels,
            datasets: [{
                data: priceTotals,
                backgroundColor: ['#E8640A', '#F59E3F', '#1A5FA8', '#198754', '#6F42C1'],
                borderWidth: 0,
                hoverOffset: 8
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '65%',
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 16,
                        usePointStyle: true,
                        pointStyle: 'circle',
                        color: '#6B6560',
                        font: { size: 11, family: 'DM Sans' }
                    }
                },
                tooltip: {
                    backgroundColor: '#1A1209',
                    titleColor: '#E8640A',
                    bodyColor: '#fff',
                    padding: 12,
                    cornerRadius: 8
                }
            }
        }
    });
</script>

@endsection