<?php
require_once __DIR__ . '/../config/Conexión.php';

class Cliente extends conexion {
    private $cliente_id;
    private $nombre;
    private $cedula;
    private $telefono;
    private $fecha_registro;

    public function __construct() {}

    public function getClienteId() {
        return $this->cliente_id;
    }

    public function setClienteId($cliente_id) {
        $this->cliente_id = $cliente_id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getCedula() {
        return $this->cedula;
    }

    public function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function getFechaRegistro() {
        return $this->fecha_registro;
    }

    public function setFechaRegistro(DateTime $fecha_registro) {
        $this->fecha_registro = $fecha_registro;
    }

    public function create() {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "INSERT INTO clientes (nombre, cedula, telefono, fecha_registro) VALUES (?,?,?,?)");
        $fecha_formateada = $this->fecha_registro->format('Y-m-d H:i:s'); // Formatear la fecha
        $pre->bind_param("ssss", $this->nombre, $this->cedula, $this->telefono, $fecha_formateada);
        $pre->execute();
    }

    public function actualizar() {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "UPDATE clientes SET nombre = ?, cedula = ?, telefono = ? WHERE cliente_id = ?");
        $pre->bind_param("sssi", $this->nombre, $this->cedula, $this->telefono, $this->cliente_id);
        $pre->execute();
    }

    public function borrar() {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "DELETE FROM clientes WHERE cliente_id = ?");
        $pre->bind_param("i", $this->cliente_id);
        $pre->execute();
    }
}