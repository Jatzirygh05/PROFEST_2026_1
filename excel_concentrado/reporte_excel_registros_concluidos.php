<?php
include 'lib/PHPExcel.php';
include 'lib/PHPExcel/Writer/Excel2007.php';
include ("../Connections/conexion.php");

$objPHPExcel = new PHPExcel();

$objPHPExcel->setActiveSheetIndex(0);

$objPHPExcel->getActiveSheet()->SetCellValue('A1','# PY.');
$objPHPExcel->getActiveSheet()->SetCellValue('B1','Estatus General');
$objPHPExcel->getActiveSheet()->SetCellValue('C1','Nombre del Festival');
$objPHPExcel->getActiveSheet()->SetCellValue('D1','Nombre legal de la Instancia');
$objPHPExcel->getActiveSheet()->SetCellValue('E1','Entidad');
$objPHPExcel->getActiveSheet()->SetCellValue('F1','Municipio');
$objPHPExcel->getActiveSheet()->SetCellValue('G1','Tipo de Instancia');
$objPHPExcel->getActiveSheet()->SetCellValue('H1','Proyecto Propio o Respaldado');
$objPHPExcel->getActiveSheet()->SetCellValue('I1','Tipo de beneficiario indirecto');
$objPHPExcel->getActiveSheet()->SetCellValue('J1','Grado académico del titular');
$objPHPExcel->getActiveSheet()->SetCellValue('K1','Nombre del titular');
$objPHPExcel->getActiveSheet()->SetCellValue('L1','Cargo del titular');
$objPHPExcel->getActiveSheet()->SetCellValue('M1','Teléfono titular');
$objPHPExcel->getActiveSheet()->SetCellValue('N1','Correo titular');
$objPHPExcel->getActiveSheet()->SetCellValue('O1','Calle');
$objPHPExcel->getActiveSheet()->SetCellValue('P1','Número');
$objPHPExcel->getActiveSheet()->SetCellValue('Q1','Colonia');
$objPHPExcel->getActiveSheet()->SetCellValue('R1','Código Postal');
$objPHPExcel->getActiveSheet()->SetCellValue('S1','Delegación o Municipio');
$objPHPExcel->getActiveSheet()->SetCellValue('T1','Entidad	Nombre del enlace administrativo');
$objPHPExcel->getActiveSheet()->SetCellValue('U1','Cargo del enlace administrativo');
$objPHPExcel->getActiveSheet()->SetCellValue('V1','Teléfono');
$objPHPExcel->getActiveSheet()->SetCellValue('W1','Correo');
$objPHPExcel->getActiveSheet()->SetCellValue('X1','Nombre del responsable operativo');
$objPHPExcel->getActiveSheet()->SetCellValue('Y1','Cargo del responsable operativo del Festival');
$objPHPExcel->getActiveSheet()->SetCellValue('Z1','Teléfono del responsable operativo');
$objPHPExcel->getActiveSheet()->SetCellValue('AA1','Correo del responsable operativo');
$objPHPExcel->getActiveSheet()->SetCellValue('AB1','Nombre del Organismo respaldado');
$objPHPExcel->getActiveSheet()->SetCellValue('AC1','CLUNI');
$objPHPExcel->getActiveSheet()->SetCellValue('AD1','Nombre del enlace con la OSC');
$objPHPExcel->getActiveSheet()->SetCellValue('AE1','Cargo del enlace con la OSC');
$objPHPExcel->getActiveSheet()->SetCellValue('AF1','Teléfono del enlace con la OSC');
$objPHPExcel->getActiveSheet()->SetCellValue('AG1','Correo del enlace con la OSC');
$objPHPExcel->getActiveSheet()->SetCellValue('AH1','Página Web');
$objPHPExcel->getActiveSheet()->SetCellValue('AI1','Facebook');
$objPHPExcel->getActiveSheet()->SetCellValue('AJ1','Twitter');
$objPHPExcel->getActiveSheet()->SetCellValue('AK1','RFC de la instancia');
$objPHPExcel->getActiveSheet()->SetCellValue('AL1','Fecha de constitución');
$objPHPExcel->getActiveSheet()->SetCellValue('AM1','Dirección fiscal y para envío de paquetería');
$objPHPExcel->getActiveSheet()->SetCellValue('AN1','Grado académico del titular');
$objPHPExcel->getActiveSheet()->SetCellValue('AO1','Cargo del Titular');
$objPHPExcel->getActiveSheet()->SetCellValue('AP1','Instancia para correspondencia');	

$i=1;

$sql = "SELECT * FROM usuarios order by clave_usuario;";
#Almacenamos los datos del sql query en la variable  $r
$r = mysqli_query($con,$sql);

 while( $arreg = mysqli_fetch_assoc($r))
				  {
					$clave_usuario  						= $arreg["clave_usuario"];
					
					
					id_solicitud
					nombre_festival	
					nombre_instancia_postulante	
					estado
					municio_alcaldia
					tipo_instancia
					grado_academico
					nombre_titular
					primer_apellido
					cargo
					lada
					correo_electronico
					calle
					no_ext
					colonia
					colonia_nombre
					cp
					responsable_adm_nombre
					cargo_adm
					lada_adm
					correo_electronico_adm
					responsable_op_nombre
					cargo_op
					lada_op
					Correo_electronico_op
					pagina_web_festival
					facebook_festival
					twitter_festival
					telefono_fijo
					primer_apellido_adm
					telefono_fijo_adm
					primer_apellido_op
					telefono_fijo_op
					segundo_apellido_adm
					extension_adm
					segundo_apellido_op	extension_op	telefono_movil_adm	telefono_movil_op
						
				  
$objPHPExcel->getActiveSheet()->SetCellValue("A$i","$clave_usuario");
$objPHPExcel->getActiveSheet()->SetCellValue("B$i","$nombre_instancia_postulante");
$objPHPExcel->getActiveSheet()->SetCellValue("C$i","$tipo_instancia");
$objPHPExcel->getActiveSheet()->SetCellValue("D$i","$grado_academico");
$objPHPExcel->getActiveSheet()->SetCellValue("E$i","$nombre_titular $primer_apellido $segundo_apellido");
$objPHPExcel->getActiveSheet()->SetCellValue("F$i","$cargo");
$objPHPExcel->getActiveSheet()->SetCellValue("G$i","$lada");
$objPHPExcel->getActiveSheet()->SetCellValue("H$i","$telefono_fijo");
$objPHPExcel->getActiveSheet()->SetCellValue("I$i","$extension");
$objPHPExcel->getActiveSheet()->SetCellValue("J$i","$correo_electronico");
$objPHPExcel->getActiveSheet()->SetCellValue("K$i","$cp");
$objPHPExcel->getActiveSheet()->SetCellValue("L$i","$c_estado-$estado_imp");
$objPHPExcel->getActiveSheet()->SetCellValue("M$i","$c_mnpio-$municio_alcaldia_imp");
$objPHPExcel->getActiveSheet()->SetCellValue("N$i","$colonia");
$objPHPExcel->getActiveSheet()->SetCellValue("O$i","$calle");
$objPHPExcel->getActiveSheet()->SetCellValue("P$i","$no_ext");
$objPHPExcel->getActiveSheet()->SetCellValue("Q$i","$no_int");
				  				  
	}//cierre while usuarios

