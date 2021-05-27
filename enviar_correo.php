<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$cons_usuario="root";
$cons_contra="";
$cons_base_datos="gestor_facturas";
$cons_equipo="localhost";

$obj_conexion = mysqli_connect($cons_equipo,$cons_usuario,$cons_contra,$cons_base_datos);

$id= $_GET["id"];

$mail = new PHPMailer(true);
        
        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                   //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.mi.com.co';                       //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'no_responder@tvnovedadescolombia.com'; //SMTP username
            $mail->Password   = 'Nov3d@des2018*';                       //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        
            //Recipients
            $mail->setFrom('no_responder@tvnovedadescolombia.com', 'Gestor Facturas Sistemas');
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
            //$mail->Body    = ' <b> Cordial Saludo </b> \n \n \n Recuerde revisar su factura numero: <b color="red"> '.$id.' </b>';
            $mail->Body    = '<p><b> Cordial Saludo, </b></p> </br> </br> </br> <p> El presente correo es con el fin de recordarle que tiene pendiente el pago de la siguiente factura. </p> </br> </br> </br> <p> <b> Factura Numero: </b> <b style="color:red">'.$id.'</b> </p> </br></br> <p><b>NOTA: </b> Recuerde que vence <b style="color:red"> hoy </b> la factura. </p> </br></br> <b> <p> Cordialmente, </p> </b></br></br> <p> Mensaje automatico por: </p> <p> <b style="color:orange"> Sistema Gestor de Facturas. </b> </p> </br></br> <img src="https://www.salitreplaza.com.co/wp-content/uploads/2018/10/Tvnovedades.jpg" width="50%" height="50%">';

            $mail->send();
            
            
            $sql="UPDATE facturas SET NOTIFICACION = 'ENVIADO' WHERE NUMERO_FACTURA = '$id'";

            if ($obj_conexion->query($sql) === TRUE) 
            {
            echo '<script language="javascript">alert("Notificacion enviada a la base");window.location.href="home.php"</script>';
            } 
                else 
                {
                echo "Error al almacenar los datos: " . $sql . "<br>" . $obj_conexion->error;
                }
            
                
            echo '<script language="javascript">alert("Se envio el correo de notificacion");window.location.href="home.php"</script>';
            
        } catch (Exception $e) {
            echo "Hubo un error al enviar el mensaje, Error: {$mail->ErrorInfo}";
        }

        
?>
