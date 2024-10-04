@extends('layouts.app')

@section('title', 'Gestión de Entregas')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-secondary text-white">
                    <h4 class="card-title mb-0">DASHBOARD DE VENTAS</h4>
                </div>
                <div class="card-body">
                    <h5>Ventas Mensuales</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Mes</th>
                                <th>Total Ventas</th>
                                <th>Ingresos Totales</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ventasMensuales as $venta)
                                <tr>
                                    <td>{{ date('F', mktime(0, 0, 0, $venta->mes, 1)) }}</td>
                                    <td>{{ $venta->total_ventas }}</td>
                                    <td>${{ number_format($venta->total_ventas_mes, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <h5>Total Ventas del Año: ${{ number_format($totalAnual, 2) }}</h5>
                    <h5>Tiempo de Respuesta Promedio: {{ optional($comprasConRespuesta)->tiempo_respuesta ?? 'N/A' }} días</h5>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header bg-secondary text-white">
                    <h4 class="card-title mb-0">MÓDULO GESTIÓN DE ENTREGAS</h4>
                </div>
                <div class="card-body">
                    <p class="card-description">Administre las entregas de los productos</p>

                    <!-- Listado de entregas -->
                    <table class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre Cliente</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                                <th>Documento</th>
                                <th>Nombre Producto</th>
                                <th>Cantidad</th>
                                <th>Valor Producto</th>
                                <th>Estado</th>
                                <th>Fecha de Creación</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $contador = 1; // Inicializamos el contador
                            @endphp
                            @foreach ($compras as $compra)
                                <tr>
                                    <td>{{ $contador++ }}</td> <!-- ID consecutivo -->
                                    <td>{{ $compra->cliente->nombre }}</td>
                                    <td>{{ $compra->cliente->email }}</td>
                                    <td>{{ $compra->cliente->telefono }}</td>
                                    <td>{{ $compra->cliente->documento }}</td>
                                    <td>{{ $compra->nombre_producto }}</td>
                                    <td>{{ $compra->cantidad_productos }}</td>
                                    <td>{{ $compra->valor_producto }}</td>
                                    <td class="{{ $compra->estado_entrega == 'entregado' ? 'bg-success text-white' : 'bg-danger text-white' }}">
                                        {{ ucfirst($compra->estado_entrega) }}
                                    </td>
                                    <td>{{ $compra->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <!-- Botón de editar estado -->
                                        <a href="{{ route('entregas.editar', $compra->id) }}" class="btn btn-warning btn-sm">Editar Estado</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
