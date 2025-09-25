<?php


require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer; 

if(isset($_GET["e"])){

   $email = $_GET["e"];

   $rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."'");
   $n = $rs->num_rows;

   if($n==1){
    $code = uniqid();

    Database::iud("UPDATE `user` SET `verification_code`='".$code."' WHERE `email`='".$email."'");

    
    $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'savindiduleesha@gmail.com';
        $mail->Password = 'ekszdgenewkajcnu';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('savindiduleesha@gmail.com', 'Reset Password');
        $mail->addReplyTo('savindiduleesha@gmail.com', 'Reset Password');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Thara Fashion Store  Forgot Password Verification Code';
        $bodyContent = '<h1 style="color:green"> Your Verification Code is '.$code.'</h1>';
       // $bodyContent .= '******************';
        $mail->Body    = $bodyContent;

        if(!$mail->send()){
            echo 'Verification code sending failed';
        }else{
            echo 'Success';
        }



   }else{
    echo("Invalid email address");
   }


}


?>