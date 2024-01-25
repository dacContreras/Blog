<!-- cargamos el modulo de header -->
<?php require 'views/header.php'; ?>
<!-- este es el contenedor donde mostramos el contenido -->
<div class="contenedor">
    <!-- recorremos el arreglo de posts y vamos carga uno por uno -->
    <?php foreach ($posts as $post) : ?>
        <!-- agregamos esta estructura por cada post -->
        <!-- con php mostramos la informacion de cada uno -->
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
    <!-- cargamos la paginacion -->
    <?php require 'views/paginacion.php'; ?>
</div>
<!-- cargamos el modulo de footer -->
<?php require 'views/footer.php'; ?>