<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\ProductoTalle;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
   // (VISTA CLIENTE)
public function index(Request $request)
{
    // consulta base
    $query = Producto::query();
 
    $query->where('estado', 'activo');
    //  URL viene con el parámetro ?category=
    if ($request->has('category')) {
        $categoryUrl = $request->get('category');

        // mapeo
        $mapeoCategorias = [
            'shoes'       => 1, // zapatos
            'tops'        => 2, // partes de arriba
            'bottoms'     => 3, // partes de abajo
            'accessories' => 4, // accesorios
        ];

        
        if (array_key_exists($categoryUrl, $mapeoCategorias)) {
            $query->where('categoria_id', $mapeoCategorias[$categoryUrl]);
        }
    }

    // Traemos los productos filtrados 
    $productos = $query->get(); 

    return view('productos.index', compact('productos'));
}
    

    // Listar todos los productos (VISTA ADMIN - TOTALES)
    public function indexAdmin()
    {
        try {
            // Este queda exactamente igual porque el admin SI tiene que ver los inactivos
            $productos = Producto::orderBy('created_at', 'desc')->paginate(10);
            
            return view('backend.admin.productos.index', compact('productos'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al cargar productos: ' . $e->getMessage());
        }
    }

    // Mostrar formulario para crear
    public function create()
    {
        $categorias = \App\Models\Categoria::all();
    
    return view('backend.admin.productos.crear', compact('categorias'));
        }

    // Guardar en BD
    public function store(Request $request)
{
    // 1. Validaciones básicas de los campos
    $request->validate([
        'nombre' => 'required|string|max:255',
        'categoria_id' => 'required|exists:categorias,id',
        'descripcion' => 'nullable|string',
        'descripcion_drop' => 'nullable|string',
        'diseñador' => 'nullable|string|max:255',
        'año' => 'nullable|integer|min:1900|max:'.date('Y'),
        'material' => 'nullable|string|max:255',
        'precio' => 'required|numeric|min:0',
        'estado' => 'required|in:activo,inactivo',
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'talles' => 'required|array', 
    ]);

    // 2. Filtramos cuáles talles vinieron tildados en el formulario
    $tallesActivos = array_filter($request->talles, function($item) {
        return isset($item['activo']) && ($item['activo'] == '1' || $item['activo'] == 1);
    });

    // 3. Control básico: Que al menos hayan elegido UN talle para tener stock
    if (count($tallesActivos) < 1) {
        return back()->withInput()->withErrors([
            'talles' => 'Debes seleccionar al menos un talle y asignarle stock.'
        ]);
    }

    // 4. Manejo de la subida de imagen
    $rutaImagen = null;
    if ($request->hasFile('imagen')) {
        $rutaImagen = $request->file('imagen')->store('productos', 'public');
    }

    // 5. Creamos el Producto principal en la tabla 'productos'
    $producto = Producto::create([
        'nombre' => $request->nombre,
        'categoria_id' => $request->categoria_id,
        'descripcion' => $request->descripcion,
        'descripcion_drop' => $request->descripcion_drop,
        'diseñador' => $request->diseñador,
        'año' => $request->año,
        'material' => $request->material,
        'precio' => $request->precio,
        'estado' => $request->estado,
        'imagen' => $rutaImagen
    ]);

    // 6. Guardamos los talles seleccionados en la tabla 'producto_talles'
    foreach ($tallesActivos as $nombreTalle => $datos) {
        $talleLimpio = trim($nombreTalle, "'\"");
        
        \App\Models\ProductoTalle::create([
            'producto_id' => $producto->id,
            'talle' => $talleLimpio,
            'stock' => $datos['stock'] ?? 1
        ]);
    }

    return redirect()->route('admin.productos.index')->with('success', '¡Producto creado con éxito!');
}

    // Mostrar un producto específico
    public function show($id) {
    $producto = Producto::with('talles')
                        ->where('estado', 'activo')
                        ->findOrFail($id);
    return view('productos.show', compact('producto'));
}

    // Mostrar formulario para editar
    public function edit($id)
{
    $producto = Producto::findOrFail($id);
    return view('backend.admin.productos.editar', compact('producto'));
}

    // Actualizar en BD
public function update(Request $request, $id)
    {
        // 1. Validaciones iniciales
        $request->validate([
            'nombre' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
            'precio' => 'required|numeric|min:0',
            'estado' => 'required|in:activo,inactivo',
            'talles' => 'required|array',
        ]);

        $producto = Producto::findOrFail($id);

        try {
            // 2. Manejo de la imagen si subieron una nueva
            $rutaImagen = $producto->imagen;
            if ($request->hasFile('imagen')) {
                $rutaImagen = $request->file('imagen')->store('productos', 'public');
            }

            // 3. Actualizamos los campos en la tabla principal
            $producto->update([
                'nombre' => $request->nombre,
                'categoria_id' => $request->categoria_id,
                'descripcion' => $request->descripcion,
                'precio' => $request->precio,
                'estado' => $request->estado,
                'imagen' => $rutaImagen,
                'descripcion_drop' => $request->descripcion_drop,
                'diseñador' => $request->diseñador,
                'año' => $request->año,
                'material' => $request->material,
            ]);

            // 4. Sincronizar los talles en 'producto_talles'
            $tallesActivos = array_filter($request->talles, function($item) {
                return isset($item['activo']) && ($item['activo'] == '1' || $item['activo'] == 1);
            });

            // Vaciamos los talles viejos de este producto para sobreescribir limpio
            \App\Models\ProductoTalle::where('producto_id', $producto->id)->delete();

            // Insertamos la configuración de stock actualizada
            foreach ($tallesActivos as $nombreTalle => $datos) {
                \App\Models\ProductoTalle::create([
                    'producto_id' => $producto->id,
                    'talle' => trim($nombreTalle, "'\""),
                    'stock' => $datos['stock'] ?? 1
                ]);
            }

            // Redirección al index del admin con mensaje de éxito
            return redirect()->route('admin.productos.index')
                ->with('success', '¡Pieza de archivo modificada con éxito!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error al actualizar el producto: ' . $e->getMessage())
                ->withInput();
        }
    }

    // BAJA LOGICA  de BD (probando)
    public function destroy(Producto $producto)
    {
        try {
            

            $producto->delete();

            return redirect()->route('admin.productos.index')
                ->with('success', 'Producto dado de baja correctamente');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error al eliminar producto: ' . $e->getMessage());
        }
    }
}
