<?
require_once 'pdf/fpdf.php';
require_once 'models/Proveedores.php';

class ProveedoresController {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function crearPdf() {
        ob_start(); 
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'Proveedores', 0, 1, 'C');

        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(20, 10, 'ID', 1, 0, 'C');
        $pdf->Cell(60, 10, 'Nombre', 1, 0, 'C');
        $pdf->Cell(80, 10, 'Dirección', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Teléfonos', 1, 0, 'C');
        $pdf->Ln();

        $proveedores = new Proveedores($this->conn);
        $result = $proveedores->obtenerProveedores();

        while ($row = $result->fetch_assoc()) {
            $pdf->Cell(20, 10, $row['proveedor_id'], 1, 0, 'C');
            $pdf->Cell(60, 10, $row['nombre_prove'], 1, 0, 'C');
            $pdf->Cell(80, 10, $row['direccion_prove'], 1, 0, 'C');
            $pdf->Cell(40, 10, $row['telefono_prove'], 1, 0, 'C');
            $pdf->Ln();
        }

        $pdf->Output('Proveedores.pdf', 'D');
        ob_flush();
        ob_end_clean();
        exit;
    }
}
?>