<?php
session_start();
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    body {
        padding: 0px;
        margin: 0px;
    }

    #topbar {
        height: auto;
        overflow: auto;
        background-color: #C8BCA7;
        padding: 10px;

    }

    .topbar_section {
        margin-right: 20px;
        margin-top: 10px;
        text-decoration: none;
        color: black;
    }

    .topbar_section:hover {
        color: white;
    }

    #logo {


        position: relative;
        left: 4.9%;
        margin-right: 11.5%;
        float: left;
    }

    .left {
        float: left;
    }

    .right {
        float: right;
    }
    a{
            text-decoration: none !important;
        }
    .num
    {
        color: white;
        position: relative;
        top: -10px;
        left: -20px;
        background-color: red;
        width: 20px;
        height: 20px;
        border-radius: 50%;
    }
    #input
    {
        color: black;
    }
</style>

<div id="topbar">
    <div class="left">
        <img class="log" style="height:50px; width:170px;" src="mylogo2.PNG">
    </div>

    <div class="right">
        <a class="topbar_section" href="http://localhost:3000/">Home</a>

        <a class="topbar_section" href="display_book_jay.php">Books</a>

        <a class="topbar_section" href="book_upload.php">upload</a>


        <?php


                if(isset($_SESSION['userid']))
                {
                    $name = $_SESSION['name'];
                    $userid = $_SESSION['userid'];
                    if($userid==null)
                    {
                        ?> <a class="topbar_section" href="login.html">Login/Signup</a> <?php
                    }
                    else
                    {
                        echo '<a href="user_data.php" class="topbar_section">'.'Hi, '.$name.'</a>';
                       // echo "Hi $id";
                        ?>
        <a class="topbar_section" style="color:red;" href="logout.php">Logout</a>
        <!----a class="topbar_section" href="book_upload.php">Upload</a---->
        <?php
                    }

                }
                else
                {
                     ?> <a class="topbar_section" href="login.html">Login/Signup</a> <?php
                }

        ?>

        <form style="display:inline;" action="display_book_jay.php" method="get">
        <input class="topbar_section" name="search" id="input" type="text" style="display:none">
            <button type="submit" name="submit" hidden>Search</button>
        </form>

        <a onclick="toggl()"><i class="fa fa-search topbar_section" style="font-size:24px"></i></a>

        <a onclick="toggl2()" href="display_cart2.php"><i class="fa fa-shopping-cart topbar_section" style="font-size:24px"></i>

            <!---<span class="num"><?php// echo sizeof($_SESSION['carti']); ?></span>
---->
</a>

    </div>

</div>

<script>

        var temp = 0;
        function toggl()
        {
            if(temp == 0)
            {
                document.getElementById("input").style.display="inline";

                temp = 1;
            }
            else
            {
                document.getElementById("input").style.display="none";

                temp = 0;
            }
        }

    var temp2 = 0;
    function toggl2()
    {
        if(temp2 == 0)
            {
                document.getElementById("cart2").style.display="inline";

                temp2 = 1;
            }
            else
            {
                document.getElementById("cart2").style.display="none";

                temp2 = 0;
            }
    }
    </script>
