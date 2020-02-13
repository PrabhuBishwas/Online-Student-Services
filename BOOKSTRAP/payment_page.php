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
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

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

        input[type=text],input[type=password],input[type="number"]
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
        <h2>Payment Details:</h2>
    </center>
    <center>
        
            <form method="post" ng-app="" action="payment_confirm.php" enctype="multipart/form-data">
                <p>&emsp;Name : <input type="text" name="name" required></p>
                <p>Card no : <input ng-model="firstname" type="text" name="cardno" required></p>
                <p>Confirm your Card no: {{firstname}}</p>
                <p>&emsp;Cvv no : <input type="password" name="cvvno" required></p>
                <p>Amount : <input type="number" name="amt" value="<?php echo $_SESSION['cartvalue']; ?>" required readonly></p>
                <p><button type="submit" name="submit" value="submit" class="button_design">Pay Now</button></p>
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

