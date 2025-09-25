<?php



require "connection.php";

$collection = $_POST["collec"];
$category = $_POST["category"];
$size = $_POST["size"];
$material = $_POST["material"];
$type = $_POST["type"];
$title = $_POST["title"];
$color =$_POST["color"];
$color_in = $_POST["color_in"];
$qty = $_POST["qty"];
$price = $_POST["price"];
$dfw = $_POST["dfw"];
$dfo = $_POST["dfo"];
$desc = $_POST["desc"];

if($collection == "0"){
    echo ("Please select a Collection");
}else if ($category == "0"){
    echo ("Please select a category");
}else if($size == "0"){
    echo ("Please select a size");
}else if($material == "0"){
    echo ("Please select a material");
}else if($type == "0"){
    echo ("Please select a type");
}else if(empty($title)){
    echo ("Please Enter a Title");
}else if (strlen($title <= 100)){
    echo ("Title should have lover than 100 characters");
}else if ($color == "0"){
    echo ("Please select a color");
}else if (empty($qty)){
    echo ("Please Enter a Quantity");
}else if($qty == "0" | $qty == "e" | $qty < 0){
    echo ("Invalid input for Quantity");
}else if (empty($price)){
    echo ("Please Enter a Price");
}else if(!is_numeric($price)){
    echo("Invalid input for cost");
}else if (empty($dfw)){
    echo ("Please Enter the delivery cost inside Colombo");
}else if(!is_numeric($dfw)){
    echo("Invalid input for delivery cost inside Colombo ");
}else if (empty($dfo)){
    echo ("Please Enter the delivery cost out of Colombo");
}else if(!is_numeric($dfo)){
    echo("Invalid input for delivery cost out of Colombo ");
}else{

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    $status = 1;

    Database::iud("INSERT INTO `product` (`coleection_id`,`title`,`price`,`qty`,`description`,`datetime_added`,`delivery_fee_weston`,`delivery_fee_other`,`color_id`,`status_id`,`material_id`,`trend_id`,`category_id`,`size_id`)
    VALUES ('".$collection."','".$title."','".$price."','".$qty."','".$desc."','".$date."','".$dfw."','".$dfo."','".$color."','".$status."','".$material."','".$type."','".$category."','".$size."')");



$product_id = Database::$connection->insert_id;

$length = sizeof($_FILES);

if($length <= 3 && $length > 0){

 $allowed_img_extentions = array ("image/jpg","image/jpeg","image/png","image/svg+xml");

     for($x =0;$x < $length;$x++){
         if(isset($_FILES["image".$x])){

             $img_file = $_FILES["image".$x];
             $file_extention = $img_file["type"];

             if(in_array($file_extention,$allowed_img_extentions)){
                
                 $new_img_extention;

                 if($file_extention == "image/jpg"){
                     $new_img_extention = ".jpg";
                 }else if($file_extention == "image/jpeg"){
                     $new_img_extention = ".jpeg";
                 }else if($file_extention == "image/png"){
                     $new_img_extention = ".png";
                 }else if($file_extention == "image/svg+xml"){
                     $new_img_extention = ".svg";
                 }

                 
                 $file_name = "resources//product_images//".$title."_".$x."_".uniqid().$new_img_extention;
                 move_uploaded_file($img_file["tmp_name"],$file_name);

                 Database::iud("INSERT INTO `product_img`(`path`,`product_id`) VALUES ('".$file_name."','".$product_id."')");


                
                 
             }else{
                 echo ("Invalid Image type");
             }

         }
     }

     echo ("success");

 }else{
     echo ("Invalid image count");
 }
 


}


?>