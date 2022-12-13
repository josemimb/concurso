    
<?php
    //logica para crear modo
    $newmodo = new Repomodo($conexion);

    if(isset($_POST['crear'])){
        //$id = $usuarioData-> getId();
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];

        $succes = $newmodo-> crear($id, $nombre);

        if($succes){
            header ("location: ?menu=modos");
        }
    }

    if(isset($_POST['botonEliminar'])){
        $id = $_POST["id"];
        $succes = $newmodo->borrar($id);
        if($succes){
            header ("location: ?menu=modos");
        }
    }

    # Cuántos modos mostrar por página
    $modosPorPagina = 3;
    // Por defecto es la página 1; pero si está presente en la URL, tomamos esa
    $pagina = 1;
    if (isset($_GET["pagina"])) {
        $pagina = $_GET["pagina"];
    }
    # El límite es el número de modos por página
    $limit = $modosPorPagina;
    # El offset es saltar X modos que viene dado por multiplicar la página - 1 * los modos por página
    $offset = ($pagina - 1) * $modosPorPagina;
    # Necesitamos el conteo para saber cuántas páginas vamos a mostrar
    $db = new Database();
    $sentencia = $db->connect()->query("SELECT count(*) AS conteo FROM modos");
    $conteo = $sentencia->fetchObject()->conteo;
    # Para obtener las páginas dividimos el conteo entre los modos por página, y redondeamos hacia arriba
    $paginas = ceil($conteo / $modosPorPagina);
    # Ahora obtenemos los modos usando ya el OFFSET y el LIMIT
    $sentencia = $db->connect()->prepare("SELECT * FROM modos LIMIT ? OFFSET ?");
    $sentencia->execute([$limit, $offset]);
    $modos = $sentencia->fetchAll(PDO::FETCH_OBJ);
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
        require_once './Vistas/Principal/headerAdmin.php';
    ?>
   
    <h1>Mantenimiento de modos</h1>
    
    <div class="contenedor">
        <h2>Listado de modos</h2>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($modos as $modo ) { ?>
                <tr>
                <td><?php echo $modo->id ?></td> 
                <td><?php echo $modo->nombre ?></td> 
                <td>
                    
                    <form action="?menu=modos" method="post">
                    <a style="color:black" href="?menu=editarmodo&id=<?php echo $modo->id ?>">
                        <i class="fa-solid fa-pen-to-square fa-3x"></i>
                    </a>
                    <input type="hidden" name="id" value="<?php echo $modo->id ?>">
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

                    <p>Mostrando <?php echo $modosPorPagina ?> de <?php echo $conteo ?> modos disponibles</p>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <p>Página <?php echo $pagina ?> de <?php echo $paginas ?> </p>
                </div>
            </div>
            <ul class="pagination">
                <!-- Si la página actual es mayor a uno, mostramos el botón para ir una página atrás -->
                <?php if ($pagina > 1) { ?>
                    <li>
                        <a class="page-link" href="?menu=modos&pagina=<?php echo $pagina - 1 ?>">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php } ?>

                <!-- Mostramos enlaces para ir a todas las páginas. Es un simple ciclo for-->
                <?php for ($x = 1; $x <= $paginas; $x++) { ?>
                    <li class="<?php if ($x == $pagina) echo "active" ?>">
                        <a class="page-link" href="?menu=modos&pagina=<?php echo $x ?>">
                            <?php echo $x ?></a>
                    </li>
                <?php } ?>
                <!-- Si la página actual es menor al total de páginas, mostramos un botón para ir una página adelante -->
                <?php if ($pagina < $paginas) { ?>
                    <li>
                        <a class="page-link" href="?menu=modos&pagina=<?php echo $pagina + 1 ?>">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    </div>
    <div class="contenedor2">
        <h2>Registro de modos</h2>
        <form action="?menu=modos" method="POST">
            <input type="input" class="form-input" name="id" placeholder="Id" size="40" ><br>
            <input type="text" class="form-input" name="nombre" placeholder="nombre" size="40" required><br>
            <button type="submit" name="crear">Registrar</button>
        </form>
    </div>
</body>
</html>