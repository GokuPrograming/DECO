<?php


class parametrosCurso
{
    private $db;
    public function __construct()
    {
        $con = new Conexion();
        $this->db = $con->conectar();
    }

    public function mostrarCategorias()
    {
        //select * from categoria; 
        $query = "SELECT * from categoria";
        $stmt = $this->db->prepare($query);
        $rs = $stmt->execute();
      
        
        return $rs;
        // $cursos = array(); // Inicializa un array para almacenar los cursos

        // while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //     $cursos[] = $row;
        // }
        // return $cursos; // Devuelve el array de cursos
    }
}