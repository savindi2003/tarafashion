<?php
session_start();
require "connection.php";
$u_mail = $_SESSION["u"]["email"];

?>

<!-- <div class="col-6 offset-1 d-none  " id="msgbox">
    <div class="row"> -->

        <div class="col-11 offset-1 mb-5 " style="height:625px ;">
            <div class="row">

                <div class="col-12 bg-success" style="height:50px ;">
                    <div class="row">

                        <div class="col-1 bg-warning d-flex align-items-center" style="height:50px ;">
                            <i class="bi bi-arrow-left-circle fs-4 text-white" style="cursor: pointer;" onclick="closeUserMsgBox();"></i>
                        </div>

                        <div class="col-11 bg-warning d-flex align-items-center justify-content-end" style="height:50px ;">
                            <!-- <div class="row d-flex justify-content-end"> -->
                            <label class="fs-4 text-white " style="padding-right: 20px;">Help Center</label>
                            <!-- </div> -->

                        </div>




                    </div>

                </div>


                <div class="col-12 ">
                    <div class="row box3 border border-warning" style="height:525px ; " >



                        <?php

                        
                        $chat_rs = Database::search("SELECT * FROM `chat` WHERE `user_email` = '" . $u_mail . "' ");
                        $chat_num = $chat_rs->num_rows;

                        for ($x = 0; $x < $chat_num; $x++) {
                            $chat_data = $chat_rs->fetch_assoc();

                            if ($chat_data["status"] == "2") {
                        ?>
                                <!-- Recieve -->
                                <div class="col-7 mt-1">
                                    <div class="row  d-flex  justify-content-end">

                                        <div class="col-1 d-flex align-items-center justify-content-center">
                                            <div class="row">
                                                <div style="width: 20px;height: 20px;border-radius: 50%;" class="bg-warning  d-flex align-items-center justify-content-center ">
                                                    <label><i class="bi bi-person-fill"></i></label>
                                                </div>

                                            </div>
                                        </div>


                                        <div class="col-11 bg-warning d-flex align-items-center " style="border-radius:30px ;padding-left:10px;">
                                            <span class="mt-2 mb-2"><?php echo $chat_data["content"]; ?></span>

                                        </div>
                                        <div class="col-11 text-end">
                                            <span style="font-size: 10px;"><?php echo $chat_data["time"]; ?></span>
                                        </div>
                                    </div>
                                </div>


                            <?php
                            } else if ($chat_data["status"] == "1") {
                            ?>

                                <!-- Send -->
                                <div class="col-6 offset-6 mt-1">
                                    <div class="row">
                                        <div class="col-11 border border-warning d-flex align-items-center " style="border-radius:30px ;padding-left:10px;">
                                            <span class="mt-2 mb-2"><?php echo $chat_data["content"]; ?></span>
                                        </div>
                                        <div class="col-1 d-flex align-items-center justify-content-center">
                                            <div class="row">
                                                <div style="width: 20px;height: 20px;border-radius: 50%;" class="bg-warning  d-flex align-items-center justify-content-center ">
                                                    <label><i class="bi bi-person-fill text-white"></i></label>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-11 text-end ">
                                            <span style="font-size: 10px;"><?php echo $chat_data["time"]; ?></span>
                                        </div>
                                    </div>
                                </div>

                        <?php
                            }
                        }

                        ?>





                    </div>




                </div>


                <div class="col-12 bg-warning " style="height:50px ;">
                    <div class="row">

                        <div class="col-7 offset-2 bg-warning d-flex align-items-center " style="height:50px ;">
                            <input type="text" placeholder="Start typing..." class="col-12   border border-secondary pt-2 pb-2 mb-1  mt-1 " style="height:40px; font-size:12px; border-radius:30px;padding-left:30px; " id="u_m_txt">

                        </div>

                        <div class="bg-white d-flex align-items-center justify-content-center " style="height:40px ;width: 40px;border-radius: 50%;margin-top: 5px;cursor: pointer;">
                            <i class="bi bi-send fs-5 text-warning" onclick="senMsg();"></i>
                        </div>






                    </div>

                </div>





            </div>


        </div>


    <!-- </div>
</div> -->