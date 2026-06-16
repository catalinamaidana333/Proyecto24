<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos | NEOGAUCHO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
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
            --success: #2e7d32;
            --warning: #f57c00;
            --danger: #c62828;
        }

        body {
            background-color: var(--surface);
            color: var(--text-primary);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .page-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            color: white;
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .page-header h1 {
            font-size: 1.75rem;
            font-weight: 900;
            margin: 0;
        }

        .filter-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 1rem;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: var(--shadow);
        }

        .filter-card label {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-secondary);
            margin-bottom: 0.25rem;
        }

        .filter-card .form-control,
        .filter-card .form-select {
            border: 1px solid var(--border);
            background-color: var(--surface-container);
            color: var(--text-primary);
            font-size: 0.9rem;
        }

        .filter-card .form-control:focus,
        .filter-card .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(181, 0, 88, 0.15);
        }

        .btn-filtrar {
            background-color: var(--primary);
            border: none;
            color: white;
            font-weight: 600;
        }

        .btn-filtrar:hover {
            background-color: var(--primary-light);
            color: white;
        }

        .btn-limpiar {
            color: var(--primary);
            border-color: var(--primary);
            background: transparent;
            font-weight: 600;
        }

        .btn-limpiar:hover {
            background-color: var(--primary);
            color: white;
        }

        .results-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 1rem;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .results-header {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .results-header h5 {
            font-weight: 800;
            margin: 0;
            color: var(--text-primary);
        }

        .results-header .badge-count {
            background-color: var(--primary);
            color: white;
            padding: 0.35rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        table thead th {
            background-color: var(--surface-container);
            color: var(--text-secondary);
            font-size: 0.78rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border: none;
            padding: 0.9rem 1rem;
        }

        table tbody td {
            padding: 1rem;
            border-color: var(--border);
            vertical-align: middle;
            font-size: 0.9rem;
        }

        table tbody tr:hover {
            background-color: var(--surface);
        }

        .avatar {
            width: 38px;
            height: 38px;
            border-radius: 0.6rem;
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: white;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.85rem;
            flex-shrink: 0;
        }

        .badge-estado {
            padding: 0.4rem 0.85rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-confirmado { background: rgba(46,125,50,0.1); color: var(--success); }
        .badge-carrito    { background: rgba(245,124,0,0.1);  color: var(--warning); }
        .badge-cancelado  { background: rgba(198,40,40,0.1);  color: var(--danger);  }

        .total-resumen {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: white;
            padding: 1rem 1.5rem;
            border-top: 1px solid var(--border);
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 1rem;
            font-weight: 700;
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            color: var(--text-secondary);
        }

        .empty-state i {
            font-size: 3rem;
            opacity: 0.3;
            display: block;
            margin-bottom: 1rem;
        }

        @media (max-width: 576px) {
            .page-header { padding: 1.25rem; }
            .filter-card { padding: 1rem; }
            .filter-card .row > div { margin-bottom: 0.5rem; }
            .results-header { flex-direction: column; gap: 0.5rem; align-items: flex-start; }
            table { font-size: 0.8rem; }
            .d-flex.gap-2 { flex-direction: column; }
            .d-flex.gap-2 .btn { width: 100%; }
        }
    </style>
</head>
<body>
    @include('backend.admin.navbar')

    <div class="page-header">
        <h1><i class="fas fa-shopping-bag me-2"></i>Pedidos</h1>
        <p class="mb-0 mt-1" style="opacity:0.85; font-size:0.9rem;">Filtrá y revisá todas las órdenes de compra</p>
    </div>

    <div class="container-fluid px-3 px-md-4">

        {{-- FILTROS --}}
        <div class="filter-card">
            <form method="GET" action="{{ route('admin.pedidos') }}">
                <div class="row g-3 align-items-end">
                    <div class="col-12 col-sm-6 col-md-3">
                        <label>Desde</label>
                        <input type="date" name="desde" class="form-control"
                               value="{{ request('desde') }}">
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <label>Hasta</label>
                        <input type="date" name="hasta" class="form-control"
                               value="{{ request('hasta') }}">
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <label>Estado</label>
                        <select name="estado" class="form-select">
                            <option value="">Todos</option>
                            <option value="confirmado" {{ request('estado') == 'confirmado' ? 'selected' : '' }}>Confirmado</option>
                            <option value="carrito"    {{ request('estado') == 'carrito'    ? 'selected' : '' }}>En carrito</option>
                            <option value="cancelado"  {{ request('estado') == 'cancelado'  ? 'selected' : '' }}>Cancelado</option>
                        </select>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-filtrar flex-grow-1">
                                <i class="fas fa-filter me-1"></i> Filtrar
                            </button>
                            <a href="{{ route('admin.pedidos') }}" class="btn btn-limpiar">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Info del rango activo --}}
                @if(request('desde') || request('hasta') || request('estado'))
                    <div class="mt-3 pt-3 border-top" style="font-size:0.85rem; color:var(--text-secondary);">
                        <i class="fas fa-info-circle me-1" style="color:var(--primary)"></i>
                        Mostrando resultados
                        @if(request('desde') && request('hasta'))
                            del <strong>{{ \Carbon\Carbon::parse(request('desde'))->format('d/m/Y') }}</strong>
                            al <strong>{{ \Carbon\Carbon::parse(request('hasta'))->format('d/m/Y') }}</strong>
                        @elseif(request('desde'))
                            desde el <strong>{{ \Carbon\Carbon::parse(request('desde'))->format('d/m/Y') }}</strong>
                        @elseif(request('hasta'))
                            hasta el <strong>{{ \Carbon\Carbon::parse(request('hasta'))->format('d/m/Y') }}</strong>
                        @endif
                        @if(request('estado'))
                            — estado: <strong>{{ request('estado') }}</strong>
                        @endif
                    </div>
                @endif
            </form>
        </div>

        {{-- TABLA --}}
        <div class="results-card mb-4">
            <div class="results-header">
                <h5><i class="fas fa-list me-2" style="color:var(--primary)"></i>Órdenes encontradas</h5>
                <span class="badge-count">{{ $pedidos->total() }} pedidos</span>
            </div>

            @if($pedidos->count() > 0)
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Cliente</th>
                                <th>Fecha</th>
                                <th>Productos</th>
                                <th>Total</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pedidos as $pedido)
                                @php
                                    $nombre = $pedido->usuario->name ?? 'Sin usuario';
                                    $iniciales = collect(explode(' ', $nombre))->take(2)->map(fn($w) => strtoupper($w[0]))->join('');
                                @endphp
                                <tr>
                                    <td><strong>#{{ $pedido->id }}</strong></td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar">{{ $iniciales }}</div>
                                            <div>
                                                <div class="fw-600">{{ $nombre }}</div>
                                                <small style="color:var(--text-secondary)">{{ $pedido->usuario->email ?? '' }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>{{ \Carbon\Carbon::parse($pedido->fecha_venta ?? $pedido->created_at)->format('d/m/Y') }}</div>
                                        <small style="color:var(--text-secondary)">{{ \Carbon\Carbon::parse($pedido->fecha_venta ?? $pedido->created_at)->format('H:i') }}</small>
                                    </td>
                                    <td>
                                        @foreach($pedido->detalles->take(2) as $d)
                                            <small class="d-block">{{ $d->producto->nombre ?? 'Producto' }} <span style="color:var(--text-secondary)">(x{{ $d->cantidad }})</span></small>
                                        @endforeach
                                        @if($pedido->detalles->count() > 2)
                                            <small style="color:var(--primary)">+{{ $pedido->detalles->count() - 2 }} más</small>
                                        @endif
                                    </td>
                                    <td><strong style="color:var(--primary)">${{ number_format($pedido->total, 2, ',', '.') }}</strong></td>
                                    <td>
                                        <span class="badge-estado badge-{{ $pedido->estado }}">
                                            {{ ucfirst($pedido->estado) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if($pedidos->count() > 0)
                    <div class="total-resumen">
                        <span>Total del período:</span>
                        <span style="font-size:1.25rem">${{ number_format($pedidos->sum('total'), 2, ',', '.') }}</span>
                    </div>
                @endif

                {{-- Paginación --}}
                <div class="p-3">
                    {{ $pedidos->appends(request()->query())->links() }}
                </div>

            @else
                <div class="empty-state">
                    <i class="fas fa-box-open"></i>
                    <p class="fw-600">No se encontraron pedidos con esos filtros.</p>
                    <a href="{{ route('admin.pedidos') }}" class="btn btn-limpiar mt-2">Ver todos los pedidos</a>
                </div>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>