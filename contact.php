<?php require "connection.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Thara Fashion | Help & Contact</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/logo.svg" />
</head>

<body style="overflow-x: hidden;">

    <div class="container-fluid">
        <div class="row">

            <?php include "header.php"; ?>

            <div class="col-12">
                <div class="row">



                    <div class="col-lg-6 col-12 " id="normalview">
                        <div class="row">
                            <span class="fw-bold mx-5 mt-5 text-warning" style="font-size:60px;">Contact us</span>
                            <span class="mx-lg-5 mx-0 mt-3 mb-3">Still looking for answers? Ask Daz anytime, day or night, just click on "Chat Now" below. <br />Or speak to us via live chat from 7:00 AM- 11:59 PM (11th Nov)</span>

                            <div class="col-12 mt-5 mx-5">
                                <div class="row">
                                    <div class="col-lg-5 col-12  ms-3">
                                        <div class="row  shadow-lg mx-2" style="height:350px ;">

                                            <div class="col-12 text-center  mt-3 mb-2"><i class="bi bi-telephone fs-1 text-secondary"></i></div>

                                            <span class="fs-5 text-center fw-bold ">Talk to us</span>

                                            <p class=" text-center mt-4 mb-4" style="font-size:12px ;">Contact our company for any problem you may have regarding our service. It operates only from 9.00 AM to 5.00 PM.</p>


                                            <p class="text-primary text-center">+94 784 476 239</p>
                                            <p class="text-primary text-center mb-4">+94 784 476 230</p>


                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-12 ms-3 ms-lg-0 mt-5 mt-lg-0">
                                        <div class="row  shadow-lg mx-2" style="height:350px ;">

                                            <div class="col-12 text-center mt-3 mb-2"><i class="bi bi-chat-text fs-1 text-secondary"></i></div>
                                            <span class="fs-5 text-center fw-bold">Chat with us</span>

                                            <p class=" text-center mt-4 mb-4" style="font-size:12px ;">Send us your problem. Our team will contact you soon.</p>
                                            <p class=" text-center  mb-4" style="font-size:12px ;">24 hours * 7 days</p>

                                            <?php

                                            if (isset($_SESSION["u"])) {
                                                $u_mail = $_SESSION["u"]["email"];


                                            ?>
                                                <button class=" col-6 offset-3 btn btn-warning btn-sm text-white mb-4   " style="border-radius:30px;" onclick="viewUserMsgBox();"> Chat now </button>
                                            <?php

                                            } else {

                                            ?>
                                                <button class=" col-6 offset-3 btn btn-warning btn-sm text-white mb-4   " style="border-radius:30px;" onclick="window.location='index.php';">Chat now</button>
                                            <?php
                                            }

                                            ?>




                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>






                    <!-- Msg Box -->
                    <div class="col-6 offset-1 d-none  " id="msgbox">
                        <div class="row">

                            <div class="col-12 mb-5 " style="height:625px ;">
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
                                        <div class="row box3 border border-warning" style="height:525px ;">



                                            <?php

                                            $u_mail = $_SESSION["u"]["email"];

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
                                                }else if($chat_data["status"] == "1"){
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


                        </div>
                    </div>
                    <!-- Msg Box -->

                    <div class="col-6 d-none d-lg-block" id="chatimg">
                        <img src="resources/call6.jpg" style="width:650px;height:650px ;" />
                    </div>




                    <!---chat model-->
                    <div class="modal" tabindex="-1" id="userMsgModal<?php echo $u_mail; ?>">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" style="overflow-y: scroll; height: 40vh;">

                                    <?php
                                    $u_mail = $_SESSION["u"]["email"];

                                    $chat_rs = Database::search("SELECT * FROM `chat` WHERE `user_email`='" . $u_mail . "' ");
                                    $chat_num = $chat_rs->num_rows;

                                    for ($x = 0; $x < $chat_num; $x++) {
                                        $chat_data = $chat_rs->fetch_assoc();

                                        if ($chat_data["status"] == "1") {
                                    ?>
                                            <div class="col-9 offset-3">
                                                <div class="row border border-warning   " style="border-radius:30px ;">
                                                    <span class="  mt-2 mb-2 mx-2 " style=" font-size:13px;"><?php echo $chat_data["content"]; ?></span>
                                                </div>
                                                <div class="col-12 text-end ">
                                                    <span class=" " style="font-size:10px ;"><?php echo $chat_data["time"]; ?></span>
                                                </div>
                                            </div>
                                        <?php

                                        } else if ($chat_data["status"] == "2") {
                                        ?>
                                            <div class="col-9">

                                                <div class="row bg-warning  " style="border-radius:30px ;">
                                                    <span class="  mt-2 mb-2 mx-2 text-light " style=" font-size:13px;"><?php echo $chat_data["content"]; ?></span>
                                                </div>
                                                <div class="col-12 text-end ">
                                                    <span class=" " style="font-size:10px ;"><?php echo $chat_data["time"]; ?></span>

                                                </div>
                                            </div>
                                    <?php
                                        }
                                    }

                                    ?>






                                </div>
                                <div class="modal-footer">
                                    <div class=" col-12 d-flex align-items-center justify-content-center">

                                        <input type="text" placeholder="    Start typing..." class="col-10   border border-secondary pt-2 pb-2 mb-1  mt-1 px-2" style="height:40px; font-size:12px; border-radius:30px;" id="u_m_txt">
                                        <label class="col-1   mt-1 mb-1" style="height:40px;"><i class="bi bi-send fs-3 fw-bold text-warning mx-5 " onclick="senMsg();"></i></label>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!---chat model-->

                    </div>
                </div>
                <?php include "footer.php"; ?>

            </div>
        </div>

        <script src="bootstrap.bundle.js"></script>
        <script src="script.js"></script>
</body>

</html>