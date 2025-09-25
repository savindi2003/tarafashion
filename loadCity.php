<?php

require "connection.php";

if(isset($_GET["d"])){
    $dis_id = $_GET["d"];

    $city_rs=Database::search("SELECT * FROM `city` WHERE `district_id`='".$dis_id."'");
    $city_num=$city_rs->num_rows;

    for($x=0; $x < $city_num; $x++){
        $city_data=$city_rs->fetch_assoc();

        ?>
        <option value="<?php echo $city_data["id"]; ?>" ><?php echo $city_data["name"]; ?></option>
        <?php
    }

}

?>