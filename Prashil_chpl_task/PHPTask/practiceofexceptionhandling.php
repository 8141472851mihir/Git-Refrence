<?php
    function divide($dividend, $divisor) {
        if($divisor == 0) {
          throw new Exception("Division by zero",3);
        }
        return $dividend / $divisor;
      }
      
      try {
        echo divide(5, 0);
      } catch(Exception $e) {
        $code = $e->getCode();
        $message = $e->getMessage();
        $file = $e->getFile();
        $line = $e->getLine();
        echo "Exception thrown in $file <br>on line $line: [Code $code]
        <br>$message<br>";
        // echo "Unable to divide.";
      }finally{
        echo "done";
      }
      
      
?>