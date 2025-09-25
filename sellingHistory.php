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

        <title>Thara Fashion | Selling Deatails</title>

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css" />

        <link rel="icon" href="resources/logo2.jpg" />



    </head>

    <body class="bg-dark">

        <div class="container-fluid">
            <div class="row">




                <div class="col-12">
                    <div class="row mt-2 mb-2" style="background-color: rgb(46,46,46) ;">
                        <span class="h2 text-light text-start fw-bolder"> Selling History</span>
                    </div>

                </div>

                <div class="col-12 pt-3 mb-1 bg-dark">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-light"><a href="AdminPanel.php" style="font-size:12px;">Dashboard</a></li>
                            <li class="breadcrumb-item text-light"><a href="manageOrders.php" style="font-size:12px;">Selling Details</a></li>

                        </ol>
                    </nav>
                </div>


                <div class=" col-5 offset-1 d-flex justify-content-center ">
                    <input type="text" name="search" placeholder="Search.." class="search bg-dark text-light   pt-2 pb-2 rounded-end mb-2 mt-2" style="border-radius:30px ; height:30px; font-size:12px;" id="ss">
                    <span class="input-group-text rounded-start mb-2 mt-2" style="border-radius:30px ;  font-size:12px; height:30px;" onclick="searchSellings();"><i class="bi bi-search"></i></span>
                </div>

                <div class="col-2 ">
                    <div class="row">
                        <div class="col-4 mt-2 text-end">
                            <span class=" text-secondary ">From</span>
                        </div>
                        <div class="col-8">
                            <input type="date" class="form-control form-control-sm text-white mt-2  " id="from" style="background-color: rgb(46,46,46) ; border-radius:30px ;" />
                        </div>
                    </div>

                </div>

                <div class="col-2 ">
                    <div class="row">
                        <div class="col-4 mt-2 text-end">
                            <span class=" text-secondary ">To</span>
                        </div>
                        <div class="col-8">
                            <input type="date" class="form-control form-control-sm text-white mt-2  " id="to" style="background-color: rgb(46,46,46) ; border-radius:30px ;" />
                        </div>
                    </div>

                </div>

                <div class="col-2">
                    <label class="btn btn-light btn-sm mt-2" style="border-radius:30px ;" onclick="findSellings2();">Find Order</label>
                </div>

                <div class="col-12 mt-4" id="view5">
                    <div class="row " style=" overflow-y: scroll; height:560px;">

                        <div class="col-12 mt-3   ">
                            <div class="row ">
                                <div class="col-2 col-lg-1 mb-1"></div>
                                <div class="col-2 col-lg-1 mb-1 py-2 text-end " style="background-color: rgb(46,46,46) ;">
                                    <span class=" text-white "> Order Id</span>
                                </div>

                                <div class="col-2 col-lg-1 mb-1 py-2 text-end ">
                                    <span class=" text-white "> Invoice Id</span>
                                </div>

                                <div class="col-4 col-lg-2 mb-1 py-2" style="background-color: rgb(46,46,46) ;">
                                    <span class="text-white ">Customer Name</span>
                                </div>
                                <div class="col-4 col-lg-3 d-lg-block mb-1  py-2">
                                    <span class="text-white ">Shipping Address</span>
                                </div>
                                <div class="col-3">
                                    <div class="row">
                                        <div class="col-6 mb-1  py-2" style="background-color: rgb(46,46,46) ;">
                                            <span class="text-white ">Order Date</span>
                                        </div>
                                        <div class="col-6 mb-1  py-2" style="background-color: rgb(46,46,46) ;">
                                            <span class="text-white ">Deliverd Date</span>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-4 col-lg-1 mb-1 py-2">
                                    <span class="text-white ">Total Price</span>
                                </div>



                                <!-- <div class="col-12 " id="view_area5">
                                    
                                </div> -->




                                <?php

                                $o_rs = Database::search("SELECT * FROM `invoice` WHERE `status` = 4  ORDER BY `date` DESC ");
                                $o_num = $o_rs->num_rows;

                                for ($x = 0; $x < $o_num; $x++) {
                                    $o_data = $o_rs->fetch_assoc();

                                ?>


                                    <div class="col-12  " >
                                        <div class="row ">


                                            <div class="col-2 col-lg-1 mb-1">
                                                <span class=" text-white " style="font-size:12px;"><?php echo $x + 1; ?></span>
                                            </div>
                                            <div class="col-2 col-lg-1 mb-1  py-2 text-end " style="background-color: rgb(46,46,46) ;">
                                                <a class=" link-light " style="cursor:pointer ;font-size:12px;" onclick="orderModel('<?php echo $o_data['order_id']; ?>');"> <?php echo $o_data["order_id"]; ?></a>
                                            </div>

                                            <div class="col-2 col-lg-1 mb-1 py-2 text-end ">
                                                <span class=" text-white " style="font-size:12px;"><?php echo $o_data["id"]; ?></span>
                                            </div>

                                            <?php
                                            $user_rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $o_data["user_email"] . "' ");
                                            $user_data = $user_rs->fetch_assoc();
                                            ?>
                                            <div class="col-4 col-lg-2 mb-1 py-2" style="background-color: rgb(46,46,46) ;">
                                                <span class="text-white " style="font-size:12px;"><?php echo $user_data["fname"] . " " . $user_data["lname"]; ?></span>
                                            </div>

                                            <?php
                                            $a_rs = Database::search("SELECT * from `user_has_address` WHERE `user_email`='" . $user_data["email"] . "'");
                                            $a_data = $a_rs->fetch_assoc();
                                            ?>
                                            <div class="col-4 col-lg-3 d-lg-block  py-2">
                                                <div class="row">
                                                    <div class="col-11">
                                                        <span class="text-white " style="font-size:12px;"><?php echo $a_data["line1"] . " " . $a_data["line2"]; ?> </span>
                                                    </div>
                                                    <?php
                                                    $city_rs = Database::search("SELECT * FROM `city` WHERE `id`='" . $a_data["city_id"] . "' ");
                                                    $city_data = $city_rs->fetch_assoc();

                                                    $district_rs = Database::search("SELECT * FROM `district` WHERE `id`='" . $city_data["district_id"] . "' ");
                                                    $district_data = $district_rs->fetch_assoc();

                                                    $province_rs = Database::search("SELECT * FROM `province` WHERE `id`='" . $district_data["province_id"] . "' ");
                                                    $province_data = $province_rs->fetch_assoc();


                                                    ?>
                                                    <div class="col-1">
                                                        <i class="bi bi-three-dots-vertical text-white" data-bs-toggle="popover" data-bs-title="Shipping Address" data-bs-content="<?php echo $a_data["line1"] . " , " . $a_data["line2"]; ?> City : <?php echo $city_data["name"]; ?> 
                                                    District : <?php echo $district_data["name"] ?> District <?php echo $province_data["name"] ?> Province ">
                                                        </i>
                                                    </div>
                                                </div>



                                            </div>
                                            <div class="col-3">
                                                <div class="row">
                                                    <div class="col-6  py-2" style="background-color: rgb(46,46,46) ;">
                                                        <span class="text-white " style="font-size:12px;"><?php echo $o_data["date"]; ?> </span>
                                                    </div>
                                                    <div class="col-6  py-2" style="background-color: rgb(46,46,46) ;">
                                                        <span class="text-white " style="font-size:12px;"><?php echo $o_data["date"]; ?> </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4 col-lg-1  py-2">
                                                <span class="text-white " style="font-size:12px;">Rs. <?php echo $o_data["total"]; ?> .00</span>
                                            </div>



                                        </div>
                                    </div>

                                    <?php



                                    ?>



                                    <!---produt detalis model-->

                                    <?php

                                    if ($o_data["type"] == '1') {



                                    ?>
                                        <div class="modal" tabindex="-1" id="viewOrderModel<?php echo $o_data['order_id']; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content" style="background-color: rgb(46,46,46) ;">
                                                    <div class="modal-header">
                                                        <h6 class="modal-title text-white">Order Id : <?php echo $o_data["order_id"]; ?></h6>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-12">
                                                            <div class="row">

                                                                <div class="col-4">
                                                                    <?php

                                                                    $image_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $o_data["product_id"] . "'");
                                                                    $image_data = $image_rs->fetch_assoc();

                                                                    $p_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $o_data["product_id"] . "'");
                                                                    $p_data = $p_rs->fetch_assoc();

                                                                    ?>
                                                                    <img src="<?php echo $image_data["path"]; ?>" class="img-fluid" style="width:100px;height:100px;" />
                                                                </div>


                                                                <div class="col-8">
                                                                    <div class="row">
                                                                        <p class=" fw-bold text-secondary"><?php echo $p_data["title"]; ?></p>
                                                                        <p style="font-size:12px;" class="text-secondary">Cost per Item : Rs. <?php echo $p_data["price"]; ?> .00</p>
                                                                        <p style="font-size:12px;" class="text-secondary">Quentity : * <?php echo $o_data["qty"]; ?> </p>


                                                                        <?php







                                                                        $address_rs = Database::search("SELECT district.id AS did FROM `user_has_address` INNER JOIN `city` ON 
                                                                    user_has_address.city_id=city.id INNER JOIN `district` ON city.district_id=district.id WHERE 
                                                                    `user_email`='" . $o_data["user_email"] . "'");

                                                                        $address_data = $address_rs->fetch_assoc();



                                                                        if ($address_data["did"] == 1) {
                                                                            $ship = $p_data["delivery_fee_weston"];
                                                                        } else {
                                                                            $ship = $p_data["delivery_fee_other"];
                                                                        }

                                                                        ?>

                                                                        <p style="font-size:12px;" class="text-secondary">Shipping fee : <?php echo $ship; ?> </p>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    <?php
                                    } else if ($o_data["type"] == '2') {


                                    ?>

                                        <div class="modal" tabindex="-1" id="viewOrderModel<?php echo $o_data['order_id']; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content" style="background-color: rgb(46,46,46) ;">
                                                    <div class="modal-header">
                                                        <h6 class="modal-title text-white">Order Id : <?php echo $o_data["order_id"]; ?></h6>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">


                                                        <?php

                                                        $cart_rs = Database::search("SELECT * FROM `cart_invoice` WHERE `order_id` = '" . $o_data["order_id"] . "'");
                                                        $cart_num = $cart_rs->num_rows;

                                                        for ($c = 0; $c < $cart_num; $c++) {
                                                            $cart_data = $cart_rs->fetch_assoc();

                                                        ?>


                                                            <div class="col-12">
                                                                <div class="row">

                                                                    <div class="col-4">
                                                                        <?php

                                                                        $image_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $cart_data["product_id"] . "'");
                                                                        $image_data = $image_rs->fetch_assoc();

                                                                        $p_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $cart_data["product_id"] . "'");
                                                                        $p_data = $p_rs->fetch_assoc();

                                                                        ?>
                                                                        <img src="<?php echo $image_data["path"]; ?>" class="img-fluid" style="width:100px;height:100px;" />
                                                                    </div>


                                                                    <div class="col-8">
                                                                        <div class="row">
                                                                            <p class=" fw-bold text-secondary"><?php echo $p_data["title"]; ?></p>
                                                                            <p style="font-size:12px;" class="text-secondary">Cost per Item : Rs. <?php echo $p_data["price"]; ?> .00</p>
                                                                            <p style="font-size:12px;" class="text-secondary">Quentity : * <?php echo $cart_data["qty"]; ?> </p>


                                                                            <?php







                                                                            $address_rs = Database::search("SELECT district.id AS did FROM `user_has_address` INNER JOIN `city` ON 
                                                                    user_has_address.city_id=city.id INNER JOIN `district` ON city.district_id=district.id WHERE 
                                                                    `user_email`='" . $o_data["user_email"] . "'");

                                                                            $address_data = $address_rs->fetch_assoc();



                                                                            if ($address_data["did"] == 1) {
                                                                                $ship = $p_data["delivery_fee_weston"];
                                                                            } else {
                                                                                $ship = $p_data["delivery_fee_other"];
                                                                            }

                                                                            ?>

                                                                            <p style="font-size:12px;" class="text-secondary">Shipping fee : <?php echo $ship; ?> </p>
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
                                    ?>
                                    <!---produt detalis model-->
                                    <!---feedback view model--->
                                    <div class="modal" tabindex="-1" id="feedbackview<?php echo $o_data['order_id']; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="background-color: rgb(46,46,46) ;">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-secondary fw-bold">Order Review</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-light">
                                                    <span class="text-secondary" style="font-size:12px ;">User Email :</span><br />
                                                    <span class="text-light "><?php echo $o_data["user_email"]; ?></span><br /><br />

                                                    <span class="text-secondary" style="font-size:12px ;">Feedback Content :</span><br />
                                                    <span class="text-light">savindidulee@gmail.com</span>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-sm btn-danger"> <i class="bi bi-trash text-white"></i>&nbsp;&nbsp;Remove </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!---feedback view model--->

                                <?php


                                }

                                ?>






                            </div>
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
    </div>

<?php
}


?>