<?php

session_start();

require "connection.php";

if(isset($_SESSION["u"])){
    
    $user = $_SESSION["u"]["email"];

    
    $array;
    $order_id = uniqid();

    $cart_rs=Database::search("SELECT * FROM `cart` WHERE `user_email` = '".$user."'");
    $cart_num=$cart_rs->num_rows;

    for($x=0; $x < $cart_num; $x++){
    $cart_data=$cart_rs->fetch_assoc();

    $p_rs = Database::search("SELECT * FROM `product` WHERE `id`='".$cart_data["product_id"]."' ");
    $p_data=$p_rs->fetch_assoc();

    $city_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='".$user."'");
    $city_num = $city_rs->num_rows;

    if($city_num == 1){

        $city_data = $city_rs->fetch_assoc();

        $city_id = $city_data["city_id"];
        $address = $city_data["line1"].", ".$city_data["line2"];

        $district_rs = Database::search("SELECT * FROM `city` WHERE `id`='".$city_id."'");
        $district_data = $district_rs->fetch_assoc();

        $district_id = $district_data["district_id"];
        $delivery = "0";

        if($district_id == "1"){
            $delivery = $p_data["delivery_fee_weston"];
        }else{
            $delivery = $p_data["delivery_fee_other"];
        }

        $item = $p_data["title"];
        $amount = ((int)$p_data["price"] * (int)$qty) + (int)$delivery;

        $fname = $_SESSION["u"]["fname"];
        $lname = $_SESSION["u"]["lname"];
        $mobile = $_SESSION["u"]["mobile"];
        $user_address = $address;
        $city = $district_data["name"];

        $array["id"] = $order_id;
        $array["item"] = $item;
        $array["amount"] = $amount;
        $array["fname"] = $fname;
        $array["lname"] = $lname;
        $array["mobile"] = $mobile;
        $array["address"] = $user_address;
        $array["city"] = $city;
        $array["mail"] = $umail;

        echo json_encode($array);


    }
}
}
