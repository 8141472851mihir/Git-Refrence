<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <style>
        #login,
        #otp,
        #home,
        #b2 {
            display: none;
        }
    </style>

    <script>
        // $(document).ready(function() {
        //     $("body").load(function(){
        //         console.log("Body loaded");
        //     })
        // })

        $(function() {
            console.log("Document ready");
        });

        $(function() {
            $("#otp-show1").click(function() {
                $("#otp").show();
                $("#register").hide();
            })
        });

        $(function() {
            $("#login-show1").click(function() {
                $("#login").show();
                $("#register").hide();
            })
        });

        $(function() {
            $("#signup-show2").click(function() {
                $("#register").show();
                $("#login").hide();
            })
        });

        $(function() {
            $("#otp-show2").click(function() {
                $("#otp").show();
                $("#login").hide();
            })
        });

        $(function() {
            $("#home-show").click(function() {
                $("#home").show();
                $("#otp").hide();
            })
        });

        $(function() {
            $("#login-show2").click(function() {
                $("#login").show();
                $("#otp").hide();
            })
        });

        $(function(){
            $("#edit-pass").click(function(){
                $("#b2").show();
                $("#b1").hide();
            })
        });

        $(function(){
            $("#edit-pro").click(function(){
                $("#b1").show();
                $("#b2").hide();
            })
        });


    </script>

    <title>Document</title>
</head>

<body>

    <div class="container d-flex align-items-center justify-content-center">



        <div id="login" class="card shadow w-50 mt-3">
            <div class="card-title text-center">
                <h1>Login</h1>
            </div>
            <div class="card-body">
                <form action="#">
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="pwd" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
                    </div>
                    <div class="form-check mb-3">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="remember"> Remember me
                        </label>
                    </div>
                    <div class="d-flex justify-content-center mt-5">
                        <button id="signup-show2" type="submit" class="btn btn-primary me-3">Sign Up</button>
                        <button id="otp-show2" type="submit" class="btn btn-primary">OTP</button>
                    </div>
                </form>
            </div>
        </div>



        <div id="register" class=" shadow card w-50 mt-3">
            <div class="card-title text-center">
                <h1>Register</h1>
            </div>
            <div class="card-body">
                <form action="#">
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="name" class="form-control" id="name1" placeholder="Enter name" name="name">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="phone" class="form-label">Phone:</label>
                        <input type="phone" class="form-control" id="phone1" placeholder="Enter phone" name="phone">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email1" placeholder="Enter email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="pwd" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="pwd1" placeholder="Enter password" name="pswd">
                    </div>
                    <div class="form-check mb-3">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="remember"> Remember me
                        </label>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button id="otp-show1" type="submit" class="btn btn-primary me-5">OTP</button>
                        <button id="login-show1" type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>


        <div id="otp" class="card shadow w-50 mt-3">
            <div class="card-title text-center">
                <h1>OTP</h1>
            </div>
            <div class="card-body">
                <form action="#">
                    <div class="mb-3 mt-3">
                        <label for="otp" class="form-label">Enter Otp:</label>
                        <input type="password" class="form-control" id="otp" placeholder="Enter otp" name="otp">
                    </div>
                    <div class="d-flex justify-content-evenly mt-5">
                        <button id="login-show2" type="submit" class="btn btn-primary">Login</button>
                        <button id="home-show" type="submit" class="btn btn-primary">Home Page</button>
                    </div>
                </form>
            </div>
        </div>


        <!-- <div class="card shadow mt-3" id="home"> -->

        <!-- </div> -->


    </div>

    <div id="home" class="container border border-dark ">
        
        <div class="heading d-flex justify-content-around border-bottom mt-3 mb-5">
            <div class="mt-3">
                <!-- <h2>Edit profile</h2> -->
                 <button id="edit-pro" class="btn btn-light btn-lg">Edit Profile</button>
            </div>
            <div class="mt-3">
            <button id="edit-pass" class="btn btn-light btn-lg">Change password</button>
                <!-- <h2>Change password</h2> -->
            </div>
        </div>

        <div class="main mb-5">

            <div id="b1" class="body">
                <div class="row mb-5">
                    <h3>Edit profile</h3>
                    <div class="col-md-4">
                        <form action="#">
                            <div class="mb-3 mt-3">
                                <label for="name" class="form-label">FULL NAME:</label>
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="phone" class="form-label">MOBILE NUMBER:</label>
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="email" class="form-label">EMAIL:</label>
                            </div>
                            <div class="form-check form-switch">
                                <label class="form-check-label" for="mySwitch">SOS ALERTS</label>
                            </div>

                        </form>
                    </div>
                    <div class="col-md-8">
                        <form action="#">
                            <div class="mb-3 mt-3">
                                <input type="name" class="form-control" id="name3" placeholder="Enter name" name="name">
                            </div>
                            <div class="mb-3 mt-3">
                                <input type="phone" class="form-control" id="phone3" placeholder="Enter phone" name="phone">
                            </div>
                            <div class="mb-3 mt-3">
                                <input type="email" class="form-control" id="email1" placeholder="Enter email" name="email">
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="mySwitch" name="darkmode" value="yes" checked>
                            </div>
                        </form>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-dark mt-5 w-25 ">UPDATE DETAILS</button>
                    </div>
                </div>
            </div>

            <div id="b2" class="body">
                <div class="row mb-5">
                    <h3>Change password</h3>
                    <div class="col-md-4">
                        <form action="#">
                            <div class="mb-3 mt-3">
                                <label for="password" class="form-label">OLD PASSWORD:</label>
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="password" class="form-label">NEW PASSWORD:</label>
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="password" class="form-label">REPEAT PASSWORD:</label>
                            </div>
                            <div class="form-check form-switch">
                                <label class="form-check-label" for="mySwitch">REMEMBER ME</label>
                            </div>

                        </form>
                    </div>
                    <div class="col-md-8">
                        <form action="#">
                            <div class="mb-3 mt-3">
                                <input type="password" class="form-control" id="name3" placeholder="Enter Current Password" name="name">
                            </div>
                            <div class="mb-3 mt-3">
                                <input type="password" class="form-control" id="phone3" placeholder="Enter New Password" name="phone">
                            </div>
                            <div class="mb-3 mt-3">
                                <input type="password" class="form-control" id="email1" placeholder="Re-enter New Password" name="email">
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="mySwitch" name="darkmode" value="yes" checked>
                            </div>
                        </form>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-dark mt-5 w-25 ">UPDATE PASSWORD</button>
                    </div>
                </div>
            </div>

        </div>

    </div>

</body>

</html>