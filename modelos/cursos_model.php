<?php
require_once '../modelos/alert.php';

class crearCurso
{

    private $db;

    public function __construct($conexion)
    {
        $this->db = $conexion;
    }

    public function Insert_listaCursos($titulo, $imagen_nombre, $video, $precio, $categoria, $id_usuario)
    {
        $Alert = new Alert();
        // Subir la imagen
        $imagen_nombre = $_FILES["foto"]["name"];
        $imagen_temp = $_FILES["foto"]["tmp_name"];
        move_uploaded_file($imagen_temp, "../assets/img/" . $imagen_nombre);

        // Preparar la consulta SQL e insertar los datos en la tabla
        $conn = $this->db;

        // Utiliza bindParam para enlazar los valores
        /*insert into lista_curso(titulo, imagen, id_video, precio, id_categoria, id_usuario) values (); */
        $sql = "INSERT INTO lista_curso (titulo, imagen, id_video, precio, id_categoria,id_usuario) 
                VALUES (:titulo, :imagen_nombre, :video, :precio, :categoria,:id_usuario)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindParam(':imagen_nombre', $imagen_nombre, PDO::PARAM_STR);
        $stmt->bindParam(':video', $video, PDO::PARAM_INT);
        $stmt->bindParam(':precio', $precio, PDO::PARAM_STR); // Cambiado a PDO::PARAM_STR
        $stmt->bindParam(':categoria', $categoria, PDO::PARAM_INT);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);

        if ($stmt->execute()) {

            $header = "Location: ../html/main.php";
            // La acción se completó correctamente
            header("Location: ../html/CrearCurso.php?success=1");
            exit;
            // $mensaje = "La acción se completó correctamente";

            // Devolver el mensaje de alerta

            // header($header);

            //$this->insertarEnCursosCreados($id_usuario, $lastInsertId);
        } else {
            $errorInfo = $stmt->errorInfo();
            header("Location: ../html/CrearCurso.php?error=1");
           
        }
    }

    // Otras funciones de la clase...



    public function mostrarCursosCreados($user_id)
    {
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
    public function ActualizarCursos($titulo, $imagen_nombre, $precio, $categoria, $id_usuario, $id_lista_cursos)
    {
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
           // echo "Actualización exitosa.";
            header("Location: ../html/modificarCurso.php?Update=1");
            //header("Location: ../html/carrito.php?Quitar=1");
        } else {
            $errorInfo = $stmt->errorInfo();
            echo "Error al actualizar el curso: " . $errorInfo[2];
        }
    }

    public function eliminarCurso($id_usuario, $cursoID)
    {
        // Luego, eliminar los curso
        //delete  from lista_curso where lista_curso.id_usuario=1 and id_lista_cursos=1;
        $query = "DELETE FROM lista_curso  WHERE id_usuario = :user_id and id_lista_cursos = :id_curso";
        //DELETE from carrito where id_usuario=2 and id_lista_cursos=2;
        $rs = $this->db->prepare($query);
        $rs->bindParam(':user_id', $id_usuario, PDO::PARAM_INT);
        $rs->bindParam(':id_curso', $cursoID, PDO::PARAM_INT);
        if ($rs->execute()) {
            // Los cursos del carrito se han eliminado correctamente
           // echo "¡Cursos de la lista eliminado";
           header("Location: ../html/carrito.php?Quitar=1");
        } else {
            // Hubo un error al eliminar los cursos del carrito
            echo "Error al eliminar el curso";
        }
    }

}
