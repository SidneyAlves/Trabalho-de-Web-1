<?php 

require '../assets/PHPMailer-5.2-stable/PHPMailerAutoload.php';

function enviarEmail($email, $assunto, $corpo){
	$mail = new PHPMailer;
	$destinatario = $email;
	$remetente = 'trabalhoweb123@outlook.com';
	//$email = "testando o disparo de email"; 

	// $mail->SMTPDebug = 3;                               // Enable verbose debug output
	// $mail->SMTPDebug = 0;                               // Enable verbose debug output

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp-mail.outlook.com';  // Specify main and backup SMTP servers
	$mail->Port = 587;
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'trabalhoweb123@outlook.com';                 // SMTP username
	$mail->Password = 'trabweb123';                           // SMTP password
	$mail->SMTPSecure = 'tsl';                             // Enable encryption, 'ssl' also accepted
	$mail->From = 'trabalhoweb123@outlook.com';
	$mail->FromName = 'Rural News';
	//$mail->addReplyTo($remetente);
	$mail->addAddress($destinatario);     // Add a recipient


	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = $assunto;
	$mail->Body    = $corpo;
	//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	if(!$mail->send()) {
	    echo 'Message could not be sent.';
	    echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
	    echo 'Mensagem enviada';

	echo 'enviar email';
	}
}

 ?>