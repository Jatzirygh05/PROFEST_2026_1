<?php require('../../fpdf181/fpdf.php');

$cve_user = $_GET['cve_user_imp'];
$id_solicitud = $_GET['id_solicitud'];

//echo "<script type=\"text/javascript\">alert('Ocurrió un problema, vuelve a intentar por favor.'".$v_emp.");</script>";
//header('Content-Type: text/html; charset=ISO-8859-1');
class PDF extends FPDF
{
	//Cabecera de página
	function Header()
	{
	include ("header.php");
	}
	function Footer()
	{
	$this->SetY(-121);
	include ("footer.php");
	}
}

//Creación del objeto de la clase heredada
$pdf=new PDF('P','mm',array(225,279));
$pdf->SetMargins(12,17,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);	
include ('body.php');

$pdf->Output();
?>