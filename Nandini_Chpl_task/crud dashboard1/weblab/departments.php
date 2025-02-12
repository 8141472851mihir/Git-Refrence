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
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />
	
</head>
<style>
	#sidebar {
        background-color: #353b48 !important; /* Dark Grayish Blue */
    }

    #sidebar .sidebar-header h4,
    #sidebar ul li a {
        color: white !important; /* Ensures text is readable */
    }

    #sidebar ul li a:hover {
        background-color: #2c3136 !important; /* Slightly darker shade on hover */
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
    include('insert_department.php'); 
    // include('update_department.php'); 
    // include('delete_department.php'); 
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
                            <h2 class="ml-lg-2">Manage Departments</h2>
                        </div>
                        <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
                            <a href="#addDepartmentModal" class="btn btn-success" data-toggle="modal">
                                <i class="material-icons">&#xE147;</i>
                                <span>Add New Departments</span>
                            </a>
                            <!-- <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal">
                                <i class="material-icons">&#xE15C;</i>
                                <span>Delete</span>
                            </a> -->
                        </div>
                    </div>
                </div>

                <!-- departments Table -->
<table id="departmentTable" class="table table-striped table-hover table-bordered text-center" style="width: 100%;">
    <thead>
        <tr>
            <th>Id</th>
            <th>Department Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $sql = "SELECT department_id, name FROM departments";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($department = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$department['department_id']}</td>";
                    echo "<td>{$department['name']}</td>";
                    echo "<td>
                          <a href='#editDepartmentModal' class='edit' data-toggle='modal'
                                data-id='{$department['department_id']}'
                                data-name='{$department['name']}'
                            >
                                <i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i>
                            </a>

                        <a href='#deleteDepartmentModal' class='delete' data-toggle='modal' data-id='{$department['department_id']}'>
                                <i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i>
                            </a>
                        </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No departments found</td></tr>";
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
    <div class="modal fade" id="addDepartmentModal" tabindex="-1" role="dialog" aria-labelledby="addDepartmentLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addDepartmentForm" action="insert_department.php" method="POST">
                    <div class="form-group">
                        <label>Department Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Add Department</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



    <!-- Edit Employee Modal -->
<div class="modal fade" id="editDepartmentModal" tabindex="-1" aria-labelledby="editDepartmentLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editDepartmentForm">
                <input type="hidden" name="edit_department_id" id="edit_department_id">

                    <div class="form-group">
                        <label>Department Name</label>
                        <input type="text" class="form-control" name="edit_department_name" id="edit_department_name" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Update Department</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    <!-- Delete Employee Modal -->
    <div class="modal fade" id="deleteDepartmentModal" tabindex="-1" role="dialog" aria-labelledby="deleteDepartmentLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="delete_department.php">
                <div class="modal-body">
                    <input type="hidden" name="delete_department_id" id="delete_department_id">
                    <p>Are you sure you want to delete this department?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="delete_department" class="btn btn-danger">Delete</button>
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
        $(document).ready(function() {


            // Toggle sidebar
            $(".xp-menubar").on('click', function() {
                $("#sidebar").toggleClass('active');
                $("#content").toggleClass('active');
            });

            $('.xp-menubar,.body-overlay').on('click', function() {
                $("#sidebar,.body-overlay").toggleClass('show-nav');
            });
        });
        
        $('#departmentTable').DataTable({
        "scrollY": false,  // Disables vertical scrolling
        "paging": true,    // Enables pagination instead of scrolling
        "info": true,      // Shows info like "Showing 1 to 10 of 50 entries"
        "ordering": true,  // Enables column sorting
        "searching": true,  // Enables search functionality
        "scrollCollapse": false,
        "autoWidth": false
    });

    $(document).ready(function () {
   
    $(".edit").click(function () {
        $("#edit_department_id").val($(this).data("id"));
        $("#edit_department_name").val($(this).data("name"));
    });

    $("#editDepartmentForm").submit(function (e) {
        e.preventDefault(); 

        $.post("update_department.php", $(this).serialize(), function (response) {
            if (response.trim() === "success") {
                alert("Department updated successfully!");
                $("#editDepartmentModal").modal("hide");

                // Update table row text
                var deptId = $("#edit_department_id").val();
                var deptName = $("#edit_department_name").val();
                $("a.edit[data-id='" + deptId + "']").data("name", deptName)
                    .closest("tr").find("td:nth-child(2)").text(deptName);
            } else if (response.trim() === "empty") {
                alert("Department name cannot be empty!");
            } else {
                alert("Error updating department.");
            }
        });
    });

    // Clear modal on close
    $("#editDepartmentModal").on("hidden.bs.modal", function () {
        $(this).find("input").val("");
    });
});

$(document).ready(function () {
    $(".delete").click(function () {
        let deptId = $(this).data("id"); 
        $("#delete_department_id").val(deptId); 
    });

    $(".confirm-delete").click(function (e) {
        e.preventDefault();

        let departmentId = $("#delete_department_id").val();
        if (!departmentId) {
            alert("No department ID found!");
            return;
        }

        $.post("delete_department.php", { delete_department_id: departmentId }, function (response) {
            if (response.trim() === "success") {
                alert("Department deleted successfully!");
                window.location.href = "departments.php";
            } else {
                alert("Error: " + response);
            }
        }).fail(() => alert("Request failed!"));
    });

    
    $("#deleteDepartmentModal").on("hidden.bs.modal", function () {
        $(this).find("input").val("");
    });
});




</script>

    
</body>
</html>