<?php
///agrega los elementos a carrito 
require_once '../modelos/mostrarFavoritos.php';
require_once '../modelos/mostrar.php';
require_once '../modelos/auth.php';

// Verifica si se ha enviado el ID del curso por la URL
if (isset($_GET['id'])) {
    // Recibe el ID del curso
    $auth = new Auth();
    $cursoID = $_GET['id'];

    if ($auth->isLoggedIn()) {
        // Mandamos llamar de la clase auth, lo que es el ID
        $userID = $auth->getUserId();
        $fav = new favoritos();
        $fav->EliminarElementoDeFavoritos($userID, $cursoID);
        // $fav->mostrarCursosFav($user_ID);
    }
}
?>