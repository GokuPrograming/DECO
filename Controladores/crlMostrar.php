<?php
require_once '../modelos/mostrar.php';
require_once '../modelos/conexion.php';
require_once '../modelos/auth.php';

    $mostrar = new mostrar();
    $cursos = $mostrar->mostrarCursos(); // Obtiene la lista de cursos
?>  