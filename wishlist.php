<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Thara Fashion | Watchlist</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resources/logo1.jpg" />

</head>

<body">

    <div class="container-fluid">
        <div class="row">

            <?php include "header.php";
             require "connection.php";

            if (isset($_SESSION["u"])) {



            ?>


                <div class="col-12 pt-3 mb-2 ">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mx-3">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                        </ol>
                    </nav>
                </div>

                <div class="col-12">
                    <div class="row mx-lg-3 mt-lg-3 mb=lg-3 ">

                        <div class="col-12 ">
                            <div class="row text-center">
                                <span class="fs-1 ">Wishlist &nbsp; <i class="bi bi-chat-heart fs-1"></i></span>
                            </div>

                        </div>

                        <div class="col-12">
                            <div class="row">
                                <?php
                                 $user = $_SESSION["u"]["email"];

                                 $w_rs = Database::search("SELECT * FROM `wishlist` WHERE `user_email` ='" . $user . "' ");
                                 $w_num = $w_rs->num_rows;
         

                                ?>
                                <div class="col-6">
                                    <h6 class="mx-lg-3 mt-3 mb-3 ">All Items (<?php echo $w_num;  ?>)</h6>
                                </div>
                                <div class="col-6">
                                    <h6 class="mx-lg-3 mt-3 mb-3  text-end " style="cursor:pointer ;"><i class="bi bi-trash3 fs-6"></i> Remove All</h6>
                                </div>
                            </div>
                        </div>

                        <?php

                       

                        $user = $_SESSION["u"]["email"];

                        $w_rs = Database::search("SELECT * FROM `wishlist` WHERE `user_email` ='" . $user . "' ");
                        $w_num = $w_rs->num_rows;

                        if ($w_num == 0) {

                        ?>

                            <!---empty view-->

                            <div class="col-12">
                                <div class="row mt-5 mb-5 ">


                                    <div class="col-12">
                                        <div class="row text-center">
                                            <span class=" text-secondary"><i class="bi bi-heart fs-2"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row text-center ">
                                            <span class="fs-4 text-secondary">There are no favaurites yet</span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row text-center ">
                                            <span class="text-secondary" style="font-size:12px ;">Add to favourites to Wishlist and they will show here</span>
                                        </div>
                                    </div>
                                    <div class="col-2 offset-5 mt-5">
                                        <div class="row ">
                                            <label class="px-2 pt-2 pb-2 text-center btn btn-outline-warning btn-sm">CONTINUE SHOPPING</label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!---empty view-->

                        <?php


                        } else {
                        ?>
                            <div class=" col-12 ">
                                <div class="row mx-lg-2  justify-content-center gap-3  ">

                                    <?php
                                    for ($x = 0; $x < $w_num; $x++) {
                                        $w_data = $w_rs->fetch_assoc();


                                    ?>

                                        <!----with product-->



                                        <div class=" col-12 col-lg-5 card mb-lg-3 mt-lg-3  ">
                                            <div class="row g-0 mt-2 mb-2 ">


                                                <div class="col-lg-3 col-5 ">

                                                    <?php
                                                    $img = array();
                                                    $images_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $w_data["product_id"] . "'");
                                                    $images_data = $images_rs->fetch_assoc();



                                                    ?>
                                                    <img src="<?php echo $images_data["path"];  ?>" class="img-fluid   " style="width:120px ; height:120px;">
                                                    <?php
                                                        $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $w_data["product_id"] . "'");
                                                        $product_data = $product_rs->fetch_assoc();
                                                        ?>
                                                    <div class="col-11">
                                                        <div class="row">
                                                            <span class="text-center mt-3 mb-3 mx-2 " style="font-size:10px ;"><?php echo $product_data["qty"];  ?> Item Available</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" col-lg-9 col-7 d-flex align-items-center">
                                                    <div class="row ">
                                                      
                                                        <div class="col-12 ">
                                                            <div class="row">

                                                                <div class="col-lg-12 col-sm-12">
                                                                    <div class="row  mx-1">
                                                                        <span class="fw-bold   mt-lg-3  "><?php echo $product_data["title"]   ?></span><br />
                                                                        <span class="">Rs. <?php echo $product_data["price"]; ?> .00</span><br />
                                                                        <?php
                                                                        $c_rs = Database::search("SELECT * FROM `color` WHERE `id`='".$product_data["color_id"]."' ");
                                                                        $c_data = $c_rs->fetch_assoc();

                                                                        $m_rs = Database::search("SELECT * FROM `material` WHERE `id`='".$product_data["material_id"]."' ");
                                                                        $m_data = $m_rs->fetch_assoc();
                                                                        ?>
                                                                        <span class="text-secondary " style="font-size:13px ;">Color family : <?php echo $c_data["name"] ;  ?> </span>
                                                                        <span class="text-secondary mb-lg-3" style="font-size:13px ;">Material : <?php echo $m_data["name"] ;  ?> </span>
                                                                        <span><i class="bi bi-trash3"  onclick='removeFromWatchlist(<?php echo $w_data["id"]; ?>);'></i></span>

                                                                        <div class="col-12">
                                                                            <div class="row justify-content-end mx-3">
                                                                                <div class="col-lg-2 col-3 d-flex align-items-lg-end">
                                                                                    <div class="row bg-warning">
                                                                                        <label class="fs-5  text-white">+&nbsp;<i class="bi bi-cart3 fs-5 fw-bold text-white  fw-bold text-warning " onclick="addToCart(<?php echo $product_data['id']; ?>);"></i></label>
                                                                                    </div>
                                                                                </div>



                                                                            </div>
                                                                        </div>



                                                                    </div>
                                                                </div>





                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>



                                        <!----with product-->


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
    </div>

<?php
            }
?>


</div>

</div>

<hr />


<?php include "footer.php" ?>
</div>
</div>
<script src="bootstrap.bundle.js"></script>
<script src="script.js"></script>
</body>

</html>