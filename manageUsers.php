<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Thara Fashion | Manage Users</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resources/logo2.jpg" />



</head>

<body class="bg-dark">

    <div class="container-fluid">
        <div class="row">

            <?php require "connection.php"; ?>


            <div class="col-12">
                <div class="row mt-2 mb-2" style="background-color: rgb(46,46,46) ;">
                    <span class="h2 text-light text-start fw-bolder"> User Details</span>
                </div>

            </div>

            <div class="col-12 pt-3 mb-1 bg-dark">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item text-light"><a href="AdminPanel.php" style="font-size:12px;">Dashboard</a></li>
                        <li class="breadcrumb-item text-light"><a href="#" style="font-size:12px;">Manage Users</a></li>

                    </ol>
                </nav>
            </div>


            <div class=" col-lg-6 offset-lg-3 col-12 d-flex justify-content-center ">
                <input type="text" name="search" placeholder="Search.." class="search bg-dark text-light   pt-2 pb-2 rounded-end mb-2 mt-2" style="border-radius:30px ; height:30px; font-size:12px;" id="us">
                <span class="input-group-text rounded-start mb-2 mt-2" style="border-radius:30px ;  font-size:12px; height:30px;" onclick="searchUser();"><i class="bi bi-search"></i></span>
            </div>


            <div class="col-12 d-none d-lg-block">
                <div class="row " style=" overflow-y: scroll; height:550px;">

                            <div class="col-2 col-lg-1 mt-3 mb-2  py-2 text-end " style="background-color: rgb(46,46,46) ;">
                                <span class=" text-white ">Id</span>
                            </div>

                            <div class="col-4 col-lg-1 mt-3 mb-2 py-2">
                                <span class="text-white text-white "></span>
                            </div>

                            <div class="col-4 col-lg-2 mt-3 mb-2 py-2">
                                <span class="text-white ">Name</span>
                            </div>
                            <div class="col-4 col-lg-4 mt-3 mb-2 d-lg-block  py-2" style="background-color: rgb(46,46,46) ;">
                                <span class="text-white ">Email</span>
                            </div>
                            <div class="col-4 col-lg-2 mt-3 mb-2 py-2">
                                <span class="text-white ">Registered Date</span>
                            </div>

                            <div class="col-1  y py-2 mt-3 mb-2 " style="background-color: rgb(46,46,46) ;">
                                <span class=" text-white ">Orders</span>
                            </div>

                            <div class="col-2 col-lg-1 mt-3 mb-2"></div>
                     


                    <?php
                    $user_rs = Database::search("SELECT * FROM `user` ORDER BY `join_date` DESC");
                    $user_num = $user_rs->num_rows;

                    for ($x = 0; $x < $user_num; $x++) {
                        $user_data = $user_rs->fetch_assoc();
                    ?>
                        <div class="col-12  " id="view_area3">
                            <div class="row ">
                                <div class="col-2 col-lg-1   text-end " style="background-color: rgb(46,46,46) ;">
                                    <span class=" text-white"><?php echo $x + 1; ?></span>
                                </div>

                                <div class="col-4 col-lg-1 ">
                                    <?php
                                    $image_rs = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $user_data["email"] . "'");
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

                                <div class="col-4 col-lg-2  ">
                                    <span class="text-white text-white"><?php echo $user_data["fname"] . " " . $user_data["lname"]; ?></span>
                                </div>
                                <div class="col-4 col-lg-4 d-lg-block  " style="background-color: rgb(46,46,46) ;">
                                    <span class="text-white"><?php echo $user_data["email"]; ?></span>
                                </div>
                                <div class="col-4 col-lg-2  ">
                                    <span class="text-white"><?php echo $user_data["join_date"]; ?></span>
                                </div>

                                <?php
                                $o_rs = Database::search("SELECT * FROM `invoice` WHERE `user_email`='" . $user_data["email"] . "' ");
                                $o_num = $o_rs->num_rows;
                                ?>

                                <div class="col-1   " style="background-color: rgb(46,46,46) ;">
                                    <span class=" text-white"><?php echo $o_num; ?></span>
                                </div>

                                <div class="col-2 col-lg-1  py-2 d-grid ">
                                    <?php
                                    if ($user_data["status"] == 1) {
                                    ?>
                                        <button class=" btn btn-danger btn-sm " id="ub<?php echo $user_data['email']; ?>" onclick="block('<?php echo $user_data['email']; ?>');" style="border-radius:30px ;">Block</button>
                                    <?php
                                    } else {
                                    ?>
                                        <button class="  btn  btn-warning btn-sm " id="ub<?php echo $user_data['email']; ?>" onclick="block('<?php echo $user_data['email']; ?>');" style="border-radius:30px ;">Unblock</button>
                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>

            <div class="col-12 d-block d-lg-none">
                <div class="row ">

                            <div class="col-1 mt-3 mb-2  py-2 text-end " style="background-color: rgb(46,46,46) ;">
                                <span class=" text-white " style="font-size:9px ;">Id</span>
                            </div>

                        

                            <div class="col-2 mt-3 mb-2 py-2">
                                <span class="text-white " style="font-size:9px ;">Name</span>
                            </div>
                            <div class="col-4 mt-3 mb-2 d-lg-block  py-2" style="background-color: rgb(46,46,46) ;">
                                <span class="text-white " style="font-size:9px ;">Email</span>
                            </div>
                            <div class="col-2 mt-3 mb-2 py-2">
                                <span class="text-white " style="font-size:9px ;">Registered Date</span>
                            </div>

                            <div class="col-1  y py-2 mt-3 mb-2 " style="background-color: rgb(46,46,46) ;">
                                <span class=" text-white " style="font-size:9px ;">Orders</span>
                            </div>

                            <div class="col-2 col-lg-1 mt-3 mb-2" style="font-size:9px ;"></div>
                     


                    <?php
                    $user_rs = Database::search("SELECT * FROM `user` ORDER BY `join_date` DESC");
                    $user_num = $user_rs->num_rows;

                    for ($x = 0; $x < $user_num; $x++) {
                        $user_data = $user_rs->fetch_assoc();
                    ?>
                        <div class="col-12  " id="view_area3">
                            <div class="row ">
                                <div class="col-1 col-lg-1   text-end " style="background-color: rgb(46,46,46) ;">
                                    <span class=" text-white" style="font-size:5px ;"><?php echo $x + 1; ?></span>
                                </div>

                               

                                <div class="col-2 col-lg-2  ">
                                    <span class="text-white text-white" style="font-size:5px ;"><?php echo $user_data["fname"] . " " . $user_data["lname"]; ?></span>
                                </div>
                                <div class="col-4 col-lg-4 d-lg-block   " style="background-color: rgb(46,46,46) ;">
                                    <span class="text-white" style="font-size:5px ;"><?php echo $user_data["email"]; ?></span>
                                </div>
                                <div class="col-2 col-lg-2  ">
                                    <span class="text-white" style="font-size:5px ;"><?php echo $user_data["join_date"]; ?></span>
                                </div>

                                <?php
                                $o_rs = Database::search("SELECT * FROM `invoice` WHERE `user_email`='" . $user_data["email"] . "' ");
                                $o_num = $o_rs->num_rows;
                                ?>

                                <div class="col-1   " style="background-color: rgb(46,46,46) ;">
                                    <span class=" text-white" style="font-size:5px ;"><?php echo $o_num; ?></span>
                                </div>

                                <div class="col-2 col-lg-1  py-2 d-grid ">
                                    <?php
                                    if ($user_data["status"] == 1) {
                                    ?>
                                        <button class=" btn btn-danger btn-sm " style="font-size:5px ;" id="ub<?php echo $user_data['email']; ?>" onclick="block('<?php echo $user_data['email']; ?>');" style="border-radius:30px ;">Block</button>
                                    <?php
                                    } else {
                                    ?>
                                        <button class="  btn  btn-warning btn-sm " style="font-size:5px ;" id="ub<?php echo $user_data['email']; ?>" onclick="block('<?php echo $user_data['email']; ?>');" style="border-radius:30px ;">Unblock</button>
                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>





        </div>
    </div>
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>
</div>