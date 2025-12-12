<?php include("../Connections/conexion.php");

$cve_user;

include('consultas_reporte_proyecto.php');

	//INICIO Primera parte
	

	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(5);
	$pdf->Ln(8);
	$pdf->Cell(1);
	$pdf->Cell(190,5,'ANEXO',0,0,'C');
	$pdf->Ln(5);
	$pdf->Cell(1);
	$pdf->Cell(190,5,'Proyecto Cultural PROFEST',0,0,'C');

	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(5);
	$pdf->Ln(8);
	$pdf->Cell(1);
	$pdf->Cell(45,8,'Nombre del Festival:  '.utf8_decode($nombre_festival),0,0,'L');
	$pdf->Line(45, 85, 203, 85);

	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(5);
	$pdf->Ln(8);
	$pdf->Cell(1);
	$pdf->Cell(45,8,utf8_decode('Fecha de realización:  Del ').$periodo_realizacion_fecha_inicio.' al '.$periodo_realizacion_fecha_termino,0,0,'L');
	$pdf->Line(47, 92, 98, 92);
	$pdf->Cell(40);
	$pdf->Cell(45,8,utf8_decode('Número de ediciones previas:  ').$numero_ediciones_previas,0,0,'L');
	$pdf->Line(145, 92, 203, 92);

	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(5);
	$pdf->Ln(8);
	$pdf->Cell(1);
	switch($disciplina_2022){
		case 1:
			$disciplina_2022_nombre="Música";
		break;
		case 2:
			$disciplina_2022_nombre="Teatro";
		break;
		case 3:
			$disciplina_2022_nombre="Danza";
		break;
		case 7:
			$disciplina_2022_nombre="Cine";
		break;
		case 6:
			$disciplina_2022_nombre="Literatura";
		break;
		case 4:
			$disciplina_2022_nombre="Artes visuales y diseño";
		break;
		case 5:
			$disciplina_2022_nombre="Cultura Alimentaria";
		break;
		case 8:
			$disciplina_2022_nombre="Multidisciplina";
		break;
	}
	$pdf->Cell(45,8,'Disciplina:  '.utf8_decode($disciplina_2022_nombre),0,0,'L');
	$pdf->Line(30, 100, 98, 100);
	$pdf->Ln(8);

	switch ($Info_financiera_categoria){
		case 'A':
		$apoyo_monto_categoria='a) $300,000.00 (con puntaje mínimo de 170 puntos).';                                
		break;
		case 'B':
		$apoyo_monto_categoria='b) $500,000.00 (con puntaje mínimo de 175 puntos).';
		break;
		case 'C':
		$apoyo_monto_categoria='c)	$1,000,000.00 (con puntaje mínimo de 180 puntos).';
		break;
		case 'D': 
		$apoyo_monto_categoria='d)	$1,500,000.00 (con puntaje mínimo de 185 puntos).';
		break;
		case 'E': 
		$apoyo_monto_categoria='e)	$2,000,000.00 (con puntaje mínimo de 195 puntos).';
		break;
	}
	$pdf->Cell(45,8,utf8_decode('Categoría en la que participa:  '.$apoyo_monto_categoria),0,0,'L');
	$pdf->Line(57, 108, 203, 108);
	

	$pdf->Ln(15);
	//INICIO Segunda parte
	$pdf->SetFont('Arial','B',9);
	$pdf->Ln(3);
	$pdf->Cell(4);
	$pdf->Cell(187,8,'DESARROLLO DEL PROYECTO',0,0,'C');
	$pdf->Ln(10);

$pdf->SetFont('Arial','B',9);
	$pdf->Ln(-3);
	$pdf->Cell(4);
	$pdf->Cell(90,10,utf8_decode('a) Información acerca de la trayectoria del Festival.'),0,0,'L');
	$pdf->Ln(8);
