<?php
require("../../config/Conexión.php");
require("../../models/MODELOPRODUCTOS.php");
require("../../models/Auth.php");
$aut = new Auth();
$Id = $_GET["Id"];
$producto = new Productinho;
$producto->setProductoId($Id);
$producto->Borrar();

$_SESSION['success'] = 'Se eliminó correctamente el producto.';

header("Location: ../../views/menu.php");
/*
$Id = $_GET["Id"];
$db = "DELETE FROM producto WHERE producto_id = '$Id'";

$query = mysqli_query($conn, $db);

if($query === TRUE){
    header("Location: ../scriproduc.php");
}*/
?>