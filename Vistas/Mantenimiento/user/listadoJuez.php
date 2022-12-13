<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
        require_once './Vistas/Principal/headerUser.php';
    ?>

    <h2>Has sido juez en los concursos: </h2>

        <?php
            foreach($usuarioData->getConcursos() as $concurso){ 
                if($concurso->getUserId()== $concurso->getUserId()){?>
            <div class="contenedoor">
                <img class="margen-imagen" src="./././img/logo_transparent.png" width="90%" height="200px" alt="...">
            <div class="card-body">
                <h3 class="card-title"><?php echo $concurso->getNombre() ?></h3>
                <p class="card-text">Este concurso consiste en: <?php echo $concurso->getDescripcion() ?></p>
                <p>Fecha de Inscripcion: <b> <?php echo $concurso->getInscripcion_inicio() ?></b>  hasta: <b><?php echo $concurso->getInscripcion_fin() ?></b></p>
                <p>El concurso se inicia el dia: <b> <?php echo $concurso->getInicio_concurso() ?> </b> y se termina el dia: <b> <?php echo $concurso->getFin_concurso() ?></b></p>
            </div>
                <button class="boton"><a href="?menu=inscripcion&id=<?php echo $concurso->get_Id()?>">ver mensajes</a> </button> <p>
                <!-- <button id="?menu=juez"><a href="?menu=juez">Juez</a> </button> <p> -->
            </div>
        <?php }
    } ?>
    <div class="contenedor2">
    <h2>Eres juez en los concursos aun activos:</h2>
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
                <button id="?menu=juez"><a href="?menu=juez">Juez</a> </button>
                <button id="?menu=juez"><a href="?menu=participante">Participante</a> </button>
            </div>
           <?php }
        ?>
    </div>
</body>
</html>