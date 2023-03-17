<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Llama autoloader de composer
require 'vendor/autoload.php';

//Crea un objeto PHPMailer;  `true` habilita excepciones
$mail = new PHPMailer(true);
$pass =substr(md5(microtime()),1,10);
$User=$_POST['Username'];

//Acciones de BD
include("./configdb.php");
if (!$con)
die('No se pudo conectar: ' . mysqli_error($con));
$sql="UPDATE usuarios SET contraseña='$pass'WHERE correo='$User'";
if($con->query($sql)=== TRUE){
    echo "usuario modificado correctamente";
}else{
    echo "error al modificar usuario:". $con->error;
}
mysqli_close($con);

// Enviar correo
try {
    //Configuracion del Servidor SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'tecmochis1234@gmail.com';
    $mail->Password   = 'flbbwzvlecnurayn';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    //Remitente y Destinatario 
    $mail->setFrom('tecmochis1234@gmail.com', 'Yo envie');
    $mail->addAddress($User, 'Mi correo Personal');

    //Contenido
    $mail->isHTML(true);
    $mail->Subject = 'CAMBIO DE CONTRASEÑA';
    $mail->Body    = 'Nueva contraseña: <b>' . $pass . '</b>';
    $mail->AltBody = 'Nueva contraseña: ' . $pass;

    $mail->send();
    echo 'Mensaje Enviado en clase';
} catch (Exception $e) {
    echo "El mensaje no pudo ser enviado. Error de Correo: {$mail->ErrorInfo}";
}
?>