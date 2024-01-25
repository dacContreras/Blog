<!-- iniciamos sesion -->
<?php session_start();

// destruimos la sesion
session_destroy();

// reiniciamos el arreglo
$_SESSION = array();

// lo mandamos al inicio
header('Location: ../');

// matamos la ejecucion de la pagina
die();