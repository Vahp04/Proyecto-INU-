<?php
class Auth {
    public function __construct() {
        session_start();
    }

    public function checkAuth() {
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php");
            exit();
        }
    }

    public function getUsuario() {
        return $_SESSION['usuario'];
    }
    public static function getUsuarioActual() {
        if (isset($_SESSION['usuario'])) {
            return $_SESSION['usuario'];
        } else {
            return null;
        }}

    public function logout() {
        session_destroy();
        header("Location: ../index.php");
        exit();
    }
}
?>