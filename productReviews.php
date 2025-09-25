<?php
require "connection.php";
session_start();

if (isset($_SESSION["au"])) {

?>


    <!DOCTYPE html>

    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Thara Fashion | Product Review</title>

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css" />

        <link rel="icon" href="resources/logo2.jpg" />



    </head>

    <body class="bg-dark" style="overflow: hidden;">

        <div class="container-fluid">
            <div class="row">

                <div class="col-12">
                    <div class="row mt-2 mb-2" style="background-color: rgb(46,46,46) ;">
                        <span class="h2 text-light text-start fw-bolder"> Manage Product Reviews</span>
                    </div>

                </div>

                <div class="col-12 pt-3 mb-1 bg-dark">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-light"><a href="AdminPanel.php" style="font-size:12px;">Dashboard</a></li>
                            <li class="breadcrumb-item text-light"><a href="manageProduct.php" style="font-size:12px;">Manage Products</a></li>
                            <li class="breadcrumb-item text-light"><a href="#" style="font-size:12px;">Manage Product Reviews</a></li>

                        </ol>
                    </nav>
                </div>

                <div class="col-4">
                 <i class="bi bi-grid fs-4 text-warning" onclick="window.location='productReviewsPart2.php';"></i>
                
                </div>

                <div class=" col-4 offset-4 d-flex justify-content-center ">
                    <input type="text" name="search" placeholder="Search.." class="search bg-dark text-light   pt-2 pb-2 rounded-end mb-2 mt-2" style="border-radius:30px ; height:30px; font-size:12px;" id="sf">
                    <span class="input-group-text rounded-start mb-2 mt-2" style="border-radius:30px ;  font-size:12px; height:30px;" onclick="searchFeedback();"><i class="bi bi-search"></i></span>
                </div>

                <div class="col-12 mx-1">
                    <div class="row" style=" overflow-y: scroll; height:550px;">

                        <div class="col-12">
                            <div class="row mb-2">



                                <div class="col-2 col-lg-1 mb-1 py-2  ">
                                    <span class=" text-white "> Product Id</span>
                                </div>

                                <div class="col-2 col-lg-3 mb-1 py-2  " style="background-color: rgb(46,46,46) ;">
                                    <span class=" text-white "> User Email</span>
                                </div>

                                <div class="col-4 col-lg-2 mb-1 py-2">
                                    <span class="text-white ">Date & time</span>
                                </div>
                                <div class="col-4 col-lg-5 d-lg-block mb-1  py-2" style="background-color: rgb(46,46,46) ;">
                                    <span class="text-white ">Feedback Content</span>
                                </div>
                                <div class="col-4 col-lg-1 mb-1 py-2">
                                </div>
                            </div>

                            <?php

                            $feed_rs = Database::search("SELECT * FROM `feedback` ORDER BY `date` DESC ");
                            $feed_num = $feed_rs->num_rows;

                            for ($x = 0; $x < $feed_num; $x++) {
                                $feed_data = $feed_rs->fetch_assoc();

                            ?>
                                <div class="col-12" id="view_area4">
                                    <div class="row">
                                        <div class="col-2 col-lg-1 mb-1 py-2  ">
                                            <a class=" text-white " style="font-size: 12px;cursor: pointer;" onclick="viewReviewProduct('<?php echo $feed_data['product_id'] ?>');"> <?php echo $feed_data["product_id"]; ?></a>
                                        </div>

                                        <div class="col-2 col-lg-3 mb-1 py-2  " style="background-color: rgb(46,46,46) ;">
                                            <span class=" text-white " style="font-size: 12px;"> <?php echo $feed_data["user_email"]; ?></span>
                                        </div>

                                        <div class="col-4 col-lg-2 mb-1 py-2">
                                            <span class="text-white " style="font-size: 12px;"><?php echo $feed_data["date"] . " " . $feed_data["time"]; ?></span>
                                        </div>
                                        <div class="col-4 col-lg-5 d-lg-block mb-1  py-2" style="background-color: rgb(46,46,46) ;">
                                            <span class="text-white " style="font-size: 12px;">"<?php echo $feed_data["feedback"]; ?>"</span>
                                        </div>
                                        <div class="col-4 col-lg-1 mb-1 py-2 text-center ">
                                            <?php
                                            if ($feed_data["status"] == 0) {
                                            ?>
                                                <span class="badge rounded-pill text-bg-danger d-flex p-2 d-flex align-items-center justify-content-center" style="cursor:pointer;font-size:12px;" id="fbb<?php echo $feed_data['id']; ?>"><i class="bi bi-exclamation-diamond" id="fbi<?php echo $feed_data['id']; ?>" onclick="changefeedbackstatus('<?php echo $feed_data['id']; ?>');"></i>&nbsp;&nbsp;Remove</span>
                                            <?php
                                            } else if ($feed_data["status"] == 1) {
                                            ?>
                                                <span class="badge rounded-pill text-bg-warning d-flex p-2 text-white d-flex align-items-center justify-content-center" style="cursor:pointer:font-size:12px;" id="fbb<?php echo $feed_data['id']; ?>"><i class="bi bi-plus-circle text-white" id="fbi<?php echo $feed_data['id']; ?>" onclick="changefeedbackstatus('<?php echo $feed_data['id']; ?>');"></i>&nbsp;&nbsp;Add</span>
                                            <?php
                                            }
                                            ?>

                                        </div>
                                    </div>

                                    <!-- Product View -->

                                    <?php 

                                    $p_rs = Database::search("SELECT * FROM `product` WHERE `id` = '".$feed_data["product_id"]."'  ");
                                    $p_data = $p_rs->fetch_assoc();

                                    $image_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $feed_data["product_id"] . "'");
                                    $image_data = $image_rs->fetch_assoc();

                                    $collection_rs = Database::search("SELECT * FROM `coleection` WHERE `id` = '".$p_data["coleection_id"]."'  ");
                                    $collection_data = $collection_rs->fetch_assoc();

                                    $category_rs = Database::search("SELECT * FROM `category` WHERE `id` = '".$p_data["category_id"]."'  ");
                                    $category_data = $category_rs->fetch_assoc();

                                    $material_rs = Database::search("SELECT * FROM `material` WHERE `id` = '".$p_data["material_id"]."'  ");
                                    $material_data = $material_rs->fetch_assoc();

                                    $color_rs = Database::search("SELECT * FROM `color` WHERE `id` = '".$p_data["color_id"]."'  ");
                                    $color_data = $color_rs->fetch_assoc();

                                    $size_rs = Database::search("SELECT * FROM `size` WHERE `id` = '".$p_data["size_id"]."'  ");
                                    $size_data = $size_rs->fetch_assoc();
                                    



                                     ?>


                                    <div class="modal" tabindex="-1" id="ReviewProduct<?php echo $feed_data["product_id"]; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="background-color: rgb(46,46,46) ;">
                                                <div class="modal-header">
                                                    <h6 class="modal-title text-white">Product ID : <?php echo $feed_data["product_id"]; ?></h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-12">
                                                        <div class="row">

                                                        

                                                        <div class="col-4">
                                                        <img src="<?php echo $image_data["path"]; ?>" class="img-fluid" style="width:100px;height:100px;" />
                                                        </div>

                                                        <div class="col-8">
                                                            <div class="row">

                                                            <p class="modal-title text-white"><?php echo $p_data["title"]; ?></p>
                                                            <p style="font-size:12px;line-height: 0.3;" class="text-secondary mt-3">Cost per Item : Rs. <?php echo $p_data["price"]; ?> .00</p>
                                                            <p style="font-size:12px;line-height: 0.3;" class="text-secondary"> <?php echo $collection_data["name"]; ?> </p>
                                                            <p style="font-size:12px;line-height: 0.3;" class="text-secondary">Category : <?php echo $category_data["name"]; ?> </p>
                                                            <p style="font-size:12px;line-height: 0.3;" class="text-secondary">Material : <?php echo $material_data["name"]; ?> </p>
                                                            <p style="font-size:12px;line-height: 0.3;" class="text-secondary">Color : <?php echo $color_data["name"]; ?> </p>
                                                            <p style="font-size:12px;line-height: 0.3;" class="text-secondary">Size : <?php echo $size_data["name"]; ?> </p>
                                                            </div>
                                                        </div>



                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Product View -->




                                <?php
                            }

                                ?>

                                </div>
                        </div>
                    </div>










                </div>
            </div>
            <script src="bootstrap.bundle.js"></script>
            <script src="script.js"></script>
            <script>
                var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
                var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
                    return new bootstrap.Popover(popoverTriggerEl)
                })
            </script>

    </body>

    </html>
<?php
}
?>