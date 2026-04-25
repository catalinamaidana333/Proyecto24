<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiénes Somos</title>

    <!-- Bootstrap LOCAL -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">

    <!-- CSS propio -->
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
                <li class="nav-item"><a href="/quienes-somos" class="active">Quiénes somos</a></li>
                <li class="nav-item"><a href="/">Contactar</a></li>
                <li class="nav-item"><a href="/terminos">Términos</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- CONTENIDO -->
<div class="container mt-5">

    <div class="card p-4 shadow">
        <h1 class="text-center mb-4">¿Quiénes somos?</h1>

        <p>
            Somos Catalina y Camila, dos apasionadas por la moda con una visión clara: darle una nueva vida al estilo vintage. Nos encanta rescatar prendas de marca que tienen historia, personalidad y un encanto único que no pasa de moda.

        <p>
           Creemos en la fuerza de los colores intensos, en las combinaciones que se animan a destacar y en la ropa como una forma de expresión auténtica. Cada prenda que elegimos refleja nuestro gusto por lo original, lo llamativo y lo diferente.
        </p>

        <p>
            Nuestro objetivo es ofrecer piezas que no solo se vean bien, sino que también hagan sentir especial a quien las usa. Apostamos a un estilo con identidad, donde lo vintage se mezcla con lo actual para crear algo único.
        </p>

        <p>
            Nuestro emprendimiento nació como un proyecto pequeño, impulsado por nuestra pasión y curiosidad por la moda circular. Con el tiempo, fuimos creciendo gracias al compromiso, la dedicación y la conexión con quienes valoran un estilo único. Hoy seguimos evolucionando, incorporando nuevas ideas y seleccionando piezas cada vez más especiales para ofrecer una propuesta distinta dentro del mundo de la moda.
        </p>

        <h1 class="text-center mb-4">Nuestros objetivos</h1>

        <p>
            Nuestro principal objetivo es promover una moda más consciente y sostenible, extendiendo la vida útil de prendas de calidad y reduciendo el impacto ambiental del consumo masivo. Buscamos que cada cliente encuentre una prenda que lo represente, que lo haga sentir seguro y auténtico.
        </p>

        <p>
            Además, queremos posicionarnos como una referencia en moda vintage, ofreciendo una curaduría cuidada de prendas de marca, con estilo y personalidad. Nos proponemos seguir creciendo, ampliar nuestra comunidad y brindar una experiencia de compra cercana, confiable y personalizada.
        </p>

        <h1 class="text-center mb-4">Nuestro equipo(staff)</h1>

        <p>
            Detrás de este proyecto estamos nosotras, Catalina y Camila, encargadas de la selección de prendas, la estética de la marca y la atención al cliente. Nos ocupamos de cada detalle: desde la búsqueda de piezas únicas hasta la presentación final de cada producto.
        </p> 

        <p>
            A medida que el emprendimiento crece, también contamos con el apoyo de colaboradores que nos ayudan en áreas como fotografía, redes sociales y logística, permitiéndonos mejorar continuamente y ofrecer un servicio de mayor calidad.
        </p>

        <div class="text-center mt-4">
            <a href="#" class="btn btn-primary">Ver productos</a>
            <a href="#" class="btn btn-secondary">Contactar</a>
        </div>
    </div>

<!-- CARRUSEL -->
<div id="carouselExample" class="carousel slide mt-5" data-bs-ride="carousel">
    
    <div class="carousel-inner">

        <div class="carousel-item active">
            <img src="{{ asset('images/carrusel-bottega.jpg') }}" class="d-block w-100" alt="Moda 1">
        </div>

        <div class="carousel-item">
            <img src="{{ asset('images/carrusel-pasarela1.jpg') }}" class="d-block w-100" alt="Moda 3">
        </div>

        <div class="carousel-item">
            <img src="{{ asset('images/carrusel-runway.jpg') }}" class="d-block w-100" alt="Moda 2">
        </div>

        <div class="carousel-item">
            <img src="{{ asset('images/carrusel-byn.jpg') }}" class="d-block w-100" alt="Moda 4">
        </div>

    </div>

    <!-- BOTONES -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>

</div>

</div>

<!-- FOOTER -->
<!-- ═══ FOOTER ════════════════════════════════════════════ -->
<footer class="site-footer pb-5">
  <div class="container-xl px-4 px-md-5">
    <div class="row g-5">
      <!-- Brand -->
      <div class="col-12 col-md-5">
        <span class="site-footer__logo">NEOGAUCHO</span>
        <p class="site-footer__tagline">
          A destination for collectors and enthusiasts of archival luxury. Preserving the aesthetic history of the digital age.
        </p>
        <!--sacarlos o cambiarlos-->
        
      </div>

      <!-- Explore -->
      <div class="col-12 col-sm-6">
        <h5 class="footer-col__heading">Explore</h5>
        <ul class="footer-col__links">
          <li><a href="#">Shop All</a></li>
          <li><a href="#">Drops</a></li>
          <li><a href="#">Editorial</a></li>
          <li><a href="#">Curated</a></li>
        </ul>
      </div>

      <!-- Service -->
      <div class="col-12 col-sm-6">
        <h5 class="footer-col__heading">Service</h5>
        <ul class="footer-col__links">
          <li><a href="#">Contact</a></li>
          <li><a href="#">Shipping</a></li>
          <li><a href="#">Returns</a></li>
          <li><a href="#">Terms</a></li>
        </ul>
      </div>
    </div>

    <!-- Bottom bar -->
    <div class="footer-bottom d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
      <span class="footer-copy">© 2024 The Digital Archive. All rights reserved.</span>
      <div class="d-flex gap-4">
        <a href="#" class="footer-copy" style="transition: opacity 0.2s;">Privacy Policy</a>
        <a href="#" class="footer-copy" style="transition: opacity 0.2s;">Accessibility</a>
      </div>
    </div>
  </div>
</footer>


<!-- JS Bootstrap -->
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>