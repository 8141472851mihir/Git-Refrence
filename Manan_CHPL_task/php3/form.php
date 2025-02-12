<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Latest compiled and minified CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Latest compiled JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <title>Registration Form</title>
</head>

<body>
  <?php
  error_reporting(0);
  // define variables and set to empty values
  $nameErr = $emailErr = $numberErr = $ageErr = $dobErr = $name1Err = "";
  $name = $email = $language = $number = $age = $dob = $name1 = "";
  $hobbies = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
    } else {
      $name = test_input($_POST["name"]);
      if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        $nameErr = "Only letters and white space allowed";
      }
    }
    if (empty($_POST["name1"])) {
      $name1Err = "nickname is required";
    } else {
      $name1 = test_input($_POST["name1"]);
      if (!preg_match("/^[A-Za-z0-9]+$^/", $name1)) {
        $name1Err = "Only letters allowed";
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

    if (empty($_POST["number"])) {
      $numberErr = "Enter valid number";
    } else {
      $number = test_input($_POST["number"]);
      if (!preg_match("/^(\+\d{1,3}[- ]?)?\d{10}$/", $number)) {
        $numberErr = "Enter Valid Number";
      }
    }
    if (empty($_POST["dob"])) {
      $dobErr = "Date is required";
    } else {
      $dob = test_input($_POST["dob"]);
    }
    if (empty($_POST["age"])) {
      $ageErr = "Age is required";
    } else {
      $age = test_input($_POST["age"]);
    }

    $language = test_input($_POST["language"]);


  }

  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>

  <div class="container w-75 p-5 pt-1">
    <div class="card  m-5 p-5 ">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="row">
          <h1 class="text-center pb-4">Student Information form</h1>
        </div>
        <div class="row">
          <label for="name" class="col-sm-3">Enter Full Name : </label>
          <input type="text" id="name" name="name" class="col-sm-5" placeholder="[first name][middle name][last name]" minlength="2"
            maxlength="30" >
          <span class="error text-danger col-sm-2">* <?php echo $nameErr; ?></span>
        </div>
        <br>
        <div class="row">
          <label for="name1" class="col-sm-3">Enter Nickame : </label>
          <input type="text" id="name1" name="name1" class="col-sm-5" placeholder="nickname" minlength="2"
            maxlength="10" >
          <span class="error text-danger col-sm-2">* <?php echo $name1Err; ?></span>
        </div>
        <br>
        <div class="row pt-4">
          <label for="number" class="col-sm-3"> Enter Number</label>
          <input type="phone" value="" id="number" name="number" class="col-sm-5" placeholder="Enter Mobile Number"
           maxlength="10" >
          <span class="error text-danger col-sm-2">* <?php echo $numberErr; ?></span>
        </div>
        <br>
        <div class="row pt-4">
          <label for="age" class="col-sm-3"> Enter Age</label>
          <input type="number" value="" id="age" name="age" class="col-sm-5" placeholder="Enter Age" >
          <span class="error text-danger col-sm-2">* <?php echo $ageErr; ?></span>
        </div>
        <br>
        <div class="row pt-4">
          <label for="email" class="col-sm-3"> Enter Email</label>
          <input type="email" value="" id="email" name="email" class="col-sm-5" placeholder="Enter Email" >
          <span class="error text-danger col-sm-2">* <?php echo $emailErr; ?></span>
        </div>
        <div class="row pt-4">
          <label for="dob" class="col-sm-3"> Enter Date of Birth</label>
          <input type="date" value="" id="dob" name="dob" class="col-sm-5" placeholder="Enter Date Of Birth" >
          <span class="error text-danger col-sm-2">* <?php echo $dobErr; ?></span>
        </div>
        <div class="row text-left pt-4">
          <label for="hobbies" class="col-sm-3"> Enter Hobbies</label>
          <div class="col-sm-2"><input type="checkbox" id="hobbies1" name="hobbies[]" value="game">
            <label for="hobbies1"> Game</label>
          </div>
          <div class="col-sm-2"><input type="checkbox" id="hobbies2" name="hobbies[]" value="sport">
            <label for="hobbies2"> Sports</label>
          </div>
          <div class="col-sm-2"><input type="checkbox" id="hobbies3" name="hobbies[]" value="music">
            <label for="hobbies3">Music</label>
          </div>

          <div class="row">
            <div class="col-sm-3">
              <p></p>
            </div>
            <div class="col-sm-3"><input type="checkbox" id="hobbies4" name="hobbies[]" value="book">
              <label for="hobbies4">Books Reading</label>
            </div>
            <div class="col-sm-2"><input type="checkbox" id="hobbies5" name="hobbies[]" value="traveling ">
              <label for="hobbies5"> Traveling </label>
            </div>
          </div>
          <?php
          if (isset($_POST['hobbies'])) {
            $hobbies = $_POST['hobbies'];

          }
          ?>
        </div>
        <br>
        <div class="row">
          <div class="col-sm-3">
            <p>favorite Web language:</p>
          </div>
          <div class="col-sm-2">
            <input type="radio" id="html" name="language" value="HTML">
            <label for="html">HTML</label><br>
          </div>
          <div class="col-sm-2"><input type="radio" id="css" name="language" value="CSS">
            <label for="css">CSS</label><br>
          </div>
          <div class="col-sm-2"><input type="radio" id="javascript" name="language" value="JavaScript">
            <label for="javascript">JavaScript</label>
          </div>
        </div>
        <div class=" shadow row  -5">
          <button type="submit" class="col-sm-6 bg-primary text-white ">Submit</button>
          <button type="reset" class="col-sm-6 ">Reset</button>
        </div>
    </div>
  </div>
  <div class="m-3">
    <h2>User Input</h2>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>name</th>
          <th>nickname</th>
          <th>Number</th>
          <th>Age</th>
          <th>Email</th>
          <th>Date Of Birth</th>
          <th>hobbies</th>
          <th>web language</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php if ($name == null) {
            echo "null";
          } else {
            echo $name;
          } ?></td>
          <td><?php if ($name1 == null) {
            echo "null";
          } else {
            echo $name1;
          } ?></td>
          <td><?php if ($number == null) {
            echo "null";
          } else {
            echo $number;
          } ?></td>
          <td><?php if ($age == null) {
            echo "null";
          } else {
            echo $age;
          } ?></td>
          <td><?php if ($email == null) {
            echo "null";
          } else {
            echo $dob;
          } ?></td>
          <td><?php if ($dob == null) {
            echo "null";
          } else {
            echo $dob;
          } ?></td>
          <td><?php if ($hobbies == null) {
            echo "null";
          } else {
            foreach ($hobbies as $x) {
              echo $x . " ";
              // echo "<br>";
            }


          } ?></td>
          <td>
            <?php if ($language == null) {
              echo "null";
            } else {
              echo $language;
            } ?>
          </td>
        </tr>
      </tbody>
    </table>

  </div>

  </div>
</body>

</html>