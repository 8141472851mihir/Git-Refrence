<?php  
function checkNumber($num) {  
   if($num>=1) {  
     throw new Exception("Value must be less than 1");  
   }  
}  
  
try {  
   checkNumber(5);  

   echo 'If you see this text, the passed value is less than 1';  
}  
  
catch (Exception $e) {  
   echo 'Exception Message: ' .$e->getMessage();  
}  
?>  