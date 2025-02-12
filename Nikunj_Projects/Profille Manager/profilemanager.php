<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<style>
    #edit-card {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 90%;
        max-width: 500px;
    }
</style>

<script>
    $(document).ready(function() {

        $("#info-card").hide();


        $("#profile-btn").click(function(e) {
            e.preventDefault();


            let name = $("#name").val();
            let gender = $("#gender").val();
            let age = $("#age").val();
            let mobile = $("#mobile").val();
            let countryCode = $("#country_code").val();
            let bio = $("#bio").val();


            $("#profile-name").text(name);
            $("#profile-gender").text(gender == 1 ? "Male" : gender == 2 ? "Female" : "Other");
            $("#profile-age").text(age);
            $("#profile-mobile").text(mobile);
            $("#profile-country").text(countryCode);
            $("#bio-info p").text(bio);


            $("#info-card").fadeIn();
        });


        $("#btn-bio").click(function(e) {
            e.preventDefault();
            $("#bio-info").slideToggle();
        });


        $("#btn-edit").click(function(e) {
            e.preventDefault();


            $("#edit-name").val($("#profile-name").text());
            $("#edit-gender").val($("#profile-gender").text() === "Male" ? 1 : $("#profile-gender").text() === "Female" ? 2 : 4);
            $("#edit-age").val($("#profile-age").text());
            $("#edit-mobile").val($("#profile-mobile").text());
            $("#edit-country_code").val($("#profile-country").text());
            $("#edit-bio").val($("#bio-info p").text());


            $("#edit-card").fadeIn();
        });


        $("#overlay").click(function() {
            $("#edit-card").fadeOut();
        });


        $("#edit-form").submit(function(e) {
            e.preventDefault();

            $("#profile-name").text($("#edit-name").val());
            $("#profile-gender").text($("#edit-gender").val() == 1 ? "Male" : $("#edit-gender").val() == 2 ? "Female" : "Other");
            $("#profile-age").text($("#edit-age").val());
            $("#profile-mobile").text($("#edit-mobile").val());
            $("#profile-country").text($("#edit-country_code").val());
            $("#bio-info p").text($("#edit-bio").val());


            $("#overlay").fadeOut();
            $("#edit-card").fadeOut();
        });

        $("#btn-delete").click(function(e) {
            e.preventDefault();
            $("#info-card").remove();
            $("#register-form")[0].reset();
        });

        $(".toggle-btn").click(function() {
            $("body").toggleClass("dark-theme");
        });

    });
</script>

<body>



    <!------------- REGISTERD CARD-------------- -->


    <div class="container">
        <div class="header  d-flex justify-content-center mt-3">
            <h2 class="text-center">Profile Manager</h2>
            <button class="btn btn-dark position-fixed top-0 end-0">Toggle Theme</button>
        </div>

        <div id="register-card" class="card mt-3 shadow rounded-3">
            <div class="card-body">
                <h4>Add New Profile</h4>

                <form id="register-form">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter your name">
                    </div>

                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" id="gender">
                            <option value="" disabled selected>-- Select --</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                            <option value="4">Other</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" class="form-control" id="age" placeholder="Enter your age">
                    </div>

                    <div class="mb-3">
                        <label for="country_code" class="form-label">Country Code</label>
                        <input type="text" class="form-control" id="country_code" placeholder="Enter Country Code">
                    </div>

                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile</label>
                        <input type="text" class="form-control" id="mobile" placeholder="Enter your mobie no">
                    </div>

                    <div class="mb-3">
                        <label for="bio" class="form-label">Bio</label>
                        <textarea class="form-control" id="bio" placeholder="Enter your Bio"></textarea>
                    </div>

                    <button id="profile-btn" type="submit" class="btn btn-primary">Add Profile</button>
                </form>
            </div>
        </div>



        <!------------- INFO CARD-------------- -->


        <div id="info-card" class="card mt-4 shadow rounded-3 col-12 col-md-8 col-lg-4">
            <div class="card-body">
                <h4 class="text-center mb-3" id="profile-name"></h4>
                <p class="text-center" id="profile-gender"></p>
                <p class="text-center" id="profile-age"></p>
                <div class="d-flex justify-content-center">
                    <p id="profile-country" class="me-1"></p>
                    <p id="profile-mobile"></p>
                </div>
                <div id="bio-info" style="display: none;">
                    <p class="text-center"></p>
                </div>
                <div class="text-center mt-4">
                    <button id="btn-bio" class="btn btn-info me-2">Show Bio</button>
                    <button id="btn-edit" class="btn btn-warning me-2">Edit</button>
                    <button id="btn-delete" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>



        <!------------- EDIT CARD-------------- -->

        <div id="edit-card" class="card shadow rounded-3">
            <div class="card-body">
                <h4>Edit Profile</h4>
                <form id="edit-form">

                    <div class="mb-3">
                        <label for="edit-name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="edit-name">
                    </div>

                    <div class="mb-3">
                        <label for="edit-gender" class="form-label">Gender</label>
                        <select class="form-select" id="edit-gender">
                            <option value="" disabled selected>-- Select --</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                            <option value="4">Other</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="edit-age" class="form-label">Age</label>
                        <input type="number" class="form-control" id="edit-age">
                    </div>

                    <div class="mb-3">
                        <label for="country_code" class="form-label">Country Code</label>
                        <input type="text" class="form-control" id="country_code" placeholder="+91">
                    </div>

                    <div class="mb-3">
                        <label for="edit-mobile" class="form-label">Mobile</label>
                        <input type="text" class="form-control" id="edit-mobile">
                    </div>

                    <div class="mb-3">
                        <label for="edit-bio" class="form-label">Bio</label>
                        <textarea class="form-control" id="edit-bio"></textarea>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-secondary me-1">Cancel</button>
                        <button type="submit" class="btn btn-success">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>



    </div>


</body>

</html>