<!DOCTYPE html>
<html>

<head>
    <title>Books</title>
    <link href="https://fonts.googleapis.com/css?family=Special+Elite&display=swap" rel="stylesheet">
    <style>
        html {
            height: 100%;
        }

        body {
            margin: 3%;
            background-image: linear-gradient(to bottom right, white, #C8BCA7);
            font-family: 'Special Elite', cursive;
        }

        .img {
            border: 1px solid #C8BCA7;
            border-radius: 4px;
            padding: 5px;
            width: 200px;
            height: 200px;
        }

        .container {
            position: relative;
            width: 200px;
            float: left;
        }

        .image {
            display: block;
        }

        .overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: white;
            opacity: 0.75;
            overflow: hidden;
            border-radius: 4px;
            width: 212px;
            height: 0;
            transition: .5s ease;
        }

        .container:hover .overlay {
            height: 100%;
        }

        .text {
            white-space: nowrap;
            color: black;
            font-size: 20px;
            font-weight: bolder;
            position: absolute;
            overflow: hidden;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
        }

    </style>
</head>

<body>
    <?php  
        require_once("navbar.php");
    ?>
    <h2 style="color:red;">Finding good homes for books since 2019.</h2>
    <?php
        require_once("connection.php");
        $sql = "select * from books";
        $result = $conn -> query($sql);
        //$row = mysqli_fetch_row($result);
        $i = 0 ;
        while($row = mysqli_fetch_array($result))
        {
            if($i==3){
                
                $i=0;
            }
            /*http://localhost/BOOKSTRAP/sell_back.php?bid=19&whosebook=jay785&whotaken=jay785*/
            echo '<div class="container"><a href="http://localhost/BOOKSTRAP/sell_back.php?bid=19&whosebook=jay785&whotaken=jay785"><img alt="Book" class="img image" src="data:image/jpeg;base64,' . base64_encode( $row['photo'] ) . '" /></a><div class="overlay"><div class="text">Name: '.$row[2].'<br><br>Details: '.$row[3].'<br><br>Price: &#x20b9;'.$row[4].'</div></div></div>'; 
        }
    ?>
    
</body>

</html>
