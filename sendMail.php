<?php
require_once 'general.php';
require 'PHPMailerAutoload.php';


// dakikada 10 mail
$sql="select * from mail_queue where status=0 limit 20";
$r=$db->Execute($sql);
while($s=$r->FetchNextObject()){
	$sqlx=sprintf("update mail_queue set status=2 where id=%d", $s->id);
	$db->Execute($sqlx);
	
	$result = sendMailx($s->to_mail, $s->subject, $s->html_body, $s->text_body);
	
	$sqlx=sprintf("update mail_queue set status=%d, mail_result='%s' where id=%d", 
($result=="success"?1:3), $db->Escape($result), $s->id);
	$db->Execute($sqlx);
}



function sendMailx($email, $subject, $html, $textbody){
	
	$mail = new PHPMailer(true);
	$mail->isSMTP(); 
	try {
		$mail->CharSet = 'UTF-8';
		$mail->Host = "smtp.gmail.com";
		$mail->Username = "web@tansagturkakademi.com";
		$mail->Password = "bnWCbFa63";
		$mail->SMTPDebug = 0;//2;
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = "tls";	
		$mail->Port = 587;
		$mail->setFrom('web@tansagturkakademi.com','TANSAĞTÜRKAKADEMİ REZERVASYON');
		$mail->addReplyTo('iletisim@tansagturkakademi.com','TANSAĞTÜRKAKADEMİ REZERVASYON');
		$mail->Subject=$subject;
		$mail->msgHTML($html);
		$mail->AltBody = $textbody;
		$mail->addAddress($email,$email);
		$mail->Send();
		return "success";
	} catch (phpmailerException $e) {
//		return "success";
//		header('Content-Type: text/html; charset=utf-8');
//		pre("Mail Gönderirken bir hata oluştu, fakat siparişiniz elimize ulaştı.");
		return ($e->errorMessage());
	} catch (Exception $e) {
//		return "success";
		return( $e->getMessage()); 
	}
}
?>
