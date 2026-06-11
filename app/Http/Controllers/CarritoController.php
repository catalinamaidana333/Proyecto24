<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VentaCabecera;
use App\Models\VentaDetalle;
use App\Models\ProductoTalle;
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
public function agregar(Request $request, $id)
{
    // 1. Validamos que el talle y la cantidad viajen correctamente
    $request->validate([
        'talle' => 'required|string',
        'cantidad' => 'required|integer|min:1'
    ]);

    $talleElegido = $request->talle;
    $cantidadPedida = $request->cantidad;

    // 2. Buscamos el producto en la tabla principal
    $producto = \App\Models\Producto::findOrFail($id);

    // 3. Buscamos el stock exacto en la tabla producto_talles
    $registroTalle = \App\Models\ProductoTalle::where('producto_id', $id)
                                              ->where('talle', $talleElegido)
                                              ->first();

    // 💡 SALVADO DE ACENTOS EXTREMO: 
    // Si no lo encuentra con acento (ej: 'único'), probamos buscarlo sin acento (ej: 'unico') o viceversa
    if (!$registroTalle) {
        $talleAlternativo = str_contains($talleElegido, 'único') ? 'unico' : 'único';
        $registroTalle = \App\Models\ProductoTalle::where('producto_id', $id)
                                                  ->where('talle', $talleAlternativo)
                                                  ->first();
    }

    // 4. Si la base de datos de verdad no tiene ese talle o no alcanza el stock, rebotamos
    if (!$registroTalle || $registroTalle->stock < $cantidadPedida) {
        return back()->with('error', 'Lo sentimos, no hay stock disponible para este talle.');
    }

    // 5. LÓGICA DE LA SESIÓN: Guardamos el artículo en el carrito
    $carrito = session()->get('carrito', []);

    // Creamos una clave única (ID-Talle) para que no se pisen si agregan talles distintos de un mismo producto
    $itemKey = $id . '-' . $registroTalle->talle;

    if (isset($carrito[$itemKey])) {
        $carrito[$itemKey]['cantidad'] += $cantidadPedida;
    } else {
        $carrito[$itemKey] = [
            "id" => $producto->id,
            "nombre" => $producto->nombre,
            "cantidad" => $cantidadPedida,
            "precio" => $producto->precio,
            "talle" => $registroTalle->talle,
            "imagen" => $producto->imagen
        ];
    }

    // Guardamos los cambios en la sesión de Laravel
    session()->put('carrito', $carrito);

    session()->save();

    // 6. Volvemos a la pantalla con un mensaje explícito de éxito
    return back()->with('success', '¡El producto se añadió correctamente a tu bolsa!');
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
