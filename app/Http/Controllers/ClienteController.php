<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\VentaCabecera;

class ClienteController extends Controller
{
    /**
     * Muestra el historial de compras del usuario logueado.
     * Solo trae ventas con estado 'confirmado'.
     */
public function historial()
{
    $ventas = VentaCabecera::with(['detalles.producto'])
        ->where('user_id', Auth::id())
        ->where('estado', 'confirmado')
        ->orderBy('fecha_venta', 'desc')
        ->get();

    return view('backend.usuarios.historial-compras', compact('ventas'));
}
}
