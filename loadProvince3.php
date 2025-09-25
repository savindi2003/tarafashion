<?php

require "connection.php";

if(isset($_GET["d"])){
    $dis_id = $_GET["d"];


$dis_rs=Database::search("SELECT * FROM `district` WHERE `id` = '".$dis_id."'");
$dis_data=$dis_rs->fetch_assoc();

$pro_rs=Database::search("SELECT * FROM `province` WHERE `id` = '".$dis_data["province_id"]."' ");
$pro_data=$pro_rs->fetch_assoc();

?>
<option value="<?php echo $pro_data["id"]; ?>" ><?php echo $pro_data["name"]; ?></option>
<?php




}
?>