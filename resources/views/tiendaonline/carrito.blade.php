@extends('layouts.app')

@section('title', 'Carrito')

@section('content')
    <div class="container my-4">
        <h1 class="text-center mb-4">Gestión de Compras</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (empty($productos) || count($productos) == 0)
            <div class="alert alert-warning text-center">
                <p>No hay productos en tu carrito.</p>
                <a href="{{ route('productos.index') }}" class="btn btn-primary">Regresar a Productos</a>
            </div>
        @else
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Subtotal</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td>{{ $producto->nombre_producto }}</td>
                            <td>{{ $carrito[$producto->id]['cantidad'] }}</td>
                            <td>${{ number_format($carrito[$producto->id]['precio'], 2) }} COP</td>
                            <td>${{ number_format($carrito[$producto->id]['precio'] * $carrito[$producto->id]['cantidad'], 2) }} COP</td>
                            <td>
                                <form action="{{ route('carrito.eliminar', $producto->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot class="table-light">
                    <tr>
                        <td colspan="3"><strong>Total a pagar:</strong></td>
                        <td><strong>${{ number_format($total, 2) }} COP</strong></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>

            <div class="text-center my-4">
                <a href="{{ route('formulario_compra') }}" class="btn btn-success">Realizar Compra</a>
            </div>

            <div class="text-center">
                <a href="{{ route('productos.index') }}" class="btn btn-primary">Regresar a la Tienda</a>
            </div>
        @endif
    </div>
@endsection
