<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | NEOGAUCHO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <style>
        :root {
            --primary: #b50058;
            --primary-light: #ff709e;
            --secondary: #006571;
            --surface: #f9f6f5;
            --surface-container: #eae7e7;
            --text-primary: #2f2f2e;
            --text-secondary: #5c5b5b;
            --border: #dfdcdc;
            --success: #2e7d32;
            --warning: #f57c00;
            --danger: #c62828;
            --shadow: 0 4px 12px rgba(181, 0, 88, 0.08);
            --shadow-lg: 0 8px 24px rgba(181, 0, 88, 0.12);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            background-color: var(--surface);
            color: var(--text-primary);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
        }

        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        /* ═══ HEADER ═══ */
        .dashboard-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            color: white;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-lg);
        }

        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .header-title {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .header-title h1 {
            font-size: 2rem;
            font-weight: 900;
            letter-spacing: -1px;
            margin: 0;
        }

        .header-title p {
            opacity: 0.9;
            font-size: 0.95rem;
            margin: 0;
        }

        .user-badge {
            background: rgba(255, 255, 255, 0.2);
            padding: 0.75rem 1.5rem;
            border-radius: 9999px;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 600;
            font-size: 0.875rem;
        }

        .user-badge i {
            font-size: 1.25rem;
        }

        /* ═══ MAIN CONTENT ═══ */
        .dashboard-content {
            flex: 1;
            padding: 0 2rem 2rem 2rem;
        }

        @media (max-width: 768px) {
            .dashboard-content {
                padding: 0 1rem 2rem 1rem;
            }

            .header-top {
                flex-direction: column;
                gap: 1rem;
            }

            .header-title {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        /* ═══ STATS CARDS ═══ */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            border: 2px solid var(--border);
            border-radius: 1.5rem;
            padding: 2rem;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 180px;
            box-shadow: var(--shadow);
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
            border-color: var(--primary);
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .stat-label {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .stat-icon.primary {
            background: rgba(181, 0, 88, 0.1);
            color: var(--primary);
        }

        .stat-icon.success {
            background: rgba(46, 125, 50, 0.1);
            color: var(--success);
        }

        .stat-icon.warning {
            background: rgba(245, 124, 0, 0.1);
            color: var(--warning);
        }

        .stat-icon.secondary {
            background: rgba(0, 101, 113, 0.1);
            color: var(--secondary);
        }

        .stat-value {
            font-size: 2.5rem;
            font-weight: 900;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .stat-change {
            font-size: 0.875rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .stat-change.positive {
            color: var(--success);
        }

        .stat-change.negative {
            color: var(--danger);
        }

        /* ═══ PROGRESS BAR ═══ */
        .progress-bar-custom {
            height: 6px;
            background-color: var(--surface-container);
            border-radius: 3px;
            overflow: hidden;
            margin-top: 1rem;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--primary) 0%, var(--primary-light) 100%);
            border-radius: 3px;
            transition: width 0.3s ease;
        }

        /* ═══ ORDERS TABLE ═══ */
        .orders-section {
            background: white;
            border: 2px solid var(--border);
            border-radius: 1.5rem;
            padding: 2rem;
            box-shadow: var(--shadow);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--border);
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 900;
            color: var(--text-primary);
            margin: 0;
        }

        .section-subtitle {
            font-size: 0.875rem;
            color: var(--text-secondary);
        }

        .view-all-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.875rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .view-all-link:hover {
            gap: 0.75rem;
        }

        /* ═══ ORDER ITEM ═══ */
        .order-item {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            padding: 1.5rem;
            border-bottom: 1px solid var(--border);
            transition: all 0.3s ease;
        }

        .order-item:last-child {
            border-bottom: none;
        }

        .order-item:hover {
            background-color: var(--surface-container);
            border-radius: 1rem;
        }

        .order-avatar {
            width: 50px;
            height: 50px;
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: white;
            font-size: 1.25rem;
            flex-shrink: 0;
        }

        .avatar-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
        }

        .avatar-success {
            background: linear-gradient(135deg, var(--success) 0%, #66bb6a 100%);
        }

        .avatar-warning {
            background: linear-gradient(135deg, var(--warning) 0%, #ffb74d 100%);
        }

        .avatar-secondary {
            background: linear-gradient(135deg, var(--secondary) 0%, #00897b 100%);
        }

        .order-info {
            flex: 1;
        }

        .order-name {
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.25rem;
        }

        .order-product {
            font-size: 0.875rem;
            color: var(--text-secondary);
            margin-bottom: 0.5rem;
        }

        .order-time {
            font-size: 0.75rem;
            color: var(--text-secondary);
            opacity: 0.7;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .order-price {
            font-size: 1.25rem;
            font-weight: 900;
            color: var(--primary);
            margin-right: 1.5rem;
            min-width: 80px;
            text-align: right;
        }

        .order-status {
            padding: 0.5rem 1rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: capitalize;
            letter-spacing: 0.05em;
        }

        .status-completado {
            background-color: rgba(46, 125, 50, 0.1);
            color: var(--success);
        }

        .status-procesando {
            background-color: rgba(245, 124, 0, 0.1);
            color: var(--warning);
        }

        .status-pendiente {
            background-color: rgba(198, 40, 40, 0.1);
            color: var(--danger);
        }

        /* ═══ EMPTY STATE ═══ */
        .empty-state {
            text-align: center;
            padding: 3rem 2rem;
            color: var(--text-secondary);
        }

        .empty-state i {
            font-size: 3rem;
            opacity: 0.3;
            margin-bottom: 1rem;
            display: block;
        }

        /* ═══ RESPONSIVE ═══ */
        @media (max-width: 768px) {
            .dashboard-header {
                padding: 1.5rem;
                margin-bottom: 1.5rem;
            }

            .header-title h1 {
                font-size: 1.5rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .orders-section {
                padding: 1.5rem;
            }

            .order-item {
                gap: 1rem;
                padding: 1rem;
                flex-wrap: wrap;
            }

            .order-price {
                min-width: auto;
                margin-right: 0;
                order: -1;
            }

            .order-status {
                order: 3;
                width: 100%;
                text-align: center;
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


    <!-- ═══ MAIN CONTENT ═══ -->
    <div class="dashboard-content">
        <!-- ═══ STATS CARDS ═══ -->
        <div class="stats-grid">
            <!-- Ventas Totales -->
            <div class="stat-card">
                <div class="stat-header">
                    <span class="stat-label">Ventas Totales</span>
                    <div class="stat-icon primary">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                </div>
                <div>
                    <div class="stat-value">$32,400</div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-up"></i>
                        +18.2% vs mes anterior
                    </div>
                    <div class="progress-bar-custom">
                        <div class="progress-fill" style="width: 82%;"></div>
                    </div>
                </div>
            </div>

            <!-- Pedidos -->
            <div class="stat-card">
                <div class="stat-header">
                    <span class="stat-label">Pedidos</span>
                    <div class="stat-icon primary">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                </div>
                <div>
                    <div class="stat-value">1,256</div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-up"></i>
                        +12.5% vs mes anterior
                    </div>
                    <div class="progress-bar-custom">
                        <div class="progress-fill" style="width: 75%;"></div>
                    </div>
                </div>
            </div>

            <!-- Productos -->
            <div class="stat-card">
                <div class="stat-header">
                    <span class="stat-label">Productos</span>
                    <div class="stat-icon success">
                        <i class="fas fa-box"></i>
                    </div>
                </div>
                <div>
                    <div class="stat-value">342</div>
                    <div class="stat-change negative">
                        <i class="fas fa-arrow-down"></i>
                        -5 productos agotados
                    </div>
                    <div class="progress-bar-custom">
                        <div class="progress-fill" style="width: 68%; background: linear-gradient(90deg, var(--success) 0%, #66bb6a 100%);"></div>
                    </div>
                </div>
            </div>

            <!-- Clientes -->
            <div class="stat-card">
                <div class="stat-header">
                    <span class="stat-label">Clientes</span>
                    <div class="stat-icon secondary">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
                <div>
                    <div class="stat-value">892</div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-up"></i>
                        +24 nuevos esta semana
                    </div>
                    <div class="progress-bar-custom">
                        <div class="progress-fill" style="width: 85%; background: linear-gradient(90deg, var(--secondary) 0%, #00897b 100%);"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ═══ PEDIDOS RECIENTES ═══ -->
        @forelse($pedidosRecientes as $pedido)
    <div class="order-item">
        <div class="order-avatar avatar-primary">
            {{ strtoupper(substr($pedido->usuario?->email ?? 'U', 0, 2)) }}
        </div>
        <div class="order-info">
            <div class="order-name">{{ $pedido->usuario?->email ?? 'Cliente' }}</div>
            <div class="order-product">
                {{ $pedido->detalles->first()->producto->nombre ?? 'Producto' }}
                @if($pedido->detalles->count() > 1)
                    y {{ $pedido->detalles->count() - 1 }} más
                @endif
            </div>
            <div class="order-time">
                <i class="fas fa-clock"></i>
                {{ $pedido->created_at->diffForHumans() }}
            </div>
        </div>
        <div class="order-price">${{ number_format($pedido->total, 2, ',', '.') }}</div>
        <span class="order-status status-{{ $pedido->estado }}">
            {{ ucfirst($pedido->estado) }}
        </span>
    </div>
@empty
    <div class="empty-state">
        <i class="fas fa-box-open"></i>
        <p>No hay pedidos recientes.</p>
    </div>
@endforelse
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<footer class="admin-footer">
    <div class="container">
        <div class="row align-items-center gy-3">
            <div class="col-12 col-md-4 text-center text-md-start">
                <span class="admin-footer__brand">NEOGAUCHO</span>
                <span class="mx-2">·</span>
                <span>&copy; {{ date('Y') }} CM2 - Panel de Control</span>
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