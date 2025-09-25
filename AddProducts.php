<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Thara Fashion | Add Product</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resources/logo2.jpg" />



</head>

<body class="bg-dark" style="overflow-y:hidden ;">

    <div class="container-fluid">
        <div class="row">


            <div class="col-12">
                <div class="row mt-2 mb-2" style="background-color: rgb(46,46,46) ;">
                    <span class="h2 text-light text-start fw-bolder">Manage Products</span>
                </div>

            </div>



            <div class="col-12 col-lg-2 ">
                <div class="row ">
                    <div class="col-12 align-items-start vh-100" style="background-color: rgb(46,46,46) ;">
                        <div class="row g-1 text-center">


                            <div class="col-12 d-flex align-items-center ">
                                <div class="row  mx-1 mt-5 ">

                                    <nav class="nav flex-column ">
                                        <a class="nav-link text-start text-white  border-bottom   " href="manageProduct.php" aria-current="page"><i class="bi bi-bag-check-fill "></i>&nbsp;&nbsp;&nbsp;Manage Products</a>
                                        <hr />
                                        <a class="nav-link  text-start text-white  border-bottom " href="AdminPanel.php"><i class="bi bi-grid  "></i>&nbsp;&nbsp;&nbsp;Dashboard</a>
                                        <hr />
                                        <a class="nav-link text-start text-white  border-bottom " href="viewAllProduct.php"><i class="bi bi-list "></i>&nbsp;&nbsp;&nbsp;View All Products</a>
                                        <hr />
                                        <a class="nav-link text-start text-white  border-bottom  " href="#"><i class="bi bi-folder-plus "></i>&nbsp;&nbsp;&nbsp;Add New Product</a>
                                        <hr />



                                    </nav>

                                </div>
                            </div>

                        </div>
                    </div>



                </div>



            </div>


            <div class="col-lg-10 col-12 ">
                <div class="row mx-2  vh-100" style="overflow-y:scroll ;">

                    <div class="12">
                        <div class="row">

                            <span class="fs-4 fw-bold mt-3 mb-3 text-secondary">Add a New Product</span>

                            <!---add new peodut-->

                            <?php

                            require "connection.php";

                            ?>



                            <div class="alert alert-danger d-none" role="alert" id="alertdiv1">
                                <i class="bi bi-x-octagon-fill fs-5" id="msg1">

                                </i>
                            </div>

                            <div class="col-12">
                                <div class="row mx-2 d-flex mb-4 mt-2 align-items-center">
                                    <div class="col-lg-5 col-12">
                                        <div class="row mx-1  text-start border-lg-end">
                                            <label class="fw-bold text-light">Product Collection</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-12">
                                        <div class="row mx-1 mb-1">
                                            <select class="form-select bg-dark text-light" style="border-radius:30px ;" id="collection">
                                                <option value="0" selected>Collection</option>

                                                <?php

                                                $collection_rs = Database::search("SELECT * FROM `coleection` ");
                                                $collection_num = $collection_rs->num_rows;

                                                for ($x = 0; $x < $collection_num; $x++) {
                                                    $collection_data = $collection_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $collection_data["id"]; ?>"><?php echo $collection_data["name"]; ?></option>
                                                <?php

                                                }
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
                                            <label class="fw-bold text-light">Product Category</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-12 ">
                                        <div class="row mx-1 mb-1">
                                            <select class="form-select bg-dark text-light" aria-label="Default select example" style="border-radius:30px ;" id="category">
                                                <option value="0" selected>Category</option>
                                                <?php

                                                $category_rs = Database::search("SELECT * FROM `category` ");
                                                $category_num = $category_rs->num_rows;

                                                for ($y = 0; $y < $category_num; $y++) {
                                                    $category_data = $category_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $category_data["id"]; ?>"><?php echo $category_data["name"]; ?></option>
                                                <?php

                                                }
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
                                            <label class="fw-bold text-light">Size</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-12">
                                        <div class="row mx-1 ">
                                            <select class="form-select bg-dark text-light" aria-label="Default select example" style="border-radius:30px ;" id="size">
                                                <option selected>Size</option>
                                                <?php

                                                $size_rs = Database::search("SELECT * FROM `size` ");
                                                $size_num = $size_rs->num_rows;

                                                for ($z = 0; $z < $size_num; $z++) {
                                                    $size_data = $size_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $size_data["id"]; ?>"><?php echo $size_data["name"]; ?></option>
                                                <?php

                                                }
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
                                            <label class="fw-bold text-light">Material</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-12">
                                        <div class="row mx-1 ">
                                            <select class="form-select bg-dark text-light" aria-label="Default select example" style="border-radius:30px ;" id="material">
                                                <option selected>Material</option>
                                                <?php

                                                $material_rs = Database::search("SELECT * FROM `material` ");
                                                $material_num = $material_rs->num_rows;

                                                for ($a = 0; $a < $material_num; $a++) {
                                                    $material_data = $material_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $material_data["id"]; ?>"><?php echo $material_data["name"]; ?></option>
                                                <?php

                                                }
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
                                            <label class="fw-bold text-light">Type</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-12">
                                        <div class="row mx-1 ">
                                            <select class="form-select bg-dark text-light" aria-label="Default select example" style="border-radius:30px ;" id="type">
                                                <option selected>Type</option>
                                                <?php

                                                $type_rs = Database::search("SELECT * FROM `trend` ");
                                                $type_num = $type_rs->num_rows;

                                                for ($b = 0; $b < $type_num; $b++) {
                                                    $type_data = $type_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $type_data["id"]; ?>"><?php echo $type_data["name"]; ?></option>
                                                <?php

                                                }
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
                                            <label class="fw-bold text-light">Product Title</label>
                                        </div>
                                    </div>
                                    <div class="col-10 ">
                                        <div class="row mx-1 mt-2 ">
                                            <input class="form-control bg-dark text-light" type="text" style="border-radius:30px ;" id="title" />
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <hr />



                            <div class="col-12">
                                <div class="row mx-2 d-flex align-items-center mt-2 mb-4">
                                    <div class="col-lg-5 col-12 ">
                                        <div class="row mx-1 border-lg-end  text-start">
                                            <label class="fw-bold text-light">Color Family</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-12">
                                        <div class="row mx-1 ">
                                            <select class="form-select bg-dark text-light" aria-label="Default select example" style="border-radius:30px ;" id="color">
                                                <option selected>Color</option>
                                                <?php

                                                $color_rs = Database::search("SELECT * FROM `color` ");
                                                $color_num = $color_rs->num_rows;

                                                for ($x = 0; $x < $color_num; $x++) {
                                                    $color_data = $color_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $color_data["id"]; ?>"><?php echo $color_data["name"]; ?></option>
                                                <?php

                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-5 offset-5 mt-2 ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control rounded-end mx-1 mx-lg-0 bg-dark text-light" placeholder="Add new Colour" style="border-radius:30px ;" id="addcolor" />
                                            <button class="btn btn-dark text-light rounded-start border-light" type="button" id="button-addon2" style="border-radius:30px ;">+ Add</button>
                                        </div>
                                    </div>

                                </div>
                            </div>



                            <hr />

                            <div class="col-12">
                                <div class="row mx-2 d-flex align-items-center mb-4 mt-2">
                                    <div class="col-lg-5 ">
                                        <div class="row mx-1 border-lg-end  text-start">
                                            <label class="fw-bold text-light">Quntity</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 ">

                                        <div class="row mx-1 ">
                                            <input class="form-control bg-dark text-light" type="text" style="border-radius:30px ;" id="qty" />
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <hr />


                            <div class="col-12">
                                <div class="row mx-2 d-flex align-items-center mt-2 mb-4">
                                    <div class="col-lg-5 col-12 ">
                                        <div class="row mx-1 border-lg-end  text-start">
                                            <label class="fw-bold text-light">Price</label>
                                        </div>
                                    </div>
                                    <div class=" col-5 offset-5 ">
                                        <div class="row  ">
                                            <div class="input-group mx-1 mx-lg-0 ">
                                                <span class="input-group-text rounded-end bg-dark text-light" style="border-radius:30px ;">Rs.</span>
                                                <input type="text" class="form-control bg-dark text-light" id="cost" />
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
                                            <label class="fw-bold text-light">Delivery Cost</label>
                                        </div>
                                    </div>
                                    <div class="col-12 ">
                                        <div class="row  ">
                                            <div class=" col-5 offset-5">
                                                <div class="input-group ">
                                                    <span class="input-group-text rounded-end bg-dark text-light" style="border-radius:30px ;">Rs.</span>
                                                    <input type="text" class="form-control bg-dark text-light" placeholder="with in colombo" id="dw" />
                                                    <span class="input-group-text rounded-start bg-dark text-light" style="border-radius:30px ;">.00</span>
                                                </div>
                                            </div>

                                            <div class=" col-5 offset-5 mt-2">
                                                <div class="input-group ">
                                                    <span class="input-group-text rounded-end bg-dark text-light" style="border-radius:30px ;">Rs.</span>
                                                    <input type="text" class="form-control bg-dark text-light" placeholder="out of colombo" id="do" />
                                                    <span class="input-group-text rounded-start bg-dark text-light" style="border-radius:30px ;">.00</span>
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
                                            <label class="fw-bold text-light">Product Description</label>
                                        </div>
                                    </div>
                                    <div class=" col-10 ">
                                        <div class="row mx-1  ">

                                            <label for="exampleFormControlTextarea1" class="form-label"></label>
                                            <textarea class="form-control bg-dark text-light" rows="5" id="desc"></textarea>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <hr />

                            <div class="col-12">
                                <div class="row mx-2  d-flex align-items-center mt-2 mb-4">
                                    <div class=" col-10">
                                        <div class="row mx-1 border-lg-end   text-start">
                                            <label class="fw-bold bg-dark text-light">Add Images</label>
                                        </div>
                                    </div>
                                    <div class="  col-10">
                                        <div class="row  ">
                                            <div class="input-group mb-3">


                                                <input class=" col-12 form-control bg-dark text-light" type="file" id="imageuploader" multiple style="border-radius:30px ;" onclick="changeProductImage();">





                                            </div>
                                        </div>

                                        <div class="col-12">

                                            <div class="row mx-1 mx-lg-0 ">

                                                <div class="col-4 d-flex justify-content-center">
                                                    <div class="row border-1 bg-dark">
                                                        <img src="resources/emtyimg.png" class="img-thumbnail" alt="..." style="width:100px; height:100px;" id="i0">
                                                    </div>
                                                </div>


                                                <div class="col-4">
                                                    <div class="row border-1 d-flex justify-content-center bg-dark">
                                                        <img src="resources/emtyimg.png" class="img-thumbnail" alt="..." style="width:100px; height:100px;" id="i1">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="row border-1 d-flex justify-content-center bg-dark">
                                                        <img src="resources/emtyimg.png" class="img-thumbnail" alt="..." style="width:100px; height:100px;" id="i2">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="border-light mx-3" />

                    <button type="button" class="col-2  mb-5 mt-2  offset-9 btn btn-outline-primary text-light" style="border-radius:30px;" onclick=" addProduct();">Save Product</button>

                </div>


            </div>
        </div>

    </div>
    </div>
    </div>




    <!---add new peodut-->

    </div>
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