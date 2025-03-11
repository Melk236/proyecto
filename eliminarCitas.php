<?php
header('Content-Type: application/json');

$localizador=$_POST['localizador'];
try{
    $conexion=new PDO('mysql:host=localhost;dbname=restaurante','root','admin123');

    $resultado=$conexion->prepare('DELETE FROM citas WHERE localizador=?');

    $resultado->execute(array($localizador));
  
    if($resultado->rowCount()> 0){  
        echo json_encode(['respuesta'=>true,'mensaje'=>'Registro borrado correctamente']);
    }else{  

        echo json_encode(['respuesta'=>false,'mensaje'=>'No se ha podido borrar la cita']);
    }
   
      
    
}
catch(PDOException $e){
    echo json_encode(['respuesta'=>false,'mensaje'=>$e->getMessage()]);
}


?>