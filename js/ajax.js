
window.addEventListener("load", function () {

    var nuevo = this.document.getElementById("añadir");

    nuevo.onclick = function (ev) {
        ////Crear el objeto formulario, titulo, input y boton
        let formulario=document.createElement("form");
        let titulo=document.createElement("label");
        let cajaTextNombres=document.createElement("input");
        let cajaTextContrasena=document.createElement("input");
        let cajaTextEmail=document.createElement("input");
        let cajaTextIndicativo=document.createElement("input");

        let latitud=document.createElement("input");
        let longitud=document.createElement("input");
        let capturar = document.createElement("input")
        let cajaTextLocalizacion=document.createElement("input");
        let cajaTextImagen=document.createElement("input");
        let cajaTextRol=document.createElement("input");
        let boton=document.createElement("input");
        //errores
        let divNombre=document.createElement("div");
        let divContrasena=document.createElement("div");
        let divIndicativo=document.createElement("div");
        let divEmail=document.createElement("div");
        let divRol=document.createElement("div");
 
        ////Asignar atributos al objeto formulario
            formulario.setAttribute('method', "post");
            formulario.setAttribute('action', "#");
            //formulario.setAttribute('id', "form");
            formulario.setAttribute('style', "width:300px;margin: 0px auto");
 
            ////Asignar atributos al objeto caja de texto de NOMBRES
            cajaTextNombres.setAttribute('type', "text");
            cajaTextNombres.setAttribute('id', "nombre");
            
            //<i class="fas fa-user"></i>
            cajaTextNombres.setAttribute('name', "nombre");
            cajaTextNombres.setAttribute('placeholder', "Nombre");
            cajaTextNombres.setAttribute('style', "width:100%;margin: 10px 0px;padding: 5px");
            //div.innerHTML='nombre <i class="fa-solid fa-pen-to-square"></i> ';

            divNombre.setAttribute('id', "errorNombre");
            divNombre.setAttribute('style', "display:none");
 
            ////Asignar atributos al objeto caja de texto de CONTRASENA
            cajaTextContrasena.setAttribute('type', "text");
            cajaTextContrasena.setAttribute('id', "contrasena");
            cajaTextContrasena.setAttribute('name', "contrasena");
            cajaTextContrasena.setAttribute('placeholder', "Contraseña");
            cajaTextContrasena.setAttribute('style', "width:100%;margin: 10px 0px;padding: 5px");

            divContrasena.setAttribute('id', "errorContrasena");
            divContrasena.setAttribute('style', "display:none");
 
            ////Asignar atributos al objeto caja de texto de EMAIL
            cajaTextEmail.setAttribute('type', "text");
            cajaTextEmail.setAttribute('name', "email");
            cajaTextEmail.setAttribute('id', "email");
            cajaTextEmail.setAttribute('placeholder', "Email");
            cajaTextEmail.setAttribute('style', "width:100%;margin: 10px 0px;padding: 5px");

            divEmail.setAttribute('id', "errorEmail");
            divEmail.setAttribute('style', "display:none");
 
            ////Asignar atributos al objeto caja de texto de INDICATIVO
            cajaTextIndicativo.setAttribute('type', "text");
            cajaTextIndicativo.setAttribute('id', "indicativo");
            cajaTextIndicativo.setAttribute('name', "indicativo");
            cajaTextIndicativo.setAttribute('placeholder', "Indicativo");
            cajaTextIndicativo.setAttribute('style', "width:100%;margin: 10px 0px;padding: 5px");

            divIndicativo.setAttribute('id', "errorIndicativo");
            divIndicativo.setAttribute('style', "display:none");
 
            ////Asignar atributos al objeto area de texto de LOCALIZACION
            // cajaTextLocalizacion.setAttribute('type', "text");
            // cajaTextLocalizacion.setAttribute('id', "localizacion");
            // cajaTextLocalizacion.setAttribute('name', "localizacion");
            // cajaTextLocalizacion.setAttribute('placeholder', "Localizacion");
            // cajaTextLocalizacion.setAttribute('style', "width:100%;margin: 10px 0px;padding: 5px");

            ////Asignar atributos al objeto caja de texto de LOCALIZACION
            latitud.setAttribute('type', "text");
            latitud.setAttribute('id', "latitud");

            longitud.setAttribute('type', "text");
            longitud.setAttribute('id', "longitud");

            capturar.setAttribute('type', "button");
            capturar.setAttribute('id', "capturar");
            capturar.setAttribute('value', "capturar");
            
            cajaTextLocalizacion.setAttribute('type', "text");
            cajaTextLocalizacion.setAttribute('id', "localizacion");
            cajaTextLocalizacion.setAttribute('name', "localizacion");
            cajaTextLocalizacion.setAttribute('placeholder', "Localiacion");
            cajaTextLocalizacion.setAttribute('style', "width:100%;margin: 10px 0px;padding: 5px");

            ////Asignar atributos al objeto caja de texto de IMAGEN
            cajaTextImagen.setAttribute('type', "text");
            cajaTextImagen.setAttribute('id', "imagen");
            cajaTextImagen.setAttribute('name', "imagen");
            cajaTextImagen.setAttribute('placeholder', "Imagen");
            cajaTextImagen.setAttribute('style', "width:100%;margin: 10px 0px;padding: 5px");
 
            ////Asignar atributos al objeto caja de texto de ROL
            cajaTextRol.setAttribute('type', "text");
            cajaTextRol.setAttribute('id', "rol");
            cajaTextRol.setAttribute('name', "rol");
            cajaTextRol.setAttribute('placeholder', "Rol");
            cajaTextRol.setAttribute('style', "width:100%;margin: 10px 0px;padding: 5px");

            divRol.setAttribute('id', "errorRol");
            divRol.setAttribute('style', "display:none");
        
            ////Asignar atributos al objeto boton
            boton.setAttribute('type', "submit");	
            boton.setAttribute('value', "Enviar");
            boton.setAttribute('onlcick', "location.reload()");
            boton.setAttribute('style', "width:100px;margin: 10px 0px;padding: 10px;background:#F05133;color:#fff;border:solid 1px #000;");
            //boton.setAttribute('onclick', "alert('Se ha añadido un nuevo usuario')");
 
            titulo.innerHTML='<h1>Usuario</h1>';
            formulario.appendChild(titulo);
            formulario.appendChild(cajaTextNombres);
            formulario.appendChild(divNombre);
            formulario.appendChild(cajaTextContrasena);
            formulario.appendChild(divContrasena);
            formulario.appendChild(cajaTextEmail);
            formulario.appendChild(divEmail);
            formulario.appendChild(cajaTextIndicativo);
            formulario.appendChild(divIndicativo);
            formulario.appendChild(latitud);
            formulario.appendChild(longitud);
            formulario.appendChild(capturar);
            formulario.appendChild(cajaTextLocalizacion);
            formulario.appendChild(cajaTextImagen);
            formulario.appendChild(cajaTextRol);
            formulario.appendChild(divRol);
            formulario.appendChild(boton);
            //document.getElementById('formulario').appendChild(formulario);//Agregar el formulario a la etiqueta con el ID		
            
            

                //debugger;
            formulario.onsubmit = function(e){
                    e.preventDefault();
                    //alert("hola");
                    guardar();
                }
          
                async function guardar(){
                    window.addEventListener("load", function(){
                        const boton1 = document.getElementById("capturar");
                        const latitud1 = document.getElementById("latitud");
                        const longitud1 = document.getElementById("longitud");
            
                        function getLocation(){
                            if (navigator.geolocation){
                                navigator.geolocation.getCurrentPosition(showPosition);
                            }
                            else {
                                alert ("tu navegador no soporta geolocalizacion")
                            }
            
                        }
                        function showPosition(position){
                            latitud1.value = position.coords.latitude;
                            longitud1.value = position.coords.longitude;
                        }
                        boton1.addEventListener("click", function(){
                            //getLocation();
                            alert("hola")
                        })
            
                    })

                    
                   // console.log("guardar datos...");
                   var indicativo = document.getElementById("indicativo").value;
                   var indicativo2 = document.getElementById("indicativo");
                   var email = document.getElementById("email").value; 
                   var localizacion = document.getElementById("localizacion").value;
                   var imagen = document.getElementById("imagen").value;
                   var nombre = document.getElementById("nombre").value;
                   var contrasena = document.getElementById("contrasena").value;
                   var rol = document.getElementById("rol").value;

                   //validaciones
                   var errorIndicativo = document.getElementById("errorIndicativo");
                   var errorEmail = document.getElementById("errorEmail");
                   var errorNombre = document.getElementById("errorNombre");
                   var errorContrasena = document.getElementById("errorContrasena");
                   var errorRol = document.getElementById("errorRol");

                   //valor = document.getElementById("campo").value;
           
                 if(indicativo == "" || email == "" || localizacion == "" || imagen == "" || nombre == "" || contrasena == "" || rol == ""){
                       alert("todos los campos son obligatorios");
                       return false;
                       
                   }

                if( indicativo =! (/^[A-Z]{2}[0-9](?:[A-Z]|[A-Z]{2}|[A-Z]{3})$/.test(indicativo))) { 
                    //alert("El distintivo no es valido");
                    errorIndicativo.innerHTML= "El indicativo no es valido";
                    errorIndicativo.style="display:visibility";
                    errorIndicativo.style="color:red";
                    indicativo2.style = "border:red";
                    indicativo2.style="background-color:red";
                    return false;
                    }
                if( email =! (/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/.test(email)) ) { 
                    errorEmail.innerHTML= "El email no es valido";
                    errorEmail.style="display:visibility";
                    errorEmail.style="color:red";
                    return false;
                    }
                if( nombre =! (/^[\s\S]{4,10}$/.test(nombre)) ) { 
                    //alert("El nombre tiene que tener entre 4 y 10 caracterces");
                    errorNombre.innerHTML= "El nombre tiene que tener entre 4 y 10 caracterces";
                    errorNombre.style="display:visibility";
                    errorNombre.style="color:red";
                    return false;
                    }
                // if( contrasena =! (/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/.test(contrasena)) ) { 
                //     alert("La contraseña no es valida tienes que usar mayusuclas, minusculas, algun numero y un caracter especial");
                        // errorContrasena.innerHTML= "El rol tiene que ser entre uno y dos numeros";
                        // errorContrasena.style="display:visibility";
                        // errorContrasena.style="color:red";
                //     return false;
                //     }
                if( rol =! (/^(?:[0-9]|[0-9]{2})$/).test(rol) ) { 
                    //alert("El rol tiene que ser entre uno y dos numeros");
                    errorRol.innerHTML= "El rol tiene que ser entre uno y dos numeros";
                    errorRol.style="display:visibility";
                    errorRol.style="color:red";
                    return false;
                    }
                   try{
                       const data = new FormData(formulario);
                       //
                       var respuesta = await fetch("http://localhost/concurso/helper/usuarioApi.php",{
                           method: 'POST',
                           mode: 'cors',
                           cache: 'no-cache',
                           body: data,
                           headers: new Headers()
                          
                  
                       })
                       
                       console.log(respuesta);
                       alert ("Nuevo usuario creado");

                   } catch(err){
                       console.log("Ocurrio un error: "+err);
                   }
                }
        modal(formulario);
    }

})
function modal(div) {
    var modal = this.document.createElement("div");
    modal.style.position = "fixed";
    modal.style.background = "#020202";
    modal.style.opacity = 0.5;
    modal.style.top = 0;
    modal.style.left = 0;
    modal.style.width = "100%";
    modal.style.height = "100%";
    modal.style.zIndex = 100;
    document.body.appendChild(modal,titulo);

    var caja = document.createElement("div");
    var left = parseInt((window.innerWidth - 400) / 2) + "px";
    var top = parseInt((window.innerHeight - 300) / 2) + "px";

    caja.style.position = "fixed";
    caja.style.background = "#FFFFFF";
    caja.style.top = top;
    caja.style.left = left;
    caja.style.width = "600px";
    caja.style.height = "400px";
    caja.style.zIndex = 101;
    document.body.appendChild(caja);

    var titulo = document.createElement("div");
    titulo.style.position = "absolute";
    titulo.style.background = "#BBBBBB";
    titulo.style.height = "40px";
    titulo.style.width = "100%";
    titulo.style.padding= "10px";
    titulo.innerHTML="Usuario nuevo";
    caja.appendChild(titulo);

    var cerrar = document.createElement("span");
    cerrar.innerHTML="X";
    cerrar.style.position="absolute";
    cerrar.style.width="20px";
    cerrar.style.top=0;
    cerrar.style.right=0;
    cerrar.style.margin="10px";
    caja.style.overflow="hidden";
    cerrar.onclick=function(){
        var caja =this.parentElement.parentElement;
        caja.parentElement.removeChild(caja);
        modal.parentElement.removeChild(modal);
        location.reload();
    }
    titulo.appendChild(cerrar);

    var contenido = document.createElement("div");
    contenido.style.top="40px";
    contenido.style.position="absolute";
    contenido.style.height="370px";
    contenido.style.width="100%";
    contenido.style.padding ="15px";
    contenido.style.overflowY="scroll";
    caja.appendChild(contenido);
    contenido.appendChild(div)
}