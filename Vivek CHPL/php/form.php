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
            $fnameErr = $lnameErr = $numberErr = $emailErr = $genderErr = "";
            $fname = $lname = $number = $email = $from = $to = $gender = "";
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") 
            {
              if (empty($_POST["fname"])) {
                $fnameErr = "First Name is required";
              } else {
                if (!preg_match("/^[a-zA-Z]*$/",$_POST['fname'])) {
                    $fnameErr = "Only letters allowed With No Space";
                  }
               else{
                $fname = test_input($_POST["fname"]);
               }
              }

              if (empty($_POST["lname"])) {
                $lnameErr = "Last Name is required";
              } else {
                if (!preg_match("/^[a-zA-Z]*$/",$_POST['lname'])) {
                  $lnameErr = "Only letters allowed With No Space";
                }
                else{
                  $lname = test_input($_POST["lname"]);
                }
              }
              
              if (empty($_POST["number"])) {
                $numberErr = "Number is required";
              } else {
                if (!preg_match('/^[0-9]{10}$/', $_POST['number'])) {
                  $numberErr="Enter Only 10 Digit";
              } else {
                $number = test_input($_POST["number"]);
              }
              }
                
              if (empty($_POST["email"])) {
                $emailErr = "Email is required";
              } else {
                if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
                {
                  $emailErr = "Invalid email format";
                }
                else{
                $email = test_input($_POST["email"]);

                }
              }
            
              if (empty($_POST["from"])) {
                $from = "";
              } else {
                $from = test_input($_POST["from"]);
              }

              if (empty($_POST["to"])) {
                $to = "";
              } else {
                $to = test_input($_POST["to"]);
              }
            
              if (empty($_POST["gender"])) {
                $genderErr = "Gender is required";
              } else {
                $gender = test_input($_POST["gender"]);
              }
            }
            
            function test_input($data) {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
            }
        ?>

    <div class="container mt-3 col-6 border border-black">

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <div class="h1 bg-primary text-light text-center">Book Your Ticket</div>
            <div class="form-group">
                <label for="fname">First Name : <span class="text-danger">*<?php echo $fnameErr;?></span></label>
                <input type="text" class="form-control" id="fname" name="fname">
            </div>
            <br>
            <div class="form-group">
                <label for="lname">Last Name : <span class="text-danger">*<?php echo $lnameErr;?></span></label>
                <input type="text" class="form-control" id="lname" name="lname">
            </div>
            <br>
            <div class="form-group">
                <label for="number">Number : <span class="text-danger">*<?php echo $numberErr;?></span></label>
                <input type="text" class="form-control" id="number" name="number">
             </div>
             <br>
            <div class="form-group">
                <label for="email">Email address : <span class="text-danger">*<?php echo $emailErr;?></span></label>
                <input type="text" class="form-control" id="email" name="email">
             </div>
             <br>
            <div class="form-group">
                <label for="from">From :</label>
                <select class="form-select" id="from" name="from">
                    <option value="">--Select--</option> 
                    <option>Bhavnagar</option>
                    <option>Ahmedabad</option>
                    <option>Surat</option>
                    <option>Rajkot</option>
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="to">To :</label>
                <select class="form-select" id="to" name="to">
                    <option value="">--Select--</option> 
                    <option>Bhavnagar</option>
                    <option>Ahmedabad</option>
                    <option>Surat</option>
                    <option>Rajkot</option>
                </select>
            </div>
            <br>
            <label for="gender">Gender : <span class="text-danger">*<?php echo $genderErr;?></span></label>
            <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" id="male" name="gender" value="Male">Male
                <label class="form-check-label" for="male"></label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" id="female" name="gender" value="Female">Female
                <label class="form-check-label" for="female"></label>
            </div>
            <br><br>
            <div class="checkbox">
                <label><input type="checkbox"> I agree upon terms & conditions</label>
            </div>
            <br><hr>
            <!-- <input type="submit" value="submit"> -->
            <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary" value="submit">Submit</button>
            </div>
          </form>
        
    </div>

    <!-- ?php
            echo "<center>";
            echo "<h2>Your Input:</h2>";
            echo $fname;
            echo "<br>";
            echo $lname;
            echo "<br>";
            echo $number;
            echo "<br>";
            echo $email;
            echo "<br>";
            echo $from;
            echo "<br>";
            echo $to;
            echo "<br>";
            echo $gender;
            echo "</center>";
            echo "<table class="table table-hover">";
            echo "<thead>";
            echo "<tr>";
            
            echo "</tr>";
            echo "</thead>";
            echo "</table>";
    ? -->
    <br><br>
    <div class="container w-75">
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") : ?>
        <h2>Your Input:</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Field</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>First Name</td><td><?php echo $fname; ?></td></tr>
                <tr><td>Last Name</td><td><?php echo $lname; ?></td></tr>
                <tr><td>Number</td><td><?php echo $number; ?></td></tr>
                <tr><td>Email</td><td><?php echo $email; ?></td></tr>
                <tr><td>From</td><td><?php echo $from; ?></td></tr>
                <tr><td>To</td><td><?php echo $to; ?></td></tr>
                <tr><td>Gender</td><td><?php echo $gender; ?></td></tr>
            </tbody>
        </table>
    <?php endif; ?>
    </div>

</body>
</html>