<?php
    class Bandas {
        private $id;
        private $identificador;
        private $distancia;
        private $rango;
        /**
         * Get the value of identificador
         */ 
        public function getIdentificador()
        {
                return $this->identificador;
        }

        /**
         * Set the value of identificador
         *
         * @return  self
         */ 
        public function setIdentificador($identificador)
        {
                $this->identificador = $identificador;

                return $this;
        }

        /**
         * Get the value of distancia
         */ 
        public function getDistancia()
        {
                return $this->distancia;
        }

        /**
         * Set the value of distancia
         *
         * @return  self
         */ 
        public function setDistancia($distancia)
        {
                $this->distancia = $distancia;

                return $this;
        }

        /**
         * Get the value of rango
         */ 
        public function getRango()
        {
                return $this->rango;
        }

        /**
         * Set the value of rango
         *
         * @return  self
         */ 
        public function setRango($rango)
        {
                $this->rango = $rango;

                return $this;
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }
    }

?>