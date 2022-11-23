<?php
    $usuarioLogueado = Usuarios::estaLogeado()? $_SESSION["usuarioLogueado"] : "";
    $usuarioData = new Usuarios($conexion, $usuarioLogueado);
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
        <nav>
            <div class="grid--container--2">
                <div class="g--informacion">
                    <div id="header">
                        <ul class="nav">
                        <img src="img/logo_transparent.png" width="150px" alt="" >
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Concursos
                    </div>
                </div>
                <div class="g--buttons">
                    <i class="fa-solid fa-magnifying-glass fa-6 img__iconColor">&nbsp;&nbsp;<input type="search" class="input" placeholder="Buscar"></i>&nbsp;&nbsp;&nbsp;
                    <button class="login"><a class="a2" href="?menu=cerrarsesion">Cerrar sesion</a></button>
                    
                </div>
            </div>
        </nav>
    </header> 
</body>
</html>

