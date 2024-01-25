<!-- iniciamos sesion -->
<?php session_start();

// cargamos la configuracion y las funciones
require 'admin/config.php';
require 'funciones.php';

// comprobamos si los datos se han enviado
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // limpiamos los datos que nos hayan mandado
    $usuario = limpiarDatos($_POST['usuario']);
    $password = limpiarDatos($_POST['password']);

    // si el usuario y la contraseña coinciden pueden entrar al admin
    if($usuario == $blog_admin['usuario'] && $password == $blog_admin['password']){
        $_SESSION['admin'] = $blog_admin['usuario'];
        header('Location:' . RUTA . '/admin');
    }
}

// cargamos la vista
require 'views/login.view.php';