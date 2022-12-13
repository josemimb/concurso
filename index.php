<?php
class Principal
{
    public static function main()
    {
        //include_once("c://xampp/htdocs/concurso/helper/config.php");
        //include_once("c://xampp/htdocs/concurso/helper/db.php");
        require_once './cargadores/cargador.php';
        require_once './helper/sesion.php';
        require_once './Vistas/Principal/layout.php';
        //require_once './helper/bd.php';
        //require_once './helper/config.php';
        echo '<link rel=stylesheet href=css/main.css>';
        echo ' <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" /> ';
    //echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">';
        echo '<script src="JS/libreriaUsuario.js"></script>';
        //echo '<script src="js/funcionamiento.js"> </script> ';
        echo '<script src="js/Alumno.js"></script>';
        //echo '<script src="js/Clase.js"></script>';
        echo '<script src="js/ajax.js"></script>';
        //echo '<script src="js/tabla.js"></script>';
        echo '<script src="js/mostrarUsuarios.js"></script>';
    
    
    }
}
Principal::main();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 
</body>
</html>

