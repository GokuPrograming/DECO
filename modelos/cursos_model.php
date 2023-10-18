<?php

class crearCurso
{
    private $db;

    public function __construct($conexion)
    {
        $this->db = $conexion;
    }

    public function Insert_listaCursos($titulo, $imagen_nombre, $video, $precio, $categoria,$id_usuario)
    {
        // Subir la imagen
        $imagen_nombre = $_FILES["foto"]["name"];
        $imagen_temp = $_FILES["foto"]["tmp_name"];
        move_uploaded_file($imagen_temp, "../assets/img/" . $imagen_nombre);

        // Preparar la consulta SQL e insertar los datos en la tabla
        $conn = $this->db;

        // Utiliza bindParam para enlazar los valores
        $sql = "INSERT INTO lista_curso (titulo, imagen, id_video, precio, id_categoria) 
                VALUES (:titulo, :imagen_nombre, :video, :precio, :categoria)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindParam(':imagen_nombre', $imagen_nombre, PDO::PARAM_STR);
        $stmt->bindParam(':video', $video, PDO::PARAM_INT);
        $stmt->bindParam(':precio', $precio, PDO::PARAM_STR); // Cambiado a PDO::PARAM_STR
        $stmt->bindParam(':categoria', $categoria, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $lastInsertId = $conn->lastInsertId(); // Obtenemos el ID insertado
        echo "Registro exitoso. ID del curso insertado: $lastInsertId";
        //$this->insertarEnCursosCreados($id_usuario, $lastInsertId);
            $this->insertarEnCursosCreados($id_usuario,$lastInsertId);
        } else {
            $errorInfo = $stmt->errorInfo();
            echo "Error al registrar el curso: " . $errorInfo[2];
        }
    }

    // Otras funciones de la clase...



    public function insertarEnCursosCreados($id_usuario, $id_lista_cursos)
    {

        $query = "INSERT INTO cursos_creados (id_usuario, id_lista_cursos) VALUES (:id_usuario, :id_curso)";
        $rs = $this->db->prepare($query);
        $rs->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $rs->bindParam(':id_curso', $id_lista_cursos, PDO::PARAM_INT);

        if ($rs->execute()) {
            // La compra se ha registrado correctamente en la base de datos
            echo "se inserto en cursos creados"."IDUSER=".$id_usuario." curso=".$id_lista_cursos;
            //header("Location: ../html/compraConcluida.php");

        } else {
            // Hubo un error al registrar la compra
            echo "Error al registrar la compra.";
        }
    }

    public function mostrarCursosCreados($user_id){
        /*select titulo,imagen,precio,categoria from lista_curso li
        join deco.categoria c on c.id_categoria = li.id_categoria
        where id_usuario=1;
        select id_lista_cursos,titulo,imagen,precio,categoria from lista_curso li
                            join deco.categoria c on c.id_categoria = li.id_categoria
                            where id_usuario=1;
        */
        $query = "SELECT id_lista_cursos,titulo,imagen,precio,categoria from lista_curso li
        join deco.categoria c on c.id_categoria = li.id_categoria
                 where id_usuario=$user_id";
          $stmt = $this->db->prepare($query);
          $stmt->execute();
      
          $cursos = array(); // Inicializa un array para almacenar los cursos
      
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              $cursos[] = $row;
          }
          return $cursos; // Devuelve el array de cursos
      }
      public function ActualizarCursos($titulo, $imagen_nombre, $precio, $categoria, $id_usuario, $id_lista_cursos) {
        $imagen_nombre = $_FILES["foto"]["name"];
        $imagen_temp = $_FILES["foto"]["tmp_name"];
        move_uploaded_file($imagen_temp, "../assets/img/" . $imagen_nombre);
    
        // Preparar la consulta SQL e insertar los datos en la tabla
        $conn = $this->db;
    
        $sql = "UPDATE lista_curso SET titulo = :titulo, imagen = :imagen, precio = :precio, id_categoria = :categoria WHERE id_usuario = :id_usuario AND id_lista_cursos = :id_lista_cursos";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindParam(':imagen', $imagen_nombre, PDO::PARAM_STR);
        $stmt->bindParam(':precio', $precio, PDO::PARAM_STR); // Cambiado a PDO::PARAM_STR
        $stmt->bindParam(':categoria', $categoria, PDO::PARAM_INT);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->bindParam(':id_lista_cursos', $id_lista_cursos, PDO::PARAM_INT);
    
        if ($stmt->execute()) {
            echo "Actualización exitosa.";
        } else {
            $errorInfo = $stmt->errorInfo();
            echo "Error al actualizar el curso: " . $errorInfo[2];
        }
    }
    
    }
