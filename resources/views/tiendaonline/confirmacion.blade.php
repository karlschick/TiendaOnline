@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Confirmación de Pago</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="text-center">
        <a href="{{ route('productos') }}" class="btn btn-primary">Volver a la tienda</a>
    </div>
</div>
@endsection