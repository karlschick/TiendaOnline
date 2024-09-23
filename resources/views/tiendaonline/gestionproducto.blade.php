@extends('layouts.app')

@section('title', 'Gestión de Productos')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">MODULO GESTIÓN DE PRODUCTOS</h4>
                    <p class="card-description">Administre los productos de la tienda</p>

                    <!-- Listado de productos -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th> 
                                <th>Nombre</th>
                                <th>Referencia</th>
                                <th>Descripcion del producto</th>
                                <th>Categoría</th>
                                <th>Precio (1 mes)</th>
                                <th>Precio (6 mes)</th>
                                <th>Precio (12 mes)</th>
                                <th>Estado</th>
                                <th>imagen</th>
                                <th>create</th>
                                <th>update</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $contador = 1; // Inicializamos el contador
                            @endphp
                            @foreach($productos as $producto)
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
                                    <td class="{{ $producto->estado_producto == 'Activo' ? 'bg-success' : 'bg-warning' }}">
                                        {{ $producto->estado_producto }}
                                    </td>
                                    <td>
                                        <!-- Verificamos si existe una imagen para el producto -->
                                        @if ($producto->imagen)
                                            <!-- Si hay imagen, la mostramos -->
                                            <div style="text-align: center;">
                                                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="Imagen del producto" style="height: 70px; object-fit: contain;">
                                            </div>
                                            
                                        @else
                                            <!-- Si no hay imagen, mostramos la imagen estándar -->
                                            <img src="{{ asset('images/libros_vent.png') }}" alt="Imagen estándar" style="height: 70px; object-fit: contain;">
                                        @endif
                                    </td>
                                    <td>{{ $producto->created_at }}</td>
                                    <td>{{ $producto->updated_at }}</td>
                                    <td>
                                        <!-- Botón de editar -->
                                        <a href="{{ route('productos.editar', $producto->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                        <!-- Formulario de eliminar -->
                                        <form action="{{ route('productos.eliminar', $producto->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</button>
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
</div>
@endsection

