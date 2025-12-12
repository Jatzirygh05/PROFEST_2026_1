<?php
require_once('correo_envia/class.phpmailer.php');
require_once("correo_envia/class.smtp.php");

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
$mailWeb->Port = 25;
// Usuario
$mailWeb->Username = "jghernandez@cultura.gob.mx";
// Contraseña
$mailWeb->Password = "Jatziry2017";
// Quien envia
$mailWeb->SetFrom("jghernandez@cultura.gob.mx", "SECRETARIA DE CULTURA PROFEST");
//Definir a quien se le entrega copia
//$mailWeb->AddCC("sdpc.cmr@cultura.gob.mx");
// A quien se responderá
//$mailWeb->AddReplyTo("cuenta@dominio.com", "Nombres");
// Asunto del email
$mailWeb->Subject = "Cuenta Activada";
// En caso de que la vista HTML no esté activida. Esto ya es muy poco probable
$mailWeb->AltBody = "Para ver correctamente este mensaje use la vista de HTML";

$ext="";
$nombre_firma="Atentamente";
$puesto_firma=utf8_decode("Coordinación Mixta Rectora");
$Mail="$Correo";
$Pass=utf8_encode($Pass);
$linea0="Estimado  ".$nombre;
$linea1 = utf8_decode("Te damos la Bienvenida al Sistema PROFEST de la Secretaría de Cultura, te informamos que tu cuenta ha sido activada correctamente:");
$foliousr = utf8_decode("Usuario: $cual_usu");
$passusr = utf8_decode("Contraseña: $cons_cual_primero");

$body = '<table align="center" width="60%">
			<tr>
				<td>
					<center><img src="imagenes/encabezado.jpg" width="100%" height="76px"></center>
				</td>
			</tr>
			
			<tr>
				<td>
					<p>&nbsp;</p>
					  <p><div style="font-family:Helvetica,Arial; font-size:18px"><strong>'.$linea0.'</strong></div></p>
					  
					  <div style="font-family:Helvetica,Arial; font-size:16px">
					  <p>'.$linea1.'</p>
					  <p>'.$foliousr.'</p>
					  <p>'.$passusr.'</p>
						<p>Sin otro asunto en particular, reciba un cordial saludo.</p>
					</div>
		  		</td>
       		</tr>
			<tr>
				<td>
					<br>
						<p><div style="font-family:Helvetica,Arial; font-size:16px"><strong>'.$nombre_firma.'<br>'.$puesto_firma.'</strong></div></p>
					<br>
				</td>
			</tr>
			
			<tr height=76>
			
					<p>&nbsp;</p>
				<td width="50%" style="width:50.0%;background:#393C3E;padding:.69pt 27px .69pt 22px;height:57.0pt">
					
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