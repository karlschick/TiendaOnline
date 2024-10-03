@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Pasarela de Pago</h1>
    <p>Por favor, completa tu pago utilizando los siguientes detalles:</p>

    <table class="table">
        <tr>
            <th>Nombre del Cliente</th>
            <td>{{ session('cliente_nombre') }}</td>
        </tr>
        <tr>
            <th>Correo Electrónico</th>
            <td>{{ session('cliente_email') }}</td>
        </tr>
        <tr>
            <th>Teléfono</th>
            <td>{{ session('cliente_telefono') }}</td>
        </tr>
        <tr>
            <th>Documento</th>
            <td>{{ session('cliente_documento') }}</td>
        </tr>
        <tr>
            <th>Productos</th>
            <td>
                <ul>
                    @foreach (session('carrito') as $producto)
                        <li>{{ $producto['nombre_producto'] }} - Cantidad: {{ $producto['cantidad'] }}</li>
                    @endforeach
                </ul>
            </td>
        </tr>
        <tr>
            <th>Total a Pagar</th>
            <td>${{ number_format(session('total'), 2) }} COP</td>
        </tr>
    </table>

    <a href="{{ route('confirmacion_pago') }}" class="btn btn-success">Proceder al Pago</a>
</div>
@endsection
