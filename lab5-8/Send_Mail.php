<?php
function Send_Mail($to,$subject,$body)
{
    require 'class.phpmailer.php';
    $from       = "leranick29@gmail.com";
    $mail       = new PHPMailer();
    $mail->IsSMTP(true);            // используем протокол SMTP
    $mail->IsHTML(true);
    $mail->SMTPAuth   = true;                  // разрешить SMTP аутентификацию
    $mail->Host       = "tls://smtp.gmail.com"; // SMTP хост
    $mail->Port       =  465;          //порт возможно и так прокатит но у каждого хоста свой порт          // устанавливаем SMTP порт
    $mail->Username   = "твоя почта";  //имя пользователя SMTP
    $mail->Password   = "223141kthf";  // SMTP пароль
    $mail->SetFrom($from, 'From Name');
    $mail->AddReplyTo($from,'From Name');
    $mail->Subject    = $subject;
    $mail->MsgHTML($body);
    $address = $to;
    $mail->AddAddress($address, $to);
    $mail->Send();
}
?>
