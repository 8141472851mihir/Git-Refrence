<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="app.js"></script>
    <style>
        .check {
            background-color: black;
            color: white;
        }

        #info-card {
            position: relative;
        }
    </style>
</head>

<body>
    <h2 class="d-flex justify-content-center mt-3">Profile Manager</h2>
    <button id="togle" class="btn btn-dark position-fixed top-0 end-0 m-3 p-2">Toggle Theme</button>
    <div class="container">

        <!-- Registration Form -->
        <div id="register-form" class="card mt-3 shadow rounded-3">
            <div class="card-body">
                <h4>Add New Profile</h4>
                <form id="register-form" method="post">

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name">
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
                        <label for="country" class="form-label">Country</label>
                        <select class="form-select" id="country" name="country" onchange="statuschange(this.value)">
                            <option value="" disabled selected>-- Select --</option>
                            <option value="India">India</option>
                            <option value="2">USA</option>
                            <option value="4">UAE</option>
                        </select>
                    </div>

                    <!-- <div class="mb-3">
                        <label for="states" class="form-label">States</label>
                        <select class="form-select" id="states">
                            <option value="" disabled selected>-- Select --</option>
                            <option value="1">Delhi</option>
                            <option value="2">Punjab</option>
                            <option value="4">Gujrat</option>
                            <option value="5">Hariyana</option>
                        </select>
                    </div> -->

                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" class="form-control" id="age">
                    </div>

                    <div class="mb-3">
                        <label for="country_code" class="form-label">Country Code</label>
                        <input type="text" class="form-control" id="country_code" placeholder="+91">
                    </div>

                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile</label>
                        <input type="text" class="form-control" id="mobile">
                    </div>

                    <div class="mb-3">
                        <label for="bio" class="form-label">Bio</label>
                        <textarea class="form-control" id="bio"></textarea>
                    </div>

                    <button id="reg-btn" type="submit" class="btn btn-primary">Add Profile</button>
                </form>
            </div>
        </div>

        <!-- User Info Card -->
        <div id="info-card" class="card mt-4 shadow rounded-3 col-12 col-md-8 col-lg-4">
            <div class="card card-body">
                <h4 class="text-center mb-3" id="user-name"></h4>
                <p class="text-center" id="user-gender"></p>
                <p class="text-center" id="user-age"></p>
                <div class="d-flex justify-content-center">
                    <p id="user-country" class="me-1"></p>
                    <!-- <p id="user-countries" class="me-1"></p>
                    <p id="user-state" class="me-1"></p> -->
                    <p id="user-mobile"></p>
                </div>
                <div id="bio-info" style="display: none;">
                    <p class="text-center"></p>
                </div>
                <div class="text-center mt-4">
                    <button id="btn-info" class="btn btn-info me-2">Show Bio</button>
                    <button id="btn-edit" class="btn btn-warning me-2" data-bs-toggle="modal"
                        data-bs-target="#myModal">Edit</button>
                    <button id="btn-delete" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>

        <!-- Edit Users Details -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">Edit Profile</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <form id="edit-form">
                            <div class="mb-3">
                                <label for="edit-user-name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="edit-user-name">
                            </div>

                            <div class="mb-3">
                                <label for="edit-user-gender" class="form-label">Gender</label>
                                <select class="form-select" id="edit-user-gender">
                                    <option value="" disabled selected>-- Select --</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                    <option value="4">Other</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="edit-country" class="form-label">Country</label>
                                <select class="form-select" id="edit-country">
                                    <option value="" disabled selected>-- Select --</option>
                                    <option value="1">India</option>
                                    <option value="2">USA</option>
                                    <option value="3">UAE</option>
                                    <option value="4">UK</option>
                                </select>
                            </div>
        
                            <div class="mb-3">
                                <label for="edit-states" class="form-label">States</label>
                                <select class="form-select" id="edit-tates">
                                    <option value="" disabled selected>-- Select --</option>
                                    <option value="1">Delhi</option>
                                    <option value="2">Punjab</option>
                                    <option value="3">Gujrat</option>
                                    <option value="4">Hariyana</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="edit-user-age" class="form-label">Age</label>
                                <input type="number" class="form-control" id="edit-user-age">
                            </div>

                            <div class="mb-3">
                                <label for="edit-user-country_code" class="form-label">Country Code</label>
                                <input type="text" class="form-control" id="edit-user-country_code">
                            </div>

                            <div class="mb-3">
                                <label for="edit-user-mobile" class="form-label">Mobile</label>
                                <input type="text" class="form-control" id="edit-user-mobile">
                            </div>

                            <div class="mb-3">
                                <label for="edit-bio" class="form-label">Bio</label>
                                <textarea class="form-control" id="edit-bio"></textarea>
                            </div>
                            <div class="modal-footer">
                                <div class="d-flex justify-content-end">
                                    <button type="submit" data-bs-dismiss="modal"
                                        class="btn btn-secondary me-1">Cancel</button>
                                    <button type="submit" data-bs-dismiss="modal" class="btn btn-success">Save
                                        Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
</body>

</html>