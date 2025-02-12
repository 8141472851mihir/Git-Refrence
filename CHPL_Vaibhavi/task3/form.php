<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php
    $nameErr = $emailErr = $contactErr = $cityErr = $genderErr = $tcodeErr = "";
    $name = $email = $mo_no = $city = $gender = $tcode = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = formdata($_POST["name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = "Only letters allowed & white space allowed.";
            }
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = formdata($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        if (empty($_POST["mo_no"])) {
            $contactErr = "Mobile number is required";
        } else {
            $mo_no = formdata($_POST["mo_no"]);
            //check mobile number
            if (!preg_match("/^[0-9]*$/", $mo_no)) {
                $contactErr = "Invalid Format";
            }

        }
        if (empty($_POST["city"])) {
            $cityErr = "City is required";
        } else {
            $city = formdata($_POST["city"]);
            
        }

        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
        } else {
            $gender = formdata($_POST["gender"]);
        }
        if (empty($_POST["tcode"])) {
            $tcodeErr = "Tour code is required";
        } else {
            $tcode = formdata($_POST["tcode"]);
        }
    }
function formdata($data)
    {
        if (is_array($data)) {
            return array_map('formdata', $data);
        } else {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }
    ?>
    
    
    
    
    
    
    
    <div class="container bg-light shadow">
        <h3 class="text-center pt-3 text-danger">Tour Booking Form</h3>
        <h5 class="text-center small">Please complete thus form to book a tour</h5>
        <hr>
        <div class="row ms-auto">
            <div class="col-md-8 offset-2">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
                    enctype="multipart/form-data">
                    <p><span class="error">* required field</span></p>
                    <div class="mb-3 mt-3">
                        <label for="name" class="mb-2 form-label fw-bold">FullName:<span class="text-danger fw-bold">*</span> </label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Your FullName" name="name"value="<?php echo $name;?>"
                            minlength="3" maxlength="12">
                        <span class="error text-danger"><?php echo $nameErr; ?></span>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email" class="mb-2 form-label fw-bold">Email:<span class="text-danger fw-bold">*</span> </label>
                        <input type="text" class="form-control" id="email" placeholder="Enter Your Email" name="email" value="<?php echo $email;?>">
                        <span class="error text-danger"><?php echo $emailErr; ?></span>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="mo_no" class="mb-2 form-label fw-bold">Contact No:<span class="text-danger fw-bold">*</span></label>
                        <input type="mo_no" class="form-control" id="mo_no" placeholder="Enter Your Contact No."
                            name="mo_no" minlength="0" maxlength="10" value="<?php echo $mo_no;?>">
                     <span class="error text-danger"><?php echo $contactErr; ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="city" class="mb-2 form-label fw-bold">City:<span class="text-danger fw-bold">*</span></label>
                        <select class="form-select" name="city" id="city"  value="<?php echo $city;?>">
                            <option value="">--Select--</option>
                            <option value="ahmedabad">Ahmedabad</option>
                            <option value="rajkot">Rajkot</option>
                            <option value="surat">surat</option>
                        </select>
                        <span class="error text-danger"><?php echo $cityErr; ?></span>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="gender" class="mb-2 form-label fw-bold">Gender:<span class="text-danger fw-bold">*</span></label>
                        <input type="radio" name="gender" value="female" class="mt-2" <?php if (isset($gender) && $gender=="female") echo "checked";?>>&nbsp;Female
                        <input type="radio" name="gender" value="male" <?php if (isset($gender) && $gender=="male") echo "checked";?> >&nbsp;Male
                        <input type="radio" name="gender" value="other" <?php if (isset($gender) && $gender=="other") echo "checked";?> >&nbsp;Other
                        <span class="error text-danger"><?php echo $genderErr; ?></span>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="tcode" class="form-label fw-bold">Tour Code:</label>
                        <div class="form-check">

                            <input type="checkbox" class="form-check-input" name="tcode[]" value="gcan-1" >

                            <label class="form-check-label">GCAN-1</label>
                        </div>
                        <div class="form-check">

                            <input type="checkbox" class="form-check-input" name="tcode[]" value="ynp-2">

                            <label class="form-check-label">YNP-2</label>
                        </div>
                        <div class="form-check">

                            <input type="checkbox" class="form-check-input" name="tcode[]" value="nyc-3">

                            <label class="form-check-label">NYC-3</label>
                        </div>
                    </div>

                    <input type="submit" class="btn btn-primary mb-3" value="submit" name="submit">    
                </form>
            </div>  
        </div>

    </div> 
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
    <div class="container bg-light mt-5">
        <div class="row">
            <h4 class="text-center pt-3 text-danger">Welecome Our Travel Booking Details</h4>
            <h6 class="text-center">Your Personal Information Below:</h6>
            <div class="col-md-10 offset-1 mt-3">
                <table class="table table-border border-1 table-responsive table-striped">
                    <thead class="text-center">
                        <tr>
                            <th class="text-danger">FullName</th>
                            <th class="text-danger">Email</th>
                            <th class="text-danger">Contact No.</th>
                            <th class="text-danger">City</th>
                            <th class="text-danger">Gender</th>
                            <th class="text-danger">Tour Code</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td><?php echo $name?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $mo_no; ?></td>
                            <td><?php echo $city; ?></td>
                            <td><?php echo $gender; ?></td>
                            <td>
                                <?php 
                                if(isset($_POST['tcode'])){
                                    $tbook= $_POST['tcode'] ;
                                    foreach($tbook as $tubook){
                                        echo $tubook."";
                                    }
                                }

                                ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>  
    <?php endif;?>
</body>

</html>



