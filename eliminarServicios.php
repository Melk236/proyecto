<?php
    header('Content-Type: application/json');

    $id=$_POST['id'];

    try{
        $conexion = new PDO('mysql:host=localhost;dbname=restaurante', 'root', 'root');
        $resultado = $conexion->prepare('DELETE FROM servicios WHERE id=?');
    
        $resultado->execute(array($id));
        if($resultado->rowCount()>0){
            echo json_encode(['respuesta'=>true]);

        }
        else{
            echo json_encode(['respuesta'=>false,'mensaje'=>'No se ha podido elimar el servicio']);
        }
    }catch(PDOException $e){
        echo json_encode(['respuesta'=>false,'mensaje'=>$e->getMessage()]);

    }


?>