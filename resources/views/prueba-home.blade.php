<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>NEOGAUCHO | Luxury Vintage E-commerce</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css2?family=Epilogue:ital,wght@0,400;0,700;0,900;1,900&family=Manrope:wght@400;500;700&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

  <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  
</head>
<body>

@include('backend.usuarios.navbarCliente')




<!-- ═══ HERO ══════════════════════════════════════════════ -->
<header class="hero">
  <div class="hero__bg">
    <img src="{{ asset('images/card-port-contact.jpg') }}"  class="img-fluid" alt="Hero editorial"/>
  </div>
  
<!--maybe dejo solo el badge y quito todo el title O SEA hay q editar css(class hero__title y accent, hero__subtitle-->
  <div class="hero__content">
    <div class="hero__badge">New Drop Live Now</div>
  </div>
</header>


<!-- ═══ NEW DROPS ═════════════════════════════════════════ -->
<section class="py-section" style="background: var(--surface);">
  <div class="container-xl px-4 px-md-5">
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-end gap-3 mb-4">
      <div>
        <h2 class="section-title mb-0">New <span class="accent">Drops</span></h2>
        <p class="section-label mb-0">Updated every thursday</p>
      </div>
      <a href="{{ route('productos.index') }}" class="btn-view-more">
        View More
      </a>
    </div>

    <div class="row g-4">
      
      @foreach($ultimosDrops as $producto)
      <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
        <div class="product-card">
          
          <div class="product-card__img-wrap">
            @if($producto->imagen)
              <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}"/>
            @else
              <img src="{{ asset('images/placeholder.jpg') }}" alt="No image available"/>
            @endif
          </div>
          
          <div class="product-card__body">
            <div class="product-card__header">
              <span class="product-card__name">{{ $producto->nombre }}</span>
              <span class="product-card__price">${{ number_format($producto->precio, 0, ',', '.') }}</span>
            </div>
            
            <p class="product-card__sub mb-0">
              {{ $producto->diseñador ?? 'Archival' }} {{ $producto->año ? ' - ' . $producto->año : '' }}
            </p>
            
            <a href="{{ route('productos.show', $producto->id) }}" class="btn product-card__btn d-block text-center text-decoration-none mt-3">
              View Piece
            </a>
          </div>

        </div>
      </div>
      @endforeach

    </div>
  </div>
</section>


<!-- ═══ CURATED COLLECTIONS class="container-xl px-4 px-md-5"══════════════════════════════ -->
<section class="py-section bento-section">
  <div class="container-xl">
    <h2 class="section-title text-center mb-5">Curated <span class="accent">Collections</span></h2>
    <div class="bento-grid">

      <!-- Large-->
      <a href="{{ route('productos.index') }}" class="bento-card bento-large text-decoration-none" style="min-height: 400px; display: block;">
        <img src="{{ asset('images/card-port-enter.jpg') }}" alt="Y2K Tech"/>
        <div class="bento-card__overlay"></div>
        <div class="bento-card__content">
          <span class="bento-card__eyebrow">Exclusivo</span>
          <h3 class="bento-card__title">Edición<br/>de Culto</h3>
          <p class="bento-card__body">Piel de cristal, nervios de neón y una fuerza bruta que no conoce el cautiverio. El jaguareté de archivo: donde la estética de vanguardia se encuentra con el poder puro.</p>
          
          <span class="btn-teal-pill">
            <span class="btn-text">Seguir el rastro</span>
            <span class="btn-icon">→</span>
          </span>
        </div>
      </a>

      <!-- Medium: Carrie Bradshaw-->
      <div class="bento-card bento-medium bento-card--static" style="background: var(--primary-dim); min-height: 280px;">
    
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
        <a href="{{ route('productos.index') }}"  class="bento-plain__link">
          View <span class="material-symbols-outlined" style="font-size:1.1rem;">arrow_forward</span>
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
          {{-- Panel Admin dinámico en el footer --}}
    @auth
      @if(auth()->user()->rol_id === 1)
        <li>
          <a href="{{ route('admin') }}">
            Panel Admin
          </a>
        </li>
      @endif
    @endauth
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
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>