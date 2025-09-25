<?php

require "connection.php";

if(isset($_GET["p"])){
    $pro_id = $_GET["p"];

    

    $dis_rs=Database::search("SELECT * FROM `district` WHERE `province_id` = '".$pro_id."' ");
    $dis_num=$dis_rs->num_rows;

    for($x=0; $x < $dis_num; $x++){
        $dis_data=$dis_rs->fetch_assoc();

        ?>
        <option value="<?php echo $dis_data["id"]; ?>" ><?php echo $dis_data["name"]; ?></option>
        <?php
    }

    
}


?>