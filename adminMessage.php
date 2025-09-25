<?php
session_start();
require "connection.php";

if (isset($_SESSION["au"])) {

?>

    <!DOCTYPE html>

    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Thara Fashion | Admin Panel | Customer Chats</title>

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css" />

        <link rel="icon" href="resources/logo1.jpg" />



    </head>

    <body class="bg-dark" style="overflow: hidden;">

        <div class="container-fluid">
            <div class="row">



                <div class="col-4 ">
                    <div class="row  vh-100 " style="background-color: rgb(46,46,46) ; ">

                        <div class="col-12">
                            <div class="row bg-dark" style="height:80px ;">
                                <span class="h1 fw-bold text-secondary mx-3 mt-4 mb-4" style="letter-spacing: 3px;">Chats</span>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row vh-100 box3">



                                <?php
                                $user_rs = Database::search("SELECT * FROM `user` ");
                                $user_num = $user_rs->num_rows;

                                for ($x = 0; $x < $user_num; $x++) {
                                    $user_data = $user_rs->fetch_assoc();

                                    

                                    $n_rs = Database::search("SELECT * FROM `chat` WHERE `user_email` = '" . $user_data["email"] . "' AND `type` = '1' ");
                                    $n_num = $n_rs->num_rows;

                                ?>

                                    <div class="col-12">
                                        <div class="row border border-dark chat_box" id="ndiv" style="height:100px ;" onclick="viewMsgBox('<?php echo $user_data['email']; ?>');">

                                        <?php
                                        $img_rs = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $user_data["email"] . "'");
                                        $img_num = $img_rs->num_rows;

                                        if($img_num == 0){
                                            ?>
                                             <div class="col-2 d-flex align-items-center">
                                                <img src="resources/pp.png" style="width:60px ; height:60px;" class="rounded-circle" />
                                            </div>
                                            <?php
                                        }else {
                                            $img_data=$img_rs->fetch_assoc();
                                            ?>
                                            <div class="col-2 d-flex align-items-center">
                                               <img src="<?php echo $img_data["path"]; ?>" style="width:60px ; height:60px;" class="rounded-circle" />
                                           </div>
                                           <?php
                                        }

                                        ?>
                                           

                                            <div class="col-9 ">
                                                <label class=" col-12 mt-4  mx-2 text-white"><?php echo $user_data["fname"] . " " . $user_data["lname"]; ?></label>
                                                <label class=" col-12  mx-2 text-secondary" style="font-size: 15px;" ><?php echo $user_data["email"];?></label>
                                               
                                            </div>

                                            <?php
                                            if ($n_num != "0") {
                                            ?>
                                                <div class="col-1 d-flex align-items-center" >
                                                    <span class="badge rounded-pill text-bg-warning" id="no"><?php echo $n_num; ?></span>


                                                </div>
                                            <?php
                                            }
                                            ?>


                                        </div>
                                    </div>

                                <?php


                                }
                                ?>

                            </div>
                        </div>



                    </div>

                </div>

                <div class="col-8 d-flex justify-content-center" id="msgBox" >
                    <div class="row align-content-center">

                   

                      <!---empty view --->

                      <div class="col-12 ">
                        <div class="row text-center">
                            <span class=" text-secondary"><i class="bi bi-chat-text " style="font-size:100px ;"></i></span>
                        </div>
                    </div>
                    <div class="col-12 ">
                        <div class="row text-center ">
                            <span class="fs-1 text-secondary">No Chat History</span>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row text-center ">
                            <span class="text-secondary fs-5" >No messages in your inbox</span>
                        </div>
                    </div>
                  


                    <!---empty view --->
                

                    </div>
                </div>
            </div>
            <script src="bootstrap.bundle.js"></script>
            <script src="script.js"></script>
    </body>

    </html>

<?php
}
?>