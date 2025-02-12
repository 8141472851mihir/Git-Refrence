<?php 

    $con=new mysqli("localhost","root","","oop");

    if($con->connect_error)
    {
        die("Connectin Error" . $con->connect_error);
    }
    else 
    {
        echo "Connected successfully";
    }

    echo "<br>";
    
    // $query="create database oop";
    // if($con->query($query)==true)
    // {
    //     echo "Database oop is created";
    // }
    // else 
    // {
    //     echo "Error occur".$con->error;
    // }

    // $sql="create table student (id int,name varchar(30),salary int)";
    // if($con->query($sql)==true)
    // {
    //     echo "Table student is created";
    // }
    // else 
    // {
    //     echo "Error".$con->error;
    // }

    // $sql="insert into student values (4,'raj',20000);";
    // $sql.="insert into student values (2,'jay',35000);";

    // if($con->multi_query($sql)==true) 
    // {
    //     echo "Data inserted";
    // }
    // else 
    // {
    //     echo "error".$con->error;
    // }

    // $sql="update student set name='ridham' where name='raj';";
    // if($con->query($sql)===true) 
    // {
    //     echo "record updated";
    // }
    // else 
    // {
    //     echo "error".$con->error;
    // }

        // $sql="select * from student where name='ridham';";
        // $result=$con->query($sql);

        // if($result->num_rows>0)
        // {
        //     while($row=$result->fetch_assoc())
        //     {
        //         echo "id : ".$row['id']."name : ".$row['name']."salary : ".$row['salary']."<br>";
        //     }
        // }
        // else 
        // {
        //     echo "no result";
        // }
        
        // $sql="select * from student order by name limit 1 offset 3;";
        // $result=$con->query($sql);

        // if($result->num_rows>0)
        // {
        //     while($row=$result->fetch_assoc())
        //     {
        //         echo "id : ".$row['id']."name : ".$row['name']."salary : ".$row['salary']."<br>";
        //     }
        // }
        // else 
        // {
        //     echo "no result";
        // }

        // $sql="delete from student where id=4;";
        // if($con->query($sql)===true)
        // {
        //     echo "data deleted";
        // }
        // else 
        // {
        //     echo "error".$con->error;
        // }

        // $stmt=$con->prepare("insert into student values (?, ?, ?)");
        // $stmt->bind_param("isi",$id,$name,$salary);

        // $id=10;
        // $name="raju";
        // $salary=60000;
        // $stmt->execute();
        // echo "new record added";
?>