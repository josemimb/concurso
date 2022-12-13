<?php
    error_reporting(0);

    $newRepoParticipar = new RepoParticipar($conexion);

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $newConcurso = new Concurso($conexion, $id);

        if(isset($_POST["inscripcion"])){

            $id = $_POST['id'];
            $juez = $_POST['juez'];
            $participante_id = $_POST['participante_id'];
            $concurso_id = $_POST['concurso_id'];
            $succes = $newRepoParticipar-> crear($id, $juez, $participante_id, $concurso_id);
            //echo "ENVIADO";
            if($succes){
                if (isset($_REQUEST["juez"])) {
                    header("location: ?menu=concursoJuez&id=".$newConcurso->get_Id()."");
                } else {
                    header("location: ?menu=participante&id=".$newConcurso->get_Id()."");
                }
            }
            $error = "NO TE PUEDES INSCRIBIR YA ESTAS PARTICIPANDO EN ESTE CONCURSO";
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
</head>
<body> 

<?php
        require_once './Vistas/Principal/headerUser.php';
    ?>
        <div class="contenedor2">
        <h1 style="text-align:center" >Inscripcion para el concurso <?php echo $newConcurso->getNombre()?> </h1>
            <form action="" method="POST">
                <label for="juez">¿Como quieres participar?</label> <br>
                <input type="checkbox" name="juez" value="1" size="35">Juez<br>
                <input type="checkbox" name="" value="0" size="35"> Participante<br>
                
                <!-- <label for="juez">Tu id de usuario</label> <br> -->
                <input type="hidden" name="participante_id" value="<?php echo $newConcurso->getUserId()?>" size="35"><br>
                <!-- <label for="juez">Id del concurso</label> <br> -->
                <input type="hidden" name="concurso_id" value="<?php echo $newConcurso->get_Id()?>"size="35"><br>
                
                <input type="hidden" name="id" value="<?php echo $_GET['id']?>  ">

                <button type="submit" style="margin-left:30% "  name="inscripcion" > Inscribete</button>
                
            </form>
            <IfModule lsapi_module style="color:red; margin:auto; margin-top:20px">
                
                <?php echo $error ?>
                </IfModule>
        </div>
    <a href="?menu=participante&id=<?php echo $newConcurso->get_Id()?>">Participante</a>
</table>
</body>
</html>