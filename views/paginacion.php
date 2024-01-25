<!-- conocer el numero de paginas que tenemos -->
<?php $numero_paginas = numero_paginas($blog_config['post_por_pagina'], $conexion); ?>
<section class="paginacion">
    <ul>
        <!-- si pagina actual es igual a uno el boton estara desabilitado -->
        <?php if (pagina_actual() === 1) : ?>
            <li class="disabled">&laquo;</li>
        <!-- de lo contrario el boton estara habilitado -->
        <?php else : ?>
            <!-- cada que el de click le restare uno a la pagina actual para retroceder -->
            <li><a href="index.php?p=<?php echo pagina_actual() - 1; ?>">&laquo;</a></li>
        <?php endif; ?>

        <!-- con un for mostramos cuantas paginas tenemos -->
        <?php for ($i = 1; $i <= $numero_paginas; $i++) : ?>
            <!-- agregamos la clase active al li de la pagina en la que estamos -->
            <?php if (pagina_actual() === $i) : ?>
                <li class="active">
                    <?php echo $i ?>
                </li>
            <!-- a los demas li estaran normales -->
            <?php else : ?>
                <li><a href="index.php?p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php endif; ?>

        <?php endfor; ?>

        <!-- si pagina actual es igual al numero de paginas el boton estara desabilitado -->
        <?php if (pagina_actual() == $numero_paginas) : ?>
            <li class="disabled">&raquo;</li>
        <!-- si no estara habilitado -->
        <?php else : ?>
            <!-- cada que le de click me cambia de pagina sumandole uno a la pagina actual -->
            <li><a href="index.php?p=<?php echo pagina_actual() + 1; ?>">&raquo;</a></li>
        <?php endif; ?>
    </ul>
</section>