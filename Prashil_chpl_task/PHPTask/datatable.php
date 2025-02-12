<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.min.css">
  <script src="https://cdn.datatables.net/2.2.1/js/dataTables.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script>
    $(document).ready(function () {
      $("#example").DataTable();
    });
  </script>
</head>

<body>
  <div class="container d-flex">
    <div class="jason col-md-6">
      <h2>jason practice and use of require</h2>
      <?php require("practiceofjson.php") ?>
    </div>
    <div class="date-time col-md-6">
      <h2>date and time and use of include</h2>
      <?php include("datetime.php") ?>
    </div>
  </div>
  <div class="container d-flex mt-5">
    <div class="exception col-md-6">
      <h2>exception and use of require_once</h2>
      <?php require_once("practiceofexceptionhandling.php") ?>
    </div>
    <div class="userdefineexception col-md-6">
      <h2>user define exception and use of include_once</h2>
      <?php include_once("userdefineexception.php") ?>
    </div>
  </div>
  <div class="container mt-5">
    <h2>Example of Data Table</h2>
    <table class="table" style="text-align: center;" id="example">
      <thead>
        <tr>
          <th >ID</th>
          <th >Car Name</th>
          <th >Price</th>
          <th >Color</th>
          <th >Company</th>
          <th >Mileage</th>
          <th >Transmision</th>
          <th >Seats</th>
          <th >Luggage (Bags)</th>
          <th >Fuel Type</th>
          <th colspan="2" >Action</th>
        </tr>
      </thead>
      <?php
      include_once("configur.php");
      $qur = "SELECT * FROM car_data INNER JOIN color ON color.ColorID = car_data.ColorID INNER JOIN category ON car_data.Category_ID = category.Category_ID";
      $res = mysqli_query($conn, $qur);
      $i = 1;
      ?>
      <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($res)) {
          ?>
          <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo ($row['Car_Name']); ?></td>


            <td><?php echo ($row['Price']); ?></td>
            <td><?php echo ($row['ColorName']); ?></td>
            <td><?php echo ($row['Category_Name']); ?></td>
            <td><?php echo ($row['car_mileage']); ?></td>
            <td><?php echo ($row['car_transmision']); ?></td>
            <td><?php echo ($row['car_seats']); ?></td>
            <td><?php echo ($row['car_luggage']); ?></td>
            <td><?php echo ($row['car_fuel']); ?></td>

            <td><a href="Editcar.php?id=<?php echo ($row['Car_ID']); ?>">Edit</a></td>
            <td><a href="con_deletecar.php?id=<?php echo ($row['Car_ID']); ?>"
                onclick="return confirm('Are you sure you want to delete?');">Delete</td>
          </tr>
          <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>