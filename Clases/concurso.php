<?php
    class Concurso{
        private $id;
        private $nombre;
        private $distintivo;
        private $descripcion;
        private $inscripcion_inicio;
        private $inscripcion_fin;
        private $inicio_concurso;
        private $fin_concurso;

     
        /**
         * Set the value of distintivo
         *
         * @return  self
         */ 
        public function setDistintivo($distintivo)
        {
                $this->distintivo = $distintivo;

                return $this;
        }

      

        /**
         * Set the value of descripcion
         *
         * @return  self
         */ 
        public function setDescripcion($descripcion)
        {
                $this->descripcion = $descripcion;

                return $this;
        }

       

        /**
         * Set the value of inscripcion_inicio
         *
         * @return  self
         */ 
        public function setInscripcion_inicio($inscripcion_inicio)
        {
                $this->inscripcion_inicio = $inscripcion_inicio;

                return $this;
        }

       

        /**
         * Set the value of inscripcion_fin
         *
         * @return  self
         */ 
        public function setInscripcion_fin($inscripcion_fin)
        {
                $this->inscripcion_fin = $inscripcion_fin;

                return $this;
        }

      

        /**
         * Set the value of inicio_concurso
         *
         * @return  self
         */ 
        public function setInicio_concurso($inicio_concurso)
        {
                $this->inicio_concurso = $inicio_concurso;

                return $this;
        }

       

        /**
         * Set the value of fin_concurso
         *
         * @return  self
         */ 
        public function setFin_concurso($fin_concurso)
        {
                $this->fin_concurso = $fin_concurso;

                return $this;
        }
        public function getId()
        {
                return $this->id;
        }


        private $conexion, $sqlData;
        //creamos nuestro constructor
        public function __construct($conexion, $input){
                $this->conexion=$conexion;

                if(!is_array($input)){
                        $query = $conexion->prepare("SELECT * FROM concurso WHERE id = :id");
                        $query->bindParam(":id", $input);
                        $query->execute();

                        $this->sqlData = $query->fetch(PDO::FETCH_ASSOC);
                } else {
                        $this->sqlData = $input;
                }
        }
    
             public function get_Id(){
                 return $this->sqlData["id"];
             }
            public function getUserId(){
                return $this->sqlData["id_usuario"];
            }
            public function getNombre(){
                return $this->sqlData["nombre"];
            }
            public function getDistintivo(){
                return $this->sqlData["distintivo"];
            }public function getDescripcion(){
                return $this->sqlData["descripcion"];
            }public function getInscripcion_inicio(){
                return $this->sqlData["inscripcion_inicio"];
            }public function getInscripcion_fin(){
                return $this->sqlData["inscripcion_fin"];
            }public function getInicio_concurso(){
                return $this->sqlData["inicio_concurso"];
            }public function getFin_concurso(){
                return $this->sqlData["fin_concurso"];
            }
    }

?>