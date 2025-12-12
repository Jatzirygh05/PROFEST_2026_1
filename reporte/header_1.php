<?php

$MARGEN_HEADER = 0;

$this->SetFont('Arial','B',10);
$this->Cell(110);
$this->Cell(82,5,"PROYECTO",$MARGEN_HEADER,1,'R',0);	
$this->Cell(110);
$this->Cell(82,5,'Convocatoria',$MARGEN_HEADER,1,'R',0);	
$this->Cell(110);
$this->Cell(82,5,utf8_decode('Apoyo a Festivales Culturales y Artísticos'),$MARGEN_HEADER,1,'R',0);	
$this->Cell(110);
$this->Cell(82,5,utf8_decode('PROFEST 2020'),$MARGEN_HEADER,1,'R',0);




// Le paso la ruta de la imagen que se usará de fondo
		$img_file = 'cultura_completo_v2.png'; //se actualizo el logo del reporte 23/03/2020
		//Parámetros para la calidad de la imagen
		//$pdf->Image($img_file, lado izquierdo, supeior, ancho, alto, '', '', '', false, 500, '', false, false, 0);
		
		$this->Image($img_file, 13, 16, 70, 20, '', '', '', false, 50, '', false, false, 0);

?>