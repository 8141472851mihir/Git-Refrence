<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
    <title>Datatable</title>

</head>

<body>
    <h2 class="text-center mt-3">Datatable in PHP</h2>
    <div class="container mt-3">
    <table id="datatable" class="table table-bordered" >
        <thead class="table-dark" >
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Age</th>
                <th>City</th>
                <th>State</th>
                <th>Country</th>
                <th>Subject</th>
                <th>Gender</th>
                <th>Degree</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $data = [
                ["id" => "1", "name" => "Sohel", "age" => "22", "city" => "Ahmedabad", "state" => "Gujarat", "country" => "India", "subject" => "PHP", "gender" => "Male", "degree" => "MCA"],
                ["id" => "2", "name" => "Jay", "age" => "24", "city" => "Surat", "state" => "Gujarat", "country" => "India", "subject" => "JAVA", "gender" => "Male", "degree" => "BSC"],
                ["id" => "3", "name" => "Manish", "age" => "23", "city" => "Surat", "state" => "Gujarat", "country" => "India", "subject" => ".NET", "gender" => "Male", "degree" => "BCA"],
                ["id" => "4", "name" => "Fardeen", "age" => "22", "city" => "Ahmedabad", "state" => "Gujarat", "country" => "India", "subject" => "JAVA", "gender" => "Male", "degree" => "MCA"],
                ["id" => "5", "name" => "Uday", "age" => "20", "city" => "Sihor", "state" => "Gujarat", "country" => "India", "subject" => "PHP", "gender" => "Male", "degree" => "MSC"],
                ["id" => "6", "name" => "Karan", "age" => "20", "city" => "Rajkot", "state" => "Gujarat", "country" => "India", "subject" => "Android", "gender" => "Male", "degree" => "BCA"],
                ["id" => "7", "name" => "Ajay", "age" => "21", "city" => "Jamnagar", "state" => "Gujarat", "country" => "India", "subject" => "SEO", "gender" => "Male", "degree" => "MBA"],
                ["id" => "8", "name" => "Dhruv", "age" => "23", "city" => "Bhavnagar", "state" => "Gujarat", "country" => "India", "subject" => "JavaScript", "gender" => "Male", "degree" => "MCA"],
                ["id" => "9", "name" => "Kiran", "age" => "22", "city" => "Palanpur", "state" => "Gujarat", "country" => "India", "subject" => "Python", "gender" => "Male", "degree" => "BCA"],
                ["id" => "10", "name" => "Jyoti", "age" => "22", "city" => "Mumbai", "state" => "Maharashtra", "country" => "India", "subject" => "PHP", "gender" => "Female", "degree" => "MCA"],
                ["id" => "11", "name" => "Vidhi", "age" => "20", "city" => "Ahmedabad", "state" => "Gujarat", "country" => "India", "subject" => "Python", "gender" => "Female", "degree" => "MCA"],
                ["id" => "12", "name" => "Aniket", "age" => "24", "city" => "Patan", "state" => "Gujarat", "country" => "India", "subject" => "JAVA", "gender" => "Male", "degree" => "MSC"],
                ["id" => "13", "name" => "Vishwajeet", "age" => "25", "city" => "Botad", "state" => "Gujarat", "country" => "India", "subject" => ".NET", "gender" => "Male", "degree" => "BSC"],
                ["id" => "14", "name" => "Swati", "age" => "23", "city" => "Ahmedabad", "state" => "Gujarat", "country" => "India", "subject" => "HTML", "gender" => "Female", "degree" => "BSC"],
                ["id" => "15", "name" => "Anjali", "age" => "22", "city" => "Gandhinagar", "state" => "Gujarat", "country" => "India", "subject" => "PHP", "gender" => "Female", "degree" => "MCA"],
                ["id" => "16", "name" => "Uvesh", "age" => "20", "city" => "Botad", "state" => "Gujarat", "country" => "India", "subject" => "Android", "gender" => "Male", "degree" => "BCA"],
                ["id" => "17", "name" => "Preet", "age" => "22", "city" => "Rajkot", "state" => "Gujarat", "country" => "India", "subject" => "Flutter", "gender" => "Male", "degree" => "BSC"],
                ["id" => "18", "name" => "Jaimin", "age" => "22", "city" => "Jaipur", "state" => "Rajasthan", "country" => "India", "subject" => ".NET", "gender" => "Male", "degree" => "MCA"],
                ["id" => "19", "name" => "Aarti", "age" => "19", "city" => "Ahmedabad", "state" => "Gujarat", "country" => "India", "subject" => "PHP", "gender" => "Female", "degree" => "BSC"],
                ["id" => "20", "name" => "Hiral", "age" => "18", "city" => "Gandhinagar", "state" => "Gujarat", "country" => "India", "subject" => "Android", "gender" => "Female", "degree" => "MCA"],
                ["id" => "21", "name" => "Shyam", "age" => "22", "city" => "Bhavnagar", "state" => "Gujarat", "country" => "India", "subject" => "NODE", "gender" => "Male", "degree" => "BCA"],
                ["id" => "22", "name" => "Anuj", "age" => "20", "city" => "Vadodra", "state" => "Gujarat", "country" => "India", "subject" => "PHP", "gender" => "Male", "degree" => "MCA"],
                ["id" => "23", "name" => "Kishor", "age" => "22", "city" => "Surat", "state" => "Gujarat", "country" => "India", "subject" => "JAVA", "gender" => "Male", "degree" => "MSC"],
                ["id" => "24", "name" => "Pruthvi", "age" => "24", "city" => "Kutch", "state" => "Gujarat", "country" => "India", "subject" => "JAVA", "gender" => "Male", "degree" => "BSC"],
                ["id" => "25", "name" => "Tripti", "age" => "20", "city" => "Ahmedabad", "state" => "Gujarat", "country" => "India", "subject" => "React", "gender" => "Female", "degree" => "MBA"],
                ["id" => "26", "name" => "Drashti", "age" => "21", "city" => "Jodhpur", "state" => "Rajasthan", "country" => "India", "subject" => ".NET", "gender" => "Female", "degree" => "BCA"],
                ["id" => "27", "name" => "Megha", "age" => "19", "city" => "Gandhinagar", "state" => "Gujarat", "country" => "India", "subject" => "Android", "gender" => "Female", "degree" => "BCA"],
                ["id" => "28", "name" => "Akash", "age" => "23", "city" => "Mumbai", "state" => "Maharashtra", "country" => "India", "subject" => "PHP", "gender" => "Male", "degree" => "MCA"],
                ["id" => "29", "name" => "Darshan", "age" => "22", "city" => "Ahmedabad", "state" => "Gujarat", "country" => "India", "subject" => "Flutter", "gender" => "Male", "degree" => "BBA"],
            ]
            ?>
            <?php foreach ($data as $row) : ?>
                <tr>    
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><?php echo $row['city']; ?></td>
                    <td><?php echo $row['state']; ?></td>
                    <td><?php echo $row['country']; ?></td>
                    <td><?php echo $row['subject']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['degree']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</body>

</html>