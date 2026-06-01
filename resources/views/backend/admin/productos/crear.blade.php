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
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0">➕ Crear Nuevo Producto</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label"><strong>Nombre del Producto *</strong></label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                                   name="nombre" value="{{ old('nombre') }}" required>
                            @error('nombre')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
 
                        <div class="mb-3">
                            <label class="form-label"><strong>Descripción</strong></label>
                            <textarea class="form-control @error('descripcion') is-invalid @enderror" 
                                      name="descripcion" rows="3">{{ old('descripcion') }}</textarea>
                            @error('descripcion')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
 
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label"><strong>Precio ($) *</strong></label>
                                    <input type="number" step="0.01" class="form-control @error('precio') is-invalid @enderror" 
                                           name="precio" value="{{ old('precio') }}" required>
                                    @error('precio')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label"><strong>Stock *</strong></label>
                                    <input type="number" class="form-control @error('stock') is-invalid @enderror" 
                                           name="stock" value="{{ old('stock', 0) }}" required>
                                    @error('stock')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
 
                        <div class="mb-3">
                            <label class="form-label"><strong>Imagen del Producto</strong></label>
                            <input type="file" class="form-control @error('imagen') is-invalid @enderror" 
                                   name="imagen" accept="image/*">
                            <small class="text-muted">Máximo 2MB. Formatos: JPG, PNG, GIF</small>
                            @error('imagen')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
 
                        <div class="mb-3">
                            <label class="form-label"><strong>Estado *</strong></label>
                            <select class="form-select @error('estado') is-invalid @enderror" name="estado" required>
                                <option value="">-- Selecciona --</option>
                                <option value="activo" {{ old('estado') == 'activo' ? 'selected' : '' }}>Activo</option>
                                <option value="inactivo" {{ old('estado') == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                            </select>
                            @error('estado')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
 
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">💾 Guardar Producto</button>
                            <a href="{{ route('productos.index') }}" class="btn btn-secondary">📋 Ver Catálogo</a>
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