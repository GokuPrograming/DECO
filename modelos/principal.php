<?php
require_once('conexion.php'); // Importa la clase Conexion desde conexion.php
require_once('login.php'); // Importa la clase login desde login.php
require_once('../Controladores/cntrlLogin.php');
session_start(); // Asegúrate de iniciar la sesión al principio de cada script

class principal {
    public function obtenerUserID() {
        if (isset($_SESSION["user_id"])) {
            $userID = $_SESSION["user_id"];
            return $userID;
        } else {
            // Manejo de error o redireccionamiento si no se encuentra el usuario en la sesión
            return null;
        }
    }
}

// Crear una instancia de la clase OtraClase
$principal = new principal();

// Obtener el userID
$userID = $principal->obtenerUserID();

if ($userID !== null) {
    // Puedes usar $userID para realizar más consultas o tareas relacionadas con el usuario
    echo "El ID de usuario es: " . $userID;
} else {
    // Manejo de error si no se encuentra el usuario en la sesión
    echo "Usuario no encontrado en la sesión.";
}


?>