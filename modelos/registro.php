<?php
class registrarUsuarios {
    private $db;

    // Otras propiedades y métodos de la clase...

    public function insertCliente() {
        // Define los datos a insertar
        $nombre = 'Miguel';
        $primer_apellido = 'Miguel';
        $segundo_apellido = 'Miguel';
        $curp = 'Miguel';
        $rfc = 'Miguel';
        $localidad = 1;
        $fecha_nacimiento = '2001-08-14';
        $credit_card = 1;
        $id_usuario = 2;

        // Prepara la consulta SQL
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
        } else {
            // Error al insertar
        }
    }
}
?>