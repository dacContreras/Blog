<!-- cargamos el modulo de header -->
<?php require 'views/header.php'; ?>

<div class="contenedor">
    <div class="post">
        <article>
            <!-- con php agregamos textos, imagen, etc -->
            <h2 class="titulo"><?php echo $post['titulo']; ?></h2>
            <!-- usamos la funcion fecha para cambiar la fecha fea por una mas bonita para el usurio -->
            <p class="fecha"><?php echo fecha($post['fecha']); ?></p>
            <div class="thumb">
                </a>
                <img src="<?php echo RUTA; ?>/imagenes/<?php echo $post['thumb']; ?>" alt="<?php echo $post['titulo']; ?>" />
            </div>
            <p class="extracto"><?php echo nl2br($post['texto']); ?></p>
        </article>
    </div>
</div>

<!-- cargamos el modulo de footer -->
<?php require 'views/footer.php'; ?>