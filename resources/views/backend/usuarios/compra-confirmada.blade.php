<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>NEOGAUCHO | Éxito</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="container text-center py-5">
    <div class="card p-5 shadow border-0 m-auto" style="max-width: 600px; border-radius: 16px;">
        <span class="text-success" style="font-size: 4rem;">✓</span>
        <h2 class="fw-bold my-3" style="font-family: 'Space Grotesk', sans-serif;">¡Muchas gracias por tu compra!</h2>
        <p class="text-muted">Tu pedido ha sido procesado de manera segura y el stock correspondiente fue reservado.</p>
        <hr>
        <h4 class="fw-bold mb-4">Total abonado: ${{ number_format(session('total'), 2, ',', '.') }}</h4>
        <a href="/" class="btn text-white w-100" style="background-color: var(--text-primary);">Volver al Inicio</a>
    </div>
</div>
<div class="text-center mt-4">
    <h3 class="fw-bold text-success">¡Tu orden ha sido procesada!</h3>
    <p class="text-muted">El registro se completó correctamente en nuestra base de datos.</p>
@if(session('items') && count(session('items')) > 0)
    @php
        // 1. Bajamos el array de la sesión a una variable real
        $copiaItems = session('items');
        
        // 2. Ahora sí, pasamos la variable por referencia a reset() sin que PHP proteste
        $primerItem = reset($copiaItems);
    @endphp

    <a href="{{ route('factura.descargar', is_array($primerItem) ? $primerItem['venta_id'] : $primerItem->venta_id) }}" class="btn btn-dark px-4 py-2 mt-3" style="background-color: var(--primary); border: none;">
        <i class="fa-solid fa-file-pdf me-2"></i> Descargar Factura / Ticket
    </a>
@else
    <p class="text-muted small mt-3">El enlace de descarga expiró. Podés revisar tus compras en tu perfil.</p>
@endif
</div>
</body>
</html>