<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THE ARCHIVE | Rare Vintage Dior 2003</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Epilogue:ital,wght@0,100..900;1,100..900&family=Manrope:wght@200..800&family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    
    <!-- Material Symbols Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
   <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>


        /* ============================================
           MAIN CONTENT
           ============================================ */
        main {
            margin-top: 8rem;
            padding: 2rem 1.5rem 5rem;
        }

        @media (min-width: 768px) {
            main {
                padding: 2rem 3rem 5rem;
            }
        }

        .container-custom {
            max-width: 1400px;
            margin: 0 auto;
        }

        /* ============================================
           IMAGEN PRINCIPAL Y GALERÍA
           ============================================ */
        .hero-image {
            position: relative;
            width: 100%;
            aspect-ratio: 4/5;
            border-radius: 1rem;
            overflow: hidden;
            background-color: var(--surface-low);
            margin-bottom: 2rem;
        }

        .hero-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .badge-rare {
            position: absolute;
            top: 1.5rem;
            left: 1.5rem;
            padding: 0.5rem 1rem;
            background-color: var(--tertiary-color);
            color: #deff95;
            border-radius: 9999px;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            font-weight: 600;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .gallery-item {
            aspect-ratio: 1;
            border-radius: 0.875rem;
            overflow: hidden;
            background-color: var(--surface-low);
            transition: transform 0.3s ease;
            cursor: pointer;
        }

        .gallery-item:hover {
            transform: scale(1.02);
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* ============================================
           SECCIÓN DE HISTORIA
           ============================================ */
        .story-section {
            padding: 3rem;
            background-color: var(--surface-low);
            border-radius: 1rem;
            margin-bottom: 2rem;
        }

        @media (max-width: 767px) {
            .story-section {
                padding: 2rem;
            }
        }

        .story-title {
            font-family: 'Epilogue', sans-serif;
            font-size: 1.875rem;
            font-weight: 900;
            font-style: italic;
            letter-spacing: -0.05em;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            text-transform: uppercase;
        }

        .story-text {
            font-family: 'Manrope', sans-serif;
            font-size: 1rem;
            line-height: 1.6;
            color: var(--text-primary);
            opacity: 0.8;
            margin-bottom: 1.5rem;
        }

        .story-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-top: 2.5rem;
        }

        .story-tag {
            padding: 0.5rem 1rem;
            background-color: var(--surface-high);
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-radius: 9999px;
            color: var(--text-primary);
        }

        /* ============================================
           SIDEBAR DE PRODUCTO
           ============================================ */
        .product-sidebar {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        @media (min-width: 992px) {
            .product-sidebar {
                position: sticky;
                top: 8rem;
                height: fit-content;
            }
        }

        .product-label {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            color: var(--secondary-color);
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .product-title {
            font-family: 'Epilogue', sans-serif;
            font-size: 3rem;
            font-weight: 900;
            letter-spacing: -0.05em;
            text-transform: uppercase;
            line-height: 1;
            margin-bottom: 1rem;
            color: var(--text-primary);
        }

        @media (max-width: 767px) {
            .product-title {
                font-size: 2rem;
            }
        }

        .product-price {
            display: flex;
            align-items: baseline;
            gap: 1rem;
            margin-bottom: 2.5rem;
        }

        .current-price {
            font-family: 'Epilogue', sans-serif;
            font-size: 1.875rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        .original-price {
            font-family: 'Manrope', sans-serif;
            font-size: 1rem;
            text-decoration: line-through;
            color: var(--text-secondary);
            opacity: 0.5;
        }

        .product-details {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .detail-item {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .detail-label {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.75rem;
            text-transform: uppercase;
            opacity: 0.6;
            letter-spacing: 0.05em;
        }

        .detail-box {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1rem;
            background-color: var(--surface-color);
            border-radius: 0.5rem;
        }

        .detail-box .material-symbols-outlined {
            color: var(--secondary-color);
            font-weight: 600;
        }

        .detail-text {
            font-family: 'Manrope', sans-serif;
            font-size: 0.875rem;
            font-weight: 600;
        }

        .detail-description {
            font-family: 'Manrope', sans-serif;
            font-size: 0.875rem;
            color: var(--text-secondary);
        }

        /* ============================================
           SELECTOR DE CANTIDAD
           ============================================ */
        .quantity-section {
            margin-bottom: 3rem;
        }

        .quantity-label {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.75rem;
            text-transform: uppercase;
            opacity: 0.6;
            letter-spacing: 0.05em;
            display: block;
            margin-bottom: 1rem;
        }

        .quantity-selector {
            display: flex;
            align-items: center;
            gap: 1rem;
            background-color: var(--surface-color);
            border-radius: 0.5rem;
            padding: 0.75rem;
            width: fit-content;
        }

        .quantity-input {
            width: 60px;
            padding: 0.5rem;
            border: none;
            background: transparent;
            font-family: 'Manrope', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            text-align: center;
            color: var(--text-primary);
        }

        .quantity-input::-webkit-outer-spin-button,
        .quantity-input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .quantity-input[type=number] {
            -moz-appearance: textfield;
        }

        .quantity-input:focus {
            outline: none;
        }

        .quantity-btn {
            width: 40px;
            height: 40px;
            border: none;
            background-color: var(--surface-high);
            border-radius: 0.5rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Manrope', sans-serif;
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--text-primary);
            transition: all 0.2s ease;
        }

        .quantity-btn:hover {
            background-color: var(--primary-color);
            color: white;
            transform: scale(1.1);
        }

        .quantity-btn:active {
            transform: scale(0.95);
        }

        /* ============================================
           BOTONES
           ============================================ */
        .btn-add-to-bag {
            width: 100%;
            padding: 1.5rem 1rem;
            background: linear-gradient(to right, #111111, #2f2f2e);
            color: white;
            border: none;
            border-radius: 9999px;
            font-family: 'Epilogue', sans-serif;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            font-size: 1rem;
            cursor: pointer;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            margin-bottom: 1rem;
        }

        .btn-add-to-bag:hover {
            transform: scale(1.02);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.35);
        }

        .btn-add-to-bag:active {
            transform: scale(0.95);
        }

        .btn-waitlist {
            width: 100%;
            padding: 1.5rem 1rem;
            background-color: var(--surface-high);
            color: var(--text-primary);
            border: none;
            border-radius: 9999px;
            font-family: 'Epilogue', sans-serif;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-waitlist:hover {
            background-color: var(--secondary-color);
            color: white;
            transform: scale(1.02);
        }

        /* ============================================
           INFORMACIÓN DEL PRODUCTO
           ============================================ */
        .product-info {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid var(--outline-variant);
        }

        .info-item {
            display: flex;
            flex-direction: column;
        }

        .info-label {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.625rem;
            text-transform: uppercase;
            opacity: 0.5;
            margin-bottom: 0.25rem;
            letter-spacing: 0.05em;
        }

        .info-value {
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 700;
            font-size: 0.875rem;
            color: var(--text-primary);
        }

        /* ============================================
           SECCIÓN "COMPLETE THE LOOK"
           ============================================ */
        .complete-look-section {
            margin-top: 8rem;
        }

        .section-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            margin-bottom: 3rem;
        }

        .section-title {
            font-family: 'Epilogue', sans-serif;
            font-size: 2.25rem;
            font-weight: 900;
            font-style: italic;
            letter-spacing: -0.05em;
            text-transform: uppercase;
            color: var(--text-primary);
        }

        .view-all-link {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            color: var(--primary-color);
            text-decoration: underline;
            text-decoration-thickness: 2px;
            text-underline-offset: 0.5rem;
            letter-spacing: 0.05em;
            transition: opacity 0.3s ease;
        }

        .view-all-link:hover {
            opacity: 0.7;
        }

        .curation-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        @media (min-width: 768px) {
            .curation-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        .curation-item {
            display: flex;
            flex-direction: column;
        }

        .curation-image-wrapper {
            aspect-ratio: 3/4;
            border-radius: 1rem;
            overflow: hidden;
            margin-bottom: 1.5rem;
            background-color: var(--surface-low);
            transition: transform 0.5s ease, background-color 0.5s ease;
            cursor: pointer;
        }

        .curation-item:hover .curation-image-wrapper {
            transform: scale(1.02);
            background-color: var(--secondary-color);
        }

        .curation-image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: mix-blend-mode 0.5s ease;
            mix-blend-mode: multiply;
        }

        .curation-item:hover .curation-image-wrapper img {
            mix-blend-mode: normal;
        }

        .curation-label {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.625rem;
            text-transform: uppercase;
            color: var(--secondary-color);
            font-weight: 700;
            margin-bottom: 0.25rem;
            letter-spacing: 0.05em;
        }

        .curation-title {
            font-family: 'Epilogue', sans-serif;
            font-size: 1.25rem;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: -0.05em;
            margin-bottom: 0.5rem;
            color: var(--text-primary);
        }

        .curation-price {
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 700;
            color: var(--primary-color);
            font-size: 1rem;
        }

        /* ============================================
           FOOTER
           ============================================ */
        footer {
            background-color: var(--surface-low);
            padding: 5rem 2rem;
            margin-top: 5rem;
        }

        .footer-content {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr;
            gap: 3rem;
        }

        @media (min-width: 768px) {
            .footer-content {
                grid-template-columns: 1fr 2fr auto;
            }
        }

        .footer-brand {
            max-width: 30rem;
        }

        .footer-title {
            font-family: 'Epilogue', sans-serif;
            font-size: 2.25rem;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: -0.05em;
            font-style: italic;
            color: var(--text-primary);
            margin-bottom: 1.5rem;
        }

        .footer-description {
            font-family: 'Manrope', sans-serif;
            font-size: 0.875rem;
            color: var(--text-primary);
            opacity: 0.6;
            line-height: 1.6;
        }

        .footer-links {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 4rem;
        }

        @media (min-width: 768px) {
            .footer-links {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        .footer-section-title {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--primary-color);
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: 1rem;
        }

        .footer-section-link {
            display: block;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--text-primary);
            opacity: 0.6;
            text-decoration: none;
            transition: color 0.3s ease;
            margin-bottom: 1rem;
        }

        .footer-section-link:hover {
            color: var(--primary-color);
        }

        .footer-bottom {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.625rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--text-primary);
            opacity: 0.6;
        }

        /* ============================================
           RESPONSIVE - MOBILE
           ============================================ */
        @media (max-width: 767px) {
            .navbar-custom {
                padding: 0.75rem 1rem;
                margin-top: 0.5rem;
            }

            

            .menu-toggle {
                display: block;
            }

            .product-title {
                font-size: 1.875rem;
            }

            .section-title {
                font-size: 1.5rem;
            }

            .view-all-link {
                display: none;
            }
            /* Detalle estético para que se lea bien desplegado en móvil */
            .navbar-collapse {
                background: rgba(249, 246, 245, 0.98);
                padding: 1rem;
                border-radius: 1rem;
                margin-top: 0.5rem;
            }

            main {
                margin-top: 6rem;
            }

            .product-sidebar {
                margin-top: 3rem;
            }
        }

        @media (max-width: 991px) {
            
            .menu-toggle {
                display: block;
            }
        }

        /* ============================================
           ANIMACIONES
           ============================================ */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        main > * {
            animation: fadeIn 0.6s ease;
        }

        .admin-footer {
        background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
        color: rgba(255, 255, 255, 0.7);
        padding: 2rem 0;
        margin-top: 5rem;
        border-top: 3px solid var(--primary, #b50058);
        font-size: 0.85rem;
    }
    .admin-footer a {
        color: white;
        text-decoration: none;
        transition: color 0.2s ease;
    }
    .admin-footer a:hover {
        color: var(--primary-light, #ff3399);
    }
    .admin-footer__brand {
        font-weight: 900;
        letter-spacing: -0.5px;
        text-transform: uppercase;
        color: white !important;
    }
    .admin-footer__tech-badge {
        background: rgba(255, 255, 255, 0.1);
        padding: 0.25rem 0.6rem;
        border-radius: 4px;
        font-size: 0.75rem;
    }
    </style>
</head>
<body>
    <!-- =============================================
         NAVBAR
         ============================================ -->
   
@include('backend.usuarios.navbarCliente')


    
    <main>
        <div class="container-custom">
            <div class="row">
                <!-- GALERÍA E HISTORIA -->
                <div class="col-lg-7">
                    <!-- Imagen Hero -->
                    <div class="hero-image">
                        <img src="{{ asset('storage/' . $producto->imagen) }}" 
            alt="{{ $producto->nombre }}"
            class="product-detail__image">
                        <span class="badge-rare">Extremely Rare</span>
                    </div>

                    

                    
                    <div class="story-section">
                        <h2 class="story-title">LA HISTORIA</h2>
                        <p class="story-text">
                            {{ $producto->descripcion }}
                        </p>
                        <p class="story-text">
                            {{ $producto->descripcion_drop }}
                        </p>
                        <div class="story-tags">
                            <div class="story-tag">Collection: SS  {{ $producto->año }}</div>
                        
                            <div class="story-tag">Provenance: Paris, France</div>
                        </div>
                    </div>
                </div>

                <!-- SIDEBAR DE PRODUCTO -->
                <div class="col-lg-5">
                    <div class="product-sidebar">
                        <!-- Etiqueta de marca -->
                        <div>
                            <div class="product-label">{{ $producto->diseñador }}</div>
                        </div>

                        <!-- Título del producto -->
                        <h1 class="product-title">{{ $producto->nombre }}</h1>

                        <!-- Precio -->
                        <div class="product-price">
                            <span class="current-price">{{ number_format($producto->precio, 2, ',', '.') }}</span>
                            
                        </div>

                        <!-- Detalles -->
                        <div class="product-details">
                            <div class="detail-item">
                                <span class="detail-label">Authentication</span>
                                <div class="detail-box">
                                    <span class="material-symbols-outlined">verified</span>
                                    <span class="detail-text">100% Certified Original by Neogaucho Lab</span>
                                </div>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Shipping</span>
                                <p class="detail-description">Global white-glove shipping. Insured delivery within 5-7 business days.</p>
                            </div>
                        </div>

                        <!-- SELECTOR DE CANTIDAD -->
                        <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST">
                            @csrf 
    

    <input type="hidden" name="producto_id" value="{{ $producto->id }}">

    <div class="quantity-section">
        <label for="quantity" class="quantity-label">Cantidad</label>
        <div class="quantity-selector">
            <button type="button" class="quantity-btn" onclick="decreaseQuantity()">−</button>
            <input 
                type="number" 
                id="quantity" 
                name="cantidad" 
                class="quantity-input" 
                value="1" 
                min="1" 
                max="{{ $producto->stock }}" step="1"
                required
            >
            <button type="button" class="quantity-btn" onclick="increaseQuantity()">+</button>
        </div>
        <div class="size-section" style="margin-bottom: 1.5rem;">
    <label for="talle" class="size-label" style="display:block; margin-bottom:0.5rem; font-weight:bold;">Seleccionar Talle / Medida</label>
    <select name="talle" id="talle" class="size-select" style="width: 100%; padding: 0.8rem; border-radius: 8px; border: 1px solid var(--color-pink-primary); background-color: #f19fd2ff ; color: #252424ff;" required>
        <option value="" disabled selected>Elegí tu opción</option>
        
        @if($producto->talles && $producto->talles->count() > 0)
            @foreach($producto->talles as $itemTalle)
                @if($itemTalle->stock > 0)
                    <option value="{{ $itemTalle->talle }}">
                        {{ strtoupper($itemTalle->talle) }} 
                        @if($itemTalle->talle === 'único' || $itemTalle->talle === 'unico')
                            (Pieza Única de Colección)
                        @else
                            (Stock: {{ $itemTalle->stock }} u.)
                        @endif
                    </option>
                @endif
            @endforeach
        @else
            <option value="único">ÚNICO (Disponible)</option>
        @endif
    </select>
</div>
    </div>

    <button type="submit" class="btn-add-to-bag">Add to Bag</button>
</form>

                        
                        <!-- Información adicional -->
                        <div class="product-info">
                            <div class="info-item">
                                <span class="info-label">Año</span>
                                <span class="info-value">{{ $producto->año }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Material</span>
                                <span class="info-value">{{ $producto->material }}</span>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            
    </main>
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

    <!-- =============================================
         SCRIPT - SELECTOR DE CANTIDAD
         ============================================ -->
    <script>
        function increaseQuantity() {
            const input = document.getElementById('quantity');
            const currentValue = parseInt(input.value) || 1;
            const maxValue = parseInt(input.getAttribute('max')) || 10;
            
            if (currentValue < maxValue) {
                input.value = currentValue + 1;
            }
        }

        function decreaseQuantity() {
            const input = document.getElementById('quantity');
            const currentValue = parseInt(input.value) || 1;
            const minValue = parseInt(input.getAttribute('min')) || 1;
            
            if (currentValue > minValue) {
                input.value = currentValue - 1;
            }
        }

        // Validación del input para evitar valores inválidos
        document.getElementById('quantity').addEventListener('input', function() {
            const min = parseInt(this.getAttribute('min')) || 1;
            const max = parseInt(this.getAttribute('max')) || 10;
            let value = parseInt(this.value) || min;

            if (value < min) this.value = min;
            if (value > max) this.value = max;
        });
    </script>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>