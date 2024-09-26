@extends('layouts.app')

@section('title', 'Edición de Producto')

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-secondary text-white">
                    <h4 class="card-title mb-0">Editar Producto</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('edicionproductos.actualizar', $producto->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Nombre del producto -->
                        <div class="form-group">
                            <label for="nombre_producto">Nombre del Producto</label>
                            <input type="text" class="form-control" name="nombre_producto" id="nombre_producto" value="{{ old('nombre_producto', $producto->nombre_producto) }}" required>
                            @error('nombre_producto')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Referencia del Producto -->
                        <div class="form-group">
                            <label for="referencia">Referencia del Producto</label>
                            <input type="text" class="form-control" name="referencia" id="referencia" value="{{ old('referencia', $producto->referencia) }}" required>
                            @error('referencia')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Descripción del Producto -->
                        <div class="form-group">
                            <label for="descripcion_de_producto">Descripción del Producto</label>
                            <textarea class="form-control" name="descripcion_de_producto" id="descripcion_de_producto">{{ old('descripcion_de_producto', $producto->descripcion_de_producto) }}</textarea>
                        </div>

                        <!-- Categoría del Producto -->
                        <div class="form-group">
                            <label for="id_categoria">Categoría</label>
                            <select class="form-control" name="id_categoria" id="id_categoria" required>
                                <option value="1" {{ old('id_categoria', $producto->id_categoria) == 1 ? 'selected' : '' }}>Colecciones</option>
                                <option value="2" {{ old('id_categoria', $producto->id_categoria) == 2 ? 'selected' : '' }}>Cartillas y Diccionarios</option>
                                <option value="3" {{ old('id_categoria', $producto->id_categoria) == 3 ? 'selected' : '' }}>Boletines</option>
                                <option value="4" {{ old('id_categoria', $producto->id_categoria) == 4 ? 'selected' : '' }}>Códigos-Régimenes-Estatutos</option>
                            </select>
                        </div>

                        <!-- Precios -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="valor_unitario_mes">Precio a 1 mes</label>
                                    <input type="text" class="form-control" name="valor_unitario_mes" id="valor_unitario_mes" value="{{ old('valor_unitario_mes', $producto->valor_unitario_mes) }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="valor_seis_meses">Precio a 6 meses</label>
                                    <input type="text" class="form-control" name="valor_seis_meses" id="valor_seis_meses" value="{{ old('valor_seis_meses', $producto->valor_seis_meses) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="valor_doce_meses">Precio a 12 meses</label>
                                    <input type="text" class="form-control" name="valor_doce_meses" id="valor_doce_meses" value="{{ old('valor_doce_meses', $producto->valor_doce_meses) }}">
                                </div>
                            </div>
                        </div>

                        <!-- Imagen -->
                        <div class="form-group">
                            <label for="imagen">Imagen del Producto</label>
                            <input type="file" class="form-control" name="imagen" id="imagen">
                            @if($producto->imagen)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $producto->imagen) }}" alt="Imagen del Producto" class="img-thumbnail" style="max-width: 200px;">
                                </div>
                            @endif
                            @error('imagen')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Estado del producto -->
                        <div class="form-group">
                            <label for="estado_producto">Estado del Producto</label>
                            <select class="form-control" name="estado_producto" id="estado_producto" required>
                                <option value="Activo" {{ old('estado_producto', $producto->estado_producto) == 'Activo' ? 'selected' : '' }}>Activo</option>
                                <option value="Inactivo" {{ old('estado_producto', $producto->estado_producto) == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                            </select>
                        </div>

                        <!-- Botones -->
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Actualizar Producto</button>
                            <a href="{{ route('productos') }}" class="btn btn-secondary">Volver a la lista</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
