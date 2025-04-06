<?php

require_once '../../config/conexxion.php';

class ProductosController {
    private $db;

    public function __construct() {
        $conexion = new conexion(); // crear una instancia de la clase Conexion
        $this->db = $conexion->pdo; // asignar la conexión a la propiedad $db
    }

    public function obtenerProductos() {
        if ($this->db) {
            $stmt = $this->db->query("
                SELECT p.producto_id, p.nombrepr, p.descripcionpr, p.preciopr, c.nombrecat, prov.nombre_prove, p.cantidadpr 
                FROM producto AS p
                INNER JOIN categoria AS c ON p.categoria_id = c.categoria_id
                INNER JOIN proveedores AS prov ON p.proveedor_id = prov.proveedor_id
            ");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            die("Error: No se pudo establecer la conexión con la base de datos.");
        }
    }
    

    public function obtenerCantidadProductos() {
        // consulta para contar los registros en la tabla
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM producto");
        $stmt->execute();

        // obtener y retornar el resultado
        return $stmt->fetchColumn();
    }


    public function obtenerCategoriasFiltrados() {
        if ($this->db) {
            $stmt = $this->db->query("
                SELECT p.producto_id, p.nombrepr, p.descripcionpr, p.preciopr, c.nombrecat, prov.nombre_prove, p.cantidadpr 
                FROM producto AS p
                INNER JOIN categoria AS c ON p.categoria_id = c.categoria_id
                INNER JOIN proveedores AS prov ON p.proveedor_id = prov.proveedor_id WHERE c.nombrecat
            ");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            die("Error: No se pudo establecer la conexión con la base de datos.");
        }
    }
    }