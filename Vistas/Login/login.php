<?php
    if(isset($_GET['cerrar_sesion'])){
        session_unset(); 

        // destroy the session 
        session_destroy(); 
    }
    
    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
                header('location: ?menu=administrador');
                //header('location: ./Principal/headerAdmin.php');
            break;

            case 2:
               header('location: ?menu=usuario');
            break;

            default:
        }
    }

    if(isset($_POST['nombre']) && isset($_POST['contraseña'])){
        $nombre = $_POST['nombre'];
        $contraseña = $_POST['contraseña'];

        $db = new Database();
        $query = $db->connect()->prepare("SELECT*FROM usuarios where nombre='$nombre' and contraseña='$contraseña'");
        $query->execute();

        $row = $query->fetch(PDO::FETCH_NUM);
        
        if($row == true){
            $rol = $row[7];
            
            $_SESSION['rol'] = $rol;
            switch($rol){
                case 1:
                    header('location: ?menu=administradorConcursos');
                break;

                case 2:
                    header('location: ?menu=usuario');
                break;

                default:
            }
        }else{
            // no existe el nombre
            echo "<div class='contenedor'>Nombre o la contraseña son incorrecto</div>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<?php
        require_once './Vistas/Principal/headerLogin.php';
    ?>
    <div class= contenedor2>
        <form action="#" method="POST">

                <i style="margin-left:30% " class="fa-solid fa-user fa-8x"></i>
                <p></p>
                <h1>Bienvenido</h1>
                <br>
                <label for="nombre">Nombre del usuario</label> <br>
                <input type="text" name="nombre" placeholder="nombre" size="35" required>
                <p></p>
                <label for="contraseña">Contraseña</label> <br>
                <input type="password" name="contraseña" placeholder="Contraseña" size="35" required>
                <p></p>
                <div class=derecha>
                    ¿No tienes cuenta?
                <a class="a--derecha" href="?menu=registro"  >Registrate</a>
                </div>
                <p></p>
                <br>
                <button style="margin-left:30% " type="submit">Inciar Sesion</button>
                
            </form>
    </div>
</body>
</html>
