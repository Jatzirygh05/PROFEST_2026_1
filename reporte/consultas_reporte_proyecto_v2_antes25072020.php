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
 
mysql_select_db($database_automaa, $automaa);

$db = mysql_select_db( $database_automaa, $automaa ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

			$consulta_rep="SELECT * FROM usuarios where clave_usuario='".$cve_user."';";
			$exe_consulta=mysql_query($consulta_rep);
					
					while($row=mysql_fetch_array($exe_consulta)){
						$nombre_titular=utf8_decode($row['nombre_titular'].' '.$row["primer_apellido"].' '.$row["segundo_apellido"]);

			$consulta_p3="SELECT * FROM proyecto 
			WHERE clave_usuario='".$cve_user."';";
			$consulta3=mysql_query($consulta_p3);
			$registro3=mysql_fetch_array($consulta3);

			//inicio datos administrativo
  			$nombre3_adm			=	utf8_decode($registro3['responsable_adm_nombre']." ".$registro3['primer_apellido_adm']);
  			$segundo_apellido_adm	=	utf8_decode($registro3['segundo_apellido_adm']);
  			$cargo_adm				=	utf8_decode($registro3['cargo_adm']);
  			$lada_adm				=	$registro3['lada_adm'];
  			$telefono_fijo_adm		=	$registro3['telefono_fijo_adm'];
  			$extension_adm			=	$registro3['extension_adm'];
  			$telefono_movil_adm		=	$registro3['telefono_movil_adm'];
  			$correo_electronico_adm	=	$registro3['correo_electronico_adm'];
  			//fin datos administrativos

            //inicio datos operativo    
			$nombre3_op				=	utf8_decode($registro3['responsable_op_nombre']." ".$registro3['primer_apellido_op']);
			$segundo_apellido_op	=	utf8_decode($registro3['segundo_apellido_op']);
			$cargo_op				=	utf8_decode($registro3['cargo_op']);
			$lada_op				=	$registro3['lada_op'];
			$telefono_fijo_op		=	$registro3['telefono_fijo_op'];
			$extension_op			=	$registro3['extension_op'];
 			$telefono_movil_op		=	$registro3['telefono_movil_op'];
  			$Correo_electronico_op	=	$registro3['Correo_electronico_op'];
  			//fin datos operativo

  			//desarrollo del proyecto
			
			$var_antecedente 			= $registro3['desarrollo_proyecto_antecedente'];
			$var_proyecto_diagnostico 	=  $registro3['desarrollo_proyecto_diagnostico'];
			
			if($navegador=="Google Chrome"){
				$var_1 = utf8_decode(str_replace("<br>", "\n", $var_antecedente));
				$desarrollo_proyecto_antecedente = str_replace('?', "'", $var_1);
				
				$var_7 = utf8_decode(str_replace("<br>", "\n", $var_proyecto_diagnostico));
				$desarrollo_proyecto_diagnostico = str_replace('?', "'", $var_7);
				
			} 
			
			if($navegador=="Mozilla Firefox"){
				$var3 	= mysql_real_escape_string($var_antecedente);
				$var4 = utf8_decode(str_replace("<br>", "\n", $var3));
				$desarrollo_proyecto_antecedente = $var4;
				$desarrollo_proyecto_antecedente = str_replace('?', "'", $desarrollo_proyecto_antecedente);
				
				
				$var8 	= mysql_real_escape_string($var_proyecto_diagnostico);
				$var9 = utf8_decode(str_replace("<br>", "\n", $var8));
				$desarrollo_proyecto_diagnostico = $var9;
				$desarrollo_proyecto_diagnostico = str_replace('?', "'", $desarrollo_proyecto_diagnostico);
				
			}
				
			if($navegador=="Internet explorer"){
					$var2 = utf8_decode(str_replace("<br>", "\n", $var_antecedente));
					$desarrollo_proyecto_antecedente = str_replace('?', "'", $var2);
					
					$var10 = utf8_decode(str_replace("<br>", "\n", $var_proyecto_diagnostico));
					$desarrollo_proyecto_diagnostico = str_replace('?', "'", $var10);
			}
			
			if($navegador=="Opera"){
						$var5 	= str_replace("<br>", "\n", $var_antecedente);
						$var6 = utf8_decode($var5);
						$desarrollo_proyecto_antecedente = str_replace('?', "'", $var6);
						
						$var11 	= str_replace("<br>", "\n", $var_proyecto_diagnostico);
						$var12 = utf8_decode($var11);
						$desarrollo_proyecto_diagnostico = str_replace('?', "'", $var12);
			}
			
			if($navegador=="Safari"){
						$desarrollo_proyecto_antecedente  	= utf8_decode(str_replace("<br>", "\n", $var_antecedente));
						$desarrollo_proyecto_antecedente 	= str_replace('?', "'", $desarrollo_proyecto_antecedente);
						
						//$desarrollo_proyecto_diagnostico	=  $var_proyecto_diagnostico;
						$var8 	= mysql_real_escape_string($var_proyecto_diagnostico);
						$desarrollo_proyecto_diagnostico = utf8_decode(str_replace("<br>", "\n", $var8));
						
						$desarrollo_proyecto_justificacion	=  $registro3['desarrollo_proyecto_justificacion'];
						$desarrollo_proyecto_justificacion  	= str_replace("<br>", "\n", $desarrollo_proyecto_justificacion);
			}
			
			
  			$desarrollo_proyecto_justificacion	=  utf8_decode($registro3['desarrollo_proyecto_justificacion']);
			$desarrollo_proyecto_justificacion  = str_replace("<br>", "\n", $desarrollo_proyecto_justificacion);
			$desarrollo_proyecto_justificacion  = str_replace("?", "-", $desarrollo_proyecto_justificacion);
			
  			$desarrollo_proyecto_descripcion 	=  utf8_decode($registro3['desarrollo_proyecto_descripcion']);
			$desarrollo_proyecto_descripcion  	= str_replace("<br>", "\n", $desarrollo_proyecto_descripcion);
			$desarrollo_proyecto_descripcion  = str_replace("?", "-", $desarrollo_proyecto_descripcion);
			
  			$desarrollo_proyecto_objetivos_especificos 	=  utf8_decode($registro3['desarrollo_proyecto_objetivos_especificos']);
			$desarrollo_proyecto_objetivos_especificos  = str_replace("<br>", "\n", $desarrollo_proyecto_objetivos_especificos);
			$desarrollo_proyecto_objetivos_especificos  = str_replace("?", "-", $desarrollo_proyecto_objetivos_especificos);
			
  			$desarrollo_proyecto_meta_cuantitativa 		=  utf8_decode($registro3['desarrollo_proyecto_meta_cuantitativa']);
			$desarrollo_proyecto_meta_cuantitativa  = str_replace("<br>", "\n", $desarrollo_proyecto_meta_cuantitativa);
			
  			$desarrollo_proyecto_descripcion_impacto 	=  utf8_decode($registro3['desarrollo_proyecto_descripcion_impacto']);
			$desarrollo_proyecto_descripcion_impacto  = str_replace("<br>", "\n", $desarrollo_proyecto_descripcion_impacto);
			$desarrollo_proyecto_descripcion_impacto  = str_replace("?", "-", $desarrollo_proyecto_descripcion_impacto);



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

  			$organigrama_nombre1  =  utf8_decode($registro3['organigrama_nombre1']);
  			$organigrama_cargo1   =  utf8_decode($registro3['organigrama_cargo1']);
  			$organigrama_funciones1   =  utf8_decode($registro3['organigrama_funciones1']);

  			$organigrama_nombre2  = utf8_decode($registro3['organigrama_nombre2']);
  			$organigrama_cargo2  =  utf8_decode($registro3['organigrama_cargo2']);
  			$organigrama_funciones2   =  utf8_decode($registro3['organigrama_funciones2']);

  			$organigrama_nombre3  =  utf8_decode($registro3['organigrama_nombre3']);
  			$organigrama_cargo3   =  utf8_decode($registro3['organigrama_cargo3']);
  			$organigrama_funciones3   =  utf8_decode($registro3['organigrama_funciones3']);

  			$organigrama_nombre4  =  utf8_decode($registro3['organigrama_nombre4']);
  			$organigrama_cargo4   =  utf8_decode($registro3['organigrama_cargo4']);
  			$organigrama_funciones4   =  utf8_decode($registro3['organigrama_funciones4']);

  			$organigrama_nombre5  =  utf8_decode($registro3['organigrama_nombre5']);
  			$organigrama_cargo5   =  utf8_decode($registro3['organigrama_cargo5']);
  			$organigrama_funciones5   =  utf8_decode($registro3['organigrama_funciones5']);

  			$organigrama_nombre6  =  utf8_decode($registro3['organigrama_nombre6']);
  			$organigrama_cargo6   =  utf8_decode($registro3['organigrama_cargo6']);
  			$organigrama_funciones6   =  utf8_decode($registro3['organigrama_funciones6']);

  			$organigrama_nombre7  =  utf8_decode($registro3['organigrama_nombre7']);
  			$organigrama_cargo7   =  utf8_decode($registro3['organigrama_cargo7']);
  			$organigrama_funciones7   =  utf8_decode($registro3['organigrama_funciones7']);

  			$organigrama_nombre8  =  utf8_decode($registro3['organigrama_nombre8']);
  			$organigrama_cargo8   =  utf8_decode($registro3['organigrama_cargo8']);
  			$organigrama_funciones8   =  utf8_decode($registro3['organigrama_funciones8']);

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

        
        $Nombreforo_a     = $registro3['Nombreforo_a'];
		$Nombreforo_a  = str_replace("?", '"', $Nombreforo_a);
		$cpforo_a = $registro3['cpforo_a'];
        $estadoforo_a  = $registro3['estadoforo_a'];
		$estadoforo_a  = str_replace("?", "-", $estadoforo_a);
    	$mun_alcforo_a  = $registro3['mun_alcforo_a'];
		$mun_alcforo_a  = str_replace("?", "-", $mun_alcforo_a);
		$coloniaforo_a  = $registro3['coloniaforo_a'];
		$coloniaforo_a  = str_replace("?", "-", $coloniaforo_a);
		$calleforo_a  = $registro3['calleforo_a'];
		$calleforo_a  = str_replace("?", "-", $calleforo_a);
		$no_extforo_a = $registro3['no_extforo_a'];
		$no_intforo_a = $registro3['no_intforo_a'];
        $Descripcionlug_a = $registro3['Descripcionlug_a'];
        $Descripcionlug_a  = str_replace("?", '"', $Descripcionlug_a);
		
		$Nombreforo_b     = $registro3['Nombreforo_b'];
		$Nombreforo_b  = str_replace("?", '"', $Nombreforo_b);
		$cpforo_b = $registro3['cpforo_b'];
        $estadoforo_b  = $registro3['estadoforo_b'];
		$estadoforo_b  = str_replace("?", "-", $estadoforo_b);
    	$mun_alcforo_b  = $registro3['mun_alcforo_b'];
		$mun_alcforo_b  = str_replace("?", "-", $mun_alcforo_b);
		$coloniaforo_b  = $registro3['coloniaforo_b'];
		$coloniaforo_b  = str_replace("?", "-", $coloniaforo_b);
		$calleforo_b = $registro3['calleforo_b'];
		$calleforo_b  = str_replace("?", "-", $calleforo_b);
		$no_extforo_b = $registro3['no_extforo_b'];
		$no_intforo_b = $registro3['no_intforo_b'];
        $Descripcionlug_b = $registro3['Descripcionlug_b'];
        $Descripcionlug_b  = str_replace("?", '"', $Descripcionlug_b);

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
        $crono_acciones_a           = utf8_decode($registro3['crono_acciones_a']);
		
        $crono_fechaacciones_b      = $registro3['crono_fechaacciones_b'];
        $crono_fechaacciones_fin_b  = $registro3['crono_fechaacciones_fin_b'];
        $crono_acciones_b           = utf8_decode($registro3['crono_acciones_b']);
		
        $crono_fechaacciones_c      = $registro3['crono_fechaacciones_c'];
        $crono_fechaacciones_fin_c  = $registro3['crono_fechaacciones_fin_c'];
        $crono_acciones_c           = utf8_decode($registro3['crono_acciones_c']);


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

        $estrategias_medios_otros_nombre    = utf8_decode($registro3['estrategias_medios_otros_nombre']);
		$estrategias_medios_otros_nombre  = str_replace("<br>", "\n", $estrategias_medios_otros_nombre);
		$estrategias_medios_otros_nombre  = str_replace("?", "-", $estrategias_medios_otros_nombre);

		
       
        $estrategias_acciones_dar_conocer   = utf8_decode($registro3['estrategias_acciones_dar_conocer']);
		$estrategias_acciones_dar_conocer  = str_replace("<br>", "\n", $estrategias_acciones_dar_conocer);
		$estrategias_acciones_dar_conocer  = str_replace("?", "-", $estrategias_acciones_dar_conocer);


        $descripcion_mecanismos_evaluacion  = utf8_decode($registro3['descripcion_mecanismos_evaluacion']);
		$descripcion_mecanismos_evaluacion  = str_replace("<br>", "\n", $descripcion_mecanismos_evaluacion);
		$descripcion_mecanismos_evaluacion  = str_replace("?", "-", $descripcion_mecanismos_evaluacion);


      
  			//Que acciones se llevan a cabo para dar a conocer el festival 

			
			//INICIO consulta tabla solicitud 2. Características generales del festival
  		    $consulta_p4="SELECT * FROM solicitud 
			WHERE clave_usuario='".$cve_user."';";
			$consulta4=mysql_query($consulta_p4);

			$registro4=mysql_fetch_array($consulta4);

			
  			$nombre_festival		=	utf8_decode($registro4['nombre_festival']);
  			$numero_ediciones_previas= $registro4['numero_ediciones_previas'];
  			$disciplina				=	$registro4['disciplina'];
  			
  			$objetivo_general  =	utf8_decode($registro4['objetivo_general']);
			$objetivo_general  = str_replace("<br>", "\n", $objetivo_general);
			$objetivo_general  = str_replace("?", "-", $objetivo_general);


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