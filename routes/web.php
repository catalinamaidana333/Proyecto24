<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;

// ==========================================
// 1. RUTAS PÚBLICAS (Visitantes y Clientes)
// ==========================================
Route::get('/', [ProductoController::class, 'index'])->name('home');
Route::get('/prueba-home', [ProductoController::class, 'index']);

// Catálogo y vista de productos (PÚBLICOS para comprar/ver)
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/{id}', [ProductoController::class, 'show'])->name('productos.show');

// Páginas informativas
Route::get('/contacto', function () { return view('contacto'); })->name('contacto');
Route::post('/contacto', [ContactoController::class, 'procesar'])->name('contacto.enviar');
Route::get('/terminos-y-condiciones', function () { return view('terminos-y-condiciones'); })->name('terminos');
Route::get('/quienes-somos', function () { return view('quienes-somos'); })->name('staff');
Route::get('/comercializacion', function () { return view('comercializacion'); })->name('comercializacion');

// Autenticación pública
Route::get('/login', [AuthController::class, 'formularioLogin'])->name('login');
Route::post('/login', [AuthController::class, 'autenticar'])->name('autenticar');
Route::get('/register', [AuthController::class, 'formularioRegistro'])->name('register');
Route::post('/register', [AuthController::class, 'registrar'])->name('registrar');


// ==========================================
// 2. RUTAS AUTENTICADAS (Cualquier usuario logueado)
// ==========================================
Route::middleware(['auth'])->group(function () {
    
    // Cierre de sesión (Única definición correcta)
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Carrito de compras
    Route::get('/carrito', [CarritoController::class, 'index'])->name('cliente.carrito');
    Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
    Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
    Route::post('/carrito/confirmar', [CarritoController::class, 'confirmar'])->name('carrito.confirmar');
    
    // Historial y Facturas
    Route::get('/compras/factura/{id}', [CarritoController::class, 'descargarFactura'])->name('factura.descargar');
    Route::get('/mis-compras', [ClienteController::class, 'historial'])->name('backend.usuarios.historial-compras');
    Route::get('/compra-confirmada', function () {
        if (!session('total')) return redirect()->route('home');
        return view('backend.usuarios.compra-confirmada');
    })->name('compra.confirmada');
});


// ==========================================
// 3. RUTAS DE ADMINISTRACIÓN (Solo Admin: auth + rol:1)
// ==========================================
Route::middleware(['auth', 'rol:1'])->group(function () {
    
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    
    // CRUD Productos (Crear, Guardar, Editar, Actualizar, Borrar)
    Route::get('/admin/productos', [ProductoController::class, 'indexAdmin'])->name('admin.productos.index');
    Route::get('/admin/productos/crear', [ProductoController::class, 'create'])->name('productos.create');
    Route::post('/admin/productos', [ProductoController::class, 'store'])->name('productos.store');
    Route::get('/admin/productos/{id}/editar', [ProductoController::class, 'edit'])->name('admin.productos.edit');
    Route::put('/admin/productos/{id}', [ProductoController::class, 'update'])->name('productos.update');
    Route::delete('/admin/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');

    // Gestión de Consultas y Pedidos
    Route::get('/consultas', [AdminController::class, 'verConsultas'])->name('admin.consultas');
    Route::post('/consultas/{id}/marcar-leido', [ContactoController::class, 'marcarLeido'])->name('admin.consultas.marcar');
    Route::get('/admin/pedidos', [AdminController::class, 'verPedidos'])->name('admin.pedidos');
});