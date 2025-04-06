<?php
require("../../config/Conexión.php");
require("../../models/MODELOPRODUCTOS.php");
require("../../models/Auth.php");
$aut = new Auth();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $producto_id = $_POST['Id'];
    $nombre = $_POST['nombrePP'];
    $categoria = $_POST['categoriaPP'];
    $precio = $_POST['precioPP'];
    $descripcion = $_POST['descripcionPP'];
    $proveedor = $_POST['proveedorPP'];
    $cantidad = $_POST['cantidadPP'];


    $producto = new Productinho;

    $producto->setProductoId($producto_id);
    $producto->setNombrepr($nombre);
    $producto->setCategoriaId($categoria);
    $producto->setPreciopr($precio);
    $producto->setDescripcionpr($descripcion);
    $producto->setProveedorId($proveedor);
    $producto->setCantidadpr($cantidad);
$producto->Actualizar();

$_SESSION['success'] = 'Se actualizó correctamente el producto.';

header("Location: ../../views/menu.php");

   /* $producto = new Producto($conn);

    if ($producto->actualizarProducto($producto_id, $nombre, $categoria, $precio, $descripcion, $proveedor, $cantidad)) {
        header("Location: ../scriproduc.php?mensaje=actualizado");
    } else {
        header("Location: ../scriproduc.php?mensaje=error");
    }
        */
}
?>