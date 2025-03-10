function cerrarSesion(){


    let peticion=new XMLHttpRequest();

    peticion.open('POST','sesion.php',true);

    peticion.onreadystatechange=function(){
        
        if(peticion.readyState==4 && peticion.status==200){
            alert('Sesion cerrada correctamente');
            window.location.href='restaurante.php';
        }

        
    }
    peticion.send();
}