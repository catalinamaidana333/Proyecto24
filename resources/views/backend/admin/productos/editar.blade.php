<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | NEOGAUCHO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-warning text-dark">
                    <h4 class="mb-0">✏️ Editar: {{ $producto->nombre }}</h4>
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
                            <label class="form-label"><strong>Descripción</strong></label>
                            <textarea class="form-control @error('descripcion') is-invalid @enderror" 
                                      name="descripcion" rows="3">{{ old('descripcion', $producto->descripcion) }}</textarea>
                            @error('descripcion')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
 
                        <div class="row">
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
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label"><strong>Stock *</strong></label>
                                    <input type="number" class="form-control @error('stock') is-invalid @enderror" 
                                           name="stock" value="{{ old('stock', $producto->stock) }}" required>
                                    @error('stock')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
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
 
                        <div class="mb-3">
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
                            <button type="submit" class="btn btn-primary">💾 Guardar Cambios</button>
                            <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>