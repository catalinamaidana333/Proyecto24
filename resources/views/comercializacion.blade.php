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
