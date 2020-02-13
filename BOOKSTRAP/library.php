<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Glegoo&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="navbar.css">
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            font-family: 'Glegoo', serif;
            background-image: linear-gradient(to bottom right, white, #C8BCA7);
        }

        * {
            box-sizing: border-box;
        }

        .mySlides {
            display: none;
        }

        img {
            vertical-align: middle;
        }

        /* Slideshow container */
        .slideshow-container {
            max-width: 100%;
            position: relative;
            margin: auto;
            margin-left: 5.15%;
            margin-right: 5.15%;
        }

        /* The dots/bullets/indicators */
        .dot {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active {
            background-color: #717171;
        }

        /* Fading animation */
        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @-webkit-keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

        @keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
            .text {
                font-size: 11px
            }
        }

        .para {
            margin-left: 5.15%;
            margin-right: 5.15%;
            color: #888888;
        }

        #writers {
            margin-left: 5.15%;
            margin-right: 5.15%;
        }

        .wri {
            margin-right: 3%;
            max-width: 249.3px;
            float: left;
            text-align: center;
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

        a {
            text-decoration: none;
            color: #888888;
        }

        a:hover {
            color: black;
        }

        * {
            margin: 0, padding: 0
        }

        .dash {
            position: relative;
            display: inline-block;
            margin-top: 0px;
            width: 16px;
            height: 2px;
            background-color: #222;
            text-align: center;
            top: -50px;
        }

        .occu {
            position: relative;
            top: -25px;
            color: #888888;
        }

        #footer {
            margin-left: 5.15%;
            margin-right: 5.15%;
        }

    </style>
</head>

<body>

    <?php
        
        require_once("navbar.php");
                
    ?>

    <div class="slideshow-container">

        <div class="mySlides fade">
            <img src="slide1.jpg" style="width:100%">
        </div>

        <div class="mySlides fade">
            <img src="slide2.jpg" style="width:100%">
        </div>

        <div class="mySlides fade">
            <img src="slide3.jpg" style="width:100%">
        </div>

    </div>
    <br>

    <div style="text-align:center; display:none;">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>

    <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            setTimeout(showSlides, 5000); // Change image every 5 seconds
        }

    </script>

    <p class="para">In by an appetite no humoured returned informed. Possession so comparison inquietude he he conviction no decisively. Marianne jointure attended she hastened surprise but she. Ever lady son yet you very paid form away. He advantage of exquisite resolving if on tolerably. Become sister on in garden it barton waited on.</p>

    <p class="para">Article evident arrived express highest men did boy. Mistress sensible entirely am so. Quick can manor smart money hopes worth too. Comfort produce husband boy her had hearing. Law others theirs passed but wishes. You day real less till dear read. Considered use dispatched melancholy sympathize discretion led. Oh feel if up to till like.</p>

    <p class="para">Why painful the sixteen how minuter looking nor. Subject but why ten earnest husband imagine sixteen brandon. Are unpleasing occasional celebrated motionless unaffected conviction out. Evil make to no five they. Stuff at avoid of sense small fully it whose an. Ten scarcely distance moreover handsome age although. As when have find fine or said no mile. He in dispatched in imprudence dissimilar be possession unreserved insensible. She evil face fine calm have now. Separate screened he outweigh of distance landlord.</p>

    <p class="para">Do play they miss give so up. Words to up style of since world. We leaf to snug on no need. Way own uncommonly travelling now acceptance bed compliment solicitude. Dissimilar admiration so terminated no in contrasted it. Advantages entreaties mr he apartments do. Limits far yet turned highly repair parish talked six. Draw fond rank form nor the day eat.</p>

    <h1 style="text-align:center;">Meet the writers</h1>
    <p style="text-align:center; color: #888888; position:relative; top:-30px;">Who writes and publishes</p>
    <center><span class="dash"></span></center>

    <div id="writers">
        <div class="wri">
            <img src="wri1.png">
            <h2>John Riptide</h2>
            <p class="occu">Novelist</p>
        </div>

        <div class="wri">
            <img src="wri2.png">
            <h2>Claudia Romero</h2>
            <p class="occu">Publisher</p>
        </div>

        <div class="wri">
            <img src="wri3.png">
            <h2>John Lennon</h2>
            <p class="occu">Writer</p>
        </div>

        <div class="wri">
            <img src="wri4.png">
            <h2>Jana Nakamuro</h2>
            <p class="occu">Comedian</p>
        </div>
    </div>

    <div id="tab">
        <div class="list">
            <ul>
                <li>
                    <h3>Genres</h3>
                </li>
                <li><a href="#">Literature</a></li>
                <li><a href="#">History</a></li>
                <li><a href="#">Romance</a></li>
                <li><a href="#">Business</a></li>
            </ul>
        </div>
        <div class="list">
            <ul>
                <li>
                    <h3>Site Map</h3>
                </li>
                <li><a href="home.php">Home</a></li>
                <li><a href="display_book.php">Books</a></li>
                <li><a href="library.php">Library</a></li>
                <li><a href="journal.php">Journal</a></li>
                <li><a href="#">Buy Now</a></li>
            </ul>
        </div>
        <div class="list">
            <ul>
                <li>
                    <h3>Useful Links</h3>
                </li>
                <li><a href="#">Harvard</a></li>
                <li><a href="#">Leeds Library</a></li>
                <li><a href="#">York Uni</a></li>
                <li><a href="#">Bibliotheque</a></li>
            </ul>
        </div>
        <div class="list">
            <ul>
                <li>
                    <h3>Ebooks</h3>
                </li>
                <li><a href="#">Fantasy</a></li>
                <li><a href="#">Teens</a></li>
                <li><a href="#">Health</a></li>
                <li><a href="#">Nobel Books</a></li>
            </ul>
        </div>
        <div class="list">
            <ul>
                <li>
                    <h3>Social</h3>
                </li>
                <li><a href="#">LinkedIn</a></li>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Pinterest</a></li>
                <li><a href="#">Twitter</a></li>
            </ul>
        </div>
        <div class="list">
            <ul>
                <li>
                    <h3>Journal</h3>
                </li>
                <li><a href="#">Inspiration</a></li>
                <li><a href="#">Love</a></li>
                <li><a href="#">Posters</a></li>
                <li><a href="#">Review</a></li>
            </ul>
        </div>
    </div>

    <div style="clear:left;"></div>

    <hr style="margin-left:5.15%; margin-right:5.15%;">

    <div id="footer">
        <p>Made with ❤️ by &copy; Anuj&amp;Ayush 2019</p>
    </div>

</body>

</html>
