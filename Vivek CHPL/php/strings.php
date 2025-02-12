<?php
    echo "<h4>1)Student List (Indexed Array): Display all student names 
              from an indexed array.
          </h4>";

    $q1=array("vivek","jay","nishit","rhythm","indra");
    foreach($q1 as $name)
    {
        echo $name. " ";
    }
    echo "<br>";
    // print_r($students);

    echo "<h4>2)Student Profile (Associative Array): Create and display a student’s 
              profile using an associative array.
          </h4>";

    $profile=array(1=>"vivek",2=>"jay",3=>"janvi",4=>"rhythm",5=>"prachi");
    print_r($profile);

    echo "<h4> 3)Multiple Subjects Grades (Associative Array): 
             Display grades for each subject for a specific student.
          </h4>";

    $vivek=array("Maths"=>"B+",
                 "Php"=>"A+",
                 "MySql"=>"B+",
                 "Python"=>"A+",
                 "JavaScript"=>"B+");
    // print_r($vivek);
    foreach($vivek as $subjects=>$grades)
    {
        echo "Subject : $subjects"." ";
        echo "Grade : $grades <br>";
    }

    echo "<h4>4)Add New Student: Add a new student to an indexed array and 
              display the updated list.
          </h4>";

    $stu=array("Akshay","Nensi","Dhruvi","Vivek");
    print_r($stu);
    echo "<br>";
    $stu[]="Nishit";
    print_r($stu);

    echo "<h4>5)Display Students with Grades: List students and their 
              corresponding grades.
          </h4>";

    $q5=array(
        "vivek"=>"A+",
        "jay"=>"A+",
        "ram"=>"B+",
        "lakhan"=>"B+",
        "kush"=>"c+",
    );
    foreach($q5 as $name=>$grade)
    {
        echo "Name : $name"," ","Grade : $grade","<br>";
    }

    echo "<h4>6)Count Total Students: Count and display the total number of students.
          </h4>";
    print_r($q1);
    echo count($q1);

    echo "<h4>7)Update Marks: Update a student’s marks and display the updated list.
          </h4>";

    $q7=array(
        "vivek"=>85,
        "dhruvi"=>90,
        "rhythm"=>95
    );
    print_r($q7);
    echo "<br>";
    $q7["dhruvi"]=100;
    $q7["vivek"]=95;
    print_r($q7);

    echo "<h4>8)Create a multidimensional array where each student is represented by 
              an array with their name, age, and grades for various subjects.
          </h4>";

    $q8=[
            [
            "name"=>"vivek",
            "age"=>21,
            "grades"=>[
                "php"=>89,
                "html"=>98,
                "css"=>100
            ]
        ],
        [
            "name"=>"rhythm",
            "age"=>20,
            "grades"=>[
                "php"=>98,
                "html"=>89,
                "css"=>90
            ]
        ],
        [
            "name"=>"dhruvi",
            "age"=>21,
            "grades"=>[
                "php"=>90,
                "html"=>80,
                "css"=>95
            ]
        ]
    ];
    print_r($q8);
    echo "<br>";
    foreach($q8 as $students)
    {
        echo "Name :".$students['name']."<br>";
        echo "age :".$students['age']."<br>";
        echo "Grades: <br>";
        foreach ($students['grades'] as $subject => $grade)
        {
            echo "$subject: $grade","<br>";
        }
    }    

    echo "<h4>10)Sorting indexed arrays (ascending/descending).
          </h4>";

    print_r($q1);
    echo "<br>";
    sort($q1);
    print_r($q1);
    echo "<br>";
    rsort($q1);
    print_r($q1);

    echo "<h4>11)Sorting associative arrays (by keys or values).
          </h4>";

          print_r($vivek);
          echo "<br>";
          ksort($vivek);
          print_r($vivek);
          echo "<br>";
          asort($vivek);
          print_r($vivek);
          echo "<br>";
          krsort($vivek);
          print_r($vivek);  
          echo "<br>";
          arsort($vivek);
          print_r($vivek);

    echo "<h4>12)Sorting arrays of strings alphabetically.
    </h4>";
    $q12=array("ridham","williom","akshay","vivek");
    print_r($q12);
    echo "<br>";
    sort($q12);
    print_r($q12);
?>