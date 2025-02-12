<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Hello User</title>
</head>
<body>
<div class="container">
    <div class="card m-3 p-4">
        <div class="row">
        <h2 class="text-center">Request GET method output</h2>
        Welcome <?php echo $_REQUEST["name"]; ?><br>
        Your Email address is: <?php echo $_REQUEST["email"]; ?><br>
        Your Age is: <?php echo $_REQUEST["age"]; ?><br>
        Your Number is: <?php echo $_REQUEST["number"]; ?><br>
        </div>
    </div>
</div>
    
</body>
</html>