$objPHPExcel->getActiveSheet()->setTitle('usuarios');

$objPHPExcel->createSheet();
$objPHPExcel->setActiveSheetIndex(1);
$objPHPExcel->getActiveSheet()->setTitle('solicitud');

$objPHPExcel->getActiveSheet()->SetCellValue('A1','Usuario');
$objPHPExcel->getActiveSheet()->SetCellValue('B1','id_solicitud');
$objPHPExcel->getActiveSheet()->SetCellValue('C1','nombre_festival');
$objPHPExcel->getActiveSheet()->SetCellValue('D1','numero_ediciones_previas');
$objPHPExcel->getActiveSheet()->SetCellValue('E1','disciplina_artes_escenicas');
$objPHPExcel->getActiveSheet()->SetCellValue('F1','disciplina_artes_plasticas');
$objPHPExcel->getActiveSheet()->SetCellValue('G1','disciplina_cinematografia');
$objPHPExcel->getActiveSheet()->SetCellValue('H1','disciplina_gastronomia');
$objPHPExcel->getActiveSheet()->SetCellValue('I1','disciplina_literatura');
$objPHPExcel->getActiveSheet()->SetCellValue('J1','objetivo_general');
$objPHPExcel->getActiveSheet()->SetCellValue('K1','pagina_web_festival');
$objPHPExcel->getActiveSheet()->SetCellValue('L1','facebook_festival');
$objPHPExcel->getActiveSheet()->SetCellValue('M1','twitter_festival');
$objPHPExcel->getActiveSheet()->SetCellValue('N1','meta_num_presentaciones');
$objPHPExcel->getActiveSheet()->SetCellValue('O1','meta_num_publico');
$objPHPExcel->getActiveSheet()->SetCellValue('P1','meta_num_municipio');
$objPHPExcel->getActiveSheet()->SetCellValue('Q1','meta_num_foros');
$objPHPExcel->getActiveSheet()->SetCellValue('R1','meta_num_artistas');
$objPHPExcel->getActiveSheet()->SetCellValue('S1','meta_cantidad_grupos');
$objPHPExcel->getActiveSheet()->SetCellValue('T1','meta_num_actividades_academicas');
$objPHPExcel->getActiveSheet()->SetCellValue('U1','meta_numero_grupos_ind_atender');
$objPHPExcel->getActiveSheet()->SetCellValue('V1','alcance_programacion');
$objPHPExcel->getActiveSheet()->SetCellValue('W1','periodo_realizacion_fecha_inicio');
$objPHPExcel->getActiveSheet()->SetCellValue('X1','periodo_realizacion_fecha_termino');
$objPHPExcel->getActiveSheet()->SetCellValue('Y1','Info_financiera_categoria');
$objPHPExcel->getActiveSheet()->SetCellValue('Z1','Infor_finan_costo_monto');
$objPHPExcel->getActiveSheet()->SetCellValue('AA1','Infor_finan_apoyo_monto');
$objPHPExcel->getActiveSheet()->SetCellValue('AB1','Infor_finan_apoyo_costo_total');
$objPHPExcel->getActiveSheet()->SetCellValue('AC1','fecha_hora_registro');
$objPHPExcel->getActiveSheet()->SetCellValue('AD1','captura_concluida');
$objPHPExcel->getActiveSheet()->SetCellValue('AE1','cerrrado');
$objPHPExcel->getActiveSheet()->SetCellValue('AF1','fecha_hora_captura_concluida');
$objPHPExcel->getActiveSheet()->SetCellValue('AG1','fecha_hora_cierre_total');


