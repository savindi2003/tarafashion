<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Thara Fashion</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resources/logo1.jpg" />


</head>

<body>

    <div class="container-fluid ">
        <div class="row">

            <?php include "header.php";

            require "connection.php";

            ?>


            <div class="col-12 justify-content-center ">
                <div class="row ">


                    <div class="col-12">
                        <div class="row justify-content-center mb-2">
                            <img src="resources/logo1.jpg" style="width:350px ;" />
                        </div>

                    </div>


                    <div class="col-12 d-none d-lg-block">
                        <div class="row shadow-lg  border " style="height:50px ;  ">



                            <div class="col-1 d-flex align-items-center border-end ms-2">
                                <div class="row  text-center ">
                                    <span class="fw-bold " style="cursor:pointer ;" onclick="window.location = 'cart.php'">Cart</span>
                                </div>
                            </div>

                            <div class="col-1 d-flex align-items-center border-end">
                                <div class="row  ">
                                    <span class="fw-bold " style="cursor:pointer ;"  onclick="window.location = 'wishlist.php'">Wishlist</span>
                                </div>
                            </div>

                            <div class="col-1 d-flex align-items-center border-end">
                                <div class="row">
                                    <span class="fw-bold" style="cursor:pointer ;" onclick="window.location = 'myOrder.php'">Orders</span>
                                </div>
                            </div>

                            <div class="col-1 d-flex align-items-center  ">
                                <div class="row text-center ">
                                    <span class="fw-bold  " style="cursor:pointer ;" onclick="window.location ='userProfile.php'">My Account</span>
                                </div>
                            </div>





                            <div class="col-4 offset-2">
                                <div class="row justify-content-end">
                                    <div class=" col-12 d-flex align-items-center ">
                                        <input type="text" name="search" placeholder="Search.." class="search   pt-2 pb-2 rounded-end mb-2 mt-2" style="border-radius:30px ; height:35px; font-size:12px;" id="search_text">
                                        <span class="input-group-text rounded-start mb-2 mt-2" style="border-radius:30px ;  font-size:12px; height:35px;" onclick="search1(0); "><i class="bi bi-search"></i></span>
                                    </div>

                                </div>

                            </div>

                            <?php
                            $notification_rs = Database::search("SELECT * FROM `notification` WHERE `user_email`='" . $_SESSION["u"]["email"] . "'  AND `status` != '4'    ORDER BY `date_time` DESC ");
                            $notification_num = $notification_rs->num_rows;

                            ?>

                            <div class="col-1 d-flex align-items-center">
                                <i class="bi bi-bell ms-5 fs-3 fw-bold" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample"></i><span class="badge text-bg-warning "><?php echo $notification_num; ?></span></label>

                            </div>





                            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Notification (<?php echo $notification_num; ?>)</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body" style="overflow-x: hidden;">

                                    <?php

                                    if (isset($_SESSION["u"])) {

                                        if ($notification_num == 0) {
                                    ?>

                                            <!---empty view--->

                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-12 mt-5">
                                                        <div class="row text-center">
                                                            <span class=" text-secondary"><i class="bi bi-envelope-exclamation fs-1"></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 ">
                                                        <div class="row text-center ">
                                                            <span class="fs-4 text-secondary">No Notifications Found</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row text-center ">
                                                            <span class="text-secondary" style="font-size:12px ;">You have currently no notifications. We 'll notify you when something new arrives.</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                            <!---empty view--->


                                            <?php
                                        } else {

                                            for ($x = 0; $x < $notification_num; $x++) {
                                                $notification_data = $notification_rs->fetch_assoc();

                                            ?>

                                                <div class="col-12 mt-1">
                                                    <div class="row border">
                                                        <div class="col-2 d-flex align-items-center">
                                                            <?php

                                                            $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `id`='" . $notification_data["invoice_id"] . "' ");
                                                            $invoice_data = $invoice_rs->fetch_assoc();

                                                            if ($notification_data["status"] == 0) {
                                                            ?>
                                                                <img src="resources/no4.png" style="width:60px;height:60px;" class="rounded-circle" />
                                                            <?php
                                                            } else if ($notification_data["status"] == 1) {
                                                            ?>
                                                                <img src="resources/no2.png" style="width:60px;height:60px;" class="rounded-circle" />
                                                            <?php
                                                            } else if ($notification_data["status"] == 2) {
                                                            ?>
                                                                <img src="resources/no3.png" style="width:60px;height:60px;" class="rounded-circle" />
                                                            <?php
                                                            }
                                                            ?>

                                                        </div>
                                                        <div class="col-10 d-flex align-items-center">
                                                            <div class="row">

                                                                <div class="col-12 d-flex flex-row-reverse">
                                                                    <span class="" style="font-size:10px ;"><?php echo $notification_data["date_time"]; ?></span>

                                                                </div>

                                                                <div class="col-12 mx-3">

                                                                    <?php

                                                                    $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `id`='" . $notification_data["invoice_id"] . "'");
                                                                    $invoice_data = $invoice_rs->fetch_assoc();

                                                                    if ($notification_data["status"] == 0) {
                                                                    ?>
                                                                        <span style="font-size:12px ;">Your Order Id <b> <?php echo $invoice_data["order_id"];  ?> </b> is beening Processing.</span>
                                                                    <?php
                                                                    } else if ($notification_data["status"] == 1) {
                                                                    ?>
                                                                        <span style="font-size:12px ;">Your Order Id <b> <?php echo $invoice_data["order_id"];  ?> </b> has been packed and is being handed over to a dispatch.</span>
                                                                    <?php
                                                                    } else if ($notification_data["status"] == 2) {
                                                                    ?>
                                                                        <span style="font-size:12px ;">Your Order Id <b> <?php echo $invoice_data["order_id"];  ?> </b> has been shipped</span>
                                                                    <?php
                                                                    }
                                                                    ?>


                                                                </div>

                                                                <div class="col-12 d-flex flex-row-reverse">
                                                                    <a class="link" style="font-size:10px ;">View</a>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php
                                            }
                                            ?>






                                    <?php
                                        }
                                    }



                                    ?>


                                </div>



                            </div>
                        </div>


                    </div>
                </div>

                <div class="col-12 d-block d-lg-none">
                    <div class="row shadow-lg  border " style="height:70px ;  ">

                        <div class="col-12">
                            <div class="row">

                                <div class="col-3 d-flex align-items-center border-end ">
                                    <div class="row ">
                                        <span class="fw-bold ms-2 mt-1  " style="cursor:pointer ; font-size:10px;" onclick="window.location = 'cart.php'">Cart</span>
                                    </div>
                                </div>

                                <div class="col-3 d-flex align-items-center border-end">
                                    <div class="row  ">
                                        <span class="fw-bold mt-1 " style="cursor:pointer ;font-size:10px;" onclick="window.location = 'wishlist.php'">Wishlist</span>
                                    </div>
                                </div>

                                <div class="col-3 d-flex align-items-center border-end">
                                    <div class="row">
                                        <span class="fw-bold mt-1" style="cursor:pointer ;font-size:10px;" onclick="window.location = 'myOrder.php'">Orders</span>
                                    </div>
                                </div>


                                <div class="col-3 d-flex align-items-center  ">
                                    <div class="row text-center ">
                                        <span class="fw-bold mt-1 " style="cursor:pointer ;font-size:10px;" onclick="window.location ='userProfile.php'">Account</span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-12 ">
                            <div class="row justify-content-end">
                                <div class=" col-12 d-flex align-items-center ">
                                    <input type="text" name="search" placeholder="Search.." class="search   pt-2 pb-2 rounded-end mb-2 mt-2" style="border-radius:30px ; height:35px; font-size:12px;" id="search_text">
                                    <span class="input-group-text rounded-start mb-2 mt-2" style="border-radius:30px ;  font-size:12px; height:35px;" onclick="search1(0); "><i class="bi bi-search"></i></span>
                                </div>

                            </div>

                        </div>










                    </div>
                </div>




                <div class="col-12" id="searchResult">
                    <div class="row">

                        <div class="col-12 d-none d-lg-block mb-3">
                            <div class="row  mb-2  ">

                                <div id="carouselExampleControls" class=" carousel slide carousel-fade " data-bs-ride="true">
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 4"></button>
                                        <!---<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 3"></button>  --->



                                    </div>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="resources/cur1.png" class="d-block w-100 poster-img-1" alt="...">
                                            <div class="carousel-caption d-none d-md-block poster-caption">
                                               

                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <img src="resources/cur2.png" class="d-block w-100 poster-img-1" alt="...">
                                        </div>
                                        <!-- <div class="carousel-item">
                        <img src="resources/slider_img/sliderimg3.jpg" class="d-block w-100 poster-img-1" alt="...">
                        </div>  --->



                                        <div class="carousel-item">
                                            <img src="resources/cur3.png" class="d-block w-100 poster-img-1" alt="...">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>

                            </div>
                        </div>

                    </div>


                </div>








                <div class="col-12">
                    <div class="row ">

                        <?php



                        $collection_rs = Database::search("SELECT * FROM `coleection` ");
                        $collection_num = $collection_rs->num_rows;

                        for ($y = 0; $y < $collection_num; $y++) {
                            $collection_data = $collection_rs->fetch_assoc();

                        ?>

                            <div class=" col-6 col-lg-3">
                                <a class=" btn row border mx-1 mx-lg-3 mt-3 mb-3 d-flex align-items-center shdo" style="" href='<?php echo "collection.php?id=" . $collection_data["id"];  ?>'>


                                    <?php

                                    $cimg_rs = Database::search("SELECT * FROM `collection_img` WHERE `coleection_id`='" . $collection_data["id"] . "' ");
                                    $cimg_data = $cimg_rs->fetch_assoc();

                                    ?>


                                    <div class="col-4 pt-1 pb-1">
                                        <img src="<?php echo $cimg_data["path"];  ?>" style="width: 50px; height:50px;" class="rounded-circle justify-content-start" />

                                    </div>
                                    <div class="col-8">
                                        <div class="row">
                                            <span class="fw-bold"><?php echo $collection_data["name"]; ?></span>
                                        </div>
                                    </div>
                                </a>
                            </div>



                        <?php
                        }

                        ?>

                    </div>
                </div>









                <?php
                $collection1_rs = Database::search("SELECT * FROM `coleection` ");
                $collection1_num = $collection1_rs->num_rows;

                for ($y = 0; $y < $collection1_num; $y++) {
                    $collection1_data = $collection1_rs->fetch_assoc();

                ?>


                    <div class="col-12">
                        <div class="row justify-content-center gap-0  gap-lg-2 mt-3 mb-3 mx-4">
                            <label class="fs-4  mt-5 mb-3"><?php echo $collection1_data["name"]; ?></label>

                            <?php

                            $product_rs = Database::search("SELECT * FROM `product` WHERE `coleection_id`='" . $collection1_data["id"] . "' AND  `status_id`='1' ORDER BY `datetime_added` DESC LIMIT 10 OFFSET 0");
                            $product_num = $product_rs->num_rows;

                            for ($z = 0; $z < $product_num; $z++) {
                                $product_data = $product_rs->fetch_assoc();

                            ?>




                                <div class="card bg-white col-lg-2 col-6 mt-1 mt-lg-0 shdo ">

                                    <?php

                                    $img_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id` ='" . $product_data["id"] . "'");
                                    $img_data = $img_rs->fetch_assoc();

                                    if (empty($img_data["path"])) {

                                    ?>
                                        <div>
                                            <div class="row justify-content-center">
                                                <img src="resources/emtyimg.png" class="card-img-top mt-2 " style="width:180px; height:180px;">
                                            </div>
                                        </div>
                                    <?php


                                    } else {

                                    ?>
                                        <div>
                                            <div class="row justify-content-center">
                                                <img src="<?php echo $img_data["path"]; ?>" class="card-img-top mt-2 " style="width:180px; height:180px;">
                                            </div>
                                        </div>
                                    <?php



                                    }

                                    ?>




                                    <div class="col-12">
                                        <div class="row">
                                            <span class="fw-bold "><?php echo $product_data["title"] ?></span>
                                            <span class="fs-5 text-danger fw-bold">Rs. <?php echo $product_data["price"] ?> .00</span>
                                            <span style="font-size:10px;"><?php echo $product_data["qty"];  ?> Items availble</span>


                                            <?php

                                            if ($product_data["qty"] > 0) {

                                            ?>

                                                <span style="font-size:10px;"><?php $product_data["qty"];  ?></span>
                                                <div class="col-12 mt-2">
                                                    <div class="row">

                                                        <?php

                                                        if (isset($_SESSION["u"])) {
                                                            $w_rs = Database::search("SELECT * FROM `wishlist` WHERE `product_id`='" . $product_data["id"] . "' AND 
                                                    `user_email`='" . $_SESSION["u"]["email"] . "'");
                                                            $w_num = $w_rs->num_rows;





                                                        ?>

                                                            <span class="text-end"><i class="bi bi-cart3 fs-4 text-warning mx-2" onclick="addToCart(<?php echo $product_data['id']; ?>);"></i>


                                                                <?php

                                                                if ($w_num == 1) {
                                                                ?>
                                                                    <i class="bi bi-heart-fill text-danger fs-4 justify-content-center mx-2" id='heart<?php echo $product_data["id"]; ?>' onclick="addToWishlist(<?php echo $product_data['id'];  ?>);"></i></span>
                                                        <?php
                                                                } else {
                                                        ?>
                                                            <i class="bi bi-heart text-dark fs-4 justify-content-center mx-2" id='heart<?php echo $product_data["id"]; ?>' onclick="addToWishlist(<?php echo $product_data['id'];  ?>);"></i></span>
                                                        <?php
                                                                }


                                                        ?>
                                                    <?php

                                                        } else {
                                                    ?>
                                                        <span class="text-end"><i class="bi bi-cart3 fs-4 text-warning mx-2"></i>
                                                            <i class="bi bi-heart text-dark fs-4 justify-content-center mx-2"></i></span>

                                                    <?php
                                                        }


                                                    ?>


                                                    </div>
                                                </div>
                                                <a class=" col-10 offset-1 btn btn-warning  mt-3 mb-2 zoom " href='<?php echo "singleProductView.php?id=" . $product_data["id"]; ?>' style="border-radius:30px ;">Buy Now</a>


                                            <?php
                                            } else {

                                            ?>

                                                <div class="col-12 mt-2">
                                                    <div class="row">

                                                        <span class="text-end"><i class="bi bi-cart3 fs-4 text-warning opacity-25 mx-2"></i>
                                                            <i class="bi bi-heart text-danger fs-4 justify-content-center   mx-2"></i></span>
                                                    </div>
                                                </div>
                                                <a class=" col-10 offset-1 btn btn-warning  mt-3 mb-2 disabled" style="border-radius:30px ;">Buy Now</a>
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

                <?php
                }

                ?>









            </div>
        </div>


        <?php include "footer.php" ?>

    </div>
    </div>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>

</body>

</html>