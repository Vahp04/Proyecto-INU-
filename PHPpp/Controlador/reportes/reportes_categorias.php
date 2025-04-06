<?
require_once 'pdf/fpdf.php';
require_once 'models/Categoria.php';

class CategoriaController {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function crearPdf() {
        ob_start(); 
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'Categorias', 0, 1, 'C');

        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(30, 10, 'ID', 1, 0, 'C');
        $pdf->Cell(60, 10, 'Nombre', 1, 0, 'C');
        $pdf->Cell(100, 10, 'Descripción', 1, 0, 'C');
        $pdf->Ln();

        $categoria = new Categoria($this->conn);
        $result = $categoria->obtenerCategorias();

        while ($row = $result->fetch_assoc()) {
            $pdf->Cell(30, 10, $row['id_categoria'], 1, 0, 'C');
            $pdf->Cell(60, 10, $row['nombre_categoria'], 1, 0, 'C');
            $pdf->Cell(100, 10, $row['descripcion_categoria'], 1, 0, 'C');
            $pdf->Ln();
        }
        $pdf->Output('Categorias.pdf', 'D');
        ob_flush();
        ob_end_clean();
        exit;
    }

    
        }
?>