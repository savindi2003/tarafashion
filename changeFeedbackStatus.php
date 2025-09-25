<?php

require "connection.php";

if(isset($_GET["id"])){
    $fid = $_GET["id"];

    $feed_rs=Database::search("SELECT * FROM `feedback` WHERE `id` ='".$fid."' ");
    $feed_num=$feed_rs->num_rows;

    if($feed_num == 1){
        $feed_data=$feed_rs->fetch_assoc();

        if($feed_data["status"] == 0){
            Database::iud("UPDATE `feedback` SET `status` = '1' WHERE `id` ='".$fid."' ");
            echo("1");

        }else if($feed_data["status"] == 1){
            Database::iud("UPDATE `feedback` SET `status` = '0' WHERE `id` ='".$fid."' ");
            echo("0");
        }
    }

}

?>
