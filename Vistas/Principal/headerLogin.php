<?php
    $usuarioLogueado = Usuarios::estaLogeado()? $_SESSION["usuarioLogueado"] : "";
    $usuarioData = new Usuarios($conexion, $usuarioLogueado);
    if( isset($_SESSION['nombre']) ){ //verificar si esta definida esta sesion
        $nombre_login = $_SESSION['nombre'];
    }else{
        $nombre_login = "No existe";
    }
    
    if( isset($_SESSION['rol_usuario']) ){
        $rol_login = $_SESSION['rol_usuario'];
    }else{
        $rol_login = -1;
    }
    
    if( isset($_SESSION['nombre']) && $_SESSION['rol']==1 ){
    
        include 'headerAdmin.php';
    }
    if( isset($_SESSION['nombre']) && $_SESSION['rol']==2 ){
    
        include 'headerUser.php';
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <nav class="grid--container--2">
            <div class="g--informacion">
                    <img src="img/logo_transparent.png" width="150px" alt="" >
            </div>
            <div class="g--logo">
                <a href="">Inicio</a>  &nbsp;&nbsp;&nbsp;&nbsp;
                <a href="">Landing</a> &nbsp;&nbsp;&nbsp;&nbsp;
                <a href="">Servicios</a> &nbsp;&nbsp;&nbsp;&nbsp;
                <a href="">Contactar</a> 
            </div>
            <div class="g--buttons">
                <button class="login"><a class="a2" href="?menu=login">Iniciar sesion</a></button>
                <button class="login"><a class="a2" href="?menu=registro">Registrarse</a></button>
            </div>
        </nav>
    </header> 
</body>
</html>

