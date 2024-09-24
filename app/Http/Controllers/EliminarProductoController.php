<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        // Verificar si hay una imagen asociada y eliminarla
        if ($producto->imagen) {
            // Obtén la ruta completa de la imagen
            $imagenPath = $producto->imagen; // Asumiendo que aquí guardas la ruta relativa
        
            // Verifica si la imagen existe en el disco público
            if (Storage::disk('public')->exists($imagenPath)) {
                Storage::disk('public')->delete($imagenPath);
            } else {
                // Puedes registrar un mensaje si no se encuentra la imagen
                \Log::error("No se encontró la imagen en la ruta: $imagenPath");
            }
        }

        // Eliminar el producto
        $producto->delete();

        // Redirigir con mensaje de éxito
        return redirect()->back()->with('success', 'Producto eliminado correctamente.');
    }
}
