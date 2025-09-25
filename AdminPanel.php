<?php

session_start();

require "connection.php";

if (isset($_SESSION["au"])) {


?>

    <!DOCTYPE html>

    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Thara Fashion | Admin Panel</title>

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css" />

        <link rel="icon" href="resources/logo1.jpg" />


        <?php

        $p_rs = Database::search("SELECT CONCAT(YEAR(invoice.date),'-', MONTHNAME(invoice.date) ) 
as ym,MONTHNAME(invoice.date) AS m,SUM(total)  FROM `invoice` WHERE YEAR(invoice.date)='2024' 
  GROUP BY ym ORDER BY `date` ASC;");
        $p_num = $p_rs->num_rows;






        ?>




        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);
            google.charts.setOnLoadCallback(drawChart2);
            google.charts.setOnLoadCallback(drawChart3);
            google.charts.setOnLoadCallback(drawChart4);


            function drawChart() {        //2023
                var data = google.visualization.arrayToDataTable([
                    ['Month', 'Sales'],
                    <?php

                    for ($x = 0; $x < $p_num; $x++) {
                        $p_data = $p_rs->fetch_assoc();

                        echo "['" . $p_data['m'] . "'," . $p_data['SUM(total)'] . "],";
                    }



                    ?>
                ]);

                var options = {
                    title: 'Company Performance (2024)',
                    titleTextStyle: {
                        color: 'white'
                    },
                    legendTextStyle: {
                        color: 'white'
                    },
                    curveType: 'function',
                    legend: {
                        position: 'bottom'
                    },

                    hAxis: {
                        textStyle: {
                            color: 'white'
                        }
                    },
                    vAxis: {
                        textStyle: {
                            color: 'white'
                        }
                    },

                    backgroundColor: {
                        fill: 'black',
                        fillOpacity: 0.1
                    },
                    colors: ['orange'],



                };

                var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                chart.draw(data, options);
            }

            <?php

            $p_rs = Database::search("SELECT CONCAT(YEAR(invoice.date),'-', MONTHNAME(invoice.date) ) 
                                        as ym,MONTHNAME(invoice.date) AS m,SUM(total)  FROM `invoice` WHERE YEAR(invoice.date)='2023' 
                                        GROUP BY ym ORDER BY `date` ASC;");

            $p_num = $p_rs->num_rows;


            ?>

            function drawChart2() {   //2024
                var data = google.visualization.arrayToDataTable([
                    ['Month', 'Sales'],
                    <?php

                    for ($x = 0; $x < $p_num; $x++) {
                        $p_data = $p_rs->fetch_assoc();

                        echo "['" . $p_data['m'] . "'," . $p_data['SUM(total)'] . "],";
                    }



                    ?>


                ]);

                var options = {
                    title: 'Company Performance (2023)',
                    curveType: 'function',
                    legend: {
                        position: 'bottom'
                    },
                    titleTextStyle: {
                        color: 'white'
                    },
                    legendTextStyle: {
                        color: 'white'
                    },
                    curveType: 'function',
                    legend: {
                        position: 'bottom'
                    },

                    hAxis: {
                        textStyle: {
                            color: 'white'
                        }
                    },
                    vAxis: {
                        textStyle: {
                            color: 'white'
                        }
                    },

                    backgroundColor: {
                        fill: 'black',
                        fillOpacity: 0.1
                    },
                    colors: ['orange'],
                };

                var chart = new google.visualization.LineChart(document.getElementById('curve_chart2'));

                chart.draw(data, options);
            }

            <?php

            $stor_cat_rs = Database::search("SELECT `category`.`name`, COUNT(`product`.`id`) AS `ProductCount`
                                                    FROM  `category`
                                                    JOIN `product`  ON `category`.`id` = `product`.`category_id`
                                                    GROUP BY `category`.`name`;");

            $stor_cat_num = $stor_cat_rs->num_rows;

            ?>

            function drawChart3() {



                // Set Data
                const data = google.visualization.arrayToDataTable([
                    ['Category', 'Mhl'],
                    

                    <?php

                    for ($stc = 0; $stc < $stor_cat_num; $stc++) {

                        $stor_cat_data = $stor_cat_rs->fetch_assoc();

                        echo "['" . $stor_cat_data['name'] . "'," . $stor_cat_data['ProductCount'] . " ],";
                    }
                    ?>


                ]);

                // Set Options
                const options = {
                    title: 'Store Item Categories',
                    backgroundColor: {
                        fill: 'black',
                        fillOpacity: 0.1
                    },
                    titleTextStyle: {
                        color: 'white'
                    },
                    legendTextStyle: {
                        color: 'white'
                    },
                };

                // Draw
                const chart = new google.visualization.PieChart(document.getElementById('piechar1'));
                chart.draw(data, options);

            }
            <?php

            $today = new DateTime();
            $tz1 = new DateTimeZone("Asia/Colombo");
            $today->setTimezone($tz1);
            $today_date = $today->format("Y-m-d");

            $dil_rs = Database::search("SELECT `invoice`.`status`, COUNT(`invoice`.`status`) AS `count` FROM `invoice` 
                                            WHERE `invoice`.`date` <= '".$today_date."' GROUP BY `invoice`.`status` ORDER BY `invoice`.`status` ASC	 	");

            $dil_num = $dil_rs->num_rows;

            ?>

            function drawChart4() {

                // Set Data
                const data = google.visualization.arrayToDataTable([
                    ['Package status', 'Package Count', {
                        role: 'style'
                    }],



                    <?php

                    $status = ['Confirm', 'Packing', 'dispatch', 'Shipping', 'Diliverd', 'Canceled'];
                    $ststusIndex = 0;

                    $colors = ['orange', 'green', 'yellow', 'red', 'purple', 'pink'];
                    $colorIndex = 0;

                    for ($d = 0; $d < $dil_num; $d++) {
                        $dil_data = $dil_rs->fetch_assoc();

                        $status_name = $status[$ststusIndex % count($status)];
                        $count = $dil_data['count'];

                        $color = $colors[$colorIndex % count($colors)];

                        echo "['" . $status_name . "'," . $count . " , 'color: $color'],";
                        $ststusIndex++;
                        $colorIndex++;
                    }

                    ?>

                ]);



                // Set Options
                const options = {
                    title: 'Delivery status Summary - Until Today',
                    backgroundColor: {
                        fill: 'black',
                        fillOpacity: 0.1
                    },
                    titleTextStyle: {
                        color: 'white'
                    },
                    legendTextStyle: {
                        color: 'white'
                    },
                    hAxis: {
                        textStyle: {
                            color: 'white'
                        }
                    },
                    vAxis: {
                        textStyle: {
                            color: 'white'
                        }
                    },


                };

                // Draw
                const chart = new google.visualization.BarChart(document.getElementById('barchart1'));
                chart.draw(data, options);

            }
        </script>



    </head>

    <body class="bg-dark" style="overflow: hidden;">

        <div class="container-fluid">
            <div class="row">


                <!---menu - large only --->
                <div class="col-12 col-lg-2 d-none d-lg-block">
                    <div class="row">
                        <div class="col-12 align-items-start  vh-100" style="background-color: rgb(46,46,46) ;">
                            <div class="row g-1 text-center">


                                <div class="col-12">
                                    <div class="row justify-content-center mt-4">

                                        

                                        <img src="resources/logo1.jpg" class="img-fluid rounded rounded-circle" style="width: 100px; height:100px"  />

                                        <br /><br />
                                        <div class="col-12">
                                            <div class="row mt-3">
                                                <span class="text-white fw-bold"><?php echo $_SESSION["au"]["fname"] . " " . $_SESSION["au"]["lname"]; ?></span>
                                                <span class="text-secondary" style="font-size:12px ;"><?php echo $_SESSION["au"]["email"]; ?></span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <?php

                                $notification2_rs = Database::search("SELECT * FROM `notification` WHERE `usertype`='3' ORDER BY `date_time` DESC  ");
                                $notification_num = $notification2_rs->num_rows;
                                $notification2_data = $notification2_rs->fetch_assoc();


                                ?>


                                <div class="col-12 d-flex align-items-center ">
                                    <div class="row  mx-1 mt-3 ">

                                        <nav class="nav flex-column ">
                                            <hr />
                                            <a class="nav-link active text-start text-white fw-bold border-bottom " aria-current="page" href="#"><i class="bi bi-grid  "></i>&nbsp;&nbsp;&nbsp;Dashboard</a>
                                            <hr />
                                            <a class="nav-link text-start text-white fw-bold border-bottom " href="manageUsers.php"><i class="bi bi-people "></i>&nbsp;&nbsp;&nbsp;Manage Users</a>
                                            <hr />
                                            <a class="nav-link text-start text-white fw-bold border-bottom  " href="manageProduct.php"><i class="bi bi-bag-check-fill "></i>&nbsp;&nbsp;&nbsp;Manage Products</a>
                                            <hr />
                                            <a class="nav-link text-start text-white fw-bold  border-bottom " href="manageOrders.php"><i class="bi bi-journal-text "></i>&nbsp;&nbsp;&nbsp;Manage Sellings</a>
                                            <hr />
                                            <a class="nav-link text-start text-white fw-bold  border-bottom " href="adminMessage.php"><i class=" bi bi-chat-text "></i>&nbsp;&nbsp;&nbsp;Cuatomer Chats</a>
                                            <hr />
                                            <?php

                                            if ($notification2_data["seen"] == "1") {

                                            ?>
                                                <a class="nav-link text-start text-white fw-bold border-bottom " href="#offcanvasScrolling" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i class="bi bi-gear "></i>&nbsp;&nbsp;&nbsp;Notification&nbsp;&nbsp;&nbsp;<i class="bi bi-circle-fill  text-warning text-end" style="font-size: 12px;"></i></a>
                                            <?php

                                            } else if ($notification2_data["seen"] == "2") {
                                            ?>
                                                <a class="nav-link text-start text-white fw-bold border-bottom " href="#offcanvasScrolling" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i class="bi bi-gear "></i>&nbsp;&nbsp;&nbsp;Notification</a>
                                            <?php
                                            }else if($notification_num == 0){
                                                ?>
                                                <a class="nav-link text-start text-white fw-bold border-bottom " href="#offcanvasScrolling" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i class="bi bi-gear "></i>&nbsp;&nbsp;&nbsp;Notification</a>
                                            <?php
                                            }

                                            ?>

                                            <hr />
                                            <p class="nav-link text-start text-white fw-bold  border-bottom " style="cursor: pointer;" onclick="adminSignOut();"><i class="bi bi-arrow-bar-right "></i>&nbsp;&nbsp;&nbsp;Log Out</p>
                                            <hr />


                                        </nav>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!---menu - large only --->

                <div class="col-12 col-lg-10 vh-100 box3">
                    <div class="row mx-2">

                        <!---dashboard sm --->
                        <div class="col-12 d-block d-lg-none ">
                            <div class="row">
                                <div class="col-12">
                                    <label class="col-12 d-block d-lg-none text-light fs-1 fw-bold " data-bs-toggle="offcanvas" href="#offcanvasExample" type="button" aria-controls="offcanvasExample">
                                        <i class="bi bi-list link-light fs-1"></i>&nbsp;&nbsp; Dashboard

                                    </label>
                                </div>
                            </div>

                        </div>
                        <!---dashboard sm --->


                        <!---dashboard large --->
                        <span class="d-none d-lg-block fs-1 text-light fw-bolder mt-3 mb-3 mx-3">Dashboard</span>


                        <!---menu small (offcanvas) --->
                        <div class="offcanvas offcanvas-start bg-dark" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="width:300px ; height:600px;">
                            <div class="offcanvas-header bg-dark">
                                <h5 class="offcanvas-title" id="offcanvasExampleLabel"></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body bg-dark">
                                <div class="col-12 d-flex align-items-center  ">
                                    <div class="row  mx-1 mt-3 ">

                                        <nav class="nav flex-column ">
                                            <hr />

                                            <a class="nav-link text-start text-white fw-bold border-bottom " style="font: size 12px;" href="manageUsers.php"><i class="bi bi-people "></i>&nbsp;&nbsp;&nbsp;Manage Users</a>
                                            <hr />
                                            <a class="nav-link text-start text-white fw-bold border-bottom  " style="font: size 12px;" href="manageProduct.php"><i class="bi bi-bag-check-fill "></i>&nbsp;&nbsp;&nbsp;Manage Products</a>
                                            <hr />
                                            <a class="nav-link text-start text-white fw-bold  border-bottom " style="font: size 12px;" href="manageOrders.php"><i class="bi bi-journal-text "></i>&nbsp;&nbsp;&nbsp;Manage Sellings</a>
                                            <hr />
                                            <a class="nav-link text-start text-white fw-bold  border-bottom " style="font: size 12px;" href="adminMessage.php"><i class=" bi bi-chat-text "></i>&nbsp;&nbsp;&nbsp;Cuatomer Chats</a>
                                            <hr />
                                            <a class="nav-link text-start text-white fw-bold border-bottom  " style="font: size 12px;" href="#"><i class="bi bi-gear "></i>&nbsp;&nbsp;&nbsp;Notifications</a>
                                            <hr />
                                            <a class="nav-link text-start text-white fw-bold  border-bottom " style="font: size 12px;" href="#"><i class="bi bi-arrow-bar-right "></i>&nbsp;&nbsp;&nbsp;Log Out</a>
                                            <hr />

                                        </nav>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!---menu small (offcanvas) --->

                        <?php

                        $today = date("Y-m-d");
                        $thismonth = date("m");
                        $thisyear = date("Y");
                        $today1 = date("Y-m-d");
                        $thismonth1 = date("m");
                        $thisyear1 = date("Y");

                        $a = "0";
                        $b = "0";
                        $c = "0";
                        $e = "0";
                        $f = "0";
                        $g = "0";
                        $h = "0";
                        $i = "0";

                        $invoice_rs = Database::search("SELECT * FROM `invoice`");
                        $invoice_num = $invoice_rs->num_rows;

                        for ($x = 0; $x < $invoice_num; $x++) {
                            $invoice_data  = $invoice_rs->fetch_assoc();

                            $f = $f + $invoice_data["qty"]; //total qty

                            $d = $invoice_data["date"];
                            $splitDate = explode(" ", $d); //separate date from time
                            $pdate = $splitDate[0]; //selling date

                            if ($pdate == $today) {
                                $a = $a + $invoice_data["total"]; //total sellings of today
                                $c = $c + $invoice_data["qty"]; // sellings qty of today
                            }

                            $splitMonth = explode("-", $pdate); //separate date as year,month & date
                            $pyear = $splitMonth[0]; //year
                            $pmonth = $splitMonth[1]; //month

                            if ($pyear == $thisyear) {
                                if ($pmonth == $thismonth) {
                                    $b = $b + $invoice_data["total"];
                                    $e = $e + $invoice_data["qty"];
                                }
                            }


                            $ci_rs = Database::search("SELECT * FROM `cart_invoice` WHERE `order_id` = '" . $invoice_data["order_id"] . "'");
                            $ci_num = $ci_rs->num_rows;

                            for ($y = 0; $y < $ci_num; $y++) {

                                $ci_data = $ci_rs->fetch_assoc();


                                $g = $g + $ci_data["qty"];

                                $d1 = $ci_data["date"];
                                $splitDate1 = explode(" ", $d1); //separate date from time
                                $pdate1 = $splitDate1[0]; //selling date

                                if ($pdate1 == $today1) {

                                    $h = $h + $ci_data["qty"]; // sellings qty of today
                                }


                                $splitMonth1 = explode("-", $pdate1); //separate date as year,month & date
                                $pyear1 = $splitMonth1[0]; //year
                                $pmonth1 = $splitMonth1[1]; //month

                                if ($pyear1 == $thisyear1) {
                                    if ($pmonth1 == $thismonth1) {

                                        $i = $i + $ci_data["qty"];
                                    }
                                }
                            }
                        }


                        ?>




                        <div class="col-12">
                            <div class="row">

                                <!---category pie chart --->
                                <div class="col-6 d-block">
                                    <div class="row mt-5 mb-5">

                                        <div id="piechar1" style="height: 350px;"></div>


                                    </div>

                                </div>
                                <!---category pie chart --->

                                <!---package bar chart --->
                                <div class="col-6 d-block">
                                    <div class="row mt-5 mb-5">

                                        <div id="barchart1" style="height: 350px;"></div>


                                    </div>

                                </div>
                                <!---package bar chart --->

                                <div class="col-12">
                                    <div class="row ">


                                        <div class="col-12">
                                            <div class="row">

                                                <div class="col-6 col-lg-4 px-1 shadow">
                                                    <div class="row g-1">
                                                        <div class="col-12 text-white text-center rounded" style="height: 100px;">
                                                            <br />
                                                            <span class=" text-secondary">Monthly Earnings</span>
                                                            <br />


                                                            <span class="fs-5">Rs. <?php echo $b; ?> .00</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6 col-lg-4 px-1 shadow">
                                                    <div class="row g-1">
                                                        <div class="col-12  text-white text-center rounded" style="height: 100px;">
                                                            <br />
                                                            <span class="text-secondary">Today Earnings</span>
                                                            <br />
                                                            <span class="fs-5">Rs. <?php echo $a; ?> .00</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6 col-lg-4 px-1 shadow">
                                                    <div class="row g-1">
                                                        <div class="col-12 text-white text-center rounded" style="height: 100px;">
                                                            <br />
                                                            <span class=" text-secondary">Today Sellings</span>
                                                            <br />
                                                            <span class="fs-5"><?php echo $c + $h; ?> Items</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6 col-lg-4 px-1 shadow">
                                                    <div class="row g-1">
                                                        <div class="col-12  text-white text-center rounded" style="height: 100px;">
                                                            <br />
                                                            <span class="text-secondary">Monthly Sellings</span>
                                                            <br />
                                                            <span class="fs-5"><?php echo $e + $i; ?> Items</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6 col-lg-4 px-1 shadow">
                                                    <div class="row g-1">
                                                        <div class="col-12 text-white text-center rounded" style="height: 100px;">
                                                            <br />
                                                            <span class=" text-secondary">Total Sellings</span>
                                                            <br />
                                                            <span class="fs-5"><?php echo $f + $g; ?> Items</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6 col-lg-4 px-1 shadow">
                                                    <div class="row g-1">
                                                        <div class="col-12 text-white text-center rounded" style="height: 100px;">
                                                            <br />
                                                            <span class="fs-6 text-secondary">Registered Customers</span>
                                                            <br />

                                                            <?php
                                                            $user_rs = Database::search("SELECT * FROM `user` ");
                                                            $user_num = $user_rs->num_rows;
                                                            ?>

                                                            <span class="fs-5"><?php echo $user_num; ?> Users</span>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>



                                    </div>
                                </div>


                            </div>
                        </div>


                        <!---year drop dowm --->
                        <div class="col-1 offset-11">
                            <div class="row  mt-5">

                                <select class="form-select" aria-label="Default select example" id="year" onchange="changeYearA();">
                                    <option selected value="1">2024</option>
                                    <option value="2">2023</option>

                                </select>

                            </div>
                        </div>
                        <!---year drop dowm --->

                        <!---year earning chart 1 - div --->
                        <div class="col-12 d-block" id="year1">
                            <div class="row mt-5 mb-5">

                                <div id="curve_chart" style="height: 500px;"></div>


                            </div>
                        </div>
                        <!---year earning chart 1 - div --->

                        <!---year earning chart 2 - div --->
                        <div class="col-12 d-block" id="year2">
                            <div class="row mt-5 mb-5">

                                <div id="curve_chart2" style="height: 500px;"></div>


                            </div>
                        </div>
                        <!---year earning chart 2 - div --->



                    </div>
                </div>
            </div>
        </div>



        <!--notification offcanves large--->

        <div class="offcanvas offcanvas-start bg-dark " style="height: 100vh" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title text-light" id="offcanvasScrollingLabel">NOTIFICATIONS </h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close" onclick="window.location.reload()"></button>
            </div>
            <div class="offcanvas-body " style="overflow-x: hidden;">
                <div class="col-12">
                    <div class="row">

                        <?php

                        $notification_rs = Database::search("SELECT * FROM `notification` WHERE `usertype`='3' ORDER BY `date_time` DESC  ");
                        $notification_num = $notification_rs->num_rows;

                        if ($notification_num == 0) {

                        ?>

                            <!---empty view--->

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 mt-5">
                                        <div class="row text-center">
                                            <span class=" text-secondary"><i class="bi bi-envelope-exclamation fs-1"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-12 ">
                                        <div class="row text-center ">
                                            <span class="fs-4 text-secondary">No Notifications Found</span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row text-center ">
                                            <span class="text-secondary" style="font-size:12px ;">You have currently no notifications. We 'll notify you when something new arrives.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <!---empty view--->


                            <?php

                        } else {


                            for ($n = 0; $n < $notification_num; $n++) {
                                $notification_data = $notification_rs->fetch_assoc();

                                if ($notification_data["status"] == "4") {

                                    Database::iud("UPDATE `notification` SET `seen`='2' WHERE `usertype`='3' ");


                                    $in_rs = Database::search("SELECT * FROM `invoice` WHERE `id`='" . $notification_data["invoice_id"] . "'");
                                    $in_data = $in_rs->fetch_assoc();

                            ?>


                                    <!---notification status == 4  ( package eka diliver krla tiyenne )--->

                                    <div class="col-12 mb-1 mt-1 zoom1" style="background-color: rgb(46,46,46);overflow-y: scroll;">

                                        <div class="row">

                                            <div class="">
                                                <div class=" col-12 d-flex flex-row-reverse">
                                                    <span class=" text-secondary" style="font-size:10px ;"><?php echo $notification_data["user_email"]; ?></span>
                                                </div>
                                            </div>

                                            <div class="col-2 d-flex align-items-center">
                                                <img src="resources/no3.png" style="width: 60px;height:60px;" />
                                            </div>


                                            <div class="col-9 d-flex align-items-center">
                                                <span class="text-light" style="font-size:12px ;">Order id <b><?php echo $in_data["order_id"]; ?></b> has been successfuly deliverd.</span>
                                            </div>

                                            <div class="col-1 ">
                                                <i class="bi bi-trash3 text-danger " style="font-size:10px ;" onclick="deleteNotificationA('<?php echo $notification_data['id']; ?>');"></i>
                                            </div>



                                            <div class="">
                                                <div class=" col-12 d-flex flex-row-reverse">
                                                    <span class=" text-secondary" style="font-size:8px ;"><?php echo $notification_data["date_time"]; ?> </span>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <!---notification status == 4  ( package eka diliver krla tiyenne )--->

                                <?php
                                } else if ($notification_data["status"] == "6") {
                                    Database::iud("UPDATE `notification` SET `seen`='2' WHERE `usertype`='3' ");
                                ?>

                                    <!---notification status == 6  ( msg ekak avilla )--->
                                    <div class="col-12 mb-1 mt-1 zoom1" style="background-color: rgb(46,46,46) ;">

                                        <div class="row">

                                            <div class="">
                                                <div class=" col-12 d-flex flex-row-reverse">
                                                    <span class=" text-secondary" style="font-size:10px ;"><?php echo $notification_data["user_email"]; ?></span>
                                                </div>
                                            </div>

                                            <div class="col-2 d-flex align-items-center">
                                                <img src="resources/iconMsg.png" style="width: 60px;height:60px;" />
                                            </div>


                                            <div class="col-9 d-flex align-items-center">
                                                <span class="text-light" style="font-size:12px ;">Customer email <b><?php echo $notification_data["user_email"]; ?></b> has sent a message.</span>
                                            </div>

                                            <div class="col-1 ">
                                                <i class="bi bi-trash3 text-danger " style="font-size:10px ;" onclick="deleteNotificationA('<?php echo $notification_data['id']; ?>');"></i>
                                            </div>

                                            <div class="">
                                                <div class=" col-12 d-flex flex-row-reverse">
                                                    <span class=" text-secondary" style="font-size:8px ;"><?php echo $notification_data["date_time"]; ?> </span>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <!---notification status == 6  ( msg ekak avilla )--->
                        <?php
                                }
                            }
                        }



                        ?>




                    </div>
                </div>
            </div>
            <!--notification offcanves--->




            <script src="bootstrap.bundle.js"></script>
            <script src="script.js"></script>
    </body>

    </html>


<?php
} else {
    echo ("You are Not a Valid user");
}


?>