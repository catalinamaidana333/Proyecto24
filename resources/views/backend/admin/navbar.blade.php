<style>
    .admin-navbar {
        background: linear-gradient(135deg, var(--primary, #b50058) 0%, var(--primary-light, #ff709e) 100%);
        color: white;
        padding: 0.85rem 1.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 12px rgba(181, 0, 88, 0.15);
        position: relative;
        z-index: 1000;
    }
    .admin-navbar__brand {
        font-weight: 900;
        font-size: 1.25rem;
        letter-spacing: -1px;
        text-transform: uppercase;
        color: white;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .admin-navbar__brand:hover {
        color: #fff;
    }
    
    /* BOTÓN HAMBURGUESA */
    .admin-navbar__toggle {
        display: none;
        flex-direction: column;
        gap: 5px;
        background: transparent;
        border: none;
        cursor: pointer;
        padding: 0.5rem;
        z-index: 1001;
    }
    .admin-navbar__toggle span {
        display: block;
        width: 26px;
        height: 3px;
        background-color: white;
        border-radius: 2px;
        transition: all 0.3s ease;
    }

    .admin-navbar__links {
        display: flex;
        gap: 0.5rem;
        align-items: center;
        flex-wrap: wrap;
    }
    .admin-navbar__links a.admin-nav-link {
        color: white;
        text-decoration: none;
        font-weight: 700;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        padding: 0.5rem 1rem;
        border-radius: 9999px;
        background: rgba(255,255,255,0.12);
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
    }
    .admin-navbar__links a.admin-nav-link:hover {
        background: rgba(255,255,255,0.28);
        transform: translateY(-1px);
        color: white;
    }

    .admin-navbar__user-section {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-left: 0.5rem;
        padding-left: 0.75rem;
        border-left: 1px solid rgba(255,255,255,0.25);
    }

    .admin-navbar__username {
        font-size: 0.85rem;
        font-weight: 600;
        color: rgba(255,255,255,0.95);
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
    }

    .admin-navbar__logout-btn {
        background: #1a1a1a;
        color: white;
        border: none;
        border-radius: 9999px;
        padding: 0.45rem 1rem;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        transition: all 0.2s ease;
        box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    }
    .admin-navbar__logout-btn:hover {
        background: #b41340;
        color: white;
        transform: translateY(-1px);
    }

    /* RESPONSIVE: Menor a 992px (Mobile / Tablet) */
    @media (max-width: 991px) {
        .admin-navbar__toggle {
            display: flex;
        }

        .admin-navbar__links {
            display: none;
            flex-direction: column;
            width: 100%;
            gap: 0.6rem;
            padding: 1rem 0 0.5rem 0;
            border-top: 1px solid rgba(255,255,255,0.2);
            margin-top: 0.5rem;
        }

        .admin-navbar__links.is-active {
            display: flex;
        }

        .admin-navbar__links a.admin-nav-link {
            width: 100%;
            justify-content: center;
            border-radius: 8px;
            padding: 0.65rem 1rem;
        }

        .admin-navbar__user-section {
            border-left: none;
            border-top: 1px solid rgba(255,255,255,0.2);
            margin-left: 0;
            padding-left: 0;
            padding-top: 0.75rem;
            width: 100%;
            flex-direction: column;
            gap: 0.6rem;
        }

        .admin-navbar__logout-btn {
            width: 100%;
            justify-content: center;
            padding: 0.65rem 1rem;
            border-radius: 8px;
        }
    }
</style>

<nav class="admin-navbar">
    <a href="{{ route('admin') }}" class="admin-navbar__brand">
        <span>NEOGAUCHO</span>
        <span style="opacity: 0.7; font-weight: 400; font-size: 0.9rem;">| Panel Admin</span>
    </a>
    
    <!-- Botón Hamburguesa -->
    <button class="admin-navbar__toggle" id="navbar-toggle" aria-label="Abrir menú">
        <span></span>
        <span></span>
        <span></span>
    </button>

    <div class="admin-navbar__links" id="navbar-links">
        <a href="{{ route('admin') }}" class="admin-nav-link">🏠 Dashboard</a>
        <a href="{{ route('productos.create') }}" class="admin-nav-link">➕ Crear Producto</a>
        <a href="{{ route('admin.productos.index') }}" class="admin-nav-link">📋 Ver Catálogo</a>
        <a href="{{ route('admin.consultas') }}" class="admin-nav-link">✉️ Ver Consultas</a>
        <a href="{{ route('admin.pedidos') }}" class="admin-nav-link">📦 Ver Pedidos</a>

        @auth
            <div class="admin-navbar__user-section">
                <span class="admin-navbar__username">
                    <i class="fa-solid fa-circle-user"></i> {{ auth()->user()->nombre ?? auth()->user()->email }}
                </span>
                <form method="POST" action="{{ route('logout') }}" style="margin: 0; display: inline; width: auto;">
                    @csrf
                    <button type="submit" class="admin-navbar__logout-btn">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </button>
                </form>
            </div>
        @endauth
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const toggleBtn = document.getElementById('navbar-toggle');
        const menuLinks = document.getElementById('navbar-links');

        if (toggleBtn && menuLinks) {
            toggleBtn.addEventListener('click', () => {
                menuLinks.classList.toggle('is-active');
            });
        }
    });
</script>