<?php
require_once __DIR__ . '/../config/Conexión.php';

class Salida extends conexion {
    private $salida_id;
    private $producto_id;
    private $fecha;
    private $cantidad;
    private $usuario_id;

    public function __construct() {}

    public function getEntradaId() {
        return $this->salida_id;
    }

    public function setEntradaId($salida_id) {
        $this->salida_id = $salida_id;
    }

    public function getProductoId() {
        return $this->producto_id;
    }

    public function setProductoId($producto_id) {
        $this->producto_id = $producto_id;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    public function getUsuarioId() {
        return $this->usuario_id;
    }

    public function setUsuarioId($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    public function create() {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "INSERT INTO salidas (producto_id, fecha, cantidad, usuario_id) VALUES (?,?,?,?)");
        $fecha_formateada = $this->fecha->format('Y-m-d H:i:s'); // Formatear la fecha
        $pre->bind_param("issi", $this->producto_id, $fecha_formateada, $this->cantidad, $this->usuario_id);
        $pre->execute();
    }
    public function getIdProductoByName($nombre_producto) {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "SELECT producto_id FROM producto WHERE nombrepr = ?");
        $pre->bind_param("s", $nombre_producto);
        $pre->execute();
        $result = $pre->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['producto_id'];
        } else {
            return null; // o algún valor predeterminado si no se encuentra el producto
        }
    }
    public function getIdusuarioByName($nombre_producto) {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "SELECT id_usuarios FROM usuarios WHERE usuario = ?");
        $pre->bind_param("s", $nombre_producto);
        $pre->execute();
        $result = $pre->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['id_usuarios'];
        } else {
            return null; // o algún valor predeterminado si no se encuentra el producto
        }
    }

    public function getcantidadByName($nombre_producto) {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "SELECT cantidadpr FROM producto WHERE nombrepr = ?");
        $pre->bind_param("s", $nombre_producto);
        $pre->execute();
        $result = $pre->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['cantidadpr'];
        } else {
            return null; // o algún valor predeterminado si no se encuentra el producto
        }
    }

}