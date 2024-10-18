@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Pasarela de Pago</h1>
    <p>Por favor, revisa los detalles de tu compra antes de proceder al pago:</p>

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

    <form action="{{ route('payment.process') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success">Proceder al Pago</button>
    </form>

    @if(session('error'))
        <div class="alert alert-danger mt-3">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
</div>
@endsection
