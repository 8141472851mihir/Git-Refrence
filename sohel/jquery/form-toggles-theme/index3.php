<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Manager</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            background: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 20px;
            transition: background 0.5s, color 0.5s;
        }

        .dark-mode {
            background: #222;
            color: white;
        }

        /* Theme Toggle Button */
        #toggleTheme {
            width: 150px;
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 10px 10px;
            background: rgb(19, 30, 41);
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            z-index: 1000;
            transition: background 0.3s, transform 0.3s;
        }

        #toggleTheme:hover {
            background: #0056b3;
            transform: scale(1.05);
        }

        /* Container for Form */
        .container {
            max-width: 80%;
            margin: 40px auto 20px;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .dark-mode .container {
            background: #444;
        }

        /* Form Styling */
        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }

        label {
            font-weight: 600;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        button[type="submit"] {
            background: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.3s, transform 0.3s;
        }

        button[type="submit"]:hover {
            background: #0056b3;
            transform: scale(1.02);
        }

        /* Profile List Styling */
        #profileList {
            max-width: 400px;
            margin: 20px 0 20px 10%;
            /* Align 20% from the left */
            display: flex;
            flex-direction: column;
            align-items: center;
            /* Center items horizontally */
        }

        /* Profile Card Styling */
        .profile-card {
            background: white;
            padding: 15px;
            margin: 15px 0;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            animation: bounce 2s infinite;
            width: 100%;
            /* Ensure card takes full width of its container */
            text-align: center;
            /* Center text inside the card */
        }

        .dark-mode .profile-card {
            background: #555;
            color: white;
        }

        .profile-card h3 {
            margin: 0 0 10px;
        }

        .profile-card p {
            margin: 5px 0;
        }

        /* Buttons inside Card */
        .card-buttons {
            display: flex;
            gap: 10px;
            margin-top: 10px;
            justify-content: center;
            /* Center buttons horizontally */
        }

        .card-buttons button {
            /* flex: 1; */
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.3s, transform 0.3s;
            white-space: nowrap;
            /* max-width: 100px; */
            /* Limit button width for better alignment */
        }

        .showBio {
            background: teal;
            color: white;
            width: auto;
        }

        .editProfile {
            background: orange;
            color: white;
            width: auto;
        }

        .deleteProfile {
            background: red;
            color: white;
            width: auto;
        }

        .card-buttons button:hover {
            transform: scale(1.05);
        }

        /* Hidden Bio */
        .bio {
            display: none;
            margin-top: 10px;
            padding: 10px;
            background: #f1f1f1;
            border-radius: 5px;
            text-align: left;
            /* Align bio text to the left */
        }

        .dark-mode .bio {
            background: #666;
        }

        /* Edit Modal Styling */
        #editModal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 500px;
            z-index: 1000;
        }

        .remove {
            /* color: red; */
            font-size: 25px;
            cursor: pointer;
            /* font-weight: bold; */
        }

        .dark-mode #editModal {
            background: #555;
            color: white;
        }

        #editModal button {
            margin: 5px;
        }

        /* Bounce Animation */
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
</head>

<body>

    <h2 class="text-center">Profile Manager</h2>
    <button id="toggleTheme">Toggle Theme</button>

    <div class="container">
        <h2>Add New Profile</h2>
        <form id="profileForm">
            <label for="name">Name</label>
            <input type="text" id="name" placeholder="Name" required>
            <label for="gender">Gender</label>
            <select id="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <label for="age">Age</label>
            <input type="number" id="age" placeholder="Age" required>
            <label for="code">Country Code</label>
            <input type="text" id="code" placeholder="+91" required>
            <label for="mobile">Mobile</label>
            <input type="text" id="mobile" placeholder="Mobile" required>
            <label for="bio">Bio</label>
            <textarea id="bio" placeholder="Bio"></textarea>
            <button class="btn btn-primary" type="submit">Add Profile</button>
        </form>
    </div>

    <div id="profileList"></div>

    <!-- Edit Modal -->
    <div id="editModal">
        <div class="d-flex justify-content-between border-bottom pb-2">
            <h3 class="">Edit Profile</h3>
            <h3 class="remove" id="closeModal" >X</h3>
        </div>
        <label class="pt-2" for="name">Name</label>
        <input type="text" id="editName">
        <label for="gender">Gender</label>
        <select id="editGender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        <label for="age">Age</label>
        <input type="number" id="editAge">
        <label for="code">Country Code</label>
        <input type="text" id="editCode">
        <label for="mobile">Mobile</label>
        <input type="text" id="editMobile">
        <label for="bio">Bio</label>
        <textarea id="editBio"></textarea>
        <button id="saveChanges" class="btn btn-success float-end">Save Changes</button>
        <button id="closeModal1" class="btn btn-secondary float-end">Cancel</button>
    </div>

    <script>
        $(document).ready(function() {
            let profiles = [];

            // Function to update profile list
            function updateProfileList() {
                $("#profileList").empty();
                profiles.forEach((profile, index) => {
                    $("#profileList").append(`
                        <div class="profile-card">
                            <h3>${profile.name}</h3>
                            <p>${profile.gender}, Age: ${profile.age}</p>
                            <p>${profile.code} ${profile.mobile}</p>
                            <div class="card-buttons">
                                <button class="showBio" data-index="${index}">Show Bio</button>
                                <button class="editProfile" data-index="${index}">Edit</button>
                                <button class="deleteProfile" data-index="${index}">Delete</button>
                            </div>
                            <p class="bio">${profile.bio}</p>
                        </div>
                    `);
                });
            }

            // Add new profile
            $("#profileForm").submit(function(event) {
                event.preventDefault();
                let newProfile = {
                    name: $("#name").val(),
                    gender: $("#gender").val(),
                    age: $("#age").val(),
                    code: $("#code").val(),
                    mobile: $("#mobile").val(),
                    bio: $("#bio").val()
                };
                profiles.push(newProfile);
                updateProfileList();
                this.reset();
            });

            // Show/hide bio
            $(document).on("click", ".showBio", function() {
                let index = $(this).data("index");
                $(".bio").eq(index).slideToggle();
            });

            // Edit profile
            $(document).on("click", ".editProfile", function() {
                let index = $(this).data("index");
                $("#editName").val(profiles[index].name);
                $("#editGender").val(profiles[index].gender);
                $("#editAge").val(profiles[index].age);
                $("#editCode").val(profiles[index].code);
                $("#editMobile").val(profiles[index].mobile);
                $("#editBio").val(profiles[index].bio);
                $("#editModal").show();
                $("#saveChanges").data("index", index);
            });

            $("#saveChanges").click(function() {
                let index = $(this).data("index");
                profiles[index] = {
                    name: $("#editName").val(),
                    gender: $("#editGender").val(),
                    age: $("#editAge").val(),
                    code: $("#editCode").val(),
                    mobile: $("#editMobile").val(),
                    bio: $("#editBio").val()
                };
                updateProfileList();
                $("#editModal").hide();
            });

            $("#closeModal").click(function() {
                $("#editModal").hide();
            });

            $("#closeModal1").click(function() {
                $("#editModal").hide();
            });

            // Delete profile
            $(document).on("click", ".deleteProfile", function() {
                let index = $(this).data("index");
                profiles.splice(index, 1);
                updateProfileList();
            });

            // Theme Toggle
            $("#toggleTheme").click(function() {
                $("body").toggleClass("dark-mode");
            });
        });
    </script>

</body>

</html>