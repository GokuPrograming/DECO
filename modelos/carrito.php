<?php
class carrito
{
    private $db;
    private $user_id;
    public function __construct() {
        $con = new Conexion();
        $this->db = $con->conectar();
    }
    public function obtenerCursosCarrito($user_id) {
        $query = "SELECT lc.titulo, lc.precio,lc.imagen,lc.id_lista_cursos
                  FROM carrito c
                  JOIN lista_curso lc ON lc.id_lista_cursos = c.id_lista_cursos
                  WHERE c.id_usuario = :user_id";
    
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
    
        $cursos = array(); // Inicializa un array para almacenar los cursos
    
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $cursos[] = $row;
        }
        return $cursos; // Devuelve el array de cursos
    }
    
}


?>