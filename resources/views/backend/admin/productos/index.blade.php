<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | NEOGAUCHO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head> <body>
    @include('backend.admin.navbar')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>📦 Catálogo de Productos</h2>
        <a href="{{ route('productos.create') }}" class="btn btn-success">
            ➕ Crear Nuevo Producto
        </a>
    </div>
 
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

    <div class="container-xl px-3 px-md-4">
        <div class="row g-4" style="margin-top: 5rem;">
            @foreach($productos as $producto)
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <a href="{{ route('admin.productos.edit', $producto->id) }}" class="product-card-link">
                        <div class="product-card">
                            <div class="product-card__img-wrap">
                                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}"/>
                            </div>
                            <div class="product-card__body">
                                <div class="product-card__header">
                                    <span class="product-card__name">{{ $producto->nombre }}</span>
                                    <span class="product-card__price">${{ number_format($producto->precio, 2, ',', '.') }}</span>
                                </div>
                                <p class="product-card__sub mb-0">{{ $producto->descripcion }}</p>
                                <button class="product-card__btn">EDIT</button>
                            </div>
                        </div>
                    </a> </div>
            @endforeach
        </div>
    </div>


 
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>