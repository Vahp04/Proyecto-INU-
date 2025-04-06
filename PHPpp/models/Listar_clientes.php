<?php
require_once "../config/Conexión.php";

class Listarclientes {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
        $this->conexion->conectar();
    }

    public function listarclientes() {
        $consulta = "SELECT * FROM clientes";
        $resultado = mysqli_query($this->conexion->con, $consulta);
        return $resultado;
    }
}