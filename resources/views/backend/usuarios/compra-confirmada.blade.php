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
</body>
</html>