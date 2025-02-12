<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>

<?php

// VALIDATION -------------->>>>>>>>>>>>>>>


$fnameErr = $lnameErr = $emailErr = $contactErr = $genderErr = "";
$fname = $lname = $email = $contact = $city = $gender ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) { 
    $fnameErr = "Name is required";
  } else {
    $fname = test_input($_POST["fname"]);
    if (!preg_match("/^[^\d\s][a-zA-Z-' ]*$/",$fname)){
      $fnameErr = "Only letters and white space allowed";
    }
  }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["lname"])) { 
    $lnameErr = "Name is required";
  } else {
    $lname = test_input($_POST["lname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[^\d\s][a-zA-Z-' ]*$/",$lname)) {
      $lnameErr = "Only letters and white space allowed";
    }
  }
}

if (empty($_POST["email"])) {
  $emailErr = "Email is required";
} else {
  $email = test_input($_POST["email"]);
  // check if e-mail address is well-formed
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format";
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["contact"])) { 
    $contactErr = "contact is required";
  } else {
    $contact = test_input($_POST["contact"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[1-9][0-9]{10}$/",$contact)) {
      $contactErr = "10 digit valid";
    }
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $city = test_input($_POST["city"]);
} 



if (empty($_POST["gender"])) {
  $genderErr = "Gender is required";
} else {
  $gender = test_input($_POST["gender"]);
}

?>


<div class="container d-flex justify-content-center mt-3 ">
  <div class="card w-75">
    <div class="card-body">
  <h2 class="title text-center">Registration Form</h2>
  <!-- <form action="/action_page.php"> -->

  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
  <div class="mb-3 mt-3">
      <label for="fname">First Name :<span class="text-danger"> *</span></label>
      <input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname">
      <span class="text-danger"><?php echo $fnameErr;?></span>
    </div>

    <div class="mb-3 mt-3">
      <label for="lname">Last Name :<span class="text-danger"> *</span></label>
      <input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname">
      <span class="text-danger"><?php echo $fnameErr;?></span>

    </div>

    <div class="mb-3 mt-3">
      <label for="email">E-mail :<span class="text-danger"> *</span></label>
      <input type="mailt" class="form-control" id="email" placeholder="Enter E-mail" name="email">
      <span class="text-danger"><?php echo $emailErr;?></span>

    </div>

    <div class="mb-3 mt-3">
      <label for="contact">Contact Number :<span class="text-danger"> *</span></label>
      <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter Your Contact Number" name="con-no.">
      <span class="text-danger"><?php echo $contactErr;?></span>

    </div>

    <label for="city">City :</label>
    <span class="text-danger">*<?php echo $genderErr;?></span>
    <select class="form-select form-select-sm mt-3 mb-3" id="city" name="city">
        <option value="porbandar">Porbandar</option>
        <option value="rajkot">Rajkot</option>
        <option value="junagadha">Junagadha</option>
        <option value="ahmedabad">Ahmedabad</option>
    </select>

    <label for=""> Select Your Gender :</label>
      <span class="text-danger">*<?php echo $genderErr;?></span>
      <br>
    <div class="form-check mb-3">
      <input type="radio" class="form-check-input" id="gender" name="gender" value="Male" checked>
      <label class="form-check-label" for="gender">Male</label>

    </div>
    <div class="form-check mb-3">
      <input type="radio" class="form-check-input" id="gender" name="gender" value="Female" checked>
      <label class="form-check-label" for="gender">Female</label>
    </div>

    <label for="">Select Your Hobby :</label>
    <div class="form-check">
      <input type="checkbox" class="form-check-input" id="checkbox1" name="checkbox[]" value="Cricket" checked>
      <label class="form-check-label" for="checkbox1">Cricket</label>
    </div>
    <div class="form-check">
      <input type="checkbox" class="form-check-input" id="checkbox2" name="checkbox[]" value="Hockey">
      <label class="form-check-label" for="checkbox2">Hockey</label>
    </div>
    <div class="form-check">
    <input type="checkbox" class="form-check-input" id="checkbox3" name="checkbox[]" value="Chess">
      <label class="form-check-label" for="checkbox3">Chess</label>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Submit</button>

    </div>
  </div>


</div>
</form>


<?php
// define variables and set to empty values
// $fname = $lname = $email = $contact = $city = $gender = $checkbox = "";

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//   $fname = ($_POST["fname"]);
//   $lname = ($_POST["lname"]);
//   $email = ($_POST["email"]);
//   $contact = ($_POST["contact"]);
//   $city = ($_POST["city"]);
//   $gender = ($_POST["gender"]);
//   $checkbox = ($_POST["checkbox"]);
// }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$hobby = $_POST['checkbox'];
$value ="";
foreach($hobby as $key){
  $value .= $key . ",";
}

// echo $fname."<br><br>";
// echo $lname."<br><br>";
// echo $email."<br><br>";
// echo $contact."<br><br>";
// echo $city."<br><br>";
// echo $gender."<br><br>";
// echo $value."<br><br>";

// print_r($_POST);
?>

<div class="container">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>E-mail</th>
        <th>Contact No.</th>
        <th>City</th>
        <th>Gender</th>
        <th>Hobby</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td><?php echo $fname ?></td>
        <td><?php echo $lname ?></td>
        <td><?php echo $email ?></td>
        <td><?php echo $contact ?></td>
        <td><?php echo $city ?></td>
        <td><?php echo $gender ?></td>
        <td><?php echo $value ?></td>

      </tr>
    </tbody>

  </table>
</div>
</body>
</html>