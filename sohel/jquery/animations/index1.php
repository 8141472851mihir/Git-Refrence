<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        div{
            height: 100px;
            width: 300px;
            background-color: black;
        }
        p{
            color: white;
            text-align: center;
            font-size: 28px;
        }
        .blue{
            background-color: lightblue;
            color: black;
        }
        
    </style>

    <script>
        $(document).ready(function(){
            $("button").click(function(){
                $("div, p").toggleClass("blue");
            });
        });
    </script>
    <title>Document</title>
</head>
<body>
     <div>
        <p>Click the button to toggle color</p>
     </div>
     <button>Toggle Color</button>

     
</body>
</html>