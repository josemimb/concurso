<?php
include_once("c://xampp/htdocs/concurso/helper/config.php");

$id = $usuarioData-> getId();

if (isset($_GET['menu'])) {
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
    if ($_GET['menu'] == "usuario") {
        require_once './Vistas/Mantenimiento/pantallaUser.php';
    }
    if ($_GET['menu'] == "administrador") {
        require_once './Vistas/Mantenimiento/admin.php';
    }
    if ($_GET['menu'] == "editarConcurso" ) {
        require_once './Vistas/Mantenimiento/editarConcurso.php';
    }
    if ($_GET['menu'] == "descargaPremio" ) {
        require_once 'domPDF.php';
    }
    //echo "sadsaf"."adads". $concurso->getId();
    

    
}

    
    //Añadir otras rutas
