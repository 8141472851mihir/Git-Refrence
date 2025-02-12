<?php
include 'database/connection.php';


$sqlDesignations = "SELECT COUNT(id) AS total_designations FROM designations";
$totalDesignations = $conn->query($sqlDesignations)->fetch_assoc()['total_designations'];

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

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <div class="card-box">
                            <h5>Total Designations</h5>
                            <h3><?php echo $totalDesignations; ?></h3>
                        </div>
                    </div>
                </div>

                <div class="table-container table-responsive">
                    <table id="employeeTable" class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Department Name</th>
                                <th>Designations Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT dep.name AS department_name, des.name AS designation_name 
                                    FROM departments AS dep 
                                    LEFT JOIN designations AS des ON dep.id = des.department_id";

                            $result = $conn->query($sql);
                            $count = 1;

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                        <td>{$count}</td>
                                        <td>{$row['department_name']}</td>
                                        <td>{$row['designation_name']}</td>
                                    </tr>";
                                    $count++;
                                }
                            } else {
                                echo "<tr><td colspan='3' class='text-center'>No records found</td></tr>";
                            }
                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/js/app.js"></script>

</html>