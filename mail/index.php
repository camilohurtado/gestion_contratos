<?php
	require 'PHPMailer/PHPMailerAutoload.php';
	
	$mail = new PHPMailer();
	
	$mail->isSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tls';
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	
	$mail->Username = 'etovarpruebas@gmail.com'; //Correo de donde enviaremos los correos
	$mail->Password = 'L1t0+2017'; // Password de la cuenta de envío
	
	$mail->setFrom('etovarpruebas@gmail.com', 'Emisor');
	$mail->addAddress('etovar97@misena.edu.co', 'Receptor'); //Correo receptor
	
	
	$mail->Subject = 'Titulo de correo';
	$mail->Body    = 'Contenido del correo';
	
	if($mail->send()) {
		echo 'Correo Enviado';
		} else {
		echo 'Error al enviar correo';
	}
?>