<?php

session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">


</head>

<body>
    <div class="col-12">
        <div class="row ">

           

            <div class="col-6 offset-6 offset-lg-0">
                <div class="row ustify-content-stat  mt-3 mb-3">

                    <?php
                    if (isset($_SESSION["u"])) {
                        $data = $_SESSION["u"];
                    ?>
                        <label class=" fw-bold" style="font-size:12px;"><i class="bi bi-person-circle text-dark"></i>&nbsp; User &nbsp;<?php echo $data["fname"]; ?> <?php echo $data["lname"]; ?></label>




                    <?php
                    } else {
                    ?>
                        <label class=" fw-bold" style="font-size:12px; cursor:pointer ;" onclick="window.location ='index.php'"><i class="bi bi-person-circle text-dark"></i>&nbsp; Sign In or Register</label>
                    <?php
                    }
                    ?>
                </div>
            </div>


            <div class="col-6 d-none d-lg-block  ">

                <div class="row justify-content-end  mt-3 mb-3">

                    <div class="col-2 d  ">
                        <div class="row border-end">
                            <div class="fw-bold text-center" style="font-size:12px; cursor:pointer ;" onclick="window.location ='home.php'">Home</div>
                        </div>

                    </div>

                    <div class="col-2 d ">
                        <div class="row ">
                            <span class="fw-bold text-center" style="font-size:12px; cursor:pointer ;" onclick="window.location = 'wishlist.php'">Wishlist</span>
                        </div>

                    </div>

                    <div class="col-2 d   border-start">
                        <div class="row ">
                            <span class="fw-bold text-center" style="font-size:12px; cursor:pointer ;" onclick="window.location = 'cart.php'">Cart</span>
                        </div>

                    </div>

                    <div class="col-2 d border-start ">
                        <div class="row ">
                            <span class="fw-bold text-center" style="font-size:12px; cursor:pointer ;" onclick="window.location = 'myOrder.php'">Orders</span>
                        </div>

                    </div>

                    <div class="col-2 d border-start ">
                        <div class="row ">
                            <span class="fw-bold text-center" style="font-size:12px; cursor:pointer ;" onclick="window.location = 'contact.php'">Help & Contact</span>
                        </div>

                    </div>


                    <div class="col-2 d border-start ">
                        <div class="row ">
                            <span class="fw-bold text-center" style="font-size:12px; cursor:pointer ;" onclick="signOut();">Log Out</span>
                        </div>

                    </div>

                </div>

            </div>
        </div>




    </div>
    </div>

    <hr class="border-warning mt-1 " />

    </div>
    </div>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>