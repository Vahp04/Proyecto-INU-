<?php
require_once "../config/Conexión.php";

class ListarUsuarios {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
        $this->conexion->conectar();
    }

    public function listarUsuarios() {
        $consulta = "SELECT * FROM usuarios";
        $resultado = mysqli_query($this->conexion->con, $consulta);
        return $resultado;
    }
}