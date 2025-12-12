<?php include("../Connections/profest_rep.php");

$cve_user;

mysql_select_db($database_automaa, $automaa);

$db = mysql_select_db( $database_automaa, $automaa ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

include('consultas_reporte_proyecto.php');

	//INICIO Primera parte

	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(5);
	$pdf->Ln(8);
	$pdf->Cell(1);
	$pdf->Cell(45,8,'Nombre del Festival:  '.$nombre_festival,0,0,'L');
	$pdf->Line(47, 51, 203, 51);
	
	$pdf->SetFont('Arial','B',9);
	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->Cell(187,8,'DATOS DE LOS RESPONSABLES',0,0,'C');

	$pdf->SetFont('Arial','',8.5);

	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->MultiCell(75,5,'Nombre de la o el responsable operativo del festival:
	',1,'L');
	$pdf->Ln(-10);
	$pdf->Cell(79);
	$pdf->MultiCell(112,10,$nombre3_op.' '.$segundo_apellido_op,1,'L');
	
	
	$pdf->Cell(75,1,'',0,'L');
	$yFIN=$pdf->GetY();
	$pdf->SetY($yFIN);
	$pdf->Cell(4);
if(strlen($cargo_op)>=86){
	$pdf->MultiCell(75,5,'Cargo de la o el responsable operativo del festival:
	',1,'L');
} else {
	$pdf->MultiCell(75,5,'Cargo de la o el responsable operativo del festival:',1,'L');	
	}
	$pdf->SetY($yFIN);
	$pdf->Cell(79);
	$pdf->MultiCell(112,5,$cargo_op,1,'L');
	
	
	$pdf->Cell(75,1,'',0,'L');
	$yFIN2=$pdf->GetY();
	$pdf->SetY($yFIN2);
	$pdf->Cell(4);
	$pdf->MultiCell(75,5,utf8_decode('Teléfono(s) fijo y/o celular con clave lada de la o el responsable operativo (01, 044 ó 045):'),1,'L');
	$pdf->SetY($yFIN2);
	$pdf->Cell(79);
	$pdf->MultiCell(112,10,'('.$lada_op.') '.$telefono_fijo_op.utf8_decode(' Extensión ').$extension_op.utf8_decode(' Teléfono móvil: ').$telefono_movil_op,1,'L');

	$pdf->Cell(75,1,'',0,'L');
	$yFIN3=$pdf->GetY();
	$pdf->SetY($yFIN3);
	$pdf->Cell(4);
	$pdf->MultiCell(75,5,utf8_decode('Correo(s) electrónico(s) de la o el responsable operativo:'),1,'L');
	$pdf->SetY($yFIN3);
	$pdf->Cell(79);
	$pdf->MultiCell(112,10,$Correo_electronico_op,1,'L');


	$pdf->Cell(75,1,'',0,'L');
	$yFIN4=$pdf->GetY();
	$pdf->SetY($yFIN4);
	$pdf->Cell(4);
	$pdf->MultiCell(75,5,utf8_decode('Nombre de un(a) segundo(a) responsable operativo:
	'),1,'L');
	$pdf->SetY($yFIN4);
	$pdf->Cell(79);
	$pdf->MultiCell(112,10,$nombre3_adm.' '.$segundo_apellido_adm,1,'L');


	$pdf->Cell(75,1,'',0,'L');
	$yFIN5=$pdf->GetY();
	$pdf->SetY($yFIN5);
	$pdf->Cell(4);
	$pdf->MultiCell(75,5,utf8_decode('Cargo de un(a) segundo(a) responsable operativo:
	'),1,'L');
	$pdf->SetY($yFIN5);
	$pdf->Cell(79);
	$pdf->MultiCell(112,10,$cargo_adm,1,'L');

	$pdf->Cell(75,1,'',0,'L');
	$yFIN6=$pdf->GetY();
	$pdf->SetY($yFIN6);
	$pdf->Cell(4);
	$pdf->MultiCell(75,5,utf8_decode('Teléfono(s) fijo y/o celular con clave lada de la/el segundo(a) responsable operativo (01, 044 ó 045):'),1,'L');
	$pdf->SetY($yFIN6);
	$pdf->Cell(79);
	$pdf->MultiCell(112,10,'('.$lada_adm.') '.$telefono_fijo_adm.utf8_decode(' Extensión ').$extension_adm.utf8_decode(' Teléfono móvil: ').$telefono_movil_adm,1,'L');

	$pdf->Cell(75,1,'',0,'L');
	$yFIN7=$pdf->GetY();
	$pdf->SetY($yFIN7);
	$pdf->Cell(4);
	$pdf->MultiCell(75,5,utf8_decode('Correo(s) electrónico(s) de un(a) segundo(a) responsable operativo:'),1,'L');
	$pdf->SetY($yFIN7);
	$pdf->Cell(79);
	$pdf->MultiCell(112,10,$correo_electronico_adm,1,'L');

	//FIN Primera parte

	//INICIO Segunda parte
	$pdf->SetFont('Arial','B',9);
	$pdf->Ln(3);
	$pdf->Cell(4);
	$pdf->Cell(187,8,'DESARROLLO DEL PROYECTO',0,0,'C');
	$pdf->Ln(3);
	$pdf->Cell(4);
	$pdf->MultiCell(187,8,utf8_decode('(Se recomienda considerar los puntos de Evaluación y Selección de la Convocatoria)'),0,'C');

	$pdf->Ln(-3);
	$pdf->Cell(4);
	$pdf->Cell(90,10,'a) Antecedentes del festival',0,0,'L');

	$pdf->SetFont('Arial','',9);
	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->MultiCell(187,4,$desarrollo_proyecto_antecedente,0,'J');

	$pdf->SetFont('Arial','B',9);
	$pdf->Ln(-2);
	$pdf->Cell(4);
	$pdf->Cell(90.5,10,'b) Diagnostico del festival',0,0,'L');
	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','',9);
	$pdf->MultiCell(187,4,$desarrollo_proyecto_diagnostico,0,'J');

	$pdf->SetFont('Arial','B',9);
	$pdf->Ln(-2);
	$pdf->Cell(4);
	$pdf->Cell(90,10,utf8_decode('c) Justificación del festival'),0,0,'L');
	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','',9);
	$pdf->MultiCell(187,4,$desarrollo_proyecto_justificacion,0,'J');

	$pdf->SetFont('Arial','B',9);
	$pdf->Ln(-2);
	$pdf->Cell(4);
	$pdf->Cell(90,10,utf8_decode('d) Descripción del proyecto'),0,0,'L');
	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','',9);
	$pdf->MultiCell(187,4,$desarrollo_proyecto_descripcion,0,'J');

	$pdf->SetFont('Arial','B',9);
	$pdf->Ln(-2);
	$pdf->Cell(4);
	$pdf->Cell(90,10,'e) Objetivo general del festival',0,0,'L');
	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','',9);
	$pdf->MultiCell(187,4,$objetivo_general,0,'J');

	$pdf->SetFont('Arial','B',9);
	$pdf->Ln(-2);
	$pdf->Cell(4);
	$pdf->Cell(90,10,utf8_decode('f) Objetivos específicos del festival'),0,0,'L');
	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','',9);
	$pdf->MultiCell(187,4,$desarrollo_proyecto_objetivos_especificos,0,'J');

	$pdf->AddPage();
	$pdf->SetFont('Arial','B',9);
	$pdf->Ln(1);
	$pdf->Cell(4);
	$pdf->Cell(90,10,utf8_decode('g) Metas cuantitativas del festival.'),0,0,'L');
	$pdf->Ln(8);
	$pdf->Cell(5);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(140,5,'Nombre meta',1,0,'C');
	$pdf->Cell(45,5,'Cantidad',1,0,'C');

	$y=$pdf->GetY();

	$y_jon = $pdf->SetY($y+5);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(5);
	$pdf->Multicell(140,5,utf8_decode('- Número de presentaciones artisticas'),0,'L');
	
	$pdf->SetFont('Arial','',9);
	$y_jon = $pdf->SetY($y+5);
	$pdf->Cell(145);
	$pdf->MultiCell(45,5,$meta_num_presentaciones,0,'C');

	$y=$pdf->GetY();
	$y_jon = $pdf->SetY($y);

	$pdf->SetFont('Arial','',8);
	$pdf->Cell(5);
	$pdf->Multicell(140,5,utf8_decode('- Número de grupos indígenas a atender'),0,'L');

	$pdf->SetFont('Arial','',9);
	$y_jon = $pdf->SetY($y);
	$pdf->Cell(145);
	$pdf->MultiCell(45,5,$meta_numero_grupos_ind_atender,0,'C');

	$y=$pdf->GetY();

	$y_jon = $pdf->SetY($y);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(5);
	$pdf->Multicell(140,5,utf8_decode('- Cantidad de público a beneficiar'),0,'L');

	$pdf->SetFont('Arial','',9);
	$y_jon = $pdf->SetY($y);
	$pdf->Cell(145);
	$pdf->MultiCell(45,5,$meta_num_publico,0,'C');

	$y=$pdf->GetY();

	$y_jon = $pdf->SetY($y);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(5);
	$pdf->Multicell(140,5,utf8_decode('- Número de municipios a beneficiar'),0,'L');

	$pdf->SetFont('Arial','',9);
	$y_jon = $pdf->SetY($y);
	$pdf->Cell(145);
	$pdf->MultiCell(45,5,$meta_num_municipio,0,'C');

	$y=$pdf->GetY();

	$y_jon = $pdf->SetY($y);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(5);
	$pdf->Multicell(140,5,utf8_decode('- Número de foros que se utilizarán'),0,'L');

	$pdf->SetFont('Arial','',9);
	$y_jon = $pdf->SetY($y);
	$pdf->Cell(145);
	$pdf->MultiCell(45,5,$meta_num_foros,0,'C');

	$y=$pdf->GetY();

	$y_jon = $pdf->SetY($y);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(5);
	$pdf->Multicell(140,5,utf8_decode('- Número de artistas participantes'),0,'L');

	$pdf->SetFont('Arial','',9);
	$y_jon = $pdf->SetY($y);
	$pdf->Cell(145);
	$pdf->MultiCell(45,5,$meta_num_artistas,0,'C');

	$y=$pdf->GetY();

	$y_jon = $pdf->SetY($y);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(5);
	$pdf->Multicell(140,5,utf8_decode('- Cantidad de grupos artisticos'),0,'L');

	$pdf->SetFont('Arial','',9);
	$y_jon = $pdf->SetY($y);
	$pdf->Cell(145);
	$pdf->MultiCell(45,5,$meta_cantidad_grupos,0,'C');

	$y=$pdf->GetY();

	$y_jon = $pdf->SetY($y);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(5);
	$pdf->Multicell(140,5,utf8_decode('- Número de actividades académicas'),0,'L');

	$pdf->SetFont('Arial','',9);
	$y_jon = $pdf->SetY($y);
	$pdf->Cell(145);
	$pdf->MultiCell(45,5,$meta_num_actividades_academicas,0,'C');

	$y=$pdf->GetY();
	
	$pdf->Ln(1);
	
	$consulta_mas_metas="SELECT * FROM mas_metas_numericas where clave_usuario='".$cve_user."';";
	$exe_consulta_mas_metas=mysql_query($consulta_mas_metas);
	$k=0;
	$kk=0;
	$i=25;
		while($row_metas=mysql_fetch_array($exe_consulta_mas_metas)){
									
			$nombre_meta_numerica	=	utf8_decode($row_metas['nombre_meta_numerica']);
			$meta_cantidad	=	$row_metas['meta_cantidad'];

			if($k==$i){
				$k=0;
				$pdf->AddPage();
				$pdf->Ln(4);
				$pdf->Cell(5);
				$pdf->SetFont('Arial','',9);
				$pdf->Cell(140,5,'Nombre meta',1,0,'C');
				$pdf->Cell(45,5,'Cantidad',1,0,'C');
				$kk=1;				
			}
			if($kk!=0){
				$i=33;
			}
			
			if(!empty($nombre_meta_numerica)&&!empty($meta_cantidad)){

				$y=$pdf->GetY();
				$y_jon = $pdf->SetY($y); /* Inicio */
				
				$pdf->SetFont('Arial','',8);
				$pdf->Cell(5);
				$pdf->Multicell(140,3,'- '.$nombre_meta_numerica,0,'L');
				
				$pdf->SetFont('Arial','',9);
				$y_jon = $pdf->SetY($y);/* Inicio */ 
				
				$pdf->Cell(145);
				$pdf->MultiCell(45,3,$meta_cantidad,0,'C');
				$k++;
				
			}
			$pdf->Cell(45,1,'',0,1,'C');
			
			$pdf->Ln(4);
		}
	

	$pdf->Ln(8);
	$pdf->SetFont('Arial','B',9);
	$pdf->Ln(-2);
	$pdf->Cell(4);
	$pdf->Cell(90,10,utf8_decode('h) Descripción del impacto socio-cultural del proyecto'),0,0,'L');
	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','',9);
	$pdf->MultiCell(187,4,$desarrollo_proyecto_descripcion_impacto,0,'J');

	$pdf->SetFont('Arial','B',9);
	$pdf->Ln(-2);
	$pdf->Cell(4);
	$pdf->Cell(90,10,utf8_decode('i) Población objetivo del festival'),0,0,'L');
	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','',9);
	$pdf->MultiCell(187,4,utf8_decode('  Género 

		Número de hombres: ').$poblacion_genero_hombre.utf8_decode('
		Número de mujeres: ').$poblacion_genero_mujer.'

		Edad

		0-12: '.$poblacion_edad_0_12.'
		13-17: '.$poblacion_edad_13_17.'
		18-29: '.$poblacion_edad_18_29.'
		30-59: '.$poblacion_edad_30_59.'
		60 en adelante: '.$poblacion_edad_60.utf8_decode('

		Nivel académico

		Sin escolaridad: ').$poblacion_nivel_sin_escolaridad.utf8_decode('
		Educación Básica: ').$poblacion_nivel_educ_basica.utf8_decode('
		Educación Media: ').$poblacion_nivel_educ_media.utf8_decode('
		Educación Superior: ').$poblacion_nivel_educ_superior.utf8_decode('
		
		Específicos: 
		').utf8_decode('
		Reclusión: ').$poblacion_especific_reclusion.'
		Migrantes: '.$poblacion_especific_migrantes.utf8_decode('
		Indígenas: ').$poblacion_especific_indigenas.'
		Con discapacidad: '.$poblacion_especific_con_discapacidad,0,'L');
		
		
		if($poblacion_especific_otros==1){
			$pdf->Ln(4);
			$pdf->Cell(6);
			$pdf->Cell(187,4,'Otros',0,0,'L');
			$pdf->Ln(4);
			$pdf->Cell(6);
			$pdf->SetFont('Arial','',9);
			$pdf->MultiCell(187,4,utf8_decode($poblacion_especific_otro_nombre).': '.$poblacion_especific_otro_cantidad,0,'L');
		} 

	
	//Inicio Organigrama 8 opciones

	$pdf->SetFont('Arial','B',9);
	$pdf->Ln(3);
	$pdf->Cell(4);
	$pdf->Cell(90,10,utf8_decode('j) Organigrama operativo para la producción del festival'),0,0,'L');
	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','',9);
	$pdf->MultiCell(187, 5,'1) Nombre: '.$organigrama_nombre1.'
	Cargo: '.$organigrama_cargo1.'
	Funciones: '.$organigrama_funciones1, 0,'L');
	$pdf->Ln(1);
	$pdf->Cell(4);
	$pdf->MultiCell(187, 5,'2) Nombre: '.$organigrama_nombre2.'
	Cargo: '.$organigrama_cargo2.'
	Funciones: '.$organigrama_funciones2, 0,'L');
	$pdf->Ln(1);
	$pdf->Cell(4);
	$pdf->MultiCell(187, 5,'3) Nombre: '.$organigrama_nombre3.'
	Cargo: '.$organigrama_cargo3.'
	Funciones: '.$organigrama_funciones3, 0,'L');
	
	if(!empty($organigrama_nombre4) && !empty($organigrama_cargo4) && !empty($organigrama_funciones4) ){
	$pdf->Ln(1);
	$pdf->Cell(4);
	$pdf->MultiCell(187, 5,'4) Nombre: '.$organigrama_nombre4.'
	Cargo: '.$organigrama_cargo4.'
	Funciones: '.$organigrama_funciones4, 0,'L');
	}
	if(!empty($organigrama_nombre5) && !empty($organigrama_cargo5) && !empty($organigrama_funciones5) ){
	$pdf->Ln(1);
	$pdf->Cell(4);
	$pdf->MultiCell(187, 5,'5) Nombre: '.$organigrama_nombre5.'
	Cargo: '.$organigrama_cargo5.'
	Funciones: '.$organigrama_funciones5, 0,'L');
	}
	if(!empty($organigrama_nombre6) && !empty($organigrama_cargo6) && !empty($organigrama_funciones6) ){
	$pdf->Ln(1);
	$pdf->Cell(4);
	$pdf->MultiCell(187, 5,'6) Nombre: '.$organigrama_nombre6.'
	Cargo: '.$organigrama_cargo6.'
	Funciones: '.$organigrama_funciones6, 0,'L');
	}
	if(!empty($organigrama_nombre7) && !empty($organigrama_cargo7) && !empty($organigrama_funciones7) ){
	$pdf->Ln(1);
	$pdf->Cell(4);
	$pdf->MultiCell(187, 5,'7) Nombre: '.$organigrama_nombre7.'
	Cargo: '.$organigrama_cargo7.'
	Funciones: '.$organigrama_funciones7, 0,'L');
	}
	if(!empty($organigrama_nombre8) && !empty($organigrama_cargo8) && !empty($organigrama_funciones8) ){
	$pdf->Ln(1);
	$pdf->Cell(4);
	$pdf->MultiCell(187, 5,'8) Nombre: '.$organigrama_nombre8.'
	Cargo: '.$organigrama_cargo8.'
	Funciones: '.$organigrama_funciones8, 0,'L');
	//Fin Organigrama 8 opciones
	}

	$pdf->AddPage();

	$pdf->SetFont('Arial','B',9);	
	$pdf->Ln(1);
	$pdf->Cell(4);
	$pdf->Cell(90,10,utf8_decode('k)	Cronograma de acciones para la ejecución del festival'),0,0,'L');


	$pdf->Ln(10);
	$pdf->Cell(6);
	$pdf->Cell(20,5,'Fecha inicio',1,0,'C');
	$pdf->Cell(20,5,'Fecha fin',1,0,'C');
	$pdf->Cell(144,5,'Acciones',1,0,'C');

	$y=$pdf->GetY();

	$y_jon = $pdf->SetY($y+5);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(6);
	$pdf->Multicell(20,5,$crono_fechaacciones_a,0,'C');

	$pdf->SetY($y+5);
	$pdf->Cell(26);
	$pdf->MultiCell(20,5,$crono_fechaacciones_fin_a,0,'C');

	$pdf->SetY($y+5);
	$pdf->Cell(46);
	$pdf->Multicell(144,5,$crono_acciones_a,0,'L');

	$y=$pdf->GetY();

	$y_jon = $pdf->SetY($y);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(6);
	$pdf->Multicell(20,5,$crono_fechaacciones_b,0,'C');

	$pdf->SetY($y);
	$pdf->Cell(26);
	$pdf->MultiCell(20,5,$crono_fechaacciones_fin_b,0,'C');

	$pdf->SetY($y);
	$pdf->Cell(46);
	$pdf->Multicell(144,5,$crono_acciones_b,0,'L');

	$y=$pdf->GetY();

	$y_jon = $pdf->SetY($y);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(6);
	$pdf->Multicell(20,5,$crono_fechaacciones_c,0,'C');

	$pdf->SetY($y);
	$pdf->Cell(26);
	$pdf->MultiCell(20,5,$crono_fechaacciones_fin_c,0,'C');

	$pdf->SetY($y);
	$pdf->Cell(46);
	$pdf->Multicell(144,5,$crono_acciones_c,0,'L');	

	$y=$pdf->GetY();

  $consulta_rep_crono="SELECT * FROM cronograma_acciones_ejecucion_festival 
  					where clave_usuario='".$cve_user."';";
  $exe_consulta_crono=mysql_query($consulta_rep_crono);
		while($row_crono=mysql_fetch_array($exe_consulta_crono)){
			
			$fechaacciones		    =	$row_crono['fechaacciones'];
			$fechaacciones_fin		=	$row_crono['fechaacciones_fin'];
			$acciones   			= 	utf8_decode($row_crono['acciones']);

			if(!empty($fechaacciones)&&!empty($fechaacciones_fin)&&!empty($acciones)){
			$y=$pdf->GetY();
			$y_jony = $pdf->SetY($y);

			$pdf->SetFont('Arial','',9);
			$pdf->Cell(6);
			$pdf->Multicell(20,5,$fechaacciones,0,'C');

			$pdf->SetY($y);
			$pdf->Cell(26);
			$pdf->MultiCell(20,5,$fechaacciones_fin,0,'C');

			$pdf->SetY($y);
			$pdf->Cell(46);
			$pdf->Multicell(144,5,$acciones,0,'L');	
			
			}

		}


	$pdf->SetFont('Arial','B',9);	
	$pdf->Ln(5);
	$pdf->Cell(4);
	$pdf->Cell(90,10,utf8_decode('l)	Lugares de realización de las actividades artísticas del festival'),0,0,'L');


	$pdf->Ln(8);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(4);				
	$pdf->MultiCell(187,4,utf8_decode('Nombre foro: '.$Nombreforo_a.'
Código Postal: '.$cpforo_a.'
Estado: '.$estadoforo_a.'
Municipio o Alcaldía: '.$mun_alcforo_a.'
Colonia: '.$coloniaforo_a.'
Calle: '.$calleforo_a.'
No. exterior: '.$no_extforo_a.'
No. interior: '.$no_intforo_a.'
Descripción: '.$Descripcionlug_a), 0, 'L');


	$pdf->Ln(2);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(4);				
	$pdf->MultiCell(187,4,utf8_decode('Nombre foro: '.$Nombreforo_b.'
Código Postal: '.$cpforo_b.'
Estado: '.$estadoforo_b.'
Municipio o Alcaldía: '.$mun_alcforo_b.'
Colonia: '.$coloniaforo_b.'
Calle: '.$calleforo_b.'
No. exterior: '.$no_extforo_b.'
No. interior: '.$no_intforo_b.'
Descripción: '.$Descripcionlug_b), 0, 'L');

	$pdf->Ln(2);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(4);				
	$pdf->MultiCell(187,4,utf8_decode('Nombre foro: '.$Nombreforo_c.'
Código Postal: '.$cpforo_c.'
Estado: '.$estadoforo_c.'
Municipio o Alcaldía: '.$mun_alcforo_c.'
Colonia: '.$coloniaforo_c.'
Calle: '.$calleforo_c.'
No. exterior: '.$no_extforo_c.'
No. interior: '.$no_intforo_c.'
Descripción: '.$Descripcionlug_c), 0, 'L');
	

	$pdf->Ln(2);
	
 	$consulta_rep_lug="SELECT * FROM mas_lugares 
  					where clave_usuario='".$cve_user."';";

	$exe_consulta_rep_lug=mysql_query($consulta_rep_lug);
	  $j=0;
		while($row_lug=mysql_fetch_array($exe_consulta_rep_lug)){
			
			$j=$j+1;
			$Nombreforo		    =	$row_lug['Nombreforo'];
			$Nombreforo  = str_replace("?", '"', $Nombreforo);

			//$Domicilioforo		=	$row_lug['Domicilioforo'];

			$cpforo		 =	$row_lug['cpforo'];
			$estadoforo	 =	$row_lug['estadoforo'];
			$mun_alcforo =	$row_lug['mun_alcforo'];
			$coloniaforo =	$row_lug['coloniaforo'];
			$calleforo	 =	$row_lug['calleforo'];
			$no_extforo	 =	$row_lug['no_extforo'];
			$no_intforo	 =	$row_lug['no_intforo'];

			$Descripcionlug  = 	$row_lug['Descripcionlug'];
			$Descripcionlug  =  str_replace("?", "-", $Descripcionlug);

			if(!empty($Nombreforo) && !empty($cpforo) && !empty($estadoforo)  && !empty($mun_alcforo) && !empty($coloniaforo) 
				&& !empty($calleforo) && !empty($no_extforo) && !empty($no_intforo)  && !empty($Descripcionlug)){
			$pdf->Cell(4);				
			$pdf->MultiCell(187,4,utf8_decode('Nombre foro: '.$Nombreforo.'
Código Postal: '.$cpforo.'
Estado: '.$estadoforo.'
Municipio o Alcaldía: '.$mun_alcforo.'
Colonia: '.$coloniaforo.'
Calle: '.$calleforo.'
No. exterior: '.$no_extforo.'
No. interior: '.$no_intforo.'
Descripción: '.$Descripcionlug), 0, 'L');
			$pdf->Ln(2);
			}

		}


	$pdf->SetFont('Arial','B',9);	
	$pdf->Ln(-2);
	$pdf->Cell(4);
	$pdf->Cell(90,10,utf8_decode('m)	Monto solicitado a la Secretaría de Cultura y n) Costo total del festival'),0,0,'L');
	
	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->Cell(85,4,utf8_decode('Descripción'),1,0,'C');
	$pdf->Cell(50.5,4,'Monto',1,0,'C');
	$pdf->Cell(50.5,4,'% Porcentaje',1,0,'C');
	$pdf->Ln(4);
	$pdf->Cell(4);
	$pdf->Cell(85,4,utf8_decode('Costo total de realización del festival'),1,'L');
	$pdf->SetFont('Arial','',9);	
	$pdf->Cell(50.5,4,'$'.$Infor_finan_costo_monto,1,0,'C');
	$pdf->Cell(50.5,4,'100%',1,0,'C');
	$pdf->Ln(4);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','B',9);	
	$pdf->Cell(85,4,utf8_decode('Apoyo financiero solicitado a la Secretaría de Cultura'),1,'L');
	$pdf->SetFont('Arial','',9);	
	$pdf->Cell(50.5,4,'$'.$Infor_finan_apoyo_monto,1,0,'C');
	$pdf->Cell(50.5,4,$Infor_finan_apoyo_costo_total.'%',1,0,'C');

	$pdf->AddPage();
	$pdf->SetFont('Arial','B',9);
	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->MultiCell(187,5,utf8_decode('o) Presupuesto en el que se acrediten los gastos relativos a la contratación de los servicios y el arrendamiento de los bienes esenciales para la realización del festival, de manera desglosada y especificando la fuente del financiamiento. En el caso de la contratación de los servicios y el arrendamiento de los bienes esenciales para la realización del festival que se proponen pagar con recursos del PROFEST, se deberá adjuntar una cotización por cada servicio o arrendamiento, excepto en el caso de la contratación de servicios artísticos profesionales.'),0,'J');
	$pdf->Ln(4);
	$pdf->Cell(4);
	$pdf->Cell(187,5,'Financiamiento/Presupuesto del costo total del Festival',1,0,'C');
	
	
	$pdf->Ln(5);
	$pdf->Cell(4);
	$pdf->Cell(84,5,'Concepto de gasto',1,0,'C');
	$pdf->Cell(48,5,'Fuente de financiamiento',1,0,'C');
	$pdf->Cell(35,5,'Monto/unidad',1,0,'C');
	$pdf->Cell(20,5,'Porcentaje',1,0,'C');
	
	$y=$pdf->GetY();
	
	
	$pdf->SetFont('Arial','',8);
	
	//A
	$y_jat = $pdf->SetY($y+5); // Inicio
	/*$pdf->SetFont('Arial','',8);
	$pdf->Cell(3.5);
	$pdf->Multicell(84,5,$Concepto_gasto_a,0,'L');
	
	$pdf->SetY($y+5);
	$pdf->Cell(88);
	$pdf->MultiCell(48,5,$Fuente_finan_a,0,'L');
	
	
	$pdf->SetY($y+5);
	$pdf->Cell(136);
	//$pdf->SetY(20); // Set 20 Eje Y 
	$pdf->Multicell(35,5,'$'.$Monto_unidad_a,0,'C');
	
	$pdf->SetY($y+5);
	$pdf->Cell(171);
	//$pdf->SetY(20); // Set 20 Eje Y 
	$pdf->Multicell(20,5,$Porcentaje_a.'%',0,'C');
	
	$y2=$pdf->GetY();
	
	
	//B
	$y_jon = $pdf->SetY($y2); // Inicio 
	$pdf->Cell(3.5);
	$pdf->Multicell(84,5,$Concepto_gasto_b,0,'L');
	
	$y_jon = $pdf->SetY($y2);
	$pdf->Cell(88);
	$pdf->MultiCell(48,5,$Fuente_finan_b,0,'L');
	
	
	$y_jon = $pdf->SetY($y2);
	$pdf->Cell(136);
	//$pdf->SetY(20); // Set 20 Eje Y 
	$pdf->Multicell(35,5,'$'.$Monto_unidad_b,0,'C');
	
	$y_jon = $pdf->SetY($y2);
	$pdf->Cell(171);
	//$pdf->SetY(20); // Set 20 Eje Y 
	$pdf->Multicell(20,5,$Porcentaje_b.'%',0,'C');
	
	$y3=$pdf->GetY();
	
	//C	
	$y_jony = $pdf->SetY($y3); // Inicio
	$pdf->Cell(3.5);
	$pdf->Multicell(84,5,$Concepto_gasto_c,0,'L');
	
	$y_jony = $pdf->SetY($y3);
	$pdf->Cell(88);
	$pdf->MultiCell(48,5,$Fuente_finan_c,0,'L');
	
	
	$y_jony = $pdf->SetY($y3);
	$pdf->Cell(136);
	//$pdf->SetY(20); // Set 20 Eje Y 
	$pdf->Multicell(35,5,'$'.$Monto_unidad_c,0,'C');
	
	$y_jony = $pdf->SetY($y3);
	$pdf->Cell(171);
	//$pdf->SetY(20); // Set 20 Eje Y 
	$pdf->Multicell(20,5,$Porcentaje_c.'%',0,'C');*/

	//$y4=$pdf->GetY();
	
	$consulta_rep_presup="SELECT * FROM mas_presupuesto where clave_usuario='".$cve_user."';";
	$exe_consulta_rep_presup=mysql_query($consulta_rep_presup);
	$k=0;
	$kk=0;
	$i=30;
		while($row_presup=mysql_fetch_array($exe_consulta_rep_presup)){
			
						
			$Concepto_gasto	=	utf8_decode($row_presup['Concepto_gasto']);
			$Fuente_finan	=	$row_presup['Fuente_finan'];
			$Monto_unidad   = 	$row_presup['Monto_unidad'];
			$Porcentaje   	= 	$row_presup['Porcentaje'];
			$monto_unidad_total = $row_presup['monto_unidad_total'];
			$porcentaje_total = $row_presup['porcentaje_total'];

			if($k==$i){
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
					$nomb_Fuente_finan = utf8_decode('Institucional Educación Superior');
				break;
				case 5:
					$nomb_Fuente_finan = 'Privada';
				break;
			}

	$y4=$pdf->GetY();
	$y_jony = $pdf->SetY($y4); /* Inicio */
	$pdf->Cell(3.5);
	
	$consulta_cat_cg="SELECT * FROM catalogo_concepto_gastos where id_gasto='".$Concepto_gasto."';";
	$execonsulta_cat_cg=mysql_query($consulta_cat_cg);
	$row_cat_cg=mysql_fetch_array($execonsulta_cat_cg);
			$Concepto_gasto	= utf8_decode($row_cat_cg['concepto_gasto']);
	
	$pdf->Multicell(84,5,$Concepto_gasto,0,'L');
	
	
	$y_jony = $pdf->SetY($y4); /* Inicio */ 
	
	$pdf->Cell(88);
	$pdf->MultiCell(48,5,$nomb_Fuente_finan,0,'L');
	
	$y_jony = $pdf->SetY($y4); /* Inicio */ 

	$pdf->Cell(136);
	$pdf->Multicell(35,5,$campo_prueba,0,'C');
	
	$y_jony = $pdf->SetY($y4); /* Inicio */ 
	
	$Porcentaje = number_format($Porcentaje, 2, '.', '');
	$pdf->Cell(171);
	$pdf->Multicell(20,5,$Porcentaje.'%',0,'C');
	$k++;
		}
		}
	$y5=$pdf->GetY();
	$y_jat3 = $pdf->SetY($y5+5); /* Inicio */ 
	$pdf->Cell(4);			
	$pdf->SetFont('Arial','B',9);			
	$pdf->Cell(132,5,'Total',1,0,'C');
	$pdf->Cell(35,5,'$'.number_format($monto_unidad_total, 2, '.', ','),1,0,'C');
	$pdf->Cell(20,5,$porcentaje_total.'%',1,0,'C');
			
	
	$pdf->AddPage();
	$pdf->Ln(9);
	$pdf->Cell(4);
	$pdf->Cell(90,10,utf8_decode('p) Estrategias de difusión del festival*:
¿Por qué medios se dará difusión al festival?'),0,0,'L');
	
	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(4,4,$estrategias_medios_radio,1,0,'C');
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(4,4,'Radio',0,0,'L');

	$pdf->Ln(5);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(4,4,$estrategias_medios_television,1,0,'L');
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(4,4,utf8_decode('Televisión'),0,0,'L');

	$pdf->Ln(5);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(4,4,$estrategias_medios_internet,1,0,'L');
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(4,4,'Internet',0,0,'L');

	$pdf->Ln(5);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(4,4,$estrategias_medios_redes_sociales,1,0,'L');
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(4,4,'Redes sociales',0,0,'L');

	$pdf->Ln(5);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(4,4,$estrategias_medios_prensa,1,0,'L');
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(4,4,utf8_decode('Prensa (periódicos, revistas, etc.)'),0,0,'L');

	$pdf->Ln(5);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(4,4,$estrategias_medios_folletos_posters,1,0,'L');
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(4,4,'Folletos y/o posters',0,0,'L');

	$pdf->Ln(5);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(4,4,$estrategias_medios_espectaculares,1,0,'L');
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(4,4,'Espectaculares',0,0,'L');

	$pdf->Ln(5);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(4,4,$estrategias_medios_perifoneo,1,0,'L');
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(4,4,'Perifoneo',0,0,'L');
	
	$pdf->Ln(5);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(4,4,$estrategias_medios_otros,1,0,'L');
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(4,4,utf8_decode('Otros medios en que se dará difusión al festival'),0,0,'L');

	$pdf->Ln(6);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(187,4,'Nombre:',0,0,'L');
	$pdf->Ln(4);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','',9);
	$pdf->MultiCell(187,4,$estrategias_medios_otros_nombre,0,'L');


	$pdf->Ln(6);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(187,4,utf8_decode('¿Qué acciones se llevarán a cabo para dar a conocer el festival?'),0,0,'L');
	$pdf->Ln(4);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','',9);
	$pdf->MultiCell(187,4,$estrategias_acciones_dar_conocer,0,'J');

	$pdf->Ln(5);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(187,10,utf8_decode('q)	Descripción de los mecanismos de evaluación del festival'),0,0,'L');
	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','',9);
	$pdf->MultiCell(187,4,$descripcion_mecanismos_evaluacion,0,'J');


	$pdf->Ln(6);
	$pdf->Cell(5);
	$pdf->MultiCell(100,4,'',0,'C');
	
	
	/*$pdf->Cell(3);
	$y1 = $pdf->GetY();
	$pdf->MultiCell(90,4,$nombre3_op.' '.$segundo_apellido_op,0,'C');
	
	$pdf->SetY($y1);*/
	
	$pdf->Cell(50);
	$pdf->MultiCell(90,4,$nombre_titular,0,'C');
	
	$y2 = $pdf->GetY();
	
	$pdf->SetY($y2+3);
	/*$pdf->Cell(3);
	$pdf->Cell(90,4,'Nombre y firma de la o el responsable operativo del festival',0,0,'C');*/
	$pdf->Line(150, $y2+2, 65, $y2+2);
	$pdf->Cell(50);
	$pdf->Cell(90,4,utf8_decode('Nombre y firma de la o el Títular de la Instancia Postulante'),0,0,'C');
	//$pdf->Line(201, $y2+2, 114, $y2+2);
	

?>