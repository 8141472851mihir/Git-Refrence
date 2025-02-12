<?php 

    $conn=mysqli_connect("localhost","root","","sqli");

    if(!$conn)
    {
       die("Connection Error".mysqli_connect_error());
    }
    else 
    {
       echo "Database Connected";
    }

    echo "<br>";

    // $sql="create database sqli";
    // $result=mysqli_query($conn,$sql);

    // if($result==true)
    // {
    //     echo "Database sqli created";
    // }
    // else 
    // {
    //     echo "Error".mysqli_error();
    // }

    // $query="create table faculty (id int,f_name varchar(30),salary int)";
    // $result=mysqli_query($conn,$query);

    // if($result==true) 
    // {
    //     echo "table faculty is created";
    // }
    // else 
    // {
    //     echo "error".mysqli_error();
    // }

   //  $query="insert into faculty values (5,'nilam',50000);";
   //  $query .= "insert into faculty values (2,'jaimin',40000);";

   //  if(mysqli_multi_query($conn,$query))
   //  {
   //      echo "data added";
   //  }
   //  else 
   //  {
   //      echo "error".mysqli_error();
   //  }

    // $query="update faculty set f_name='dhruvi' where f_name='nilam';";
    // if(mysqli_query($conn,$query))
    // {
    //     echo "record updated";
    // }
    // else 
    // {
    //     echo "error".mysqli_error();
    // }

        // $query="select * from faculty where f_name='jaimin';";
        // $result=mysqli_query($conn,$query);

        // if(mysqli_num_rows($result)>0)
        // {
        //     while($row=mysqli_fetch_assoc($result))
        //     {
        //         echo "id : ".$row['id']."name : ".$row['f_name']."salary : ".$row['salary']."<br>";
        //     }
        // }
        // else 
        // {
        //     echo "no result";
        // }

      //   $query="select * from faculty order by f_name limit 2";
      //   $result=mysqli_query($conn,$query);

      //   if(mysqli_num_rows($result)>0)
      //   {
      //       while($row=mysqli_fetch_assoc($result))
      //       {
      //           echo "id : ".$row['id']."name : ".$row['f_name']."salary : ".$row['salary']."<br>";
      //       }
      //   }
      //   else 
      //   {
      //       echo "no result";
      //   }

      // $query="delete from faculty where id=5;";
      // if(mysqli_query($conn,$query))
      // {
      //    echo "Data deleted";
      // }
      // else 
      // {
      //    echo "error".mysqli_error();
      // }
?>