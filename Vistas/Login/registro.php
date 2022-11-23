<?php
    $newCuenta = new Cuenta ($conexion);
   
    if (isset($_POST["submitButton"])){
        $indicativo = $_POST["indicativo"];
        $email = $_POST["email"];
        $localizacion = $_POST["localizacion"];
        $imagen = $_POST["imagen"];
        //$roles = $_POST["roles"];
        $nombre = $_POST["nombre"];
        $contraseña = $_POST["contraseña"];
        $rol = $_POST["rol"];

        //echo $nombre;

        $listo = $newCuenta->registrar ($indicativo, $email, $localizacion, $imagen, $nombre, $contraseña, $rol);


        if ($listo) {
            header("Location: ?menu=usuario ");
        } else {
            echo "no se registro";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
        <div class="contenedor">
            <div class="contenedor2">
                <!-- <form action="registro.php" method="POST"> 
                <form action="?menu=___" method="POST">    
                -->
                <form action="#" method="POST">
                <i class="fa-solid fa-user fa-8x"></i>
                <p></p>
                <h1>Registrate</h1>
                <br>
                <input type="text" name="nombre" placeholder="Ingresa nombre completo"> <br>
                <input type="text" name="email" placeholder="email"> <br>
                <input type="text" name="indicativo" placeholder="Indicativo"> <br>
                <input type="text" name="localizacion" placeholder="Localizacion"> <br>
                <input type="text" name="imagen" placeholder="imagen"> <br>
                <input type="text" name="contraseña" placeholder="Contraseña"> <br>
                <input type="text" name="rol" placeholder="rol"> <br>
                <button type="submit" name="submitButton">Crear Cuenta</button>
                </form>
                <a href="?menu=login">login</a>
            </div>
        </div>
</body>
</html>