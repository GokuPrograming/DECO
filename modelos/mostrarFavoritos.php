<?php

class favoritos{
    private $db;
    public function __construct(){
        $con = new Conexion();
        $this->db = $con->conectar();
    }

     
    public function favorito($id_usuario, $cursoID) {
        // Verificar si el curso ya está en la lista de favoritos del usuario
        $query = "SELECT COUNT(*) FROM favorito WHERE id_usuario = :id_usuario AND id_lista_cursos = :id_curso";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->bindParam(':id_curso', $cursoID, PDO::PARAM_INT);
        $stmt->execute();
        $existeEnFavoritos = $stmt->fetchColumn();
    
        if ($existeEnFavoritos > 0) {
            // El curso ya está en la lista de favoritos del usuario
            echo "Este curso ya está en tu lista de favoritos.";
        } else {
            // El curso no está en la lista de favoritos, se puede agregar
            $query = "INSERT INTO favorito (id_usuario, id_lista_cursos) VALUES (:id_usuario, :id_curso)";
            $rs = $this->db->prepare($query);
            $rs->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $rs->bindParam(':id_curso', $cursoID, PDO::PARAM_INT);
    
            if ($rs->execute()) {
                // El curso se ha agregado a la lista de favoritos correctamente
                echo "¡Curso agregado a la lista de favoritos!";
            } else {
                // Hubo un error al agregar el curso a la lista de favoritos
                echo "Error al agregar el curso a la lista de favoritos.";
            }
        }
    }
    

 

      public function mostrarCursosFav($user_id) {
        //  $query = "SELECT id_lista_cursos,titulo, imagen,precio FROM lista_curso";
        $query = "SELECT lc.titulo,lc.imagen,lc.id_lista_cursos from favorito f
        join deco.lista_curso lc on f.id_lista_cursos = lc.id_lista_cursos where id_usuario=$user_id";
          $stmt = $this->db->prepare($query);
          $stmt->execute();
      
          $cursos = array(); // Inicializa un array para almacenar los cursos
      
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              $cursos[] = $row;
          }
          return $cursos; // Devuelve el array de cursos
      }
        

}