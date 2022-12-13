<?php
    class RepoModo {
        private $conexion;
        public function __construct($conexion){
            $this->conexion = $conexion;
        }

        public function crear ($id, $nombre){
            $query = $this->conexion->prepare("INSERT INTO modos (id, nombre) VALUES (:id, :nombre)"); 
            $query->bindParam(":id", $id); 
            $query->bindParam(":nombre", $nombre); 
        
            return $query->execute();
        }

        public function actualizar($id, $nombre){
            $query = $this->conexion->prepare("UPDATE modos SET nombre = :nombre WHERE id = :id "); 
            $query->bindParam(":id", $id); 
            $query->bindParam(":nombre", $nombre); 
            
            return $query->execute();
        }

        public function borrar($id){
            $query = $this->conexion->prepare("DELETE FROM modos WHERE id = :id"); 
            $query->bindParam(":id", $id); 
            return $query->execute();
        }
    }
?>