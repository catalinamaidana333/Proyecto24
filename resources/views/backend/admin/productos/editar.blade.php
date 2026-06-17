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

        .card-form .text-muted {
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

        .btn-cancelar {
            color: var(--primary);
            border-color: var(--primary);
            background-color: transparent;
        }

        .btn-cancelar:hover {
            background-color: var(--primary);
            color: #ffffff;
            border-color: var(--primary);
        }

        /* Responsive: padding/margenes mas chicos y compactos en mobile */
        @media (max-width: 576px) {
            .container.page-container {
                margin-top: 1rem !important;
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

            .card-form .mb-3 {
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

            .d-flex.gap-2 {
                flex-direction: column;
            }

            .d-flex.gap-2 .btn {
                width: 100%;
            }
        }

            .admin-footer {
        background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
        color: rgba(255, 255, 255, 0.7);
        padding: 2rem 0;
        margin-top: 5rem;
        border-top: 3px solid var(--primary, #b50058);
        font-size: 0.85rem;
    }
    .admin-footer a {
        color: white;
        text-decoration: none;
        transition: color 0.2s ease;
    }
    .admin-footer a:hover {
        color: var(--primary-light, #ff3399);
    }
    .admin-footer__brand {
        font-weight: 900;
        letter-spacing: -0.5px;
        text-transform: uppercase;
        color: white !important;
    }
    .admin-footer__tech-badge {
        background: rgba(255, 255, 255, 0.1);
        padding: 0.25rem 0.6rem;
        border-radius: 4px;
        font-size: 0.75rem;
    }
    </style>
</head>
<body>
    @include('backend.admin.navbar')
    <div class="container page-container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <div class="card card-form">
                    <div class="card-header">
                        <h4 class="mb-0 fw-bold"><i class="fa-solid fa-pen-to-square"></i> Editar: {{ $producto->nombre }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('productos.update', $producto) }}"
                              method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label"><strong>Nombre del Producto *</strong></label>
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                       name="nombre" value="{{ old('nombre', $producto->nombre) }}" required>
                                @error('nombre')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label"><strong>Categoría *</strong></label>
                                <select class="form-select @error('categoria_id') is-invalid @enderror" 
                                        name="categoria_id" id="selectCategoria" required onchange="adaptarTallesPorCategoria()">
                                    <option value="">-- Selecciona una categoría --</option>
                                    @foreach(\App\Models\Categoria::all() as $cat)
                                        <option value="{{ $cat->id }}" 
                                                data-nombre="{{ strtolower($cat->nombre) }}" 
                                                {{ old('categoria_id', $producto->categoria_id) == $cat->id ? 'selected' : '' }}>
                                            {{ $cat->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('categoria_id')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label"><strong>Descripción General</strong></label>
                                <textarea class="form-control @error('descripcion') is-invalid @enderror"
                                          name="descripcion" rows="3">{{ old('descripcion', $producto->descripcion) }}</textarea>
                                @error('descripcion')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label"><strong>Descripción del Drop / Lanzamiento</strong></label>
                                <textarea class="form-control @error('descripcion_drop') is-invalid @enderror"
                                          name="descripcion_drop" rows="2" placeholder="Contexto editorial del drop...">{{ old('descripcion_drop', $producto->descripcion_drop) }}</textarea>
                                @error('descripcion_drop')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Diseñador / Firma</strong></label>
                                        <input type="text" class="form-control @error('diseñador') is-invalid @enderror"
                                               name="diseñador" value="{{ old('diseñador', $producto->diseñador) }}" placeholder="Ej: Maison Margiela">
                                        @error('diseñador')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Año de Colección</strong></label>
                                        <input type="number" min="1900" max="2026" class="form-control @error('año') is-invalid @enderror"
                                               name="año" value="{{ old('año', $producto->año) }}" placeholder="Ej: 1998">
                                        @error('año')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Materiales / Composición</strong></label>
                                        <input type="text" class="form-control @error('material') is-invalid @enderror"
                                               name="material" value="{{ old('material', $producto->material) }}" placeholder="Ej: 100% Cuero Vacuno">
                                        @error('material')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Precio ($) *</strong></label>
                                        <input type="number" step="0.01" class="form-control @error('precio') is-invalid @enderror"
                                               name="precio" value="{{ old('precio', $producto->precio) }}" required>
                                        @error('precio')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div id="seccionTalles" class="mb-4 p-3 border border-secondary rounded bg-dark" style="display: none;">
                                <label class="form-label text-warning"><strong><i class="fa-solid fa-boxes-stacked"></i> Selección de Talles y Stock *</strong></label>
                                <p class="small text-muted mb-3" id="ayudaTalles">Tildá los talles disponibles y asigná su stock.</p>
                                
                                <div class="row">
                                    @foreach(['xs', 's', 'm', 'l', 'xl'] as $talle)
                                        @php 
                                            $relacion = $producto->talles->where('talle', $talle)->first(); 
                                        @endphp
                                        <div class="col-md-4 col-6 mb-3 grupo-talle grupo-ropa">
                                            <div class="p-2 border border-secondary rounded bg-secondary-subtle">
                                                <div class="form-check mb-1">
                                                    <input class="form-check-input talle-checkbox" type="checkbox" name="talles[{{ $talle }}][activo]" id="talle_{{ $talle }}" value="1" onchange="toggleStockInput('{{ $talle }}')" {{ $relacion ? 'checked' : '' }}>
                                                    <label class="form-check-label fw-bold text-dark" for="talle_{{ $talle }}">Talle {{ strtoupper($talle) }}</label>
                                                </div>
                                                <input type="number" name="talles[{{ $talle }}][stock]" id="stock_{{ $talle }}" class="form-control form-control-sm input-stock" placeholder="Stock" min="1" value="{{ $relacion ? $relacion->stock : 0 }}" {{ $relacion ? '' : 'disabled' }} required>
                                            </div>
                                        </div>
                                    @endforeach

                                    @foreach(['36', '37', '38', '39', '40'] as $talle)
                                        @php 
                                            $relacion = $producto->talles->where('talle', $talle)->first(); 
                                        @endphp
                                        <div class="col-md-4 col-6 mb-3 grupo-talle grupo-zapatos">
                                            <div class="p-2 border border-secondary rounded bg-secondary-subtle">
                                                <div class="form-check mb-1">
                                                    <input class="form-check-input talle-checkbox" type="checkbox" name="talles[{{ $talle }}][activo]" id="talle_{{ $talle }}" value="1" onchange="toggleStockInput('{{ $talle }}')" {{ $relacion ? 'checked' : '' }}>
                                                    <label class="form-check-label fw-bold text-dark" for="talle_{{ $talle }}">Número {{ $talle }}</label>
                                                </div>
                                                <input type="number" name="talles[{{ $talle }}][stock]" id="stock_{{ $talle }}" class="form-control form-control-sm input-stock" placeholder="Stock" min="1" value="{{ $relacion ? $relacion->stock : 0 }}" {{ $relacion ? '' : 'disabled' }} required>
                                            </div>
                                        </div>
                                    @endforeach

                                    @php 
                                        $relacionUnico = $producto->talles->whereIn('talle', ['unico', 'único'])->first(); 
                                    @endphp
                                    <div class="col-md-4 col-6 mb-3 grupo-talle grupo-unico">
                                        <div class="p-2 border border-secondary rounded bg-secondary-subtle">
                                            <div class="form-check mb-1">
                                                <input class="form-check-input talle-checkbox" type="checkbox" name="talles[único][activo]" id="talle_unico" value="1" onchange="toggleStockInput('unico')" {{ $relacionUnico ? 'checked' : '' }}>
                                                <label class="form-check-label fw-bold text-dark" for="talle_unico">Talle ÚNICO</label>
                                            </div>
                                            <input type="number" name="talles[único][stock]" id="stock_unico" class="form-control form-control-sm input-stock" placeholder="Stock" min="1" value="{{ $relacionUnico ? $relacionUnico->stock : 0 }}" {{ $relacionUnico ? '' : 'disabled' }} required>
                                        </div>
                                    </div>
                                </div>
                                @error('talles')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label"><strong>Imagen del Producto</strong></label>

                                @if ($producto->imagen && file_exists(public_path($producto->imagen)))
                                    <div class="mb-3">
                                        <p class="text-muted small mb-2">Imagen actual:</p>
                                        <img src="{{ asset($producto->imagen) }}"
                                             alt="{{ $producto->nombre }}" height="100" class="rounded">
                                    </div>
                                @endif

                                <input type="file" class="form-control @error('imagen') is-invalid @enderror"
                                       name="imagen" accept="image/*">
                                <small class="text-muted">Sube una nueva para reemplazar (Máximo 2MB)</small>
                                @error('imagen')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label"><strong>Estado *</strong></label>
                                <select class="form-select @error('estado') is-invalid @enderror"
                                        name="estado" required>
                                    <option value="activo" {{ old('estado', $producto->estado) == 'activo' ? 'selected' : '' }}>Activo</option>
                                    <option value="inactivo" {{ old('estado', $producto->estado) == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                                </select>
                                @error('estado')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-guardar px-4">💾 Guardar Cambios</button>
                                <a href="{{ route('productos.index') }}" class="btn btn-outline-secondary btn-cancelar">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function adaptarTallesPorCategoria(esCargaInicial = false) {
            const select = document.getElementById('selectCategoria');
            const opcionSeleccionada = select.options[select.selectedIndex];
            const nombreCategoria = opcionSeleccionada.getAttribute('data-nombre') || '';
            
            const seccionTalles = document.getElementById('seccionTalles');
            const todosLosGrupos = document.querySelectorAll('.grupo-talle');
            const checkboxes = document.querySelectorAll('.talle-checkbox');
            const inputsStock = document.querySelectorAll('.input-stock');

            // 1. SOLO limpiamos los campos si el usuario cambió la categoría manualmente (no al cargar la página)
            if (!esCargaInicial) {
                checkboxes.forEach(cb => cb.checked = false);
                inputsStock.forEach(input => {
                    input.disabled = true;
                    input.value = 0;
                });
            }

            // 2. Si no hay categoría seleccionada, escondemos el recuadro por completo
            if (nombreCategoria === '') {
                seccionTalles.style.display = 'none';
                return;
            }

            // 3. Mostramos contenedor y filtramos visibilidad
            seccionTalles.style.display = 'block';
            todosLosGrupos.forEach(grupo => grupo.style.display = 'none');

            if (nombreCategoria.includes('arriba') || nombreCategoria.includes('abajo') || nombreCategoria.includes('ropa')) {
                document.querySelectorAll('.grupo-ropa').forEach(g => g.style.display = 'block');
                document.getElementById('ayudaTalles').innerText = "Seleccioná los talles de indumentaria disponibles.";
            } 
            else if (nombreCategoria.includes('zapato') || nombreCategoria.includes('calzado')) {
                document.querySelectorAll('.grupo-zapatos').forEach(g => g.style.display = 'block');
                document.getElementById('ayudaTalles').innerText = "Seleccioná los números de calzado disponibles.";
            } 
            else {
                document.querySelectorAll('.grupo-unico').forEach(g => g.style.display = 'block');
                document.getElementById('ayudaTalles').innerText = "Para accesorios se cargará automáticamente como Talle Único.";
                
                // Si es un accesorio nuevo cambiado a mano, marcamos talle único automáticamente
                if (!esCargaInicial) {
                    const cbUnico = document.getElementById('talle_unico');
                    cbUnico.checked = true;
                    toggleStockInput('unico');
                }
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

        // Ejecutar inmediatamente al abrir para recuperar los talles y stocks reales
        document.addEventListener("DOMContentLoaded", function() {
            adaptarTallesPorCategoria(true); // Pasamos true para bloquear el vaciado de datos inicial
        });
    </script>


<footer class="admin-footer">
    <div class="container">
        <div class="row align-items-center gy-3">
            <div class="col-12 col-md-4 text-center text-md-start">
                <span class="admin-footer__brand">NEOGAUCHO</span>
                <span class="mx-2">·</span>
                <span>&copy; {{ date('Y') }} Panel de Control</span>
            </div>
            
            <div class="col-12 col-md-4 text-center">
                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ route('admin') }}">Dashboard</a>
                    <a href="{{ route('admin.consultas') }}">Consultas</a>
                    <a href="{{ route('admin.pedidos') }}">Pedidos</a>
                </div>
            </div>
            
            <div class="col-12 col-md-4 text-center text-md-end">
                <span class="admin-footer__tech-badge">
                    <i class="fa-solid fa-code-branch me-1"></i> v2.1.0
                </span>
                <span class="ms-2">Ambiente: <strong class="text-success">Producción</strong></span>
            </div>
        </div>
    </div>
</footer>
</body>
</html>