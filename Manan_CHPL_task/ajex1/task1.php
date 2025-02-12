<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Manager</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        .card {
            margin: 10px 0;

        }

        .bio {
            display: none;
        }

        #profileList {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .theme {
            background-color: #1d2a35;
            color: white;
            border: none;
            border-radius: 5px;
            margin: 10px;
            margin-left: 1400px;

        }

        .body1 {
            background-color: #1d2a35;
            color: white;
        }

        .card:hover {
            box-shadow: 0 0 11px rgba(33, 33, 33, .2);
        }

        button:hover {
            box-shadow: 0 0 11px rgba(33, 33, 33, .2);
        }

        .card1 {
            background-color: #38444d;

        }

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox 
        input[type=number] {
            -moz-appearance: textfield;
        }*/
    </style>
</head>

<body>
    <button class="theme"> toggle theme</button>
    <div class="container mt-5">
        <h1 class="text-center">Profile Manager</h1>

        <div class="card mt-4">
            <div class="cardtheme">
                <div class="card-header">Add New Profile</div>
                <div class="card-body">
                    <form id="profileForm">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="number" class="form-control" id="age" required>
                        </div>
                        <div class="form-group">
                            <label for="country">country</label>
                            <select class="country" onchange="countrystatus(this.value)">
                                <option>Select</option>
                                <option value="china">China</option>
                                <option value="india">India</option>
                                <option value="unitedstate">United State</option>
                            </select>
                        </div>
                        <div class="form-group" >
                            <label>States:</label>
                            <select id="state">
                                <option>Select State</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="code">Country Code</label>
                            <input type="text" class="form-control" id="code" required>
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile Number</label>
                            <input type="text" class="form-control" id="mobile" required>
                        </div>
                        <div class="form-group">
                            <label for="bio">Bio</label>
                            <textarea class="form-control" id="bio" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Profile</button>
                    </form>
                </div>
            </div>
        </div>

        <div id="profileList" class="mt-4"></div>
    </div>

    <!-- Edit Profile Modal -->

    <div class="modal fade" id="editProfileModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="cardtheme">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editProfileForm">
                            <input type="hidden" id="editIndex">
                            <div class="form-group">
                                <label for="editName">Name</label>
                                <input type="text" class="form-control" id="editName" required
                                    >
                            </div>
                            <div class="form-group">
                                <label for="editGender">Gender</label>
                                <select class="form-control" id="editGender" required>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="editAge">Age</label>
                                <input type="number" class="form-control" id="editAge" required>
                            </div>
                            <div class="form-group">
                                <label for="editcode">Country Code</label>
                                <input type="text" class="form-control" id="editcode" required>
                            </div>
                            <div class="form-group">
                                <label for="editMobile">Mobile Number</label>
                                <input type="text" class="form-control" id="editMobile" required>
                            </div>
                            <div class="form-group">
                                <label for="editBio">Bio</label>
                                <textarea class="form-control" id="editBio" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function countrystatus(states){
                $.ajax({
                    type : 'POST',
                    url : 'state.php',
                    data: {
                        status : states
                    },
                    success : function(data){
                        console.log(data);
                        document.getElementById("state").innerHTML=data
                    }

                })
            }

        $(document).ready(function () {
            
            


            $(".theme").click(function () {
                $(".cardtheme").toggleClass("card1");
                $("body").toggleClass("body1");

            });
            let profiles = [];
            $('#profileForm').submit(function (event) {
                event.preventDefault();
                const profile = {
                    name: $('#name').val(),
                    gender: $('#gender').val(),
                    age: $('#age').val(),
                    code: $('#code').val(),
                    mobile: $('#mobile').val(),
                    bio: $('#bio').val()
                };
                profiles.push(profile);
                displayprof();
                $(this)[0].reset();
            });


            function displayprof(query = '') {
                $('#profileList').empty();
                profiles.filter(profile => profile.name.toLowerCase().includes(query)).forEach((profile, index) => {
                    $('#profileList').append(`
                    <div class="card" data-index="${index}">
                            <div class="cardtheme">
                            <div class="card-body text-center">
                                <h5 class="card-title">${profile.name}</h5>
                                <p class="card-text">Gender: ${profile.gender} , Age: ${profile.age} <br> Mobile: ${profile.code} ${profile.mobile}</p>
                                <p class="bio mt-2">${profile.bio}</p>
                                <button class="btn btn-info btn-sm show-bio">Show Bio</button>
                                <button class="btn btn-warning btn-sm edit-profile" data-toggle="modal" data-target="#editProfileModal">Edit</button>
                                <button class="btn btn-danger btn-sm delete-profile">Delete</button>
                                
                            </div>
                        </div>
                    </div>
                    `);
                });
            }

            $('#profileList').on('click', '.show-bio', function () {
                $(".bio").slideToggle();
            });

            $('#profileList').on('click', '.edit-profile', function () {
                const index = $(this).closest('.card').data('index');
                const profile = profiles[index];

                $('#editIndex').val(index);
                $('#editName').val(profile.name);
                $('#editGender').val(profile.gender);
                $('#editAge').val(profile.age);
                $('#editcode').val(profile.code);
                $('#editMobile').val(profile.mobile);
                $('#editBio').val(profile.bio);
            });

            $('#editProfileForm').submit(function (event) {
                event.preventDefault();
                const index = $('#editIndex').val();
                profiles[index] = {
                    name: $('#editName').val(),
                    gender: $('#editGender').val(),
                    age: $('#editAge').val(),
                    code: $('#editcode').val(),
                    mobile: $('#editMobile').val(),
                    bio: $('#editBio').val()
                };
                $('#editProfileModal').modal('hide');
                displayprof();
            });

            $('#profileList').on('click', '.delete-profile', function () {
                const index = $(this).closest('.card').data('index');
                profiles.splice(index, 1);
                displayprof();
            });
            
        });
    </script>
</body>

</html>