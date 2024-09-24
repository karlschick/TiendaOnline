@extends('layouts.app')

@section('title', 'Productos')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @include('tiendaonline.slider')
    <p></P>

    <h1>Página de ventas</h1>
    <section class="px-sm-0 pb-sm-4 pt-sm-0 py-2">
        <div class="main-panel">
            <div class="container-fluid">
                <div class="content-wrapper">
                    <!-- menu lateral -->
                    <div class="row">
                        <div class="col-sm-3 px-3 mb-sm-0 mb-4">
                            <!-- Sidebar con el selector de categorías -->
                            <div class="col-12 px-0 bloques-home bg-lightgray">
                                <div class="row mx-0">
                                    <div class="col-12 mx-0 bloque-sidebar bg-grayblue">
                                        <div class="datos-resultado  text-center">Tienda</div>
                                    </div>

                                    <div class="col-10 mx-0 bloque-sidebar d-none d-sm-block">
                                        <h3>Secciones</h3>
                                        <form action="{{ route('productos.por.categoria') }}" method="GET">
                                            <div class="form-group mb-0">
                                                <select class="form-control" name="categorias">
                                                    @foreach ($categorias as $categoria)
                                                        <option value="{{ $categoria->id }}"
                                                            @if ($categoria->id == old('categorias')) selected @endif>
                                                            {{ $categoria->nombre_categoria }}
                                                        </option>
                                                    @endforeach
                                                </select><br>
                                                <input type="submit" class="form-control" value="Buscar"
                                                    style="background-color:#f99100;color:white;">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>






                        <div class="col-sm-9">
                            <div class="row">
                                <!-- Listado de productos -->
                                @foreach ($productos as $producto)
                                    <div class="col-md-3 mb-0">
                                        <a href="#" data-toggle="modal" data-target="#productModal{{ $producto->id }}" style="color:black;">
                                            <div class="card border-dark mb-3 h-100">
                                                <div class="card-body d-flex flex-column">
                                                    <h4 class="card-title">{{ $producto->nombre_producto }}</h4>
                                                    @if ($producto->nombre_producto == 'Códigos-Régimenes-Estatutos')
                                                        <div class="text-center mt-auto">
                                                            <span class="fas fa-fw fa-balance-scale"
                                                                aria-hidden="true"></span>
                                                        </div>
                                                    @endif
                                                </div>

                                                <!-- Contenedor para centrar la imagen -->
                                                <div class="d-flex justify-content-center" style="padding: 10px;">
                                                    <img src="{{ $producto->imagen ? asset('storage/' . $producto->imagen) : asset('images/libros_vent.png') }}"
                                                    class="card-img-top" alt="Logo del producto"
                                                    style="height: 90px; object-fit: contain; margin: 10px;">
                                               
                                                </div>

                                                <div class="card-header mt-auto"
                                                    style="background-color: #193e66; color: white;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <!-- Mostrar precio del producto según la duración -->
                                                            @if ($producto->valor_unitario_mes == '0' && $producto->valor_seis_meses == '0')
                                                                ${{ $producto->valor_doce_meses }}
                                                            @else
                                                                ${{ $producto->valor_unitario_mes }}
                                                            @endif
                                                        </div>
                                                        <div class="col-md-6">Valor 1 Mes c/u</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
