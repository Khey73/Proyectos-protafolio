<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<script language="Javascript">
<!-- Timer Redirect -->
function redireccionar() {
setTimeout ("location.href='index.html'", 4000);}
<!-- Timer Redirect -->
</script>


<title>Formulario</title>

<style type="text/css">
<!--
body {
	background: #00d1d6; /* Old browsers */
	background: -moz-linear-gradient(left, #00d1d6 0%, #ff87f2 100%); /* FF3.6-15 */
	background: -webkit-linear-gradient(left, #00d1d6 0%,#ff87f2 100%); /* Chrome10-25,Safari5.1-6 */
	background: linear-gradient(to right, #00d1d6 0%,#ff87f2 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00d1d6', endColorstr='#ff87f2',GradientType=1 ); /* IE6-9 */
	display: flex;
    justify-content: center;
    align-content: center;
    flex-direction: column;
	height: 100vh; 
}
p {
font-size: 36px;
font-weight: 700;
font-family: Arial, sans-serif;
color: #fff;
}
-->

</style>

</head>

<body onLoad="redireccionar()">
<?php

$name = $_POST['name'];
$comment = $_POST['comment'];

if ($name=='' || $comment==''){

echo "<script>alert('Los campos marcados con * son obligatorios');location.href ='javascript:history.back()';</script>";

}else{


    require("includes/class.phpmailer.php");
    $mail = new PHPMailer();

    $mail->From     = ("hola@miinvitaciondigital.com"); //Dirección desde la que se enviarán los mensajes. Debe ser la misma de los datos de el servidor SMTP.
    $mail->FromName = $name; 
    $mail->AddAddress(""); // Dirección a la que llegaran los mensajes.

// Aquí van los datos que apareceran en el correo que reciba

    $mail->WordWrap = 50; 
    $mail->Subject  =  "Te envian un mensaje";
    $mail->Body     =  '
	<!DOCTYPE html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	</head>

<body style="background-color: #00d1d6 ;padding: 40px 10px;" >
<table valign="top" width="100%">
<tbody width="100%">
<tr>
<td valign="top" width="100%" colspan="2"><h1 align="center" style="font-size: 28px; font-weight: 700; color: #000;">Te envían un buen deseo</h1></td>
</tr>
<tr>
<td valign="top" width="100%" colspan="2">&nbsp;</td>
</tr>

<tr>
<td valign="top" width="100%" colspan="2">
<div align="center"><img src="http://miinvitaciondigital.com/images/php/izquierda.svg" width="40" alt="" /></div>
<p align="center" style="font-size: 18px; color: #000;">' . nl2br($comment) . '</p>
<div align="center"><img src="http://miinvitaciondigital.com/images/php/derecha.svg" width="40" alt="" /></div>
</td>
</tr>
<tr>
<td valign="top" width="100%" colspan="2">
<p align="center" style="font-size: 18px; color: #000;"><em>' . $name . '</em></p>
</td>
</tr>
</tbody>
</table>
	
</body>
	</html>';
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	

// Datos del servidor SMTP

    $mail->IsSMTP(); 
    $mail->Host = "servidor1288.il.controladordns.com";  // Servidor de Salida.
    $mail->SMTPAuth = true; 
    $mail->Username = "hola@miinvitaciondigital.com";  // Correo Electrónico
    $mail->Password = "VissoReno261183"; // Contraseña
	
	

    
	if ($mail->Send())
	{
	?>
    <div align="center" style="padding-bottom: 20px;"><img src="http://miinvitaciondigital.com/images/php/logo.png" width="250" alt="" /></div>       
	<p align="center" style="margin: 0;">Gracias por tus buenos deseos,<br>nosotros le haremos llegar tu mensaje.</p>
    <?php
	} 
	
	else 
	
	{
		echo $result;	
	}

}

?>
</body>
</html>