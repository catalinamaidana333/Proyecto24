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

<style>
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