$pdf->Cell(4);
$pdf->SetFont('Arial','',9);
	$pdf->MultiCell(187,4,utf8_decode($desarrollo_proyecto_antecedente),0,'J');

	$pdf->SetFont('Arial','B',9);
	$pdf->Ln(3);
	$pdf->Cell(4);
	$pdf->Cell(90,10,utf8_decode('b) Descripción de la población, audiencia y/o público objetivo del festival.'),0,0,'L');
	$pdf->Ln(8);
$pdf->Cell(4);
$pdf->SetFont('Arial','',9);
	$pdf->MultiCell(187,4,utf8_decode($proy_desc_pob_aud_pubobj_festival),0,'J');


	$pdf->SetFont('Arial','B',9);
	$pdf->Ln(-2);
	$pdf->Cell(4);
	$pdf->Cell(90,10,utf8_decode('c) ¿Cómo o por qué el festival logra ampliar la oferta cultural del lugar donde se planea su realización?'),0,0,'L');
	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','',9);
	$pdf->MultiCell(187,4,utf8_decode($desarrollo_proyecto_justificacion),0,'J');

	$pdf->SetFont('Arial','B',9);
	$pdf->Ln(-2);
	$pdf->Cell(4);
	$pdf->Cell(90.5,10,utf8_decode('d) Descripción de la línea curatorial, selección, y/o el perfil de la programación de actividades'),0,0,'L');
	$pdf->Ln(3);
	$pdf->Cell(4);
	$pdf->Cell(90.5,10,utf8_decode(' artísticas, de exhibición y/o formación del festival:'),0,0,'L');
	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','',9);
	$pdf->MultiCell(187,4,utf8_decode($descripcion_linea_curotorial),0,'J');

	$pdf->SetFont('Arial','B',9);
	$pdf->Ln(-2);
	$pdf->Cell(4);
	$pdf->Cell(90.5,10,utf8_decode('e) Considerando las anteriores ediciones, ¿cuáles son las novedades para la edición de este 2025? '),0,0,'L');
	$pdf->Ln(3);
	$pdf->Cell(4);
	$pdf->Cell(90.5,10,utf8_decode('Descripción de actividades a destacar, estrategias de impacto o de vinculación con el público: '),0,0,'L');$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','',9);
	$pdf->MultiCell(187,4,utf8_decode($proy_noved_ed_2025),0,'J');


	$pdf->SetFont('Arial','B',9);
	$pdf->Ln(5);
	$pdf->Cell(4);
	$pdf->Cell(90.5,10,utf8_decode('f) ¿El proyecto considera actividades dirigidas a grupos en situación de vulnerabilidad?, ¿en los espacios de ejecución '),0,0,'L');
	$pdf->Ln(3);
	$pdf->Cell(4);
	$pdf->Cell(90.5,10,utf8_decode('consideras la accesibilidad a personas con capacidades diferentes? Descripción de aquellas actividades '),0,0,'L');
	$pdf->Ln(3);
	$pdf->Cell(4);
	$pdf->Cell(90.5,10,utf8_decode('dirigidas a grupos en situación de vulnerabilidad y/o aquellas acciones para contar con un espacio accesible para todas y todos.'),0,0,'L');
	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','',9);
	$pdf->MultiCell(187,4,utf8_decode($desarrollo_proyecto_descripcion),0,'J');

	$pdf->SetFont('Arial','B',9);
	$pdf->Ln(-2);
	$pdf->Cell(4);
	$pdf->Cell(90.5,10,utf8_decode('g) Descripción de los espacios y/o la infraestructura de los foros donde se pretenden realizar las actividades, ¿por qué se  '),0,0,'L');
	$pdf->Ln(3);
	$pdf->Cell(4);
	$pdf->Cell(90.5,10,utf8_decode('seleccionan dichos espacios?'),0,0,'L');
	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','',9);
	$pdf->MultiCell(187,4,utf8_decode($proy_esp_infra_foros),0,'J');



