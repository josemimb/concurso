<?php
class Mensaje {
    private $id;
    private $distintivo;
    private $indicativo_origen;
    private $inidicativo_juez;
    private $fecha_hora;
    private $concurso_id;
    private $participacion_id;
    private $bandas_id;


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of distintivo
     */ 
    public function getDistintivo()
    {
        return $this->distintivo;
    }

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
     * Get the value of indicativo_origen
     */ 
    public function getIndicativo_origen()
    {
        return $this->indicativo_origen;
    }

    /**
     * Set the value of indicativo_origen
     *
     * @return  self
     */ 
    public function setIndicativo_origen($indicativo_origen)
    {
        $this->indicativo_origen = $indicativo_origen;

        return $this;
    }

    /**
     * Get the value of inidicativo_juez
     */ 
    public function getInidicativo_juez()
    {
        return $this->inidicativo_juez;
    }

    /**
     * Set the value of inidicativo_juez
     *
     * @return  self
     */ 
    public function setInidicativo_juez($inidicativo_juez)
    {
        $this->inidicativo_juez = $inidicativo_juez;

        return $this;
    }

    /**
     * Get the value of fecha_hora
     */ 
    public function getFecha_hora()
    {
        return $this->fecha_hora;
    }

    /**
     * Set the value of fecha_hora
     *
     * @return  self
     */ 
    public function setFecha_hora($fecha_hora)
    {
        $this->fecha_hora = $fecha_hora;

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

    /**
     * Get the value of participacion_id
     */ 
    public function getParticipacion_id()
    {
        return $this->participacion_id;
    }

    /**
     * Set the value of participacion_id
     *
     * @return  self
     */ 
    public function setParticipacion_id($participacion_id)
    {
        $this->participacion_id = $participacion_id;

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