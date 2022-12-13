<?php
    //logica para crear banda
    $newbanda = new Repobanda($conexion);

    if(isset($_POST['crear'])){
        //$id = $usuarioData-> getId();
        $id = $_POST['id'];
        $distancia = $_POST['distancia'];
        $rangoMinimo = $_POST['rangoMinimo'];
        $rangoMaximo = $_POST['rangoMaximo'];

        $succes = $newbanda-> crear($id, $distancia, $rangoMinimo, $rangoMaximo);

        if($succes){
            header ("location: ?menu=bandas");
        }
    }

    if(isset($_POST['botonEliminar'])){
        $id = $_POST["id"];
        $succes = $newbanda->borrar($id);
        if($succes){
            header ("location: ?menu=bandas");
        }
    }

    # Cuántos bandas mostrar por página
    $bandasPorPagina = 3;
    // Por defecto es la página 1; pero si está presente en la URL, tomamos esa
    $pagina = 1;
    if (isset($_GET["pagina"])) {
        $pagina = $_GET["pagina"];
    }
    # El límite es el número de bandas por página
    $limit = $bandasPorPagina;
    # El offset es saltar X bandas que viene dado por multiplicar la página - 1 * los bandas por página
    $offset = ($pagina - 1) * $bandasPorPagina;
    # Necesitamos el conteo para saber cuántas páginas vamos a mostrar
    $db = new Database();
    $sentencia = $db->connect()->query("SELECT count(*) AS conteo FROM bandas");
    $conteo = $sentencia->fetchObject()->conteo;
    # Para obtener las páginas dividimos el conteo entre los bandas por página, y redondeamos hacia arriba
    $paginas = ceil($conteo / $bandasPorPagina);
    # Ahora obtenemos los bandas usando ya el OFFSET y el LIMIT
    $sentencia = $db->connect()->prepare("SELECT * FROM bandas LIMIT ? OFFSET ?");
    $sentencia->execute([$limit, $offset]);
    $bandas = $sentencia->fetchAll(PDO::FETCH_OBJ);
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
   
    <h1>Mantenimiento de bandas</h1>
    
    <div class="contenedor">
        <h2>Listado de bandas</h2>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>distancia</th>
                <th>Rango minimo</th>
                <th>Rango maximo</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($bandas as $banda ) { ?>
                <tr>
                <td><?php echo $banda->id ?></td> 
                <td><?php echo $banda->distancia ?> metros</td> 
                <td><?php echo $banda->rangoMinimo ?> KHz</td>
                <td><?php echo $banda->rangoMaximo ?> KHz</td>
                <td>
                    <form action="?menu=bandas" method="post">
                    <a style="color:black" href="?menu=editarbanda&id=<?php echo $banda->id ?>">
                        <i class="fa-solid fa-pen-to-square fa-3x"></i>
                    </a>
                    <input type="hidden" name="id" value="<?php echo $banda->id ?>">
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

                    <p>Mostrando <?php echo $bandasPorPagina ?> de <?php echo $conteo ?> bandas disponibles</p>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <p>Página <?php echo $pagina ?> de <?php echo $paginas ?> </p>
                </div>
            </div>
            <ul class="pagination">
                <!-- Si la página actual es mayor a uno, mostramos el botón para ir una página atrás -->
                <?php if ($pagina > 1) { ?>
                    <li>
                        <a class="page-link" href="?menu=bandas&pagina=<?php echo $pagina - 1 ?>">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php } ?>

                <!-- Mostramos enlaces para ir a todas las páginas. Es un simple ciclo for-->
                <?php for ($x = 1; $x <= $paginas; $x++) { ?>
                    <li class="<?php if ($x == $pagina) echo "active" ?>">
                        <a class="page-link" href="?menu=bandas&pagina=<?php echo $x ?>">
                            <?php echo $x ?></a>
                    </li>
                <?php } ?>
                <!-- Si la página actual es menor al total de páginas, mostramos un botón para ir una página adelante -->
                <?php if ($pagina < $paginas) { ?>
                    <li>
                        <a class="page-link" href="?menu=bandas&pagina=<?php echo $pagina + 1 ?>">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    </div>
    <div class="contenedor2">
        <h2>Registro de bandas</h2>
        <form action="?menu=bandas" method="POST">
            <label for="">Id</label><br>
            <input type="input" name="id" placeholder="Id" size="35"><br>
            <label for="">Distancia</label><br>
            <input type="input" name="distancia" placeholder="Distancia" size="35" required><br>
            <label for="">Rango maximo</label><br>
            <input type="input" name="rangoMinimo" placeholder="Rango minimo" size="35" required><br>
            <label for="">Rango minimo</label><br>
            <input type="input" name="rangoMaximo" placeholder="Rango maximo" size="35" required><br>
            <button type="submit" name="crear">Registrar</button>
        </form>
    </div>
</body>
</html>