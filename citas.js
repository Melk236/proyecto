
function dia() {
    let mes = document.getElementById('mes');
    let dias = document.getElementById('dia');
    mes = mes.value;
    let borrarDias = document.getElementsByClassName('op');

    for (let i = 0; i < borrarDias.length; i++) {
        if (borrarDias[i].parentNode.removeChild(borrarDias[i])) {
            i--;
        }
    }
    let contenido = '';

    Number(mes);
    if (mes == 8 || mes == 10 || mes == 12) {
        for (let i = 1; i <= 31; i++) {
            let nodo = document.createElement('option');
            nodo.setAttribute('class', 'op');
            dias.appendChild(nodo);
            contenido = document.createTextNode(i);
            nodo.appendChild(contenido);
            nodo.style.color = 'black';
        }
    }
    else if (mes % 2 !== 0) {
        for (let i = 1; i <= 31; i++) {
            let nodo = document.createElement('option');
            nodo.setAttribute('class', 'op');
            dias.appendChild(nodo);
            contenido = document.createTextNode(i);
            nodo.appendChild(contenido);
            nodo.style.color = 'black';
        }
    }
    else if (mes == 2) {
        for (let i = 1; i <= 28; i++) {
            let nodo = document.createElement('option');
            nodo.setAttribute('class', 'op');
            dias.appendChild(nodo);
            contenido = document.createTextNode(i);
            nodo.appendChild(contenido);
            nodo.style.color = 'black';
        }
    }
    else {
        for (let i = 1; i <= 30; i++) {
            let nodo = document.createElement('option');
            nodo.setAttribute('class', 'op');
            dias.appendChild(nodo);
            contenido = document.createTextNode(i);
            nodo.appendChild(contenido);
            nodo.style.color = 'black';
        }
    }

}
function cambiarTexto() {
    let m = document.getElementById('mes').value;
    let d = document.getElementById('dia').value;
    let texto = document.getElementById('texto');
    m = Number(m);
    d = Number(d);
    if (m < 10) {
        m = '0' + m;
    }
    if (d < 10) {
        d = '0' + d;
    }
    texto.innerHTML = 'Horas no disponibles para el ' + d + '/' + m + '/2025:';
    let fecha = document.getElementById('date');
    fecha.value = d + '/' + m + '/2025';
    alert(fecha);
}
function horasDisponibles() {
    let mes = document.getElementById('mes');
    let dias = document.getElementById('dia');
    mes = mes.value

    dias = dias.value;


    let peticion = new XMLHttpRequest();

    peticion.open('POST', 'consultarHoras.php', true);
    peticion.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    peticion.onreadystatechange = function () {
        if (peticion.readyState == 4 && peticion.status == 200) {
            let sinCitas = document.getElementById('sinCita');
            sinCitas.innerHTML='';
            let objeto = JSON.parse(peticion.responseText);
            let span = document.getElementsByClassName('badge');
            for (let i = 0; i < span.length; i++) {//Vaciar las horas no disponibles anteriores
                span[i].innerHTML = '';
            }
            let contenido = '', j = 0;
            if (objeto.respuesta) {
                let array = objeto.hora;

                for (let i = 0; i < array.length; i++) {//Rellenar las horas no disponibles
                    contenido = document.createTextNode('0' + array[i] + ':00');
                    span[j].appendChild(contenido);
                    j++;
                }
            }
            else {
              
                sinCitas.innerHTML = objeto.mensaje;
            }
        }
    }
    let parametros = 'mes=' + encodeURIComponent(mes) + '&dia=' + encodeURIComponent(dias);
    peticion.send(parametros);
}

function confirmarReserva() {
    
    let mes = document.getElementById('mes').value;
    let dias = document.getElementById('dia').value;
    let hora = document.getElementById('hora').value;
    let nombre = document.getElementById('nombre').value;
    let motivo = document.getElementById('motivo').value;
    let n=document.getElementById('n');
    let f=document.getElementById('f');
    let h=document.getElementById('h');
    let m=document.getElementById('m');
    let c=document.getElementById('c');
    if (nombre.trim() === "" || hora.trim() === "" || motivo.trim() === "") {
        alert("Por favor, completa todos los campos antes de confirmar la reserva.");
        return false;
    }
    dias = Number(dias);
    mes = Number(mes)
    hora = Number(hora);
    if (dias < 10) {
        dias = '0' + dias;

    }
    if (mes < 10) {
        mes = '0' + mes;
    }
    nombreSinEspacios=nombre.replace(' ','');
    let localizador = nombreSinEspacios + dias + mes + '0' + hora;
    //Comunicación con el servidor mediante ajax
    let peticion = new XMLHttpRequest();
    peticion.open('POST', 'citas.php', true);
    peticion.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    peticion.onreadystatechange = function () {
        if (peticion.readyState == 4 && peticion.status == 200) {
            let objeto=JSON.parse(peticion.responseText);
            let cont1=document.getElementById('1');
            let cont2=document.getElementById('2');
            let cont3=document.getElementById('3');
            n.innerHTML=nombre;
                f.innerHTML='';
                h.innerHTML='';
                m.innerHTML='';
                c.innerHTML='';
            if(objeto.respuesta){
                n.innerHTML=nombre;
                f.innerHTML=dias + '/' + mes + '/2025';
                h.innerHTML='0'+hora+':00';
                m.innerHTML=motivo;
                c.innerHTML='Tu código de seguimiento: '+localizador;
                cont1.style.display='none';
                cont2.style.display='none';
                cont3.style.display='block';

            }
            else{
                alert(objeto.mensaje);
            }
        }

    }
    let parametros = 'mes=' + encodeURIComponent(mes) + '&dia=' + encodeURIComponent(dias) + '&hora=' + encodeURIComponent(hora) + '&motivo=' + encodeURIComponent(motivo) + '&localizador=' + encodeURIComponent(localizador);
    peticion.send(parametros);

}

function eliminarCita(){
    let boton=document.getElementById('codigo');
    let localizador=boton.getAttribute('data-localizador');
     
    let peticion=new XMLHttpRequest();

    peticion.open('POST','eliminarCitas.php',true);

    peticion.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    peticion.onreadystatechange=function(){
        console.log('ReadyState:', peticion.readyState);
        console.log('Status:', peticion.status);
        if(peticion.readyState==4 && peticion.status==200){
            let objeto=JSON.parse(peticion.responseText);
            if(objeto.respuesta){
                
            }
            else{
                alert(objeto.respuesta);
            }
            location.reload(); 
        }
    }
    let parametros='localizador='+encodeURIComponent(localizador);
    peticion.send(parametros);
}