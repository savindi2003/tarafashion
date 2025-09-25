<?php

require "connection.php";

if(isset($_GET["id"])){
    $invoice_id = $_GET["id"];

    

    Database::iud("UPDATE `invoice` SET `status`='6' WHERE `id`='".$invoice_id."'");

    echo ("done");



}

?>