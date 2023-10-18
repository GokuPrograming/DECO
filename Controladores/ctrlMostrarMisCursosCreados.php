<?php
require_once '../modelos/cursos_model.php';
require_once '../modelos/conexion.php';
require_once '../modelos/auth.php';
$auth = new Auth();
$conexion = new Conexion();
    $mostrarComprados = new crearCurso($conexion->conectar());
    if ($auth->isLoggedIn()) {
        //mandamos llamar de la clse auth, lo que es el id
        $userID = $auth->getUserId();
        // nos enlazamos a perfil, para despues poder tomar el valor del id de la sesion, que esta en auth
    $cursos = $mostrarComprados->mostrarCursosCreados($userID); // Obtiene la lista de cursos
    } else {

 }
?>  