$pdf->SetFont('Arial','B',9);
	$pdf->Ln(3);
	$pdf->Cell(4);
	$pdf->Cell(90,10,utf8_decode('h) Entidad(es) donde se planea la realización del proyecto:'),0,0,'L');
	
	$y_ent=$pdf->GetY();
	$y_jon_ent = $pdf->SetY($y_ent+12);
	$pdf->SetFont('Arial','',8);
	
	//INICIO 'Proyecto Convocatoria 2023'
	for($f=1;$f<=10;$f++){
		$concat_enti = ${'entidades_a'.$f};
		$nombre_campo_enti = 'entidades_a'.$f;

			if(!empty($concat_enti)){
			$sql_consulta_ent = "SELECT * FROM `entidades` where id_entidad_proyecto=$concat_enti"; 
				$resultado_consulta_ent = mysqli_query($con, $sql_consulta_ent);
					$num_resultado_consulta_ent = mysqli_num_rows($resultado_consulta_ent);
					for ($m2=0; $m2 <$num_resultado_consulta_ent; $m2++){
						$row_proy_ent2 = mysqli_fetch_array($resultado_consulta_ent, MYSQLI_ASSOC);
						$nombre_entidad_proyecto  = $row_proy_ent2["nombre_entidad_proyecto"];
						$pdf->Cell(5);
						$pdf->Multicell(180,5,'- '.$nombre_entidad_proyecto,0,'L');
					
				}
			}
		}



	$pdf->SetFont('Arial','B',9);
	$pdf->Ln(-2);
	$pdf->Cell(4);
	$pdf->Cell(90.5,10,utf8_decode('i) ¿Cómo se vincula el festival con otros organismos para la obtención de recursos?, ¿qué organismos se suman '),0,0,'L');
	$pdf->Ln(3);
	$pdf->Cell(4);
	$pdf->Cell(90.5,10,utf8_decode(' a su realización y cómo es su aportación?, ¿por qué se vincula con dichos organismos?'),0,0,'L');
	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','',9);
	$pdf->MultiCell(187,4,utf8_decode($proy_vinc_org_obtrecursos),0,'J');

	$pdf->SetFont('Arial','B',9);
	$pdf->Ln(-2);
	$pdf->Cell(4);
	$pdf->Cell(90,10,utf8_decode('j) ¿Cómo logra el festival favorecer a la itinerancia de las actividades programadas?, ¿mantiene vínculos con otros festivales?'),0,0,'L');
	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','',9);
	$pdf->MultiCell(187,4,utf8_decode($proy_fav_itinerancia),0,'J');

	$pdf->SetFont('Arial','B',9);
	$pdf->Ln(-2);
	$pdf->Cell(4);
	$pdf->Cell(90,10,utf8_decode('k) ¿Qué acciones se llevarán a cabo para dar a conocer el festival?'),0,0,'L');
	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','',9);
	$pdf->MultiCell(187,4,utf8_decode($proy_acciones),0,'J');

	$pdf->SetFont('Arial','B',9);
	$pdf->Ln(-2);
	$pdf->Cell(4);
	$pdf->Cell(90,10,utf8_decode('l) ¿Cuáles son las acciones de sustentabilidad emprendidas por el festival que contribuyen el cuidado del medio ambiente?'),0,0,'L');
	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','',9);
	$pdf->MultiCell(187,4,utf8_decode($acciones_festival_medio_ambiente),0,'J');
	
	$pdf->SetFont('Arial','B',9);
	$pdf->Ln(-2);
	$pdf->Cell(4);
	$pdf->Cell(90,10,utf8_decode('m) Información adicional que se considere pertinente para la evaluación del proyecto '),0,0,'L');
	$pdf->Ln(3);
	$pdf->Cell(4);
	$pdf->Cell(90.5,10,utf8_decode(', o link de video (campo no obligatorio)'),0,0,'L');
	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','',9);
	$pdf->MultiCell(187,4,utf8_decode($proy_info_adic),0,'J');


	$pdf->AddPage();

	$pdf->SetFont('Arial','B',9);
	$pdf->Ln(2);
	$pdf->Cell(4);
	$pdf->Cell(90,10,utf8_decode('n) Metas cuantitativas del festival.'),0,0,'L');

	$pdf->Ln(8);
	$pdf->Cell(8);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(150,5,utf8_decode('Número de actividades artísticas y/o culturales-Número de títulos, cortometrajes, largometrajes, entre otros:'),0,0,'L');
	$pdf->Ln(4);
	$pdf->Cell(8);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(150,5,'Meta 2025:'.$meta_num_presentaciones,0,0,'L');
	$pdf->Ln(3);
	$pdf->Cell(8);
	$pdf->Cell(150,5,utf8_decode('Meta alcanzada 2024 o en el último año de realización:').$meta_num_presentaciones_alcanzada,0,0,'L');

	$pdf->Ln(5);
	$pdf->Cell(8);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(150,5,utf8_decode('Total de público'),0,0,'L');
	$pdf->Ln(4);
	$pdf->Cell(8);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(150,5,'Meta 2025:'.$meta_num_publico,0,0,'L');
	$pdf->Ln(3);
	$pdf->Cell(8);
	$pdf->Cell(150,5,utf8_decode('Meta alcanzada 2024 o en el último año de realización:').$meta_num_publico_alcanzada,0,0,'L');

	$pdf->Ln(5);
	$pdf->Cell(8);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(150,5,utf8_decode('Número de municipios a beneficiar'),0,0,'L');
	$pdf->Ln(4);
	$pdf->Cell(8);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(150,5,'Meta 2025:'.$meta_num_municipio,0,0,'L');
	$pdf->Ln(3);
	$pdf->Cell(8);
	$pdf->Cell(150,5,utf8_decode('Meta alcanzada 2024 o en el último año de realización:').$meta_num_municipio_alcanzada,0,0,'L');
	
	$pdf->Ln(5);
	$pdf->Cell(8);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(150,5,utf8_decode('Número de foros, sedes o medios de transmisión que se utilizarán:'),0,0,'L');
	$pdf->Ln(4);
	$pdf->Cell(8);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(150,5,'Meta 2025:'.$meta_num_foros,0,0,'L');
	$pdf->Ln(3);
	$pdf->Cell(8);
	$pdf->Cell(150,5,utf8_decode('Meta alcanzada 2024 o en el último año de realización:').$meta_num_foros_alcanzada,0,0,'L');
	
	$pdf->Ln(5);
	$pdf->Cell(8);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(150,5,utf8_decode('Número total de participantes artísticos:'),0,0,'L');
	$pdf->Ln(4);
	$pdf->Cell(8);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(150,5,'Meta 2025:'.$meta_num_artistas,0,0,'L');
	$pdf->Ln(3);
	$pdf->Cell(8);
	$pdf->Cell(150,5,utf8_decode('Meta alcanzada 2024 o en el último año de realización:').$meta_num_artistas_alcanzada,0,0,'L');

