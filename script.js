function changeView() {

    var signUpBox = document.getElementById("signUpBox");
    var signInBox = document.getElementById("signInBox");

    signUpBox.classList.toggle("d-none");
    signInBox.classList.toggle("d-none");

}

function signUp() {

    var f = document.getElementById("fn");
    var l = document.getElementById("ln");
    var e = document.getElementById("em");
    var p = document.getElementById("pw");


    var form = new FormData;
    form.append("f", f.value);
    form.append("l", l.value);
    form.append("e", e.value);
    form.append("p", p.value);



    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var text = request.responseText;
            if (text == "success") {
                changeView();

            } else {
                document.getElementById("alertmsg").innerHTML = text;
                document.getElementById("msgdiv").className = "d-block";
            }
        }
    }

    request.open("POST", "signUpProcess.php", true);
    request.send(form);

}

function signIn() {

    var email = document.getElementById("e1");
    var password = document.getElementById("p1");
    var rememberme = document.getElementById("rememberme");



    var f = new FormData();
    f.append("e", email.value);
    f.append("p", password.value);
    f.append("r", rememberme.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "home.php";
            } else {
                document.getElementById("alertmsg2").innerHTML = t;
                document.getElementById("msgdiv1").className = "d-block";

            }
        }
    };

    r.open("POST", "signInProcess.php", true);
    r.send(f);
}




function signOut() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                window.location = "home.php";
                alert("Sign out Success")

            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "signoutprocess.php", true);
    r.send();
}


function forgotPwView() {

    var box1 = document.getElementById("box1");
    var box2 = document.getElementById("box2");


    box1.classList.toggle("d-none");
    box2.classList.toggle("d-none");


}

function forgotPassword() {
    var email = document.getElementById("email2");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                alert("Verification code has sent your email. Please check your inbox");


            } else {
                alert(t);
            }
        }
    }


    r.open("GET", "forgotPasswordProcess.php?e=" + email.value, true);
    r.send();
}

function verify() {
    var vcode = document.getElementById("vcode");

    var f = new FormData();
    f.append("vcode", vcode.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "forgotPassword2.php";


            } else {
                alert(t);
            }
        }
    };


    r.open("POST", "passwordVerifyProcess.php", true);
    r.send(f);
}

function changePW() {
    var pw1 = document.getElementById("pw1");
    var pw2 = document.getElementById("pw2");

    var f = new FormData();
    f.append("pw1", pw1.value);
    f.append("pw2", pw2.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {

            var t = r.responseText;
            if (t == "success") {
                alert("Password Change Success");
                window.location = "index.php";





            } else {
                alert(t);
            }
        }
    };



    r.open("POST", "resetPassword.php", true);
    r.send(f);
}


function admin_verify_email() {
    var admin = document.getElementById("admin_e");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                alert("Verification code has sent your email. Please check your inbox");
                window.location = "adminVerification.php";

            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "adminEmailVerifyProcess.php?a_e=" + admin.value, true);
    r.send();

}

function adminSignIn() {
    var verification = document.getElementById("a_vcode");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "adminPanel.php";
            } else {
                alert(t);
            }

        }
    }

    r.open("GET", "verificationProcess.php?v=" + verification.value, true);
    r.send();
}





function changeImage() {
    var view = document.getElementById("viewImg");
    var file = document.getElementById("profileimg");

    file.onchange = function() {
        var file2 = this.files[0];
        var url = window.URL.createObjectURL(file2);
        view.src = url;
    }
}


