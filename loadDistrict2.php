<?php

require "connection.php";

if(isset($_GET["c1"])){
    $city_id = $_GET["c1"];

$city_rs=Database::search("SELECT * FROM `city` WHERE `id`='".$city_id."'");
$city_data=$city_rs->fetch_assoc();

$dis_rs=Database::search("SELECT * FROM `district` WHERE `id` = '".$city_data["district_id"]."'");
$dis_data=$dis_rs->fetch_assoc();

?>
<option value="<?php echo $dis_data["id"]; ?>" ><?php echo $dis_data["name"]; ?></option>
<?php

}
?>