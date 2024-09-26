<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Página Principal')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <!-- Navbar completa y centrada con container-fluid -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light w-100">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}">Tienda Online</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('productos') }}">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('carrito') }}">Carrito</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('factura') }}">Factura</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ingresarProducto') }}">Ingresar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('gestionProducto') }}">Gestionar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Contenedor principal que ocupa todo el ancho y tiene un fondo claro -->
    <div class="container-fluid" style="background-color: #eef2f5; min-height: 100vh; padding: 40px;">
        @yield('content')
    </div>

    <!-- Pie de página -->
    <footer class="bg-light text-center py-3">
        <p>© 2024 Tienda Online</p>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
