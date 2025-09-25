<?php

session_start();

require "connection.php";

$au = $_SESSION["au"];

$search = $_POST["s"];
$time = $_POST["t"];
$qty = $_POST["q"];
$price = $_POST["p"];

$frock = $_POST["frock"];
$top = $_POST["tops"];
$pant = $_POST["pants"];
$skirt = $_POST["skirt"];
$tshirt = $_POST["tshirt"];
$trou = $_POST["trou"];
$shirt = $_POST["shirt"];

$query = "SELECT * FROM `product`";

if (!empty($search)) {        //search only
    $query .= " WHERE  `title` LIKE '%" . $search . "%' ";
}

if ($time != "0") {   //time only
    if ($time == "1") {
        $query .= " ORDER BY `datetime_added` DESC";
    } else if ($time == "2") {
        $query .= " ORDER BY `datetime_added` ASC";
    }
}


if ($time == "0" && $qty != "0") {    //no time  ,   qty only
    if ($qty == "1") {
        $query .= " ORDER BY `qty` DESC";
    } else if ($qty == "2") {
        $query .= " ORDER BY `qty` ASC";
    }
} else if ($time != "0" && $qty != "0") {     //time and qty
    if ($qty == "1" && $time == "1") {
        $query .= " , `qty` DESC , `datetime_added` DESC";
    } else if ($qty == "2" && $time == "2") {
        $query .= " , `qty` ASC , `datetime_added` ASC";
    } else if ($qty == "1" && $time == "2") {
        $query .= " , `qty` DESC , `datetime_added` ASC";
    } else if ($qty == "2" && $time == "1") {
        $query .= " , `qty` ASC , `datetime_added` DESC";
    }
}

if ($time == "0" && $qty == "0" && $price != "0") {      //no time , no qty , price only
    if ($price == "1") {
        $query .= " ORDER BY `price` DESC";
    } else if ($price == "2") {
        $query .= " ORDER BY `price` ASC";
    }
} else if ($time != "0" && $qty != "0" && $price != "0") {   //time , qty , price
    if ($qty == "1" && $time == "1" && $price == "1") {
        $query .= " , `qty` DESC , `datetime_added` DESC , `price` DESC";
    } else if ($qty == "2" && $time == "2" && $price == "1") {
        $query .= " , `qty` ASC , `datetime_added` ASC , `price` DESC";
    } else if ($qty == "1" && $time == "2" && $price == "1") {
        $query .= " , `qty` DESC , `datetime_added` ASC , `price` DESC";
    } else if ($qty == "2" && $time == "1" && $price == "1") {
        $query .= " , `qty` ASC , `datetime_added` DESC , `price` DESC";
    } else if ($qty == "1" && $time == "1" && $price == "2") {
        $query .= " , `qty` DESC , `datetime_added` DESC , `price` ASC";
    } else if ($qty == "2" && $time == "2" && $price == "2") {
        $query .= " , `qty` ASC , `datetime_added` ASC , `price` ASC";
    } else if ($qty == "1" && $time == "2" && $price == "2") {
        $query .= " , `qty` DESC , `datetime_added` ASC , `price` ASC";
    } else if ($qty == "2" && $time == "1" && $price == "2") {
        $query .= " , `qty` ASC , `datetime_added` DESC , `price` ASC";
    }
}

if ($frock == "1") {
    $query .= " WHERE `category_id` = '1' ";
} else if ($top == "1") {
    $query .= " WHERE `category_id` = '2' ";
} else if ($pant == "1") {
    $query .= " WHERE `category_id` = '3' ";
} else if ($skirt == "1") {
    $query .= " WHERE `category_id` = '4' ";
} else if ($tshirt == "1") {
    $query .= " WHERE `category_id` = '5' ";
} else if ($trou == "1") {
    $query .= " WHERE `category_id` = '6' ";
} else if ($shirt == "1") {
    $query .= " WHERE `category_id` = '7' ";
}







?>





<div class="col-12">
    <div class="row  justify-content-center">


        <?php

        if ("0" != ($_POST["page"])) {
            $pageno = $_POST["page"];
        } else {
            $pageno = 1;
        }



        $product_rs = Database::search($query);
        $product_num = $product_rs->num_rows;


        $results_per_page = 15;
        $number_of_pages = ceil($product_num / $results_per_page);

        $page_results = ($pageno - 1) * $results_per_page;
        $selected_rs = Database::search($query .  " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");
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



    </div>
</div>









<!--pagination-->

<div class=" col-8 col-lg-6 text-center mb-3 mt-1" >
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




<?php


?>