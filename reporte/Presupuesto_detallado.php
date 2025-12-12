<?php require('../fpdf181/fpdf.php');

//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

$cve_user = $_SESSION['MM_Username'];

class PDF extends FPDF
{
//Cabecera de página

	function Header()
	{
	include ("header_presup_detallado2023.php");
	}
	function Footer()
	{
	$this->SetY(-121);
	include ("footer_presup_detallado2023.php");
	}
}

//Creación del objeto de la clase heredada
$pdf=new PDF('P','mm',array(225,279));
$pdf->SetMargins(12,17,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);	
include ('body_presup_detallado2023.php');

$pdf->Output();
?>