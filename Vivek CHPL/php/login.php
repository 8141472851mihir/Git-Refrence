<?php 
    $con=mysqli_connect("localhost","root","","login");
    // if($con)
    // {
    //     echo "Connected";
    // }
    // echo "<br>";
    // $query="create table verify (username varchar(30),password int)";
    // if(mysqli_query($con,$query))
    // {
    //     echo "Table created...";
    // }
    
    // $query="insert into verify values ('john',456)";
    // if(mysqli_query($con,$query))
    // {
    //     echo "Data added...";
    // }

    $sql="select * from verify where username='joe' and password=1555;";
    $result=mysqli_query($con,$sql);

    if(mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            echo "Logged In"."<br>"."Welcome : ".$row['username']."<br>";
        }
    }
    else 
    {
        echo "Sorry, Record not found...";
    }

?>