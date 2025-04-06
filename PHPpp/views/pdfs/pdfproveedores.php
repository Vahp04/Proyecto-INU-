<?php
ob_start();

require_once '../../controllers/proveedorescontroller.php';

$controller = new ProveedoresController();
$proveedores = $controller->obtenerProveedores();
$totalprove = $controller->obtenerCantidadProveedores();


$consulta = "SELECT * SELECT from proveedores";


include("../../fpdf/fpdf.php");

$fpdf = new FPDF();

$fpdf->AddPage("PORTRAIT", "LETTER");


class pdf extends FPDF{



    public function header(){
        $this->SetY(3.2);
        $this->SetFillColor( 21, 67, 96 );
        $this->Cell(196,25,"",0,0,"C",true);
        $this->SetFont("Courier","B", 10);
        $this->SetXY(10,15);
        $this->SetTextColor(256,256,256);
        $this->Cell(0,5, "",0,0,"C");
        $this->SetX(-40);
        $this->Image('../../img/pdfcomia.jpg', 168, 10, 30, 10, 'jpg');
        $this->Ln(30);
        $this->SetFont("Arial", "B", 16);
$this->SetY(35);
$this->SetTextColor(23, 42,96);
$this->Cell(0,5,"Reporte de Categorias",0,0,"C");
$this->SetDrawColor(61,80,233);
$this->SetLineWidth(1);
$this->Line(60, $this->GetY()+10,158,$this->GetY()+10);
$this->ln(20);
    }


    public function footer(){
        $this->SetFont("Courier","B", 10);
        $this->SetY(-15);

        $this->SetX(-35);
        $this->AliasNbPages("tpagina");
        $this->Write(5, $this->PageNo()."/tpagina");
        
    }
}

$fpdf = new pdf("PORTRAIT", "mm", "A4", true);

$fpdf->AddPage("PORTRAIT", "LETTER");
$fpdf->SetFont("Arial", "B", 12);


$fpdf->SetLineWidth(0);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->SetFont("arial","",10);


$fpdf->SetFont("Arial", "B", 10);
$fpdf->SetDrawColor(88,88,88);
$fpdf->SetFillColor(11,63,71);
$fpdf->SetTextColor(256,256,256);
$fpdf->Cell(20,5,"Id:", 1, 0, "C",1);
$fpdf->Cell(40,5,"Nombre:", 1, 0, "C",1);
$fpdf->Cell(100,5,"Direccion:", 1, 0, "C",1);
$fpdf->Cell(30,5,"Telefono:", 1, 0, "C",1);



$fpdf->ln();

$fpdf->SetFont("Arial", "", 10);
$fpdf->SetDrawColor(0,0,0);
$fpdf->SetFillColor(256,256,256);
$fpdf->SetTextColor(0,0,0);

$i=0;

foreach($proveedores as $row){

if($i<=$totalprove){

    if($i %2 == 0){
        $fpdf->SetFillColor(200,200,200);
    }
    else{
        $fpdf->SetFillColor(256,256,256);
    }


$fpdf->Cell(20,5,$row["proveedor_id"], 1, 0, "C",1);
$fpdf->Cell(40,5,$row["nombre_prove"], 1, 0, "C",1);
$fpdf->Cell(100,5,$row["direccion_prove"], 1, 0, "C",1);
$fpdf->Cell(30,5,$row["telefono_prove"], 1, 0, "C",1);
$fpdf->ln();

$i++;
}

}

ob_end_clean();

$fpdf->Output('PDF proveedores.pdf', 'D');