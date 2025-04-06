<?php

require_once "../../config/conexxion.php";

class CategoriasController {
    private $db;

    public function __construct() {
        $conexion = new conexion(); // instancia de la clase Conexion
        $this->db = $conexion->pdo; // Asignar la conexión a la propiedad $db
    }

    public function obtenerCategorias() {
        if ($this->db) { 
            $stmt = $this->db->query("SELECT * FROM categoria");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            die("Error: No se pudo establecer la conexión con la base de datos.");
        }
    }

    public function obtenerCantidadCategorias() {
        // consulta para contar los registros en la tabla
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM categoria");
        $stmt->execute();

        // obtener y retornar el resultado
        return $stmt->fetchColumn();
    }
    }