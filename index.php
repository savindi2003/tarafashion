<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Thara Fashion | Sign in</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resources/logo1.jpg" />


</head>

<body>

<?php include "header1.php"; ?>

    <div class="container-fluid  d-flex justify-content-center vh-100 ">
        <div class="row ">
        
            <div class="col-lg-6 offset-lg-3 col-12 mt-3" id="signUpBox">
                <div class="row border">

                    <div class="col-12">
                        <div class="row justify-content-center mt-5">
                            <img src="resources/logo1.jpg" style="width:300px ;" />
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row">

                            <div class="col-12">
                                <div class="row mt-5">
                                    <span class="fs-3 text-center fw-bold">Sign Up</span>
                                </div>
                            </div>


                            <div class="col-sm-12 col-md-6 col-lg-6 d-none" id="msgdiv">
                                <p class="text-danger fw-bold" style="font-size:12px ;" id="alertmsg"></p>
                            </div>

                            <div class="col-12">
                                <div class="row justify-content-center mt-4">
                                    <div class="col-12 col-lg-5 ">
                                        <label class="form-label ">First Name</label>
                                        <input type="text" class="form-control form-control-sm b1  " id="fn" style="border-radius:30px ;" />


                                    </div>
                                    <div class="col-12 col-lg-5">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" class="form-control form-control-sm b1" id="ln" style="border-radius:30px ;" />
                                    </div>
                                    <div class="col-12 col-lg-10">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control form-control-sm b1" id="em" style="border-radius:30px ;" />
                                    </div>
                                    <div class="col-12 col-lg-10">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control form-control-sm b1" id="pw" style="border-radius:30px ;" />
                                    </div>





                                    <div class="col-12 col-lg-5 d-grid mt-4 mb-5">
                                        <button class="btn btn-warning btn-sm" onclick="signUp();" style="border-radius:30px ;">Sign Up</button>
                                    </div>
                                    <div class="col-12 col-lg-5 d-grid mt-4 mb-5">
                                        <button class="btn btn-danger btn-sm" onclick="changeView();" style="border-radius:30px ;">Already have an account?Sign In</button>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>


            <div class="col-12 col-lg-6 offset-lg-3 d-none mt-3" id="signInBox">
                <div class="row border">

                <div class="col-12">
                        <div class="row justify-content-center mt-5">
                            <img src="resources/logo1.jpg" style="width:300px ;" />
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row mt-5">
                            <span class="fs-3 text-center fw-bold">Sign In</span>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-6 d-none" id="msgdiv1">
                        <p class="text-danger fw-bold" style="font-size:12px ;" id="alertmsg2"></p>
                    </div>

                    <?php

                    $email = "";
                    $password = "";

                    if (isset($_COOKIE["email"])) {
                        $email = $_COOKIE["email"];
                    }

                    if (isset($_COOKIE["password"])) {
                        $password = $_COOKIE["password"];
                    }


                    ?>

                    <div class="col-12">
                        <div class="row justify-content-center mt-4">

                            <div class="col-12 col-lg-10">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control b1 form-control-sm" id="e1" value="<?php echo $email; ?>" style="border-radius:30px ;" />
                            </div>
                            <div class="col-12 col-lg-10">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control b1 form-control-sm" id="p1" value="<?php echo $password; ?>" style="border-radius:30px ;" />
                            </div>




                            <div class="col-5">
                                <div class="form-check">
                                    <input class="form-check-input c " type="checkbox" id="rememberme">
                                    <label class="form-check-label fs-6">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-5 text-end">
                                <a href="#" class="link-danger fs-6" onclick="window.location='forgotPassword.php';">Forgot Password?</a>
                            </div>
                            <div class="col-12 col-lg-5 d-grid mt-4 mb-5">
                                <button class="btn btn-warning btn-sm" onclick="signIn();" style="border-radius:30px ;">Sign In</button>
                            </div>
                            <div class="col-12 col-lg-5 d-grid mt-4 mb-5">
                                <button class="btn btn-danger btn-sm" onclick="changeView();" style="border-radius:30px ;">New to Your Choice?Join Now</button>
                            </div>

                        </div>
                    </div>

                </div>
            </div>


          



            <div class="col-12 fixed-bottom d-none d-lg-block">
                <p class="text-center">&copy; 2024 TharaFashionStore || All Right Reserved</p>
            </div>
            </div>

        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>