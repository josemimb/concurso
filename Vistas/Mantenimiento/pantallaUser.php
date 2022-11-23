<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <a href="?menu=descargaPremio">pdf</a>

<div class="contenedor2">

    <h2>LISTADO DE CONCURSOS</h2>
        <?php
            foreach($usuarioData->getConcursos() as $concurso){ ?>
            <div>
                <span><?php echo $concurso->getNombre() ?></span>
                <span><?php echo $concurso->getDistintivo() ?></span>
                <span><?php echo $concurso->getDescripcion() ?></span>
                <span><?php echo $concurso->getInscripcion_inicio() ?></span>
                <span><?php echo $concurso->getInscripcion_fin() ?></span>
                <span><?php echo $concurso->getInicio_concurso() ?></span>
                <span><?php echo $concurso->getFin_concurso() ?></span>
            </div>

           <?php }
        ?>

    </div>
    
    <div class="contenedor">
        <div class="contenedor2">
            <form action="#" method="POST">
            <h1>Inscripcion para el Concurso</h1>
            <br>
            <label for="">Inscripcion:</label> 
            <input type="text" id="nombre" placeholder="Usuario"><p></p>
            <label for="">Correo:</label> 
            <input type="text" id="correo" placeholder="Email"><p></p>
            <label for="">Localizacion:</label> <br>
            <iframe style="margin:20px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25227.38349408476!2d-3.814374576008666!3d37.78012697364766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6dd713cb5302c7%3A0x9cfb2c858b405702!2zSmHDqW4!5e0!3m2!1ses!2ses!4v1667941256946!5m2!1ses!2ses" width="400" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <p></p>
                <label for="">Imagen:</label> 
            <input type="file" id="imagen" placeholder="imagen"><p></p>

            <button type="submit">Registrar</button>

            </form>
        </div>
    </div>
</body>
</html>