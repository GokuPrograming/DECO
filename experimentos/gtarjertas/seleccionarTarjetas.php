<?php
// Incluye el archivo de conexión a la base de datos
require_once('conexion.php');

// Realiza una consulta para obtener los tipos de tarjetas de crédito desde la tabla "tipo_credit_card"
$query = $db->query("SELECT id_tipo_credit_card, tipo FROM tipo_credit_card");

// Inicializa una variable para almacenar las opciones del select
$options = '';

// Recorre los resultados y crea las opciones para el select
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $id = $row['id_tipo_credit_card'];
    $tipo = $row['tipo'];
    $options .= "<option value='$id'>$tipo</option>";
}

// Cierra la conexión a la base de datos
$db = null;
?>
