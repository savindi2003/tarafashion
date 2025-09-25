<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = 0; // Set to 2 for debugging in development
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Correct SMTP server for Gmail
    $mail->SMTPAuth = true;
    $mail->Username = 'duleeshasavindi@gmail.com'; // Use environment variable
    $mail->Password = 'xjsdnixxdelpmtfn'; // Use environment variable
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Recipients
    $mail->setFrom('duleeshasavindi@gmail.com', 'Thara Fashion'); // Replace with your name or app name
    $mail->addAddress('savindiduleesha@gmail.com', 'Savindi Duleesha'); // Adjust recipient details

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Welcome to Thara Fashion!';
    $mail->Body = '
        <h1>Welcome to Thara Fashion!</h1>
        <p>Thank you for joining us. We’re excited to have you on board.</p>
        <p>Best Regards,</p>
        <Button>Verify</Button>
        <p><b>Thara Fashion Team</b></p>
    ';
    $mail->AltBody = "Welcome to Thara Fashion!\n\nThank you for joining us. We’re excited to have you on board.\n\nBest Regards,\nThara Fashion Team";

    // Send the email
    $mail->send();
    echo "Mail has been sent successfully!";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
