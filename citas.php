<?php
session_start();

    header('Content-Type: application/json');

    $mes=$_POST['mes'];
    $dia=$_POST['dia'];
    $hora=$_POST['hora'];
    $motivo=$_POST['motivo'];
    $localizador=$_POST['localizador'];

    

    try{
        $conexion=new PDO('mysql:host=localhost;dbname=restaurante','root','root');
        $resultado=$conexion->prepare('SELECT * FROM citas WHERE mes=? AND dia=? AND hora=?');
        $resultado->execute(array($mes,$dia,$hora));
        if($resultado->rowCount()>0){
            echo json_encode(['respuesta'=>false,'mensaje'=>'Esta fecha esta reservada escoja otra']);
        }
        else{
        $resultado=$conexion->prepare('INSERT INTO citas (usuario,dia,hora,localizador,mes,motivo) VALUES (?,?,?,?,?,?)');

        $resultado->execute(array($_SESSION['usuario'],$dia,$hora,$localizador,$mes,$motivo));

        if($resultado->rowCount()>0){
            echo json_encode(['respuesta'=>true]);
        }
        else{
            echo json_encode(['respuesta'=>false,'mensaje'=>'No se ha podido reservar la cita']);
        }
    }
    }
    catch(PDOException $e){
        echo json_encode(['respuesta'=>false,'mensaje'=>$e->getMessage()]);
    }
    


?>