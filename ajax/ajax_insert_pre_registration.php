<?php 

// error_reporting(E_ALL);
// error_reporting(-1);
// ini_set('error_reporting', E_ALL);

require_once('../core/config.php');
require_once('../core/session.php');
require_once('../helper/GeneralHelper.php');

require '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$db = getDB();    


// Assuming the POST method is used to submit the form and the field names are as follows:
    $user_name = "John Doe";
    $email = "john.doe@example.com";
    $country = "United States";
    $contact_no = "1234567890";
    $message = "Hello, I'm interested in your service!";
    $referrer_user_id="";

    // $user_name = $_POST["user_name"];
    // $email = $_POST["email"];
    // $country = $_POST["country"];
    // $contact_no = $_POST["contact_no"];
    // $message = $_POST["message"];
    // $referrer_user_id = $_POST["referrer_user_id"];
    
    // Assuming you have the database connection object stored in $db

    // Validate Full Name: Must not be empty and can contain only letters, spaces, and dashes
    if (empty($user_name) || !preg_match("/^[a-zA-Z\- ]+$/", $user_name)) {
        echo "Error: Please enter a valid full name.";
        return;
    }

    // Validate Email Address: Must be a valid email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Error: Please enter a valid email address.";
        return;
    }

    // Validate Country: Must not be empty and can contain only letters, spaces, and dashes
    if (empty($country) || !preg_match("/^[a-zA-Z\- ]+$/", $country)) {
        echo "Error: Please enter a valid country name.";
        return;
    }

    // Validate Contact Number: Must not be empty and can contain only digits and optional plus sign at the beginning
    if (empty($contact_no) || !preg_match("/^\+?[0-9]+$/", $contact_no)) {
        echo "Error: Please enter a valid contact number.";
        return;
    }
    
    // Call the insert_pre_registration_form method
    $response = GeneralHelper::insert_pre_registration_form($db, $user_name, $email, $country, $contact_no, $message, $referrer_user_id);

    // echo $response;
    
    if($response['msg'] == 'success') {
        $reffrelLink = $response['reffrelLink'];        
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

        $email = '2015kshitij14@gmail.com';
        // Sender and recipient
        $mail->setFrom('no-reply@gtron.io', 'GTron');
        $mail->addAddress($email, 'GTron');

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Form Submission';
        $filename = '../resources/file.txt';
        $content = file_get_contents($filename);
        $content = str_replace("{{favIcon1}}", '', $content);
        $content = str_replace("{{code}}", $reffrelLink, $content);
        $email_template = $content;
        $mail->Body = $email_template;

        // Send email
        if ($mail->send()) {
            echo "Successfully email sent!"
        ?><script>Swal.fire({
            icon: 'success',
            title: 'Registered Successfully!',
            text: 'Thank you for registering with Gtron! Congratulations, you have been awarded 500 Gtron tokens absolutely free',
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

    }

?>