<?php
require("../../config/Conexión.php");
require("../../models/MODELOPROVEEDORES.php");
require("../../models/Auth.php");
$aut = new Auth();

$nombre = $_POST['nombreProve'];
$direccion = $_POST['direccionProve'];
$telefono = $_POST['telefonoProve'];


$proveedor = new Proveedorx;

$proveedor->setNombre($nombre);
$proveedor->setDireccion($direccion);
$proveedor->setTelefono($telefono);

$proveedor->create();

$_SESSION['success'] = 'Se agregó correctamente el proveedor.';

header("Location: ../../views/menu.php");
/*
if ($proveedor->agregarProveedor($nombre, $direccion, $telefono)) {
    header("Location: ../scriproves.php");
} else {
    echo "Datos no insertados";
}*/
?>