$j=1;
$sql2 = "SELECT * FROM solicitud order by clave_usuario;";
#Almacenamos los datos del sql query en la variable  $r
$r2 = mysqli_query($con,$sql2);

 while($arreg2 = mysqli_fetch_assoc($r2))
	{
							
$j=$j+1;
	
$objPHPExcel->getActiveSheet()->SetCellValue("A$j",$arreg2['clave_usuario']);
$objPHPExcel->getActiveSheet()->SetCellValue("B$j",$arreg2['id_solicitud']);
$objPHPExcel->getActiveSheet()->SetCellValue("C$j",utf8_encode($arreg2['nombre_festival']));
$objPHPExcel->getActiveSheet()->SetCellValue("D$j",$arreg2['numero_ediciones_previas']);
$objPHPExcel->getActiveSheet()->SetCellValue("E$j",$arreg2['disciplina_artes_escenicas']);
$objPHPExcel->getActiveSheet()->SetCellValue("F$j",$arreg2['disciplina_artes_plasticas']);
$objPHPExcel->getActiveSheet()->SetCellValue("G$j",$arreg2['disciplina_cinematografia']);
$objPHPExcel->getActiveSheet()->SetCellValue("H$j",$arreg2['disciplina_gastronomia']);
$objPHPExcel->getActiveSheet()->SetCellValue("I$j",$arreg2['disciplina_literatura']);
$objPHPExcel->getActiveSheet()->SetCellValue("J$j",utf8_encode($arreg2['objetivo_general']));
$objPHPExcel->getActiveSheet()->SetCellValue("K$j",utf8_encode($arreg2['pagina_web_festival']));
$objPHPExcel->getActiveSheet()->SetCellValue("L$j",utf8_encode($arreg2['facebook_festival']));
$objPHPExcel->getActiveSheet()->SetCellValue("M$j",utf8_encode($arreg2['twitter_festival']));
$objPHPExcel->getActiveSheet()->SetCellValue("N$j",$arreg2['meta_num_presentaciones']);
$objPHPExcel->getActiveSheet()->SetCellValue("O$j",$arreg2['meta_num_publico']);
$objPHPExcel->getActiveSheet()->SetCellValue("P$j",$arreg2['meta_num_municipio']);
$objPHPExcel->getActiveSheet()->SetCellValue("Q$j",$arreg2['meta_num_foros']);
$objPHPExcel->getActiveSheet()->SetCellValue("R$j",$arreg2['meta_num_artistas']);
$objPHPExcel->getActiveSheet()->SetCellValue("S$j",$arreg2['meta_cantidad_grupos']);
$objPHPExcel->getActiveSheet()->SetCellValue("T$j",$arreg2['meta_num_actividades_academicas']);
$objPHPExcel->getActiveSheet()->SetCellValue("U$j",$arreg2['meta_numero_grupos_ind_atender']);
$objPHPExcel->getActiveSheet()->SetCellValue("V$j",utf8_encode($arreg2['alcance_programacion']));
$objPHPExcel->getActiveSheet()->SetCellValue("W$j",$arreg2['periodo_realizacion_fecha_inicio']);
$objPHPExcel->getActiveSheet()->SetCellValue("X$j",$arreg2['periodo_realizacion_fecha_termino']);
$objPHPExcel->getActiveSheet()->SetCellValue("Y$j",$arreg2['Info_financiera_categoria']);
$objPHPExcel->getActiveSheet()->SetCellValue("Z$j",$arreg2['Infor_finan_costo_monto']);
$objPHPExcel->getActiveSheet()->SetCellValue("AA$j",$arreg2['Infor_finan_apoyo_monto']);
$objPHPExcel->getActiveSheet()->SetCellValue("AB$j",$arreg2['Infor_finan_apoyo_costo_total']);
$objPHPExcel->getActiveSheet()->SetCellValue("AC$j",$arreg2['fecha_hora_registro']);
$objPHPExcel->getActiveSheet()->SetCellValue("AD$j",$arreg2['captura_concluida']);
$objPHPExcel->getActiveSheet()->SetCellValue("AE$j",$arreg2['cerrrado']);
$objPHPExcel->getActiveSheet()->SetCellValue("AF$j",$arreg2['fecha_hora_captura_concluida']);
$objPHPExcel->getActiveSheet()->SetCellValue("AG$j",$arreg2['fecha_hora_cierre_total']);
				  }

$objPHPExcel->createSheet();
$objPHPExcel->setActiveSheetIndex(2);
$objPHPExcel->getActiveSheet()->setTitle('proyecto');

