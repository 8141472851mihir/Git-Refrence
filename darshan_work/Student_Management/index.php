<?php
include('header.php');
include 'connection.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.2/feather.min.js" integrity="sha512-zMm7+ZQ8AZr1r3W8Z8lDATkH05QG5Gm2xc6MlsCdBz9l6oE8Y7IXByMgSm/rdRQrhuHt99HAYfMljBOEZ68q5A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="assets/plugins/apexchart/chart-data.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <title>Student Management System</title>


    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background: #343a40;
            padding-top: 20px;
            position: fixed;
        }

        .sidebar a {
            color: white;
            display: block;
            padding: 10px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background: #495057;
        }

        .content {
            margin-left: 260px;
            padding: 20px;
        }
    </style>
</head>

<body>


    <!-- Main Content -->
    <div class="content">
        <div class="card">
            <div class="card-body">

                <?php

                include 'connection.php';
                $query = "SELECT s.id,s.name,s.email,s.phone,s.dob,s.gender,s.address,c.category_name,ac.course_name,s.mode_of_study,s.photo,s.status FROM `students` AS s INNER JOIN categories AS c ON s.category_id = c.id INNER JOIN avalible_courses AS ac ON s.course_id = ac.id;";
                $result = mysqli_query($conn, $query);
                ?>
                <div class="table-responsive">
                    <table class="table datanew">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Student Name</th>
                                <th>E-mail</th>
                                <th>Phone Number</th>
                                <th>Date Of Birth</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th>Course Category</th>
                                <th>Course Name</th>
                                <th>Study Mode</th>
                                <th>Photo</th>
                                <th>Switch</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $id = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $id++; ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo $row['phone'] ?></td>
                                    <td><?php echo $row['dob'] ?></td>
                                    <td><?php echo $row['gender'] ?></td>
                                    <td><?php echo $row['address'] ?></td>
                                    <td><?php echo $row['category_name'] ?></td>
                                    <td><?php echo $row['course_name'] ?></td>
                                    <td><?php echo $row['mode_of_study'] ?></td>
                                    <td>
                                        <!-- <img src="<?php echo $row['photo']; ?>" alt="Student Photo" width="50"> -->
                                    </td>

                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="statusSwitch-<?php echo $row['id']; ?>"
                                                <?php echo ($row['status'] == 'Active') ? 'checked' : ''; ?> data-id="<?php echo $row['id']; ?>" />
                                        </div>
                                    </td>

                                    </td>

                                    <td><span id="statusText-<?php echo $row['id']; ?>"><?php echo $row['status']; ?></span></td>
                                    <td class="">
                                        <form method="POST" style="display: inline;">
                                            <button type="button" class="editBtn btn btn-warning" name="edit_student" value="<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>">
                                                Edit
                                            </button>
                                        </form>
                                        &nbsp;
                                        <form action="delete_student.php" method="POST" style="display: inline;">
                                            <button type="submit" class="btn btn-danger" name="delete_student" value="<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this Student?');">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="editStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editStudentModalLabel">Edit Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editStudentForm">
                        <input type="hidden" id="edit_id" name="id">
                        <div class="mb-3">
                            <label for="edit_name" class="form-label">Student Name</label>
                            <input type="text" class="form-control" id="edit_name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="edit_email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="edit_phone" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_dob" class="form-label">Date of Birth</label>
                            <input type="text" class="form-control" id="edit_dob" name="dob" require>
                        </div>
                        <div class="mb-3">
                            <label for="edit_gender" class="form-label">Gender</label><br>
                            <input type="radio" name="gender" value="male" id="gender_male">&nbsp;Male<br>
                            <input type="radio" name="gender" value="female" id="gender_female">&nbsp;Female<br>
                            <input type="radio" name="gender" value="other" id="gender_other">&nbsp;Other
                        </div>
                        <div class="mb-3">
                            <label for="edit_address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="edit_address" name="address" require>
                        </div>
                        <div class="mb-3">
                            <label for="edit_category" class="form-label">Category</label>
                            <input type="text" class="form-control" id="edit_category" name="category" require>
                        </div>
                        <div class="mb-3">
                            <label for="edit_courses" class="form-label">Selected Courses</label>
                            <input type="text" class="form-control" id="edit_courses" name="courses" require>
                        </div>
                        <div class="mb-3">
                            <label for="edit_studymode" class="form-label">Study Mode</label><br>
                            <input type="radio" name="mode_of_study" value="online" id="mode_online">&nbsp;Online<br>
                            <input type="radio" name="mode_of_study" value="offline" id="mode_offline">&nbsp;Offline
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        function confirmDelete(id) {
            if (confirm('Are you sure you want to delete this Student?')) {
                window.location.href = 'index.php?id=' + id;
            }
        }

        $(document).ready(function() {
            $(".editBtn").click(function() {
                var student_id = $(this).attr("data-id");

                $.ajax({
                    url: "get_student.php",
                    type: "POST",
                    data: {
                        id: student_id
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.error) {
                            alert(data.error);
                        } else {
                            $("#edit_id").val(data.id);
                            $("#edit_name").val(data.name);
                            $("#edit_email").val(data.email);
                            $("#edit_phone").val(data.phone);
                            $("#edit_dob").val(data.dob);

                            $("input[name='gender']").prop("checked", false);
                            if (data.gender == "Male") {
                                $("input[name='gender'][value='male']").prop("checked", true);
                            } else if (data.gender == "Female") {
                                $("input[name='gender'][value='female']").prop("checked", true);
                            } else if (data.gender == "Other") {
                                $("input[name='gender'][value='other']").prop("checked", true);
                            }

                            $("#edit_address").val(data.address);
                            $("#edit_category").val(data.category);
                            $("#edit_courses").val(data.courses);

                            $("input[name='mode_of_study']").prop("checked", false);
                            if (data.mode_of_study === "Online") {
                                $("input[name='mode_of_study'][value='online']").prop("checked", true);
                            } else if (data.mode_of_study === "Offline") {
                                $("input[name='mode_of_study'][value='offline']").prop("checked", true);
                            }

                            $("#editStudentModal").modal("show");
                        }
                    },
                    error: function() {
                        alert("Failed to fetch student data.");
                    }
                });
            });

            $("#editStudentForm").submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "update_student.php",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function(response) {
                        Swal.fire({
                            title: " ",
                            text: "Data Updated Successfully",
                            icon: "success"
                        });
                        $("#editStudentModal").modal("hide");
                        location.reload();
                    },
                    error: function() {
                        alert("Update failed.");
                    }
                });
            });
        });
        $(document).ready(function() {
             $(".form-check-input").change(function() {
        var studentId = $(this).data("id");
        var status = $(this).prop("checked") ? 'Active' : 'Inactive';

        $.ajax({
            url: "update_status.php",
            type: "POST",
            data: {
                id: studentId,
                status: status
            },
            success: function(response) {
                $("#statusText-" + studentId).text(status);

                // SweetAlert to show status change confirmation
                Swal.fire({
                    title: "Status Updated",
                    text: "Student status has been changed to " + status,
                    icon: "success",
                    confirmButtonText: "Ok"
                });
            },
            error: function() {
                alert("Failed to update status.");
                $("#" + studentId).prop("checked", !$(this).prop("checked"));
            }
        });
    });
        });

        $(document).ready(function() {
            $("#editStudentForm").submit(function(e) {
                e.preventDefault();

                $.ajax({
                    url: "update_student.php",
                    type: "POST",
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            alert(response.message);
                            $("#editStudentModal").modal("hide");
                            location.reload();
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function() {
                        alert("An error occurred. Please try again.");
                    }
                });
            });
        });
    </script>
</body>

</html>