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
      width: 100%; /* Ajusta el ancho del carrusel según tus necesidades */
      margin: auto; /* Centra el carrusel horizontalmente */
    }

    .carousel-inner {
      height: 400px; /* Ajusta la altura del contenedor del carrusel */
      overflow: hidden; /* Asegura que las imágenes no se desborden del contenedor */
    }

    .carousel-item {
      height: 100%; /* Asegura que el item ocupe el 100% de la altura del contenedor del carrusel */
    }

    .carousel-inner .carousel-item img {
      height: 100%; /* Ajusta la altura de las imágenes */
      width: 100%; /* Ajusta el ancho de las imágenes */
      object-fit: auto; /* Asegura que la imagen cubra el contenedor */
    }
  </style>
</head>
<body>

  <!-- Carousel Code -->
  <div id="slider" class="carousel slide sliderCat" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#slider" data-slide-to="0" class="active"></li>
      <li data-target="#slider" data-slide-to="1"></li>
      <li data-target="#slider" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <img src="/images/vista3.gif" class="d-block w-100 slide_img imageSlider" alt="slide1">
        </div>
        <div class="carousel-item">
          <img src="/images/vista2.gif" class="d-block w-100 slide_img imageSlider" alt="slide2">
        </div>
        <div class="carousel-item">
          <img src="/images/vista1.gif" class="d-block w-100 slide_img imageSlider" alt="slide3">
        </div>
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

