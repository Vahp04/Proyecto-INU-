<?php
require("../../config/Conexión.php");
require("../../models/MODELOCLIENTES.php");
require("../../models/Auth.php");
$aut = new Auth();

$id = $_POST['idC'];
$nombre = $_POST['nombre'];
$cedula = $_POST['cedula'];
$telefono = $_POST['telefono'];

$usuario_obj = new Cliente;

$usuario_obj->setClienteId($id);
$usuario_obj->setNombre($nombre);
$usuario_obj->setCedula($cedula);
$usuario_obj->setTelefono($telefono);

$usuario_obj->actualizar();
$_SESSION['success'] = 'Se editó correctamente el cliente.';
header("Location: ../../views/menu.php");