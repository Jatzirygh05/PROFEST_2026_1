<?php 
#Damos formato a los archivos de salida de la tabla, en este caso les damos formato .xls
header("Pragma: public");
header("Expires: 0");
header("Content-type: application/x-msdownload; charset=iso-8859-1");
header("Content-Disposition: attachment; filename=Festival_Datos".date('d-m-Y').".xls");
#Incluimos el archivo de conexion a la DB, la variable que contiene los datos de la conexion esta definida con el nombre: $con
include ("../../Connections/conexion.php");
#Liga para adjuntar la descarga:
#Consulta de los datos requeridos referente a las tablas Solicitud,Proyecto,Usuarios en todos los id de solicitud existentes en la DB.
$sql = "SELECT clave_usuario, nombre_instancia_postulante, estado, municio_alcaldia, tipo_instancia, 
grado_academico, nombre_titular, primer_apellido, cargo, lada, telefono_fijo, 
correo_electronico, calle, no_ext, colonia, cp FROM usuarios;";
#Almacenamos los datos del sql query en la variable  $r
$r = mysqli_query($con,$sql);
#Definimos la variable de retorno que contendra la tabla que se exportara a excel y damos formato de salida a la tabla de excel creada en base a la consulta SQL 
$return = '';   
$return .= '<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" style="background-color: #F6F6F6;">
<tr>
<th><strong><font size=2 face=sans-serif> Usuario </font></strong></th>
<th><strong><font size=2 face=sans-serif> Nombre legal de la Instancia </font></strong></th>
<th><strong><font size=2 face=sans-serif> Tipo de Instancia </font></strong></th>
<th><strong><font size=2 face=sans-serif> Grado acad&eacute;mico del titular </font></strong></th>
<th><strong><font size=2 face=sans-serif> Nombre del titular </font></strong></th>
<th><strong><font size=2 face=sans-serif> Cargo del titular </font></strong></th>
<th><strong><font size=2 face=sans-serif> Lada </font></strong></th>
<th><strong><font size=2 face=sans-serif> Tel&eacute;fono del titular </font></strong></th>
<th><strong><font size=2 face=sans-serif> Correo del titular </font></strong></th>
<th><strong><font size=2 face=sans-serif> C&oacute;digo Postal </font></strong></th>
<th><strong><font size=2 face=sans-serif> Estado de la instancia </font></strong></th>
<th><strong><font size=2 face=sans-serif> Alcaldia de la instancia </font></strong></th>
<th><strong><font size=2 face=sans-serif> Colonia </font></strong></th>
<th><strong><font size=2 face=sans-serif> Calle </font></strong></th>
<th><strong><font size=2 face=sans-serif> N&uacute;mero </font></strong></th>
</tr>
';
			 	  #Almacenamos los datos en arreglos referentes a cada columna de datos extraida de la DB    
				  while( $arreg = mysqli_fetch_assoc($r))
				  {
					$clave_usuario  						= $arreg["clave_usuario"];
					$nombre_instancia_postulante		   	= utf8_decode($arreg["nombre_instancia_postulante"]);
					$estado    								= $arreg["estado"];
					$municio_alcaldia        				= $arreg["municio_alcaldia"];
					$tipo_instancia        					= $arreg["tipo_instancia"];
					$grado_academico        				= $arreg["grado_academico"];
					$nombre_titular        					= utf8_decode($arreg["nombre_titular"]);
					$primer_apellido        				= $arreg["primer_apellido"];
					$cargo        							= utf8_decode($arreg["cargo"]);
					$lada  									= $arreg["lada"];
					$telefono_fijo        					= $arreg["telefono_fijo"];
					$correo_electronico        				= $arreg["correo_electronico"];
					$calle        							= utf8_decode($arreg["calle"]);
					$no_ext     							= $arreg["no_ext"];
					$colonia        						= $arreg["colonia"];
					$cp        								= $arreg["cp"];
							

$sql_estado = "SELECT c_estado, d_estado, c_mnpio, D_mnpio FROM codigos_postales WHERE cp='$cp' and c_estado ='$estado' and c_mnpio='$municio_alcaldia' group by cp, c_estado, c_mnpio;";
$r_estado = mysqli_query($con,$sql_estado);
$arreg2 = mysqli_fetch_assoc($r_estado);
				 // {
					$c_estado = $arreg2["c_estado"];
					$c_mnpio  = $arreg2["c_mnpio"];
					$estado_imp  = $arreg2["d_estado"];
					$municio_alcaldia_imp  = $arreg2["D_mnpio"];
				  //}*/

$return .= 
'
<tr>
<td><font size=2 face=sans-serif> '.$clave_usuario.' </font></td>
<td><font size=2 face=sans-serif> '.$nombre_instancia_postulante.' </font></td>
<td><font size=2 face=sans-serif> '.$tipo_instancia.' </font></td>
<td><font size=2 face=sans-serif> '.$grado_academico.' </font></td>
<td><font size=2 face=sans-serif> '.$nombre_titular.$primer_apellido.' </font></td>
<td><font size=2 face=sans-serif> '.$cargo.' </font></td>
<td><font size=2 face=sans-serif> '.$lada.' </font></td>
<td><font size=2 face=sans-serif> '.$telefono_fijo.' </font></td>
<td><font size=2 face=sans-serif> '.$correo_electronico.' </font></td>
<td><font size=2 face=sans-serif> '.$cp.' </font></td>
<td><font size=2 face=sans-serif> '.$c_estado.'-'.$estado_imp.' </font></td>
<td><font size=2 face=sans-serif> '.$c_mnpio.'-'.$municio_alcaldia_imp.' </font></td>
<td><font size=2 face=sans-serif> '.$colonia.' </font></td>
<td><font size=2 face=sans-serif> '.$calle.' </font></td>
<td><font size=2 face=sans-serif> '.$no_ext.' </font></td>
</tr>';
}
/*
#Hacemos el return de la columna nombre_instancia_postulante
$return .= '<tr><td height=20 colspan=4><strong><font size=2 face=Geneva, Geneva, Arial, Helvetica, sans-serif>Nombre legal de la Instancia: '.$nombre_instancia_postulante.'</font></strong></td>
</tr>';
#Hacemos el return de la columna estado
$return .= '<tr><td colspan=4><strong><font size=2 face=Geneva, Geneva, Arial, Helvetica, sans-serif>Entidad/Estado de la instancia: '.$estado.'</font></strong></td>
</tr>';
#Hacemos el return de la columna municio_alcaldia
$return .= '<tr><td colspan=4><strong><font size=2 face=Geneva, Geneva, Arial, Helvetica, sans-serif>Municipio/Alcaldia de la instancia: '.$municio_alcaldia.'</font></strong></td>
</tr>';
#Hacemos el return de la columna tipo_instancia
$return .= '<tr><td height=20 colspan=4><strong><font size=2 face=Geneva, Geneva, Arial, Helvetica, sans-serif>Tipo de Instancia: '.$tipo_instancia.'</font></strong></td>
</tr>';
#Hacemos el return de la columna grado_academico
$return .= '<tr><td height=20 colspan=4><strong><font size=2 face=Geneva, Geneva, Arial, Helvetica, sans-serif>Grado acad&eacute;mico del titular: '.$grado_academico.'</font></strong></td>
</tr>';
#Hacemos el return de la columna nombre_titular concatenada a primer_apellido
$return .= '<tr><td height=20 colspan=4><strong><font size=2 face=Geneva, Geneva, Arial, Helvetica, sans-serif>Nombre del titular: '.$nombre_titular.$primer_apellido.'</font></strong></td>
</tr>';
#Hacemos el return de la columna cargo
$return .= '<tr><td height=20 colspan=4><strong><font size=2 face=Geneva, Geneva, Arial, Helvetica, sans-serif>Cargo del titular: '.$cargo.'</font></strong></td>
</tr>';
#Hacemos el return de la columna telefono_fijo
$return .= '<tr><td height=20 colspan=4><strong><font size=2 face=Geneva, Geneva, Arial, Helvetica, sans-serif>Tel&eacute;fono del titular: '.$telefono_fijo.'</font></strong></td>
</tr>';
#Hacemos el return de la columna correo_electronico
$return .= '<tr><td height=20 colspan=4><strong><font size=2 face=Geneva, Geneva, Arial, Helvetica, sans-serif>Correo del titular: '.$correo_electronico.'</font></strong></td>
</tr>';
#Hacemos el return de la columna calle
$return .= '<tr><td height=20 colspan=4><strong><font size=2 face=Geneva, Geneva, Arial, Helvetica, sans-serif>Calle: '.$calle.'</font></strong></td>
</tr>';
#Hacemos el return de la columna no_ext
$return .= '<tr><td height=20 colspan=4><strong><font size=2 face=Geneva, Geneva, Arial, Helvetica, sans-serif>N&uacute;mero: '.$no_ext.'</font></strong></td>
</tr>';
#Hacemos el return de la columna colonia
$return .= '<tr><td height=20 colspan=4><strong><font size=2 face=Geneva, Geneva, Arial, Helvetica, sans-serif>Colonia: '.$colonia.'</font></strong></td>
</tr>';
#Hacemos el return de la columna cp
$return .= '<tr><td height=20 colspan=4><strong><font size=2 face=Geneva, Geneva, Arial, Helvetica, sans-serif>C&oacute;digo Postal: '.$cp.'</font></strong></td>
</tr>';
#Hacemos el return de la columna responsable_adm_nombre concatenada con la columna primer_apellido_adm
$return .= '<tr><td height=20 colspan=4><strong><font size=2 face=Geneva, Geneva, Arial, Helvetica, sans-serif>Nombre del enlace administrativo: '.$responsable_adm_nombre.$primer_apellido_adm.'</font></strong></td>
</tr>';
#Hacemos el return de la columna cargo_adm
$return .= '<tr><td height=20 colspan=4><strong><font size=2 face=Geneva, Geneva, Arial, Helvetica, sans-serif>Cargo del enlace administrativo: '.$cargo_adm.'</font></strong></td>
</tr>';
#Hacemos el return de la columna telefono_fijo_adm
$return .= '<tr><td height=20 colspan=4><strong><font size=2 face=Geneva, Geneva, Arial, Helvetica, sans-serif>Tel&eacute;fono del enlace administrativo: '.$telefono_fijo_adm.'</font></strong></td>
</tr>';
#Hacemos el return de la columna correo_electronico_adm
$return .= '<tr><td height=20 colspan=4><strong><font size=2 face=Geneva, Geneva, Arial, Helvetica, sans-serif>Correo del enlace administrativo: '.$correo_electronico_adm.'</font></strong></td>
</tr>';
#Hacemos el return de la columna responsable_op_nombre contenado con la columna primer_apellido_op
$return .= '<tr><td height=20 colspan=4><strong><font size=2 face=Geneva, Geneva, Arial, Helvetica, sans-serif>Nombre del responsable operativo: '.$responsable_op_nombre.$primer_apellido_op.'</font></strong></td>
</tr>';
#Hacemos el return de la columna cargo_op
$return .= '<tr><td height=20 colspan=4><strong><font size=2 face=Geneva, Geneva, Arial, Helvetica, sans-serif>Cargo del responsable operativo: '.$cargo_op.'</font></strong></td>
</tr>';
#Hacemos el return de la columna telefono_fijo_op
$return .= '<tr><td height=20 colspan=4><strong><font size=2 face=Geneva, Geneva, Arial, Helvetica, sans-serif>Tel&eacute;fono del responsable operativo: '.$telefono_fijo_op.'</font></strong></td>
</tr>';
#Hacemos el return de la columna Correo_electronico_op
$return .= '<tr><td height=20 colspan=4><strong><font size=2 face=Geneva, Geneva, Arial, Helvetica, sans-serif>Correo del responsable operativo: '.$Correo_electronico_op.'</font></strong></td>
</tr>';
#Hacemos el return de la columna pagina_web_festival
$return .= '<tr><td height=20 colspan=4><strong><font size=2 face=Geneva, Geneva, Arial, Helvetica, sans-serif>P&aacute;gina Web: '.$pagina_web_festival.'</font></strong></td>
</tr>';
#Hacemos el return de la columna facebook_festival
$return .= '<tr><td height=20 colspan=4><strong><font size=2 face=Geneva, Geneva, Arial, Helvetica, sans-serif>Facebook: '.$facebook_festival.'</font></strong></td>
</tr>';
#Hacemos el return de la columna twitter_festival
$return .= '<tr><td height=20 colspan=4><strong><font size=2 face=Geneva, Geneva, Arial, Helvetica, sans-serif>Twitter: '.$twitter_festival.'</font></strong></td>
</tr>';
$return .= '</tr>';
*/
$return .= '
</table>';
#Limpiamos los datos de la consulta
mysqli_free_result($r);
#Cerramos la DB
mysqli_close($con);
#Retornamos tabla
echo $return;
?>