$objPHPExcel->getActiveSheet()->SetCellValue('A1','clave_usuario');
    $objPHPExcel->getActiveSheet()->SetCellValue('B1','responsable_op_nombre');
    $objPHPExcel->getActiveSheet()->SetCellValue('C1','primer_apellido_op');
    $objPHPExcel->getActiveSheet()->SetCellValue('D1','segundo_apellido_op');
    $objPHPExcel->getActiveSheet()->SetCellValue('E1','cargo_op');
    $objPHPExcel->getActiveSheet()->SetCellValue('F1','lada_op');
    $objPHPExcel->getActiveSheet()->SetCellValue('G1','telefono_fijo_op');
    $objPHPExcel->getActiveSheet()->SetCellValue('H1','extension_op');
    $objPHPExcel->getActiveSheet()->SetCellValue('I1','telefono_movil_op');
    $objPHPExcel->getActiveSheet()->SetCellValue('J1','Correo_electronico_op');
    $objPHPExcel->getActiveSheet()->SetCellValue('K1','responsable_adm_nombre');
    $objPHPExcel->getActiveSheet()->SetCellValue('L1','primer_apellido_adm');
    $objPHPExcel->getActiveSheet()->SetCellValue('M1','segundo_apellido_adm');
    $objPHPExcel->getActiveSheet()->SetCellValue('N1','cargo_adm');
    $objPHPExcel->getActiveSheet()->SetCellValue('O1','lada_adm');
    $objPHPExcel->getActiveSheet()->SetCellValue('P1','telefono_fijo_adm');
    $objPHPExcel->getActiveSheet()->SetCellValue('Q1','extension_adm');
    $objPHPExcel->getActiveSheet()->SetCellValue('R1','telefono_movil_adm');
    $objPHPExcel->getActiveSheet()->SetCellValue('S1','correo_electronico_adm');
    $objPHPExcel->getActiveSheet()->SetCellValue('T1','desarrollo_proyecto_antecedente');
    $objPHPExcel->getActiveSheet()->SetCellValue('U1','desarrollo_proyecto_diagnostico');
    $objPHPExcel->getActiveSheet()->SetCellValue('V1','desarrollo_proyecto_justificacion');
    $objPHPExcel->getActiveSheet()->SetCellValue('W1','desarrollo_proyecto_descripcion');
    $objPHPExcel->getActiveSheet()->SetCellValue('X1','desarrollo_proyecto_objetivos_especificos');
    $objPHPExcel->getActiveSheet()->SetCellValue('Y1','desarrollo_proyecto_meta_cuantitativa');
    $objPHPExcel->getActiveSheet()->SetCellValue('Z1','desarrollo_proyecto_descripcion_impacto');
    $objPHPExcel->getActiveSheet()->SetCellValue('AA1','poblacion_genero_hombre');
    $objPHPExcel->getActiveSheet()->SetCellValue('AB1','poblacion_genero_mujer');
    $objPHPExcel->getActiveSheet()->SetCellValue('AC1','poblacion_edad_0_12');
    $objPHPExcel->getActiveSheet()->SetCellValue('AD1','poblacion_edad_13_17');
    $objPHPExcel->getActiveSheet()->SetCellValue('AE1','poblacion_edad_18_29');
    $objPHPExcel->getActiveSheet()->SetCellValue('AF1','poblacion_edad_30_59');
    $objPHPExcel->getActiveSheet()->SetCellValue('AG1','poblacion_edad_60');
    $objPHPExcel->getActiveSheet()->SetCellValue('AH1','poblacion_nivel_sin_escolaridad');
    $objPHPExcel->getActiveSheet()->SetCellValue('AI1','poblacion_nivel_educ_basica');
    $objPHPExcel->getActiveSheet()->SetCellValue('AJ1','poblacion_nivel_educ_media');
    $objPHPExcel->getActiveSheet()->SetCellValue('AK1','poblacion_nivel_educ_superior');
    $objPHPExcel->getActiveSheet()->SetCellValue('AL1','poblacion_especific_reclusion');
    $objPHPExcel->getActiveSheet()->SetCellValue('AM1','poblacion_especific_migrantes');
    $objPHPExcel->getActiveSheet()->SetCellValue('AN1','poblacion_especific_indigenas');
    $objPHPExcel->getActiveSheet()->SetCellValue('AO1','poblacion_especific_con_discapacidad');
    $objPHPExcel->getActiveSheet()->SetCellValue('AP1','poblacion_especific_otros');
    $objPHPExcel->getActiveSheet()->SetCellValue('AQ1','poblacion_especific_otro_nombre');
    $objPHPExcel->getActiveSheet()->SetCellValue('AR1','poblacion_especific_otro_cantidad');
    $objPHPExcel->getActiveSheet()->SetCellValue('AS1','estrategias_medios_radio');
    $objPHPExcel->getActiveSheet()->SetCellValue('AT1','estrategias_medios_television');
    $objPHPExcel->getActiveSheet()->SetCellValue('AU1','estrategias_medios_internet');
    $objPHPExcel->getActiveSheet()->SetCellValue('AV1','estrategias_medios_redes_sociales');
    $objPHPExcel->getActiveSheet()->SetCellValue('AX1','estrategias_medios_prensa');
    $objPHPExcel->getActiveSheet()->SetCellValue('AY1','estrategias_medios_folletos_posters');
    $objPHPExcel->getActiveSheet()->SetCellValue('AZ1','estrategias_medios_espectaculares');
    $objPHPExcel->getActiveSheet()->SetCellValue('BA1','estrategias_medios_perifoneo');
    $objPHPExcel->getActiveSheet()->SetCellValue('BB1','estrategias_medios_otros');
    $objPHPExcel->getActiveSheet()->SetCellValue('BC1','estrategias_medios_otros_nombre');
    $objPHPExcel->getActiveSheet()->SetCellValue('BD1','estrategias_acciones_dar_conocer');
    $objPHPExcel->getActiveSheet()->SetCellValue('BF1','descripcion_mecanismos_evaluacion');
    $objPHPExcel->getActiveSheet()->SetCellValue('BF1','fecha_hora_registro');
    $objPHPExcel->getActiveSheet()->SetCellValue('BG1','organigrama_nombre1');
    $objPHPExcel->getActiveSheet()->SetCellValue('BH1','organigrama_cargo1');
    $objPHPExcel->getActiveSheet()->SetCellValue('BI1','organigrama_funciones1');
    $objPHPExcel->getActiveSheet()->SetCellValue('BJ1','organigrama_nombre2');
    $objPHPExcel->getActiveSheet()->SetCellValue('BK1','organigrama_cargo2');
    $objPHPExcel->getActiveSheet()->SetCellValue('BL1','organigrama_funciones2');
    $objPHPExcel->getActiveSheet()->SetCellValue('BM1','organigrama_nombre3');
    $objPHPExcel->getActiveSheet()->SetCellValue('BN1','organigrama_cargo3');
    $objPHPExcel->getActiveSheet()->SetCellValue('BO1','organigrama_funciones3');
    $objPHPExcel->getActiveSheet()->SetCellValue('BP1','organigrama_nombre4');
    $objPHPExcel->getActiveSheet()->SetCellValue('BQ1','organigrama_cargo4');
    $objPHPExcel->getActiveSheet()->SetCellValue('BR1','organigrama_funciones4');
    $objPHPExcel->getActiveSheet()->SetCellValue('BS1','organigrama_nombre5');
    $objPHPExcel->getActiveSheet()->SetCellValue('BT1','organigrama_cargo5');
    $objPHPExcel->getActiveSheet()->SetCellValue('BU1','organigrama_funciones5');
    $objPHPExcel->getActiveSheet()->SetCellValue('BV1','organigrama_nombre6');
    $objPHPExcel->getActiveSheet()->SetCellValue('BW1','organigrama_cargo6');
    $objPHPExcel->getActiveSheet()->SetCellValue('BX1','organigrama_funciones6');
    $objPHPExcel->getActiveSheet()->SetCellValue('BY1','organigrama_nombre7');
    $objPHPExcel->getActiveSheet()->SetCellValue('BZ1','organigrama_cargo7');
    $objPHPExcel->getActiveSheet()->SetCellValue('CA1','organigrama_funciones7');
    $objPHPExcel->getActiveSheet()->SetCellValue('CB1','organigrama_nombre8');
    $objPHPExcel->getActiveSheet()->SetCellValue('CC1','organigrama_cargo8');
    $objPHPExcel->getActiveSheet()->SetCellValue('CD1','organigrama_funciones8');
    $objPHPExcel->getActiveSheet()->SetCellValue('CE1','Nombreforo_1');
    $objPHPExcel->getActiveSheet()->SetCellValue('CF1','Domicilioforo_1');
    $objPHPExcel->getActiveSheet()->SetCellValue('CG1','Descripespacio_1');
    $objPHPExcel->getActiveSheet()->SetCellValue('CH1','Nombreforo_2');
    $objPHPExcel->getActiveSheet()->SetCellValue('CI1','Domicilioforo_2');
    $objPHPExcel->getActiveSheet()->SetCellValue('CJ1','Descripespacio_2');
    $objPHPExcel->getActiveSheet()->SetCellValue('CK1','Nombreforo_3');
    $objPHPExcel->getActiveSheet()->SetCellValue('CL1','Domicilioforo_3');
    $objPHPExcel->getActiveSheet()->SetCellValue('CM1','Descripespacio_3');
    $objPHPExcel->getActiveSheet()->SetCellValue('CN1','crono_fechaacciones_a');
    $objPHPExcel->getActiveSheet()->SetCellValue('CO1','crono_fechaacciones_fin_a');
    $objPHPExcel->getActiveSheet()->SetCellValue('CP1','crono_acciones_a');
    $objPHPExcel->getActiveSheet()->SetCellValue('CQ1','crono_fechaacciones_b');
    $objPHPExcel->getActiveSheet()->SetCellValue('CR1','crono_fechaacciones_fin_b');
    $objPHPExcel->getActiveSheet()->SetCellValue('CS1','crono_acciones_b');
    $objPHPExcel->getActiveSheet()->SetCellValue('CT1','crono_fechaacciones_c');
    $objPHPExcel->getActiveSheet()->SetCellValue('CU1','crono_fechaacciones_fin_c');
    $objPHPExcel->getActiveSheet()->SetCellValue('CV1','crono_acciones_c');
    $objPHPExcel->getActiveSheet()->SetCellValue('CX1','Nombreforo_a');
    $objPHPExcel->getActiveSheet()->SetCellValue('CY1','Domicilioforo_a');
    $objPHPExcel->getActiveSheet()->SetCellValue('CZ1','Descripcionlug_a');
    $objPHPExcel->getActiveSheet()->SetCellValue('DA1','Nombreforo_b');
    $objPHPExcel->getActiveSheet()->SetCellValue('DB1','Domicilioforo_b');
    $objPHPExcel->getActiveSheet()->SetCellValue('DC1','Descripcionlug_b');
    $objPHPExcel->getActiveSheet()->SetCellValue('DD1','Nombreforo_c');
    $objPHPExcel->getActiveSheet()->SetCellValue('DE1','Domicilioforo_c');
    $objPHPExcel->getActiveSheet()->SetCellValue('DF1','Descripcionlug_c');


