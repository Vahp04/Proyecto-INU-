<?php
ob_start();
//AddPage(orientation[PORTRAIT, LADSCAPE], tamaño [A3, A4, A5, LETTER, LEGAL]),
//SetFont[tipo(COURIER, HELVETICA, ARIAL, TIMES, SYMBOL, ZAPDINGBATS), estilo[normal, B, I, U], tamaño],
//Cell(ancho, alto, texto, bordes, ?, alineación, rellenar, link)
//OutPut(destino[I, D, F, S], nombre_archivo, utf-8
//$fpdf->image(ruta, posicionX, posicionY, alto, ancho, tipo, link)
//$fpdf->PageNo();
//$fpdf->AliasNoPage();
// "numero de pagina 1 de {nb}"
//$fpdf->SetTextColor(23, 42, 190)

//require_once("models/conexion.php");
//require("cequipos.php");

$categoria = $_POST["categoriaProd"];


//equipos
require_once '../../controllers/productoscontroller.php';

$controller = new ProductosController();
$productos = $controller->obtenerProductos();
$totalprod = $controller->obtenerCantidadProductos();


$consulta = "SELECT * SELECT from productos";


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
$this->Cell(0,5,"Reporte de Productos",0,0,"C");
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

//$cequi = new equipos();


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
$fpdf->Cell(15,5,"Id:", 1, 0, "C",1);
$fpdf->Cell(30,5,"Nombre:", 1, 0, "C",1);
$fpdf->Cell(30,5,"Descripcion:", 1, 0, "C",1);
$fpdf->Cell(20,5,"Precio:", 1, 0, "C",1);
$fpdf->Cell(35,5,"Categoria:", 1, 0, "C",1);
$fpdf->Cell(40,5,"Proveedor:", 1, 0, "C",1);
$fpdf->Cell(20,5,"Cantidad:", 1, 0, "C",1);



$fpdf->ln();

//$stmt = $pdo->prepare("SELECT * FROM equipos");
//$stmt->execute();
//$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$fpdf->SetFont("Arial", "", 10);
$fpdf->SetDrawColor(0,0,0);
$fpdf->SetFillColor(256,256,256);
$fpdf->SetTextColor(0,0,0);



    //obtener la cantidad de datos de la tabla
//$totaldatos = $pdo->prepare("SELECT COUNT(*) FROM equipos");
//$totaldatos->execute();

// Obtener el resultado
//$count = $totaldatos->fetchColumn();

$i=0;

foreach($productos as $row){

if($i<=$totalprod){

    if($i %2 == 0){
        $fpdf->SetFillColor(200,200,200);
    }
    else{
        $fpdf->SetFillColor(256,256,256);
    }


$fpdf->Cell(15,5,$row["producto_id"], 1, 0, "C",1);
$fpdf->Cell(30,5,$row["nombrepr"], 1, 0, "C",1);
$fpdf->Cell(30,5,$row["descripcionpr"], 1, 0, "C",1);
$fpdf->Cell(20,5,$row["preciopr"], 1, 0, "C",1);
$fpdf->Cell(35,5,$row["nombrecat"], 1, 0, "C",1);
$fpdf->Cell(40,5,$row["nombre_prove"], 1, 0, "C",1);
$fpdf->Cell(20,5,$row["cantidadpr"], 1, 0, "C",1);
$fpdf->ln();

$i++;
}

}

ob_end_clean();

$fpdf->Output('PDF productos.pdf', 'D');