<?php
require_once '../config.php';
require 'phpmailer/PHPMailerAutoload.php';
$result = "";
if (isset($_POST)) {
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $message = $_POST['message'];
    $phone = $_POST['phone'];
    $company_name = $_POST['company_name'];
    
    
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->Host = 'smtp.yandex.com.tr';
    $mail->Username = 'info@viashipyard.com';
    $mail->Password = 'vias20151907';
    $mail->SetFrom($mail->Username, 'viaShipyard Demo Talebi');
    $mail->AddAddress($mail->Username, 'viaShipyard Demo Talebi');
    $mail->CharSet = 'UTF-8';
    $mail->Subject = $subject;
    $mail->MsgHTML('Ad: ' . $name . '<br/>'.'Firma Adı: ' . $company_name . '<br/><br/>'.'Mesaj: ' . $message . '<br/><br/>'.'Mail: ' . $email . '<br/>'.'Telefon: ' . $phone . '<br/>');
    if($mail->Send()) {
    $result= "Mail gönderildi!";
    } else {
	$result="Mail gönderilirken bir hata oluştu: " . $mail->ErrorInfo;
    }
}else {
	$result="Mail gönderilirken bir hata oluştu";
}
echo  $result;
?>