$k=1;
$sql3 = "SELECT * FROM proyecto order by clave_usuario;";
#Almacenamos los datos del sql query en la variable  $r
$r3 = mysqli_query($con,$sql3);

 while($arreg3 = mysqli_fetch_assoc($r3))
	{
							
$k=$k+1;
	
$objPHPExcel->getActiveSheet()->SetCellValue("A$k",$arreg3['clave_usuario']);
    $objPHPExcel->getActiveSheet()->SetCellValue("B$k",utf8_encode($arreg3['responsable_op_nombre']));
    $objPHPExcel->getActiveSheet()->SetCellValue("C$k",utf8_encode($arreg3['primer_apellido_op']));
    $objPHPExcel->getActiveSheet()->SetCellValue("D$k",utf8_encode($arreg3['segundo_apellido_op']));
    $objPHPExcel->getActiveSheet()->SetCellValue("E$k",utf8_encode($arreg3['cargo_op']));
    $objPHPExcel->getActiveSheet()->SetCellValue("F$k",$arreg3['lada_op']);
    $objPHPExcel->getActiveSheet()->SetCellValue("G$k",$arreg3['telefono_fijo_op']);
    $objPHPExcel->getActiveSheet()->SetCellValue("H$k",$arreg3['extension_op']);
    $objPHPExcel->getActiveSheet()->SetCellValue("I$k",$arreg3['telefono_movil_op']);
    $objPHPExcel->getActiveSheet()->SetCellValue("J$k",$arreg3['Correo_electronico_op']);
    $objPHPExcel->getActiveSheet()->SetCellValue("K$k",utf8_encode($arreg3['responsable_adm_nombre']));
    $objPHPExcel->getActiveSheet()->SetCellValue("L$k",utf8_encode($arreg3['primer_apellido_adm']));
    $objPHPExcel->getActiveSheet()->SetCellValue("M$k",utf8_encode($arreg3['segundo_apellido_adm']));
    $objPHPExcel->getActiveSheet()->SetCellValue("N$k",utf8_encode($arreg3['cargo_adm']));
    $objPHPExcel->getActiveSheet()->SetCellValue("O$k",$arreg3['lada_adm']);
    $objPHPExcel->getActiveSheet()->SetCellValue("P$k",$arreg3['telefono_fijo_adm']);
    $objPHPExcel->getActiveSheet()->SetCellValue("Q$k",$arreg3['extension_adm']);
    $objPHPExcel->getActiveSheet()->SetCellValue("R$k",$arreg3['telefono_movil_adm']);
    $objPHPExcel->getActiveSheet()->SetCellValue("S$k",$arreg3['correo_electronico_adm']);
    $objPHPExcel->getActiveSheet()->SetCellValue("T$k",utf8_encode($arreg3['desarrollo_proyecto_antecedente']));
    $objPHPExcel->getActiveSheet()->SetCellValue("U$k",utf8_encode($arreg3['desarrollo_proyecto_diagnostico']));
    $objPHPExcel->getActiveSheet()->SetCellValue("V$k",utf8_encode($arreg3['desarrollo_proyecto_justificacion']));
    $objPHPExcel->getActiveSheet()->SetCellValue("W$k",utf8_encode($arreg3['desarrollo_proyecto_descripcion']));
    $objPHPExcel->getActiveSheet()->SetCellValue("X$k",utf8_encode($arreg3['desarrollo_proyecto_objetivos_especificos']));
    $objPHPExcel->getActiveSheet()->SetCellValue("Y$k",utf8_encode($arreg3['desarrollo_proyecto_meta_cuantitativa']));
    $objPHPExcel->getActiveSheet()->SetCellValue("Z$k",utf8_encode($arreg3['desarrollo_proyecto_descripcion_impacto']));
    $objPHPExcel->getActiveSheet()->SetCellValue("AA$k",$arreg3['poblacion_genero_hombre']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AB$k",$arreg3['poblacion_genero_mujer']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AC$k",$arreg3['poblacion_edad_0_12']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AD$k",$arreg3['poblacion_edad_13_17']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AE$k",$arreg3['poblacion_edad_18_29']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AF$k",$arreg3['poblacion_edad_30_59']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AG$k",$arreg3['poblacion_edad_60']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AH$k",$arreg3['poblacion_nivel_sin_escolaridad']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AI$k",$arreg3['poblacion_nivel_educ_basica']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AJ$k",$arreg3['poblacion_nivel_educ_media']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AK$k",$arreg3['poblacion_nivel_educ_superior']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AL$k",$arreg3['poblacion_especific_reclusion']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AM$k",$arreg3['poblacion_especific_migrantes']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AN$k",$arreg3['poblacion_especific_indigenas']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AO$k",$arreg3['poblacion_especific_con_discapacidad']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AP$k",$arreg3['poblacion_especific_otros']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AQ$k",$arreg3['poblacion_especific_otro_nombre']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AR$k",$arreg3['poblacion_especific_otro_cantidad']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AS$k",$arreg3['estrategias_medios_radio']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AT$k",$arreg3['estrategias_medios_television']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AU$k",$arreg3['estrategias_medios_internet']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AV$k",$arreg3['estrategias_medios_redes_sociales']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AX$k",$arreg3['estrategias_medios_prensa']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AY$k",$arreg3['estrategias_medios_folletos_posters']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AZ$k",$arreg3['estrategias_medios_espectaculares']);
    $objPHPExcel->getActiveSheet()->SetCellValue("BA$k",$arreg3['estrategias_medios_perifoneo']);
    $objPHPExcel->getActiveSheet()->SetCellValue("BB$k",$arreg3['estrategias_medios_otros']);
    $objPHPExcel->getActiveSheet()->SetCellValue("BC$k",$arreg3['estrategias_medios_otros_nombre']);
    $objPHPExcel->getActiveSheet()->SetCellValue("BD$k",$arreg3['estrategias_acciones_dar_conocer']);
    $objPHPExcel->getActiveSheet()->SetCellValue("BF$k",$arreg3['descripcion_mecanismos_evaluacion']);
    $objPHPExcel->getActiveSheet()->SetCellValue("BF$k",$arreg3['fecha_hora_registro']);
    $objPHPExcel->getActiveSheet()->SetCellValue("BG$k",utf8_encode($arreg3['organigrama_nombre1']));
    $objPHPExcel->getActiveSheet()->SetCellValue("BH$k",utf8_encode($arreg3['organigrama_cargo1']));
    $objPHPExcel->getActiveSheet()->SetCellValue("BI$k",utf8_encode($arreg3['organigrama_funciones1']));
    $objPHPExcel->getActiveSheet()->SetCellValue("BJ$k",utf8_encode($arreg3['organigrama_nombre2']));
    $objPHPExcel->getActiveSheet()->SetCellValue("BK$k",utf8_encode($arreg3['organigrama_cargo2']));
    $objPHPExcel->getActiveSheet()->SetCellValue("BL$k",utf8_encode($arreg3['organigrama_funciones2']));
    $objPHPExcel->getActiveSheet()->SetCellValue("BM$k",utf8_encode($arreg3['organigrama_nombre3']));
    $objPHPExcel->getActiveSheet()->SetCellValue("BN$k",utf8_encode($arreg3['organigrama_cargo3']));
    $objPHPExcel->getActiveSheet()->SetCellValue("BO$k",utf8_encode($arreg3['organigrama_funciones3']));
    $objPHPExcel->getActiveSheet()->SetCellValue("BP$k",utf8_encode($arreg3['organigrama_nombre4']));
    $objPHPExcel->getActiveSheet()->SetCellValue("BQ$k",utf8_encode($arreg3['organigrama_cargo4']));
    $objPHPExcel->getActiveSheet()->SetCellValue("BR$k",utf8_encode($arreg3['organigrama_funciones4']));
    $objPHPExcel->getActiveSheet()->SetCellValue("BS$k",utf8_encode($arreg3['organigrama_nombre5']));
    $objPHPExcel->getActiveSheet()->SetCellValue("BT$k",utf8_encode($arreg3['organigrama_cargo5']));
    $objPHPExcel->getActiveSheet()->SetCellValue("BU$k",utf8_encode($arreg3['organigrama_funciones5']));
    $objPHPExcel->getActiveSheet()->SetCellValue("BV$k",utf8_encode($arreg3['organigrama_nombre6']));
    $objPHPExcel->getActiveSheet()->SetCellValue("BW$k",utf8_encode($arreg3['organigrama_cargo6']));
    $objPHPExcel->getActiveSheet()->SetCellValue("BX$k",utf8_encode($arreg3['organigrama_funciones6']));
    $objPHPExcel->getActiveSheet()->SetCellValue("BY$k",utf8_encode($arreg3['organigrama_nombre7']));
    $objPHPExcel->getActiveSheet()->SetCellValue("BZ$k",utf8_encode($arreg3['organigrama_cargo7']));
    $objPHPExcel->getActiveSheet()->SetCellValue("CA$k",utf8_encode($arreg3['organigrama_funciones7']));
    $objPHPExcel->getActiveSheet()->SetCellValue("CB$k",utf8_encode($arreg3['organigrama_nombre8']));
    $objPHPExcel->getActiveSheet()->SetCellValue("CC$k",utf8_encode($arreg3['organigrama_cargo8']));
    $objPHPExcel->getActiveSheet()->SetCellValue("CD$k",utf8_encode($arreg3['organigrama_funciones8']));
    $objPHPExcel->getActiveSheet()->SetCellValue("CE$k",utf8_encode($arreg3['Nombreforo_1']));
    $objPHPExcel->getActiveSheet()->SetCellValue("CF$k",utf8_encode($arreg3['Domicilioforo_1']));
    $objPHPExcel->getActiveSheet()->SetCellValue("CG$k",utf8_encode($arreg3['Descripespacio_1']));
    $objPHPExcel->getActiveSheet()->SetCellValue("CH$k",utf8_encode($arreg3['Nombreforo_2']));
    $objPHPExcel->getActiveSheet()->SetCellValue("CI$k",utf8_encode($arreg3['Domicilioforo_2']));
    $objPHPExcel->getActiveSheet()->SetCellValue("CJ$k",utf8_encode($arreg3['Descripespacio_2']));
    $objPHPExcel->getActiveSheet()->SetCellValue("CK$k",utf8_encode($arreg3['Nombreforo_3']));
    $objPHPExcel->getActiveSheet()->SetCellValue("CL$k",utf8_encode($arreg3['Domicilioforo_3']));
    $objPHPExcel->getActiveSheet()->SetCellValue("CM$k",utf8_encode($arreg3['Descripespacio_3']));
    $objPHPExcel->getActiveSheet()->SetCellValue("CN$k",$arreg3['crono_fechaacciones_a']);
    $objPHPExcel->getActiveSheet()->SetCellValue("CO$k",$arreg3['crono_fechaacciones_fin_a']);
    $objPHPExcel->getActiveSheet()->SetCellValue("CP$k",utf8_encode($arreg3['crono_acciones_a']));
    $objPHPExcel->getActiveSheet()->SetCellValue("CQ$k",$arreg3['crono_fechaacciones_b']);
    $objPHPExcel->getActiveSheet()->SetCellValue("CR$k",$arreg3['crono_fechaacciones_fin_b']);
    $objPHPExcel->getActiveSheet()->SetCellValue("CS$k",utf8_encode($arreg3['crono_acciones_b']));
    $objPHPExcel->getActiveSheet()->SetCellValue("CT$k",$arreg3['crono_fechaacciones_c']);
    $objPHPExcel->getActiveSheet()->SetCellValue("CU$k",$arreg3['crono_fechaacciones_fin_c']);
    $objPHPExcel->getActiveSheet()->SetCellValue("CV$k",utf8_encode($arreg3['crono_acciones_c']));
    $objPHPExcel->getActiveSheet()->SetCellValue("CX$k",utf8_encode($arreg3['Nombreforo_a']));
    $objPHPExcel->getActiveSheet()->SetCellValue("CY$k",utf8_encode($arreg3['Domicilioforo_a']));
    $objPHPExcel->getActiveSheet()->SetCellValue("CZ$k",utf8_encode($arreg3['Descripcionlug_a']));
    $objPHPExcel->getActiveSheet()->SetCellValue("DA$k",utf8_encode($arreg3['Nombreforo_b']));
    $objPHPExcel->getActiveSheet()->SetCellValue("DB$k",utf8_encode($arreg3['Domicilioforo_b']));
    $objPHPExcel->getActiveSheet()->SetCellValue("DC$k",utf8_encode($arreg3['Descripcionlug_b']));
    $objPHPExcel->getActiveSheet()->SetCellValue("DD$k",utf8_encode($arreg3['Nombreforo_c']));
    $objPHPExcel->getActiveSheet()->SetCellValue("DE$k",utf8_encode($arreg3['Domicilioforo_c']));
    $objPHPExcel->getActiveSheet()->SetCellValue("DF$k",utf8_encode($arreg3['Descripcionlug_c']));
				  }
