<?php

require "connection.php";
require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_GET["a_e"])) {
    $a_email = trim($_GET["a_e"]);

    if(empty($a_email)){
        echo 'Please Enter Email';
        exit;
    }

    $rs = Database::search("SELECT * FROM `admin` WHERE `email`='" . $a_email . "'");
    if($rs->num_rows == 1){
        $code = bin2hex(random_bytes(3)); // More secure code
        $data = $rs->fetch_assoc();
        $ad_name = $data["fname"] . " " . $data["lname"];

        Database::iud("UPDATE `admin` SET `verification_code`='" . $code . "' WHERE `email`='" . $a_email . "'");

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'savindiduleesha@gmail.com';
            $mail->Password = 'ztqj kycu mkof zmqb'; // Use App Password, not real password
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('savindiduleesha@gmail.com', 'Thara Fashion');
            $mail->addAddress($a_email);
            $mail->isHTML(true);
            $mail->Subject = 'Thara Fashion Admin Logon Verification Code';

            $mail->Body = '
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Thara Fashion Verification</title>
</head>
<body style="margin:0; padding:0; background-color:#fff; font-family: Arial, sans-serif;">
  <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #fff;">
    <tr>
      <td align="center" style="padding: 40px 0;">
        <!-- Logo -->
        <img src="https://res.cloudinary.com/dvijulv3l/image/upload/v1750589482/logo1_finmwt.jpg" alt="Thara Fashion Logo" style="width:300px ;" />
      </td>
    </tr>
    <tr>
      <td align="center">
        <table width="600" cellpadding="0" cellspacing="0" style="background-color:#fdf5e6; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.05); padding: 30px;">
          <tr>
            <td align="center" style="color: #000;">
              <h1 style="margin: 0; color: #000;">Thara Fashion Store</h1>
              <p style="margin: 5px 0 20px; font-size: 16px; color: #555;">tharafashion.lk</p>
              <hr style="border: none; border-top: 1px solid #ccc; margin: 20px 0;">
              <p style="font-size: 16px; color: #000;">
                Hello Admin <strong>' . $ad_name . '</strong>,
              </p>
              <p style="font-size: 16px; color: #000;">
                Your verification code is:
              </p>
              <p style="font-size: 26px; color: #000; background-color: #fff; padding: 12px 24px; border: 2px dashed #000; display: inline-block; margin: 20px 0; border-radius: 6px;">
                <strong>' . $code . '</strong>
              </p>
              <p style="font-size: 14px; color: #888;">
                This code is valid for a limited time. Please do not share it with anyone.
              </p>
              <hr style="border: none; border-top: 1px solid #ccc; margin: 30px 0;">
              <p style="font-size: 12px; color: #aaa;">
                &copy; ' . date("Y") . ' Thara Fashion. All rights reserved.
              </p>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>';


            $mail->send();
            echo 'Success';
        } catch (Exception $e) {
            error_log($mail->ErrorInfo);
            echo 'Verification code sending failed';
        }
    } else {
        echo 'Invalid email address';
    }
} else {
    echo 'Invalid request';
}

