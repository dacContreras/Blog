<!-- cargamos el modulo de header -->
<?php require '../views/header.php'; ?>

<div class="contenedor">
    <div class="post">
        <article>
            <h2 class="titulo">Nuevo Articulo</h2>
            <!-- formulario para agregar un nuevo post -->
            <!-- ya que trabajamos con archivos agregamos el enctype -->
            <form class="formulario" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <input type="text" name="titulo" id="" placeholder="Titulo del Articulo">
                <input type="text" name="extracto" id="" placeholder="Extracto del Articulo">
                <textarea name="texto" placeholder="Texto del Articulo"></textarea>
                <input type="file" name="thumb" id="">
            
                <input type="submit" value="Crear Articulo">
            </form>
        </article>
    </div>
</div>

<!-- cargamos el modulo de footer -->
<?php require '../views/footer.php'; ?>