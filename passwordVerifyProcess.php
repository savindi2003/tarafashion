<?php

require "connection.php";

$vcode = $_POST["vcode"];

$v_rs = Database::search("SELECT * FROM `user` WHERE `verification_code`='".$vcode."'");
$v_data =$v_rs->num_rows;

if($v_data ==1){
    echo ("success");
}else{
    echo ("Invalid Verification Code");
}


?>