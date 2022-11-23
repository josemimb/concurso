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
        echo '<script src="js/libreriaUsuario.js"></script>';
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

