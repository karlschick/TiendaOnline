<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compra;
use App\Cliente;

class CompraController extends Controller
{
    public function agregarAlCarrito(Request $request)
    {
        $productos = $request->input('productos');
        $carrito = $request->session()->get('carrito', []);
        $total = 0;

        foreach ($productos as $producto) {
            $id = $producto['id'];
            $cantidad = $producto['cantidad'];

            if (isset($carrito[$id])) {
                $carrito[$id]['cantidad'] += $cantidad;
            } else {
                $carrito[$id] = [
                    'nombre_producto' => $producto['nombre_producto'],
                    'precio' => $producto['precio'],
                    'cantidad' => $cantidad,
                ];
            }

            $total += $carrito[$id]['precio'] * $carrito[$id]['cantidad'];
        }

        $request->session()->put('carrito', $carrito);
        $request->session()->put('total', $total);

        return redirect()->route('carrito.index');
    }

    public function comprar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'required|string|max:50',
            'documento' => 'required|string|max:50',
        ]);

        // Guardar los datos del cliente en la sesión
        $request->session()->put('cliente_nombre', $request->input('nombre'));
        $request->session()->put('cliente_email', $request->input('email'));
        $request->session()->put('cliente_telefono', $request->input('telefono'));
        $request->session()->put('cliente_documento', $request->input('documento'));

        // Obtener el carrito para contar la cantidad de productos
        $carrito = $request->session()->get('carrito', []);
        
        // Inicializa el total
        $total = 0;

        // Calcular el total
        foreach ($carrito as $producto) {
            $total += $producto['precio'] * $producto['cantidad'];
        }

        // Guardar el total en la sesión
        $request->session()->put('total', $total);

        // Redirigir a la pasarela de pago
        return redirect()->route('payment.form'); // Cambia 'pasarela_pago' a 'payment.form'
    }
    

    public function pasarelaPago(Request $request)
    {
        // Obtener el total desde la sesión
        $total = $request->session()->get('total', 0);
        
        // Mostrar la pasarela de pago con el total
        return view('tiendaonline.pasarela_pago', compact('total'));
    }

    public function confirmarPago(Request $request)
{
    $carrito = $request->session()->get('carrito', []);
    $total = 0;
    $nombres_productos = [];
    $cantidad_total_productos = 0;

    foreach ($carrito as $producto) {
        $nombres_productos[] = $producto['nombre_producto'];
        $total += $producto['precio'] * $producto['cantidad'];
        $cantidad_total_productos += $producto['cantidad'];
    }

    // Comparar el total calculado con el total almacenado en la sesión
    $total_sesion = $request->session()->get('total', 0);
    if ($total !== $total_sesion) {
        return redirect()->route('productos.index')->withErrors(['error' => 'El total de la compra no coincide.']);
    }

    if ($total <= 0) {
        return redirect()->route('productos.index')->withErrors(['error' => 'El total de la compra no se ha calculado correctamente.']);
    }

    $cliente_id = $this->obtenerClienteId($request->session()->get('cliente_email'));

    if (!$cliente_id) {
        $cliente = new Cliente();
        $cliente->nombre = $request->session()->get('cliente_nombre');
        $cliente->email = $request->session()->get('cliente_email');
        $cliente->telefono = $request->session()->get('cliente_telefono');
        $cliente->documento = $request->session()->get('cliente_documento');
        $cliente->save();
        $cliente_id = $cliente->id;
    }

    // Guardar cada producto por separado
    foreach ($carrito as $producto) {
        $compra = new Compra();
        $compra->cliente_id = $cliente_id;
        $compra->nombre_producto = $producto['nombre_producto']; // Guardar el nombre del producto
        $compra->valor_producto = $producto['precio']; // Guardar el precio del producto
        $compra->estado_entrega = 'no entregado';
        $compra->cantidad_productos = $producto['cantidad']; // Guardar la cantidad del producto
        $compra->save();
    }

    // Limpiar los datos de la sesión
    $request->session()->forget(['carrito', 'total', 'cliente_nombre', 'cliente_email', 'cliente_telefono', 'cliente_documento', 'producto_nombre', 'producto_cantidad']);

    return view('tiendaonline.confirmacion')->with('success', 'Compra realizada con éxito.');
}

    private function obtenerClienteId($email)
    {
        $cliente = Cliente::where('email', $email)->first();
        return $cliente ? $cliente->id : null;
    }

    public function formulario(Request $request)
    {
        // Recupera el carrito de compras desde la sesión
        $carrito = $request->session()->get('carrito', []);

        // Inicializa el total en cero
        $total = 0;

        // Crea un array para almacenar los productos
        $productos = [];

        // Recorre el carrito y calcula el total
        foreach ($carrito as $producto) {
            $productos[] = $producto; // Añade el producto al array
            $total += $producto['precio'] * $producto['cantidad']; // Calcula el total
        }

        // Pasa los productos y el total a la vista
        return view('tiendaonline.formulario_compra', compact('productos', 'total'));
    }
}
