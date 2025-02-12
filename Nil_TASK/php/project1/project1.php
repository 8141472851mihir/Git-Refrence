<?php
    include ("connection/connection.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="jquery-3.7.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function () {
 
            $(function () {
                $("#datepicker").datepicker();
            });

            $(document).ready(function () {


                $('#myForm').submit(function (e) {
                    e.preventDefault(); // Prevent form submission to handle validation

                    var errors = [];

                    // Validate Name (Required)
                    var name = $('#name').val().trim();
                    if (name === '') {
                        errors.push('Name is required.');
                    }

                    // Validate Email (Required)
                    var email = $('#email').val().trim();
                    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
                    if (email === '') {
                        errors.push('Email is required.');
                    } else if (!emailPattern.test(email)) {
                        errors.push('Please enter a valid email address.');
                    }

                    // Validate Gender (Required)
                    var gender = $('input[name="gender"]:checked').val();
                    if (!gender) {
                        errors.push('Please select your gender.');
                    }

                    // Validate Salary (Required)
                    var salary = $('#Salary').val().trim();
                    if (salary === '') {
                        errors.push('Salary is required.');
                    }

                    // Validate Joining Date (Required)
                    var joiningDate = $('#datepicker').val().trim();
                    if (joiningDate === '') {
                        errors.push('Joining date is required.');
                    }

                    // Display errors
                    if (errors.length > 0) {
                        alert(errors.join("\n")); // Display errors as an alert (you can display them in a div instead)
                    } else {
                        alert('Form Submitted Successfully!');
                        this.submit();
                    }
                });
            });              
            });


    
    </script>
    <title>Document</title>
</head>
<body class="bg-secondary-subtle">
    <div id="errorMessages" class="alert alert-danger" style="display:none;"></div>


    <div class="card m-5 p-3 shadow-lg border-black border-1">
        <h2 class="card-title">Register Form</h2>

        <div class="card-body">
            <form id="myForm" class="form" action="">
                <label for="name" class="mt-3 form-label">Name:</label><span style="color: red;">*</span>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>

                <label for="email" class="mt-3 form-label">Email:</label><span style="color: red;">*</span>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" >

                <label for="phone" class="mt-3 form-label">phone:</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone">

                <label for="gender" class="mt-3 form-label">Gender:</label><span style="color: red;">*</span><br>
                <input type="radio" name="gender" id="male" value="M" >
                <label for="male">male</label>
                <input type="radio" name="gender" id="female" value="F" >
                <label for="female">female</label><br>

                <label for="Department" class="mt-3 form-label">Select Department You Working in:</label>
                <select class="form-select" aria-label="Default select example" id="department" name="department">
                    <option selected disabled>-- Select --</option>
                    <?php
                        
                        $insertdept = "SELECT d.id,d.name FROM `departments` AS d";
                        $result = mysqli_query($conn,$insertdept);
                        if($result){
                            while($dept_name = mysqli_fetch_assoc($result))
                            {
                                echo "<option value='".$dept_name['id']."'>".$dept_name['name']."</option>";
                            }
                        }
                    ?>
                </select>

                <label for="Designation" class="mt-3 form-label">Select Designation:</label>
                <select class="form-select" aria-label="Default select example" id="designation" name="designation">
                    <option selected disabled>-- Select --</option>

                    <?php
                        
                        $insertdesg = "SELECT d.name FROM `designations` AS d JOIN `departments` AS h ON d.department_id = h.id WHERE d.department_id =". $dept_name['id'];;
                        $result = mysqli_query($conn,$insertdesg);
                        if($result){
                            while($dept_name = mysqli_fetch_assoc($result))
                            {
                                echo "<option value='".$dept_name['id']."'>".$dept_name['name']."</option>";
                            }
                        }
                    ?>  
                </select>
                
                
                <label class="mt-3 form-label">Select Skills You Have:</label><br>
                    <input class="form-check-input" type="checkbox" id="HTML" name="HTML" value="HTML">
                    <label class="form-check-label" for="HTML">HTML</label>
                    <input class="form-check-input" type="checkbox" id="CSS" name="CSS" value="CSS">
                    <label class="form-check-label">CSS</label>
                    <input class="form-check-input" type="checkbox" id="javascript" name="javascript" value="javascript">
                    <label class="form-check-label">javascript</label>
                    <input class="form-check-input" type="checkbox" id="PHP" name="PHP" value="PHP">
                    <label class="form-check-label">PHP</label>
                    <input class="form-check-input" type="checkbox" id="Laravel" name="Laravel" value="Laravel">
                    <label class="form-check-label">Laravel</label>
                    <input class="form-check-input" type="checkbox" id="React" name="React" value="React">
                    <label class="form-check-label">React</label><br>
                    
                <label for="Salary" class="mt-3 form-label">Salary:</label><span style="color: red;">*</span>
                <input type="number" maxlength="7" id="Salary" name="Salary" class="form-control" >

                <label for="my_date_picker" class="mt-3 form-label">Joining date:</label><span style="color: red;">*</span>
                <input type="text" id="datepicker" name="Joining_date" class="form-control" >

                <label for="PP" class="mt-3 form-label">Profile Picture:</label>
                <input type="file" id="PP" name="PP" class="form-control">
            
            
                <div class="card-footer mt-3">
                    <input type="submit" name="submit" id="submit" class="form-control btn btn-primary">
                </div>
                
            </form>
        </div>
    </div>
</body>



<?php


        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $gender = $_POST['gender'];
            $Department = $_POST['Department_name'];
            $Designation = $_POST['designation_name'];
            $Skills = $_POST['Skills'];
            $Salary = $_POST['Salary'];
            $Joining_date = $_POST['Joining_date'];
            // $PP = $_POST['PP'];



            $sqlinsert = "insert into `employee_details` (name,email,phone,gender,Department_name,designation_name,Skills,Salary,Joining_date)
                         VALUES ('$name','$email','$phone','$gender','$Department','$Designation',' $Skills','$Salary','$Joining_date')";
            $result = mysqli_query($conn,$sqlinsert);

            if($result){
                echo "Data Inserted Successfully";
            }else{
                die("Connection failed: " . mysqli_connect_error());
            }
        }
        mysqli_close($conn);
?>

</html>

