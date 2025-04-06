<?php
require("../../config/Conexión.php");
require("../../Modelo/MODELOUSUARIOS.php");

$usuario_id = $_GET["Id"];

$usuario_obj = new Usuariox;

$usuario_obj->setIdUsuario($usuario_id);

$usuario_obj->borrar();

header("Location: ../../Vista_usuarios.php");