$pdf->Ln(5);
	$pdf->Cell(8);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(150,5,utf8_decode('Total de grupos artísticos/Secciones o categorías de participación para exhibición de películas, cortometrajes, entre otros:'),0,0,'L');
	$pdf->Ln(4);
	$pdf->Cell(8);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(150,5,'Meta 2025:'.$meta_cantidad_grupos,0,0,'L');
	$pdf->Ln(3);
	$pdf->Cell(8);
	$pdf->Cell(150,5,utf8_decode('Meta alcanzada 2024 o en el último año de realización:').$meta_cantidad_grupos_alcanzada,0,0,'L');

	$pdf->Ln(5);
	$pdf->Cell(8);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(150,5,utf8_decode('Número de actividades académicas:'),0,0,'L');
	$pdf->Ln(4);
	$pdf->Cell(8);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(150,5,'Meta 2025:'.$meta_num_actividades_academicas,0,0,'L');
	$pdf->Ln(3);
	$pdf->Cell(8);
	$pdf->Cell(150,5,utf8_decode('Meta alcanzada 2024 o en el último año de realización:').$meta_num_actividades_academicas_alcanzada,0,0,'L');

	$pdf->Ln(5);
	$pdf->Cell(8);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(150,5,utf8_decode('Número de actividades a cargo de personas participantes locales/ Número de títulos de cine mexicano:'),0,0,'L');
	$pdf->Ln(4);
	$pdf->Cell(8);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(150,5,'Meta 2025:'.$meta_act_creadores_num_cine_mex,0,0,'L');
	$pdf->Ln(3);
	$pdf->Cell(8);
	$pdf->Cell(150,5,utf8_decode('Meta alcanzada 2024 o en el último año de realización:').$meta_act_creadores_num_cine_mex_alcanzada,0,0,'L');
	
	/*$pdf->Ln(5);
	$pdf->Cell(8);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(150,5,utf8_decode('Otros (especificar):'),0,0,'L');
	$pdf->Ln(4);
	$pdf->Cell(8);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(150,5,'Meta 2025:'.$meta_otro_2025,0,0,'L');
	$pdf->Ln(3);
	$pdf->Cell(8);
	$pdf->Cell(150,5,utf8_decode('Meta alcanzada 2024 o en el último año de realización:').$meta_otro_alcanzada_2024,0,0,'L');*/
	



	$pdf->Ln(8);
	/*IICIO ocultar etapa 1 v2**/
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(4);
	$pdf->Cell(187,8,utf8_decode('ñ)	Operatividad del Festival.'),0,0,'C');
	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->Cell(187,8,'Datos de la/el Director/a del festival',0,0,'L');

	$pdf->SetFont('Arial','',8.5);
	
	//INICIO 2022 DIRECTOR

	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->MultiCell(75,5,'Nombre de la/del Director/a del Festival:
	',1,'L');
	$pdf->Ln(-10);
	$pdf->Cell(79);
	$pdf->MultiCell(112,10,utf8_decode($nombre_dir).' '.utf8_decode($primer_apellido_dir).' '.utf8_decode($segundo_apellido_dir),1,'L');
	
	$pdf->Cell(75,1,'',0,'L');
	$yFIN3=$pdf->GetY();
	$pdf->SetY($yFIN3);
	$pdf->Cell(4);
	$pdf->MultiCell(187,4,utf8_decode('Breve semblanza de trayectoria de la/el Director/a del festival: ').utf8_decode($breve_semblanza_director),1,'L');
	//FIN DIRECTOR
	 
	$pdf->Cell(75,1,'',0,'L');
	$yFIN3=$pdf->GetY();
	$pdf->SetY($yFIN3);
	/*$pdf->Cell(4);
	$pdf->MultiCell(187,4,utf8_decode('Breve semblanza de la(el) responsable administrativa(o): ').utf8_decode($breve_semblanza_adm), 1,'L');
	$yFIN_OP=$pdf->GetY();
	$pdf->SetY($yFIN_OP);*/
	//FIN Datos Responsable administrativo 

	$pdf->AddPage();	
	$y_ent=$pdf->GetY();
	$y_jon_ent = $pdf->SetY($y_ent+7);
	$pdf->Cell(5);	

	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(4);
	$pdf->Cell(90,10,utf8_decode('Descripción de la organización del equipo de operativo, administrativo y de producción del festival, así como su perfil'),0,0,'L');
	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','',9);
	$pdf->MultiCell(187, 5,'1) Nombre: '.utf8_decode($organigrama_nombre1.'
	Cargo: '.$organigrama_cargo1.'
	Funciones: '.$organigrama_funciones1), 0,'L');
	$pdf->Ln(1);
	$pdf->Cell(4);
	$pdf->MultiCell(187, 5,'2) Nombre: '.utf8_decode($organigrama_nombre2.'
	Cargo: '.$organigrama_cargo2.'
	Funciones: '.$organigrama_funciones2), 0,'L');
	$pdf->Ln(1);
	$pdf->Cell(4);
	$pdf->MultiCell(187, 5,'3) Nombre: '.utf8_decode($organigrama_nombre3.'
	Cargo: '.$organigrama_cargo3.'
	Funciones: '.$organigrama_funciones3), 0,'L');
	
	if(!empty($organigrama_nombre4) && !empty($organigrama_cargo4) && !empty($organigrama_funciones4) ){
	$pdf->Ln(1);
	$pdf->Cell(4);
	$pdf->MultiCell(187, 5,'4) Nombre: '.utf8_decode($organigrama_nombre4.'
	Cargo: '.$organigrama_cargo4.'
	Funciones: '.$organigrama_funciones4), 0,'L');
	}
	if(!empty($organigrama_nombre5) && !empty($organigrama_cargo5) && !empty($organigrama_funciones5) ){
	$pdf->Ln(1);
	$pdf->Cell(4);
	$pdf->MultiCell(187, 5,'5) Nombre: '.utf8_decode($organigrama_nombre5.'
	Cargo: '.$organigrama_cargo5.'
	Funciones: '.$organigrama_funciones5), 0,'L');
	}
	if(!empty($organigrama_nombre6) && !empty($organigrama_cargo6) && !empty($organigrama_funciones6) ){
	$pdf->Ln(1);
	$pdf->Cell(4);
	$pdf->MultiCell(187, 5,'6) Nombre: '.utf8_decode($organigrama_nombre6.'
	Cargo: '.$organigrama_cargo6.'
	Funciones: '.$organigrama_funciones6), 0,'L');
	}
	if(!empty($organigrama_nombre7) && !empty($organigrama_cargo7) && !empty($organigrama_funciones7) ){
	$pdf->Ln(1);
	$pdf->Cell(4);
	$pdf->MultiCell(187, 5,'7) Nombre: '.utf8_decode($organigrama_nombre7.'
	Cargo: '.$organigrama_cargo7.'
	Funciones: '.$organigrama_funciones7), 0,'L');
	}
	if(!empty($organigrama_nombre8) && !empty($organigrama_cargo8) && !empty($organigrama_funciones8) ){
	$pdf->Ln(1);
	$pdf->Cell(4);
	$pdf->MultiCell(187, 5,'8) Nombre: '.utf8_decode($organigrama_nombre8.'
	Cargo: '.$organigrama_cargo8.'
	Funciones: '.$organigrama_funciones8), 0,'L');
	//Fin Organigrama 8 opciones
	}

	$pdf->AddPage();

	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(4);
	$pdf->Cell(187,8,'Aspectos Financieros',0,0,'C');	
	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->Cell(90,10,utf8_decode('p) Monto solicitado a la Secretaría de Cultura y Costo total del festival '),0,0,'L');
	
	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->Cell(85,4,utf8_decode('Descripción'),1,0,'C');
	$pdf->Cell(50.5,4,'Monto',1,0,'C');
	$pdf->Cell(50.5,4,'Porcentaje',1,0,'C');
	$pdf->Ln(4);
	$pdf->Cell(4);
	$pdf->Cell(85,4,utf8_decode('Costo total de realización del festival'),1,'L');
	$pdf->SetFont('Arial','',9);	
	$pdf->Cell(50.5,4,'$'.$Infor_finan_costo_monto,1,0,'C');
	$pdf->Cell(50.5,4,'100%',1,0,'C');
	$pdf->Ln(4);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','B',9);	
	$pdf->Cell(85,4,utf8_decode('Monto solicitado a la Secretaría de Cultura'),1,'L');
	$pdf->SetFont('Arial','',9);	
	$pdf->Cell(50.5,4,'$'.$Infor_finan_apoyo_monto,1,0,'C');
	$pdf->Cell(50.5,4,$Infor_finan_apoyo_costo_total.'%',1,0,'C');
	$pdf->Ln(4);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','B',9);	
	$pdf->Cell(85,4,utf8_decode('Categoría en la que participa '),1,'L');
	$pdf->SetFont('Arial','',9);	
	$pdf->Cell(100.9,4,utf8_decode($apoyo_monto_categoria),1,0,'L');
	/*INICIO ocultar etapa 1 v2FIN ocultar etapa 1 v2 */


	
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',9);
	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->MultiCell(187,5,utf8_decode('q) Resumen presupuestal del monto de coinversión que aporta la instancia postulante: '),0,'J');
	$pdf->Ln(4);
	$pdf->Cell(4);
	$pdf->Cell(187,5,utf8_decode('Financiamiento/Presupuesto de coinversión'),1,0,'C');
	
	
	$pdf->Ln(5);
	$pdf->Cell(4);
	$pdf->Cell(104,5,'Concepto de gasto',1,0,'C');
	$pdf->Cell(48,5,'Fuente de financiamiento',1,0,'C');
	$pdf->Cell(35,5,'Monto',1,0,'C');
	//$pdf->Cell(20,5,'Porcentaje',1,0,'C');
	
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
			//$Porcentaje   	= 	$row_presup['Porcentaje'];
			$monto_unidad_total = $row_presup['monto_unidad_total'];
			//$porcentaje_total = $row_presup['porcentaje_total'];

			if($k==$i){
				$k=0;
				$pdf->AddPage();
				$y4=$pdf->GetY();
				$y_jony = $pdf->SetY($y4);
				$pdf->Ln(4);
				$pdf->Cell(4);
				//Presupuesto del costo total del Festival
				$pdf->Cell(187,5,'Financiamiento/Presupuesto de coinversión',1,0,'C');
				$pdf->Ln(5);
				$y4=$pdf->GetY();
				$y_jony = $pdf->SetY($y4);	
				$pdf->Cell(4);
				$pdf->Cell(104,'Concepto de gasto',1,0,'C');
				$pdf->Cell(48,5,'Fuente de financiamiento',1,0,'C');
				$pdf->Cell(35,5,'Monto',1,0,'C');
				//$pdf->Cell(20,5,'Porcentaje',1,0,'C');
				$pdf->Ln(5);
				$kk=1;				
			}
			if($kk!=0){
				$i=38;
			}
			//&&!empty($Porcentaje)
			if(!empty($Concepto_gasto)&&!empty($Fuente_finan)&&!empty($Monto_unidad)){
			//$campo_prueba = number_format($Monto_unidad, 2, '.', ',');
			$campo_prueba = $Monto_unidad;
			
			switch($Fuente_finan){
				case 1:
					$nomb_Fuente_finan = "Institucional Estatal";
				break;
				case 2:
					$nomb_Fuente_finan = "Institucional Municipal";
				break;
				/*case 3:
					$nomb_Fuente_finan = "Institucional Federal PROFEST";
				break;*/
				case 4:
					$nomb_Fuente_finan = 'Institucional Educación Superior';
				break;
				case 5:
					$nomb_Fuente_finan = 'Privada';
				break;
			}

	$y4=$pdf->GetY();
	$y_jony = $pdf->SetY($y4); // Inicio 
	$pdf->Cell(3.9);
	
	$consulta_cat_cg="SELECT * FROM catalogo_concepto_gastos where id_gasto='".$Concepto_gasto."';";
	$execonsulta_cat_cg=mysqli_query($con, $consulta_cat_cg);
	$row_cat_cg=mysqli_fetch_array($execonsulta_cat_cg);
			

			$Concepto_gasto	=  $row_cat_cg['concepto_gasto'];
			$Concepto_gasto  = str_replace("<br>", "\n", $Concepto_gasto);
			$Concepto_gasto  = str_replace("?", "-", $Concepto_gasto);

	$pdf->SetFont('Arial','',7);
	$pdf->Multicell(104,5,utf8_decode($Concepto_gasto),1,'L');

	$pdf->SetFont('Arial','',8);
	
	$y_jony = $pdf->SetY($y4); // Inicio  
	
	$pdf->Cell(108.1);
	$pdf->MultiCell(48,5,utf8_decode($nomb_Fuente_finan),1,'L');
	
	$y_jony = $pdf->SetY($y4); // Inicio 

	$pdf->Cell(156);
	$pdf->Multicell(35,5,'$'.$campo_prueba,1,'C');
	
	$y_jony = $pdf->SetY($y4); // Inicio  
	
	//$Porcentaje = number_format($Porcentaje, 2, '.', '');
	$pdf->Cell(171);
	//$pdf->Multicell(20,5,$Porcentaje.'%',0,'C');
	$k++;
	$pdf->Ln(5);
		}
		}
	$y5=$pdf->GetY();
	$y_jat3 = $pdf->SetY($y5+5); // Inicio
	$pdf->Cell(4);			
	$pdf->SetFont('Arial','B',9);			
	$pdf->Cell(152,5,utf8_decode('Total de coinversión'),1,0,'C');
	$pdf->Cell(35,5,'$'.number_format($monto_unidad_total, 2, '.', ','),1,0,'C');

	//$pdf->Cell(20,5,$porcentaje_total.'%',1,0,'C');
			
	
	$pdf->AddPage();

	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(4);
	$pdf->Cell(187,8,'r) Presupuesto PROFEST.',0,0,'C');
	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->Cell(90,10,utf8_decode('Proyección de uso del recurso solicitado al PROFEST:'),0,0,'L');	
	$pdf->Ln(8);
	$pdf->Cell(4);
	$pdf->Cell(187,5,utf8_decode('Presupuesto detallado del recurso solicitado a la secretaría de cultura'),1,0,'C');

	$pdf->Ln(5);
	$pdf->Cell(4);
	$pdf->Cell(15,4,'No.',1,0,'C');
	$pdf->Cell(110,4,'Concepto',1,0,'C');
	$pdf->Cell(62,4,'Monto total con impuestos incluidos',1,0,'C');
//r)	Presupuesto PROFEST.
	$query_user2="SELECT * FROM reque_v2_1_2 WHERE clave_usuario='".$cve_user."' order by consec;";                          
	$res_user2 = mysqli_query($con, $query_user2);
	$cuantos=mysqli_num_rows($res_user2);
	$h=0;
	$Concepto_gasto=0;
	while ($fila2=mysqli_fetch_array($res_user2, MYSQLI_ASSOC)){
		$h=$h+1;
		$id     = $fila2['consec'];
		$concepto = $fila2['concepto'];
		$monto_tot_imp_incluidos = $fila2['monto_tot_imp_incluidos'];
		$monto_tot_imp_incluidos1  =  number_format($monto_tot_imp_incluidos, 2, '.', '');

		$total_esp_mue_inmue1  =  $monto_tot_imp_incluidos + $total_esp_mue_inmue1;
		$total_esp_tra_1  =  number_format($total_esp_mue_inmue1, 2, '.', '');

	$pdf->Ln(4);
	$pdf->Cell(4);
	$pdf->Cell(15,4,$h,1,0,'L');
	$pdf->SetFont('Arial','',9);	
	$pdf->Cell(110,4,utf8_decode($concepto),1,0,'L');
	$pdf->Cell(62,4,'$'.$monto_tot_imp_incluidos1,1,0,'C');
	}
	$pdf->Ln(4);
	$pdf->Cell(4);
	$pdf->SetFont('Arial','B',9);	
	$pdf->Cell(125,4,utf8_decode('Total'),1,0,'R');
	$pdf->SetFont('Arial','',9);	
	$pdf->Cell(62,4,'$'.$total_esp_tra_1,1,0,'C');

?>