<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Using get method</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <!-- <h1>Hello world</h1> -->
    <form class="container mt-5 border rounded p-5" method="get" action="action.php">
        <h3> Form Using Get Method</h3>
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="Text" class="form-control" id="exampleInputEmail1" aria-describedby="Name"
                placeholder="Enter Your Name" name="fname" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Mobile Number</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter Your Mobile Number" name="fmno" pattern="[0-9]{10}" required> 
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter email" name="femail" required>
        </div>
        <div class="form-group ">
            <label for="exampleInputPassword1">Age</label>
            <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Enter Your age" min="18" max="120" required name="fage">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</body>

</html>