<?php
include 'includes/db_connection.php';

// Add Course
if (isset($_POST['add_course'])) {
    $category_id = $_POST['category_id'];
    $course_name = $_POST['course_name'];

    $query = "INSERT INTO courses (category_id, course_name) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("is", $category_id, $course_name);
    $stmt->execute();
}

// Update Course
if (isset($_POST['update_course'])) {
    $course_id = $_POST['course_id'];
    $category_id = $_POST['category_id'];
    $course_name = $_POST['course_name'];

    $query = "UPDATE courses SET category_id = ?, course_name = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("isi", $category_id, $course_name, $course_id);
    $stmt->execute();
}

// Delete Course
if (isset($_GET['delete'])) {
    $course_id = $_GET['delete'];

    $query = "DELETE FROM courses WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $course_id);
    $stmt->execute();
}

// Fetch All Students with Course Data
$student_query = "SELECT students.id, students.name, students.email, students.phone, students.dob, students.gender, students.address, students.mode_of_study, students.status, GROUP_CONCAT(courses.course_name SEPARATOR ', ') AS courses 
                  FROM students
                  LEFT JOIN student_courses ON students.id = student_courses.student_id
                  LEFT JOIN courses ON student_courses.course_id = courses.id
                  GROUP BY students.id
                  ORDER BY students.id ";
$student_result = $conn->query($student_query);

// Fetch All Courses
$courses_query = "SELECT courses.id, courses.course_name, categories.category_name 
                  FROM courses 
                  JOIN categories ON courses.category_id = categories.id 
                  ORDER BY courses.id DESC";
$courses_result = $conn->query($courses_query);

// Fatch active student data
$student1_query = "SELECT students.id, students.name, students.email, students.phone, students.dob, students.gender, students.address, students.mode_of_study, students.status, GROUP_CONCAT(courses.course_name SEPARATOR ', ') AS courses 
                    FROM students
                    LEFT JOIN student_courses ON students.id = student_courses.student_id
                    LEFT JOIN courses ON student_courses.course_id = courses.id
                    WHERE students.status = 1
                    GROUP BY students.id
                    ORDER BY students.id";

$student1_result = $conn->query($student1_query);

// Fatch deavtive student data
$student2_query = "SELECT students.id, students.name, students.email, students.phone, students.dob, students.gender, students.address, students.mode_of_study, students.status, GROUP_CONCAT(courses.course_name SEPARATOR ', ') AS courses 
                    FROM students
                    LEFT JOIN student_courses ON students.id = student_courses.student_id
                    LEFT JOIN courses ON student_courses.course_id = courses.id
                    WHERE students.status = 0
                    GROUP BY students.id
                    ORDER BY students.id";

$student2_result = $conn->query($student2_query);

// Fetch Categories for Dropdown
$categories_result = $conn->query("SELECT id, category_name FROM categories");