function updateProfile() {
    var fname = document.getElementById("f");
    var lname = document.getElementById("l");
    var mobile = document.getElementById("m");
    var line1 = document.getElementById("li");
    var line2 = document.getElementById("l2");
    var province = document.getElementById("pro");
    var district = document.getElementById("dis");
    var city = document.getElementById("ci");
    var pcode = document.getElementById("pc");
    var image = document.getElementById("profileimg");

    var f = new FormData();
    f.append("fn", fname.value);
    f.append("ln", lname.value);
    f.append("m", mobile.value);
    f.append("l1", line1.value);
    f.append("l2", line2.value);
    f.append("p", province.value);
    f.append("d", district.value);
    f.append("c", city.value);
    f.append("pc", pcode.value);

    if (image.files.length == 0) {
        var confirmation = confirm("Are you sure you dont want to update profile image?");
        if (confirmation) {
            alert("you have not selected any image");
        }
    } else {
        f.append("image", image.files[0]);
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            alert(t);
            window.location.reload();


        }
    }


    r.open("POST", "updateProfileProcess.php", true);
    r.send(f);
}

function sort1(x) {
    var search = document.getElementById("s");

    var time = "0";

    if (document.getElementById("n").checked) {
        time = "1";
    } else if (document.getElementById("o").checked) {
        time = "2";
    }
    var qty = "0";
    if (document.getElementById("h").checked) {
        qty = "1";
    } else if (document.getElementById("l").checked) {
        qty = "2";
    }
    var price = "0";
    if (document.getElementById("z").checked) {
        price = "1";
    } else if (document.getElementById("y").checked) {
        price = "2";
    }
    // Category data
    var frocks = "0";

    if (document.getElementById("1").checked) {
        frocks = "1";
    }

    var tops = "0";
    if (document.getElementById("2").checked) {
        tops = "1";
    }

    var pants = "0";
    if (document.getElementById("3").checked) {
        pants = "1";
    }
    var skirt = "0";
    if (document.getElementById("4").checked) {
        skirt = "1";
    }
    var tshirt = "0";
    if (document.getElementById("5").checked) {
        tshirt = "1";
    }
    var trous = "0";
    if (document.getElementById("6").checked) {
        trous = "1";
    }
    var shirt = "0";
    if (document.getElementById("7").checked) {
        shirt = "1";
    }





    var f = new FormData();

    f.append("s", search.value);
    f.append("t", time);
    f.append("q", qty);
    f.append("p", price);
    f.append("page", x);
    f.append("frock", frocks);
    f.append("tops", tops);
    f.append("pants", pants);
    f.append("skirt", skirt);
    f.append("tshirt", tshirt);
    f.append("trou", trous);
    f.append("shirt", shirt);



    var r = new XMLHttpRequest();


    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            document.getElementById("sort").innerHTML = t;
        }
    }

    r.open("POST", "sortProcess.php", true);
    r.send(f);


}

function changeProductImage() {
    var image = document.getElementById("imageuploader");

    image.onchange = function() {

        var file_count = image.files.length;

        if (file_count <= 3) {

            for (x = 0; x < file_count; x++) {
                var file3 = this.files[x];
                var url = window.URL.createObjectURL(file3);

                document.getElementById("i" + x).src = url;
            }
        } else {
            alert("Plese select 3 or less than 3 images.")
        }
    }
}

function addProduct() {
    var collection = document.getElementById("collection");
    var category = document.getElementById("category");
    var size = document.getElementById("size");
    var material = document.getElementById("material");
    var type = document.getElementById("type");
    var title = document.getElementById("title");
    var color = document.getElementById("color");
    var color_in = document.getElementById("addcolor");
    var qty = document.getElementById("qty");
    var price = document.getElementById("cost");
    var dfw = document.getElementById("dw");
    var dfo = document.getElementById("do");
    var desc = document.getElementById("desc");
    var img = document.getElementById("imageuploader");


    var f = new FormData();

    f.append("collec", collection.value);
    f.append("category", category.value);
    f.append("size", size.value);
    f.append("material", material.value);
    f.append("type", type.value);
    f.append("title", title.value);
    f.append("color", color.value);
    f.append("color_in", color_in.value);
    f.append("qty", qty.value);
    f.append("price", price.value);
    f.append("dfw", dfw.value);
    f.append("dfo", dfo.value);
    f.append("desc", desc.value);


    var file_count1 = img.files.length;

    for (var x = 0; x < file_count1; x++) {
        f.append("image" + x, img.files[x]);
    }





    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            alert(t);



        }
    }

    r.open("POST", "addProductProcess.php", true);
    r.send(f);



}

