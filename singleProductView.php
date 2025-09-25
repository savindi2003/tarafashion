<?php

require "connection.php";

if (isset($_GET["id"])) {
    $pid = $_GET["id"];

    $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "'");
    $product_num = $product_rs->num_rows;

    if ($product_num == 1) {

        $product_data = $product_rs->fetch_assoc();

?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Thara Fashion | </title>

            <link rel="stylesheet" href="bootstrap.css" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
            <link rel="stylesheet" href="style.css" />

            <link rel="icon" href="resources/logo1.jpg" />


        </head>

        <body>

            <div class="container-fluid position-relative">
                <div class="row">

                    <?php include "header.php" ?>


                    <div class="col-12 justify-content-center ">
                        <div class="row">

                            <div class="col-12 pt-3 mb-2 ">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mx-3">
                                        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><?php echo $product_data["title"]; ?></li>
                                    </ol>
                                </nav>
                            </div>



                            <div class="col-12">
                                <div class="row ">
                                    <div class="col-12">
                                        <div class="row mt-1 mb-1 mx-lg-3 ">
                                            <div class="col-lg-10 col-12 offset-lg-1 ">
                                                <div class="row ">

                                                    <div class="col-lg-6 col-12 justify-content-center ">




                                                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                                                            <div class="carousel-indicators">
                                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                            </div>
                                                            <div class="carousel-inner">

                                                                <?php
                                                                $image_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id` ='" . $pid . "' ");
                                                                $image_num = $image_rs->num_rows;
                                                                $img = array();

                                                                if ($image_num != 0) {

                                                                    for ($x = 0; $x < $image_num; $x++) {
                                                                        $image_data = $image_rs->fetch_assoc();

                                                                        $img[$x] = $image_data["path"];

                                                                ?>
                                                                        <div class="carousel-item active">

                                                                            <img src="<?php echo $img[$x]; ?>" class="d-block w-100" alt="...">
                                                                        </div>

                                                                <?php

                                                                    }
                                                                }
                                                                ?>



                                                            </div>
                                                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                                <span class="visually-hidden">Previous</span>
                                                            </button>
                                                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                                <span class="visually-hidden">Next</span>
                                                            </button>
                                                        </div>
                                                        <br />
                                                        <br />

                                                        <div class="col-12 d-none d-lg-block ">
                                                            <div class="row ">
                                                                <div class=" col-12 p-3 mb-2 border border-success">
                                                                    <div class="row text-center">
                                                                        <span class="fs-5 mb-3 mt-3 ">Recommend for you</span>


                                                                        <div class="col-12">
                                                                            <div class="row  justify-content-center mx-3">

                                                                                <?php

                                                                                $p_rs = Database::search("SELECT * FROM `product` WHERE `category_id`='" . $product_data["category_id"] . "' AND 
                                                                            `status_id`='1' ORDER BY `datetime_added` DESC LIMIT 4 OFFSET 0");
                                                                                $p_num = $p_rs->num_rows;

                                                                                for ($z = 0; $z < 4; $z++) {
                                                                                    $p_data = $p_rs->fetch_assoc();

                                                                                ?>


                                                                                    <div class="col-3">
                                                                                        <div class="row ">

                                                                                            <div class=" zoom" style="width:120px; ">



                                                                                                <?php

                                                                                                $img_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id` ='" . $p_data["id"] . "'");
                                                                                                $img_data = $img_rs->fetch_assoc();

                                                                                                if (empty($img_data["path"])) {

                                                                                                ?>
                                                                                                    <img src="resources/emtyimg.png" class="card-img-top " style="width:100px ;height:100px;">

                                                                                                <?php
                                                                                                } else {

                                                                                                ?>

                                                                                                    <img src="<?php echo $img_data["path"] ?>" class="card-img-top mt-2 " style="width:100px ;height:100px;">


                                                                                                <?php



                                                                                                }




                                                                                                ?>
                                                                                                <div class="card-body " style="height:50px;">
                                                                                                    <span class="card-title fw-bold " style="font-size:10px;">Rs. <?php echo $p_data["price"] ?> .00</span>
                                                                                                    <a class=" col-10 offset-1 badge rounded-pill text-bg-warning   mb-2  " style="font-size:10px;text-decoration: none;" href='<?php echo "singleProductView.php?id=" . $p_data["id"]; ?>' style="border-radius:30px ;">Buy Now</a>

                                                                                                </div>

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

                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-6">
                                                        <div class="row mx-3 mt-3 mb-3 ">

                                                            <div class="col-12">
                                                                <div class="row">
                                                                    <div class="col-11 ">
                                                                        <span class="fw-bold p-text fs-4"><?php echo $product_data["title"]   ?></span>
                                                                    </div>


                                                                </div>
                                                                <?php

                                                                $m_rs = Database::search("SELECT * FROM `material` WHERE `id` = '" . $product_data["material_id"] . "'");
                                                                $m_data = $m_rs->fetch_assoc();

                                                                $si_rs = Database::search("SELECT * FROM `size`  WHERE `id` = '" . $product_data["size_id"] . "'");
                                                                $si_data = $si_rs->fetch_assoc();

                                                                ?>
                                                                <div class="col-11 mt-2">
                                                                    <span> Material : <?php echo $m_data["name"]  ?> </span>
                                                                </div>
                                                                <div class="col-11 mt-2">
                                                                    <span> Size : <?php echo $si_data["name"]  ?> </span>
                                                                </div>
                                                            </div>


                                                            <div class="col-12 mt-2 ">
                                                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star"></span> |
                                                                <span>3</span>
                                                            </div>

                                                            <!-- <?php
                                                            $total_qty = 0;
                                                            $in_rs = Database::search("SELECT * FROM `invoice` WHERE `product_id`='" . $p_data["id"] . "'");
                                                            $in_num = $in_rs->num_rows;

                                                            $ci_rs=Database::search("SELECT * FROM `cart_invoice` WHERE `product_id`='" . $p_data["id"] . "'");
                                                            $ci_num=$ci_rs->num_rows;

                                                          ?> -->


                                                            <div class="col-12 mt-2">
                                                                <span> <?php echo $product_data["qty"]   ?> Items availble</span>
                                                            </div>

                                                            <?php

                                                            $color_rs = Database::search("SELECT * FROM `color` WHERE `id` = '" . $product_data["color_id"] . "'");
                                                            $color_data = $color_rs->fetch_assoc();

                                                            ?>

                                                            <div class="col-12 mt-2">
                                                                <span> Color Family : <?php echo $color_data["name"] ?> </span>
                                                            </div>

                                                            <?php


                                                            $w_rs = Database::search("SELECT * FROM `wishlist` WHERE `product_id`='" . $product_data["id"] . "' AND 
                                                                `user_email`='" . $_SESSION["u"]["email"] . "'");
                                                            $w_num = $w_rs->num_rows;


                                                            ?>




                                                            <div class="col-12 mt-2">
                                                                <div class="row ">
                                                                    <?php

                                                                    if ($w_num == 1) {
                                                                    ?>
                                                                        <i class="bi bi-heart-fill  fs-3 text-end " style="color:red ;" id='heart<?php echo $product_data["id"]; ?>' onclick="addToWishlist(<?php echo $product_data['id'];  ?>);"></i>
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <i class="bi bi-heart  fs-3 text-end " style="color:red ;" id='heart<?php echo $product_data["id"]; ?>' onclick="addToWishlist(<?php echo $product_data['id'];  ?>);"></i>
                                                                    <?php

                                                                    }
                                                                    ?>

                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <div class="row mt-3 mb-3  ">
                                                                    <div class="col-lg-6 col-sm-7">
                                                                        <span class="p-text fs-2 fw-bold">Rs. <?php echo $product_data["price"] ?> .00</span>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <hr />

                                                            <div class="col-12">
                                                                <div class="row  mb-3">
                                                                    <div class="col-6  d-flex align-items-center">
                                                                        <span class="fs-5">Quentity</span>
                                                                    </div>

                                                                    <div class="col-lg-3 offset-lg-3 col-6 d-flex align-items-center">
                                                                        <div class="row  justify-content-center  ">
                                                                            <div class="btn-group btn-group-sm mt-lg-3 mb-3" role="group" aria-label="Small button group">
                                                                                <button type="button" class="btn btn-light"><i class="bi bi-dash" onclick="qty_dec1();"></i></button>
                                                                                <input type="text" class="form-control text-center" style="width:40px; border:none;" pattern="[0-9]" value="1" id="qty_input" onkeyup='checkValue1(<?php echo $product_data["qty"]; ?>); ' />
                                                                                <button type="button" class="btn btn-light"><i class="bi bi-plus" onclick='qty_inc1(<?php echo $product_data["qty"]; ?>);'></i></button>

                                                                            </div>

                                                                        </div>
                                                                    </div>



                                                                </div>
                                                            </div>



                                                            <br /><br />

                                                            <hr />

                                                            <div class="col-12">
                                                                <div class="row ">

                                                                </div>

                                                                <hr />

                                                                <div class="col-12">
                                                                    <div class="row mt-3 mb-3">
                                                                        <span class="fs-5">Delevery</span>
                                                                        <span class="fs-6 text-warning">Standed Delivery , 7 Days</span>

                                                                        <div class="col-12 offset-1">
                                                                            <div class="row">
                                                                                <div class="col-8">
                                                                                    <div class="row">
                                                                                        <span class="fw-bold mt-2 mb-2"><i class="bi bi-geo-alt"></i>&nbsp;Wston Provine </span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-4">
                                                                                    <div class="row ">
                                                                                        <span class="fw-bold mt-2 mb-2  text-center ">Rs. <?php echo $product_data["delivery_fee_weston"] ?> .00</span>

                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>

                                                                        <div class="col-12 offset-1">
                                                                            <div class="row">
                                                                                <div class="col-8">
                                                                                    <div class="row">
                                                                                        <span class="fw-bold mt-2 mb-2"><i class="bi bi-geo-alt"></i>&nbsp;Other</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-4">
                                                                                    <div class="row ">
                                                                                        <span class="fw-bold mt-2 mb-2  text-center ">Rs. <?php echo $product_data["delivery_fee_other"] ?> .00</span>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>

                                                                        <div class="col-12 ">
                                                                            <div class="row">
                                                                                <span class="fs-6 text-warning">Enjoy free shipping promotation with minium spend as Rs.10 000</span>
                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                </div>

                                                                <hr />

                                                                <div class="col-12">
                                                                    <div class="row mt-3 mb-3">
                                                                        <span class="fs-5">Service</span>

                                                                        <div class="col-12 offset-1">
                                                                            <div class="row mt-3 mb-3">
                                                                                <span class="fw-bold text-secondary"><i class="bi bi-cash-coin"></i>&nbsp;Cash on Delivery</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 offset-1">
                                                                            <div class="row">
                                                                                <span class="fw-bold "><i class="bi bi-repeat"></i>&nbsp;7 Days Return</span>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                <hr />

                                                                <div class="col-12">
                                                                    <div class="row mt-3 mb-3">
                                                                        <span class="fs-5">Payment Methods</span>
                                                                    </div>
                                                                    <div class="col-12 ">
                                                                        <div class="row mt-3 mb-3 d-none d-lg-block">
                                                                            <a href="https://www.payhere.lk" target="_blank"><img src="https://www.payhere.lk/downloads/images/payhere_long_banner.png" alt="PayHere" style="width:600px;height:80px;" /></a>
                                                                        </div>
                                                                        <div class="row mt-3 mb-3 d-block d-lg-none">
                                                                            <a href="https://www.payhere.lk" target="_blank"><img src="https://www.payhere.lk/downloads/images/payhere_short_banner.png" alt="PayHere" style="width:350px ;" /></a>
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                <hr />

                                                                <div class="col-12">
                                                                    <div class="row justify-content-center mt-3 mb-3">
                                                                        <div class="col-5">
                                                                            <div class="row">
                                                                                <button class="btn btn-warning fw-bold mb-3 " type="submit" id="payhere-payment" onclick="payNow(<?php echo $pid    ?>);">Buy Now</button>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-5 offset-1">
                                                                            <div class="row">
                                                                                <button type="button" class="btn btn-outline-warning fw-bold mb-3 " onclick="addToCart(<?php echo $product_data['id']; ?>);">Add to Cart</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <hr />



                                                            </div>
                                                        </div>

                                                    </div>






                                                    <div class="col-12">
                                                        <div class="row mb-5">

                                                            <div class="col-12 col-lg-6">
                                                                <div class="row">
                                                                    <span class="fs-5">Feedback</span>

                                                                    <?php

                                                                    $feed_rs = Database::search("SELECT * FROM `feedback` WHERE `product_id` ='" . $pid . "' AND `status` = '0' ");
                                                                    $feed_num = $feed_rs->num_rows;



                                                                    for ($x = 0; $x < $feed_num; $x++) {
                                                                        $feed_data = $feed_rs->fetch_assoc();



                                                                    ?>

                                                                        <div class="col-12  mt-1">
                                                                            <div class="row border border-opacity-10" style="border-radius:10px ;">

                                                                                <?php
                                                                                $u1_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $feed_data["user_email"] . "'");
                                                                                $u1_data = $u1_rs->fetch_assoc();
                                                                                ?>

                                                                                <div class="col-6">
                                                                                    <span style="font-size:12px; " class="text-secondary"><?php echo $u1_data["fname"] . " " . $u1_data["lname"]; ?></span>
                                                                                </div>

                                                                                <div class="col-6 text-end">
                                                                                    <span style="font-size:10px;"><?php echo $feed_data["time"]; ?></span>
                                                                                </div>

                                                                                <div class="col-12">
                                                                                    <span class="mx-3"><?php echo $feed_data["feedback"]; ?></span>
                                                                                </div>

                                                                                <div class="col-12 text-end">
                                                                                    <span style="font-size:10px;"><?php echo $feed_data["date"]; ?></span>
                                                                                </div>




                                                                            </div>
                                                                        </div>

                                                                    <?php
                                                                    }

                                                                    ?>



                                                                </div>
                                                            </div>

                                                            <div class="col-12 col-lg-6">
                                                                <div class="row">
                                                                    <span class="fs-5 mb-1">Description</span>
                                                                    <span><?php echo $product_data["description"]; ?></span>

                                                                </div>
                                                            </div>




                                                        </div>
                                                    </div>

                                                    <hr />


                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>






                            <?php include "footer.php" ?>

                        </div>
                    </div>

                    <script src="script.js"></script>
                    <script src="bootstrap.bundle.js"></script>
                    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        </body>

        </html>



<?php
    }
}

?>