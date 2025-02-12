<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Datatable</title>
    <script>$(document).ready(function () {
            $('#data').DataTable();
        });
    </script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <?php
                echo "<h2>json file require</h2> <br>";
                require 'json.php'; ?>
            </div>
            <div class="col-sm-4">
                <?php
                echo "<h2>date and time file include</h2> <br>";
                include 'date_time.php';
                ?>
            </div>
            <div class="col-sm-4">
                <?php
                echo "<h2>date and time file include</h2> <br>";
                include 'exception.php';
                ?>
            </div>
        </div>
    
<div class ="row">
    <h1> Datatable </h1>

    <table id="data" class="display">
        <thead>
            <tr>
                <th>name</th>
                <th>age</th>
                <th>Mobile Number</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>ghi</td>
                <td>15</td>
                <td>548721963</td>
            </tr>
            <tr>
                <td>ghi</td>
                <td>15</td>
                <td>548721963</td>
            </tr>
            <tr>
                <td>ghi</td>
                <td>15</td>
                <td>548721963</td>
            </tr>
            <tr>
                <td>abc</td>
                <td>10</td>
                <td>3216549870</td>
            </tr>
            <tr>
                <td>def</td>
                <td>22</td>
                <td>9876543210</td>
            </tr>
            <tr>
                <td>def</td>
                <td>22</td>
                <td>9876543210</td>
            </tr>
            <tr>
                <td>ghi</td>
                <td>15</td>
                <td>548721963</td>
            </tr>
            <tr>
                <td>ghi</td>
                <td>15</td>
                <td>548721963</td>
            </tr>
            <tr>
                <td>ghi</td>
                <td>15</td>
                <td>548721963</td>
            </tr>
            <tr>
                <td>ghi</td>
                <td>15</td>
                <td>548721963</td>
            </tr>
            <tr>
                <td>def</td>
                <td>22</td>
                <td>9876543210</td>
            </tr>
            <tr>
                <td>ghi</td>
                <td>15</td>
                <td>548721963</td>
            </tr>
            <tr>
                <td>ghi</td>
                <td>15</td>
                <td>548721963</td>
            </tr>
            <tr>
                <td>ghi</td>
                <td>15</td>
                <td>548721963</td>
            </tr>
            <tr>
                <td>ghi</td>
                <td>15</td>
                <td>548721963</td>
            </tr>
            <tr>
                <td>def</td>
                <td>22</td>
                <td>9876543210</td>
            </tr>
            <tr>
                <td>def</td>
                <td>22</td>
                <td>9876543210</td>
            </tr>
            <tr>
                <td>ghi</td>
                <td>15</td>
                <td>548721963</td>
            </tr>
            <tr>
                <td>ghi</td>
                <td>15</td>
                <td>548721963</td>
            </tr>
            <tr>
                <td>ghi</td>
                <td>15</td>
                <td>548721963</td>
            </tr>
            <tr>
                <td>ghi</td>
                <td>15</td>
                <td>548721963</td>
            </tr>
            <tr>
                <td>def</td>
                <td>22</td>
                <td>9876543210</td>
            </tr>
            <tr>
                <td>def</td>
                <td>22</td>
                <td>9876543210</td>
            </tr>
            <tr>
                <td>abc</td>
                <td>10</td>
                <td>3216549870</td>
            </tr>
            <tr>
                <td>ghi</td>
                <td>15</td>
                <td>548721963</td>
            </tr>
            <tr>
                <td>ghi</td>
                <td>15</td>
                <td>548721963</td>
            </tr>
            <tr>
                <td>ghi</td>
                <td>15</td>
                <td>548721963</td>
            </tr>
            <tr>
                <td>abc</td>
                <td>10</td>
                <td>3216549870</td>
            </tr>
            <tr>
                <td>abc</td>
                <td>10</td>
                <td>3216549870</td>
            </tr>
            <tr>
                <td>abc</td>
                <td>10</td>
                <td>3216549870</td>
            </tr>
            <tr>
                <td>ghi</td>
                <td>15</td>
                <td>548721963</td>
            </tr>
        </tbody>
    </table>
    </div>
    </div>
</body>

</html>