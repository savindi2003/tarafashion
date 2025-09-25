<?php

require "connection.php";

if (isset($_GET["id"])) {

    $colec_id = $_GET["id"];







?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php
        $col_rs = Database::search("SELECT * FROM `coleection` WHERE `id` = '" . $colec_id . "'");
        $col_data = $col_rs->fetch_assoc();
        ?>
        <title>Home | Thara Fashion | <?php echo $col_data["name"]; ?></title>

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css" />

        <link rel="icon" href="resources/logo1.jpg" />


    </head>

    <body>

        <div class="container-fluid">
            <div class="row">

                <?php include "header.php" ?>


                <div class="col-12 justify-content-center ">
                    <div class="row mb-3">

                        <div class="col-12 pt-3 mb-2">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mx-3">
                                    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                    <?php
                                    $col_rs = Database::search("SELECT * FROM `coleection` WHERE `id` = '" . $colec_id . "'");
                                    $col_data = $col_rs->fetch_assoc();
                                    ?>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $col_data["name"]; ?></li>
                                </ol>
                            </nav>
                        </div>

                        <div class="col-1">
                            <div class="row">

                                <div class="col-12 align-items-start vh-100">
                                    <div class="row g-1 start mx-2">

                                        <ul class="nav flex-column">
                                            <li class="nav-item mt-3 mb-3">
                                                <span class="fw-bold ">Category</span>

                                                <?php

                                                $cat_rs = Database::search("SELECT * FROM `category` WHERE `coleection_id`='" . $colec_id . "'");
                                                $cat_num = $cat_rs->num_rows;

                                                for ($v = 0; $v < $cat_num; $v++) {
                                                    $cat_data = $cat_rs->fetch_assoc();
                                                   


                                                ?>

                                                        <div class="form-check mt-3 mb-3 mx-2">
                                                            <input class="form-check-input" type="checkbox" name="a" id="l<?php echo $v + 1 ?>" style="font-size:12px ;">
                                                            <label class="form-check-label" for="l<?php echo $v + 1 ?>" style="font-size:12px ;">
                                                                <?php echo $cat_data["name"]; ?>
                                                            </label>
                                                        </div>

                                                    <?php
                                                   
                                            
                                                }
                                            

                                                ?>


                                                



                                            </li>

                                            <hr />
                                            <li class="nav-item mt-3 mb-3">
                                                <span class="fw-bold ">Color Family</span>


                                                <div class="form-check mt-3 mb-3 mx-2">
                                                    <input class="form-check-input" type="checkbox" name="c" id="b" style="font-size:12px ;">
                                                    <label class="form-check-label" for="b" style="font-size:12px ;">
                                                        Black
                                                    </label>
                                                </div>
                                                <div class="form-check mt-3 mb-3 mx-2">
                                                    <input class="form-check-input" type="checkbox" name="c" id="w" style="font-size:12px ;">
                                                    <label class="form-check-label" for="w" style="font-size:12px ;">
                                                        White
                                                    </label>
                                                </div>
                                                <div class="form-check mt-3 mb-3 mx-2">
                                                    <input class="form-check-input" type="checkbox" name="c" id="r" style="font-size:12px ;">
                                                    <label class="form-check-label" for="r" style="font-size:12px ;">
                                                        Red
                                                    </label>
                                                </div>
                                                <div class="form-check mt-3 mb-3 mx-2">
                                                    <input class="form-check-input" type="checkbox" name="c" id="bl" style="font-size:12px ;">
                                                    <label class="form-check-label" for="bl" style="font-size:12px ;">
                                                        Blue
                                                    </label>
                                                </div>
                                                <div class="form-check mt-3 mb-3 mx-2">
                                                    <input class="form-check-input" type="checkbox" name="c" id="y" style="font-size:12px ;">
                                                    <label class="form-check-label" for="y" style="font-size:12px ;">
                                                        Yellow
                                                    </label>
                                                </div>
                                                <div class="form-check mt-3 mb-3 mx-2">
                                                    <input class="form-check-input" type="checkbox" name="c" id="g" style="font-size:12px ;">
                                                    <label class="form-check-label" for="g" style="font-size:12px ;">
                                                        Green
                                                    </label>
                                                </div>
                                                <div class="form-check mt-3 mb-3 mx-2">
                                                    <input class="form-check-input" type="checkbox" name="c" id="m" style="font-size:12px ;">
                                                    <label class="form-check-label" for="m" style="font-size:12px ;">
                                                        Multicolor
                                                    </label>
                                                </div>












                                            </li>
                                            <hr />
                                            <li class="nav-item mt-3 mb-3">
                                                <span class="fw-bold ">Size</span>


                                                <div class="form-check mt-3 mb-3 mx-2">
                                                    <input class="form-check-input" type="checkbox" id="small" style="font-size:12px ;">
                                                    <label class="form-check-label" for="small" style="font-size:12px ;">
                                                        S
                                                    </label>
                                                </div>
                                                <div class="form-check mt-3 mb-3 mx-2">
                                                    <input class="form-check-input" type="checkbox" id="medium" style="font-size:12px ;">
                                                    <label class="form-check-label" for="medium" style="font-size:12px ;">
                                                        M
                                                    </label>
                                                </div>
                                                <div class="form-check mt-3 mb-3 mx-2">
                                                    <input class="form-check-input" type="checkbox" id="large" style="font-size:12px ;">
                                                    <label class="form-check-label" for="large" style="font-size:12px ;">
                                                        L
                                                    </label>
                                                </div>
                                                <div class="form-check mt-3 mb-3 mx-2">
                                                    <input class="form-check-input" type="checkbox" id="xl" style="font-size:12px ;">
                                                    <label class="form-check-label" for="xl" style="font-size:12px ;">
                                                        XL
                                                    </label>
                                                </div>



                                            </li>
                                            <hr />
                                            <li class="nav-item mt-3 mb-3">
                                                <span class="fw-bold ">Trend</span>


                                                <div class="form-check mt-3 mb-3 mx-2">
                                                    <input class="form-check-input" type="checkbox" id="offi" style="font-size:12px ;">
                                                    <label class="form-check-label" for="offi" style="font-size:12px ;">
                                                        Office
                                                    </label>
                                                </div>

                                                <div class="form-check mt-3 mb-3 mx-2">
                                                    <input class="form-check-input" type="checkbox" id="cas" style="font-size:12px ;">
                                                    <label class="form-check-label" for="cas" style="font-size:12px ;">
                                                        Casual
                                                    </label>
                                                </div>
                                                <div class="form-check mt-3 mb-3 mx-2">
                                                    <input class="form-check-input" type="checkbox" id="par" style="font-size:12px ;">
                                                    <label class="form-check-label" for="par" style="font-size:12px ;">
                                                        Party
                                                    </label>
                                                </div>




                                            </li>
                                            <hr />
                                            <li class="nav-item mt-3 mb-3">
                                                <span class="fw-bold ">Material</span>



                                                <div class="form-check mt-3 mb-3 mx-2">
                                                    <input class="form-check-input" type="checkbox" id="cotton" style="font-size:12px ;">
                                                    <label class="form-check-label" for="cotton" style="font-size:12px ;">
                                                        Cotton
                                                    </label>
                                                </div>

                                                <div class="form-check mt-3 mb-3 mx-2">
                                                    <input class="form-check-input" type="checkbox" id="lin" style="font-size:12px ;">
                                                    <label class="form-check-label" for="lin" style="font-size:12px ;">
                                                        Linen
                                                    </label>
                                                </div>

                                                <div class="form-check mt-3 mb-3 mx-2">
                                                    <input class="form-check-input" type="checkbox" id="vis" style="font-size:12px ;">
                                                    <label class="form-check-label" for="vis" style="font-size:12px ;">
                                                        Viscose
                                                    </label>
                                                </div>

                                                <div class="form-check mt-3 mb-3 mx-2">
                                                    <input class="form-check-input" type="checkbox" id="jer" style="font-size:12px ;">
                                                    <label class="form-check-label" for="jer" style="font-size:12px ;">
                                                        Jersey
                                                    </label>
                                                </div>

                                                <div class="form-check mt-3 mb-3 mx-2">
                                                    <input class="form-check-input" type="checkbox" id="bor" style="font-size:12px ;">
                                                    <label class="form-check-label" for="bor" style="font-size:12px ;">
                                                        Broadcloth
                                                    </label>
                                                </div>
                                                <div class="form-check mt-3 mb-3 mx-2">
                                                    <input class="form-check-input" type="checkbox" id="deni" style="font-size:12px ;">
                                                    <label class="form-check-label" for="deni" style="font-size:12px ;">
                                                        Denim
                                                    </label>
                                                </div>
                                                <div class="form-check mt-3 mb-3 mx-2">
                                                    <input class="form-check-input" type="checkbox" id="non" style="font-size:12px ;">
                                                    <label class="form-check-label" for="non" style="font-size:12px ;">
                                                        No Brand
                                                    </label>
                                                </div>










                                            </li>
                                        </ul>


                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-11">
                            <div class="row">


                                <div class="col-12 col-lg-6 offset-lg-3">
                                    <div class="row mb-4">


                                        <div class=" col-12 d-flex align-items-center ">
                                            <input type="text" name="search" placeholder="Search.." class="search   pt-2 pb-2 rounded-end mb-2 mt-2" style="border-radius:30px ; height:30px; font-size:12px;" id="text2">
                                            <span class="input-group-text rounded-start mb-2 mt-2" style="border-radius:30px ;  font-size:12px; height:30px;" onclick="search2(<?php echo $col_data['id'] ?>,);"><i class="bi bi-search"></i></span>
                                        </div>

                                    </div>
                                </div>




                                <div class="col-12" id="searchResult2">
                                    <!--- eka row ekaka products 5 k thiyanava--->
                                    <div class="row justify-content-center   gap-3 mt-3 mb-3">

                                        <?php
                                        $product_rs = Database::search("SELECT * FROM `product` WHERE `coleection_id`='" . $colec_id . "' AND `status_id`='1'  ");
                                        $product_num = $product_rs->num_rows;

                                        for ($z = 0; $z < $product_num; $z++) {
                                            $product_data = $product_rs->fetch_assoc();

                                        ?>

                                            <div class="card bg-white col-lg-2 col-5 shdo">
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
                                                        <span class="fw-bold " style="font-size:14px ;"><?php echo $product_data["title"] ?></span>
                                                        <span class="fs-5 text-danger fw-bold">Rs. <?php echo $product_data["price"] ?> .00</span>


                                                        <span style="font-size:10px;"><?php echo $product_data["qty"];  ?> Items availble</span>
                                                        <div class="col-12 mt-2">
                                                            <div class="row">

                                                                <?php

                                                                if (isset($_SESSION["u"])) {
                                                                    $w_rs = Database::search("SELECT * FROM `wishlist` WHERE `product_id`='" . $product_data["id"] . "' AND 
                                                                    `user_email`='" . $_SESSION["u"]["email"] . "'");
                                                                    $w_num = $w_rs->num_rows;





                                                                ?>

                                                                    <span class="text-end">
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
                                                        <a class=" col-10 offset-1 btn btn-warning  mt-3 mb-2 zoom" href='<?php echo "singleProductView.php?id=" . $product_data["id"]; ?>' style="border-radius:30px ; font-size:14px;">Buy Now</a>

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
        </div>







        </div>
        </div>

        </div>
        </div>
        <script src="script.js"></script>
        <script src="bootstrap.bundle.js"></script>
    </body>

    </html>

<?php
}

?>