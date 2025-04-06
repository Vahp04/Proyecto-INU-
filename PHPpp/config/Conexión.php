<?php
class conexion{
/*public $servername = "localhost";
public $username = "root";
public $password = "";
public $dbname = "php-login";*/

// Crear conexión
    public $con;
    public function conectar(){
        $this->con = mysqli_connect("localhost", "root", "", "inventario");
    }
}