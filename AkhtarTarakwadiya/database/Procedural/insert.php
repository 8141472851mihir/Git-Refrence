<?php
    include   'conn.php';


$sql = "INSERT INTO `company`( `company_name`, `company_type`, `company_contact`, `company_email`, `comapny_GST_no`, `company_branches`, `company_address`, `company_clients`, `company_technology`, `company_products`)
                 VALUES ('Test','Serveice Based','7854123658','test@gmail.com','12312SWEDF87658','5','USA','78','PHP','Dummy')";

if (mysqli_query($conn, $sql)) {
  echo "<br><br>New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>