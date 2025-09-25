<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Your Choice</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resources/icon logo yc.png" />


</head>

<body>

<?php include "header.php"?>

    <div class="container-fluid  d-flex justify-content-center">

        <div class="row align-content-center">

       

            



            <div class="col-12 col-lg-6 offset-lg-3 " id="box1">
                <div class="row  mt-5 mb0-5 border"> 

                <div class="col-12">
                        <div class="row justify-content-center mt-5">
                            <img src="resources/logo1.jpg" style="width:300px ;" />
                        </div>
                    </div>
                   

                <label class="fs-3 fw-bold mb-5 mt-5 ">Change Password</label>

                <div class="col-12  mt-3">
                                <label class="form-label mb-3">Enter Your Email</label>
                                <input type="email" class="form-control form-control-sm b1"style="border-radius:30px ;" id="email2"/>
                            </div>

                            <div class="col-12 mb-1">
                                <div class="row justify-content-end">
                                <button class="btn btn-warning btn-sm mt-5 col-6 mx-3" style="border-radius:30px ;" onclick="forgotPassword();">Send Verification Code</button>
                                </div>    
                            </div>

                            <div class="col-12 mb-5">
                                <div class="row justify-content-end">
                                <button class="btn btn-outline-warning btn-sm mt-2 col-6 mx-3" style="border-radius:30px ;" onclick="forgotPwView();">Next</button>
                                </div>    
                            </div>
                           
                </div>
            </div>

            <div class="col-12 col-lg-6 offset-lg-3 d-none" id="box2">
                <div class="row  mt-5 mb0-5 border">

                <div class="col-12">
                        <div class="row justify-content-center mt-5">
                            <img src="resources/logo1.jpg" style="width:300px ;" />
                        </div>
                    </div>
                   

                <label class="fs-3 fw-bold mb-5 mt-5 ">Change Password</label>
        
                
                <div class="col-12  mt-3">
                                <label class="form-label mb-3">Enter Verification Code</label>
                                <input type="email" class="form-control form-control-sm b1"  style="border-radius:30px ;" id="vcode"/>
                            </div>

                            <div class="col-12 mb-5">
                                <div class="row justify-content-end">
                                <button class="btn btn-warning btn-sm mt-5 col-6 mx-3" style="border-radius:30px ;" onclick ="verify();">Verify</button>
                                </div>
                            </div>

                            
                           
                </div>
            </div>

     


        </div>
    </div>





    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>