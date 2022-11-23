<?php
    class Concurso_has_modos{
        private $concurso_id;
        private $modos_id;
        private $premio;

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
         * Get the value of modos_id
         */ 
        public function getModos_id()
        {
                return $this->modos_id;
        }

        /**
         * Set the value of modos_id
         *
         * @return  self
         */ 
        public function setModos_id($modos_id)
        {
                $this->modos_id = $modos_id;

                return $this;
        }

        /**
         * Get the value of premio
         */ 
        public function getPremio()
        {
                return $this->premio;
        }

        /**
         * Set the value of premio
         *
         * @return  self
         */ 
        public function setPremio($premio)
        {
                $this->premio = $premio;

                return $this;
        }
    }

?>