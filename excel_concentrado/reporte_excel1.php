<?php
include 'lib/PHPExcel.php';
include 'lib/PHPExcel/Writer/Excel2007.php';
include ("../Connections/conexion.php");

$objPHPExcel = new PHPExcel();

$objPHPExcel->getProperties()->setCreator("TuEmpresa");
$objPHPExcel->getProperties()->setLastModifiedBy("TuEmpresa");
$objPHPExcel->getProperties()->setTitle("Titulo");
$objPHPExcel->getProperties()->setSubject("Asunto");
$objPHPExcel->getProperties()->setDescription("Descripcion");

$objPHPExcel->getProperties()->setCreator("TuEmpresa");
$objPHPExcel->getProperties()->setLastModifiedBy("TuEmpresa");
$objPHPExcel->getProperties()->setTitle("Titulo");
$objPHPExcel->getProperties()->setSubject("Asunto");
$objPHPExcel->getProperties()->setDescription("Descripcion");

$objPHPExcel->setActiveSheetIndex(0);

$objPHPExcel->getActiveSheet()->SetCellValue('A1','Usuario');
$objPHPExcel->getActiveSheet()->SetCellValue('B1','Nombre legal de la Instancia3');
$objPHPExcel->getActiveSheet()->SetCellValue('C1','Tipo de Instancia');
$objPHPExcel->getActiveSheet()->SetCellValue('D1','Grado académico del titular');
$objPHPExcel->getActiveSheet()->SetCellValue('E1','Nombre del titular');
$objPHPExcel->getActiveSheet()->SetCellValue('F1','Cargo del titular');
//$objPHPExcel->getActiveSheet()->SetCellValue('G1','Lada');
$objPHPExcel->getActiveSheet()->SetCellValue('G1','Teléfono');
$objPHPExcel->getActiveSheet()->SetCellValue('H1','Extensión');
$objPHPExcel->getActiveSheet()->SetCellValue('I1','Correo del titular');
$objPHPExcel->getActiveSheet()->SetCellValue('J1','Código Postal');
$objPHPExcel->getActiveSheet()->SetCellValue('K1','Estado de la instancia');
$objPHPExcel->getActiveSheet()->SetCellValue('L1','Alcaldia de la instancia');
$objPHPExcel->getActiveSheet()->SetCellValue('M1','Colonia');
$objPHPExcel->getActiveSheet()->SetCellValue('N1','Calle');
$objPHPExcel->getActiveSheet()->SetCellValue('O1','Número exterior');
$objPHPExcel->getActiveSheet()->SetCellValue('P1','Número interior');
$objPHPExcel->getActiveSheet()->SetCellValue('Q1','CLUNI');
$objPHPExcel->getActiveSheet()->SetCellValue('R1','Fecha y hora de registro de la cuenta');

$i=1;

$sql = "SELECT clave_usuario, nombre_instancia_postulante, estado, municio_alcaldia, tipo_instancia, 
grado_academico, nombre_titular, primer_apellido, cargo, lada, telefono_fijo, 
correo_electronico, calle, no_ext, colonia, cp, segundo_apellido, no_int,extension, fecha_hora_captura, CLUNI 
FROM usuarios order by clave_usuario;";
#Almacenamos los datos del sql query en la variable  $r

$r = mysqli_query($con,$sql);

 while( $arreg = mysqli_fetch_assoc($r))
				  {
					$clave_usuario  						= $arreg["clave_usuario"];
					$nombre_instancia_postulante		   	= $arreg["nombre_instancia_postulante"];
					$estado    								= $arreg["estado"];
					$municio_alcaldia        				= $arreg["municio_alcaldia"];
					$tipo_instancia        					= $arreg["tipo_instancia"];
					$grado_academico        				= $arreg["grado_academico"];
					$nombre_titular        					= $arreg["nombre_titular"];
					$primer_apellido        				= $arreg["primer_apellido"];
					$segundo_apellido						= $arreg["segundo_apellido"];
					$cargo        							= $arreg["cargo"];
					$lada  									= $arreg["lada"];
					$telefono_fijo        					= $arreg["telefono_fijo"];
					$extension        						= $arreg["extension"];
					$correo_electronico        				= $arreg["correo_electronico"];
					$calle        							= $arreg["calle"];
					$no_ext     							= $arreg["no_ext"];
					$no_int     							= $arreg["no_int"];
					$colonia        						= $arreg["colonia"];
					$cp        								= $arreg["cp"];
                    $fecha_hora_captura                     = $arreg["fecha_hora_captura"];
                    $CLUNI                                  = $arreg["CLUNI"];
	
    switch ($tipo_instancia)
    {
    case 1:
        $nombre_int="Instancia Estatal de Cultura";
    break; 
    case 2:
        $nombre_int="Instancia Municipal de Cultura con personalidad jurídica propia";
    break; 
    case 3:
        $nombre_int="Gobierno Municipal";
    break; 
    case 4:
        $nombre_int="Universidad Pública";
    break; 
    case 5:
        $nombre_int="Organización de la Sociedad Civil";
    break; 
    default:
    $nombre_int="";
    }

$i=$i+1;
$sql_estado = "SELECT c_estado, d_estado, c_mnpio, D_mnpio, d_asenta FROM codigos_postales WHERE cp='$cp' and c_estado ='$estado' and c_mnpio='$municio_alcaldia' group by cp, c_estado, c_mnpio;";
$r_estado = mysqli_query($con,$sql_estado);
$arreg2 = mysqli_fetch_assoc($r_estado);
				 // {
					$c_estado = $arreg2["c_estado"];
					$c_mnpio  = $arreg2["c_mnpio"];
					$estado_imp  = $arreg2["d_estado"];
					$municio_alcaldia_imp  = $arreg2["D_mnpio"];
                    $d_asenta = $arreg2["d_asenta"];
				  //}*/
				  
$objPHPExcel->getActiveSheet()->SetCellValue("A$i","$clave_usuario");
$objPHPExcel->getActiveSheet()->SetCellValue("B$i","$nombre_instancia_postulante");
$objPHPExcel->getActiveSheet()->SetCellValue("C$i",$nombre_int);
$objPHPExcel->getActiveSheet()->SetCellValue("D$i","$grado_academico");
$objPHPExcel->getActiveSheet()->SetCellValue("E$i","$nombre_titular $primer_apellido $segundo_apellido");
$objPHPExcel->getActiveSheet()->SetCellValue("F$i","$cargo");
//$objPHPExcel->getActiveSheet()->SetCellValue("G$i","$lada");
$objPHPExcel->getActiveSheet()->SetCellValue("G$i","$telefono_fijo");
$objPHPExcel->getActiveSheet()->SetCellValue("H$i","$extension");
$objPHPExcel->getActiveSheet()->SetCellValue("I$i","$correo_electronico");
$objPHPExcel->getActiveSheet()->SetCellValue("J$i","$cp");
$objPHPExcel->getActiveSheet()->SetCellValue("K$i","$c_estado-$estado_imp");
$objPHPExcel->getActiveSheet()->SetCellValue("L$i","$c_mnpio-$municio_alcaldia_imp");
$objPHPExcel->getActiveSheet()->SetCellValue("M$i","$colonia-$d_asenta");
$objPHPExcel->getActiveSheet()->SetCellValue("N$i","$calle");
$objPHPExcel->getActiveSheet()->SetCellValue("O$i","$no_ext");
$objPHPExcel->getActiveSheet()->SetCellValue("P$i","$no_int");
$objPHPExcel->getActiveSheet()->SetCellValue("Q$i","$CLUNI");
$objPHPExcel->getActiveSheet()->SetCellValue("R$i","$fecha_hora_captura");

				  				  
	}//cierre while usuarios

