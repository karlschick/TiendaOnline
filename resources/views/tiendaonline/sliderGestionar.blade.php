@extends('layouts.app')

@section('title', 'Gestión del Slider')

@section('content')
    <div class="container">
        <h1 class="mt-4">Gestión del Slider</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Aviso sobre las imágenes -->
        <div class="alert alert-info">
            <strong>Aviso:</strong> Se recomienda que las imágenes tengan un tamaño de <strong>1900 x 550 píxeles</strong> (aproximadamente <strong>50.8 x 14.0 cm</strong>).
        </div>

        <!-- Formulario para Agregar una Nueva Imagen -->
        <form action="{{ route('sliderguardar') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="image_path">Imagen:</label>
                <input type="file" class="form-control" name="image_path" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Imagen</button>
        </form>

        <hr>

        <h2 class="mt-4">Imágenes del Slider</h2>
        <div class="row">
            @if($sliders->isEmpty())
                <div class="col-md-12">
                    <img src="{{ asset('images/estandar.gif') }}" class="img-fluid" alt="Imagen estándar">
                    <p>No hay imágenes en el slider. Puedes agregar una nueva imagen.</p>
                </div>
            @else
                @foreach($sliders as $slider)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="{{ $slider->image_path ? asset('storage/' . $slider->image_path) : asset('images/estandar.gif') }}" class="card-img-top" alt="Slider Image">

                            <div class="card-body">
                                <!-- Formulario para Borrar Imagen -->
                                <form action="{{ route('sliderborrar', $slider->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Borrar</button>
                                </form>
                                <!-- Botón para Editar Imagen -->
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $slider->id }}">
                                    Editar
                                </button>

                                <!-- Modal para Editar Imagen -->
                                <div class="modal fade" id="editModal{{ $slider->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $slider->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel{{ $slider->id }}">Editar Imagen</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('slideractualizar', $slider->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="image_path">Nueva Imagen:</label>
                                                        <input type="file" class="form-control" name="image_path">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
