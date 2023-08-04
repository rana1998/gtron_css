<?php
require '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Create a new PHPMailer instance
$mail = new PHPMailer;
   
// SMTP configuration (change these values with your own)
$mail->isSMTP();
$mail->Host = 'mail.gtron.io';
$mail->SMTPAuth = true;
$mail->Username = 'no-reply@gtron.io';
$mail->Password = 'gTron@12@';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

//gtorn2023@gmail.com

// Sender and recipient
$mail->setFrom('no-reply@gtron.io', 'GTron');
$mail->addAddress('2015kshitij14@gmail.com', 'GTron');

// Email content
$mail->isHTML(true);
$mail->Subject = 'Form Submission';
$mail->Body = "Name: Kshitij<br>Email: 2015kshitij14@gmail.com<br>Country: INDIA<br>Phone: +91 9876543210<br>Message:hELLO ";

// Send email
if ($mail->send()) {
   ?><script>Swal.fire({
      icon: 'success',
      title: 'Registered Successfully!',
      text: 'Thank you for registering with Gtron! Congratulations, you have been awarded 50 Gtron tokens absolutely free',
      confirmButtonText: 'OK'
    })</script><?php
} else {
   ?><script>Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Something went wrong! Please try again.',
      confirmButtonText: 'OK'
    })</script><?php
}

?>