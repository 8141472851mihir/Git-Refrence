<?php
if(isset($_POST["status"]))
{
    // echo "hello";
$states = $_POST["status"];

if($states == "india"){
echo "<option>Gujarat</option>";
echo "<option>UP</option>";
echo "<option>Rajesthan</option>";
}
if($states == "china"){
    echo "<option>Anhui</option>";
    echo "<option>Fujian</option>";
    echo "<option>Gansu</option>";
    }
if($states == "unitedstate"){
     echo "<option>Alabama</option>";
     echo "<option>Alaska</option>";
     echo "<option>Arizona</option>";
     }
}

?>
