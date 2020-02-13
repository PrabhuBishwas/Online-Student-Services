<?Php
session_start();
?>

<html>

<head>
<title></title>
</head>

<body>
<?Php

        foreach($_SESSION['carti'] as $key => $value)
        {
            unset($_SESSION['carti'][$key]);
        }  
    
/*    
while (list ($key, $val) = each ($_SESSION['carti'])) { 
echo "$key -> $val <br>"; 
unset($_SESSION['carti'][$key]);
}*/

//unset($_SESSION['carti']);
echo "<br><br> All items removed from carti .. <br><br>";
    header("Refresh:2,url=../display_book_jay.php");
echo "Number of Items in the carti = ".sizeof($_SESSION['carti'])." <br>";

?>
</body>
</html>
