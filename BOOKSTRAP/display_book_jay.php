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
            bottom: 0px;
            left: 10;
            
            background-color: #008CBA;
            overflow: hidden;
            width: 100%;
            height: 0;
            transition: .5s ease;
        }

        .container:hover .overlay {
            height: calc(100% - 0px);
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
            background-color: #C8BCA7;
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
    
    
<!---form method="post" action="display_book_jay.php">
    <select name='sort' onchange='if(this.value != 0) { this.form.submit(); }'>
         <option value='0'>Sort</option>
         <option value='1'>Price high to Low</option>
         <option value='2'>Price Low to High</option>
         <option value='3'>Latest</option>
    </select>
</form---->

    <?php
include "navbar.php";
require_once("connection.php");

    
    ////// BASIC sql WITH SEARCH///////////////////////
    if(isset($_GET['submit']))
    {
    
    $search = $_GET['search'];
    //$_SESSION['se'] = $search;
       // $kp = $_SESSION['se'];
$sql = "select * from books where available > 0  and title like '%$search%'";
        
        
    }
   /* else if(isset($_SESSION['se']))
    {
        $kp = $_SESSION['se'];
$sql = "select * from books where available > 0  and title like '%$kp%'";
        
    }*/
    else
    {
        //unset($_SESSION['se']);
        
        $sql = "select * from books where available > 0";
        
    }
    ///////////////////////////////////////////////////////////
        ///////////////////////////mid sql with sort /////////////////////////
    $sql22 = " ";
     if(isset($_POST['sort']))
    {
    
    $sort = $_POST['sort'];
         
         
         if($sort==2)
         {
         
$sql22 = " order by price asc";
         }
         else if($sort==1)
         {
             $sql22 = " order by price desc";

         }
        else if($sort==3)
         {
             $sql22 = " order by date desc";

         }
        
        
    }
   
    
    $sql = $sql.$sql22;
    
//echo $_POST['sort'];
    
    
    /////////////////////////////////////////////////////////
$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .     $_SERVER['REQUEST_URI']; 
  
//echo $link; 
        
$result = $conn -> query($sql);
    
    
    if(!$result)
    {
        echo mysqli_error($conn);
    }
    
    echo "<form method='post' action='$link'>
    <select name='sort' onchange='if(this.value != 0) { this.form.submit(); }'>
         <option value='0'>Sort</option>
         <option value='1'>Price high to Low</option>
         <option value='2'>Price Low to High</option>
         <option value='3'>Latest</option>
    </select>
</form>
";
    
   echo '<div class="ghgh">';
while($row = mysqli_fetch_array($result))
{
    echo '<div class="container">
    
    <img class="image" alt="Book" src="data:image/jpeg;base64,' . base64_encode( $row['photo'] ) . '" />
    
    
    <div class="overlay">
    <div class="text">
    <!---Name: '.$row[2].'-->
    Details: '.$row[3].'<br>
    
    Price: &#x20b9;'.$row[4].' <br>
    Available : '.$row['available'].'
    <br><br>
    
    <center>
    
    <form action="sell_back.php" method="post">
    
    <input hidden name="bid" type="text" value='.$row[0].'> 
 
    <button type="submit" name="submit">Buy Now</button>
    </form>
    
    </center>
    <br>
    
    <center>
    
    <form action="cart/cart_back.php" method="post">
    
    <input hidden name="bid" type="text" value='.$row[0].'> 
        <input hidden name="price" type="text" value='.$row['price'].'> 

 
    <button type="submit" name="submit">Add to Cart</button>
    </form>
    
    </center>
    
    </div>
    </div>
    
    <center>'.$row[2].'</center>
    <center style="color:blue;">&#x20b9;'.$row[4].'</center>
    
    
    </div>'; 
    
    
    /*  <center><a href="http://localhost/BOOKSTRAP/cart/cartjay.php?bid='.$row['bid'].'&quan=1&submit="><button>Add to Cart</button></a></center>
    */
}
    
    
echo '</div>';
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
