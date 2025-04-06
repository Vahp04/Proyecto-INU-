<?php
require_once 'pdf/fpdf.php';
require_once 'models/Productos.php';

class ReporteProducto {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function generarReporte() {
        ob_start(); 
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'Reporte de Productos', 0, 1, 'C');

        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(30, 10, 'ID', 1, 0, 'C');
        $pdf->Cell(60, 10, 'Nombre', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Categoría', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Precio', 1, 0, 'C');
        $pdf->Cell(100, 10, 'Descripción', 1, 0, 'C');
        $pdf->Ln();

        $producto = new Producto($this->conn);
        $result = $producto->obtenerProductos();

        while ($row = $result->fetch_assoc()) {
            $pdf->Cell(30, 10, $row['producto_id'], 1, 0, 'C');
            $pdf->Cell(60, 10, $row['nombrepr'], 1, 0, 'C');
            $pdf->Cell(40, 10, $row['nombrecat'], 1, 0, 'C');
            $pdf->Cell(30, 10, $row['preciopr'], 1, 0, 'C');
            $pdf->Cell(100, 10, $row['descripcionpr'], 1, 0, 'C');
            $pdf->Ln();
        }

        $pdf->Output('ReporteProductos.pdf', 'D');
        ob_flush();
        ob_end_clean();
        exit;
    }
}



?>