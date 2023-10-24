<?php 
// These variables in the name of the input type
    $FullName = filter_input(INPUT_POST,'FullName');
    $Password = filter_input(INPUT_POST,'Password');
    $Email = filter_input(INPUT_POST,'Email');
    $country = filter_input(INPUT_POST,'country');
    if(!empty($Email)){
    if(!empty($Password)){
        $host = "localhost";
        $dbusername  = "root";
        $dbpassword = "";
        $dbname = "test1";
        // Create connection With Data Base
        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
        // This Code To check whether the email and Username are Exist or Not
        $u = "SELECT fname FROM user WHERE fname='$FullName' ";
        $uu = mysqli_query($conn,$u);
        $e = "SELECT ename FROM user WHERE ename='$Email' ";
        $ee = mysqli_query($conn,$e);
        if(mysqli_connect_error()){
            die('Connect Failed : ('.mysqli_connect_errno().') '
            .mysqli_connect_error());

        }
         // This Code To check whether the Username
        else if(mysqli_num_rows($uu) > 0){
            echo "Username Already Exists";
        }
         // This Code To check whether the email
        else if(mysqli_num_rows($ee) > 0){
            echo "Email Already Exists Choose Another One";
        }else{
            $sql = "INSERT INTO user (fname, lname, ename, country) values ('$FullName', '$Password', '$Email', '$country') ";
            if($conn->query($sql)){
                echo '<h2 style = color:red ;style =  text-align: center;>Registration Successfully </h2>Hello '.$FullName ;

            }else{
                echo "Error: ".$sql ."<br>" .$conn->error;
            }
            $conn->close();

        }
    }else{
        echo "Password Must Be Not Empty";
        die();
    }

    }else{
        echo "Email Must Be not Empty";
        die();
    }
?>
