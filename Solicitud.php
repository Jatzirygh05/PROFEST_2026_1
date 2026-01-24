<?php 
  ob_start();
  error_reporting(E_ALL & ~E_NOTICE);
  ini_set('display_errors', 0);
  ini_set('log_errors', 1);
  
require_once('./Connections/conexion.php');

//initialize the session
if (!isset($_SESSION)) {
  session_start();
}
$cve_user = $_SESSION['MM_Username'];
//$cve_user = "jghernandez20*1709";

header('Content-Type: text/html; charset=ISO-8859-1');
// Include the main TCPDF library (search for installation path).
require_once('TCPDF-master/tcpdf.php');
$var = 1;
		//creo mi objeto pdf y le doy valores generales
		$pdf = new TCPDF('L', PDF_UNIT, 'LETTER', true, 'UTF-8', false);

		for($j = 0; $j < $var; $j++){
			if($j == 0){

		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Secretaría de Cultura');
		$pdf->SetTitle('Formato Solicitud');
		$pdf->SetFont('times', '', 10);
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->AddPage('P', 'LETTER');
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->Write(0, '', '', 0, 'P', true, 0, false, false, 0);
		
		//background
		// get the current page break margin
		$bMargin = $pdf->getBreakMargin();
		// get current auto-page-break mode
		$auto_page_break = $pdf->getAutoPageBreak();
		// disable auto-page-break
		$pdf->SetAutoPageBreak(false, 0);
		
		// Le paso la ruta de la imagen que se usará de fondo
		$img_file = 'formatos_para_descarga_general/conv2026/version2_hoja1_2026.jpg';
		//Parámetros para la calidad de la imagen
		//$pdf->Image($img_file, lado izquierdo, supeior, ancho, alto, '', '', '', false, 500, '', false, false, 0);
		
		$pdf->Image($img_file, 2, 3, 218, 280, '', '', '', false, 500, '', false, false, 0);
		
		// restore auto-page-break status
		$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
		// set the starting point for the page content
		$pdf->setPageMark();
		
        $consulta_rep="SELECT * FROM usuarios where clave_usuario='".$cve_user."';";
        $exe_consulta=mysqli_query($con, $consulta_rep);
		
		while($row=mysqli_fetch_array($exe_consulta, MYSQLI_ASSOC)){
				$cp=$row['cp'];
				$estado=$row['estado'];
				$municio_alcaldia=$row['municio_alcaldia'];
				$colonia=$row['colonia'];
				$nombre_titular = $row['nombre_titular'];
				$primer_apellido = $row['primer_apellido'];
				$segundo_apellido = $row['segundo_apellido'];
				$nombre_grado_academico = $row['grado_academico'];
				$nombre_instancia_postulante_imp = $row['nombre_instancia_postulante'];
				$CLUNI = $row['CLUNI'];
				$tipo_instancia=$row['tipo_instancia'];
				$Correo_tit=$row['Correo_tit'];
		// ******************************(INICIO)validar grado academico******************************
		if($grado_academico=="Doctor" || $grado_academico=="DOCTOR" || $grado_academico=="Dr."){
			$nombre_grado_academico = "Dr.";
		}
		if($grado_academico=="Dra." || $grado_academico=="Doctora" || $grado_academico=="DOCTORA"){
			$nombre_grado_academico = "Dra.";
		}
		if($grado_academico=="Maestro" || $grado_academico=="Profesor" || $grado_academico=="MAESTRO" || $grado_academico=="Mtro."){
			$nombre_grado_academico = "Mtro.";
		}
		if($grado_academico=="Maestra" || $grado_academico=="MAESTRA" || $grado_academico=="Mtra."){
			$nombre_grado_academico = "Mtra.";
		}
		if($grado_academico=="C.P." || $grado_academico=="lic" || $grado_academico=="Lic en Pedagogía" || 
		$grado_academico=="Licenciada" || $grado_academico=="Licenciada en Arquitectura" || $grado_academico=="Licenciado" || $grado_academico=="Licenciado en Economía"
		|| $grado_academico=="Licenciado en Informatica" || $grado_academico=="Licenciatura" || $grado_academico=="LICENCIATURA EN CIENCIAS DE LA EDUCACION" 
		|| $grado_academico=="LICENCIATURA EN DISEÑO PARA LA COMUNICACIÓN GRÁFICA" || $grado_academico=="Licenciaturas" || $grado_academico=="Lic en Pedagogía" 
		|| $grado_academico=="licenciado" || $grado_academico=="LICENCIADO" || $grado_academico=="LICENCIATURA" || $grado_academico=="Licenciatura" || $grado_academico=="C.P." || $grado_academico=="Lic."){
			$nombre_grado_academico = "Lic.";
		}
		if($grado_academico=="Ingeneniero" || $grado_academico=="INGENIERÍA" || $grado_academico=="Ingeniero" || 
		$grado_academico=="INGENIERO EN SISTEMAS" || $grado_academico=="INGENIERO INDUSTRIAL" || $grado_academico=="INGENIERIA" || $grado_academico=="Ing."){

			$nombre_grado_academico = "Ing.";
		}
		
		if($grado_academico=="Bachillerato" || $grado_academico=="CARRERA TECNICA" || $grado_academico=="Ciudadano" || $grado_academico=="ciudadano" ||
		$grado_academico=="MEDIO SUPERIOR" || $grado_academico=="Preparatoria" || $grado_academico=="Secundaria" || 
		$grado_academico=="Técnico" || $grado_academico=="Universitario" || $grado_academico=="Preparatoria" || $grado_academico=="EGRESADO" || $grado_academico=="C."){
			$nombre_grado_academico = "C.";
		}
		// ******************************(FIN)validar grado academico******************************	
		
		$cargo = $row['cargo'];
		$telefono_fijo = $row['telefono_fijo'];
		$lada = $row['lada'];
		$extension = $row['extension'];	
		
          $consulta_p2="SELECT cp, c_estado, d_estado, c_mnpio, D_mnpio, d_asenta FROM codigos_postales 
		  WHERE cp='$cp' and c_estado='$estado' and c_mnpio='$municio_alcaldia' and id_asenta_cpcons='$colonia';";
		  $consulta2=mysqli_query($con, $consulta_p2);

		  while($registro=mysqli_fetch_array($consulta2,MYSQLI_ASSOC)){
                $c_estado	=	$registro['c_estado'];
				$cp	=	$registro['cp'];
				$c_mnpio	=	$registro['c_mnpio'];
				$D_mnpio	=	$registro['D_mnpio'];
				$estado_imp =	$registro['d_estado'];
					
				if($cp=='85000' && $c_estado=='26' && $c_mnpio=='018' && $colonia=="0858"){	
					$d_asenta	= "Ciudad Obregón Centro (Fundo Legal)";
				} else {
					$d_asenta	=	$registro['d_asenta'];
				}	
		  }
			$consulta_p3="SELECT * FROM proyecto 
			WHERE clave_usuario='".$cve_user."';";
			$consulta3=mysqli_query($con, $consulta_p3);
			
			$registro3=mysqli_fetch_array($consulta3,MYSQLI_ASSOC);

			//inicio datos administrativo
  			$nombre3_adm	=	$registro3['responsable_adm_nombre']." ".$registro3['primer_apellido_adm']." ".$registro3['segundo_apellido_adm'];
  			$cargo_adm				=	$registro3['cargo_adm'];
  			$lada_adm				=	$registro3['lada_adm'];
  			$telefono_fijo_adm		=	$registro3['telefono_fijo_adm'];
  			$extension_adm			=	$registro3['extension_adm'];
  			$telefono_movil_adm		=	$registro3['telefono_movil_adm'];
  			$correo_electronico_adm	=	$registro3['correo_electronico_adm'];
  			//fin datos administrativos

            //inicio datos operativo    
			$nombre3_op	=	$registro3['responsable_op_nombre']." ".$registro3['primer_apellido_op']." ". $registro3['segundo_apellido_op'];
			
			$cargo_op	=	$registro3['cargo_op'];
			$lada_op	=	$registro3['lada_op'];
			$telefono_fijo_op	=	$registro3['telefono_fijo_op'];
			$extension_op			=	$registro3['extension_op'];
 			$telefono_movil_op		=	$registro3['telefono_movil_op'];
  			$Correo_electronico_op	=	$registro3['Correo_electronico_op'];
  			//fin datos operativo

			
		  	// INICIO LUGARES 'proyecto_entidades_municipios' 
           $sql_consulta_proy = "SELECT * FROM `proyecto_entidades_municipios` 
            WHERE `clave_usuario` LIKE '".$cve_user."' "; 
            $resultado_consulta_proya = mysqli_query($con, $sql_consulta_proy);
            $registro3 = mysqli_fetch_array($resultado_consulta_proya, MYSQLI_ASSOC);
                	$entidades_a1	=	$registro3['entidades_a1'];
					$entidades_a2	=	$registro3['entidades_a2'];
					$entidades_a3	=	$registro3['entidades_a3'];
					$entidades_a4	=	$registro3['entidades_a4'];
					$entidades_a5	=	$registro3['entidades_a5'];
					$entidades_a6	=	$registro3['entidades_a6'];
					$entidades_a7	=	$registro3['entidades_a7'];
					$entidades_a8	=	$registro3['entidades_a8'];
					$entidades_a9	=	$registro3['entidades_a9'];
					$entidades_a10	=	$registro3['entidades_a10'];
				
		  foreach($registro3 as $n=>$vv){
                  ${$n}=$vv;
                }

            
			
			 			
			//INICIO consulta tabla solicitud 2. Características generales del festival
  			$consulta_p4="SELECT * FROM solicitud 
			WHERE clave_usuario='".$cve_user."';";
			$consulta4=mysqli_query($con, $consulta_p4);

			$registro4=mysqli_fetch_array($consulta4,MYSQLI_ASSOC);
			$id_solicitud			= 	$registro4['id_solicitud'];
  			$nombre_festival		=	$registro4["nombre_festival"];
  			$numero_ediciones_previas	=	$registro4['numero_ediciones_previas'];
		/*$disciplina_musica_v2  		= $registro4["disciplina_musica_v2"];
  			$disciplina_gastronomia_v2  = $registro4["disciplina_gastronomia_v2"];
  			$disciplina_danza_v2 		= $registro4["disciplina_danza_v2"];
			$disciplina_teatro_v2 		= $registro4["disciplina_teatro_v2"];
			$disciplina_literatura_v2  = $registro4["disciplina_literatura_v2"];
			$disciplina_artes_visuales_v2  = $registro4["disciplina_artes_visuales_v2"];
			$disciplina_cinematografia_v3  = $registro4["disciplina_cinematografia_v3"];
			$disciplina_multidisciplina_v3  = $registro4["disciplina_multidisciplina_v3"];*/

  			$objetivo_general		=	$registro4['objetivo_general'];
  			$pagina_web_festival	=	$registro4['pagina_web_festival'];
  			$facebook_festival		=	$registro4['facebook_festival'];
  			$twitter_festival		=	$registro4['twitter_festival'];

  			$meta_num_presentaciones	=	$registro4['meta_num_presentaciones'];
  			$meta_num_publico			=	$registro4['meta_num_publico'];
  			$meta_num_municipio			=	$registro4['meta_num_municipio'];
  			$meta_num_foros				=	$registro4['meta_num_foros'];
  			$meta_num_artistas			=	$registro4['meta_num_artistas'];
  			$meta_cantidad_grupos		=	$registro4['meta_cantidad_grupos'];
			
			$meta_num_actividades_academicas = $registro4["meta_num_actividades_academicas"];
			$meta_numero_grupos_ind_atender = $registro4["meta_numero_grupos_ind_atender"];
			$meta_act_creadores_num_cine_mex = $registro4["meta_act_creadores_num_cine_mex"];

  			$alcance_programacion = $registro4['alcance_programacion'];

  			$periodo_realizacion_fecha_inicio	= $registro4['periodo_realizacion_fecha_inicio'];
  			$periodo_realizacion_fecha_termino	= $registro4['periodo_realizacion_fecha_termino'];

  			$Info_financiera_categoria	= $registro4['Info_financiera_categoria'];
  			$Infor_finan_costo_monto	= $registro4['Infor_finan_costo_monto'];
  			$Infor_finan_apoyo_monto	= $registro4['Infor_finan_apoyo_monto'];
  			$Infor_finan_apoyo_costo_total	= $registro4['Infor_finan_apoyo_costo_total'];
			
			$Infor_finan_costo_monto_imp = number_format($Infor_finan_costo_monto, 2, '.', ',');
			$Infor_finan_apoyo_monto_imp = number_format($Infor_finan_apoyo_monto_imp, 2, '.', ',');
			
			$fecha_hora_captura_concluida	= $registro4['fecha_hora_captura_concluida'];
			$disciplina_2022	= $registro4['disciplina_2022'];
			$monto_coinversion= $registro4['monto_coinversion'];
			//FIN consulta tabla solicitud 2. Características generales del festival

  		//fin datos administrativos  							
		$pdf->SetY(49.5);
		$pdf->SetX(161);
		$pdf->writeHTMLCell(0, 0, '', '',$id_solicitud, 0, 0, 0, true, 'L', false);	
			  
		$pdf->SetY(53.3);
		$pdf->SetX(161);
		$pdf->writeHTMLCell(36, 0, '', '',$fecha_hora_captura_concluida, 0, 0, 0, true, 'L', false);	
			  
		$pdf->SetY(75);
		$pdf->SetX(84);
		$pdf->writeHTMLCell(0, 0, '', '',$nombre_instancia_postulante_imp, 0, 0, 0, true, 'L', false);

		$pdf->SetY(88.3);
		$pdf->SetX(84);
		$pdf->writeHTMLCell(0, 0, '', '',$nombre_grado_academico.' '.$nombre_titular.' '.$primer_apellido.' '.$segundo_apellido, 0, 0, 0, true, 'L', false);
	
		$pdf->SetY(93);
		$pdf->SetX(84);
		$pdf->writeHTMLCell(0, 0, '', '',$cargo, 0, 0, 0, true, 'L', false);

		$pdf->SetY(98);
		$pdf->SetX(84);
		$pdf->writeHTMLCell(0, 0, '', '',$row['telefono_fijo'].'&nbsp;&nbsp; <strong>Extensión:</strong>&nbsp;'.$row['extension'], 0, 0, 0, true, 'L', false);
		
		$pdf->SetY(102);
		$pdf->SetX(84);
		$pdf->writeHTMLCell(0, 0, '', '',$row['Correo_tit'], 0, 0, 0, true, 'L', false);

		$pdf->SetY(106);
		$pdf->SetX(84);
		$pdf->writeHTMLCell(0, 0, '', '',"<strong>Código Postal</strong>&nbsp;&nbsp;&nbsp;".$cp."&nbsp;&nbsp;&nbsp;<strong>Estado</strong>&nbsp;&nbsp;&nbsp;".$estado_imp, 0, 0, 0, true, 'L', false);
		
		$pdf->SetY(110);
		$pdf->SetX(84);
		$pdf->writeHTMLCell(0, 0, '', '',"<strong>Municipio o Alcaldía</strong>&nbsp;&nbsp;&nbsp;".$D_mnpio, 0, 0, 0, true, 'L', false);
                
		$pdf->SetY(114);
		$pdf->SetX(84);
		$pdf->writeHTMLCell(0, 0, '', '',"<strong>Colonia</strong>&nbsp;&nbsp; ".$d_asenta, 0, 0, 0, true, 'L', false);
                
        $pdf->SetY(118);
		$pdf->SetX(84);
		$pdf->writeHTMLCell(0, 0, '', '',"<strong>Calle</strong>&nbsp;&nbsp;&nbsp;".$row['calle'], 0, 0, 0, true, 'L', false);
                
        $pdf->SetY(122);
		$pdf->SetX(84);
		$pdf->writeHTMLCell(0, 0, '', '',"<strong>No. exterior</strong>&nbsp;&nbsp;&nbsp;".$row['no_ext']."&nbsp;&nbsp;&nbsp;<strong>No. interior</strong>&nbsp;&nbsp;&nbsp;".$row['no_int'], 0, 0, 0, true, 'L', false);

		$pdf->SetY(127.5);
		$pdf->SetX(84);
		$pdf->writeHTMLCell(0, 0, '', '',$CLUNI, 0, 0, 0, true, 'L', false);
	
		$consulta_p3_sol="SELECT * FROM proyecto_parte2 
		WHERE clave_usuario='".$cve_user."';";
		$consulta_p3_sol2=mysqli_query($con, $consulta_p3_sol);
		
		$registro3_sol3=mysqli_fetch_array($consulta_p3_sol2,MYSQLI_ASSOC);

	  $nombre_dir			=	$registro3_sol3['nombre_dir'];
	  $primer_apellido_dir	=	$registro3_sol3['primer_apellido_dir'];
	  $segundo_apellido_dir	=	$registro3_sol3['segundo_apellido_dir'];
	  $telefono_fijo_dir	=	$registro3_sol3['telefono_fijo_dir'];
	  $extension_dir		=	$registro3_sol3['extension_dir'];
	  $telefono_movil_dir	=	$registro3_sol3['telefono_movil_dir'];
	  $Correo_electronico_dir=	$registro3_sol3['Correo_electronico_dir'];
	  
		$pdf->SetY(134);
		$pdf->SetX(84);
		$pdf->writeHTMLCell(0, 0, '', '',$nombre_dir.' '.$primer_apellido_dir.' '.$segundo_apellido_dir, 0, 0, 0, true, 'L', false);
		$pdf->SetY(141);
		$pdf->SetX(84);
		$pdf->writeHTMLCell(0, 0, '', '',$telefono_fijo_dir.'&nbsp;&nbsp;&nbsp;&nbsp;<strong>Teléfono móvil:</strong>&nbsp;&nbsp; '.$telefono_movil_dir.'&nbsp;&nbsp;&nbsp;&nbsp;<strong>Extensión:</strong>&nbsp;&nbsp;&nbsp;'.$extension_dir, 0, 0, 0, true, 'L', false);
		$pdf->SetY(146);
		$pdf->SetX(84);
		$pdf->writeHTMLCell(0, 0, '', '',$Correo_electronico_dir, 0, 0, 0, true, 'L', false);

		//INICIO DATOS TABLA PROYECTO

		//INICIO Datos Responsable administrativo 
		
		$pdf->SetY(154);
		$pdf->SetX(84);
		$pdf->writeHTMLCell(0, 0, '', '',$nombre3_adm, 0, 0, 0, true, 'L', false);
		
		/*$pdf->SetY(186.5);
		$pdf->SetX(88);
		$pdf->writeHTMLCell(0, 0, '', '',$cargo_adm, 0, 0, 0, true, 'L', false);*/

		$pdf->SetY(161);
		$pdf->SetX(84);
		$pdf->writeHTMLCell(0, 0, '', '',$telefono_fijo_adm.'&nbsp;&nbsp;<strong>Teléfono móvil:</strong>&nbsp;&nbsp; '.$telefono_movil_adm.'&nbsp;&nbsp;&nbsp;&nbsp;<strong>Extensión:</strong>&nbsp;&nbsp;&nbsp;'.$extension_adm, 0, 0, 0, true, 'L', false);
 
		$pdf->SetY(166);
		$pdf->SetX(84);
		$pdf->writeHTMLCell(0, 0, '', '',$correo_electronico_adm, 0, 0, 0, true, 'L', false);	

		//FIN Datos Responsable administrativo 

	 	//INICIO Datos Responsable operativa
		
		$pdf->SetY(172);
		$pdf->SetX(84);
		$pdf->writeHTMLCell(0, 0, '', '',$nombre3_op, 0, 0, 0, true, 'L', false);
		
		$pdf->SetY(180);
		$pdf->SetX(84);
		$pdf->writeHTMLCell(0, 0, '', '',$cargo_op, 0, 0, 0, true, 'L', false);

		$pdf->SetY(187);
		$pdf->SetX(84);	
		$pdf->writeHTMLCell(0, 0, '', '',$telefono_fijo_op.'&nbsp;&nbsp;&nbsp;&nbsp;<strong>Teléfono móvil:</strong>&nbsp;&nbsp;&nbsp; '.$telefono_movil_op.'&nbsp;&nbsp;&nbsp;<strong>Extensión:</strong>&nbsp;&nbsp;&nbsp;'.$extension_op, 0, 0, 0, true, 'L', false);

		$pdf->SetY(192.2);
		$pdf->SetX(84);
		$pdf->writeHTMLCell(0, 0, '', '',$Correo_electronico_op, 0, 0, 0, true, 'L', false);

		
		//FIN Datos Responsable operativa 

		//INICIO Características generales del festival
		$pdf->SetY(202);
		$pdf->SetX(84);
		$pdf->writeHTMLCell(0, 0, '', '',$nombre_festival, 0, 0, 0, true, 'L', false);

		
	
function imprmirentidades($var_ent, $con) {
		$cons_enti="SELECT * FROM entidades where id_entidad_proyecto=$var_ent;";
		$query_enti2=mysqli_query($con, $cons_enti);
		if (!$query_enti2) {
			die('Consulta no válida: ' . mysqli_error());
		}
		$cuantos_id=mysqli_num_rows($query_enti2);
		while($r_enti2=mysqli_fetch_array($query_enti2, MYSQLI_ASSOC)){
		$id_entidad_proyecto 			=	$r_enti2['id_entidad_proyecto'];
		$nombre_entidad_proyecto	=	$r_enti2['nombre_entidad_proyecto'];
		}
		return $nombre_entidad_proycto_imp = $nombre_entidad_proyecto;
	}

		$pdf->SetY(214);
		$pdf->SetX(84);
		$pdf->writeHTMLCell(0, 0, '', '','1: '.imprmirentidades($entidades_a1, $con).'&nbsp; Municipio(s): '.$municipio_a1_1.' '.$municipio_a1_2.' '.$municipio_a1_3.' '.$municipio_a1_4.' '.$municipio_a1_5.' '.$municipio_a1_6, 0, 0, 0, true, 'L', false);
		
		if($entidades_a2!=''){  
		$pdf->SetY(222);
		$pdf->SetX(84);
		$pdf->writeHTMLCell(0, 0, '', '','2: '.imprmirentidades($entidades_a2, $con).'&nbsp; Municipio(s): '.$municipio_a2_1.' '.$municipio_a2_2.' '.$municipio_a2_3.' '.$municipio_a2_4.' '.$municipio_a2_5.' '.$municipio_a2_6, 0, 0, 0, true, 'L', false);
		}
	
		if($entidades_a3!=''){  
		$pdf->SetY(230);
		$pdf->SetX(84);
		$pdf->writeHTMLCell(0, 0, '', '','3: '.imprmirentidades($entidades_a3, $con).'&nbsp; Municipio(s): '.$municipio_a3_1.' '.$municipio_a3_2.' '.$municipio_a3_3.' '.$municipio_a3_4.' '.$municipio_a3_5.' '.$municipio_a3_6, 0, 0, 0, true, 'L', false);
		}

		if($entidades_a4!=''){  
		$pdf->SetY(238);
		$pdf->SetX(84);
		$pdf->writeHTMLCell(0, 0, '', '','4: '.imprmirentidades($entidades_a4, $con).'&nbsp; Municipio(s): '.$municipio_a4_1.' '.$municipio_a4_2.' '.$municipio_a4_3.' '.$municipio_a4_4.' '.$municipio_a4_5.' '.$municipio_a4_6, 0, 0, 0, true, 'L', false);
		}
		if($entidades_a5!=''){  
		$pdf->SetY(245);
		$pdf->SetX(84);
		$pdf->writeHTMLCell(0, 0, '', '','5: '.imprmirentidades($entidades_a5, $con).'&nbsp; Municipio(s): '.$municipio_a5_1.' '.$municipio_a5_2.' '.$municipio_a5_3.' '.$municipio_a5_4.' '.$municipio_a5_5.' '.$municipio_a5_6, 0, 0, 0, true, 'L', false);
		}
		
		/*
		$pdf->SetY(209);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(95, 1, '', '',$objetivo_general, 0, 0, 0, true, 'L', false);
				*/
	}
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Secretaría de Cultura');
		$pdf->SetTitle('Formato Solicitud');
		$pdf->SetFont('times', '', 10);
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->AddPage('P', 'LETTER');
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->Write(0, '', '', 0, 'P', true, 0, false, false, 0);
		
		//background
		// get the current page break margin
		$bMargin = $pdf->getBreakMargin();
		// get current auto-page-break mode
		$auto_page_break = $pdf->getAutoPageBreak();
		// disable auto-page-break
		$pdf->SetAutoPageBreak(false, 0);
		
		// Le paso la ruta de la imagen que se usará de fondo
		$img_file = 'formatos_para_descarga_general/conv2026/version2_hoja2_2026.jpg';
		//Parámetros para la calidad de la imagen
		//$pdf->Image($img_file, lado izquierdo, supeior, ancho, alto, '', '', '', false, 500, '', false, false, 0);
		
		$pdf->Image($img_file, 2, 3, 218, 280, '', '', '', false, 500, '', false, false, 0);
			

		// restore auto-page-break status
		$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
		// set the starting point for the page content
		$pdf->setPageMark();

		if($entidades_a6!=''){  
		$pdf->SetY(28);
		$pdf->SetX(84);
		$pdf->writeHTMLCell(0, 0, '', '','6: '.imprmirentidades($entidades_a6, $con).'&nbsp; Municipio(s): '.$municipio_a6_1.' '.$municipio_a6_2.' '.$municipio_a6_3.' '.$municipio_a6_4.' '.$municipio_a6_5.' '.$municipio_a6_6, 0, 0, 0, true, 'L', false);
		}

		if($entidades_a7!=''){ 
		$pdf->SetY(37);
		$pdf->SetX(84);
		$pdf->writeHTMLCell(0, 0, '', '','7: '.imprmirentidades($entidades_a7, $con).'&nbsp; Municipio(s): '.$municipio_a7_1.' '.$municipio_a7_2.' '.$municipio_a7_3.' '.$municipio_a7_4.' '.$municipio_a7_5.' '.$municipio_a7_6, 0, 0, 0, true, 'L', false);
		}
		if($entidades_a8!=''){ 
		$pdf->SetY(47);
		$pdf->SetX(84);
		$pdf->writeHTMLCell(0, 0, '', '','8: '.imprmirentidades($entidades_a8, $con).'&nbsp; Municipio(s): '.$municipio_a8_1.' '.$municipio_a8_2.' '.$municipio_a8_3.' '.$municipio_a8_4.' '.$municipio_a8_5.' '.$municipio_a8_6, 0, 0, 0, true, 'L', false);
		}
		if($entidades_a9!=''){ 
		$pdf->SetY(57);
		$pdf->SetX(84);
		$pdf->writeHTMLCell(0, 0, '', '','9: '.imprmirentidades($entidades_a9, $con).'&nbsp; Municipio(s): '.$municipio_a9_1.' '.$municipio_a9_2.' '.$municipio_a9_3.' '.$municipio_a9_4.' '.$municipio_a9_5.' '.$municipio_a9_6, 0, 0, 0, true, 'L', false);
		}
		if($entidades_a10!=''){ 
		$pdf->SetY(67);
		$pdf->SetX(84);
		$pdf->writeHTMLCell(0, 0, '', '','10: '.imprmirentidades($entidades_a10, $con).'&nbsp; Municipio(s): '.$municipio_a10_1.' '.$municipio_a10_2.' '.$municipio_a10_3.' '.$municipio_a10_4.' '.$municipio_a10_5.' '.$municipio_a10_6, 0, 0, 0, true, 'L', false);
		}

		$pdf->SetY(76);
		$pdf->SetX(84);
		$pdf->writeHTMLCell(0, 0, '', '',$numero_ediciones_previas, 0, 0, 0, true, 'L', false);


		/*
	2026
		1. Música
		2. Danza
		3. Teatro
		4. Cine
		5. Multidisciplina
		6. Literatura
		7. Artes Visuales, Digitales y de Diseño
		8. Cultura alimentaria
		9. Arquitectura
		*/

		if($disciplina_2022=='1'){//Música
			$pdf->SetY(81);
			$pdf->SetX(102);
			$pdf->writeHTMLCell(0, 0, '', '','X', 0, 0, 0, true, 'L', false);
		}
		if($disciplina_2022=='2'){//Danza
			$pdf->SetY(81);
			$pdf->SetX(118);
			$pdf->writeHTMLCell(0, 0, '', '','X', 0, 0, 0, true, 'L', false);
		}
		if($disciplina_2022=='3'){//3. Teatro
			$pdf->SetY(81);
			$pdf->SetX(132.5);
			$pdf->writeHTMLCell(0, 0, '', '','X', 0, 0, 0, true, 'L', false);
		}		
		if($disciplina_2022=='4'){//4. Cine
			$pdf->SetY(81);
			$pdf->SetX(147);
			$pdf->writeHTMLCell(0, 0, '', '','X', 0, 0, 0, true, 'L', false);
		}
		if($disciplina_2022=='5'){//5. Multidisciplina
			$pdf->SetY(81);
			$pdf->SetX(158.3);
			$pdf->writeHTMLCell(0, 0, '', '','X', 0, 0, 0, true, 'L', false);
		}
		if($disciplina_2022=='6'){//6. Literatura
			$pdf->SetY(84.6);
			$pdf->SetX(89.5);
			$pdf->writeHTMLCell(0, 0, '', '','X', 0, 0, 0, true, 'L', false);
		}
		if($disciplina_2022=='7'){//7. Artes Visuales, Digitales y de Diseño
			$pdf->SetY(84.6);
			$pdf->SetX(108.7);
			$pdf->writeHTMLCell(0, 0, '', '','X', 0, 0, 0, true, 'L', false);
		}
		if($disciplina_2022=='8'){//8. Cultura alimentaria
			$pdf->SetY(84.6);
			$pdf->SetX(165.6);
			$pdf->writeHTMLCell(0, 0, '', '','X', 0, 0, 0, true, 'L', false);
		}
		if($disciplina_2022=='9'){//9. Arquitectura
			$pdf->SetY(88.2);
			$pdf->SetX(132);
			$pdf->writeHTMLCell(0, 0, '', '','X', 0, 0, 0, true, 'L', false);
		}

		$pdf->SetY(92.5);
		$pdf->SetX(172);
		$pdf->writeHTMLCell(0, 0, '', '',$periodo_realizacion_fecha_inicio, 0, 0, 0, true, 'L', false);

		$pdf->SetY(97.5);
		$pdf->SetX(172);
		$pdf->writeHTMLCell(0, 0, '', '',$periodo_realizacion_fecha_termino, 0, 0, 0, true, 'L', false);
	
		switch($Info_financiera_categoria){
			/**/
			case "A":
			$nombre_Info_financiera_categoria="a) $300,000.00";
			$monto_solo='$300,000.00';
			break;
			case "B":
			$nombre_Info_financiera_categoria="b) $500,000.00";
			$monto_solo='$500,000.00';
			break;
            case "C":
			$nombre_Info_financiera_categoria="c) $800,000.00";
			$monto_solo='$800,000.00';
			break;
			case "D":
			$nombre_Info_financiera_categoria="d) $1,000,000.00";
			$monto_solo='$1,000,000.00';
			break;
            case "E":
			$nombre_Info_financiera_categoria="e) $1,500,000.00.";
			$monto_solo='$1,500,000.00';
			break; 
			case "F":
			$nombre_Info_financiera_categoria="f) $2,000,000.00";
			$monto_solo='$2,000,000.00';        
		}
		
		$resto=$monto_coinversion*100;
		$resto_tot=$resto/$Infor_finan_costo_monto;

		$pdf->SetY(120);
		$pdf->SetX(85);
		$pdf->writeHTMLCell(0, 0, '', '',$nombre_Info_financiera_categoria, 0, 0, 0, true, 'L', false);

		/*$pdf->SetY(120);//Apoyo financiero solicitado a la Secretaría de Cultura - % COSTO TOTAL DEL PROYECTO
		$pdf->SetX(120);
		$pdf->writeHTMLCell(40, 0, '', '',$monto_solo, 0, 0, 0, true, 'C', false);*/

		$pdf->SetY(120);//Apoyo financiero solicitado a la Secretaría de Cultura - % COSTO TOTAL DEL PROYECTO
		$pdf->SetX(163);
		$pdf->writeHTMLCell(40, 0, '', '',number_format($Infor_finan_apoyo_costo_total,0,'','').'%', 0, 0, 0, true, 'C', false);

		$pdf->SetY(128);//Costo total de realización del Festival - MONTO
		$pdf->SetX(76.5);
		$pdf->writeHTMLCell(40, 0, '', '','$'.$Infor_finan_costo_monto_imp, 0, 0, 0, true, 'C', false);

		$pdf->SetY(135);
		$pdf->SetX(85);
		$pdf->writeHTMLCell(0, 0, '', '','$'.$monto_coinversion, 0, 0, 0, true, 'L', false);

		$pdf->SetY(135);
		$pdf->SetX(178);
		$pdf->writeHTMLCell(0, 0, '', '',$resto_tot.'%', 0, 0, 0, true, 'L', false);
		
		$pdf->SetY(238.5);
		$pdf->SetX(27);
		$pdf->writeHTMLCell(0, 0, '', '',$nombre_grado_academico.' '.$nombre_titular.' '.$primer_apellido.' '.$segundo_apellido, 0, 0, 0, true, 'C', false);
		$pdf->SetY(241.5);
		$pdf->SetX(28);
		$pdf->writeHTMLCell(0, 0, '', '',$cargo, 0, 0, 0, true, 'C', false);
	
	/*
		$pdf->SetY(25);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '','<strong>1. Número de actividades artísticas y/o culturales/ Número de títulos, cortometrajes, largometrajes, entre otros:</strong>&nbsp;&nbsp;&nbsp;&nbsp;'.$meta_num_presentaciones, 0, 0, 0, true, 'L', false);

		$pdf->SetY(32);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '','<strong>2. Total de público:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$meta_num_publico, 0, 0, 0, true, 'L', false);

		$pdf->SetY(36);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '','<strong>3. Número de municipios/alcaldias a beneficiar:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$meta_num_municipio, 0, 0, 0, true, 'L', false);
		
		$pdf->SetY(40);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '','<strong>4. Número de foros, sedes o medios de transmisión que se utilizarán:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$meta_num_foros, 0, 0, 0, true, 'L', false);

		$pdf->SetY(44);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '','<strong>5. Número total de participantes:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$meta_num_artistas, 0, 0, 0, true, 'L', false);

		$pdf->SetY(49);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '','<strong>6. Cantidad de grupos artísticos / Secciones o categorías de participación para &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;exhibición de películas, cortometrajes, entre otros:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$meta_cantidad_grupos, 0, 0, 0, true, 'L', false);

		$pdf->SetY(56);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '','<strong>7. Número de actividades académicas:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$meta_num_actividades_academicas, 0, 0, 0, true, 'L', false);

		$pdf->SetY(60);
		$pdf->SetX(106);
		$pdf->writeHTMLCell(0, 0, '', '','<strong>8. Número de actividades a cargo de participantes locales/ Número de títulos de cine mexicano:</strong>&nbsp;&nbsp;&nbsp;'.$meta_act_creadores_num_cine_mex, 0, 0, 0, true, 'L', false);

		
		$pdf->SetY(105.5);//Apoyo financiero solicitado a la Secretaría de Cultura - MONTO
		$pdf->SetX(112);
		$pdf->writeHTMLCell(40, 0, '', '','$'.$Infor_finan_apoyo_monto, 0, 0, 0, true, 'C', false);

			

		$pdf->SetFont('times', '', 9);
		$cad_compromisos1="<strong>1. Certifico que el festival postulado en esta convocatoria, no se encuentra gestionando o recibirá otros recursos del Programa de Apoyos a la Cultura S268.
		<br><br>
		2.	Nos comprometemos a salvaguardar la ley de derechos de autor vigente para todas las actividades artísticas y/o culturales a realizar en el marco del proyecto.
		<br><br>
		3.	Certifico que toda la información proporcionada a través de la Plataforma PROFEST, es verídica y útil para el llenado de los
formatos de Proyecto Cultural y Presupuesto y Programación, para su análisis y eventual evaluación de las Comisiones Dictaminadoras.
		<br><br>
		4. Si soy Institución Pública nos comprometemos a realizar la gestión correspondiente ante la Secretaría de Finanzas Estatal o su similar, para el envío de la documentación requerida por la Secretaría de Cultura, en caso de ser beneficiarios.
		<br><br>
	5. En caso de presentar programación a cargo de participantes extranjeros, nos comprometemos y responsabilizamos de llevar a cabo las gestiones correspondientes ante el Instituto Nacional de Migración para la internación de artistas y toda la demás normatividad aplicable.</strong>";
		
		///se borro 29012023 convocatoria 2022 $cad_compromisos2="<strong>1. Certifico que el festival postulado en esta convocatoria, no se encuentra gestionando o recibirá otros apoyos de origen federal.
		//<br><br>
		//2.	Nos comprometemos a salvaguardar la ley de derechos de autor vigente para todas las actividades artísticas y/o culturales a realizar en el marco del proyecto.
		//<br><br>
		//3.	Certifico que toda la información proporcionada a través de la Plataforma PROFEST, es verídica y útil para el llenado de los
//formatos de Proyecto Cultural y Presupuesto y Programación, para su análisis y eventual evaluación de las Comisiones Dictaminadoras..</strong>";
		
		//if($tipo_instancia==5) $cad_imp_compromisos2=$cad_compromisos2; else $cad_imp_compromisos2=$cad_compromisos1;

		$pdf->SetY(125);
		$pdf->SetX(15);
		$pdf->writeHTMLCell(175, 0, '', '',$cad_compromisos1, 0, 0, 0, true, 'L', false);
		
	*/
		//FIN Características generales del festival		
		//para terminar e mostrar el pdf completo:
	}
}

        //ver desde el navegador 
		$pdf->Output('Solicitud_PROFEST.pdf');
		//descargar el PDF
		//$pdf->Output('Solicitud_PROFEST.pdf', 'D');
?>