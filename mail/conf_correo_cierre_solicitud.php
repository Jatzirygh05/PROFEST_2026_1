<?php //echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=index_cierre.php'>";
require_once('mail/PHPMailer-6.5.3/src/SMTP.php');
require_once('mail/PHPMailer-6.5.3/src/PHPMailer.php');
require_once('mail/PHPMailer-6.5.3/src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$ext="";
$Mail="$Correo";

$mail = new PHPMailer(true);
try {
    $mail->SMTPDebug = 0;  // Sacar esta línea para no mostrar salida debug
    $mail->isSMTP();
    $mail->Host = 'smtp.office365.com';  // Host de conexión SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'festivales@cultura.gob.mx';          // Usuario SMTP
    $mail->Password = 'Feztivales_profest1';                           // Password SMTP
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;     // Activar seguridad TLS
    $mail->Port = 25;                                    // Puerto SMTP
	$mail_envio=$Mail;
	$mail->setFrom('festivales@cultura.gob.mx');		// Mail del remitente
    $mail->addAddress($mail_envio);     // Mail del destinatario


	$sql_consulta_sol = "SELECT * FROM `solicitud` WHERE `clave_usuario` = '".$cve_user."'"; 
			$resultado_sql_consulta_sol = mysqli_query($con, $sql_consulta_sol);
			$num_resultados_SOL = mysqli_num_rows($resultado_sql_consulta_sol);
			for ($Y=0; $Y <$num_resultados_SOL; $Y++)
			{
				$row_sol = mysqli_fetch_array($resultado_sql_consulta_sol);
				$id_solicitud = $row_sol["id_solicitud"];
			}

// Asunto del email
$mailWeb->Subject = "Registro finalizado";

$linea0 = "Convocatoria PROFEST 2026";
$linea1 = utf8_decode("Te informamos que se ha registrado tu proyecto exitosamente con el No. de Solicitud ".$id_solicitud);
$linea2 = "Atentamente.";
$linea3 = utf8_decode("Dirección General de Promoción y Festivales Culturales.");
$linea4 = utf8_decode("Secretaría de Cultura.");

$mensaje_enviar = '<table align="center" width="60%">
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
		</table>';

		$mail->isHTML(true);
		$mail->Subject = 'Registro finalizado';  // Asunto del mensaje
		$mail->Body    = $mensaje_enviar;    // Contenido del mensaje (acepta HTML)
		$mail->AltBody = 'Este es el contenido del mensaje en texto plano';    // Contenido del mensaje alternativo (texto plano)
	 
		$mail->send();
		echo 'El mensaje ha sido enviado';
} catch (Exception $e) {
	echo 'El mensaje no se ha podido enviar, error: ', $mail->ErrorInfo;
}
	
