<?php

session_start();
require "connection.php";

if (isset($_SESSION["au"])) {
    $a_email = $_SESSION["au"]["email"];
    $pageno;

?>


    <!DOCTYPE html>

    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Thara Fashion | Reviews</title>

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css" />

        <link rel="icon" href="resources/logo2.jpg" />



    </head>

    <body class="bg-dark">

        <div class="container-fluid">
            <div class="row">


                <!---sort-->

                <div class="col-2 vh-100" style="background-color: rgb(46,46,46) " ;>
                    <div class="row ">

                        <div class="col-12 pt-3  bg-dark">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item text-light"><a href="AdminPanel.php" style="font-size:12px;">Dashboard</a></li>
                                    <li class="breadcrumb-item text-light"><a href="manageProduct.php" style="font-size:12px;">Manage Product</a></li>

                                </ol>
                            </nav>
                        </div>

                        <div class="col-12 bg-dark" >
                            <i class="bi bi-list fs-4 text-warning" onclick="window.location='productReviews.php';"></i>

                        </div>

                        <div class="col-12 ">
                            <div class="row  mx-lg-2 mx-1 mt-2 mb-2">
                                <div class="col-12">
                                    <div class="row  ">
                                        <span class="t2 text-white text-center">Sort Products</span>


                                        <div class="col-12 ">
                                            <div class="row">
                                                <div class="col-12">

                                                    <label class="text-secondary" style="font-size: 13px;"> Active Time</label>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-check">
                                                        <input class="form-check-input bg-secondary" type="radio" name="r1" id="n">
                                                        <label class="form-check-label text-light" for="n" style="font-size: 13px;">
                                                            Newest to oldest
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-check">
                                                        <input class="form-check-input bg-secondary" type="radio" name="r1" id="o">
                                                        <label class="form-check-label text-light" for="o" style="font-size: 13px;">
                                                            Oldest to newest
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-12 ">

                                                    <label class="text-secondary" style="font-size: 13px;"> By Quantity</label>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-check">
                                                        <input class="form-check-input bg-secondary" type="radio" name="r2" id="h">
                                                        <label class="form-check-label text-light" for="h" style="font-size: 13px;">
                                                            High to low
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-check">
                                                        <input class="form-check-input bg-secondary" type="radio" name="r2" id="l">
                                                        <label class="form-check-label text-light" for="l" style="font-size: 13px;">
                                                            Low to high
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-12 ">

                                                    <label class="text-secondary" style="font-size: 13px;"> By Price</label>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-check">
                                                        <input class="form-check-input bg-secondary" type="radio" name="r3" id="z">
                                                        <label class="form-check-label text-light" for="b" style="font-size: 13px;">
                                                            High to Low
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input bg-secondary" type="radio" name="r3" id="y">
                                                        <label class="form-check-label text-light" for="u" style="font-size: 13px;">
                                                            Low to High
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <label class="text-secondary" style="font-size: 13px;"> Product Name Or ID </label>
                                                    <input type="text" class="form-control bg-dark text-white mt-1 mb-2" placeholder="Search...." id="s" style="font-size: 13px;">
                                                </div>

                                                <div class="col-12 mt-2">
                                                    <label class="text-secondary" style="font-size: 13px;"> Product Categories </label><br />

                                                    <?php

                                                    $categorylist_rs = Database::search("SELECT * FROM `category`");
                                                    $categorylist_num = $categorylist_rs->num_rows;

                                                    for ($ct = 0; $ct < $categorylist_num; $ct++) {
                                                        $categorylist_data = $categorylist_rs->fetch_assoc();

                                                    ?>

                                                        <input class="form-check-input bg-secondary" type="radio" name="cat" id="<?php echo $categorylist_data['id']; ?>">
                                                        <label class="form-check-label text-light" for="u" style="font-size: 13px;">
                                                            <?php echo $categorylist_data["name"] ?>
                                                        </label><br />


                                                    <?php

                                                    }


                                                    ?>



                                                </div>


                                                <div class="col-12 d-flex justify-content-center mt-5">
                                                    <button type="button" class=" col-5 btn btn-sm btn-outline-light mt-3 mx-2  mb-3" style="border-radius:30px ;" onclick="sort_R2(0);">Sort</button>
                                                    <button type="button" class=" col-5 btn btn-sm btn-outline-light mt-3 mx-2  mb-3 " style="border-radius:30px ;" onclick='window.location.reload()'>Clear</button>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--sort-->

                    </div>
                </div>


                <div class="col-9 mt-5">
                    <div class="row">

                        <div class=" col-12">
                            <div class="row mx-2 mt-5 mb-2">





                                <div class="col-12">
                                    <div class="row ">
                                        <div class="col-12">
                                            <div class="row mt-1 justify-content-center" id="sort">


                                                <?php

                                                if (isset($_GET["page"])) {
                                                    $pageno = $_GET["page"];
                                                } else {
                                                    $pageno = 1;
                                                }



                                                $product_rs = Database::search("SELECT * FROM `product` ");
                                                $product_num = $product_rs->num_rows;


                                                $results_per_page = 15;
                                                $number_of_pages = ceil($product_num / $results_per_page);

                                                $page_results = ($pageno - 1) * $results_per_page;
                                                $selected_rs = Database::search("SELECT * FROM `product` LIMIT " . $results_per_page . " OFFSET " . $page_results . "");
                                                $selected_num = $selected_rs->num_rows;


                                                for ($x = 0; $x < $selected_num; $x++) {
                                                    $selected_data = $selected_rs->fetch_assoc();

                                                ?>

                                                    <!--card-->

                                                    <div class="card mb-1  col-12 col-lg-2 mx-1 shadow-lg " style="background-color: rgb(46,46,46) " ;>
                                                        <div class="row " style="background-color: rgb(46,46,46) " ;>
                                                            <div class="col-6 mt-3 d-flex align-items-center">

                                                                <?php

                                                                $p_img_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $selected_data["id"] . "'");
                                                                $p_img_data = $p_img_rs->fetch_assoc();

                                                                ?>
                                                                <img src="<?php echo $p_img_data["path"]; ?>" class="img-fluid " style="width:80px;height:80px;" />
                                                            </div>

                                                            <div class="col-6 d-flex align-items-center">

                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="row g-1">
                                                                            <div class="col-12  d-grid">
                                                                                <button class="btn btn-sm btn-warning " onclick="OpenReviewModel(<?php echo $selected_data['id']; ?>);">Reviews</button>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>



                                                            <div class=" col-12">
                                                                <div class="" style="background-color: rgb(46,46,46) " ;>
                                                                    <p class="  text-light" style="font-size:13px ;"><?php echo $selected_data["title"]; ?></p>
                                                                    <p class="  text-warning" style="font-size:13px ;line-height: 0.1;">Rs. <?php echo $selected_data["price"]; ?> .00</p>
                                                                    <p class="text-success" style="font-size:10px ;line-height: 0.1;">Qty : <?php echo $selected_data["qty"]; ?></p>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--card-->


                                                    <!---Review Model-->

                                                    <div class="modal " tabindex="-1" id="ReviewModel<?php echo $selected_data["id"] ?>">
                                                        <div class="modal-dialog ">
                                                            <div class="modal-content " style="background-color: rgb(46,46,46) ;">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-secondary fs-5">Customer Reviews - Product Id <?php echo $selected_data["id"] ?></h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <?php

                                                                    $f_rs = Database::search("SELECT * FROM `feedback` WHERE `product_id` ='" . $selected_data["id"] . "' ORDER BY `date` DESC ");
                                                                    $f_num = $f_rs->num_rows;

                                                                    if ($f_num >= 1) {


                                                                        for ($f = 0; $f < $f_num; $f++) {

                                                                            $f_data = $f_rs->fetch_assoc();

                                                                    ?>

                                                                            <hr class="border border-secondary" />

                                                                            <div class="col-12">
                                                                                <div class="row">

                                                                                    <div class="col-1 d-flex align-items-center justify-content-center">
                                                                                        <div class="row">
                                                                                            <div style="width: 20px;height: 20px;border-radius: 50%;" class="bg-warning  d-flex align-items-center justify-content-center ">



                                                                                                <label><i class="bi bi-person-fill"></i></label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-11 ">
                                                                                        <p class="text-white mt-3" style="font-size: 13px;line-height: 0.4;"><?php echo $f_data["user_email"]; ?></p>
                                                                                    </div>

                                                                                </div>
                                                                            </div>




                                                                            <div class="col-12 d-flex justify-content-end">

                                                                                <?php

                                                                                if ($f_data["status"] == '0') {

                                                                                ?>
                                                                                    <i class="bi bi-x-circle text-danger" id="fbi<?php echo $f_data['id']; ?>" style="cursor: pointer;" onclick="changefeedbackstatus2('<?php echo $f_data['id']; ?>'); "></i>
                                                                                <?php


                                                                                } else if ($f_data["status"] == '1') {
                                                                                ?>
                                                                                    <i class="bi bi-plus-circle text-warning" id="fbi<?php echo $f_data['id']; ?>" style="cursor: pointer;" onclick="changefeedbackstatus2('<?php echo $f_data['id']; ?>');"></i>
                                                                                <?php
                                                                                }

                                                                                ?>



                                                                            </div>


                                                                            <p class="text-secondary" style="font-size: 13px;line-height: 0.4;">Date : <?php echo $f_data["date"]; ?></p>



                                                                            <p class="text-white" style="font-size: 13px;">" <?php echo $f_data["feedback"]; ?> "</p>

                                                                            <hr class="border border-secondary" />

                                                                        <?php

                                                                        }
                                                                    } else {

                                                                        ?>

                                                                        <h6 class="text-white">No Reviews</h6>

                                                                    <?php

                                                                    }

                                                                    ?>








                                                                </div>
                                                            </div>


                                                        </div>

                                                    </div>

                                                    <!---Review Model-->



                                                <?php
                                                }





                                                ?>













                                                <!--pagination-->

                                                <div class=" col-8 col-lg-6 text-center mb-3 mt-1">
                                                    <nav aria-label="Page navigation example">
                                                        <ul class="pagination justify-content-center">
                                                            <li class="page-item">
                                                                <a class="page-link bg-dark text-warning" href="<?php if ($pageno <= 1) {
                                                                                                                    echo "#";
                                                                                                                } else {
                                                                                                                    echo "?page=" . ($pageno - 1);
                                                                                                                } ?>" aria-label="Previous">
                                                                    <span aria-hidden="true">&laquo;</span>
                                                                </a>
                                                            </li>
                                                            <?php

                                                            for ($x = 1; $x <= $number_of_pages; $x++) {
                                                                if ($x == $pageno) {

                                                            ?>
                                                                    <li class="page-item active">
                                                                        <a class="page-link bg-dark text-warning" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                                                    </li>
                                                                <?php

                                                                } else {
                                                                ?>
                                                                    <li class="page-item">
                                                                        <a class="page-link bg-dark text-warning" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                                                    </li>
                                                            <?php
                                                                }
                                                            }

                                                            ?>

                                                            <li class="page-item">
                                                                <a class="page-link bg-dark text-warning" href="<?php if ($pageno >= $number_of_pages) {
                                                                                                                    echo "#";
                                                                                                                } else {
                                                                                                                    echo "?page=" . ($pageno + 1);
                                                                                                                } ?>" aria-label="Next">
                                                                    <span aria-hidden="true">&raquo;</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </nav>
                                                </div>

                                                <!--pagination-->


                                            </div>
                                        </div>









                                    </div>
                                </div>

                            </div>
                        </div>



                    </div>
                </div>

                <div class="col-1 vh-100" style="background-color: rgb(46,46,46) " ;>
                    <div class="row ">
                    </div>
                </div>

            </div>
        </div>

        <script src="bootstrap.bundle.js"></script>
        <script src="script.js"></script>
    </body>

    </html>



<?php

} else {
    echo ("You not a valid admin");
}





?>