<?php

// auth.php esta clase es para estandarizar el valor de la variable id y reutilizarla
class Auth {
    //crear la variable del id del usario
    private $user_id;

    public function __construct() {
        session_start();// toma la variable de la sesion uniciada
        if (isset($_SESSION["user_id"])) {//se toma el id del usuario
            $this->user_id = $_SESSION["user_id"];
        }
    }

    public function isLoggedIn() { 
        return isset($this->user_id);
    }
//se rescata el id del usaurio
    public function getUserId() {
        return $this->user_id;
    }   
// manda al login si no encuentra al usuario
    public function redirectToLogin() {
        header("Location: login.php");
        exit();
    }
}


?>