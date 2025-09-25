<?php

session_start();
require "connection.php";

if(isset($_SESSION["u"])){
    $email = $_SESSION["u"]["email"];

    $c_id = $_POST["id"];
    $checkbox= $_POST["c"];

 

    $cartrs = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $email . "' AND `id`='".$c_id."'  ");
    $crs = $cartrs->fetch_assoc();

    if($crs["check"] == '1'){
        Database::iud("UPDATE `cart` SET `check` = '0' WHERE `id`='".$c_id."'   ");
        echo ("r");
    }else if ($crs["check"] == '0'){
        Database::iud("UPDATE `cart` SET `check` = '1' WHERE `id`='".$c_id."'   ");
      
        echo ("added");
    }

}
        
?>