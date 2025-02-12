<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        #div1{
            height: 100px;
            width: 300px;
            background-color: black;
        }
        #div1 p{
            color: white;
            text-align: center;
            font-size: 28px;
        }
        #div2 .ani{
            background-color:blueviolet;
            height: 100px;
            width: 100px;
            position: absolute;
        }
        .blue{
            background-color: blue !important;
            color: black !important;
        }
        
    </style>

    <script>
        $(document).ready(function(){
            $("#toggle").click(function(){
                $("#div1, p").toggleClass("blue");
            });

            $("#start").click(function(){
                $(".ani").animate({left: '1400px',},3000);
            });
            $("#stop").click(function(){
                $(".ani").stop();
            });
        });
    </script>
    <title>Document</title>
</head>
<body>
    <!-- <h2>Hello</h2> -->
     <div id="div1">
        <p>Click the button to toggle color</p>
     </div>
     <button id="toggle">Toggle Color</button>

     <br><br><br>

     <div id="div2">
        <button id="start">Start Animation</button>
        <button id="stop">Stop Animation</button>

        <div class="ani">

        </div>
     </div>
</body>
</html>