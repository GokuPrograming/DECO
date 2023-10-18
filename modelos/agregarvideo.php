<?php
require_once '../modelos/conexion.php';

class AgregarVideo
{
    private $db;

    public function __construct($conexion)
    {
        $this->db = $conexion;
    }

    public function subir($userID)
    {
        $titulo = $_POST["titulo"];
        $descripcion = $_POST["descripcion"];

        // Subir la imagen
        $imagen = $_FILES["foto"]["name"];
        $imagen_temp = $_FILES["foto"]["tmp_name"];
        move_uploaded_file($imagen_temp, "../assets/img/" . $imagen);

        // Subir el video
        $video = $_FILES["video"]["name"];
        $video_temp = $_FILES["video"]["tmp_name"];
        move_uploaded_file($video_temp, "../assets/img/" . $video);

        // Preparar la consulta SQL e insertar los datos en la tabla
        $conn = $this->db;
        $sql = "INSERT INTO video (imagen, titulo, descripcion, video, id_usuario) VALUES ('$imagen', '$titulo', '$descripcion', '$video', $userID)";

        $conn->query($sql) === TRUE;
        echo "Registro exitoso.";
    }
}



