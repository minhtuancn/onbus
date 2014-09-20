<?php 
require_once('phpmailer/class.phpmailer.php');

function smtpmailer($to, $from, $from_name, $subject, $body) { 
		 
	ini_set('display_errors',1);
    global $error;
    $mail = new PHPMailer(); 
    $mail->IsSMTP(); 
    $mail->SMTPDebug = 1;
    $mail->SMTPAuth = true; 
    $mail->SMTPSecure = 'ssl'; 
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465; 
    $mail->Username = "onbustest@gmail.com";  
    $mail->Password = "onbus123";           
    $mail->SetFrom($from, $from_name);
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->CharSet="utf-8";
    $mail->IsHTML(true);
    $mail->AddAddress($to);		
	var_dump($mail->ErrorInfo);
    if(!$mail->Send()) {
        $error = 'Gởi mail bị lỗi : '.$mail->ErrorInfo; 
        return false;
    } else {
        $error = 'Thư của bạn đã được gởi đi !';
        return true;
    }
}

$tieudethu="ONBUS ticket confirmation";
$noidungthu = 'abcd';

var_dump(smtpmailer('hoangnhonline@gmail.com', 'onbustest@gmail.com', 'ONBUS.VN',$tieudethu,$noidungthu));	
?>