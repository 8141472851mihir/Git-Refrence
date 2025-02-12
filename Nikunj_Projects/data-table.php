<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.min.css"></link>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.min.js" ></script>
    
    <script>
        $(document).ready(function(){
            $('#table').DataTable();
        })
    </script>
</head>
<body>
    

<table id="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Contact</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $data=array(
        array("Name"=>"Ajay","Age"=>22,"Contact"=>9374627463),
        array("Name"=>"Ajit","Age"=>32,"Contact"=>9374637462),
        array("Name"=>"Ketan","Age"=>30,"Contact"=>9374627463),
        array("Name"=>"Kanji","Age"=>24,"Contact"=>9374627463),
        array("Name"=>"Ramesh","Age"=>32,"Contact"=>9374627463),
        array("Name"=>"Ranjit","Age"=>43,"Contact"=>9374627463),
        array("Name"=>"Dax","Age"=>32,"Contact"=>9374627463),
        array("Name"=>"Ravi","Age"=>37,"Contact"=>9374627463),
        array("Name"=>"Kaushik","Age"=>29,"Contact"=>9374627463),
        array("Name"=>"Mangu","Age"=>52,"Contact"=>9374627463),
        array("Name"=>"Vasu","Age"=>24,"Contact"=>9374627463),
        array("Name"=>"Savan","Age"=>27,"Contact"=>9374627463),
        array("Name"=>"Ajay","Age"=>22,"Contact"=>9374627463),
        array("Name"=>"Ajit","Age"=>32,"Contact"=>9374637462),
        array("Name"=>"Ketan","Age"=>30,"Contact"=>9374627463),
        array("Name"=>"Kanji","Age"=>24,"Contact"=>9374627463),
        array("Name"=>"Ramesh","Age"=>32,"Contact"=>9374627463),
        array("Name"=>"Ranjit","Age"=>43,"Contact"=>9374627463),
        array("Name"=>"Dax","Age"=>32,"Contact"=>9374627463),
        array("Name"=>"Ravi","Age"=>37,"Contact"=>9374627463),
        array("Name"=>"Kaushik","Age"=>29,"Contact"=>9374627463),
        array("Name"=>"Mangu","Age"=>52,"Contact"=>9374627463),
        array("Name"=>"Vasu","Age"=>24,"Contact"=>9374627463),
        array("Name"=>"Savan","Age"=>27,"Contact"=>9374627463));
        ?>

    <?php
    foreach ($data as $key => $value){?>
    
    <tr>
        <td><?php echo $value["Name"] ?></td>
        <td><?php echo $value["Age"] ?></td>
        <td><?php echo $value["Contact"] ?></td>
    </tr>
    <?php } ?>
    </tbody>

    
</table>

</body>
</html>