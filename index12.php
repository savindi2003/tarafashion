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

    <div class="container-fluid ">

        <div class="row">

            <div class="col-6 d-flex justify-content-center align-items-center">
                <div class="row">


                    <div class="col-12 mx-5 mt-5 mb-5 " id="signUpBox">
                        <div class="col-12  d-sm-block d-lg-none  bg_height"></div>
                        <div class="col-12 ">
                            <img src="resources/logo1.png" style="width:400px ;" />
                        </div>

                        <div class="row g-2 ">
                            <div class="col-12 mt-5 mb-3">
                                <p class="title2 mt-5">Create New Account</p>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-6 d-none" id="msgdiv" >
                                <p class="text-danger fw-bold" style="font-size:12px ;" id="alertmsg"></p>
                            </div>

                            <div class="col-12 col-lg-8 ">
                                <label class="form-label ">First Name</label>
                                <input type="text" class="form-control form-control-sm b1  " id="f" style="border-radius:30px ;"/>


                            </div>
                            <div class="col-12 col-lg-8">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control form-control-sm b1" id="l" style="border-radius:30px ;"/>
                            </div>
                            <div class="col-12 col-lg-8">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control form-control-sm b1" id="e" style="border-radius:30px ;" />
                            </div>
                            <div class="col-12 col-lg-8">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control form-control-sm b1" id="p" style="border-radius:30px ;"/>
                            </div>
                            <div class="col-12 col-lg-8">
                                <label class="form-label">Mobile</label>
                                <input type="text" class="form-control form-control-sm b1" id="m" style="border-radius:30px ;"/>
                            </div>
                            <div class="col-1"></div>

                            <div class="col-12 col-lg-4 d-grid">
                                <button class="btn btn-warning btn-sm" onclick="signUp();" style="border-radius:30px ;">Sign Up</button>
                            </div>
                            <div class="col-12 col-lg-4 d-grid ">
                                <button class="btn btn-danger btn-sm" onclick="changeView();" style="border-radius:30px ;">Already have an account?Sign In</button>
                            </div>
                        </div>

                    </div>






                    <div class="col-12  d-none mx-5 mt-5 mb-5 " id="signInBox">
                        <div class="col-12  d-sm-block d-lg-none background bg_height"></div>
                        <div class="row g-2">

                            <div class="col-12 ">
                                <img src="resources/logo1.png" style="width:400px ;" />
                            </div>

                            <div class="row g-2 ">
                                <div class="col-12 mt-5 mb-3">
                                    <p class="title2 mt-5">Sign In</p>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 d-none" id="msgdiv">
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


                                <div class="col-12 col-lg-10">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control b1" id="e1" value="<?php echo $email; ?>" style="border-radius:30px ;"/>
                                </div>
                                <div class="col-12 col-lg-10">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control b1 " id="p1" value="<?php echo $password; ?>" style="border-radius:30px ;"/>
                                </div>
                                <div class="col-5">
                                    <div class="form-check">
                                        <input class="form-check-input c " type="checkbox" id="rememberme">
                                        <label class="form-check-label ">Remember Me</label>
                                    </div>
                                </div>
                                <div class="col-5 text-end">
                                    <a href="#" class="link-danger" onclick="window.location='forgotPassword.php';">Forgot Password?</a>
                                </div>
                                <div class="col-12 col-lg-5 d-grid">
                                    <button class="btn btn-warning" onclick="signIn();">Sign In</button>
                                </div>
                                <div class="col-12 col-lg-5 d-grid">
                                    <button class="btn btn-danger" onclick="changeView();">New to Your Choice?Join Now</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

           

            </div>

        </div>
    </div>





    <script src="script.js"></script>
</body>

</html>