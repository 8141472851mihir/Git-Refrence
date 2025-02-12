<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        #viewdetails {
            width: 30%;
            border: 1px solid black;
        }
    </style>
</head>

<body class="black">
    <button id="theme-btn" class="btn btn-dark position-fixed top-0 end-0 m-3">Toggle Theme</button>
    <h2 class="text-center mt-3">Profile Manager</h2>


    <div class="container mt-5">

        <div class="card p-4 mt-4" id="main-card">

            <h4>Add New Profile</h4>
            <form id="profileForm" method=POST>

                <!-- Name -->
                <div class="mb-3">
                    <label for="profile-name" class="form-label">Name</label>
                    <input type="text" id="profile-name" class="form-control" >
                </div>

                <!-- Gender -->
                <div class="mb-3">
                    <label for="profile-gender" class="form-label">Gender</label>
                    <select class="form-select" id="profile-gender">
                        <option value="" disabled selected>-- Select --</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <!-- Age -->
                <div class="mb-3">
                    <label for="profile-age" class="form-label">Age</label>
                    <input type="number" id="profile-age" class="form-control" >
                </div>

                <!-- Country Code -->
                <div class="mb-3">
                    <label for="profile-countrycode" class="form-label">Country Code</label>
                    <input type="text" id="profile-countrycode" class="form-control" placeholder="+91">
                </div>

                <!-- Mobile Number -->
                <div class="mb-3">
                    <label for="profile-mobile" class="form-label">Mobile</label>
                    <input type="tel" id="profile-mobile" class="form-control" required>
                </div>

                <!-- Bio -->
                <div class="mb-3">
                    <label for="profile-bio" class="form-label">Bio</label>
                    <textarea id="profile-bio" class="form-control" rows="3"></textarea>
                </div>

                <!-- State -->
                <div class="mb-3">
                    <label for="profile-state" class="form-label">State</label>
                    <select class="form-select" id="profile-state" onchange="state(this.value)">
                        <option value="" disabled selected>-- Select --</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Kerla">Kerla</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Delhi">Delhi</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                    </select>
                </div>


                <!-- Country -->
                <div class="mb-3">
                    <label for="profile-country" class="form-label">CITY</label>
                    <select class="form-select" id="city">
                        <option value="" disabled selected>-- Select --</option>                        
                    </select>
                </div>

                <!-- Submit Button -->
                <button id="add-profile" type="submit" class="btn btn-primary">Add Profile</button>
            </form>
        </div>

        <div id="profileList" class="mt-4"></div>


        
    </div>

    <script>
        function state(state) {
            var manage = state;
            $.ajax({
                    type: "POST",
                    url: "data.php",
                    data: {
                        action: manage
                    },
                    success: function(data) {
                        document.getElementById('city').innerHTML = data ;
                        
                    }
            });
        };

        


        
    </script>

</body>

</html>