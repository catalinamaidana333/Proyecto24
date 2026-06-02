<?php

namespace App\Http/Controllers;

use Illuminate\Http\Request;
use App\Models\VentaCabecera;
use App\Models\VentaDetalle;
use App\Models\Producto; // Tu modelo de productos
use Illuminate\Support\Facades\DB;

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
    public function agregar(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
        ]);

        $producto = Producto::findOrFail($request->producto_id);

        // Buscar si el producto ya está en el carrito para evaluar la cantidad acumulada
        $carrito = $this->obtenerCarrito();
        $itemExistente = $carrito->detalles()->where('producto_id', $producto->id)->first();
        
        $cantidadTotalALlevar = $request->cantidad;
        if ($itemExistente) {
            $cantidadTotalALlevar += $itemExistente->cantidad;
        }

        // CONTROL DE STOCK CONTRA NEGATIVOS
        if ($producto->stock < $cantidadTotalALlevar) {
            return back()->with('error', "No hay suficiente stock. Disponible: {$producto->stock} unidades.");
        }

        if ($itemExistente) {
            $itemExistente->cantidad = $cantidadTotalALlevar;
            $itemExistente->subtotal = $itemExistente->cantidad * $itemExistente->precio_unitario;
            $itemExistente->save();
        } else {
            $carrito->detalles()->create([
                'producto_id' => $producto->id,
                'cantidad' => $request->cantidad,
                'precio_unitario' => $producto->precio,
                'subtotal' => $producto->precio * $request->cantidad,
            ]);
        }

        $this->recalcularTotal($carrito);

        return back()->with('success', 'Producto agregado al carrito con éxito.');
    }

    // Eliminar un producto del carrito
    public function eliminar($id)
    {
        $carrito = $this->obtenerCarrito();
        $carrito->detalles()->where('id', $id)->delete();
        
        $this->recalcularTotal($carrito);

        return back()->with('success', 'Producto removido de tu cartera.');
    }

    // Confirmar la compra y Descontar el Stock definitivamente
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
                $producto = Producto::lockForUpdate()->find($item->producto_id);

                if ($producto->stock < $item->cantidad) {
                    DB::rollBack();
                    return redirect()->route('cliente.carrito')->with('error', "El producto {$producto->nombre} ya no cuenta con stock suficiente.");
                }

                // Descontamos el stock de la base de datos
                $producto->stock -= $item->cantidad;
                $producto->save();
            }

            $total = $carrito->total;

            // Cambiamos el estado finalizado
            $carrito->update([
                'estado' => 'confirmado',
                'fecha_venta' => now(),
            ]);

            DB::commit();

            return redirect()->route('compra.confirmada')
                ->with('items', $items)
                ->with('total', $total);

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Hubo un inconveniente al procesar tu orden.');
        }
    }

    private function recalcularTotal(VentaCabecera $carrito)
    {
        $total = $carrito->detalles()->sum('subtotal');
        $carrito->update(['total' => $total]);
    }
}
