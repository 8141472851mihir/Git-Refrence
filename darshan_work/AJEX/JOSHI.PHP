<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Country, State, City Dropdown</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <label for="country">Country:</label>
    <select id="country" name="country">
        <option value="">Select Country</option>
    </select>

    <label for="state">State:</label>
    <select id="state" name="state" disabled>
        <option value="">Select State</option>
    </select>

    <label for="city">City:</label>
    <select id="city" name="city" disabled>
        <option value="">Select City</option>
    </select>

    <script>
        var data = {
            "India": {
                "Gujarat": ["Ahmedabad", "Surat", "Vadodara"],
                "Maharashtra": ["Mumbai", "Pune", "Nagpur"]
            },
            "USA": {
                "California": ["Los Angeles", "San Francisco", "San Diego"],
                "Texas": ["Houston", "Dallas", "Austin"]
            }
        };

       
        $.each(data, function(country, states) {
            $("#country").append(new Option(country, country));
        });

        $("#country").change(function() {
            var country = $(this).val();
            $("#state").empty().append(new Option("Select State", "")).prop("disabled", !country);
            $("#city").empty().append(new Option("Select City", "")).prop("disabled", true);
            
            if (country && data[country]) {
                $.each(data[country], function(state, cities) {
                    $("#state").append(new Option(state, state));
                });
            }
        });

        $("#state").change(function() {
            var country = $("#country").val();
            var state = $(this).val();
            $("#city").empty().append(new Option("Select City", "")).prop("disabled", !state);
            
            if (state && data[country] && data[country][state]) {
                $.each(data[country][state], function(index, city) {
                    $("#city").append(new Option(city, city));
                });
            }
        });
    </script>
</body>
</html>
