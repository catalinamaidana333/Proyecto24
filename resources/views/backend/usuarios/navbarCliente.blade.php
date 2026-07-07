
<!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
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
</style>

<nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid px-0">
        {{-- Marca --}}
        <a class="navbar-brand navbar-brand-text" href="{{ route('home') }}">NEOGAUCHO</a>

        {{-- Botón Hamburguesa (con Material Symbols) --}}
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="material-symbols-outlined" style="color: var(--primary-color); font-size: 2rem;">menu</span>
        </button>

        {{-- Menú colapsable --}}
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                {{-- Enlaces fijos --}}
                <li class="nav-item">
                    <a class="nav-link navbar-nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbar-nav-link" href="{{ route('productos.index') }}">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbar-nav-link" href="{{ route('comercializacion') }}">Comercialización</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbar-nav-link" href="{{ route('staff') }}">Quiénes Somos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbar-nav-link" href="{{ route('contacto') }}">Contacto</a>
                </li>
                

                {{-- Sección de autenticación --}}
                @guest
                    <li class="nav-item">
                        <a class="nav-link navbar-nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar-nav-link" href="{{ route('register') }}">Registro</a>
                    </li>
                @endguest

                @auth
                    

                    {{-- Dropdown de usuario --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle navbar-nav-link" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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

                    {{-- Carrito (bolsa) --}}
                    @php
                        $mi_carrito = \App\Models\VentaCabecera::where('user_id', auth()->id())->where('estado', 'carrito')->first();
                        $total_prendas = $mi_carrito ? $mi_carrito->detalles()->sum('cantidad') : 0;
                        $items_flotantes = $mi_carrito ? $mi_carrito->detalles()->with('producto')->get() : collect([]);
                        $precio_total = $mi_carrito ? $mi_carrito->detalles()->sum('subtotal') : 0;
                    @endphp

                    <li class="nav-item dropdown list-unstyled align-self-center ms-lg-3">
                        <a class="nav-link dropdown-toggle position-relative d-flex align-items-center text-uppercase fw-bold p-0 shadow-none"
                           href="#" id="cartDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"
                           style="color: var(--text-primary); border: none;">
                            <span class="material-symbols-outlined me-1" style="font-size: 1.4rem; vertical-align: middle;">shopping_bag</span>
                            <span style="font-family: 'Space Grotesk', sans-serif; font-size: 0.9rem;">Bag</span>

                            @if($total_prendas > 0)
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill"
                                      style="font-size: 0.65rem; background-color: var(--primary); padding: 0.35em 0.5em;">
                                    {{ $total_prendas }}
                                </span>
                            @endif
                        </a>

                        <div class="dropdown-menu dropdown-menu-end p-3 border-0 shadow" aria-labelledby="cartDropdown"
                             style="width: 320px; border-radius: 12px; background-color: #ffffff;">
                            <h6 class="dropdown-header px-0 fw-bold border-bottom pb-2 mb-3"
                                style="font-family: 'Space Grotesk', sans-serif; color: var(--text-primary);">
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
                                                <h6 class="my-0 small fw-bold text-truncate" style="max-width: 150px;">
                                                    {{ $item->producto->nombre }}
                                                </h6>
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
                                    <a href="{{ route('cliente.carrito') }}" class="btn text-white w-100 btn-sm text-uppercase fw-bold"
                                       style="background-color: var(--primary);">
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