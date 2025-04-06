<?php
require("../../config/Conexión.php");
require("../../models/MODELOPRODUCTOS.php");
require("../../models/Auth.php");
$aut = new Auth();
$nombre = $_POST['nombreP'];
$categoria = $_POST['categoriaP'];
$precio = $_POST['precioP'];
$descripcion = $_POST['descripcionP'];
$proveedor = $_POST['proveedorP'];
$cantidad = $_POST['cantidadP'];

$producto = new Productinho;

$producto->setNombrepr($nombre);
$producto->setCategoriaId($categoria);
$producto->setPreciopr($precio);
$producto->setDescripcionpr($descripcion);
$producto->setProveedorId($proveedor);
$producto->setCantidadpr($cantidad);

$producto->create();

$_SESSION['success'] = 'Se agregó correctamente el producto.';

header("Location: ../../views/menu.php");
/*
$producto = new Producto($conn);

if ($producto->agregarProducto($nombre, $descripcion, $precio, $categoria, $proveedor, $cantidad)) {
    header("Location: ../scriproduc.php");
} else {
    echo "Datos no insertados";
}*/
?>