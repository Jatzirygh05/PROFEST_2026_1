<?php 
	$img_file = '../imagenes/pie_pagina_2025.png'; //se actualizo el logo del reporte 06/02/2025		
	$this->Image($img_file, 6, 245, 210, 45, '', '', '', false, 50, '', false, false, 0);
	
	$this->Ln(50);
	$this->Cell(5);
	$this->SetFont('Arial','B',9);	
	$this->Ln(55);
	$this->Cell(4);
	//$this->MultiCell(100,4,utf8_decode('Nota: Para su evaluación este anexo deberá contener la totalidad de la información requerida. El incumplimiento podría ser causa de descarte.'),0,'L');
	$this->MultiCell(100,4,utf8_decode(''),0,'L');
	$this->Ln(-8);
	$this->Cell(90);
	//$this->Cell(101,4,'ANEXO 5',0,0,'R');
	$this->Cell(101,4,'',0,0,'R');
	$this->Ln(8);
	$this->Cell(91);
	$this->Cell(103,4,'   HOJA: '.$this->PageNo().' DE {nb}',0,0,'R');

	
?>