/////********************** (INICIO) mas metas numericas *******************************************											
$objPHPExcel->createSheet();
$objPHPExcel->setActiveSheetIndex(3);
$objPHPExcel->getActiveSheet()->setTitle('mas_metas');

$objPHPExcel->getActiveSheet()->SetCellValue('A1','clave_usuario');
$objPHPExcel->getActiveSheet()->SetCellValue('B1','nombre_meta');
$objPHPExcel->getActiveSheet()->SetCellValue('C1','cantidad');
$objPHPExcel->getActiveSheet()->SetCellValue('D1','fecha_hora_registro');

$c=1;
$sql5 = "select * from mas_metas_numericas order by clave_usuario;";
#Almacenamos los datos del sql query en la variable  $r
$r5 = mysqli_query($con,$sql5);

 while($arreg5 = mysqli_fetch_assoc($r5))
	{
		 							
$c=$c+1;
	
$objPHPExcel->getActiveSheet()->SetCellValue("A$c",$arreg5['clave_usuario']);
$objPHPExcel->getActiveSheet()->SetCellValue("B$c",utf8_encode($arreg5['nombre_meta_numerica']));
$objPHPExcel->getActiveSheet()->SetCellValue("C$c",$arreg5['meta_cantidad']);
$objPHPExcel->getActiveSheet()->SetCellValue("D$c",$arreg5['fecha_hora_registro']);
				  }				  
