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
    <title>Upload Book</title>
    <link href="https://fonts.googleapis.com/css?family=Special+Elite&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <style type="text/css">
        html {
            height: 100%;
        }
        .bg_img{
            color: orangered;
            box-sizing: border-box;
            background-color: #C8BCA7;
            border-radius: 20px;
            max-width: 560px;
            margin-top: 50px;
            padding-top: 20px;
            border: none;
            outline: none;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Glegoo', serif;
            background-image: linear-gradient(to bottom right, white, #C8BCA7);
        }

        input[type=text],input[type="number"]
        {
        
            border-radius: 10px;
            outline: none;
           
            border: none;
            width: calc(100%);
            text-align: center;
        }
        .button_design{
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            opacity: 0.9;
            outline: none !important;
            margin-top: 10px;
            margin-bottom: 20px;
            border-radius: 10px;
            border: none;
            outline: none;
            width: 150px;
            height: 50px;
        }
        .button_design:hover{
            background-color: red;
        }

    </style>
</head>

<body>
    <?php  
        require_once("navbar.php");     
    ?>
    <div class="container-fluid bg_img">
    
    <center>
        <h2>Enter book info:</h2>
    </center>
    <center>
        
            <form method="post" action="upload_back.php" enctype="multipart/form-data">
                <input type="text" hidden name="userid" value="<?php echo $_SESSION['userid'];  ?>">
                <p>&emsp;Title : <input type="text" name="title" required></p>
                <p>Details : <input type="text" name="details" required></p>
                <p>&emsp;Price : <input type="number" name="price" required></p>
                <p>Quantity : <input type="number" name="qty" value=1 required></p>
                <p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;Photo : <input type="file" name="photo" required></p>
                <p><button type="submit" name="submit" value="submit" class="button_design">Upload</button></p>
            </form>
       
    </center>
</div>
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

