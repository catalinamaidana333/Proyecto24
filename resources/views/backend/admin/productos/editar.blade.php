<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | NEOGAUCHO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body style="background-color: #0f0f11; color: #ffffff; font-family: 'Manrope', sans-serif;">
 
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark text-white border-secondary" style="border-radius: 16px; overflow: hidden;">
                <div class="card-header bg-warning text-dark py-3">
                    <h4 class="mb-0 fw-bold"><i class="fa-solid fa-pen-to-square"></i> Editar Pieza de Archivo: {{ $producto->nombre }}</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('productos.update', $producto->id) }}" 
                          method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
 
                        <div class="mb-3">
                            <label class="form-label"><strong>Nombre del Producto *</strong></label>
                            <input type="text" class="form-control bg-secondary-subtle text-dark border-0 @error('nombre') is-invalid @enderror" 
                                   name="nombre" value="{{ old('nombre', $producto->nombre) }}" required>
                            @error('nombre')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>Categoría / Tipo de Producto *</strong></label>
                            <select class="form-select bg-secondary-subtle text-dark border-0 @error('categoria_id') is-invalid @enderror" 
                                    name="categoria_id" id="categoriaSelector" required onchange="actualizarInterfazTalles()">
                                <option value="">-- Selecciona el tipo de pieza --</option>
                                @foreach(\App\Models\Categoria::all() as $cat)
                                    @php 
                                        $nombreLimpio = strtolower($cat->nombre);
                                        $tipo = 'ropa';
                                        if (str_contains($nombreLimpio, 'zapato') || str_contains($nombreLimpio, 'calzado')) $tipo = 'zapatos';
                                        elseif (str_contains($nombreLimpio, 'accesorio') || str_contains($nombreLimpio, 'cartera')) $tipo = 'unico';
                                    @endphp
                                    <option value="{{ $cat->id }}" data-tipo="{{ $tipo }}" {{ old('categoria_id', $producto->categoria_id) == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('categoria_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
 
                        <div class="mb-3">
                            <label class="form-label"><strong>Descripción</strong></label>
                            <textarea class="form-control bg-secondary-subtle text-dark border-0 @error('descripcion') is-invalid @enderror" 
                                      name="descripcion" rows="3">{{ old('descripcion', $producto->descripcion) }}</textarea>
                            @error('descripcion')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
 
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label"><strong>Precio ($) *</strong></label>
                                    <input type="number" step="0.01" class="form-control bg-secondary-subtle text-dark border-0 @error('precio') is-invalid @enderror" 
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
                                        <div class="p-2 border border-secondary rounded bg-secondary-subtle text-dark">
                                            <div class="form-check mb-1">
                                                <input class="form-check-input talle-checkbox" type="checkbox" name="talles[{{ $talle }}][activo]" id="talle_{{ $talle }}" value="1" onchange="toggleStockInput('{{ $talle }}')" {{ $relacion ? 'checked' : '' }}>
                                                <label class="form-check-label fw-bold" for="talle_{{ $talle }}">Talle {{ strtoupper($talle) }}</label>
                                            </div>
                                            <input type="number" name="talles[{{ $talle }}][stock]" id="stock_{{ $talle }}" class="form-control form-control-sm bg-black text-white border-0 input-stock" placeholder="Stock" min="1" value="{{ $relacion ? $relacion->stock : 0 }}" {{ $relacion ? '' : 'disabled' }} required>
                                        </div>
                                    </div>
                                @endforeach

                                @foreach(['36', '37', '38', '39', '40'] as $talle)
                                    @php 
                                        $relacion = $producto->talles->where('talle', $talle)->first(); 
                                    @endphp
                                    <div class="col-md-4 col-6 mb-3 grupo-talle grupo-zapatos">
                                        <div class="p-2 border border-secondary rounded bg-secondary-subtle text-dark">
                                            <div class="form-check mb-1">
                                                <input class="form-check-input talle-checkbox" type="checkbox" name="talles[{{ $talle }}][activo]" id="talle_{{ $talle }}" value="1" onchange="toggleStockInput('{{ $talle }}')" {{ $relacion ? 'checked' : '' }}>
                                                <label class="form-check-label fw-bold" for="talle_{{ $talle }}">Número {{ $talle }}</label>
                                            </div>
                                            <input type="number" name="talles[{{ $talle }}][stock]" id="stock_{{ $talle }}" class="form-control form-control-sm bg-black text-white border-0 input-stock" placeholder="Stock" min="1" value="{{ $relacion ? $relacion->stock : 0 }}" {{ $relacion ? '' : 'disabled' }} required>
                                        </div>
                                    </div>
                                @endforeach

                                @php 
                                    // Buscamos si existe bajo la variante limpia o con acento
                                    $relacionUnico = $producto->talles->whereIn('talle', ['unico', 'único'])->first(); 
                                @endphp
                                <div class="col-md-4 col-6 mb-3 grupo-talle grupo-unico">
                                    <div class="p-2 border border-secondary rounded bg-secondary-subtle text-dark">
                                        <div class="form-check mb-1">
                                            <input class="form-check-input talle-checkbox" type="checkbox" name="talles[único][activo]" id="talle_unico" value="1" onchange="toggleStockInput('unico')" {{ $relacionUnico ? 'checked' : '' }}>
                                            <label class="form-check-label fw-bold" for="talle_unico">Talle ÚNICO</label>
                                        </div>
                                        <input type="number" name="talles[único][stock]" id="stock_unico" class="form-control form-control-sm bg-black text-white border-0 input-stock" placeholder="Stock" min="1" value="{{ $relacionUnico ? $relacionUnico->stock : 0 }}" {{ $relacionUnico ? '' : 'disabled' }} required>
                                    </div>
                                </div>
                            </div>
                            @error('talles')
                                <div class="invalid-feedback d-block text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
 
                        <div class="mb-3">
                            <label class="form-label"><strong>Imagen del Producto</strong></label>
                            
                            @if ($producto->imagen)
                                <div class="mb-3 p-2 border border-secondary rounded bg-black d-inline-block">
                                    <p class="text-muted small mb-2 text-center">Imagen actual:</p>
                                    <img src="{{ asset('storage/' . $producto->imagen) }}" 
                                         alt="{{ $producto->nombre }} " height="120" class="rounded">
                                </div>
                            @endif
 
                            <input type="file" class="form-control bg-secondary-subtle text-dark border-0 @error('imagen') is-invalid @enderror" 
                                   name="imagen" accept="image/*">
                            <small class="text-muted d-block mt-1">Sube una nueva imagen de archivo para reemplazar (Máximo 2MB)</small>
                            @error('imagen')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
 
                        <div class="mb-4">
                            <label class="form-label"><strong>Estado *</strong></label>
                            <select class="form-select bg-secondary-subtle text-dark border-0 @error('estado') is-invalid @enderror" 
                                    name="estado" required>
                                <option value="activo" {{ old('estado', $producto->estado) == 'activo' ? 'selected' : '' }}>Activo</option>
                                <option value="inactivo" {{ old('estado', $producto->estado) == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                            </select>
                            @error('estado')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
 
                        <div class="d-flex gap-2 border-top border-secondary pt-3">
                            <button type="submit" class="btn btn-warning text-dark fw-bold px-4">💾 Guardar Cambios</button>
                            <a href="{{ route('productos.index') }}" class="btn btn-outline-secondary text-white">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Control individual de Inputs numéricos al marcar los checkboxes
    function toggleStockInput(talleId) {
        const checkbox = document.getElementById('talle_' + talleId);
        const stockInput = document.getElementById('stock_' + talleId);
        
        if (checkbox.checked) {
            stockInput.disabled = false;
            if(stockInput.value == "0") stockInput.value = "1";
        } else {
            stockInput.disabled = true;
            stockInput.value = "0";
        }
    }

    // Mostrar/Ocultar bloques según el tipo de categoría seleccionada
    function actualizarInterfazTalles() {
        const selector = document.getElementById('categoriaSelector');
        const opcionSeleccionada = selector.options[selector.selectedIndex];
        const seccionTalles = document.getElementById('seccionTalles');
        
        // Ocultamos todos los elementos de talles por defecto
        document.querySelectorAll('.grupo-talle').forEach(el => el.style.display = 'none');
        
        if (!opcionSeleccionada || !opcionSeleccionada.value) {
            seccionTalles.style.display = 'none';
            return;
        }
        
        // Extraemos el tipo asignado por PHP en el atributo de datos
        const tipo = opcionSeleccionada.getAttribute('data-tipo');
        seccionTalles.style.display = 'block';
        
        if (tipo === 'ropa') {
            document.querySelectorAll('.grupo-ropa').forEach(el => el.style.display = 'block');
        } else if (tipo === 'zapatos') {
            document.querySelectorAll('.grupo-zapatos').forEach(el => el.style.display = 'block');
        } else if (tipo === 'unico') {
            document.querySelectorAll('.grupo-unico').forEach(el => el.style.display = 'block');
        }
    }

    // Ejecución inmediata al cargar la página para pintar el estado guardado en la base de datos
    document.addEventListener("DOMContentLoaded", function() {
        actualizarInterfazTalles();
    });
</script>

</body>
</html>