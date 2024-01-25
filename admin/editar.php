<!-- iniciamos sesion -->
<?php session_start();

// cargamos la configuracion y las funciones
require 'config.php';
require '../funciones.php';

// comprabamos la sesion
comprobarSession();

// creamos la conexion
$conexion = conexion($bd_config);

// revisamos si hay conexion si no hay redireccionamos a la pagina de error
if (!$conexion) {
    header('Location: ../error.php');
}

// revisamos si se enviaron los datos
if ($_SERVER['REQUEST_METHOD'] ==  'POST') {
    // resivimos todos los datos
    // limpiamos los datos para que no ingresen codigo
    $titulo = limpiarDatos($_POST['titulo']);
    $extracto = limpiarDatos($_POST['extracto']);
    $texto = $_POST['texto'];
    $id = limpiarDatos($_POST['id']);
    $thumb_guardada = $_POST['thumb-guardada'];
    $thumb = $_FILES['thumb'];

    // revisamos que el nombre de la thumb no este vacio
    // si no subio nada es porque quiere seguir con la imagen que ya estaba
    if (empty($thumb['name'])) {
        $thumb = $thumb_guardada;
    } else {
    // de otra forma cargamos la nuevo imagen que subio el usuario
        $archivo_subido = '../' . $blog_config['carpeta_imagenes'] . $_FILES['thumb']['name'];
        move_uploaded_file($_FILES['thumb']['tmp_name'], $archivo_subido);
        $thumb = $_FILES['thumb']['name'];
    }

    // hacemos una consulta sql
    $statement = $conexion->prepare(
        'UPDATE articulos SET titulo = :titulo, extracto = :extracto, texto = :texto,
        thumb = :thumb WHERE id = :id'
    );

    // ejecutamos la consulta sql
    $statement->execute(array(
        ':titulo' => $titulo,
        ':extracto' => $extracto,
        ':texto' => $texto,
        ':thumb' => $thumb,
        ':id' => $id
    ));

    // redirimos al admin
    header('Location: ' . RUTA . '/admin');
} else {
    // obtiene el articulo de la pagina y lo limpia
    $id_articulo = id_articulo($_GET['id']);

    // si esta vacio nos rediriges a la pagina del admin
    if (empty($id_articulo)) {
        header('Location: ' . RUTA . '/admin');
    }

    // obtenemos el post
    $post = obtener_post_por_id($conexion, $id_articulo);

    // si no hay post redirigimos al admin
    if (!$post) {
        header('Location: ' . RUTA . '/admin');
    }

    // como es un arreglo mostramos la posicion 0 
    $post = $post[0];
}

// cargamos la vista
require '../views/editar.view.php';
