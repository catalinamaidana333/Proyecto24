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

<!-- ═══ NAVBAR ════════════════════════════════════════════ -->

<nav class="navbar navbar-expand-lg">
  <div class="container-fluid px-0">
    <a class="navbar-brand" href="{{ route('home') }}">NEOGAUCHO</a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
 
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Comercialización</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Quiénes Somos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contacto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Términos</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
 

<!-- CONTENIDO -->
<div class="container-qs mt-5">

    <div class="card-qs p-4 shadow">
        <h2 class="text-center mb-4">¿Quiénes somos?</h2>

        <p>
            Somos Catalina y Camila, dos apasionadas por la moda con una visión clara: darle una nueva vida al estilo vintage. Nos encanta rescatar prendas de marca que tienen historia, personalidad y un encanto único que no pasa de moda.
        </p>

        <p>
           Creemos en la fuerza de los colores intensos, en las combinaciones que se animan a destacar y en la ropa como una forma de expresión auténtica. Cada prenda que elegimos refleja nuestro gusto por lo original, lo llamativo y lo diferente.
        </p>

        <p>
            Nuestro objetivo es ofrecer piezas que no solo se vean bien, sino que también hagan sentir especial a quien las usa. Apostamos a un estilo con identidad, donde lo vintage se mezcla con lo actual para crear algo único.
        </p>

        <p>
            Nuestro emprendimiento nació como un proyecto pequeño, impulsado por nuestra pasión y curiosidad por la moda circular. Con el tiempo, fuimos creciendo gracias al compromiso, la dedicación y la conexión con quienes valoran un estilo único. Hoy seguimos evolucionando, incorporando nuevas ideas y seleccionando piezas cada vez más especiales para ofrecer una propuesta distinta dentro del mundo de la moda.
        </p>

        <h2 class="text-center mb-4">Nuestros objetivos</h2>

        <p>
            Nuestro principal objetivo es promover una moda más consciente y sostenible, extendiendo la vida útil de prendas de calidad y reduciendo el impacto ambiental del consumo masivo. Buscamos que cada cliente encuentre una prenda que lo represente, que lo haga sentir seguro y auténtico.
        </p>

        <p>
            Además, queremos posicionarnos como una referencia en moda vintage, ofreciendo una curaduría cuidada de prendas de marca, con estilo y personalidad. Nos proponemos seguir creciendo, ampliar nuestra comunidad y brindar una experiencia de compra cercana, confiable y personalizada.
        </p>

        <h2 class="text-center mb-4">Nuestro equipo(staff)</h2>

        <p>
            Detrás de este proyecto estamos nosotras, Catalina y Camila, encargadas de la selección de prendas, la estética de la marca y la atención al cliente. Nos ocupamos de cada detalle: desde la búsqueda de piezas únicas hasta la presentación final de cada producto.
        </p> 

        <p>
            A medida que el emprendimiento crece, también contamos con el apoyo de colaboradores que nos ayudan en áreas como fotografía, redes sociales y logística, permitiéndonos mejorar continuamente y ofrecer un servicio de mayor calidad.
        </p>

        <div class="text-center mt-4">
            <a href="#" class="btn-qs btn-qs-primary">Ver productos</a>
            <a href="#" class="btn-qs btn-qs-secondary">Contactar</a>
        </div>
    </div>
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
          <li><a href="#">Shopping</a></li>
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


<!-- Bootstrap JS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>