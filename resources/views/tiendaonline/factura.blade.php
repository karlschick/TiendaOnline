@extends('layouts.app')

@section('title', 'Generación de Factura')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-secondary text-white">
                    <h4 class="card-title mb-0">MÓDULO DE FACTURACIÓN</h4>
                </div>
                <div class="card-body">
                    <p class="card-description">Listado de clientes y ventas</p>

                    <!-- Listado de facturas -->
                    <table class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID Cliente</th>
                                <th>Nombre Cliente</th>
                                <th>Email</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Valor Total</th>
                                <th>Fecha de Compra</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($compras as $compra)
                                <tr>
                                    <td>{{ $compra->cliente->id }}</td>
                                    <td>{{ $compra->cliente->nombre }}</td>
                                    <td>{{ $compra->cliente->email }}</td>
                                    <td>{{ $compra->nombre_producto }}</td>
                                    <td>{{ $compra->cantidad_productos }}</td>
                                    <td>{{ $compra->valor_producto }}</td>
                                    <td>{{ $compra->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <a href="{{ route('factura.generar', $compra->id) }}" class="btn btn-primary btn-sm">Generar Factura</a>
                                    </td
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
