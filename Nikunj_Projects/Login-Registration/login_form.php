<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        #reg-form,
        #otp-form,
        #change-form,
        #second,
        #success-form {
            display: none;
        }
    </style>

    <script>
        $(document).ready(function() {
            // Show OTP form on submit button click
            $("#otp-btn").click(function(e) {
                e.preventDefault(); // Prevent form submission
                console.log("Submit clicked");

                // Hide login and registration forms
                $("#login-form").hide();
                $("#reg-form").hide();

                // Show OTP form
                $("#otp-form").show();
            });

            $("#registration").click(function() {
                $("#login-form").hide();
                $("#reg-form").show();
            });

            $("#login").click(function() {
                $("#reg-form").hide();
                $("#login-form").show();
            });

            $("#submit-btn").click(function() {
                $("#login-form").hide();

                $("#edit-form").show();
            })

            $("#change-btn").click(function() {
                $("#first").hide();
                $("#second").show();
            });

            $("#edit").click(function() {
                $("#edit-form").show();
            });
            $("#change").click(function() {
                $("#edit-form").hide();
                $("#change-form").show();
            });
            $("#edit").click(function() {
                $("#change-form").hide();
            });

            $("#sub-btn").click(function() {
                $("#login-form").hide();
                $("#success-form").show();
            });

            // $("#submit-btn").click(function(){
            //     $("#login-form").hide();
            //     $("#reg-form").hide();
            //     $("#submit-form").show();
            // });
        });
    </script>

</head>

<body>

    <div id="first" class="container w-50 mt-4 b">

        <div class="d-flex justify-content-evenly border-bottom mb-4 bg-dark text-white rounded-5">
            <h2 id="login">Login</h2>
            <h2 id="registration">Registration</h2>
        </div>

        <!-- Login Form -->
        <div id="login-form" class="card pt-3 rounded-5">
            <div class="card-title text-center">
                <!-- <h2>Login</h2> -->
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3 mt-3">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
                    </div>
                    <div class="form-check mb-3">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="remember"> Remember me
                        </label>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-4 d-flex">
                            <button type="submit" class="btn btn-primary" id="change-btn">Change Password</button>
                        </div>
                        <div class="col-md-4 d-flex">
                            <button type="submit" class="btn btn-success" id="sub-btn">Submit</button>
                        </div>
                        <div class="col-md-4 d-flex">
                            <button id="otp-btn" type="submit" class="btn btn-info">Otp</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Registration Form -->
        <div id="reg-form" class="registration card pt-3 rounded-5">
            <div class="card-title text-center">
                <!-- <h2>Registration</h2> -->
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3 mt-3">
                        <label for="email">First Name:</label>
                        <input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname">
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="email">Last Name:</label>
                        <input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname">
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email1" placeholder="Enter email" name="email">
                    </div>

                    <div class="mb-3">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd1" placeholder="Enter password" name="pswd">
                    </div>

                    <div class="mb-3">
                        <label for=""> Select Your Gender :</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio1" name="radio1" value="Male" checked>
                        <label class="form-check-label" for="radio1">Male</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio2" name="radio2" value="Female">
                        <label class="form-check-label" for="radio2">Female</label>
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="city" class="form-label">Select City :</label>
                        <select class="form-select" id="city" name="city">
                            <option value="" disable selected>--Select--</option>
                            <option value="porbandar">Porbandar</option>
                            <option value="rajkot">Rajkot</option>
                            <option value="ahmedabad">Ahmedabad</option>
                            <option value="gandhinagar">Gandhinagar</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-dark">Submit</button>
                </form>
            </div>
        </div>

        <!-- OTP Form -->
        <div id="otp-form" class="card pt-3 rounded-5">
            <div class="card-title text-center">
                <!-- <h2>OTP</h2> -->
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3 mt-3">
                        <label for="otp">Enter OTP :</label>
                        <input type="text" class="form-control" id="otp" placeholder="Enter OTP" name="otp">
                    </div>
                    <button type="submit" class="btn btn-dark">Submit</button>
                </form>
            </div>
        </div>
    </div>



    <!-- -----------SUBMIT FORM ---------- -->



    <div id="success-form" class="card pt-3">
        <div class="card-body text-center">
            <h1>LOGIN SUCCESSFULLY</h1>
        </div>
    </div>



    <!-- ------- EDIT PAGE ----------- -->


    <div id="second" class="container w-50 mt-4">

        <div class="d-flex justify-content-evenly border-bottom mb-4 bg-dark text-white rounded-5"">
            <h2 id=" edit">Edit Profile</h2>
            <h2 id="change">Change Password</h2>
        </div>
        <div id="edit-form" class="edit card pt-3 rounded-5">
            <div class="card-title text-center">
                <!-- <h2>Edit Profile</h2> -->
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3 mt-3">
                        <label for="email">First Name:</label>
                        <input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname">
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="email">Last Name:</label>
                        <input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname">
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email1" placeholder="Enter email" name="email">
                    </div>

                    <div class="mb-3">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd1" placeholder="Enter password" name="pswd">
                    </div>

                    <div class="mb-3">
                        <label for=""> Select Your Gender :</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio1" name="radio1" value="Male" checked>
                        <label class="form-check-label" for="radio1">Male</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio2" name="radio2" value="Female">
                        <label class="form-check-label" for="radio2">Female</label>
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="city" class="form-label">Select City :</label>
                        <select class="form-select" id="city" name="city">
                            <option value="" disable selected>--Select--</option>
                            <option value="porbandar">Porbandar</option>
                            <option value="rajkot">Rajkot</option>
                            <option value="ahmedabad">Ahmedabad</option>
                            <option value="gandhinagar">Gandhinagar</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-dark">Submit</button>
                </form>
            </div>
        </div>



        <!-- -----------CHANGE PASSWORD------------ -->

        <div id="change-form" class="card pt-3 rounded-5">
            <div class="card-title text-center">
                <!-- <h2>change password</h2> -->
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3 mt-3">
                        <label for="name">Full Name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Your Name" name="name">
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
                    </div>


                    <div class="row justify-content-center">
                        <div class="col-md-4 d-flex">
                            <button type="submit" class="btn btn-dark" id="submit-btn">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>






    </div>


</body>

</html>