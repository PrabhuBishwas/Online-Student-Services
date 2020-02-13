<?php
session_start();
if(isset($_SESSION['userid']))
{
    
    $bid = $_POST['bid'];
    $userid = $_SESSION['userid'];
    
require_once("connection.php");
    
    /*$sql3 = "select available from books where bid = '$bid'";
    $result3 = $conn -> query($sql3);
    $row3 = mysqli_fetch_array($result3);
    $q3 = $row3[0];
    
    $q3--;
    
    $sql4 = "update books set available = '$q3' where bid = '$bid'";
    $result4 = $conn -> query($sql4);
    
    */
    $sql2 = "select quantity from cart where bid = '$bid' and userid='$userid'";
    $result2 = $conn -> query($sql2);
    $row2 = mysqli_fetch_array($result2);
    $b2 = $row2[0];
    
    
    
    if($b2==0)
    {
    
    
    
    $sql = "insert into cart (userid,bid,quantity) values('$userid','$bid',1)";
    $result = $conn -> query($sql);
    
    
    if(!$result)
    {
      printf("eroor:%s\n",mysqli_error($conn));
        exit();
    }
    
if($result)
{
    echo "book added succesfully";
    $_SESSION['amt'] = $_POST['price'];
        header("Refresh:1,url=payment_page.php");

}
    else
    {
        echo "wrong entry";
    }
    
    
    }
    
    else
    {
      
        
        //////////////////////////////
        
        
        
        $p = $b2+1;
         
    $sql = "update cart set quantity = '$p' where bid = '$bid' and userid='$userid' ";
    $result = $conn -> query($sql);
    
    
    if(!$result)
    {
      printf("eroor:%s\n",mysqli_error($conn));
        exit();
    }
    
if($result)
{
    echo "book added succesfully";
    header("Refresh:1,url=buy.php");
}
    else
    {
        echo "wrong entry";
    }
        
        
        ////////////////////////////
        
        
        
        
    }
    
}
else
{
    echo "please login";
}

?>