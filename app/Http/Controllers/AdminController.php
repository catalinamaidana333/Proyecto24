<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Consulta;
use App\Models\VentaCabecera;

class AdminController extends Controller
{
   

public function verConsultas()
{
    // Traemos primero las no leídas, o simplemente por fecha descendente
    $consultas = Consulta::orderBy('created_at', 'desc')->get();
    
    return view('backend.admin.consultas', compact('consultas'));
}

public function verPedidos(Request $request)
{
    $query = VentaCabecera::with(['detalles.producto', 'usuario'])
                ->where('estado', '!=', 'carrito');

    if ($request->filled('desde')) {
        $query->whereDate('fecha_venta', '>=', $request->desde);
    }
    if ($request->filled('hasta')) {
        $query->whereDate('fecha_venta', '<=', $request->hasta);
    }
    if ($request->filled('estado')) {
        $query->where('estado', $request->estado);
    }

    $pedidos = $query->orderBy('fecha_venta', 'desc')->paginate(15);

    return view('backend.admin.pedidos', compact('pedidos'));
}
}
