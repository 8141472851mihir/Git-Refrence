<?php
include 'database/connection.php';

// Fetch employee details
$employee_id = $_GET['id'];
$emp_query = mysqli_query($conn, "SELECT * FROM employee_details WHERE id = $employee_id");
$employee = mysqli_fetch_assoc($emp_query);

// Fetch employee skills
$emp_skills = explode(',', $employee['skills']); // Assuming skills are stored as comma-separated values
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employee</title>
    <link rel="shortcut icon" href="assets/images/recruitment.png" type="image/x-icon">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    
    <!-- jQuery & jQuery UI -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <style>
        body {
            background-image: url('assets/images/favicon.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>

<div class="container py-5 opacity-75">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <div class="card shadow p-4">
                <h3 class="text-center mb-4">Update Employee Details</h3>
                <form id="updateEmployeeForm" action="update_employee.php" method="post">
                    <input type="hidden" name="id" value="<?= $employee['id']; ?>">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" name="name" value="<?= $employee['name']; ?>" required>
                        <label for="name"><b>Employee Name</b></label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" value="<?= $employee['email']; ?>" required>
                        <label for="email"><b>Employee Email</b></label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="tel" class="form-control" id="phone" name="phone" value="<?= $employee['phone']; ?>" required>
                        <label for="phone"><b>Employee Phone</b></label>
                    </div>

                    <label class="form-label"><b>Gender</b></label>
                    <div class="mb-3">
                        <input type="radio" name="gender" id="male" value="male" <?= ($employee['gender'] == 'male') ? 'checked' : ''; ?>>
                        <label class="fw-bolder" for="male">&nbsp;Male</label> &nbsp;&nbsp;
                        <input type="radio" name="gender" id="female" value="female" <?= ($employee['gender'] == 'female') ? 'checked' : ''; ?>>
                        <label class="fw-bolder" for="female">&nbsp; Female</label> &nbsp;&nbsp;
                        <input type="radio" name="gender" id="other" value="other" <?= ($employee['gender'] == 'other') ? 'checked' : ''; ?>>
                        <label class="fw-bolder" for="other">&nbsp;Other</label> &nbsp;&nbsp;
                    </div>

                    <div class="mb-3">
                        <label for="dep" class="form-label"><b>Departments</b></label>
                        <select class="form-select" id="dep" name="department" required>
                            <option disabled>-- Select Department --</option>
                            <?php
                            $dept_result = mysqli_query($conn, "SELECT * FROM departments");
                            while ($dept = mysqli_fetch_assoc($dept_result)) {
                                $selected = ($dept['id'] == $employee['department_id']) ? 'selected' : '';
                                echo "<option value='{$dept['id']}' $selected>{$dept['name']}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="des" class="form-label"><b>Designation</b></label>
                        <select class="form-select" id="des" name="designation" required>
                            <option disabled>-- Select Designation --</option>
                            <?php
                            $des_result = mysqli_query($conn, "SELECT * FROM designations WHERE department_id = {$employee['department_id']}");
                            while ($des = mysqli_fetch_assoc($des_result)) {
                                $selected = ($des['id'] == $employee['designation_id']) ? 'selected' : '';
                                echo "<option value='{$des['id']}' $selected>{$des['name']}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <label class="form-label"><b>Skills</b></label>
                    <div class="d-flex flex-wrap gap-3 mb-3">
                        <?php
                        $skills_list = ["HTML", "CSS", "JavaScript", "PHP", "Laravel", "React"];
                        foreach ($skills_list as $skill) {
                            $checked = in_array($skill, $emp_skills) ? 'checked' : '';
                            echo "<input type='checkbox' name='skills[]' value='$skill' $checked> $skill ";
                        }
                        ?>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="salary" name="salary" value="<?= $employee['salary']; ?>" required>
                        <label for="salary"><b>Employee Salary</b></label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="joiningDate" name="date" value="<?= $employee['joining_date']; ?>" required>
                        <label for="joiningDate"><b>Joining Date</b></label>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary fw-bold">Update</button>
                        <a href="AllEmployees.php" class="btn btn-secondary fw-bold">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $("#joiningDate").datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true
    });

    $("#dep").change(function() {
        var department_id = $(this).val();
        $.ajax({
            url: "fetch_designations.php",
            type: "POST",
            data: { department_id: department_id },
            success: function(response) {
                $("#des").html(response);
            }
        });
    });
});
</script>

</body>
</html>
