<?php

namespace App\Http\Controllers;
use App\CategoriaProducto; 
use App\Producto; // Asegúrate de que la ruta del modelo sea correcta
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    // Método para mostrar la vista de productos
    public function index()
    {
        // Obtener todas las categorías
        $categorias = CategoriaProducto::all();
    
        // Obtener solo los productos activos
        $productos = Producto::where('estado_producto', 'activo')->get();
    
        return view('tiendaonline.productos', compact('categorias', 'productos')); // Pasar las categorías y los productos a la vista
    }
    

    // Método para manejar la solicitud POST y guardar el producto
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'nombre_producto' => 'required|max:255',
            'referencia' => 'required',
            'descripcion_de_producto' => 'required',
            'id_categoria' => 'required|integer',
            'valor_unitario_mes' => 'required|numeric',
            'valor_seis_meses' => 'required|numeric',
            'valor_doce_meses' => 'required|numeric',
            'estado_producto' => 'required',
            'imagen' => 'required',
            'visible' => 'required',
            'created_at' => 'required|date',
            'updated_at' => 'required|date',
        ]);

        // Crear un nuevo producto
        $producto = new Producto();
        $producto->nombre_producto = $validatedData['nombre_producto'];
        $producto->referencia = $validatedData['referencia'];
        $producto->descripcion_de_producto = $validatedData['descripcion_de_producto'];
        $producto->valor_unitario_mes = $validatedData['valor_unitario_mes'];
        $producto->valor_seis_meses = $validatedData['valor_seis_meses'];
        $producto->valor_doce_meses = $validatedData['valor_doce_meses'];
        $producto->estado_producto = $validatedData['estado_producto'];
        $producto->imagen = $validatedData['imagen'];
        $producto->visible = $validatedData['visible'];
        $producto->created_at = $validatedData['created_at'];
        $producto->updated_at = $validatedData['updated_at'];

        // Guardar en la base de datos
        $producto->save();

        // Redireccionar a una página o mostrar un mensaje de éxito
        return redirect()->route('tiendaonline.productos')->with('success', 'Producto guardado correctamente.');
    }
    // Actualizar el producto
/*     public function gestionar()
    {
        // Obtener todos los productos para la vista
        $productos = Producto::all();
        return view('tiendaonline.gestionarproducto', compact('productos'));
    } */

    public function productosPorCategoria(Request $request)
    {
        // Obtener la categoría seleccionada
        $categoriaId = $request->input('categorias');
        
    // Consultar los productos de la categoría seleccionada que están activos
    $productos = Producto::where('id_categoria', $categoriaId)
                         ->where('estado_producto', 'activo')
                         ->get();
        // Obtener las categorías para mostrar en el selector
        $categorias = CategoriaProducto::all();

        return view('tiendaonline.productos', compact('productos', 'categorias'));
    }


}

