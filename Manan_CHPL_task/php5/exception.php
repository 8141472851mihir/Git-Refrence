<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exception</title>
</head>
<body>
  

<?php
function divide($num1, $num2) {
  if($num1 < $num2) {
    throw new Exception("$num1 is smaller then $num2", 1);
  }
  return $num1-$num2;
}

try {
  echo divide(15, 16);
} catch(Exception $E) {
  echo "Unable to subtract for positive output. <br> ";
  $code = $E->getCode();
  $message = $E->getMessage();
  $file = $E->getFile();
  $line = $E->getLine();
  echo "Exception thrown in $file on line $line: [Code $code]<br>
  $message <br>";
} finally {
  echo "Process complete.";
}
?>
</body>
</html>