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
$edad = $_POST['edad'];  
$correo= $_POST['correo']; 
$proyecto=$_POST['GrupoOpciones1']; 
$comentario = $_POST['comentario']; 
$header = 'From: ' . $correo  . " \r\n"; 
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n"; 
$header .= "Mime-Version: 1.0 \r\n"; 
$header .= "Content-Type: text/plain"; 

$mensaje = "Este mensaje fue enviado por " . $nombre . " \r\n"; 
$mensaje .=  "con edad " . $edad . " \r\n"; 
$mensaje .= "Su e-mail es: " . $correo . " \r\n"; 
$mensaje .= "le gusto: " . $proyecto . " \r\n"; 
$mensaje .= "danos tu mensaje: " . $comentario . " \r\n"; 
$mensaje .= "Enviado el " . date('d/m/Y', time()); 

$para = 'agus.luu@gmail.com'; 
$asunto = 'mision'; 

mail($para, $asunto, utf8_decode($mensaje), $header); 

echo 'El mensaje ha sido enviado correctamente'; 

?> 

</body>
</html>

