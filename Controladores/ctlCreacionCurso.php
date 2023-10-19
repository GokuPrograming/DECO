<?php
require_once '../modelos/cursos_model.php';
require_once '../modelos/conexion.php';
require_once '../modelos/auth.php';

$conexion = new Conexion();
$crearCurso = new CrearCurso($conexion->conectar());
$auth = new Auth();

if ($auth->isLoggedIn()) {
    // El usuario está autenticado, puedes continuar el proceso de creación del curso
    $userID = $auth->getUserId();

    // Recoge los datos del formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // $valor_entero = intval($elemento);
        $titulo = $_POST['titulo'];
        $precio = $_POST['precio'];
        $categoria = $_POST['categoria'];
        $video = $_POST['video'];
        $imagen = $_FILES['foto']; // Asegúrate de validar la subida de la imagen
        $precio = intval( $precio );
        $categoria =intval( $categoria );
        $video = intval( $video );

        // Realiza la inserción en la base de datos
      $cursoId = $crearCurso->Insert_listaCursos($titulo, $imagen, $video, $precio, $categoria,$userID);
//ECHO "titulo: ".$titulo."precio: ".$precio."idcategoria: ".$categoria."IDvIDEO: ".$video. "idUser= ".$userID,$imagen;
    }
}

?>