<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>AJAX Table</title>
</head>

<body>
    <div class="container">
        <h2 class="text-center">AJAX Table</h2>
        <table class="table border shadow">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Country</th>
                    <th>State</th>
                    <th>Active</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Sohel</td>
                    <td> <select class="form-select country" onchange="showStates(this)">
                            <option value="">---Select---</option>
                            <option value="India">India</option>
                            <option value="USA">USA</option>
                            <option value="UK">UK</option>
                            <option value="Africa">Africa</option>
                        </select></td>
                    <td><select class="form-select state">
                            <option value="">---Select---</option>
                        </select></td>
                    <td>
                        <div class="form-check form-switch  mt-1">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jay</td>
                    <td> <select class="form-select country" onchange="showStates(this)">
                            <option value="">---Select---</option>
                            <option value="India">India</option>
                            <option value="USA">USA</option>
                            <option value="UK">UK</option>
                            <option value="Africa">Africa</option>
                        </select></td>
                    <td><select class="form-select state">
                            <option value="">---Select---</option>
                        </select></td>
                    <td>
                        <div class="form-check form-switch mt-1 ">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Manish</td>
                    <td> <select class="form-select country" onchange="showStates(this)">
                            <option value="">---Select---</option>
                            <option value="India">India</option>
                            <option value="USA">USA</option>
                            <option value="UK">UK</option>
                            <option value="Africa">Africa</option>
                        </select></td>
                    <td><select class="form-select state">
                            <option value="">---Select---</option>
                        </select></td>
                    <td>
                        <div class="form-check form-switch mt-1 ">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Alex</td>
                    <td> <select class="form-select country" onchange="showStates(this)">
                            <option value="">---Select---</option>
                            <option value="India">India</option>
                            <option value="USA">USA</option>
                            <option value="UK">UK</option>
                            <option value="Africa">Africa</option>
                        </select></td>
                    <td><select class="form-select state">
                            <option value="">---Select---</option>
                        </select></td>
                    <td>
                        <div class="form-check form-switch mt-1 ">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Savita</td>
                    <td> <select class="form-select country" onchange="showStates(this)">
                            <option value="">---Select---</option>
                            <option value="India">India</option>
                            <option value="USA">USA</option>
                            <option value="UK">UK</option>
                            <option value="Africa">Africa</option>
                        </select></td>
                    <td><select class="form-select state">
                            <option value="">---Select---</option>
                        </select></td>
                    <td>
                        <div class="form-check form-switch mt-1 ">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Babita</td>
                    <td> <select class="form-select country" onchange="showStates(this)">
                            <option value="">---Select---</option>
                            <option value="India">India</option>
                            <option value="USA">USA</option>
                            <option value="UK">UK</option>
                            <option value="Africa">Africa</option>
                        </select></td>
                    <td><select class="form-select state">
                            <option value="">---Select---</option>
                        </select></td>
                    <td>
                        <div class="form-check form-switch mt-1 ">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Prem</td>
                    <td> <select class="form-select country" onchange="showStates(this)">
                            <option value="">---Select---</option>
                            <option value="India">India</option>
                            <option value="USA">USA</option>
                            <option value="UK">UK</option>
                            <option value="Africa">Africa</option>
                        </select></td>
                    <td><select class="form-select state">
                            <option value="">---Select---</option>
                        </select></td>
                    <td>
                        <div class="form-check form-switch mt-1 ">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Angela</td>
                    <td> <select class="form-select country" onchange="showStates(this)">
                            <option value="">---Select---</option>
                            <option value="India">India</option>
                            <option value="USA">USA</option>
                            <option value="UK">UK</option>
                            <option value="Africa">Africa</option>
                        </select></td>
                    <td><select class="form-select state">
                            <option value="">---Select---</option>
                        </select></td>
                    <td>
                        <div class="form-check form-switch mt-1 ">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>Edward</td>
                    <td> <select class="form-select country" onchange="showStates(this)">
                            <option value="">---Select---</option>
                            <option value="India">India</option>
                            <option value="USA">USA</option>
                            <option value="UK">UK</option>
                            <option value="Africa">Africa</option>
                        </select></td>
                    <td><select class="form-select state">
                            <option value="">---Select---</option>
                        </select></td>
                    <td>
                        <div class="form-check form-switch mt-1 ">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>Govind</td>
                    <td> <select class="form-select country" onchange="showStates(this)">
                            <option value="">---Select---</option>
                            <option value="India">India</option>
                            <option value="USA">USA</option>
                            <option value="UK">UK</option>
                            <option value="Africa">Africa</option>
                        </select></td>
                    <td><select class="form-select state">
                            <option value="">---Select---</option>
                        </select>
                    </td>
                    <td>
                        <div class="form-check form-switch mt-1 ">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>


    <script>
        function showStates(states) {
            let list = states.value;

            let row = states.closest("tr");
            let statedrop = row.querySelector(".state");

            $.ajax({
                url: "getstates.php",
                method: "POST",
                data: {
                    states: list
                },
                success: function(data) {
                    // console.log(data);
                    statedrop.innerHTML = data;
                    // document.getElementById("state").innerHTML=data;
                }
            })
        };

        // $(document).ready(function() {
        //     $(".form-check-input").on("change", function() {
        //         let row = $(this).closest("tr");
        //         let countryDropdown = row.find(".country");
        //         let stateDropdown = row.find(".state");

        //         if ($(this).is(":checked")) {
        //             alert("User Activated!! \u{1F60A} \n\n Please select Country and State :)");
        //             countryDropdown.prop("disabled", false);
        //         } else {
        //             alert("User Deactivated!!")
        //             countryDropdown.prop("disabled", true);
        //             stateDropdown.prop("disabled", true);
        //         }
        //     });
        // });

        $(document).ready(function() {

            $(".form-check-input").prop("disabled", true);

            function checkSelection(row) {
                let countrySelected = row.find(".country").val() !== "";
                let stateSelected = row.find(".state").val() !== "";
                let toggleButton = row.find(".form-check-input");

                if (countrySelected && stateSelected) {
                    toggleButton.prop("disabled", false);
                } else {
                    toggleButton.prop("disabled", true);
                }
            };

            $(document).on("change", ".country", function() {
                let row = $(this).closest("tr");
                checkSelection(row);
            });

            $(document).on("change", ".state", function() {
                let row = $(this).closest("tr");
                checkSelection(row);
            });

            // $(".form-check-input").on("change", function(){
            //     if($(".form-check-input").is(":checked")){
            //         alert("User Activated!! \u{1F60A}");
            //     }else{
            //         alert("User Deactivated!!");
            //     }
            // })

            $(document).on("change", ".form-check-input", function() {
                let row = $(this).closest("tr");
                let countryDropdown = row.find(".country");
                let stateDropdown = row.find(".state");

                if ($(this).is(":checked")) {
                    alert("User Activated!! \u{1F60A}");
                    countryDropdown.prop("disabled", true);
                    stateDropdown.prop("disabled", true);
                } else {
                    alert("User Deactivated!!");
                    countryDropdown.prop("disabled", false);
                    stateDropdown.prop("disabled", false);
                }
            });

        });
    </script>

</body>

</html>