<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>NEOGAUCHO | VintagePRODUCTS E-commerce</title>

  <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Epilogue:ital,wght@0,400;0,700;0,900;1,900&family=Manrope:wght@400;500;700&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet"/>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

  
</head>
<body>


<!-- ═══ NAVBAR ════════════════════════════════════════════ -->
<nav class="site-nav">
  <div class="site-nav__left">
    <span class="site-nav__logo">NEOGAUCHO</span>
    <ul class="site-nav__links d-none d-md-flex">
      <li><a href="#">Shop</a></li>
      <li><a href="{{ route('productos')  }}" class="active">Drops</a></li>
      <li><a href="#">Editorial</a></li>
      <li><a href="#">Curated</a></li>
    </ul>
  </div>
  
</nav>

<header class="hero">
  <div class="hero__bg">
    <img src="{{ asset('images/carrusel-bottega.jpg') }}" class="img-fluid" alt="Hero editorial"/>
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
            <img src="{{ asset('images/isabelmarant-shoes.jpg') }}" alt="Glossy Patent Mini"/>
          </div>
          <div class="product-card__body">
            <div class="product-card__header">
              <span class="product-card__name">ISABEL MARANT Bekett leather</span>
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
          A destination for collectors and enthusiasts of archival luxury. Preserving the aesthetic history of the digital age.
        </p>
        <div class="d-flex gap-3">
          <a href="#" class="social-btn"><span class="material-symbols-outlined" style="font-size:1.2rem;">share</span></a>
          <a href="#" class="social-btn"><span class="material-symbols-outlined" style="font-size:1.2rem;">camera</span></a>
          <a href="#" class="social-btn"><span class="material-symbols-outlined" style="font-size:1.2rem;">mail</span></a>
        </div>
      </div>

      <!-- Explore -->
      <div class="col-6 col-md-2 offset-md-1">
        <h5 class="footer-col__heading">Explore</h5>
        <ul class="footer-col__links">
          <li><a href="#">Shop All</a></li>
          <li><a href="#">Drops</a></li>
          <li><a href="#">Editorial</a></li>
          <li><a href="#">Curated</a></li>
        </ul>
      </div>

      <!-- Service -->
      <div class="col-6 col-md-2">
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
 <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>