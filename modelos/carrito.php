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
        // Verificar si el curso ya ha sido comprado por el usuario
        $query = "SELECT COUNT(*) FROM cursos_comprados WHERE id_usuario = :id_usuario AND id_lista_cursos = :id_curso";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->bindParam(':id_curso', $cursoID, PDO::PARAM_INT);
        $stmt->execute();
        $existeCompra = $stmt->fetchColumn();

        if ($existeCompra > 0) {
            echo "Este curso ya ha sido comprado, no se puede agregar al carrito.";
            
           // header("Location: ../html/yaEsta/carritoYaEsta.php");

        } else {
            // Verificar si el curso ya está en la lista de carrito del usuario
            $query = "SELECT COUNT(*) FROM carrito WHERE id_usuario = :id_usuario AND id_lista_cursos = :id_curso";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $stmt->bindParam(':id_curso', $cursoID, PDO::PARAM_INT);
            $stmt->execute();
            $existeEnCarrito = $stmt->fetchColumn();

            if ($existeEnCarrito > 0) {
                echo "Este curso ya está en tu lista de carrito";
                header("Location: ../html/yaEsta/carritoYaEsta.php");
            } else {
                $query = "INSERT INTO carrito (id_usuario, id_lista_cursos) VALUES (:id_usuario, :id_curso)";
                $rs = $this->db->prepare($query);
                $rs->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
                $rs->bindParam(':id_curso', $cursoID, PDO::PARAM_INT);
                if ($rs->execute()) {
                    echo "¡Curso agregado a carrito!";
                    header("Location: ../html/main.php");
                } else {
                    echo "Error al agregar el curso a carrito";
                }
            }
        }
    }


    public function comprarCarrito($id_usuario)
    {
        // Verificar si hay cursos en el carrito
        $carritoCursos = $this->obtenerCursosCarrito($id_usuario); // Asegúrate de pasar el ID del usuario
        if (empty($carritoCursos)) {
            echo "No hay cursos en el carrito. Agregue cursos antes de comprar.";
            return;
        }

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
                header("Location: ../html/compraConcluida.php");
                $this->eliminarCarrito($id_usuario);
            } else {
                // Hubo un error al registrar la compra
                echo "Error al registrar la compra.";
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

    public function eliminarProcductoDeCarrito($id_usuario, $cursoID)
    {
        // Luego, eliminar los cursos del carrito
        $query = "DELETE FROM carrito WHERE id_usuario = :user_id and id_lista_cursos = :id_curso";
        //DELETE from carrito where id_usuario=2 and id_lista_cursos=2;
        $rs = $this->db->prepare($query);
        $rs->bindParam(':user_id', $id_usuario, PDO::PARAM_INT);
        $rs->bindParam(':id_curso', $cursoID, PDO::PARAM_INT);
        if ($rs->execute()) {
            // Los cursos del carrito se han eliminado correctamente
            echo "¡Cursos de la lista eliminado";
        } else {
            // Hubo un error al eliminar los cursos del carrito
            echo "Error al eliminar el curso";
        }
    }



    public function carritosContador($id_usuario)
    {
        $query = "SELECT COUNT(id_lista_cursos) AS total FROM carrito WHERE id_usuario = :id_usuario";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $fila = $stmt->fetch(PDO::FETCH_ASSOC);
            $total = $fila["total"];
            return $total; // Devuelve el valor en lugar de imprimirlo
        } else {
            return 0; // Devuelve 0 en caso de error
        }
    }

    public function Total_pagar($id_usuario)
    {
        /* select  sum(lc.precio) as total
from carrito c
         join deco.usuario u on c.id_usuario = u.id_usuario
         join deco.lista_curso lc on lc.id_lista_cursos = c.id_lista_cursos
where c.id_usuario = 1
order by 1;*/
        $query = "SELECT sum(lc.precio) as total
        from carrito c
                 join deco.usuario u on c.id_usuario = u.id_usuario
                 join deco.lista_curso lc on lc.id_lista_cursos = c.id_lista_cursos
        where c.id_usuario = :id_usuario";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $fila = $stmt->fetch(PDO::FETCH_ASSOC);
            $total = $fila["total"];
            return $total; // Devuelve el valor en lugar de imprimirlo
        } else {
            return 0; // Devuelve 0 en caso de error
        }
    }
}