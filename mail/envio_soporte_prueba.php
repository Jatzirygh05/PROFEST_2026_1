<?php
require_once('./PHPMailer-6.5.3/src/SMTP.php');
require_once('./PHPMailer-6.5.3/src/PHPMailer.php');
require_once('./PHPMailer-6.5.3/src/Exception.php');

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
        $this->mail       = new  PHPMailer(true);
        $this->host       ="smtp.office365.com";
        $this->SMTPAuth   =true;
        $this->Username   ="festivales@cultura.gob.mx";
        $this->Password   ="Fezt2018";
        $this->SMTPSecure =PHPMailer::ENCRYPTION_STARTTLS;
        $this->Port       =25;
        
        $this->mailFrom   ="festivales@cultura.gob.mx";
        $this->mailSender ="CodigoWebLibre";
    }

    public function newEmail($mailFrom="festivales@cultura.gob.mx", $mailSender="SECRETARÍA DE CULTURA PROFEST",  $mailFor='jghernandez@cultura.gob.mx', $mailRecipientName="", $mailSubject="Cuenta Activada", $mailBody="")
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
					<center><img src='./imagenes/encabezado.jpg' width='650px' height='88px'></center>
				</td>
			</tr>
			<tr>
				<td>
					<p><div style='font-family:Helvetica,Arial; font-size:18px; color:#FF0000'><strong>FAVOR DE NO CONTESTAR A ESTE CORREO, CUALQUIER DUDA O COMENTARIO FAVOR DE COMUNICARSE A profest@cultura.gob.mx</strong></div></p>
					<p>&nbsp;</p>
					  <p><div style='font-family:Helvetica,Arial; font-size:18px'><strong>Atentamente<br>
                      Dirección General de Promoción y Festivales Culturales.</strong></div></p>
					  <div style='font-family:Helvetica,Arial; font-size:16px'>
					  <p>Estimada/o postulante  ".$nombre."<br>
                      Te damos la Bienvenida al Sistema PROFEST de la Secretaría de Cultura, 
                      te informamos que tu cuenta ha sido activada correctamente:</p>
					  <p>Usuario: '.$cual_usu.'</p>
					  <p>Contraseña: '.$cons_cual_primero.'</p>
						<p>Te invitamos dirigirte a la Plataforma PROFEST para ingresar tus datos e iniciar la postulaci&oacuten: </p>
						<p>www.profest.cultura.gob.mx</p>
						<p>Recibe un cordial saludo.</p>
					</div>
		  		</td>
       		</tr>
			<tr>
				<td>
					<br><p><div style='font-family:Helvetica,Arial; font-size:16px'><strong>'.$nombre_firma.'<br>'.$puesto_firma.'</strong></div></p><br>
				</td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr height=76>
				<td width='50%' style='width:50.0%;background:#DBCAAB;padding:.69pt 27px .69pt 22px;height:57.0pt'></td>
        	</tr>
		</table>";


            // Content
            $this->mail->isHTML(true);                                  // Set email format to HTML
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

