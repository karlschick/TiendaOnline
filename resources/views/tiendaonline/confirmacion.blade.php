@extends('layouts.app')

@section('title', 'Confirmación de Pago')

@section('content')
    <h1>CONFIRMACION DE PAGO</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <p>Tu pago ha sido procesado exitosamente. Gracias por tu compra.</p>

    <!-- Botón para regresar a productos -->
    <a href="{{ route('productos.index') }}" class="btn btn-primary">Regresar a la Tienda</a>
@endsection
