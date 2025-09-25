 <?php

    require "connection.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';

    if (isset($_GET["a_e"])) {

        $a_email = $_GET["a_e"];

        if (empty($a_email)) {
            echo 'Please Enter Email';
        } else {



            $rs = Database::search("SELECT * FROM `admin` WHERE `email`='" . $a_email . "'");
            $n = $rs->num_rows;

            if ($n == 1) {
                $code = uniqid();

                $data = $rs->fetch_assoc();

                $ad_name = $data["fname"] . " " . $data["lname"];


                Database::iud("UPDATE `admin` SET `verification_code`='" . $code . "' WHERE `email`='" . $a_email . "'");



                $mail = new PHPMailer(true);

                try {
                    $mail->SMTPDebug = 0; // Set to 2 for debugging in development
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Correct SMTP server for Gmail
    $mail->SMTPAuth = true;
    $mail->Username = 'duleeshasavindi@gmail.com'; // Use environment variable
    $mail->Password = 'xjsdnixxdelpmtfn'; // Use environment variable
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

                    //$mail->setFrom('from@gfg.com', 'Name');		 
                    //$mail->addAddress('receiver1@gfg.com');
                    //$mail->addAddress('receiver2@gfg.com', 'Name');

                    $mail->setFrom('duleeshasavindi@gmail.com', 'Thara Fashion');
                    $mail->addReplyTo('duleeshasavindi@gmail.com', 'Thara Fashion');
                    $mail->addAddress('savindiduleesha@gmail.com');

                    $mail->isHTML(true);
                    $mail->Subject = 'Subject';
                    $mail->Body = 'HTML message body in <b>bold</b> ';
                    $mail->AltBody = 'Body in plain text for non-HTML mail clients';
                    $mail->send();
                    echo 'Success';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }

                // if (!$mail->send()) {
                //     echo 'Verification code sending failed';
                // } else {
                //     echo 'Success';
                // }
            } else {
                echo ("Invalid email address");
            }
        }
    } else {
        echo ("Invalid email address");
    }
    ?>


<?php

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require 'vendor/autoload.php';

// $mail = new PHPMailer(true);

// try {
// 	$mail->SMTPDebug = 2;									 
// 	$mail->isSMTP();										 
// 	$mail->Host	 = 'smtp.gfg.com;';				 
// 	$mail->SMTPAuth = true;							 
// 	$mail->Username = 'duleeshasavindi@gmail.com';				 
// 	$mail->Password = 'xjsdnixxdelpmtfn';					 
// 	$mail->SMTPSecure = 'tls';							 
// 	$mail->Port	 = 587; 

// 	//$mail->setFrom('from@gfg.com', 'Name');		 
// 	//$mail->addAddress('receiver1@gfg.com');
// 	//$mail->addAddress('receiver2@gfg.com', 'Name');

//     $mail->setFrom('duleeshasavindi@gmail.com', 'Thara Fashion');
//     $mail->addReplyTo('duleeshasavindi@gmail.com', 'Thara Fashion');
//     $mail->addAddress('savindiduleesha@gmail.com');

// 	$mail->isHTML(true);								 
// 	$mail->Subject = 'Subject';
// 	$mail->Body = 'HTML message body in <b>bold</b> ';
// 	$mail->AltBody = 'Body in plain text for non-HTML mail clients';
// 	$mail->send();
// 	echo "Mail has been sent successfully!";
// } catch (Exception $e) {
// 	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
// }

?>
