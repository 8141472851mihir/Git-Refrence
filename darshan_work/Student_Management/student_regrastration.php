<?php
include 'header.php';
include 'connection.php';

$sql = "SELECT `id`, `category_name` FROM `categories`";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .page-header h4 {
            font-size: 24px;
            font-weight: 600;
            color: #333;
        }

        .card {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .form-group label {
            font-weight: 500;
        }

        .form-control,
        .select,
        input[type="radio"] {
            margin-bottom: 10px;
        }

        .btn-submit {

            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            width: 30%;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="">

        <!-- Main Content -->
        <div class="content">
            <div class="page-header">
                <h4>Student Registration</h4>
            </div>

            <div class="card p-4">
                <form action="con_addstudent.php" method="post">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Student Name</label>
                                <input type="text" name="name" class="form-control" require>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>E-mail</label><br>
                                <input type="text" name="email" class="form-control" require>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" name="phone" class="form-control" maxlength="10" require>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input type="text" id="dob" name="dob" placeholder="yyyy-mm-dd" autocomplete="off" class="form-control" require>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Gender</label><br>
                                <input type="radio" name="gender" value="male">&nbsp;Male<br>
                                <input type="radio" name="gender" value="female">&nbsp;Female<br>
                                <input type="radio" name="gender" value="other">&nbsp;Other
                            </div>
                        </div>

                        <div class="col-lg-9">
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" name="address" require></textarea>
                            </div>
                        </div>

                        <!-- Category Dropdown -->
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Course Category</label>
                                <select class="form-control" name="category" id="category" requirex>
                                    <option value="" selected disabled>--select--</option>
                                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                        <option value="<?php echo $row["id"]; ?>"><?php echo $row["category_name"]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-5 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Available Courses</label>
                                <div id="courses-container"></div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Study Mode</label>
                                <input type="radio" name="mode_of_study" value="online">&nbsp;Online
                                <input type="radio" name="mode_of_study" value="offline">&nbsp;Offline
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Product Image</label>
                                <div class="image-upload">
                                    <input type="file" id="fileInput" name="productImage" accept="image/*">
                                    <div class="image-uploads">
                                        <h4>Drag and drop a file to upload</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <input type="submit" value="Submit" class="btn-submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#category').on('change', function() {
                var categoryId = $(this).val();
                if (categoryId) {
                    $.ajax({
                        url: 'get_courses.php',
                        type: 'POST',
                        data: {
                            category_id: categoryId
                        },
                        success: function(response) {
                            $('#courses-container').html(response);
                        }
                    });
                } else {
                    $('#courses-container').html('');
                }
            });

            $("#dob").datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true,
                yearRange: "1950:2050"
            });

            $('form').on('submit', function(e) {
                var isValid = true;

                if ($('input[name="name"]').val() == '') {
                    isValid = false;
                    alert('Student Name is required');
                }

                var email = $('input[name="email"]').val();
                var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
                if (email == '' || !emailPattern.test(email)) {
                    isValid = false;
                    alert('Please enter a valid email');
                }

                var phone = $('input[name="phone"]').val();
                var phonePattern = /^[0-9]{10}$/;
                if (phone == '' || !phonePattern.test(phone)) {
                    isValid = false;
                    alert('Please enter a valid phone number');
                }

                if ($('input[name="dob"]').val() == '') {
                    isValid = false;
                    alert('Date of Birth is required');
                }

                if (!$('input[name="gender"]:checked').val()) {
                    isValid = false;
                    alert('Please select gender');
                }

                if ($('textarea[name="address"]').val() == '') {
                    isValid = false;
                    alert('Address is required');
                }

                if ($('select[name="category"]').val() == '') {
                    isValid = false;
                    alert('Please select a category');
                }

                if (!$('input[name="mode_of_study"]:checked').val()) {
                    isValid = false;
                    alert('Please select a mode of study');
                }

                if (!isValid) {
                    e.preventDefault();
                }
            });
        });
    </script>
</body>

</html>