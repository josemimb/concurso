<?php 
    class Cuenta {
        private $conexion;
        public function __construct($conexion){
            $this->conexion = $conexion;
        }
        public function registrar ($indicativo, $email,  $localizacion, $imagen, $nombre, $contraseña, $rol){
            //return $localizacion;
            $success = $this->insertarDB($indicativo, $email,  $localizacion, $imagen, $nombre, $contraseña, $rol);

            if ($success){
                return true;
            }
            else {
                return false;
            }
          }
        
          //$stmt = $db->prepare("INSERT INTO nombres (nombre, contraseña) VALUES (?, ?)");
          private function insertarDB($in, $e, $l, $im, $u, $c, $r){
            //$query = $db->connect()->prepare("SELECT*FROM nombres where nombre='$nombre' and contraseña='$contraseña'");
            //para cifrar contraseña
            /*
            $option = array( 
                'cost' => 10
            );
            $passHashed = password_hash ($c, PASSWORD_BCRYPT, $option);
*/
            $query = $this->conexion->prepare("INSERT INTO usuarios (indicativo, email, localizacion, imagen, nombre, contraseña, rol) VALUES ( :indicativo, :email, :localizacion, :imagen, :nombre, :pass, :rol)"); 
            $query->bindParam(":indicativo", $in);
            $query->bindParam(":email", $e);
            $query->bindParam(":localizacion", $l);
            $query->bindParam(":imagen", $im);
            $query->bindParam(":nombre", $u);
            $query->bindParam(":pass", $c);
            $query->bindParam(":rol", $r);
        
        
            return $query->execute();
          }
    }
    
?>