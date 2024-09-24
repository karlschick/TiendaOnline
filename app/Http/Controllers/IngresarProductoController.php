<?php

namespace App\Http\Controllers;

use App\Producto; // Asegúrate de que la ruta del modelo sea correcta
use Illuminate\Http\Request;

class IngresarProductoController extends Controller
{
    // Método para mostrar la vista de ingreso de productos
    public function create()
    {
        // Puedes devolver una vista para ingresar productos
        return view('tiendaonline.ingresarproducto');
    }

    // Método para manejar la solicitud POST y guardar el producto
    public function store(Request $request)
{
    // Validar los datos del formulario
    $validatedData = $request->validate([
        'nombre_producto' => 'required|max:255',
        'referencia' => 'required',
        'descripcion_de_producto' => 'nullable',
        'id_categoria' => 'required|exists:categoria_producto,id',
        'valor_unitario_mes' => 'required|numeric',
        'valor_seis_meses' => 'nullable|numeric',
        'valor_doce_meses' => 'nullable|numeric',
        'estado_producto' => 'required',
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación de la imagen
    ], [
        'imagen.image' => 'El archivo debe ser una imagen.',
        'imagen.mimes' => 'La imagen debe ser de tipo: jpeg, png, jpg o gif.',
        'imagen.max' => 'El tamaño de la imagen no debe superar los 2MB.',
        'imagen.uploaded' => 'Hubo un problema al subir la imagen, Revisa que no exceda las 2 MB y que sea formato png, jpg.',
    ]);

    // Crear un nuevo producto
    $producto = new Producto();
    $producto->nombre_producto = $validatedData['nombre_producto'];
    $producto->referencia = $validatedData['referencia'];
    $producto->id_categoria = $validatedData['id_categoria'];
    $producto->descripcion_de_producto = $validatedData['descripcion_de_producto'];
    $producto->valor_unitario_mes = $validatedData['valor_unitario_mes'];
    $producto->valor_seis_meses = $validatedData['valor_seis_meses'] ?? 0;
    $producto->valor_doce_meses = $validatedData['valor_doce_meses'] ?? 0;
    $producto->estado_producto = $validatedData['estado_producto'];

    // Manejar la imagen si se sube una
    if ($request->hasFile('imagen')) {
        // Generar un nombre único para la imagen
        $fileName = time() . '_' . $request->file('imagen')->getClientOriginalName();
        // Guardar la imagen en el almacenamiento público
        $filePath = $request->file('imagen')->storeAs('productos', $fileName, 'public');
        // Asignar la ruta del archivo al producto
        $producto->imagen = $filePath;
    }

    // Guardar el producto en la base de datos
    $producto->save();

    // Redireccionar con un mensaje de éxito
    return redirect()->route('ingresarProducto')->with('success', 'Producto guardado correctamente.');
}

}
