<?php
   if(isset($_POST['fecha_inicio']))
    $fecha_inicio = $_POST['fecha_inicio'];

    $fecha_inicio = ($fecha = new DateTime());

    echo 'Inicio de sesion '.$fecha_inicio->format('Y-m-d H:i:s') . "\n";
    
    if(isset($_POST['fecha_cierre']))
    $fecha_cierre = $_POST['fecha_cierre'];
    $fecha_cierre = date_create('2022-10-24');
    echo 'Cierre de sesion '.$fecha_cierre->format('Y-m-d H:i:s') . "\n";
        
        $interval = $fecha_inicio->diff($fecha_cierre);
        echo $interval->format("%H:%I:%S (Full days: %a)"), "\n";

    // logica para crear concurso
    $newConcurso = new RepoConcurso($conexion);

    if(isset($_POST['crear'])){
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
            header ("location: ?menu=administrador");
        }
    }

    if(isset($_POST['botonEliminar'])){
        echo 'borraaaaaaaaar';
        $id = $_POST["id"];
        $succes = $newConcurso->borrar($id);
        if($succes){
            header ("location: ?menu=administrador");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body> 
   
    <h1>Pantalla del administrador</h1>

    <div class="contenedor2">
        <div style="center">
        <table class="editable" >
            <thead>
                <tr>
                    <th>NOMBRE</th>
                    <th>CONTRASEÑA</th>
                    <th>ROL</th>
                </tr>
            </thead>
            <tbody> 
                <tr>
                    <td >11111111L</td>
                    <td >11111111L</td>
                    <td >josemi</td>  
                </tr>
                <tr>
                    <td >11111111L</td>
                    <td >22222222L</td>
                    <td >manolo</td>  
                </tr>
                <tr>
                    <td >11111111L</td>
                    <td >33333333L</td>
                    <td>jose</td>  
                </tr><tr>
                    <td >11111111L</td>
                    <td >44444444</td>
                    <td >alberto</td>  
                </tr>
            </tbody>
        </table>
        </div>
        
    </div>
    

    <div class="contenedor2">
        <h1>Registro de concursos</h1>
        <form action="?menu=administrador" method="POST">
            <input type="text" name="nombre" placeholder="Nombre del concurso" size="35"><br>
            <input type="text" name="distintivo" placeholder="Distintivo" size="35"><br>
            <textarea name="descripcion" id="descripcion" placeholder="Descripcion" cols="37" rows="6"></textarea><br>
            <input type="text" name="inscripcion_inicio" placeholder="Inscripcion_inicio" size="35"><br>
            <input type="text" name="inscripcion_fin" placeholder="Inscripcion_fin" size="35"><br>
            <input type="text" name="inicio_concurso" placeholder="Inicio_concurso" size="35"><br>
            <input type="text" name="fin_concurso" placeholder="Fin_concurso" size="35"><br>
            <button type="submit" name="crear">Registrar</button>
           
        </form>
    </div>

    <div class="contenedor2">

    <h2>LISTADO DE CONCURSOS</h2>
        <table class="tabla table-striped table-hover" >
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
                    
                    <form action="?menu=administrador" method="post">
                    <input type="hidden" name="id" value="<?php echo $concurso->getId()?>">
                    <button type="submit" name="botonEliminar"><i class="fa-solid fa-trash-can fa-2x"></i></button>
                    </form>
                </td>
                
            </tr>
            
           <?php } ?>
            
        </table>
            <div class="contenedor2" aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                    </li>
                </ul>
            </div>
        

    </div>
</body>
</html>