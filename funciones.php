<?php

// creamos una conexion a la base de datos
function conexion($bd_config){
    try {
        $conexion = new PDO('mysql:host=localhost;dbname=' . $bd_config['basedatos'], $bd_config['usuario'], $bd_config['pass']);
        return $conexion;
    } catch (PDOException $e) {
        return false;
    }
}

// esta funcion se encarga de limpiar lo que el usuario escriba y no inyecte codigo
function limpiarDatos($datos){
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}

// como su nombre dice, solo obtiene cual es la pagina actual
function pagina_actual(){
    return isset($_GET['p']) ? (int)$_GET['p'] : 1;
}


// esta funcion obtiene los post y calcular cuantos tiene que traer dependiendo cuantos post por pagina sean
function obtener_post($post_por_pagina, $conexion){
    $inicio = (pagina_actual() > 1) ? pagina_actual() * $post_por_pagina - $post_por_pagina : 0;
    // creamos una consulta para que solo traiga los que se necesita de la base de datos
    $sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articulos LIMIT $inicio, $post_por_pagina");
    // ejecutamos la consulta
    $sentencia->execute();
    return $sentencia->fetchAll();
}

// paginacion
function numero_paginas($post_por_pagina, $conexion){
    // hacemos una consulta sql 
    $total_post = $conexion->prepare('SELECT FOUND_ROWS() as total');
    // ejecutamos la consulta
    $total_post->execute();
    // sobreescribimos
    $total_post = $total_post->fetch()['total'];
    // hacemos el calculo para saber cuantas paginas habra
    $numero_paginas = ceil($total_post / $post_por_pagina);
    return $numero_paginas;
}

// limpia el id y lo transforma a entero
function id_articulo($id){
    return (int)limpiarDatos($id);
}

// obtenemos el post por id 
function obtener_post_por_id($conexion, $id){
    // hacemos una consulta sql
    $resultado = $conexion->query("SELECT * FROM articulos WHERE id = $id LIMIT 1");
    // ejecutamos el resultado
    $resultado = $resultado->fetchAll();
    // retornamos resultado si hay, de no haber retornamos false
    return ($resultado) ? $resultado : false;
}

// funcion que pone la fecha con diferente formato
function fecha($fecha){
    // convierte una cadena de texto a tiempo
    $timestamp = strtotime($fecha);
    $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    $dia = date('d', $timestamp);
    $mes = date('m', $timestamp) - 1;
    $year = date('Y', $timestamp);

    $fecha = "$dia de " . $meses[$mes] . " del $year";
    return $fecha;
}

// comprobamos la sesion (si es usuario que puede entrar)
function comprobarSession(){
    if(!isset($_SESSION['admin'])){
        header('Location: ' . RUTA);
    }
}