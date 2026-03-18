@extends('admin.layout.app')

@section('page-title', 'Categorías')

@section('content')

@if(session('success'))
    <div class="admin-alert admin-alert-success">
        ✅ {{ session('success') }}
    </div>
@endif

<div class="admin-toolbar">
    <p class="toolbar-info">{{ $categories->total() }} categorías registradas</p>
    <a href="{{ route('admin.categories.create') }}" class="btn-admin-primary">+ Nueva categoría</a>
</div>

<div class="admin-card">
    <table class="admin-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Productos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>#{{ $category->id }}</td>
                    <td><strong>{{ $category->name }}</strong></td>
                    <td>{{ Str::limit($category->description, 50) }}</td>
                    <td>{{ $category->products->count() }}</td>
                    <td>
                        <div class="table-actions">
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn-table btn-edit">Editar</a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                  onsubmit="return confirm('¿Eliminar esta categoría?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-table btn-delete">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align:center; color:#9E9089; padding:2rem;">
                        No hay categorías registradas
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="admin-pagination">
    {{ $categories->links() }}
</div>

@endsection