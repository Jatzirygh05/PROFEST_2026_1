<?php
require_once('mail/PHPMailer-6.5.3/src/SMTP.php');
require_once('mail/PHPMailer-6.5.3/src/PHPMailer.php');
require_once('mail/PHPMailer-6.5.3/src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class SendEmail
{
    private $mail;
    private $host;
    private $SMTPAuth;
    private $Username;
    private $Password;
    private $SMTPSecure;
    private $Port;

    private $mailFrom;
    private $mailSender;
    function __construct()
    {
       /* $this->mail       = new  PHPMailer(true);
        $this->host       ="smtp.office365.com";
        $this->SMTPAuth   =true;
        $this->Username   ="festivales@cultura.gob.mx";
        $this->Password   ="Fezt2018";
        $this->SMTPSecure =PHPMailer::ENCRYPTION_STARTTLS;
        $this->Port       =25;
        
        $this->mailFrom   ="festivales@cultura.gob.mx";
        $this->mailSender ="CodigoWebLibre";*/
    }

    public function newEmail($mailFrom="festivales@cultura.gob.mx", $mailSender="SECRETAR$&Iacute;A DE CULTURA PROFEST",  $mailFor='jghernandez@cultura.gob.mx', $mailRecipientName="", $mailSubject="Cuenta Activada", $mailBody="")
    {
       try {
            //Server settings
            $this->mail->SMTPDebug = false;
            $this->mail->isSMTP();
            $this->mail->Host       = $this->host;
            $this->mail->SMTPAuth   = $this->SMTPAuth;
            $this->mail->Username   = $this->Username;
            $this->mail->Password   = $this->Password;
            $this->mail->SMTPSecure = $this->SMTPSecure;
            $this->mail->Port       = $this->Port;
 
            //Recipients
            $mailFrom   =($mailFrom=="" || empty($mailFrom))?$this->mailFrom:$mailFrom;
            $mailSender =($mailSender=="" || empty($mailSender))?$this->mailSender:$mailSender;

            $this->mail->setFrom($mailFrom, $mailSender);
            $this->mail->addAddress($mailFor, $mailRecipientName);     // Add a recipient
            $this->mail->addReplyTo($mailFrom, $mailSender);
            // $this->mail->addCC('cc@example.com');
            // $this->mail->addBCC('bcc@example.com');

            // Attachments
            // $this->mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $this->mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            $mensaje_enviar = "<table align='center' width='60%'>
			<tr>
				<td>
					<p><div style='font-family:Helvetica,Arial; font-size:18px; color:#FF0000'><strong>FAVOR DE NO CONTESTAR A ESTE CORREO, CUALQUIER DUDA O COMENTARIO FAVOR DE COMUNICARSE A profest@cultura.gob.mx</strong></div></p>
					<br>
					  <p><div style='font-family:Helvetica,Arial; font-size:18px'><strong>Atentamente<br>
                      Direcci&oacute;n General de Promoci&oacute;n y Festivales Culturales.</strong></div></p>
					  <div style='font-family:Helvetica,Arial; font-size:16px'>
					  <p>Estimada/o postulante  ".$nombre_usuario_reg_proyecto."<br>
                      Te damos la Bienvenida al Sistema PROFEST de la Secretar&iacute;a de Cultura, 
                      te informamos que tu cuenta ha sido activada correctamente:</p>
					  <p>Usuario: ".$cual_usu."</p>
					  <p>Contrase&#241;a: ".$cons_cual_primero."</p>
						<p>Te invitamos dirigirte a la Plataforma PROFEST para ingresar 
						tus datos e iniciar la postulaci&oacute;n: </p>
						<p>www.profest.cultura.gob.mx</p>
						<p>Recibe un cordial saludo.</p>
					</div>
		  		</td>
       		</tr>
			<tr>
				<td>
					<br><p><div style='font-family:Helvetica,Arial; font-size:16px'><strong>".$nombre_firma."<br>".$puesto_firma."</strong></div></p><br>
				</td>
			</tr>
		</table>";
            // Content
            $this->mail->isHTML(true);          // Set email format to HTML
            $this->mail->Subject = $mailSubject;
            $this->mail->Body    = $mensaje_enviar;
            $this->mail->AltBody = 'Su gestor de correos no soporta HTML.';

            $this->mail->send();
            return true;
        } catch (Exception $e) {
            return "Ocurrió un error al enviar el correo: {$this->mail->ErrorInfo}";
        }
    }
}
$a = new SendEmail();
$b=$a->newEmail();
print_r($b);