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
                        <ul class="nav">
                        <img src="img/logo_transparent.png" width="150px" alt="" >
           <?php echo ucwords($usuarioData->getId());?> <br> 

                </div>        
                <div class="g--logo" style="margin-right:17%">
                    <a href="?menu=administradorConcursos">Concursos</a> 
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="?menu=administradorUsuarios">Usuarios</a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="?menu=modos">Modos</a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="?menu=bandas">Bandas</a>
                </div>
                <div class="g--buttons" style="margin-left:31%">
                    <i class="fa-solid fa-magnifying-glass fa-6 img__iconColor input--header">&nbsp;&nbsp;<input type="search" class="input" placeholder="Buscar" size=15></i>&nbsp;&nbsp;&nbsp;
                    <button class="login"><a class="a2" href="?menu=cerrarsesion">Cerrar sesion</a></button>
                    
                </div>
            </div>
        </nav>

    </header> 
</body>
</html>

