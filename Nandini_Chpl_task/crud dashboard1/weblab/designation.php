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

</head>
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

    /* unnecessary vertical scrollbar */
    .dataTables_wrapper {
        overflow-y: hidden !important;
    }

    table.dataTable {
        width: 100% !important;
    }

    table.dataTable tbody {
        max-height: none !important;
        overflow-y: visible !important;
    }
</style>

<?php
include('conn.php');
include('insert_designation.php');
?>

<body>
    <div class="wrapper">
        <div class="body-overlay"></div>

        <!-- Sidebar -->
        <div id="sidebar">
            <ul class="list-unstyled component m-0">
                <li class="active">
                    <a href="index.php" class="dashboard" style="margin-bottom: 50px;">
                        <i class="material-icons">dashboard</i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="index.php">
                        <i class="material-icons">person</i> Employees
                    </a>
                </li>
                <li>
                    <a href="departments.php">
                        <i class="material-icons">business</i> Departments
                    </a>
                </li>
                <li>
                    <a href="designation.php">
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
                                        <h2 class="ml-lg-2">Manage Designation</h2>
                                    </div>
                                    <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
                                        <a href="#addDesignationModal" class="btn btn-success" data-toggle="modal">
                                            <i class="material-icons">&#xE147;</i>
                                            <span>Add New Designation</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Designation Table -->
                            <table id="designationTable"
                                class="table table-striped table-hover table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        
                                        <th>Department Name</th>
                                        <th>Designation Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT d.designation_id, d.name AS designation_name, d.department_id, dept.name AS department_name 
                                            FROM designations d
                                            LEFT JOIN departments dept ON d.department_id = dept.department_id";

                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while ($designation = $result->fetch_assoc()) {
                                            $departmentId = isset($designation['department_id']) ? $designation['department_id'] : 'N/A';
                                            $departmentName = !empty($designation['department_name']) ? $designation['department_name'] : "N/A";

                                            echo "<tr>
                                                    <td>{$designation['designation_id']}</td>
                                                    
                                                    <td>{$departmentName}</td>
                                                    <td>{$designation['designation_name']}</td>
                                                    <td>
                                                        <a href='#editDesignationModal' class='edit' data-toggle='modal'
                                                        data-id='{$designation['designation_id']}'
                                                        data-department-id='{$departmentId}'
                                                        data-department-name='{$departmentName}'
                                                        data-designation-name='{$designation['designation_name']}'>
                                                            <i class='material-icons' title='Edit'>&#xE254;</i>
                                                        </a>
                                                        <a href='#deleteDesignationModa' class='deleteDesignationBtn' data-toggle='modal'
                                                            data-id='{$designation['designation_id'] }'>
                                                                <i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i>
                                                            </a>

                                                    </td>
                                                </tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='4'>No designations found</td></tr>";
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

    <!-- Add Designation Modal -->
    <div class="modal fade" id="addDesignationModal" tabindex="-1" role="dialog" aria-labelledby="addDesignationLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Designation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="addDesignationForm" action="insert_designation.php" method="POST">
                        <div class="form-group">
                            <label>Department</label>
                            <select name="department_id" class="form-control" required>
                                <option value="" disabled selected>-- Select --</option>
                                <?php

                                $dept_result = $conn->query("SELECT * FROM departments");

                                while ($row = $dept_result->fetch_assoc()) {
                                    echo "<option value='{$row['department_id']}'>{$row['name']}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <!-- Input for Designation Name -->
                        <div class="form-group">
                            <label>Designation Name</label>
                            <input type="text" class="form-control" name="designation_name" required>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Add Designation</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- Edit Employee Modal -->
    <div class="modal fade" id="editDesignationModal" tabindex="-1" aria-labelledby="editDesignationLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Designation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form id="editDesignationForm" action="update_designation.php" method="POST">
                    <input type="hidden" name="designation_id" id="edit_designation_id">
                    <input type="hidden" name="department_id" id="edit_department_id">

                    <div class="form-group">
                        <label for="edit_department_name">Department Name</label>
                        <input type="text" class="form-control" id="edit_department_name" name="edit_department_name" readonly>
                    </div>

                    <div class="form-group">
                        <label for="edit_designation_name">Designation Name</label>
                        <input type="text" class="form-control" name="designation_name" id="edit_designation_name" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Update Designation</button>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Delete Employee Modal -->
    <div class="modal fade" id="deleteDesignationModal" tabindex="-1" role="dialog" aria-labelledby="deleteDesignationLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Designation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="delete_designation.php">
                <div class="modal-body">
                    <input type="hidden" name="delete_designation_id" id="delete_designation_id">
                    <p>Are you sure you want to delete this designation?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="delete_designation" class="btn btn-danger">Delete</button>
                </div>
            </form>
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


            // Toggle sidebar
            $(".xp-menubar").on('click', function () {
                $("#sidebar").toggleClass('active');
                $("#content").toggleClass('active');
            });

            $('.xp-menubar,.body-overlay').on('click', function () {
                $("#sidebar,.body-overlay").toggleClass('show-nav');
            });
        });

        $('#designationTable').DataTable({
            "scrollY": false, // Disables vertical scrolling
            "paging": true, // Enables pagination instead of scrolling
            "info": true, // Shows info like "Showing 1 to 10 of 50 entries"
            "ordering": true, // Enables column sorting
            "searching": true, // Enables search functionality
            "scrollCollapse": false,
            "autoWidth": false
        });

        $(document).ready(function () {
            $(".edit").click(function () {
                let id = $(this).data("id");
                let departmentId = $(this).data("department-id");
                let departmentName = $(this).data("department-name");
                let designationName = $(this).data("designation-name");

                $("#edit_designation_id").val(id);
                $("#edit_department_id").val(departmentId);
                $("#edit_department_name").val(departmentName);
                $("#edit_designation_name").val(designationName);

                $("#editDesignationModal").modal("show");
            });

    $("#editDesignationForm").submit(function (e) {
    e.preventDefault();
    $.ajax({
        url: "update_designation.php",
        type: "POST",
        data: $(this).serialize(),
        success: function (response) {
            // console.log(response); // Log the response
            if (response.trim() === "success") {
                $("#editDesignationModal").modal("hide");
                alert("Designation updated successfully!");
                location.reload();
            } else {
                console.log("Error updating designation: " + response);
            }
        },
        error: function (xhr, status, error) {
            alert("AJAX Error: " + error);
        }
    });
});

});
$(document).on('click', '.deleteDesignationBtn', function () {
    var designation_id = $(this).data('id'); 
    $('#delete_designation_id').val(designation_id); 
    $('#deleteDesignationModal').modal('show');
});

$(document).on("click", ".delete-designation", function() {
    let designationId = $(this).data("id");

    if (confirm("Are you sure you want to delete this designation?")) {
        $.ajax({
            url: "delete_designation.php",
            type: "POST",
            data: { designation_id: designationId },
            success: function(response) {
                window.location.href = "designation.php"; 
            },
            error: function() {
                alert("Error deleting designation.");
            }
        });
    }
});




    </script>


</body>

</html>