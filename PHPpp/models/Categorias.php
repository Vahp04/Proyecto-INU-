<?php
class Categoria {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function obtenerCategorias() {
        $sql = "SELECT * FROM categoria";
        return $this->conn->query($sql);
    }
}
?>