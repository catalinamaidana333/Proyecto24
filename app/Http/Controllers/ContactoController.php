<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;

class ContactoController extends Controller
{
    
    public function procesar(Request $request) 
    {
        $request->validate([
            'email' => 'required|email',
            'mensaje' => 'required|min:5',
        ]);

        Consulta::create([
            'email' => $request->email,
            'mensaje' => $request->mensaje,
        ]);

        return redirect()->back()->with('success', '¡Tu consulta fue enviada con éxito!');
    }
    public function marcarLeido($id)
    {
        $consulta = Consulta::findOrFail($id);
        $consulta->update(['estado' => 'visto']);

        return response()->json(['success' => true]);
    }
}
