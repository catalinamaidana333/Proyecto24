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
    }
    .admin-navbar__brand {
        font-weight: 900;
        font-size: 1.25rem;
        letter-spacing: -1px;
        text-transform: uppercase;
        color: white;
        text-decoration: none;
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
</style>

<nav class="admin-navbar">
    <a href="{{ route('admin') }}" class="admin-navbar__brand">NEOGAUCHO · Admin</a>
    <div class="admin-navbar__links">
        <a href="{{ route('admin') }}">🏠 Dashboard</a>
        <a href="{{ route('productos.create') }}">➕ Crear Producto</a>
        <a href="{{ route('admin.productos.index') }}">📋 Ver Catálogo</a>
    </div>
</nav>