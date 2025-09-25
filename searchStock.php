<?php

require "connection.php";

if (isset($_POST["st"])) {
    $product_id = $_POST["st"];

?>

    <div class="col-12 ">
        <div class="row">


            <div class="col-12 mt-3 mb-3 ">
                <div class="row ">
                    <div class="col-2 col-lg-1  py-2 text-end " style="background-color: rgb(46,46,46) ;">
                        <span class=" text-white">Id</span>
                    </div>

                    <div class="col-4 col-lg-2  py-2">
                        <span class="text-white text-white">Title</span>
                    </div>
                    <div class="col-1 d-none d-lg-block  py-2" style="background-color: rgb(46,46,46) ;">
                        <span class="text-white">Collection</span>
                    </div>
                    <div class="col-1 d-none d-lg-block  py-2">
                        <span class="text-white">Category</span>
                    </div>
                    <div class="col-4 col-lg-2 d-lg-block py-2">
                        <span class="text-white">Price</span>
                    </div>
                    <div class="col-2 d-none d-lg-block y py-2 " style="background-color: rgb(46,46,46) ;">
                        <span class=" text-white">Quentity</span>
                    </div>
                    <div class="col-2 d-none d-lg-block y py-2 ">
                        <span class=" text-white">Registers Date</span>
                    </div>

                    <div class="col-2 col-lg-1 " style="background-color: rgb(46,46,46) ;"></div>
                </div>
            </div>

            <?php

            $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $product_id . "'");
            $product_num = $product_rs->num_rows;

            if ($product_num == 1) {
                $product_data = $product_rs->fetch_assoc();

            ?>

                <div class="col-12 ">
                    <div class="row ">
                        <div class="col-2 col-lg-1  py-2 text-end " style="background-color: rgb(46,46,46) ; ">
                            <span class=" text-white " style="font-size:12px;"><?php echo  $product_data["id"]; ?></span>
                        </div>

                        <div class="col-4 col-lg-2  py-2">
                            <span class="text-white " style="font-size:12px;"><?php echo  $product_data["title"]; ?></span>
                        </div>

                        <?php
                        $col_rs = Database::search("SELECT * FROM `coleection` WHERE `id` ='" .  $product_data["coleection_id"] . "' ");
                        $col_data = $col_rs->fetch_assoc();

                        $c_rs = Database::search("SELECT * FROM `category` WHERE `id` ='" .  $product_data["category_id"] . "' ");
                        $c_data = $c_rs->fetch_assoc();
                        ?>
                        <div class="col-1 d-none d-lg-block  py-2" style="background-color: rgb(46,46,46) ;">
                            <span class="text-white" style="font-size:12px;"><?php echo $col_data["id"]; ?></span>
                        </div>
                        <div class="col-1 d-none d-lg-block  py-2">
                            <span class="text-white" style="font-size:12px;"><?php echo $c_data["name"]; ?></span>
                        </div>
                        <div class="col-4 col-lg-2 d-lg-block py-2">
                            <span class="text-white" style="font-size:12px;">Rs. <?php echo  $product_data["price"]; ?> .00</span>
                        </div>
                        <div class="col-2 d-none d-lg-block y py-2 " style="background-color: rgb(46,46,46) ;">
                            <span class=" text-white" style="font-size:12px;"><?php echo  $product_data["qty"]; ?></span>
                        </div>
                        <div class="col-2 d-none d-lg-block y py-2 ">
                            <span class=" text-white" style="font-size:12px;"><?php echo  $product_data["datetime_added"]; ?></span>
                        </div>


                        <?php
                        if ($product_data["qty"] == 0) {
                        ?>
                            <div class="col-2 col-lg-1 " style="background-color: rgb(46,46,46) ;">
                                <span class="badge rounded-pill text-bg-danger">Out of Stock</span>
                            </div>
                        <?php

                        } else {
                        ?>
                            <div class="col-2 col-lg-1 " style="background-color: rgb(46,46,46) ;">
                                <span class="badge rounded-pill text-bg-warning">In Stock</span>
                            </div>
                        <?php
                        }
                        ?>

                    </div>
                </div>



            <?php
            } else {
            ?>
                <div class="col-12 ">
                    <div class="row ">
                        <div class="col-12  py-2 text-end " style="background-color: rgb(46,46,46) ; ">
                            <span class=" text-white " style="font-size:12px;">No Results</span>
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