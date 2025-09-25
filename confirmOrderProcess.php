<?php

require "connection.php";

if(isset($_GET["id"])){
    $invoice_id = $_GET["id"];

    $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `id`='".$invoice_id."'");
    $invoice_data = $invoice_rs->fetch_assoc();

    $status_id = $invoice_data["status"];
    $new_status = 0;

    if($status_id == 3){
        Database::iud("UPDATE `invoice` SET `status`='4' WHERE `id`='".$invoice_id."'");
        $new_status = 4;

        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");
    
        Database::iud("INSERT INTO `notification`(`date_time`,`user_email`,`invoice_id`,`status`,`usertype`,`seen`) 
        VALUES ('".$date."','".$invoice_data["user_email"]."','".$invoice_data["id"]."','".$new_status."','3','1') ");

    }

    echo $new_status;
}

?>