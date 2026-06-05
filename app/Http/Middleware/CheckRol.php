<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRol
{
   public function handle(Request $request, Closure $next, $rolBuscado): Response
    {
        // 1. Verificamos si el usuario NO ha iniciado sesión.
        if (!auth()->check()) {
            // Si no está logueado, lo mandamos a que inicie sesión.
            return redirect('/login'); 
        }

        // 2. Comparamos el rol del usuario con el número que pusiste en la ruta (el "1").
        // ATENCIÓN: Si en tu base de datos (tabla users) la columna se llama distinto 
        // a "rol_id" (por ejemplo, "rol" o "id_rol"), cambialo en esta línea:
        if (auth()->user()->rol_id != $rolBuscado) {
            
            // Si no es admin (ej: su rol_id es 2), lo pateamos al home '/'
            return redirect('/'); 
        }

        // 3. Si pasó las dos pruebas anteriores, significa que ES el admin. Lo dejamos pasar.
        return $next($request);
    }
}