var up;

function sendId(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                var updateModel = document.getElementById("updateProductModel");
                var up = new bootstrap.Modal(updateModel);
                up.show();

            } else {
                alert(t);
            }
        }
    }
    r.open("GET", "sendProductIdProcess.php?id=" + id, true);
    r.send();
}




function updateProduct() {
    var title = document.getElementById("t");
    var qty = document.getElementById("q");
    var dw = document.getElementById("dw");
    var dfo = document.getElementById("do");
    var desc = document.getElementById("des");
    var images = document.getElementById("imageuploader");

    var f = new FormData();
    f.append("t", title.value);
    f.append("q", qty.value);
    f.append("dw", dw.value);
    f.append("dfo", dfo.value);
    f.append("desc", desc.value);

    var img_count1 = images.files.length;

    for (var x = 0; x < img_count1; x++) {
        f.append("i" + x, images.files[x]);
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var t = r.responseText;
            alert(t);


        }
    }


    r.open("POST", "updateProcess.php", true);
    r.send(f);
}

function changeStatus(id) {

    var product_id = id;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "deactivated") {

                alert("Product Deactivated");
                window.location.reload();

            } else if (t == "activated") {

                alert("Product Activated");
                window.location.reload();

            } else {
                alert(t);
            }

        }
    }

    r.open("GET", "changeStatusProcess.php?p=" + product_id, true);
    r.send();

}

function search1(x) {

    var text = document.getElementById("search_text");

    var f = new FormData();
    f.append("t", text.value);
    f.append("page", x);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("searchResult").innerHTML = t;
        }
    }

    r.open("POST", "SearchProcess.php", true);
    r.send(f);
}

function search2(id) {
    var text2 = document.getElementById("text2");

    var category = "0";

    if (document.getElementById("l1").checked) {
        category = "1";
    } else if (document.getElementById("l2").checked) {
        category = "2";
    } else if (document.getElementById("l3").checked) {
        category = "3";
    } else if (document.getElementById("l4").checked) {
        category = "4";
    }

    var color = "0";

    if (document.getElementById("b").checked) {
        color = "1";
    } else if (document.getElementById("w").checked) {
        color = "2";
    } else if (document.getElementById("r").checked) {
        color = "3";
    } else if (document.getElementById("bl").checked) {
        color = "4";
    } else if (document.getElementById("y").checked) {
        color = "5";
    } else if (document.getElementById("g").checked) {
        color = "6";
    } else if (document.getElementById("m").checked) {
        color = "8";
    }

    var size = "0";

    if (document.getElementById("small").checked) {
        size = "1";
    } else if (document.getElementById("medium").checked) {
        size = "2";
    } else if (document.getElementById("large").checked) {
        size = "3";
    } else if (document.getElementById("xl").checked) {
        size = "4";
    }

    var type = "0";

    if (document.getElementById("offi").checked) {
        type = "1";
    } else if (document.getElementById("cas").checked) {
        type = "2";
    } else if (document.getElementById("par").checked) {
        type = "3";
    }

    var material = "0";

    if (document.getElementById("cotton").checked) {
        material = "1";
    } else if (document.getElementById("lin").checked) {
        material = "2";
    } else if (document.getElementById("vis").checked) {
        material = "3";
    } else if (document.getElementById("jer").checked) {
        material = "4";
    } else if (document.getElementById("bor").checked) {
        material = "5";
    } else if (document.getElementById("deni").checked) {
        material = "6";
    } else if (document.getElementById("non").checked) {
        material = "7";
    }


    var f = new FormData();
    f.append("t2", text2.value);
    f.append("cat", category);
    f.append("col", color);
    f.append("cid", id);
    f.append("size", size);
    f.append("type", type);
    f.append("mat", material);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("searchResult2").innerHTML = t;
        }
    }

    r.open("POST", "SearchProcess2.php", true);
    r.send(f);
}

