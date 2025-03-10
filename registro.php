<?php
header('Content-Type: application/json');
session_start();
if (isset($_SESSION['usuario'])) {
    echo json_encode(['respuesta' => true]);
    exit;
}
$validar = false;
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];
if (empty($contraseña)) {
    die(json_encode(['respuesta' => false, 'mensaje' => 'Esta vacio']));
}
try {
    $conexion = new PDO('mysql:host=localhost;dbname=restaurante', 'root', 'admin123');
    $resultado = $conexion->prepare('SELECT usuario FROM usuarios where usuario=?');
    $resultado->execute(array($usuario));

    if ($resultado->rowCount() > 0) {
        echo json_encode(['respuesta' => false, 'mensaje' => 'El usuario ya existe']);
    } else {
        $resultado = $conexion->prepare('INSERT INTO usuarios (usuario, contraseña) VALUES (?,?)');
        $resultado->execute(array($usuario, password_hash($contraseña, PASSWORD_BCRYPT)));

        if ($resultado->rowCount() > 0) {

            $_SESSION['usuario'] = $usuario;
            echo json_encode(['respuesta' => true]);
        }
    }
} catch (PDOException $e) {
    echo json_encode(['respuesta' => false, 'mensaje' => $e->getMessage()]);
}
