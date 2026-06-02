<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;
//para que no lance que ContactoController es clase indefinida
use App\Http\Controllers\ContactoController;
use Illuminate\Support\Facades\Auth;



Route::get('/', function () {
    return view('prueba-home');
});

Route::get('/contacto', function () {
return view('contacto');
})->name('contacto');

Route::get('/prueba-home', function () {
return view('prueba-home');
})->name('home');



Route::get('/terminos-y-condiciones', function () {
    return view('terminos-y-condiciones');
})->name('terminos');

Route::get('/quienes-somos', function () {
    return view('quienes-somos');
})->name('staff');

Route::get('/comercializacion', function () {
    return view('comercializacion');
})->name('comercializacion');

// Rutas públicas - sin middleware
Route::get('/login', [AuthController::class, 'formularioLogin'])->name('login');
Route::post('/login', [AuthController::class, 'autenticar'])->name('autenticar');
Route::get('/register', [AuthController::class, 'formularioRegistro'])->name('register');
Route::post('/register', [AuthController::class, 'registrar'])->name('registrar');

// Logout - necesita auth
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin - necesita auth + middleware admin
Route::middleware(['auth', 'rol:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});


//Cuando se realiza una petición POST a /contacto se llama al método ‘procesar’ del
//controlador ContactoController 
Route::post('/contacto', [ContactoController::class, 'procesar']);



Route::middleware('auth')->group(function () {
    Route::get('/admin', function () {
        return view('backend.admin.dashboard');
    })->name('admin');

    Route::get('/cliente', function () {
        return "Bienvenido Cliente: " . Auth::user()->nombre;
    })->name('cliente');
});

use App\Http\Controllers\CarritoController;

// Todas las rutas dentro de este grupo exigen inicio de sesión obligatorio
Route::middleware(['auth'])->group(function () {
    
    // Ver pantalla del carrito
    Route::get('/carrito', [CarritoController::class, 'index'])->name('cliente.carrito');
    
    // Operaciones del carrito
    Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar');
    Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
    Route::post('/carrito/confirmar', [CarritoController::class, 'confirmar'])->name('carrito.confirmar');

    // Pantalla de Éxito posterior a la compra
    Route::get('/compra-confirmada', function () {
        if (!session('total')) {
            return redirect()->route('home');
        }
        return view('backend.usuarios.compra-confirmada');
    })->name('compra.confirmada');
});
Route::resource('productos', ProductoController::class);
