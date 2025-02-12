<?php

error_reporting(E_ERROR | E_PARSE);

$name = $email = $cname = $password = $gender = $posi = $city = $study = "";
$nameError = $emailError = $cnameError = $passwordError = $genderError = $cityError = $posiError = $studyError = "";

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
// print_r($_POST);
//     $name = test_input($_POST["name"]);
//     $email = test_input($_POST["email"]);
//     $password = test_input($_POST["pass"]);
//     // $study = test_input($_POST["list"]);
//     $cname = test_input($_POST["coname"]);
//     $gender = test_input($_POST["gender"]);
//     $posi = test_input($_POST["position"]);
// };

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameError = "Please enter your name";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[^\d\s][a-zA-Z\s]*$/", $name)) {
            $nameError = "Please enter valid name";
        }
    }

    if (empty($_POST["email"])) {
        $emailError = "Please enter your email";
    } else {
        $email = test_input($_POST["email"]);
        if (!preg_match("/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/", $email)) {
            $emailError = "Please enter valid email";
        }
    }

    if (empty($_POST["pass"])) {
        $passwordError = "Please enter your password";
    } else {
        $password = test_input($_POST["pass"]);
        if (!preg_match("/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,12}$/", $password)) {
            $passwordError = "Strong password required Ex.(Sohel@123)";
        }
    }

    if (empty($_POST["coname"])) {
        $cnameError = "Please enter your company name";
    } else {
        $cname = test_input($_POST["coname"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $cname)) {
            $cnameError = "Please enter valid company name";
        }
    }

    if (empty($_POST["city"])) {
        $cityError = "Please enter your city";
    } else {
        $city = test_input($_POST["city"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $city)) {
            $cityError = "Please enter valid city name";
        }
    }

    if (empty($_POST["gender"])) {
        $genderError = "Please select your gender";
    } else {
        $gender = test_input($_POST["gender"]);
    }

    if (empty($_POST['position'])) {
        $posiError = "Please select your position";
    } else {
        $posi = test_input($_POST['position']);
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


$list = $_POST['list'];
$value = "";
foreach ($list as $key) {
    $value .= $key . ", ";
}

// echo $value;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container d-flex justify-content-center mt-3">
        <div class="card shadow  w-50 d-flex justify-content-center">
            <div class="card-body shadow">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <h4 class="text-center">PHP Form with validation</h4>
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
                        <label for="name">Name <span class="text-danger fw-bolder">*</span></label>
                        <span class="text-danger"><?php echo $nameError;?></span>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
                        <label for="email">E-mail <span class="text-danger fw-bolder">*</span></label>
                        <span class="text-danger"><?php echo $emailError;?></span>
                    </div>
                    <div class="form-floating mt-3 mb-3">
                        <input type="text" class="form-control" id="pass" placeholder="Enter password" name="pass">
                        <label for="pass">Password <span class="text-danger fw-bolder">*</span></label>
                        <span class="text-danger"><?php echo $passwordError;?></span>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check1" name="list[]" value="BCA">
                        <label class="form-check-label" for="check1">BCA</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check2" name="list[]" value="MCA">
                        <label class="form-check-label" for="check2">MCA</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check3" name="list[]" value="BSC">
                        <label class="form-check-label" for="check3">BSC</label>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="coname" placeholder="Enter company name" name="coname">
                        <label for="coname">Company Name <span class="text-danger fw-bolder">*</span></label>
                        <span class="text-danger"><?php echo $cnameError;?></span>
                    </div>
                    <div class="mt-3 mb-3">
                        <label for="position" class="form-label">Position <span class="text-danger fw-bolder">*</span></label>
                        <span class="text-danger"><?php echo $posiError;?></span>
                        <select class="form-select" id="position" name="position">
                            <option value="">--Select--</option>
                            <option value="PHP">PHP</option>
                            <option value="Flutter">Flutter</option>
                            <option value="React">React</option>
                            <option value="PHP">Android</option>
                        </select>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="city" placeholder="Enter city" name="city">
                        <label for="city">City <span class="text-danger fw-bolder">*</span></label>
                        <span class="text-danger"><?php echo $cityError;?></span>
                    </div>

                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="check" name="gender" value="Male">
                        <label class="form-check-label" for="check">Male</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="check" name="gender" value="Female">
                        <label class="form-check-label" for="check">Female</label>
                    </div>
                    <button type="submit" value="Submit" name="submit" class="btn btn-primary mt-2">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <?php
    //  print_r($_POST); 
    ?>


    <table class="table table-bordered mt-5">
        <thead class="table-secondary">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Study</th>
                <th>Company</th>
                <th>Position</th>
                <th>City</th>
                <th>Gender</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $name; ?></td>
                <td><?php echo $email; ?></td>
                <td><?php echo $password; ?></td>
                <td><?php echo $value; ?></td>
                <td><?php echo $cname; ?></td>
                <td><?php echo $posi; ?></td>
                <td><?php echo $city; ?></td>
                <td><?php echo $gender; ?></td>
            </tr>
        </tbody>
    </table>




</body>

</html>