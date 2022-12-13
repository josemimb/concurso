<?php
//conectar workbench con phpmyadmin 
class Usuarios  {
    private $id;
    private $indicativo;
    private $email;
    private $localizacion;
    private $imagen;
    private $rol;
    private $nombre;
    private $contraseña;
    private $roles;

    /*private function __construct($id,$usuario,$correo,$localizacion,$imagen,$rol){
        $this->id=$id;
        $this->usuario=$usuario;
        $this->correo=$correo;
        $this->localizacion=$localizacion;
        $this->imagen=$imagen;
        $this->rol=$rol;
    }*/
    
    
    public function get_email(){
        return $this->email;
    }
    public function get_localizacion(){
        return $this->localizacion;
    }
    public function get_imagen(){
        return $this->imagen;
    }
    public function get_rol(){
        return $this->rol;
    }
    public function set_id ($id){
        $this->id=$id;
    }
    
    public function set_correo ($correo){
        $this->correo=$correo;
    }
    public function set_localizacion ($localizacion){
        $this->localizacion=$localizacion;
    }
    public function set_imagen ($imagen){
        $this->imagen=$imagen;
    }
    public function set_rol ($rol){
        $this->rol=$rol;
    }

    /**
     * Get the value of nombre
     */ 
    public function get_Nombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of contraseña
     */ 
    public function get_Contraseña()
    {
        return $this->contraseña;
    }

    /**
     * Set the value of contraseña
     *
     * @return  self
     */ 
    public function setContraseña($contraseña)
    {
        $this->contraseña = $contraseña;

        return $this;
    }

    /**
     * Get the value of roles
     */ 
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Set the value of roles
     *
     * @return  self
     */ 
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    private $sqlData;

    public function __construct($conexion, $usuario){
        $this->conexion=$conexion;
        $query = $conexion->prepare("SELECT *FROM usuarios WHERE nombre = :usuario");
        $query->bindParam(":usuario", $usuario);
        $query->execute();

        $this-> sqlData = $query-> fetch(PDO::FETCH_ASSOC);
    }

    public static function estaLogeado(){
        return isset($_SESSION["usuarioLogeado"]);
    }

    public function getId(){
        return $this->sqlData["id"];
    }
    public function get_Id(){
        return $this->id;
    }
    public function getNombre(){
        return $this->sqlData["nombre"];
    }public function getContraseña(){
        return $this->sqlData["contraseña"];
    }public function getEmail(){
        return $this->sqlData["email"];
    }
    // public function getDistintivo(){
    //     return $this->sqlData["indicativo"];
    // }

    public function getConcursos(){
        $id= $this->getId();

        $query = $this->conexion->prepare("SELECT *FROM concurso WHERE id_usuario = :id");
        $query->bindParam(":id", $id);
        $query->execute();

        $concursos = array();
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            $concurso = new Concurso($this->conexion, $row);
            array_push($concursos, $concurso);
        }
        return $concursos;


}


   


  }


 
   
?>