<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | NEOGAUCHO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        :root {
            --primary: #b50058;
            --primary-light: #ff709e;
            --surface: #f9f6f5;
            --surface-container: #eae7e7;
            --text-primary: #2f2f2e;
            --text-secondary: #5c5b5b;
            --border: #dfdcdc;
            --shadow: 0 4px 12px rgba(181, 0, 88, 0.08);
            --shadow-lg: 20px 40px 40px rgba(181, 0, 88, 0.15);
        }

        body {
            background-color: var(--surface) !important;
            color: var(--text-primary) !important;
        }

        .page-container {
            padding-left: 12px;
            padding-right: 12px;
        }

        .card-form {
            background-color: #ffffff;
            color: var(--text-primary);
            border: 1px solid var(--border);
            border-radius: 12px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .card-form .card-header {
            background-color: var(--primary);
            color: #ffffff;
        }

        .card-form .card-header h4 {
            font-size: 1.15rem;
        }

        .card-form label {
            color: var(--text-secondary);
        }

        .card-form .form-control,
        .card-form .form-select,
        .card-form textarea {
            background-color: var(--surface-container);
            color: var(--text-primary);
            border: 1px solid var(--border);
        }

        .card-form .form-control:focus,
        .card-form .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(181, 0, 88, 0.15);
            background-color: var(--surface-container);
            color: var(--text-primary);
        }

        .card-form .form-control::placeholder {
            color: var(--text-secondary);
        }

        .grupo-talle .p-2 {
            background-color: var(--surface-container) !important;
            border: 1px solid var(--border) !important;
        }

        #seccionTalles {
            background-color: var(--surface) !important;
            border: 1px solid var(--border) !important;
        }

        #seccionTalles .text-warning {
            color: var(--primary) !important;
        }

        #seccionTalles .text-muted {
            color: var(--text-secondary) !important;
        }

        .btn-guardar {
            background-color: var(--primary);
            border: none;
            color: #ffffff;
            font-weight: bold;
            transition: background-color 0.2s ease;
        }

        .btn-guardar:hover {
            background-color: var(--primary-light);
            color: #ffffff;
        }

        .btn-ver-catalogo {
            color: var(--primary);
            border-color: var(--primary);
        }

        .btn-ver-catalogo:hover {
            background-color: var(--primary);
            color: #ffffff;
        }

        /* Responsive: padding/margenes mas chicos y compactos en mobile */
        @media (max-width: 576px) {
            .container.page-container {
                margin-top: 1rem !important;
                margin-bottom: 1rem !important;
                padding-left: 8px;
                padding-right: 8px;
            }

            .card-form .card-header {
                padding: 0.75rem 1rem;
            }

            .card-form .card-header h4 {
                font-size: 1rem;
            }

            .card-form .card-body {
                padding: 1rem;
            }

            .card-form .mb-3,
            .card-form .mb-4 {
                margin-bottom: 0.75rem !important;
            }

            .card-form .form-label {
                font-size: 0.85rem;
                margin-bottom: 0.25rem;
            }

            .card-form .form-control,
            .card-form .form-select {
                font-size: 0.9rem;
                padding: 0.45rem 0.6rem;
            }

            #seccionTalles {
                padding: 0.75rem !important;
            }

            .d-flex.gap-2 {
                flex-direction: column;
            }

            .d-flex.gap-2 .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    @include('backend.admin.navbar')
    <div class="container page-container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card card-form">
                    <div class="card-header">
                        <h4 class="mb-0 fw-bold"><i class="fa-solid fa-square-plus"></i> Crear Nuevo Producto de Archivo</h4>
                    </div>
                    <div class="card-body">
                        <form id="formProducto" action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="mb-3">
                                <label class="form-label"><strong>Nombre del Producto *</strong></label>
                                <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label"><strong>Categoría *</strong></label>
                                <select id="selectCategoria" class="form-select" name="categoria_id" required onchange="adaptarTallesPorCategoria()">
                                    <option value="">-- Selecciona una categoría --</option>
                                    @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id }}" data-nombre="{{ strtolower($categoria->nombre) }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                                            {{ $categoria->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
     
                            <div class="mb-3">
                                <label class="form-label"><strong>Descripción de la Prenda</strong></label>
                                <textarea class="form-control" name="descripcion" rows="3">{{ old('descripcion') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label"><strong>Descripción del Drop / Lanzamiento</strong></label>
                                <textarea class="form-control" name="descripcion_drop" rows="2" placeholder="Ej: Curaduría de Invierno 2026">{{ old('descripcion_drop') }}</textarea>
                            </div>
     
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Diseñador / Firma</strong></label>
                                        <input type="text" class="form-control" name="diseñador" value="{{ old('diseñador') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Año de Colección</strong></label>
                                        <input type="number" class="form-control" name="año" value="{{ old('año') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Materiales / Composición</strong></label>
                                        <input type="text" class="form-control" name="material" value="{{ old('material') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Precio ($) *</strong></label>
                                        <input type="number" step="0.01" class="form-control" name="precio" value="{{ old('precio') }}" required>
                                    </div>
                                </div>
                            </div>

                            <div id="seccionTalles" class="mb-4 p-3 border border-secondary rounded bg-dark" style="display: none;">
                                <label class="form-label text-warning"><strong><i class="fa-solid fa-boxes-stacked"></i> Selección de Talles y Stock *</strong></label>
                                <p class="small text-muted mb-3" id="ayudaTalles">Tildá los talles disponibles y asigná su stock.</p>
                                
                                <div class="row">
                                    @foreach(['xs', 's', 'm', 'l', 'xl'] as $talle)
                                        <div class="col-md-4 col-6 mb-3 grupo-talle grupo-ropa">
                                            <div class="p-2 border border-secondary rounded bg-secondary-subtle">
                                                <div class="form-check mb-1">
                                                    <input class="form-check-input talle-checkbox" type="checkbox" name="talles[{{ $talle }}][activo]" id="talle_{{ $talle }}" value="1" onchange="toggleStockInput('{{ $talle }}')">
                                                    <label class="form-check-label fw-bold" for="talle_{{ $talle }}">Talle {{ strtoupper($talle) }}</label>
                                                </div>
                                                <input type="number" name="talles[{{ $talle }}][stock]" id="stock_{{ $talle }}" class="form-control form-control-sm input-stock" placeholder="Stock" min="1" value="0" disabled required>
                                            </div>
                                        </div>
                                    @endforeach

                                    @foreach(['36', '37', '38', '39', '40'] as $talle)
                                        <div class="col-md-4 col-6 mb-3 grupo-talle grupo-zapatos">
                                            <div class="p-2 border border-secondary rounded bg-secondary-subtle">
                                                <div class="form-check mb-1">
                                                    <input class="form-check-input talle-checkbox" type="checkbox" name="talles[{{ $talle }}][activo]" id="talle_{{ $talle }}" value="1" onchange="toggleStockInput('{{ $talle }}')">
                                                    <label class="form-check-label fw-bold" for="talle_{{ $talle }}">Número {{ $talle }}</label>
                                                </div>
                                                <input type="number" name="talles[{{ $talle }}][stock]" id="stock_{{ $talle }}" class="form-control form-control-sm input-stock" placeholder="Stock" min="1" value="0" disabled required>
                                            </div>
                                        </div>
                                    @endforeach

                                    <div class="col-md-4 col-6 mb-3 grupo-talle grupo-unico">
                                        <div class="p-2 border border-secondary rounded bg-secondary-subtle">
                                            <div class="form-check mb-1">
                                                <input class="form-check-input talle-checkbox" type="checkbox" name="talles[único]['activo']" id="talle_unico" value="1" onchange="toggleStockInput('unico')">
                                                <label class="form-check-label fw-bold" for="talle_unico">Talle ÚNICO</label>
                                            </div>
                                            <input type="number" name="talles[único][stock]" id="stock_unico" class="form-control form-control-sm input-stock" placeholder="Stock" min="1" value="0" disabled required>
                                        </div>
                                    </div>
                                </div>
                            </div>
     
                            <div class="mb-3">
                                <label class="form-label"><strong>Imagen del Producto</strong></label>
                                <input type="file" class="form-control" name="imagen" accept="image/*">
                            </div>
     
                            <div class="mb-4">
                                <label class="form-label"><strong>Estado del Producto *</strong></label>
                                <select class="form-select" name="estado" required>
                                    <option value="activo">Activo (Visible en tienda)</option>
                                    <option value="inactivo">Inactivo (Oculto)</option>
                                </select>
                            </div>
     
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-guardar px-4">
                                    💾 Guardar Producto
                                </button>
                                <a href="{{ route('productos.index') }}" class="btn btn-outline-secondary btn-ver-catalogo">
                                    📋 Ver Catálogo
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function adaptarTallesPorCategoria() {
            const select = document.getElementById('selectCategoria');
            const opcionSeleccionada = select.options[select.selectedIndex];
            const nombreCategoria = opcionSeleccionada.getAttribute('data-nombre') || '';
            
            const seccionTalles = document.getElementById('seccionTalles');
            const todosLosGrupos = document.querySelectorAll('.grupo-talle');
            const checkboxes = document.querySelectorAll('.talle-checkbox');
            const inputsStock = document.querySelectorAll('.input-stock');

            // 1. Limpiamos y desmarcamos todo lo que estuviera tildado antes para evitar basura
            checkboxes.forEach(cb => cb.checked = false);
            inputsStock.forEach(input => {
                input.disabled = true;
                input.value = 0;
            });

            // 2. Si no hay categoría seleccionada, escondemos el recuadro de talles por completo
            if (nombreCategoria === '') {
                seccionTalles.style.display = 'none';
                return;
            }

            // 3. Mostramos el contenedor principal y filtramos qué sub-bloques se ven
            seccionTalles.style.display = 'block';
            
            // Primero escondemos todos los casilleros de talles
            todosLosGrupos.forEach(grupo => grupo.style.display = 'none');

            // Evaluamos el nombre de la categoría seleccionada
            if (nombreCategoria.includes('arriba') || nombreCategoria.includes('abajo') || nombreCategoria.includes('ropa')) {
                document.querySelectorAll('.grupo-ropa').forEach(g => g.style.display = 'block');
                document.getElementById('ayudaTalles').innerText = "Seleccioná los talles de indumentaria disponibles (Mínimo debés elegir 2).";
            } 
            else if (nombreCategoria.includes('zapato') || nombreCategoria.includes('calzado')) {
                document.querySelectorAll('.grupo-zapatos').forEach(g => g.style.display = 'block');
                document.getElementById('ayudaTalles').innerText = "Seleccioná los números de calzado disponibles (Mínimo debés elegir 2).";
            } 
            else {
                // Si es Accesorios o cualquier otra cosa, mostramos únicamente "Talle Único"
                document.querySelectorAll('.grupo-unico').forEach(g => g.style.display = 'block');
                document.getElementById('ayudaTalles').innerText = "Para accesorios se cargará automáticamente como Talle Único.";
                
                // Hack amigable: Para accesorios no tiene sentido obligarla a marcar 2 talles, así que tildamos Talle Único por defecto
                const cbUnico = document.getElementById('talle_unico');
                cbUnico.checked = true;
                toggleStockInput('unico');
            }
        }

        function toggleStockInput(talle) {
            const checkbox = document.getElementById('talle_' + talle);
            const stockInput = document.getElementById('stock_' + talle);
            
            if (checkbox && checkbox.checked) {
                stockInput.disabled = false;
                if(stockInput.value == 0) stockInput.value = 1;
            } else if (stockInput) {
                stockInput.disabled = true;
                stockInput.value = 0;
            }
        }

        // Ejecutar al cargar la página por si hay datos viejos en la sesión (old)
        document.addEventListener("DOMContentLoaded", function() {
            adaptarTallesPorCategoria();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>