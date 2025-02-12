<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <style>
        .preview-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
        }
    </style>
</head>

<body class="container mt-4">
    <h2>Student Registration Form</h2>
    <form id="registrationForm" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Phone:</label>
            <input type="text" name="phone" class="form-control">
        </div>
        <div class="mb-3">
            <label>Date of Birth:</label> 
            <input type="text" name="dob" id="dob" class="form-control" autocomplete="off">
        </div>
        <div class="mb-3">
            <label>Gender:</label><br>
            <input type="radio" name="gender" value="Male"> Male
            <input type="radio" name="gender" value="Female"> Female
            <input type="radio" name="gender" value="Other"> Other
        </div>
        <div class="mb-3">
            <label>Address:</label>
            <textarea name="address" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Course Category:</label>
            <select name="course_category" id="course_category" class="form-control" required>
                <option value="">Select Category</option>
                <option value="Science">Science</option>
                <option value="Arts">Arts</option>
                <option value="Commerce">Commerce</option>
            </select>
        </div>
        <div class="mb-3" id="available_courses"></div>
        <div class="mb-3">
            <label>Mode of Study:</label><br>
            <input type="radio" name="mode_of_study" value="Online"> Online
            <input type="radio" name="mode_of_study" value="Offline"> Offline
        </div>
        <div class="mb-3">
            <label>Upload Photo:</label>
            <input type="file" name="photo" id="photo" class="form-control">

        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(function () {
            $("#dob").datepicker({ dateFormat: 'yy-mm-dd' });

            // Preview Image
            $("#photo").change(function () {
                const reader = new FileReader();
                reader.onload = function (e) {
                    $("#preview").attr("src", e.target.result).show();
                };
                reader.readAsDataURL(this.files[0]);
            });

            // Load Courses Based on Category
            $("#course_category").change(function () {
                const category = $(this).val();
                $.ajax({
                    url: 'load_courses.php',
                    method: 'POST',
                    data: { category: category },
                    success: function (data) {
                        $("#available_courses").html(data);
                    }
                });
            });
            // Form Submission
            $("#registrationForm").submit(function (e) {
                e.preventDefault();
                const formData = new FormData(this);
                $.ajax({
                    url: 'process_registration.php',
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        alert(response);
                        $("#registrationForm")[0].reset();
                        $("#preview").hide();
                    }
                });
            });
        });
    </script>
</body>

</html>