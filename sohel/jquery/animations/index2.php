<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        div{
            background-color:blueviolet;
            height: 100px;
            width: 100px;
            position: absolute;
        }
    </style>

    <script>
        $(document).ready(function(){
            $("#start").click(function(){
                $("div").animate({left: '1400px',},3000);
            });
            $("#stop").click(function(){
                $("div").stop();
            });
        });
    </script>
    <title>Document</title>
</head>
<body>
        <button id="start">Start Animation</button>
        <button id="stop">Stop Animation</button>

        <div>

        </div>
</body>
</html>