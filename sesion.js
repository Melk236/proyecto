function cerrarSesion() {


    let peticion = new XMLHttpRequest();

    peticion.open('POST', 'sesion.php', true);
    let confirmacion = confirm('¿Estás seguro de que deseas cerrar sesión?');

    if (confirmacion) {


        peticion.onreadystatechange = function () {

            if (peticion.readyState == 4 && peticion.status == 200) {

                window.location.href = 'restaurante.php';

            }


        }
        peticion.send();
    }
}