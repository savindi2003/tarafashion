<?php

session_start();

require "connection.php";

if(isset($_SESSION["u"])){
    if(isset($_GET["id"])){

        $email = $_SESSION["u"]["email"];
        $pid = $_GET["id"];

        $w_rs = Database::search("SELECT * FROM `wishlist` WHERE `product_id` ='".$pid."' AND `user_email` ='".$email."' ");
        $w_num=$w_rs->num_rows;

        if($w_num == 1){
            $w_data = $w_rs->fetch_assoc();
            $list_id = $w_data["id"];

            Database::iud("DELETE FROM `wishlist` WHERE `id`='".$list_id."' ");
            echo("removed");
        }else{
            Database::iud("INSERT INTO `wishlist`(`product_id`,`user_email`) VALUES ('".$pid."','".$email."')");
           
            echo ("added");
        }
    }else{
        echo ("Something went Wrong");
    }
}else{
    echo("Please login first");
}


?>