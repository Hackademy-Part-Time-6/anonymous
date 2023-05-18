<x-layout>
    <x-slot name='title'>Acerca de</x-slot>
  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{asset('image/img_chica.jpg')}}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{asset('image/img_nike_bambas.jpg')}}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{asset('image/img_reloj.jpg')}}" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="container marketing mt-5">

    <!-- Three columns of text below the carousel -->   
    <div class="row">
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

        <h4>Garantía de originalidad</h4>
        <p>Encuentra productos únicos y especiales.</p>
       
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

        <h4>Pago seguro</h4>
        <p>Aceptamos pago con tarjeta de crédito y Paypal.</p>
      
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

        <h4>Te lo llevamos a casa</h4>
        <p>No te preocupes por la distancia, te lo llevamos.</p>
      
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider mt-5">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Descubre<span class="text-muted"> tu estilo favortio</span></h2>
        <p class="lead">Tenemos alcance en toda España</p>
      </div>
      <div class="col-md-5">
        <img src="{{asset('image/imagen_21.jpg')}}" class="d-block w-100" alt="...">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Más de 1000<span class="text-muted"> marcas de lujo.</span></h2>
        <p class="lead">Todas las marcas de lujo en un solo portal</p>
      </div>
      <div class="col-md-5 order-md-1">
        <img src="{{asset('image/imagen_22.jpg')}}" class="d-block w-100" alt="...">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Una comunidad <span class="text-muted"> mundial.</span></h2>
        <p class="lead">Tenemos usuario en todo el mundo, disfruta un servicio express</p>
      </div>
      <div class="col-md-5">
        <img src="{{asset('image/imagen_23.jpg')}}" class="d-block w-100" alt="...">
      </div>
    </div>

    <hr class="featurette-divider mb-5">

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->
</x-layout>