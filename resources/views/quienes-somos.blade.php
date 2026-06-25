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
          <a class="nav-link" href="{{ route('productos.index')}}">Shop</a>
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
        @guest
        <li class="nav-item">
    <a class="nav-link" href="{{ route('login') }}">Login</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('register') }}">Registro</a>
  </li>
@endguest
@auth
       
        <!-- Mostrar nombre del usuario y logout -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ auth()->user()->nombre }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
              <li>
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                  @csrf
                  <button type="submit" class="dropdown-item">Logout</button>
                </form>
              </li>
              <li>
                <a class="dropdown-item" href="{{ route('backend.usuarios.historial-compras') }}">Mis compras</a>
              </li>
            </ul>
          </li>
        @endauth
        
        @auth
            @php
                // Consultamos directamente el carrito de base de datos del usuario logueado
                $mi_carrito = \App\Models\VentaCabecera::where('user_id', auth()->id())->where('estado', 'carrito')->first();
                $total_prendas = $mi_carrito ? $mi_carrito->detalles()->sum('cantidad') : 0;
                $items_flotantes = $mi_carrito ? $mi_carrito->detalles()->with('producto')->get() : collect([]);
            @endphp

            <li class="nav-item dropdown list-unstyled align-self-center ms-lg-3">
                <a class="nav-link dropdown-toggle position-relative d-flex align-items-center text-uppercase fw-bold p-0 shadow-none" 
                   href="#" id="cartDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: var(--text-primary); border: none;">
                   <span class="material-symbols-outlined me-1" style="font-size: 1.4rem; vertical-align: middle;">shopping_bag</span>
                    <span style="font-family: 'Space Grotesk', sans-serif; font-size: 0.9rem;">Bag</span>
                    
                    @if($total_prendas > 0)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill" 
                              style="font-size: 0.65rem; background-color: var(--primary); padding: 0.35em 0.5em;">
                            {{ $total_prendas }}
                        </span>
                    @endif
                </a>

                <div class="dropdown-menu dropdown-menu-end p-3 border-0 shadow" aria-labelledby="cartDropdown" style="width: 320px; border-radius: 12px; background-color: #ffffff;">
                    <h6 class="dropdown-header px-0 fw-bold border-bottom pb-2 mb-3" style="font-family: 'Space Grotesk', sans-serif; color: var(--text-primary);">
                        TU CARTERA
                    </h6>
                    
                    @if($items_flotantes->isEmpty())
                        <div class="text-center py-3 text-muted">
                            <p class="mb-0 small" style="font-family: 'Manrope', sans-serif;">Tu bolsa está vacía.</p>
                        </div>
                    @else
                        <div style="max-height: 200px; overflow-y: auto;">
                            @foreach($items_flotantes as $item)
                                <div class="d-flex align-items-center mb-2 pb-2 border-bottom">
                                    <div class="flex-grow-1">
                                        <h6 class="my-0 small fw-bold text-truncate" style="max-width: 150px;">{{ $item->producto->nombre }}</h6>
                                        <small class="text-muted">{{ $item->cantidad }} x ${{ number_format($item->precio_unitario, 0, ',', '.') }}</small>
                                    </div>
                                    <form action="{{ route('carrito.eliminar', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger p-0 shadow-none">
                                            <span class="material-symbols-outlined" style="font-size: 1rem;">delete</span>
                                        </button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                        <div class="pt-2">
                            <a href="{{ route('cliente.carrito') }}" class="btn text-white w-100 btn-sm text-uppercase fw-bold" style="background-color: var(--primary);">
                                Ver Cartera Completa
                            </a>
                        </div>
                    @endif
                </div>
            </li>
        @endauth
      </ul> 
    </div>
  </div>
</nav>
 
<!-- ═══ HERO ══════════════════════════════════════════════ -->
<header class="hero">
  <div class="hero__bg">
    <img src="{{ asset('images/hero-staff.jpg') }}" class="img-fluid" alt="Hero editorial"/>
  </div>
  <div class="hero__overlay"></div>
  <div class="hero__content">
    <div class="hero__badge">Vintage no es viejo, es eterno</div>
  </div>
</header>

<!-- CONTENIDO -->
<div class="container-qs mt-5">

    <div class="card-qs p-4 shadow">
        <h2 class="text-center mb-4 product-card__name">¿Quiénes somos?</h2>

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

        <h2 class="text-center mb-4 product-card__name">Nuestros objetivos</h2>

        <p>
            Nuestro principal objetivo es promover una moda más consciente y sostenible, extendiendo la vida útil de prendas de calidad y reduciendo el impacto ambiental del consumo masivo. Buscamos que cada cliente encuentre una prenda que lo represente, que lo haga sentir seguro y auténtico.
        </p>

        <p>
            Además, queremos posicionarnos como una referencia en moda vintage, ofreciendo una curaduría cuidada de prendas de marca, con estilo y personalidad. Nos proponemos seguir creciendo, ampliar nuestra comunidad y brindar una experiencia de compra cercana, confiable y personalizada.
        </p>

        <h2 class="text-center mb-4 product-card__name">Nuestro equipo(staff)</h2>

        <p>
            Detrás de este proyecto estamos nosotras, Catalina y Camila, encargadas de la selección de prendas, la estética de la marca y la atención al cliente. Nos ocupamos de cada detalle: desde la búsqueda de piezas únicas hasta la presentación final de cada producto.
        </p> 

        <p>
            A medida que el emprendimiento crece, también contamos con el apoyo de colaboradores que nos ayudan en áreas como fotografía, redes sociales y logística, permitiéndonos mejorar continuamente y ofrecer un servicio de mayor calidad.
        </p>

        <div class="text-center mt-4">
            <a href="{{ route('productos.index')}}" class="btn-qs btn-qs-primary">Ver productos</a>
            <a href="{{ route('contacto')}}" class="btn-qs btn-qs-secondary">Contactar</a>
        </div>
    </div>
</div>


<!-- CARRUSEL -->
<div id="carouselExample" class="carousel slide mt-5" data-bs-ride="carousel-qs">
    
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
          <li><a href="{{ route('terminos')}}">Contacto</a></li>
          
        </ul>
      </div>

      <!-- Service -->
      <div class="col-12 col-sm-6">
        <h5 class="footer-col__heading">Preservando la herencia estética de la era digital desde el norte</h5>
        
      </div>

      <!-- Service -->
<div class="col-12 col-sm-6">
  <h5 class="footer-col__heading">Contacto</h5>
  <ul class="footer-col__links">
    <li>
      <a href="https://instagram.com/neogaucho" target="_blank">
        <svg class="footer__icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
          <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
          <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
          <path d="M16.5 7.5l0 .01" />
        </svg>
        <span>@neogaucho</span>
      </a>
    </li>
    <li>
      <a href="tel:+543764123456">
        <svg class="footer__icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
        </svg>
        <span>+54 (376) 412-3456</span>
      </a>
    </li>
    <li>
      <a href="https://maps.google.com/?q=Resistencia,Chaco,Argentina" target="_blank">
        <svg class="footer__icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
          <circle cx="12" cy="10" r="3" />
        </svg>
        <span>Resistencia, Chaco</span>
      </a>
    </li>
  </ul>
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