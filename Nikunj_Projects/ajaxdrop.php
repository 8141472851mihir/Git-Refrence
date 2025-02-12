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

<body>

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
                        <label for="state" class="form-label">Country</label>
                        <select class="form-select" id="country" onchange="changestatus(this.value)">
                            <option value="" disabled selected>-- Select --</option>
                            <option value="india">India</option>
                            <option value="usa">USA</option>
                            <option value="uk">UK</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="country" class="form-label">State</label>
                        <select class="form-select" id="state">
                            <option value="" disabled selected>-- Select --</option>
                            <!-- <option value="gujarat">Gujarat</option>
                            <option value="goa">Goa</option>
                            <option value="rajasthan">rajasthan</option>
                            <option value="bihar">Bihar</option>
                            <option value="london">London</option>
                            <option value="laister">Laister</option>
                            <option value="paris">Paris</option> -->
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

                    <div class="mb-3">1
                        <label for="bio" class="form-label">Bio</label>
                        <textarea class="form-control" id="bio" placeholder="Enter your Bio"></textarea>
                    </div>

                    <button id="profile-btn" type="submit" class="btn btn-primary">Add Profile</button>
                </form>
            </div>
        </div>
    </div>


    <script>
        function changestatus(status) {
            let country = status;
            $.ajax({
                url: 'status.php',
                type: 'POST',
                data: {
                    status: country
                },
                success: function(response) {
                    // console.log("hii");
                    // console.log(respons);
                    document.getElementById("state").innerHTML = response;
                }
            });
        }
    </script>
</body>

</html>