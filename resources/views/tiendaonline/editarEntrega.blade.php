@extends('layouts.app')

@section('title', 'Editar Estado de Entrega')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-secondary text-white">
                    <h4 class="card-title mb-0">EDITAR ESTADO DE ENTREGA</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('entregas.actualizar', $compra->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label for="estado_producto">Estado del Producto</label>
                            <select name="estado_producto" id="estado_producto" class="form-control" required>
                                <option value="entregado" {{ $compra->estado_producto == 'entregado' ? 'selected' : '' }}>Entregado</option>
                                <option value="no entregado" {{ $compra->estado_producto == 'no entregado' ? 'selected' : '' }}>No Entregado</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <a href="{{ route('entregas.index') }}" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
