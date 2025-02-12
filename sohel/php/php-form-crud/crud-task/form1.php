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
            <div class="card-body">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <h4 class="text-center">PHP Form with validation</h4>
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
                        <label for="name">Name</label>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
                        <label for="email">E-mail</label>
                    </div>
                    <div class="form-floating mt-3 mb-3">
                        <input type="text" class="form-control" id="pass" placeholder="Enter password" name="pass">
                        <label for="pass">Password</label>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="coname" placeholder="Enter company name" name="coname">
                        <label for="coname">Company Name</label>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="city" placeholder="Enter city" name="city">
                        <label for="city">City</label>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="state" placeholder="Enter state" name="state">
                        <label for="state">State</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="check" name="gender" value="Male">
                        <label class="form-check-label" for="check">Male</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="check" name="gender" value="Female">
                        <label class="form-check-label" for="check">Female</label>
                    </div>
                    <div class="mt-3 mb-3">
                        <label for="position" class="form-label">Position :</label>
                        <select class="form-select" id="position" name="position">
                            <option value="PHP">PHP</option>
                            <option value="Flutter">Flutter</option>
                            <option value="React">React</option>
                            <option value="PHP">Android</option>
                        </select>

                    </div>
                    <button type="submit" value="submit" name="submit" class="btn btn-primary mt-2">Submit</button>
                </form>
            </div>
        </div>
    </div>


    <?php

    $name = $email = $cname = $password = $gender = $posi = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        print_r($_POST);
        $name = test_input($_POST["name"]);
        $email = test_input($_POST["email"]);
        $password = test_input($_POST["[pass]"]);
        $cname = test_input($_POST["coname"]);
        $gender = test_input($_POST["gender"]);
        $posi = test_input($_POST["position"]);
    };

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    ?>

    
    
    
    
    
    


    <table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Company</th>
        <th>Gender</th>
        <th>Position</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo $name; ?></td>
        <td><?php echo $email; ?></td>
        <td><?php echo $password; ?></td>
        <td><?php echo $cname; ?></td>
        <td><?php echo $gender; ?></td>
        <td><?php echo $posi; ?></td>
      </tr>
    </tbody>
  </table>




</body>

</html>