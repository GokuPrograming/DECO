
<!DOCTYPE html>
<html>
<head>
    <title>Llenar Select con PHP y MySQL</title>
</head>
<body>
    <form method="post" action="seleccionarTarjetas.php">
        <label for="tipos_tarjeta">Seleccione un tipo de tarjeta:</label>
        <select id="tipos_tarjeta" name="tipos_tarjeta">
            <option value="">Seleccionar tipo de tarjeta</option>
           
            // Incluye el archivo de conexión a la base de datos
            require_once('conexion.php');

            // Realiza una consulta para obtener los tipos de tarjetas de crédito desde la tabla "tipo_credit_card"
            $query = $db->query("SELECT id_tipo_credit_card, tipo FROM tipo_credit_card");

            // Recorre los resultados y crea las opciones para el select
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $id = $row['id_tipo_credit_card'];
                $tipo = $row['tipo'];
                echo "<option value='$id'>$tipo</option>";
            }

            // Cierra la conexión a la base de datos
            $db = null;
         
        </select>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>
