<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
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

//no se si esta forma de rutear esta bien(? ANDUVO
Route::get('/catalogo-productos', function (){
    return view('catalogo-productos');
})->name('productos');

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
