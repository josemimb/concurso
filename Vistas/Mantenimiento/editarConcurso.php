<?php

   /* if (!Usuarios::estaLogeado()){
        header("Location: ?menu=editConcurso?id=6");
    }*/
    // logica para editar concurso
    $newRepoConcurso = new RepoConcurso($conexion);

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $newConcurso = new Concurso($conexion, $id);
    }

    if(isset($_POST["editConcurso"])){
        //echo "ENVIADO";
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $distintivo = $_POST['distintivo'];
        $descripcion = $_POST['descripcion'];
        $inscripcion_inicio = $_POST['inscripcion_inicio'];
        $inscripcion_fin = $_POST['inscripcion_fin'];
        $inicio_concurso = $_POST['inicio_concurso'];
        $fin_concurso = $_POST['fin_concurso'];

        $succes = $newRepoConcurso->actualizar($id, $nombre, $distintivo, $descripcion, $inscripcion_inicio, $inscripcion_fin, $inicio_concurso, $fin_concurso);

        
        if($succes){
            header("location: ?menu=administrador");
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body> 
    <h1>Ediccion del Concurso</h1>
    <div class="contenedor2">
        <form action="#" method="POST">
            <input type="text" name="nombre" value="<?php echo $newConcurso->getNombre()?>" size="35"><br>
            <input type="text" name="distintivo" value="<?php echo $newConcurso->getDistintivo()?>" size="35"><br>
            <textarea name="descripcion" id="descripcion" value="<?php echo $newConcurso->getDescripcion()?>" cols="37" rows="10"></textarea><br>
            <input type="text" name="inscripcion_inicio" value="<?php echo $newConcurso->getInscripcion_inicio()?>" size="35"><br>
            <input type="text" name="inscripcion_fin" value="<?php echo $newConcurso->getInscripcion_fin()?>" size="35" ><br>
            <input type="text" name="inicio_concurso" value="<?php echo $newConcurso->getInicio_concurso()?>" size="35"><br>
            <input type="text" name="fin_concurso" value="<?php echo $newConcurso->getFin_concurso()?>" size="35"><br>
            <input type="hidden" name="id" value="<?php echo $_GET['id']?>  ">

            <button type="submit" name="editConcurso" >Editar</button>

            
        </form>
    </div>
</body>
</html>