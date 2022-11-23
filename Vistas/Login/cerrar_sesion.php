<?php
session_start();
//header('location: ./Vistas/Mantenimiento/admin.php');

header('location: ?menu=login');
// Destruye la sesion actual
//$fecha = new DateTime();
session_destroy();

/* que me sirve en la base de datos concurso a mi header ponerle el login */
?>