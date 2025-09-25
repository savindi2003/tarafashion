<?php

require "connection.php";

if (isset($_POST["us"])) {
    $user_id = $_POST["us"];

    $u_rs = Database::search("SELECT * FROM `user` WHERE `email`  LIKE '%" . $user_id . "%'");
    $u_num = $u_rs->num_rows;

    if ($u_num == 1) {
        $u_data = $u_rs->fetch_assoc();

?>

        <div class="col-12  mb-1 ">
            <div class="row ">
                <div class="col-2 col-lg-1  py-2 text-end " style="background-color: rgb(46,46,46) ;">
                    <span class=" text-white"></span>
                </div>

                <div class="col-4 col-lg-1 ">
                    <?php
                    $image_rs = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $u_data["email"] . "'");
                    $image_num = $image_rs->num_rows;
                    if ($image_num == 0) {
                    ?>
                        <img src="resources/pp.png" style="width:30px;height:30px;" class="mx-5" />
                    <?php
                    } else {
                        $image_data = $image_rs->fetch_assoc();
                    ?>
                        <img src="<?php echo $image_data["path"] ?>" style="width:30px;height:30px;" class="mx-5" />
                    <?php
                    }
                    ?>


                </div>

                <div class="col-4 col-lg-2  py-2">
                    <span class="text-white text-white"><?php echo $u_data["fname"] . " " . $u_data["lname"]; ?></span>
                </div>
                <div class="col-4 col-lg-4 d-lg-block  py-2" style="background-color: rgb(46,46,46) ;">
                    <span class="text-white"><?php echo $u_data["email"]; ?></span>
                </div>
                <div class="col-4 col-lg-2  py-2">
                    <span class="text-white"><?php echo $u_data["join_date"]; ?></span>
                </div>

                <?php
                $o_rs = Database::search("SELECT * FROM `invoice` WHERE `user_email`='" . $u_data["email"] . "' ");
                $o_num = $o_rs->num_rows;
                ?>

                <div class="col-1  y py-2 " style="background-color: rgb(46,46,46) ;">
                    <span class=" text-white"><?php echo $o_num; ?></span>
                </div>

                <div class="col-2 col-lg-1  py-2 d-grid ">
                                    <?php
                                    if ($u_data["status"] == 1) {
                                    ?>
                                        <button class=" btn btn-danger btn-sm " id="ub<?php echo $u_data['email']; ?>" onclick="block('<?php echo $u_data['email']; ?>');" style="border-radius:30px ;">Block</button>
                                    <?php
                                    } else {
                                    ?>
                                        <button class="  btn  btn-warning btn-sm " id="ub<?php echo $u_data['email']; ?>" onclick="block('<?php echo $u_data['email']; ?>');" style="border-radius:30px ;">Unblock</button>
                                    <?php
                                    }
                                    ?>

                                </div>


            </div>
        </div>

    <?php
    } else {
    ?>
        <div class="col-12  mb-1 ">
            <div class="row ">
                <div class="col-12  py-2 text-end " style="background-color: rgb(46,46,46) ;">
                    <span class=" text-white">No User Found</span>
                </div>
        <?php
    }
}
        ?>