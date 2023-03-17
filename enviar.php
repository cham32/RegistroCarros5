<?php
//Llama autoloader de composer
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Crea un objeto PHPMailer;  `true` habilita excepciones
$mail = new PHPMailer(true);

//Variables destinatario y contraseña
$pass =substr(md5(rand()),1,10);
$pass_hash = md5($pass);
$User=$_POST['Username'];

//Acciones de BD
include("./configdb.php");
if (!$con)
die('No se pudo conectar: ' . mysqli_error($con));
$sql="UPDATE usuarios SET contraseña='".$pass_hash."' WHERE correo='".$User."'";
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
    $mail->Host       = 'lamp-maildev';
    $mail->SMTPAuth   = false;
    $mail->Username   = 'chamlee@lamp-maildev';
    $mail->Password   = '';
    //$mail->SMTPSecure = 'tls';
    $mail->Port       = 1025;

    //Remitente y Destinatario 
    $mail->setFrom('tecmochis1234@gmail.com', 'Remitente');
    $mail->addAddress($User, 'Destinatario');

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