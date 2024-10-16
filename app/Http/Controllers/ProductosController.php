<?php

namespace App\Http\Controllers;

use App\CategoriaProducto; 
use App\Producto; // Asegúrate de que la ruta del modelo sea correcta
use App\Slider; // Importar el modelo Slider
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
    
        // Obtener los sliders, si es necesario
        $sliders = Slider::all(); // Asegúrate de tener el modelo Slider importado
    
        return view('tiendaonline.productos', compact('categorias', 'productos', 'sliders'));
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
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'visible' => 'required|boolean', // Aseguramos que el campo visible sea booleano (0 o 1)
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
        $producto->visible = $validatedData['visible'];
    
        // Procesar la imagen si se sube
        if ($request->hasFile('imagen')) {
            // Guardar la imagen en el directorio 'public/productos'
            $file = $request->file('imagen');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Generar un nombre único
            $filePath = $file->storeAs('public/productos', $fileName); // Guardar en la carpeta pública
    
            // Asignar la ruta completa relativa al producto
            $producto->imagen = 'productos/' . $fileName;
        } else {
            // Si no se sube imagen, establecemos el campo imagen como null o un valor por defecto
            $producto->imagen = null;
        }
    
        // Guardar en la base de datos
        $producto->save();
    
        // Redireccionar a una página o mostrar un mensaje de éxito
        return redirect()->route('productos.mostrar')->with('success', 'Producto guardado correctamente.');
    }

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

    // Obtener los sliders
    $sliders = Slider::all(); // Asegúrate de que este modelo esté correctamente importado y definido

    // Retornar la vista con los productos, categorías y sliders
    return view('tiendaonline.productos', compact('productos', 'categorias', 'sliders'));
}


    public function mostrarProductos()
    {
        $sliders = Slider::all(); // Obtén todos los sliders desde la base de datos
        $categorias = CategoriaProducto::all(); // Obtén todas las categorías
        $productos = Producto::where('estado_producto', 'activo')->get(); // Obtén solo los productos activos
    
        return view('tiendaonline.productos', compact('sliders', 'categorias', 'productos')); // Pasar sliders, categorías y productos a la vista
    }
}


