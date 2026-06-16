<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEOGAUCHO | Mi Cartera</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,300,0,0" />
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;600;700&family=Manrope:wght@400;500;700&display=swap" rel="stylesheet">

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
            --shadow-lg: 20px 40px 40px rgba(181, 0, 88, 0.15);
        }

        body {
            background-color: var(--surface) !important;
            font-family: 'Manrope', sans-serif;
            color: var(--text-primary) !important;
            -webkit-font-smoothing: antialiased;
            letter-spacing: 0.1px;
        }

        .heading-luxury {
            font-family: 'Space Grotesk', sans-serif;
            letter-spacing: 3px;
            font-weight: 700;
            color: var(--text-primary);
        }

        /* Contenedor de ítems minimalista sobre fondo claro */
        .cart-item-row {
            background-color: transparent;
            border-bottom: 1px solid var(--border);
            padding: 24px 0;
            transition: background-color 0.2s ease;
        }
        
        .cart-item-row:hover {
            background-color: rgba(181, 0, 88, 0.01);
        }

        .tag-talle {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.7rem;
            letter-spacing: 0.8px;
            color: var(--primary);
            text-transform: uppercase;
            border: 1px solid var(--primary-light);
            padding: 3px 10px;
            border-radius: 4px;
            background-color: rgba(255, 112, 158, 0.08);
            display: inline-block;
            font-weight: 600;
        }

        /* Resumen Lateral Estilizado */
        .summary-sticky-box {
            background-color: #ffffff;
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 35px;
            position: sticky;
            top: 40px;
            box-shadow: var(--shadow-lg);
        }

        /* Botón de Confirmación con el color identitario de NEOGAUCHO */
        .btn-confirm {
            background-color: var(--primary) !important;
            color: #ffffff !important;
            font-family: 'Space Grotesk', sans-serif;
            letter-spacing: 2px;
            font-weight: 700;
            border-radius: 6px;
            padding: 16px;
            border: none;
            transition: all 0.3s ease;
            text-transform: uppercase;
            font-size: 0.85rem;
        }
        .btn-confirm:hover {
            background-color: var(--primary-light) !important;
            box-shadow: var(--shadow);
            transform: translateY(-1px);
        }

        .btn-trash {
            color: var(--text-secondary);
            transition: color 0.2s ease, transform 0.2s ease;
        }
        .btn-trash:hover {
            color: var(--primary);
            transform: scale(1.1);
        }

        .font-editorial {
            font-family: 'Space Grotesk', sans-serif;
        }

        .text-muted-custom {
            color: var(--text-secondary);
        }

        /* Alertas adaptadas */
        .alert-custom {
            background-color: #ffffff;
            border: 1px solid var(--border);
            color: var(--text-primary);
            border-radius: 8px;
            box-shadow: var(--shadow);
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

<div class="container py-5 my-md-4">
    
    <div class="d-flex align-items-baseline justify-content-between mb-5 border-bottom pb-3" style="border-color: var(--border) !important;">
        <h1 class="heading-luxury text-uppercase m-0 fs-4">Bolsa de Selección</h1>
        <span class="text-muted-custom small font-editorial" style="letter-spacing: 2px; font-weight: 600;">NEOGAUCHO // CURADURÍA</span>
    </div>
    
    @if(session('error'))
        <div class="alert alert-danger alert-custom border-danger border-opacity-30 text-danger mb-4">{{ session('error') }}</div>
    @endif
    @if(session('success'))
        <div class="alert alert-success alert-custom border-success border-opacity-30 text-success mb-4">{{ session('success') }}</div>
    @endif

    @if($items->isEmpty())
        <div class="text-center py-5 my-5">
            <span class="material-symbols-outlined text-muted-custom mb-3" style="font-size: 3rem; font-weight: 300;">shopping_bag</span>
            <p class="text-muted-custom mb-4 font-editorial" style="letter-spacing: 0.5px;">No tenés piezas de archivo seleccionadas actualmente.</p>
            <a href="{{ route('productos.index') }}" class="btn btn-outline-dark px-4 py-2 text-uppercase fw-bold btn-sm font-editorial" style="letter-spacing: 1px; font-size: 0.75rem; border-radius: 4px;">
                Volver al Shop
            </a>
        </div>
    @else
        <div class="row g-5">
            
            <div class="col-12 col-lg-7">
                <div class="d-flex flex-column">
                    <div class="d-flex justify-content-between text-uppercase small font-editorial text-muted-custom pb-2 border-bottom" style="border-color: var(--border) !important; letter-spacing: 1px; font-size: 0.7rem; font-weight: 600;">
                        <span>Pieza Seleccionada</span>
                        <span>Subtotal</span>
                    </div>

                    @foreach($items as $item)
                    <div class="cart-item-row d-flex justify-content-between align-items-start">
                        
                        <div class="d-flex flex-column align-items-start">
                            <span class="fw-bold mb-1" style="font-size: 1.05rem; color: var(--text-primary); letter-spacing: 0.1px;">
                                {{ $item->producto->nombre }}
                            </span>
                            <span class="text-muted-custom small mb-2 font-editorial" style="font-size: 0.8rem; font-weight: 500;">
                                {{ $item->producto->diseñador ?? 'Colección de Archivo' }}
                            </span>
                            <div class="d-flex align-items-center gap-3">
                                <span class="tag-talle">
                                    {{ $item->talle ?? 'Único' }}
                                </span>
                                <span class="text-muted-custom small">
                                    Cantidad: <span class="font-editorial fw-bold text-dark">{{ $item->cantidad }}</span>
                                </span>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center gap-4">
                            <div class="text-end">
                                <span class="font-editorial fw-bold d-block" style="font-size: 1.05rem; color: var(--text-primary);">
                                    ${{ number_format($item->subtotal, 0, ',', '.') }}
                                </span>
                                @if($item->cantidad > 1)
                                <small class="text-muted-custom font-editorial" style="font-size: 0.75rem;">
                                    ${{ number_format($item->precio_unitario, 0, ',', '.') }} c/u
                                </small>
                                @endif
                            </div>
                            
                            <form method="POST" action="{{ route('carrito.eliminar', $item->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link btn-trash p-0 shadow-none align-middle">
                                    <span class="material-symbols-outlined" style="font-size: 1.3rem; font-weight: 300;">close</span>
                                </button>
                            </form>
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>

            <div class="col-12 col-lg-5">
                <div class="summary-sticky-box">
                    <h3 class="font-editorial text-uppercase fw-bold mb-4" style="font-size: 1rem; letter-spacing: 2px; color: var(--text-primary);">Resumen de Selección</h3>
                    
                    <div class="d-flex justify-content-between small text-muted-custom mb-2 font-editorial">
                        <span>Valor de las Piezas</span>
                        <span>${{ number_format($carrito->total, 0, ',', '.') }}</span>
                    </div>
                    <div class="d-flex justify-content-between small text-muted-custom mb-3 font-editorial pb-3 border-bottom" style="border-color: var(--border) !important;">
                        <span>Envío Asegurado</span>
                        <span class="text-uppercase" style="font-size: 0.75rem; color: var(--primary); font-weight: 700; letter-spacing: 0.5px;">Bonificado</span>
                    </div>

                    <div class="d-flex justify-content-between align-items-baseline mb-4">
                        <span class="font-editorial text-uppercase small text-muted-custom" style="letter-spacing: 1px; font-weight: 600;">Total Final</span>
                        <span class="font-editorial fw-bold" style="font-size: 1.7rem; color: var(--primary);">
                            ${{ number_format($carrito->total, 0, ',', '.') }}
                        </span>
                    </div>

                    <form method="POST" action="{{ route('carrito.confirmar') }}">
                        @csrf
                        <button type="submit" class="btn btn-confirm w-100 py-3 shadow-sm">
                            Confirmar Compra
                        </button>
                    </form>
                    
                    <div class="text-center mt-3">
                        <small class="text-muted-custom small font-editorial" style="font-size: 0.7rem; letter-spacing: 0.3px; display: block;">
                            Al confirmar la orden, las piezas se reservarán y se generará tu comprobante de archivo.
                        </small>
                    </div>
                </div>
            </div>

        </div>
    @endif
</div>


</body>
</html>