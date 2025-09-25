<?php

require "connection.php";

$ca = $_POST["cat"];

$query = "SELECT * FROM `product`";

if ($co != 0){
    $query .= " WHERE `category_id` = '" . $ca . "' ";
}


?>

<div class="row">
    <div class="offset-lg-1 col-12 col-lg-10 ">
        <div class="row justify-content-center">

            <div class="col-12">

                <div class="row justify-content-center   gap-2 mt-3 mb-3 mx-4">

                    <?php

                    if ("0" != ($_POST["page"])) {
                        $pageno = $_POST["page"];
                    } else {
                        $pageno = 1; 
                    }

                    $product_rs = Database::search($query);
                    $product_num = $product_rs->num_rows;


                    $results_per_page = 8;
                    $number_of_pages = ceil($product_num / $results_per_page);

                    $page_results = ($pageno - 1) * $results_per_page;
                    $selected_rs =  Database::search($query . " LIMIT  " . $results_per_page . " OFFSET " . $page_results . "");

                    $selected_num = $selected_rs->num_rows;


                    for ($x = 0; $x < $selected_num; $x++) {
                        $selected_data = $selected_rs->fetch_assoc();

                    ?>




                        <div class="card bg-white col-lg-2 col-5 box ">
                            <?php

                            $img_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id` ='" . $selected_data["id"] . "'");
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
                                    <span class="fw-bold "><?php echo $selected_data["title"] ?></span>
                                    <span class="fs-5 text-danger fw-bold">Rs. <?php echo $selected_data["price"] ?> .00</span>
                                    <span style="font-size:10px;">10 Items availble</span>
                                    <div class="col-12 mt-2">
                                        <div class="row">

                                            <span class="text-end"><i class="bi bi-cart4 fs-4 text-warning mx-2"></i><i class="bi bi-heart fs-4 text-danger  mx-2"></i></span>
                                        </div>
                                    </div>
                                    <a class=" col-10 offset-1 btn btn-warning  mt-3 mb-2 " href='<?php echo "singleProductView.php?id=" . $selected_data["id"]; ?>' style="border-radius:30px ;">Buy Now</a>

                                </div>
                            </div>
                        </div>

                    <?php
                    }
                    ?>

                </div>
            </div>

            <!--  -->
            <div class=" col-8 col-lg-6 text-center mb-3">
                <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-lg justify-content-center">
                        <li class="page-item">
                            <a class="page-link text-warning" <?php if ($pageno <= 1) {
                                                        echo ("#");
                                                    } else {
                                                    ?> onclick="advanceSearch(<?php echo ($pageno - 1) ?>);" <?php
                                                                                                        } ?> aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php

                        for ($x = 1; $x <= $number_of_pages; $x++) {
                            if ($x == $pageno) {
                        ?>
                                <li class="page-item active">
                                    <a class="page-link bg-warning " onclick="advanceSearch(<?php echo ($x) ?>);"><?php echo $x; ?></a>
                                </li>
                            <?php
                            } else {
                            ?>
                                <li class="page-item">
                                    <a class="page-link bg-warning " onclick="advanceSearch(<?php echo ($x) ?>);"><?php echo $x; ?></a>
                                </li>
                        <?php
                            }
                        }

                        ?>

                        <li class="page-item">
                            <a class="page-link text-warning" <?php if ($pageno >= $number_of_pages) {
                                                        echo ("#");
                                                    } else {
                                                    ?> onclick="advanceSearch(<?php echo ($pageno + 1) ?>);" <?php
                                                                                                        } ?> aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!--  -->


        </div>
    </div>
</div>