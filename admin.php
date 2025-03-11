<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Delicia - Appointment Manager</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        .font-serif {
            font-family: 'Roboto', sans-serif;
        }

        .header {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        li {
            list-style: none;
        }

        .nav-item a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
        }

        .search-container {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .table-responsive {
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .status-confirmed {
            background-color: #d4edda;
            color: #155724;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
        }

        .status-pending {
            background-color: #fff3cd;
            color: #856404;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
        }

        .status-cancelled {
            background-color: #f8d7da;
            color: #721c24;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
        }

        .btn-action {
            margin-right: 5px;
        }

        .social-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            background-color: var(--bs-primary);
            color: white;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="fixed-top bg-white header">
        <nav class="navbar">
            <div class="container d-flex">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <i class="fas fa-utensils text-primary me-2"></i>
                    <span class="fw-bold font-serif">La Delicia</span>
                </a>

                <div class="row mt-4">
                    <ul class="d-flex flex-wrap justify-content-center align-items-center gap-5">
                        <li class="nav-item"><a href="#">Menú</a></li>
                        <li class="nav-item"><a href="#">Nosotros</a></li>
                        <li class="nav-item"><a href="#">Contacto</a></li>


                        <a href="restaurante.php" class="nav-item ms-3 btn btn-primary rounded-pill  text-light">Inicio</a>
                        </button>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="container my-4" style="margin-top: 120px !important;">
        <div class="d-flex align-items-center mb-4">
            <i class="fas fa-calendar-check text-primary me-2 fs-3"></i>
            <h2 class="font-serif fw-bold mb-0">Gestión de Citas</h2>
        </div>

        <!-- Search -->
        <div class="search-container">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                        <div class="input-group">

                            <input type="text" class="form-control" name="localizador" placeholder="Buscar por código localizador...">
                            <input class="btn btn-primary" type="submit" value="Buscar" name="enviar">
                    </form>
                </div>
            </div>
        </div>
        </div>

        <!-- Appointments Table -->
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Localizador</th>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Hora</th>


                        <th>Borrar</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    try {
                        $conexion = new PDO('mysql:host=localhost;dbname=restaurante', 'root', 'root');
                        if (isset($_POST['enviar']) && !empty($_POST['localizador'])) {
                            $localizador = $_POST['localizador'];
                            $resultado = $conexion->prepare('SELECT * FROM citas WHERE localizador=?');
                            $resultado->execute(array($localizador));
                           
                        } else {

                            $resultado = $conexion->prepare('SELECT * FROM citas ORDER BY mes DESC');
                            
                            $resultado->execute();
                            
                        }
                        while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
                            if ($fila['dia'] < 10) {
                                $dia = '';
                                $dia = '0' . $fila['dia'];
                            } else {
                                $dia = '';
                                $dia = $fila['dia'];
                            }
                            if ($fila['mes'] < 10) {
                                $mes = '';
                                $mes = '0' . $fila['mes'];
                            } else {
                                $mes = '';
                                $mes = $fila['mes'];
                            }
                            $hora = '0' . $fila['hora'] . ':00';
                            $fecha = $dia . '/' . $mes . '/2025';
                            echo '<tr>';
                            echo '<td>' . $fila['localizador'] . '</td>';
                            echo '<td>' . $fila['usuario'] . '</td>';
                            echo '<td>' . $fecha . '</td>';
                            echo '<td>' . $hora . '</td>';
                            echo '<td>
                            
                            <button class="loc btn btn-sm btn-danger btn-action" data-bs-toggle="modal"  data-bs-target="#deleteModal" data-localizador="'.$fila['localizador'].'">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>';

                            echo '</tr>';
                        }
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }
                    ?>



                </tbody>
            </table>
        </div>

        <!-- Pagination -->

    </main>

    

    <!-- Borrar citas -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-serif fw-bold" id="deleteModalLabel">Confirmar Eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Está seguro de que desea eliminar la cita con localizador <strong id="loc"></strong>?</p>
                    <p class="text-danger">Esta acción no se puede deshacer.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="codigo">Eliminar Cita</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white mt-5">
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
            <div class="border-top border-secondary mt-4 pt-4 text-center text-muted">
                <p class="mb-0">© 2025 La Delicia.</p>
            </div>
        </div>
    </footer>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
        <script src="citas.js"></script>
</body>

</html>