$objPHPExcel->getActiveSheet()->setTitle('usuarios');

$objPHPExcel->createSheet();
$objPHPExcel->setActiveSheetIndex(1);
$objPHPExcel->getActiveSheet()->setTitle('solicitud');

$objPHPExcel->getActiveSheet()->SetCellValue('A1','Usuario');
$objPHPExcel->getActiveSheet()->SetCellValue('B1','id_solicitud');
$objPHPExcel->getActiveSheet()->SetCellValue('C1','nombre_festival');
$objPHPExcel->getActiveSheet()->SetCellValue('D1','numero_ediciones_previas');

$objPHPExcel->getActiveSheet()->SetCellValue('E1','disciplina_2022');
$objPHPExcel->getActiveSheet()->SetCellValue('F1','periodo_realizacion_fecha_inicio');
$objPHPExcel->getActiveSheet()->SetCellValue('G1','periodo_realizacion_fecha_termino');

$objPHPExcel->getActiveSheet()->SetCellValue('H1','objetivo_general');

/*$objPHPExcel->getActiveSheet()->SetCellValue('G1','pagina_web_festival');
$objPHPExcel->getActiveSheet()->SetCellValue('H1','facebook_festival');
$objPHPExcel->getActiveSheet()->SetCellValue('I1','twitter_festival');*/
$objPHPExcel->getActiveSheet()->SetCellValue('I1','meta_num_presentaciones');
$objPHPExcel->getActiveSheet()->SetCellValue('J1','meta_num_publico');
$objPHPExcel->getActiveSheet()->SetCellValue('K1','meta_num_municipio');
$objPHPExcel->getActiveSheet()->SetCellValue('L1','meta_num_foros');
$objPHPExcel->getActiveSheet()->SetCellValue('M1','meta_num_artistas');
$objPHPExcel->getActiveSheet()->SetCellValue('N1','meta_cantidad_grupos');
$objPHPExcel->getActiveSheet()->SetCellValue('O1','meta_num_actividades_academicas');
$objPHPExcel->getActiveSheet()->SetCellValue('P1','meta_act_creadores_num_cine_mex');

/*$objPHPExcel->getActiveSheet()->SetCellValue('P1','meta_numero_grupos_ind_atender');
$objPHPExcel->getActiveSheet()->SetCellValue('Q1','alcance_programacion');*/

$objPHPExcel->getActiveSheet()->SetCellValue('Q1','Info_financiera_categoria');
$objPHPExcel->getActiveSheet()->SetCellValue('R1','Infor_finan_costo_monto');
$objPHPExcel->getActiveSheet()->SetCellValue('S1','Infor_finan_apoyo_monto');
$objPHPExcel->getActiveSheet()->SetCellValue('T1','Infor_finan_apoyo_costo_total');
$objPHPExcel->getActiveSheet()->SetCellValue('U1','fecha_hora_registro');
$objPHPExcel->getActiveSheet()->SetCellValue('V1','captura_concluida');
$objPHPExcel->getActiveSheet()->SetCellValue('W1','cerrrado');
//$objPHPExcel->getActiveSheet()->SetCellValue('X1','fecha_hora_captura_concluida');
$objPHPExcel->getActiveSheet()->SetCellValue('X1','fecha_hora_cierre_total');


