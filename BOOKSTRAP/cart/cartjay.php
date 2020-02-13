<?php

if(isset($_GET['submit']))
{
    session_start();
    
    
    if(!isset($_SESSION['carti']))
    {
        $_SESSION['carti'] = array();
    }
    
    
    
    $bid = $_GET['bid'];
    $quan = $_GET['quan'];
    $b=array("id"=>$bid,"quan"=>$quan);
    array_push($_SESSION['carti'],$b); // Items added to cart
    
    
    
    echo "created";
    echo "<br>Number of Items in the cart = ".(sizeof($_SESSION['carti']));
    
    //header("Refresh:5,url=showjay.php");
    header("Refresh:0,url=../display_book_jay.php");
}
else
{
    echo "not permit";
}



?>