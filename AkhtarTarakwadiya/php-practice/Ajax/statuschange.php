
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>
 <body>
    <?php
 if(isset($_POST ["status"])){
    $status = $_POST ["status"];
    $status = trim($status);
 }
    
?>
    <?php if($status == "India") : ?>
        <option>Gujarat</option>
        <option>Rajasthan</option>
        <option>Himachal Pradesh</option>
        <option>Kerala</option>
    <?php elseif($status == "US") : ?>
        <option>California</option>
        <option>New York</option>
        <option>Florida</option>
        <?php elseif($status == "UAE") : ?>
            <option>Qatar</option>
            <option>Dubai</option>
    <?php endif; ?>

<?php    echo "<option>Sorry, we don't have any data for your country</option>"; ?>
            
    
 </body>
 </html>