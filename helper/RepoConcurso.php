<?php
    class RepoConcurso {
        private $conexion;
        public function __construct($conexion){
            $this->conexion = $conexion;
        }

        public function crear ($id_usuario, $nombre, $distintivo, $descripcion, $inscripcion_inicio, $inscripcion_fin, $inicio_concurso, $fin_concurso){
            $query = $this->conexion->prepare("INSERT INTO concurso (id_usuario, nombre, distintivo, descripcion, inscripcion_inicio, inscripcion_fin, inicio_concurso, fin_concurso) VALUES (:idusuario, :nombre, :distintivo, :descripcion, :inscripcionInicio, :inscripcionFin, :inicioConcurso, :finConcurso)"); 
            $query->bindParam(":idusuario", $id_usuario); 
            $query->bindParam(":nombre", $nombre); 
            $query->bindParam(":distintivo", $distintivo);
            $query->bindParam(":descripcion", $descripcion);
            $query->bindParam(":inscripcionInicio", $inscripcion_inicio);
            $query->bindParam(":inscripcionFin", $inscripcion_fin);
            $query->bindParam(":inicioConcurso", $inicio_concurso);
            $query->bindParam(":finConcurso", $fin_concurso);
        
            return $query->execute();
        }

        public function actualizar($id, $nombre, $distintivo, $descripcion, $inscripcion_inicio, $inscripcion_fin, $inicio_concurso, $fin_concurso){
            $query = $this->conexion->prepare("UPDATE concurso SET nombre = :nombre, distintivo = :distintivo, descripcion = :descripcion, inscripcion_inicio = :inscripcionInicio, inscripcion_fin = :inscripcionFin, inicio_concurso = :inicioConcurso, fin_concurso = :finConcurso WHERE id = :id "); 
            $query->bindParam(":id", $id); 
            $query->bindParam(":nombre", $nombre); 
            $query->bindParam(":distintivo", $distintivo);
            $query->bindParam(":descripcion", $descripcion);
            $query->bindParam(":inscripcionInicio", $inscripcion_inicio);
            $query->bindParam(":inscripcionFin", $inscripcion_fin);
            $query->bindParam(":inicioConcurso", $inicio_concurso);
            $query->bindParam(":finConcurso", $fin_concurso);
        
            return $query->execute();
        }

        public function borrar($id){
            $query = $this->conexion->prepare("DELETE FROM concurso WHERE id = :id"); 
            $query->bindParam(":id", $id); 
            return $query->execute();
        }
    }
?>