<?php
class Producto {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function obtenerProductos() {
        $sql = "SELECT producto.producto_id, producto.nombrepr, categoria.nombrecat, producto.preciopr, producto.descripcionpr, proveedores.nombre_prove, producto.cantidadpr
                FROM producto
                INNER JOIN categoria ON producto.categoria_id = categoria.categoria_id
                INNER JOIN proveedores ON producto.proveedor_id = proveedores.proveedor_id";
        return $this->conn->query($sql);
    }
}
?>