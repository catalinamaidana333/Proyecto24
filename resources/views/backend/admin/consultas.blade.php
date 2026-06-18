<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | NEOGAUCHO</title>
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

        body {
            background-color: var(--surface) !important;
            color: var(--text-primary) !important;
        }

        .page-container {
            padding-left: 12px;
            padding-right: 12px;
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
            background-color: var(--primary);
            color: #ffffff;
        }

        .card-form .card-header h4 {
            font-size: 1.15rem;
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
            background-color: var(--surface);
            font-weight: 700;
            color: var(--text-primary);
        }

        tr.fila-leida {
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
            font-weight: 600;
            letter-spacing: 0.3px;
            padding: 0.45rem 0.9rem;
            border-radius: 9999px;
        }

        .chk-leer {
            cursor: pointer;
            width: 1.1rem;
            height: 1.1rem;
            accent-color: var(--primary);
        }

        .empty-state {
            text-align: center;
            padding: 3rem 1.5rem;
            color: var(--text-secondary);
        }

        .empty-state i {
            font-size: 2.5rem;
            opacity: 0.3;
            display: block;
            margin-bottom: 0.75rem;
        }

        /* Responsive */
        @media (max-width: 576px) {
            .container.page-container {
                margin-top: 1rem !important;
                padding-left: 8px;
                padding-right: 8px;
            }

            .card-form .card-header {
                padding: 0.75rem 1rem;
            }

            .card-form .card-header h4 {
                font-size: 1rem;
            }

            table {
                font-size: 0.8rem;
            }

            table thead th,
            table tbody td {
                padding: 0.6rem 0.5rem;
            }
        }

        <style>
        /* ESTILOS PARA OBLIGAR AL FOOTER A QUEDAR ABAJO */
        html, body {
            height: 100% !important;
            margin: 0;
        }
        body {
            display: flex !important;
            flex-direction: column !important;
        }
        .content-wrapper {
            flex: 1 0 auto !important; /* Esto estira el contenido para empujar el footer */
        }
        
        /* ESTILOS DE TU FOOTER */
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
    <div class="container page-container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-11">

                <div class="card card-form">
                    <div class="card-header">
                        <h4 class="mb-0 fw-bold"><i class="fa-solid fa-envelope-open-text"></i> Bandeja de Consultas</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 8%">¿Leído?</th>
                                        <th style="width: 15%">Fecha / Hora</th>
                                        <th style="width: 25%">Email del Consultante</th>
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
                                                <span>{{ $consulta->email }}</span>
                                            </td>

                                            <td>
                                                <p class="mb-0 small" style="white-space: pre-line; max-width: 500px;">{{ $consulta->mensaje }}</p>
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
                    </div>
                </div>

            </div>
        </div>
    </div>

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
                            const fila = document.getElementById(`fila-${consultaId}`);
                            const badge = document.getElementById(`badge-${consultaId}`);

                            fila.classList.remove('fila-pendiente');
                            fila.classList.add('fila-leida');

                            badge.classList.remove('badge-pendiente');
                            badge.classList.add('badge-leido');
                            badge.textContent = 'Leído';

                            this.disabled = true;
                        }
                    })
                    .catch(error => console.error('Error al actualizar la consulta:', error));
                }
            });
        });
    </script>


<footer class="admin-footer">
    <div class="container">
        <div class="row align-items-center gy-3">
            <div class="col-12 col-md-4 text-center text-md-start">
                <span class="admin-footer__brand">NEOGAUCHO</span>
                <span class="mx-2">·</span>
                <span>&copy; {{ date('Y') }} CM2 - Panel de Control</span>
            </div>
            
            <div class="col-12 col-md-4 text-center">
                <div class="d-flex justify-content-center gap-3">
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
</body>
</body>
</html>