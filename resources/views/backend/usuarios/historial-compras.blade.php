<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEOGAUCHO | Mis Compras</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@600;700&family=Manrope:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary:           #b50058;
            --primary-light:     #ff709e;
            --surface:           #f9f6f5;
            --surface-container: #eae7e7;
            --text-primary:      #2f2f2e;
            --text-secondary:    #5c5b5b;
            --border:            #dfdcdc;
            --shadow:            0 4px 12px rgba(181, 0, 88, 0.08);
        }

        body {
            background-color: var(--surface);
            font-family: 'Manrope', sans-serif;
            color: var(--text-primary);
            min-height: 100vh;
            padding: 40px 16px 80px;
        }

        /* ── Encabezado ── */
        .page-header {
            max-width: 760px;
            margin: 0 auto 32px;
        }

        .page-header h1 {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1.6rem;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            color: var(--text-primary);
            margin-bottom: 4px;
        }

        .page-header p {
            font-size: 0.9rem;
            color: var(--text-secondary);
            margin: 0;
        }

        /* ── Tarjeta de orden ── */
        .orden-card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 12px;
            box-shadow: var(--shadow);
            max-width: 760px;
            margin: 0 auto 20px;
            overflow: hidden;
        }

        /* ── Cabecera clickeable ── */
        .orden-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 24px;
            cursor: pointer;
            gap: 12px;
            flex-wrap: wrap;
            border-bottom: 1px solid transparent;
            transition: background 0.15s;
        }

        .orden-header:hover {
            background: var(--surface);
        }

        .orden-card.abierta .orden-header {
            border-bottom-color: var(--border);
        }

        .orden-num {
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--primary);
            display: block;
            margin-bottom: 2px;
        }

        .orden-fecha {
            font-size: 0.85rem;
            color: var(--text-secondary);
        }

        .orden-total {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1.1rem;
            color: var(--text-primary);
            white-space: nowrap;
        }

        .chevron-icon {
            color: var(--text-secondary);
            font-size: 0.85rem;
            transition: transform 0.25s;
            flex-shrink: 0;
        }

        .orden-card.abierta .chevron-icon {
            transform: rotate(180deg);
        }

        /* ── Cuerpo de la orden ── */
        .orden-body {
            display: none;
            padding: 0 24px 20px;
        }

        .orden-card.abierta .orden-body {
            display: block;
        }

        /* ── Tabla de productos ── */
        .tabla-productos {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.88rem;
            margin-top: 16px;
        }

        .tabla-productos thead th {
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.07em;
            text-transform: uppercase;
            color: var(--text-secondary);
            padding: 0 0 10px;
            border-bottom: 1px solid var(--border);
        }

        .tabla-productos thead th:last-child { text-align: right; }
        .tabla-productos thead th:nth-child(2),
        .tabla-productos thead th:nth-child(3) { text-align: center; }

        .tabla-productos tbody td {
            padding: 10px 0;
            border-bottom: 1px solid var(--border);
            vertical-align: middle;
        }

        .tabla-productos tbody tr:last-child td { border-bottom: none; }

        .tabla-productos td:nth-child(2),
        .tabla-productos td:nth-child(3),
        .tabla-productos td:nth-child(4) { text-align: center; color: var(--text-secondary); }

        .tabla-productos thead th:nth-child(4) { text-align: center; }

        .tabla-productos td:last-child { text-align: right; font-weight: 600; }

        .badge-talle {
            display: inline-block;
            background: var(--surface-container);
            color: var(--text-secondary);
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            padding: 2px 8px;
            border-radius: 4px;
            text-transform: uppercase;
        }

        .prod-nombre { font-weight: 500; }

        /* ── Fila de total ── */
        .fila-total {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 14px;
            padding-top: 14px;
            border-top: 1px solid var(--border);
        }

        .fila-total span:first-child {
            font-size: 0.8rem;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.06em;
            font-weight: 600;
        }

        .fila-total span:last-child {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1.1rem;
            color: var(--primary);
        }

        /* ── Botón de factura ── */
        .btn-factura {
            background-color: transparent;
            color: var(--primary);
            border: 1px solid var(--primary);
            border-radius: 6px;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            padding: 6px 14px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s;
        }

        .btn-factura:hover {
            background-color: var(--primary);
            color: #fff;
        }

        /* ── Estado vacío ── */
        .estado-vacio {
            max-width: 760px;
            margin: 60px auto;
            text-align: center;
            color: var(--text-secondary);
        }

        .estado-vacio i {
            font-size: 2.5rem;
            color: var(--border);
            margin-bottom: 16px;
        }

        .estado-vacio p { font-size: 0.95rem; margin-bottom: 20px; }

        .btn-volver {
            background-color: var(--primary);
            color: #fff;
            border: none;
            border-radius: 6px;
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 600;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            padding: 10px 24px;
            text-decoration: none;
            transition: background 0.2s;
        }

        .btn-volver:hover { background-color: var(--primary-light); color: #fff; }
    </style>
</head>
<body>


<div class="page-header">
    <h1>Mis compras</h1>
    <p>Historial de todas tus órdenes confirmadas</p>
</div>

{{-- Sin compras --}}
@if($ventas->isEmpty())
    <div class="estado-vacio">
        <i class="fa-solid fa-bag-shopping"></i>
        <p>Todavía no tenés compras confirmadas.</p>
        <a href="{{ route('home') }}" class="btn-volver">Ver productos</a>
    </div>

{{-- Lista de compras --}}
@else
    @foreach($ventas as $venta)
        <div class="orden-card" id="orden-{{ $venta->id }}">

            {{-- Cabecera clickeable --}}
            <div class="orden-header" onclick="toggleOrden({{ $venta->id }})">
                <div>
                    <span class="orden-num">Orden #{{ $venta->id }}</span>
                    <span class="orden-fecha">
                        {{ $venta->fecha_venta ? $venta->fecha_venta->format('d/m/Y H:i') : '—' }}
                    </span>
                </div>

                <div class="d-flex align-items-center gap-3">
                    <span class="orden-total">
                        ${{ number_format($venta->total, 2, ',', '.') }}
                    </span>
                    <a href="{{ route('factura.descargar', $venta->id) }}"
                       class="btn-factura"
                       onclick="event.stopPropagation()">
                        <i class="fa-solid fa-file-pdf"></i> Ticket
                    </a>
                    <i class="fa-solid fa-chevron-down chevron-icon"></i>
                </div>
            </div>

            {{-- Detalle de productos --}}
            <div class="orden-body">
                <table class="tabla-productos">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cant.</th>
                            <th>Talle</th>
                            <th>Precio unit.</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($venta->detalles as $item)
                            <tr>
                                <td class="prod-nombre">
                                    {{ $item->producto->nombre ?? 'Producto eliminado' }}
                                </td>
                                <td>{{ $item->cantidad }}</td>
                                <td>
                                    @if($item->talle)
                                        <span class="badge-talle">{{ $item->talle }}</span>
                                    @else
                                        <span style="color: var(--border)">—</span>
                                    @endif
                                </td>
                                <td>${{ number_format($item->precio_unitario, 2, ',', '.') }}</td>
                                <td>${{ number_format($item->subtotal, 2, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="fila-total">
                    <span>{{ $venta->detalles->count() }} artículo{{ $venta->detalles->count() !== 1 ? 's' : '' }}</span>
                    <span>${{ number_format($venta->total, 2, ',', '.') }}</span>
                </div>
            </div>

        </div>
    @endforeach
@endif

<script>
    function toggleOrden(id) {
        const card = document.getElementById('orden-' + id);
        card.classList.toggle('abierta');
    }

    // Abre la primera orden por defecto
    document.addEventListener('DOMContentLoaded', () => {
        const primera = document.querySelector('.orden-card');
        if (primera) primera.classList.add('abierta');
    });
</script>

</body>
</html>