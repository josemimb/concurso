<?php
    class RepoParticipar {
        private $conexion;
        public function __construct($conexion){
            $this->conexion = $conexion;
        }

        public function crear ($id, $juez, $participante_id, $concurso_id){
            $query = $this->conexion->prepare("INSERT INTO participacion (id, juez, participante_id, concurso_id) VALUES (:id, :juez, :participante_id, :concurso_id)"); 
            $query->bindParam(":id", $id); 
            $query->bindParam(":juez", $juez); 
            $query->bindParam(":participante_id", $participante_id);
            $query->bindParam(":concurso_id", $concurso_id);
        
            return $query->execute();
        }

        public function actualizar($id, $juez, $participante_id, $concurso_id){
            $query = $this->conexion->prepare("UPDATE participacion SET juez = :juez, participante_id = :participante_id, concurso_id = :concurso_id WHERE id = :id "); 
            $query->bindParam(":id", $id); 
            $query->bindParam(":juez", $juez); 
            $query->bindParam(":participante_id", $participante_id);
            $query->bindParam(":concurso_id", $concurso_id);
        
            return $query->execute();
        }

        public function borrar($id){
            $query = $this->conexion->prepare("DELETE FROM participacion WHERE id = :id"); 
            $query->bindParam(":id", $id); 
            return $query->execute();
        }
    }
?>