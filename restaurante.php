<?php
session_start();

if (!isset($_SESSION['usuario'])) {
  $link = 'inicio.html';
} else {
  if ($_SESSION['usuario'] == 'admin') {
    $link = 'admin.php';
  } else {
    $link = 'citas.html';
  }
}

if (isset($_COOKIE['idioma'])) {
  $idiomaSeleccionado = $_COOKIE['idioma'];
} else {
  $idiomaSeleccionado = 'es';
}
if ($idiomaSeleccionado == 'es') {
  include 'español.php';
} else {
  include 'ingles.php';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $idioma['titulo']; ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="estilo1.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    /* Estilos adicionales para mejorar la responsividad */
    .navbar-nav {
      width: 100%;
      justify-content: center;
    }
    
    @media (max-width: 991px) {
      .navbar-collapse {
        text-align: center;
      }
      
      .navbar-nav {
        flex-direction: column;
        gap: 1rem !important;
      }
      
      .carousel-caption {
        display: block !important;
        padding: 10px;
        background-color: rgba(0,0,0,0.5);
        border-radius: 5px;
      }
      
      .carousel-caption h5 {
        font-size: 1.5rem !important;
      }
      
      .carousel-caption p {
        font-size: 1rem !important;
      }
    }
    
    .social-icon {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background-color: rgba(255,255,255,0.1);
      color: white;
      text-decoration: none;
      transition: all 0.3s ease;
    }
    
    .social-icon:hover {
      background-color: var(--bs-primary);
      color: white;
    }
    
    .hover-card {
      transition: transform 0.3s ease;
    }
    
    .hover-card:hover {
      transform: translateY(-5px);
    }
  </style>
</head>

<body>
  <!-- Header con navbar responsivo -->
  <header class="fixed-top bg-white">
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="restaurante.html">
          <i class="fas fa-utensils text-primary me-2"></i>
          <span class="fw-bold font-serif">La Delicia</span>
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto gap-4 align-items-center">
            <li class="nav-item"><a href="#menu" class="nav-link" href="#"><?php echo $idioma['menu']; ?></a></li>
            <li class="nav-item"><a href="#contacto" class="nav-link" href="#"><?php echo $idioma['nosotros']; ?></a></li>
           
            <li class="nav-item d-flex align-items-center">
              <a href="idioma.php?idioma=es" class="me-2" id="spanish-flag">
                <img src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Flag_of_Spain.svg"
                  alt="Español"
                  width="24"
                  height="18"
                  class="rounded border shadow-sm">
              </a>
              <a href="idioma.php?idioma=en" id="english-flag">
                <img src="https://upload.wikimedia.org/wikipedia/commons/8/83/Flag_of_the_United_Kingdom_%283-5%29.svg"
                  alt="English"
                  width="24"
                  height="18"
                  class="rounded border shadow-sm">
              </a>
            </li>

            <?php
            if (!isset($_SESSION['usuario'])) {
            ?>
              <li class="nav-item">
                <button type="button" class="btn btn-primary rounded-pill bg-white">
                  <i class="fas fa-user text-primary me-2"></i>
                  <a href="inicio.html" class="text-decoration-none"><?php echo $idioma['iniciar_sesion']; ?></a>
                </button>
              </li>
              <li class="nav-item">
                <button type="button" class="btn btn-primary rounded-pill">
                  <a href="registro.html" class="text-light text-decoration-none"><?php echo $idioma['registrarse']; ?></a>
                </button>
              </li>
            <?php
            } else {
              echo '<li class="nav-item">
                <button type="button" onclick="cerrarSesion()" class="btn btn-danger rounded-pill bg-white text-danger">
                  <i class="fas fa-user text-danger me-2"></i>'.$idioma['cerrar_sesion'].
                '</button>
              </li>';
            }
            ?>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <!-- Contenido principal con espacio para el header fijo -->
  <main style="padding-top: 70px;">
    <!-- Carrusel responsivo -->
    <div id="carouselExampleDark" class="carousel carousel-dark slide">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="10000">
          <img src="car1.jpg" class="d-block w-100" alt="..." style="height: 80vh; object-fit: cover;">
          <div class="carousel-caption d-none d-md-block">
            <h5 class="font-serif fw-bold text-light display-4"><?php echo $idioma['descubre']; ?></h5>
            <p class="fs-5 font-serif text-light"><?php echo $idioma['descubre']; ?></p>
            <button type="button" class="rounded-pill btn btn-primary p-2 px-5">
              <a class="text-light text-decoration-none" href="<?php echo $link; ?>"><?php echo $idioma['reservar']; ?></a>
            </button>
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="2000">
          <img src="car2.jpg" class="d-block w-100" alt="..." style="height: 80vh; object-fit: cover;">
          <div class="carousel-caption d-none d-md-block">
            <h5 class="font-serif fw-bold text-light display-4">Second slide label</h5>
            <p class="fs-5 font-serif text-light">Some representative placeholder content for the second slide.</p>
            <button type="button" class="rounded-pill btn btn-primary p-2 px-5">
              <a class="text-light text-decoration-none" href="<?php echo $link; ?>"><?php echo $idioma['reserva_ahora']; ?></a>
            </button>
          </div>
        </div>
        <div class="carousel-item">
          <img src="car4.jpg" class="d-block w-100" alt="..." style="height: 80vh; object-fit: cover;">
          <div class="carousel-caption d-none d-md-block">
            <h5 class="font-serif fw-bold text-light display-4">Third slide label</h5>
            <p class="fs-5 font-serif text-light">Some representative placeholder content for the third slide.</p>
            <button type="button" class="rounded-pill btn btn-primary p-2 px-5">
              <a class="text-light text-decoration-none" href="<?php echo $link; ?>"><?php echo $idioma['reserva_ahora']; ?></a>
            </button>
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

    <!-- Sección de bienvenida -->
    <section>
      <div class="container py-5">
        <div class="row text-center">
          <div class="col-12">
            <h1><?php echo $idioma['bienvenidos']; ?></h1>
            <p class="lead text-muted mx-auto"><?php echo $idioma['disfruta']; ?></p>
          </div>
        </div>
      </div>
      
      <!-- Tarjetas de características -->
      <div class="container mb-5">
        <div class="row">
          <div class="col-12 col-md-4 mb-4">
            <div class="card h-100">
              <div class="card-body text-center">
                <i class="display-5 text-primary fas fa-utensils"></i>
                <h5 class="card-title display-6 font-serif fw-bold"><?php echo $idioma['cocina_exquisita']; ?></h5>
                <p class="card-text"><?php echo $idioma['cocina_exquisita_desc']; ?></p>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-4 mb-4">
            <div class="card h-100">
              <div class="card-body text-center">
                <i class="display-5 text-primary fas fa-clock"></i>
                <h5 class="card-title display-6 font-serif fw-bold"><?php echo $idioma['ambiente_acogedor']; ?></h5>
                <p class="card-text"><?php echo $idioma['ambiente_acogedor_desc']; ?></p>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-md-4 mb-4">
            <div class="card h-100">
              <div class="card-body text-center">
                <i class="display-5 text-primary fas fa-map-marker-alt"></i>
                <h5 class="card-title display-6 font-serif fw-bold"><?php echo $idioma['reserva_facil']; ?></h5>
                <p class="card-text"><?php echo $idioma['reserva_facil_desc']; ?></p>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Sección de menú -->
        <div class="text-center mb-5 menu" id="menu">
          <h2 class="display-5 font-serif fw-bold mb-3"><?php echo $idioma['nuestro_menu']; ?></h2>
          <div class="divider-custom"></div>
          <p class="lead text-muted mx-auto" style="max-width: 700px;">
            <?php echo $idioma['nuestro_menu_desc']; ?>
          </p>
        </div>
        
        <!-- Elementos del menú -->
        <div class="row g-4">
          <div class="col-12 col-md-6 mb-4">
            <div class="card border-0 shadow-sm hover-card h-100">
              <div class="card-body d-flex flex-column flex-sm-row p-3">
                <div class="flex-shrink-0 me-0 me-sm-3 mb-3 mb-sm-0 text-center">
                  <img src="paella.jpg" alt="Paella" class="rounded-3" width="100" height="100" style="object-fit: cover;">
                </div>
                <div>
                  <div class="d-flex justify-content-between align-items-center mb-2">
                    <h3 class="h5 font-serif mb-0"><?php echo $idioma['paella_valenciana']; ?></h3>
                    <span class="text-primary fw-bold">€18.90</span>
                  </div>
                  <p class="text-muted small mb-0"><?php echo $idioma['paella_valenciana_desc']; ?></p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-6 mb-4">
            <div class="card border-0 shadow-sm hover-card h-100">
              <div class="card-body d-flex flex-column flex-sm-row p-3">
                <div class="flex-shrink-0 me-0 me-sm-3 mb-3 mb-sm-0 text-center">
                  <img src="risoto.jpg" alt="Risotto" class="rounded-3" width="100" height="100" style="object-fit: cover;">
                </div>
                <div>
                  <div class="d-flex justify-content-between align-items-center mb-2">
                    <h3 class="h5 font-serif mb-0"><?php echo $idioma['risotto_setas']; ?></h3>
                    <span class="text-primary fw-bold">€16.50</span>
                  </div>
                  <p class="text-muted small mb-0"><?php echo $idioma['risotto_setas_desc']; ?></p>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-md-6 mb-4">
            <div class="card border-0 shadow-sm hover-card h-100">
              <div class="card-body d-flex flex-column flex-sm-row p-3">
                <div class="flex-shrink-0 me-0 me-sm-3 mb-3 mb-sm-0 text-center">
                  <img src="pasta.webp" alt="Pasta" class="rounded-3" width="100" height="100" style="object-fit: cover;">
                </div>
                <div>
                  <div class="d-flex justify-content-between align-items-center mb-2">
                    <h3 class="h5 font-serif mb-0"><?php echo $idioma['pasta_pesto']; ?></h3>
                    <span class="text-primary fw-bold">€14.90</span>
                  </div>
                  <p class="text-muted small mb-0"><?php echo $idioma['pasta_pesto_desc']; ?></p>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-md-6 mb-4">
            <div class="card border-0 shadow-sm hover-card h-100">
              <div class="card-body d-flex flex-column flex-sm-row p-3">
                <div class="flex-shrink-0 me-0 me-sm-3 mb-3 mb-sm-0 text-center">
                  <img src="dorada.jpg" alt="Pescado" class="rounded-3" width="100" height="100" style="object-fit: cover;">
                </div>
                <div>
                  <div class="d-flex justify-content-between align-items-center mb-2">
                    <h3 class="h5 font-serif mb-0"><?php echo $idioma['dorada_sal']; ?></h3>
                    <span class="text-primary fw-bold">€22.50</span>
                  </div>
                  <p class="text-muted small mb-0"><?php echo $idioma['dorada_sal_desc']; ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Sección de servicios -->
    <section class="container my-5 py-5">
      <div class="text-center mb-5">
        <h2 class="display-5 font-serif fw-bold mb-3"><?php echo $idioma['nuestros_servicios']; ?></h2>
        <div class="divider-custom"></div>
        <p class="lead text-muted mx-auto" style="max-width: 700px;">
          <?php echo $idioma['nuestros_servicios_desc']; ?>
        </p>
      </div>
      
      <!-- Tarjetas de servicios desde la base de datos -->
      <div class="row g-4">
        <?php
        try {
          $conexion = new PDO('mysql:host=localhost;dbname=restaurante', 'root', 'root');
          $resultado = $conexion->prepare('SELECT * FROM servicios');
          $resultado->execute();

          while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="col-12 col-md-6 col-lg-4 mb-4">';
            echo '<div class="card service-card shadow-sm h-100">';
            echo '<div class="position-relative">';
            echo '<img src="' . $fila['imagen'] . '" class="card-img-top service-image" alt="' . $fila['nombre'] . '" style="height: 200px; object-fit: cover;">';
            echo '</div>';
            echo '<div class="card-body p-4">';
            echo '<h3 class="card-title h4 font-serif fw-bold">' . $fila['nombre'] . '</h3>';
            echo '<p class="card-text text-muted">' . $fila['descripcion'] . '</p>';
            echo '<a href="' . $link . '" class="btn btn-outline-primary rounded-pill mt-3">Reservar</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
          }
        } catch (PDOException $e) {
          echo '<div class="col-12 text-center text-danger">';
          echo 'Error: ' . $e->getMessage();
          echo '</div>';
        }
        ?>
      </div>
    </section>
    
    <!-- Footer responsivo -->
    <footer class="bg-dark text-white py-4" id="contacto">
      <div class="container">
        <div class="row g-4">
          <div class="col-12 col-md-6 col-lg-3 mb-4">
            <div class="d-flex align-items-center mb-3">
              <i class="fas fa-utensils text-primary me-2"></i>
              <span class="h4 font-serif mb-0">La Delicia</span>
            </div>
            <p class="text-white"><?php echo $idioma['descubre']; ?></p>
          </div>
          
          <div class="col-12 col-md-6 col-lg-3 mb-4">
            <h5 class="font-serif mb-3"><?php echo $idioma['horario']; ?></h5>
            <ul class="list-unstyled text-muted">
              <li class="d-flex justify-content-between mb-2 text-white">
                <span><?php echo $idioma['horario_lunes_jueves']; ?></span>
                <span>12:00 - 23:00</span>
              </li>
              <li class="d-flex justify-content-between mb-2 text-white">
                <span><?php echo $idioma['horario_viernes_sabado']; ?></span>
                <span>12:00 - 00:00</span>
              </li>
              <li class="d-flex justify-content-between mb-2 text-white">
                <span><?php echo $idioma['horario_domingo']; ?></span>
                <span>12:00 - 22:00</span>
              </li>
            </ul>
          </div>
          
          <div class="col-12 col-md-6 col-lg-3 mb-4">
            <h5 class="font-serif mb-3"><?php echo $idioma['contacto_titulo']; ?></h5>
            <ul class="list-unstyled text-muted">
              <li class="d-flex align-items-center mb-2">
                <i class="fas fa-map-marker-alt text-primary me-2"></i>
                <span class="text-white"><?php echo $idioma['contacto_direccion']; ?></span>
              </li>
              <li class="d-flex align-items-center mb-2">
                <i class="fas fa-phone text-primary me-2"></i>
                <span class="text-white"><a href="/cdn-cgi/l/email-protection" class="text-white"><?php echo $idioma['contacto_email']; ?></a></span>
              </li>
            </ul>
          </div>
          
          <div class="col-12 col-md-6 col-lg-3 mb-4">
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
             
            </div>
          </div>
        </div>
      </div>
    </footer>
  </main>
  
  <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script src="sesion.js"></script>
</body>

</html>