function addToWishlist(id) {
    var r = new XMLHttpRequest();


    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "removed") {
                document.getElementById("heart" + id).style.className = "text-dark";
                window.location.reload();
            } else if (t == "added") {
                document.getElementById("heart" + id).style.className = "text-danger";
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }


    r.open("GET", "addToWatchlistProcess.php?id=" + id, true);
    r.send();
}

function removeFromWatchlist(id) {


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "removeWatchlistProcess.php?id=" + id, true);
    r.send();

}

function addToCart(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            alert(t);
        }
    }

    r.open("GET", "addToCartProcess.php?id=" + id, true);
    r.send();

}

function checkValue(qty, id) {
    var input = document.getElementById("qty_input" + id);

    if (input.value <= 0) {
        alert("Quantity must be 1 or more");
        input.value = 1;
    } else if (input.value > qty) {
        alert("Maximum quantity achieved");
        input.value = qty;
    }
}

function qty_inc(qty, id) {
    var input = document.getElementById("qty_input" + id);




    if (input.value < qty) {

        var newValue = parseInt(input.value) + 1;
        input.value = newValue.toString();

        var f = new FormData();
        f.append("qty", input.value);
        f.append("pid", id);

        var r = new XMLHttpRequest();

        r.onreadystatechange = function() {
            if (r.readyState == 4) {
                var t = r.responseText;
                if (t == "success") {
                    window.location.reload();
                } else {
                    alert("no");
                }

            }
        }


    } else {
        alert("Maximum quantity has achieved");
        input.value = qty;
    }


    r.open("POST", "changeCartQtyProcess.php", true);
    r.send(f);
}

function qty_dec(qty, id) {
    var input = document.getElementById("qty_input" + id);
    if (input.value > 1) {
        var newValue = parseInt(input.value) - 1;
        input.value = newValue.toString();


        var f = new FormData();
        f.append("qty", input.value);
        f.append("pid", id);

        var r = new XMLHttpRequest();

        r.onreadystatechange = function() {
            if (r.readyState == 4) {
                var t = r.responseText;
                if (t == "success") {
                    window.location.reload();
                } else {
                    alert("no");
                }

            }
        }
    } else {
        alert("Mimum quantity has achieved");
        input.value = 1;
    }

    r.open("POST", "changeCartQtyProcess.php", true);
    r.send(f);
}

function deleteFromCart(id) {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                alert("Product removed from cart");
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "deleteFromCartProcess.php?id=" + id, true);
    r.send();
}

function payNow(id) {
    var qty = document.getElementById("qty_input").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            var obj = JSON.parse(t);

            var mail = obj["mail"];
            var amount = obj["amount"];

            if (t == "1") {
                alert("Please log in or sign up");
                window.location = "index.php";
            } else if (t == "2") {
                alert("Please update your profile first");
                window.location = "userProfile.php";
            } else {
                // Payment completed. It can be a successful failure.
                payhere.onCompleted = function onCompleted(orderId) {
                    console.log("Payment completed. OrderID:" + orderId);



                    saveInvoice(orderId, id, mail, amount, qty);


                    // Note: validate the payment and show success or failure page to the customer
                };

                // Payment window closed
                payhere.onDismissed = function onDismissed() {
                    // Note: Prompt user to pay again or show an error page
                    console.log("Payment dismissed");
                };

                // Error occurred
                payhere.onError = function onError(error) {
                    // Note: show an error page
                    console.log("Error:" + error);
                };

                // Put the payment variables here
                var payment = {
                    "sandbox": true,
                    "merchant_id": "1221148", // Replace your Merchant ID
                    "return_url": "http://localhost/eshopf/singleProductView.php?id" + id, // Important
                    "cancel_url": "http://localhost/eshopf/singleProductView.php?id" + id, // Important
                    "notify_url": "http://sample.com/notify",
                    "order_id": obj["id"],
                    "items": obj["item"],
                    "amount": amount,
                    "currency": "LKR",
                    "hash": obj["hash"],
                    "first_name": obj["fname"],
                    "last_name": obj["lname"],
                    "email": mail,
                    "phone": obj["mobile"],
                    "address": obj["address"],
                    "city": obj["city"],
                    "country": "Sri Lanka",
                    "delivery_address": obj["address"],
                    "delivery_city": obj["city"],
                    "delivery_country": "Sri Lanka",
                    "custom_1": "",
                    "custom_2": ""
                };

                // Show the payhere.js popup, when "PayHere Pay" is clicked
                // document.getElementById('payhere-payment').onclick = function (e) {
                payhere.startPayment(payment);
                // };
            }

        }
    }

    r.open("GET", "buyNowProcess.php?id=" + id + "&qty=" + qty, true)
    r.send();

}

