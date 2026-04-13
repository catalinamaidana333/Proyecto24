<!DOCTYPE html>
<html>
<head>
    <title>Mensaje enviado</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <div class="container mt-5">
        <div class="card">
            <div class="card-body text-center">
                <p class="lead">Hola <strong> {{ $nombre }} </strong>, qué bueno recibir tu mensaje. Un miembro del equipo de ventas se pondrá en contacto con vos al correo: <strong>{{ $email}}</strong> ¡Muchas gracias!</p>

                <a href="/" class="btn btn-primary mt-3">Volver al inicio</a>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>