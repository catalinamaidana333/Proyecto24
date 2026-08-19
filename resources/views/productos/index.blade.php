<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>NEOGAUCHO | Vintage catalogo</title>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css2?family=Epilogue:ital,wght@0,400;0,700;0,900;1,900&family=Manrope:wght@400;500;700&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

  <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  
  
</head>
<body>


<!-- ═══ NAVBAR ════════════════════════════════════════════ -->
@include('backend.usuarios.navbarCliente')

<header class="hero">
  <div class="hero__bg">
    <img src="{{ asset('images/7de01779e2064250cd49fc6436b1b543.jpg') }}"  alt="Hero editorial"/>
  </div>
</header>

<div class="container-xl px-3 px-md-4">
  <!-- TÍTULOS SUPERIORES ALINEADOS A LA DERECHA -->
  <div class="product-header-banner mt-5 mb-4">
    <h2 class="product-header-title">KEEP FASHION WEIRD</h2>
    <h3 class="product-header-subtitle">buy now</h3>
  </div>

  <div class="row g-4">
    @foreach($productos as $producto)
      <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
        <a href="{{ route('productos.show', $producto->id) }}" class="product-card-link">
<div class="product-card">
            <div class="product-card__img-wrap">
              <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}"/>
            </div>
            <div class="product-card__body">
              <div class="product-card__header">
                <span class="product-card__name">{{ $producto->nombre }}</span>
                <span class="product-card__price">${{ number_format($producto->precio, 0, ',', '.') }}</span>
              </div>
              <p class="product-card__sub mb-0 text-truncate">{{ $producto->descripcion }}</p>
              <button class="product-card__btn">Add to Bag</button>
            </div>
        </div>
      </a>
      </div>
    @endforeach
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
          <li><a href="{{ route('productos.index') }}">Shop All</a></li>
          <li><a href="{{ route('terminos')}}" >Terminos</a></li>
          <li><a href="{{ route('contacto')}}">Contacto</a></li>
          
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