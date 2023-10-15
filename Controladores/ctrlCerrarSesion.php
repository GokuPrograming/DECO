<?php
require_once "../modelos/auth.php";
require_once "../modelos/conexion.php";

$auth = new Auth();

if ($auth->isLoggedIn()) {
    $userID = $auth->getUserId();

    // Llama al método para cerrar la sesión del usuario por su ID
    $auth->logoutUserById($userID);

    // Redirige al usuario o realiza otras acciones necesarias después de cerrar la sesión
    header("Location: ../index.html");
    exit();
}
?>