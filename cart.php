<?php





?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Thara Fashion Store | Cart</title>

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
                $email = $_SESSION["u"]["email"];

                $total = 0;
                $subtotal = 0;
                $ship;
                $checked_total = 0;

            ?>


                <div class="col-12 pt-3 mb-2 ">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mx-3">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>


                <div class="col-12 mb-3 ">
                    <div class="row text-center">
                        <span class="fs-1 ">Shopping Cart &nbsp; <i class="bi bi-cart3 fs-1"></i></span>
                    </div>

                </div>

                <?php
                $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $email . "'  ");
                $cart_num = $cart_rs->num_rows;

                if ($cart_num == 0) {

                ?>

                    <!---empty view --->

                    <div class="col-12 mt-5">
                        <div class="row text-center">
                            <span class=" text-secondary"><i class="bi bi-cart-plus fs-1"></i></span>
                        </div>
                    </div>
                    <div class="col-12 ">
                        <div class="row text-center ">
                            <span class="fs-4 text-secondary">There are no items in the yet</span>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row text-center ">
                            <span class="text-secondary" style="font-size:12px ;">Add to items to cart and they will show here</span>
                        </div>
                    </div>
                    <div class="col-2 mb-5 offset-5 mt-5">
                        <div class="row ">
                            <label class="px-2 pt-2 pb-2 text-center btn btn-outline-warning btn-sm">CONTINUE SHOPPING</label>
                        </div>
                    </div>


                    <!---empty view --->


                <?php
                } else {
                ?>


                    <div class="col-12 mt-5">
                        <div class="row">



                            <div class="col-12 col-lg-7">
                                <div class="row mx-lg-3 mt-lg-3 mb-lg-3 ">

                                    <div class=" col-12">
                                        <div class="row mx-lg-2  justify-content-center   ">


                                            <?php
                                            for ($x = 0; $x < $cart_num; $x++) {
                                                $cart_data = $cart_rs->fetch_assoc();
                                                

                                                $product_rs = Database::search("SELECT * FROM `product` WHERE `id` ='" . $cart_data["product_id"] . "' ");
                                                $product_data = $product_rs->fetch_assoc();

                                                $total = $total + ($product_data["price"] * $cart_data["qty"]);

                                                $address_rs = Database::search("SELECT district.id AS did FROM `user_has_address` INNER JOIN `city` ON 
                                            user_has_address.city_id=city.id INNER JOIN `district` ON city.district_id=district.id WHERE 
                                            `user_email`='" . $email . "'");

                                                $address_data = $address_rs->fetch_assoc();



                                                if ($address_data["did"] == 1) {
                                                    $ship = $product_data["delivery_fee_weston"];
                                                } else {
                                                    $ship = $product_data["delivery_fee_other"];
                                                }


                                            ?>


                                                <div class="card mb-lg-3 mt-lg-3  ">
                                                    <div class="row g-0 mt-2 mb-2 ">



                                                        <div class="col-3 ">
                                                            <?php

                                                            $img = array();

                                                            $images_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $cart_data["product_id"] . "'");
                                                            $images_data = $images_rs->fetch_assoc();



                                                            ?>
                                                            <img src="<?php echo $images_data["path"]; ?>" class="img-fluid rounded " style="width:120px ; height:120px;">
                                                            <div class="col-11">
                                                                <div class="row">
                                                                    <span class="text-center mt-3 mb-3 mx-2 " style="font-size:10px ;"><?php echo $product_data["qty"];  ?> items available</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-9 col-9">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="row">

                                                                        <div class="col-lg-7 col-sm-12">
                                                                            <div class="row  mx-1">
                                                                                <h5 class="fw-bold  mt-lg-3 mb-lg-3"><?php echo $product_data["title"]; ?></h5><br />
                                                                                <span class="mb-lg-2" style="font-size: 12px ;">Rs. <?php echo $product_data["price"];  ?> .00</span><br />
                                                                                <span class="text-secondary mb-lg-3" style="font-size :12px ;">Shipping fee : Rs. <?php echo $ship; ?> .00</span>
                                                                                <h6 class="text-secondary mb-lg-3">Total : Rs. <?php echo ($product_data["price"] * $cart_data["qty"]) + $ship ?> .00</h6>
                                                                                <a class="col-4 btn btn-sm btn-danger mx-2" style="border-radius:30px ;" href='<?php echo "singleProductView.php?id=" . $product_data["id"]; ?>'>Buy Now</a>

                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-2 col-6 d-flex align-items-center">
                                                                            <div class="row  justify-content-center  ">
                                                                                <div class="btn-group btn-group-sm mt-lg-3 mb-3" role="group" aria-label="Small button group">
                                                                                    <button type="button" class="btn btn-light"><i class="bi bi-dash" onclick='qty_dec("<?php echo $product_data["qty"]; ?>" , "<?php echo $product_data["id"]; ?>");' for="qty_input<?php echo $product_data["id"]; ?>"></i></button>
                                                                                    <input type="text" class="form-control text-center" style="width:40px; border:none;" pattern="[0-9]" value="<?php echo $cart_data["qty"]; ?>" id="qty_input<?php echo $product_data["id"]; ?>" onkeyup='checkValue("<?php echo $product_data["qty"]; ?>" , "<?php echo $product_data["id"]; ?>" ); ' />
                                                                                    <button type="button" class="btn btn-light"><i class="bi bi-plus" onclick='qty_inc("<?php echo $product_data["qty"]; ?>" , "<?php echo $product_data["id"]; ?>");' for="qty_input<?php echo $product_data["id"]; ?>"></i></button>

                                                                                </div>

                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-1 col-3 d-flex align-items-lg-end">
                                                                            <div class="row">
                                                                                <?php


                                                                                $w_rs = Database::search("SELECT * FROM `wishlist` WHERE `product_id`='" . $product_data["id"] . "' AND 
                                                                            `user_email`='" . $_SESSION["u"]["email"] . "'");
                                                                                $w_num = $w_rs->num_rows;


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
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-1 col-3 d-flex align-items-lg-end">
                                                                            <div class="row">
                                                                                <i class="bi bi-trash3 fs-4 fw-bold" onclick="deleteFromCart(<?php echo $cart_data['id']; ?>);"></i>

                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-1 ">
                                                                            <div class="row">
                                                                                <div class="form-check">
                                                                                    <?php

                                                                                    if($cart_data["check"] == '1'){
                                                                                        ?>
                                                                                        <input class="form-check-input" type="checkbox" value="" checked id="cartCheck" onchange="checknow('<?php echo $cart_data['id'];?>');">

                                                                                        <?php
                                                                                    }else if ($cart_data["check"] == '0'){
                                                                                        ?>
                                                                                        <input class="form-check-input" type="checkbox" value=""  id="cartCheck" onchange="checknow('<?php echo $cart_data['id'];?>');">

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

                                            <?php
                                            }
                                            ?>






                                        </div>
                                    </div>




                                </div>

                            </div>

                            <div class="col-lg-3 offset-lg-1 col-12">
                                <div class="row mx-lg-2 ">
                                    <div class="col-12">
                                        <div class="row bg-white mt-3 mb-3  ">
                                            <div class="col-12">
                                                <h3 class="mt-3 mb-3 fw-bold text-center  text-warning">Summary</h3>
                                            </div>

                                            <?php 
                                            $cart_c_rs = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $email . "'  AND `check` = '1' ");
                                            $cart_c_num= $cart_c_rs->num_rows;

                                            for($n =0; $n < $cart_c_num; $n++){
                                            $cart_c_data=$cart_c_rs->fetch_assoc();

                                            $p_rs = Database::search("SELECT * FROM `product` WHERE `id` ='" . $cart_c_data["product_id"] . "' ");
                                            $p_data = $p_rs->fetch_assoc();

                                            $checked_total = $checked_total + ($p_data["price"] * $cart_c_data["qty"]);

                                            }


                                            ?>


                                            <div class="col-12">
                                                <div class="row mt-3 mb-2">
                                                    <div class="col-6">
                                                        <div class="row">
                                                            <label class="fs-6">Subtotal</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="row ">
                                                            <label class="fs-6 text-end">Rs. <?php echo $checked_total; ?> .00</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="row mt-3 mb-2">
                                                    <div class="col-6">
                                                        <div class="row">
                                                            <label class="fs-6">Shipping fee</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="row mb-3 ">
                                                            <label class="fs-6 text-end">Rs. <?php echo $ship; ?> .00</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr />

                                            <div class="col-12">
                                                <div class="row mt-3 mb-2">
                                                    <div class="col-6">
                                                        <div class="row">
                                                            <label class="fs-4 fw-bold">Total</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="row mb-3 ">
                                                            <label class="fs-4 fw-bold text-end" id="total">Rs. <?php echo ($ship +  $checked_total); ?> .00</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="row mt-3 mb-3 mx-3">
                                                    <button type="button" class="btn btn-outline-warning fw-bold fs-4" style="border-radius:30px ;" onclick="checkout();"> CHECKOUT </button>
                                                </div>
                                            </div>



                                        </div>
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

    </div>

    <hr />


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


?>