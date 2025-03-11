<?php
header('Content-Type: application/json');

$localizador=$_POST['localizador'];
try{
    $conexion=new PDO('mysql:host=localhost;dbname=restaurante','root','root');

    $resultado=$conexion->prepare('DELETE FROM citas WHERE localizador=?');

    $resultado->execute(array($localizador));
  
   
        echo json_encode(['respuesta'=>true,'mensaje'=>'Registro borrado correctamente']);
    

       
    
   
      
    
}
catch(PDOException $e){
    echo json_encode(['respuesta'=>false,'mensaje'=>$e->getMessage()]);
}


?>