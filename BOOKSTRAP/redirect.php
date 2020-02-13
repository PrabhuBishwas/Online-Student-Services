<?php
session_start();
//echo $_SESSION['userid'];
if(isset($_SESSION['userid']))
{

header("Refresh:0,url=http://localhost:3000/Home");

}
else
{
    echo "please login";
    header("Refresh:5,url=login.html");
}
