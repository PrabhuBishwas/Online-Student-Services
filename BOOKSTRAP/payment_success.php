<?php

require_once("connection.php");

$bid = $_GET['bid'];
$whosebook = $_GET['whosebook'];
$whotaken = $_GET['whotaken'];

// checking book is already sold or not
$sql3 = "select available from books where bid = $bid";
$result3 = $conn->query($sql3);
$row3 = mysqli_fetch_array($result3);
$avail = $row3[0];

if($avail > 0)
{
    

$sql = "insert into selldata (bid,whosebook,whotaken) values ('$bid','$whosebook','$whotaken')";
$sql2 = "update books set available = ($avail-1) where bid = $bid";
$result = $conn -> query($sql);
$result2 = $conn -> query($sql2);
if(!$result || !$result2)
{
    printf("Error: %s\n",mysqli_errno($conn));
    exit();
}

if(!$result)
{
    echo "not completed";
}
else
{
    
    //header("REfresh:5,url=display_book.php");
    echo "completed";
}

}
else
{
    echo "already sold out ....";
}



?>