<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
   
    // Listar todos los productos
    public function index()
    {
        try {
            $productos = Producto::orderBy('created_at', 'desc')->paginate(10);
            return view('productos.index', compact('productos'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al cargar productos: ' . $e->getMessage());
        }
    }

    // Mostrar formulario para crear
    public function create()
    {
        return view('backend.admin.productos.crear');    }

    // Guardar en BD
    public function store(StoreProductoRequest $request)
    {
    try {
        // Obtenemos los datos ya validados por tu FormRequest
        $validated = $request->validated();

        // Laravel se encarga de generar un nombre único y seguro automáticamente
        //Verifica si el campo "imagen" existe.
        //Verifica si lo que enviaron es realmente un archivo (y no un texto raro que alguien inyectó).
        //Verifica si el archivo terminó de subirse correctamente al servidor sin corromperse por un fallo de internet del usuario.
        if ($request->hasFile('imagen')) {
            // Guardamos en 'storage/app/public/productos'
            // store() devuelve la ruta relativa automáticamente
            $rutaImagen = $request->file('imagen')->store('productos', 'public');
            
            // Asignamos la ruta al array que se guardará en la BD
            $validated['imagen'] = $rutaImagen;
        }

        Producto::create($validated);
 // hay q cambiar la ruta segun lo q definamos en web.php
        return redirect()->route('productos.index')
            ->with('success', 'Producto creado correctamente');
            
    } catch (\Exception $e) {
        return redirect()->back()
            ->with('error', 'Error al crear producto: ' . $e->getMessage())
            // agarra todos los textos, números y opciones que el usuario
            //  había llenado en el formulario y se los lleva de vuelta a la vista
            ->withInput();
    }
}

    // Mostrar un producto específico
    public function show($id) {
    $producto = Producto::findOrFail($id);
    return view('productos.show', compact('producto'));
}

    // Mostrar formulario para editar
    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    // Actualizar en BD
    public function update(UpdateProductoRequest $request, Producto $producto)
    {
        try {
            $validated = $request->validated();

            // Manejo de imagen si existe
            if ($request->hasFile('imagen')) {
                // Eliminar imagen anterior si existe
                if ($producto->imagen && file_exists(public_path($producto->imagen))) {
                    unlink(public_path($producto->imagen));
                }

                $imagen = $request->file('imagen');
                $nombreImagen = time() . '.' . $imagen->getClientOriginalExtension();
                $imagen->move(public_path('uploads/productos'), $nombreImagen);
                $validated['imagen'] = 'uploads/productos/' . $nombreImagen;
            }

            $producto->update($validated);

            return redirect()->route('productos.index')
                ->with('success', 'Producto actualizado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error al actualizar producto: ' . $e->getMessage())
                ->withInput();
        }
    }

    // Eliminar de BD
    public function destroy(Producto $producto)
    {
        try {
            // Eliminar imagen si existe
            if ($producto->imagen && file_exists(public_path($producto->imagen))) {
                unlink(public_path($producto->imagen));
            }

            $producto->delete();

            return redirect()->route('productos.index')
                ->with('success', 'Producto eliminado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error al eliminar producto: ' . $e->getMessage());
        }
    }
}
