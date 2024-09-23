<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EdicionProductoController extends Controller
{
    // Mostrar el formulario de edición
    public function edit($id)
    {
        // Buscar el producto por su ID
        $producto = Producto::find($id);

        // Verificar si el producto existe
        if (!$producto) {
            return redirect()->route('productos.gestion')->withErrors(['error' => 'Producto no encontrado.']);
        }

        // Mostrar la vista de edición con el producto
        return view('tiendaonline/editarproducto', compact('producto'));
    }

    // Actualizar el producto
    public function actualizar(Request $request, $id)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'nombre_producto' => 'required|max:255',
            'referencia' => 'required',
            'descripcion_de_producto' => 'nullable',
            'id_categoria' => 'required|integer|exists:categoria_producto,id', // Validación que garantiza la existencia de la categoría
            'valor_unitario_mes' => 'required|numeric',
            'valor_seis_meses' => 'nullable|numeric',
            'valor_doce_meses' => 'nullable|numeric',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación para que la imagen sea opcional
            'estado_producto' => 'required',
            // El campo 'visible' fue eliminado ya que no está en el formulario
        ]);

        // Buscar el producto por su ID
        $producto = Producto::find($id);

        // Verificar si el producto existe
        if (!$producto) {
            return redirect()->route('productos.gestionar')->withErrors(['error' => 'Producto no encontrado.']);
        }

        // Actualizar los datos del producto excepto la imagen
        $producto->fill($validatedData);

        // Manejar la imagen si se carga una nueva
        if ($request->hasFile('imagen')) {
            // Eliminar la imagen antigua si existe
            if ($producto->imagen) {
                Storage::delete('public/' . $producto->imagen);
            }
            
            // Subir la nueva imagen
            $path = $request->file('imagen')->store('productos', 'public');
            $producto->imagen = $path;
        }

        // Guardar los cambios
        $producto->save();
        

        // Redirigir con mensaje de éxito
        return redirect()->route('gestionProducto')->with('success', 'Producto actualizado correctamente.');
    }
}
