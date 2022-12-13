<?php

session_start();

try{
    $conexion = new PDO("mysql:host=localhost;dbname=concursos", "root", "");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    // $conexion->query("set names utf8;");
    // $conexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    // $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
} catch (PDOException $th){
    echo 'Error connection: ' . $th->getMessage();
}

function connect(){
    try{
       // $con = new PDO( "mysql:host=localhost;dbname=concursos", "root", "");
        $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        
        $pdo = new PDO($connection, $this->user, $this->password, $options);

        return $pdo;
       // $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }catch(PDOException $e){
        print_r('Error connection: ' . $e->getMessage());
    }
}


?>