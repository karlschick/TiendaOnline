<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto; 
use Session;

class CarritoController extends Controller
{
    public function index()
    {
        $carrito = session()->get('carrito', []);
        $productoIds = array_keys($carrito);

        // Obtener los productos en el carrito de la base de datos
        $productos = Producto::whereIn('id', $productoIds)->get();

        // Calcular el total de la compra
        $total = 0;
        foreach ($productos as $producto) {
            $cantidad = $carrito[$producto->id]['cantidad'];
            $precio = $carrito[$producto->id]['precio']; // Usar el precio almacenado en el carrito
            $total += $precio * $cantidad; // Calcular el subtotal correcto
        }

        return view('tiendaonline.carrito', compact('productos', 'carrito', 'total'));
    }

    public function agregarAlCarrito(Request $request, $id)
    {
        // Obtén el producto
        $producto = Producto::find($id);
    
        // Valida si el producto existe
        if (!$producto) {
            return redirect()->back()->withErrors(['error' => 'Producto no encontrado.']);
        }
    
        // Obtener la cantidad y tipo de compra
        $cantidad = $request->input('cantidad');
        $tipoCompra = $request->input('tipo_compra');
    
        // Inicializa el precio
        $precio = 0;
    
        // Asigna el precio según el tipo de compra
        if ($tipoCompra === '1_mes') {
            $precio = $producto->valor_unitario_mes;
        } elseif ($tipoCompra === '6_meses') {
            $precio = $producto->valor_seis_meses;
        } elseif ($tipoCompra === '12_meses') {
            $precio = $producto->valor_doce_meses;
        }
    
        // Lógica para agregar el producto al carrito
        $carrito = session()->get('carrito', []);
    
        if (isset($carrito[$id])) {
            // Si el producto ya está en el carrito, solo actualiza la cantidad
            $carrito[$id]['cantidad'] += $cantidad;
            // Actualiza el precio si es necesario
            $carrito[$id]['precio'] = $precio; // Actualiza el precio en caso de que cambie
        } else {
            // Si no está, añádelo al carrito
            $carrito[$id] = [
                'nombre_producto' => $producto->nombre_producto,
                'cantidad' => $cantidad,
                'precio' => $precio, // Guarda el precio correspondiente
            ];
        }
    
        session()->put('carrito', $carrito);
    
        return redirect()->route('carrito.ver')->with('success', 'Producto agregado al carrito.');
    }

    public function eliminarDelCarrito($id)
    {
        $carrito = session()->get('carrito', []);

        // Verificar si el producto está en el carrito
        if (isset($carrito[$id])) {
            // Eliminar el producto del carrito
            unset($carrito[$id]);
            session()->put('carrito', $carrito);
        }

        // Redirigir de nuevo al carrito con un mensaje de éxito
        return redirect()->route('carrito')->with('success', 'Producto eliminado del carrito.');
    }

    public function verCarrito()
    {
        // Obtener el carrito de la sesión
        $carrito = session()->get('carrito', []);
    
        // Obtener los IDs de los productos en el carrito
        $productoIds = array_keys($carrito);
    
        // Consultar los productos desde la base de datos usando los IDs
        $productos = Producto::whereIn('id', $productoIds)->get();
    
        // Calcular el total de la compra
        $total = 0;
        foreach ($productos as $producto) {
            $cantidad = $carrito[$producto->id]['cantidad'];
            $precio = $carrito[$producto->id]['precio']; // Usar el precio del carrito
            $total += $precio * $cantidad; // Calcular el subtotal correcto
        }
    
        // Pasar los productos, carrito y el total a la vista
        return view('tiendaonline.carrito', [
            'productos' => $productos,
            'carrito' => $carrito,
            'total' => $total // Pasar el total a la vista
        ]);
    }

    public function resumenCompra()
    {
        $carrito = session()->get('carrito', []);
        $productoIds = array_keys($carrito);
        $productos = Producto::whereIn('id', $productoIds)->get();
        $total = 0;

        foreach ($productos as $producto) {
            $total += $carrito[$producto->id]['precio'] * $carrito[$producto->id]['cantidad'];
        }

        return view('tiendaonline.resumen_compra', compact('productos', 'carrito', 'total'));
    }
}
