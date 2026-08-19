<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Productos | NEOGAUCHO Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        html, body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            margin: 0;
            background-color: var(--surface, #f9f6f5);
        }
        .main-content {
            flex: 1 0 auto;
            width: 100%;
        }
        .admin-footer {
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
            color: rgba(255, 255, 255, 0.7);
            padding: 2rem 0;
            margin-top: auto !important;
            border-top: 3px solid var(--primary, #b50058);
            font-size: 0.85rem;
            width: 100%;
            flex-shrink: 0;
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

        @media (max-width: 576px) {
            .catalog-header h2 {
                font-size: 1.35rem;
            }
            .catalog-header .btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    @include('backend.admin.navbar')

    <main class="main-content">
        <div class="container-xl px-3 px-md-4 mb-5">
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-3 mb-4 catalog-header">
                <div>
                    <h2 class="fw-bold mb-1">📦 Catálogo de Productos</h2>
                    <p class="text-muted small mb-0">Listado completo de inventario y prendas cargadas</p>
                </div>
                <a href="{{ route('productos.create') }}" class="btn btn-success fw-bold shadow-sm px-3 py-2">
                    <i class="fa-solid fa-plus me-1"></i> Crear Nuevo Producto
                </a>
            </div>
         
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
         
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-triangle-exclamation me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row g-4 mt-1">
                @forelse($productos as $producto)
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <a href="{{ route('admin.productos.edit', $producto->id) }}" class="product-card-link text-decoration-none">
                            <div class="product-card">
                                <div class="product-card__img-wrap">
                                    @if($producto->imagen)
                                        <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}"/>
                                    @else
                                        <img src="{{ asset('images/placeholder.jpg') }}" alt="Sin imagen"/>
                                    @endif
                                </div>
                                <div class="product-card__body">
                                    <div class="product-card__header">
                                        <span class="product-card__name text-truncate" style="max-width: 160px;">{{ $producto->nombre }}</span>
                                        <span class="product-card__price">${{ number_format($producto->precio, 2, ',', '.') }}</span>
                                    </div>
                                    <p class="product-card__sub mb-0 text-truncate">{{ $producto->descripcion }}</p>
                                    <button class="product-card__btn mt-2">
                                        <i class="fa-solid fa-pen-to-square me-1"></i> EDITAR
                                    </button>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="card p-5 text-center shadow-sm" style="border-radius: 12px; margin-left: 0;">
                            <i class="fa-solid fa-box-open fa-3x text-muted mb-3 opacity-50"></i>
                            <h5 class="text-muted">No hay productos registrados en el sistema</h5>
                            <div class="mt-3">
                                <a href="{{ route('productos.create') }}" class="btn btn-primary">Crear Primer Producto</a>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </main>

    <footer class="admin-footer">
        <div class="container">
            <div class="row align-items-center gy-3">
                <div class="col-12 col-md-4 text-center text-md-start">
                    <span class="admin-footer__brand">NEOGAUCHO</span>
                    <span class="mx-2">·</span>
                    <span>&copy; {{ date('Y') }} CM2 - Panel de Control</span>
                </div>
                
                <div class="col-12 col-md-4 text-center">
                    <div class="d-flex justify-content-center gap-3 flex-wrap">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>