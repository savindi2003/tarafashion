<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thara Fashion | User</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resources/icon logo yc.png" />


</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <?php include "header.php" ?>



            <?php require "connection.php";

            if (isset($_SESSION["u"])) {

                $email = $_SESSION["u"]["email"];

                $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");

                $img_rs = Database::search("SELECT * FROM `profile_img` WHERE `user_email` ='" . $email . "'");

                $address_rs = Database::search("SELECT * FROM `user_has_address` INNER JOIN `city` ON 
                user_has_address.city_id=city.id INNER JOIN `district` ON 
                city.district_id=district.id INNER JOIN `province` ON 
                district.province_id=province.id WHERE `user_email`='" . $email . "'");

                $user_data = $user_rs->fetch_assoc();
                $img_data = $img_rs->fetch_assoc();
                $address_data = $address_rs->fetch_assoc();

            ?>




                <div class="col-12 justify-content-center ">
                    <div class="row ">

                        <div class="col-12 bg-warning bg-opacity-10 ">
                            <div class="row mt-3 mb-3">

                                <div class="col-lg-3 col-12 bg-white mx-lg-5">
                                    <div class="row   ">
                                        

                                        <div class="col-12  text-center mt-5 mb-4">

                                            <?php

                                            if (empty($img_data["path"])) {
                                            ?>
                                                <img src="resources/b1.jpg" class="rounded rounded-circle" style="width: 150px; height:150px" id="viewImg" />
                                            <?php


                                            } else {
                                            ?>
                                                <img src="<?php echo $img_data["path"]; ?>" class="rounded rounded-circle" style="width: 150px; height:150px" id="viewImg" />
                                            <?php
                                            }


                                            ?>


                                            <br />
                                            <br />

                                            <span class="col-12 fs-5 mt-4"><?php echo $user_data["fname"] . " " . $user_data["lname"] ?></span><br />
                                            <span class="col-12 fs-6 mt-1 "><?php echo $user_data["email"]   ?></span><br />

                                            <input type="file" class="d-none" id="profileimg" accept="image/*" />
                                            <label for="profileimg" class="btn btn-warning btn-sm mt-5" style="border-radius:30px;" onclick="changeImage()"> Update Profile Image </label>
                                        </div>


                                    </div>
                                </div>

                                <div class="col-lg-8 col-12">
                                    <div class="row bg-white  mx-3">
                                        <label class="fw-bold fs-4 mt-4">User Info</label>
                                        <div class="col-12 col-lg-5 ">
                                            <label class="form-label ">First Name</label>
                                            <input type="text" class="form-control form-control-sm b1  " id="f" value="<?php echo $user_data["fname"]  ?>" />


                                        </div>
                                        <div class="col-12 col-lg-5">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" class="form-control form-control-sm b1" id="l" value="<?php echo $user_data["lname"]  ?>" />
                                        </div>
                                        <div class="col-12 col-lg-5 ">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control form-control-sm b1" id="e" value="<?php echo $user_data["email"]  ?>" disabled />
                                        </div>
                                        <div class="col-12 col-lg-5">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control form-control-sm b1" id="p" value="<?php echo $user_data["password"]  ?>" disabled />
                                        </div>
                                        <div class="col-12 col-lg-5">
                                            <label class="form-label">Mobile</label>
                                            <input type="text" class="form-control form-control-sm b1" id="m" value="<?php echo $user_data["mobile"]  ?>" />
                                        </div>
                                        <div class="col-12 col-lg-5">
                                            <label class="form-label">Registerd Date</label>
                                            <input type="text" class="form-control form-control-sm b1" id="j" value="<?php echo $user_data["join_date"]  ?>" disabled />
                                        </div>


                                       



                                        <div class="col-12">
                                            <div class="row ">
                                                <label class="fw-bold fs-4 mt-4">Shipping Address</label>
                                               




                                                <?php

                                            if (!empty($address_data["line1"])) {

                                            ?>
                                                <div class="col-12 col-lg-5">

                                                    <label class="form-label ">Address Line 1</label>
                                                    <input type="text" class="form-control form-control-sm b1  " id="li" value="<?php echo $address_data["line1"]   ?>" />


                                                </div>
                                            <?php

                                            } else {
                                            ?>
                                                <div class="col-12 col-lg-5">

                                                <label class="form-label ">Address Line 1</label>
                                                <input type="text" class="form-control form-control-sm b1  " id="li"  />


                                                </div>
                                                                                            
                                            <?php
                                            }
                                            if (!empty($address_data["line2"])) {

                                                ?>
                                                     <div class="col-12 col-lg-5">
                                                    <label class="form-label">Address Line 2</label>
                                                    <input type="text" class="form-control form-control-sm b1" id="l2" value="<?php echo $address_data["line2"]   ?>" />
                                                </div>
                                                <?php
    
                                                } else {
                                                ?>
                                                     <div class="col-12 col-lg-5">
                                                    <label class="form-label">Address Line 2</label>
                                                    <input type="text" class="form-control form-control-sm b1" id="l2" />
                                                </div>
                                            
                                 


                                                    <?php
                                                }
    
                                                $province_rs = Database::search("SELECT * FROM `province`");
                                                $district_rs = Database::search("SELECT * FROM `district`");
                                                ?>
    
                                                <div class="col-5">
                                                    <label class="form-label">Province</label>
                                                    <select class="form-select form-select-sm" id="pro" onchange="load_distric1();">
                                                        <option value="0">Select Province</option>
                                                        <?php
                                                        $province_num = $province_rs->num_rows;
                                                        for ($x = 0; $x < $province_num; $x++) {
                                                            $province_data = $province_rs->fetch_assoc();
                                                        ?>
                                                            <option value="<?php echo $province_data["id"]; ?>" <?php
                                                                                                                if (!empty($address_data["province_id"])) {
    
                                                                                                                    if ($province_data["id"] == $address_data["province_id"]) {
                                                                                                                ?>selected<?php
                                                                                                                        }
                                                                                                                    }
    
                                                                                                                            ?>><?php echo $province_data["name"]; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                           

                                                <div class="col-5">
                                                <label class="form-label">District</label>
                                                <select class="form-select form-select-sm" id="dis" onchange="load_city1();load_province2();load_city2();">
                                                    <option value="0">Select District</option>
                                                    <?php
                                                    $district_num = $district_rs->num_rows;
                                                    for ($x = 0; $x < $district_num; $x++) {
                                                        $district_data = $district_rs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $district_data["id"]; ?>" <?php
                                                                                                            if (!empty($address_data["district_id"])) {
                                                                                                                if ($district_data["id"] == $address_data["district_id"]) {
                                                                                                            ?>selected<?php
                                                                                                                    }
                                                                                                                }
                                                                                                                        ?>><?php echo $district_data["name"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>



                                                    


                                                <div class="col-5">
                                                <label class="form-label">City</label>
                                                <select class="form-select form-select-sm" id="ci" onchange="load_district2();load_province1();">
                                                    <option value="0">Select City</option>
                                                    <?php
                                                    $city_rs = Database::search("SELECT * FROM `city`");
                                                    $city_num = $city_rs->num_rows;
                                                    for ($x = 0; $x < $city_num; $x++) {
                                                        $city_data = $city_rs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $city_data["id"]; ?>" <?php
                                                                                                        if (!empty($address_data["city_id"])) {
                                                                                                            if ($city_data["id"] == $address_data["city_id"]) {
                                                                                                        ?>selected<?php
                                                                                                            }
                                                                                                        }
                                                                            ?>><?php echo $city_data["name"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

<?php
                                                        if (!empty($address_data["postal_code"])) {

                                                            ?>
    
                                                            
                                                    <div class="col-5">
                                                    <label class="form-label">Postal Code</label>
                                                    <input type="text" class="form-control form-control-sm b1" id="pc" value="<?php echo $address_data["postal_code"]   ?>" />
                                                </div>
                                                            <?php
        
                                                            } else {
                                                            ?>
                                                   
                                                   <div class="col-5">
                                                    <label class="form-label">Postal Code</label>
                                                    <input type="text" class="form-control form-control-sm b1" id="pc"  />
                                                </div>                                         
                                                            <?php
                                                            }

                                                            ?>




                                                
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button class=" col-4 col-lg-2 btn btn-sm btn-warning mt-4 mb-4 " style="border-radius:30px ;" onclick="updateProfile();">Save Changes</button>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>


                            </div>
                        </div>


                    </div>


                </div>


            <?php


            } else {
                echo "please login first";
            }

            ?>





            <?php include "footer.php" ?>

        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
    <script src="bootstrap.js"></script>




</body>

</html>