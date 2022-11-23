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
                    header('location: ?menu=administrador');
                break;

                case 2:
                    header('location: ?menu=usuario');
                break;

                default:
            }
        }else{
            // no existe el nombre
            echo "<div class='contenedor'>Nombre de nombre o contraseña incorrecto</div>";
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
    <div class= contenedor>
        <div class= contenedor2>
        <form action="#" method="POST">

                <i class="fa-solid fa-user fa-8x"></i>
                <h1>Bienvenido</h1>
                <br>
                <input type="text" name="nombre" placeholder="nombre" size="30">
                <p></p>
                <input type="text" name="contraseña" placeholder="Contraseña" size="30">
                <p></p>
                <div class=derecha>
                <a class="a--derecha" href="?menu=registro"  >Registrate</a>
                </div>
                <p></p>
                <br>
                <button type="submit">Inciar Sesion</button>
                
            </form>
    
        </div>

            
    </div>

</body>
</html>
