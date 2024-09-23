<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;

class GestionProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('tiendaonline.gestionproducto', compact('productos'));
    }

    public function actualizar(Request $request)
    {
        // Buscar el producto por ID
        $producto = Producto::find($request->producto_id);
        
        // Actualizar los campos del producto
        $producto->nombre_producto = $request->nombre_producto;
        $producto->referencia = $request->referencia;
        $producto->descripcion_de_producto = $request->descripcion_de_producto;
        $producto->id_categoria = $request->id_categoria;
        $producto->valor_unitario_mes = $request->valor_unitario_mes;
        $producto->valor_seis_meses = $request->valor_seis_meses;
        $producto->valor_doce_meses = $request->valor_doce_meses;
        $producto->estado_producto = $request->estado_producto;
        $producto->imagen = $request->imagen;
        $producto->created_at = $request->created_at;
        $producto->updated_at = $request->updated_at;
    
        // Guardar los cambios en la base de datos
        $producto->save();
    
        // Redirigir con un mensaje de éxito
        return redirect()->route('gestionProducto.index')->with('success', 'Producto actualizado exitosamente');
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('gestionproducto', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
    
        $producto->update($request->all());
    
        return redirect()->route('home')->with('success', 'Producto actualizado correctamente.');
    }


}
