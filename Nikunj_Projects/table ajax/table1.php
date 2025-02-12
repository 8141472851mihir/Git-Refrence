<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Country</th>
                <th>State</th>
                <th>Toggle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>John</td>
                <td><select class="form-select country" onchange="changestatus(this.value,this)">
                        <option value="" disabled selected>-- Select --</option>
                        <option value="india">India</option>
                        <option value="usa">USA</option>
                        <option value="uk">UK</option>
                    </select></td>
                <td><select class="form-select state">
                        <option value="" disabled selected>-- Select --</option>
                </td></select></td>
                <td>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" disabled>
                    </div>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Jatin</td>
                <td><select class="form-select country" onchange="changestatus(this.value,this)">
                        <option value="" disabled selected>-- Select --</option>
                        <option value="india">India</option>
                        <option value="usa">USA</option>
                        <option value="uk">UK</option>
                    </select></td>
                <td><select class="form-select state">
                        <option value="" disabled selected>-- Select --</option>
                </td></select></td>
                <td>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" disabled>
                    </div>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Ramesh</td>
                <td><select class="form-select country" onchange="changestatus(this.value,this)">
                        <option value="" disabled selected>-- Select --</option>
                        <option value="india">India</option>
                        <option value="usa">USA</option>
                        <option value="uk">UK</option>
                    </select></td>
                <td><select class="form-select state">
                        <option value="" disabled selected>-- Select --</option>
                </td></select></td>
                <td>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" disabled>
                    </div>
                </td>
            </tr>
            <tr>
                <td>4</td>
                <td>Mahesh</td>
                <td><select class="form-select country" onchange="changestatus(this.value,this)">
                        <option value="" disabled selected>-- Select --</option>
                        <option value="india">India</option>
                        <option value="usa">USA</option>
                        <option value="uk">UK</option>
                    </select></td>
                <td><select class="form-select state">
                        <option value="" disabled selected>-- Select --</option>
                </td></select></td>
                <td>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" disabled>
                    </div>
                </td>
            </tr>
            <tr>
                <td>5</td>
                <td>Rakesh</td>
                <td><select class="form-select country" onchange="changestatus(this.value,this)">
                        <option value="" disabled selected>-- Select --</option>
                        <option value="india">India</option>
                        <option value="usa">USA</option>
                        <option value="uk">UK</option>
                    </select></td>
                <td><select class="form-select state">
                        <option value="" disabled selected>-- Select --</option>
                </td></select></td>
                <td>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" disabled>
                    </div>
                </td>
            </tr>
            <tr>
                <td>6</td>
                <td>Dipak</td>
                <td><select class="form-select country" onchange="changestatus(this.value,this)">
                        <option value="" disabled selected>-- Select --</option>
                        <option value="india">India</option>
                        <option value="usa">USA</option>
                        <option value="uk">UK</option>
                    </select></td>
                <td><select class="form-select state">
                        <option value="" disabled selected>-- Select --</option>
                </td></select></td>
                <td>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" disabled>
                    </div>
                </td>
            </tr>
            <tr>
                <td>7</td>
                <td>Divyesh</td>
                <td><select class="form-select country" onchange="changestatus(this.value,this)">
                        <option value="" disabled selected>-- Select --</option>
                        <option value="india">India</option>
                        <option value="usa">USA</option>
                        <option value="uk">UK</option>
                    </select></td>
                <td><select class="form-select state">
                        <option value="" disabled selected>-- Select --</option>
                </td></select></td>
                <td>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" disabled>
                    </div>
                </td>
            </tr>
            <tr>
                <td>8</td>
                <td>Dev</td>
                <td><select class="form-select country" onchange="changestatus(this.value,this)">
                        <option value="" disabled selected>-- Select --</option>
                        <option value="india">India</option>
                        <option value="usa">USA</option>
                        <option value="uk">UK</option>
                    </select></td>
                <td><select class="form-select state">
                        <option value="" disabled selected>-- Select --</option>
                </td></select></td>
                <td>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" disabled>
                    </div>
                </td>
            </tr>
            <tr>
                <td>9</td>
                <td>Deep</td>
                <td><select class="form-select country" onchange="changestatus(this.value,this)">
                        <option value="" disabled selected>-- Select --</option>
                        <option value="india">India</option>
                        <option value="usa">USA</option>
                        <option value="uk">UK</option>
                    </select></td>
                <td><select class="form-select state">
                        <option value="" disabled selected>-- Select --</option>
                </td></select></td>
                <td>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" disabled>
                    </div>
                </td>
            </tr>
            <tr>
                <td>10</td>
                <td>Hitesh</td>
                <td><select class="form-select country" onchange="changestatus(this.value,this)">
                        <option value="" disabled selected>-- Select --</option>
                        <option value="india">India</option>
                        <option value="usa">USA</option>
                        <option value="uk">UK</option>
                    </select></td>
                <td><select class="form-select state">
                        <option value="" disabled selected>-- Select --</option>
                </td></select></td>
                <td>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" disabled>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <script>
        function changestatus(country, row) {
            $.ajax({
                url: 'tdata.php',
                type: 'POST',
                data: {
                    status: country
                },
                success: function(response) {
                    $(row).closest('tr').find('.state').html(response);
                    checkAndEnableToggle(row);
                }
            });
        }

        function checkAndEnableToggle(row) {
            var country = $(row).closest('tr').find('.country').val();
            var state = $(row).closest('tr').find('.state').val();

            if (country && state) {
                $(row).closest('tr').find('.form-check-input').prop('disabled', false);
            } else {
                $(row).closest('tr').find('.form-check-input').prop('disabled', true);
            }
        }

        $(document).on('change', '.country, .state', function() {
            var row = $(this).closest('tr');
            checkAndEnableToggle(row);
        });

        $(document).on('change', '.form-check-input', function() {
            var row = $(this).closest('tr');

            if ($(this).prop('checked')) {
                confirm("The toggle has been checked!");

                $(row).find('.country').prop('disabled', true);
                $(row).find('.state').prop('disabled', true);
            } else {
                $(row).find('.country').prop('disabled', false);
                $(row).find('.state').prop('xdisabled', false);
            }
        });
    </script>

</body>

</html>