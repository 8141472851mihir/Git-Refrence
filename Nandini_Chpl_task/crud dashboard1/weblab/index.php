<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CRUD Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- jQuery UI CSS -->
    <link rel="stylesheet"
        href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</head>

<script>
    $(document).ready(function () {
    $("#addEmployeeForm").on("submit", function (event) {
        let isValid = true;

        // Clear previous errors
        $(".is-invalid").removeClass("is-invalid");
        $(".invalid-feedback").hide();

        function showError(input, message) {
            $(input).addClass("is-invalid").next(".invalid-feedback").text(message).show();
            isValid = false;
        }

        // Name validation
        let name = $.trim($("[name='name']").val());
        if (name === "") showError("[name='name']", "Name is required");

        // Email validation
        let email = $.trim($("[name='email']").val());
        let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) showError("[name='email']", "Enter a valid email");

        // Phone validation (numbers only, 10-15 characters)
        let phone = $.trim($("[name='phone']").val());
        let phonePattern = /^[0-9]{10,15}$/;
        if (!phonePattern.test(phone)) showError("[name='phone']", "Invalid phone number (10-15 digits)");

        // Gender validation
        if ($("[name='gender']:checked").length === 0) {
            $(".gender-error").show();
            isValid = false;
        }

        // Department validation
        if ($("#adddepartment").val() === null) showError("#adddepartment", "Select department");

        // Salary validation
        let salary = $.trim($("[name='salary']").val());
        if (salary === "" || salary <= 0) showError("[name='salary']", "Enter valid salary");

        // Joining Date validation
        let joiningDate = $.trim($("[name='joining_date']").val());
        if (joiningDate === "") showError("[name='joining_date']", "Select a joining date");

        // Prevent form submission if invalid
        if (!isValid) event.preventDefault();
    });

    // Remove error on user input
    $("input, select").on("input change", function () {
        $(this).removeClass("is-invalid").next(".invalid-feedback").hide();
    });

    $("[name='gender']").on("change", function () {
        $(".gender-error").hide();
    });
});

</script>
<style>
    #sidebar {
        background-color: #353b48 !important;
        /* Dark Grayish Blue */
    }

    #sidebar .sidebar-header h4,
    #sidebar ul li a {
        color: white !important;
        /* Ensures text is readable */
    }

    #sidebar ul li a:hover {
        background-color: #2c3136 !important;
        /* Slightly darker shade on hover */
    }

    #profilePreview {
        transition: all 0.3s ease-in-out;
    }

    #profilePreview:hover {
        transform: scale(1.1);
    }

    .upload-box {
        border: 2px dashed #ccc;
        border-radius: 10px;
        text-align: center;
        padding: 30px;
        cursor: pointer;
        background: #f9f9f9;
        transition: 0.3s;
    }

    .upload-box:hover {
        border-color: #666;
        background: #f0f0f0;
    }

    .upload-box img {
        width: 100%;
        max-height: 150px;
        object-fit: cover;
        border-radius: 8px;
        display: none;
        margin-top: 10px;
    }
</style>

<?php
include('conn.php');
include('emp.php');
include('update_emp.php');
?>

