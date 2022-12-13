<?php
    class RepoBanda {
        private $conexion;
        public function __construct($conexion){
            $this->conexion = $conexion;
        }

        public function crear ($id, $distancia, $rangoMinimo, $rangoMaximo){
            $query = $this->conexion->prepare("INSERT INTO bandas (id, distancia, rangoMinimo, rangoMaximo) VALUES (:id, :distancia, :rangoMinimo, :rangoMaximo)"); 
            $query->bindParam(":id", $id); 
            $query->bindParam(":distancia", $distancia); 
            $query->bindParam(":rangoMinimo", $rangoMinimo);
            $query->bindParam(":rangoMaximo", $rangoMaximo);
        
            return $query->execute();
        }

        public function actualizar($id, $distancia, $rangoMinimo, $rangoMaximo){
            $query = $this->conexion->prepare("UPDATE bandas SET distancia = :distancia, rangoMinimo = :rangoMinimo, rangoMaximo = :rangoMaximo WHERE id = :id "); 
            $query->bindParam(":id", $id); 
            $query->bindParam(":distancia", $distancia); 
            $query->bindParam(":rangoMinimo", $rangoMinimo);
            $query->bindParam(":rangoMaximo", $rangoMaximo);
        
            return $query->execute();
        }

        public function borrar($id){
            $query = $this->conexion->prepare("DELETE FROM bandas WHERE id = :id"); 
            $query->bindParam(":id", $id); 
            return $query->execute();
        }
    }
?>