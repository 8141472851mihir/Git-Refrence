<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>JQuery</title>
    <style>
        #panel,
        #flip {
            padding: 5px;
            text-align: center;
            background-color: rgb(174, 227, 27);
            border: dotted 2px rgb(255, 0, 0);
        }

        #panel {
            padding: 80px;
            display: none;
        }
    </style>
</head>

<body>
    <div>
        <h1>
            Hello World
        </h1>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, magni numquam totam magnam nemo omnis quae saepe quod.
        </p>
    </div>

    <div class="n">
        <h1>
            Hello World
        </h1>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, magni numquam totam magnam nemo omnis quae saepe quod.
        </p>
    </div>

    <button id="btn">Double Click me</button>

    <div class="h">
        <h1>
            <span>
                Come here
            </span>
        </h1>
    </div>

    <div>
        <h1>
            <span id="span">
                Catch me
            </span>
        </h1>
    </div>

    Name: <input type="text" name="fullname"><br>
    Email: <input type="text" name="email">

    <div class="">
        <p class="ko">First</p>
        <p class="ko">Second</p>
        <p class="ko">Third</p>
    </div>


    <h1 id="one">I am unique</h1>


    <div>
        <h2 id="pa">THis is paragraph</h2>

        <button id="show">Show</button>
        <button id="hide">Hide</button>
    </div>
    <br><br><br>

    <div>
        <button id="tog">Toggle button</button>

        <p id="pp">Click to hide and show me</p>
    </div>


    <br><br>

    <div>
        <button id="fadtog">Click to toggle with fade effect</button>

        <div id="1">
            <img src="../../Images/icons8-india-48.png" height="200" alt="india">
        </div>
        <div id="2">
            <img src="../../Images/icons8-russia-48.png" height="200" alt="russia">
        </div>
        <div id="3">
            <img src="../../Images/icons8-canada-48.png" height="200" alt="canada">
        </div>
    </div>

    <div>
        <button id="fadto">Click to toggle with fade effect</button>

        <div id="4">
            <img src="../../Images/icons8-india-48.png" height="200" alt="india">
        </div>
        <div id="5">
            <img src="../../Images/icons8-russia-48.png" height="200" alt="russia">
        </div>
        <div id="6">
            <img src="../../Images/icons8-canada-48.png" height="200" alt="canada">
        </div>
    </div>


    <div id="flip">Click to show the panel</div>
    <div id="panel">This is panel</div>

</body>


<script>
    $(document).ready(function() {
        console.log("Document is ready");
    });

    $(function() {
        $("p").click(function() {
            $(this).hide();
        })
    });

    $(document).ready(function() {
        $("h1").click(function() {
            $(this).hide();
        })
    });

    $(function() {
        $(".n").click(function() {
            $(this).hide();
        })
    });

    $(function() {
        $("#btn").dblclick(function() {
            alert("Button clicked :)");
        })
    });

    $(document).ready(function() {
        $(".h").mouseenter(function() {
            $(this).hide();
        })
    });

    $(function() {
        $(".h").mouseleave(function() {
            $(this).show();
        })
    });

    $(function() {
        $("#span").hover(function() {
                $(this).hide();
            },
            function() {
                $(this).show();
            });
    });

    $(function() {
        $("input").focus(function() {
            $("input").css("background-color", "yellow");
        });
        $("input").blur(function() {
            $("input").css("background-color", "green");
        });
    });

    $(document).ready(function() {
        $(".ko").on("click", function() {
            $(this).hide();
        });
    });

    $(function() {
        $("#one").on({
            mouseenter: function() {
                $(this).css("background-color", "red");
            },
            mouseleave: function() {
                $(this).css("background-color", "blue");
            },
            click: function() {
                $(this).css("background-color", "yellow");
            }
        });
    });

    $(document).ready(function() {
        $("#hide").click(function() {
            $("#pa").hide(1000);
        });
        $("#show").click(function() {
            $("#pa").show(1000);
        });
    });

    $(document).ready(function() {
        $("#tog").click(function() {
            $("#pp").toggle(1000);
        })
    });

    $(document).ready(function() {
        $("#fadtog").click(function() {
            // console.log("dadsf");
            $("#1").fadeToggle(1000);
            $("#2").fadeToggle("slow");
            $("#3").fadeToggle(2000);
        });
    });

    $(document).ready(function() {
        $("#fadto").click(function() {
            // console.log("dadsf");
            $("#4").fadeTo("slow", 0.15);
            $("#5").fadeTo("slow", 0.30);
            $("#6").fadeTo("slow", 0.45);
        });
    });

    $(document).ready(function() {
        $("#flip").click(function() {
            $("#panel").slideToggle("slow");
        });
    });
</script>

</html>