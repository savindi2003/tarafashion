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

    <div class="container-fluid  d-flex justify-content-center vh-100 ">
        <div class="row align-content-center">
       

            <div class="col-lg-6 offset-lg-3 col-12" >
                <div class="row border">

                    <div class="col-12">
                        <div class="row justify-content-center mt-5">
                            <img src="resources/logo1.jpg" style="width:300px ;" />
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row">

                            <div class="col-12">
                                <div class="row mt-5 mb-5">
                                    <span class="fs-3 text-center fw-bold">Admins Sign In</span>
                                </div>
                            </div>


                           
                            <div class="col-12">
                                <div class="row justify-content-center mt-4 ">
                                  
                                    <div class="col-12 col-lg-10 ">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control form-control-sm b1" id="admin_e" style="border-radius:30px ;" />
                                    </div>
                                   





                                    <div class="col-12 col-lg-5 d-grid mt-4 mb-5">
                                        <button class="btn btn-warning btn-sm "  style="border-radius:30px ;" onclick="admin_verify_email();">Verify Email</button>
                                    </div>
                                    <div class="col-12 col-lg-5 d-grid mt-4 mb-5">
                                        <button class="btn btn-danger btn-sm"  style="border-radius:30px ;" onclick="window.location='index.php';">Back to customer Log in</button>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

            <div class="col-12 fixed-bottom d-none d-lg-block">
                <p class="text-center">&copy; 2022 TharaFashionStore || All Right Reserved</p>
            </div>
            </div>
    </div>
    <script src="script.js"></script>
</body>

</html>