$j=1;
$sql2 = "SELECT * FROM solicitud where clave_usuario!='' order by clave_usuario;";
#Almacenamos los datos del sql query en la variable  $r
$r2 = mysqli_query($con,$sql2);

 while($arreg2 = mysqli_fetch_assoc($r2))
	{
	$disciplina_2022_A = $arreg2['disciplina_2022'];

     switch($disciplina_2022_A){
        case 1:
            $disciplina_2022="Música";
        break;
        case 2:
            $disciplina_2022="Teatro";
        break;
        case 3:
            $disciplina_2022="Danza";
        break;
        case 4;
            $disciplina_2022="Artes visuales y diseño";
        break;
        case 5:
            $disciplina_2022="Cultura Alimentaria";
        break;
        case 6:
            $disciplina_2022="Literatura";
        break;
        case 7; 
            $disciplina_2022="Cine";
        break;
        case 8:
            $disciplina_2022="Multidisciplina";
        break;
     }

$j=$j+1;
	
$objPHPExcel->getActiveSheet()->SetCellValue("A$j",$arreg2['clave_usuario']);
$objPHPExcel->getActiveSheet()->SetCellValue("B$j",$arreg2['id_solicitud']);
$objPHPExcel->getActiveSheet()->SetCellValue("C$j",$arreg2['nombre_festival']);
$objPHPExcel->getActiveSheet()->SetCellValue("D$j",$arreg2['numero_ediciones_previas']);
$objPHPExcel->getActiveSheet()->SetCellValue("E$j",$disciplina_2022);
$objPHPExcel->getActiveSheet()->SetCellValue("F$j",$arreg2['periodo_realizacion_fecha_inicio']);
$objPHPExcel->getActiveSheet()->SetCellValue("G$j",$arreg2['periodo_realizacion_fecha_termino']);
$objPHPExcel->getActiveSheet()->SetCellValue("H$j",$arreg2['objetivo_general']);

/*
$objPHPExcel->getActiveSheet()->SetCellValue("G$j",utf8_encode($arreg2['pagina_web_festival']));
$objPHPExcel->getActiveSheet()->SetCellValue("H$j",utf8_encode($arreg2['facebook_festival']));
$objPHPExcel->getActiveSheet()->SetCellValue("I$j",utf8_encode($arreg2['twitter_festival']));*/

$objPHPExcel->getActiveSheet()->SetCellValue("I$j",$arreg2['meta_num_presentaciones']);
$objPHPExcel->getActiveSheet()->SetCellValue("J$j",$arreg2['meta_num_publico']);
$objPHPExcel->getActiveSheet()->SetCellValue("K$j",$arreg2['meta_num_municipio']);
$objPHPExcel->getActiveSheet()->SetCellValue("L$j",$arreg2['meta_num_foros']);
$objPHPExcel->getActiveSheet()->SetCellValue("M$j",$arreg2['meta_num_artistas']);
$objPHPExcel->getActiveSheet()->SetCellValue("N$j",$arreg2['meta_cantidad_grupos']);

$objPHPExcel->getActiveSheet()->SetCellValue("O$j",$arreg2['meta_num_actividades_academicas']);
/*$objPHPExcel->getActiveSheet()->SetCellValue("P$j",$arreg2['meta_numero_grupos_ind_atender']);
$objPHPExcel->getActiveSheet()->SetCellValue("Q$j",utf8_encode($arreg2['alcance_programacion']));*/

$objPHPExcel->getActiveSheet()->SetCellValue("P$j",$arreg2['Info_financiera_categoria']);
$objPHPExcel->getActiveSheet()->SetCellValue("Q$j",$arreg2['Infor_finan_costo_monto']);
$objPHPExcel->getActiveSheet()->SetCellValue("R$j",$arreg2['Infor_finan_apoyo_monto']);
$objPHPExcel->getActiveSheet()->SetCellValue("S$j",$arreg2['Infor_finan_apoyo_costo_total']);
$objPHPExcel->getActiveSheet()->SetCellValue("T$j",$arreg2['fecha_hora_registro']);
$objPHPExcel->getActiveSheet()->SetCellValue("V$j",$arreg2['captura_concluida']);
$objPHPExcel->getActiveSheet()->SetCellValue("W$j",$arreg2['cerrrado']);
//$objPHPExcel->getActiveSheet()->SetCellValue("X$j",$arreg2['fecha_hora_captura_concluida']);
$objPHPExcel->getActiveSheet()->SetCellValue("X$j",$arreg2['fecha_hora_cierre_total']);
				  }

$objPHPExcel->createSheet();
$objPHPExcel->setActiveSheetIndex(2);
$objPHPExcel->getActiveSheet()->setTitle('proyecto');

