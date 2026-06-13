<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEOGAUCHO | Mi Cartera</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,300,0,0" />
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;600;700&family=Manrope:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg-dark: #0f0f11;
            --surface-card: #16161a;
            --border-muted: #2a2a32;
            --accent-pink: #ffc0cb;
            --text-muted: #8e8e93;
        }

        body {
            background-color: var(--bg-dark);
            font-family: 'Manrope', sans-serif;
            color: #ffffff;
            -webkit-font-smoothing: antialiased;
        }

        .heading-luxury {
            font-family: 'Space Grotesk', sans-serif;
            letter-spacing: 3px;
            font-weight: 700;
        }

        .cart-card {
            background-color: var(--surface-card);
            border: 1px solid var(--border-muted);
            border-radius: 14px;
        }

        /* Tabla estilizada para pantallas grandes */
        .custom-table {
            color: #ffffff;
            margin-bottom: 0;
        }
        .custom-table thead th {
            font-family: 'Space Grotesk', sans-serif;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 1px;
            color: var(--text-muted);
            border-bottom: 1px solid var(--border-muted);
            padding: 15px 10px;
        }
        .custom-table tbody td {
            padding: 24px 10px;
            border-bottom: 1px solid rgba(42, 42, 50, 0.5);
            font-size: 0.95rem;
        }

        .tag-talle {
            background-color: rgba(255, 192, 203, 0.1);
            color: var(--accent-pink);
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            padding: 4px 10px;
            border-radius: 6px;
            border: 1px solid rgba(255, 192, 203, 0.2);
            display: inline-block;
        }

        /* Botón de acción minimalista */
        .btn-trash {
            color: var(--text-muted);
            transition: color 0.2s ease, transform 0.2s ease;
        }
        .btn-trash:hover {
            color: #ff4d4d;
            transform: scale(1.05);
        }

        /* Resumen de compra */
        .summary-box {
            background-color: rgba(22, 22, 26, 0.7);
            border-top: 1px solid var(--border-muted);
            padding-top: 30px;
        }

        .btn-confirm {
            background-color: var(--accent-pink) !important;
            color: #000000 !important;
            font-family: 'Space Grotesk', sans-serif;
            letter-spacing: 1.5px;
            font-weight: 700;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .btn-confirm:hover {
            background-color: #ffffff !important;
            box-shadow: 0 4px 15px rgba(255, 192, 203, 0.3);
            transform: translateY(-1px);
        }

        /* Ajustes de alertas */
        .alert-custom {
            background-color: var(--surface-card);
            border: 1px solid var(--border-muted);
            color: #ffffff;
            border-radius: 8px;
        }
    </style>
</head>
<body>

<div class="container py-5 my-md-4">
    <div class="cart-card p-4 p-md-5 shadow-lg">
        
        <div class="d-flex align-items-center justify-content-between mb-5 border-bottom pb-3 border-secondary border-opacity-10">
            <h2 class="heading-luxury text-uppercase m-0 fs-3">Tu Cartera de Compras</h2>
            <span class="text-muted small font-monospace">NEOGAUCHO // ARCHIVE</span>
        </div>
        
        @if(session('error'))
            <div class="alert alert-danger alert-custom border-danger border-opacity-20 text-danger mb-4">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="alert alert-success alert-custom border-success border-opacity-20 text-success mb-4">{{ session('success') }}</div>
        @endif

        @if($items->isEmpty())
            <div class="text-center py-5">
                <span class="material-symbols-outlined text-muted mb-3" style="font-size: 3.5rem;">shopping_bag</span>
                <p class="text-muted mb-4" style="font-size: 1.05rem;">No tienes piezas seleccionadas actualmente en tu bolsa.</p>
                <a href="{{ route('productos.index') }}" class="btn btn-outline-light px-4 py-2 text-uppercase fw-bold btn-sm" style="font-family: 'Space Grotesk', sans-serif; letter-spacing: 1px;">
                    Volver al Shop
                </a>
            </div>
        @else
            <div class="table-responsive">
                <table class="table custom-table align-middle">
                    <thead>
                        <tr>
                            <th>Pieza de Archivo</th>
                            <th class="text-center">Cantidad</th>
                            <th class="text-end">Precio</th>
                            <th class="text-end">Subtotal</th>
                            <th class="text-center">Remover</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td>
                                <div class="d-flex flex-column">
                                    <span class="fw-bold text-white mb-2" style="letter-spacing: 0.3px;">
                                        {{ $item->producto->nombre }}
                                    </span>
                                    <div>
                                        <span class="tag-talle text-uppercase">
                                            Talle: {{ $item->talle ?? 'Único' }}
                                        </span>
                                    </div>
                                </div>
                            </td>
                            
                            <td class="text-center font-monospace">{{ $item->cantidad }}</td>
                            
                            <td class="text-end font-monospace text-muted">
                                ${{ number_format($item->precio_unitario, 0, ',', '.') }}
                            </td>
                            
                            <td class="text-end font-monospace fw-semibold" style="color: var(--accent-pink);">
                                ${{ number_format($item->subtotal, 0, ',', '.') }}
                            </td>
                            
                            <td class="text-center">
                                <form method="POST" action="{{ route('carrito.eliminar', $item->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link btn-trash p-0 shadow-none align-middle">
                                        <span class="material-symbols-outlined" style="font-size: 1.3rem;">delete</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="summary-box mt-5">
                <div class="row g-4 align-items-center">
                    <div class="col-12 col-md-6 text-md-start text-center">
                        <div class="d-inline-flex flex-column">
                            <span class="text-muted small text-uppercase mb-1" style="font-family: 'Space Grotesk', sans-serif; letter-spacing: 1px;">Monto Neto Estimado</span>
                            <h3 class="fw-bold m-0 font-monospace" style="font-size: 1.8rem; letter-spacing: -0.5px;">
                                Total: ${{ number_format($carrito->total, 0, ',', '.') }}
                            </h3>
                        </div>
                    </div>
                    
                    <div class="col-12 col-md-6 text-md-end text-center">
                        <form method="POST" action="{{ route('carrito.confirmar') }}">
                            @csrf
                            <button type="submit" class="btn btn-confirm px-5 py-3 text-uppercase fw-bold w-100 w-md-auto">
                                Confirmar Compra
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

</body>
</html>