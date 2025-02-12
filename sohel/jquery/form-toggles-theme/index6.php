<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>

<body>

    <div class="container w-50">

        <div id="login" class="card mt-5 mb-2 shadow">
            <div class="card-body">
                <h4>Add New Profile</h4>
                <form id="login-form" action="">
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
                        <label for="country" class="form-label">Country</label>
                        <select class="form-select" id="country" onchange="changestatus(this.value)">
                            <option value="">---Select---</option>
                            <option value="India">India</option>
                            <option value="USA">USA</option>
                            <option value="UK">UK</option>
                            <option value="Africa">Africa</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="state" class="form-label">State</label>
                        <select class="form-select" id="state">
                            <option value="">---Select---</option>
                        </select>
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

    </div>
    <script>
        function changestatus(status) {
            let country = status;
            $.ajax({
                url: 'statusmanage.php',
                type: 'POST',
                data: {
                    status: country
                },
                success: function(response) {
                    // console.log(response);
                    document.getElementById("state").innerHTML=response;
                }
            })
        };
    </script>

</body>

</html>