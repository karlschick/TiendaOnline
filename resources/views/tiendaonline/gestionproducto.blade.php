@extends('layouts.app')

@section('title', 'Gestión de Productos')

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
                    <h4 class="card-title mb-0">MÓDULO GESTIÓN DE PRODUCTOS</h4>
                </div>
                <div class="card-body">
                    <p class="card-description">Administre los productos de la tienda</p>

                    <!-- Listado de productos -->
                    <table class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Referencia</th>
                                <th>Descripción del producto</th>
                                <th>Categoría</th>
                                <th>Precio (1 mes)</th>
                                <th>Precio (6 meses)</th>
                                <th>Precio (12 meses)</th>
                                <th>Estado</th>
                                <th>Imagen</th>
                                <th>Fecha de Creación</th>
                                <th>Fecha de Actualización</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $contador = 1; // Inicializamos el contador
                            @endphp
                            @foreach ($productos as $producto)
                                <tr>
                                    <td>{{ $contador++ }}</td> <!-- ID consecutivo -->
                                    <td>{{ $producto->nombre_producto }}</td>
                                    <td>{{ $producto->referencia }}</td>
                                    <td>{{ $producto->descripcion_de_producto }}</td>
                                    <td>
                                        @switch($producto->id_categoria)
                                            @case(1)
                                                Colecciones
                                            @break
                                            @case(2)
                                                Cartillas y Diccionarios
                                            @break
                                            @case(3)
                                                Boletines
                                            @break
                                            @case(4)
                                                Códigos-Régimenes-Estatutos
                                            @break
                                            @default
                                                Categoría no definida
                                        @endswitch
                                    </td>
                                    <td>{{ $producto->valor_unitario_mes }}</td>
                                    <td>{{ $producto->valor_seis_meses }}</td>
                                    <td>{{ $producto->valor_doce_meses }}</td>
                                    <td class="{{ $producto->estado_producto == 'Activo' ? 'bg-success text-white' : 'bg-warning' }}">
                                        {{ $producto->estado_producto }}
                                    </td>
                                    <td>
                                        @if ($producto->imagen)
                                            <div class="text-center">
                                                <img src="{{ asset('storage/' . $producto->imagen) }}"
                                                    alt="Imagen del producto" class="img-fluid"
                                                    style="height: 70px; object-fit: contain;">
                                            </div>
                                        @else
                                            <div class="text-center">
                                                <img src="{{ asset('images/libros_vent.png') }}" alt="Imagen estándar"
                                                    class="img-fluid" style="height: 70px; object-fit: contain;">
                                            </div>
                                        @endif
                                    </td>
                                    <td>{{ $producto->created_at->format('d/m/Y H:i') }}</td>
                                    <td>{{ $producto->updated_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <!-- Botón de editar -->
                                        <a href="{{ route('productos.editar', $producto->id) }}"
                                            class="btn btn-warning btn-sm">Editar</a>
                                        <!-- Formulario de eliminar -->
                                        <form action="{{ route('productos.eliminar', $producto->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</button>
                                        </form>
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
