<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"
        integrity="sha512-b+nQTCdtTBIRIbraqNEwsjB6UvL3UEMkXnhzd8awtCYh0Kcsjl9uEgwVFVbhoj3uu1DO1ZMacNvLoyJJiNfcvg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>FORM GET METHOD</title>
</head>

<body>
    <div class="container m-2"> 
        <div class="card p-2 m-3">
            <h1>Form Using Get</h1>

            <form action="show(request).php" method=POST>
                <label for="name">Name :</label>
                <input type="text" id="name" name="name" class="form-control" minlength="2" maxlength="30 " required>

                <label for="mobile">Phone no :</label>
                <input type="phone" id="mobile"  class="form-control" name="mobile">

                <label for="age">Age :</label>
                <input type="number" id="age" name="age" class="form-control" minlength="2" maxlength="3">

                <label for="email">E-mail :</label>
                <input type="email" id="email" class="form-control" name="email">

                <button type="submit" class="btn mt-2 bg-dark text-white">SUBMIT</button>

            </form>
        </div>
    </div>

</body>

</html>