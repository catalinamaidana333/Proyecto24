<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>NEOGAUCHO | Contacto </title>

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
    <img src="{{ asset('images/carrusel-pasarela1.jpg') }}" class="img-fluid" alt="Hero editorial"/>
  </div>
  <div class="hero__overlay"></div>
<!--maybe dejo solo el badge y quito todo el title O SEA hay q editar css(class hero__title y accent, hero__subtitle-->
  <div class="hero__content">
    <div class="hero__badge">CONTACT US</div>
  </div>
</header>


<!-- ═══ CURATED COLLECTIONS ══════════════════════════════ -->
<!-- SECCIÓN DE CONTACTO -->
    <section class="contact-section">
 
        <!-- LADO IZQUIERDO - FORMULARIO -->
        <div class="contact-form-wrapper">
            <div class="contact-form-container">
                <div class="contact-form-header">
                    <h2>Escribinos</h2>
                    <p>Client Services</p>
                    <div class="contact-form-header-divider"></div>
                </div>

                @if (session('success'))
    <div class="alert alert-dismissible fade show text-white mb-4 p-3 d-flex align-items-center shadow-sm" 
         style="background-color: var(--primary); border: none; border-radius: 8px;">
        <i class="fa-solid fa-circle-check me-2" style="font-size: 1.2rem;"></i>
        <div style="font-family: 'Space Grotesk', sans-serif; font-size: 0.9rem; letter-spacing: 0.3px;">
            {{ session('success') }}
        </div>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show mb-4 p-3 shadow-sm" 
         style="border-radius: 8px; background-color: #f8d7da; border: 1px solid #f5c2c7; color: #842029;">
        <div class="d-flex align-items-center mb-2 fw-bold small text-uppercase" style="letter-spacing: 0.5px; font-family: 'Space Grotesk', sans-serif;">
            <i class="fa-solid fa-circle-exclamation me-2" style="font-size: 1.2rem;"></i>
            No se pudo enviar la consulta:
        </div>
        <ul class="mb-0 small ps-3">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

                
 
                <form class="contact-form" method="POST" action="{{ route('contacto.enviar') }}">
                    
                    @csrf 
 
                    <!-- CAMPO EMAIL -->
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input 
                            type="email" 
                            class="form-input" 
                            id="email" 
                            name="email"
                            placeholder="tu@email.com"
                            required
                        >
                        <span class="form-error">Por favor ingresa un email válido</span>
                    </div>
 
                    <!-- CAMPO MENSAJE -->
                    <div class="form-group">
                        <label for="message" class="form-label">Mensaje</label>
                        <textarea 
                            class="form-textarea" 
                            id="message" 
                            name="mensaje"
                            placeholder="Cuéntanos tu consulta..."
                            required
                        ></textarea>
                        <span class="form-error">El mensaje es requerido</span>
                    </div>
 
                    <!-- BOTÓN ENVIAR -->
                    <div class="form-submit-wrapper">
                        <button type="submit" class="btn-submit">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
 
        <!-- LADO DERECHO - IMAGEN + FRASE -->
        <div class="contact-image-wrapper">
            <div class="contact-image-content">
                <div class="contact-image-placeholder">
                  <img src="{{ asset('images/card-port-contact.jpg') }}" >
                </div>
                
                <p class="contact-image-author">— NEOGAUCHO</p>
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
          <li><a class="nav-link" href="{{ route('productos.index') }}">Shop All</a></li>
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