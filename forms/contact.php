<?php
// Recuperar los datos del formulario
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Configurar el destinatario y el asunto del correo
$to = 'rodrigootero.pas@gmail.com';
$subject = 'Nuevo mensaje del formulario de contacto';

// Construir el cuerpo del correo
$body = "Nombre: $name\n";
$body .= "Correo electrónico: $email\n";
$body .= "Mensaje:\n$message\n";

// Configurar las cabeceras del correo
$headers = "From: $name <$email>\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// Enviar el correo
if (mail($to, $subject, $body, $headers)) {
  // Mostrar mensaje de éxito
  echo '<p>Mensaje enviado correctamente. Gracias por contactarnos.</p>';
} else {
  // Mostrar mensaje de error
  echo '<p>Hubo un error al enviar el mensaje. Por favor, inténtalo de nuevo más tarde.</p>';
}
?>