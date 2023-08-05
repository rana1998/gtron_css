<?php
error_reporting(0);
class GeneralHelper
{

     // Function to generate a unique referral ID
     private static function generate_referral_id() {
        // You can implement your own logic here to generate a unique referral ID.
        // For example, you can use a random alphanumeric string or hash function.

        // Example implementation: Generate a random 6-character alphanumeric string
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $referral_id = '';
        for ($i = 0; $i < 6; $i++) {
            $referral_id .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $referral_id;
    }
    
    // This function is used to get the total number of users registered or active on a daily basis.
    public static function insert_pre_registration_form($db, $user_name, $email, $country, $contact_no, $message, $referrer_user_id) {
		try {
        $referral_id = self::generate_referral_id(); 

        // Generate the referral link for the new user
        $referral_link = "https://gtron.io?ref=" . $referral_id;

        // Set is_referred to 0 for new users (not referred by anyone)
        $is_referred = 0;

        // Initialize referred_user_id as null for new users (no referrer)
       

        if(!isset($referrer_user_id) && $referrer_user_id == '') {
            $is_referred = 0;
            $referrer_user_id = '';
        }
        else {
            
            $is_referred = 1;
            // Prepare the SELECT query
            $sql1 = "SELECT * FROM pre_registration WHERE user_referral_id = :referrer_user_id and registration_date >= NOW() - INTERVAL 1 DAY AND registration_date <= NOW()";

            // Prepare the statement
            $stmt1 = $db->prepare($sql1);

            // Bind the parameter to the prepared statement using bindValue
            $stmt1->bindValue(':referrer_user_id', $referrer_user_id, PDO::PARAM_STR);

            $stmt1->execute();

            // Fetch the first (and only) row as an associative array
            $result = $stmt1->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                // Process the data
                $reffereGtronAmount =  (int)$result['gtron'];
                $reffered_user_count =  (int)$result['$reffered_user_count'];
                // ... Access other fields as needed ...
            } else {
                echo "No records found for the given referrer_user_id.";
            }
        }

            // Prepare the SQL INSERT query with placeholders
        $date = date('Y-m-d');

        $sql2 = "INSERT INTO pre_registration (user_name, email, country, contact_no, message, referral_link, is_referred, referrer_user_id, user_referral_id, reffered_user_count, gtron, registration_date) 
        VALUES (:user_name, :email, :country, :contact_no, :message, :referral_link, :is_referred, :referrer_user_id, :user_referral_id, :referred_user_count, :gtron, :currdate)";

        // Prepare the statement
        $stmt2 = $db->prepare($sql2);


        // Set the initial GTRON balance to 500 for new users
        $gtron = 500;

        // Bind parameters to the prepared statement using bindValue
        $stmt2->bindValue(':user_name', $user_name, PDO::PARAM_STR);
        $stmt2->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt2->bindValue(':country', $country, PDO::PARAM_STR);
        $stmt2->bindValue(':contact_no', $contact_no, PDO::PARAM_STR);
        $stmt2->bindValue(':message', $message, PDO::PARAM_STR);
        $stmt2->bindValue(':referral_link', $referral_link, PDO::PARAM_STR);
        $stmt2->bindValue(':is_referred', $is_referred, PDO::PARAM_INT);
        $stmt2->bindValue(':referrer_user_id', $referrer_user_id, PDO::PARAM_STR);
        $stmt2->bindValue(':user_referral_id', $referral_id, PDO::PARAM_STR);
        $stmt2->bindValue(':referred_user_count', 0, PDO::PARAM_INT);
        $stmt2->bindValue(':gtron', $gtron, PDO::PARAM_INT);
        $stmt2->bindValue(':currdate', $date, PDO::PARAM_STR);

        // Execute the prepared statement
        if ($stmt2->execute()) {
            if(isset($referrer_user_id) && $referrer_user_id != '') {
                // Prepare the UPDATE query
                $sql3 = "UPDATE pre_registration SET gtron = :new_gtron_value, reffered_user_count = :reffered_user_count WHERE user_referral_id = :referrer_user_id";

                // Prepare the statement
                $stmt3 = $db->prepare($sql3);

                if($reffered_user_count > 10) {
                    $new_gtron_value = $reffereGtronAmount + 1000;
                } else {
                    $new_gtron_value = $reffereGtronAmount + 500;
                }

                $reffered_user_count = $reffered_user_count + 1;
                
                // Bind the parameters to the prepared statement using bindValue
                $stmt3->bindValue(':new_gtron_value', $new_gtron_value, PDO::PARAM_INT);
                $stmt3->bindValue(':referrer_user_id', $referrer_user_id, PDO::PARAM_STR);
                $stmt3->bindValue(':reffered_user_count', $reffered_user_count, PDO::PARAM_STR);

                // Execute the query
                $stmt3->execute();
            }

            // If the insert was successful, get the ID of the newly inserted row
            // $referred_user_id = $db->lastInsertId();
            $data['reffrelLink'] = $referral_link;
            $data['msg'] = 'success';
            return $data;
            // Now you can use $referred_user_id for any further processing or updating.
            // For example, you can update the referrer's user record to add this new user as a referral.
        } else {
            echo "Error: Unable to execute query.";
        }
		}
		catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
		}	
    }

}

?>