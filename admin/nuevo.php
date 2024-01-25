<!-- iniciamos sesion -->
<?php session_start();

// cargamos la configuracion y las funciones
require 'config.php';
require '../funciones.php';

// comprobamos sesion
comprobarSession();

// hacemos la conexion
$conexion = conexion($bd_config);

// si no hay conexion redirigimos a la pagina de error
if (!$conexion) {
    header('Location: ../error.php');
}

// revisamos si los datos fueron enviados
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // limpiamos los datos para que no ingresen codigo
    $titulo = limpiarDatos($_POST['titulo']);
    $extracto = limpiarDatos($_POST['extracto']);
    $texto = $_POST['texto'];
    $thumb = $_FILES['thumb']['tmp_name'];

    // almacena la ruta del archivo cuando ya esta finalizado
    $archivo_subido = '../' . $blog_config['carpeta_imagenes'] . $_FILES['thumb']['name'];

    // movemos de la computadora al servidor
    move_uploaded_file($thumb, $archivo_subido);

    // hacemo suna cosulta para ingresar los datos en el base de datos
    $statement = $conexion->prepare(
        'INSERT INTO articulos (id, titulo, extracto, texto, thumb)
        VALUES (null, :titulo, :extracto, :texto, :thumb)'
    );

    // ejecutamos la consulta
    $statement->execute(array(
        ':titulo' => $titulo,
        ':extracto' => $extracto,
        ':texto' => $texto,
        ':thumb' => $_FILES['thumb']['name']
    ));

    // redireccionamos al admin
    header('Location: ' . RUTA . '/admin');
}

// cargamos la vista
require '../views/nuevo.view.php';
