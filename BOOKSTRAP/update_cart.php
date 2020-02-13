<?php
session_start();
if(isset($_SESSION['userid']))
{
    
    $cid = $_POST['cid'];
    $userid = $_SESSION['userid'];
    
require_once("connection.php");
    
    $sql3 = "select quantity from cart where cid = '$cid'";
    $result3 = $conn -> query($sql3);
    $row3 = mysqli_fetch_array($result3);
    $q3 = $row3[0];
    
    $q3--;
    
    $sql4 = "update cart set quantity = '$q3' where cid = '$cid'";
    $result4 = $conn -> query($sql4);
    
    if($result4)
    {
        echo "success";
        header("Refresh:0,url=display_cart2.php");

    }
    
}
else
{
    echo "please login";
}

?>