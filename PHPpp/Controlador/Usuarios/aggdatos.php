<?php
//require("../../config/Conexion.php");
//require("Usuario.php");
require("../../config/Conexión.php");
require("../../Modelo/MODELOUSUARIOS.php");

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$usuario_obj = new Usuariox;

$usuario_obj->setUsuario($usuario);
$usuario_obj->setContrasena($contrasena);

$usuario_obj->create();
header("Location: ../../Vista_usuarios.php");