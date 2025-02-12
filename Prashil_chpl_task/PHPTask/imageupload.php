<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <form class="container mt-5 border rounded p-5" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputEmail1">Upload Image</label>
            <input type="File" class="form-control" id="exampleInputEmail1" aria-describedby="Name"
                placeholder="Enter Your Name" name="file" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button><br>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
                $fileName = $_FILES['file']['name'];
                $fileTmpPath = $_FILES['file']['tmp_name'];
                $uploadDir = 'uploads/';

                // Ensure the uploads directory exists
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }

                $destPath = $uploadDir . $fileName;

                if (move_uploaded_file($fileTmpPath, $destPath)) {
                    echo "File uploaded successfully!<br>";
                    echo "File name: " . $fileName;
                } else {
                    echo "There was an error moving the uploaded file.";
                }
            } else {
                echo "No file uploaded or there was an error uploading the file.";
            }
        }
        ?>
    </form>
</body>

</html>