function checknow(id) {

    var checkbox = document.getElementById("cartCheck");

    var f = new FormData();
    f.append("c", checkbox);
    f.append("id", id);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            window.location.reload();


        }
    }

    r.open("POST", "checkCartProductProcess.php", true)
    r.send(f);
}



function checkout() {

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
            if (r.readyState == 4) {
                var t = r.responseText;
                var obj = JSON.parse(t);

                var mail = obj["email"];
                var amount = obj["amount"];
                var Shipping = obj["shipping"];


                if (t == "1") {
                    alert("Please log in or sign up");
                    window.location = "index.php";

                } else {

                    // Called when user completed the payment. It can be a successful payment or failure
                    payhere.onCompleted = function onCompleted(orderId) {
                        console.log("Payment completed. OrderID:" + orderId);

                        saveInvoice1(orderId, mail, amount, Shipping);

                        //Note: validate the payment and show success or failure page to the customer

                    };

                    // Called when user closes the payment without completing
                    payhere.onDismissed = function onDismissed() {
                        //Note: Prompt user to pay again or show an error page
                        console.log("Payment dismissed");
                    };

                    // Called when error happens when initializing payment such as invalid parameters
                    payhere.onError = function onError(error) {
                        // Note: show an error page
                        console.log("Error:" + error);
                    };

                    // Put the payment variables here
                    var payment = {
                        "sandbox": true,
                        "merchant_id": "1221148", // Replace your Merchant ID
                        "return_url": "http://localhost/tharafashion/cart.php", // Important
                        "cancel_url": "http://localhost/tharafashion/cart.php", // Important
                        "notify_url": "http://sample.com/notify",
                        "order_id": obj["id"],
                        "items": "Cart All Products",
                        "amount": amount,
                        "currency": "LKR",
                        "hash": obj["hash"],
                        "first_name": obj["fname"],
                        "last_name": obj["lname"],
                        "email": mail,
                        "phone": obj["mobile"],
                        "address": obj["address"],
                        "city": obj["city"],
                        "country": "Sri Lanka",
                        "delivery_address": obj["address"],
                        "delivery_city": obj["city"],
                        "delivery_country": "Sri Lanka",
                        "custom_1": "",
                        "custom_2": ""
                    };

                    // Show the payhere.js popup, when "PayHere Pay" is clicked
                    // document.getElementById('payhere-payment').onclick = function(e) {
                    payhere.startPayment(payment);
                    // };

                }

            }

        }
        // }
    r.open("GET", "checkoutprocess.php", true);
    r.send();
}

function saveInvoice1(orderId, mail, amount, Shipping) { //cart invoice

    var o_id = orderId;
    var email = mail;
    var amount = amount;
    var ship = Shipping

    var f = new FormData();
    f.append("o", o_id);
    f.append("m", email);
    f.append("a", amount);
    f.append("f", ship);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "1") {
                alert("done")
            } else {

                window.location = "cartInvoice.php?id=" + orderId;
            }

        }

    }
    r.open("POST", "saveInvoice2.php", true);
    r.send(f);
}

function saveInvoice(orderId, id, mail, amount, qty) {

    var f = new FormData();
    f.append("o", orderId);
    f.append("i", id);
    f.append("m", mail);
    f.append("a", amount);
    f.append("q", qty);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "1") {
                window.location = "invoice.php?id=" + orderId;
            } else {
                alert(t);
            }



        }
    }

    r.open("POST", "saveInvoice.php", true);
    r.send(f);

}



