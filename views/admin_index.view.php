<!-- cargamos el header -->
<?php require '../views/header.php'; ?>

<!-- estructura -->
<div class="contenedor">
    <h2>Panel de Control</h2>
    <a href="nuevo.php" class="btn">Nuevo Post</a>
    <a href="cerrar.php" class="btn">Cerrar Sesion</a>
    <!-- con el foreach iteramos sobre cada post para luego mostralos uno por uno -->
    <?php foreach ($posts as $post) : ?>
        <!-- estructura -->
        <div class="post">
            <article>
                <h2 class="titulo"><?php echo $post['id'] . '.- ' . $post['titulo']; ?></h2>
                <a href="editar.php?id=<?php echo $post['id']; ?>">Editar</a>
                <a href="../single.php?id=<?php echo $post['id']; ?>">Ver</a>
                <a href="borrar.php?id=<?php echo $post['id']; ?>">borrar</a>
            </article>
        </div>
    <?php endforeach; ?>

    <!-- cargamos la paginacion -->
    <?php require '../views/paginacion.php'; ?>
</div>

<!-- cargamos el footer -->
<?php require '../views/footer.php'; ?>