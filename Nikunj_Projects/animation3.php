<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#Increse").click(function() {
                $("div").animate({
                    height: "+=150px",
                    width: "+=150px"
                });
            });
            $("#Decrese").click(function() {
                $("div").animate({
                    height: '-=150px',
                    width: '-=150px',
                });
            });
            $("#Reset").click(function() {
                $("div").animate({
                    height: '100px',
                    width: '100px',
                });
            });

        });
    </script>

</head>

<body>

    <button id="Increse">Increse size</button>
    <button id="Decrese">Decrese size</button>
    <button id="Reset">Reset size</button>
    <br><br><br>
    <div style="background:#98bf21;height:100px;width:100px;position:absolute;"></div>
</body>

</html>