<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jquery Task</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }

        .h-custom {
            height: calc(100% - 73px);
        }

        @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }
        }

        .login {
            display: none;
        }

        .register {
            display: none;
        }

        .otp {
            display: none;
        }

        .main-div {
            border: 2px solid black;
            border-radius: 10px;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
        }

        .profile-container {
            max-width: 900px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
            display: flex;
        }

        /* Left Profile Section */
        .profile-sidebar {
            width: 35%;
            background: #689EB8;
            color: white;
            text-align: center;
            padding: 30px;
            border-radius: 15px 0 0 15px;
        }

        .profile-sidebar img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin-bottom: 15px;
        }

        /* Right Edit Section */
        .profile-content {
            width: 65%;
            padding: 20px;
        }

        .form-control {
            border-radius: 10px;
            margin-bottom: 1rem;
        }

        .btn {
            border-radius: 10px;
            width: 100%;
        }

        .profile-container {
            display: none;
        }
    </style>
    <script>
        $(document).ready(function () {
            $(".login-button").click(function () {
                $(".login").slideDown(3000);
                $(".register").slideUp(3000);
                $(".otp").slideUp(3000);

            });
            $(".register-button").click(function () {
                $(".login").slideUp(3000);
                $(".register").slideDown(3000);
                $(".otp").slideUp(3000);

            });
            $(".hello").click(function () {
                alert("Register Successfully");
                $(".login").slideDown(3000);
                $(".register").slideUp(3000);
                $(".otp").slideUp(3000);
            })
            $(".otp-button").click(function () {
                $(".login").slideUp(3000);
                $(".otp").slideDown(3000);
                $(".register").slideUp(3000);
            })
            $("#edit-profile-section").show();
            $("#change-password-section").hide();

            $("#edit-profile-btn").click(function () {
                $("#edit-profile-section").show();
                $("#change-password-section").hide();
            });

            $("#change-password-btn").click(function () {
                $("#edit-profile-section").hide();
                $("#change-password-section").show();
            });
            $("#inside-login").click(function () {
                $(".login-content").hide();
                $(".profile-container").fadeIn(3000);
                $(".profile-container").css("display", "flex");
            });
            $("#inside-login-otp").click(function () {
                $(".login-content").hide();
                $(".profile-container").fadeIn(3000);
                $(".profile-container").css("display", "flex");
            });
        });
    </script>
</head>

<body class="">
    <div class="login-content">
        <section class="vh-100">
            <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center align-items-center h-100 ">
                    <div class="col-md-9 col-lg-6 col-xl-5">
                        <img src="1.png" class="img-fluid" alt="Sample image">
                    </div>
                    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                        <form>
                            <div
                                class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                                <p class="lead fw-normal mb-0 me-3">Choose any one</p>
                                <button type="button" data-mdb-button-init data-mdb-ripple-init
                                    class="btn btn-primary btn-floating mx-1 login-button">
                                    Sign in
                                </button>

                                <button type="button" data-mdb-button-init data-mdb-ripple-init
                                    class="btn btn-primary btn-floating mx-1 register-button">
                                    Register
                                </button>

                                <button type="button" data-mdb-button-init data-mdb-ripple-init
                                    class="btn btn-primary btn-floating mx-1 otp-button">
                                    Get Otp
                                </button>
                            </div>

                            <div class="divider d-flex align-items-center my-4">
                                <!-- <p class="text-center fw-bold mx-3 mb-0"></p> -->
                            </div>
                            <div class="login">
                                <!-- Email input -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="email" id="form3Example3" class="form-control form-control-lg"
                                        placeholder="Enter a valid email address" />
                                    <label class="form-label" for="form3Example3">Email address</label>
                                </div>

                                <!-- Password input -->
                                <div data-mdb-input-init class="form-outline mb-3">
                                    <input type="password" id="form3Example4" class="form-control form-control-lg"
                                        placeholder="Enter password" />
                                    <label class="form-label" for="form3Example4">Password</label>
                                </div>

                                <div class="d-flex justify-content-between align-items-center">

                                </div>

                                <div class="text-center text-lg-start mt-4 pt-2">
                                    <button type="button" data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-primary btn-lg"
                                        style="padding-left: 2.5rem; padding-right: 2.5rem;"
                                        id="inside-login">Login</button>
                                </div>
                            </div>
                            <div class="register">
                                <!-- Email input -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="email" id="form3Example3" class="form-control form-control-lg"
                                        placeholder="Enter a valid email address" />
                                    <label class="form-label" for="form3Example3">Email address</label>
                                </div>

                                <!-- Password input -->
                                <div data-mdb-input-init class="form-outline mb-3">
                                    <input type="password" id="form3Example4" class="form-control form-control-lg"
                                        placeholder="Enter password" />
                                    <label class="form-label" for="form3Example4">Password</label>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-3">
                                    <input type="password" id="form3Example4" class="form-control form-control-lg"
                                        placeholder="reEnter password" />
                                    <label class="form-label" for="form3Example4">ReEnter Password</label>
                                </div>

                                <div class="d-flex justify-content-between align-items-center">

                                </div>

                                <div class="text-center text-lg-start mt-4 pt-2">
                                    <button type="button" data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-primary btn-lg hello"
                                        style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
                                </div>
                            </div>
                            <div class="otp">
                                <!-- Email input -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="email" id="form3Example3" class="form-control form-control-lg"
                                        placeholder="Enter Otp" />
                                    <label class="form-label" for="form3Example3">OTP</label>
                                </div>

                                <div class="text-center text-lg-start mt-4 pt-2">
                                    <button type="button" data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-primary btn-lg otp"
                                        style="padding-left: 2.5rem; padding-right: 2.5rem;">Get OTP</button>
                                </div>
                                <div class="text-center text-lg-start mt-4 pt-2">
                                    <button type="button" data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-primary btn-lg" id="inside-login-otp"
                                        style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="profile-container">

        <!-- Left Profile Sidebar -->
        <div class="profile-sidebar">
            <img src="profile.jpeg" alt="Profile Image">
            <h4>Prashil Parekh</h4>
            <p>Morbi</p>
            <p>+91 8320162758</p>
            <p>prashilparekh123@gmail.com</p>
        </div>

        <!-- Right Profile Edit Section -->
        <div class="profile-content">

            <!-- Tabs -->
            <div class="d-flex justify-content-start mb-3">
                <button id="edit-profile-btn" class="btn btn-primary mx-2">Edit Profile</button>
                <button id="change-password-btn" class="btn btn-primary mx-2">Change Password</button>
            </div>

            <!-- Edit Profile Form -->
            <div id="edit-profile-section">
                <h5>Edit Profile</h5>
                <form>
                    <input type="text" class="form-control" placeholder="Full Name">
                    <input type="text" class="form-control" placeholder="Mobile Number">
                    <input type="email" class="form-control" placeholder="Email">
                    <input type="text" class="form-control" placeholder="Address">
                    <input type="date" class="form-control" placeholder="DOB">
                    <input type="file" class="form-control">
                    <button type="submit" class="btn btn-success">Update Details</button>
                </form>
            </div>

            <!-- Change Password Form -->
            <div id="change-password-section" style="display:none;">
                <h5>Change Password</h5>
                <form>
                    <input type="password" class="form-control" placeholder="Current Password" required>
                    <input type="password" class="form-control" placeholder="New Password" required>
                    <input type="password" class="form-control" placeholder="Confirm New Password" required>
                    <button type="submit" class="btn btn-success">Change Password</button>
                </form>
            </div>

        </div>
</body>

</html>