<?php
// ... Database connection and other code ...

// Function to send the email to the user
function send_email_to_user($email, $remaining_time, $remaining_referrals) {
    // Implement your email sending logic here
    // Use libraries like PHPMailer or SwiftMailer to send emails
    // You can compose the email with the provided information
    // and use the $email parameter as the recipient email address.
}

try {
    // ... Previous code for connecting to the database and setting PDO attributes ...

    // Calculate the reference timestamp (23 hours ago)
    $reference_time = time() - (23 * 3600);

    // Select users who registered within the last 23 hours and have fewer than 8 referrals
    $sql = "SELECT * FROM pre_registration WHERE registration_date >= FROM_UNIXTIME(:reference_time) AND referred_user_count < 8";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reference_time', $reference_time, PDO::PARAM_INT);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($users as $user) {
        // Calculate the remaining time in hours
        $elapsed_time = time() - strtotime($user['registration_date']);
        $remaining_hours = 23 - floor($elapsed_time / 3600);

        // Calculate the remaining referrals required for the 1000 bonus
        $remaining_referrals = 8 - $user['referred_user_count'];

        // If remaining time is within 23 hours and remaining referrals required are 8 or less, send email
        if ($remaining_hours <= 23 && $remaining_referrals <= 8) {
            send_email_to_user($user['email'], $remaining_hours, $remaining_referrals);
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the connection
$db = null;
?>
