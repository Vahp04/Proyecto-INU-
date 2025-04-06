<?php
require_once __DIR__ . '/../config/Conexión.php';

class Proveedorx extends conexion {
    private $proveedor_id;
    private $nombre;
    private $direccion;
    private $telefono;

    public function __construct() {}

    public function getProveedorId() {
        return $this->proveedor_id;
    }

    public function setProveedorId($proveedor_id) {
        $this->proveedor_id = $proveedor_id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function create() {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "INSERT INTO proveedores (nombre_prove, direccion_prove, telefono_prove) VALUES (?,?,?)");
        $pre->bind_param("sss", $this->nombre, $this->direccion, $this->telefono);
        $pre->execute();
    }

    public function actualizar() {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "UPDATE proveedores SET nombre_prove = ?, direccion_prove = ?, telefono_prove = ? WHERE proveedor_id = ?");
        $pre->bind_param("sssi", $this->nombre, $this->direccion, $this->telefono, $this->proveedor_id);
        $pre->execute();
    }

    public function borrar() {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "DELETE FROM proveedores WHERE proveedor_id = ?");
        $pre->bind_param("i", $this->proveedor_id);
        $pre->execute();
    }
}