@extends('admin.layout.app')

@section('page-title', 'Nueva categoría')

@section('content')

<div class="admin-form-card">
    <div class="admin-form-header">
        <h2>🏷️ Crear categoría</h2>
        <p>Completa los campos para registrar una nueva categoría</p>
    </div>

    <div class="admin-form-body">

        @if($errors->any())
            <div class="admin-alert admin-alert-error">
                <strong>⚠ Corrige los siguientes errores:</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf

            <div class="admin-form-group">
                <label for="name">Nombre <span class="req">*</span></label>
                <input type="text" id="name" name="name"
                       placeholder="Ej: Electrónica, Ropa, Deportes"
                       value="{{ old('name') }}">
            </div>

            <div class="admin-form-group">
                <label for="description">Descripción <span class="req">*</span></label>
                <textarea id="description" name="description"
                          placeholder="Describe brevemente esta categoría...">{{ old('description') }}</textarea>
            </div>

            <div class="admin-form-actions">
                <a href="{{ route('admin.categories.index') }}" class="btn-admin-secondary">Cancelar</a>
                <button type="submit" class="btn-admin-primary">💾 Guardar categoría</button>
            </div>
        </form>
    </div>
</div>

@endsection