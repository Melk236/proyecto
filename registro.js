function validar(){
    let usuario=document.getElementById('usuario').value.trim();
    let contrasena=document.getElementById('contraseña').value.trim();
    let contrasena2=document.getElementById('contraseña2').value.trim();
    let patronUsuario=/^[A-Za-z]{6,8}$/;
    let patronContrasena=/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,6}$/;
    

    document.getElementById('errorU').innerHTML='';
    document.getElementById('errorC').innerHTML='';
    document.getElementById('errorR').innerHTML='';

    if(contrasena!==contrasena2){
        document.getElementById('errorR').innerHTML='Las contraseñas no coinciden';
        return;
    }

    if(!patronUsuario.test(usuario)){
        document.getElementById('errorU').innerHTML='El nombre de usuario debe tener 6 a 8 carácteres';
        return;
    }

    if(!patronContrasena.test(contrasena)){
        document.getElementById('errorC').innerHTML='La contraseña debe tener letras y números';
        return;
    }
    

    let peticion=new XMLHttpRequest();
    peticion.open('POST','registro.php',true);
    peticion.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    peticion.onreadystatechange=function(){
        if(peticion.readyState==4 && peticion.status==200){
            let objeto=JSON.parse(peticion.responseText);
            if(objeto.respuesta){
                alert('Usuario registrado correctamente. Redirigiendo...');
                
                window.location.href='citas.html';
            }
            else{
                
                document.getElementById('error').innerHTML=objeto.mensaje;
            }
        }
    }
    let parametros='usuario='+encodeURIComponent(usuario)+'&contraseña='+encodeURIComponent(contrasena);
    console.log(parametros);
    peticion.send(parametros);
}