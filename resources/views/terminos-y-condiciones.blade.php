<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEOGAUCHO | Términos y Condiciones</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css2?family=Epilogue:ital,wght@0,400;0,700;0,900;1,900&family=Manrope:wght@400;500;700&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

  <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  
</head>

<body>

<!-- ═══ NAVBAR ════════════════════════════════════════════ -->

@include('backend.usuarios.navbarCliente')

<!-- ═══ HERO ══════════════════════════════════════════════ -->
<header class="hero">
  <div class="hero__bg">
    <img src="{{ asset('images/carrusel-runway.jpg') }}" class="img-fluid" alt="Hero editorial"/>
  </div>
  <div class="hero__overlay"></div>
  <div class="hero__content">
    <div class="hero__badge">Terminos</div>
  </div>
</header>

<div class="container-terminos mt-5">

    <div class="card-terminos shadow">
        
        <div class="terminos-text">
            <h2 class="product-card__name"> Aceptación de los términos</h2>
            <p>
                Al acceder y utilizar este sitio web, aceptás cumplir con los presentes Términos y Condiciones. 
                Si no estás de acuerdo con alguna parte, te recomendamos no utilizar nuestros servicios.
            </p>

            <h2 class="product-card__name"> Uso del sitio web</h2>
            <p>
                Este sitio está destinado a la compra de prendas vintage seleccionadas. 
                El usuario se compromete a hacer un uso adecuado del contenido, sin realizar actividades ilegales 
                o que puedan dañar la imagen de la marca.
            </p>

            <h2 class="product-card__name"> Privacidad</h2>
            <p>
                Los datos personales proporcionados serán utilizados únicamente para procesar compras 
                y mejorar la experiencia del usuario. No compartimos información con terceros.
            </p>

            <h2 class="product-card__name"> Propiedad intelectual</h2>
            <p>
                Todo el contenido del sitio (imágenes, textos, diseño) es propiedad de la marca 
                y no puede ser utilizado sin autorización previa.
            </p>

            <h2 class="product-card__name"> Modificaciones</h2>
            <p>
                Nos reservamos el derecho de modificar estos términos en cualquier momento. 
                Las modificaciones entrarán en vigencia desde su publicación en el sitio.
            </p>

        </div>

        <div class="text-center mt-4">
            <a href="{{ route('home')}}" class="btn-qs btn-terminos-primary">Volver al incio</a>
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
          Donde la pampa se vuelve píxel. Un horizonte de archivo para el nuevo siglo. El archivo nacional de la vanguardia global.
        </p>
        <!--sacarlos o cambiarlos-->
        
      </div>

      <!-- Explore -->
      <div class="col-12 col-sm-6">
        <h5 class="footer-col__heading">Explore</h5>
        <ul class="footer-col__links">
          <li><a href="{{ route('productos.index')}}">Shop All</a></li>
          <li><a href="{{ route('terminos')}}" >Terminos</a></li>
          <li><a href="{{ route('terminos')}}">Contacto</a></li>
          
        </ul>
      </div>

      <!-- Service -->
      <div class="col-12 col-sm-6">
        <h5 class="footer-col__heading">Preservando la herencia estética de la era digital desde el norte</h5>
        
      </div>
    </div>

    <!-- Bottom bar -->
    <div class="footer-bottom d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
      <span class="footer-copy">© 2026 CM2. All rights reserved.</span>
      
    </div>
  </div>
</footer>


<!-- Bootstrap JS -->
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>