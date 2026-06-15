<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VentaCabecera;
use App\Models\VentaDetalle;
use App\Models\ProductoTalle;
use App\Models\Producto; // Tu modelo de productos
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;


class CarritoController extends Controller
{
    // Helper privado para obtener o crear el carrito activo del usuario logueado
    private function obtenerCarrito()
    {
        return VentaCabecera::firstOrCreate(
            [
                'user_id' => auth()->id(),
                'estado' => 'carrito',
            ],
            ['total' => 0]
        );
    }

    // Listar los productos del carrito
    public function index()
    {
        $carrito = $this->obtenerCarrito();
        $items = $carrito->detalles()->with('producto')->get();

        return view('backend.usuarios.carrito', compact('carrito', 'items'));
    }

    // Agregar producto al carrito con validación de Stock


public function agregar(Request $request, $id)
{
    // 1. Validar la petición
    $request->validate([
        'talle' => 'required|string',
        'cantidad' => 'required|integer|min:1'
    ]);

    $talleElegido = $request->talle;
    $cantidadPedida = $request->cantidad;

    // 2. Buscar el producto y validar stock real en la tabla intermedia
    $producto = Producto::findOrFail($id);
    $registroTalle = ProductoTalle::where('producto_id', $id)
                                  ->where('talle', $talleElegido)
                                  ->first();

    // Salvado por si viene con/sin acento el talle único
    if (!$registroTalle) {
        $talleAlternativo = str_contains($talleElegido, 'único') ? 'unico' : 'único';
        $registroTalle = ProductoTalle::where('producto_id', $id)
                                      ->where('talle', $talleAlternativo)
                                      ->first();
    }

    if (!$registroTalle || $registroTalle->stock < $cantidadPedida) {
        return back()->with('error', 'Lo sentimos, no hay stock disponible.');
    }

    // 3. 🎯 LÓGICA DE BASE DE DATOS (Mismo puente que lee tu Navbar)
    // Buscamos si el usuario ya tiene un carrito abierto en la base de datos
    $mi_carrito = VentaCabecera::where('user_id', Auth::id())
                                ->where('estado', 'carrito')
                                ->first();

    // Si no tiene ninguno abierto, se lo creamos de cero
    if (!$mi_carrito) {
        $mi_carrito = VentaCabecera::create([
            'user_id' => Auth::id(),
            'fecha' => now(), // O los campos obligatorios que tenga tu tabla cabecera
            'estado' => 'carrito',
            'total' => 0
        ]);
    }

    // 4. Buscamos si este mismo producto con este mismo talle ya estaba metido en el detalle
    // (Ajustá los nombres de las columnas si en tu tabla se llaman diferente)
    $detalleExistente = $mi_carrito->detalles()
                                   ->where('producto_id', $producto->id)
                                   ->where('talle', $registroTalle->talle) 
                                   ->first();

// 4. 🎯 GUARDADO TOTAL: Creamos o actualizamos el detalle con subtotales
    if ($detalleExistente) {
        // Si ya existía el mismo producto y talle, sumamos cantidad y recalculamos subtotal
        $detalleExistente->cantidad += $cantidadPedida;
        $detalleExistente->subtotal = $detalleExistente->cantidad * $detalleExistente->precio_unitario;
        $detalleExistente->save();
    } else {
        // Si es nuevo, creamos la fila pasándole TODAS las columnas obligatorias
        $mi_carrito->detalles()->create([
            'producto_id' => $producto->id,
            'cantidad' => $cantidadPedida,
            'precio_unitario' => $producto->precio,
            'talle' => $registroTalle->talle,
            'subtotal' => $cantidadPedida * $producto->precio // 👈 ¡Acá mandamos el subtotal calculado!
        ]);
    }

    // (Opcional) Recalcular el total general de la cabecera si tu tabla lo requiere
    $nuevoTotal = $mi_carrito->detalles->sum(function($d) {
        return $d->cantidad * $d->precio_unitario;
    });
    $mi_carrito->update(['total' => $nuevoTotal]);

    return back()->with('success', '¡Pieza añadida a tu cartera con éxito!');
}

    // Eliminar un producto del carrito
    public function eliminar($id)
    {
        $carrito = $this->obtenerCarrito();
        $carrito->detalles()->where('id', $id)->delete();
        
        $this->recalcularTotal($carrito);

        return back()->with('success', 'Producto removido de tu cartera.');
    }

   public function confirmar()
{
    $carrito = $this->obtenerCarrito();
    $items = $carrito->detalles()->with('producto')->get();

    if ($items->count() === 0) {
        return back()->with('error', 'Tu cartera está vacía.');
    }

    // Transacción segura: si un producto se quedó sin stock en el proceso, se cancela todo
    DB::beginTransaction();
    try {
        foreach ($items as $item) {
            // 1. 🧠 CRÍTICO: Buscamos el stock REAL en la tabla intermedia 'producto_talles'
            // Bloqueamos la fila con lockForUpdate() para evitar que compren la misma prenda a la vez
            $registroTalle = ProductoTalle::lockForUpdate()
                ->where('producto_id', $item->producto_id)
                ->where('talle', $item->talle)
                ->first();

            // 2. Si no se encuentra el talle registrado o el stock es insuficiente, rebotamos
            if (!$registroTalle || $registroTalle->stock < $item->cantidad) {
                DB::rollBack();
                return redirect()->route('cliente.carrito')
                    ->with('error', "El producto {$item->producto->nombre} en Talle " . strtoupper($item->talle) . " ya no cuenta con stock suficiente.");
            }

            // 3. Descontamos el stock de la tabla intermedia y guardamos
            $registroTalle->stock -= $item->cantidad;
            $registroTalle->save();
        }

        $total = $carrito->total;

        // Cambiamos el estado finalizado de la cabecera
        $carrito->update([
            'estado' => 'confirmado',
            'fecha_venta' => now(), // Asegurate de que esta columna exista o cambiala por tu campo real (ej: 'fecha')
        ]);

        DB::commit();

        return redirect()->route('compra.confirmada')
            ->with('items', $items)
            ->with('total', $total);

    } catch (\Exception $e) {
        DB::rollBack();
        // Agregamos un log temporal o podés dejar el mensaje clásico por si explota otra cosa
        return back()->with('error', 'Hubo un inconveniente al procesar tu orden: ' . $e->getMessage());
    }
}
    private function recalcularTotal(VentaCabecera $carrito)
    {
        $total = $carrito->detalles()->sum('subtotal');
        $carrito->update(['total' => $total]);
    }
    public function descargarFactura($id)
{
    // 1. Buscamos la venta cargando sus relaciones (detalles, productos y usuario)
    $venta = VentaCabecera::with(['detalles.producto', 'usuario'])->findOrFail($id);

    // 2. Cargamos la vista de blade pasándole la variable $venta
    $pdf = Pdf::loadView('show.factura', compact('venta'));

    // 3. (Opcional) Configuramos propiedades del papel (A4 vertical)
    $pdf->setPaper('a4', 'portrait');

    // 4. Retornamos el PDF para que se descargue automáticamente en el navegador
    return $pdf->download('factura-neogaucho-' . $venta->id . '.pdf');
}
}
