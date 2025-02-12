<?php
require 'data.php';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Table Examples</title>

    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#data').DataTable();
        });
    </script>
</head>

<body>
    <div class="container">
        <table class="table table-bordered table-hover table-striped" id="data">
            <thead >
                <tr>
                    <th colspan="9" class="text-center">All Students Data</th>
                </tr>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>Subject</th>
                    <th>Gender</th>
                    <th>Degree</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php foreach ($data as $row): ?>

                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                        <td><?php echo $row['city']; ?></td>
                        <td><?php echo $row['state']; ?></td>
                        <td><?php echo $row['country']; ?></td>
                        <td><?php echo $row['subject']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['degree']; ?></td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>