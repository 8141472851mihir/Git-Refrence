<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <style>
        .text2 {
            background-color: blue !important;
            color: black !important;
        }
    </style>
    <script>
        $(document).ready(function() {
            $("button").click(function() {
                $("div").toggleClass("text2");
            });
        });
    </script>

</head>

<body>
    <div style="background-color:black; color:white; width: 300px;">
        <h1>click button to toggle <br> color</h1>
    </div>
    <button>toogle color</button>
</body>

</html>