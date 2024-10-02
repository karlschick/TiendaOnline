<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function formulario(Request $request)
    {
        // Suponiendo que guardaste los productos en la sesión
        $productos = $request->session()->get('carrito', []); // Cambia 'carrito' por el nombre que uses en la sesión
        $total = 0;

        // Calcula el total
        foreach ($productos as $producto) {
            $total += $producto['precio'] * $producto['cantidad'];
        }

        return view('tiendaonline.formulario_compra', compact('productos', 'total'));
    }

    public function comprar(Request $request)
    {
        // Lógica para procesar la compra
    }
}