$objPHPExcel->getActiveSheet()->SetCellValue('A1','clave_usuario');

    $objPHPExcel->getActiveSheet()->SetCellValue('B1','responsable_op_nombre');
    $objPHPExcel->getActiveSheet()->SetCellValue('C1','primer_apellido_op');
    $objPHPExcel->getActiveSheet()->SetCellValue('D1','segundo_apellido_op');
    $objPHPExcel->getActiveSheet()->SetCellValue('E1','cargo_op');
    $objPHPExcel->getActiveSheet()->SetCellValue('F1','telefono_fijo_op');
    $objPHPExcel->getActiveSheet()->SetCellValue('G1','extension_op');
    $objPHPExcel->getActiveSheet()->SetCellValue('H1','telefono_movil_op');
    $objPHPExcel->getActiveSheet()->SetCellValue('I1','Correo_electronico_op');

    $objPHPExcel->getActiveSheet()->SetCellValue('J1','responsable_adm_nombre');
    $objPHPExcel->getActiveSheet()->SetCellValue('K1','primer_apellido_adm');
    $objPHPExcel->getActiveSheet()->SetCellValue('L1','segundo_apellido_adm');
    $objPHPExcel->getActiveSheet()->SetCellValue('M1','cargo_adm');
    $objPHPExcel->getActiveSheet()->SetCellValue('N1','telefono_fijo_adm');
    $objPHPExcel->getActiveSheet()->SetCellValue('O1','extension_adm');
    $objPHPExcel->getActiveSheet()->SetCellValue('P1','telefono_movil_adm');
    $objPHPExcel->getActiveSheet()->SetCellValue('Q1','correo_electronico_adm');

    $objPHPExcel->getActiveSheet()->SetCellValue('R1','organigrama_nombre1');
    $objPHPExcel->getActiveSheet()->SetCellValue('S1','organigrama_cargo1');
    $objPHPExcel->getActiveSheet()->SetCellValue('T1','organigrama_funciones1');
    $objPHPExcel->getActiveSheet()->SetCellValue('U1','organigrama_nombre2');
    $objPHPExcel->getActiveSheet()->SetCellValue('V1','organigrama_cargo2');
    $objPHPExcel->getActiveSheet()->SetCellValue('W1','organigrama_funciones2');
    $objPHPExcel->getActiveSheet()->SetCellValue('X1','organigrama_nombre3');
    $objPHPExcel->getActiveSheet()->SetCellValue('Y1','organigrama_cargo3');
    $objPHPExcel->getActiveSheet()->SetCellValue('Z1','organigrama_funciones3');
    $objPHPExcel->getActiveSheet()->SetCellValue('AA1','organigrama_nombre4');
    $objPHPExcel->getActiveSheet()->SetCellValue('AB1','organigrama_cargo4');
    $objPHPExcel->getActiveSheet()->SetCellValue('AC1','organigrama_funciones4');
    $objPHPExcel->getActiveSheet()->SetCellValue('AD1','organigrama_nombre5');
    $objPHPExcel->getActiveSheet()->SetCellValue('AE1','organigrama_cargo5');
    $objPHPExcel->getActiveSheet()->SetCellValue('AF1','organigrama_funciones5');
    $objPHPExcel->getActiveSheet()->SetCellValue('AG1','organigrama_nombre6');
    $objPHPExcel->getActiveSheet()->SetCellValue('AH1','organigrama_cargo6');
    $objPHPExcel->getActiveSheet()->SetCellValue('AI1','organigrama_funciones6');
    $objPHPExcel->getActiveSheet()->SetCellValue('AJ1','organigrama_nombre7');
    $objPHPExcel->getActiveSheet()->SetCellValue('AK1','organigrama_cargo7');
    $objPHPExcel->getActiveSheet()->SetCellValue('AL1','organigrama_funciones7');
    $objPHPExcel->getActiveSheet()->SetCellValue('AM1','organigrama_nombre8');
    $objPHPExcel->getActiveSheet()->SetCellValue('AN1','organigrama_cargo8');
    $objPHPExcel->getActiveSheet()->SetCellValue('AO1','organigrama_funciones8');
   
    $objPHPExcel->getActiveSheet()->SetCellValue('AP1','nombre_festival');
    $objPHPExcel->getActiveSheet()->SetCellValue('AQ1','numero_ediciones_previas');
    $objPHPExcel->getActiveSheet()->SetCellValue('AR1','disciplina_2022');
    $objPHPExcel->getActiveSheet()->SetCellValue('AS1','periodo_realizacion_fecha_inicio');
    $objPHPExcel->getActiveSheet()->SetCellValue('AT1','periodo_realizacion_fecha_termino');
    $objPHPExcel->getActiveSheet()->SetCellValue('AU1','objetivo_general');
    $objPHPExcel->getActiveSheet()->SetCellValue('AV1','num_publico_benefiaciado_ant');
    $objPHPExcel->getActiveSheet()->SetCellValue('AW1','descripcion_linea_curotorial');
    $objPHPExcel->getActiveSheet()->SetCellValue('AX1','descripcion_poblacion_audiencia');
    $objPHPExcel->getActiveSheet()->SetCellValue('AY1','acciones_festival_medio_ambiente');
    $objPHPExcel->getActiveSheet()->SetCellValue('AZ1','meta_num_presentaciones');
    $objPHPExcel->getActiveSheet()->SetCellValue('BA1','meta_num_publico');
    $objPHPExcel->getActiveSheet()->SetCellValue('BB1','meta_num_municipio');
    $objPHPExcel->getActiveSheet()->SetCellValue('BC1','meta_num_foros');
    $objPHPExcel->getActiveSheet()->SetCellValue('BD1','meta_num_artistas');
    $objPHPExcel->getActiveSheet()->SetCellValue('BE1','meta_cantidad_grupos');
    $objPHPExcel->getActiveSheet()->SetCellValue('BF1','meta_num_actividades_academicas');
    //$objPHPExcel->getActiveSheet()->SetCellValue('BG1','meta_act_creadores_num_cine_mex');
    $objPHPExcel->getActiveSheet()->SetCellValue('BG1','entidades_a1');
    $objPHPExcel->getActiveSheet()->SetCellValue('BH1','entidades_a2');
    $objPHPExcel->getActiveSheet()->SetCellValue('BI1','entidades_a3');
    $objPHPExcel->getActiveSheet()->SetCellValue('BJ1','entidades_a4');
    $objPHPExcel->getActiveSheet()->SetCellValue('BK1','entidades_a5');
    $objPHPExcel->getActiveSheet()->SetCellValue('BL1','entidades_a6');
    $objPHPExcel->getActiveSheet()->SetCellValue('BM1','entidades_a7');
    $objPHPExcel->getActiveSheet()->SetCellValue('BN1','entidades_a8');
    $objPHPExcel->getActiveSheet()->SetCellValue('BO1','entidades_a9');
    $objPHPExcel->getActiveSheet()->SetCellValue('BP1','entidades_a10');
    $objPHPExcel->getActiveSheet()->SetCellValue('BQ1','desarrollo_proyecto_antecedente');
    $objPHPExcel->getActiveSheet()->SetCellValue('BR1','desarrollo_proyecto_justificacion');
    $objPHPExcel->getActiveSheet()->SetCellValue('BS1','desarrollo_proyecto_descripcion');
    $objPHPExcel->getActiveSheet()->SetCellValue('BT1','desarrollo_proyecto_objetivos_especificos');
    $objPHPExcel->getActiveSheet()->SetCellValue('BU1','fecha_hora_registro');
