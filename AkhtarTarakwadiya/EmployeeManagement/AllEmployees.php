<?php
session_start();
include 'database/connection.php';

$sqlEmployees = "SELECT COUNT(id) AS total_employees FROM employee_details";
$totalEmployees = $conn->query($sqlEmployees)->fetch_assoc()['total_employees'];

$sqlDepartments = "SELECT COUNT(id) AS total_departments FROM departments";
$totalDepartments = $conn->query($sqlDepartments)->fetch_assoc()['total_departments'];

$sqlDesignations = "SELECT COUNT(id) AS total_designations FROM designations";
$totalDesignations = $conn->query($sqlDesignations)->fetch_assoc()['total_designations'];

$sqlActiveAccounts = "SELECT COUNT(id) AS active_accounts FROM employee_details WHERE status = 'Active'";
$activeAccounts = $conn->query($sqlActiveAccounts)->fetch_assoc()['active_accounts'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="shortcut icon" href="assets/images/recruitment.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            background: url('assets/images/data.jpeg') no-repeat center center fixed;
            background-size: cover;
        }
    </style>
</head>

<body>
    <nav id="navv" class="navbar navbar-expand-sm">
        <div class="container-fluid d-flex justify-content-center">
            <h3 class="">Employee Management System</h3>
        </div>

    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <?php include 'includes/aside.php' ?>

            <!-- Main Content -->
            <div class="col-md-10 p-4">
                <div class="d-flex justify-content-between mb-3">
                    <h4>Employee List</h4>
                    <a href="index.php" id="add" class="btn btn-primary">Add New Employee</a>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <div class="card-box">
                            <h5>Total Employees</h5>
                            <h3><?php echo $totalEmployees; ?></h3>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card-box">
                            <h5>Total Departments</h5>
                            <h3><?php echo $totalDepartments; ?></h3>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card-box">
                            <h5>Total Designations</h5>
                            <h3><?php echo $totalDesignations; ?></h3>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card-box">
                            <h5>Active Accounts</h5>
                            <h3><?php echo $activeAccounts; ?></h3>
                        </div>
                    </div>
                </div>

                <div class="table-container table-responsive">
                    <table id="employeeTable" class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT e.id, e.name, e.email, e.phone, e.gender, d.name AS department, 
                                    des.name AS designation, e.skills, e.salary, e.joining_date, e.status
                                FROM employee_details e
                                JOIN departments d ON e.department_id = d.id
                                JOIN designations des ON e.designation_id = des.id";

                            $result = $conn->query($sql);
                            $count = 1;

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $isChecked = ($row['status'] == 'Active') ? 'checked' : '';
                                    echo "<tr>
                                        <td>{$count}</td>
                                        <td>{$row['name']}</td>
                                        <td>{$row['email']}</td>
                                        <td>{$row['phone']}</td>
                                        <td>{$row['gender']}</td>
                                        <td>{$row['department']}</td>
                                        <td>{$row['designation']}</td>
                                        <td>{$row['skills']}</td>
                                        <td>$" . number_format($row['salary'], 2) . "</td>
                                        <td>{$row['joining_date']}</td>
                                        <td>
                                            <div class='form-check form-switch'>
                                                <input class='form-check-input status-toggle' type='checkbox' data-id='{$row['id']}' $isChecked>
                                                <label class='form-check-label' id='status-label-{$row['id']}'>{$row['status']}</label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href='edit_employee.php?id=" . $row["id"] . "' class='text-warning'>
                                                <i class='fa-regular fa-pen-to-square h3'></i>
                                            </a>&nbsp;&nbsp;
                                            <a href='DeleteEmployee.php?id=" . $row['id'] . "' class='text-danger'><i class='fa-solid fa-trash h3'></i></a>
                                        </td>
                                    </tr>";
                                    $count++;
                                }
                            } else {
                                echo "<tr><td colspan='12' class='text-center'>No records found</td></tr>";
                            }
                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php if (isset($_SESSION['success_msg'])): ?>
        <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
            <div id="toastMsg" class="toast align-items-center text-white bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        <?= $_SESSION['success_msg']; ?>
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
        <!-- <?php unset($_SESSION['success_msg']); ?> -->
    <?php endif; ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/js/app.js"></script>

</html>