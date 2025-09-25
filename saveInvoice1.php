<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Thara Fashion| Invoice</title>

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
                if(isset($_GET["id"])){
                $umail = $_SESSION["u"]["email"];
                $i_id=$_GET["id"];
                


            ?>

                <div class="col-12">
                    <div class="row">

                        <div class="col-12">
                            <div class="row">

                                <div class="col-12 " id="page">
                                    <div class="row mx-lg-3 mx-sm-1 mb-lg-3 mb-sm-1 ">

                                        <div class="12 d-flex justify-content-center align-items-center">
                                            <div class="row  mt-sm-6 text-center ">
                                                <div class="col-12 d-flex justify-content-center align-items-cente mt-3">
                                                    <div class="row">
                                                        <img src="resources/logo1.jpg " style="width:300px ;">
                                                    </div>
                                                </div>


                                                <span class="">Gampaha Road, Minuwangoda, Sri Lanka</span>
                                                <span class="">+94 112 4455678</span>
                                                <span class="">tharafashionstore@gmail.com</span>


                                            </div>
                                        </div>




                                        <div class="col-10 offset-1">
                                            <div class="row mt-3">

                                                <hr />
                                                <div class="col-12">
                                                    <div class="row mb-3">

                                                        <div class="col-lg-5 col-12">
                                                            <div class="row">

                                                                <div class="col-12">
                                                                    <div class="row">


                                                                        <?php
                                                                        $i_rs = Database::search("SELECT * FROM `invoice` WHERE `id` ='" . $i_id . "' ");
                                                                        $i_data = $i_rs->fetch_assoc();
                                                                        ?>
                                                                        <div class="col-10 justify-content-end">
                                                                            <p>Order Id : <?php echo $i_data["order_id"];  ?> </p>
                                                                            <p>Order Date : <?php echo $i_data["date"];  ?></p>
                                                                            <p>Invoice Id : <?php echo $i_data["id"];  ?></p>

                                                                        </div>





                                                                    </div>
                                                                </div>

                                                                <hr class="d-block d-lg-none" />


                                                            </div>
                                                        </div>

                                                        <div class="col-lg-7 col-12 d-flex justify-content-end ">
                                                            <div class="row">

                                                                <div class="col-12">
                                                                    <div class="row">



                                                                        <div class="col-12">

                                                                            <?php
                                                                            $a_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $umail . "' ");
                                                                            $a_data = $a_rs->fetch_assoc();
                                                                            ?>
                                                                            <p><?php echo $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"]; ?> </p>
                                                                            <p><?php echo $_SESSION["u"]["email"]; ?></p>
                                                                            <p><?php echo $a_data["line1"] . ", " . $a_data["line2"]; ?></p>


                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                <hr class="d-block d-lg-none" />
                                                            </div>
                                                        </div>



                                                    </div>
                                                </div>
                                                <hr />

                                                <!---table-->

                                                <!--topic-->

                                                <div class="col-12 ">
                                                    <div class="row mb-3 ">

                                                        <div class="col-5">
                                                            <div class="row">
                                                                <span class="text-center border-end">Product</span>
                                                            </div>
                                                        </div>

                                                        <div class="col-3">
                                                            <div class="row">
                                                                <span class="text-center border-end">Price</span>
                                                            </div>
                                                        </div>

                                                        <div class="col-1">
                                                            <div class="row border-end">

                                                            </div>
                                                        </div>

                                                        <div class="col-3">
                                                            <div class="row">
                                                                <span class="text-center border-end border-start">Total</span>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>

                                                <hr />
                                                <!--topic-->

                                                <!---product-->

                                                <div class="col-12">
                                                    <div class="row mb-3 ">

                                                        <div class="col-5">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <?php
                                                                        $im_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $i_data["product_id"] . "' ");
                                                                        $im_data = $im_rs->fetch_assoc();

                                                                        $p_rs = Database::search("SELECT * FROM `product` WHERE `id` ='" . $i_data["product_id"] . "' ");
                                                                        $p_data = $p_rs->fetch_assoc();

                                                                        $material_rs = Database::search("SELECT * FROM `material` WHERE `id` = '" . $p_data["material_id"] . "' ");
                                                                        $material_data = $material_rs->fetch_assoc();

                                                                        $color_rs = Database::search("SELECT * FROM `color` WHERE `id` = '" . $p_data["color_id"] . "' ");
                                                                        $color_data = $color_rs->fetch_assoc();

                                                                        $size_rs = Database::search("SELECT * FROM `size` WHERE `id` = '" . $p_data["size_id"] . "' ");
                                                                        $size_data = $size_rs->fetch_assoc();

                                                                        $col_rs = Database::search("SELECT * FROM `coleection` WHERE `id` = '" . $p_data["coleection_id"] . "' ");
                                                                        $col_data = $col_rs->fetch_assoc();

                                                                        $cat_rs = Database::search("SELECT * FROM `category` WHERE `id` = '" . $p_data["category_id"] . "' ");
                                                                        $cat_data = $cat_rs->fetch_assoc();


                                                                        ?>

                                                                        <div class="col-5 col-lg-4">
                                                                            <div class="row">
                                                                                <img src="<?php echo $im_data["path"]; ?>" style="width:150px; height:150px;">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-7 col-lg-8">
                                                                            <div class="row mt-3 ">
                                                                                <span class="fs-5 fw-bold"><?php echo $p_data["title"];  ?></span>
                                                                                <span><?php echo $material_data["name"] . " , " . $color_data["name"] . " , " . $size_data["name"]; ?></span>
                                                                                <span style="font-size:12px ;">(<?php echo $col_data["name"] . " , " . $cat_data["name"];  ?>)</span>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <hr class="d-block d-lg-none mt-3" />
                                                        <div class="col-12 d-block d-lg-none">
                                                            <div class="row">

                                                                <div class="col-5 col-lg-3">
                                                                    <div class="row mt-1 mt-lg-3 border-end">
                                                                        <span class="text-center ">Price</span>
                                                                    </div>
                                                                </div>

                                                                <div class="col-2 col-lg-1">
                                                                    <div class="row mt-lg-3 mt-1 border-end ">
                                                                        <span class="text-center"></span>
                                                                    </div>
                                                                </div>

                                                                <div class="col-5 col-lg-3">
                                                                    <div class="row mt-lg-3 mt-1 border-end border-start">
                                                                        <span class="text-center ">Total</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <hr class="d-block d-lg-none mt-3" />

                                                                          
                                                        <?php
                                                        $city_rs = Database::search("SELECT * FROM `city` WHERE `id`='" . $a_data["city_id"] . "'");
                                                        $city_data = $city_rs->fetch_assoc();

                                                        $delivery = 0;
                                                        if ($city_data["district_id"] == 4) {
                                                            $delivery = $p_data["delivery_fee_weston"];
                                                        } else {
                                                            $delivery = $p_data["delivery_fee_other"];
                                                        }
                                                        $sub = $p_data["price"] * $i_data["qty"];
                                                        $t = $i_data["total"];
                                                        $g = $t + $delivery;
                                                        ?>



                                                        <div class="col-3">
                                                            <div class="row mt-3">
                                                                <span class="text-center ">Rs. <?php echo $p_data["price"]; ?> .00</span>
                                                            </div>
                                                        </div>

                                                        <div class="col-1">
                                                            <div class="row mt-3 ">
                                                                <span class="text-center"><?php echo $i_data["qty"] ?></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-3">
                                                            <div class="row mt-3">
                                                                <span class="text-center ">Rs. <?php echo $sub; ?> .00</span>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>

                                                <hr />

                                                <!---produc-->
                                                <!--table-->

                                                <!--summery-->

                                                <div class="col-12">
                                                    <div class="row">

                                                        <div class="col-lg-5 col-12">
                                                            <div class="row">
                                                                <label class="fw-bold fs-5">Payment Method</label>
                                                                <span class=" mt-2">Credit / Debit Card </span>
                                                            </div>
                                                        </div>

                                                        <hr class="d-block d-lg-none mt-3" />

                                                        <div class="col-lg-7 col-12">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="row mt-3 mb-3 mx-lg-3 border ">

                                                                        <div class="col-6">
                                                                            <div class="row mt-3 mb-3">
                                                                                <span>Subtotal</span>
                                                                                <span class="mb-3">Shipping fee</span>
                                                                                <hr />
                                                                                <span class="fw-bold">Total</span>
                                                                            </div>
                                                                        </div>

                                                      
                                                                        <div class="col-1">
                                                                            <div class="row mt-3 mb-3">
                                                                                <span>Rs. </span>
                                                                                <span class="mb-3">Rs. </span>
                                                                                <hr />
                                                                                <span class="fw-bold">Rs. </span>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-5">
                                                                            <div class="row text-end mt-3 mb-3">
                                                                                <span><?php echo $sub; ?> .00</span>
                                                                                <span class="mb-3"> <?php echo $delivery; ?> .00</span>
                                                                                <hr />
                                                                                <span class="fw-bold "> <?php echo $t; ?> .00</span>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>

                                                <hr />






                                            </div>

                                        </div>

                                        <div class="col-12 text-center mb-3 mt-5">
                                            <label class="form-label  text-black-50 fw-bold">
                                                Invoice was created on a computer and is valid without the Signature and Seal.
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="row">

                                        <div class="col-12 btn-toolbar justify-content-end">
                                            <button class="btn btn-dark me-2 mb-3"><i class="bi bi-printer-fill"  onclick="printInvoice();"></i> print</button>
                                            <button class="btn btn-danger me-2 mb-3"><i class="bi bi-filetype-pdf"></i> Export as PDF</button>
                                        </div>

                                    </div>
                                </div>





                            </div>
                        </div>
                    </div>
                </div>

            <?php
            }
            }
            ?>

            <?php include "footer.php" ?>
        </div>
    </div>
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
    </body>

</html>