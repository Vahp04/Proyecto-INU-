<?php

require("../../config/Conexión.php");
require("../../models/MODELOPROVEEDORES.php");
require("../../models/Auth.php");
$aut = new Auth();

$Id = $_GET["Id"];

$proveedor = new Proveedorx;

$proveedor->setProveedorId($Id);

$proveedor->borrar();

$_SESSION['success'] = 'Se eliminó correctamente el proveedor.';

header("Location: ../../views/menu.php");
/*
$db = "DELETE FROM proveedores WHERE proveedor_id = '$Id'";

$query = mysqli_query($conn, $db);

if($query === TRUE){
    header("Location: ../scriproves.php");
}*/
?>