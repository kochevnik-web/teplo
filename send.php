﻿<?php

require 'PHPMailer/PHPMailerAutoload.php';

// ==== Принудительный захват массива переменных ==========================
// ==== раскомментировать, если письма отправляются без значений полей ====
$text = '';
$adminEmail = '';
$email = $_POST['email'];     if($email){$text = 'E-mail пользователя: '.$email.'<br>';}
$phone = $_POST['phone'];     if($phone){$text = $text.'Телефон пользователя: '.$phone.'<br>';}
$data = $_POST['data'];       if($data){$text = $text.'Данные: '.$data.'<br>';}
$form = $_POST['form'];



$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';
//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';                         // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'prof.zabor-nvs@mail.ru';           // SMTP username
$mail->Password = 'Z9564665z';                        // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('prof.zabor-nvs@mail.ru', 'Столы под заказ');
$mail->addAddress($adminEmail, $adminEmail);          // Add a recipient            

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $form;
$mail->Body    = $text;


if(!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    //echo 'Message has been sent';
}