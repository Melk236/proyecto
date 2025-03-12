<?php

if (isset($_POST['enviar'])) {
    $nombre = $_POST['nombre'];
    $categoria = $_POST['categoria'];
    $descripcion = $_POST['descripcion'];

    if (!empty($nombre) && !empty($categoria) && !empty($descripcion)) {
        if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
            if (mime_content_type($_FILES['imagen']['tmp_name'] )== 'image/jpeg' || mime_content_type($_FILES['imagen']['tmp_name']) == 'image/png' || mime_content_type($_FILES['imagen']['tmp_name']) == 'image/webp') {
                $ruta='img\\';

                if(is_dir($ruta)){
                    move_uploaded_file($_FILES['imagen']['tmp_name'],$ruta.$_FILES['imagen']['name']);
                    $rutaC=$ruta.$_FILES['imagen']['name'];
                    try{
                        $conexion=new PDO('mysql:host=localhost;dbname=restaurante','root','root');
                        $resultado=$conexion->prepare('INSERT INTO servicios (nombre,imagen,descripcion,categoria) VALUES (?,?,?,?)');
                        $resultado->execute(array($nombre,$rutaC,$descripcion,$categoria));
                        //Comprobamos si ha tenido la conexion.
                        if($resultado->rowCount()>0){
                            echo 'Se ha subido el servicio correctamente';
                        }
                    }
                    catch(PDOException $e){
                        echo $e->getMessage();
                    }
                }

            }
            else{
                echo 'Formato no válido';
            }
        }
    }
}
