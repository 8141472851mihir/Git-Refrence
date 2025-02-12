<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .item {
            width: 30%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #ddd;
            padding: 5px;
            margin: 5px 0;
            border-radius: 5px;
        }

        .remove {
            color: red;
            font-size: 20px;
            cursor: pointer;
            font-weight: bold;
        }
    </style>

    <script>
        $(document).ready(function() {
            function updateCount() {
                $("#itemCount").text($(".item").length);
            }

            $("#addItem").click(function() {
                let inputValue = $("#itemInput").val();
                if (inputValue !== "") {
                    $("#itemList").append("<div class='item'>" + inputValue +
                        " <button class='remove'>X</button></div>");
                    $("#itemInput").val("");
                    updateCount();
                }
            });

            $(document).on("click", ".remove", function() {
                $(this).parent().remove();
                updateCount();
            });
        });
    </script>
</head>

<body>

    <input type="text" id="itemInput" placeholder="Enter item">
    <button id="addItem">Add Item</button>

    <div id="itemList"></div>
    <p>Total Items: <span id="itemCount">0</span></p>

</body>

</html>