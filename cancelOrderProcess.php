<?php

require "connection.php";

if(isset($_GET["id"])){
    $invoice_id = $_GET["id"];

    $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `id`='".$invoice_id."'");
    $invoice_data = $invoice_rs->fetch_assoc();

    $status_id = $invoice_data["status"];
    $new_status = 0;

    if($status_id == 0){
        Database::iud("UPDATE `invoice` SET `status`='5' WHERE `id`='".$invoice_id."'");
        $new_status = 5;

    
    }else if ($status_id == 1){
        Database::iud("UPDATE `invoice` SET `status`='5' WHERE `id`='".$invoice_id."'");
        $new_status = 5;
    }

   

    echo $new_status;
}


?>