<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Thara Fashion | My Orders  | Awaiting Orders</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resources/logo2.jpg" />

</head>

<body">

    <div class="container-fluid">
        <div class="row">

            <?php include "header.php";
            require "connection.php";
            $ship = 0;
            $total = 0;

            ?>


            <?php

            if (isset($_SESSION["u"])) {

                $invoice_rs = Database::search("SELECT * FROM `invoice`  WHERE `user_email`='" . $_SESSION["u"]["email"] . "' AND `status` =  '2' OR `status` = '3'   ORDER BY `date` DESC");
                $invoice_num = $invoice_rs->num_rows;
                

            ?>

                <div class=" col-12">
                    <div class="row mb-3 mt-3 borde-top ">

                        <div class="col-12 ">
                            <div class="row justify-content-center">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link text-dark  " href="myOrder.php">All</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-dark"   aria-current="page" href="processingOrder.php" >Processing</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-dark fw-bold" aria-current="page" href="#" >Awaiting Delivery</a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="nav-link text-dark "  href="completeOrders.php">Completed</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <?php

                        if ($invoice_num == 0) {

                        ?>

                            <!---empty view --->

                            <div class="col-12 mt-5">
                                <div class="row text-center">
                                    <span class=" text-secondary"><i class="bi bi-box-seam fs-1"></i></span>
                                </div>
                            </div>
                            <div class="col-12 ">
                                <div class="row text-center ">
                                    <span class="fs-4 text-secondary">There are no orders placed yet</span>
                                </div>
                            </div>
                          
                            <div class="col-2 mb-5 offset-5 mt-5">
                                <div class="row ">
                                    <label class="px-2 pt-2 pb-2 text-center btn btn-outline-warning btn-sm" onclick="window.location ='home.php'">CONTINUE SHOPPING</label>
                                </div>
                            </div>


                            <!---empty view --->


                        <?php
                        } else {
                        ?>


                            <div class="col-12 " id="viewaria5">
                                <div class="row mt-3 ">

                                    <div class="col-12">
                                        <div class="row">

                                            <?php

                                            for ($x = 0; $x < $invoice_num; $x++) {
                                                $invoice_data = $invoice_rs->fetch_assoc();

                                                if($invoice_data["type"] == "1"){

                                            ?>

                                                <div class=" col-12 ">
                                                    <div class="row mx-3 justify-content-center">
                                                        <div class="card mb-3" style="height:auto;">




                                                            <div class="col-12 ">
                                                                <div class="row mt-2 ">






                                                                    <div class="col-lg-5 col-12 ">
                                                                        <div class="row border-end ">
                                                                            <span style="font-size:12px  ;" >Order Id&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $invoice_data["order_id"]; ?> </span>
                                                                            <span style="font-size:12px ;">Order Date&nbsp; : <?php echo $invoice_data["date"]; ?> </span>
                                                                        </div>
                                                                    </div>
                                                                    <?php

                                                                    $i_id = $invoice_data["id"];
                                                                    
                                                                    ?>
                                                                    <div class="col-lg-2 offset-5 col-sm-12 mt-2 mb-1  ">
                                                                        <div class="row mx-2 justify-content-sm-end">
                                                                            <a style="font-size:12px ; cursor:pointer;" href=' <?php echo "saveInvoice1.php?id=" . $invoice_data["id"];  ?>'>View More&nbsp;<i class="bi bi-caret-right-fill" ></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr />

                                                            <div class="row g-0">
                                                                <div class="col-lg-3 col-sm-3">

                                                                    <?php
                                                                    $img = array();

                                                                    $images_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $invoice_data["product_id"] . "'");
                                                                    $images_data = $images_rs->fetch_assoc();
                                                                    ?>

                                                                    <img src="<?php echo $images_data["path"]; ?>" class="img-fluid mb-3 " style="width:200px ; height:200px;">
                                                                </div>
                                                                <?php
                                                                $p_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $invoice_data["product_id"] . "'");
                                                                $p_data = $p_rs->fetch_assoc();

                                                                $met_rs = Database::search("SELECT * FROM `material` WHERE `id`='" . $p_data["material_id"] . "'");
                                                                $met_data = $met_rs->fetch_assoc();

                                                                $col_rs = Database::search("SELECT * FROM `color` WHERE `id`='" . $p_data["color_id"] . "'");
                                                                $col_data = $col_rs->fetch_assoc();

                                                                $size_rs = Database::search("SELECT * FROM `size` WHERE `id`='" . $p_data["size_id"] . "'");
                                                                $size_data = $size_rs->fetch_assoc();

                                                                $total =  ($p_data["price"] * $invoice_data["qty"]);

                                                                $address_rs = Database::search("SELECT district.id AS did FROM `user_has_address` INNER JOIN `city` ON 
                                                user_has_address.city_id=city.id INNER JOIN `district` ON city.district_id=district.id WHERE 
                                                `user_email`='" . $_SESSION["u"]["email"] . "'");

                                                                $address_data = $address_rs->fetch_assoc();



                                                                if ($address_data["did"] == 1) {
                                                                    $ship = $p_data["delivery_fee_weston"];
                                                                } else {
                                                                    $ship = $p_data["delivery_fee_other"];
                                                                }

                                                                $t = $total + $ship;
                                                                ?>
                                                                <div class="col-lg-5 col-12 ">

                                                                    <h4 class="card-title fw-bold mt-1"><?php echo $p_data["title"]; ?> </h4>
                                                                    <p class="card-text fs-6">Material : <?php echo $met_data["name"]  ?></p>
                                                                    <p class="card-text fs-6">Color : <?php echo $col_data["name"]  ?></p>
                                                                    <p class="card-text fs-6">Size : <?php echo   $size_data["name"] ?></p>
                                                                    <p class="card-text " style="font-size:12px  ;">Rs. <?php echo $p_data["price"]; ?> &nbsp;*&nbsp; <?php echo $invoice_data["qty"] ?></p>

                                                                    <?php
                                                                     if ($invoice_data["status"] == 2) {
                                                                        ?>
                                                                            <span class="card-text text-info fw-bold "><i class="bi bi-truck text-info fw-bold"></i>&nbsp;Your package has been handed over to dispatch</span>
                                                                        <?php
                                                                        } else if ($invoice_data["status"] == 3) {
                                                                        ?>
                                                                            <span class="card-text text-warning fw-bold "><i class="bi bi-truck text-warning fw-bold"></i>&nbsp;Your package has been shipped</span>
                                                                        <?php
                                                                        }
                                                                    ?>



                                                                </div>

                                                                <div class="col-lg-3 col-12 ">



                                                                    <div class="row justify-content-center ">
                                                                        <span class="fs-3 mt-3 mb-3 text-center ">Rs. <?php echo $t; ?>.00</span>

                                                                        <?php
                                                                        if ($invoice_data["status"] == 2) {
                                                                            ?>
                                                                                <button class="col-lg-12 col-6 btn btn-sm btn-warning mt-3 mx-2 mb-4 mb-lg-0 disabled">Cancel Order</button>
                                                                            <?php
                                                                            } else if ($invoice_data["status"] == 3) {
                                                                            ?>
    
                                                                                <button class="col-5 col-lg-12 btn btn-sm btn-warning mt-3 mx-2 mx-lg-0 mb-2  mb-lg-0" onclick="confirmOrder('<?php echo $invoice_data['id']; ?>');">Confirm Receipt</button>
                                                                                <button class="col-5 col-lg-12 btn btn-sm btn-outline-warning mt-3 mx-2 mx-lg-0  mb-2 mb-lg-0">Track Order</button>
                                                                            <?php
                                                                            } 

                                                                        ?>

                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php
                                            }else if ($invoice_data["type"] == "2"){

                                                ?>

<div class=" col-12 ">
                                                        <div class="row mx-3 justify-content-center">
                                                            <div class="card mb-3" style="height:auto;">




                                                                <div class="col-12 ">
                                                                    <div class="row mt-2 ">


                                                                        <div class="col-lg-5 col-12 ">
                                                                            <div class="row border-end ">
                                                                                <span style="font-size:12px  ;">Order Id&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $invoice_data["order_id"]; ?> </span>
                                                                                <span style="font-size:12px ;">Order Date&nbsp; : <?php echo $invoice_data["date"]; ?> </span>
                                                                            </div>
                                                                        </div>
                                                                        <?php

                                                                        $i_id = $invoice_data["id"];

                                                                        ?>
                                                                        <div class="col-lg-2 offset-5 col-sm-12 mt-2 mb-1  ">
                                                                            <div class="row mx-2 justify-content-sm-end">
                                                                                <a style="font-size:12px ; cursor:pointer;" href=' <?php echo "cartInvoice.php?id=" . $invoice_data["order_id"];  ?>'>View More&nbsp;<i class="bi bi-caret-right-fill"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr />

                                                                <div class="row g-0">
                                                                    <div class="col-lg-3 col-sm-3">


                                                                        <img src="resources/noblogo.png" class="img-fluid mb-3 d-flex align-items-center " style="width:200px ; height:200px;">
                                                                    </div>

                                                                    <?php

                                                                    $cartI_rs = Database::search("SELECT * FROM `cart_invoice` WHERE `order_id` = '" . $invoice_data["order_id"] . "'");
                                                                    $cartI_num = $cartI_rs->num_rows;
                                                                    ?>


                                                                    <div class="col-lg-5 col-12 ">

                                                                        <h6 class="card-title fw-bold mt-1">Package Items :</h6>

                                                                        <?php

                                                                        for ($r = 0; $r < $cartI_num; $r++) {
                                                                            $cartI_data = $cartI_rs->fetch_assoc();

                                                                            $cp_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $cartI_data["product_id"] . "'");
                                                                            $cp_data = $cp_rs->fetch_assoc();




                                                                        ?>



                                                                            <h6 class="card-title  mt-1 offset-1">* &nbsp;<?php echo $cp_data["title"]; ?> </h6>
                                                                            <p class="card-text  offset-2" style="font-size:12px  ;">Rs. <?php echo $cp_data["price"]; ?> &nbsp;*&nbsp; <?php echo $cartI_data["qty"] ?></p>


                                                                        <?php
                                                                        }
                                                                        ?>

                                                                        <?php
                                                                        if ($invoice_data["status"] == 0) {
                                                                        ?>
                                                                            <span class="card-text text-primary fw-bold  "><i class="bi bi-arrow-repeat text-primary fw-bold"></i>&nbsp;Your package is processing</span>

                                                                        <?php
                                                                        } else if ($invoice_data["status"] == 1) {
                                                                        ?>
                                                                            <span class="card-text text-primary fw-bold "><i class="bi bi-arrow-repeat text-primary fw-bold"></i>&nbsp;Your package is processing</span>

                                                                        <?php

                                                                        } else if ($invoice_data["status"] == 2) {
                                                                        ?>
                                                                            <span class="card-text text-info fw-bold "><i class="bi bi-truck text-info fw-bold"></i>&nbsp;Your package has been handed over to dispatch</span>
                                                                        <?php
                                                                        } else if ($invoice_data["status"] == 3) {
                                                                        ?>
                                                                            <span class="card-text text-warning fw-bold "><i class="bi bi-truck text-warning fw-bold"></i>&nbsp;Your package has been shipped</span>
                                                                        <?php
                                                                        } else if ($invoice_data["status"] == 4) {
                                                                        ?>
                                                                            <span class="card-text text-success fw-bold "><i class="bi bi-check-circle text-success fw-bold"></i>&nbsp;Your package has been delivered</span>
                                                                        <?php
                                                                        }

                                                                        ?>



                                                                    </div>

                                                                    <div class="col-lg-3 col-12 ">



                                                                        <div class="row justify-content-center ">
                                                                            <span class="fs-3 mt-3 mb-3 text-center ">Rs. <?php echo $invoice_data["total"]; ?>.00</span>

                                                                            <?php
                                                                            if ($invoice_data["status"] == 0) {
                                                                            ?>
                                                                                <button class="col-lg-12 col-6 btn btn-sm btn-warning mt-3 mx-2 mb-4 mb-lg-0">Cancel Order</button>

                                                                            <?php
                                                                            } else if ($invoice_data["status"] == 1) {
                                                                            ?>
                                                                                <button class="col-lg-12 col-6 btn btn-sm btn-warning mt-3 mx-2 mb-4 mb-lg-0">Cancel Order</button>

                                                                            <?php

                                                                            } else if ($invoice_data["status"] == 2) {
                                                                            ?>
                                                                                <button class="col-lg-12 col-6 btn btn-sm btn-warning mt-3 mx-2 mb-4 mb-lg-0 disabled">Cancel Order</button>
                                                                            <?php
                                                                            } else if ($invoice_data["status"] == 3) {
                                                                            ?>

                                                                                <button class="col-5 col-lg-12 btn btn-sm btn-warning mt-3 mx-2 mx-lg-0 mb-2  mb-lg-0" onclick="confirmOrder('<?php echo $invoice_data['id']; ?>');"> Confirm Receipt</button>
                                                                                <button class="col-5 col-lg-12 btn btn-sm btn-outline-warning mt-3 mx-2 mx-lg-0  mb-2 mb-lg-0">Track Order</button>
                                                                            <?php
                                                                            } else if ($invoice_data["status"] == 4) {
                                                                            ?>
                                                                                <button class="col-5 col-lg-12 btn btn-sm btn-warning mt-3 mx-2 mb-2 mb-lg-0 " onclick="feedback(<?php echo $invoice_data['product_id']; ?>);">Write a review</button>
                                                                                <button class=" col-5 col-lg-12 btn btn-sm btn-outline-warning mt-3 mb-2 mb-lg-0">Return Order</button>
                                                                            <?php
                                                                            }

                                                                            ?>

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

                        <?php
                        }
                    }
                        ?>






                    </div>
                </div>
        </div>
    </div>

<?php
            }
?>

<?php include "footer.php" ?>
</div>
</div>
<script src="bootstrap.bundle.js"></script>
<script src="script.js"></script>
</body>