/////********************** (FIN) mas metas numericas *******************************************
				  
/////********************** (INICIO) mas lugares *******************************************
$objPHPExcel->createSheet();
$objPHPExcel->setActiveSheetIndex(4);
$objPHPExcel->getActiveSheet()->setTitle('mas_lugares');

$objPHPExcel->getActiveSheet()->SetCellValue('A1','clave_usuario');
$objPHPExcel->getActiveSheet()->SetCellValue('B1','Nombre foro');
$objPHPExcel->getActiveSheet()->SetCellValue('C1','Domicilio');
$objPHPExcel->getActiveSheet()->SetCellValue('D1','Descripcion lug');
$objPHPExcel->getActiveSheet()->SetCellValue('E1','fecha_hora_registro');

$d=1;
$sql6 = "select * from mas_lugares order by clave_usuario;";
#Almacenamos los datos del sql query en la variable  $r
$r6 = mysqli_query($con,$sql6);

 while($arreg6 = mysqli_fetch_assoc($r6))
	{
		 							
$d=$d+1;
	
$objPHPExcel->getActiveSheet()->SetCellValue("A$d",$arreg6['clave_usuario']);
$objPHPExcel->getActiveSheet()->SetCellValue("B$d",utf8_encode($arreg6['Nombreforo']));
$objPHPExcel->getActiveSheet()->SetCellValue("C$d",utf8_encode($arreg6['Domicilioforo']));
$objPHPExcel->getActiveSheet()->SetCellValue("D$d",utf8_encode($arreg6['Descripcionlug']));
$objPHPExcel->getActiveSheet()->SetCellValue("E$d",$arreg6['fecha_hora_registro']);
				  }				  
