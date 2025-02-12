<html>
    <body>
        <form method="post" action="">
        <label for="user_input">Enter a value:</label>
        <input type="value" name="user_input" id="Enter the value:">
        <button type="submit">Submit</button>
        </form>
        <?php
        //$userInput=0;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve the user input
            $userInput = htmlspecialchars($_POST['user_input']);
            $user=abs($userInput);
            echo "You entered: " . $user."<br>";
            if($user!=0)
            {
                for($i=1;$i<=10;$i++)
                {
                    $result=$i*$user;
                    echo "$user * $i = $result"."<br>";
                }
            }
            
        }
        else
        {
            echo "Enter value!!";
        }
        // $uservalue=;
        
        // echo $uservalue;
        // if($uservalue==1)
        // {        
        //     for($i=1;$i<=10;$i++)
        //     {
        //         $result = $i * $uservalue;
        //         echo "8*$i=$result"."<br>";
        //     }
        // }
        // else
        // {
        //     echo "Enter the value!!";
        // }
        ?>
    </body>
</html>

