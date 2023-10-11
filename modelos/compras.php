<?php

class compras{
    private $db;
    public function __construct(){
        $con = new Conexion();
        $this->db = $con->conectar();
    }

  
    public function comprar($id_usuario, $cursoID) {
        // Verificar si el curso ya ha sido comprado por el usuario
        $query = "SELECT COUNT(*) FROM cursos_comprados WHERE id_usuario = :id_usuario AND id_lista_cursos = :id_curso";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->bindParam(':id_curso', $cursoID, PDO::PARAM_INT);
        $stmt->execute();
        $existeCompra = $stmt->fetchColumn();
    
        if ($existeCompra > 0) {
            // El usuario ya ha comprado este curso
            echo "Este curso ya ha sido comprado por el usuario.";
        } else {
            // El usuario no ha comprado el curso, se puede realizar la compra
            $query = "INSERT INTO cursos_comprados (id_usuario, id_lista_cursos) VALUES (:id_usuario, :id_curso)";
            $rs = $this->db->prepare($query);
            $rs->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $rs->bindParam(':id_curso', $cursoID, PDO::PARAM_INT);
    
            if ($rs->execute()) {
                // La compra se ha registrado correctamente en la base de datos
                echo "¡Compra registrada en la base de datos!";
                
            } else { 
                // Hubo un error al registrar la compra
                echo "Error al registrar la compra.";
            }
        }
    }
    
}

?>