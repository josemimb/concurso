<?php
include "db.php";
class Sesion extends Database
{
    const SESION_INIT = TRUE;
    const SESION_NO_INIT = FALSE;

    private $edoSesion = self::SESION_NO_INIT;

    private static $instancia;

    public function __construct()
    {
        parent::__construct();
    }
    public static function iniciar()
    {
        if($this->edoSesion == self::SESION_NO_INIT){
            $this->edoSesion = session_start();
        }
        return $this->edoSesion;
    }

    public static function leer(string $clave)
    {
        if (isset($_SESSION[$clave])) {
            return $_SESSION[$clave];
        }
    }

    public static function existe(string $clave)
    {
        
    }

    public static function escribir($clave,$valor)
    {
        $_SESSION[$clave] = $valor;
    }

    public static function eliminar($clave)
    {
        unset($_SESSION[$clave]);
    }
}