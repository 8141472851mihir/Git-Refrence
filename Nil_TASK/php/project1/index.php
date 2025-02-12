<?php
include("connection/connection.php");

if (isset($_POST['submit'])) {
    $name          = $_POST['name'] ?? '';
    $email         = $_POST['email'] ?? '';
    $phone         = $_POST['phone'] ?? '';
    $gender        = $_POST['gender'] ?? '';
    $department_id = $_POST['department'] ?? '';
    $designation_id = $_POST['designation'] ?? '';
    $skills        = isset($_POST['Skills']) ? implode(',', $_POST['Skills']) : '';
    $salary        = $_POST['Salary'] ?? '';
    $joining_date  = $_POST['Joining_date'] ?? '';


    $errors = array();
    if (empty($name)) {
        $errors[] = 'Name is required.';
    }
    if (empty($email)) {
        $errors[] = 'Email is required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address.';
    }
    if (empty($gender)) {
        $errors[] = 'Please select your gender.';
    }
    if (empty($department_id)) {
        $errors[] = 'Please select your department.';
    }
    if (empty($designation_id)) {
        $errors[] = 'Please select your designation.';
    }
    if (empty($salary)) {
        $errors[] = 'Salary is required.';
    }
    if (empty($joining_date)) {
        $errors[] = 'Joining date is required.';
    }

    if (!empty($errors)) {
        echo '<div class="alert alert-danger">';
        foreach ($errors as $error) {
            echo $error . '<br>';
        }
        echo '</div>';
    } else {
        $sqlinsert = "INSERT INTO `employee_details` (name, email, phone, gender, department_id, designation_id, skills, salary, joining_date)
                      VALUES ('$name', '$email', '$phone', '$gender', '$department_id', '$designation_id', '$skills', '$salary', '$joining_date')";
        $result = mysqli_query($conn, $sqlinsert);

        if ($result) {
            echo '<div class="alert alert-success">Data Inserted Successfully</div>';
            $to = $email;
            $subject = "Test Email";
            $message = '<!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Document</title>
                </head>
                <body>
                    <h1 style="background-color: black; color:aliceblue; width:100%; text-align: center;">Hello From GMail API</h1>

                    <div class="d1"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur numquam quas sit, vitae, deleniti quaerat placeat suscipit aperiam magnam at dicta molestiae cupiditate pariatur sunt doloribus. Quasi, consectetur perspiciatis non quisquam veritatis rem beatae. Officia facilis numquam eligendi laborum libero. Maiores eligendi iure minima provident veritatis asperiores quisquam itaque fuga?</p></div>
                </body>
                </html>
                ;';
            include 'mailer/send_mail.php';
        } else {
            echo '<div class="alert alert-danger">Error: ' . mysqli_error($conn) . '</div>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Employee Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
</head>

<body class="bg-secondary-subtle">
    <button class="btn btn-outline-primary mt-3 mx-2"><a href="datatable.php">Check data</a></button>
    <div class="container">
        <div class="card m-5 p-3 shadow-lg border-black border-1">
            <h2 class="card-title">Register Form</h2>

            <div class="card-body">
                <form id="myForm" class="form" action="" method="post">
                    <label for="name" class="mt-3 form-label">Name:</label><span style="color: red;">*</span>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">

                    <label for="email" class="mt-3 form-label">Email:</label><span style="color: red;">*</span>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">

                    <label for="phone" class="mt-3 form-label">Phone:</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone">

                    <label for="gender" class="mt-3 form-label">Gender:</label><span style="color: red;">*</span><br>
                    <input type="radio" name="gender" id="male" value="Male">
                    <label for="male">Male</label>
                    <input type="radio" name="gender" id="female" value="Female">
                    <label for="female">Female</label><br>

                    <label for="department" class="mt-3 form-label">Select Department You Work In:</label><span style="color: red;">*</span>
                    <select class="form-select" id="department" name="department">
                        <option selected disabled>-- Select --</option>
                        <?php
                        $dept_query = "SELECT id, name FROM departments";
                        $dept_result = mysqli_query($conn, $dept_query);
                        if ($dept_result) {
                            while ($dept = mysqli_fetch_assoc($dept_result)) {
                                echo "<option value='" . $dept['id'] . "'>" . $dept['name'] . "</option>";
                            }
                        }
                        ?>
                    </select>

                    <label for="designation" class="mt-3 form-label">Select Designation:</label><span style="color: red;">*</span>
                    <select class="form-select" id="designation" name="designation">
                        <option selected disabled>-- Select --</option>
                    </select>

                    <label class="mt-3 form-label">Select Skills You Have:</label><br>
                    <?php
                    $skills = ['HTML', 'CSS', 'JavaScript', 'PHP', 'Laravel', 'React'];
                    foreach ($skills as $skill) {
                        echo '<input class="form-check-input" type="checkbox" name="Skills[]" value="' . $skill . '">';
                        echo '<label class="form-check-label">' . $skill . '</label> ';
                    }
                    ?>
                    <br>

                    <label for="Salary" class="mt-3 form-label">Salary:</label><span style="color: red;">*</span>
                    <input type="number" id="Salary" name="Salary" class="form-control">

                    <label for="Joining_date" class="mt-3 form-label">Joining Date:</label><span style="color: red;">*</span>
                    <input type="text" id="datepicker" name="Joining_date" class="form-control">

                    <label for="PP" class="mt-3 form-label">Profile Picture:</label>
                    <input type="file" id="PP" name="PP" class="form-control">

                    <div class="card-footer mt-3">
                        <input type="submit" name="submit" id="submit" class="form-control btn btn-primary" value="Register">
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#datepicker").datepicker({
                dateFormat: "yy-mm-dd"
            });

            $('#department').change(function() {
                var department_id = $(this).val();

                $('#designation').find('option').not(':first').remove();

                if (department_id) {
                    $.ajax({
                        url: 'get_designations.php',
                        type: 'POST',
                        data: {
                            department_id: department_id
                        },
                        dataType: 'json',
                        success: function(response) {
                            var len = response.length;

                            if (len > 0) {
                                for (var i = 0; i < len; i++) {
                                    var id = response[i].id;
                                    var name = response[i].name;

                                    $('#designation').append('<option value="' + id + '">' + name + '</option>');
                                }
                            } else {
                                $('#designation').append('<option disabled>No designations available</option>');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error: ', status, error);
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>