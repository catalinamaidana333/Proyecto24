<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>THE ARCHIVE | Luxury Vintage E-commerce</title>

  <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Epilogue:ital,wght@0,400;0,700;0,900;1,900&family=Manrope:wght@400;500;700&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet"/>
  <!-- Footer Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

  
</head>
<body>


<!-- ═══ NAVBAR ════════════════════════════════════════════ -->

<nav class="navbar navbar-expand-lg site-nav">
    <div class="container-fluid">
        <a class="brand-name" href="/">TU MARCA</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal" aria-controls="menuPrincipal" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menuPrincipal">
            <ul class="site-nav__links ms-auto">
                <li><a href="#" class="active">Inicio</a></li>
                <li><a href="#">Drops</a></li>
                <li><a href="#">Comercializacion</a></li>
                <li><a href="#">Productos</a></li>
                <li><a href="#">Contacto</a></li>
                <li><a href="#">Consulta</a></li>
            </ul>
        </div>
    </div>
</nav>


<!-- ═══ HERO ══════════════════════════════════════════════ -->
<header class="hero">
  <div class="hero__bg">
    <img src="{{ asset('images/hero-portada.jpg') }}" class="img-fluid" alt="Hero editorial"/>
  </div>
  <div class="hero__overlay"></div>
<!--maybe dejo solo el badge y quito todo el title O SEA hay q editar css(class hero__title y accent, hero__subtitle-->
  <div class="hero__content">
    <div class="hero__badge">New Drop Live Now</div>
  </div>
</header>


<!-- ═══ NEW DROPS ═════════════════════════════════════════ -->
<section class="py-section" style="background: var(--surface);">
  <div class="container-xl px-4 px-md-5">
    <div class="d-flex justify-content-between align-items-end mb-5">
      <div>
        <h2 class="section-title mb-0">New <span class="accent">Drops</span></h2>
        <p class="section-label mb-0">Updated every thursday</p>
      </div>
      <!--quite btn-link-primary-->
      
    </div>

    <div class="row g-4">
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
    </div>
    <!-- View More Button -->
  <div class="d-flex justify-content-center mt-5">
  <a href="{{ route('productos') }}" class="btn-view-more">
    View More
  </a>
</div>
  </div>
</section>




<!-- ═══ CURATED COLLECTIONS class="container-xl px-4 px-md-5"══════════════════════════════ -->
<section class="py-section bento-section">
  <div class="container-xl">
    <h2 class="section-title text-center mb-5">Curated <span class="accent">Collections</span></h2>
    <div class="bento-grid">

      <!-- Large-->
      <div class="bento-card bento-large" style="min-height: 400px;">
        <img src="{{ asset('images/card-port-enter.jpg') }}" alt="Y2K Tech"/>
        <div class="bento-card__overlay"></div>
        <div class="bento-card__content">
          <span class="bento-card__eyebrow">Exclusive Drop</span>
          <h3 class="bento-card__title">Vintage<br/>Select</h3>
          <p class="bento-card__body">Discover the gadgets and gear that defined a millennium. Transparent casing, neon lights, and raw power.</p>
          <button class="btn-teal-pill">Explore Category</button>
        </div>
      </div>

      <!-- Medium: Carrie Bradshaw-->
      <div class="bento-card bento-medium" style="background: var(--primary-dim); min-height: 280px;">
    
        <div class="bento-card__overlay-pink"></div>
        <div class="bento-center">
          <h3 class="bento-center__title">I like to see my money right where I can see it... hanging in my closet</h3>
          <p class="bento-center__sub">Me too Carrie</p>
        </div>
      </div>

      <!-- Medium: Archives of Galliano -->
      <div class="bento-card bento-medium bento-plain">
        <div>
          <h3 class="bento-plain__title">Archives<br/>of<br/>Galliano</h3>
          <div class="bento-plain__divider"></div>
        </div>
        <a href="#" class="bento-plain__link">
          View Story <span class="material-symbols-outlined" style="font-size:1.1rem;">arrow_forward</span>
        </a>
      </div>

    </div>
  </div>
</section>




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