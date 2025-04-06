<?php

require("../../config/Conexión.php");
require("../../models/MODELOCATEGORIAS.php");
require("../../models/Auth.php");
$aut = new Auth();

$Id = $_GET["Id"];

$categoria = new Categoriax;

$categoria->setCategoriaId($Id);

$categoria->borrar();

$_SESSION['success'] = 'Se eliminó correctamente la categoria.';

header("Location: ../../views/menu.php");
/*
if($query === TRUE){
    header("Location: ../scripcatego.php");
}*/
?>