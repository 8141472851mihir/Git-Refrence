<?php include('dbcon.php');
 
$sql = "SELECT * FROM categories";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>category details</title>
  <!-- Bootstrap CSS (via CDN) -->
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
    body{
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
    <h1 class="text-center">Category List</h1>

    
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="demo">
        <thead>
          <tr  class="table-primary">
            <th>Category ID</th>
            <th>Category Name</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach($result as $w){
                ?>
          <tr>
            <td><?php echo $w['category_id'];?></td>
            <td><?php echo $w['category_name'];?></td>
            
          </tr>
          <?php }?>
        </tbody>
      </table>
    </div>
    <a href="index.php" class="btn btn-danger">back to Dashboard</a>
  </div>

  
  
</body>
</html>




<div class="container">
    <div class="row">

    </div>
</div>
