<?php

    // logica para crear concurso
    $newConcurso = new RepoConcurso($conexion);
    $valida=new Validacion();
    if(isset($_POST['crear'])){
        //validamos campos
        $valida->Requerido('nombre');
        $valida->CadenaRango('nombre',9,4);
        $valida->Distintivo('distintivo');
        $valida->Requerido('descripcion');
        $valida->Requerido('inscripcion_inicio');
        $valida->Requerido('inscripcion_fin');
        $valida->Requerido('inicio_concurso');
        $valida->Requerido('fin_concurso');
        //Comprobamos validacion
        if($valida->ValidacionPasada())
        {
        $id = $usuarioData-> getId();
        $nombre = $_POST['nombre'];
        $distintivo = $_POST['distintivo'];
        $descripcion = $_POST['descripcion'];
        $inscripcion_inicio = $_POST['inscripcion_inicio'];
        $inscripcion_fin = $_POST['inscripcion_fin'];
        $inicio_concurso = $_POST['inicio_concurso'];
        $fin_concurso = $_POST['fin_concurso'];

        $succes = $newConcurso-> crear($id, $nombre, $distintivo, $descripcion, $inscripcion_inicio, $inscripcion_fin, $inicio_concurso, $fin_concurso);

        if($succes){
            header ("location: ?menu=administradorConcursos");
        }
        }
    }

    if(isset($_POST['botonEliminar'])){
        echo 'borraaaaaaaaar';
        $id = $_POST["id"];
        $succes = $newConcurso->borrar($id);
        if($succes){
            header ("location: ?menu=administradorConcursos");
        }
    }

    # Cuántos concursos mostrar por página
$concursosPorPagina = 5;
// Por defecto es la página 1; pero si está presente en la URL, tomamos esa
$pagina = 1;
if (isset($_GET["pagina"])) {
    $pagina = $_GET["pagina"];
}
# El límite es el número de concursos por página
$limit = $concursosPorPagina;
# El offset es saltar X concursos que viene dado por multiplicar la página - 1 * los concursos por página
$offset = ($pagina - 1) * $concursosPorPagina;


# Necesitamos el conteo para saber cuántas páginas vamos a mostrar
$db = new Database();
$sentencia = $db->connect()->query("SELECT count(*) AS conteo FROM concurso");
$conteo = $sentencia->fetchObject()->conteo;
# Para obtener las páginas dividimos el conteo entre los concursos por página, y redondeamos hacia arriba
$paginas = ceil($conteo / $concursosPorPagina);

