<?php include("../Connections/conexion.php");

$cve_user;

include('consultas_reporte_proyecto.php');

	//INICIO Primera parte

	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(5);
	$pdf->Ln(8);
	$pdf->Cell(1);
	$pdf->Cell(45,8,'Nombre del Festival:  '.$nombre_festival,0,0,'L');
	$pdf->Line(47, 47, 203, 47);
	

	$pdf->Ln(8);
	/*IICIO ocultar etapa 1 v2**/
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(4);
	$pdf->Cell(187,8,'DATOS DE LOS RESPONSABLES',0,0,'C');

	$pdf->SetFont('Arial','',8.5);
	
	//INICIO 2022 DIRECTOR

	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->MultiCell(75,5,'Nombre de la/el director(a) del festival :
	',1,'L');
	$pdf->Ln(-10);
	$pdf->Cell(79);
	$pdf->MultiCell(112,10,$nombre_dir.' '.$primer_apellido_dir.' '.$segundo_apellido_dir,1,'L');
	$pdf->Cell(75,1,'',0,'L');
	$yFIN2=$pdf->GetY();
	$pdf->SetY($yFIN2);
	$pdf->Cell(4);
	$pdf->MultiCell(75,10,utf8_decode('Teléfono(s) de contacto:'),1,'L');
	$pdf->SetY($yFIN2);
	$pdf->Cell(79);
	$pdf->MultiCell(112,10,$telefono_fijo_dir.utf8_decode(' Extensión ').$extension_dir.utf8_decode(' Teléfono móvil: ').$telefono_movil_dir,1,'L');

	$pdf->Cell(75,1,'',0,'L');
	$yFIN3=$pdf->GetY();
	$pdf->SetY($yFIN3);
	$pdf->Cell(4);
	$pdf->MultiCell(75,10,utf8_decode('Correo(s) electrónico(s) de contacto:'),1,'L');
	$pdf->SetY($yFIN3);
	$pdf->Cell(79);
	$pdf->MultiCell(112,10,$Correo_electronico_dir,1,'L');

	$pdf->Cell(75,1,'',0,'L');
	$yFIN3=$pdf->GetY();
	$pdf->SetY($yFIN3);
	$pdf->Cell(4);
	$pdf->MultiCell(187,4,utf8_decode('Breve semblanza de la/el director(a) del festival: ').$breve_semblanza_director,1,'L');
	//FIN DIRECTOR
	 
	/*IICIO ocultar etapa 1 v2**/
	$pdf->Cell(4);
	$pdf->MultiCell(75,10,'Nombre de la/el responsable operativa(o) del festival:',1,'L');
	$pdf->Ln(-10);
	$pdf->Cell(79);
	$pdf->MultiCell(112,10,$nombre3_op.' '.$segundo_apellido_op,1,'L');
	$pdf->Cell(75,1,'',0,'L');
	$yFIN=$pdf->GetY();
	$pdf->SetY($yFIN);
	$pdf->Cell(4);
	$pdf->MultiCell(75,5,'Cargo de la/el responsable operativa(o) del festival:',1,'L');
	$pdf->SetY($yFIN);
	$pdf->Cell(79);
	$pdf->MultiCell(112,5,$cargo_op,1,'L');
	$pdf->Cell(75,1,'',0,'L');
	$yFIN2=$pdf->GetY();
	$pdf->SetY($yFIN2);
	$pdf->Cell(4);
	$pdf->MultiCell(75,10,utf8_decode('Teléfono(s) de contacto:'),1,'L');
	$pdf->SetY($yFIN2);
	$pdf->Cell(79);
	$pdf->MultiCell(112,10,$telefono_fijo_op.utf8_decode(' Extensión ').$extension_op.utf8_decode(' Teléfono móvil: ').$telefono_movil_op,1,'L');

	$pdf->Cell(75,1,'',0,'L');
	$yFIN3=$pdf->GetY();
	$pdf->SetY($yFIN3);
	$pdf->Cell(4);
	$pdf->MultiCell(75,10,utf8_decode('Correo(s) electrónico(s) de contacto:'),1,'L');
	$pdf->SetY($yFIN3);
	$pdf->Cell(79);
	$pdf->MultiCell(112,10,$Correo_electronico_op,1,'L');

	$pdf->Cell(75,1,'',0,'L');
	$yFIN3=$pdf->GetY();
	$pdf->SetY($yFIN3);
	$pdf->Cell(4);
	$pdf->MultiCell(187,4,utf8_decode('Breve semblanza del(a) responsable operativo(a): ').$breve_semblanza_op, 1,'L');
	$yFIN_OP=$pdf->GetY();
	$pdf->SetY($yFIN_OP);



	//INICIO Datos Responsable administrativo 
	$pdf->Cell(75,1,'',0,'L');
	$yFIN4=$pdf->GetY();
	$pdf->SetY($yFIN4);
	$pdf->Cell(4);
	$pdf->MultiCell(75,5,utf8_decode('Nombre de la/el responsable administrativa(o) del festival:'),1,'L');
	$pdf->SetY($yFIN4);
	$pdf->Cell(79);
	$pdf->MultiCell(112,10,$nombre3_adm.' '.$segundo_apellido_adm,1,'L');


	$pdf->Cell(75,1,'',0,'L');
	$yFIN5=$pdf->GetY();
	$pdf->SetY($yFIN5);
	$pdf->Cell(4);
	$pdf->MultiCell(75,5,'Cargo de la/el responsable administrativa(o) del festival:',1,'L');
	$pdf->SetY($yFIN5);
	$pdf->Cell(79);
	$pdf->MultiCell(112,10,utf8_decode($cargo_adm),1,'L');

	$pdf->Cell(75,1,'',0,'L');
	$yFIN6=$pdf->GetY();
	$pdf->SetY($yFIN6);
	$pdf->Cell(4);
	$pdf->MultiCell(75,5,utf8_decode('Teléfono(s) de la/el responsable administrativa(o) del festival:'),1,'L');
	$pdf->SetY($yFIN6);
	$pdf->Cell(79);
	$pdf->MultiCell(112,10,$telefono_fijo_adm.utf8_decode(' Extensión ').$extension_adm.utf8_decode(' Teléfono móvil: ').$telefono_movil_adm,1,'L');

	$pdf->SetFont('Arial','',9);
	$pdf->Cell(75,1,'',0,'L');
	$yFIN7=$pdf->GetY();
	$pdf->SetY($yFIN7);
	$pdf->Cell(4);
	$pdf->MultiCell(75,5,utf8_decode('Correo(s) electrónico(s) de la/el responsable administrativa(o) del festival:'),1,'L');
	$pdf->SetY($yFIN7);
	$pdf->Cell(79);
	$pdf->MultiCell(112,10,$correo_electronico_adm,1,'L');
	 
	$pdf->Cell(75,1,'',0,'L');
	$yFIN3=$pdf->GetY();
	$pdf->SetY($yFIN3);
	$pdf->Cell(4);
	$pdf->MultiCell(187,4,utf8_decode('Breve semblanza de la(el) responsable administrativa(o): ').$breve_semblanza_adm, 1,'L');
	$yFIN_OP=$pdf->GetY();
	$pdf->SetY($yFIN_OP);
	//FIN Datos Responsable administrativo 


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
$pdf->Cell(90,10,utf8_decode('a) Objetivo general del festival'),0,0,'L');

$pdf->SetFont('Arial','',9);
$pdf->Ln(8);
$pdf->Cell(4);
$pdf->MultiCell(187,4,$objetivo_general,0,'J');

$pdf->SetFont('Arial','B',9);
$pdf->Ln(-2);
$pdf->Cell(4);
$pdf->Cell(90,10,utf8_decode('b) Objetivos específicos del festival'),0,0,'L');
$pdf->Ln(8);
$pdf->Cell(4);
$pdf->SetFont('Arial','',9);
$pdf->MultiCell(187,4,$desarrollo_proyecto_objetivos_especificos,0,'J');

$pdf->SetFont('Arial','B',9);
	$pdf->Ln(-3);
	$pdf->Cell(4);
	$pdf->Cell(90,10,utf8_decode('c) Antecedentes y trayectoria del festival'),0,0,'L');
	$pdf->Ln(8);
$pdf->Cell(4);
$pdf->SetFont('Arial','',9);
	$pdf->MultiCell(187,4,$desarrollo_proyecto_antecedente,0,'J');

	$pdf->SetFont('Arial','B',9);
	$pdf->Ln(-3);
	$pdf->Cell(4);
	$pdf->Cell(90,10,utf8_decode('d) Número de público total beneficiario en la edición anterior'),0,0,'L');
	$pdf->Ln(8);
$pdf->Cell(4);
$pdf->SetFont('Arial','',9);
	$pdf->MultiCell(187,4,$num_publico_benefiaciado_ant,0,'J');


	$pdf->SetFont('Arial','B',9);
	$pdf->Ln(-2);
	$pdf->Cell(4);
	$pdf->Cell(90,10,utf8_decode('e) Descripción del proyecto (justificación de realización y descripción del impacto sociocultural y del entorno donde se realizará).'),0,0,'L');
	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','',9);
	$pdf->MultiCell(187,4,$desarrollo_proyecto_justificacion,0,'J');

	$pdf->SetFont('Arial','B',9);
	$pdf->Ln(-2);
	$pdf->Cell(4);
	$pdf->Cell(90.5,10,utf8_decode('f) Descripción de la línea curatorial y/o acciones para la generación de la programación de actividades artísticas, de exhibición'),0,0,'L');
	$pdf->Ln(3);
	$pdf->Cell(4);
	$pdf->Cell(90.5,10,utf8_decode('formación.'),0,0,'L');
	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','',9);
	$pdf->MultiCell(187,4,$descripcion_linea_curotorial,0,'J');

	$pdf->SetFont('Arial','B',9);
	$pdf->Ln(-2);
	$pdf->Cell(4);
	$pdf->Cell(90.5,10,utf8_decode('g) Descripción de la población, audiencia y/ público objetivo del festival'),0,0,'L');
	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','',9);
	$pdf->MultiCell(187,4,$descripcion_poblacion_audiencia,0,'J');

	

	$pdf->SetFont('Arial','B',9);
	$pdf->Ln(-2);
	$pdf->Cell(4);
	$pdf->Cell(90.5,10,utf8_decode('h) Descripción de estrategias para la adaptación del festival frente al nuevo consumo digital.'),0,0,'L');
	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','',9);
	$pdf->MultiCell(187,4,$desarrollo_proyecto_descripcion,0,'J');
/*

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
	$pdf->Cell(90,10,utf8_decode('e) Descripción del impacto sociocultural del proyecto'),0,0,'L');
	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','',9);
	$pdf->MultiCell(187,4,$desarrollo_proyecto_descripcion_impacto,0,'J');
	*/

	$pdf->AddPage();
	$pdf->SetFont('Arial','B',9);
	$pdf->Ln(1);
	$pdf->Cell(4);
	$pdf->Cell(90,10,utf8_decode('i) Metas cuantitativas del festival.'),0,0,'L');
	$pdf->Ln(8);
	$pdf->Cell(5);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(180,5,'Nombre meta',1,0,'C');
	$pdf->Cell(20,5,'Cantidad',1,0,'C');

	$y=$pdf->GetY();
	
$y_jon = $pdf->SetY($y+5);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(5);
	$pdf->Multicell(180,5,utf8_decode('- Número de presentaciones artísticas/ Número de títulos, cortometrajes, largometrajes, entre otros'),0,'L');
	
	$pdf->SetFont('Arial','',9);
	$y_jon = $pdf->SetY($y+5);
	$pdf->Cell(180);
	$pdf->MultiCell(30,5,$meta_num_presentaciones,0,'C');

	$y=$pdf->GetY();
	$y_jon = $pdf->SetY($y);

	$pdf->SetFont('Arial','',8);
	$pdf->Cell(5);
	$pdf->Multicell(180,5,utf8_decode('- Cantidad de público a beneficiar $meta_num_publico'),0,'L');

	$pdf->SetFont('Arial','',9);
	$y_jon = $pdf->SetY($y);
	$pdf->Cell(180);
	$pdf->MultiCell(30,5,$meta_num_publico,0,'C');

	
	$y=$pdf->GetY();
	
	$y_jon = $pdf->SetY($y);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(5);
	$pdf->Multicell(180,5,utf8_decode('- Número de municipios a beneficiar'),0,'L');

	$pdf->SetFont('Arial','',9);
	$y_jon = $pdf->SetY($y);
	$pdf->Cell(180);
	$pdf->MultiCell(30,5,$meta_num_municipio,0,'C');

	$y=$pdf->GetY();

	$y_jon = $pdf->SetY($y);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(5);
	$pdf->Multicell(180,5,utf8_decode('- Número de foros, sedes o medios de transmisión que se utilizarán'),0,'L');

	$pdf->SetFont('Arial','',9);
	$y_jon = $pdf->SetY($y);
	$pdf->Cell(180);
	$pdf->MultiCell(30,5,$meta_num_foros,0,'C');

	$y=$pdf->GetY();

	$y_jon = $pdf->SetY($y);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(5);
	$pdf->Multicell(180,5,utf8_decode('- Número de artistas, creadores, conferencistas, académicos, curadores, programadores, especialistas y participantes en general:'),0,'L');

	$pdf->SetFont('Arial','',9);
	$y_jon = $pdf->SetY($y);
	$pdf->Cell(180);
	$pdf->MultiCell(30,5,$meta_num_artistas,0,'C');

	$y=$pdf->GetY();

	$y_jon = $pdf->SetY($y);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(5);
	$pdf->Multicell(180,5,utf8_decode('- Cantidad de grupos artísticos/ Secciones o categorías de participación para exhibición de películas, cortometrajes, entre otros:'),0,'L');

	$pdf->SetFont('Arial','',9);
	$y_jon = $pdf->SetY($y);
	$pdf->Cell(180);
	$pdf->MultiCell(30,5,$meta_cantidad_grupos,0,'C');

	$y=$pdf->GetY();

	$y_jon = $pdf->SetY($y);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(5);
	$pdf->Multicell(180,5,utf8_decode('- Número de actividades académicas:'),0,'L');

	$pdf->SetFont('Arial','',9);
	$y_jon = $pdf->SetY($y);
	$pdf->Cell(180);
	$pdf->MultiCell(30,5,$meta_num_actividades_academicas,0,'C');

	$y=$pdf->GetY();

	$y_jon = $pdf->SetY($y);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(5);
	$pdf->Multicell(180,5,utf8_decode('- Número de actividades a cargo de creadores locales/ Número de títulos de cine mexicano:'),0,'L');

	$pdf->SetFont('Arial','',9);
	$y_jon = $pdf->SetY($y);
	$pdf->Cell(180);
	$pdf->MultiCell(30,5,$meta_act_creadores_num_cine_mex,0,'C');
	 
/*inicio 2021
	$y_jon = $pdf->SetY($y+5);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(5);
	//- Número de presentaciones artisticas
	$pdf->Multicell(140,5,utf8_decode('- Total de público a atender'),0,'L');
	
	$pdf->SetFont('Arial','',9);
	$y_jon = $pdf->SetY($y+5);
	$pdf->Cell(145);
	//$meta_num_presentaciones
	$pdf->MultiCell(45,5,$meta_num_publico,0,'C');

	$y=$pdf->GetY();
	$y_jon = $pdf->SetY($y);

	$pdf->SetFont('Arial','',8);
	$pdf->Cell(5);
	//Número de grupos indígenas a atender
	$pdf->Multicell(140,5,utf8_decode('- Número de localidades a atender'),0,'L');

	$pdf->SetFont('Arial','',9);
	$y_jon = $pdf->SetY($y);
	$pdf->Cell(145);
	//$meta_numero_grupos_ind_atender
	$pdf->MultiCell(45,5,$meta_num_municipio,0,'C');

	$y=$pdf->GetY();
	
	$y_jon = $pdf->SetY($y);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(5);
	//Cantidad de público a beneficiar
	$pdf->Multicell(140,5,utf8_decode('- Número de foros o medios que se utilizarán'),0,'L');

	$pdf->SetFont('Arial','',9);
	$y_jon = $pdf->SetY($y);
	$pdf->Cell(145);
	//$meta_num_publico
	$pdf->MultiCell(45,5,$meta_num_foros,0,'C');

	$y=$pdf->GetY();

	$y_jon = $pdf->SetY($y);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(5);
	//Número de municipios a beneficiar
	$pdf->Multicell(140,5,utf8_decode('- Número de actividades artísticas'),0,'L');

	$pdf->SetFont('Arial','',9);
	$y_jon = $pdf->SetY($y);
	$pdf->Cell(145);
	//$meta_num_municipio
	$pdf->MultiCell(45,5,$meta_num_presentaciones,0,'C');

	$y=$pdf->GetY();

	$y_jon = $pdf->SetY($y);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(5);
	//Número de foros que se utilizarán
	$pdf->Multicell(140,5,utf8_decode('- Número de participantes artísticos'),0,'L');

	$pdf->SetFont('Arial','',9);
	$y_jon = $pdf->SetY($y);
	$pdf->Cell(145);
	//$meta_num_foros
	$pdf->MultiCell(45,5,$meta_cantidad_grupos,0,'C');

	$y=$pdf->GetY();

	$y_jon = $pdf->SetY($y);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(5);
	//Cantidad de grupos artisticos
	$pdf->Multicell(140,5,utf8_decode('- Conferencias, talleres, ponencias, clases magistrales, cursos y mesas de debate'),0,'L');

	$pdf->SetFont('Arial','',9);
	$y_jon = $pdf->SetY($y);
	$pdf->Cell(145);
	//$meta_cantidad_grupos
	$pdf->MultiCell(45,5,$meta_num_actividades_academicas,0,'C'); fin2021*/

	/*$y=$pdf->GetY();

	$y_jon = $pdf->SetY($y);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(5);
	$pdf->Multicell(140,5,utf8_decode('- Número de actividades académicas'),0,'L');

	$pdf->SetFont('Arial','',9);
	$y_jon = $pdf->SetY($y);
	$pdf->Cell(145);
	$pdf->MultiCell(45,5,$meta_num_actividades_academicas,0,'C');*/

	$y=$pdf->GetY();
	
	$pdf->Ln(1);
	
	$consulta_mas_metas="SELECT * FROM mas_metas_numericas where clave_usuario='".$cve_user."';";
	$exe_consulta_mas_metas=mysqli_query($con, $consulta_mas_metas);
	$k=0;
	$kk=0;
	$i=25;
		while($row_metas=mysqli_fetch_array($exe_consulta_mas_metas, MYSQLI_ASSOC)){
									
			$nombre_meta_numerica	=	$row_metas['nombre_meta_numerica'];
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
				$pdf->Multicell(180,3,'- '.$nombre_meta_numerica,0,'L');
				
				$pdf->SetFont('Arial','',9);
				$y_jon = $pdf->SetY($y);/* Inicio */ 
				
				$pdf->Cell(180);
				$pdf->MultiCell(30,3,$meta_cantidad,0,'C');
				$k++;
				
			}
			$pdf->Cell(45,1,'',0,1,'C');
			
			$pdf->Ln(4);
		}
	

	/*$pdf->Ln(8);
	$pdf->SetFont('Arial','B',9);
	$pdf->Ln(-2);
	$pdf->Cell(4);
	$pdf->Cell(90,10,utf8_decode('h) Descripción del impacto socio-cultural del proyecto'),0,0,'L');
	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','',9);
	$pdf->MultiCell(187,4,$desarrollo_proyecto_descripcion_impacto,0,'J');
	*/
	$pdf->SetFont('Arial','B',9);
	$pdf->Ln(-2);
	$pdf->Cell(4);
	$pdf->Cell(90,10,utf8_decode('j) Cuantificación de la Población objetivo del festival '),0,0,'L');
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
	$pdf->Cell(90,10,utf8_decode('k) Organigrama operativo para la producción del festival'),0,0,'L');
	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->Cell(90,10,utf8_decode('Descripción de la organización del equipo de operativo, administrativo y de producción del festival, así como su perfil'),0,0,'L');
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

	/*$pdf->SetFont('Arial','B',9);	
	$pdf->Ln(1);
	$pdf->Cell(4);
	$pdf->Cell(90,10,utf8_decode('l)	Cronograma de acciones para la ejecución del festival'),0,0,'L');


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
  $exe_consulta_crono=mysqli_query($con, $consulta_rep_crono);
		while($row_crono=mysqli_fetch_array($exe_consulta_crono, MYSQLI_ASSOC)){
			
			$fechaacciones		    =	$row_crono['fechaacciones'];
			$fechaacciones_fin		=	$row_crono['fechaacciones_fin'];
			$acciones  =  $row_crono['acciones'];
			//$acciones  = str_replace("<br>", "\n", $acciones);
			$acciones  = str_replace("?", "'", $acciones);

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
*/

	$pdf->SetFont('Arial','B',9);	
	$pdf->Ln(5);
	$pdf->Cell(4);
	$pdf->Cell(90,10,utf8_decode('l) Lugares de realización de las actividades artísticas del festival'),0,0,'L');

	$pdf->Ln(8);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(4);				
	$pdf->MultiCell(187,4,'Tipo de lugar: '.$tipo_lugar_a,0,'L');
	$pdf->Ln(0.1);
	$pdf->Cell(4);	
	$pdf->MultiCell(187,4,utf8_decode('Nombre de foro o medio de transmisión: ').$Nombreforo_a,0,'L');
	$pdf->Ln(0.1);
	$pdf->Cell(4);	
	$pdf->MultiCell(187,4,utf8_decode('Código Postal: ').$cpforo_a,0,'L');
	$pdf->Ln(0.1);
	$pdf->Cell(4);	
	$pdf->MultiCell(187,4,'Estado: '.$estadoforo_a,0,'L');
	$pdf->Ln(0.1);
	$pdf->Cell(4);
	$pdf->MultiCell(187,4,utf8_decode('Municipio o Alcaldía: ').$mun_alcforo_a,0,'L');
	$pdf->Ln(0.1);
	$pdf->Cell(4);
	$pdf->MultiCell(187,4,'Colonia: '.$coloniaforo_a,0,'L');
	$pdf->Ln(0.1);
	$pdf->Cell(4);
	$pdf->MultiCell(187,4,'Calle: '.$calleforo_a,0,'L');
	$pdf->Ln(0.1);
	$pdf->Cell(4);
	$pdf->MultiCell(187,4,'No. exterior: '.$no_extforo_a,0,'L');
	$pdf->Ln(0.1);
	$pdf->Cell(4);
	$pdf->MultiCell(187,4,'No. interior: '.$no_intforo_a,0,'L');
	$pdf->Ln(0.1);
	$pdf->Cell(4);
	$pdf->MultiCell(187,4,utf8_decode('Descripción/Link de acceso: ').utf8_decode($Descripcionlug_a), 0, 'L');


	$pdf->Ln(2);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(4);				
	$pdf->MultiCell(187,4,'Tipo de lugar: '.$tipo_lugar_b,0,'L');
	$pdf->Ln(0.1);
	$pdf->Cell(4);	
	$pdf->MultiCell(187,4,utf8_decode('Nombre de foro o medio de transmisión: ').$Nombreforo_b,0,'L');
	$pdf->Ln(0.1);
	$pdf->Cell(4);	
	$pdf->MultiCell(187,4,utf8_decode('Código Postal: ').$cpforo_b,0,'L');
	$pdf->Ln(0.1);
	$pdf->Cell(4);	
	$pdf->MultiCell(187,4,'Estado: '.$estadoforo_b,0,'L');
	$pdf->Ln(0.1);
	$pdf->Cell(4);
	$pdf->MultiCell(187,4,utf8_decode('Municipio o Alcaldía: '.$mun_alcforo_b),0,'L');
	$pdf->Ln(0.1);
	$pdf->Cell(4);
	$pdf->MultiCell(187,4,'Colonia: '.$coloniaforo_b,0,'L');
	$pdf->Ln(0.1);
	$pdf->Cell(4);
	$pdf->MultiCell(187,4,'Calle: '.$calleforo_b,0,'L');
	$pdf->Ln(0.1);
	$pdf->Cell(4);
	$pdf->MultiCell(187,4,'No. exterior: '.$no_extforo_b,0,'L');
	$pdf->Ln(0.1);
	$pdf->Cell(4);
	$pdf->MultiCell(187,4,'No. interior: '.$no_intforo_b,0,'L');
	$pdf->Ln(0.1);
	$pdf->Cell(4);
	$pdf->MultiCell(187,4,utf8_decode('Descripción/Link de acceso:').utf8_decode($Descripcionlug_b), 0, 'L');

	$pdf->Ln(2);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(4);				
	$pdf->MultiCell(187,4,'Tipo de lugar: '.$tipo_lugar_c,0,'L');
	$pdf->Ln(0.1);
	$pdf->Cell(4);	
	$pdf->MultiCell(187,4,utf8_decode('Nombre de foro o medio de transmisión: ').$Nombreforo_c,0,'L');
	$pdf->Ln(0.1);
	$pdf->Cell(4);	
	$pdf->MultiCell(187,4,utf8_decode('Código Postal: ').$cpforo_c,0,'L');
	$pdf->Ln(0.1);
	$pdf->Cell(4);	
	$pdf->MultiCell(187,4,'Estado: '.$estadoforo_c,0,'L');
	$pdf->Ln(0.1);
	$pdf->Cell(4);
	$pdf->MultiCell(187,4,utf8_decode('Municipio o Alcaldía: ').$mun_alcforo_c,0,'L');
	$pdf->Ln(0.1);
	$pdf->Cell(4);
	$pdf->MultiCell(187,4,'Colonia: '.$coloniaforo_c,0,'L');
	$pdf->Ln(0.1);
	$pdf->Cell(4);
	$pdf->MultiCell(187,4,'Calle: '.$calleforo_c,0,'L');
	$pdf->Ln(0.1);
	$pdf->Cell(4);
	$pdf->MultiCell(187,4,'No. exterior: '.$no_extforo_c,0,'L');
	$pdf->Ln(0.1);
	$pdf->Cell(4);
	$pdf->MultiCell(187,4,'No. interior: '.$no_intforo_c,0,'L');
	$pdf->Ln(0.1);
	$pdf->Cell(4);
	$pdf->MultiCell(187,4,utf8_decode('Descripción/Link de acceso:').utf8_decode($Descripcionlug_c), 0, 'L');


	$pdf->Ln(2);
	
 	$consulta_rep_lug="SELECT * FROM mas_lugares 
  					where clave_usuario='".$cve_user."';";
	$exe_consulta_rep_lug=mysqli_query($con, $consulta_rep_lug);
	  $j=0;
		while($row_lug=mysqli_fetch_array($exe_consulta_rep_lug, MYSQLI_ASSOC)){
			
			$j=$j+1;
			$Nombreforo  =	$row_lug['Nombreforo'];
			$Nombreforo  = str_replace("?", '"', $Nombreforo);
			$tipo_lugar	 =	$row_lug['tipo_lugar'];
			$cpforo		 =	$row_lug['cpforo'];
			$estadoforo	 =	$row_lug['estadoforo'];
			$mun_alcforo =	$row_lug['mun_alcforo'];
			$coloniaforo =	$row_lug['coloniaforo'];
			$calleforo	 =	$row_lug['calleforo'];
			$no_extforo	 =	$row_lug['no_extforo'];
			$no_intforo	 =	$row_lug['no_intforo'];

			$Descripcionlug  = 	$row_lug['Descripcionlug'];
			$Descripcionlug  =  str_replace("?", "-", $Descripcionlug);

			/*&& !empty($estadoforo)  && !empty($mun_alcforo) 
				&& !empty($coloniaforo) && !empty($calleforo) && !empty($no_extforo) && !empty($no_intforo)  && !empty($Descripcionlug)*/
			if($tipo_lugar==1 && !empty($Nombreforo) && !empty($cpforo)){

			$tipo_lugar="Foro";
			
			$pdf->Ln(1.5);
			$pdf->Cell(4);	
			$pdf->MultiCell(187,4,'Tipo de lugar: '.$tipo_lugar,0,'L');
			$pdf->Ln(0.1);
			$pdf->Cell(4);	
			$pdf->MultiCell(187,4,utf8_decode('Nombre de foro o medio de transmisión: ').$Nombreforo,0,'L');
			$pdf->Ln(0.1);
			$pdf->Cell(4);	
			$pdf->MultiCell(187,4,utf8_decode('Código Postal: ').$cpforo,0,'L');
			$pdf->Ln(0.1);
			$pdf->Cell(4);	
			$pdf->MultiCell(187,4,'Estado: '.$estadoforo,0,'L');
			$pdf->Ln(0.1);
			$pdf->Cell(4);
			$pdf->MultiCell(187,4,utf8_decode('Municipio o Alcaldía: ').$mun_alcforo,0,'L');
			$pdf->Ln(0.1);
			$pdf->Cell(4);
			$pdf->MultiCell(187,4,'Colonia: '.$coloniaforo,0,'L');
			$pdf->Ln(0.1);
			$pdf->Cell(4);
			$pdf->MultiCell(187,4,'Calle: '.$calleforo,0,'L');
			$pdf->Ln(0.1);
			$pdf->Cell(4);
			$pdf->MultiCell(187,4,'No. exterior: '.$no_extforo,0,'L');
			$pdf->Ln(0.1);
			$pdf->Cell(4);
			$pdf->MultiCell(187,4,'No. interior: '.$no_intforo,0,'L');
			$pdf->Ln(0.1);
			$pdf->Cell(4);
			$pdf->MultiCell(187,4,utf8_decode('Descripción/Link de acceso:').utf8_decode($Descripcionlug), 0, 'L');


			$pdf->Ln(2);
			} else if ($tipo_lugar==2 && !empty($Nombreforo) && !empty($Descripcionlug)){
				$tipo_lugar= str_replace("?", '"', utf8_decode("Medio de transmisión")); 
				$pdf->Ln(0.1);
				$pdf->Cell(4);				
				$pdf->MultiCell(187,4,'Tipo de lugar: '.$tipo_lugar,0,'L');
				$pdf->Ln(0.1);
				$pdf->Cell(4);	
				$pdf->MultiCell(187,4,utf8_decode('Nombre de foro o medio de transmisión: ').$Nombreforo,0,'L');
				$pdf->Ln(0.1);
				$pdf->Cell(4);
				$pdf->MultiCell(187,4,utf8_decode('Descripción/Link de acceso:').utf8_decode($Descripcionlug), 0, 'L');
				$pdf->Ln(0.1);
			}

		}


	
	$pdf->SetFont('Arial','B',9);	
	$pdf->Ln(-2);
	$pdf->Cell(4);
	$pdf->Cell(90,10,utf8_decode('m) Monto solicitado a la Secretaría de Cultura y Costo total del festival '),0,0,'L');
	
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
	/*INICIO ocultar etapa 1 v2FIN ocultar etapa 1 v2 */


	
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',9);
	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->MultiCell(187,5,utf8_decode('n) Presupuesto en el que se acrediten los gastos relativos a la contratación de los servicios y el arrendamiento de los bienes esenciales para la realización del festival, de manera desglosada y especificando la fuente del financiamiento. En el caso de la contratación de los servicios y el arrendamiento de los bienes esenciales para la realización del festival que se proponen pagar con recursos del PROFEST, se deberá adjuntar una cotización por cada servicio o arrendamiento, excepto en el caso de la contratación de servicios artísticos profesionales.'),0,'J');
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
	
	$consulta_rep_presup="SELECT * FROM mas_presupuesto where clave_usuario='".$cve_user."';";
	$exe_consulta_rep_presup=mysqli_query($con, $consulta_rep_presup);
	$k=0;
	$kk=0;
	$i=30;
		while($row_presup=mysqli_fetch_array($exe_consulta_rep_presup, MYSQLI_ASSOC)){
			
						
			$Concepto_gasto	=	$row_presup['Concepto_gasto'];
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
					$nomb_Fuente_finan = 'Institucional Educación Superior';
				break;
				case 5:
					$nomb_Fuente_finan = 'Privada';
				break;
			}

	$y4=$pdf->GetY();
	$y_jony = $pdf->SetY($y4); // Inicio 
	$pdf->Cell(3.5);
	
	$consulta_cat_cg="SELECT * FROM catalogo_concepto_gastos where id_gasto='".$Concepto_gasto."';";
	$execonsulta_cat_cg=mysqli_query($con, $consulta_cat_cg);
	$row_cat_cg=mysqli_fetch_array($execonsulta_cat_cg);
			

			$Concepto_gasto	=  $row_cat_cg['concepto_gasto'];
			$Concepto_gasto  = str_replace("<br>", "\n", $Concepto_gasto);
			$Concepto_gasto  = str_replace("?", "-", $Concepto_gasto);

	$pdf->SetFont('Arial','',7);
	$pdf->Multicell(84,5,$Concepto_gasto,0,'L');

	$pdf->SetFont('Arial','',8);
	
	$y_jony = $pdf->SetY($y4); // Inicio  
	
	$pdf->Cell(88);
	$pdf->MultiCell(48,5,$nomb_Fuente_finan,0,'L');
	
	$y_jony = $pdf->SetY($y4); // Inicio 

	$pdf->Cell(136);
	$pdf->Multicell(35,5,$campo_prueba,0,'C');
	
	$y_jony = $pdf->SetY($y4); // Inicio  
	
	$Porcentaje = number_format($Porcentaje, 2, '.', '');
	$pdf->Cell(171);
	$pdf->Multicell(20,5,$Porcentaje.'%',0,'C');
	$k++;
		}
		}
	$y5=$pdf->GetY();
	$y_jat3 = $pdf->SetY($y5+5); // Inicio
	$pdf->Cell(4);			
	$pdf->SetFont('Arial','B',9);			
	$pdf->Cell(132,5,'Total',1,0,'C');
	$pdf->Cell(35,5,'$'.number_format($monto_unidad_total, 2, '.', ','),1,0,'C');
	$pdf->Cell(20,5,$porcentaje_total.'%',1,0,'C');
			
	/* INICIO ocultar etapa 1 v2FIN ocultar etapa 1 v2 */
