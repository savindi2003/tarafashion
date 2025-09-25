<?php 

session_start();

require "connection.php";

$msg_txt = $_POST["t"];
$receiver = $_POST["r"];

if(empty($msg_txt)) {

    echo ("Empty Message");
} else {
    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d");

    $t = new DateTime();
    $ttz = new DateTimeZone("Asia/Colombo");
    $t->setTimezone($ttz);
    $time = $t->format("H:i:s");

    $d1 = new DateTime();
    $tz1 = new DateTimeZone("Asia/Colombo");
    $d1->setTimezone($tz1);
    $date1 = $d1->format("Y-m-d H:i:s");

    $sender;

    if (isset($_SESSION["u"])) {

        $sender = $_SESSION["u"]["email"];
    } else if (isset($_SESSION["au"])) {

        $sender = $_SESSION["au"]["email"];
    }

    if (empty($receiver)) {

        Database::iud("INSERT INTO `chat` (`content`,`date`,`time`,`status`,`admin_email`,`user_email`,`type`) VALUES ('" . $msg_txt . "','" . $date . "','".$time."','0','" . $sender . "','" . $receiver . "' , '1')");

        echo ("success1");
    } else {

        if (isset($_SESSION["u"]) && !isset($_SESSION["au"])) {

            if ($sender == $_SESSION["u"]["email"]) {

                Database::iud("INSERT INTO `chat` (`content`,`date`,`time`,`status`,`user_email`,`admin_email`,`type`) VALUES ('" . $msg_txt . "','" . $date . "','".$time."','1','" . $sender . "','duleeshasavindi@gmail.com' , '1')");
                Database::iud("INSERT INTO `notification` (`date_time`,`status`,`user_email`,`usertype`,`seen`) VALUES ('".$date1."','6','".$sender."','3','1')");

                echo ("1");
            }
        } else if (isset($_SESSION["au"]) && !isset($_SESSION["u"])) {

            if ($sender == $_SESSION["au"]["email"]) {

                Database::iud("INSERT INTO `chat` (`content`,`date`,`time`,`status`,`admin_email`,`user_email`,`type`) VALUES ('" . $msg_txt . "','" . $date . "','".$time."','2','duleeshasavindi@gmail.com','" . $receiver . "' ,'0')");
                Database::iud("INSERT INTO `notification` (`date_time`,`status`,`user_email`,`usertype`,`seen`) VALUES ('".$date."','5','".$receiver."','1','1')");
                echo ("2");
            }
        }
    }
}
?>