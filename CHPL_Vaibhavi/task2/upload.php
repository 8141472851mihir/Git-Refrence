<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row mt-3" >
            <h3>Upload file</h3>
            <div class="col-md-8">
                <form action="file.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3 mt-3">
                        <label for="Proimg">Upload File:</label>
                        <input type="file" class="form-control" id="Proimg"  name="Proimg">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</body>

</html>