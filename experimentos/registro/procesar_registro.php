<?php
// Incluye el archivo de conexión a la base de datos
require_once('conexion.php');

// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Captura los datos del formulario
    $nombre = $_POST["nombre"];
    $primer_apellido = $_POST["primer_apellido"];
    $segundo_apellido = $_POST["segundo_apellido"];
    $curp = $_POST["curp"];
    $rfc = $_POST["rfc"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $localidad = $_POST["localidad"];
    $credit_card = $_POST["credit_card"];
    $id_usuario = $_POST["id_usuario"];
    $fecha_nacimiento="1990-01-01";
    $query = "INSERT INTO cliente (nombre, primer_apellido, segundo_apellido, curp, rfc, localidad, fecha_nacimiento, credit_card, id_usuario) 
    VALUES (:nombre, :primer_apellido, :segundo_apellido, :curp, :rfc, :localidad, :fecha_nacimiento, :credit_card, :id_usuario)";

$stmt = $this->db->prepare($query);
    
// Vincula los parámetros con los valores
$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':primer_apellido', $primer_apellido);
$stmt->bindParam(':segundo_apellido', $segundo_apellido);
$stmt->bindParam(':curp', $curp);
$stmt->bindParam(':rfc', $rfc);
$stmt->bindParam(':localidad', $localidad);
$stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
$stmt->bindParam(':credit_card', $credit_card);
$stmt->bindParam(':id_usuario', $id_usuario);

// Ejecuta la consulta
if ($stmt->execute()) {
// Éxito al insertar en la base de datos
echo "Registro exitoso";
} else {
// Error al insertar
}
 
}