$k=1;
$sql3 = "SELECT * FROM proyecto where clave_usuario!='' order by clave_usuario;";
#Almacenamos los datos del sql query en la variable  $r
$r3 = mysqli_query($con,$sql3);

 while($arreg3 = mysqli_fetch_assoc($r3))
	{
       
$k=$k+1;
	
         $objPHPExcel->getActiveSheet()->SetCellValue("A$k",$arreg3['clave_usuario']);
   

    $objPHPExcel->getActiveSheet()->SetCellValue("B$k",$arreg3['responsable_op_nombre']);
    $objPHPExcel->getActiveSheet()->SetCellValue("C$k",$arreg3['primer_apellido_op']);
    $objPHPExcel->getActiveSheet()->SetCellValue("D$k",$arreg3['segundo_apellido_op']);
    $objPHPExcel->getActiveSheet()->SetCellValue("E$k",$arreg3['cargo_op']);
    $objPHPExcel->getActiveSheet()->SetCellValue("F$k",$arreg3['telefono_fijo_op']);
    $objPHPExcel->getActiveSheet()->SetCellValue("G$k",$arreg3['extension_op']);
    $objPHPExcel->getActiveSheet()->SetCellValue("H$k",$arreg3['telefono_movil_op']);
    $objPHPExcel->getActiveSheet()->SetCellValue("I$k",$arreg3['Correo_electronico_op']);
    

    $objPHPExcel->getActiveSheet()->SetCellValue("J$k",$arreg3['responsable_adm_nombre']);
    $objPHPExcel->getActiveSheet()->SetCellValue("K$k",$arreg3['primer_apellido_adm']);
    $objPHPExcel->getActiveSheet()->SetCellValue("L$k",$arreg3['segundo_apellido_adm']);
    $objPHPExcel->getActiveSheet()->SetCellValue("M$k",$arreg3['cargo_adm']);
    $objPHPExcel->getActiveSheet()->SetCellValue("N$k",$arreg3['telefono_fijo_adm']);
    $objPHPExcel->getActiveSheet()->SetCellValue("O$k",$arreg3['extension_adm']);
    $objPHPExcel->getActiveSheet()->SetCellValue("P$k",$arreg3['telefono_movil_adm']);
    $objPHPExcel->getActiveSheet()->SetCellValue("Q$k",$arreg3['correo_electronico_adm']);
    

    $objPHPExcel->getActiveSheet()->SetCellValue("R$k",$arreg3['organigrama_nombre1']);
    $objPHPExcel->getActiveSheet()->SetCellValue("S$k",$arreg3['organigrama_cargo1']);
    $objPHPExcel->getActiveSheet()->SetCellValue("T$k",$arreg3['organigrama_funciones1']);
    $objPHPExcel->getActiveSheet()->SetCellValue("U$k",$arreg3['organigrama_nombre2']);
    $objPHPExcel->getActiveSheet()->SetCellValue("V$k",$arreg3['organigrama_cargo2']);
    $objPHPExcel->getActiveSheet()->SetCellValue("W$k",$arreg3['organigrama_funciones2']);
    $objPHPExcel->getActiveSheet()->SetCellValue("X$k",$arreg3['organigrama_nombre3']);
    $objPHPExcel->getActiveSheet()->SetCellValue("Y$k",$arreg3['organigrama_cargo3']);
    $objPHPExcel->getActiveSheet()->SetCellValue("Z$k",$arreg3['organigrama_funciones3']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AA$k",$arreg3['organigrama_nombre4']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AB$k",$arreg3['organigrama_cargo4']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AC$k",$arreg3['organigrama_funciones4']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AD$k",$arreg3['organigrama_nombre5']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AE$k",$arreg3['organigrama_cargo5']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AF$k",$arreg3['organigrama_funciones5']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AG$k",$arreg3['organigrama_nombre6']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AH$k",$arreg3['organigrama_cargo6']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AI$k",$arreg3['organigrama_funciones6']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AJ$k",$arreg3['organigrama_nombre7']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AK$k",$arreg3['organigrama_cargo7']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AL$k",$arreg3['organigrama_funciones7']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AM$k",$arreg3['organigrama_nombre8']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AN$k",$arreg3['organigrama_cargo8']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AO$k",$arreg3['organigrama_funciones8']);

    $objPHPExcel->getActiveSheet()->SetCellValue("AP$k",$arreg3['nombre_festival']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AQ$k",$arreg3['numero_ediciones_previas']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AR$k",$arreg3['disciplina_2022']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AS$k",$arreg3['periodo_realizacion_fecha_inicio']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AT$k",$arreg3['periodo_realizacion_fecha_termino']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AU$k",$arreg3['objetivo_general']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AV$k",$arreg3['num_publico_benefiaciado_ant']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AW$k",$arreg3['descripcion_linea_curotorial']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AX$k",$arreg3['descripcion_poblacion_audiencia']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AY$k",$arreg3['acciones_festival_medio_ambiente']);
    $objPHPExcel->getActiveSheet()->SetCellValue("AZ$k",$arreg3['meta_num_presentaciones']);
    $objPHPExcel->getActiveSheet()->SetCellValue("BA$k",$arreg3['meta_num_publico']);
    $objPHPExcel->getActiveSheet()->SetCellValue("BB$k",$arreg3['meta_num_municipio']);
    $objPHPExcel->getActiveSheet()->SetCellValue("BC$k",$arreg3['meta_num_foros']);
    $objPHPExcel->getActiveSheet()->SetCellValue("BD$k",$arreg3['meta_num_artistas']);
    $objPHPExcel->getActiveSheet()->SetCellValue("BE$k",$arreg3['meta_cantidad_grupos']);
    $objPHPExcel->getActiveSheet()->SetCellValue("BF$k",$arreg3['meta_num_actividades_academicas']);
    $objPHPExcel->getActiveSheet()->SetCellValue("BG$k",$arreg3['meta_act_creadores_num_cine_mex']);

    $entidades_a1=$arreg3['entidades_a1'];
    $cons_enti="SELECT * FROM entidades where id_entidad_proyecto= $entidades_a1;";
            $query_enti2=mysqli_query($con, $cons_enti);
            while($r_enti2=mysqli_fetch_array($query_enti2, MYSQLI_ASSOC)){
            $id_entidad_proyecto 		=	$r_enti2['id_entidad_proyecto'];
          $nombre_entidad_proyecto1	=	$r_enti2['nombre_entidad_proyecto'];
            }    

            $entidades_a2=$arreg3['entidades_a2'];
            $cons_enti="SELECT * FROM entidades where id_entidad_proyecto= $entidades_a2;";
                    $query_enti2=mysqli_query($con, $cons_enti);
                    while($r_enti2=mysqli_fetch_array($query_enti2, MYSQLI_ASSOC)){
                    $id_entidad_proyecto 		=	$r_enti2['id_entidad_proyecto'];
                  $nombre_entidad_proyecto2	=	$r_enti2['nombre_entidad_proyecto'];
                    }    

                    $entidades_a3=$arreg3['entidades_a3'];
                    $cons_enti="SELECT * FROM entidades where id_entidad_proyecto= $entidades_a3;";
                            $query_enti2=mysqli_query($con, $cons_enti);
                            while($r_enti2=mysqli_fetch_array($query_enti2, MYSQLI_ASSOC)){
                            $id_entidad_proyecto 		=	$r_enti2['id_entidad_proyecto'];
                          $nombre_entidad_proyecto3	=	$r_enti2['nombre_entidad_proyecto'];
                            }    

                            
                    $entidades_a4=$arreg3['entidades_a4'];
                    $cons_enti="SELECT * FROM entidades where id_entidad_proyecto= $entidades_a4;";
                            $query_enti2=mysqli_query($con, $cons_enti);
                            while($r_enti2=mysqli_fetch_array($query_enti2, MYSQLI_ASSOC)){
                            $id_entidad_proyecto 		=	$r_enti2['id_entidad_proyecto'];
                          $nombre_entidad_proyecto4	=	$r_enti2['nombre_entidad_proyecto'];
                            }    

                                      
                    $entidades_a5=$arreg3['entidades_a5'];
                    $cons_enti="SELECT * FROM entidades where id_entidad_proyecto= $entidades_a5;";
                            $query_enti2=mysqli_query($con, $cons_enti);
                            while($r_enti2=mysqli_fetch_array($query_enti2, MYSQLI_ASSOC)){
                            $id_entidad_proyecto 		=	$r_enti2['id_entidad_proyecto'];
                          $nombre_entidad_proyecto5	=	$r_enti2['nombre_entidad_proyecto'];
                            }   
                            
                            
                                                
                    $entidades_a6=$arreg3['entidades_a6'];
                    $cons_enti="SELECT * FROM entidades where id_entidad_proyecto= $entidades_a6;";
                            $query_enti2=mysqli_query($con, $cons_enti);
                            while($r_enti2=mysqli_fetch_array($query_enti2, MYSQLI_ASSOC)){
                            $id_entidad_proyecto 		=	$r_enti2['id_entidad_proyecto'];
                          $nombre_entidad_proyecto6	=	$r_enti2['nombre_entidad_proyecto'];
                            }    

                            $entidades_a7=$arreg3['entidades_a7'];
                            $cons_enti="SELECT * FROM entidades where id_entidad_proyecto= $entidades_a7;";
                                    $query_enti2=mysqli_query($con, $cons_enti);
                                    while($r_enti2=mysqli_fetch_array($query_enti2, MYSQLI_ASSOC)){
                                    $id_entidad_proyecto 		=	$r_enti2['id_entidad_proyecto'];
                                  $nombre_entidad_proyecto7	=	$r_enti2['nombre_entidad_proyecto'];
                                    }    

                                    $entidades_a8=$arreg3['entidades_a8'];
                                    $cons_enti="SELECT * FROM entidades where id_entidad_proyecto= $entidades_a8;";
                                            $query_enti2=mysqli_query($con, $cons_enti);
                                            while($r_enti2=mysqli_fetch_array($query_enti2, MYSQLI_ASSOC)){
                                            $id_entidad_proyecto 		=	$r_enti2['id_entidad_proyecto'];
                                          $nombre_entidad_proyecto8	=	$r_enti2['nombre_entidad_proyecto'];
                                            }    

                                            $entidades_a9=$arreg3['entidades_a9'];
                                            $cons_enti="SELECT * FROM entidades where id_entidad_proyecto= $entidades_a9;";
                                                    $query_enti2=mysqli_query($con, $cons_enti);
                                                    while($r_enti2=mysqli_fetch_array($query_enti2, MYSQLI_ASSOC)){
                                                    $id_entidad_proyecto 		=	$r_enti2['id_entidad_proyecto'];
                                                  $nombre_entidad_proyecto9	=	$r_enti2['nombre_entidad_proyecto'];
                                                    }    
                                                    $entidades_a10=$arreg3['entidades_a10'];
                                                    $cons_enti="SELECT * FROM entidades where id_entidad_proyecto= $entidades_a10;";
                                                            $query_enti2=mysqli_query($con, $cons_enti);
                                                            while($r_enti2=mysqli_fetch_array($query_enti2, MYSQLI_ASSOC)){
                                                            $id_entidad_proyecto 		=	$r_enti2['id_entidad_proyecto'];
                                                          $nombre_entidad_proyecto10	=	$r_enti2['nombre_entidad_proyecto'];
                                                            }    

    $objPHPExcel->getActiveSheet()->SetCellValue("BH$k",$nombre_entidad_proyecto1);
    $objPHPExcel->getActiveSheet()->SetCellValue("BI$k",$nombre_entidad_proyecto2);
    $objPHPExcel->getActiveSheet()->SetCellValue("BJ$k",$nombre_entidad_proyecto3);
    $objPHPExcel->getActiveSheet()->SetCellValue("BK$k",$nombre_entidad_proyecto4);
    $objPHPExcel->getActiveSheet()->SetCellValue("BL$k",$nombre_entidad_proyecto5);
    $objPHPExcel->getActiveSheet()->SetCellValue("BM$k",$nombre_entidad_proyecto6);
    $objPHPExcel->getActiveSheet()->SetCellValue("BN$k",$nombre_entidad_proyecto7);
    $objPHPExcel->getActiveSheet()->SetCellValue("BO$k",$nombre_entidad_proyecto8);
    $objPHPExcel->getActiveSheet()->SetCellValue("BP$k",$nombre_entidad_proyecto9);
    $objPHPExcel->getActiveSheet()->SetCellValue("BQ$k",$nombre_entidad_proyecto10);
    $objPHPExcel->getActiveSheet()->SetCellValue("BR$k",$arreg3['desarrollo_proyecto_antecedente']);
    $objPHPExcel->getActiveSheet()->SetCellValue("BS$k",$arreg3['desarrollo_proyecto_justificacion']);
    $objPHPExcel->getActiveSheet()->SetCellValue("BT$k",$arreg3['desarrollo_proyecto_descripcion']);
    $objPHPExcel->getActiveSheet()->SetCellValue("BU$k",$arreg3['desarrollo_proyecto_objetivos_especificos']);
    $objPHPExcel->getActiveSheet()->SetCellValue("BV$k",$arreg3['fecha_hora_registro']);
  }

/////********************** (FIN) PROYECTO PRIMERA PARTE ******************************************

/////********************** (INICIO) PROYECTO 2DA. PARTE *******************************************		

$objPHPExcel->createSheet();
$objPHPExcel->setActiveSheetIndex(3);
$objPHPExcel->getActiveSheet()->setTitle('proyecto_2da_parte');

$objPHPExcel->getActiveSheet()->SetCellValue('A1','clave_usuario');
$objPHPExcel->getActiveSheet()->SetCellValue('B1','nombre_dir');
$objPHPExcel->getActiveSheet()->SetCellValue('C1','primer_apellido_dir');
$objPHPExcel->getActiveSheet()->SetCellValue('D1','segundo_apellido_dir');
$objPHPExcel->getActiveSheet()->SetCellValue('E1','cargo_dir');
$objPHPExcel->getActiveSheet()->SetCellValue('F1','telefono_fijo_dir');
$objPHPExcel->getActiveSheet()->SetCellValue('G1','extension_dir');
$objPHPExcel->getActiveSheet()->SetCellValue('H1','telefono_movil_dir');
$objPHPExcel->getActiveSheet()->SetCellValue('I1','Correo_electronico_dir');
$objPHPExcel->getActiveSheet()->SetCellValue('J1','breve_semblanza_director');
$objPHPExcel->getActiveSheet()->SetCellValue('K1','breve_semblanza_op');
$objPHPExcel->getActiveSheet()->SetCellValue('L1','breve_semblanza_adm');
$jj=1;
$sql3a = "SELECT * FROM proyecto_parte2 where clave_usuario!='' order by clave_usuario;";
$r3a = mysqli_query($con,$sql3a);

 while($arreg3a = mysqli_fetch_assoc($r3a))
    {
$jj=$jj+1;
        $objPHPExcel->getActiveSheet()->SetCellValue("A$jj",$arreg3a['clave_usuario']);
        $objPHPExcel->getActiveSheet()->SetCellValue("B$jj",$arreg3a['nombre_dir']);
        $objPHPExcel->getActiveSheet()->SetCellValue("C$jj",$arreg3a['primer_apellido_dir']);
        $objPHPExcel->getActiveSheet()->SetCellValue("D$jj",$arreg3a['segundo_apellido_dir']);
        $objPHPExcel->getActiveSheet()->SetCellValue("E$jj",$arreg3a['cargo_dir']);
        $objPHPExcel->getActiveSheet()->SetCellValue("F$jj",$arreg3a['telefono_fijo_dir']);
        $objPHPExcel->getActiveSheet()->SetCellValue("G$jj",$arreg3a['extension_dir']);
        $objPHPExcel->getActiveSheet()->SetCellValue("H$jj",$arreg3a['telefono_movil_dir']);
        $objPHPExcel->getActiveSheet()->SetCellValue("I$jj",$arreg3a['Correo_electronico_dir']);
        $objPHPExcel->getActiveSheet()->SetCellValue("J$jj",$arreg3a['breve_semblanza_director']);
        $objPHPExcel->getActiveSheet()->SetCellValue("K$jj",$arreg3a['breve_semblanza_op']);
        $objPHPExcel->getActiveSheet()->SetCellValue("L$jj",$arreg3a['breve_semblanza_adm']);
   }

/////********************** (FIN) PROYECTO 2DA. PARTE *******************************************			

/////////////***************(INICIO) mas_presupuesto ***********************************
$objPHPExcel->createSheet();
$objPHPExcel->setActiveSheetIndex(4);
$objPHPExcel->getActiveSheet()->setTitle('Resumen presupuestal');

$objPHPExcel->getActiveSheet()->SetCellValue('A1','clave_usuario');
$objPHPExcel->getActiveSheet()->SetCellValue('B1','Concepto_gasto');
$objPHPExcel->getActiveSheet()->SetCellValue('C1','Fuente_finan');
$objPHPExcel->getActiveSheet()->SetCellValue('D1','Monto_unidad');
$objPHPExcel->getActiveSheet()->SetCellValue('E1','Porcentaje');
$objPHPExcel->getActiveSheet()->SetCellValue('F1','monto_unidad_total');
$objPHPExcel->getActiveSheet()->SetCellValue('G1','porcentaje_total');
$objPHPExcel->getActiveSheet()->SetCellValue('H1','fecha_hora_registro');

$g=1;
$sql4 = "SELECT * FROM mas_presupuesto where clave_usuario!='' order by clave_usuario;";
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

/////********************** (INICIO) Presupuesto_PROFEST *******************************************
$objPHPExcel->createSheet();
$objPHPExcel->setActiveSheetIndex(5);
$objPHPExcel->getActiveSheet()->setTitle('Presupuesto_PROFEST');

$objPHPExcel->getActiveSheet()->SetCellValue('A1','clave_usuario');
$objPHPExcel->getActiveSheet()->SetCellValue('B1','tipo');
$objPHPExcel->getActiveSheet()->SetCellValue('C1','concepto');
$objPHPExcel->getActiveSheet()->SetCellValue('D1','unidad');
$objPHPExcel->getActiveSheet()->SetCellValue('E1','costo_unitario_imp_incluidos');
$objPHPExcel->getActiveSheet()->SetCellValue('F1','monto_tot_imp_incluidos');

$ss=1;
$sqsl6 = "select * from reque_v2_1_2 where clave_usuario!='' order by clave_usuario;";
$rs6 = mysqli_query($con,$sqsl6);

 while($arregs6 = mysqli_fetch_assoc($rs6))
	{
		 							
$ss=$ss+1;
	
$objPHPExcel->getActiveSheet()->SetCellValue("A$ss",$arregs6['clave_usuario']);
$objPHPExcel->getActiveSheet()->SetCellValue("B$ss",$arregs6['tipo']);
$objPHPExcel->getActiveSheet()->SetCellValue("C$ss",$arregs6['concepto']);
$objPHPExcel->getActiveSheet()->SetCellValue("D$ss",$arregs6['unidad']);
$objPHPExcel->getActiveSheet()->SetCellValue("E$ss",$arregs6['costo_unitario_imp_incluidos']);
$objPHPExcel->getActiveSheet()->SetCellValue("F$ss",$arregs6['monto_tot_imp_incluidos']);
	}		  
/////********************** (FIN) Presupuesto_PROFEST *******************************************


/////********************** (INICIO) mas metas numericas *******************************************											
$objPHPExcel->createSheet();
$objPHPExcel->setActiveSheetIndex(6);
$objPHPExcel->getActiveSheet()->setTitle('mas_metas');

$objPHPExcel->getActiveSheet()->SetCellValue('A1','clave_usuario');
$objPHPExcel->getActiveSheet()->SetCellValue('B1','nombre_meta');
$objPHPExcel->getActiveSheet()->SetCellValue('C1','cantidad');
$objPHPExcel->getActiveSheet()->SetCellValue('D1','fecha_hora_registro');

$c=1;
$sql5 = "select * from mas_metas_numericas where clave_usuario!='' order by clave_usuario;";
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
				  
/*/////********************** (INICIO) mas lugares *******************************************
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
        $Domicilioforo = utf8_encode($arreg6['cpforo'].' '.$arreg6['estadoforo'].' '.$arreg6['mun_alcforo'].' '.$arreg6['coloniaforo'].' '.$arreg6['calleforo'].' '.$arreg6['no_extforo'].' '.$arreg6['no_intforo']);			
$d=$d+1;
	
$objPHPExcel->getActiveSheet()->SetCellValue("A$d",$arreg6['clave_usuario']);
$objPHPExcel->getActiveSheet()->SetCellValue("B$d",utf8_encode($arreg6['Nombreforo']));
$objPHPExcel->getActiveSheet()->SetCellValue("C$d",$Domicilioforo);
$objPHPExcel->getActiveSheet()->SetCellValue("D$d",utf8_encode($arreg6['Descripcionlug']));
$objPHPExcel->getActiveSheet()->SetCellValue("E$d",$arreg6['fecha_hora_registro']);
				  }				  
/////********************** (FIN) mas lugares ********************************************/


/////********************** (INICIO) CRONOGRAMA ACCIONES *******************************************
/*$objPHPExcel->createSheet();
$objPHPExcel->setActiveSheetIndex(4);
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
				  }		*/		  
/////********************** (FIN) CRONOGRAMA ACCIONES *******************************************


				



$objPHPExcel->setActiveSheetIndex(0);

$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
$objWriter->save('temp/nombredearchivo.xlsx');
?>