<?php
require("../../config/Conexión.php");
require("../../models/MODELOCATEGORIAS.php");
require("../../models/Auth.php");
$aut = new Auth();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombreC'];
    $descripcion = $_POST['descripcionC'];

    $categoria = new Categoriax;

    $categoria->setNombre($nombre);
    $categoria->setDescripcion($descripcion);

    $categoria->create();

    $_SESSION['success'] = 'Se agregó correctamente la categoria.';

    header("Location: ../../views/menu.php");
    /*if ($categoria->agregarCategoria($nombre, $descripcion)) {
        header("Location: ../scripcatego.php");
    } else {
        echo "Datos no insertados";
    }*/
}
?>