<?php

require_once '../modelos/cursos_model.php';
require_once '../modelos/conexion.php';
require_once '../modelos/auth.php';

$conexion = new Conexion();
$crearCurso = new CrearCurso($conexion->conectar());
$auth = new Auth();
if (isset($_GET['id'])) {
    $cursoID = $_GET['id'];


if ($auth->isLoggedIn()) {
    // El usuario está autenticado, puedes continuar el proceso de creación del curso
    $userID = $auth->getUserId();

    // Recoge los datos del formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // $valor_entero = intval($elemento);
        $titulo = $_POST['titulo'];
        $precio = $_POST['precio'];
        $categoria = $_POST['categoria'];
        $imagen = $_FILES['foto']; // Asegúrate de validar la subida de la imagen
        $precio = doubleval($precio);
        $categoria = intval($categoria);
        $cursoID=intval($cursoID);
        

        // Realiza la inserción en la base de datos
       // $cursoId = $crearCurso->Insert_listaCursos($titulo, $imagen, $video, $precio, $categoria, $userID);
       //public function ActualizarCursos($titulo, $imagen_nombre, $precio, $categoria,$id_usuario,$id_lista_cursos)
       $curso= $crearCurso->ActualizarCursos($titulo, $imagen, $precio, $categoria,$userID, $cursoID);
        echo "titulo: " . $titulo . "precio: " . $precio . "idcategoria: " . $categoria . "IDvIDEO: " . $userID."curso".$cursoID;
    }
}
}else{
    echo "no recibe el id";
}