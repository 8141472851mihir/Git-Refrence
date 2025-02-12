<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body>
    <?php
    $country = array(
        "India" => array(
            "Gujarat" => array("Ahmedabad", "Surat", "Vadodara"),
            "Maharashtra" => array("Mumbai", "Pune", "Nagpur"),
            "Rajasthan" => array("Jaipur", "Jodhpur", "Udaipur"),
            "Tamil Nadu" => array("Chennai", "Coimbatore", "Madurai"),
            "Kerala" => array("Thiruvananthapuram", "Kochi", "Kozhikode")
        ),
        "USA" => array(
            "California" => array("Los Angeles", "San Diego", "San Jose"),
            "Florida" => array("Miami", "Tampa", "Orlando"),
            "New York" => array("New York City", "Buffalo", "Rochester"),
            "Texas" => array("Houston", "San Antonio", "Dallas"),
            "Washington" => array("Seattle", "Spokane", "Tacoma")
        ),
        "UAE" => array(
            "Abu Dhabi" => array("Abu Dhabi City", "Al Ain", "Liwa Oasis"),
            "Ajman" => array("Ajman City", "Masfout", "Manama"),
            "Dubai" => array("Dubai City", "Hatta", "Jebel Ali"),
            "Sharjah" => array("Sharjah City", "Khor Fakkan", "Dibba Al-Hisn"),
            "Fujairah" => array("Fujairah City", "Dibba Al-Fujairah", "Masafi")
        ),
        "Canada" => array(
            "Ontario" => array("Toronto", "Ottawa", "Mississauga"),
            "Quebec" => array("Montreal", "Quebec City", "Laval"),
            "British Columbia" => array("Vancouver", "Victoria", "Surrey"),
            "Alberta" => array("Calgary", "Edmonton", "Red Deer"),
            "Nova Scotia" => array("Halifax", "Sydney", "Truro")
        ),
        "Australia" => array(
            "New South Wales" => array("Sydney", "Newcastle", "Wollongong"),
            "Victoria" => array("Melbourne", "Geelong", "Ballarat"),
            "Queensland" => array("Brisbane", "Gold Coast", "Cairns"),
            "South Australia" => array("Adelaide", "Mount Gambier", "Port Augusta"),
            "Western Australia" => array("Perth", "Bunbury", "Geraldton")
        )
    );

    ?>
    <div class="container mt-3">
        <h4 class="text-center">Users Data</h4>
        <div class="row">
            <div class="col-md-8 offset-2  rounded-3 p-4 shadow mt-4">
                <form action="display.php" method="post" class="">

                    <div class="mb-3 mt-3">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Your Name" name="name" required>
                    </div>
                    <label for="country">Country:</label>
                    <select class="form-select mt-3" name="country" id="countryid" required>
                        <option value="">--Select Country--</option>
                        <?php foreach ($country as $country_name => $states) { ?>
                            <option value="<?php echo $country_name; ?>"><?php echo $country_name; ?></option>
                        <?php } ?>
                    </select>
                    <label for="state">State:</label>
                    <select id="state" name="state" class="form-select mt-3" required>
                        <option value="">--Select State--</option>
                    </select>

                    <label for="city">City:</label>
                    <select id="city" name="city" class="form-select mt-3" required>
                        <option value="">--Select City--</option>
                    </select>

                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#countryid').change(function () {
                var country_name = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "ajax.php",
                    data: { action: 'getState', country_name: country_name },
                    success: function (response) {
                        $('#state').html(response);
                    }
                });
            });

            $('#state').change(function () {
                var state_name = $(this).val();
                var country_name = $('#countryid').val();
                $.ajax({
                    type: "POST",
                    url: "ajax.php",
                    data: { action: 'getCity', country_name: country_name, state_name: state_name },
                    success: function (response) {
                        $('#city').html(response);
                    }
                });
            });
        });
    </script>
</body>

</html>