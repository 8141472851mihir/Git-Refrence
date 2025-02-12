<!DOCTYPE html>
<html lang="en" data-bd-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management System</title>
    <link rel="shortcut icon" href="assets/images/recruitment.png" type="image/x-icon">

    <!-- Bootstrap CDN Links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- FontAwesome CDN Links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- jQuery & jQuery UI -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/jquery.validate.min.js"></script>

    <!-- Data Table CDN Links -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>

    <!-- Sweet Alert CDN -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Custom CSS Links -->
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            background-image: url('assets/images/favicon.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }

        .toast-container {
            position: fixed;
            /* z-index: 1050; */
        }

        .toast-body a {
            pointer-events: auto !important;
            text-decoration: underline;
            color: blue;
        }

        .error-message {
            color: red;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <?php include 'database/connection.php'; ?>
    <?php include 'includes/header.php'; ?>

    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Subscribe Our Newsletter</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="#">
                        <label for="email">Email: </label>&nbsp;
                        <input type="email" name="email" id="email" placeholder="Please Enter Your Email" required />
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Subscribe</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Toast For Form Submiting Error... -->
    <div id="toastContainer2" class="toast position-fixed top-0 end-0 m-3" role="alert" aria-live="assertive" aria-atomic="true">
        <div id="toastHeader" class="toast-header">
            <strong id="toastTitle2" class="me-auto">Status</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" id="toastMessage2"></div>
    </div>

    <button id="theme-toggle" class="btn btn-secondary position-fixed top-0 end-0 m-2">Toggle Theme</button>
    <div class="container py-5 opacity-75">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="card shadow p-4">
                    <h3 class="text-center mb-4">Employee Registration Form</h3>
                    <form id="employeeForm" action="AddEmployee.php" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Employee Name" value="<?php echo $_POST['name'] ?? ''; ?>">
                            <label for="name" class="fw-bolder">Employee Name <span class="text-danger">*</span></label>
                            <small class="error-message"> <?php echo $errors['name'] ?? ''; ?> </small>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $_POST['name'] ?? ''; ?>">
                            <label for="email" class="fw-bolder">Employee Email <span class="text-danger">*</span></label>
                            <small class="error-message"> <?php echo $errors['email'] ?? ''; ?> </small>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="tel" class="form-control" id="phone" placeholder="Enter Mobile Number" name="phone" value="<?php echo $_POST['name'] ?? ''; ?>">
                            <label for="phone" class="fw-bolder">Employee Phone <span class="text-danger">*</span></label>
                            <small class="error-message"> <?php echo $errors['phone'] ?? ''; ?> </small>

                        </div>

                        <label class="form-label fw-bolder">Gender <span class="text-danger">*</span></label>
                        <div class="mb-3">
                            <input type="radio" name="gender" id="male" value="male" checked><label class="fw-bolder " for="male">&nbsp;Male</label> &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="gender" id="female" value="female"><label class="fw-bolder" for="female">&nbsp; Female</label> &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="gender" id="other" value="other"> <label class="fw-bolder" for="other">&nbsp;Other</label> &nbsp;&nbsp;&nbsp;&nbsp;
                        </div>

                        <div class="mb-3">
                            <label for="dep" class="form-label fw-bolder">Departments <span class="text-danger">*</span></label>
                            <select class="form-select" id="dep" name="department">
                                <option selected disabled>-- Select Department --</option>
                                <?php
                                $result = mysqli_query($conn, "SELECT * FROM departments");
                                while ($dept = mysqli_fetch_assoc($result)) {
                                    echo "<option value='{$dept['id']}'>{$dept['name']}</option>";
                                }
                                ?>
                                <small class="error-message"> <?php echo $errors['department'] ?? ''; ?> </small>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="des" class="form-label fw-bolder">Designation <span class="text-danger">*</span></label>
                            <select class="form-select" id="des" name="designation">
                                <option selected disabled>-- Select Designation --</option>
                                <small class="error-message"> <?php echo $errors['designation'] ?? ''; ?> </small>
                            </select>
                        </div>

                        <label class="form-label fw-bolder">Skills <span class="text-danger">*</span></label>
                        <div class="d-flex flex-wrap gap-3 mb-3">
                            <input type="checkbox" name="skills[]" value="HTML"> HTML
                            <input type="checkbox" name="skills[]" value="CSS"> CSS
                            <input type="checkbox" name="skills[]" value="JavaScript"> JavaScript
                            <input type="checkbox" name="skills[]" value="PHP"> PHP
                            <input type="checkbox" name="skills[]" value="Laravel"> Laravel
                            <input type="checkbox" name="skills[]" value="React"> React
                        </div>

                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="salary" placeholder="Enter Salary" name="salary" value="<?php echo $_POST['salary'] ?? ''; ?>">
                            <label for="salary" class="fw-bolder">Employee Salary <span class="text-danger">*</span></label>
                            <small class="error-message"> <?php echo $errors['salary'] ?? ''; ?> </small>

                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="joining_date" placeholder="Enter JoiningDate" name="joining_date" value="<?php echo $_POST['joining_date'] ?? ''; ?>">
                            <label for="joining_date" class="fw-bolder">Joining Date <span class="text-danger">*</span></label>
                            <small class="error-message"> <?php echo $errors['joining_date'] ?? ''; ?> </small>
                        </div>



                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary fw-bold">Submit</button>
                            <button type="reset" class="btn btn-danger fw-bold">Reset</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <script>
        $("#joining_date").datepicker({
            dateFormat: "yy-mm-dd",
            changeMonth: true,
            changeYear: true
        });
    </script>
    <?php include 'includes/footer.php'; ?>
    <script src="assets/js/app.js"></script>
</body>

</html>