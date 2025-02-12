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
        <h3 class="text-center mt-4 text-danger">Users Data</h3>
        <hr>
        <div class="row">
            <div class="col-md-12 mt-3">
                <table id="demo" class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Age</th>
                            <th class="text-center">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $usejsonobj = file_get_contents("https://dummyjson.com/users");
                        $newusers = json_decode($usejsonobj, true);

                        foreach ($newusers['users'] as $user) {
                            
                            ?>

                            <tr class="table-primary">
                                <td class="text-center"><?php echo $user['id'] ?></td>
                                <td class="text-center"><?php echo $user['firstName'] ?></td>
                                <td class="text-center"><?php echo $user['age'] ?></td>
                                <td class="text-center"><?php echo $user['email'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>