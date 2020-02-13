<!DOCTYPE html>
<html>
<head>
    <style>
    body
        {
            background-color: <?php if(isset($_GET['color'])){echo $_GET['color'];}else{ echo "white";} ?>;
        }
    
    
    </style>
</head>
<body onload="fun()">
<form action="midterm.php" method="get">
    
    <input type="color" name="color">
    <button type="submit">Change Background Color</button>
    
    
    </form>
    <img src="b1.jpg" id="img">
    
<p id="dom"></p>
    <button onclick="dom()">Create Paragraph</button>
    
    <script>
        var myVar = setInterval(fun, 5000);
        var timek=0;
    function fun()
        {
            if(timek==0)
                {
                    document.getElementById("img").src="b1.jpg";
                    timek=timek+5;
                }
            else if(timek==5)
                {
                    document.getElementById("img").src="b2.png";
                    timek=timek+5;
                }
            else if(timek==10)
                {
                    document.getElementById("img").src="b3.jpg";
                    timek=timek+5;
                }
            else if(timek==15)
                {
                    document.getElementById("img").src="b4.jpg";
                    timek=0;
                }
        }
    
        function dom()
        {
            document.getElementById("dom").innerHTML="Hi i am Jaydeep Kumar";
        }
    
    </script>
</body>
</html>