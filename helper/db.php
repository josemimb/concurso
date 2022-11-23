<?php
//Creamos la clase Database que hace la conexion con nuestra base de datos
class Database{

    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

     /**
     * Constructor donde se crea la conexión
     *
     * @param  $host url del servidor
     * @param  $db nombre de la base de datos
     * @param  $user
     * @param  $password
     * @param  $charset
     */

     //session_start();
    public function __construct(){
        $this->host = 'localhost';
        $this->db = 'concursos';
        $this->user = 'root';
        $this->password = '';
        $this->charset = 'utf8mb4';
    }

    //Metodo para conectar la base de datos

    public function connect(){
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

}
?>