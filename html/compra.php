<?php
require_once '../modelos/conexion.php';
require_once '../modelos/auth.php';
require_once '../Controladores/crlPerfil.php';

$auth = new Auth();

if ($auth->isLoggedIn()) {
    $userID = $auth->getUserId();
    
    // Crea una instancia de la clase Perfil y pasa el ID del usuario como argumento
    $perfil = new Perfil($userID);
    $datos = $perfil->obtenerNombre();
    // Luego, puedes obtener los usuarios
    $usuarios = $perfil->obtenerNombre();
} else {
    // El usuario no ha iniciado sesión, redirige a la página de inicio de sesión
    $auth->redirectToLogin();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Compra</title>
</head>

<body>
    <h1>Detalles de la Compra</h1>
    <p>Aquí puedes revisar los detalles de tu compra antes de confirmarla:</p>
    <h2>Nombre: <?php echo $datos['nombre']; ?></h2>
    <h2>Nombre: <?php echo $datos['id_usuario']; ?></h2>
    <h2>user id: <?php echo $userID ?></h2>



    <!-- Recibe el ID del curso y del usuario de la URL -->

    <?php
        echo "El valor de cursoID es: " . $cursoID;
if (isset($_GET['cursoID'])) { // Cambio aquí: usar $userID en lugar de $datos['id_usuario']
    $cursoID = $_GET['cursoID'];

    
    // Aquí puedes utilizar $cursoID y $userID según sea necesario
    // Por ejemplo, puedes realizar consultas a la base de datos para obtener los detalles del curso
    
    echo "<h2>Detalles del Curso</h2>";
    echo "Curso ID: $cursoID<br>";
    echo "Usuario ID: $userID<br>";

    // Puedes realizar más acciones aquí, como consultar detalles adicionales del curso, precio, etc.
} else {
    echo "No se proporcionaron los parámetros necesarios.";
}
?>


    <!-- Botón de Confirmar Compra -->
    <button id="confirmarCompra">Confirmar Compra</button>

</body>

</html>