<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php
    $fnamerr = $lnameerr = $emailerr = $ageerr = $gendererr = $countryerr = $mnoerr = $mnameerr = "";
    $fnameo = $mname = $lname = $fmno = $email = $age = $city = $gender = $country = "";
    $ho = " ";
    // vaildation of form here
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $fnamerr = "First Name is Required";
        } else {
            if (!preg_match("/^[a-zA-Z-']*$/", $_POST["name"])) {
                $fnamerr = "Name should Contain only Letter";
            } else {
                $fnameo = test_input($_POST["name"]);
            }
        }
        if (empty($_POST["lname"])) {
            $lnameerr = "Last Name is Required";
        } else {
            if (!preg_match("/^[a-zA-Z-']*$/", $_POST["lname"])) {
                $lnameerr = "Last Name should contain only Letter";
            } else {
                $lname = test_input($_POST["lname"]);
            }
        }
        if (empty($_POST["femail"])) {
            $emailerr = "Email is Required";
        } else {
            if (!filter_var($_POST["femail"], FILTER_VALIDATE_EMAIL)) {
                $emailerr = "Enter Valid email";
            } else {
                $email = test_input($_POST["femail"]);
            }
        }
        if (empty($_POST["fage"])) {
            $ageerr = "Age is Required";
        } else {
            if ($_POST["fage"] > 120) {
                $ageerr = "Age Must be less than 120";
            } else {
                $age = test_input($_POST["fage"]);
            }
        }
        if (empty($_POST["fgender"])) {
            $gendererr = "gender is required";
        } else {
            $gender = test_input($_POST["fgender"]);
        }
        if (empty($_POST["fcountry"])) {
            $countryerr = "Country is required";
        } else {
            $country = test_input($_POST["fcountry"]);
        }
        if (empty($_POST["fmno"])) {
            $mnoerr = "Mobile Number is Required";
        } else {
            if (!preg_match("/^[6-9]\d{9}$/", $_POST["fmno"])) {
                $mnoerr = "Enter Valid Mobile Number";
            } else {
                $fmno = test_input($_POST["fmno"]);
            }
        }
        if (!preg_match("/^[a-zA-Z-']*$/", $_POST["mname"])) {
            $mnameerr = "Middle Name should contain only Letter";
        } else {
            $mname = test_input($_POST["mname"]);
        }
        if (empty($_POST["fcity"])) {
        } else {
            $city = test_input($_POST["fcity"]);
        }
    }
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
    <form class="container mt-5 border rounded p-5 col-md-6 " method="post"
        action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h3> Form Validation Using PHP</h3>
        <div class="form-group">
            <label for="exampleInputEmail1">First Name</label><span class="text-danger">* <?php echo $fnamerr ?></span>
            <input type="Text" class="form-control" id="exampleInputEmail1" aria-describedby="Name"
                placeholder="Enter Your First Name" name="name" maxlength="120" minlength="2">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Middle Name</label><span
                class="text-danger">&nbsp;<?php echo $mnameerr ?></span>
            <input type="Text" class="form-control" id="exampleInputEmail1" aria-describedby="Name"
                placeholder="Enter Your Middle Name" name="mname" maxlength="120" minlength="2">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Last Name</label><span class="text-danger">* <?php echo $lnameerr ?></span>
            <input type="Text" class="form-control" id="exampleInputEmail1" aria-describedby="Name"
                placeholder="Enter Your Last Name" name="lname" maxlength="120" minlength="2">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Mobile Number</label><span class="text-danger">*
                <?php echo $mnoerr ?></span>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter Your Mobile Number" name="fmno">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label><span class="text-danger">*
                <?php echo $emailerr ?></span>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter email" name="femail">
        </div>
        <div class="form-group ">
            <label for="exampleInputPassword1">Age</label><span class="text-danger">* <?php echo $ageerr ?></span>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Your age" name="fage">
        </div>
        <div class="form-group ">
            <label for="exampleInputPassword1">City</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter City" name="fcity">
        </div>
        <div class="form-group mt-2">
            <label for="exampleInputPassword1">Gender </label><span class="text-danger">*
                <?php echo $gendererr ?></span>
            <input type="radio" id="exampleInputPassword1" name="fgender" value="Male">Male
            <input type="radio" id="exampleInputPassword1" name="fgender" value="Female">Female
        </div>
        <div class="form-group mt-1">
            <label for="exampleInputPassword1">Country</label><span class="text-danger">*
                <?php echo $countryerr ?></span>
            <select class="form-control" id="exampleInputPassword1" name="fcountry">
                <option value="">--select--</option>
                <option value="India">India</option>
                <option value="USA">USA</option>
                <option value="Canada">Canada</option>
            </select>
        </div>
        <div class="form-group mt-2">
            <label for="exampleInputPassword1">Hobbies</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Cricket" name="ho[]">
                <label class="form-check-label" for="inlineCheckbox1">Cricket</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Esports" name="ho[]">
                <label class="form-check-label" for="inlineCheckbox2">Esports</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Music" name="ho[]">
                <label class="form-check-label" for="inlineCheckbox3">Music</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="Dance" name="ho[]">
                <label class="form-check-label" for="inlineCheckbox4">Dance</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="Singing" name="ho[]">
                <label class="form-check-label" for="inlineCheckbox5">Singing</label>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-success mt-3">Submit</button>
        </div>
    </form>
    <?php if($_SERVER["REQUEST_METHOD"] == "POST"){?>
    <table class="table container border mt-5">
        <thead class="thead-dark">
            <tr>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>City</th>
                <th>Gender</th>
                <th>Country</th>
                <th>Mobile Number</th>
                <th>Hobbies</th>
            </tr>
        </thead>
        <tr>
            <td><?php echo $fnameo ?></td>
            <td><?php echo $mname ?></td>
            <td><?php echo $lname ?></td>
            <td><?php echo $email ?></td>
            <td><?php echo $age ?></td>
            <td><?php echo $city ?></td>
            <td><?php echo $gender ?></td>
            <td><?php echo $country ?></td>
            <td><?php echo $fmno ?></td>
            <td><?php
            if ($ho === null) {
                echo "null";
            } else {
                if (isset($_POST["ho"])) {
                    $ho = $_POST["ho"];
                    foreach ($ho as $x) {
                        echo " " . $x . " ";
                    }
                }
            }
            ?></td>
        </tr>
    </table>
    <?php }?>
</body>

</html>