<?php
require("../../config/Conexión.php");
require("../../models/MODELOSALIDAS.php");
require("../../models/MODELOPRODUCTOS.php");
require("../../models/Auth.php");
$aut = new Auth();
$user = $aut->getUsuarioActual();


$Producto = $_POST['Producto'];
$Cantidad = $_POST['Cantidad'];
$fecha_hoy = $_POST['fecha_hoy'];
$fecha1 = DateTime::createFromFormat('d/m/Y', $fecha_hoy);


$usuario_obj = new Salida;
$Productoid = $usuario_obj->getIdProductoByName($Producto);
$Cantidad_inv = $usuario_obj->getcantidadByName($Producto);

if($Cantidad_inv>$Cantidad){
$userID = $usuario_obj->getIdusuarioByName($user);


$cantidad_resultante = $Cantidad_inv - $Cantidad;

$productos = new Productinho;
$productos->setNombrepr($Producto);
$productos->setCantidadpr($cantidad_resultante);
$productos->Actualizarcantidad();

$usuario_obj->setProductoId($Productoid);
$usuario_obj->setCantidad($Cantidad);
$usuario_obj->setFecha($fecha1);
$usuario_obj->setUsuarioId($userID);
$usuario_obj->create();
$_SESSION['success'] = 'Se retiró correctamente el producto.';
if($cantidad_resultante<10){
    $_SESSION['message'] = 'Quedan pocas unidades del producto.';

}
header("Location: ../../views/menu.php");}
else{
    $_SESSION['error'] = 'No puedes retirar más de lo disponible. La cantidad disponible es de '.$Cantidad_inv;
    header("Location: ../../views/menu.php");
    exit;
}