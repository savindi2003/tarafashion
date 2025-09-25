<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Thara Fashion | Manage Products</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resources/logo2.jpg" />



</head>

<body class="bg-dark">

    <div class="container-fluid">
        <div class="row">

        <?php  require "connection.php";?>


            <div class="col-12">
                <div class="row mt-2 mb-2" style="background-color: rgb(46,46,46) ;">
                    <span class="h2 text-light text-start fw-bolder">Manage Products</span>
                </div>

            </div>



            <div class="col-12 col-lg-2">
                <div class="row">
                    <div class="col-12 align-items-start  vh-100" style="background-color: rgb(46,46,46) ;">
                        <div class="row g-1 text-center">


                            <div class="col-12 d-flex align-items-center ">
                                <div class="row  mx-1 mt-5 ">

                                    <nav class="nav flex-column ">
                                        <a class="nav-link text-start text-white  border-bottom   " href="#" aria-current="page"><i class="bi bi-bag-check-fill "></i>&nbsp;&nbsp;&nbsp;Manage Products</a>
                                        <hr />
                                        <a class="nav-link  text-start text-white  border-bottom " href="AdminPanel.php"><i class="bi bi-grid  "></i>&nbsp;&nbsp;&nbsp;Dashboard</a>
                                        <hr />
                                        <a class="nav-link text-start text-white  border-bottom " href="viewAllProduct.php"><i class="bi bi-list "></i>&nbsp;&nbsp;&nbsp;View All Products</a>
                                        <hr />
                                        <a class="nav-link text-start text-white  border-bottom  " href="AddProducts.php"><i class="bi bi-folder-plus "></i>&nbsp;&nbsp;&nbsp;Add New Product</a>
                                        <hr />
                                        <a class="nav-link text-start text-white  border-bottom  " href="productReviews.php"><i class="bi bi-pencil-square"></i>&nbsp;&nbsp;&nbsp;Product Reviews</a>
                                        <hr />


                                    </nav>

                                </div>
                            </div>

                        </div>
                    </div>



                </div>



            </div>


            <div class="col-lg-10 col-12 ">
                <div class="row mx-2 mt-3 ">

                    <div class="12">
                        <div class="row">

                            <span class="fs-4 fw-bold mt-3 mb-3 text-secondary">Resent Selling Product</span>

                            <div class=" col-12">
                                <div class="row ">

                                <?php

                                $freq_rs = Database::search("SELECT `product_id`,COUNT(`product_id`) AS `value_occurence` FROM `invoice` GROUP BY `product_id` ORDER BY  `value_occurence` DESC LIMIT 6 ");
                                $freq_num=$freq_rs->num_rows;

                                

                              
                            

                                    for($z = 0; $z < $freq_num; $z++){
                                        if ($freq_num > 0) {
                                        $freq_data=$freq_rs->fetch_assoc();
                                    

                                    

                                    $product_rs=Database::search("SELECT * FROM `product` WHERE `id` = '".$freq_data["product_id"]."' ");
                                    $product_data=$product_rs->fetch_assoc();
    
                                    $image_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $freq_data["product_id"] . "'");
                                        $image_data = $image_rs->fetch_assoc();
    
                                        $qty_rs = Database::search("SELECT SUM(`qty`) AS `qty_total` FROM `invoice` WHERE `product_id`='" . $freq_data["product_id"] . "' ");
                                        $qty_data = $qty_rs->fetch_assoc();
    

                                    ?>
                                        <div class="col-2">
                                        <div class="row mx-1 ">
                                            <div class="card shadow-lg" style="width: 18rem; background-color: rgb(46,46,46) ;">
                                            <div class="col-12">
                                                <div class="row justify-content-center">
                                                <img src="<?php echo $image_data["path"]; ?>" class=" mt-2 " style="width:100px; height:100px;">

                                                </div>
                                            </div>
                                                
                                                <span class="mt-1  t12 text-light "><?php echo $product_data["title"]; ?></span><br />
                                                <span class="mt-1  text-light">Rs. <?php echo $product_data["price"]; ?> .00</span>
                                                <span class="mt-1 text-warning text-secondary" style="font-size:12px;"> <?php echo $qty_data["qty_total"] ; ?> Sold</span>


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

                    <div class="col-12 ">
                        <div class="row mt-4">

                            <div class="col-12">
                                <span class=" fs-3  mt-3 mb-3 text-start text-secondary">Stock Report</span>
                            </div>

                            <div class=" col-6 offset-3 d-flex justify-content-center ">
                                <input type="text" name="search" placeholder="Product id..." class="search bg-dark text-light   pt-2 pb-2 rounded-end mb-2 mt-2" style="border-radius:30px ; height:30px; font-size:12px;" id="st">
                                <span class="input-group-text rounded-start mb-2 mt-2" style="border-radius:30px ;  font-size:12px; height:30px;" onclick="searchProduct();"><i class="bi bi-search"></i></span>
                            </div>


                            <div class="col-12 " id="view_area2">
                                <div class="row box">


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

                                   

                                    $p_rs = Database::search("SELECT * FROM `product` ORDER BY `datetime_added` DESC  ");
                                    $p_num = $p_rs->num_rows;





                                    for ($x = 0; $x < $p_num; $x++) {
                                        $p_data  = $p_rs->fetch_assoc();

                                    ?>
                                        <div class="col-12  " >
                                            <div class="row ">
                                                <div class="col-2 col-lg-1  py-2 text-end " style="background-color: rgb(46,46,46) ; ">
                                                    <span class=" text-white " style="font-size:12px;"><?php echo $p_data["id"]; ?></span>
                                                </div>

                                                <div class="col-4 col-lg-2  py-2">
                                                    <span class="text-white " style="font-size:12px;"><?php echo $p_data["title"]; ?></span>
                                                </div>

                                                <?php
                                                $col_rs = Database::search("SELECT * FROM `coleection` WHERE `id` ='" . $p_data["coleection_id"] . "' ");
                                                $col_data = $col_rs->fetch_assoc();

                                                $c_rs = Database::search("SELECT * FROM `category` WHERE `id` ='" . $p_data["category_id"] . "' ");
                                                $c_data = $c_rs->fetch_assoc();
                                                ?>
                                                <div class="col-1 d-none d-lg-block  py-2" style="background-color: rgb(46,46,46) ;">
                                                    <span class="text-white" style="font-size:12px;"><?php echo $col_data["id"]; ?></span>
                                                </div>
                                                <div class="col-1 d-none d-lg-block  py-2">
                                                    <span class="text-white" style="font-size:12px;"><?php echo $c_data["name"]; ?></span>
                                                </div>
                                                <div class="col-4 col-lg-2 d-lg-block py-2">
                                                    <span class="text-white" style="font-size:12px;">Rs. <?php echo $p_data["price"]; ?> .00</span>
                                                </div>
                                                <div class="col-2 d-none d-lg-block y py-2 " style="background-color: rgb(46,46,46) ;">
                                                    <span class=" text-white" style="font-size:12px;"><?php echo $p_data["qty"]; ?></span>
                                                </div>
                                                <div class="col-2 d-none d-lg-block y py-2 ">
                                                    <span class=" text-white" style="font-size:12px;"><?php echo $p_data["datetime_added"]; ?></span>
                                                </div>

                                                <?php
                                                if ($p_data["qty"] == 0) {
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
</body>

</html>
</div>