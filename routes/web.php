<?php

use Illuminate\Support\Facades\Route;
//para que no lance que ContactoController es clase indefinida
use App\Http\Controllers\ContactoController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/sobre-mi', function () {
return view('sobre-mi');
});
Route::get('/contacto', function () {
return view('contacto');
});

Route::get('/prueba-home', function () {
return view('prueba-home');
});
//Cuando se realiza una petición POST a /contacto se llama al método ‘procesar’ del
//controlador ContactoController 
Route::post('/contacto', [ContactoController::class, 'procesar']);
