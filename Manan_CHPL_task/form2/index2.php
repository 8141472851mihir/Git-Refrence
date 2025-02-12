<?php
include 'includes/db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Enrollment</title>
    <link href="assets/css/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>

<body>
    <div class="container">
        <h2 class="mt-5">Student Course Enrollment</h2>
        <form action="insert.php" id="enroll-form" method="POST" enctype="multipart/form-data" >
            <div class="mb-3">
                <label for="name" class="form-label">Student Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>

            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="text" class="form-control" id="dob" name="dob" required>
            </div>

            <div class="mb-3">
                <label>Gender</label><br>
                <input type="radio" id="male" name="gender" value="Male"> Male
                <input type="radio" id="female" name="gender" value="Female"> Female
                <input type="radio" id="other" name="gender" value="Other"> Other
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Course Category</label>
                <select id="category" class="form-select" name="category" required>
                    <option value="" selected disabled>Select Category</option>
                    <?php
                    // Load categories from database
                    $categories = $conn->query("SELECT * FROM categories");
                    while ($category = $categories->fetch_assoc()) {
                        echo "<option value='" . $category['id'] . "'>" . $category['category_name'] . "</option>";
                    }
                    ?>

                </select>
            </div>
            <div id="courses-container"></div>

            <div class="mb-3">
                <label>Mode of Study</label><br>
                <input type="radio" id="online" name="mode_of_study" value="Online"> Online
                <input type="radio" id="offline" name="mode_of_study" value="Offline"> Offline
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label">Upload Photo</label>
                <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
            </div>

            <div class="mb-3 form-check form-switch">
                <input class="form-check-input" type="checkbox" id="status" name="status" checked>
                <label class="form-check-label" for="status">Active Status</label>
            </div>

            <button type="submit" class="btn btn-primary">Enroll Student</button>
        </form>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>