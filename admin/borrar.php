<!-- iniciamos sesion -->
<?php session_start();

// cargamos la configuracion y las funcines
require 'config.php';
require '../funciones.php';

// comprabamos la sesion
comprobarSession();

// hacemos la conexion
$conexion = conexion($bd_config);

// si no hay conexion lo redireccionamos a la pagina de error
if (!$conexion) {
    header('Location: ../error.php');
}

// guardamos el id ya limpiado
$id = limpiarDatos($_GET['id']);

// si el id esta vacio o no hay, lo reddireccionamos al admin
if(!$id){
    header('Location: '. RUTA . '/admin');
}

// creamos nuestra consulta sql
$statement = $conexion->prepare('DELETE FROM articulos WHERE id = :id');

// ejecutamos la consulta
$statement->execute(array('id' => $id));

// redireccionamos al admin
header('Location: ' . RUTA . '/admin');