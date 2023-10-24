<?php 
// These variables in the name of the input type
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $FullName = filter_input(INPUT_POST,'FullName');
    $Password = filter_input(INPUT_POST,'Password');
    $Email = filter_input(INPUT_POST,'Email');
        $host = "localhost";
        $dbusername  = "root";
        $dbpassword = "";
        $dbname = "test1";
        // Create connection With Data Base
        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

        if(mysqli_connect_error()){
            die('Connect Failed : ('.mysqli_connect_errno().') '
            .mysqli_connect_error());
        }
            $e = "SELECT *FROM user WHERE lname ='$Password' AND ename ='$Email' ";
            $ee = mysqli_query($conn,$e);

            if(mysqli_num_rows($ee) == 1){
                $sql = "SELECT fname FROM user WHERE lname = '$Password'";
                $result = mysqli_query($conn,$sql);
                // fetch the result in array
                $login = mysqli_fetch_array($result, MYSQLI_ASSOC);
                mysqli_free_result($result);
                mysqli_close($conn);
                echo '<h2 style = color:red ;>Sign In Successfully </h2>Hello ',print_r($login) ;
                die();
            }else
                {
                echo 'Failed To login Check you are Sign Up' ;
                        die();
                        }

                        
            }

?>