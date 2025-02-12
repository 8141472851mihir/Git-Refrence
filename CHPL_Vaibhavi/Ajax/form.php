<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-3">
                <h4>Select Country:</h4>
                <form id="myForm">
                    <select name="country" id="countryid" onchange="changeCountry(this.value)">
                        <option value="#">Select country:</option>
                        <option value="India">India</option>
                        <option value="USA">USA</option>
                        <option value="UAE">UAE</option>
                    </select>
                    <select id="stateid" onchange="changeState(this.value)">
                        <option value="">Select state:</option>
                    </select>
                    <select id="cityid">
                        <option value="">Select city:</option>
                    </select>
                </form>
                <div id="resultarea"></div>
            </div>
        </div>
    </div>

    <script>
        function changeCountry(value) {
            $.ajax({
                type: "POST",
                url: "action.php",
                data: { country: value },
                success: function (response) {
                    $("#stateid").html(response);
                }
            });
        };

        function changeState(value) {
            $.ajax({
                type: "POST",
                url: "action.php",
                data: { state: value },
                success: function (response) {
                    $("#cityid").html(response);
                }
            });
        };
    </script>
</body>

</html>