<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("button").click(function(){
    $("div").append($('#name').val());
  });
});
</script>
</head>
<body>

<input type="text" name="name" id="name" value="" placeholder="Enter Name">
<button>Add Item</button>




</body>
</html>
