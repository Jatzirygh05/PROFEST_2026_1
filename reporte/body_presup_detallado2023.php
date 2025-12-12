<?php include("../Connections/conexion.php");

$cve_user;

include('consultas_reporte_proyecto.php');

	//INICIO Primera parte

	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(5);
	$pdf->Ln(8);
	$pdf->Cell(1);
	$pdf->Cell(45,8,'Nombre del Festival:  '.utf8_decode($nombre_festival),0,0,'L');
	$pdf->Line(47, 47, 203, 47);
	

	$pdf->Ln(20);
	$pdf->Cell(4);
	$pdf->Cell(187,5,'PRESUPUESTO DETALLADO DEL RECURSO SOLICITADO A LA SECRETARIA DE CULTURA',1,0,'C');
	$pdf->SetFont('Arial','B',8);
	$pdf->Ln(5);
	$pdf->Cell(4);
	$pdf->Multicell(187,5,'*Se recomienda verificar los conceptos de gasto que se detallan en la convocatoria para el uso del recurso PROFEST, de acuerdo con la disciplina del festival.',1,'C');
	$pdf->Cell(4);
	$pdf->Cell(10,5,'No.',1,0,'C');
	$pdf->Cell(50,5,'Tipo de gasto',1,0,'C');
	$pdf->Cell(50,5,'Concepto',1,0,'C');
	$pdf->Cell(20,5,'Unidad',1,0,'C');
	$pdf->Cell(27,5,'Costo unitario',1,0,'C');
	$pdf->Multicell(30,2.5,'Monto total con impuestos incluidos',1,'C');

	$y=$pdf->GetY();
	
	$pdf->SetFont('Arial','',8);
	
	//A
	$y_jat = $pdf->SetY($y); // Inicio
	
	$consulta_rep_presup="SELECT * FROM reque_v2_1_2 where clave_usuario='".$cve_user."';";
	$exe_consulta_rep_presup=mysqli_query($con, $consulta_rep_presup);
	$k=0;
	$kk=0;
	$i=30;
	$sum = 0;

		while($fila2=mysqli_fetch_array($exe_consulta_rep_presup, MYSQLI_ASSOC)){
			
			$tipogasto = $fila2['tipogasto'];
            $concepto = $fila2['concepto'];
            $unidad   = $fila2['unidad'];
            $costo_unitario_imp_incluidos = $fila2['costo_unitario_imp_incluidos'];
          $monto_tot_imp_incluidos_UNO =  $unidad * $costo_unitario_imp_incluidos;
            $monto_tot_imp_incluidos  =  number_format($monto_tot_imp_incluidos_UNO, 2, '.', '');

	/*$presup_sum="SELECT sum(costo_unitario_imp_incluidos) as suma_final FROM reque_v2_1_2 where clave_usuario='".$cve_user."';";
	$exe_presup_sum=mysqli_query($con, $presup_sum);
    $fila_j=mysqli_fetch_array($exe_presup_sum, MYSQLI_ASSOC);*/
			
			 $suma_final = $monto_tot_imp_incluidos_UNO+$suma_final;
		

$sum=$sum+1;
			/*if($k==$i){
				$k=0;
				$pdf->AddPage();
				$y4=$pdf->GetY();
				$y_jony = $pdf->SetY($y4);
				$pdf->Ln(4);
				$pdf->Cell(4);
				$pdf->Cell(187,5,'Financiamiento/Presupuesto del costo total del Festival',1,0,'C');
				$pdf->Ln(5);
				$y4=$pdf->GetY();
				$y_jony = $pdf->SetY($y4);	
				$pdf->Cell(4);
				$pdf->Cell(84,5,'Concepto de gasto',1,0,'C');
				$pdf->Cell(48,5,'Fuente de financiamiento',1,0,'C');
				$pdf->Cell(35,5,'Monto/unidad',1,0,'C');
				$pdf->Cell(20,5,'Porcentaje',1,0,'C');
				$pdf->Ln(5);
				$kk=1;				
			}
			if($kk!=0){
				$i=38;
			}
			if(!empty($Concepto_gasto)&&!empty($Fuente_finan)&&!empty($Monto_unidad)&&!empty($Porcentaje)){
			//$campo_prueba = number_format($Monto_unidad, 2, '.', ',');
			$campo_prueba = $Monto_unidad;
			
			switch($Fuente_finan){
				case 1:
					$nomb_Fuente_finan = "Institucional Estatal";
				break;
				case 2:
					$nomb_Fuente_finan = "Institucional Municipal";
				break;
				case 3:
					$nomb_Fuente_finan = "Institucional Federal PROFEST";
				break;
				case 4:
					$nomb_Fuente_finan = 'Institucional Educación Superior';
				break;
				case 5:
					$nomb_Fuente_finan = 'Privada';
				break;
			}
*/
	$y4=$pdf->GetY();
	$y_jony = $pdf->SetY($y4); // Inicio 
	
	$pdf->Cell(4);
	/*$consulta_cat_cg="SELECT * FROM catalogo_concepto_gastos where id_gasto='".$Concepto_gasto."';";
	$execonsulta_cat_cg=mysqli_query($con, $consulta_cat_cg);
	$row_cat_cg=mysqli_fetch_array($execonsulta_cat_cg);
			

			$Concepto_gasto	=  $row_cat_cg['concepto_gasto'];
			$Concepto_gasto  = str_replace("<br>", "\n", $Concepto_gasto);
			$Concepto_gasto  = str_replace("?", "-", $Concepto_gasto);
	*/

	$pdf->SetFont('Arial','',7);
	$pdf->Multicell(10,3,$sum,1,'L');

	$pdf->SetY($y4); // Inicio  
	$pdf->Cell(14);
	
	$pdf->SetFont('Arial','',7);
	$pdf->Multicell(50,3,$tipogasto,1,'L');

	$y_jony = $pdf->SetY($y4); // Inicio  
	
	$pdf->Cell(64);
	$pdf->MultiCell(50,3,$concepto,1,'L');
                            
	
	$y_jony = $pdf->SetY($y4); // Inicio 

	$pdf->Cell(114);
	$pdf->Multicell(20,3,$unidad,1,'C');

	$y_jony = $pdf->SetY($y4); // Inicio 

	$Porcentaje = number_format($costo_unitario_imp_incluidos, 2, '.', '');
	$pdf->Cell(134);
	$pdf->Multicell(27,3,$Porcentaje,1,'C');

	
		//}
$y_jony = $pdf->SetY($y4); // Inicio 

	$pdf->Cell(161);
	$pdf->Multicell(30,3,'$'.number_format($monto_tot_imp_incluidos, 2, '.', ','),1,'C');
}
	$y5=$pdf->GetY();
	$y_jat3 = $pdf->SetY($y5+5); // Inicio
	$pdf->Cell(4);			
	$pdf->SetFont('Arial','B',9);			
	$pdf->Cell(157,5,'Total',1,0,'C');
	$pdf->Cell(30,5,'$'.number_format($suma_final, 2, '.', ','),1,0,'C');
	//$pdf->Cell(20,5,$porcentaje_total.'%',1,0,'C');*/
			
		

?>