# Ahora obtenemos los concursos usando ya el OFFSET y el LIMIT
$sentencia = $db->connect()->prepare("SELECT * FROM concurso LIMIT ? OFFSET ?");
$sentencia->execute([$limit, $offset]);
$concursos = $sentencia->fetchAll(PDO::FETCH_OBJ);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
</head>
<body> 
<?php
        require_once './Vistas/Principal/headerAdmin.php';
    ?>
    <div class="contenedor">
    <h2>LISTADO DE CONCURSOS</h2>
        <!-- <table class="tabla table-striped table-hover" >
            <tr>
                <th>Nombre</th>
                <th>Distintivo</th>
                <th>Decripcion</th>
                <th>Inscripcion de inicio</th>
                <th>Inscripcion fin</th>
                <th>Incio de concurso</th>
                <th>Fin de concurso</th>
                <th>Acciones</th>
            </tr>

            <?php foreach($usuarioData->getConcursos() as $concurso){ ?>
            
            <tr>
                <td><?php echo $concurso->getNombre() ?></td>
                <td><?php echo $concurso->getDistintivo() ?></td>
                <td><?php echo $concurso->getDescripcion() ?></td>
                <td><?php echo $concurso->getInscripcion_inicio() ?></td>
                <td><?php echo $concurso->getInscripcion_fin() ?></td>
                <td><?php echo $concurso->getInicio_concurso() ?></td>
                <td><?php echo $concurso->getFin_concurso() ?></td>
                <td>
                    
                    <a style="color:black" href="?menu=editarConcurso&id=<?php echo $concurso->getId()?>">
                        <i class="fa-solid fa-pen-to-square fa-3x"></i>
                    </a>
                    
                    <form action="?menu=administradorConcursos" method="post">
                    <input type="hidden" name="id" value="<?php echo $concurso->getId()?>">
                    <button type="submit" name="botonEliminar"><i class="fa-solid fa-trash-can fa-2x"></i></button>
                    </form>
                </td>
                
            </tr>
            
           <?php } ?>
            
        </table> -->

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Id Usuario</th>
                <th>Nombre</th>
                <th>Distintivo</th>
                <th>Decripcion</th>
                <th>Inscripcion de inicio</th>
                <th>Inscripcion fin</th>
                <th>Incio de concurso</th>
                <th>Fin de concurso</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($concursos as $concurso ) { ?>
                <tr>
                <td><?php echo $concurso->id_usuario ?></td> 
                <td><?php echo $concurso->nombre ?></td> 
                <td><?php echo $concurso->distintivo ?></td>
                <td><?php echo $concurso->descripcion ?></td>
                <td><?php echo $concurso->inscripcion_inicio ?></td>
                <td><?php echo $concurso->inscripcion_fin ?></td>
                <td><?php echo $concurso->inicio_concurso ?></td>
                <td><?php echo $concurso->fin_concurso ?></td>
                <td>
                    <form action="?menu=administradorConcursos" method="post">
                    <a style="color:black" href="?menu=editarConcurso&id=<?php echo $concurso->id ?>">
                        <i class="fa-solid fa-pen-to-square fa-3x"></i>
                    </a>
                    <input type="hidden" name="id" value="<?php echo $concurso->id ?>">
                    <button class="boton--sinFondo" type="submit" name="botonEliminar"><i class="fa-solid fa-trash-can fa-2x"></i></button>
                    </form>
                </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

        <nav>
            <div class="row">
                <div class="col-xs-12 col-sm-6">

                    <p>Mostrando <?php echo $concursosPorPagina ?> de <?php echo $conteo ?> concursos disponibles</p>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <p>Página <?php echo $pagina ?> de <?php echo $paginas ?> </p>
                </div>
            </div>
            <ul class="pagination">
                <!-- Si la página actual es mayor a uno, mostramos el botón para ir una página atrás -->
                <?php if ($pagina > 1) { ?>
                    <li>
                        <a class="page-link" href="?menu=administradorConcursos&pagina=<?php echo $pagina - 1 ?>">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php } ?>

                <!-- Mostramos enlaces para ir a todas las páginas. Es un simple ciclo for-->
                <?php for ($x = 1; $x <= $paginas; $x++) { ?>
                    <li class="<?php if ($x == $pagina) echo "active" ?>">
                        <a class="page-link" href="?menu=administradorConcursos&pagina=<?php echo $x ?>">
                            <?php echo $x ?></a>
                    </li>
                <?php } ?>
                <!-- Si la página actual es menor al total de páginas, mostramos un botón para ir una página adelante -->
                <?php if ($pagina < $paginas) { ?>
                    <li>
                        <a class="page-link" href="?menu=administradorConcursos&pagina=<?php echo $pagina + 1 ?>">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    </div>

    <div class="contenedor2">
        <h2>Registro de concursos</h2>
        <form action="?menu=administradorConcursos" method="POST">
            <label for="">Nombre del concurso</label><br>
            <input type="text" name="nombre" class="border" placeholder="Nombre del concurso" size="41" ><br>
            <div style="color:red; margin-bottom:10px; font-weight:bold">
                <style>
                    .border{
                        border-color: blue;
                        border-width: 2px;
                        border-style: solid;
                    }
                </style>
                <?= $valida->ImprimirError('nombre')?> 
            </div>
            <label for="">Distintivo</label><br>
            <input type="text" name="distintivo" placeholder="Distintivo" size="41"><br>
            <div style="color:red; margin-bottom:10px; font-weight:bold">
                <?= $valida->ImprimirError('distintivo')?> 
            </div>
            <label for="">Descripcion</label><br>
            <textarea name="descripcion" id="descripcion" placeholder="Descripcion" cols="40" rows="6"></textarea><br>
            <div style="color:red; margin-bottom:10px; font-weight:bold">
                <?= $valida->ImprimirError('descripcion')?> 
            </div> 
            <label for="">Inscripcion inicio</label><br>
            <input type="datetime-local" class="dateTime--anchura" name="inscripcion_inicio" placeholder="Inscripcion_inicio" size="35"><br>
            <div style="color:red; margin-bottom:10px; font-weight:bold">
                <?= $valida->ImprimirError('inscripcion_inicio')?> 
            </div>
            <label for="">Inscripcion fin</label> <br>
            <input type="datetime-local" class="dateTime--anchura" name="inscripcion_fin" placeholder="Inscripcion_fin" size="35"><br>
            <div style="color:red; margin-bottom:10px; font-weight:bold">
                <?= $valida->ImprimirError('inscripcion_fin')?> 
            </div>
            <label for="">Inicio concurso</label> <br>
            <input type="datetime-local" class="dateTime--anchura" name="inicio_concurso" placeholder="Inicio_concurso" size="35"><br>
            <div style="color:red; margin-bottom:10px; font-weight:bold">
                <?= $valida->ImprimirError('inicio_concurso')?> 
            </div>
            <label for="">Inicio fin</label> <br>
            <input type="datetime-local" class="dateTime--anchura" name="fin_concurso" placeholder="Fin_concurso" size="35"><br>
            <div style="color:red; margin-bottom:10px; font-weight:bold">
                <?= $valida->ImprimirError('fin_concurso')?> 
            </div>
            <button type="submit" name="crear">Registrar</button>
        </form>
    </div>
</body>
</html>