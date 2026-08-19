<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bandeja de Consultas | NEOGAUCHO Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        :root {
            --primary: #b50058;
            --primary-light: #ff709e;
            --surface: #f9f6f5;
            --surface-container: #eae7e7;
            --text-primary: #2f2f2e;
            --text-secondary: #5c5b5b;
            --border: #dfdcdc;
            --shadow: 0 4px 12px rgba(181, 0, 88, 0.08);
            --shadow-lg: 20px 40px 40px rgba(181, 0, 88, 0.15);
        }

        html, body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            margin: 0;
            background-color: var(--surface, #f9f6f5) !important;
            color: var(--text-primary) !important;
        }

        .main-content {
            flex: 1 0 auto;
            width: 100%;
        }

        .card-form {
            background-color: #ffffff;
            color: var(--text-primary);
            border: 1px solid var(--border);
            border-radius: 12px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .card-form .card-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            color: #ffffff;
            padding: 1rem 1.25rem;
            border-bottom: none;
        }

        .card-form .card-header h4 {
            font-size: 1.15rem;
            font-weight: 700;
        }

        .card-form .card-body {
            padding: 0;
        }

        table thead th {
            background-color: var(--surface-container);
            color: var(--text-secondary);
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: none;
            padding: 0.9rem 1rem;
        }

        table tbody td {
            padding: 1rem;
            border-color: var(--border);
            vertical-align: middle;
            font-size: 0.9rem;
        }

        tr.fila-pendiente {
            background-color: #fff9fb;
            font-weight: 600;
            color: var(--text-primary);
        }

        tr.fila-leida {
            background-color: #ffffff;
            color: var(--text-secondary);
        }

        tr {
            border-bottom: 1px solid var(--border);
            transition: all 0.3s ease;
        }

        .badge-pendiente {
            background-color: var(--primary);
            color: #ffffff;
        }

        .badge-leido {
            background-color: var(--surface-container);
            color: var(--text-secondary);
        }

        .badge-pill {
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.3px;
            padding: 0.45rem 0.9rem;
            border-radius: 9999px;
            display: inline-block;
        }

        .chk-leer {
            cursor: pointer;
            width: 1.2rem;
            height: 1.2rem;
            accent-color: var(--primary);
        }

        .empty-state {
            text-align: center;
            padding: 3.5rem 1.5rem;
            color: var(--text-secondary);
        }

        .empty-state i {
            font-size: 2.75rem;
            opacity: 0.35;
            display: block;
            margin-bottom: 0.75rem;
        }

        /* ═══ VISTA MOBILE (< 576px) ═══ */
        @media (max-width: 576px) {
            .container.page-container {
                padding-left: 10px;
                padding-right: 10px;
                margin-top: 1.5rem !important;
            }

            .card-form .card-header {
                padding: 0.85rem 1rem;
            }

            .card-form .card-header h4 {
                font-size: 1rem;
            }

            /* Convertir la tabla en tarjetas en móviles */
            .desktop-table {
                display: none;
            }

            .mobile-consultas-list {
                display: block;
                padding: 0.75rem;
            }

            .mobile-consulta-card {
                background: white;
                border: 1px solid var(--border);
                border-radius: 10px;
                padding: 1rem;
                margin-bottom: 0.85rem;
                box-shadow: 0 2px 6px rgba(0,0,0,0.04);
                transition: all 0.2s ease;
            }

            .mobile-consulta-card.fila-pendiente {
                border-left: 4px solid var(--primary);
                background-color: #fff9fb;
            }

            .mobile-consulta-card.fila-leida {
                border-left: 4px solid #afadac;
                opacity: 0.9;
            }

            .mobile-card-top {
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                gap: 0.5rem;
                margin-bottom: 0.5rem;
            }

            .mobile-card-email {
                font-weight: 700;
                font-size: 0.9rem;
                color: var(--text-primary);
                word-break: break-all;
            }

            .mobile-card-date {
                font-size: 0.75rem;
                color: var(--text-secondary);
                margin-bottom: 0.5rem;
                display: flex;
                align-items: center;
                gap: 0.25rem;
            }

            .mobile-card-message {
                font-size: 0.85rem;
                line-height: 1.5;
                color: #444;
                background: var(--surface);
                padding: 0.75rem;
                border-radius: 6px;
                margin-bottom: 0.75rem;
                white-space: pre-line;
                word-break: break-word;
            }

            .mobile-card-actions {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding-top: 0.5rem;
                border-top: 1px dashed var(--border);
            }
        }

        @media (min-width: 577px) {
            .mobile-consultas-list {
                display: none;
            }
            .desktop-table {
                display: block;
            }
        }

        /* ═══ FOOTER ESTILOS ═══ */
        .admin-footer {
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
            color: rgba(255, 255, 255, 0.7);
            padding: 2rem 0;
            margin-top: auto !important;
            border-top: 3px solid var(--primary, #b50058);
            font-size: 0.85rem;
            width: 100%;
            flex-shrink: 0;
        }
        .admin-footer a { color: white; text-decoration: none; transition: color 0.2s ease; }
        .admin-footer a:hover { color: var(--primary-light, #ff3399); }
        .admin-footer__brand { font-weight: 900; letter-spacing: -0.5px; text-transform: uppercase; color: white !important; }
        .admin-footer__tech-badge { background: rgba(255, 255, 255, 0.1); padding: 0.25rem 0.6rem; border-radius: 4px; font-size: 0.75rem; }
    </style>
</head>
<body>
    @include('backend.admin.navbar')

    <main class="main-content">
        <div class="container page-container mt-4 mb-5">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-11">

                    <div class="card card-form">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="mb-0 fw-bold">
                                <i class="fa-solid fa-envelope-open-text me-2"></i> Bandeja de Consultas
                            </h4>
                            <span class="badge bg-light text-dark fw-bold px-3 py-2 rounded-pill">
                                {{ $consultas->count() }} {{ $consultas->count() === 1 ? 'consulta' : 'consultas' }}
                            </span>
                        </div>
                        <div class="card-body">
                            
                            <!-- TABLA DESKTOP / TABLET (>= 576px) -->
                            <div class="table-responsive desktop-table">
                                <table class="table align-middle mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 8%">¿Leído?</th>
                                            <th style="width: 18%">Fecha / Hora</th>
                                            <th style="width: 26%">Email del Consultante</th>
                                            <th>Consulta / Mensaje</th>
                                            <th style="width: 12%" class="text-center">Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($consultas as $consulta)
                                            <tr id="fila-{{ $consulta->id }}"
                                                class="{{ $consulta->estado == 'no_visto' ? 'fila-pendiente' : 'fila-leida' }}">

                                                <td class="text-center">
                                                    <input type="checkbox" class="form-check-input chk-leer"
                                                           data-id="{{ $consulta->id }}"
                                                           {{ $consulta->estado == 'visto' ? 'checked disabled' : '' }}>
                                                </td>

                                                <td>
                                                    <span class="small">{{ $consulta->created_at->format('d/m/Y H:i') }} hs</span>
                                                </td>

                                                <td>
                                                    <span class="fw-semibold text-break">{{ $consulta->email }}</span>
                                                </td>

                                                <td>
                                                    <p class="mb-0 small" style="white-space: pre-line; word-break: break-word;">{{ $consulta->mensaje }}</p>
                                                </td>

                                                <td class="text-center">
                                                    <span id="badge-{{ $consulta->id }}"
                                                          class="badge-pill {{ $consulta->estado == 'no_visto' ? 'badge-pendiente' : 'badge-leido' }}">
                                                        {{ $consulta->estado == 'no_visto' ? 'Pendiente' : 'Leído' }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5">
                                                    <div class="empty-state">
                                                        <i class="fa-solid fa-envelope-circle-check"></i>
                                                        No se encontraron consultas registradas en el sistema.
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <!-- VISTA TARJETAS MOBILE (< 576px) -->
                            <div class="mobile-consultas-list">
                                @forelse($consultas as $consulta)
                                    <div id="mobile-card-{{ $consulta->id }}" 
                                         class="mobile-consulta-card {{ $consulta->estado == 'no_visto' ? 'fila-pendiente' : 'fila-leida' }}">
                                        
                                        <div class="mobile-card-top">
                                            <div class="mobile-card-email">
                                                <i class="fa-solid fa-user me-1 opacity-75"></i> {{ $consulta->email }}
                                            </div>
                                            <span id="mobile-badge-{{ $consulta->id }}"
                                                  class="badge-pill {{ $consulta->estado == 'no_visto' ? 'badge-pendiente' : 'badge-leido' }}">
                                                {{ $consulta->estado == 'no_visto' ? 'Pendiente' : 'Leído' }}
                                            </span>
                                        </div>

                                        <div class="mobile-card-date">
                                            <i class="fa-solid fa-clock me-1"></i> {{ $consulta->created_at->format('d/m/Y H:i') }} hs
                                        </div>

                                        <div class="mobile-card-message">
                                            {{ $consulta->mensaje }}
                                        </div>

                                        <div class="mobile-card-actions">
                                            <label class="form-check-label small d-flex align-items-center gap-2 m-0" style="cursor: pointer;">
                                                <input type="checkbox" class="form-check-input chk-leer m-0"
                                                       data-id="{{ $consulta->id }}"
                                                       {{ $consulta->estado == 'visto' ? 'checked disabled' : '' }}>
                                                <span>{{ $consulta->estado == 'visto' ? 'Consulta marcada como leída' : 'Marcar como leído' }}</span>
                                            </label>
                                        </div>
                                    </div>
                                @empty
                                    <div class="empty-state">
                                        <i class="fa-solid fa-envelope-circle-check"></i>
                                        No se encontraron consultas registradas en el sistema.
                                    </div>
                                @endforelse
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <footer class="admin-footer">
        <div class="container">
            <div class="row align-items-center gy-3">
                <div class="col-12 col-md-4 text-center text-md-start">
                    <span class="admin-footer__brand">NEOGAUCHO</span>
                    <span class="mx-2">·</span>
                    <span>&copy; {{ date('Y') }} CM2 - Panel de Control</span>
                </div>
                
                <div class="col-12 col-md-4 text-center">
                    <div class="d-flex justify-content-center gap-3 flex-wrap">
                        <a href="{{ route('admin') }}">Dashboard</a>
                        <a href="{{ route('admin.consultas') }}">Consultas</a>
                        <a href="{{ route('admin.pedidos') }}">Pedidos</a>
                    </div>
                </div>
                
                <div class="col-12 col-md-4 text-center text-md-end">
                    <span class="admin-footer__tech-badge">
                        <i class="fa-solid fa-code-branch me-1"></i> v2.1.0
                    </span>
                    <span class="ms-2">Ambiente: <strong class="text-success">Producción</strong></span>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelectorAll('.chk-leer').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    const consultaId = this.dataset.id;

                    let url = "{{ route('admin.consultas.marcar', ':id') }}";
                    url = url.replace(':id', consultaId);

                    fetch(url, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Actualizar tabla desktop
                            const fila = document.getElementById(`fila-${consultaId}`);
                            const badge = document.getElementById(`badge-${consultaId}`);
                            if (fila) {
                                fila.classList.remove('fila-pendiente');
                                fila.classList.add('fila-leida');
                            }
                            if (badge) {
                                badge.classList.remove('badge-pendiente');
                                badge.classList.add('badge-leido');
                                badge.textContent = 'Leído';
                            }

                            // Actualizar tarjeta mobile
                            const mobileCard = document.getElementById(`mobile-card-${consultaId}`);
                            const mobileBadge = document.getElementById(`mobile-badge-${consultaId}`);
                            if (mobileCard) {
                                mobileCard.classList.remove('fila-pendiente');
                                mobileCard.classList.add('fila-leida');
                            }
                            if (mobileBadge) {
                                mobileBadge.classList.remove('badge-pendiente');
                                mobileBadge.classList.add('badge-leido');
                                mobileBadge.textContent = 'Leído';
                            }

                            // Deshabilitar todos los checkboxes de este id
                            document.querySelectorAll(`.chk-leer[data-id="${consultaId}"]`).forEach(cb => {
                                cb.checked = true;
                                cb.disabled = true;
                            });
                        }
                    })
                    .catch(() => {
                        this.checked = false;
                    });
                }
            });
        });
    </script>
</body>
</html>