function printInvoice() {
    var body = document.body.innerHTML;
    var page = document.getElementById("page").innerHTML;
    document.body.innerHTML = page;
    window.print();
    document.body.innerHTML = body;
}

function searchProduct() {
    var st = document.getElementById("st");


    var f = new FormData();
    f.append("st", st.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("view_area2").innerHTML = t;
        }
    }

    r.open("POST", "searchStock.php", true);
    r.send(f);


}

function searchUser() {
    var us = document.getElementById("us");



    var f = new FormData();
    f.append("us", us.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("view_area3").innerHTML = t;
        }
    }

    r.open("POST", "searchUser.php", true);
    r.send(f);


}

function searchFeedback() {

    var sf = document.getElementById("sf");



    var f = new FormData();
    f.append("sf", sf.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("view_area4").innerHTML = t;
        }
    }

    r.open("POST", "searchFeedback.php", true);
    r.send(f);


}

function searchSellings() {

    var ss = document.getElementById("ss");



    var f = new FormData();
    f.append("ss", ss.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("view5").innerHTML = t;
        }
    }

    r.open("POST", "searchSellings.php", true);
    r.send(f);
}

function searchOrder() {

    var os = document.getElementById("os");



    var f = new FormData();
    f.append("os", os.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("view_area6").innerHTML = t;
        }
    }

    r.open("POST", "searchOrder.php", true);
    r.send(f);
}

function findSellings1() {

    var from = document.getElementById("from").value;
    var to = document.getElementById("to").value;


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("view_area6").innerHTML = t;
        }
    }

    r.open("GET", "findSellingsProcess1.php?f=" + from + "&t=" + to, true);
    r.send();


}

function findSellings2() {

    var from = document.getElementById("from").value;
    var to = document.getElementById("to").value;


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            document.getElementById("view5").innerHTML = t;


        }
    }

    r.open("GET", "findSellingsProcess2.php?f=" + from + "&t=" + to, true);
    r.send();

}



function block(email) {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "blocked") {
                document.getElementById("ub" + email).innerHTML = "Unblock";
                document.getElementById("ub" + email).classList = " btn  btn-warning btn-sm";
            } else if (t == "unblocked") {
                document.getElementById("ub" + email).innerHTML = "Block";
                document.getElementById("ub" + email).classList = " btn   btn-danger btn-sm";
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "userBlockProcess.php?email=" + email, true);
    r.send();
}

function changeInvoiceStatus(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == 1) {
                document.getElementById("btn" + id).innerHTML = "Packing...";

            } else if (t == 2) {
                document.getElementById("btn" + id).innerHTML = "Dispatch";

            } else if (t == 3) {
                document.getElementById("btn" + id).innerHTML = "Shipping";

            } else if (t == 4) {
                document.getElementById("btn" + id).innerHTML = "Delivered";

            }
        }
    }

    r.open("GET", "changeInvoiceStatusProcess.php?id=" + id, true);
    r.send();
}


var om;

function orderModel(id) {
    var m = document.getElementById("viewOrderModel" + id);
    om = new bootstrap.Modal(m);
    om.show();

}

function confirmOrder(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == 4) {
                alert("Thank you for shopping at Thara Fashion Store. You can return the order within 7 days at this time. Bellow add your reviews ");
                window.location.reload();
            }
        }
    }

    r.open("GET", "confirmOrderProcess.php?id=" + id, true);
    r.send();


}

var fmo;

function feedback(id) {
    var m = document.getElementById("feedback" + id);
    fmo = new bootstrap.Modal(m);
    fmo.show();


}

function savefeedback(id) {

    var feedback = document.getElementById("feedbacktext");


    var f = new FormData();
    f.append("pid", id);
    f.append("feed", feedback.value);



    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "1") {
                alert("feedback added");
                fmo.hide();
            } else {
                alert(t);
            }
        }
    }


    r.open("POST", "saveFeedbackProcess.php", true);
    r.send(f);

}

