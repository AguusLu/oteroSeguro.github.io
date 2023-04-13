<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!-- TemplateBeginEditable name="doctitle" -->
<title>Documento sin título</title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
</head>

<body>

<?php 
error_reporting(0); 
$nombre = $_POST['nombre']; 
$correo= $_POST['correo']; 
$comentario = $_POST['comentario']; 
$header = 'From: ' . $correo  . " \r\n"; 
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n"; 
$header .= "Mime-Version: 1.0 \r\n"; 
$header .= "Content-Type: text/plain"; 

$mensaje = "Este mensaje fue enviado por " . $nombre . " \r\n"; 
$mensaje .= "Su e-mail es: " . $correo . " \r\n"; 
$mensaje .= "con el mensaje: " . $comentario . " \r\n"; 
$mensaje .= "Enviado el " . date('d/m/Y', time()); 

$para = 'rodrigootero.pas@gmail.com'; 
$asunto = 'mision'; 

mail($para, $asunto, utf8_decode($mensaje), $header); 

echo 'El mensaje ha sido enviado correctamente'; 

?> 

</body>
</html>

  // Replace contact@example.com with your real receiving email address
 /* $receiving_email_address = 'rodrigootero.pas@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();*/

