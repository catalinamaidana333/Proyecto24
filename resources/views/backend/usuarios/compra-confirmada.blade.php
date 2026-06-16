<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEOGAUCHO | Éxito</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@600;700&family=Manrope:wght@400;500;700&display=swap" rel="stylesheet">

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
        }

        body {
            background-color: var(--surface);
            font-family: 'Manrope', sans-serif;
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            margin: 0;
        }

        .ticket-card {
            background-color: #ffffff;
            border: 1px solid var(--border);
            border-radius: 12px;
            box-shadow: var(--shadow);
            max-width: 450px;
            width: 100%;
            padding: 35px 25px;
        }

        .brand-title {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1.3rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--text-primary);
        }

        .success-icon {
            color: var(--primary);
            font-size: 2.5rem;
            margin-bottom: 15px;
        }

        .total-box {
            background-color: var(--surface);
            border-radius: 6px;
            padding: 15px;
            border: 1px solid var(--border);
        }

        .btn-download {
            background-color: var(--primary) !important;
            color: #ffffff !important;
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 600;
            letter-spacing: 0.5px;
            border: none;
            border-radius: 6px;
            transition: background-color 0.2s ease;
        }
        .btn-download:hover {
            background-color: var(--primary-light) !important;
        }

        .btn-home {
            background-color: transparent !important;
            color: var(--text-secondary) !important;
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 600;
            letter-spacing: 0.5px;
            border: 1px solid var(--border) !important;
            border-radius: 6px;
            transition: all 0.2s ease;
        }
        .btn-home:hover {
            background-color: var(--surface-container) !important;
            color: var(--text-primary) !important;
        }
    </style>
</head>
<body>

<div class="ticket-card text-center">
    
    <!-- Ícono de Éxito -->
    <div class="success-icon">
        <i class="fa-solid fa-circle-check"></i>
    </div>

    <!-- Título Principal -->
    <h2 class="brand-title fw-bold mb-2">¡Muchas gracias!</h2>
    <p class="small text-muted mb-4" style="color: var(--text-secondary) !important;">
        Tu pedido ha sido procesado de manera segura.
    </p>

    <!-- Caja del Total -->
    <div class="total-box mb-4">
        <span class="text-uppercase small fw-bold d-block mb-1" style="color: var(--text-secondary); font-size: 0.75rem; letter-spacing: 0.5px;">Monto Abonado</span>
        <h4 class="fw-bold m-0 font-monospace" style="color: var(--primary); font-size: 1.4rem;">
            ${{ number_format(session('total'), 2, ',', '.') }}
        </h4>
    </div>

    <!-- Bloque de Descarga Condicional -->
    <div class="mb-3">
        @if(session('items') && count(session('items')) > 0)
            @php
                $copiaItems = session('items');
                $primerItem = reset($copiaItems);
           @endphp

            <a href="{{ route('factura.descargar', is_array($primerItem) ? $primerItem['venta_id'] : $primerItem->venta_id) }}" 
               class="btn btn-download w-100 py-2.5 small text-uppercase">
                <i class="fa-solid fa-file-pdf me-2"></i> Descargar Ticket
            </a>
        @else
            <p class="small text-muted m-0" style="font-size: 0.8rem;">
                El enlace de descarga del ticket expiró.
            </p>
        @endif
    </div>

    <!-- Botón de Retorno -->
    <a href="/" class="btn btn-home w-100 py-2.5 small text-uppercase">Volver al Inicio</a>

</div>

</body>
</html>