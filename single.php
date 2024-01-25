<?php
// cargamos la configuracion y las funciones
require 'admin/config.php';
require 'funciones.php';

// hacemos una conexion a la base de datos
$conexion = conexion($bd_config);

// guardamos el id del articulo en una variables
$id_articulo = id_articulo($_GET['id']);

// si no hay conexion lo redirigimos a la pagina de error
if (!$conexion) {
    header('Location: error.php');
}

// si el id esta vacio lo redirigmos al index
if (empty($id_articulo)) {
    header('Location: index.php');
}

// obtenemos el post por su id
$post = obtener_post_por_id($conexion, $id_articulo);
if (!$post) {
    // si no hay post entonces lo redireccionamos al index
    header('Location: index.php');
}

$post = $post[0];

// cargamos la vista
require 'views/single.view.php';
