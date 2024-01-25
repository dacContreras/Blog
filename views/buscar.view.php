<!-- cargamos el modulo de header -->
<?php require 'views/header.php'; ?>

<div class="contenedor">
    <h2><?php echo $titulo; ?></h2>
    <!-- iteramos sobre todos los resultados y mostramos cada uno -->
    <?php foreach ($resultados as $post) : ?>
        <div class="post">
            <article>
                <h2 class="titulo"><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['titulo']; ?></a></h2>
                <p class="fecha"><?php echo fecha($post['fecha']); ?></p>
                <div class="thumb">
                    <a href="single.php?id=<?php echo $post['id']; ?>">
                        <img src="<?php echo RUTA; ?>/imagenes/<?php echo $post['thumb']; ?>" />
                    </a>
                </div>
                <p class="extracto"><?php echo $post['extracto']; ?></p>
                <a href="single.php?id=<?php echo $post['id']; ?>" class="continuar">continuar leyendo</a>
            </article>
        </div>
    <?php endforeach; ?>

    <!-- cargamos la vista -->
    <?php require 'views/paginacion.php'; ?>
</div>

<!-- cargamos el modulo de footer -->
<?php require 'views/footer.php'; ?>