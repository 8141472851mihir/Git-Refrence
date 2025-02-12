<?php
class student {
  public static $name = "Helly";
}

// Get static property
echo student::$name;

class employee {
    public static $name = "Helly";
  }


  class admin extends employee{

    public function msg(){
        
        return self:: $name;
    }
  }

   echo "Employee Name is : ".admin ::$name;
?>