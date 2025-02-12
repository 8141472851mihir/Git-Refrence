<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Request Get And Post Method</title>
</head>

<body>
    <div class="container">
        <div class="card m-4 p-4 ">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                <div class="row">
                    <h1 class="text-center">Student form With POST</h1>
                </div>
                <div class="row ">
                    <label for="name" class="col-sm-2">Enter name: </label>
                    <input type="text" id="name" name="name" class="col-sm-10" placeholder="Enter name"></input>
                </div>
                <br>
                <div class="row pt-4">
                    <label for="number" class="col-sm-2"> Enter Number</label>
                    <input type="number" value="" id="number" name="number" class="col-sm-10" placeholder="Enter Mobile Number"></input>
                </div>
                <br>
                <div class="row pt-4">
                    <label for="age" class="col-sm-2"> Enter Age</label>
                    <input type="number" value="" id="age" name="age" class="col-sm-10" placeholder="Enter Age"></input>
                </div>
                <br>
                <div class="row pt-4">
                    <label for="email" class="col-sm-2"> Enter Email</label>
                    <input type="email" value="" id="email" name="email" class="col-sm-10" placeholder="Enter Email"></input>
                </div>
                <br>
                <div class="row pt-4">
                    <button type="submit" class="col-sm-6">Submit</button>
                    <button type="reset" class="col-sm-6">Reset</button>
                </div>
        </div>
    </div>
    <div class="text-center" >
    <a href="action2.php?name=asd&number=3216549870&age=15&email=asd%40gmail.com"> Request GET</a><br>
    </div>
</body>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars($_REQUEST['name']);
  $number = htmlspecialchars($_REQUEST['number']);
  $age = htmlspecialchars($_REQUEST['age']);
  $email = htmlspecialchars($_REQUEST['email']);
  if (empty($name)) {
    echo "Name is empty <br>";
  } else {
    echo "Name:" .$name ."<br>";
  }
  if (empty($number)) {
    echo "Number is empty <br>";
  } else {
    echo "Number:" .$number ."<br>";
  }
  if (empty($age)) {
    echo "Age is empty <br>";
  } else {
    echo "Age:" .$age ."<br>";
  }
  if (empty($name)) {
    echo "Email is empty <br>";
  } else {
    echo "Email:" .$email."<br>";
  }
}
?>