/* esta parte no se pidio para la convocatoria 2022 (INICIO)
	$pdf->AddPage();
	$pdf->Ln(9);
	$pdf->Cell(4);
	$pdf->Cell(90,10,utf8_decode('Estrategias de difusión del festival: ¿Por qué medios se dará difusión al festival?'),0,0,'L');
	
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

	/*$pdf->Ln(6);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(187,4,utf8_decode('q) Estrategia para adecuar las actividades programadas del festival en caso de rebrote por SARS-CoV-2 (COVID-19)'),0,0,'L');
	$pdf->Ln(4);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','',9);
	$pdf->MultiCell(187,4,$desarrollo_proyecto_rebrote_covid,0,'J');
*/

	/*$pdf->Ln(6);
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
	$pdf->Cell(187,10,utf8_decode('o) Descripción de los mecanismos de evaluación del festival'),0,0,'L');
	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','',9);
	$pdf->MultiCell(187,4,$descripcion_mecanismos_evaluacion,0,'J');

*/
	/*$pdf->Ln(8.5);
	$pdf->Cell(45);
	$pdf->MultiCell(100,4,$nombre_titular,0,'C');*/
	
	/*INICIO ocultar etapa 1 v2*/
	/*$pdf->Cell();
	$pdf->MultiCell(90,4,$nombre_titular,0,'C');*/
	
	//$y2 = $pdf->GetY();
	
	//$pdf->SetY($y2+3);
	
	//$pdf->Line(150, $y2+2, 65, $y2+2);
	//$pdf->Cell(50);
	//Nombre y firma del Representante Legal de la Instancia
	//$pdf->Cell(90,4,utf8_decode('Nombre y firma de la o el Títular de la Instancia Postulante'),0,0,'C');
	/*FIN ocultar etapa 1 v2 */
	

?>