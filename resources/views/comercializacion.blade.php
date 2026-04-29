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
          <a class="nav-link" href="{{ route('home')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('productos')}}">Shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('comercializacion')}}">Comercialización</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('staff')}}">Quiénes Somos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('contacto')}}">Contacto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('terminos')}}" >Términos</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- ═══ HERO ══════════════════════════════════════════════ -->
<header class="hero">
  <div class="hero__bg">
    <img src="{{ asset('images/carrusel-byn.jpg') }}" class="img-fluid" alt="Hero editorial"/>
  </div>
  <div class="hero__overlay"></div>
  <div class="hero__content">
    <div class="hero__badge">Del pasado a tu puerta</div>
  </div>
</header>


<div class="container-comercializacion mt-5">  

    <div class="card-comercializacion shadow"> 
        <h1 class="text-center mb-4 hero__badge" >Comercialización</h1> 
        
        <div class="terminos-text">

            <h2 class="product-card__name" > Productos y disponibilidad</h2>
            <p>
                Todas nuestras prendas son únicas y seleccionadas cuidadosamente. 
                Esto significa que cada producto puede tener disponibilidad limitada (una sola unidad).
                Nos reservamos el derecho de modificar precios, descripciones o disponibilidad sin previo aviso.
            </p>

            <h2 class="product-card__name"> Proceso de compra</h2>
            <p>
                Para realizar una compra, el usuario deberá seleccionar el producto y completar los datos solicitados.
                Una vez confirmada la compra, se enviará un comprobante por el medio de contacto indicado.
            </p>

            <h2 class="product-card__name"> Formas de pago</h2>
            <p>
                Aceptamos diferentes medios de pago que serán informados al momento de la compra 
                (transferencia, billeteras virtuales, entre otros).
            </p>

            <h2 class="product-card__name"> Envíos y tiempos de entrega</h2>
            <p>
                Realizamos envíos a todo el país. Los tiempos de entrega pueden variar según la ubicación del cliente.
                Una vez despachado el pedido, se informará el seguimiento correspondiente.
            </p>

            <h2 class="product-card__name"> Cambios y devoluciones</h2>
            <p>
                Debido a la naturaleza vintage de las prendas, no se aceptan devoluciones por uso o desgaste propio de la prenda.
                Solo se aceptarán cambios en caso de fallas no informadas previamente.
            </p>

            <h2 class="product-card__name"> Garantías</h2>
            <p>
                Nos comprometemos a describir cada producto con la mayor transparencia posible.
                En caso de inconvenientes, podés contactarnos para encontrar una solución.
            </p>

        </div>

        <div class="text-center mt-4">
            <a href="#" class="btn-qs btn-comercializacion-primary">Volver al incio</a>
        </div>
    </div>
</div>

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



<!-- Bootstrap JS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
