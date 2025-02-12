<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Document</title>

    <style>
        .square{
            height: 100px; 
            width: 100px;
             background-color: violet;
        }
    </style>

    <script>
        $(document).ready(function(){
            $("#btn1").click(function(){
                $("#box").animate({height: "+=50px",width: "+=50px"});
            });
            $("#btn2").click(function(){
                $("#box").animate({height: "-=50px",width: "-=50px"});
            });
            $("#btn3").click(function(){
                $("#box").css({"height": "100px", "width": "100px"});
            });
        });
    </script>

   
</head>
<body>
    
    <button id="btn1">increase size</button>
    <button id="btn2">decrease</button>
    <button id="btn3">reset</button>
    <div id="box" class="square"></div>
</body>
</html>