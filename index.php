<?php

// cargamos el admin y las funciones
require 'admin/config.php';
require 'funciones.php';

// hacemos la conexion a la base de datos
$conexion = conexion($bd_config);

// si no hay conexion lo enviamos a la pagina de error
if (!$conexion) {
    header('Location: error.php');
    echo 'error';
}

// obtenemos los post
$posts = obtener_post($blog_config['post_por_pagina'], $conexion);

// si no hay post lo enviamos a la pagina de error
if(!$posts){
    header('Location: error.php');
}

// cargamos la vista
require 'views/index.view.php';
