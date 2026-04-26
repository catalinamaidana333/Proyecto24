<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Términos y Condiciones - NEOGAUCHO</title>

    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg site-nav flex-column">
    <div class="container-fluid flex-column">
        <a class="navbar-brand brand-name" href="/">NEOGAUCHO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="site-nav__links navbar-nav">
                <li class="nav-item item-nav"><a href="/">Home</a></li>
                <li class="nav-item"><a href="/">Shop</a></li> 
                <li class="nav-item"><a href="/">Comercializacion</a></li>
                <li class="nav-item"><a href="/quienes-somos">Quiénes somos</a></li>
                <li class="nav-item"><a href="/">Contactar</a></li>
                <li class="nav-item"><a href="/terminos" class="active">Términos</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">

    <div class="card shadow">
        <h1 class="text-center mb-4">Términos <span style="color: var(--on-surface-var); font-weight: 300;">& Condiciones</span></h1>
        
        <div class="terminos-text">
            <h2>1. Aceptación de los términos</h2>
            <p>
                Al acceder y utilizar este sitio web, aceptás cumplir con los presentes Términos y Condiciones. 
                Si no estás de acuerdo con alguna parte, te recomendamos no utilizar nuestros servicios.
            </p>

            <h2>2. Uso del sitio web</h2>
            <p>
                Este sitio está destinado a la compra de prendas vintage seleccionadas. 
                El usuario se compromete a hacer un uso adecuado del contenido, sin realizar actividades ilegales 
                o que puedan dañar la imagen de la marca.
            </p>

            <h2>3. Productos y disponibilidad</h2>
            <p>
                Todas nuestras prendas son únicas y seleccionadas cuidadosamente. 
                Esto significa que cada producto puede tener disponibilidad limitada (una sola unidad).
                Nos reservamos el derecho de modificar precios, descripciones o disponibilidad sin previo aviso.
            </p>

            <h2>4. Proceso de compra</h2>
            <p>
                Para realizar una compra, el usuario deberá seleccionar el producto y completar los datos solicitados.
                Una vez confirmada la compra, se enviará un comprobante por el medio de contacto indicado.
            </p>

            <h2>5. Formas de pago</h2>
            <p>
                Aceptamos diferentes medios de pago que serán informados al momento de la compra 
                (transferencia, billeteras virtuales, entre otros).
            </p>

            <h2>6. Envíos y tiempos de entrega</h2>
            <p>
                Realizamos envíos a todo el país. Los tiempos de entrega pueden variar según la ubicación del cliente.
                Una vez despachado el pedido, se informará el seguimiento correspondiente.
            </p>

            <h2>7. Cambios y devoluciones</h2>
            <p>
                Debido a la naturaleza vintage de las prendas, no se aceptan devoluciones por uso o desgaste propio de la prenda.
                Solo se aceptarán cambios en caso de fallas no informadas previamente.
            </p>

            <h2>8. Garantías</h2>
            <p>
                Nos comprometemos a describir cada producto con la mayor transparencia posible.
                En caso de inconvenientes, podés contactarnos para encontrar una solución.
            </p>

            <h2>9. Privacidad</h2>
            <p>
                Los datos personales proporcionados serán utilizados únicamente para procesar compras 
                y mejorar la experiencia del usuario. No compartimos información con terceros.
            </p>

            <h2>10. Propiedad intelectual</h2>
            <p>
                Todo el contenido del sitio (imágenes, textos, diseño) es propiedad de la marca 
                y no puede ser utilizado sin autorización previa.
            </p>

            <h2>11. Modificaciones</h2>
            <p>
                Nos reservamos el derecho de modificar estos términos en cualquier momento. 
                Las modificaciones entrarán en vigencia desde su publicación en el sitio.
            </p>

            <h2>12. Contacto</h2>
            <p>
                Para consultas o soporte postventa, podés comunicarte con nosotras a través de nuestras redes sociales 
                o medios de contacto disponibles en el sitio.
            </p>
        </div>

        <div class="text-center mt-4">
            <a href="/" class="btn btn-primary">Volver al inicio</a>
        </div>
    </div>
</div>

<div id="carouselExample" class="carousel slide mb-5" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images/producto1.jpg') }}" class="d-block w-100" alt="Moda 1">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/producto2.jpg') }}" class="d-block w-100" alt="Moda 2">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/producto3.jpg') }}" class="d-block w-100" alt="Moda 3">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/producto4.jpg') }}" class="d-block w-100" alt="Moda 4">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/producto5.jpg') }}" class="d-block w-100" alt="Moda 5">
        </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
    </button>
</div>
</section>

<footer class="mb-5">
    <p>© 2026 Catalina & Camila</p>
</footer>

<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>