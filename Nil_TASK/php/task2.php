<?php
    //indexed array print
    echo "<h1>1. printing using indexed array </h1>";
    $a = array("Nil", "Om", "Vivek" );
    foreach($a as $value){
        echo "$value <br>";
    }
    echo "<br><br><hr>";

    //student profile using associative array
    echo "<h1>2. printing student data using associative array</h1>";
    $b = array(
        array('Name' => "Nil", 'Surname'=> "Sadariya", 'roll no' => "10", 'age' => "21"),
        array('Name' => "Preet", 'Surname'=> "patel", 'roll no' => "11", 'age' => "22"),
        array('Name' => "Meet", 'Surname'=> "patel", 'roll no' => "12", 'age' => "24"),
    );
    foreach($b as $key => $value){
        foreach($value as $k => $v){
        echo "$k : $v <br>";        
        }
        echo "<br>";
    } 
    echo "<br><br><hr>"; 

    //subject grade using array
    echo "<h1>3. printing subject grade using associative array </h1>";
    $c = array('Maths' => "70", 'Chemistry' => "92", 'Physics' => "62", 'English' => "78",);
    foreach($c as $key => $value){
        echo "$key : $value <br>";
    }


    echo "<br><br><hr>";
    echo "<h1>4. add new data to array</h1>";

    echo "before adding new data <br>";
    foreach($a as $value){
        echo "$value <br>";
    }
    echo "<br>";
    //add new student data to indexed array
    echo "after adding new data to indexed array <br>";
    array_push($a, "purvang", "Dishant");
    foreach($a as $value){
        echo "$value <br>";
    }

    
    echo "<br><br><hr>";
    //student grandes using Multi-diamentional Array
    echo "<h1>5. student grandes using Multi-diamentional Array</h1>";
    $d = array(
        array("Nil", "php", "48"),
        array("Om", "ReactJs", "28"),
        array("Bhargav", "Java", "36"),
        array("Jay", "JavaScript", "32"),
    );
    for ($row = 0; $row < 4; $row++) {
        echo "<p><b>Student number $row</b></p>";
        echo "<ul>";
        for ($col = 0; $col < 3; $col++) {
          echo "<li>".$d[$row][$col]."</li>";
        }
        echo "</ul>";
      }


    //array element counter
    echo "<br><br><hr>";
    echo "<h1>6. array element counter</h1>";
    $e = array("apple", "banana", "cherry", "date", "elder");
    $count = count($e);
    echo $count."<br>";

    //mark update in multi-diamentional array
    echo "<br><br><hr>";
    echo "<h1>7. mark update in multi-diamentional array</h1>";  
    echo "before updating marks";
    for ($row = 0; $row < 4; $row++) {
        echo "<p><b>Student number $row</b></p>";
        echo "<ul>";
        for ($col = 0; $col < 3; $col++) {
          echo "<li>".$d[$row][$col]."</li>";
        }
        echo "</ul>";
    }

    echo "after updating marks";
    $d[0][2] = 51 ;
    $d[1][2] = 41 ;
    $d[2][2] = 27 ;
    $d[3][2] = 15 ;

    for ($row = 0; $row < 4; $row++) {
        echo "<p><b>Student number $row</b></p>";
        echo "<ul>";
        for ($col = 0; $col < 3; $col++) {
          echo "<li>".$d[$row][$col]."</li>";
        }
        echo "</ul>";
    }

    echo "<br><br><hr>";

    //multidiamentional array

    echo "<h1>8. multi-diamentional array</h1>";  

    foreach($b as $key => $value){
        foreach($value as $k => $v){
        echo "$k : $v <br>";        
        }
        echo "<br>";
    } 
    echo "<br><br><hr>"; 


    //3d array

    echo "<h1>9. 3d Array</h1>";
    
    $f = array(
        array(
            'name' => "Nil Patel",
            'age' => "21",
            'subject' => array('Maths' => "70", 'Chemistry' => "92"),
        ),

        array(
            'name' => "Raj Joshi",
            'age' => "20",
            'subject' => array('Maths' => "40", 'Chemistry' => "86"),
        ),

        array(
            'name' => "hemang Prajapati",
            'age' => "24",
            'subject' => array('Maths' => "62", 'Chemistry' => "60"),
        ),
    );

    foreach($f as $key => $value){
            foreach($value as $k => $v){
                
                if($k == 'subject'){
                    foreach($v as $k1 => $v1){
                        echo "$k1 : $v1 <br>";
                    }
                }else{
                    
                        echo "$k : $v <br>";  
            }
        }
        echo "<br>";
    }



    echo "<br><br><hr>"; 


    //sorting indexed array

    echo "<h1>10. sorting indexded Array</h1>";

    $g = array(2,4,3,6,5,7,8,9,90);
    sort($g);

    $length = count($g);

    for($h = 0; $h <= ($length-1); $h++){
        echo "$g[$h] <br>";
    }


    echo "<br><br><hr>"; 


    //sorting associative array with key

    echo "<h1>11. sorting associative Array</h1>";

    $i =  array('2' => "Nil Patel", '1'=>"is",'0'=>"my name");
    print_r($i);

    echo "<br>";

    ksort($i);
    print_r($i);

    echo "<br><br><hr>"; 


    //sorting associative array with key

    echo "<h1>12. sorting associative Array</h1>";

    asort ($i);
    print_r($i);

    echo "<br>";

?>