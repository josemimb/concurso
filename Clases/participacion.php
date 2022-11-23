<?php
    class Participacion{
        private $id;
        private $juez;
        private $participante_id;
        private $concurso_id;
        

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Get the value of juez
         */ 
        public function getJuez()
        {
                return $this->juez;
        }

        /**
         * Set the value of juez
         *
         * @return  self
         */ 
        public function setJuez($juez)
        {
                $this->juez = $juez;

                return $this;
        }

        /**
         * Get the value of participante_id
         */ 
        public function getParticipante_id()
        {
                return $this->participante_id;
        }

        /**
         * Set the value of participante_id
         *
         * @return  self
         */ 
        public function setParticipante_id($participante_id)
        {
                $this->participante_id = $participante_id;

                return $this;
        }

        /**
         * Get the value of concurso_id
         */ 
        public function getConcurso_id()
        {
                return $this->concurso_id;
        }

        /**
         * Set the value of concurso_id
         *
         * @return  self
         */ 
        public function setConcurso_id($concurso_id)
        {
                $this->concurso_id = $concurso_id;

                return $this;
        }
    }

?>