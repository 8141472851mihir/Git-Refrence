<?php

   // use strlen
 echo"The length string is: ";
 echo strlen("vaibhavi")."<br>";

 // use str Word count
 echo "String Word Count: "; 
 echo str_word_count("Helly patel")."<br>";


 //use str pos

 echo "String Position: ";
 echo strpos("hellypatel","patel")."<br>";


 //use strtouppercase

 echo "UpperCase:";
 echo strtoupper("vaibhavi")."<br>";

 //use str_replace

 $a="helly patel";
 echo "String Replace: ";
 echo str_replace("helly","vaibhavi",$a)."<br>";

 //use strtolowercase

 echo "LowerCase:";
 echo strtolower("vaibhavi")."<br>";

 //escape character

 $x = "Hello i am \"vaibhavi\"."."<br>";
 echo $x;

 //use slice

 $a="helly";
 echo substr($a,3)."<br>";
 echo substr($a,2,2)."<br>";

 //use strrev

 $x="helly";
 echo strrev($x)."<br>";


?>