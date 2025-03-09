function validar(){
    let usuario=document.getElementById('usuario').value;
    let contraseña=document.getElementById('contraseña').value;
    let patronUsuario=/^[A-Za-z]{6,8}/;
    let patronContraseña=/^[a-zA-Z0-0]{6,6}/;
    document.getElementById('errorU').innerHTML='';
    document.getElementById('errorC').innerHTML='';
    document.getElementById('error').innerHTML='';
    if(usuario!='admin'){
    if(!patronUsuario.test(usuario)){
        document.getElementById('errorU').innerHTML='El nombre de usuario debe tener 6 a 8 carácteres';
        return;
    }
    if(!patronContraseña.test(contraseña)){
        document.getElementById('errorC').innerHTML='La contraseña debe tener 6 carácteres';
        return;
    }
    }
    let peticion=new XMLHttpRequest();
    peticion.open('POST','login.php',true);
    peticion.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    peticion.onreadystatechange=function(){
        if(peticion.readyState==4 && peticion.status==200){
            let respuesta = JSON.parse(peticion.responseText);
            if (respuesta.resultado) {
                alert(respuesta.mensaje);
               if(usuario=='admin'){
                window.location.href='admin.php';
               }
               else{
               window.location.href='citas.html';
               }
            } else {
                document.getElementById('error').innerHTML=respuesta.mensaje;
            }
        }
    }
    let parametros='usuario='+encodeURIComponent(usuario)+'&contraseña='+encodeURIComponent(contraseña);
    peticion.send(parametros);
}