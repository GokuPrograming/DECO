<?php

require_once '../modelos/mostrarFavoritos.php';
require_once '../modelos/mostrar.php';
require_once '../modelos/auth.php';


// Verifica si se ha enviado el ID del curso por la URL
if (isset($_GET['id']))


    // Recibe el ID del curso
    $auth = new Auth();
$cursoID = $_GET['id'];

if ($auth->isLoggedIn()) {
    //mandamos llamar de la clse auth, lo que es el id
    $userID = $auth->getUserId();
    $fav = new favoritos();
    $fav->favorito($userID, $cursoID);
    //$fav->mostrarCursosFav($user_ID);
}
