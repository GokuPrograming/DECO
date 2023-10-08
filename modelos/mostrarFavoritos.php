<?php

class favoritos{
    private $db;
    public function __construct(){
        $con = new Conexion();
        $this->db = $con->conectar();
    }

     
public function favorito($id_usuario,$cursoID){
    echo $id_usuario.$cursoID;
        // Supongamos que tienes una tabla llamada "compras" con campos como "id_compra", "id_usuario" y "id_curso"
        // Aquí puedes ajustar la consulta SQL según tu estructura de base de datos
        $query = "INSERT into favorito(id_usuario, id_lista_cursos) VALUE (:id_usuario, :id_curso)";
        $rs = $this->db->prepare($query);
    
        // Define el ID del usuario (debes ajustar esto según tu sistema de autenticación)
       
        // Asigna valores a los parámetros de la consulta
        $rs->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $rs->bindParam(':id_curso', $cursoID, PDO::PARAM_INT);
    
        // Ejecuta la consulta
        if ($rs->execute()) {
            // La compra se ha registrado correctamente en la base de datos
            echo "¡guardados en favoritos!";
        } else {
            // Hubo un error al registrar la compra
            echo "Error al registrar la compra.";
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