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
    <nav class="contenedor2">
        <h2>Participantes del concurso</h2>
        <div class="contenedor2">
            ID del usuario <?php echo $usuarioData->getId()?> <br> <p></p>
            <button>Ver mensajes</button>
        </div> 
    </nav>
    <nav class="contenedor2">
        <h2>Publicar puntuaciones del concurso</h2>
    </nav>   
</body>
</html>