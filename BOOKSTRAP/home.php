<html>

<head>
    <title>Bookstrap</title>
    
    <link href="https://fonts.googleapis.com/css?family=Glegoo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="navbar.css">
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            font-family: 'Glegoo', serif;
            background-image: linear-gradient(to bottom right, white, #C8BCA7);
        }

        #textinimage {
            width: 50.5%;
            height: 19.5%;
            background-color: #D22A30;
            position: absolute;
            top: 50.3%;
            /*left:10.2%;*/
        }

        #tab {
            margin-left: 5.15%;
            margin-right: 5.15%;
            margin-top: 35%;
        }

        .list {
            float: left;
            margin-right: 5%;
        }

        ul {
            list-style-type: none;
        }

        #footer {
            margin-left: 5.15%;
            margin-right: 5.15%;
        }

        a {
            text-decoration: none;
            color: black;
        }
        #tab a{
            color: #888888;
        }
        #tab a:hover{
            color: black;
        }
        #cart2 {
            width: 27%;
            background-color: #F7F7F7;
            color: #929292;
            padding: 10px 13px 10px 13px;
            text-align: center;
            position: absolute;
            top: 12.5%;
            left: 66%;
            display: none;
        }

    </style>
</head>

<body onload="myMove()">
    <?php  
        require_once("navbar.php");
           // unset($_SESSION['se']);

    ?>
    <script>
        function myMove() {
            var elem = document.getElementById("textinimage");
            var pos = 400;
            var id = setInterval(frame, 20);

            function frame() {
                if (pos == 450) {
                    clearInterval(id);
                } else {
                    pos++;
                    elem.style.right = pos + "px";
                }
            }
        }

    </script>

    <div id="bigimage">
        
        <img style="height:82%;width:100%;" src="library.jpg">
        <div id="textinimage">
            <h1 style="text-align: center; color:white;">"The world is quiet here"</h1>
        </div>
      
    </div>

  

    <div style="clear:left;"></div>

    <hr>

    <div id="footer">
        <center><p>Made with ❤️ by &copy; Prabhu &amp; Jaydeep 2019</p></center>
    </div>

</body>

</html>
