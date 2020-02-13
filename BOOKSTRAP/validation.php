<?php

    require_once("connection.php");
    
    $userid = $_POST['userid'];
    $password = md5($_POST['password']);

    $sql = "select userid,password,name from user_login where userid = '$userid' ";
    
    $result = $conn->query($sql);
    $row = mysqli_fetch_row($result);
    
    $vid =$row[0];
    $vpass = $row[1];
    $vname = $row[2];
    
   
    
    if ($vid==$userid){ 
        
        if ($vpass==$password){
            echo 'Successfully login ';
            header ("Refresh: 5,url=home.php");
            session_start();       
            
            $_SESSION['userid'] = $vid;
            $_SESSION['name'] = $vname;
        }
        else{  
            echo 'Invalid password dude ';
            
        }
    }
    else{
        echo 'Signup please.. you are not registered ';
        header ("Refresh: 5,url=signup.html");
    }

?>