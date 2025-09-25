<?php

session_start();

require "connection.php";

$email = $_SESSION["u"]["email"];
$pid = $_POST["pid"];
$newQty = $_POST["qty"];

Database::iud("UPDATE `cart`  SET `qty`='".$newQty."' WHERE `user_email`='".$email."' AND `product_id` = '".$pid."' ");

echo ("success");

?>