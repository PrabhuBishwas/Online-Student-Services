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
            background-color: darkgreen;
            cursor: pointer;
            width: 70%;
            border: none;
            color: white;
            border-radius: 10px;
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

    
    
    
    
    echo '<div>';
    
    
    ////// BASIC sql WITH SEARCH///////////////////////
    if(isset($_GET['submit']))
    {
    
    $search = $_GET['search'];
    //$_SESSION['se'] = $search;
       // $kp = $_SESSION['se'];
        
        $userid = $_SESSION['userid'];
        
$sql = "select * from books where available > 0 and userid='$userid' and title like '%$search%'";
        
        
    }
   /* else if(isset($_SESSION['se']))
    {
        $kp = $_SESSION['se'];
$sql = "select * from books where available > 0  and title like '%$kp%'";
        
    }*/
    else
    {
        //unset($_SESSION['se']);
        
        $sql = "select * from books where available > 0 and userid='$userid'";
        
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
    
   echo ' <center><p>up for sell</p></center><div class="ghgh">';
while($row = mysqli_fetch_array($result))
{
    echo '<div class="container">
    
    <img class="image" alt="Book" src="data:image/jpeg;base64,' . base64_encode( $row['photo'] ) . '" />
    
    
    <div class="overlay">
    <div class="text">
    Details: '.$row[3].'<br><br>
    <!---Details: '.$row[3].'-->
    
    Price: &#x20b9;'.$row[4].'
    
    <br><br>
    
    
    </div>
    </div>
    
    <center>'.$row[2].'</center>
    <center style="color:blue;">&#x20b9;'.$row[4].'</center>
    
    
    </div>'; 
    
    
    /*  <center><a href="http://localhost/BOOKSTRAP/cart/cartjay.php?bid='.$row['bid'].'&quan=1&submit="><button>Add to Cart</button></a></center>
    */
}
    
    
echo '</div></div>';
    
    
    
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    

    
    
    echo '<div style="clear:both">';
    
    
        ////// BASIC sql WITH SEARCH///////////////////////
    
    $sql = "select * from books where available = 0 and userid='$userid'";
   
        
$result = $conn -> query($sql);
    
    
   
    
    
   echo '<center><p>sold Out</p></center><div class="ghgh">';
    
while($row = mysqli_fetch_array($result))
{
    echo '<div class="container">
     
    <img class="image" alt="Book" src="data:image/jpeg;base64,' . base64_encode( $row['photo'] ) . '" />
    
    
    <div class="overlay">
    <div class="text">
    Details: '.$row[3].'<br><br>
    <!---Details: '.$row[3].'-->
    
    Price: &#x20b9;'.$row[4].'
    
    <br><br>
    
    
    
    </div>
    </div>
    
    <center>'.$row[2].'</center>
    <center style="color:blue;">&#x20b9;'.$row[4].'</center>
    
    
    </div>'; 
    
    
    /*  <center><a href="http://localhost/BOOKSTRAP/cart/cartjay.php?bid='.$row['bid'].'&quan=1&submit="><button>Add to Cart</button></a></center>
    */
}
    
    
echo '</div></div>';
    
    
    
    
    
    ////////////////////3/////////////////////////////////////////////////////
    
    
    

    
    
    echo '<div style="clear:both">';
    
    
        ////// BASIC sql WITH SEARCH///////////////////////
    
    $sql = "select selldata.time,books.bid,books.available,books.photo,selldata.bid, books.price, books.title, books.details from selldata,books where selldata.bid= books.bid and books.userid='$userid'";
   
        
$result = $conn -> query($sql);
    
    
   
    
    
   echo '<center><p>Your purchased book</p></center><div class="ghgh">';
    
while($row = mysqli_fetch_array($result))
{
    echo '<div class="container">
     
    <img class="image" alt="Book" src="data:image/jpeg;base64,' . base64_encode( $row['photo'] ) . '" />
    
    
    <div class="overlay">
    <div class="text">
    Details: '.$row['details'].'<br><br>
    <!---Details: '.$row['details'].'-->
    
    Price: &#x20b9;'.$row['price'].'
    
    <br><br>
        '.$row['time'].'<br><br>

    <br><br>
    
    <center>
    
    
    
    </div>
    </div>
    
    <center>'.$row['title'].'</center>
    <center style="color:blue;">&#x20b9;'.$row['price'].'</center>
    
    
    </div>'; 
    
    
    /*  <center><a href="http://localhost/BOOKSTRAP/cart/cartjay.php?bid='.$row['bid'].'&quan=1&submit="><button>Add to Cart</button></a></center>
    */
}
    
    
echo '</div></div>';
    
    
    ////////////////////////////////////////////////////////
    
    
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
