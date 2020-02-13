<?php
session_start();
//echo $_SESSION['userid'];
if(isset($_SESSION['userid']))
{
session_abort();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Books</title>
    <link href="https://fonts.googleapis.com/css?family=Special+Elite&display=swap" rel="stylesheet">
    <link href="style/bootstrap.min.css" rel="stylesheet">
    <style>
        
        .container {
            position: relative;
            width: 200px;
            height:250px;
            float: left;
            margin: 20px;

        }

        .image {
            display: block;
            width: 200px;
            height: 200px;
        }

        .overlay {
            position: absolute;
            bottom: 0;
            left: 10;
            
            background-color: #008CBA;
            overflow: hidden;
            width: 100%;
            height: 0;
            transition: .5s ease;
        }

        .container:hover .overlay {
            height: 100%;
        }

        .text {
            white-space: nowrap;
            color: white;
            font-size: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            text-align: center;
        }
        .ghgh
        {
            background-color: aqua;
            max-width: 80%;
            margin: auto;
        }
        button
        {
            background-color: darkgreen;
            cursor: pointer;
            width: 70%;
            border: none;
            color: white;
            border-radius: 5px;
        }
        button:hover{
            background-color: red;
        }

    </style>
</head>

<body>


    <?php
    $totalcartvalue =0 ;
include "navbar.php";
require_once("connection.php");
$userid  = $_SESSION['userid'];
$sql = "select cart.cid,books.available,cart.quantity,books.photo , cart.bid , books.price, books.title, books.details from cart,books where cart.bid= books.bid and cart.userid='$userid' and cart.quantity > 0";
    
    
    
    
/*$sql = 'SELECT comp.id,comp.regno,comp.comp,comp.status,comp.photo,comp.reply,student.regno,student.roomno,student.block FROM comp ,student,warden WHERE comp.regno=student.regno and comp.status="not_solved" and student.block ="'.$_SESSION['block'].'" ';*/
    
    
    
$result = $conn -> query($sql);
   
    if(!$result)
    {
        echo mysqli_errno($conn);
        exit();
    }
    
    
   echo '<div class="ghgh">';
while($row = mysqli_fetch_array($result))
{
    $string = '';
    if($row['available']<$row['quantity'])
    {
        $string = '<span style="color:red">'.$row['quantity'].'</span>';
    }
    else
    {
        $string = '<span style="color:green">'.$row['quantity'].'</span>';
    }
    $fp = $row['price'] * $row['quantity'];
    $totalcartvalue += $fp;
    echo '<div class="container">
    
    <img class="image" alt="Book" src="data:image/jpeg;base64,' . base64_encode( $row['photo'] ) . '" />
    
    
    <div class="overlay">
    <div class="text">
    <!-----Name: '.$row['title'].'<br> -------->
    Details: '.$row['details'].' <br>
    Quantity: '.$string.' <br>

    Price: &#x20b9;'.$fp.'
    
    
    
   <br>
    
    <center>
    
    <form action="update_cart.php" method="post">
    
    <input hidden name="cid" type="text" value='.$row[0].'> 
 
    <button type="submit" name="submit">Reduce Quant</button>
    </form>
    
    </center>
    
    <br>
    <center>
    
    <form action="remove_cart.php" method="post">
    
    <input hidden name="cid" type="text" value='.$row[0].'> 
 
    <button type="submit" name="submit">Remove Item</button>
    </form>
    
    </center>
    
    </div>
    </div>
    
    <center>'.$row['title'].'</center>
    <center style="color:blue;">&#x20b9;'.$row['price'].'</center>
    
    
    </div>'; 
    
    
    /*  <center><a href="http://localhost/BOOKSTRAP/cart/cartjay.php?bid='.$row['bid'].'&quan=1&submit="><button>Add to Cart</button></a></center>
    */
}
    
    
echo '</div><div>

<br><div style="clear:both;"><div>
<center><p>Total Cart Value is '.$totalcartvalue.'<p><a href="payment_page.php"><button style="width:200px;">Buy Now</button></a></center>


</div>';
    
    $_SESSION['cartvalue'] = $totalcartvalue;
    
?>

</body>

</html>
<?php
    
}
else
{
    echo "please login";
    header("Refresh:5,url=login.html");
}
    
    
    
    ?>
