@extends('layouts.app')

@section('content')
<div class="container my-4">
    <h2 class="text-center mb-4">Datos del cliente para la Compra</h2>

    <h5 class="text-center mb-4">Resumen de la Compra</h5>
    <table class="table table-striped">
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
                <td>{{ $producto['nombre_producto'] }}</td>
                <td>{{ $producto['cantidad'] }}</td>
                <td>${{ number_format($producto['precio'], 2) }} COP</td>
                <td>${{ number_format($producto['precio'] * $producto['cantidad'], 2) }} COP</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" class="text-end"><strong>Total:</strong></td>
                <td><strong>${{ number_format($total, 2) }} COP</strong></td>
            </tr>
        </tfoot>
    </table>

    <form action="{{ route('comprar') }}" method="POST">
        @csrf

        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Información Personal</h5>

                <!-- Nombre Completo -->
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre Completo</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu nombre completo" required>
                </div>

                <!-- Correo Electrónico -->
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="ejemplo@correo.com" required>
                </div>

                <!-- Teléfono -->
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingresa tu número de teléfono" required>
                </div>

                <!-- Documento o NIT -->
                <div class="mb-3">
                    <label for="documento" class="form-label">Documento o NIT</label>
                    <input type="text" class="form-control" id="documento" name="documento" placeholder="Ingresa tu documento o NIT" required>
                </div>

                <div class="text-center">
                    <!-- Botón de Envío -->
                    <button type="submit" class="btn btn-primary">Realizar Compra</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