<body>
    <div class="wrapper">
        <div class="body-overlay"></div>

        <!-- Sidebar -->
        <div id="sidebar">
            <ul class="list-unstyled component m-0">
                <li class="active">
                    <a href="index.php" class="dashboard  link-underline link-underline-opacity-0"
                        style="margin-bottom: 50px;">
                        <i class="material-icons">dashboard</i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="index.php" class=" link-underline link-underline-opacity-0">
                        <i class="material-icons">person</i> Employees
                    </a>
                </li>
                <li>
                    <a href="departments.php" class=" link-underline link-underline-opacity-0">
                        <i class="material-icons">business</i> Departments
                    </a>
                </li>
                <li>
                    <a href="designation.php" class=" link-underline link-underline-opacity-0">
                        <i class="material-icons">work</i> Designations
                    </a>
                </li>
            </ul>
        </div>
        <!-- Page Content -->
        <div id="content">
            <!-- Top Navbar -->
            <div class="top-navbar">
                <div class="xd-topbar">
                    <div class="row">
                        <div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
                            <div class="xp-menubar">
                                <span class="material-icons text-white">signal_cellular_alt</span>
                            </div>
                        </div>

                        <div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">
                            <div class="xp-profilebar text-right">
                                <!-- Profile content here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
                                        <h2 class="ml-lg-2">Manage Employees</h2>
                                    </div>
                                    <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
                                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
                                            <i class="material-icons">&#xE147;</i>
                                            <span>Add New Employees</span>
                                        </a>
                                        <!-- <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal">
                                <i class="material-icons">&#xE15C;</i>
                                <span>Delete</span>
                            </a> -->
                                    </div>
                                </div>
                            </div>

                            <!-- Employee Table -->
                            <table id="employeeTable" class="table table-striped table-hover table-bordered text-center"
                                style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Profile</th>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Gender</th>
                                        <th>Department</th>
                                        <th>Designation</th>
                                        <th>Skills</th>
                                        <th>Salary</th>
                                        <th>Joining Date</th>
                                        <th>Status</th>
                                        <th>Switch</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT e.id, e.name, e.email, e.phone, e.gender, 
                           d.name AS department_name, ds.name AS designation_name, 
                           e.skills, e.salary, e.joining_date, e.status, e.profile_pic 
                    FROM employee_details e
                    LEFT JOIN departments d ON e.department_id = d.department_id
                    LEFT JOIN designations ds ON e.designation_id = ds.designation_id";

                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        while ($employee = $result->fetch_assoc()) {
                                            $isChecked = ($employee['status'] == 'Active') ? 'checked' : '';
                                            echo "<tr>";
                                            echo "<td><img src='{$employee['profile_pic']}' alt='Profile' class='rounded-circle' width='70'></td>";
                                            echo "<td>{$employee['id']}</td>";
                                            echo "<td>{$employee['name']}</td>";
                                            echo "<td>{$employee['email']}</td>";
                                            echo "<td>{$employee['phone']}</td>";
                                            echo "<td>{$employee['gender']}</td>";
                                            echo "<td>{$employee['department_name']}</td>";
                                            echo "<td>{$employee['designation_name']}</td>";
                                            echo "<td>{$employee['skills']}</td>";
                                            echo "<td>{$employee['salary']}</td>";
                                            echo "<td>{$employee['joining_date']}</td>";
                                            echo "<td>{$employee['status']}</td>";
                                            echo "<td>
                                <div class='form-check form-switch'>
                                    <input class='form-check-input toggle-status' type='checkbox' role='switch' 
                                        id='statusSwitch-{$employee['id']}' 
                                        data-id='{$employee['id']}' 
                                        $isChecked />
                                </div>
                            </td>";
                                                        echo "<td>
                            <a href='#editEmployeeModal' class='edit' data-toggle='modal'
                                data-id='{$employee['id']}'
                                data-name='{$employee['name']}'
                                data-email='{$employee['email']}'
                                data-phone='{$employee['phone']}'
                                data-gender='{$employee['gender']}'
                                data-department='{$employee['department_name']}'
                                data-designation='{$employee['designation_name']}'
                                data-skills='{$employee['skills']}'
                                data-salary='{$employee['salary']}'
                                data-joining='{$employee['joining_date']}'
                                data-profile='{$employee['profile_pic']}'>
                                <i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i>
                            </a>

                    <a href='#deleteEmployeeModal' class='delete' data-toggle='modal' data-id='{$employee['id']}'>
    <i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>

                        </td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='13'>No employees found</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    </div>

    <!-- Add Employee Modal -->
<div class="modal fade" id="addEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="addEmployeeLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 800px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addEmployeeForm" action="emp.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" >
                        <div class="invalid-feedback">Please enter a valid name.</div>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" >
                        <div class="invalid-feedback">Enter a valid email address.</div>
                    </div>

                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" name="phone" >
                        <div class="invalid-feedback">Enter a valid phone number (10-15 digits).</div>
                    </div>

                    <div class="form-group">
                        <label>Gender</label><br>
                        <input type="radio" name="gender" value="Male" class="mr-1"> Male
                        <input type="radio" name="gender" value="Female" class="ml-3 mr-1"> Female
                        <input type="radio" name="gender" value="Other" class="ml-3 mr-1"> Other
                        <div class="invalid-feedback gender-error">Please select a gender.</div>
                    </div>

                    <div class="form-group">
                        <label>Departments</label>
                        <select id="adddepartment" name="department" class="form-control" required>
                            <option value="" disabled selected>-- Select --</option>
                            <?php
                            $sql = "SELECT * FROM departments";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['department_id'] . "'>" . $row['name'] . "</option>";
                            }
                            ?>
                        </select>
                        <div class="invalid-feedback">Please select a department.</div>
                    </div>

                    <div class="form-group">
                        <label>Designation</label>
                        <select name="designation" id="adddesignation" class="form-control" required>
                            <option value="" disabled selected>-- Select --</option>
                        </select>
                        <div class="invalid-feedback">Please select a designation.</div>
                    </div>

                    <div class="form-group">
                        <label>Salary</label>
                        <input type="number" name="salary" class="form-control" >
                        <div class="invalid-feedback">Enter a valid salary amount.</div>
                    </div>

                    <div class="form-group">
                        <label>Joining Date</label>
                        <input type="text" name="joining_date" id="joiningDate" class="form-control" >
                        <div class="invalid-feedback">Please select a joining date.</div>
                    </div>

                    <div class="form-group">
                        <label>Profile Picture</label>
                        <div id="uploadArea" class="upload-box text-center p-3 border border-secondary">
                            <img id="previewImage" src="#" alt="Preview" class="d-none img-fluid rounded">
                            <div>
                                <i class="fas fa-cloud-upload-alt fa-3x text-primary"></i>
                                <p class="mt-2">Drag and drop files here</p>
                                <small class="text-muted">or</small>
                                <br>
                                <input type="file" id="fileInput" name="profile_picture" class="d-none">
                                <button id="browseButton" class="btn btn-primary mt-2"
                                    onclick="document.getElementById('fileInput').click();">
                                    Browse Files
                                </button>
                            </div>
                        </div>
                        <div class="invalid-feedback">Please upload a profile picture.</div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



    <!-- Edit Employee Modal -->
    <div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="editEmployeeLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 800px;">
            <div class="modal-content" style="display: flex; justify-content: center;">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editEmployeeForm" enctype="multipart/form-data">
                        <input type="hidden" name="edit_id" id="edit_id">

                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" class="form-control" name="edit_name" id="edit_name" required>
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" class="form-control" name="edit_email" id="edit_email" required>
                        </div>

                        <div class="mb-3">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="edit_phone" id="edit_phone" required>
                        </div>

                        <div class="mb-3">
                            <label>Gender</label><br>
                            <input type="radio" name="edit_gender" value="Male" id="gender_male"> Male
                            <input type="radio" name="edit_gender" value="Female" id="gender_female"> Female
                            <input type="radio" name="edit_gender" value="Other" id="gender_other"> Other
                        </div>

                        <div class="form-group">
                            <label>Department</label>
                            <input type="text" id="edit_department" name="edit_department" class="form-control"
                                readonly>
                        </div>

                        <div class="form-group">

                            <label>Designation</label>
                            <input type="text" id="edit_designation" name="edit_designation" class="form-control"
                                readonly>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Skills</label>
                            <div class="d-flex flex-wrap gap-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="skills[]" value="HTML"
                                        id="skill-html">
                                    <label class="form-check-label" for="skill-html">HTML</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="skills[]" value="CSS"
                                        id="skill-css">
                                    <label class="form-check-label" for="skill-css">CSS</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="skills[]" value="JavaScript"
                                        id="skill-js">
                                    <label class="form-check-label" for="skill-js">JavaScript</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="skills[]" value="PHP"
                                        id="skill-php">
                                    <label class="form-check-label" for="skill-php">PHP</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="skills[]" value="Laravel"
                                        id="skill-laravel">
                                    <label class="form-check-label" for="skill-laravel">Laravel</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="skills[]" value="React"
                                        id="skill-react">
                                    <label class="form-check-label" for="skill-react">React</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>Salary</label>
                            <input type="number" name="edit_salary" id="edit_salary" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Joining Date</label>
                            <input type="text" id="edit_joining_date" name="edit_joining_date" class="form-control"
                                required>
                        </div>

                        <!-- <div class="form-group">
                            <label>Profile Picture</label>
                            <div>
                                <img id="editPreviewImage" src="#" class="img-fluid rounded d-none" width="100">
                                <input type="file" id="editFileInput" name="edit_profile_picture" accept="image/*">
                            </div>
                        </div> -->

                        <div class="form-group">
                        <label>Profile Picture</label>
                        <div id="editUploadArea" class="upload-box text-center p-3 border border-secondary">
                            <img id="editPreviewImage" src="#" alt="Preview" class="d-none img-fluid rounded">
                            <div>
                                <i class="fas fa-cloud-upload-alt fa-3x text-primary"></i>
                                <p class="mt-2">Drag and drop files here</p>
                                <small class="text-muted">or</small>
                                <br>
                                <input type="file" id="editFileInput" name="edit_profile_picture" class="d-none" accept="image/*">
                                <button id="editBrowseButton" class="btn btn-primary mt-2"
                                    onclick="document.getElementById('editFileInput').click(); return false;">
                                    Browse Files
                                </button>
                            </div>
                        </div>
                    </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Update Employee</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Delete Employee Modal -->
    <div class="modal fade" id="deleteEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="deleteEmployeeLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this employee?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete" data-id="">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <!-- jQuery UI -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function () {

            // Add Model 
            let uploadArea = $("#uploadArea");

            // Prevent form submission when clicking "Browse Files"
            $("#browseButton").click(function (e) {
                e.preventDefault(); // Stop form submission
                $("#fileInput").click(); // Trigger file input
            });

            // Drag & Drop Events
            uploadArea.on("dragover", function (e) {
                e.preventDefault();
                $(this).css("border-color", "#007bff");
            });

            uploadArea.on("dragleave", function (e) {
                e.preventDefault();
                $(this).css("border-color", "#ccc");
            });

            uploadArea.on("drop", function (e) {
                e.preventDefault();
                $(this).css("border-color", "#ccc");
                let file = e.originalEvent.dataTransfer.files[0];
                handleFile(file);
            });

            // File Input Change Event
            $("#fileInput").change(function (e) {
                let file = e.target.files[0];
                handleFile(file);
            });

            function handleFile(file) {
                if (file && file.type.startsWith("image/")) {
                    let reader = new FileReader();
                    reader.onload = function (e) {
                        console.log("Image Loaded:", e.target.result);
                        $("#previewImage")
                            .attr("src", e.target.result)
                            .removeClass("d-none")
                            .hide()
                            .fadeIn();
                    };
                    reader.readAsDataURL(file);
                } else {
                    alert("Please select a valid image file.");
                }
            }

            // Edit model

            let editUploadArea = $("#editUploadArea");

            // Drag & Drop Events
            editUploadArea.on("dragover", function (e) {
                e.preventDefault();
                $(this).css("border-color", "#007bff");
            });

            editUploadArea.on("dragleave", function (e) {
                e.preventDefault();
                $(this).css("border-color", "#ccc");
            });

            editUploadArea.on("drop", function (e) {
                e.preventDefault();
                $(this).css("border-color", "#ccc");
                let file = e.originalEvent.dataTransfer.files[0];
                handleEditFile(file);
            });

            // File Input Change Event
            $("#editFileInput").change(function (e) {
                let file = e.target.files[0];
                handleEditFile(file);
            });

            function handleEditFile(file) {
                if (file && file.type.startsWith("image/")) {
                    let reader = new FileReader();
                    reader.onload = function (e) {
                        console.log("Image Loaded:", e.target.result);
                        $("#editPreviewImage")
                            .attr("src", e.target.result)
                            .removeClass("d-none")
                            .hide()
                            .fadeIn();
                    };
                    reader.readAsDataURL(file);
                } else {
                    alert("Please select a valid image file.");
                }
            }

            // Initialize datepicker
            $("#joiningDate").datepicker();
            $("#edit_joining_date").datepicker();


            // Initialize DataTable
            $('#employeeTable').DataTable();

            // Toggle sidebar
            $(".xp-menubar").on('click', function () {
                $("#sidebar").toggleClass('active');
                $("#content").toggleClass('active');
            });

            $('.xp-menubar,.body-overlay').on('click', function () {
                $("#sidebar,.body-overlay").toggleClass('show-nav');
            });
            
            var table = $("#employeeTable").DataTable(); 

    $(".toggle-status").on("change", function () {
        var employeeId = $(this).data("id");
        var newStatus = $(this).prop("checked") ? "Active" : "Deactive";

        $.ajax({
            type: "POST",
            url: "update_status.php",
            data: { id: employeeId, status: newStatus },
            success: function (response) {
                if (response.trim().toLowerCase() === "success") {
                    
                    var row = $("#statusSwitch-" + employeeId).closest("tr");
                    
                    table.cell(row, 11).data(newStatus).draw();
                } else {
                    alert("Error updating status: " + response);
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", error);
                alert("Something went wrong! Please try again.");
            }
        });
    });
});


        $(document).ready(function () {
            $('#employeeTable').DataTable();

            $("#adddepartment").change(function () {
                var department_id = $(this).val();

                $.ajax({
                    url: "showdesignation.php",
                    method: "POST",
                    data: { department_id: department_id },
                    success: function (data) {
                        $("#adddesignation").html(data);
                    }
                });
            });


        });

        $(document).ready(function () {
            $('.edit').on('click', function () {
                $('#editEmployeeForm')[0].reset();

                var id = $(this).attr('data-id');
                var name = $(this).attr('data-name');
                var email = $(this).attr('data-email');
                var phone = $(this).attr('data-phone');
                var gender = $(this).attr('data-gender');
                var department = $(this).attr('data-department') || "";
                var designation = $(this).attr('data-designation') || "";
                var skills = $(this).attr('data-skills') ? $(this).attr('data-skills').split(',') : [];
                var salary = $(this).attr('data-salary');
                var joining = $(this).attr('data-joining');
                var profile = $(this).attr('data-profile');

                $('#edit_id').val(id);
                $('#edit_name').val(name);
                $('#edit_email').val(email);
                $('#edit_phone').val(phone);
                $('#edit_salary').val(salary);
                $('#edit_joining_date').val(joining);
                $('#edit_department').val(department);
                $('#edit_designation').val(designation);

                $("input[name='edit_gender'][value='" + gender + "']").prop('checked', true);

                $("input[name='skills[]']").each(function () {
                    $(this).prop('checked', skills.includes($(this).val()));
                });

                if (profile) {
                    $('#editPreviewImage').attr('src', profile).removeClass('d-none');
                } else {
                    $('#editPreviewImage').addClass('d-none');
                }
            });

            $("#editEmployeeForm").on("submit", function (e) {
                e.preventDefault();

                let designation = $('#edit_designation').val().trim();

                let formData = new FormData(this);

                $.ajax({
                    type: "POST",
                    url: "update_emp.php",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (response.trim().toLowerCase() === "success") {
                            alert("Employee updated successfully!");
                            location.reload();
                        } else {
                            console.log("Error updating employee: " + response);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("AJAX Error: ", error);
                        alert("Something went wrong! Please try again.");
                    },
                });
            });
        });


        $(document).ready(function () {

            $(".delete").click(function () {
                var employeeId = $(this).data("id");
                $("#confirmDelete").attr("data-id", employeeId);
            });

            // When confirm delete is clicked
            $("#confirmDelete").click(function () {
                var employeeId = $(this).attr("data-id");

                $.ajax({
                    url: "delete_emp.php",
                    type: "POST",
                    data: { id: employeeId },
                    success: function (response) {
                        $("#deleteEmployeeModal").modal("hide");
                        alert("Employee deleted successfully!");
                        location.reload();
                    },
                    error: function () {
                        alert("Error deleting employee.");
                    }
                });
            });
        });


    </script>


</body>

</html>