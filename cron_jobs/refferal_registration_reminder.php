<?php
require_once('../core/config.php');
require '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$db = getDB();   
// Step 2: Run this script via cron job or scheduled task on your server.

// Step 3: Retrieve users whose registration time is within the last 24 hours.
$twentyFourHoursAgo = date('Y-m-d H:i:s', strtotime('-24 hours'));
$sql = "SELECT * FROM pre_registration WHERE registration_date >= :twentyFourHoursAgo AND is_24hour_later_email_sent = 0 And reffered_user_count < 10";
$stmt = $db->prepare($sql);
$stmt->bindValue(':twentyFourHoursAgo', $twentyFourHoursAgo);
$stmt->execute();
$eligibleUsers = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Step 4 and 5: Calculate the time remaining and number of referrals required for 1000 bonus.
foreach ($eligibleUsers as $user) {
    $registrationTimestamp = strtotime($user['registration_date']);
    $currentTimestamp = time();
    $remainingTimeInSeconds = 24 * 60 * 60 - ($currentTimestamp - $registrationTimestamp);
    $remainingTimeInHours = ceil($remainingTimeInSeconds / 3600);

    $referralsObtained = $user['referred_user_count'];
    $referralsRequiredForBonus = 10 - $referralsObtained;
    
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
    // Compose the email message with the relevant information.

    $mail->Subject = "Reminder: You have {$remainingTimeInHours} hours left and {$referralsRequiredForBonus} more referral required for 1000 Bonus";
    // $filename = '../resources/file.txt';
    // $content = file_get_contents($filename);
    // $content = str_replace("{{favIcon1}}", '', $content);
    // $content = str_replace("{{code}}", $reffrelLink, $content);
    // $content = str_replace("{{name}}", $user_name, $content);
    // $email_template = $content;
    // $mail->Body = $email_template;
    $mail->Body = "Dear {$user['user_name']},\n\nYou have {$remainingTimeInHours} hours left until your 24-hour window ends. To be eligible for the 1000 Gtron bonus, you need {$referralsRequiredForBonus} more referrals.\n\nBest regards,\nYour Website Team";

    $mail->send();
}
?>
