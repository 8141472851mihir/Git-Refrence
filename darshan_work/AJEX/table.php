<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background-color: #f0f0f0;
        }

        .form-select {
            width: 200px;
        }
    </style>

<script>
    $(document).ready(function() {

        $(".state-select").on("change", function() {
            let state = $(this).val();
            let row = $(this).closest("tr");
            let cityDropdown = row.find(".city-select");
            cityDropdown.empty().append('<option value="" disabled selected>Loading...</option>');

            $.ajax({
                url: "getCity.php",
                type: "GET",
                data: {
                    state: state
                },
                dataType: "json",
                success: function(response) {
                    cityDropdown.empty().append('<option value="" disabled selected>-- Select --</option>');
                    response.cities.forEach(city => {
                        cityDropdown.append(`<option value="${city}">${city}</option>`);
                    });
                },
                error: function() {
                    alert("Error fetching cities. Please try again.");
                    cityDropdown.empty().append('<option value="" disabled selected>-- Select --</option>');
                }
            });
        });

        $(".user-status").on("change", function() {
            let row = $(this).closest("tr");
            let state = row.find(".state-select").val();
            let city = row.find(".city-select").val();
            let remarkCell = row.find(".remark");
            let stateDropdown = row.find(".state-select");
            let cityDropdown = row.find(".city-select");

            if (!state || !city) {
                alert("Please select both State and City before changing status.");
                $(this).prop("checked", false);
                return;
            }

            if ($(this).is(":checked")) {
                remarkCell.text("Active").removeClass("text-danger").addClass("text-success");
                stateDropdown.prop("disabled", false);
                cityDropdown.prop("disabled", false);
            } else {
                remarkCell.text("User Deactivated").removeClass("text-success").addClass("text-danger");
                stateDropdown.prop("disabled", true);
                cityDropdown.prop("disabled", true);
            }
        });
    });
</script>

</head>

<body>
    <div class="container-fluid mt-5 p-2 shadow bg-white">
        <h1 class="text-center text-muted border-2 border-bottom">USER DATA</h1>
        <table class="table table-striped table-bordered mt-3">
            <thead class="table-success">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Email</th>
                    <th>State</th>
                    <th>City</th>
                    <th>Action</th>
                    <th>Remark</th>
                </tr>
            </thead>

            <tbody>
                <script>
                    let users = [

                        ["Darshan", 25, "darshan@gmail.com"],
                        ["Amit", 28, "amit@gmail.com"],
                        ["Raj", 22, "raj@gmail.com"],
                        ["Nisha", 26, "nisha@gmail.com"],
                        ["Karan", 30, "karan@gmail.com"],
                        ["Priya", 24, "priya@gmail.com"],
                        ["Vikram", 27, "vikram@gmail.com"],
                        ["Sneha", 23, "sneha@gmail.com"],
                        ["Rohit", 29, "rohit@gmail.com"],
                        ["Neha", 31, "neha@gmail.com"]
                    ];
                    let states = ["Gujarat", "Kerala", "Maharashtra", "Delhi", "Punjab", "Rajasthan", "Uttarakhand", "Bihar", "Karnataka", "Chhattisgarh"];
                    users.forEach((user, index) => {
                        document.write(`
                    <tr>
                        <td>${index + 1}</td>
                        <td>${user[0]}</td>
                        <td>${user[1]}</td>
                        <td>${user[2]}</td>
                        <td>
                            <select class="form-select state-select">
                                <option value="" disabled selected>-- Select --</option>
                                ${states.map(state => `<option value="${state}">${state}</option>`).join('')}
                            </select>
                        </td>
                        <td>
                            <select class="form-select city-select">
                                <option value="" disabled selected>-- Select --</option>
                            </select>
                        </td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input user-status" type="checkbox">
                                <label class="form-check-label">Status</label>
                            </div>
                        </td>
                        <td class="remark text-danger">User Deactivated</td>
                    </tr>
                    `);

                    });
                </script>
            </tbody>
        </table>
    </div>
</body>

</html>