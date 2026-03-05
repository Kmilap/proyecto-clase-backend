<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopLaravel - Nuevo Producto</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<!-- HEADER -->
<header>
    <a class="logo" href="#">Shop<span>Laravel</span></a>
    <div class="header-actions">
        <a href="#">Inicio</a>
        <a href="#">Mi cuenta</a>
        <a href="#" class="btn-cart">🛒 Carrito</a>
    </div>
</header>

<!-- NAVBAR -->
<nav>
    <a href="{{ route('products.index') }}">Productos</a>
    <a href="{{ route('products.create') }}" class="active">Agregar Producto</a>
    <a href="#">Categorías</a>
    <a href="#">Ofertas</a>
    <a href="#">Contacto</a>
</nav>

<!-- PAGE HEADER -->
<div class="page-header">
    <div class="breadcrumb">
        <a href="{{ route('products.index') }}">Productos</a>
        <span class="sep">›</span>
        <span class="current">Nuevo producto</span>
    </div>
    <h1>Agregar <span>Producto</span></h1>
</div>

<!-- MAIN -->
<div class="form-main">

    @if(session('success'))
        <div class="alert-success">✅ {{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert-error">
            <strong>⚠ Por favor corrige los siguientes errores:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-card">
        <div class="form-card-header">
            <div class="icon">📦</div>
            <div>
                <h2>Información del Producto</h2>
                <p>Completa todos los campos requeridos</p>
            </div>
        </div>

        <div class="form-body">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-row">
                    <div class="form-group">
                        <label for="nombre">Nombre <span class="req">*</span></label>
                        <input type="text" id="nombre" name="nombre"
                               placeholder="Ej: Zapatillas Running Pro"
                               value="{{ old('nombre') }}" required>
                        @error('nombre')
                            <div class="field-hint" style="color:#DC3545">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="precio">Precio <span class="req">*</span></label>
                        <input type="number" id="precio" name="precio"
                               placeholder="Ej: 129900" min="0" step="0.01"
                               value="{{ old('precio') }}" required>
                        <div class="field-hint">Ingresa el precio sin puntos ni comas</div>
                        @error('precio')
                            <div class="field-hint" style="color:#DC3545">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción <span class="req">*</span></label>
                    <textarea id="descripcion" name="descripcion"
                              placeholder="Describe las características principales del producto..."
                              required>{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <div class="field-hint" style="color:#DC3545">{{ $message }}</div>
                    @enderror
                </div>

                <hr class="form-divider">

                <div class="form-group">
                    <label for="imagen">Imagen del Producto</label>
                    <input type="file" id="imagen" name="imagen"
                           accept="image/*" onchange="previewImage(event)">
                    <div class="field-hint">Formatos: JPG, PNG, WEBP. Máximo 2MB.</div>
                    @error('imagen')
                        <div class="field-hint" style="color:#DC3545">{{ $message }}</div>
                    @enderror

                    <div class="image-preview-wrap" id="preview-wrap">
                        <img id="preview-img" src="#" alt="Vista previa">
                        <div class="preview-placeholder" id="preview-placeholder">
                            <span>🖼️</span>
                            Vista previa de la imagen
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="estado">Estado <span class="req">*</span></label>
                    <select id="estado" name="estado" required>
                        <option value="" disabled selected>— Selecciona el estado —</option>
                        <option value="activo"   {{ old('estado') === 'activo'   ? 'selected' : '' }}>✅ Activo</option>
                        <option value="inactivo" {{ old('estado') === 'inactivo' ? 'selected' : '' }}>❌ Inactivo</option>
                    </select>
                    @error('estado')
                        <div class="field-hint" style="color:#DC3545">{{ $message }}</div>
                    @enderror
                </div>

                <hr class="form-divider">

                <div class="form-actions">
                    <a href="{{ route('products.index') }}" class="btn-cancel">Cancelar</a>
                    <button type="submit" class="btn-submit">💾 Guardar Producto</button>
                </div>

            </form>
        </div>
    </div>

</div>

<!-- FOOTER -->
<footer>
    <p>&copy; 2024 <strong>ShopLaravel</strong> — Proyecto académico MVC · Todos los derechos reservados.</p>
</footer>

<script>
    function previewImage(event) {
        const file = event.target.files[0];
        const img = document.getElementById('preview-img');
        const placeholder = document.getElementById('preview-placeholder');
        if (file) {
            const reader = new FileReader();
            reader.onload = e => {
                img.src = e.target.result;
                img.style.display = 'block';
                placeholder.style.display = 'none';
            };
            reader.readAsDataURL(file);
        } else {
            img.style.display = 'none';
            placeholder.style.display = 'block';
        }
    }
</script>

</body>
</html>