<!-- iniciamos sesion -->
<?php session_start();

//archivo index del admin
// cargamos la configuracion y las funciones
require 'config.php';
require '../funciones.php';

// hacemos una conexion a la bse de datos
$conexion = conexion($bd_config);

// comprobamos la sesion
comprobarSession();

// si no hay conexion redirigimos la pagina de error
if(!$conexion){
    header('Location: ../error.php');
}

// obtenemeos todos los post
$posts = obtener_post($blog_config['post_por_pagina'], $conexion);

// cargamos la vista
require '../views/admin_index.view.php';