@extends('layouts.app')

@section('title', 'Resumen de Compra')

@section('content')
    <h1>RESUMEN DE SU COMPRA</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td>{{ $producto->nombre_producto }}</td>
                    <td>{{ $carrito[$producto->id]['cantidad'] }}</td>
                    <td>${{ $producto->valor_unitario_mes }} COP</td>
                    <td>${{ $producto->valor_unitario_mes * $carrito[$producto->id]['cantidad'] }} COP</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3"><strong>Total a pagar:</strong></td>
                <td><strong>${{ $total }} COP</strong></td>
            </tr>
        </tfoot>
    </table>

    <form action="#" method="POST">
        @csrf
        <button type="submit" class="btn btn-success">Confirmar Pago</button>
    </form>
@endsection
