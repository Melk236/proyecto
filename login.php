
<?php



header('Content-Type: application/json');
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];
try {
    $conexion = new PDO('mysql:host=localhost;dbname=restaurante', 'root', 'root');
    $resultado = $conexion->prepare('SELECT * FROM usuarios WHERE usuario=?');

    $resultado->execute(array($usuario));
    if ($resultado->rowCount() > 0) {


        $fila = $resultado->fetch(PDO::FETCH_ASSOC);
        if ($fila['usuario'] == 'admin') { //Si el usuario es el admin no hasheamos la contraseña
            if ($fila['contraseña'] != $contraseña) {
                echo json_encode(['resultado' => false, 'mensaje' => 'Usuario incorrecto.']);
            } else {
                session_start();
                $_SESSION['usuario'] = $usuario;
                $_SESSION['contraseña'] = $contraseña;
                echo json_encode(['resultado' => true, 'mensaje' => 'Usuario correcto. Redirigiendo...']);
            }
        } else {
            if (password_verify($contraseña, $fila['contraseña'])) {
                session_start();
                $_SESSION['usuario'] = $usuario;
                $_SESSION['contraseña'] = $contraseña;
                echo json_encode(['resultado' => true, 'mensaje' => 'Usuario correcto. Redirigiendo...']);
            } else {
                echo json_encode(['resultado' => false, 'mensaje' => 'Usuario incorecto']);
            }
        }
    }
    else{
        echo json_encode(['resultado' => false, 'mensaje' => 'Usuario incorrecto.']);
    }
} catch (PDOException $e) {
    echo json_encode(['resultado' => false, 'mensaje' => $e->getMessage()]);
}

?>
