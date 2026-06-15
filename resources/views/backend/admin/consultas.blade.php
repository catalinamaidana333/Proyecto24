<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | NEOGAUCHO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
@include('backend.admin.navbar')
</head>
<body
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-uppercase m-0" style="font-family: 'Space Grotesk', sans-serif; letter-spacing: 1px;">
                Bandeja de Consultas
            </h2>
            <p class="text-muted small m-0">Gestión de mensajes enviados desde el formulario de contacto.</p>
        </div>
    </div>

    <div class="card shadow-sm border-0" style="border-radius: 12px; overflow: hidden;">
        <div class="table-responsive">
            <table class="table align-middle mb-0" style="background-color: #ffffff;">
                <thead style="background-color: var(--surface-container, #f8f9fa);">
                    <tr class="text-uppercase small text-muted" style="font-size: 0.75rem; letter-spacing: 0.5px;">
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
                            class="{{ $consulta->estado == 'no_visto' ? 'table-light fw-bold text-dark' : 'text-secondary' }}" 
                            style="border-bottom: 1px solid var(--border, #dfdcdc); transition: all 0.3s ease;">
                            
                            <td class="text-center">
                                <input type="checkbox" class="form-check-input chk-leer" 
                                       data-id="{{ $consulta->id }}"
                                       style="cursor: pointer; width: 1.1rem; height: 1.1rem;"
                                       {{ $consulta->estado == 'visto' ? 'checked disabled' : '' }}>
                            </td>
                            
                            <td>
                                <span class="small">{{ $consulta->created_at->format('d/m/Y H:i') }} hs</span>
                            </td>
                            
                            <td>
                                <span style="font-family: 'Space Grotesk', sans-serif;">{{ $consulta->email }}</span>
                            </td>
                            
                            <td>
                                <p class="mb-0 small" style="white-space: pre-line; max-width: 500px;">{{ $consulta->mensaje }}</p>
                            </td>
                            
                            <td class="text-center">
                                <span id="badge-{{ $consulta->id }}" 
                                      class="badge px-3 py-2 rounded-pill {{ $consulta->estado == 'no_visto' ? 'bg-danger' : 'bg-secondary' }}"
                                      style="font-size: 0.7rem; font-weight: 600; letter-spacing: 0.3px;">
                                    {{ $consulta->estado == 'no_visto' ? 'Pendiente' : 'Leído' }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <span class="material-symbols-outlined d-block mb-2" style="font-size: 2rem;">mail_lock</span>
                                No se encontraron consultas registradas en el sistema.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
document.querySelectorAll('.chk-leer').forEach(checkbox => {
    checkbox.addEventListener('change', function() {
        if(this.checked) {
            const consultaId = this.dataset.id;
            
            // 🎯 Usamos el helper route() y le pasamos el ID dinámico reemplazando el texto temporal ':id'
            let url = "{{ route('admin.consultas.marcar', ':id') }}";
            url = url.replace(':id', consultaId);
            
            // Hacemos el envío silencioso al servidor
            fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    // Seleccionamos los elementos de la fila para actualizarlos de inmediato
                    const fila = document.getElementById(`fila-${consultaId}`);
                    const badge = document.getElementById(`badge-${consultaId}`);
                    
                    // Suavizamos el cambio visual quitando las negritas y pasándolo a gris
                    fila.classList.remove('table-light', 'fw-bold', 'text-dark');
                    fila.classList.add('text-secondary');
                    
                    // Cambiamos el tag de color
                    badge.classList.remove('bg-danger');
                    badge.classList.add('bg-secondary');
                    badge.textContent = 'Leído';
                    
                    // Deshabilitamos el control para que no se vuelva a clickear
                    this.disabled = true;
                }
            })
            .catch(error => console.error('Error al actualizar la consulta:', error));
        }
    });
});
</script>
</body>
</html>
