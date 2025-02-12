<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Handling Form 1</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="border container mt-5">
        <?php
        extract($_POST);
        // $name = $fname;
        
        ?>
        <div>
            <h1>Handling The Value</h1>
            <h5>NAME: <?php echo $fname ?></h5>
            <h5>AGE: <?php echo $fage ?></h5>
            <h5>Number: <?php echo $fmno ?></h5>
            <h5>Email: <?php echo $femail ?></h5>
        </div>

        <div>
            <h1>Here is the information of Server</h1>
            <h5>Server Name: <?php echo $_SERVER['SERVER_NAME'] ?></h5>
            <h5>Server Port: <?php echo $_SERVER['SERVER_PORT'] ?></h5>
            <h5>Server Protocol: <?php echo $_SERVER['SERVER_PROTOCOL'] ?></h5>
            <h5>Server Script Name: <?php echo $_SERVER['SCRIPT_NAME'] ?></h5>
            <h5>Server Method: <?php echo $_SERVER['REQUEST_METHOD'] ?></h5>
        </div>
        <div>
            <h1>Using $_REQUEST Super Global Variable</h1>
            <?php
            $name = htmlspecialchars($_REQUEST['fname']);
            $age = htmlspecialchars($_REQUEST['fage']);
            $mno = htmlspecialchars($_REQUEST['fmno']);
            $email = htmlspecialchars($_REQUEST['femail']);
            ?>
            <h5>NAME: <?php echo $name ?></h5>
            <h5>AGE: <?php echo $age ?></h5>
            <h5>Number: <?php echo $mno ?></h5>
            <h5>Email: <?php echo $email ?></h5>
        </div>
    </div>
</body>

</html>