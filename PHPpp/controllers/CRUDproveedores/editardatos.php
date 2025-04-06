<?php
require("../../config/Conexión.php");
require("../../models/MODELOPROVEEDORES.php");
require("../../models/Auth.php");
$aut = new Auth();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Proveedor_id = $_POST['Proveedor_id'];
    $nombre = $_POST['nombre_prove'];
    $direccion = $_POST['direccion_prove'];
    $telefono = $_POST['telefono_prove'];

    $proveedor = new Proveedorx;

    $proveedor->setProveedorId($Proveedor_id);
    $proveedor->setNombre($nombre);
    $proveedor->setDireccion($direccion);
    $proveedor->setTelefono($telefono);
    
    $proveedor->actualizar();

    $_SESSION['success'] = 'Se actualizó correctamente el proveedor.';

    header("Location: ../../views/menu.php");

    /*
    if ($proveedor->actualizarProveedor($Proveedor_id, $nombre, $direccion, $telefono)) {
        header("Location: ../scriproves.php?mensaje=actualizado");
    } else {
        header("Location: ../scriproves.php?mensaje=error");
    }*/
}
?>