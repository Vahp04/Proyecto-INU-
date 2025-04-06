<?php
require("../../config/Conexión.php");
require("../../models/MODELOUSUARIOS.php");
require("../../models/Auth.php");
$aut = new Auth();

$usuario_id = $_GET["Id"];

$usuario_obj = new Usuariox;

$usuario_obj->setIdUsuario($usuario_id);

$usuario_obj->borrar();

header("Location: ../../views/Vista_usuarios.php");