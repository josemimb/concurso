<?php
    class Diploma {
        private $id;
        private $name;
        private $minimo;
        private $maximo;
        private $concurso_id;

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->name;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }

        /**
         * Get the value of minimo
         */ 
        public function getMinimo()
        {
                return $this->minimo;
        }

        /**
         * Set the value of minimo
         *
         * @return  self
         */ 
        public function setMinimo($minimo)
        {
                $this->minimo = $minimo;

                return $this;
        }

        /**
         * Get the value of maximo
         */ 
        public function getMaximo()
        {
                return $this->maximo;
        }

        /**
         * Set the value of maximo
         *
         * @return  self
         */ 
        public function setMaximo($maximo)
        {
                $this->maximo = $maximo;

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