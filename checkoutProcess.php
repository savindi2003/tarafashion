<?php

session_start();

require "connection.php";

if (isset($_SESSION["u"])) {

    $umail = $_SESSION["u"]["email"];
    // echo $umail;

    $total = "0";
    $shipping = "0";
$array;


    $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $umail . "' AND `check` = '1' ");
    $cn = $cart_rs->num_rows;

    for ($i = 0; $i < $cn; $i++) {

        $c_data = $cart_rs->fetch_assoc();
        $proid = $c_data["product_id"];
        // echo $crs["product_id"];
        // echo "<br/>";
        $orderID = uniqid();

       

        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");

        $product = Database::search("SELECT * FROM `product` WHERE `id`='" . $proid . "' ");
        $productrs = $product->fetch_assoc();

        $price = $productrs["price"];
        $qty = $c_data["qty"];
        // echo $price;
        // echo $qty;

        $total = $total + ($price * $qty);


        $addresrs = Database::search("SELECT * FROM  `user_has_address` WHERE `user_email`='" . $umail . "'  ");
        $ar = $addresrs->fetch_assoc();
        $cityid = $ar["city_id"];

      
        $add = $ar["line1"] . "," . $ar["line2"];

        $district = Database::search("SELECT * FROM  `city` WHERE `id`='" . $cityid . "'  ");
        $xr = $district->fetch_assoc();
        $disrictid = $xr["district_id"];

        $ship = "0";

        if ($disrictid == 1) {
           // $ship = $productrs["delivery_fee_weston"];

            $shipping =  $productrs["delivery_fee_weston"];
        } else {
           // $ship = $productrs["delivery_fee_other"];

            $shipping =  $productrs["delivery_fee_other"];
        }
    }
    $amount= $total + $shipping;
    $item = $productrs["title"];
    // $amount = $pr["price"] * $qty + (int)$delivery;

    $fname = $_SESSION["u"]["fname"];
    $lname = $_SESSION["u"]["lname"];
    $mobile = $_SESSION["u"]["mobile"];


    
    $merchant_id = "1221148";
    $currency = "LKR";
    $merchant_secret="NDExNDk0MTIzMzI4MDEyMzY4NTE3NTIzMjI4ODcxMTM2NzE2MQ==";



    $hash = strtoupper(
        md5(
            $merchant_id . 
            $orderID . 
            number_format($amount, 2, '.', '') . 
            $currency .  
            strtoupper(md5($merchant_secret)) 
        ) 
    );

    $address = $add;
    $city = $xr["name"];

    $array['id'] = $orderID;
    // $array['item'] = $item;
    $array['amount'] = $amount;
    $array['fname'] = $fname;
    $array['lname'] = $lname;
    $array['email'] = $umail;
    $array['mobile'] = $mobile;
    $array['address'] = $address;
    $array['city'] = $city;
    $array["hash"] = $hash;
    $array["shipping"] = $shipping;

    echo json_encode($array);

    // echo $total;
    // echo $shipping;

   
    
    
}
