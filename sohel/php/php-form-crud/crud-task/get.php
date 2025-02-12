<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Get form page</title>
</head>

<body>
    <div class="container">
        <h2 class="text-center">GET Method</h2>
        <h4>Welcome <?php echo $_GET['name']; ?> .<br>
            Your mobile no. is <?php echo $_GET['mobile']; ?> .<br>
            You are <?php echo $_GET['age']; ?> years old.<br>
            And your email is <?php echo $_GET['email']; ?>.</h4>
        <br>
        <p> Above data is came through a GET method.</p>
    </div>
</body>

</html>