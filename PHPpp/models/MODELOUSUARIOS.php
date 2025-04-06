<?php
require_once __DIR__ . '/../config/Conexión.php';

class Usuariox extends conexion {
    private $id_usuario;
    private $usuario;
    private $contrasena;

    public function __construct() {}

    public function getIdUsuario() {
        return $this->id_usuario;
    }

    public function setIdUsuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function getContrasena() {
        return $this->contrasena;
    }

    public function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    public function create() {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "INSERT INTO usuarios (usuario, contrasena) VALUES (?,?)");
        $pre->bind_param("ss", $this->usuario, $this->contrasena);
        $pre->execute();
    }

    public function actualizar() {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "UPDATE usuarios SET usuario = ?, contrasena = ? WHERE id_usuarios = ?");
        $pre->bind_param("ssi", $this->usuario, $this->contrasena, $this->id_usuario);
        $pre->execute();
    }

    public function borrar() {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "DELETE FROM usuarios WHERE id_usuarios = ?");
        $pre->bind_param("i", $this->id_usuario);
        $pre->execute();
    }
}