<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "usuario", "contraseña", "deco");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Consulta SQL para obtener el conteo
$id_usuario = 3;
$sql = "SELECT COUNT(id_lista_cursos) AS total FROM favorito WHERE id_usuario = $id_usuario";
$resultado = $conexion->query($sql);

if ($resultado) {
    $fila = $resultado->fetch_assoc();
    $total = $fila["total"];
    echo $total;
} else {
    echo "Error en la consulta: " . $conexion->error;
}

$conexion->close();
?>
