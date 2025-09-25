<?php

require "connection.php";


$fname1 = $_POST["f"];
$lname1 = $_POST["l"];
$email1 = $_POST["e"];
$password1 = $_POST["p"];


if(empty($fname1)){
    echo("Please enter your First Name");
}else if(strlen($fname1)>50){
    echo ("First Name must have less than 50 charcters");
}else if(empty($lname1)){
    echo ("Please enter your Last Name ");
}else if(empty($email1)){
    echo ("Please enter your email");
}else if(strlen($lname1)>100){
    echo ("Email must have less than 100 charcters");
}else if (!filter_var($email1,FILTER_VALIDATE_EMAIL)){
    echo ("Invalid Email");
}else if (empty($password1)){
    echo ("Please enter your Password");
}else if(strlen($password1) < 5 || strlen($password1) > 20){
    echo ("Password must be between 5-20 charcters");
}else{

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email1."' ");
    $n = $rs->num_rows;

    if($n > 0){
        echo ("User with the same Email  already exists");
    }else{
        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");

        Database::iud("INSERT INTO `user` (`fname`,`lname`,`email`,`password`,`join_date`,`status`) VALUES
        ('".$fname1."','".$lname1."','".$email1."','".$password1."','".$date."','1')");

        echo "success";
    }

}

?>