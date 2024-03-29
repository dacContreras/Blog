<!DOCTYPE html>
<html lang="en">
<!-- ESTA ES LA VISTA DE HEADER -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Oswald&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?php echo RUTA; ?>/css/style.css">
    <title>BLOG</title>
</head>

<body>
    <header>
        <div class="contenedor">
            <div class="logo izquierda">
                <p><a href="<?php echo RUTA; ?>">Mi Primer Blog</a></p>
            </div>
            <div class="derecha">
                <form name="busqueda" class="buscar" action="<?php echo RUTA; ?>/buscar.php" method="get">
                    <input type="text" name="busqueda" id="" placeholder="buscar">
                    <button type="submit" class="icono bi bi-search"></button>
                </form>
                <nav class="menu">
                    <ul>
                        <li><a href="#"><i class="bi bi-twitter-x"></i></a></li>
                        <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>