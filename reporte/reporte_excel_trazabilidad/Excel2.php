<?php 
#Damos formato a los archivos de salida de la tabla, en este caso les damos formato .xls
header("Pragma: public");
header("Expires: 0");
header("Content-type: application/x-msdownload; charset=iso-8859-1");
header("Content-Disposition: attachment; filename=Festival_Datos_Parte2_".date('d-m-Y').".xls");
#Incluimos el archivo de conexion a la DB, la variable que contiene los datos de la conexion esta definida con el nombre: $con
include ("../../Connections/conexion.php");
#Consulta de los datos requeridos referente a las tablas Solicitud y Usuarios en todos los id de solicitud existentes en la DB.
$sql = "SELECT 
id_solicitud,nombre_festival,nombre_instancia_postulante,tipo_instancia,grado_academico,nombre_titular,
primer_apellido,cargo,telefono_fijo,correo_electronico,calle,no_ext,colonia,usuarios.cp,responsable_adm_nombre,primer_apellido_adm,cargo_adm,
telefono_fijo_adm,correo_electronico_adm,responsable_op_nombre,primer_apellido_op,cargo_op,telefono_fijo_op,Correo_electronico_op,pagina_web_festival,
facebook_festival,twitter_festival,D_mnpio,d_estado
FROM solicitud INNER JOIN proyecto ON (solicitud.clave_usuario = proyecto.clave_usuario)
INNER JOIN usuarios ON (usuarios.clave_usuario = solicitud.clave_usuario)
INNER JOIN codigos_postales ON (usuarios.cp = codigos_postales.cp) AND solicitud.id_solicitud > 0;";
#Almacenamos los datos del sql query en la variable  $r
$r = mysqli_query($con,$sql);
#Definimos la variable de retorno que contendra la tabla que se exportara a excel y damos formato de salida a la tabla de excel creada en base a la consulta SQL 
$return = '';  
$Falta = 'Este dato no existe en la DB';   
$D_Literatura = ' Literatura. ';
$D_Gastronomia = ' Gastronomia. ';
$D_Cinematografia = ' Cinematografia. ';
$D_AP = ' Artes Plasticas. ';
$D_AE = ' Artes escenicas. ';
$MensajeFinal = '';
#Damos formato a la tabla y a las columnas receptoras de la informacion
$return .= '<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" style="background-color: #F6F6F6;">
<tr>
<th><strong><font size=2 face=sans-serif> No. Solicitud </font></strong></th>
<th><strong><font size=2 face=sans-serif> Nombre del Festival </font></strong></th>
<th><strong><font size=2 face=sans-serif> Nombre legal de la Instancia </font></strong></th>
<th><strong><font size=2 face=sans-serif> Estado de la instancia </font></strong></th>
<th><strong><font size=2 face=sans-serif> Alcaldia de la instancia </font></strong></th>
<th><strong><font size=2 face=sans-serif> Tipo de Instancia </font></strong></th>
<th><strong><font size=2 face=sans-serif> No de ediciones previas </font></strong></th>
<th><strong><font size=2 face=sans-serif> Disciplina del proyecto </font></strong></th>
<th><strong><font size=2 face=sans-serif> Duracion del festival (dias) </font></strong></th>
<th><strong><font size=2 face=sans-serif> Fecha de inicio del festival </font></strong></th>
<th><strong><font size=2 face=sans-serif> Fecha de termino del festival </font></strong></th>
<th><strong><font size=2 face=sans-serif> Costo total del festival </font></strong></th>
<th><strong><font size=2 face=sans-serif> Monto solicitado a la secretaria de cultura </font></strong></th>
</tr>
';
			 	  #Almacenamos los datos en arreglos referentes a cada columna de datos extraida de la DB    
				  while( $arreg = mysqli_fetch_assoc($r))
				  {
					$id_solicitud  							= $arreg["id_solicitud"];
					$nombre_festival						= $arreg["nombre_festival"];
					$nombre_instancia_postulante		   	= $arreg["nombre_instancia_postulante"];
					$estado    								= $arreg["estado"];
					$municio_alcaldia        				= $arreg["municio_alcaldia"];
					$tipo_instancia        					= $arreg["tipo_instancia"];
					$numero_ediciones_previas        		= $arreg["numero_ediciones_previas"];
					$periodo_realizacion_fecha_inicio       = $arreg["periodo_realizacion_fecha_inicio"];
					$periodo_realizacion_fecha_termino      = $arreg["periodo_realizacion_fecha_termino"];
					$Infor_finan_costo_monto        		= $arreg["Infor_finan_costo_monto"];
					$Infor_finan_apoyo_monto        		= $arreg["Infor_finan_apoyo_monto"];
					#Datos para comparacion
					$disciplina_artes_escenicas        		= $arreg["disciplina_artes_escenicas"];
					$disciplina_artes_plasticas        		= $arreg["disciplina_artes_plasticas"];
					$disciplina_cinematografia        		= $arreg["disciplina_cinematografia"];
					$disciplina_gastronomia        			= $arreg["disciplina_gastronomia"];
					$disciplina_literatura        			= $arreg["disciplina_literatura"];
					#Hacemos un if para la comparacion
					if ($disciplina_artes_escenicas == 1)
					{
						$MensajeFinal .= $D_AE;
					}
					if ($disciplina_artes_plasticas == 1)
					{
						$MensajeFinal .= $D_AP;
					}
					if ($disciplina_cinematografia == 1)
					{
						$MensajeFinal .= $D_Cinematografia;
					}
					if ($disciplina_gastronomia == 1)
					{
						$MensajeFinal .= $D_Gastronomia;
					}
					if ($disciplina_literatura == 1)
					{
						$MensajeFinal .= $D_Literatura;
					}
#Posicionamos los datos en sus columnas respectivas
$return .=' 

<tr>
<td> '.$id_solicitud.' </td>
<td><font size=2 face=sans-serif> '.$nombre_festival.' </font></td>
<td><font size=2 face=sans-serif> '.$nombre_instancia_postulante.' </font></td>
<td><font size=2 face=sans-serif> '.$estado.' </font></td>
<td><font size=2 face=sans-serif> '.$municio_alcaldia.' </font></td>
<td><font size=2 face=sans-serif> '.$tipo_instancia.' </font></td>
<td><font size=2 face=sans-serif> '.$numero_ediciones_previas.' </font></td>
<td><font size=2 face=sans-serif> '.$MensajeFinal.' </font></td>
<td><font size=2 face=sans-serif> '.$Falta.' </font></td>
<td><font size=2 face=sans-serif> '.$periodo_realizacion_fecha_inicio.' </font></td>
<td><font size=2 face=sans-serif> '.$periodo_realizacion_fecha_termino.' </font></td>
<td><font size=2 face=sans-serif> '.$Infor_finan_costo_monto.' </font></td>
<td><font size=2 face=sans-serif> '.$Infor_finan_apoyo_monto.' </font></td>
</tr>';
}
$return .= '
</table>';
#Limpiamos los datos de la consulta
mysqli_free_result($r);
#Cerramos la DB
mysqli_close($con);
#Retornamos tabla
echo $return;
?>
