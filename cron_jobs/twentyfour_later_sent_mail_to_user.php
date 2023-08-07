<?php
require_once('../core/config.php');
// require_once('../core/session.php');
// require_once('../helper/GeneralHelper.php');

require '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$db = getDB();    
// Step 2: Run this script via cron job or scheduled task on your server.

// Step 3: Retrieve users whose registration time is 24 hours ago.
$twentyFourHoursAgo = date('Y-m-d H:i:s', strtotime('-24 hours'));
$sql = "SELECT * FROM pre_registration WHERE registration_date <= :twentyFourHoursAgo AND is_24hour_later_email_sent = 0 And reffered_user_count < 10";
$stmt = $db->prepare($sql);
$stmt->bindValue(':twentyFourHoursAgo', $twentyFourHoursAgo);
$stmt->execute();
$eligibleUsers = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Step 4: Send email to eligible users.
foreach ($eligibleUsers as $user) {
    // Send the email to $user['email'] with the message "Your 24 hours have exhausted..."
    // You can use PHP's mail function or a library like PHPMailer to send the email.
    // Once the email is sent successfully, update the email_sent flag in the database for this user.
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

    $email = $user['email'];
    // Sender and recipient
    $mail->setFrom('no-reply@gtron.io', 'GTron');
    $mail->addAddress($email, 'GTron');

    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'Reminder: Your 24 hours have exhausted for Gtron bonus';
    // $filename = '../resources/file.txt';
    // $content = file_get_contents($filename);
    // $content = str_replace("{{favIcon1}}", '', $content);
    // $content = str_replace("{{code}}", $reffrelLink, $content);
    // $content = str_replace("{{name}}", $user_name, $content);
    // $email_template = $content;
    // $mail->Body = $email_template;
    $mail->Body = "Your 24 hours have exhausted. You are no longer eligible for 1000 Gtron bonus. Still, you can get 500 Gtron for individual referral.";

    // $to = $user['email'];
    // $subject = "Reminder: Your 24 hours have exhausted for Gtron bonus";
    // $message = "Your 24 hours have exhausted. You are no longer eligible for 1000 Gtron bonus. Still, you can get 500 Gtron for individual referral.";
    // Send the email here (use PHP's mail function or a library like PHPMailer)

    if ($mail->send()) {
        // Update the email_sent flag in the database for this user.
        $userId = $user['id'];
        $updateSql = "UPDATE pre_registration SET is_24hour_later_email_sent = 1 WHERE id = :userId";
        $updateStmt = $db->prepare($updateSql);
        $updateStmt->bindValue(':userId', $userId);
        $updateStmt->execute();
    }
}
?>
