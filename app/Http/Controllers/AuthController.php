<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function formularioRegistro(){
        return view('backend.usuarios.registro');
    }

    public function formularioLogin(){
        return view('backend.usuarios.login');
    }

    public function registrar(Request $request){
        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios',
            'phone' => 'required|string|max:20',
            'password' => 'required|min:8|confirmed',
            'terms' => 'required|accepted'
        ]);
    
    // 2. Guardar el nuevo usuario en la Base de Datos
    $usuario = Usuario::create([
        'nombre' => $request->firstName . ' ' . $request->lastName,
            'email' => $request->email,
            'telefono' => $request->phone,
            'password' => $request->password,
            'rol_id' => 2 // Cliente
    ]);

    // 3. (Opcional) Loguear al usuario automáticamente tras registrarse
    Auth::login($usuario);
    return redirect('/')->with('success', 'Cuenta creada correctamente');
    }


    public function autenticar(Request $request){
        $credenciales = $request->validate([ 
            'email' => 'required|email', 
            'password' => 'required'
        ]); 

        if(Auth::attempt($credenciales)){
            $request->session()->regenerate();
        if(Auth::user()->rol_id === 1){
           return redirect('/admin');
        }
     return redirect('/')->with('success', 'Sesión iniciada correctamente');
    }

 return back()->withErrors([ 'email' => 'Email o contraseña incorrectos' ]);
}

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
