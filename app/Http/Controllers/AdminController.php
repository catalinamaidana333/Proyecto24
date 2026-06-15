<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;

class AdminController extends Controller
{
   

public function verConsultas()
{
    // Traemos primero las no leídas, o simplemente por fecha descendente
    $consultas = Consulta::orderBy('created_at', 'desc')->get();
    
    return view('backend.admin.consultas', compact('consultas'));
}
}
