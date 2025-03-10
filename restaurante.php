<?php

session_start();


if (!isset($_SESSION['usuario'])) {
    
    $link = 'inicio.php'; 
} else {
    
    if ($_SESSION['usuario'] == 'admin') {
        
        $link = 'admin.php';
    } else {
        
        $link = 'citas.html';
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="estilo1.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
  <header class="fixed-top bg-white"><!--Comienzo del header-->

    <nav class="navbar">
      <div class="container d-flex">

        <a class="navbar-brand d-flex align-items-center" href="restaurante.html"><!--El logo de la página web-->
          <i class="fas fa-utensils text-primary me-2"></i>
          <span class="fw-bold font-serif">La Delicia</span>
        </a>





        <div class="row mt-4"><!--La navegación de la página web-->

          <ul class="d-flex flex-wrap justify-content-center align-items-center gap-5">
            <li class="nav-item"><a href="#">Menú</a></h4>
            <li class="nav-item"><a href="#">Nosotros</a></h4>
            <li class="nav-item"><a href="#">Contacto</a></h4>
            <?php  
            
            if(!isset($_SESSION['usuario'])){

            
            ?>
              <button type="button" class="nav-item ms-3 btn btn-primary rounded-pill bg-white">
                <i class="fas fa-user text-primary me-2"></i>
                <a href="inicio.html">Iniciar Sesión</a></button>
              <button type="button" class="nav-item ms-2 btn btn-primary rounded-pill"><a href="registro.html" class="text-light">Registrarse</a></button>
            <?php 
            } 
          ?>
          </ul>
        </div>

      </div>

    </nav>
  </header><!--Fin del header-->
  <main>
    <div id="carouselExampleDark" class="carousel carousel-dark slide">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="10000">
          <img src="car1.jpg" class="img-fluid w-100" alt="..." style="height: 800px; width: 100px;">
          <div class="carousel-caption d-none d-md-block">
            <h5 class="font-serif fw-bold text-light display-4">Sabores Mediterráneos</h5>
            <p class="fs-5 font-serif  text-light">Descubre nuestra selección de platos tradicionales elaborados con los
              mejores ingredientes</p>
              <button type="button" class="rounded-pill btn btn-primary p-2 px-5 "><a 
              class="text-light" href="<?php echo $link; ?>">Reserva ahora</a></button>
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="2000">
          <img src="car2.jpg" class="d-block w-100 img-fluid" alt="..." style="height: 800px;">
          <div class="carousel-caption d-none d-md-block">
            <h5 class="font-serif fw-bold text-light display-4">Second slide label</h5>
            <p class="fs-5 font-serif  text-light">Some representative placeholder content for the second slide.</p>
            <button type="button" class="rounded-pill btn btn-primary p-2 px-5 "><a 
           class="text-light" href="<?php echo $link; ?>">Reserva ahora</a></button>
          </div>
        </div>
        <div class="carousel-item">
          <img src="car4.jpg" class="d-block w-100 img-fluid" alt="..." style="height: 800px;">
          <div class="carousel-caption d-none d-md-block">
            <h5 class="font-serif fw-bold text-light display-4">Third slide label</h5>
            <p class="fs-5 font-serif  text-light">Some representative placeholder content for the third slide.</p>
            <button type="button" class="rounded-pill btn btn-primary p-2 px-5 "><a 
           class="text-light" href="<?php echo $link; ?>">Reserva ahora</a></button>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <section>
      <div class="container p-5">
        
        <div class="row text-center">
          <h1>Bienvenidos a La delicia</h1>
          <p class="lead text-muted mx-auto">Disfruta de la auténtica cocina mediterránea en un ambiente acogedor.
            Reserva tu <br>mesa ahora y vive una
            experiencia gastronómica inolvidable.</p>
        </div>
      </div>
      <div class="container mt-5">
        
        <div class="row d-flex">

          <div class="col-sm-4 mb-3 mb-sm-0">
            <div class="card">
              <div class="card-body text-center">
                <i class=" display-5 text-primary fas fa-utensils"></i>
                <h5 class="card-title display-5 font-serif fw-bold">Cocina Exquisita</h5>
                <p class="card-text fs-5">Nuestros chefs preparan platos con los ingredientes más frescos y de la mejor
                  calidad.</p>

              </div>
            </div>
          </div>

          <div class="col-sm-4 mb-3 mb-sm-0">
            <div class="card">
              <div class="card-body text-center">
                <i class=" display-5 text-primary fas fa-clock"></i>
                <h5 class="card-title display-5 font-serif fw-bold">Ambiente acogedor</h5>
                <p class="card-text fs-5">Un espacio diseñado para que disfrutes de momentos especiales con tus seres
                  queridos.</p>

              </div>
            </div>
          </div>
          <div class="col-sm-4 mb-3 mb-sm-0">
            <div class="card">
              <div class="card-body text-center">
                <i class=" display-5 text-primary fas fa-map-marker-alt"></i>
                <h5 class="card-title display-5 font-serif fw-bold">Cocina Exquisita</h5>
                <p class="card-text fs-5">Reserva tu mesa en minutos a través de nuestro sistema online.</p>

              </div>
            </div>
          </div>
        </div>
        <div class="text-center mb-5 menu">
          <h2 class="display-5 font-serif fw-bold mb-3">Nuestro Menú</h2>
          <div class="divider-custom"></div>
          <p class="lead text-muted mx-auto" style="max-width: 700px;">
              Descubre nuestra selección de platos mediterráneos, preparados con ingredientes frescos y de la
              mejor calidad.
          </p>
      </div>
        <div class="row g-4">
          <div class="col-md-6">
              <div class="card border-0 shadow-sm hover-card">
                  <div class="card-body d-flex p-3">
                      <div class="flex-shrink-0 me-3">
                          <img src="paella.jpg" alt="Paella" class="rounded-3" width="100"
                              height="100">
                      </div>
                      <div>
                          <div class="d-flex justify-content-between align-items-center mb-2">
                              <h3 class="h5 font-serif mb-0">Paella Valenciana</h3>
                              <span class="text-primary fw-bold">€18.90</span>
                          </div>
                          <p class="text-muted small mb-0">Arroz, azafrán, pollo, conejo, judías verdes,
                              garrofón y pimentón.</p>
                      </div>
                  </div>
              </div>
          </div>
          
          <div class="col-md-6">
              <div class="card border-0 shadow-sm hover-card">
                  <div class="card-body d-flex p-3">
                      <div class="flex-shrink-0 me-3">
                          <img src="risoto.jpg" alt="Risotto" class="rounded-3" width="100"
                              height="100">
                      </div>
                      <div>
                          <div class="d-flex justify-content-between align-items-center mb-2">
                              <h3 class="h5 font-serif mb-0">Risotto de Setas</h3>
                              <span class="text-primary fw-bold">€16.50</span>
                          </div>
                          <p class="text-muted small mb-0">Arroz arborio, setas variadas, cebolla, vino blanco
                              y queso parmesano.</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-6">
              <div class="card border-0 shadow-sm hover-card">
                  <div class="card-body d-flex p-3">
                      <div class="flex-shrink-0 me-3">
                          <img src="pasta.webp" alt="Pasta" class="rounded-3" width="100"
                              height="100">
                      </div>
                      <div>
                          <div class="d-flex justify-content-between align-items-center mb-2">
                              <h3 class="h5 font-serif mb-0">Pasta al Pesto</h3>
                              <span class="text-primary fw-bold">€14.90</span>
                          </div>
                          <p class="text-muted small mb-0">Pasta fresca, albahaca, piñones, ajo, queso
                              parmesano y aceite de oliva.</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-6">
              <div class="card border-0 shadow-sm hover-card">
                  <div class="card-body d-flex p-3">
                      <div class="flex-shrink-0 me-3">
                          <img src="dorada.jpg" alt="Pescado" class="rounded-3" width="100"
                              height="100">
                      </div>
                      <div>
                          <div class="d-flex justify-content-between align-items-center mb-2">
                              <h3 class="h5 font-serif mb-0">Dorada a la Sal</h3>
                              <span class="text-primary fw-bold">€22.50</span>
                          </div>
                          <p class="text-muted small mb-0">Dorada fresca, sal marina, hierbas aromáticas y
                              aceite de oliva virgen extra.</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </section>
    <footer class="bg-dark text-white">

      <div class="container py-4">
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="d-flex align-items-center mb-3">
                    <i class="fas fa-utensils text-primary me-2"></i>
                    <span class="h4 font-serif mb-0">La Delicia</span>
                </div>
                <p class="text-white">El mejor restaurante mediterráneo de la ciudad.</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="font-serif mb-3">Horario</h5>
                <ul class="list-unstyled text-muted">
                    <li class="d-flex justify-content-between mb-2 text-white">
                        <span>Lunes - Jueves:</span>
                        <span>12:00 - 23:00</span>
                    </li>
                    <li class="d-flex justify-content-between mb-2 text-white">
                        <span>Viernes - Sábado:</span>
                        <span>12:00 - 00:00</span>
                    </li>
                    <li class="d-flex justify-content-between mb-2 text-white">
                        <span>Domingo:</span>
                        <span>12:00 - 22:00</span>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="font-serif mb-3">Contacto</h5>
                <ul class="list-unstyled text-muted">
                    <li class="d-flex align-items-center mb-2">
                        <i class="fas fa-map-marker-alt text-primary me-2"></i>
                        <span class="text-white">Calle Principal 123, Ciudad</span>
                    </li>
                    <li class="d-flex align-items-center mb-2">
                        <i class="fas fa-phone text-primary me-2"></i>
                        <span class="text-white">+34 123 456 789</span>
                    </li>
                    <li class="d-flex align-items-center mb-2">
                        <i class="fas fa-envelope text-primary me-2"></i>
                        <span class="text-white">info@ladelicia.com</span>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="font-serif mb-3">Síguenos</h5>
                <div class="d-flex gap-2">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-tripadvisor"></i>
                    </a>
                </div>
            </div>
        </div>
        
    </div>
    </footer>





  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
    
</body>

</html>