<?php

$newConcurso = new RepoConcurso($conexion);

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
<?php
        require_once './Vistas/Principal/headerUser.php';
    ?>
    <a href="?menu=descargaPremio">pdf</a>
    <h2 >LISTADO DE CONCURSOS</h2>
        <?php
            foreach($usuarioData->getConcursos() as $concurso){ ?>
            <div class="contenedoor">
                <img class="margen-imagen" src="./././img/logo_transparent.png" width="90%" height="200px" alt="...">
  <div class="card-body">
    <h3 class="card-title"><?php echo $concurso->getNombre() ?></h3>
    <p class="card-text">Este concurso consiste en: <?php echo $concurso->getDescripcion() ?></p>
    <p>Fecha de Inscripcion: <b> <?php echo $concurso->getInscripcion_inicio() ?></b>  hasta: <b><?php echo $concurso->getInscripcion_fin() ?></b></p>
    <p>El concurso se inicia el dia: <b> <?php echo $concurso->getInicio_concurso() ?> </b> y se termina el dia: <b> <?php echo $concurso->getFin_concurso() ?></b></p>
  </div>
    <button class="boton"><a href="?menu=inscripcion&id=<?php echo $concurso->get_Id()?>">PARTICIPAR</a> </button> <p>
    <!-- <button id="?menu=juez"><a href="?menu=juez">Juez</a> </button> <p> -->
</div>

           <?php }
        ?>
    
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