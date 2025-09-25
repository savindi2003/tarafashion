<?php

session_start();
require "connection.php";

$recever_mail = $_SESSION["au"]["email"];
$sender_mail = $_POST["em"];
$no = $_POST["no"];


Database::iud("UPDATE `chat` SET `type` = '0' WHERE `user_email`='" . $sender_mail . "' ");


$su_rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $sender_mail . "' ");
$su_data = $su_rs->fetch_assoc();





?>


<div class="col-12">
    <div class="row ">

        <div class="col-12">
            <div class="row" style="background-color: rgb(46,46,46) ;">


                <?php
                $img_rs = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $su_data["email"] . "'");
                $img_num = $img_rs->num_rows;
                if ($img_num == 0) {
                ?>

                    <div class="col-1 d-flex align-items-center">
                        <img src="resources/pp.png" style="width:50px ; height:50px;" class="rounded-circle" />
                    </div>
                <?php

                } else {
                    $img_data = $img_rs->fetch_assoc();
                ?>

                    <div class="col-1 d-flex align-items-center">
                        <img src="<?php echo $img_data["path"]; ?>" style="width:50px ; height:50px;" class="rounded-circle" />
                    </div>
                <?php
                }
                ?>


                <div class="col-9 mt-3  ">
                    <div class="row">
                        <label class=" col-12  mx-2 text-white"><?php echo $su_data["fname"] . " " . $su_data["lname"]; ?></label>
                        <p class="col-12  mx-2 text-secondary text-nowrap " style="font-size:12px ;"><?php echo $sender_mail; ?></p>

                    </div>
                </div>

            </div>
        </div>

        <div class="col-12 mt-4">
            <div class="row  box3" style="height: 600px;">

                <?php

                $chat_rs = Database::search("SELECT * FROM `chat` WHERE `user_email`='" . $sender_mail . "' ");
                $chat_num = $chat_rs->num_rows;

                for ($x = 0; $x < $chat_num; $x++) {
                    $chat_data = $chat_rs->fetch_assoc();

                    if ($chat_data["status"] == "2") {




                ?>

                        <!---send--->

                        <div class="col-6 offset-6">
                            <div class="row">



                                
                                    <div class="col-11 " style="border-radius:30px ; background-color: rgb(46,46,46) ;">
                                        <span class=" text-light mt-2 mb-2 mx-2 " style=" font-size:13px;"><?php echo $chat_data["content"]; ?></span>
                                    </div>

                                    <div class="col-1 d-flex align-items-center justify-content-center">
                                            <div class="row">
                                                <div style="width: 20px;height: 20px;border-radius: 50%;" class="bg-warning  d-flex align-items-center justify-content-center ">
                                                    <label><i class="bi bi-person-fill"></i></label>
                                                </div>

                                            </div>
                                        </div>



                                    <div class="col-12 text-end ">
                                        <span class="text-white " style="font-size:10px ;"><?php echo $chat_data["time"]; ?></span>
                                    </div>
                                


                            </div>
                        </div>




                    <?php
                    } else if ($chat_data["status"] == "1") {
                    ?>

                        <!---send--->

                        <!---receiver--->

                        <div class="col-7 ">
                            <div class="row ">

                                <?php
                                $img_rs = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $sender_mail . "' ");
                                $img_num = $img_rs->num_rows;
                                if ($img_num == 0) {
                                ?>
                                    <div class="col-2 ">
                                        <img src="resources/pp.png" style="width:10px ; height:10px;" class="rounded-circle" />

                                    </div>
                                <?php

                                } else {
                                    $img_data = $img_rs->fetch_assoc();
                                ?>
                                    <div class="col-2 d-flex align-items-center">
                                        <img src="<?php echo $img_data["path"]; ?>" style="width:10px ; height:0px;" class="rounded-circle" />

                                    </div>
                                <?php
                                }
                                ?>



                                <div class="col-10">
                                    <div class="row">


                                        <div class="col-1 d-flex align-items-center justify-content-center">
                                            <div class="row">
                                                <div style="width: 20px;height: 20px;border-radius: 50%;" class="bg-warning  d-flex align-items-center justify-content-center ">
                                                    <label><i class="bi bi-person-fill"></i></label>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-11 bg-warning  " style="border-radius:30px ;">
                                            <span class="  mt-2 mb-2 mx-2 " style=" font-size:13px;"><?php echo $chat_data["content"]; ?></span>
                                        </div>





                                        <div class="col-12 text-end ">
                                            <span class="text-white " style="font-size:10px ;"><?php echo $chat_data["time"]; ?></span>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php
                    }
                    ?>

                    <!---receiver--->

                <?php
                }


                ?>


            </div>
        </div>


        <div class=" col-12  d-flex align-items-center">

            <input type="text" placeholder="    Start typing..." class="col-9  offset-1 bg-dark text-light border border-secondary pt-2 pb-2 mb-4  mt-2" style="height:40px; font-size:12px;padding-left: 50px;" id="u_m_txt">
            <label class="col-1 btn btn-outline-warning mx-2 text-white mt-2 mb-4" style="height:40px;"><i class="bi bi-send text-white fw-bold fs-4" onclick="senMsg('<?php echo $sender_mail; ?>');"></i></label>

        </div>




    </div>

</div>



<?php

?>