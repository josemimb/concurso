const url = 'http://localhost/concurso/helper/usuarioApi.php'
const http = new XMLHttpRequest()

http.open("GET", url)
http.onreadystatechange = async function(){
    if(this.readyState == 4 && this.status == 200){
        var usuario = JSON.parse(this.responseText)
        //alert(usuario)

const table = document.getElementById("cuerpoTabla");
var id = document.getElementById("usuario");

usuario.forEach((e,i) => {    

  let tr = document.createElement("tr"); 
  
  /*let td = document.createElement("td"); //< ---  Hacemos columna index dentro de la fila
  td.classList.add("index"); //saber numero de usuarios
  td.innerHTML = i;
  tr.appendChild(td); 
*/
  for (p in e) {  
    let td = document.createElement("td"); 
    td.classList.add(p);
    td.innerHTML = e[p];
    //console.log(e);
    
    tr.appendChild(td); 
  }
  table.appendChild(tr); 
  document.querySelector("table").addEventListener("click", function(event){
    var i = event.target.innerText;
    //console.log(i);
    //alert(i)
}, false);
  //console.log(p);
  //coger la id
    
  

 });
         for(let i=0; i<usuario.length; i++){

        //console.log(usuario[i].nombre);
       // document.write(usuario[i].nombre)
        }
        let crearTabla = function(usuario){
            let stringTabla=""
            //<tr><th>Nombre</th><th>Contraseña</th></tr>
            for(let usuarios of usuario){

                let fila = "<tr> <td id='id'>"
                fila += usuarios.id;
                fila += "</td>"

                fila += "<td> "
                fila += usuarios.indicativo;
                fila += "</td>"

                fila += "<td> "
                fila += usuarios.email;
                fila += "</td>"

                fila += '<td> <iframe style="margin:20px" name="localizacion" id="localizacion" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25227.38349408476!2d-3.814374576008666!3d37.78012697364766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6dd713cb5302c7%3A0x9cfb2c858b405702!2zSmHDqW4!5e0!3m2!1ses!2ses!4v1667941256946!5m2!1ses!2ses" width="150" height="100" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> '
                fila += usuarios.localizacion;
                fila += "</td>"

                fila += "<td> <img src=./img/defecto.png width='100px'>"
                fila += usuarios.imagen;
                fila += "</img> </td>"

                fila += "<td> "
                fila += usuarios.nombre;
                fila += "</td>"

                fila += "<td> "
                fila += usuarios.contraseña;
                fila += "</td>"

                fila += "<td> "
                fila += usuarios.rol;
                fila += "</td>"

                fila += "</tr>"
                stringTabla += fila;
                //console.log(stringTabla);
            }
        return stringTabla;

        }
        table.innerHTML = crearTabla(usuario)
            
    }
}

http.send()




function editarUsuario(){
    var xhr = new XMLHttpRequest();
xhr.open("PUT", url+'/12', true);
xhr.setRequestHeader('Content-type','application/json; charset=utf-8');
xhr.onload = function () {
    var users = JSON.parse(xhr.responseText);
    if (xhr.readyState == 4 && xhr.status == "200") {
        console.table(users);
    } else {
        console.error(users);
    }
}
xhr.send(json);
}

function borrarUsuario(){
    xhr.open("DELETE", url+id, true);
    xhr.onload = function () {
    var users = JSON.parse(xhr.responseText);
    if (xhr.readyState == 4 && xhr.status == "200") {
        console.table(users);
    } else {
        console.error(users);
    }
}
xhr.send(null);

}

if(document.getElementById("modal")){
    var formulario = document.getElementById("modal")
    debugger;
    formulario.onsubmit = function(e){
        e.preventDefault();
        alert("hola");
        guardar();
    }
    async function guardar(){
        console.log("guardar datos...");
    }
}

// if(document.querySelector("#formulario")){
//     var formulario = document.getElementById("formulario")
//     formulario.onsubmit = function(e){
//         e.preventDefault();
//         guardar();
//     }

//     async function guardar(){
//         console.log("guardar datos...");
//     }
// }

if(document.getElementById("formulario")){
    var formulario = document.getElementById("formulario")
    formulario.onsubmit = function(e){
        e.preventDefault();
        guardar();
    }

    async function guardar(){
        //console.log("guardar datos...");
        var indicativo = document.getElementById("indicativo").value;
        var email = document.getElementById("email").value;
        var localizacion = document.getElementById("localizacion").value;
        var imagen = document.getElementById("imagen").value;
        var nombre = document.getElementById("nombre").value;
        var contrasena = document.getElementById("contrasena").value;
        var rol = document.getElementById("rol").value;

        if(indicativo == "" || email == "" || localizacion == "" || imagen == "" || nombre == "" || contrasena == "" || rol == ""){
            alert("todos los campos son obligatorios");
            return;
        }
        try{
            const data = new FormData(formulario);
            //
            var respuesta = await fetch("http://localhost/concurso/helper/usuarioApi.php",{
                method: 'POST',
                mode: 'cors',
                cache: 'no-cache',
                body: data
            });
            console.log(respuesta);
        } catch(err){
            console.log("Ocurrio un error: "+err);
        }

    }
}




function agregarUsuarios(e){
    e.preventDefault();

    const error_box = document.getElementById('error_box');
    const tabla = document.getElementById('tabla');
    const loader = document.getElementById('loader');

    http.open("POST", url)
    
    var usuario_indicativo = formulario.inidicativo.value.trim();
    var usuario_email = formulario.email.value.trim();
    var usuario_localizacion = formulario.localizacion.value.trim();
    var usuario_imagen = formulario.imagen.value.trim();
    var usuario_nombre = formulario.nombre.value.trim();
    var usuario_contrasena = formulario.contrasena.value.trim();
    var usuario_rol = parseInt(formulario.rol.value.trim());

    if (formulario_valido()){
        //error_box.classList.remove('active');

        var parametros = 'indicativo='+ usuario_indicativo + '&email=' + usuario_email + '&localizacion=' + usuario_localizacion + '&imagen=' + usuario_imagen + '&nombre=' + usuario_nombre + '&contrasena=' + usuario_contrasena + '&rol=' + usuario_rol;
        
        http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        
        //loader.classList.add('active');

        http.onload = function() {
            cargarUsuarios();
            formulario.inidicativo.value ='';
            formulario.email.value ='';
            formulario.localizacion.value ='';
            formulario.imagen.value ='';
            formulario.nombre.value ='';
            formulario.contrasena.value ='';
            formulario.rol.value ='';
            
        }

        http.onreadystatechange = function() { 
            if (http.readyState == 4 && http.status == 200)
                loader.classList.remove('active');
        }

        http.send(parametros);

    }else{
        error_box.classList.add('active');
        error_box.innerHTML = 'Por favor completa el formulario correctamente';
    }

}

// formulario.addEventListener('submit', function(e) {
//     agregarUsuarios(e);    
// })

// function formulario_valido() {
//     if(usuario_indicativo == '')
//         return false;
//     else if(usuario_email == '') 
//         return false;
//     else if(usuario_localizacion == '') 
//         return false;
//     else if(usuario_imagen == '') 
//         return false;
//     else if(usuario_nombre == '') 
//         return false;
//     else if(usuario_contrasena == '')
//         return false;    
//     else if(isNaN(usuario_rol))
//         return false;
    

//     return true;
// }
    


