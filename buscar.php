<?php

// cargamos la configuracion y las funciones
require 'admin/config.php';
require 'funciones.php';

// nos conectamos a la base de datos
$conexion = conexion($bd_config);
// si no hay conexion a la base de datos regirimos al error php
if (!$conexion) {
    header('Location: error.php');
}

// resivir los datos con get y get no esta vacio
if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['busqueda'])) {
    // limpiamos lo que busca el usuario y que no pueda colocar codigo
    $busqueda = limpiarDatos($_GET['busqueda']);

    // hacemos la busqueda en la base de datos
    // creamos una consulta
    $statement = $conexion->prepare(
        'SELECT * FROM articulos WHERE titulo LIKE :busqueda or texto LIKE :busqueda'
    );
    // ejecutamos nuestra consulta
    $statement->execute(array(':busqueda' => "%$busqueda%"));
    // extremos todos los datos
    $resultados = $statement->fetchAll();

    // si no hay resultados muestra un mensaje por pantalla
    if (empty($resultados)) {
        $titulo = 'No se encontraron articulos con el resultado: ' . $busqueda;
    } else {
        // si si hay mostramos los resultados de busqueda
        $titulo = 'Resultado de la busqueda: ' . $busqueda;
    }
// si no se environ los datos lo redirigimos al index
} else {
    header('Location: ' . RUTA . '/index.php');
}

// cargamos la vista
require 'views/buscar.view.php';
