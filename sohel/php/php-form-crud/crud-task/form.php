<!DOCTYPE html>
<html lang="en">

<head>
    <title>PHP Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container mt-3">
        <h2>PHP - Form GET method</h2>
        <p>This form will redirect to the GET page:</p>
        <form action="get.php" method="get">
            <div class="form-floating mb-3 mt-3">
                <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
                <label for="name">Name</label>
            </div>
            <div class="form-floating mt-3 mb-3">
                <input type="number" class="form-control" id="mobile" placeholder="Enter Mobile" name="mobile">
                <label for="mobile">Mobile</label>
            </div>
            <div class="form-floating mt-3 mb-3">
                <input type="number" class="form-control" id="age" placeholder="Enter Age" name="age">
                <label for="age">Age</label>
            </div>
            <div class="form-floating mt-3 mb-3">
                <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
                <label for="email">Email</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <div class="container mt-5">
        <h2>PHP - Form POST method</h2>
        <p>This form will redirect to the POST page:</p>
        <form action="post.php" method="post">
            <div class="form-floating mb-3 mt-3">
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                <label for="name">Name</label>
            </div>
            <div class="form-floating mt-3 mb-3">
                <input type="number" class="form-control" id="mobile" placeholder="Enter Mobile" name="mobile">
                <label for="mobile">Mobile</label>
            </div>
            <div class="form-floating mt-3 mb-3">
                <input type="number" class="form-control" id="age" placeholder="Enter Age" name="age">
                <label for="age">Age</label>
            </div>
            <div class="form-floating mt-3 mb-3">
                <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
                <label for="email">Email</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <div class="container mt-5">
        <h2>PHP - Form REQUEST method</h2>
        <p>This form will redirect to the POST page:</p>
        <form action="request.php" >
            <div class="form-floating mb-3 mt-3">
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                <label for="name">Name</label>
            </div>
            <div class="form-floating mt-3 mb-3">
                <input type="number" class="form-control" id="mobile" placeholder="Enter Mobile" name="mobile">
                <label for="mobile">Mobile</label>
            </div>
            <div class="form-floating mt-3 mb-3">
                <input type="number" class="form-control" id="age" placeholder="Enter Age" name="age">
                <label for="age">Age</label>
            </div>
            <div class="form-floating mt-3 mb-3">
                <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
                <label for="email">Email</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>

</html>