<?php
require("../../config/Conexión.php");
require("../../models/MODELOCLIENTES.php");
require("../../models/Auth.php");
$aut = new Auth();

$nombre = $_POST['nombre'];
$cedula = $_POST['cedula'];
$telefono = $_POST['telefono'];
$fecha = $_POST['fecha_hoy'];
$fecha1 = DateTime::createFromFormat('d/m/Y', $fecha);

$usuario_obj = new Cliente;

$usuario_obj->setNombre($nombre);
$usuario_obj->setCedula($cedula);
$usuario_obj->setTelefono($telefono);
$usuario_obj->setFechaRegistro($fecha1);

$usuario_obj->create();
$_SESSION['success'] = 'Se agregó correctamente el cliente.';
header("Location: ../../views/menu.php");