<style>
    .admin-navbar {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
        color: white;
        padding: 1rem 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 12px rgba(181, 0, 88, 0.15);
        position: relative; /* Asegura el posicionamiento del menú desplegable */
    }
    .admin-navbar__brand {
        font-weight: 900;
        font-size: 1.25rem;
        letter-spacing: -1px;
        text-transform: uppercase;
        color: white;
        text-decoration: none;
    }
    
    /* BOTÓN HAMBURGUESA (Oculto por defecto en desktop) */
    .admin-navbar__toggle {
        display: none;
        flex-direction: column;
        gap: 4px;
        background: transparent;
        border: none;
        cursor: pointer;
        padding: 0.5rem;
    }
    .admin-navbar__toggle span {
        display: block;
        width: 25px;
        height: 3px;
        background-color: white;
        border-radius: 2px;
        transition: all 0.3s ease;
    }

    .admin-navbar__links {
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
    }
    .admin-navbar__links a {
        color: white;
        text-decoration: none;
        font-weight: 700;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        padding: 0.5rem 1.2rem;
        border-radius: 9999px;
        background: rgba(255,255,255,0.12);
        transition: background 0.2s ease;
    }
    .admin-navbar__links a:hover {
        background: rgba(255,255,255,0.3);
    }

    /* RESPONSIVE: Menor a 768px (Mobile) */
    @media (max-width: 768px) {
        .admin-navbar__toggle {
            display: flex; /* Mostramos la hamburguesa */
        }

        .admin-navbar__links {
            display: none; /* Ocultamos los enlaces en mobile por defecto */
            flex-direction: column;
            width: 100%;
            gap: 0.5rem;
            padding-top: 0.5rem;
        }

        /* Cuando el menú está activo, se muestra */
        .admin-navbar__links.is-active {
            display: flex;
        }

        .admin-navbar__links a {
            display: block;
            text-align: center;
            border-radius: 8px; /* Cambié a un radio más sutil para mobile, opcional */
        }
    }
</style>

<nav class="admin-navbar">
    <a href="{{ route('admin') }}" class="admin-navbar__brand">NEOGAUCHO · Admin</a>
    
    <!-- Botón Hamburguesa -->
    <button class="admin-navbar__toggle" id="navbar-toggle" aria-label="Abrir menú">
        <span></span>
        <span></span>
        <span></span>
    </button>

    <div class="admin-navbar__links" id="navbar-links">
        <a href="{{ route('admin') }}">🏠 Dashboard</a>
        <a href="{{ route('productos.create') }}">➕ Crear Producto</a>
        <a href="{{ route('admin.productos.index') }}">📋 Ver Catálogo</a>
        <a href="{{ route('admin.consultas') }}">✉️ Ver Consultas</a>
        <a href="{{ route('admin.pedidos') }}">📦 Ver Pedidos</a>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const toggleBtn = document.getElementById('navbar-toggle');
        const menuLinks = document.getElementById('navbar-links');

        toggleBtn.addEventListener('click', () => {
            // Intercambia la clase para mostrar/ocultar el menú
            menuLinks.classList.toggle('is-active');
        });
    });
</script>