// Count Students and Courses and active student
$student_count = $conn->query("SELECT COUNT(*) AS count FROM students")->fetch_assoc()['count'];
$course_count = $conn->query("SELECT COUNT(*) AS count FROM courses")->fetch_assoc()['count'];
$active_count = $conn->query("SELECT COUNT(*) AS count FROM students WHERE status = 1")->fetch_assoc()['count'];
$deactive_count = $conn->query("SELECT COUNT(*) AS count FROM students WHERE status = 0")->fetch_assoc()['count'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student & Course Management System</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <style>
        
        .side-menu {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            padding-top: 20px;
        }

        .side-menu a {
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            display: block;
            margin-bottom: 10px;
        }

        .side-menu a:hover {
            background-color: #007bff;
        }

        .content {
            margin-left: 260px;
            padding: 20px;
        }

        .table-container {
            display: none;
        }

        .card {
            margin-bottom: 20px;
            width: 300px;
            height: 150px;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 24px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 24px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked+.slider {
            background-color: #28a745;
        }

        input:checked+.slider:before {
            transform: translateX(26px);
        }
    </style>
    <script>
        $(document).ready(function () {
            $('#studentTable').DataTable();
            $('#courseTable').DataTable();
            $("#student-data").show();
        });

        function showStudentDataTable() {
            $("#student-data").show();
            $("#manage-courses").hide();
            $("#student-data1").hide();
            $("#student-data2").hide();

        }

        function showManageCourses() {
            $("#student-data").hide();
            $("#manage-courses").show();
            $("#student-data1").hide();
            $("#student-data2").hide();


        }
        function activestudents() {
            $("#student-data").hide();
            $("#student-data1").show();
            $("#manage-courses").hide();
            $("#student-data2").hide();

        }
        function deactivestudents() {
            $("#student-data").hide();
            $("#student-data1").hide();
            $("#manage-courses").hide();
            $("#student-data2").show();

        }
        $(document).ready(function () {
            $('.status-toggle').change(function () {
                var studentId = $(this).data('student-id');
                var newStatus = $(this).is(':checked') ? 1 : 0;

                $.ajax({
                    url: 'update_student_status.php',
                    type: 'POST',
                    data: {
                        student_id: studentId,
                        status: newStatus
                    },
                    success: function (response) {
                        alert(response);  // Optional: Show a message on successful update
                    },
                    error: function () {
                        alert('Failed to update status. Please try again.');
                    }
                    
                });
                location.reload();
            });
        });

    </script>
</head>

<body>

    <div class="side-menu">
        <h4 class="text-center text-white">Student Management System</h4>
        <a href="javascript:void(0);" onclick="showStudentDataTable()">Student Data Table</a>
        <a href="javascript:void(0);" onclick="showManageCourses()">Manage Courses</a>
        <a href="javascript:void(0);" onclick="activestudents()">active student</a>
        <a href="javascript:void(0);" onclick="deactivestudents()">deactive student</a>


    </div>

    <div class="content">
        <h1>Welcome to the Student & Course Management System</h1>

        <div class="row">
            <div class="col-md-3">
                <a href="javascript:void(0);" onclick="showStudentDataTable()">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h4>Total Registered Students</h4>
                            <h2><?= $student_count; ?></h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="javascript:void(0);" onclick="showManageCourses()">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h4>Total Courses</h4>
                            <h2><?= $course_count; ?></h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="javascript:void(0);" onclick="activestudents()">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h4>total active students</h4>
                            <h2><?= $active_count; ?></h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="javascript:void(0);" onclick="deactivestudents()">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h4>Total deactive Students</h4>
                            <h2><?= $deactive_count; ?></h2>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div id="student-data" class="table-container">
            <h2>All Students Data</h2>
            <a href="index2.php" class="btn btn-warning btn-sm m-2">Add Student</a>
            <table id="studentTable" class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Index</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Courses</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $id = 1;
                    while ($student = $student_result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $id++; ?></td>
                            <td><?= $student['name']; ?></td>
                            <td><?= $student['email']; ?></td>
                            <td><?= $student['phone']; ?></td>
                            <td><?= $student['courses'] ?: 'No Courses'; ?></td>
                            <td>
                                <label class="switch">
                                    <input type="checkbox" class="status-toggle" data-student-id="<?= $student['id']; ?>"
                                        <?= $student['status'] ? 'checked' : ''; ?>>
                                    <span class="slider round"></span>
                                </label>
                            </td>
                            <td>
                                <a href="view_student.php?id=<?= $student['id']; ?>" class="btn btn-info btn-sm">View</a>
                                <a href="edit_student.php?id=<?= $student['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="delete_student.php?id=<?= $student['id']; ?>" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?');">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <div id="manage-courses" class="table-container">
            <h2>Manage Courses</h2>
            <form method="POST" class="mb-4">
                <div class="mb-3">
                    <label for="category_id" class="form-label">Course Category:</label>
                    <select name="category_id" id="category_id" class="form-select" required>
                        <option value="">Select Category</option>
                        <?php while ($cat = $categories_result->fetch_assoc()): ?>
                            <option value="<?= $cat['id']; ?>"><?= $cat['category_name']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="course_name" class="form-label">Course Name:</label>
                    <input type="text" name="course_name" id="course_name" class="form-control" required>
                </div>
                <button type="submit" name="add_course" class="btn btn-primary">Add Course</button>
            </form>

            <table id="courseTable" class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Index</th>
                        <th>Course Name</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $id1 = 1;
                    while ($course = $courses_result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $id1++; ?></td>
                            <td><?= $course['course_name']; ?></td>
                            <td><?= $course['category_name']; ?></td>
                            <td>
                                <a href="index.php?delete=<?= $course['id']; ?>" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?');">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <div id="student-data1" class="table-container">
            <h2>All Active Students Data</h2>
            <table id="studentTable" class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Index</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Courses</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $id = 1;
                    while ($student1 = $student1_result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $id++; ?></td>
                            <td><?= $student1['name']; ?></td>
                            <td><?= $student1['email']; ?></td>
                            <td><?= $student1['phone']; ?></td>
                            <td><?= $student1['courses'] ?: 'No Courses'; ?></td>
                            <td>
                                <label class="switch">
                                    <input type="checkbox" class="status-toggle" data-student-id="<?= $student1['id']; ?>"
                                        <?= $student1['status'] ? 'checked' : ''; ?>>
                                    <span class="slider round"></span>
                                </label>
                            </td>
                            <td>
                                <a href="view_student.php?id=<?= $student1['id']; ?>" class="btn btn-info btn-sm">View</a>
                                <a href="edit_student.php?id=<?= $student1['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="delete_student.php?id=<?= $student1['id']; ?>" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?');">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <div id="student-data2" class="table-container">
            <h2>All Deactive Students Data</h2>
            <table id="studentTable" class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Index</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Courses</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $id = 1;
                    while ($student2 = $student2_result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $id++; ?></td>
                            <td><?= $student2['name']; ?></td>
                            <td><?= $student2['email']; ?></td>
                            <td><?= $student2['phone']; ?></td>
                            <td><?= $student2['courses'] ?: 'No Courses'; ?></td>
                            <td>
                                <label class="switch">
                                    <input type="checkbox" class="status-toggle" data-student-id="<?= $student2['id']; ?>"
                                        <?= $student2['status'] ? 'checked' : ''; ?>>
                                    <span class="slider round"></span>
                                </label>
                            </td>
                            <td>
                                <a href="view_student.php?id=<?= $student2['id']; ?>" class="btn btn-info btn-sm">View</a>
                                <a href="edit_student.php?id=<?= $student2['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="delete_student.php?id=<?= $student2['id']; ?>" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?');">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>