<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


    <title>data table</title>
    <style>
        select {
            width: 150px;
            border-radius: 5px;
        }

        select:hover {
            box-shadow: 0 0 11px rgba(33, 33, 33, .2);
        }
    </style>
</head>

<body>
    <div class="container mt-3">
        <table class="table table-striped text-center ">
            <tr>
                <th>id</th>
                <th>name</th>
                <th>country</th>
                <th>state</th>
                <th>action</th>
            </tr>
            <tr>
                <td>1</td>
                <td>veer</td>
                <td>
                    <div class="form-group">
                        <select class="country" onchange="countrystatus(this)">
                            <option>Select</option>
                            <option value="china">China</option>
                            <option value="india">India</option>
                            <option value="unitedstate">United State</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <select id="state">
                            <option>Select State</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="form-check form-switch">
                        <input class="form-check-input status-toggle" type="checkbox" role="switch"
                            id="flexSwitchCheckDefault" checked>
                    </div>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>raj</td>
                <td>
                    <div class="form-group">
                        <select class="country" onchange="countrystatus(this)">
                            <option>Select</option>
                            <option value="china">China</option>
                            <option value="india">India</option>
                            <option value="unitedstate">United State</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <select id="state">
                            <option>Select State</option>
                        </select>
                    </div>
                </td>
                <td style="display: flex; align-items: center;">
                    <div class="form-check form-switch">
                        <input class="form-check-input status-toggle" type="checkbox" role="switch"
                            id="flexSwitchCheckDefault" checked>

                    </div>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>jay</td>
                <td>
                    <div class="form-group">
                        <select class="country" onchange="countrystatus(this)">
                            <option>Select</option>
                            <option value="china">China</option>
                            <option value="india">India</option>
                            <option value="unitedstate">United State</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <select id="state">
                            <option>Select State</option>
                        </select>
                    </div>
                </td>
                <td style="display: flex; align-items: center;">
                    <div class="form-check form-switch">
                        <input class="form-check-input status-toggle" type="checkbox" role="switch"
                            id="flexSwitchCheckDefault" checked>

                    </div>
                </td>
            </tr>
            <tr>
                <td>4</td>
                <td>om</td>
                <td>
                    <div class="form-group">
                        <select class="country" onchange="countrystatus(this)">
                            <option>Select</option>
                            <option value="china">China</option>
                            <option value="india">India</option>
                            <option value="unitedstate">United State</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <select id="state">
                            <option>Select State</option>
                        </select>
                    </div>
                </td>
                <td style="display: flex; align-items: center;">
                    <div class="form-check form-switch">
                        <input class="form-check-input status-toggle" type="checkbox" role="switch"
                            id="flexSwitchCheckDefault" checked>

                    </div>
                </td>
            </tr>
            <tr>
                <td>5</td>
                <td>rajveer</td>
                <td>
                    <div class="form-group">
                        <select class="country" onchange="countrystatus(this)">
                            <option>Select</option>
                            <option value="china">China</option>
                            <option value="india">India</option>
                            <option value="unitedstate">United State</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <select id="state">
                            <option>Select State</option>
                        </select>
                    </div>
                </td>
                <td style="display: flex; align-items: center;">
                    <div class="form-check form-switch">
                        <input class="form-check-input status-toggle" type="checkbox" role="switch"
                            id="flexSwitchCheckDefault" checked>

                    </div>
                </td>
            </tr>
            <tr>
                <td>6</td>
                <td>varun</td>
                <td>
                    <div class="form-group">
                        <select class="country" onchange="countrystatus(this)">
                            <option>Select</option>
                            <option value="china">China</option>
                            <option value="india">India</option>
                            <option value="unitedstate">United State</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <select id="state">
                            <option>Select State</option>
                        </select>
                    </div>
                </td>
                <td style="display: flex; align-items: center;">
                    <div class="form-check form-switch">
                        <input class="form-check-input status-toggle" type="checkbox" role="switch"
                            id="flexSwitchCheckDefault" checked>

                    </div>
                </td>
            </tr>
        </table>
    </div>
    <script>
        function countrystatus(element) {
            var country = element.value;
            var row = $(element).closest("tr");
            var stateDropdown = row.find("#state");

            $.ajax({
                type: 'POST',
                url: 'state.php',
                data: { status: country },
                success: function (response) {
                    var jobj = $.parseJSON(response);
                    var output = '<option value="" disabled selected>-- Select State --</option>';

                    jobj.forEach(state => {
                        output += `<option>${state}</option>`;
                    });

                    stateDropdown.html(output);
                }
            });
        }

        $(document).on('change', '.status-toggle', function () {
            const isActive = $(this).is(':checked');  // Check if toggle is checked
            const row = $(this).closest('tr');        // Get the row of the toggle

            // Find the country and state dropdowns in the same row
            const countryDropdown = row.find('.country');
            const stateDropdown = row.find('#state');

            // Enable or disable the dropdowns based on the toggle
            if (isActive) {
                alert('Account Activated');
                countryDropdown.prop('disabled', false);
                stateDropdown.prop('disabled', false);
            } else {
                alert('Account Deactivated');
                countryDropdown.prop('disabled', true);
                stateDropdown.prop('disabled', true);
            }
        });
        document.addEventListener('contextmenu', (e) => e.preventDefault());

        function ctrlShiftKey(e, keyCode) {
            return e.ctrlKey && e.shiftKey && e.keyCode === keyCode.charCodeAt(0);
        }

        document.onkeydown = (e) => {
            // Disable F12, Ctrl + Shift + I, Ctrl + Shift + J, Ctrl + U
            if (
                event.keyCode === 123 ||
                ctrlShiftKey(e, 'I') ||
                ctrlShiftKey(e, 'J') ||
                ctrlShiftKey(e, 'C') ||
                (e.ctrlKey && e.keyCode === 'U'.charCodeAt(0))
            )
                return false;
        };

    </script>
</body>

</html>