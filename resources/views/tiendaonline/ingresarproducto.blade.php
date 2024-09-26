@extends('layouts.app')

@section('title', 'Gestión de Producto')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-secondary text-white">
                    <h4 class="card-title mb-0">Módulo para Ingresar Nuevo Producto</h4>
                </div>
                <div class="card-body">
                    <p class="text-center mb-4">Por favor, ingrese los detalles del nuevo producto a continuación.</p>
                    
                    <div class="col-md-8 mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <form class="forms-sample" action="{{ route('ingresarProducto.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <!-- Nombre del producto -->
                                    <div class="form-group mb-3">
                                        <label for="nombre_producto">Nombre del Producto</label>
                                        <input type="text" class="form-control" name="nombre_producto"
                                            id="nombre_producto" value="{{ old('nombre_producto') }}"
                                            placeholder="Nombre del Producto" required>
                                        @error('nombre_producto')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Referencia del Producto -->
                                    <div class="form-group mb-3">
                                        <label for="referencia">Referencia del Producto</label>
                                        <input type="text" class="form-control" name="referencia" id="referencia"
                                            value="{{ old('referencia') }}" placeholder="Referencia del Producto" required>
                                        @error('referencia')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Descripción del Producto -->
                                    <div class="form-group mb-3">
                                        <label for="descripcion_de_producto">Descripción del Producto</label>
                                        <input type="text" class="form-control" name="descripcion_de_producto"
                                            id="descripcion_de_producto" value="{{ old('descripcion_de_producto') }}"
                                            placeholder="Descripción del Producto">
                                    </div>

                                    <!-- Categoría del Producto -->
                                    <div class="form-group mb-3">
                                        <label for="id_categoria">Categoría</label>
                                        <select class="form-select" name="id_categoria" id="id_categoria" required>
                                            <option value="1" {{ old('id_categoria') == 1 ? 'selected' : '' }}>
                                                Colecciones</option>
                                            <option value="2" {{ old('id_categoria') == 2 ? 'selected' : '' }}>
                                                Cartillas y Diccionarios</option>
                                            <option value="3" {{ old('id_categoria') == 3 ? 'selected' : '' }}>
                                                Boletines</option>
                                            <option value="4" {{ old('id_categoria') == 4 ? 'selected' : '' }}>
                                                Códigos-Régimenes-Estatutos</option>
                                        </select>
                                    </div>

                                    <!-- Valor unitario mes -->
                                    <div class="form-group mb-3">
                                        <label for="valor_unitario_mes">Precio a 1 mes</label>
                                        <input type="text" class="form-control" name="valor_unitario_mes"
                                            id="valor_unitario_mes" value="{{ old('valor_unitario_mes') }}"
                                            placeholder="Precio a 1 mes" required>
                                    </div>

                                    <!-- Valor seis meses -->
                                    <div class="form-group mb-3">
                                        <label for="valor_seis_meses">Precio a 6 meses</label>
                                        <input type="text" class="form-control" name="valor_seis_meses"
                                            id="valor_seis_meses" value="{{ old('valor_seis_meses') }}"
                                            placeholder="Precio a 6 meses">
                                    </div>

                                    <!-- Valor doce meses -->
                                    <div class="form-group mb-3">
                                        <label for="valor_doce_meses">Precio a 12 meses</label>
                                        <input type="text" class="form-control" name="valor_doce_meses"
                                            id="valor_doce_meses" value="{{ old('valor_doce_meses') }}"
                                            placeholder="Precio a 12 meses">
                                    </div>

                                    <!-- Imagen -->
                                    <div class="form-group mb-3">
                                        <label for="imagen">Imagen del Producto</label>
                                        <input type="file" class="form-control" name="imagen" id="imagen"
                                            placeholder="Selecciona una imagen">
                                        @if ($errors->has('imagen'))
                                            <span class="text-danger">
                                                {{ $errors->first('imagen') }}
                                            </span>
                                        @endif
                                    </div>

                                    <!-- Estado del producto -->
                                    <div class="form-group mb-3">
                                        <label for="estado_producto">Estado del Producto</label>
                                        <select class="form-select" name="estado_producto" id="estado_producto" required>
                                            <option value="Activo"
                                                {{ old('estado_producto') == 'Activo' ? 'selected' : '' }}>Activo</option>
                                            <option value="Inactivo"
                                                {{ old('estado_producto') == 'Inactivo' ? 'selected' : '' }}>Inactivo
                                            </option>
                                        </select>
                                    </div>

                                    <!-- Botones -->
                                    <div class="d-flex justify-content-between">
                                        <button type="submit" class="btn btn-primary">Crear Producto</button>
                                        <a href="{{ route('productos') }}" class="btn btn-secondary">Volver a la lista de
                                            productos</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
