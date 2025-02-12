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
    <div class="container mt-3">
        <h2>User Form</h2>
        <div class="row ms-auto">
            <div class="col-md-12">
                <form action="action.php" method="GET">
                    <div class="mb-3 mt-3">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="mo_no">Mobile:</label>
                        <input type="number" class="form-control" id="mo_no" placeholder="Enter Mobile number"
                            name="mo_no">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="age">Age:</label>
                        <input type="text" class="form-control" id="age" placeholder="Enter Age" name="age">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Your Email" name="email">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

