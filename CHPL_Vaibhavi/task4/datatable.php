<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.bootstrap5.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#demo').DataTable();
        });
    </script>
</head>

<body>
    <div class="container">
        <h3 class="text-center mt-4">Data Table</h3>
        <hr>
        <div class="row">
            <div class="col-md-12 mt-3">
                <table id="demo" class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Age</th>
                            <th>City</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = [
                            ["name" => "Helly", "age" => 12, "city" => "Ahmedabad"],
                            ["name" => "Chirag", "age" => 32, "city" => "Surat"],
                            ["name" => "Dixit", "age" => 32, "city" => "Ahmedabad"],
                            ["name" => "Vishal", "age" => 32, "city" => "Bhavnagar"],
                            ["name" => "Purva", "age" => 28, "city" => "Ahmedabad"],
                            ["name" => "Niyati", "age" => 5, "city" => "Nadiad"],
                            ["name" => "Shreya", "age" => 20, "city" => "Rajkot"],
                            ["name" => "jiya", "age" => 2, "city" => "Ahmedabad"],
                            ["name" => "Jiyansh", "age" => 1, "city" => "Ahmedabad"],
                        ];


                        foreach ($data as $showdata) {

                            ?>

                            <tr class="table-primary">
                                <td><?php echo $showdata['name'] ?></td>
                                <td><?php echo $showdata['age'] ?></td>
                                <td><?php echo $showdata['city'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>