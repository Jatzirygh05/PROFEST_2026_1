<?php

$user_agent = $_SERVER['HTTP_USER_AGENT'];

function getBrowser($user_agent){

if(strpos($user_agent, 'MSIE') !== FALSE)
   return 'Internet explorer';
 elseif(strpos($user_agent, 'Edge') !== FALSE) //Microsoft Edge
   return 'Microsoft Edge';
 elseif(strpos($user_agent, 'Trident') !== FALSE) //IE 11
    return 'Internet explorer';
 elseif(strpos($user_agent, 'Opera Mini') !== FALSE)
   return "Opera Mini";
 elseif(strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR') !== FALSE)
   return "Opera";
 elseif(strpos($user_agent, 'Firefox') !== FALSE)
   return 'Mozilla Firefox';
 elseif(strpos($user_agent, 'Chrome') !== FALSE)
   return 'Google Chrome';
 elseif(strpos($user_agent, 'Safari') !== FALSE)
   return "Safari";
 else
   return 'No hemos podido detectar su navegador';
}
$navegador = getBrowser($user_agent);

			$consulta_rep="SELECT * FROM usuarios where clave_usuario='".$cve_user."';";
			$exe_consulta=mysqli_query($con, $consulta_rep);
					
					while($row=mysqli_fetch_array($exe_consulta, MYSQLI_ASSOC)){
						$nombre_titular=$row['nombre_titular'].' '.$row["primer_apellido"].' '.$row["segundo_apellido"];
						$grado_academico = $row['grado_academico'];
						$nombre_grado_academico = $row['grado_academico'];

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

			$consulta_p3="SELECT * FROM proyecto 
			WHERE clave_usuario='".$cve_user."';";
			$consulta3=mysqli_query($con, $consulta_p3);
			$registro3=mysqli_fetch_array($consulta3);

			//inicio datos administrativo
  			$nombre3_adm			=	$registro3['responsable_adm_nombre']." ".$registro3['primer_apellido_adm'];
  			$segundo_apellido_adm	=	$registro3['segundo_apellido_adm'];
  			$cargo_adm				=	$registro3['cargo_adm'];
  			$lada_adm				=	$registro3['lada_adm'];
  			$telefono_fijo_adm		=	$registro3['telefono_fijo_adm'];
  			$extension_adm			=	$registro3['extension_adm'];
  			$telefono_movil_adm		=	$registro3['telefono_movil_adm'];
  			$correo_electronico_adm	=	$registro3['correo_electronico_adm'];
  			//fin datos administrativos

            //inicio datos operativo    
			$nombre3_op				=	$registro3['responsable_op_nombre']." ".$registro3['primer_apellido_op'];
			$segundo_apellido_op	=	$registro3['segundo_apellido_op'];
			$cargo_op				=	$registro3['cargo_op'];
			$lada_op				=	$registro3['lada_op'];
			$telefono_fijo_op		=	$registro3['telefono_fijo_op'];
			$extension_op			=	$registro3['extension_op'];
 			$telefono_movil_op		=	$registro3['telefono_movil_op'];
  			$Correo_electronico_op	=	$registro3['Correo_electronico_op'];
  			//fin datos operativo

  			//desarrollo del proyecto
			
			$var_antecedente = $registro3['desarrollo_proyecto_antecedente'];
			//$var_proyecto_diagnostico 	=  $registro3['desarrollo_proyecto_diagnostico'];
			$num_publico_benefiaciado_ant = $registro3["num_publico_benefiaciado_ant"];
			$var_linea_curotorial = $registro3["descripcion_linea_curotorial"];
			$var_poblacion_audiencia = $registro3["descripcion_poblacion_audiencia"];

			 //2025 (inicio)
			 $var_proy_desc_pob_aud_pubobj_festival          = $registro3["proy_desc_pob_aud_pubobj_festival"];
			 $var_proy_noved_ed_2025                         = $registro3["proy_noved_ed_2025"];
			 $var_proy_esp_infra_foros                       = $registro3["proy_esp_infra_foros"];
			 $var_proy_vinc_org_obtrecursos                  = $registro3["proy_vinc_org_obtrecursos"];
			 $var_proy_fav_itinerancia                       = $registro3["proy_fav_itinerancia"];
			 $var_proy_acciones                              = $registro3["proy_acciones"];
			 $var_proy_info_adic                             = $registro3["proy_info_adic"];

			 //2025 (fin)

			
			if($navegador=="Google Chrome"){
				/*$var_1 = str_replace("<br>", "\n", $var_antecedente);
				$desarrollo_proyecto_antecedente = str_replace('?', "'", $var_1);
				
				$var_7 = str_replace("<br>", "\n", $var_proyecto_diagnostico);
				$desarrollo_proyecto_diagnostico = str_replace('?', "'", $var_7);*/
				$var_1 = str_replace("<br>", "\n", $var_antecedente);//sirvio para 2021
				$desarrollo_proyecto_antecedente = str_replace('?', "'", $var_1);
				
				/*$var_7 = utf8_decode(str_replace("<br>", "\n", $var_proyecto_diagnostico));
				$desarrollo_proyecto_diagnostico = str_replace('?', "'", $var_7);*/

				$var_8 = utf8_decode(str_replace("<br>", "\n", $var_linea_curotorial));
				$descripcion_linea_curotorial = str_replace('?', "'", $var_8);

				$var_8a = utf8_decode(str_replace("<br>", "\n", $var_poblacion_audiencia));
				$descripcion_poblacion_audiencia = str_replace('?', "'", $var_8);

				//2025(inicio)
				$var_1_2025 = utf8_decode(str_replace("<br>", "\n", $var_proy_desc_pob_aud_pubobj_festival));
				$proy_desc_pob_aud_pubobj_festival = str_replace('?', "'", $var_1_2025);
				$var_2_2025 = utf8_decode(str_replace("<br>", "\n", $var_proy_noved_ed_2025));
				$proy_noved_ed_2025 = str_replace('?', "'", $var_2_2025);
				$var_3_2025 = utf8_decode(str_replace("<br>", "\n", $var_proy_esp_infra_foros));
				$proy_esp_infra_foros = str_replace('?', "'", $var_3_2025);
				$var_4_2025 = utf8_decode(str_replace("<br>", "\n", $var_proy_vinc_org_obtrecursos));
				$proy_vinc_org_obtrecursos = str_replace('?', "'", $var_4_2025);
				$var_5_2025 = utf8_decode(str_replace("<br>", "\n", $var_proy_fav_itinerancia));
				$proy_fav_itinerancia = str_replace('?', "'", $var_5_2025);
				$var_6_2025 = utf8_decode(str_replace("<br>", "\n", $var_proy_acciones));
				$proy_acciones = str_replace('?', "'", $var_6_2025);
				$var_7_2025 = utf8_decode(str_replace("<br>", "\n", $var_proy_info_adic));
				$proy_info_adic = str_replace('?', "'", $var_7_2025);
				//2025(fin)
				
			} 
			
			if($navegador=="Mozilla Firefox"){
				$var3 = mysqli_real_escape_string($con, $var_antecedente);
				$var4 = str_replace("<br>", "\n", $var3);
				$desarrollo_proyecto_antecedente = $var4;
				$desarrollo_proyecto_antecedente = str_replace('?', "'", $desarrollo_proyecto_antecedente);
				$desarrollo_proyecto_antecedente = str_replace('’', "'", $desarrollo_proyecto_antecedente);
				
				
				/*$var8 = mysqli_real_escape_string($con, $var_proyecto_diagnostico);
				$var9 = str_replace("<br>", "\n", $var8);
				$desarrollo_proyecto_diagnostico = $var9;
				$desarrollo_proyecto_diagnostico = str_replace('?', "'", $desarrollo_proyecto_diagnostico);
				$desarrollo_proyecto_diagnostico = str_replace('’', "'", $desarrollo_proyecto_diagnostico);*/

				$var8_1 = mysqli_real_escape_string($con, $var_linea_curotorial);
				$var9_1 = str_replace("<br>", "\n", $var8_1);
				$descripcion_linea_curotorial = $var9_1;
				$descripcion_linea_curotorial = str_replace('?', "'", $descripcion_linea_curotorial);
				$descripcion_linea_curotorial = str_replace('’', "'", $descripcion_linea_curotorial);
				

				$var8_2 = mysqli_real_escape_string($con, $var_poblacion_audiencia);
				$var9_2 = str_replace("<br>", "\n", $var8_2);
				$descripcion_poblacion_audiencia = $var9_2;
				$descripcion_poblacion_audiencia = str_replace('?', "'", $descripcion_poblacion_audiencia);
				$descripcion_poblacion_audiencia = str_replace('’', "'", $descripcion_poblacion_audiencia);
				

				//2025(inicio)
				//$var_proy_desc_pob_aud_pubobj_festival          = $registro3["proy_desc_pob_aud_pubobj_festival"];
				$var1_2025 = mysqli_real_escape_string($con, $var_proy_desc_pob_aud_pubobj_festival);
				$var1a_2025 = str_replace("<br>", "\n", $var1_2025);
				$proy_desc_pob_aud_pubobj_festival = $var1a_2025;
				$proy_desc_pob_aud_pubobj_festival = str_replace('?', "'", $proy_desc_pob_aud_pubobj_festival);
				$proy_desc_pob_aud_pubobj_festival = str_replace('’', "'", $proy_desc_pob_aud_pubobj_festival);

				//$var_proy_noved_ed_2025                         = $registro3["proy_noved_ed_2025"];
				$var2_2025 = mysqli_real_escape_string($con, $var_proy_noved_ed_2025);
				$var1b_2025 = str_replace("<br>", "\n", $var2_2025);
				$proy_noved_ed_2025 = $var1b_2025;
				$proy_noved_ed_2025 = str_replace('?', "'", $proy_noved_ed_2025);
				$proy_noved_ed_2025 = str_replace('’', "'", $proy_noved_ed_2025);

				//$var_proy_esp_infra_foros                       = $registro3["proy_esp_infra_foros"];
				$var3_2025 = mysqli_real_escape_string($con, $var_proy_esp_infra_foros);
				$var1c_2025 = str_replace("<br>", "\n", $var3_2025);
				$proy_esp_infra_foros = $var1c_2025;
				$proy_esp_infra_foros = str_replace('?', "'", $proy_esp_infra_foros);
				$proy_esp_infra_foros = str_replace('’', "'", $proy_esp_infra_foros);

				//$var_proy_vinc_org_obtrecursos                  = $registro3["proy_vinc_org_obtrecursos"];
				$var4_2025 = mysqli_real_escape_string($con, $var_proy_vinc_org_obtrecursos);
				$var1d_2025 = str_replace("<br>", "\n", $var4_2025);
				$proy_vinc_org_obtrecursos = $var1d_2025;
				$proy_vinc_org_obtrecursos = str_replace('?', "'", $proy_vinc_org_obtrecursos);
				$proy_vinc_org_obtrecursos = str_replace('’', "'", $proy_vinc_org_obtrecursos);

				//$var_proy_fav_itinerancia                       = $registro3["proy_fav_itinerancia"];
				$var5_2025 = mysqli_real_escape_string($con, $var_proy_fav_itinerancia);
				$var1e_2025 = str_replace("<br>", "\n", $var5_2025);
				$proy_fav_itinerancia = $var1e_2025;
				$proy_fav_itinerancia = str_replace('?', "'", $proy_fav_itinerancia);
				$proy_fav_itinerancia = str_replace('’', "'", $proy_fav_itinerancia);

				//$var_proy_acciones                              = $registro3["proy_acciones"];
				$var6_2025 = mysqli_real_escape_string($con, $var_proy_acciones);
				$var1f_2025 = str_replace("<br>", "\n", $var6_2025);
				$proy_acciones = $var1f_2025;
				$proy_acciones = str_replace('?', "'", $proy_acciones);
				$proy_acciones = str_replace('’', "'", $proy_acciones);

				//$var_proy_info_adic                             = $registro3["proy_info_adic"];
				$var7_2025 = mysqli_real_escape_string($con, $var_proy_info_adic);
				
				$proy_info_adic = $var7_2025;
				$proy_info_adic = str_replace('?', "'", $proy_info_adic);
				$proy_info_adic = str_replace('’', "'", $proy_info_adic);
				//$proy_info_adic = utf8_decode(str_replace("<br>", "\n", $var_proy_info_adic));
		
				//2025(fin)
			}
				
			if($navegador=="Internet explorer"){
					$var2 = str_replace("<br>", "\n", $var_antecedente);
					$desarrollo_proyecto_antecedente = str_replace('?', "'", $var2);
					
					/*$var10 = str_replace("<br>", "\n", $var_proyecto_diagnostico);
					$desarrollo_proyecto_diagnostico = str_replace('?', "'", $var10);*/

					$var_8_1 = str_replace("<br>", "\n", $var_linea_curotorial);
					$descripcion_linea_curotorial = str_replace('?', "'", $var_8_1);

					$var_8_2 = str_replace("<br>", "\n", $var_poblacion_audiencia);
					$descripcion_poblacion_audiencia = str_replace('?', "'", $var_8_2);

					//2025(inicio)
					$var_1_2025 = str_replace("<br>", "\n", $var_proy_desc_pob_aud_pubobj_festival);
					$proy_desc_pob_aud_pubobj_festival = str_replace('?', "'", $var_1_2025);

					$var_2_2025 = str_replace("<br>", "\n", $var_proy_noved_ed_2025);
					$proy_noved_ed_2025 = str_replace('?', "'", $var_2_2025);
					$var_3_2025 = str_replace("<br>", "\n", $var_proy_esp_infra_foros);
					$proy_esp_infra_foros = str_replace('?', "'", $var_3_2025);
					$var_4_2025 = str_replace("<br>", "\n", $var_proy_vinc_org_obtrecursos);
					$proy_vinc_org_obtrecursos = str_replace('?', "'", $var_4_2025);
					$var_5_2025 = str_replace("<br>", "\n", $var_proy_fav_itinerancia);
					$proy_fav_itinerancia = str_replace('?', "'", $var_5_2025);
					$var_6_2025 = str_replace("<br>", "\n", $var_proy_acciones);
					$proy_acciones = str_replace('?', "'", $var_6_2025);
				/*	$var_7_2025 = str_replace("<br>", "\n", $var_proy_info_adic);
					$proy_info_adic = str_replace('?', "'", $var_7_2025);*/
					
					//20225(fin)
			}
			
			if($navegador=="Opera"){
						$var5 	= str_replace("<br>", "\n", $var_antecedente);
						$var6 = $var5;
						$desarrollo_proyecto_antecedente = str_replace('?', "'", $var6);
						
						/*$var11 	= str_replace("<br>", "\n", $var_proyecto_diagnostico);
						$var12 = $var11;
						$desarrollo_proyecto_diagnostico = str_replace('?', "'", $var12);*/

						$var11_1	= str_replace("<br>", "\n", $var_linea_curotorial);
						$var12_1 = $var11_1;
						$descripcion_linea_curotorial = str_replace('?', "'", $var12_1);

						$var11_2	= str_replace("<br>", "\n", $var_poblacion_audiencia);
						$var12_2 = $var11_2;
						$descripcion_poblacion_audiencia = str_replace('?', "'", $var12_2);

						//2025(inicio)
					
						$var11_2025	= str_replace("<br>", "\n", $var_proy_desc_pob_aud_pubobj_festival);
						$var12_2025 = $var11_2025;
						$proy_desc_pob_aud_pubobj_festival = str_replace('?', "'", $var12_2025);

						$var13_2025	= str_replace("<br>", "\n", $var_proy_noved_ed_2025);
						$var14_2025 = $var13_2025;
						$proy_noved_ed_2025 = str_replace('?', "'", $var14_2025);

						$var15_2025	= str_replace("<br>", "\n", $var_proy_esp_infra_foros);
						$var16_2025 = $var15_2025;
						$proy_esp_infra_foros = str_replace('?', "'", $var16_2025);

						$var17_2025	= str_replace("<br>", "\n", $var_proy_vinc_org_obtrecursos);
						$var18_2025 = $var17_2025;
						$proy_vinc_org_obtrecursos = str_replace('?', "'", $var18_2025);

						$var19_2025	= str_replace("<br>", "\n", $var_proy_fav_itinerancia);
						$var20_2025 = $var19_2025;
						$proy_fav_itinerancia = str_replace('?', "'", $var20_2025);

						$var21_2025	= str_replace("<br>", "\n", $var_proy_acciones);
						$var22_2025 = $var21_2025;
						$proy_acciones = str_replace('?', "'", $var22_2025);

						$var23_2025	= str_replace("<br>", "\n", $var_proy_info_adic);
						$var24_2025 = $var23_2025;
						$proy_info_adic = str_replace('?', "'", $var24_2025);

						//2025(fin)
			}
			
			if($navegador=="Safari"){
						$desarrollo_proyecto_antecedente  	= str_replace("<br>", "\n", $var_antecedente);
						$desarrollo_proyecto_antecedente 	= str_replace('?', "'", $desarrollo_proyecto_antecedente);
						$desarrollo_proyecto_antecedente  = str_replace("’", "'", $desarrollo_proyecto_antecedente);
						
						/*$desarrollo_proyecto_diagnostico	=  $var_proyecto_diagnostico;
						$var8 = mysqli_real_escape_string($con, $var_proyecto_diagnostico);
						$desarrollo_proyecto_diagnostico = str_replace("<br>", "\n", $var8);*/
						
						$desarrollo_proyecto_justificacion	=  $registro3['desarrollo_proyecto_justificacion'];
						$desarrollo_proyecto_justificacion  	= str_replace("<br>", "\n", $desarrollo_proyecto_justificacion);

						$descripcion_linea_curotorial	=  $registro3['descripcion_linea_curotorial'];
						$descripcion_linea_curotorial  	= str_replace("<br>", "\n", $descripcion_linea_curotorial);

						$descripcion_poblacion_audiencia	=  $registro3['descripcion_poblacion_audiencia'];
						$descripcion_poblacion_audiencia  	= str_replace("<br>", "\n", $descripcion_poblacion_audiencia);

			//2025 (inicio)

			$proy_desc_pob_aud_pubobj_festival	=  $registro3['proy_desc_pob_aud_pubobj_festival'];
			$proy_desc_pob_aud_pubobj_festival  = str_replace("<br>", "\n", $proy_desc_pob_aud_pubobj_festival);
			$proy_noved_ed_2025	=  $registro3['proy_noved_ed_2025'];
			$proy_noved_ed_2025  = str_replace("<br>", "\n", $proy_noved_ed_2025);
			$proy_esp_infra_foros	=  $registro3['proy_esp_infra_foros'];
			$proy_esp_infra_foros  = str_replace("<br>", "\n", $proy_esp_infra_foros);
			$proy_vinc_org_obtrecursos	=  $registro3['proy_vinc_org_obtrecursos'];
			$proy_vinc_org_obtrecursos  = str_replace("<br>", "\n", $proy_vinc_org_obtrecursos);
			$proy_fav_itinerancia	=  $registro3['proy_fav_itinerancia'];
			$proy_fav_itinerancia  = str_replace("<br>", "\n", $proy_fav_itinerancia);
			$proy_acciones	=  $registro3['proy_acciones'];
			$proy_acciones  = str_replace("<br>", "\n", $proy_acciones);
			$proy_info_adic	=  $registro3['proy_info_adic'];
			$proy_info_adic  = str_replace("<br>", "\n", $proy_info_adic);

			//2025 (fin)
			}
			
			
  			$desarrollo_proyecto_justificacion	=  $registro3['desarrollo_proyecto_justificacion'];
			$desarrollo_proyecto_justificacion  = str_replace("<br>", "\n", $desarrollo_proyecto_justificacion);
			$desarrollo_proyecto_justificacion  = str_replace("?", "-", $desarrollo_proyecto_justificacion);
			$desarrollo_proyecto_justificacion = str_replace('’', "'", $desarrollo_proyecto_justificacion);
			
  			$desarrollo_proyecto_descripcion 	=  $registro3['desarrollo_proyecto_descripcion'];
			$desarrollo_proyecto_descripcion  	= str_replace("<br>", "\n", $desarrollo_proyecto_descripcion);
			$desarrollo_proyecto_descripcion  = str_replace("?", "-", $desarrollo_proyecto_descripcion);
			$desarrollo_proyecto_descripcion  = str_replace("’", "'", $desarrollo_proyecto_descripcion);
			
  			$desarrollo_proyecto_objetivos_especificos 	=  $registro3['desarrollo_proyecto_objetivos_especificos'];
			$desarrollo_proyecto_objetivos_especificos  = str_replace("<br>", "\n", $desarrollo_proyecto_objetivos_especificos);
			$desarrollo_proyecto_objetivos_especificos  = str_replace("?", "-", $desarrollo_proyecto_objetivos_especificos);
			$desarrollo_proyecto_objetivos_especificos  = str_replace("’", "'", $desarrollo_proyecto_objetivos_especificos);
			
  			$desarrollo_proyecto_meta_cuantitativa 		=  $registro3['desarrollo_proyecto_meta_cuantitativa'];
			$desarrollo_proyecto_meta_cuantitativa  = str_replace("<br>", "\n", $desarrollo_proyecto_meta_cuantitativa);
			
  			$desarrollo_proyecto_descripcion_impacto 	=  $registro3['desarrollo_proyecto_descripcion_impacto'];
			$desarrollo_proyecto_descripcion_impacto  = str_replace("<br>", "\n", $desarrollo_proyecto_descripcion_impacto);
			$desarrollo_proyecto_descripcion_impacto  = str_replace("?", "-", $desarrollo_proyecto_descripcion_impacto);
			$desarrollo_proyecto_descripcion_impacto  = str_replace("’", "'", $desarrollo_proyecto_descripcion_impacto);
			

			$descripcion_linea_curotorial	=  $registro3['descripcion_linea_curotorial'];
			$descripcion_linea_curotorial  = str_replace("<br>", "\n", $descripcion_linea_curotorial);
			$descripcion_linea_curotorial  = str_replace("?", "-", $descripcion_linea_curotorial);
			$descripcion_linea_curotorial = str_replace('’', "'", $descripcion_linea_curotorial);

			$descripcion_poblacion_audiencia  =  $registro3['descripcion_poblacion_audiencia'];
			$descripcion_poblacion_audiencia  = str_replace("<br>", "\n", $descripcion_poblacion_audiencia);
			$descripcion_poblacion_audiencia  = str_replace("?", "-", $descripcion_poblacion_audiencia);
			$descripcion_poblacion_audiencia = str_replace('’', "'", $descripcion_poblacion_audiencia);

			$acciones_festival_medio_ambiente =  $registro3['acciones_festival_medio_ambiente'];
			$acciones_festival_medio_ambiente  = str_replace("<br>", "\n", $acciones_festival_medio_ambiente);
			$acciones_festival_medio_ambiente  = str_replace("?", "-", $acciones_festival_medio_ambiente);
			$acciones_festival_medio_ambiente = str_replace('’', "'", $acciones_festival_medio_ambiente);

			 //2025 (inicio)
			 $proy_desc_pob_aud_pubobj_festival =  $registro3['proy_desc_pob_aud_pubobj_festival'];
			 $proy_desc_pob_aud_pubobj_festival  = str_replace("<br>", "\n", $proy_desc_pob_aud_pubobj_festival);
			 $proy_desc_pob_aud_pubobj_festival  = str_replace("?", "-", $proy_desc_pob_aud_pubobj_festival);
			 $proy_desc_pob_aud_pubobj_festival = str_replace('’', "'", $proy_desc_pob_aud_pubobj_festival);

			 $proy_noved_ed_2025 =  $registro3['proy_noved_ed_2025'];
			 $proy_noved_ed_2025  = str_replace("<br>", "\n", $proy_noved_ed_2025);
			 $proy_noved_ed_2025  = str_replace("?", "-", $proy_noved_ed_2025);
			 $proy_noved_ed_2025 = str_replace('’', "'", $proy_noved_ed_2025);

			 $proy_esp_infra_foros =  $registro3['proy_esp_infra_foros'];
			 $proy_esp_infra_foros  = str_replace("<br>", "\n", $proy_esp_infra_foros);
			 $proy_esp_infra_foros  = str_replace("?", "-", $proy_esp_infra_foros);
			 $proy_esp_infra_foros = str_replace('’', "'", $proy_esp_infra_foros);

			 $proy_vinc_org_obtrecursos =  $registro3['proy_vinc_org_obtrecursos'];
			 $proy_vinc_org_obtrecursos  = str_replace("<br>", "\n", $proy_vinc_org_obtrecursos);
			 $proy_vinc_org_obtrecursos  = str_replace("?", "-", $proy_vinc_org_obtrecursos);
			 $proy_vinc_org_obtrecursos = str_replace('’', "'", $proy_vinc_org_obtrecursos);

			 $proy_fav_itinerancia =  $registro3['proy_fav_itinerancia'];
			 $proy_fav_itinerancia  = str_replace("<br>", "\n", $proy_fav_itinerancia);
			 $proy_fav_itinerancia  = str_replace("?", "-", $proy_fav_itinerancia);
			 $proy_fav_itinerancia = str_replace('’', "'", $proy_fav_itinerancia);

			 $proy_acciones =  $registro3['proy_acciones'];
			 $proy_acciones  = str_replace("<br>", "\n", $proy_acciones);
			 $proy_acciones  = str_replace("?", "-", $proy_acciones);
			 $proy_acciones = str_replace('’', "'", $proy_acciones);

			 $proy_info_adic =  $registro3['proy_info_adic'];
			 $proy_info_adic  = str_replace("<br>", "\n", $proy_info_adic);
			// $proy_info_adic  = str_replace("?", "-", $proy_info_adic);
		 	$proy_info_adic = str_replace('’', "'", $proy_info_adic);
			 //2025 (fin)


  			//Población objetivos

  			$poblacion_genero_hombre=  $registro3['poblacion_genero_hombre'];
  			$poblacion_genero_mujer =  $registro3['poblacion_genero_mujer'];
  			$poblacion_edad_0_12    =  $registro3['poblacion_edad_0_12'];
  			$poblacion_edad_13_17   =  $registro3['poblacion_edad_13_17'];
  			$poblacion_edad_18_29   =  $registro3['poblacion_edad_18_29'];
  			$poblacion_edad_30_59   =  $registro3['poblacion_edad_30_59'];
  			$poblacion_edad_60 		=  $registro3['poblacion_edad_60'];
			
		  	$poblacion_nivel_sin_escolaridad      	= $registro3['poblacion_nivel_sin_escolaridad'];
			$poblacion_nivel_educ_basica 	        = $registro3['poblacion_nivel_educ_basica'];
			$poblacion_nivel_educ_media 	        = $registro3['poblacion_nivel_educ_media'];
			$poblacion_especific_reclusion 	     	= $registro3['poblacion_especific_reclusion'];
			$poblacion_nivel_educ_superior        	= $registro3['poblacion_nivel_educ_superior'];
			$poblacion_especific_migrantes        = $registro3['poblacion_especific_migrantes'];
			$poblacion_especific_indigenas        = $registro3['poblacion_especific_indigenas'];
			$poblacion_especific_con_discapacidad = $registro3['poblacion_especific_con_discapacidad'];
			$poblacion_especific_otros 			  = $registro3['poblacion_especific_otros'];
			$poblacion_especific_otro_nombre 	  = $registro3['poblacion_especific_otro_nombre'];
			$poblacion_especific_otro_cantidad 	  = $registro3['poblacion_especific_otro_cantidad'];

		
  	 		//Organigrama operativo

  			$organigrama_nombre1  =  $registro3['organigrama_nombre1'];
  			$organigrama_cargo1   =  $registro3['organigrama_cargo1'];
  			$organigrama_funciones1   =  $registro3['organigrama_funciones1'];

  			$organigrama_nombre2  = $registro3['organigrama_nombre2'];
  			$organigrama_cargo2  =  $registro3['organigrama_cargo2'];
  			$organigrama_funciones2   =  $registro3['organigrama_funciones2'];

  			$organigrama_nombre3  =  $registro3['organigrama_nombre3'];
  			$organigrama_cargo3   =  $registro3['organigrama_cargo3'];
  			$organigrama_funciones3   =  $registro3['organigrama_funciones3'];

  			$organigrama_nombre4  =  $registro3['organigrama_nombre4'];
  			$organigrama_cargo4   =  $registro3['organigrama_cargo4'];
  			$organigrama_funciones4   =  $registro3['organigrama_funciones4'];

  			$organigrama_nombre5  =  $registro3['organigrama_nombre5'];
  			$organigrama_cargo5   =  $registro3['organigrama_cargo5'];
  			$organigrama_funciones5   =  $registro3['organigrama_funciones5'];

  			$organigrama_nombre6  =  $registro3['organigrama_nombre6'];
  			$organigrama_cargo6   =  $registro3['organigrama_cargo6'];
  			$organigrama_funciones6   =  $registro3['organigrama_funciones6'];

  			$organigrama_nombre7  =  $registro3['organigrama_nombre7'];
  			$organigrama_cargo7   =  $registro3['organigrama_cargo7'];
  			$organigrama_funciones7   =  $registro3['organigrama_funciones7'];

  			$organigrama_nombre8  =  $registro3['organigrama_nombre8'];
  			$organigrama_cargo8   =  $registro3['organigrama_cargo8'];
  			$organigrama_funciones8   =  $registro3['organigrama_funciones8'];

			  $entidades_a1   = $registro3["entidades_a1"];
			  $entidades_a2   = $registro3["entidades_a2"];
			  $entidades_a3   = $registro3["entidades_a3"];
			  $entidades_a4   = $registro3["entidades_a4"];
			  $entidades_a5   = $registro3["entidades_a5"];
			  $entidades_a6   = $registro3["entidades_a6"];
			  $entidades_a7   = $registro3["entidades_a7"];
			  $entidades_a8   = $registro3["entidades_a8"];
			  $entidades_a9   = $registro3["entidades_a9"];
			  $entidades_a10  = $registro3["entidades_a10"];


       /* $Concepto_gasto_a   =  utf8_decode($registro3['Concepto_gasto_a']);
        $Concepto_gasto_b   =  utf8_decode($registro3['Concepto_gasto_b']);
        $Concepto_gasto_c   =  utf8_decode($registro3['Concepto_gasto_c']);

        $Fuente_finan_a   =  $registro3['Fuente_finan_a'];
        $Fuente_finan_b   =  $registro3['Fuente_finan_b'];
        $Fuente_finan_c   =  $registro3['Fuente_finan_c'];

        $Monto_unidad_a   =  $registro3['Monto_unidad_a'];
        $Monto_unidad_b   =  $registro3['Monto_unidad_b'];
        $Monto_unidad_c   =  $registro3['Monto_unidad_c'];

        $Porcentaje_a   =  $registro3['Porcentaje_a'];
        $Porcentaje_b   =  $registro3['Porcentaje_b'];
        $Porcentaje_c   =  $registro3['Porcentaje_c'];

        $Monto_unidad_a = number_format($Monto_unidad_a, 2, '.', ',');
        $Monto_unidad_b = number_format($Monto_unidad_b, 2, '.', ',');
        $Monto_unidad_c = number_format($Monto_unidad_c, 2, '.', ',');*/


//INICIO SEMBLANZAS OP , ADM, Y DATOS DE DIRECTOR

$sql_consulta_proy2 = "SELECT * FROM `proyecto_parte2` WHERE `clave_usuario` LIKE '".$cve_user."' "; 
$resultado_consulta_proy2 = mysqli_query($con, $sql_consulta_proy2);
$num_resultados_proyecto2 = mysqli_num_rows($resultado_consulta_proy2);
for ($k2=0; $k2 <$num_resultados_proyecto2; $k2++){
	$row_proy2 = mysqli_fetch_array($resultado_consulta_proy2, MYSQLI_ASSOC);
	
	$nombre_dir                         = $row_proy2["nombre_dir"];
	$primer_apellido_dir        = $row_proy2["primer_apellido_dir"];
	$segundo_apellido_dir   = $row_proy2["segundo_apellido_dir"];
	$cargo_dir                          = $row_proy2["cargo_dir"];
	$telefono_fijo_dir          = $row_proy2["telefono_fijo_dir"];
	$extension_dir                  = $row_proy2["extension_dir"];
	$telefono_movil_dir         = $row_proy2["telefono_movil_dir"];
	$Correo_electronico_dir = $row_proy2["Correo_electronico_dir"];

	$breve_semblanza_director = $row_proy2["breve_semblanza_director"];
	$breve_semblanza_director  = str_replace("<br>", "\n", $breve_semblanza_director);
	$breve_semblanza_director  = str_replace("?", " ", $breve_semblanza_director);
	$breve_semblanza_director  = str_replace("’", "'", $breve_semblanza_director);
	
	$breve_semblanza_op             = $row_proy2["breve_semblanza_op"];
	$breve_semblanza_op  = str_replace("’", "'", $breve_semblanza_op);

	$breve_semblanza_adm            = $row_proy2["breve_semblanza_adm"];
	$breve_semblanza_adm  = str_replace("’", "'", $breve_semblanza_adm);
}

//FIN SEMBALANZA OP, ADM, Y DATOS DE DIRECTOR






        $tipo_lugar_a = $registro3['tipo_lugar_a'];
        if($tipo_lugar_a==1){ $tipo_lugar_a="Foro"; 
    } else { $tipo_lugar_a= utf8_decode(str_replace("?", '"', "Medio de transmisión")); }

        $Nombreforo_a     = $registro3['Nombreforo_a'];
		//$Nombreforo_a  = str_replace("?", '"', $Nombreforo_a);
		$cpforo_a = $registro3['cpforo_a'];
        $estadoforo_a  = $registro3['estadoforo_a'];
		//$estadoforo_a  = str_replace("?", "-", $estadoforo_a);
    	$mun_alcforo_a  = $registro3['mun_alcforo_a'];
		//$mun_alcforo_a  = str_replace("?", "-", $mun_alcforo_a);
		$coloniaforo_a  = $registro3['coloniaforo_a'];
		//$coloniaforo_a  = str_replace("?", "-", $coloniaforo_a);
		$calleforo_a  = $registro3['calleforo_a'];
		//$calleforo_a  = str_replace("?", "-", $calleforo_a);
		$no_extforo_a = $registro3['no_extforo_a'];
		$no_intforo_a = $registro3['no_intforo_a'];
        $Descripcionlug_a = $registro3['Descripcionlug_a'];
        //$Descripcionlug_a  = str_replace("?", '"', $Descripcionlug_a);
		
        
		$tipo_lugar_b = $registro3['tipo_lugar_b'];
		if($tipo_lugar_b==1){ $tipo_lugar_b="Foro"; } else { $tipo_lugar_b= utf8_decode(str_replace("?", '"', "Medio de transmisión")); }
		$Nombreforo_b     = $registro3['Nombreforo_b'];
		//$Nombreforo_b  = str_replace("?", '"', $Nombreforo_b);
		$cpforo_b = $registro3['cpforo_b'];
        $estadoforo_b  = $registro3['estadoforo_b'];
		//$estadoforo_b  = str_replace("?", "-", $estadoforo_b);
    	$mun_alcforo_b  = $registro3['mun_alcforo_b'];
		//$mun_alcforo_b  = str_replace("?", "-", $mun_alcforo_b);
		$coloniaforo_b  = $registro3['coloniaforo_b'];
		//$coloniaforo_b  = str_replace("?", "-", $coloniaforo_b);
		$calleforo_b = $registro3['calleforo_b'];
		//$calleforo_b  = str_replace("?", "-", $calleforo_b);
		$no_extforo_b = $registro3['no_extforo_b'];
		$no_intforo_b = $registro3['no_intforo_b'];
        $Descripcionlug_b = $registro3['Descripcionlug_b'];
        //$Descripcionlug_b  = str_replace("?", '"', $Descripcionlug_b);

       
        $tipo_lugar_c = $registro3['tipo_lugar_c'];
        if($tipo_lugar_c==1){ $tipo_lugar_c="Foro"; } else { $tipo_lugar_c= utf8_decode(str_replace("?", '"', "Medio de transmisión")); }
        $Nombreforo_c     = $registro3['Nombreforo_c'];
		$Nombreforo_c  = str_replace("?", '"', $Nombreforo_c);
		$cpforo_c = $registro3['cpforo_c'];
        $estadoforo_c  = $registro3['estadoforo_c'];
		$estadoforo_c  = str_replace("?", "-", $estadoforo_c);
    	$mun_alcforo_c  = $registro3['mun_alcforo_c'];
		$mun_alcforo_c  = str_replace("?", "-", $mun_alcforo_c);
		$coloniaforo_c  = $registro3['coloniaforo_c'];
		$coloniaforo_c  = str_replace("?", "-", $coloniaforo_c);
		$calleforo_c = $registro3['calleforo_c'];
		$calleforo_c  = str_replace("?", "-", $calleforo_c);
		$no_extforo_c = $registro3['no_extforo_c'];
		$no_intforo_c = $registro3['no_intforo_c'];
        $Descripcionlug_c = $registro3['Descripcionlug_c'];
        $Descripcionlug_c  = str_replace("?", '"', $Descripcionlug_c);
		


        
        $crono_fechaacciones_a      = $registro3['crono_fechaacciones_a'];
        $crono_fechaacciones_fin_a  = $registro3['crono_fechaacciones_fin_a'];
 		$crono_acciones_a           = $registro3['crono_acciones_a'];
		$crono_acciones_a  	= str_replace("<br>", "\n", $crono_acciones_a);
		
        $crono_fechaacciones_b      = $registro3['crono_fechaacciones_b'];
        $crono_fechaacciones_fin_b  = $registro3['crono_fechaacciones_fin_b'];
        $crono_acciones_b           = $registro3['crono_acciones_b'];
		$crono_acciones_b  	= str_replace("<br>", "\n", $crono_acciones_b);
		
        $crono_fechaacciones_c      = $registro3['crono_fechaacciones_c'];
        $crono_fechaacciones_fin_c  = $registro3['crono_fechaacciones_fin_c'];
        
        $crono_acciones_c           = $registro3['crono_acciones_c'];
		$crono_acciones_c  	= str_replace("<br>", "\n", $crono_acciones_c);


  			//estrategias de difusion del festival
		$estrategias_medios_radio       = $registro3['estrategias_medios_radio'];
        if($estrategias_medios_radio==1) $estrategias_medios_radio ='X'; else $estrategias_medios_radio ='';

        $estrategias_medios_television  = $registro3['estrategias_medios_television'];
        if($estrategias_medios_television=='1') $estrategias_medios_television ='X'; else $estrategias_medios_television ='';

        $estrategias_medios_internet    = $registro3['estrategias_medios_internet'];
        if($estrategias_medios_internet=='1') $estrategias_medios_internet ='X'; else  $estrategias_medios_internet ='';

        $estrategias_medios_redes_sociales  = $registro3['estrategias_medios_redes_sociales'];
        if($estrategias_medios_redes_sociales=='1') $estrategias_medios_redes_sociales ='X'; else  $estrategias_medios_redes_sociales ='';

        $estrategias_medios_prensa          = $registro3['estrategias_medios_prensa'];
        if($estrategias_medios_prensa=='1') $estrategias_medios_prensa ='X'; else  $estrategias_medios_prensa ='';

      $estrategias_medios_folletos_posters = $registro3['estrategias_medios_folletos_posters'];
      if($estrategias_medios_folletos_posters=='1') $estrategias_medios_folletos_posters ='X'; else  $estrategias_medios_folletos_posters ='';

      $estrategias_medios_espectaculares    = $registro3['estrategias_medios_espectaculares'];
        if($estrategias_medios_espectaculares=='1') $estrategias_medios_espectaculares ='X'; else  $estrategias_medios_espectaculares ='';

        $estrategias_medios_perifoneo        = $registro3['estrategias_medios_perifoneo'];
        if($estrategias_medios_perifoneo=='1') $estrategias_medios_perifoneo ='X'; else  $estrategias_medios_perifoneo ='';
		
		$estrategias_medios_otros = $registro3['estrategias_medios_otros'];
        if($estrategias_medios_otros=='1') $estrategias_medios_otros ='X'; else  $estrategias_medios_otros ='';

        $estrategias_medios_otros_nombre    = $registro3['estrategias_medios_otros_nombre'];
		$estrategias_medios_otros_nombre  = str_replace("<br>", "\n", $estrategias_medios_otros_nombre);
		$estrategias_medios_otros_nombre  = str_replace("?", "-", $estrategias_medios_otros_nombre);

		
       
        $estrategias_acciones_dar_conocer   = $registro3['estrategias_acciones_dar_conocer'];
		$estrategias_acciones_dar_conocer  = str_replace("<br>", "\n", $estrategias_acciones_dar_conocer);
		$estrategias_acciones_dar_conocer  = str_replace("?", "-", $estrategias_acciones_dar_conocer);


        $descripcion_mecanismos_evaluacion  = $registro3['descripcion_mecanismos_evaluacion'];
		$descripcion_mecanismos_evaluacion  = str_replace("<br>", "\n", $descripcion_mecanismos_evaluacion);
		$descripcion_mecanismos_evaluacion  = str_replace("?", "-", $descripcion_mecanismos_evaluacion);



 		$desarrollo_proyecto_rebrote_covid   = $registro3['desarrollo_proyecto_rebrote_covid'];
		$desarrollo_proyecto_rebrote_covid  = str_replace("<br>", "\n", $desarrollo_proyecto_rebrote_covid);
		$desarrollo_proyecto_rebrote_covid  = str_replace("?", "-", $desarrollo_proyecto_rebrote_covid);

      
  			//Que acciones se llevan a cabo para dar a conocer el festival 

			
			//INICIO consulta tabla solicitud 2. Características generales del festival
  		    $consulta_p4="SELECT * FROM solicitud 
			WHERE clave_usuario='".$cve_user."';";
			$consulta4=mysqli_query($con, $consulta_p4);

			$registro4=mysqli_fetch_array($consulta4);

			
  			$nombre_festival		=	$registro4['nombre_festival'];
  			$numero_ediciones_previas= $registro4['numero_ediciones_previas'];
  			$disciplina_2022		=	$registro4['disciplina_2022'];
  			  			
  			$objetivo_general  = $registro4['objetivo_general'];
			$objetivo_general  = str_replace("<br>", "\n", $objetivo_general);
			$objetivo_general  = str_replace("?", "-", $objetivo_general);
			$objetivo_general  = str_replace("’", "'", $objetivo_general);


  			$pagina_web_festival	=	$registro4['pagina_web_festival'];
  			$facebook_festival		=	$registro4['facebook_festival'];
  			$twitter_festival		=	$registro4['twitter_festival'];

  			$meta_num_presentaciones=	$registro4['meta_num_presentaciones'];
  			$meta_num_publico		=	$registro4['meta_num_publico'];
  			$meta_num_municipio		=	$registro4['meta_num_municipio'];
  			$meta_num_foros			=	$registro4['meta_num_foros'];
  			$meta_num_artistas		=	$registro4['meta_num_artistas'];
  			$meta_cantidad_grupos	=	$registro4['meta_cantidad_grupos'];
			$meta_numero_grupos_ind_atender = $registro4['meta_numero_grupos_ind_atender'];
			$meta_num_actividades_academicas = $registro4['meta_num_actividades_academicas'];
			$meta_act_creadores_num_cine_mex = $registro4['meta_act_creadores_num_cine_mex'];

			$meta_num_presentaciones_alcanzada	=	$registro4['meta_num_presentaciones_alcanzada'];
			$meta_num_publico_alcanzada	=	$registro4['meta_num_publico_alcanzada'];
			$meta_num_municipio_alcanzada	=	$registro4['meta_num_municipio_alcanzada'];
			$meta_num_foros_alcanzada	=	$registro4['meta_num_foros_alcanzada'];
			$meta_num_artistas_alcanzada	=	$registro4['meta_num_artistas_alcanzada'];
			$meta_cantidad_grupos_alcanzada	=	$registro4['meta_cantidad_grupos_alcanzada'];
			$meta_num_actividades_academicas_alcanzada	=	$registro4['meta_num_actividades_academicas_alcanzada'];
			$meta_act_creadores_num_cine_mex_alcanzada	=	$registro4['meta_act_creadores_num_cine_mex_alcanzada'];
			$meta_otro_2025					=	$registro4['meta_otro_2025'];
			$meta_otro_alcanzada_2024		=	$registro4['meta_otro_alcanzada_2024'];

 			$alcance_programacion = $registro4['alcance_programacion'];

  			$periodo_realizacion_fecha_inicio	= $registro4['periodo_realizacion_fecha_inicio'];
  			$periodo_realizacion_fecha_termino	= $registro4['periodo_realizacion_fecha_termino'];

  			$Info_financiera_categoria	= $registro4['Info_financiera_categoria'];
  			$Infor_finan_costo_monto	= $registro4['Infor_finan_costo_monto'];
  			$Infor_finan_apoyo_monto	= $registro4['Infor_finan_apoyo_monto'];
  			$Infor_finan_apoyo_costo_total	= $registro4['Infor_finan_apoyo_costo_total'];

$Infor_finan_costo_monto = number_format($Infor_finan_costo_monto, 2, '.', ',');
$Infor_finan_apoyo_monto = number_format($Infor_finan_apoyo_monto, 2, '.', ',');
$Infor_finan_apoyo_costo_total = number_format($Infor_finan_apoyo_costo_total, 2, '.', ',');


			//FIN consulta tabla solicitud 
      }
?>