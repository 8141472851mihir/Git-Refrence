<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    <?php

    $form_data = array();

    if ($_SERVER['REQUEST_METHOD'] == "POST") {


        $name = $_POST['name'];
        $country = $_POST['country'];
        $state = $_POST['state'];
        $city = $_POST['city'];
        $status = 'Active';

        $new_data = array(
            'name' => $name,
            'country' => $country,
            'state' => $state,
            'city' => $city,
            'status' => $status
        );
        if (file_exists('form_data.json')) {
            $form_data = json_decode(file_get_contents('form_data.json'), true);
            $form_data[] = $new_data;
        } else {
            $form_data[] = $new_data;
        }
        file_put_contents('form_data.json', json_encode($form_data));
    } else {

        // Load the form data from the file
        if (file_exists('form_data.json')) {
            $form_data = json_decode(file_get_contents('form_data.json'), true);
        }

    }

    ?>
    <div class="container">
        <div class="row mt-3">
            <h3 class="text-center">User Details</h3>
            <hr>
            <div class="col-md-12">
                <table class="table table-striped  table-bordered text-center mt-3" id="demo">
                    <thead class="text-center">
                        <tr class="table-primary">
                            <th class="text-center">ID</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Country</th>
                            <th class="text-center">State</th>
                            <th class="text-center">City</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($form_data as $key => $row) { ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['country']; ?></td>
                                <td><?php echo $row['state']; ?></td>
                                <td><?php echo $row['city']; ?></td>
                                <td id="status_<?php echo $key; ?>"><?php echo $row['status']; ?></td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="SwitchCheck<?php echo $key; ?>" <?php if ($row['status'] == 'Active')
                                               echo 'checked'; ?>>
                                        <label class="form-check-label" for="SwitchCheck<?php echo $key; ?>"></label>
                                    </div>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $(".form-check-input").on("change", function () {
                var key = $(this).attr("id").split("SwitchCheck")[1];
                var status = $(this).is(":checked") ? "Active" : "Inactive";
                $.ajax({
                    type: "POST",
                    url: "toggle_status.php",
                    data: {
                        key: key,
                        status: status
                    },
                    success: function (response) {
                        $("#status_" + key).html(status);
                    }
                });
            });
            
        });
    </script>
</body>

</html>