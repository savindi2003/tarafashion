<?php

require "connection.php";

if (isset($_POST["sf"])) {
    $user = $_POST["sf"];

    $f_rs = Database::search("SELECT * FROM `feedback` WHERE `user_email` LIKE '%" . $user . "%' OR `product_id` = '" . $user . "' ");
    $f_num = $f_rs->num_rows;

    for ($x = 0; $x < $f_num; $x++) {
        if ($f_num != 0) {
            $f_data = $f_rs->fetch_assoc();


?>

            <div class="col-12">
                <div class="row">
                    <div class="col-2 col-lg-1 mb-1 py-2  ">
                        <a class=" text-white " style="font-size: 12px;cursor: pointer;" onclick="viewReviewProduct('<?php echo $f_data['product_id'] ?>');"> <?php echo $f_data["product_id"]; ?></a>
                    </div>

                    <div class="col-2 col-lg-3 mb-1 py-2  " style="background-color: rgb(46,46,46) ;">
                        <span class=" text-white " style="font-size: 12px;"> <?php echo $f_data["user_email"]; ?></span>
                    </div>

                    <div class="col-4 col-lg-2 mb-1 py-2">
                        <span class="text-white " style="font-size: 12px;"><?php echo $f_data["date"] . " " . $f_data["time"]; ?></span>
                    </div>
                    <div class="col-4 col-lg-5 d-lg-block mb-1  py-2" style="background-color: rgb(46,46,46) ;">
                        <span class="text-white " style="font-size: 12px;">"<?php echo $f_data["feedback"]; ?>"</span>
                    </div>
                    <div class="col-4 col-lg-1 mb-1 py-2 text-center ">
                        <?php
                        if ($f_data["status"] == 0) {
                        ?>
                            <span class="badge rounded-pill text-bg-danger d-flex p-2 d-flex align-items-center justify-content-center" style="cursor:pointer:font-size:12px;" id="fbb<?php echo $f_data['id']; ?>"><i class="bi bi-exclamation-diamond" id="fbi<?php echo $f_data['id']; ?>" onclick="changefeedbackstatus('<?php echo $f_data['id']; ?>');"></i>&nbsp;&nbsp;Remove</span>
                        <?php
                        } else if ($f_data["status"] == 1) {
                        ?>
                            <span class="badge rounded-pill text-bg-warning d-flex p-2 text-white d-flex align-items-center justify-content-center" style="cursor:pointer;font-size:12px;" id="fbb<?php echo $f_data['id']; ?>"><i class="bi bi-plus-circle text-white" id="fbi<?php echo $f_data['id']; ?>" onclick="changefeedbackstatus('<?php echo $f_data['id']; ?>');"></i>&nbsp;&nbsp;Add</span>
                        <?php
                        }
                        ?>
                    </div>

                    <!-- Product View -->

                    <?php

                    $p_rs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $f_data["product_id"] . "'  ");
                    $p_data = $p_rs->fetch_assoc();

                    $image_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $f_data["product_id"] . "'");
                    $image_data = $image_rs->fetch_assoc();

                    $collection_rs = Database::search("SELECT * FROM `coleection` WHERE `id` = '" . $p_data["coleection_id"] . "'  ");
                    $collection_data = $collection_rs->fetch_assoc();

                    $category_rs = Database::search("SELECT * FROM `category` WHERE `id` = '" . $p_data["category_id"] . "'  ");
                    $category_data = $category_rs->fetch_assoc();

                    $material_rs = Database::search("SELECT * FROM `material` WHERE `id` = '" . $p_data["material_id"] . "'  ");
                    $material_data = $material_rs->fetch_assoc();

                    $color_rs = Database::search("SELECT * FROM `color` WHERE `id` = '" . $p_data["color_id"] . "'  ");
                    $color_data = $color_rs->fetch_assoc();

                    $size_rs = Database::search("SELECT * FROM `size` WHERE `id` = '" . $p_data["size_id"] . "'  ");
                    $size_data = $size_rs->fetch_assoc();




                    ?>


                    <div class="modal" tabindex="-1" id="ReviewProduct<?php echo $f_data["product_id"]; ?>">
                        <div class="modal-dialog">
                            <div class="modal-content" style="background-color: rgb(46,46,46) ;">
                                <div class="modal-header">
                                    <h6 class="modal-title text-white">Product ID : <?php echo $f_data["product_id"]; ?></h6>
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



                </div>


            </div>

<?php


        }
    }

    $p_rs = Database::search("SELECT * FROM `product` WHERE `id` LIKE '%" . $user . "%' ");
    $p_num = $p_rs->num_rows;
}


?>