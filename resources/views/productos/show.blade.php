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

    
    <style>
        /* ============================================
           VARIABLES Y CONFIGURACIÓN GENERAL
           ============================================ */
        :root {
            --primary-color: #b50058;
            --primary-light: #ff709e;
            --secondary-color: #006571;
            --tertiary-color: #496400;
            --tertiary-light: #befc00;
            --error-color: #b41340;
            --bg-color: #f9f6f5;
            --surface-color: #eae7e7;
            --surface-low: #f3f0ef;
            --surface-high: #e4e2e1;
            --text-primary: #2f2f2e;
            --text-secondary: #5c5b5b;
            --text-variant: #9e9c9c;
            --outline: #787676;
            --outline-variant: #afadac;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Manrope', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-primary);
            overflow-x: hidden;
        }

        /* Estilos para Material Icons */
        .material-symbols-outlined {
            font-family: 'Material Symbols Outlined';
            font-weight: normal;
            font-style: normal;
            font-size: 24px;
            display: inline-flex;
            line-height: 1;
            text-transform: none;
            letter-spacing: normal;
            word-wrap: normal;
            white-space: nowrap;
            direction: ltr;
            -webkit-font-smoothing: antialiased;
        }

        /* ============================================
           NAVBAR
           ============================================ */
        .navbar-custom {
            position: fixed;
            top: 0;
            width: 100%;
            max-width: 95%;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1000;
            margin-top: 1rem;
            padding: 1rem 1.5rem;
            background: rgba(249, 246, 245, 0.8);
            backdrop-filter: blur(1.25rem);
            border-radius: 2rem;
            box-shadow: 0 20px 40px rgba(181, 0, 88, 0.08);
        }

        .navbar-brand-text {
            font-family: 'Epilogue', sans-serif;
            font-size: 1.875rem;
            font-weight: 900;
            font-style: italic;
            color: var(--primary-color);
            text-transform: uppercase;
            letter-spacing: -0.05em;
        }

        .navbar-nav-link {
            font-family: 'Epilogue', sans-serif;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: -0.05em;
            font-size: 0.875rem;
            margin: 0 1rem;
            position: relative;
            color: var(--text-primary) !important;
            opacity: 0.7;
            transition: opacity 0.3s ease, transform 0.3s ease;
            text-decoration: none;
        }

        .navbar-nav-link:hover {
            opacity: 1;
            transform: scale(1.05);
        }

        .navbar-nav-link.active {
            color: var(--primary-color) !important;
            opacity: 1;
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 0.25rem;
        }

        .navbar-icons {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .navbar-icon-btn {
            background: none;
            border: none;
            cursor: pointer;
            color: var(--primary-color);
            font-size: 1.5rem;
            transition: transform 0.3s ease;
            display: flex;
            align-items: center;
        }

        .navbar-icon-btn:hover {
            transform: scale(1.1);
        }

        .menu-toggle {
            display: none;
            background: none;
            border: none;
            color: var(--text-primary);
            font-size: 1.5rem;
            cursor: pointer;
        }

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
            background: linear-gradient(to right, var(--primary-color), var(--primary-light));
            color: white;
            border: none;
            border-radius: 9999px;
            font-family: 'Epilogue', sans-serif;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            font-size: 1rem;
            cursor: pointer;
            box-shadow: 0 10px 30px rgba(181, 0, 88, 0.3);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            margin-bottom: 1rem;
        }

        .btn-add-to-bag:hover {
            transform: scale(1.02);
            box-shadow: 0 15px 40px rgba(181, 0, 88, 0.4);
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

            .navbar-nav {
                display: none !important;
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

            main {
                margin-top: 6rem;
            }

            .product-sidebar {
                margin-top: 3rem;
            }
        }

        @media (max-width: 991px) {
            .navbar-nav {
                display: none;
            }

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
    </style>
</head>
<body>
    <!-- =============================================
         NAVBAR
         ============================================ -->
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
          <a class="nav-link" href="{{ route('productos.index') }}">Shop</a>
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
                
                $mi_carrito = \App\Models\VentaCabecera::where('user_id', auth()->id())->where('estado', 'carrito')->first();
                $total_prendas = $mi_carrito ? $mi_carrito->detalles()->sum('cantidad') : 0;
                $items_flotantes = $mi_carrito ? $mi_carrito->detalles()->with('producto')->get() : collect([]);

                $precio_total = $mi_carrito ? $mi_carrito->detalles()->sum('subtotal') : 0;
                
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
                        <div class="d-flex justify-content-between align-items-center py-2 my-2 border-bottom">
                            <span class="fw-bold small text-uppercase" style="font-family: 'Space Grotesk', sans-serif; color: var(--text-primary);">Total:</span>
                            <span class="fw-bold" style="color: var(--primary); font-family: 'Space Grotesk', sans-serif;">
                                ${{ number_format($precio_total, 0, ',', '.') }}
                            </span>
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
                                    <span class="detail-text">100% Certified Original by The Archive Lab</span>
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
    <select name="talle" id="talle" class="size-select" style="width: 100%; padding: 0.8rem; border-radius: 8px; border: 1px solid var(--color-pink-primary); bg-color: black; color: white;" required>
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

    <!-- =============================================
         FOOTER
         ============================================ -->
    <footer>
        <div class="footer-content">
            <!-- Sección de marca -->
            <div class="footer-brand">
                <h2 class="footer-title">THE ARCHIVE</h2>
                <p class="footer-description">
                    The digital time capsule for the world's rarest fashion artifacts. Curated by the visionaries, for the obsessed.
                </p>
            </div>

            <!-- Enlaces -->
            <div class="footer-links">
                <div>
                    <h4 class="footer-section-title">Support</h4>
                    <a href="#" class="footer-section-link">Shipping</a>
                    <a href="#" class="footer-section-link">Returns</a>
                    <a href="#" class="footer-section-link">Authentication</a>
                </div>
                <div>
                    <h4 class="footer-section-title">Company</h4>
                    <a href="#" class="footer-section-link">Newsletter</a>
                    <a href="#" class="footer-section-link">Contact</a>
                    <a href="#" class="footer-section-link">Terms</a>
                </div>
                <div>
                    <h4 class="footer-section-title">Social</h4>
                    <a href="#" class="footer-section-link">Instagram</a>
                    <a href="#" class="footer-section-link">TikTok</a>
                    <a href="#" class="footer-section-link">Youtube</a>
                </div>
            </div>

            <!-- Copyright -->
            <div style="width: 100%; text-align: left; padding-top: 3rem; border-top: 1px solid var(--outline-variant);">
                <p class="footer-bottom">© 2024 THE DIGITAL ARCHIVE. ALL RIGHTS RESERVED.</p>
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