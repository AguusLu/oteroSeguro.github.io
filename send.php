<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once("PHPMailer/PHPMailerAutoload.php");
require_once("PHPMailer/PHPMailer.php");
require_once("PHPMailer/SMTP.php");
require_once("PHPMailer/Exception.php");
// Crea una nueva instancia de PHPMailer

// Recepción de datos
if (!empty($_POST['name']) && !empty($_POST['email'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];

    // Comentarios no requerido
    $comments = "";
    if(!empty ($_POST['comments']))
	    $comments = $_POST['comments'];

    // Email de la empresa
    $companyEmail = 'cesarpulero@gmail.com';

    $mailer = new PHPMailer(true);

    // Configura los parámetros SMTP
    $mailer = new PHPMailer();
        $mailer->isSMTP();                                      	
        $mailer->Host = 'smtp.gmail.com';		
        $mailer->SMTPAuth = true;                               	
        $mailer->Username = $companyEmail;    	
        $mailer->Password = 'hrsawlslfpqpqkil';                         
        $mailer->Port = 465;
        $mailer->SMTPSecure = 'ssl';                                     
        $mailer->From = $companyEmail;
        $mailer->IsHTML(True);
        $mailer->AddAddress($companyEmail);      //ACA TENES QUE PONER EL CORREO DESTINATARIO 
        $mailer->AddReplyTo($companyEmail);
        $mailer->CharSet = 'UTF-8';
        $mailer->smtpConnect(
            array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true
                )
            )
        );

    // Configura los detalles del correo electrónico
    $body = "Nombre: " . $name . "<br />" ;
    $body .= "Email: " . $email . " <br />";

    if(!empty($comments))
        $body .= "Mensaje: " . $comments . " <br />";

    $subject = 'Enviado desde oteroSeguro';
    $fromName = 'oteroSeguro';

    $mailer->setFrom($companyEmail, $fromName);
    $mailer->addAddress($companyEmail, $name);
    $mailer->Subject = $subject;
    $mailer->Body = $body;

    // Envía el correo electrónico
    if($mailer->Send()){
		$result = [
			'success' => true,
			'message' => 'Recibimos tu mensaje a la brevedad te responderemos.'
		];
	}else{
		$result = [
			'success' => false,
			'message' => 'Se ha producido un error al intentar enviar el correo!'
		];
	}

} else {
	$result = [
			'success' => false,
			'message' => 'Todos los campos son obligatorios.'
		];
}

header("Content-Type: application/json");
echo json_encode($result);

?>




