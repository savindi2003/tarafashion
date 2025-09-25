<?php

session_start();

require "connection.php";

if (isset($_SESSION["u"])) {

    $mail = $_SESSION["u"]["email"];
    $pid = $_POST["pid"];
    $feedback = $_POST["feed"];

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d");

    $ti = new DateTime();
    $tiz = new DateTimeZone("Asia/Colombo");
    $ti->setTimezone($tiz);
    $time = $ti->format("H:i:s");

    Database::iud("INSERT INTO `feedback` (`feedback`,`date`,`time`,`product_id`,`user_email`,`status`) VALUES
    ( '" . $feedback . "','" . $date . "','" . $time . "', '" . $pid . "','" . $mail . "','0'  ) ");

    echo "1";
}


?>