var rpm;

function viewReviewProduct(id) {

    var m = document.getElementById("ReviewProduct" + id);
    rpm = new bootstrap.Modal(m);
    rpm.show();



}

function sort_R2(x) {
    var search = document.getElementById("s");

    var time = "0";

    if (document.getElementById("n").checked) {
        time = "1";
    } else if (document.getElementById("o").checked) {
        time = "2";
    }
    var qty = "0";
    if (document.getElementById("h").checked) {
        qty = "1";
    } else if (document.getElementById("l").checked) {
        qty = "2";
    }
    var price = "0";
    if (document.getElementById("z").checked) {
        price = "1";
    } else if (document.getElementById("y").checked) {
        price = "2";
    }
    // Category data
    var frocks = "0";

    if (document.getElementById("1").checked) {
        frocks = "1";
    }

    var tops = "0";
    if (document.getElementById("2").checked) {
        tops = "1";
    }

    var pants = "0";
    if (document.getElementById("3").checked) {
        pants = "1";
    }
    var skirt = "0";
    if (document.getElementById("4").checked) {
        skirt = "1";
    }
    var tshirt = "0";
    if (document.getElementById("5").checked) {
        tshirt = "1";
    }
    var trous = "0";
    if (document.getElementById("6").checked) {
        trous = "1";
    }
    var shirt = "0";
    if (document.getElementById("7").checked) {
        shirt = "1";
    }





    var f = new FormData();

    f.append("s", search.value);
    f.append("t", time);
    f.append("q", qty);
    f.append("p", price);
    f.append("page", x);
    f.append("frock", frocks);
    f.append("tops", tops);
    f.append("pants", pants);
    f.append("skirt", skirt);
    f.append("tshirt", tshirt);
    f.append("trou", trous);
    f.append("shirt", shirt);



    var r = new XMLHttpRequest();


    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            document.getElementById("sort").innerHTML = t;
        }
    }

    r.open("POST", "sortReviewProcess.php", true);
    r.send(f);


}

function changefeedbackstatus2(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "0") {

                alert("Customer feedback removed");
                window.location.reload();
                document.getElementById("fbb" + id).className = "bi bi-plus-circle text-warning";




            } else if (t == "1") {
                alert("Customer feedback added back");
                window.location.reload();
                document.getElementById("fbb" + id).className = "bi bi-x-circle text-danger";

            }
        }

    }



    r.open("GET", "changeFeedbackStatus.php?id=" + id, true);
    r.send();


}


function changefeedbackstatus(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "0") {
                document.getElementById("fbb" + id).innerHTML = "Add";
                document.getElementById("fbb" + id).classList = "badge rounded-pill text-bg-warning text-white d-flex p-2 d-flex align-items-center justify-content-center";
                window.location.reload();

            } else if (t == "1") {
                document.getElementById("fbb" + id).innerHTML = "Remove";
                document.getElementById("fbb" + id).classList = "badge rounded-pill text-bg-danger  d-flex p-2 d-flex align-items-center justify-content-center";
                window.location.reload();
            }
        }

    }



    r.open("GET", "changeFeedbackStatus.php?id=" + id, true);
    r.send();

}

var rm;

function OpenReviewModel(id) {

    var m = document.getElementById("ReviewModel" + id);
    rm = new bootstrap.Modal(m);
    rm.show();

}

var rm1;

function open2ndmodel(id) {
    var m = document.getElementById("ReviewModel" + id);
    rm1 = new bootstrap.Modal(m);

    rm1.show();


}






function viewUserMsgBox() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        var t = r.responseText;
        document.getElementById("normalview").innerHTML = t;


    }

    r.open("GET", "viewUserMsgBoxProcess.php", true);
    r.send();

}

function closeUserMsgBox() {

    window.location.reload();

}




