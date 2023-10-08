<?php
// ocupamos llamar perfil y autor
require_once '../modelos/perfil.php';
require_once '../modelos/auth.php';

$auth = new Auth();

if ($auth->isLoggedIn()) {
    //mandamos llamar de la clse auth, lo que es el id
    $userID = $auth->getUserId();
    // nos enlazamos a perfil, para despues poder tomar el valor del id de la sesion, que esta en auth
    $perfil = new Perfil($userID);
    
    // mandamos llamar la clase de obtener de la variable perfil que es la clase perfil
    $usuarios = $perfil->obtenerNombre();
} else {
    // El usuario no ha iniciado sesión, redirige a la página de inicio de sesión
    $auth->redirectToLogin();
}
?>   