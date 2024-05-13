<?php

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];


require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true); 

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = 'smtp.gmail.com';
$mail->SMTPSecure = PHPMailer :: ENCRYPTION_STARTTLS;
$mail->Port = 587;
$mail->Username = "joelwsyassignment@gmail.com";
$mail->Password = "duavehekjguacfcm";

$mail->setFrom($email, $name);
$mail->addAddress("joelwsyassignment@gmail.com","Feedback");

$mail->Subject = "$subject";
$mail->Body = "$message";

if($mail->send()){
    echo "Message has been sent successfully";
    header("Location: Contact.php");
}
else{
    echo "Mailer Error: " . $mail->ErrorInfo;
}
?>