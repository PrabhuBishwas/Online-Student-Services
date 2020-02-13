<?php

require_once("../connection.php");
session_start();

/*$max=sizeof($_SESSION['carti']);
for($i=0; $i<$max; $i++) { 

while (list ($key, $val) = each ($_SESSION['carti'][$i])) { 
echo "$key -> $val ,"; 
} // inner array while loop
echo "<br>";
} // outer array for loop


header("Refresh:5,url=cartaddjay.php");*/
$sumtotal = 0;
foreach($_SESSION['carti'] as $value1)
{
   /* foreach($value1 as $key => $value)
    {
        //echo $key;
        echo $value."<br>";
    }*/
    
    /*echo $value1['id'];
    echo $value1['quan'];*/
    
    $sql = "select price,photo from books where bid =".$value1['id']."";
    $result = $conn -> query($sql);
    $row = mysqli_fetch_array($result);
    /*$b = $row[0];
    echo $b;*/
    
    echo '<img class="image" style="width:200px;height:200px;" alt="Book" src="data:image/jpeg;base64,' . base64_encode( $row['photo'] ) . '" />';
    
    $total = $row['price'] * $value1['quan'];
    echo " Price: ".$row['price'];
    echo " Quantity: ".$value1['quan'];
    echo " Total: ".$total;
    
    $sumtotal += $total;
    
    
    echo"<br>";
}

echo "Your Total amount is : ". $sumtotal."<br>";

echo '<a href="cartremovealljay.php">Empty Cart</a>';


?>