<?php
require "connection.php";

$cid = $_POST["cid"];
$txt2 = $_POST["t2"];
$cat = $_POST["cat"];
$color =$_POST["col"];
$size = $_POST["size"];
$type = $_POST["type"];
$mat = $_POST["mat"];

$query = "SELECT * FROM `product` WHERE `coleection_id` ='".$cid."' AND `status_id`='1' "; 




    if (!empty($txt2)) {
    $query .= " AND `title` LIKE '%" . $txt2 . "%' ";
  
    }

if($cat != "0"){  //only category
    if($cat =="1"){
        $query .= " AND `category_id` = '".$cat."' ";
    }else if($cat =="2"){
        $query .= "AND `category_id` = '".$cat."' ";
    }else if($cat =="3"){
        $query .= "AND `category_id` = '".$cat."' ";
    }else if($cat =="4"){
        $query .= "AND `category_id` = '".$cat."' ";
    }else if($cat =="5"){
        $query .= "AND `category_id` = '".$cat."' ";
    }else if($cat =="6"){
        $query .= "AND `category_id` = '".$cat."' ";
    }else if($cat =="7"){
        $query .= "AND `category_id` = '".$cat."' ";
    }
}

if($cat != "0" && $color != "0"){     //category and color
    if($color == "1"){
        $query .= " AND `color_id` = '".$color."' ";
    } else if($color == "2"){
        $query .= " AND `color_id` = '".$color."' ";
    }else if($color == "3"){
        $query .= " AND `color_id` = '".$color."' ";
    }else if($color == "4"){
        $query .= " AND `color_id` = '".$color."' ";
    }else if($color == "5"){
        $query .= " AND `color_id` = '".$color."' ";
    }else if($color == "6"){
        $query .= " AND `color_id` = '".$color."' ";
    }else if($color == "7"){
        $query .= " AND `color_id` = '".$color."' ";
    }
}else if($cat == "0" && $color != "0"){   //only color
    if($color == "1"){
        $query .= " AND `color_id` = '".$color."' ";
    } else if($color == "2"){
        $query .= " AND `color_id` = '".$color."' ";
    }else if($color == "3"){
        $query .= " AND `color_id` = '".$color."' ";
    }else if($color == "4"){
        $query .= " AND `color_id` = '".$color."' ";
    }else if($color == "5"){
        $query .= " AND `color_id` = '".$color."' ";
    }else if($color == "6"){
        $query .= " AND `color_id` = '".$color."' ";
    }else if($color == "7"){
        $query .= " AND `color_id` = '".$color."' ";
    }
}

if($cat == "0" && $color == "0" && $size != "0"){
    if($size == "1"){
        $query .= " AND `size_id` ='".$size."' ";
    }else if($size == "2"){
        $query .= " AND `size_id` = '".$size."' ";
    }else if($size == "3"){
        $query .= " AND `size_id` = '".$size."' ";
    }else if($size == "4"){
        $query .= " AND `size_id` = '".$size."' ";
    }
}else if($cat != "0" && $color != "0" && $size != "0"){
    if($size == "1"){
        $query .= " AND `size_id` ='".$size."' ";
    }else if($size == "2"){
        $query .= " AND `size_id` = '".$size."' ";
    }else if($size == "3"){
        $query .= " AND `size_id` = '".$size."' ";
    }else if($size == "4"){
        $query .= " AND `size_id` = '".$size."' ";
    }
}

if($cat == "0" && $color == "0" && $size == "0" && $type !="0"){
    if($type == "1"){
        $query .= " AND `trend_id` ='".$type."' ";
    }else if($type == "2"){
        $query .= " AND `trend_id` ='".$type."' ";
    }if($type == "3"){
        $query .= " AND `trend_id` ='".$type."' ";
    }
}else if($cat != "0" && $color != "0" && $size != "0" && $type !="0"){
    if($type == "1"){
        $query .= " AND `trend_id` ='".$type."' ";
    }else if($type == "2"){
        $query .= " AND `trend_id` ='".$type."' ";
    }if($type =="3"){
        $query .= " AND `trend_id` ='".$type."' ";
    }
}

if($cat == "0" && $color == "0" && $size == "0" && $type =="0" && $mat != "0"){
    if($mat == "1"){
        $query .= " AND `material_id` ='".$mat."' ";
    }else if($mat == "2"){
        $query .= " AND `material_id` ='".$mat."' ";
    }else if($mat == "3"){
        $query .= " AND `material_id` ='".$mat."' ";
    }else if($mat == "4"){
        $query .= " AND `material_id` ='".$mat."' ";
    }else if($mat == "5"){
        $query .= " AND `material_id` ='".$mat."' ";
    }else if($mat == "6"){
        $query .= " AND `material_id` ='".$mat."' ";
    }else if($mat == "7"){
        $query .= " AND `material_id` ='".$mat."' ";
    }
}
if($cat != "0" && $color != "0" && $size != "0" && $type !="0" && $mat != "0"){
    if($mat == "1"){
        $query .= " AND `material_id` ='".$mat."' ";
    }else if($mat == "2"){
        $query .= " AND `material_id` ='".$mat."' ";
    }else if($mat == "3"){
        $query .= " AND `material_id` ='".$mat."' ";
    }else if($mat == "4"){
        $query .= " AND `material_id` ='".$mat."' ";
    }else if($mat == "5"){
        $query .= " AND `material_id` ='".$mat."' ";
    }else if($mat == "6"){
        $query .= " AND `material_id` ='".$mat."' ";
    }else if($mat == "7"){
        $query .= " AND `material_id` ='".$mat."' ";
    }
}



?>

<div class="row">
    <div class=" col-12  ">
        <div class="row justify-content-center">

            <div class="col-12">

                <div class="row justify-content-center   gap-3 mt-3 mb-3 ">

                    <?php


                    $product_rs = Database::search($query);
                    $product_num = $product_rs->num_rows;
                


                    for ($x = 0; $x < $product_num; $x++) {
                        $product_data = $product_rs->fetch_assoc();

                    ?>




                        <div class="card bg-white col-lg-2 col-5  ">
                            <?php

                            $img_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id` ='" . $product_data["id"] . "'");
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
                                    <span class="fw-bold "><?php echo $product_data["title"] ?></span>
                                    <span class="fs-5 text-danger fw-bold">Rs. <?php echo $product_data["price"] ?> .00</span>
                                    <span style="font-size:10px;">10 Items availble</span>
                                    <div class="col-12 mt-2">
                                        <div class="row">

                                            <span class="text-end"><i class="bi bi-cart4 fs-4 text-warning mx-2"></i><i class="bi bi-heart fs-4 text-danger  mx-2"></i></span>
                                        </div>
                                    </div>
                                    <a class=" col-10 offset-1 btn btn-warning  mt-3 mb-2 " href='<?php echo "singleProductView.php?id=" . $product_data["id"]; ?>' style="border-radius:30px ;">Buy Now</a>

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
</div>




