<?php

namespace App\Http\Controllers;
use App\Producto;
use Illuminate\Http\Request;

class EliminarProductoController extends Controller
{
    // Método para eliminar un producto
    public function eliminar($id)
    {
        // Buscar el producto por su ID
        $producto = Producto::find($id);

        // Verificar si el producto existe
        if (!$producto) {
            return redirect()->route('productos.gestionar')->withErrors(['error' => 'Producto no encontrado.']);
        }

        // Eliminar el producto
        $producto->delete();

        // Redirigir con mensaje de éxito
        return redirect()->back()->with('success', 'Producto eliminado correctamente.');
    }
}
