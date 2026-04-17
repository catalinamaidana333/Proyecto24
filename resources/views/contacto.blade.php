<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>NEOGAUCHO | VintagePRODUCTS contacto</title>

  <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Epilogue:ital,wght@0,400;0,700;0,900;1,900&family=Manrope:wght@400;500;700&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet"/>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

  
</head>


<body>

<nav class="site-nav navbar navbar-expand-md navbar-light" data-bs-theme="light">
  <div class="container-fluid p-0 d-flex justify-content-between align-items-center">
    
    <a href="{{ route('home') }}" class="site-nav__logo navbar-brand m-0">NEOGAUCHO</a>
    
    <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#menuNeo" aria-controls="menuNeo" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon" style="background-image: url(\"data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%280, 0, 0, 0.85%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e\");"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="menuNeo">
      <ul class="site-nav__links navbar-nav ms-auto mt-3 mt-md-0">
        <li class="nav-item"><a href="{{ route('home') }}" class="nav-link p-0">Shop</a></li>
        <li class="nav-item"><a href="{{ route('productos') }}" class="nav-link p-0">Drops</a></li>
        <li class="nav-item"><a href="#" class="nav-link p-0">Comercializacion</a></li>
        <li class="nav-item"><a href="{{ route('contacto') }}" class="active nav-link p-0">Contacto</a></li>
        <li class="nav-item"><a href="#" class="nav-link p-0">Terminos</a></li>
        <li class="nav-item"><a href="#" class="nav-link p-0">Consulta</a></li>
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
    <div class="hero__badge">CONTACT US</div>
  </div>
</header>


<!-- ═══ CURATED COLLECTIONS ══════════════════════════════ -->
<section class="py-section bento-section">
  <div class="container-xl ">
    <h2 class="section-title text-center mb-5">CONECTÁ <span class="accent">CON LA HISTORIA</span></h2>
    <div class="bento-grid">

      <!-- Large: IMG-->
      <div class="bento-card bento-large" style="min-height: 400px; position= absolute">
        <img src="{{ asset('images/card-port-contact.jpg') }}" alt="Y2K Tech"/>
        <div class="bento-card__overlay"></div>
        <div class="bento-card__content">
          
          <h3 class="bento-card__title">ESCRIBINOS<br/>CLIENT SERVICES</h3>
          <p class="bento-card__body">Dedicadas a ofrecerte el mejor servicio en tu coleccion de piezas unicas, si tenes duda sobre algun producto o tenes piezas para vender dejanos tu mail y nombre del articulo.</p>
          <p class="bento-card__body">Dedicadas a ofrecerte el mejor servicio en tu coleccion de piezas unicas, si tenes duda sobre algun producto o tenes piezas para vender dejanos tu mail y nombre del articulo.</p>

        </div>
      </div>

      <!-- Medium: FORM-->
      <div class="bento-card bento-medium" style="background: var(--primary-dim); min-height: 280px;">
    
        <div class="bento-card__overlay-pink"></div>
        <div class="bento-center">
          <div class="mb-3">
           <label for="exampleFormControlInput1" class="form-label">Email address</label>
           <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
          </div>
          <div class="mb-3">
           <label for="exampleFormControlTextarea1" class="form-label">Message</label>
           <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          <div class="col-12">
           <button type="submit" class="btn btn-primary">SEND</button>
          </div>
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






<form class="row g-3" action="{{ url('/contacto') }}" method="POST">
  @csrf

  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" id="inputEmail4" name="email">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Password</label>
    <input type="password" class="form-control" id="inputPassword4" name="password">
  </div>
  <div class="col-12">
    <label for="inputNombre" class="form-label">Nombre</label>
    <input type="nombre" class="form-control" id="inputNombre" name="nombre" >
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Address 2</label>
    <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Apartment, studio, or floor">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">City</label>
    <input type="text" class="form-control" id="inputCity" name="city">
  </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label">State</label>
    <select id="inputState" class="form-select" name="state">
      <option selected>Choose...</option>
      <option>...</option>
    </select>
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label">Zip</label>
    <input type="text" class="form-control" id="inputZip" name="zip">
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck" name="check">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Sign in</button>
  </div>
</form>

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


    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>