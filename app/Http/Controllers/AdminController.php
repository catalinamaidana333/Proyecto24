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
public function index()
    {
        // Obtener los últimos 5 pedidos (ordenados por fecha descendente)
        $pedidosRecientes = VentaCabecera::with('usuario', 'detalles.producto')
                            ->orderBy('created_at', 'desc')
                            ->limit(5)
                            ->get();

        // También puedes pasar los datos de estadísticas (totales, etc.)
        $totalVentas = VentaCabecera::where('estado', 'confirmado')->sum('total');
        $totalPedidos = VentaCabecera::count();
        // ... otros stats

        return view('backend.admin.dashboard', compact('pedidosRecientes', 'totalVentas', 'totalPedidos'));
    }
}
