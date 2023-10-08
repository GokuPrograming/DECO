<?php

class compras{
    private $db;
    public function __construct(){
        $con = new Conexion();
        $this->db = $con->conectar();
    }

  
public function comprar($id_usuario,$cursoID){
echo $id_usuario.$cursoID;
    // Supongamos que tienes una tabla llamada "compras" con campos como "id_compra", "id_usuario" y "id_curso"
    // Aquí puedes ajustar la consulta SQL según tu estructura de base de datos
    $query = "INSERT INTO cursos_comprados (id_usuario, id_lista_cursos) VALUES (:id_usuario, :id_curso)";
    $rs = $this->db->prepare($query);

    // Define el ID del usuario (debes ajustar esto según tu sistema de autenticación)
   
    // Asigna valores a los parámetros de la consulta
    $rs->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
    $rs->bindParam(':id_curso', $cursoID, PDO::PARAM_INT);

    // Ejecuta la consulta
    if ($rs->execute()) {
        // La compra se ha registrado correctamente en la base de datos
        echo "¡Compra registrada en la base de datos!";
    } else {
        // Hubo un error al registrar la compra
        echo "Error al registrar la compra.";
    }

}
}

?>