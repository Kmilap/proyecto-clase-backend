@extends('admin.layout.app')

@section('page-title', 'Editar categoría')

@section('content')

<div class="admin-form-card">
    <div class="admin-form-header">
        <h2>✏️ Editar categoría</h2>
        <p>Modifica los datos de "{{ $category->name }}"</p>
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

        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="admin-form-group">
                <label for="name">Nombre <span class="req">*</span></label>
                <input type="text" id="name" name="name"
                       value="{{ old('name', $category->name) }}">
            </div>

            <div class="admin-form-group">
                <label for="description">Descripción <span class="req">*</span></label>
                <textarea id="description" name="description">{{ old('description', $category->description) }}</textarea>
            </div>

            <div class="admin-form-actions">
                <a href="{{ route('admin.categories.index') }}" class="btn-admin-secondary">Cancelar</a>
                <button type="submit" class="btn-admin-primary">💾 Actualizar categoría</button>
            </div>
        </form>
    </div>
</div>

@endsection