<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Llama autoloader de composer
//require 'vendor/autoload.php';

// Llamar PHPMailer a Mano
require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

//Crea un objeto PHPMailer;  `true` habilita excepciones
$mail = new PHPMailer(true);
$pass =substr(md5(microtime()),1,10);
$User=$_POST['Username'];
$conn = mysqli_connect('localhost','Andres','1234');
if (!$conn)
die('No se pudo conectar: ' . mysqli_error($conn));
mysqli_select_db($conn,'andres');
$sql="UPDATE usuarios SET contraseña='$pass'WHERE correo='$User'";
if($conn->query($sql)=== TRUE){
    echo "usuario modificado correctamente";
}else{
    echo "error al modificar usuario:". $conn->error;
}
try {
    //Configuracion del Servidor SMTP
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                    //Muestra salida de depuración detallada
    $mail->isSMTP();                                            //Envia usando SMTP
    $mail->Host       = 'smtp.gmail.com';                       //Configurar el servidor SMTP para enviar a través de él
    $mail->SMTPAuth   = true;                                   //Ahilita Autenticacion SMTP
    $mail->Username   = 'tecmochis1234@gmail.com';                //nombre de usuario del servidor SMTPe
    $mail->Password   = 'flbbwzvlecnurayn';                     //password del servidor SMTP
    $mail->SMTPSecure = 'tls'; //PHPMailer::ENCRYPTION_SMTPS;   //Habilita TLS
    $mail->Port       = 587;                                   //Puerto TCP para conectarse; usar 587 si configuró `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Preparacio 
    $mail->setFrom('tecmochis1234@gmail.com', 'Yo envie');       // Quien envia
    $mail->addAddress($User, 'Mi correo Personal');    //Añade a quien envia correo
    //$mail->addAddress('ellen@example.com');                   //Mas nombres
    //$mail->addReplyTo('info@example.com', 'Information');     
    //$mail->addCC('cc@example.com');                           //Añde copia
    //$mail->addBCC('bcc@example.com');                         //Añade copia

    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Agrega Documento
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Agrega documento

    //Conten
    
    $mail->isHTML(true);                                    //Especifica que se envia el docuento en formato HTML
    $mail->Subject = 'Mi asunto';
    $mail->Body    = 'Mi Mensaje<br> <b>Contrasena modificada:</b>'.$pass;
    $mail->AltBody = 'Mi Mensaje';                          //Mensaje plano si no se acepta HTML

    $mail->send();                                          //Envia el correo
    echo 'Mensaje Enviado en clase';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>