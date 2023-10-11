<?php
class carrito
{
    private $db;
    private $user_id;
    public function __construct()
    {
        $con = new Conexion();
        $this->db = $con->conectar();
    }
    public function obtenerCursosCarrito($user_id)
    {
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
    public function agregarCarrito($id_usuario, $cursoID)
    {

        // Verificar si el curso ya está en la lista de favoritos del usuario
        $query = "SELECT COUNT(*) FROM carrito WHERE id_usuario = :id_usuario AND id_lista_cursos = :id_curso";
        //SELECT COUNT(*) FROM carrito WHERE id_usuario = :id_usuario AND id_lista_cursos = :id_curso
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->bindParam(':id_curso', $cursoID, PDO::PARAM_INT);
        $stmt->execute();
        $existeEnCarrito = $stmt->fetchColumn();

        if ($existeEnCarrito > 0) {

            echo "Este curso ya está en tu lista de carrito";
        } else {

            $query = " INSERT INTO carrito (id_usuario, id_lista_cursos) VALUES (:id_usuario, :id_curso)";

            //INSERT INTO carrito (id_usuario, id_lista_cursos,cantidad) values (1,1,1);
            $rs = $this->db->prepare($query);
            $rs->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $rs->bindParam(':id_curso', $cursoID, PDO::PARAM_INT);


            if ($rs->execute()) {
                // El curso se ha agregado a la lista de favoritos correctamente
                echo "¡Curso agregado a carrito!";
            } else {
                // Hubo un error al agregar el curso a la lista de favoritos
                echo "Error al agregar el curso a carrito";
            }
        }
    }

    public function comprarCarrito($id_usuario)
    {
        $carritoCursos = $this->obtenerCursosCarrito($id_usuario); // Asegúrate de pasar el ID del usuario
        // Verificar si hay cursos en el carrito
        if (!empty($carritoCursos)) {
            // Conectar a la base de datos (debes ajustar esta parte según tu configuración)
            foreach ($carritoCursos as $curso) {
                $cursoID = $curso['id_lista_cursos'];
                $query = "INSERT INTO cursos_comprados (id_usuario, id_lista_cursos) VALUES (:id_usuario, :id_curso)";
                $rs = $this->db->prepare($query);
                $rs->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
                $rs->bindParam(':id_curso', $cursoID, PDO::PARAM_INT);

                if ($rs->execute()) {
                    // La compra se ha registrado correctamente en la base de datos
                    echo "¡Compra registrada en la base de datos!";
                    $this->eliminarCarrito($id_usuario);
                } else {
                    // Hubo un error al registrar la compra
                    echo "Error al registrar la compra.";
                }
            }
        }
    }

    public function eliminarCarrito($id_usuario)
    {
        // Luego, eliminar los cursos del carrito
        $query = "DELETE FROM carrito WHERE id_usuario = :user_id";
        $rs = $this->db->prepare($query);
        $rs->bindParam(':user_id', $id_usuario, PDO::PARAM_INT);
        if ($rs->execute()) {
            // Los cursos del carrito se han eliminado correctamente
            echo "¡Cursos del carrito eliminados!";
        } else {
            // Hubo un error al eliminar los cursos del carrito
            echo "Error al eliminar los cursos del carrito.";
        }
    }

    public function actualizarCompras()
    {
    }
}
