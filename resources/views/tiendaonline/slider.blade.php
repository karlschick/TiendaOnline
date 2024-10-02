<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SLIDER</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    .carousel {
        width: 100%; /* Ocupa todo el ancho del contenedor */
        margin: 0; /* Eliminar márgenes */
    }
    
    .carousel-inner {
        height: 500px; /* Ajusta esta altura según tus necesidades */
        overflow: hidden; /* Evita el desbordamiento */
    }
    
    .carousel-item {
        height: 100%; /* Mantener la altura del item */
    }
    
    .carousel-inner .carousel-item img {
        height: 100%; /* Asegúrate de que la imagen ocupe el 100% de la altura */
        width: 100%; /* Asegúrate de que la imagen ocupe el 100% del ancho del contenedor */
        object-fit: cover; /* Esto cubre el espacio disponible sin distorsionar la imagen */
        display: block; /* Asegúrate de que la imagen se muestre como un bloque */
        margin: 0 auto; /* Asegúrate de que no haya márgenes alrededor */
    }
  </style>
</head>
<body>

  <!-- Carousel Code -->
  <div id="slider" class="carousel slide sliderCat" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      @foreach($sliders as $index => $slider)
        <li data-target="#slider" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
      @endforeach
    </ol>
  
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      @foreach($sliders as $index => $slider)
        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
          <img src="{{ asset('storage/' . $slider->image_path) }}" class="d-block w-100 slide_img imageSlider" alt="slide{{ $index + 1 }}">
        </div>
      @endforeach
    </div>
  
    <!-- Controls -->
    <a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#slider" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <!-- jQuery and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>
