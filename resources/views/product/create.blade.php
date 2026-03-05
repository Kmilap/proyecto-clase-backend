<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopLaravel - Nuevo Producto</title>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --orange: #E8640A;
            --orange-dark: #C4500A;
            --orange-light: #FFF3EA;
            --dark: #1A1209;
            --gray: #6B6560;
            --light: #FAF8F5;
            --white: #FFFFFF;
            --border: #EDE8E2;
            --red: #DC3545;
            --red-light: #FFF0F1;
            --green: #198754;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--light);
            color: var(--dark);
            min-height: 100vh;
        }

        /* ── HEADER (igual que index) ── */
        header {
            background: var(--dark);
            padding: 0 2.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 64px;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 2px 20px rgba(0,0,0,0.35);
        }

        .logo {
            font-family: 'Syne', sans-serif;
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--white);
            text-decoration: none;
            letter-spacing: -0.5px;
        }

        .logo span { color: var(--orange); }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 1.2rem;
        }

        .header-actions a {
            color: #B8B0A6;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 500;
            transition: color 0.2s;
        }

        .header-actions a:hover { color: var(--white); }

        .btn-cart {
            background: var(--orange);
            color: var(--white) !important;
            padding: 0.45rem 1.1rem;
            border-radius: 6px;
            font-weight: 600 !important;
            transition: background 0.2s !important;
        }

        .btn-cart:hover { background: var(--orange-dark) !important; }

        /* ── NAVBAR (igual que index) ── */
        nav {
            background: var(--white);
            border-bottom: 1px solid var(--border);
            padding: 0 2.5rem;
            display: flex;
            align-items: center;
            gap: 0.25rem;
            height: 48px;
        }

        nav a {
            text-decoration: none;
            color: var(--gray);
            font-size: 0.875rem;
            font-weight: 500;
            padding: 0.35rem 0.85rem;
            border-radius: 6px;
            transition: all 0.2s;
        }

        nav a:hover { background: var(--orange-light); color: var(--orange); }
        nav a.active { background: var(--orange-light); color: var(--orange); font-weight: 600; }

        /* ── PAGE HEADER ── */
        .page-header {
            background: linear-gradient(135deg, var(--dark) 0%, #2D1F0D 100%);
            padding: 2rem 2.5rem;
            position: relative;
            overflow: hidden;
        }

        .page-header::before {
            content: '';
            position: absolute;
            right: -40px; top: -40px;
            width: 220px; height: 220px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(232,100,10,0.2) 0%, transparent 70%);
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.5rem;
        }

        .breadcrumb a, .breadcrumb span {
            font-size: 0.78rem;
            color: #7A6E66;
            text-decoration: none;
        }

        .breadcrumb a:hover { color: var(--orange); }
        .breadcrumb .sep { color: #4A3E35; }
        .breadcrumb .current { color: var(--orange); }

        .page-header h1 {
            font-family: 'Syne', sans-serif;
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--white);
        }

        .page-header h1 span { color: var(--orange); }

        /* ── MAIN ── */
        main {
            max-width: 780px;
            margin: 2.5rem auto;
            padding: 0 1.5rem;
        }

        /* Alerts */
        .alert-success {
            background: #D1E7DD;
            color: #0A3622;
            border: 1px solid #A3CFBB;
            border-radius: 8px;
            padding: 0.9rem 1.2rem;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .alert-error {
            background: var(--red-light);
            color: var(--red);
            border: 1px solid #F5C6CB;
            border-radius: 8px;
            padding: 0.9rem 1.2rem;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }

        .alert-error ul { margin-top: 0.4rem; padding-left: 1.2rem; }
        .alert-error li { margin-bottom: 0.2rem; }

        /* Form card */
        .form-card {
            background: var(--white);
            border-radius: 16px;
            border: 1px solid var(--border);
            overflow: hidden;
            box-shadow: 0 4px 24px rgba(26,18,9,0.07);
        }

        .form-card-header {
            background: var(--orange-light);
            border-bottom: 1px solid #F0D9C5;
            padding: 1.2rem 1.8rem;
            display: flex;
            align-items: center;
            gap: 0.7rem;
        }

        .form-card-header .icon {
            width: 36px; height: 36px;
            background: var(--orange);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
        }

        .form-card-header h2 {
            font-family: 'Syne', sans-serif;
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--dark);
        }

        .form-card-header p {
            font-size: 0.78rem;
            color: var(--gray);
        }

        .form-body { padding: 2rem 1.8rem; }

        /* Form groups */
        .form-group {
            margin-bottom: 1.4rem;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.2rem;
        }

        label {
            display: block;
            font-size: 0.82rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 0.4rem;
            letter-spacing: 0.2px;
        }

        label .req { color: var(--orange); margin-left: 2px; }

        .field-hint {
            font-size: 0.72rem;
            color: #A09890;
            margin-top: 0.25rem;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"],
        textarea,
        select {
            width: 100%;
            border: 1.5px solid var(--border);
            border-radius: 8px;
            padding: 0.65rem 0.9rem;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.9rem;
            color: var(--dark);
            background: var(--light);
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
            outline: none;
        }

        input[type="file"] {
            padding: 0.55rem 0.9rem;
            cursor: pointer;
            background: var(--white);
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: var(--orange);
            box-shadow: 0 0 0 3px rgba(232,100,10,0.12);
            background: var(--white);
        }

        textarea {
            resize: vertical;
            min-height: 110px;
            line-height: 1.6;
        }

        select { cursor: pointer; }

        /* Image preview */
        .image-preview-wrap {
            margin-top: 0.8rem;
            border: 2px dashed var(--border);
            border-radius: 10px;
            padding: 1.2rem;
            text-align: center;
            background: var(--light);
            transition: border-color 0.2s;
        }

        .image-preview-wrap:has(img) { border-style: solid; border-color: var(--orange-light); }

        #preview-img {
            max-width: 180px;
            max-height: 180px;
            border-radius: 8px;
            object-fit: contain;
            display: none;
        }

        .preview-placeholder {
            color: #C0B5AD;
            font-size: 0.82rem;
        }

        .preview-placeholder span { font-size: 2rem; display: block; margin-bottom: 0.3rem; }

        /* Divider */
        .form-divider {
            border: none;
            border-top: 1px solid var(--border);
            margin: 1.8rem 0;
        }

        /* Form actions */
        .form-actions {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            align-items: center;
            padding-top: 0.5rem;
        }

        .btn-cancel {
            color: var(--gray);
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            padding: 0.65rem 1.3rem;
            border-radius: 8px;
            border: 1.5px solid var(--border);
            background: var(--white);
            transition: all 0.2s;
            cursor: pointer;
        }

        .btn-cancel:hover { border-color: var(--gray); color: var(--dark); }

        .btn-submit {
            background: var(--orange);
            color: var(--white);
            border: none;
            padding: 0.7rem 2rem;
            border-radius: 8px;
            font-family: 'Syne', sans-serif;
            font-size: 0.95rem;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.2s, transform 0.15s;
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }

        .btn-submit:hover { background: var(--orange-dark); transform: translateY(-1px); }
        .btn-submit:active { transform: translateY(0); }

        /* ── FOOTER ── */
        footer {
            background: var(--dark);
            color: #7A6E66;
            text-align: center;
            padding: 1.8rem 2rem;
            margin-top: 4rem;
            font-size: 0.82rem;
        }

        footer strong { color: var(--orange); }

        /* Responsive */
        @media (max-width: 560px) {
            .form-row { grid-template-columns: 1fr; }
            .page-header { padding: 1.5rem 1.2rem; }
            nav { padding: 0 1rem; }
            header { padding: 0 1rem; }
        }
    </style>
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
<main>

    {{-- Mensaje de éxito --}}
    @if(session('success'))
        <div class="alert-success">
            ✅ {{ session('success') }}
        </div>
    @endif

    {{-- Errores de validación --}}
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

                {{-- Fila: Nombre + Precio --}}
                <div class="form-row">
                    <div class="form-group">
                        <label for="nombre">Nombre <span class="req">*</span></label>
                        <input
                            type="text"
                            id="nombre"
                            name="nombre"
                            placeholder="Ej: Zapatillas Running Pro"
                            value="{{ old('nombre') }}"
                            required
                        >
                        @error('nombre')
                            <div class="field-hint" style="color:var(--red)">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="precio">Precio <span class="req">*</span></label>
                        <input
                            type="number"
                            id="precio"
                            name="precio"
                            placeholder="Ej: 129900"
                            min="0"
                            step="0.01"
                            value="{{ old('precio') }}"
                            required
                        >
                        <div class="field-hint">Ingresa el precio sin puntos ni comas</div>
                        @error('precio')
                            <div class="field-hint" style="color:var(--red)">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Descripción --}}
                <div class="form-group">
                    <label for="descripcion">Descripción <span class="req">*</span></label>
                    <textarea
                        id="descripcion"
                        name="descripcion"
                        placeholder="Describe las características principales del producto..."
                        required
                    >{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <div class="field-hint" style="color:var(--red)">{{ $message }}</div>
                    @enderror
                </div>

                <hr class="form-divider">

                {{-- Imagen --}}
                <div class="form-group">
                    <label for="imagen">Imagen del Producto</label>
                    <input
                        type="file"
                        id="imagen"
                        name="imagen"
                        accept="image/*"
                        onchange="previewImage(event)"
                    >
                    <div class="field-hint">Formatos: JPG, PNG, WEBP. Máximo 2MB.</div>
                    @error('imagen')
                        <div class="field-hint" style="color:var(--red)">{{ $message }}</div>
                    @enderror

                    <div class="image-preview-wrap" id="preview-wrap">
                        <img id="preview-img" src="#" alt="Vista previa">
                        <div class="preview-placeholder" id="preview-placeholder">
                            <span>🖼️</span>
                            Vista previa de la imagen
                        </div>
                    </div>
                </div>

                {{-- Estado --}}
                <div class="form-group">
                    <label for="estado">Estado <span class="req">*</span></label>
                    <select id="estado" name="estado" required>
                        <option value="" disabled selected>— Selecciona el estado —</option>
                        <option value="activo"   {{ old('estado') === 'activo'   ? 'selected' : '' }}>✅ Activo</option>
                        <option value="inactivo" {{ old('estado') === 'inactivo' ? 'selected' : '' }}>❌ Inactivo</option>
                    </select>
                    @error('estado')
                        <div class="field-hint" style="color:var(--red)">{{ $message }}</div>
                    @enderror
                </div>

                <hr class="form-divider">

                {{-- Acciones --}}
                <div class="form-actions">
                    <a href="{{ route('products.index') }}" class="btn-cancel">Cancelar</a>
                    <button type="submit" class="btn-submit">
                        💾 Guardar Producto
                    </button>
                </div>

            </form>
        </div>
    </div>

</main>

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