
var clase;

function editar(ind){
    var nombre = document.getElementById("edNombre");
    var apellido1= document.getElementById("edApellido1");
    var apellido2 = document.getElementById("edApellido2");
    var btnGuardar = document.getElementById("guardarCam");
    var insertar = document.getElementById("insertar");
    var editar = document.getElementById("editar");
    var alumno = clase.alumnos[ind];
    nombre.value=alumno.nombre;
    apellido1.value = alumno.apellido1;
    apellido2.value = alumno.apellido2;
    insertar.style="display:none";
    editar.style="";

    btnGuardar.onclick=function(){
        clase.alumnos[ind].nombre=nombre.value;
        clase.alumnos[ind].apellido1=apellido1.value;
        clase.alumnos[ind].apellido2=apellido2.value;
        clase.ordena();
        clase.pinta();
        editar.style="display:none";
        insertar.style="";
    }
}

window.onload=function(){
    var tBody=document.getElementById("cuerpo");
    var btnGuardar=document.getElementById("guardar");
    var nombre = document.getElementById("nombre");
    var apellido1= document.getElementById("apellido1");
    var apellido2 = document.getElementById("apellido2");
    var btnOrNombreCreciente = document.getElementById("orNombreCreciente");
    var btnOrApellido1Creciente= document.getElementById("orApellido1Creciente");
    var btnOrApellido2Creciente = document.getElementById("orApellido2Creciente");
    var btnOrNombreDecreciente = document.getElementById("orNombreDecreciente");
    var btnOrApellido1Decreciente= document.getElementById("orApellido1Decreciente");
    var btnOrApellido2Decreciente = document.getElementById("orApellido2Decreciente");
    /*var form = document.getElementById('formulario');
    var btnOrdenar= document.getElementById('btnOrdenar');
    var btnOrdenar1= document.getElementById('btnOrdenar1');*/

    /*btnOrNombreCreciente.onclick=function(){
        clase.orden.variable="nombre";
        clase.orden.creciente=true;
        clase.ordena("nombre");
        clase.pinta();
    }*/
    btnOrApellido1Creciente.onclick=function(){
        clase.orden.variable="apellido1";
        clase.orden.creciente=true;
        clase.ordena("apellido1");
        clase.pinta();
    }
    btnOrApellido2Creciente.onclick=function(){
        clase.orden.variable="apellido2";
        clase.orden.creciente=true;
        clase.ordena("apellido2");
        clase.pinta();
    }
    btnOrNombreDecreciente.onclick=function(){
        clase.orden.variable="nombre";
        clase.orden.creciente=false;
        clase.ordena("nombre");
        clase.pinta();
    }
    btnOrApellido1Decreciente.onclick=function(){
        clase.orden.variable="apellido1";
        clase.orden.creciente=false;
        clase.ordena("apellido1");
        clase.pinta();
    }
    btnOrApellido2Decreciente.onclick=function(){
        clase.orden.variable="apellido2";
        clase.orden.creciente=false;
        clase.ordena("apellido2");
        clase.pinta();
    }

    btnGuardar.onclick=function(){
      /*  var formData = new FormData(form);
        var row = tBody.insertRow(-1);
        let typeCell=row.insertCell(0);
        typeCell.textContent=formData.get('nombre');
        typeCell=row.insertCell(1);
        typeCell.textContent=formData.get('apellido1');
        typeCell=row.insertCell(2);
        typeCell.textContent=formData.get('apellido2');*/

        clase.anade(new Alumno(nombre.value,apellido1.value,apellido2.value));
        clase.ordena();
        clase.pinta();
        nombre.value="";
        apellido1.value="";
        apellido2.value="";
        nombre.focus();

    }

    clase = new Clase(tBody);
}