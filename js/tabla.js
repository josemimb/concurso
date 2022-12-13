const cuerpoTabla = document.querySelector("#cuerpoTabla");

const obtenerUsuarios = async () => {
    // Es una petición GET, no necesitamos indicar el método ni el cuerpo
    const respuestaRaw = await fetch("http://localhost/concurso/helper/usuarioApi.phph");
    const usuarios = await respuestaRaw.json();
    // Limpiamos la tabla
    cuerpoTabla.innerHTML = "";
    // Ahora ya tenemos a los usuarios. Los recorremos
    for (const usuario of usuarios) {
        // Vamos a ir adjuntando elementos a la tabla.
        const $fila = document.createElement("tr");
        // La celda del nombre
        const $celdaNombre = document.createElement("td");
        // Colocamos su valor y lo adjuntamos a la fila
        $celdaNombre.innerText = usuario.nombre;
        $fila.appendChild($celdaNombre);
        // Lo mismo para lo demás
        const $celdaDescripcion = document.createElement("td");
        $celdaDescripcion.innerText = usuario.descripcion;
        $fila.appendChild($celdaDescripcion);
        const $celdaPrecio = document.createElement("td");
        $celdaPrecio.innerText = usuario.precio;
        $fila.appendChild($celdaPrecio);
        // Extraer el id del usuario en el que estamos dentro del ciclo
        const idusuario = usuario.id;
        // Link para eliminar
        const $linkEditar = document.createElement("a");
        $linkEditar.href = "./editar_usuario.php?id=" + idusuario;
        $linkEditar.innerHTML = `<i class="fa fa-edit"></i>`;
        $linkEditar.classList.add("button", "is-warning");
        const $celdaLinkEditar = document.createElement("td");
        $celdaLinkEditar.appendChild($linkEditar);
        $fila.appendChild($celdaLinkEditar);

        // Para el botón de eliminar primero creamos el botón, agregamos su listener y luego lo adjuntamos a su celda
        const $botonEliminar = document.createElement("button");
        $botonEliminar.classList.add("button", "is-danger")
        $botonEliminar.innerHTML = `<i class="fa fa-trash"></i>`;
        $botonEliminar.onclick = async () => {
          
        };
        const $celdaBoton = document.createElement("td");
        $celdaBoton.appendChild($botonEliminar);
        $fila.appendChild($celdaBoton);
        // Adjuntamos la fila a la tabla
        cuerpoTabla.appendChild($fila);
    }
};