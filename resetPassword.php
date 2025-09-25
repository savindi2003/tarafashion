<?php

require "connection.php";

$pw1 =$_POST["pw1"];
$pw2 =$_POST["pw2"];

if(empty($pw1)){
    echo("Please insert a New Password");
}else if(strlen($pw1)<5 || strlen($pw1)>10){
    echo ("Invalid Password");
}else if(empty($pw2)){
    echo("Please Re-type your new password");
}else if(strlen($pw2)<5 || strlen($pw2)>10){
    echo ("Invalid Password");
}else if($pw1 != $pw2){
    echo("Password dose not matched");
}else{

    Database::iud("UPDATE `user` SET `password` ='".$pw1."'");
    echo ("success");


}
    



?>