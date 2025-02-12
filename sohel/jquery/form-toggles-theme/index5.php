<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Profile Manager</title>

    <style>
        #profile {
            animation: bounce 2s infinite !important;
        }

        @keyframes bounce {
            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }
    </style>

    <script>
        $(document).ready(function() {
            $("#profile").hide();

            $("#add-profile-btn").click(function(Event) {
                Event.preventDefault();


                let name = $("#name").val();
                let gender = $("#gender").val();
                let age = $("#age").val();
                let ccode = $("#ccode").val();
                let mobile = $("#mobile").val();
                let bio = $("#bio").val();


                $("#pro-name").text(name);
                $("#pro-gender").text(gender);
                $("#pro-age").text(age);
                $("#pro-ccode").text(ccode);
                $("#pro-mobile").text(mobile);
                $("#pro-bio-info p").text(bio);


                $("#profile").fadeIn();
            });

            $("#pro-btn-info").click(function(e) {
                e.preventDefault();
                $("#pro-bio-info").slideToggle();
            });

            $("#pro-btn-edit").click(function(e) {
                e.preventDefault();

                $("#edit-name").val($("#pro-name").text());
                $("#edit-gender").val($("#gender").val());
                $("#edit-age").val($("#pro-age").text());
                $("#edit-ccode").val($("#pro-ccode").text());
                $("#edit-mobile").val($("#pro-mobile").text());
                $("#edit-bio").val($("#pro-bio-info p").text());

                $("#myModal").fadeIn();
            });

            $(".modal-close").click(function() {
                $("#myModal").fadeOut();
            });

            $("#edit-form").submit(function(e) {
                e.preventDefault();

                // console.log("Hello jack");

                $("#pro-name").text($("#edit-name").val());
                $("#pro-gender").text($("#edit-gender").val());
                $("#pro-age").text($("#edit-age").val());
                $("#pro-ccode").text($("#edit-ccode").val());
                $("#pro-mobile").text($("#edit-mobile").val());
                $("#pro-bio-info p").text($("#edit-bio").val());

                $("#myModal").fadeOut();
            });

            $("#pro-btn-delete").click(function(e) {
                e.preventDefault();
                $("#profile").remove();
                $("#login-form")[0].reset();
            });

            $("#theme-toggle").click(function() {
                let htmlTag = $("html");
                let currentTheme = htmlTag.attr("data-bs-theme");

                if (currentTheme === "light") {
                    htmlTag.attr("data-bs-theme", "dark");
                } else {
                    htmlTag.attr("data-bs-theme", "light");
                }
            });

        });
    </script>

</head>

<body>

    <h2 class="text-center">Profile Manager</h2>
    <button id="theme-toggle" class="btn btn-secondary position-fixed top-0 end-0 m-2">Toggle Theme</button>

    <div class="container">

        <div id="login" class="card mt-5 mb-2 shadow">
            <div class="card-body">
                <h4>Add New Profile</h4>
                <form id="login-form">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name">
                    </div>

                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" id="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" class="form-control" id="age">
                    </div>

                    <div class="mb-3">
                        <label for="ccode" class="form-label">Country Code</label>
                        <input type="text" class="form-control" id="ccode">
                    </div>

                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile</label>
                        <input type="text" class="form-control" id="mobile">
                    </div>

                    <div class="mb-3">
                        <label for="bio" class="form-label">Bio</label>
                        <textarea class="form-control" id="bio"></textarea>
                    </div>

                    <button id="add-profile-btn" type="submit" class="btn btn-primary">Add Profile</button>
                </form>
            </div>
        </div>



        <div id="profile" class="card mt-4 shadow-lg mb-5 col-lg-4">
            <div class="card-body">
                <h4 class="text-center mb-3" id="pro-name"></h4>
                <div class="d-flex justify-content-center">
                    <p class="text-center" id="pro-gender"></p>
                    , Age :
                    <p class="text-center" id="pro-age"></p>
                </div>

                <div class="d-flex justify-content-center">
                    <p class="text-center" id="pro-ccode"></p>
                    &nbsp;
                    <p class="text-center" id="pro-mobile"></p>
                </div>

                <div id="pro-bio-info" style="display: none;">
                    <p class="text-center"></p>
                </div>

                <div class="text-center mt-2">
                    <button id="pro-btn-info" class="btn btn-info me-2">Show Bio</button>
                    <button id="pro-btn-edit" class="btn btn-warning me-2">Edit</button>
                    <button id="pro-btn-delete" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>



        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">Edit Profile</h4>
                        <button type="button" class="btn-close modal-close"></button>
                    </div>

                    <div class="modal-body">
                        <form id="edit-form">
                            <div class="mb-2">
                                <label for="edit-name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="edit-name">
                            </div>

                            <div class="mb-2">
                                <label for="edit-gender" class="form-label">Gender</label>
                                <select class="form-select" id="edit-gender">
                                    <option value="Male" select>Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <div class="mb-2">
                                <label for="edit-age" class="form-label">Age</label>
                                <input type="number" class="form-control" id="edit-age">
                            </div>

                            <div class="mb-2">
                                <label for="edit-ccode" class="form-label">Country Code</label>
                                <input type="text" class="form-control" id="edit-ccode">
                            </div>

                            <div class="mb-2">
                                <label for="edit-mobile" class="form-label">Mobile</label>
                                <input type="text" class="form-control" id="edit-mobile">
                            </div>

                            <div class="mb-2">
                                <label for="edit-bio" class="form-label">Bio</label>
                                <textarea class="form-control" id="edit-bio"></textarea>
                            </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger modal-close" data-bs-dismiss="modal">Cancel</button>
                        <button id="edit-submit" type="submit" class="btn btn-success">Save Changes</button>
                    </div>

                    </form>

                </div>
            </div>
        </div>

    </div>


</body>

</html>