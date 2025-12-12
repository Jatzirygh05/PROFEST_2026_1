<?php
require_once('correo_envia/class.phpmailer.php');
require_once("correo_envia/class.smtp.php");

	$sql_consulta_sol = "SELECT * FROM `solicitud` WHERE `clave_usuario` = '".$cve_user."'"; 
			$resultado_sql_consulta_sol = mysql_query($sql_consulta_sol);
			$num_resultados_SOL = mysql_num_rows($resultado_sql_consulta_sol);
			for ($Y=0; $Y <$num_resultados_SOL; $Y++)
			{
				$row_sol = mysql_fetch_array($resultado_sql_consulta_sol);
				$id_solicitud = $row_sol["id_solicitud"];
			}

// Creación de la instancia
$mailWeb = new PHPMailer();
// Seteo del uso
$mailWeb->IsSMTP(); // Uso SMTP
// Seteo de la seguridad
$mailWeb->SMTPSecure = 'tls';
// Host
$mailWeb->Host = "smtp.office365.com";
// Degug. Valores 1 -> errores y mensajes // 2 solo mensajes // 0 no informa nada
$mailWeb->SMTPDebug = 0;
// Autenticación
$mailWeb->SMTPAuth = true;
// Puerto
$mailWeb->Port = 587;
// Usuario
$mailWeb->Username = "profest@cultura.gob.mx";
// Contraseña
$mailWeb->Password = "Sdac_19_A";
// Quien envia
$mailWeb->SetFrom("profest@cultura.gob.mx", "SECRETARIA DE CULTURA PROFEST");
//Definir a quien se le entrega copia
$mailWeb->AddCC("jghernandez@cultura.gob.mx");
// A quien se responderá
//$mailWeb->AddReplyTo("cuenta@dominio.com", "Nombres");
// Asunto del email
$mailWeb->Subject = "Registro finalizado";
// En caso de que la vista HTML no esté activida. Esto ya es muy poco probable
$mailWeb->AltBody = "Para ver correctamente este mensaje use la vista de HTML";

$ext="";
$Mail="$Correo";
$linea0 = "Convocatoria PROFEST 2020";
$linea1 = utf8_decode("Te informamos que se ha registrado tu proyecto exitosamente con el No. de Solicitud ".$id_solicitud);
$linea2 = "Atentamente.";
$linea3 = utf8_decode("Unidad operativa");
$linea4 = utf8_decode("Secretaría de Cultura.");

$body = '<table align="center" width="60%">
			<tr>
				<td>
					<center><img src="./imagenes/encabezado.jpg" width="150px" height="50px"></center>
				</td>
			</tr>
			<tr>
				<td>
					<p>&nbsp;</p>
					  <p><div style="font-family:Helvetica,Arial; font-size:18px"><strong>'.$linea0.'</strong></div></p>
					  
					  <div style="font-family:Helvetica,Arial; font-size:16px">
					  <p>'.$linea1.'</p>
					  
					  <p>'.$linea2.'<br><br>'.$linea3.'<br>'.$linea4.'</p>
					</div>
		  		</td>
       		</tr>
			<tr><td><br><p>&nbsp;</p></td></tr>
			<tr height=58>		
					
				<td width="50%" style="width:50.0%;background:#393C3E;padding:.69pt 27px .69pt 22px;height:48.0pt">
					
           		</td>
        	</tr>
			
		</table>';
		/*<h4>Paseo de la Reforma No. 175 | Col. Cuauht&eacute;moc | Delegaci&oacute;n Cuauht&eacute;moc | C.P.06500 | 
					Ciudad de M&eacute;xico <br> Tel&eacute;fono: (55) 41550200 | Ext. '.$ext.'</h4>*/


// El cuerpo del mensaje. 
$mailWeb->MsgHTML($body);
//echo $body;
//Adjuntar archivos
//$mailWeb->AddAttachment("../images/eliminar.gif", "eliminar.gif");
// Dirección del destinatario
$mailWeb->AddAddress($Mail);

// Enviar el correo
//$mailWeb->Send();
if(!$mailWeb->Send()) {
echo "Error al enviar el correo: " . $mailWeb->ErrorInfo;
} else {
//echo "Correo enviado!!";
}

/*
echo "<br>";
$str = "A_CRUZH@HOTMAIL.COM";
echo $str = strtolower($str);
echo "<br>".strtoupper($str)

//envío el mensaje, comprobando si se envió correctamente
if(!$mail­>Send()) {
echo "Error al enviar el mensaje: " . $mail­>ErrorInfo;
} else {
echo "Mensaje enviado!!";
}
$mail­>CharSet = "UTF­8";
$mail­>Encoding = "quoted­printable";
 */
?>