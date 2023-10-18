<?php
require_once '../modelos/mostrarcategoria.php';
require_once '../modelos/conexion.php';
require_once '../modelos/auth.php';
$auth = new Auth();
$mostrar = new mostrarcategoria();
if ($auth->isLoggedIn()) {

    $userID = $auth->getUserId();
    $categoria= $mostrar->mostrarCategoria();
} else {
    // El usuario no ha iniciado sesión, redirige a la página de inicio de sesión
    $auth->redirectToLogin();
}
