<?php
require("../../config/Conexión.php");
require("../../Modelo/MODELOUSUARIOS.php");

$usuario_id = $_POST['idC'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$usuario_obj = new Usuariox;

$usuario_obj->setIdUsuario($usuario_id);
$usuario_obj->setUsuario($usuario);
$usuario_obj->setContrasena($contrasena);

$usuario_obj->actualizar();
header("Location: ../../Vista_usuarios.php");