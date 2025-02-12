<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jquerydemo2</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>
<head>
<script>
$(document).ready(function(){
  $("button:first").click(function(){
    $("p:first").hide();
  });
});
$(document).ready(function(){
	$("h1").hover(function(){
    $("tr:odd").css("background-color", "yellow");});
  
});
$(document).ready(function(){
  $("button").click(function(){
    $("a[target='_blank']").hide();
  });
});
$(document).ready(function(){
  $(".a").click(function(){
    $("ul li:first-child").hide();
  });
});
$(document).ready(function(){
  $(".b").click(function(){
    $("ul li:first").hide();
  });
});
</script>
</head>
<body>

<h2>This is a heading</h2>

<p>This is a paragraph.</p>
<p>This is another paragraph.</p>

<button>Click me</button>
</head>


<h2>This is a heading</h2>

<p>This is a paragraph.</p>
<p>This is another paragraph.</p>
<p><a href="#" target="_blank">HTML Tutorial</a></p>
<p><a href="-">CSS Tutorial</a></p>
<button>Click me</button>
<h1>Welcome to My Web Page</h1>
<table border="1">
  <tr>
    <th>Company</th>
    <th>Country</th>
  </tr>
  <tr>
    <td>CHPL</td>
    <td>INDIA</td>
  </tr>
  <tr>
    <td>Apple</td>
    <td>US</td>
  </tr>
  <tr>
    <td>H&M</td>
    <td>Sweden</td>
  </tr>
  <tr>
    <td>Volkswagen</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Sony</td>
    <td>Japan</td>
  </tr>
</table>

<p>List 1:</p>
<ul>
  <li>Coffee</li>
  <li>Milk</li>
  <li>Tea</li>
</ul>

<p>List 2:</p>
<ul>
  <li>Coffee</li>
  <li>Milk</li>
  <li>Tea</li>
</ul>

<button class="a">Click me</button>
<button class="b">click me</button>
</body>
</head>
</html>


<script>
        $(document).ready(function () {
            $(".login-button").click(function () {
                $(".login").slideDown(3000);
                $(".register").slideUp(3000);
                $(".otp").slideUp(3000);

            });
            $(".register-button").click(function () {
                $(".login").slideUp(3000);
                $(".register").slideDown(3000);
                $(".otp").slideUp(3000);

            });
            $(".hello").click(function () {
                alert("Register Successfully");
                $(".login").slideDown(3000);
                $(".register").slideUp(3000);
                $(".otp").slideUp(3000);
            })
            $(".otp-button").click(function () {
                $(".login").slideUp(3000);
                $(".otp").slideDown(3000);
                $(".register").slideUp(3000);
            })
        });
    </script>