<?php

    require_once("connection.php");
    
    $userid = $_POST['userid'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];
    $name = $_POST['name'];

    $sql = "INSERT INTO user_login (userid,name,password,email) VALUES ('$userid','$name','$password','$email')";
    
    $sql2 = "select userid from user_login where userid='$userid'";
    
    $sql3 = "select name from user_login where name='$name' and email='$email'";
    $result3 = $conn->query($sql3);
    $row3 = mysqli_fetch_row($result3);
    $n = $row3[0];

    if($n==$name)
    {
        echo 'You\'re already BOOTSTRAPed :) Redirecting to login page';
        header ("Refresh: 5,url=login.html");
    }
    
    else
    {
    
    $result2 = $conn->query($sql2);
    $row = mysqli_fetch_row($result2);
    $uid = $row[0];

    if($uid==$userid){
        echo 'This userid is already taken by someone else please chose someother';
        header ("Refresh: 5,url=signup.html");
    }
    else{
        $result = $conn->query($sql);
        if (!$result){
            die('There was an error in running the query [' . $conn->error . '] ');
        }
        else{
            echo 'Successfully registered ';
            header ("Refresh: 5,url=login.html");
        }
    }
        
    }
?>