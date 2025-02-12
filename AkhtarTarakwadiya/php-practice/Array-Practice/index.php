<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"
        integrity="sha512-b+nQTCdtTBIRIbraqNEwsjB6UvL3UEMkXnhzd8awtCYh0Kcsjl9uEgwVFVbhoj3uu1DO1ZMacNvLoyJJiNfcvg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Array Program</title>
</head>

<body>
    <div class="container">

        <h1 class="text-center bg-secondary mt-2 text-white">Array Examples</h1>
        <div class="card mt-3">
            <h4><u>Example - 1</u> :- Student List (Index Array) </h4>
            <br>
            <?php
            $students = ["Akhtar", "Darshan", "Sohel", "Dixit"];
            print_r($students);
            echo "<br>";
            foreach ($students as $student) {
                echo $student . "<br>";
            }
            ?>
        </div>

        <div class="card mt-3">
            <h4><u>Example - 2</u> :- Student Profile (Associative Array) </h4>
            <br>
            <?php
            $students_profile = ["Name" => "Akhtar", "Age" => 22, "Subject" => "PHP", "Batch" => 2024];

            print_r($students_profile);
            echo "<br>";
            foreach ($students_profile as $profiel_key => $profile_value) {
                echo "$profiel_key : $profile_value" . "<br>";
            }
            ?>
        </div>

        <div class="card mt-3">
            <h4><u>Example - 3</u> :- Multiple Subject Grades (Associative Array) </h4>
            <br>
            <?php
            $students_grades = ["Name" => "Akhtar", "Age" => 22, "Physics" => 80, "Maths" => 65, "Chemistry" => 60, "Grads" => "A", "Batch" => 2024];

            foreach ($students_grades as $key => $value) {
                if ($key == "Physics" || $key == "Maths" || $key == "Chemistry" || $key == "Grads") {
                    echo "$key: $value<br>";
                }
            }
            ?>

        </div>

        <div class="card mt-3">
            <h4><u>Example - 4</u> :- Add New Students (Index Array)</h4>
            <br>
            <?php
            echo "Student List : ";
            $studentss = ["Akhtar", "Darshan", "Sohel", "Dixit"];
            print_r($studentss);
            echo "<br>";
            echo "Updated Student List : ";
            $studentss[] = "Jatin";
            print_r($studentss);
            ?>
        </div>

        <div class="card mt-3">
            <h4><u>Example - 5</u> :- Display Students With Grads </h4>
            <br>
            <?php
            $students_grades = ["Name" => "Akhtar", "Age" => 22, "Subject" => "PHP", "Grads" => "A", "Batch" => 2024];

            foreach ($students_grades as $student => $s_value) {
                if ($student == 'Batch') {
                    break;
                }
                echo  "$student : $s_value"  . "<br>";
            }
            ?>
        </div>

        <div class="card mt-3">
            <h4><u>Example - 6</u> :- Count Total Students</h4>
            <br>
            <?php
            $students = ["Akhtar", "Darshan", "Sohel", "Dixit", "Dipak"];
            $student_count = count($students);
            echo "Total Students : "  . $student_count . "<br>";
            echo "Using Array Count Values : ";
            print_r(array_count_values($students));
            ?>
        </div>

        <div class="card mt-3">
            <h4><u>Example - 7</u> :- Update Marks </h4>
            <br>
            <?php
            $students = ["Name" => "Akhtar", "Age" => 22, "Physics" => 80, "Maths" => 65, "Chemistry" => 60, "Grads" => "A", "Batch" => 2024];
            $students['Physics'] = 65;
            $students['Maths'] = 65;
            $students['Chemistry'] = 65;

            echo "Updated  Marks: <br>";
            foreach ($students as $key => $value) {
                if ($key == "Physics" || $key == "Maths" || $key == "Chemistry") {
                    echo "$key: $value<br>";
                }
            }
            ?>
        </div>

        <div class="card mt-3">
            <h4><u>Example - 8</u> :- Multidimensional Array </h4>
            <br>
            <?php
            $student = [
                "Student1" => ["name" => "Akhtar", "age" => "23", "Chemistry" => "80", "Maths" => "85", "Chemistry" => "96", "Social Science" => "92", "Batch" => 2024],
                "Student2" => ["name" => "Darshan", "age" => "25", "Chemistry" => "52", "Maths" => "65", "Chemistry" => "76", "Social Science" => "52", "Batch" => 2022],
                "Student3" => ["name" => "Sohel", "age" => "28", "Chemistry" => "82", "Maths" => "65", "Chemistry" => "69", "Social Science" => "72", "Batch" => 2023],
            ];

            foreach ($student as $stu_keys => $stu_value) {
                echo $stu_keys . "<br>";
                foreach ($stu_value as $stus_keys => $stus_values) {
                    echo "$stus_keys : $stus_values" . "<br>";
                }
                echo "<br>";
            }

            ?>
        </div>


        <div class="card mt-3">
            <h4><u>Example - 9</u> :- 3D Array</h4>
            <br>
            <?php
            $students = [
                "Student_parent" => [
                    "Student_child" => ["name" => "Akhtar", "age" => "23", "Chemistry" => "80", "Maths" => "85", "Chemistry" => "96", "Social Science" => "92", "Batch" => 2024]
                ]
            ];

            foreach ($students as $parent_key => $parent_value) {
                echo $parent_key . "<br>";
                foreach ($parent_value as $child_key => $child_values) {
                    echo $child_key . "<br>";
                    foreach ($child_values as $child_keys => $child_values) {
                        echo "$child_keys : $child_values" . "<br>";
                    }
                    echo "<br>";
                }
                echo "<br>";
            }


            ?>
        </div>

        <div class="card mt-3">
            <h4><u>Example - 10</u> :- Sorting Index Array </h4>
            <br>
            <?php
            $numbers = array(1, 63, 15, 26, 82, 50, 555, 352, 865, 912, 852, 12);
            sort($numbers);
            echo "Ascending Order: ";
            $length = count($numbers);
            for ($i = 0; $i < $length; $i++) {
                echo $numbers[$i] . " ";
            }
            echo "<br>";

            rsort($numbers);
            echo "Descending Order: ";
            $length = count($numbers);
            for ($i = 0; $i < $length; $i++) {
                echo $numbers[$i] . " ";
            }
            ?>
        </div>

        <div class="card mt-3">
            <h4><u>Example - 11</u> :- Sorting Associative Array </h4>
            <br>
            <?php
            $ages = ["Akhtar" => "23", "Darshan" => "25", "Sohel" => "22", "Jatin" => "20"];

            asort($ages);
            echo "According to Value : " . "<br>";
            foreach ($ages as $age => $age_value) {
                echo "Name=" . $age . ", Age=" . $age_value;
                echo "<br>";
            }

            echo "<br>";
            ksort($ages);
            echo "According to Key : " . "<br>";
            foreach ($ages as $age => $age_value) {
                echo "Name=" . $age . ", Age=" . $age_value;
                echo "<br>";
            }
            ?>
        </div>

        <div class="card mt-3 mb-5">
            <h4><u>Example - 12</u> :- Sorting Alphabetically</h4>
            <br>
            <?php
            $name = array("Aman", "Darshan", "Darsh", "John", "Jay", "Rajesh", "Harsh");
            sort($name);
            echo "Ascending Order : ";
            $namelength = count($name);
            for ($x = 0; $x < $namelength; $x++) {
                echo $name[$x] . " , ";
            }

            echo "<br>";
            rsort($name);
            echo "Descending Order : ";
            $namelength = count($name);
            for ($x = 0; $x < $namelength; $x++) {
                echo $name[$x] . " , ";
            }
            ?>
        </div>

    </div>

</body>

</html>