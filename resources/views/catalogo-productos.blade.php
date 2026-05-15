<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>NEOGAUCHO | Vintage catalogo</title>

  <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Epilogue:ital,wght@0,400;0,700;0,900;1,900&family=Manrope:wght@400;500;700&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet"/>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

  
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

<header class="hero">
  <div class="hero__bg">
    <img src="{{ asset('images/carrusel-bottega.jpg') }}"  alt="Hero editorial"/>
  </div>
</header>

<div class="row g-4" style="margin-top: 5rem;">
      <!-- Card 1 -->
      <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
        <div class="product-card">
          <div class="product-card__img-wrap">
            <img src="{{ asset('images/givenchy-bag1.jpg') }}" alt="Galliano Era Blazer"/>
          </div>
          <div class="product-card__body">
            <div class="product-card__header">
              <span class="product-card__name">Givenchy Antigona Tote</span>
              <span class="product-card__price">$1,240</span>
            </div>
            <p class="product-card__sub mb-0">Archival Runway 2002</p>
            <button class="product-card__btn">Add to Bag</button>
          </div>
        </div>
      </div>
      <!-- Card 2 -->
      <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
        <div class="product-card">
          <div class="product-card__img-wrap">
            <img src="{{ asset('images/marcjacobs-tshirt1.jpg') }}" alt="Cyber-Tech Stilettos"/>
          </div>
          <div class="product-card__body">
            <div class="product-card__header">
              <span class="product-card__name">Devon Lee Bad Girl</span>
              <span class="product-card__price">$890</span>
            </div>
            <p class="product-card__sub mb-0">Collection Heaven by Marc Jacobs </p>
            <button class="product-card__btn">Add to Bag</button>
          </div>
        </div>
      </div>
      <!-- Card 3 -->
      <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
        <div class="product-card">
          <div class="product-card__img-wrap">
            <img src="{{ asset('images/cityofgod-tshirt.jpg') }}" alt="Deconstructed Denim"/>
          </div>
          <div class="product-card__body">
            <div class="product-card__header">
              <span class="product-card__name">Ciudad de Dios</span>
              <span class="product-card__price">$550</span>
            </div>
            <p class="product-card__sub mb-0">si te quedas el bicho te come</p>
            <button class="product-card__btn">Add to Bag</button>
          </div>
        </div>
      </div>
      <!-- Card 4 -->
      <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
        <div class="product-card">
          <div class="product-card__img-wrap">
            <img src="{{ asset('images/chanel-bag1.jpg') }}" alt="Glossy Patent Mini"/>
          </div>
          <div class="product-card__body">
            <div class="product-card__header">
              <span class="product-card__name">Chanel Metiers d'Art</span>
              <span class="product-card__price">$2,100</span>
            </div>
            <p class="product-card__sub mb-0">Archival</p>
            <button class="product-card__btn">Add to Bag</button>
          </div>
        </div>
      </div>
      <!-- Card 5 -->
      <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
        <div class="product-card">
          <div class="product-card__img-wrap">
            <img src="{{ asset('images/diesel-furry.jpg') }}" alt="Glossy Patent Mini"/>
          </div>
          <div class="product-card__body">
            <div class="product-card__header">
              <span class="product-card__name">Diesel Fur Coat</span>
              <span class="product-card__price">$3,490</span>
            </div>
            <p class="product-card__sub mb-0">Luxurious faux fur in a rich beige hue</p>
            <button class="product-card__btn">Add to Bag</button>
          </div>
        </div>
      </div>
      <!-- Card 6 -->
      <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
        <div class="product-card">
          <div class="product-card__img-wrap">
            <img src="{{ asset('images/dior-sunglasses.jpg') }}" alt="Glossy Patent Mini"/>
          </div>
          <div class="product-card__body">
            <div class="product-card__header">
              <span class="product-card__name"> Christian Dior Your Dior 2 </span>
              <span class="product-card__price">$390</span>
            </div>
            <p class="product-card__sub mb-0">Ombre Logo Sunglasses</p>
            <button class="product-card__btn">Add to Bag</button>
          </div>
        </div>
      </div>
      <!-- Card 7 -->
      <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
        <div class="product-card">
          <div class="product-card__img-wrap">
            <img src="{{ asset('images/area-bra.jpg') }}" alt="Glossy Patent Mini"/>
          </div>
          <div class="product-card__body">
            <div class="product-card__header">
              <span class="product-card__name">Area miniBra</span>
              <span class="product-card__price">$1,250</span>
            </div>
            <p class="product-card__sub mb-0">Archival 2018</p>
            <button class="product-card__btn">Add to Bag</button>
          </div>
        </div>
      </div>
      <!-- Card 8 no se pq se ve de distinto tamaño y rompe la card-->
      <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
        <div class="product-card">
          <div class="product-card__img-wrap">
            <img src="{{ asset('images/puma-speedcat.jpg') }}" alt="Glossy Patent Mini"/>
          </div>
          <div class="product-card__body">
            <div class="product-card__header">
              <span class="product-card__name">DUPE Bekett leather</span>
              <span class="product-card__price">$1,590</span>
            </div>
            <p class="product-card__sub mb-0">Suede wedge sneakers</p>
            <button class="product-card__btn">Add to Bag</button>
          </div>
        </div>
      </div>
      <!-- Card 9 no se pq se ve de distinto tamaño y rompe la card MAS CHICA-->
      
      <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
        <div class="product-card">
          <div class="product-card__img-wrap">
            <img src="{{ asset('images/dior-corset1.jpg') }}" alt="Glossy Patent Mini"/>
          </div>
          <div class="product-card__body">
            <div class="product-card__header">
              <span class="product-card__name">ISABEL MARANT</span>
              <span class="product-card__price">$2,100</span>
            </div>
            <p class="product-card__sub mb-0">Suede wedge sneakers</p>
            <button class="product-card__btn">Add to Bag</button>
          </div>
        </div>
      </div>
      
      <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
        <div class="product-card">
          <div class="product-card__img-wrap">
            <img src="{{ asset('images/miss-sixty-belt.jpg') }}" alt="Glossy Patent Mini"/>
          </div>
          <div class="product-card__body">
            <div class="product-card__header">
              <span class="product-card__name">ISABEL MARANT</span>
              <span class="product-card__price">$2,100</span>
            </div>
            <p class="product-card__sub mb-0">Suede wedge sneakers</p>
            <button class="product-card__btn">Add to Bag</button>
          </div>
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
          <li><a href="{{ route('productos')}}">Shop All</a></li>
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
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>