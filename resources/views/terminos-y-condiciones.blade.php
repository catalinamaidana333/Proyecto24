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
        

        @auth
            @php
                // Consultamos directamente el carrito de base de datos del usuario logueado
                $mi_carrito = \App\Models\VentaCabecera::where('user_id', auth()->id())->where('estado', 'carrito')->first();
                $total_prendas = $mi_carrito ? $mi_carrito->detalles()->sum('cantidad') : 0;
                $items_flotantes = $mi_carrito ? $mi_carrito->detalles()->with('producto')->get() : [];
            @php

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