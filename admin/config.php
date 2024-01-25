<!-- BASE DE DTASOS -->
<!-- 
    la base de datos que necitamos es:
    nombre base de datos: blog_practica
    nombre de la tabla: articulos
    nombre de la columna 1: id INT AUTO INCREMENT PRIMARY
    nombre de la columna 2: titulo varchar(200)
    nombre de la columna 3: extracto varchar(200)
    nombre de la columna 4: fecha timestamp current_timestamp
    nombre de la columna 5: texto text
    nombre de la columna 6: thumb varchar(200)

-->

<?php

// esta la ruta de la pagina :v
define('RUTA', 'http://localhost/cursoPhpUdemy/practicas2/blog');

// datos de la base de datos (nombre, usuario, password)
$bd_config = array(
    'basedatos' => 'blog_practica',
    'usuario' => 'root',
    'pass' => ''
);

// configuracion de la pagina
// cuantos post por pagina quiero mostrar
// donde se guardaran las imagenes
$blog_config = array(
    'post_por_pagina' => '2',
    'carpeta_imagenes' => 'imagenes/'
);

// datos para iniciar sesion ( credenciales del administrador )
$blog_admin = array(
    'usuario' => 'Daniel Contreras',
    'password' => 'Apdajfja123'
);
