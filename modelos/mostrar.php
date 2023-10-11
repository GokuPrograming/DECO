<?php
 require('conexion.php');

class mostrar{
    private $db;
    public function __construct() {
        $con = new Conexion();
        $this->db = $con->conectar();
    } 
    public function mostrarCursos() {
      //  $query = "SELECT id_lista_cursos,titulo, imagen,precio FROM lista_curso";
      $query = "SELECT id_lista_cursos,titulo, imagen,precio FROM lista_curso";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    
        $cursos = array(); // Inicializa un array para almacenar los cursos
    
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $cursos[] = $row;
        }
        return $cursos; // Devuelve el array de cursos
    }
      
    }



?>