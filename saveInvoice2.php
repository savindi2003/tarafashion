

<?php
//cart checkout

session_start();

require "connection.php";

if(isset($_SESSION["u"])){
    $umail = $_SESSION["u"]["email"];

    $oid= $_POST["o"];
    $amount = $_POST["a"];
    $shipping = $_POST["f"];
   

    
    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    
    $c_rs= Database::search("SELECT * FROM `cart` WHERE `user_email`='".$umail."' AND `check` ='1' ");
    $c_num=$c_rs->num_rows;


    for($n=0; $n < $c_num; $n++){
        $c_data=$c_rs->fetch_assoc();

        $p_rs =Database::search("SELECT * FROM `product` WHERE `id`='".$c_data["product_id"]."' ");
        $p_data =$p_rs->fetch_assoc();

        $price = $p_data["price"];
        $qty= $p_data["qty"];
        $new_qty = $qty - $c_data["qty"];

        Database::iud("UPDATE `product` SET `qty`='".$new_qty."' WHERE `id`='".$p_data["id"]."'");

       
        Database::iud("INSERT INTO `cart_invoice` (`product_id`,`order_id`,`price`,`shipping_price`,`qty`,`cart_id`,`user_email`,`date`) 
        VALUES ('".$p_data["id"]."','".$oid."','".$price."','".$shipping."','".$c_data["qty"]."','".$c_data["id"]."','".$umail."','".$date."') ");

    }

        Database::iud("INSERT INTO `invoice`(`order_id`,`date`,`total`,`status`,`user_email`,`type`) VALUES 
        ('".$oid."','".$date."','".$amount."','0','".$umail."','2')");  //type 2 = cart checkout

        

       
       Database::iud("DELETE FROM `cart` WHERE `user_email`='".$umail."' AND `check` ='1'  ");

       echo ("1");

}else{
    echo ("login first");
}
