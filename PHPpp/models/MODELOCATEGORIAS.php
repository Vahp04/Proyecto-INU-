<?php
include_once "../config/Conexion.php";

class Categoriax extends Conexion {
    private $categoria_id;
    private $nombre;
    private $descripcion;

    public function __construct() {}

    public function getCategoriaId() {
        return $this->categoria_id;
    }

    public function setCategoriaId($categoria_id) {
        $this->categoria_id = $categoria_id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function create() {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "INSERT INTO categoria (nombrecat, descripcioncat) VALUES (?,?)");
        $pre->bind_param("ss", $this->nombre, $this->descripcion);
        $pre->execute();
    }

    public function actualizar() {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "UPDATE categoria SET nombrecat = ?, descripcioncat = ? WHERE categoria_id = ?");
        $pre->bind_param("ssi", $this->nombre, $this->descripcion, $this->categoria_id);
        $pre->execute();
    }

    public function borrar() {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "DELETE FROM categoria WHERE categoria_id = ?");
        $pre->bind_param("i", $this->categoria_id);
        $pre->execute();
    }
}