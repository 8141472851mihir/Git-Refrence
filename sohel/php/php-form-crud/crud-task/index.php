<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Array Tasks</title>
</head>

<body>
    <div class="container-fluid">
        <h2>PHP Array Task</h2>

        <div class="card shadow mb-2">
            <div class="card-body">
                <h4>Program 1 - Student list (Indexed Array)</h4>
                <br>
                <?php
                echo "<h5>Display student names from an indexed array</h5>";

                $student = ["Sohel", "Jay", "Manish"];
                foreach ($student as $s) {
                    echo "$s <br>";
                }
                ?>
            </div>
        </div>

        <div class="card shadow mb-2">
            <div class="card-body">
                <h4>Program 2 - Student Profile (Associative Array)</h4>
                <br>

                <?php
                echo "<h5>Create and display student profile using associative array</h5>";

                $student1 = array("name" => "Sohel", "age" => "22", "Subject" => "PHP");
                foreach ($student1 as $s1 => $a2) {
                    echo "$s1 : $a2  <br>";
                }
                ?>
            </div>
        </div>

        <div class="card shadow mb-2">
            <div class="card-body">
                <h4>Program 3 - Multiple Subject Grades (Associative Array)</h4>
                <br>

                <?php
                echo "<h5>Display grades of each subject for a specific student</h5>";

                $sohel = array("PHP" => "A", "HTML" => "A", "CSS" => "B", "BOOTSTRAP" => "A");
                $jay = array("PHP" => "B", "HTML" => "A", "CSS" => "C", "BOOTSTRAP" => "B");
                echo "Sohel's Result -> <br>";
                foreach ($sohel as $s1 => $s2) {
                    echo "$s1 - $s2 <br>";
                }
                echo "<br>Jay's Result -> <br>";
                foreach ($jay as $s1 => $s2) {
                    echo "$s1 - $s2 <br>";
                }

                // $student2 = [
                //     ['sohel', 'PHP', '87'],
                //     ['jay', 'PHP', '66'],
                //     ['manish', 'PHP', '37'],
                //     ['uday', 'PHP', '98']
                // ];

                // print_r($student2);
                // echo  "Name = " . $student2[0][0] . ", Subject = " . $student2[0][1] . ", Result = " . $student2[0][2] . ". <br>";
                ?>
            </div>
        </div>

        <div class="card shadow mb-2">
            <div class="card-body">
                <h4>Program 4 - Add new student</h4>
                <br>

                <?php
                echo "<h5>Add new student an indexed array and update the list</h5>";

                $student = ["Sohel", "Jay", "Manish"];
                echo "Existing array -> <br>";
                foreach ($student as $s) {
                    echo "$s <br>";
                }
                $student[] = "Uday";
                // array_push($student,"Shyam");
                echo "<br>After adding new student (Uday) -> <br>";
                foreach ($student as $s) {
                    echo "$s <br>";
                }

                ?>
            </div>
        </div>

        <div class="card shadow mb-2">
            <div class="card-body">
                <h4>Program 5 - Display student with grades</h4>
                <br>

                <?php
                echo "<h5>List of students and their corresponsing grades</h5>";

                $student4 = ["Sohel" => "Grade A", "Jay" => "Grade B", "Manish" => "Grade A+", "Uday" => "Grade B+"];
                foreach ($student4 as $n => $s) {
                    echo "$n - $s <br>";
                }
                ?>
            </div>
        </div>

        <div class="card shadow mb-2">
            <div class="card-body">
                <h4>Program 6 - Count total students</h4>
                <br>

                <?php
                echo "<h5>Count and display the total number of students</h5>";

                $student5 = ["Sohel", "Jay", "Manish", "Uday"];
                $count = count($student5);
                echo "Total number of students =  $count <br>";
                echo "Using array_count_values = ";
                print_r(array_count_values($student5));
                echo "<br>Using var_dump = ";
                var_dump($student5);
                ?>
            </div>
        </div>

        <div class="card shadow mb-2">
            <div class="card-body">
                <h4>Program 7 - Update marks</h4>
                <br>

                <?php
                echo "<h5>Update students marks and display updated list</h5>";

                $sohel = array("PHP" => "80", "HTML" => "90", "CSS" => "80", "BOOTSTRAP" => "90");
                echo "Before updated Marks -> <br>";
                foreach ($sohel as $s1 => $s2) {
                    echo "$s1 - $s2 <br>";
                }
                echo "<br>Now updated list with marks PHP : 80 -> 90 and CSS : 80 -> 90<br>";
                $sohel["PHP"] = "90";
                $sohel["CSS"] = "90";
                echo "After updated Marks -> <br>";
                foreach ($sohel as $s1 => $s2) {
                    echo "$s1 - $s2 <br>";
                }
                ?>
            </div>
        </div>

        <div class="card shadow mb-2">
            <div class="card-body">
                <h4>Program 8 - Multidimentional List</h4>
                <br>

                <?php
                echo "<h5>List of each student represented by name, age and grades</h5>";

                $student6 = [
                   "student1" => ["name"=>"Sohel","age"=> "20", "PHP" => "A", "HTML" => "B", "CSS" => "B", "BOOTSTRAP" => "A+"],
                   "student2" => ["name"=>"Jay","age"=> "22", "PHP" => "B+", "HTML" => "A", "CSS" => "A", "BOOTSTRAP" => "B"],
                   "student3" => ["name"=>"Manish","age"=> "21", "PHP" => "B", "HTML" => "B+", "CSS" => "A", "BOOTSTRAP" => "A"],
                ];
                // echo "Student 1 - Name : " . $student6[0][0] .
                //     ", Age : " . $student6[0][1] .
                //     ", Grades : " . $student6[0][2]["PHP"] . ", " .
                //     $student6[0][2]["HTML"] . ", " .
                //     $student6[0][2]["CSS"] . ", " .
                //     $student6[0][2]["BOOTSTRAP"] . "<br><br>";
                // echo "Student 2 - Name : " . $student6[1][0] .
                //     ", Age : " . $student6[1][1] .
                //     ", Grades : " . $student6[1][2]["PHP"] . ", " .
                //     $student6[1][2]["HTML"] . ", " .
                //     $student6[1][2]["CSS"] . ", " .
                //     $student6[1][2]["BOOTSTRAP"] . "<br><br>";
                // print_r($student6);
                foreach($student6 as $key => $value){
                    echo "<pre>";
                  echo "$key";
                  foreach($value as $key1 => $value1){
                    echo "$key1 : $value1";
                    echo "<br>";
                    echo "</pre>";
                  }
                //   foreach($value1 as $key2 => $value2){
                //     echo "$key2 : $value2 <br>";
                //   }
                  echo "<br>";
                }
                var_dump($student6);
                ?>
            </div>
        </div>

        <div class="card shadow mb-2">
            <div class="card-body">
                <h4>Program 9 - Create a 3D Array</h4>
                <br>

                <?php
                echo "<h5>Table of student's Names, subjects and marks</h5>";

                $student7 = [
                    "s1" => [
                        "name" => ["Sohel"],
                        "subject" => ["PHP", "HTML", "CSS", "BOOTSTRAP"],    
                        "marks" => [80, 90, 85, 80],
                    ],
                    "s2" => [
                        "name" => ["Jay"],
                        "subject" => ["PHP", "HTML", "CSS", "BOOTSTRAP"],    
                        "marks" => [90, 60, 75, 80],
                    ],
                    "s3" => [
                        "name" => ["Manish"],
                        "subject" => ["PHP", "HTML", "CSS", "BOOTSTRAP"],    
                        "marks" => [70, 70, 65, 90],
                    ],
                ];
                echo "<pre>";
                print_r($student7);
         echo "</pre>";
         foreach($student7 as $student => $value){
                    echo "<pre>";
                    echo "$student  ";
                    foreach($value as $key => $value1){
                        echo "$key =  ";
                        foreach($value1 as $key1 => $value2){
                            echo "$value2 , ";
                        }
                    }
                    echo "</pre>";
                }
                ?>
            </div>
        </div>

        <div class="card shadow mb-2">
            <div class="card-body">
                <h4>Program 10 - Sorting indexed array</h4>
                <br>

                <?php
                echo "<h5>Sorting array in Ascending order -> <br></h5>";
                echo "Before : <br>";
                $arr = [5, 3, 8, 1, 9];
                foreach($arr as $a){
                    echo "$a <br>";
                }
                echo "<br>";
                sort($arr);
                echo "After : <br>";
                foreach($arr as $a){
                    echo "$a <br>";
                }


                echo "<h5><br>Sorting array in Decending order -> <br></h5>";
                echo "Before : <br>";
                $arr = [5, 3, 8, 1, 9];
                foreach($arr as $a){
                    echo "$a <br>";
                }
                echo "<br>";
                rsort($arr);
                echo "After : <br>";
                foreach($arr as $a){
                    echo "$a <br>";
                }
                ?>
            </div>
        </div>

        <div class="card shadow mb-2">
            <div class="card-body">
                <h4>Program 11 - Sorting associative array</h4>
                <br>

                <?php
                echo "<h5>Sorting associative array assending by keys -> <br></h5>";
                echo "Before : <br>";
                $arr = ["name"=>"sohel","age"=>"22","subject"=>"php"];
                foreach($arr as $a => $value){
                    echo "$a - $value <br>";
                }
                echo "<br>";
                ksort($arr);
                echo "After : <br>";
                foreach($arr as $a => $value){
                    echo "$a - $value <br>";
                }


                echo "<h5><br>Sorting associative array assending by values -> <br></h5>";
                echo "Before : <br>";
                $arr = ["name"=>"sohel","age"=>"22","subject","php"];
                foreach($arr as $a => $value){
                    echo "$a - $value <br>";
                }
                echo "<br>";
                asort($arr);
                echo "After : <br>";
                foreach($arr as $a => $value){
                    echo "$a - $value <br>";
                }

                echo "<h5><br>Sorting associative array desending by keys -> <br></h5>";
                echo "Before : <br>";
                $arr = ["name"=>"sohel","age"=>"22","subject"=>"php"];
                foreach($arr as $a => $value){
                    echo "$a - $value <br>";
                }
                echo "<br>";
                krsort($arr);
                echo "After : <br>";
                foreach($arr as $a => $value){
                    echo "$a - $value <br>";
                }


                echo "<h5><br>Sorting associative array desending by values -> <br></h5>";
                echo "Before : <br>";
                $arr = ["name"=>"sohel","age"=>"22","subject","php"];
                foreach($arr as $a => $value){
                    echo "$a - $value <br>";
                }
                echo "<br>"; 
                arsort($arr);
                echo "After : <br>";
                foreach($arr as $a => $value){
                    echo "$a - $value <br>";
                }
                ?>
            </div>
        </div>

        <div class="card shadow mb-2">
            <div class="card-body">
                <h4>Program 12 - Sorting array of strings</h4>
                <br>

                <?php
                echo "<h5>Sorting arrays of strings alphabetically in assending order</h5>";

                echo "Before : <br>";
                $student9 = ["Sohel", "Jay", "Manish", "Uday", "Shubham"];
                foreach($student9 as $a){
                    echo "$a <br>";
                }
                echo "<br>";
                sort($student9);
                echo "After : <br>";
                foreach($student9 as $a){
                    echo "$a <br>";
                }


                echo "<h5><br>Sorting arrays of strings alphabetically in desending order</h5>";
                echo "Before : <br>";
                $student9 = ["Sohel", "Jay", "Manish", "Uday", "Shubham"];
                foreach($student9 as $a){
                    echo "$a <br>";
                }
                echo "<br>";
                rsort($student9);
                echo "After : <br>";
                foreach($student9 as $a){
                    echo "$a <br>";
                }
                
                ?>
            </div>
        </div>

    </div>

</body>

</html>