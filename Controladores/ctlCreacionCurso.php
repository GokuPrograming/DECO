<?php

require_once '../modelos/mostrarcategoria.php';
require_once '../modelos/auth.php';
require_once '../modelos/conexion.php';
$mostrar = new parametrosCurso();
$auth = new Auth();

if ($auth->isLoggedIn()) {
    //mandamos llamar de la clse auth, lo que es el id
    $userID = $auth->getUserId();
    echo 'id=' . $userID;
    // nos enlazamos a perfil, para despues poder tomar el valor del id de la sesion, que esta en auth   
    $categoria = $mostrar->mostrarCategorias();
}
