<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | NEOGAUCHO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>📦 Catálogo de Productos</h2>
        <a href="{{ route('productos.create') }}" class="btn btn-success">
            ➕ Crear Nuevo Producto
        </a>
    </div>
 
    <!-- ALERTAS -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
 
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
 
    <!-- TABLA DE PRODUCTOS -->
    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Estado</th>
                        <th>Creado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($productos as $producto)
                        <tr>
                            <!-- IMAGEN -->
                            <td style="width: 80px;">
                                @if ($producto->imagen && file_exists(public_path($producto->imagen)))
                                    <img src="{{ asset($producto->imagen) }}" 
                                         alt="{{ $producto->nombre }}" height="50" class="rounded">
                                @else
                                    <span class="badge bg-secondary">Sin imagen</span>
                                @endif
                            </td>
 
                            <!-- NOMBRE -->
                            <td>
                                <strong>{{ $producto->nombre }}</strong>
                                @if ($producto->descripcion)
                                    <br>
                                    <small class="text-muted">{{ Str::limit($producto->descripcion, 50) }}</small>
                                @endif
                            </td>
 
                            <!-- PRECIO -->
                            <td>
                                <strong>${{ number_format($producto->precio, 2) }}</strong>
                            </td>
 
                            <!-- STOCK -->
                            <td>
                                @if ($producto->stock > 0)
                                    <span class="badge bg-success">{{ $producto->stock }} u.</span>
                                @else
                                    <span class="badge bg-danger">Agotado</span>
                                @endif
                            </td>
 
                            <!-- ESTADO -->
                            <td>
                                @if ($producto->estado == 'activo')
                                    <span class="badge bg-info">Activo</span>
                                @else
                                    <span class="badge bg-secondary">Inactivo</span>
                                @endif
                            </td>
 
                            <!-- CREADO -->
                            <td>
                                <small class="text-muted">
                                    {{ $producto->created_at->format('d/m/Y H:i') }}
                                </small>
                            </td>
 
                            <!-- ACCIONES -->
                            <td>
                                <a href="{{ route('productos.edit', $producto) }}" 
                                   class="btn btn-sm btn-warning" title="Editar">
                                    ✏️ Editar
                                </a>
                                
                                <form action="{{ route('productos.destroy', $producto) }}" 
                                      method="POST" class="d-inline" 
                                      onsubmit="return confirm('¿Eliminar este producto?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Eliminar">
                                        🗑️ Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">
                                <p class="text-muted mb-0">
                                    No hay productos creados. 
                                    <a href="{{ route('productos.create') }}">Crear uno ahora</a>
                                </p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>