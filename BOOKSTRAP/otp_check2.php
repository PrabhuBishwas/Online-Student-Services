<?php

if(isset($_POST['submit']))
{
    session_start();

    if($_SESSION['otp']==$_POST['otp'])
    {
        echo "Payment Success";
        
        header("Refresh:2,url=buy.php");
    }

}
else
{
    echo "not submitted";
}

?>