<?php
    class Concurso_has_bandas{
        private $concurso_id;
        private $bandas_id;

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

        /**
         * Get the value of bandas_id
         */ 
        public function getBandas_id()
        {
                return $this->bandas_id;
        }

        /**
         * Set the value of bandas_id
         *
         * @return  self
         */ 
        public function setBandas_id($bandas_id)
        {
                $this->bandas_id = $bandas_id;

                return $this;
        }
    }

?>