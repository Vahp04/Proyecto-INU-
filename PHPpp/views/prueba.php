<?
require_once 'views/scriproves.php';
if (isset($_POST['descargarProveedores'])) {
    $proveedoresController = new ProveedoresController($conn);
    $proveedoresController->crearPdf();
    exit;
}
?>