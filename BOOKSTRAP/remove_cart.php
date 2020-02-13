<?php
session_start();
if(isset($_SESSION['userid']))
{
    
    $cid = $_POST['cid'];
    $userid = $_SESSION['userid'];
    
require_once("connection.php");
    
  
    $sql4 = "update cart set quantity = 0 where cid = '$cid'";
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