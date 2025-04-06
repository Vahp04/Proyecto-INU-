<?php
include_once "../config/Conexión.php";
require("../models/Usuario.php");

$a = new conexion();
$a->conectar();

if ($a->con->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$user = new Usuarios();
$user->usuario = $usuario;
$user->contrasena = $contrasena;
$user->create();
echo "Registro exitoso. <a href='index.php'>Ir al Login</a>";


