<?php

if(isset($_POST['submit'])){
 //including the connection file for database connection 
    require_once("connection.php");
    //include_once 'connection.inc.php';
    // defining variables for inserting
    $qty = $_POST['qty'];
    $userid = $_POST['userid'];
    $title = $_POST['title'];
    $price = (int)$_POST['price'];
    $details = $_POST['details'];   
    $photo = getimagesize($_FILES["photo"]["tmp_name"]);
    
    if($photo != false){
        $image = $_FILES['photo']['tmp_name'];
        $imgcontent = addslashes(file_get_contents($image));
    }
    
//inserting 
    
$sql="INSERT INTO books (userid,title,price,details,photo,available) VALUES ('$userid','$title',$price,'$details','$imgcontent',$qty)";
$result = $conn->query($sql);
if(!$result){
    die('There was an error running the query [' . $conn->error . ']');
}
else{
    echo "Book uploaded successfully :)";
    header("Refresh: 5,url=display_book_jay.php");
}    
}
else{  
    echo "Access denied!";
    header("Refresh: 5,url=home.php");
}

?>