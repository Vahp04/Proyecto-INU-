<?php
require("../../config/Conexión.php");
require("../../models/MODELOCATEGORIAS.php");
require("../../models/Auth.php");
$aut = new Auth();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $categoria_id = $_POST['idC'];
    $nombre = $_POST['nombreC'];
    $descripcion = $_POST['descripcionC'];

    $categoria = new Categoriax;

    $categoria->setCategoriaId($categoria_id);
    $categoria->setNombre($nombre);
    $categoria->setDescripcion($descripcion);

    $categoria->actualizar();

    $_SESSION['success'] = 'Se editó correctamente la cat.';

    header("Location: ../../views/menu.php");
/*
    if ($categoria->actualizarCategoria($categoria_id, $nombre, $descripcion)) {
        header("Location: ../scripcatego.php?mensaje=actualizado");
    } else {
        header("Location: ../scripcatego.php?mensaje=error");
    }*/
}
?>