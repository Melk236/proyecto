<?php
header('Content-Type: application/json');
$mes=$_POST['mes'];
$dia=$_POST['dia'];

try{
    
    $conexion=new PDO('mysql:host=localhost;dbname=restaurante','root','admin123');
    $resultado=$conexion->prepare('SELECT hora FROM citas WHERE mes=? AND dia=?');
    $resultado->execute(array($mes,$dia));
    if($resultado->rowCount()>0){
        $horas = array_column($resultado->fetchAll(), 'hora');
        echo json_encode(['respuesta'=>true,'hora'=>$horas]);
    }
    else{

    echo json_encode(['respuesta'=>false,'mensaje'=>'No hay ninguna cita reservada para este día']);
    }
}
catch(PDOException $e){
    echo json_encode(['respuesta'=>false,'mensaje'=>$e->getMessage()]);
}


?>