<?php
require("../../config/Conexión.php");
require("../../models/MODELOCLIENTES.php");
require("../../models/Auth.php");
$aut = new Auth();

$usuario_id = $_GET["Id"];

$usuario_obj = new Cliente;

$usuario_obj->setClienteId($usuario_id);

$usuario_obj->borrar();

$_SESSION['success'] = 'Se eliminó correctamente el cliente.';

header("Location: ../../views/menu.php");