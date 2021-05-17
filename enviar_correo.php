<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                   //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'gestorfacturas.sistemas@gmail.com';    //SMTP username
    $mail->Password   = 'QWpoA1029.';                           //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('gestorfacturas.sistemas@gmail.com', 'Gestor Facturas Sistemas');
    $mail->addAddress('cristiancoral0@gmail.com', 'Cristian Coral');     //Add a recipient
    $mail->addAddress('ccoral@tvnovedadescolombia.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Adjuntos
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Su factura esta a punto de vencer';
    $mail->Body    = 'Recuerde revisar su factura numero <b>Numero de Factura</b>';

    $mail->send();
    echo 'El mensaje se envio correctamente';
} catch (Exception $e) {
    echo "Hubo un error al enviar el mensaje, Error: {$mail->ErrorInfo}";
}