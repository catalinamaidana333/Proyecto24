<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>NEOGAUCHO | Mi Cartera</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body style="background-color: var(--surface);">

<div class="container py-5">
    <div class="card p-4 shadow border-0" style="border-radius: 16px;">
        <h2 class="mb-4 fw-bold text-uppercase" style="font-family: 'Space Grotesk', sans-serif;">Tu Cartera de Compras</h2>
        
        <!-- Mensajes de Error de Stock o Éxito -->
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($items->isEmpty())
            <div class="text-center py-5">
                <p>No tienes productos seleccionados actualmente.</p>
                <a href="/shop" class="btn text-white" style="background-color: var(--primary);">Volver al Shop</a>
            </div>
        @else
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Subtotal</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td class="fw-bold">{{ $item->producto->nombre }}</td>
                            <td>{{ $item->cantidad }}</td>
                            <td>${{ number_format($item->precio_unitario, 2, ',', '.') }}</td>
                            <td>${{ number_format($item->subtotal, 2, ',', '.') }}</td>
                            <td>
                                <form method="POST" action="{{ route('carrito.eliminar', $item->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                <h4 class="fw-bold">Total: ${{ number_format($carrito->total, 2, ',', '.') }}</h4>
                
                <form method="POST" action="{{ route('carrito.confirmar') }}">
                    @csrf
                    <button type="submit" class="btn text-white px-4 py-2 fw-bold text-uppercase" style="background-color: var(--primary); border-radius: 8px;">
                        Confirmar Compra
                    </button>
                </form>
            </div>
        @endif
    </div>
</div>

</body>
</html>