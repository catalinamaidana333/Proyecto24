<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\ProductoTalle;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
   // (VISTA CLIENTE)
public function index(Request $request)
{
    // consulta base
    $query = Producto::query();
 
    $query->where('estado', 'activo');
    if ($request->is('/') || $request->is('prueba-home')) {
        $ultimosDrops = $query->latest()->take(4)->get();
        return view('prueba-home', compact('ultimosDrops'));
    }
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
    public function store(StoreProductoRequest $request)
{
    // 1. Filtramos cuáles talles vinieron tildados en el formulario
    $tallesActivos = array_filter($request->talles, function($item) {
        return isset($item['activo']) && ($item['activo'] == '1' || $item['activo'] == 1);
    });

    // 2. Control básico: Que al menos hayan elegido UN talle para tener stock
    if (count($tallesActivos) < 1) {
        return back()->withInput()->withErrors([
            'talles' => 'Debes seleccionar al menos un talle y asignarle stock.'
        ]);
    }

    try {
        DB::transaction(function () use ($request, $tallesActivos) {
            // 3. Manejo de la subida de imagen
            $rutaImagen = null;
            if ($request->hasFile('imagen')) {
                $rutaImagen = $request->file('imagen')->store('images', 'public');
            }

            // 4. Creamos el Producto principal en la tabla 'productos'
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

            // 5. Guardamos los talles seleccionados en la tabla 'producto_talles'
            foreach ($tallesActivos as $nombreTalle => $datos) {
                $talleLimpio = trim($nombreTalle, "'\"");
                
                \App\Models\ProductoTalle::create([
                    'producto_id' => $producto->id,
                    'talle' => $talleLimpio,
                    'stock' => $datos['stock'] ?? 1
                ]);
            }
        });

        return redirect()->route('admin.productos.index')->with('success', '¡Producto creado con éxito!');

    } catch (\Exception $e) {
        return redirect()->back()
            ->with('error', 'Error al crear el producto: ' . $e->getMessage())
            ->withInput();
    }
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
public function update(UpdateProductoRequest $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $tallesActivos = array_filter($request->talles, function($item) {
            return isset($item['activo']) && ($item['activo'] == '1' || $item['activo'] == 1);
        });

        if (count($tallesActivos) < 1) {
            return back()->withInput()->withErrors([
                'talles' => 'Debes seleccionar al menos un talle y asignarle stock.'
            ]);
        }

        try {
            DB::transaction(function () use ($request, $producto, $tallesActivos) {
                // Manejo de la imagen si subieron una nueva
                $rutaImagen = $producto->imagen;
                if ($request->hasFile('imagen')) {
                    $rutaImagen = $request->file('imagen')->store('images', 'public');
                }

                // Actualizamos los campos en la tabla principal
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
            });

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
