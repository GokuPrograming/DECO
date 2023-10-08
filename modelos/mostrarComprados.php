<?php
class mostrarComprados{
    private $db;
    public function __construct() {
        $con = new Conexion();
        $this->db = $con->conectar();
    }

    public function mostrarCursos($user_id) {
        //  $query = "SELECT id_lista_cursos,titulo, imagen,precio FROM lista_curso";
        $query = "select lc.titulo, lc.imagen,cc.id_lista_cursos,cc.id_usuario
        from cursos_comprados cc
                 join deco.lista_curso lc on lc.id_lista_cursos = cc.id_lista_cursos where id_usuario=$user_id";
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