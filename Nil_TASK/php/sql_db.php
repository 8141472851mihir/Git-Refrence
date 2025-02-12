<?php
    $usermail = "nilpatel@123";
    $userphn = 9328298858;


    $sql =mysqli_connect("localhost","root","","experiment");

    if(!$sql){
        die("Not connected" . mysqli_connect_error());
    }else{
        echo "Connected";
        echo "<br>";
        
        $fetch = "SELECT * FROM user_table WHERE u_mail = '$usermail' AND u_phn = '$userphn'";
        $result = mysqli_query($sql, $fetch);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              echo "Hello" . $row['u_name'];
            }
          } else {
            echo "no data found";
          }
        
    }

    mysqli_close($sql);
?>