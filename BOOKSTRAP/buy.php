<?php
session_start();
if(isset($_SESSION['userid']))
{
    
    $userid = $_SESSION['userid'];
    
require_once("connection.php");
    
       $sql = "select * from cart where userid = '$userid'";
        
        $result = $conn -> query($sql);
    
        while($row = mysqli_fetch_array($result))
        {
            $bid = $row['bid'];
            //////////////////selldata//////////////////////////////////////
            
            $sql2 = "insert into selldata (bid,whotaken) values('$bid','$userid')";
            $result2 = $conn -> query($sql2);
            //echo $bid;
            ///////////////////////////quantity books////////////////////////
            $sql5 = "select available from books where bid='$bid'";;
            $result5 = $conn -> query($sql5);
            $row5 = mysqli_fetch_array($result5);
            $av = $row5[0];
            $fav = $av - $row['quantity'];
            $sql6 = "update books set available = '$fav' where bid='$bid'";
            $result6 = $conn -> query($sql6);
            
            //////////////////////////////delete from cart ///////////////////////
            $cid = $row['cid'];
            $sql7 = "delete from cart where cid= '$cid' ";
            $result7 = $conn -> query($sql7);
            
            
        }
    
    echo "Thanks for purchase";
    header("Refresh:2,url=user_data.php");
}
else
{
    echo "please login";
}

?>