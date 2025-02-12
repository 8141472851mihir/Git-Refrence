<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jquery Example</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <h1>Click the button to hide and show this paragraph</h1>
    <p class="hide">This is a hide paragraph.</p>
    <p class="show" style="display:none">This is a show paragraph.</p>
    <button class="h">Click me</button>

    <h1>Click the button to to apply toggle effect to paragraph</h1>
    <p class="toggle">This is a toggle paragraph.</p>
    <button class="t">Toggle</button>

    <h1>Click the button to to apply fade effect to paragraph</h1>

    <button class="f">Apply FadeIn effect</button>
    <div id="div1" style="width:80px;height:80px;display:none;background-color:red;"></div><br>
    <div id="div2" style="width:80px;height:80px;background-color:green;"></div><br>
    <div id="div3" style="width:80px;height:80px;display:none;background-color:blue;"></div>

    
    <h1>Click the button to to apply silde effect to paragraph</h1>
    <div id="div5" style="width:80px;height:80px;display:none;background-color:red;"></div><br>
    <div id="div4" style="width:80px;height:80px;background-color:green;"></div><br>
    <div id="div6" style="width:80px;height:80px;display:none;background-color:blue;"></div>
    <button class="s">Apply SlideDown effect</button>

    <p class="ob"> Hover over me to see the effect</p>
    <script>
        $(document).ready(function () {
            $(".h").click(function () {
                $(".hide").hide(400);
                $(".show").show(400);
            })
        });

        $(document).ready(function () {
            $(".t").click(function () {
                $(".toggle").toggle(400);
            })
        });

        $(document).ready(function () {
            $(".f").click(function () {
                $("#div1").fadeIn();
                $("#div2").fadeOut(5000);
                $("#div3").fadeToggle(3000);
            })
        });

        $(document).ready(function () {
            $(".s").click(function () {
                $("#div5").slideDown(2000);
                $("#div4").slideUp(5000);
                $("#div6").slideToggle(3000);
            })
        });

        $("document").ready(function(){
            $(".ob").on({
                mouseenter: function(){
                    $(this).css("background-color", "lightgray");
                },
                mouseleave: function(){
                    $(this).css("background-color", "lightblue");
                },
                click: function(){
                    $(this).css("background-color", "yellow");
                }
            });
        })
    </script>
</body>

</html>