<?php
class Conexion{
    private $DBType = 'mysqli';
    private $DBServer = '127.0.0.1'; // server name or IP address
    private $DBUser = 'usuario';
    private $DBPass = 'contraseña';
    private $DBName = 'deco';

    public function __construct(){}
    
    public function conectar(){
        $con = adoNewConnection($this->DBType);
        $con->debug = true;
        $con->connect($this->DBServer,$this->DBUser,$this->DBPass,$this->DBName);
        echo "conectado";
        return $con;
    }
}