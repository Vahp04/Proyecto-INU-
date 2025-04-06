<?php
require("../../config/Conexión.php");
require("../../models/MODELOENTRADAS.php");
require("../../models/Auth.php");
require("../../models/MODELOPRODUCTOS.php");
$aut = new Auth();
$user = $aut->getUsuarioActual();


$Producto = $_POST['Producto'];
$Cantidad = $_POST['Cantidad'];
$fecha_hoy = $_POST['fecha_hoy'];
$fecha_cadu = $_POST['date'];

$fecha1 = new DateTime($fecha_hoy);
$fecha2 = new DateTime($fecha_cadu);

$fecha3 =   $fecha1->format('Y-m-d');
$fecha4 =   $fecha2->format('Y-m-d');

$usuario_obj = new Entrada;
$Productoid = $usuario_obj->getIdProductoByName($Producto);
$userID = $usuario_obj->getIdusuarioByName($user);

$usuario_obj->setProductoId($Productoid);
$usuario_obj->setCantidad($Cantidad);
$usuario_obj->setFecha($fecha3);
$usuario_obj->setUsuarioId($userID);
$usuario_obj->setFechaCadu($fecha4);
$usuario_obj->create();

$Cantidad_inv =$usuario_obj->getcantidadByName($Producto);

$cantidadsumada = $Cantidad_inv + $Cantidad;
$Productoz = new Productinho;
$Productoz->setNombrepr($Producto);
$Productoz->setCantidadpr($cantidadsumada);
$Productoz->Actualizarcantidad();

$_SESSION['success'] = 'Se agregó correctamente el producto.';

header("Location: ../../views/menu.php");