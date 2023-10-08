<?php
class Perfil {
    private $db;
    private $user_id;

    public function __construct($user_id) {
        $con = new Conexion();
        $this->db = $con->conectar();
        $this->user_id = $user_id;
    }

    public function obtenerNombre() {
        $query = "SELECT u.id_usuario,c.nombre, c.primer_apellido, c.segundo_apellido, c.curp, c.rfc, l.localidad, c.fecha_nacimiento, u.correo
        FROM cliente c
        JOIN deco.localidad l ON l.id_localidad = c.id_localidad
        JOIN deco.usuario u ON c.id_usuario = u.id_usuario
        WHERE c.id_usuario = :user_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":user_id", $this->user_id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
          //  return $row['nombre'];
          return $row;
        } else {
            return "Nombre no encontrado"; // Puedes ajustar el mensaje de error según tus necesidades
        }
    }
}

?>