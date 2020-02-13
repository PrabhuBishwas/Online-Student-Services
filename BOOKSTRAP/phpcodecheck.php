<?php

require_once("connection.php");

$sql = "select * from books";

$result = $conn -> query($sql);

while($row = mysqli_fetch_array($result))
    
{
    echo $row;
}





?>