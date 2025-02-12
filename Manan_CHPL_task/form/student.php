<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Students List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-4">
    <h2>Students List</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Course</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = $conn->query("SELECT * FROM students");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td><img src='{$row['photo']}' width='50'></td>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['phone']}</td>
                    <td>{$row['courses']}</td>
                    <td>" . ($row['enrollment_status'] ? 'Active' : 'Inactive') . "</td>
                    <td>
                        <button class='btn btn-warning btn-sm edit-btn' data-id='{$row['id']}'>Edit</button>
                        <button class='btn btn-danger btn-sm delete-btn' data-id='{$row['id']}'>Delete</button>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>

    <div id="editModal" class="modal" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <input type="hidden" name="id" id="student_id">
                        <div class="mb-3">
                            <label>Name:</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Email:</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Phone:</label>
                            <input type="text" name="phone" id="phone" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Date of Birth:</label>
                            <input type="date" name="dob" id="dob" class="form-control" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label>Gender:</label><br>
                            <input type="radio" name="gender" id="gender_male" value="Male"> Male
                            <input type="radio" name="gender" id="gender_female" value="Female"> Female
                            <input type="radio" name="gender" id="gender_other" value="Other"> Other
                        </div>
                        <div class="mb-3">
                            <label>Address:</label>
                            <textarea name="address" id="address" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label>Course:</label>
                            <select name="courses" id="courses" class="form-control" required></select>
                        </div>
                        <div class="mb-3">
                            <label>Mode of Study:</label><br>
                            <input type="radio" name="mode_of_study" value="Online"> Online
                            <input type="radio" name="mode_of_study" value="Offline"> Offline
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).on('click', '.delete-btn', function () {
            const id = $(this).data('id');
            if (confirm('Are you sure you want to delete this record?')) {
                $.post('delete_student.php', { id: id }, function (response) {
                    alert(response);
                    location.reload();
                });
            }
        });
        $(document).on('click', '.edit-btn', function () {
            const id = $(this).data('id');

            // Fetch student details using AJAX
            $.ajax({
                url: 'get_student.php',
                method: 'POST',
                data: { id: id },
                dataType: 'json',
                success: function (data) {
                    // Populate the modal with student details
                    $("#student_id").val(data.id);
                    $("#name").val(data.name);
                    $("#email").val(data.email);
                    $("#phone").val(data.phone);
                    $("#dob").val(data.dob);
                    $("input[name='gender'][value='" + data.gender + "']").prop('checked', true);
                    $("#address").val(data.address);
                    // Populate course dropdown
                    $.ajax({
                        url: 'load_courses.php',
                        method: 'POST',
                        data: { category: data.course_category },
                        success: function (coursesData) {
                            $("#courses").html(coursesData);
                            $("#courses").val(data.courses); // Set selected course
                        }
                    });
                    // Show the modal
                    $("#editModal").show();
                }
            });
        });

        // Close the modal
        $(".close").click(function () {
            $("#editModal").hide();
        });
        $("#editForm").submit(function (e) {
            e.preventDefault();
            const formData = $(this).serialize();
            $.ajax({
                url: 'update_student.php',
                method: 'POST',
                data: formData,
                success: function (response) {
                    alert(response);
                    $("#editModal").hide();
                    location.reload(); // Reload the page to reflect changes
                }
            });
        });
    </script>
</body>

</html>