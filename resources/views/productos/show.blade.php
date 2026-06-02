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
    <nav class="navbar-custom">
        <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
            <div class="navbar-brand-text">THE ARCHIVE</div>
            
            <div class="navbar-nav" style="display: flex; gap: 0; align-items: center;">
                <a href="#" class="navbar-nav-link active">Shop</a>
                <a href="#" class="navbar-nav-link">Drops</a>
                <a href="#" class="navbar-nav-link">Editorial</a>
                <a href="#" class="navbar-nav-link">Curated</a>
            </div>

            <div class="navbar-icons">
                <button class="navbar-icon-btn">
                    <span class="material-symbols-outlined">shopping_bag</span>
                </button>
                <button class="menu-toggle">
                    <span class="material-symbols-outlined">menu</span>
                </button>
            </div>
        </div>
    </nav>

    <!-- =============================================
         MAIN CONTENT
         ============================================ -->
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

                    <!-- Galería de detalles QUITAR-->
                    <div class="gallery-grid">
                        <div class="gallery-item">
                            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCQHXFatXHfk0QJXxrKzPZSiVTPCrLO3qI3TLBmh1O9M0Oy6kQCmXNhN_jmCuQtkyK06P5bPHZRdUvjorIByl8-CguAxEEQYiSf4n3jh5NHY9Ry6M5Ww5eSrgNMSy72MYoc8sy71rS40_ncfrwZK47-Jj9xIVeQsseVDkN5hisV0Pce6a4tfJBhn-fikDowg_sEd2xKE1PGAqmxjEud_JyKFOMeLtAtUcKSwnNSg7YWEfmPFUj-z3Imz8CXkiz6OuNwAj2whDh5bmw" alt="Detail view">
                        </div>
                        <div class="gallery-item">
                            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBkY_bOI4Nw9enzBP5TEE2o1IVrl6Dn8wYkT5JvoleNG5HcP9zc78ED2uqqh6q56pKFI1IZdh54NAZ28VUITgx_IYChva0rnrPl4IHGbPwqzfYTvWkpchCtCmIWArpV1-vVD564i7rb9gURKUrmWQ6Ef0seY5Ikb4xVlOG5ArbqJ_vqcaQeftjdFGuoP0UTfSZspfov8B-rmfyganGyy_qA7iTXQCIzFjqwSuBDplIi1566UaLPQSyvF-BrckazFR3mT2BpRsCbKr0" alt="Interior view">
                        </div>
                    </div>

                    <!-- Sección de Historia -->
                    <div class="story-section">
                        <h2 class="story-title">THE STORY</h2>
                        <p class="story-text">
                            {{ $producto->descripcion }}
                        </p>
                        <p class="story-text">
                            This was the era when the Saddle Bag moved from a fashion accessory to a cultural phenomenon, seen on every major runway and editorial of the early aughts. It remains the most requested silhouette in the archival market.
                        </p>
                        <div class="story-tags">
                            <div class="story-tag">Collection: SS 2003</div>
                            <div class="story-tag">Condition: Grade A (Mint)</div>
                            <div class="story-tag">Provenance: Paris, France</div>
                        </div>
                    </div>
                </div>

                <!-- SIDEBAR DE PRODUCTO -->
                <div class="col-lg-5">
                    <div class="product-sidebar">
                        <!-- Etiqueta de marca -->
                        <div>
                            <div class="product-label">Christian Dior by John Galliano</div>
                        </div>

                        <!-- Título del producto -->
                        <h1 class="product-title">{{ $producto->nombre }}</h1>

                        <!-- Precio -->
                        <div class="product-price">
                            <span class="current-price">{{ number_format($producto->precio, 2, ',', '.') }}</span>
                            <span class="original-price">$6,200.00</span>
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
                        <form method="POST" action="/agregar-carrito">
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
                                        max="10"
                                        step="1"
                                        required
                                    >
                                    <button type="button" class="quantity-btn" onclick="increaseQuantity()">+</button>
                                </div>
                                <small style="display: block; margin-top: 0.5rem; color: var(--text-secondary); font-size: 0.75rem;">Stock disponible: 3 unidades</small>
                            </div>

                            <!-- Botones de acción -->
                            <button type="submit" class="btn-add-to-bag">Add to Bag</button>
                        </form>

                        <button class="btn-waitlist">Join the Waitlist</button>

                        <!-- Información adicional -->
                        <div class="product-info">
                            <div class="info-item">
                                <span class="info-label">Archive ID</span>
                                <span class="info-value">#CD-2003-GAL-001</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Material</span>
                                <span class="info-value">Jacquard & Calfskin</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- =============================================
                 SECCIÓN "COMPLETE THE LOOK"
                 ============================================ -->
            <section class="complete-look-section">
                <div class="section-header">
                    <h3 class="section-title">Complete the Look</h3>
                    <a href="#" class="view-all-link">View All Curations</a>
                </div>

                <div class="curation-grid">
                    <!-- Item 1 -->
                    <div class="curation-item">
                        <div class="curation-image-wrapper">
                            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuA-WB3jU48TklFibWqngL2M7deeQHQUVJeq2cxWybemY4uyWpkFCUtbaRYq8jhSG5OQluv-CVCEbIjK95ipwhKzbhFYnPz3Eh_8VeJvjqrDjMXR4v16H4UvArpjUyn2ib_Jrg2kcWKcqF6V_EqJ407MDOCN3GHHWcFs3HlRtOpa3D02q9ze1C0Wne4b10RynujKRM7QGMTOXOm6awZ6SSHpyfRxcFF8cL1HHxwsVcFlXzWAeFIofOdHuNWrRkxHN4EF1fzFkHtjp9w" alt="Galliano Dress">
                        </div>
                        <div class="curation-label">Dior Archives</div>
                        <h4 class="curation-title">2003 Newspaper Slip Dress</h4>
                        <div class="curation-price">$3,200.00</div>
                    </div>

                    <!-- Item 2 -->
                    <div class="curation-item">
                        <div class="curation-image-wrapper">
                            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuC-J8RG6yGJ4OUddVu9FBxWAPsiWMOX7RvXaG3S_f5KO-F8h6zGmcYtPwDw0HCnHY3-CLVWbmFUuYwZ3Zqj2FeG88qlL8VhCCOJN9ZPbw8WKbAFgqOZ8Q-O_NwBSw1VgrwT3K-aX6YhW4N7S0sODz5CmQLqlyH9D0X7JYEpXg0WUQB6O0gM82g77Dk4KzcBlET58Ok6v3UZbGsRVe32dkiDslcpzoJEapn7kRcCTFKZSQHI7_o4F8IG0TDvzN2GcsceyFy_me-w6Mo" alt="Luxury Sandals">
                        </div>
                        <div class="curation-label">Gucci Tom Ford Era</div>
                        <h4 class="curation-title">Metallic Gladiator Heels</h4>
                        <div class="curation-price">$1,150.00</div>
                    </div>

                    <!-- Item 3 -->
                    <div class="curation-item">
                        <div class="curation-image-wrapper">
                            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuARxc_mh34k25C9sfJj1uPfylfAqMywswP1aXEyy8e0zql59UPC7d8aovVRGjiUciIZp8KhiCjfDfldaT2Btq6SD3tE5hG2vLbsAsaS5_Pro-8aAlkbC4ZErsvkHCGSCqBg0SpjbAwcFynWKw3O5-gcllkng0GC-x1t4-M-QHS0o4PSN6NlNHVrmRCLjNp2v1EWtLXCBM0bmQD6Mz0A2BSQdjyA01Drp0SkwJXAyAWZtlc-L4wFfSfPqwHPSUGur9S7Z9adhfS5uJg" alt="Designer Sunglasses">
                        </div>
                        <div class="curation-label">Chanel Archival</div>
                        <h4 class="curation-title">1998 Pearl Shield Shades</h4>
                        <div class="curation-price">$890.00</div>
                    </div>
                </div>
            </section>
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