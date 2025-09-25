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

        <title>Thara Fashion | View All Products</title>

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

                        <div class="col-12 pt-3 mb-1 bg-dark">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item text-light"><a href="AdminPanel.php" style="font-size:12px;">Dashboard</a></li>
                                    <li class="breadcrumb-item text-light"><a href="manageProduct.php" style="font-size:12px;">Manage Product</a></li>

                                </ol>
                            </nav>
                        </div>

                        <div class="col-12 ">
                            <div class="row  mx-lg-2 mx-1 mt-2 mb-2">
                                <div class="col-12">
                                    <div class="row mt-3 ">
                                        <span class="t2 text-white text-center">Sort Products</span>


                                        <div class="col-12 mt-5">
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
                                                    <button type="button" class=" col-5 btn btn-sm btn-outline-light mt-3 mx-2  mb-3" style="border-radius:30px ;" onclick="sort1(0);">Sort</button>
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


                <div class="col-9">
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
                                                                                <button class="btn btn-sm btn-warning " onclick="sendId(<?php echo $selected_data['id']; ?>);">Update</button>
                                                                            </div>
                                                                            <div class="col-12  d-grid">
                                                                                <button class="btn btn-sm btn-outline-warning ">Delete</button>
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
                                                                    <div class="form-check form-switch d-flex justify-content-end">
                                                                        <input class="form-check-input  t mx-2 " type="checkbox" role="switch" id="fd<?php echo $selected_data["id"];  ?>" <?php if ($selected_data["status_id"] == 2) {
                                                                                                                                                                                            ?>checked<?php }
                                                                                                                                                                                                        ?> onclick="changeStatus(<?php echo $selected_data['id']; ?>);" <?php
                                                                                                                                                                                                                                                                        ?> />


                                                                        <label class="form-check-label  text-light mt-1 " style="font-size:12px ;" for="fd<?php echo $selected_data["id"];  ?>">
                                                                            <?php if ($selected_data["status_id"] == 2) {
                                                                            ?> Active<?php
                                                                                    } else {
                                                                                        ?> Deactive <?php
                                                                                                }

                                                                                                    ?>
                                                                        </label>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--card-->


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


                                        <!---update peodut-->

                                        <?php

                                        if (isset($_SESSION["p"])) {
                                            $product_data = $_SESSION["p"];
                                        ?>

                                            <div class="modal " tabindex="-1" id="updateProductModel">
                                                <div class="modal-dialog ">
                                                    <div class="modal-content " style="background-color: rgb(46,46,46) ;">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-secondary fs-5"></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">


                                                            <div class="col-12">
                                                                <div class="row">

                                                                    <div class="col-12">
                                                                        <div class="row mx-2 d-flex mb-4 mt-2 align-items-center">
                                                                            <div class="col-lg-5 col-12">
                                                                                <div class="row mx-1  text-start border-lg-end">
                                                                                    <label class=" text-light">Product Collection</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-5 col-12">
                                                                                <div class="row mx-1 mb-1">
                                                                                    <select class="form-select bg-dark text-secondary" aria-label="Default select example" style="border-radius:30px ;" disabled>


                                                                                        <?php


                                                                                        $collection_rs = Database::search("SELECT * FROM `coleection` WHERE `id`='" . $product_data["coleection_id"] . "'");

                                                                                        $collection_data = $collection_rs->fetch_assoc();
                                                                                        ?>
                                                                                        <option><?php echo $collection_data["name"]; ?></option>
                                                                                        <?php


                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                    <hr />

                                                                    <div class="col-12">
                                                                        <div class="row mx-2 d-flex mb-4 mt-2 align-items-center">
                                                                            <div class="col-lg-5 col-12 ">
                                                                                <div class="row mx-1 border-lg-end  text-start">
                                                                                    <label class="text-light">Product Category</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-5 col-12 ">
                                                                                <div class="row mx-1 mb-1">
                                                                                    <select class="form-select bg-dark text-secondary" aria-label="Default select example" style="border-radius:30px ;" disabled>

                                                                                        <?php

                                                                                        $category_rs = Database::search("SELECT * FROM `category` WHERE `id`='" . $product_data["category_id"] . "'");
                                                                                        $category_data = $category_rs->fetch_assoc();

                                                                                        ?>
                                                                                        <option><?php echo $category_data["name"]; ?></option>
                                                                                        <?php


                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                    <hr />



                                                                    <hr />

                                                                    <div class="col-12">
                                                                        <div class="row mx-2 d-flex align-items-center mt-2 mb-4">
                                                                            <div class="col-lg-5 col-12 ">
                                                                                <div class="row mx-1 border-lg-end  text-start">
                                                                                    <label class=" text-light">Size</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-5 col-12">
                                                                                <div class="row mx-1 ">
                                                                                    <select class="form-select bg-dark text-secondary" aria-label="Default select example" style="border-radius:30px ;" disabled>

                                                                                        <?php

                                                                                        $size_rs = Database::search("SELECT * FROM `size` WHERE `id`='" . $product_data["size_id"] . "'");
                                                                                        $size_data = $size_rs->fetch_assoc();

                                                                                        ?>
                                                                                        <option><?php echo $size_data["name"]; ?></option>
                                                                                        <?php


                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                    <hr />

                                                                    <div class="col-12">
                                                                        <div class="row mx-2 d-flex align-items-center mt-2 mb-4">
                                                                            <div class="col-lg-5 col-12 ">
                                                                                <div class="row mx-1 border-lg-end  text-start">
                                                                                    <label class="text-light">Material</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-5 col-12">
                                                                                <div class="row mx-1 ">
                                                                                    <select class="form-select text-secondary bg-dark" aria-label="Default select example" style="border-radius:30px ;" disabled>
                                                                                        <?php

                                                                                        $material_rs = Database::search("SELECT * FROM `material` WHERE `id`='" . $product_data["material_id"] . "'");
                                                                                        $material_data = $material_rs->fetch_assoc();

                                                                                        ?>
                                                                                        <option><?php echo $material_data["name"]; ?></option>
                                                                                        <?php


                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                    <hr />

                                                                    <div class="col-12">
                                                                        <div class="row mx-2 d-flex align-items-center mt-2 mb-4">
                                                                            <div class="col-lg-5 col-12 ">
                                                                                <div class="row mx-1 border-lg-end  text-start">
                                                                                    <label class="text-light">Type</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-5 col-12">
                                                                                <div class="row mx-1 ">
                                                                                    <select class="form-select bg-dark text-secondary" aria-label="Default select example" style="border-radius:30px ;" disabled>
                                                                                        <?php

                                                                                        $type_rs = Database::search("SELECT * FROM `trend` WHERE `id`='" . $product_data["trend_id"] . "'");
                                                                                        $type_data = $type_rs->fetch_assoc();

                                                                                        ?>
                                                                                        <option><?php echo $type_data["name"]; ?></option>
                                                                                        <?php


                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                    <hr />

                                                                    <div class="col-12">
                                                                        <div class="row mx-2 d-flex align-items-center mb-4 mt-2">
                                                                            <div class=" col-12">
                                                                                <div class="row mx-1 border-lg-end  text-start">
                                                                                    <label class="text-light">Product Title</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 ">


                                                                                <div class="row mx-1 mt-2 ">
                                                                                    <input class="form-control bg-dark text-light " id="t" type="text" style="border-radius:30px ; font-size:12px;" value="<?php echo $product_data["title"]; ?>" />
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                    <hr />



                                                                    <div class="col-12">
                                                                        <div class="row mx-2 d-flex align-items-center mt-2 mb-4">
                                                                            <div class="col-lg-5 col-12 ">
                                                                                <div class="row mx-1 border-lg-end  text-start">
                                                                                    <label class="text-light">Color Family</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-5 col-12">
                                                                                <div class="row mx-1 ">

                                                                                    <select class="form-select bg-dark text-secondary" aria-label="Default select example" style="border-radius:30px ;" disabled>
                                                                                        <?php

                                                                                        $color_rs = Database::search("SELECT * FROM `color` WHERE `id`='" . $product_data["color_id"] . "'");
                                                                                        $color_data = $color_rs->fetch_assoc();

                                                                                        ?>
                                                                                        <option><?php echo $color_data["name"]; ?></option>
                                                                                        <?php


                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-12 mt-3 ">
                                                                                <div class="input-group ">
                                                                                    <input type="text" class="form-control bg-dark text-light rounded-end mx-1 mx-lg-0" placeholder="Add new Colour" style="border-radius:30px ;" disabled />
                                                                                    <button class="btn border-light bg-dark text-light  rounded-start" type="button" id="button-addon2" style="border-radius:30px ;" disabled>+ Add</button>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>






                                                                </div>
                                                            </div>

                                                            <hr />

                                                            <div class="col-12">
                                                                <div class="row mx-2 d-flex align-items-center mb-4 mt-2">
                                                                    <div class="col-lg-5 ">
                                                                        <div class="row mx-1 border-lg-end  text-start">
                                                                            <label class="text-light">Quntity</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-5 ">

                                                                        <div class="row mx-1 ">
                                                                            <input class="form-control bg-dark text-light" id="q" type="text" style="border-radius:30px ;" value="<?php echo $product_data["qty"]; ?>" />
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <hr />


                                                            <div class="col-12">
                                                                <div class="row mx-2 d-flex align-items-center mt-2 mb-4">
                                                                    <div class="col-lg-5 col-12 ">
                                                                        <div class="row mx-1 border-lg-end  text-start">
                                                                            <label class="text-light">Price</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class=" col-12 ">
                                                                        <div class="row mt-2 ">
                                                                            <div class="input-group mx-1 mx-lg-0 ">
                                                                                <span class="input-group-text rounded-end bg-dark text-light" style="border-radius:30px ;">Rs.</span>
                                                                                <input type="text" class="form-control bg-dark text-light " id="cost" value="<?php echo $product_data["price"]; ?>" disabled />
                                                                                <span class="input-group-text rounded-start bg-dark text-light" style="border-radius:30px ;">.00</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <hr />

                                                            <div class="col-12">
                                                                <div class="row mx-2  mt-2 mb-4">
                                                                    <div class="col-lg-5 col-12 ">
                                                                        <div class="row mx-1 border-lg-end  text-start">
                                                                            <label class="text-light">Delivery Cost</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 ">
                                                                        <div class="row mt-2 ">
                                                                            <div class=" col-12">
                                                                                <div class="input-group ">
                                                                                    <span class="input-group-text rounded-end bg-dark text-white" style="border-radius:30px ;">Rs.</span>
                                                                                    <input type="text" class="form-control bg-dark text-white" placeholder="with in colombo" id="dw" value="<?php echo $product_data["delivery_fee_weston"]; ?>" />
                                                                                    <span class="input-group-text rounded-start bg-dark text-white" style="border-radius:30px ;">.00</span>
                                                                                </div>
                                                                            </div>

                                                                            <div class=" col-12 mt-2">
                                                                                <div class="input-group ">
                                                                                    <span class="input-group-text rounded-end bg-dark text-white" style="border-radius:30px ;">Rs.</span>
                                                                                    <input type="text" class="form-control bg-dark text-white" placeholder="out of colombo" id="do" value="<?php echo $product_data["delivery_fee_other"]; ?>" />
                                                                                    <span class="input-group-text rounded-start bg-dark text-white" style="border-radius:30px ;">.00</span>
                                                                                </div>
                                                                            </div>


                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <hr />



                                                            <div class="col-12">
                                                                <div class="row mx-2 d-flex align-items-center mt-2 mb-4">
                                                                    <div class=" col-12 ">
                                                                        <div class="row mx-1  border-lg-end text-start">
                                                                            <label class="text-light">Product Description</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class=" col-12 ">
                                                                        <div class="row mx-1  ">

                                                                            <label for="exampleFormControlTextarea1" class="form-label"></label>
                                                                            <textarea class="form-control bg-dark text-white" id="des" rows="10"><?php echo $product_data["description"]; ?></textarea>

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <hr />

                                                            <div class="col-12">
                                                                <div class="row mx-2  d-flex align-items-center mt-2 mb-4">
                                                                    <div class=" col-12">
                                                                        <div class="row mx-1 border-lg-end   text-start">
                                                                            <label class="text-light">Add Images</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="  col-12">
                                                                        <div class="row  mt-2">
                                                                            <div class="input-group mb-3">


                                                                                <input class=" col-12 form-control bg-dark text-white" type="file" id="imageuploader" multiple style="border-radius:30px ;" onclick="changeProductImage();">





                                                                            </div>
                                                                        </div>



                                                                        <div class="row mx-1 mx-lg-0 ">

                                                                            <?php

                                                                            $img = array();
                                                                            $img[0] = "resources/emtyimg.png";
                                                                            $img[1] = "resources/emtyimg.png";
                                                                            $img[2] = "resources/emtyimg.png";

                                                                            $images_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $product_data["id"] . "'");
                                                                            $images_num = $images_rs->num_rows;

                                                                            for ($x = 0; $x < $images_num; $x++) {
                                                                                $images_data = $images_rs->fetch_assoc();
                                                                                $img[$x] = $images_data["path"];
                                                                            }
                                                                            ?>

                                                                            <div class="col-4 d-flex justify-content-center">
                                                                                <div class="row border-1 ">
                                                                                    <img src="<?php echo $img[0];  ?>" class="img-thumbnail" alt="..." style="width:100px; height:100px;" id="i0">
                                                                                </div>
                                                                            </div>


                                                                            <div class="col-4">
                                                                                <div class="row border-1 d-flex justify-content-center">
                                                                                    <img src="<?php echo $img[1];  ?>" class="img-thumbnail" alt="..." style="width:100px; height:100px;" id="i1">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-4">
                                                                                <div class="row border-1 d-flex justify-content-center">
                                                                                    <img src="<?php echo $img[2];  ?>" class="img-thumbnail" alt="..." style="width:100px; height:100px;" id="i2">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary" onclick="updateProduct();">Update Product</button>
                                                </div>
                                            </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    <?php



                                        }



                    ?>










                    <!---update peodut-->







                    </div>
                </div>

                <div class="col-1 vh-100" style="background-color: rgb(46,46,46) " ;>
                    <div class="row ">
                    </div>
                </div>



                <script src="bootstrap.bundle.js"></script>
                <script src="script.js"></script>
    </body>

    </html>
    </div>


<?php

} else {
    echo ("You not a valid admin");
}





?>