/////********************** (FIN) mas lugares *******************************************


/////********************** (INICIO) CRONOGRAMA ACCIONES *******************************************
$objPHPExcel->createSheet();
$objPHPExcel->setActiveSheetIndex(5);
$objPHPExcel->getActiveSheet()->setTitle('cronograma_acciones');

$objPHPExcel->getActiveSheet()->SetCellValue('A1','clave_usuario');
$objPHPExcel->getActiveSheet()->SetCellValue('B1','fecha acciones inicio');
$objPHPExcel->getActiveSheet()->SetCellValue('C1','fecha acciones fin');
$objPHPExcel->getActiveSheet()->SetCellValue('D1','Descripcion lug');
$objPHPExcel->getActiveSheet()->SetCellValue('E1','fecha_hora_registro');

$s=1;
$sql6 = "select * from cronograma_acciones_ejecucion_festival order by clave_usuario;";
#Almacenamos los datos del sql query en la variable  $r
$r6 = mysqli_query($con,$sql6);

 while($arreg6 = mysqli_fetch_assoc($r6))
	{
		 							
$s=$s+1;
	
$objPHPExcel->getActiveSheet()->SetCellValue("A$s",$arreg6['clave_usuario']);
$objPHPExcel->getActiveSheet()->SetCellValue("B$s",$arreg6['fechaacciones']);
$objPHPExcel->getActiveSheet()->SetCellValue("C$s",$arreg6['fechaacciones_fin']);
$objPHPExcel->getActiveSheet()->SetCellValue("D$s",utf8_encode($arreg6['acciones']));
$objPHPExcel->getActiveSheet()->SetCellValue("E$s",$arreg6['fecha_hora_registro']);
				  }				  
/////********************** (FIN) CRONOGRAMA ACCIONES *******************************************


				

/////////////***************(INICIO) mas_presupuesto ***********************************
$objPHPExcel->createSheet();
$objPHPExcel->setActiveSheetIndex(6);
$objPHPExcel->getActiveSheet()->setTitle('mas_presupuesto');

$objPHPExcel->getActiveSheet()->SetCellValue('A1','clave_usuario');
$objPHPExcel->getActiveSheet()->SetCellValue('B1','Concepto_gasto');
$objPHPExcel->getActiveSheet()->SetCellValue('C1','Fuente_finan');
$objPHPExcel->getActiveSheet()->SetCellValue('D1','Monto_unidad');
$objPHPExcel->getActiveSheet()->SetCellValue('E1','Porcentaje');
$objPHPExcel->getActiveSheet()->SetCellValue('F1','monto_unidad_total');
$objPHPExcel->getActiveSheet()->SetCellValue('G1','porcentaje_total');
$objPHPExcel->getActiveSheet()->SetCellValue('H1','fecha_hora_registro');

$g=1;
$sql4 = "SELECT * FROM mas_presupuesto order by clave_usuario;";
#Almacenamos los datos del sql query en la variable  $r
$r4 = mysqli_query($con,$sql4);

 while($arreg4 = mysqli_fetch_assoc($r4))
	{
		$no_Fuente_finan = $arreg4['Fuente_finan'];
		
		switch($no_Fuente_finan){
				case '1':
					$nombre_Fuente = "Institucional Estatal";
				break;
				case '2':
					$nombre_Fuente = "Institucional Municipal";
				break;
				case '3':
					$nombre_Fuente = "Institucional Federal PROFEST";
				break;
				case '4':
					$nombre_Fuente = "Institucional Educación Superior";
				break;
				case '5':
					$nombre_Fuente = "Privada";
				break;
				default:
					$nombre_Fuente = $no_Fuente_finan;
		}
		$Concepto_gasto = $arreg4['Concepto_gasto'];
		 
$sql5 = "select * from catalogo_concepto_gastos where id_gasto = '$Concepto_gasto';";
#Almacenamos los datos del sql query en la variable  $r
$r5 = mysqli_query($con,$sql5);

 while($arreg5 = mysqli_fetch_assoc($r5))
	{
	$nombre_Concepto_gasto = utf8_encode($arreg5['concepto_gasto']);
	}
$g=$g+1;
$objPHPExcel->getActiveSheet()->SetCellValue("A$g",$arreg4['clave_usuario']);
$objPHPExcel->getActiveSheet()->SetCellValue("B$g",$nombre_Concepto_gasto);
$objPHPExcel->getActiveSheet()->SetCellValue("C$g",$nombre_Fuente);
$objPHPExcel->getActiveSheet()->SetCellValue("D$g",$arreg4['Monto_unidad']);
$objPHPExcel->getActiveSheet()->SetCellValue("E$g",$arreg4['Porcentaje']);
$objPHPExcel->getActiveSheet()->SetCellValue("F$g",$arreg4['monto_unidad_total']);
$objPHPExcel->getActiveSheet()->SetCellValue("G$g",$arreg4['porcentaje_total']);
$objPHPExcel->getActiveSheet()->SetCellValue("H$g",$arreg4['fecha_hora_registro']);
				  }				  
/////////////***************(FIN) mas_presupuesto ***********************************

$objPHPExcel->setActiveSheetIndex(0);

$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
$objWriter->save('temp/nombredearchivo.xlsx');
?>