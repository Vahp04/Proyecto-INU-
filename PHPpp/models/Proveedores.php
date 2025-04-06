<?php
class Proveedores {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function obtenerProveedores() {
        $query = "SELECT * FROM proveedores";
        return $this->conn->query($query);
    }
}
?>