function senMsg() {
    var txt = document.getElementById("u_m_txt").value;

    var f = new FormData();
    f.append("t", txt);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            viewUserMsgBox();

        }
    }

    r.open("POST", "sendAdminMsgProcess.php", true);
    r.send(f);

}



function senMsg(email) {

    var txt = document.getElementById("u_m_txt").value;

    var f = new FormData();
    f.append("t", txt);
    f.append("r", email);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "1") {
                viewUserMsgBox();

            } else if (t == "2") {

                viewMsgBox(email);
                viewUserMsgBox();

            } else {
                alert(t);

            }
        }
    }

    r.open("POST", "sendAdminMsgProcess.php", true);
    r.send(f);

}






function viewMsgBox(email) {

    var no = document.getElementById("no");

    var f = new FormData();
    f.append("no", no);
    f.append("em", email);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("msgBox").innerHTML = t;



        }
    }



    r.open("POST", "viewMsgBoxProcess.php", true);
    r.send(f);
}

function changeYearA() {
    var y = document.getElementById("year");


    if (y.value == 1) {

        document.getElementById("year1").classList = "col-12 d-block"; //2023
        document.getElementById("year2").classList = "col-12 d-none"; //2022
    } else if (y.value == 2) {

        document.getElementById("year1").classList = "col-12 d-none"; //2023
        document.getElementById("year2").classList = "col-12 d-block"; //2022

    }


}


function deleteNotificationA(id) {
    var no_id = id;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "done") {
                alert("Notification deleted")


            }
        }
    }

    r.open("GET", "removeAdminNotification.php?id=" + no_id, true);
    r.send();
}

function load_distric1() {
    var province = document.getElementById("pro").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            document.getElementById("dis").innerHTML = t;

        }
    }

    r.open("GET", "loadDistric.php?p=" + province, true);
    r.send();
}

function load_city1() {
    var dis = document.getElementById("dis").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            document.getElementById("ci").innerHTML = t;

        }
    }

    r.open("GET", "loadCity.php?d=" + dis, true);
    r.send();
}

function load_district2() {
    var city = document.getElementById("ci").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            document.getElementById("dis").innerHTML = t;

        }
    }

    r.open("GET", "loadDistrict2.php?c1=" + city, true);
    r.send();
}

function load_province1() {
    var city = document.getElementById("ci").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            document.getElementById("pro").innerHTML = t;

        }
    }

    r.open("GET", "loadProvince2.php?c1=" + city, true);
    r.send();
}

function load_province2() {
    var dis = document.getElementById("dis").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            document.getElementById("pro").innerHTML = t;

        }
    }

    r.open("GET", "loadProvince3.php?d=" + dis, true);
    r.send();
}

function checkValue1(qty) {
    var input = document.getElementById("qty_input");

    if (input.value <= 0) {
        alert("Quantity must be 1 or more");
        input.value = 1;
    } else if (input.value > qty) {
        alert("Maximum quantity achieved");
        input.value = qty;
    }
}

function qty_inc1(qty) {
    var input = document.getElementById("qty_input");
    if (input.value < qty) {
        var newValue = parseInt(input.value) + 1;
        input.value = newValue.toString();
    } else {
        alert("Maximum quantity has achieved");
        input.value = qty;
    }
}

function qty_dec1(qty) {
    var input = document.getElementById("qty_input");
    if (input.value > 1) {
        var newValue = parseInt(input.value) - 1;
        input.value = newValue.toString();
    } else {
        alert("Mimum quantity has achieved");
        input.value = 1;
    }
}

function cancelOrder(id) {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == 5) {
                alert("Your Order has canceled.  ");
                window.location.reload();
            }
        }
    }

    r.open("GET", "cancelOrderProcess.php?id=" + id, true);
    r.send();
}

function removeCanceledOrder(id) {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "done") {

                window.location.reload();
            }
        }
    }

    r.open("GET", "RemoveCancelOrderProcess.php?id=" + id, true);
    r.send();
}

function adminSignOut() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                window.location = "adminSignIn.php";
                alert("Sign out Success");

            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "AdminSignoutprocess.php", true);
    r.send();
}