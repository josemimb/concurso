<?php
include_once("c://xampp/htdocs/concurso/helper/config.php");

if (isset($_GET['menu'])) {
    //sesiones
    if ($_GET['menu'] == "inicio") {
        require_once './Vistas/Login/login.php';
    }
    if ($_GET['menu'] == "login") {
        require_once './Vistas/Login/login.php';
    }
    if ($_GET['menu'] == "cerrarsesion") {
        require_once './Vistas/Login/cerrar_sesion.php';
    }
    if ($_GET['menu'] == "registro") {
        require_once './Vistas/Login/registro.php';
    }
    
    // rol admin
    if ($_GET['menu'] == "administradorConcursos") {
        require_once './Vistas/Mantenimiento/admin/concurso.php';
    }
    if ($_GET['menu'] == "administradorUsuarios") {
        require_once './Vistas/Mantenimiento/admin/usuarios.php';
    }
    if ($_GET['menu'] == "editarConcurso" ) {
        require_once './Vistas/Mantenimiento/admin/editarConcurso.php';
    }
    if ($_GET['menu'] == "bandas" ) {
        require_once './Vistas/Mantenimiento/admin/bandas.php';
    }
    if ($_GET['menu'] == "modos" ) {
        require_once './Vistas/Mantenimiento/admin/modos.php';
    }

    //rol user
    if ($_GET['menu'] == "usuario") {
        require_once './Vistas/Mantenimiento/user/pantallaUser.php';
    }
    if ($_GET['menu'] == "inscripcion") {
        require_once './Vistas/Mantenimiento/user/participar.php';
    }
    if ($_GET['menu'] == "descargaPremio" ) {
        require_once './././domPDF.php';
    }
    if ($_GET['menu'] == "participante" ) {
        require_once './Vistas/Mantenimiento/user/participante.php';
    }
    if ($_GET['menu'] == "juez" ) {
        require_once './Vistas/Mantenimiento/user/listadoJuez.php';
    }
    if ($_GET['menu'] == "misConcursos" ) {
        require_once './Vistas/Mantenimiento/user/concursoUsuario.php';
    }
    if ($_GET['menu'] == "concursoJuez" ) {
        require_once './Vistas/Mantenimiento/user/concursoJuez.php';
    }
    
}
