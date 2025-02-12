<?php
include('dbcon.php');

// SQL query to join subcategories with categories
$sql = "
    SELECT subcategories.subcategory_id, subcategories.subcategory_name, categories.category_name 
    FROM subcategories
    JOIN categories ON subcategories.category_id = categories.category_id
";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Category and Subcategory Details</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" type="text/javascript"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.bootstrap5.min.css">
  <script src="https://cdn.datatables.net/2.2.1/js/dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/2.2.1/js/dataTables.bootstrap5.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

  <script type="text/javascript">
  $(document).ready(function() {
      $('#demo').DataTable();
  });
  </script>

  <style>
    body {
        background-color: antiquewhite;
    }
    h1 {
        font-style: italic;
        color: brown;
        font-size: 45px;
    }
    .table-responsive {
        overflow-x: auto;
    }

    @media (max-width: 1024px) {
        h1 {
            font-size: 30px;
        }
    }

    @media (max-width: 768px) {
        h1 {
            font-size: 25px;
        }
        .table {
            font-size: 12px;
        }
    }

    @media (max-width: 480px) {
        h1 {
            font-size: 20px;
        }
        .table {
            font-size: 10px;
        }
    }

    .table td, .table th {
        padding: 8px;
        vertical-align: middle;
    }
  </style>

</head>
<body>

  <div class="container mt-4">
    <h1 class="text-center">Category and Subcategory List</h1>

    
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="demo">
        <thead>
          <tr class="table-primary">
            <th>Subcategory ID</th>
            <th>Subcategory Name</th>
            <th>Category Name</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($result as $row) { ?>
            <tr>
              <td><?php echo $row['subcategory_id']; ?></td>
              <td><?php echo $row['subcategory_name']; ?></td>
              <td><?php echo $row['category_name']; ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <a href="index.php" class="btn btn-danger">Back to Dashboard</a>
  </div>

 
</body>
</html>
