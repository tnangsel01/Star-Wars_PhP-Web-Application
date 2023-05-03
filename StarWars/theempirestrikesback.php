<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--==title=========================-->
    <title>Star War New Hope - StarWar</title>
    <!--==CSS===========================-->
    <link rel="stylesheet" href="css/style.css">
    <!--==Import-Poppins-Font===========-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!--==fontAwesome-for-icons=========-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!--==fav-icon======================-->
    <link rel="shortcut icon" href="images/fav-icon.png">
</head>

<body>

    <!--==main======================================-->
    <section id="main" class="other-main">

        <!--==Header================================-->
        <header>
            <nav class="navigation">
                <!--**menu-btn************-->
                <input type="checkbox" class="menu-btn" id="menu-btn">
                <label for="menu-btn" class="menu-icon">
                    <span class="nav-icon"></span>
                </label>
                <!--**logo***************-->
                <a href="index.php" class="logo">
                    <img src="images/logo.webp" alt="StarWar Logo">
                </a>
                <!--**menu*********************-->
                <ul class="menu">
                    <li><a href="characters.php">Characters</a></li>
                    <li><a href="movies.php">Movies & TV Shows</a></li>
                    <li><a href="games.php">Games</a></li>
                    <li><a href="community.php">Community</a></li>
                </ul>
                <!--**right-nav-(cart-like)*****-->
                <div class="right-nav">
                   
                     <!--user-->
                    <a href="login.php" class="user" title="login">
                        <i class="fa-solid fa-user"></i>
                    </a>
                </div>
            </nav>
        </header>
        <!--Header-end-->

        <!--==img=======================-->
        <div class="main-img">
            <img src="images/The_Empire_Strikes_Back.jpg" alt="The Empire Strikes Back (Episode V)">
        </div>

        <!--==text======================-->
        <div class="main-text">
            <h1>The Empire Strikes back</h1>
        </div>
    </section><!--main-end-->


    <!--==details==============================-->
    <section id="post-details-container">
        <!--img-->
        <div class="post-img">
            <img src="images/The_Empire_Strikes_Back.jpg" alt="The Empire Strikes Back (Episode V)">
        </div>
        <!--details-->
        <div class="post-details">
            <h2>Description</h2>
            <p>After the destruction of the Death Star, Imperial forces continue to pursue the Rebels. After the Rebellion’s defeat on the ice planet Hoth, Luke journeys to the planet Dagobah to train with Jedi Master Yoda, who has lived in hiding since the fall of the Republic. In an attempt to convert Luke to the dark side, Darth Vader lures young Skywalker into a trap in the Cloud City of Bespin</p>
            <span>Movie Release: <span>May 21, 1980</span></span>
            <span>Producer: <span>George Lucas</span></span>
            <span>Genre: <span>Action</span>, <span>Adventure</span></span>
            <span>Movie Duration: <span>2h 1m</span></span>
            <span>Rating: <span>8.6 Imb</span></span>
        </div>
    </section>



    <!--==footer==============================-->
    <footer>
        <span>© StarWar</span>
        <span>Copyright 2023 - StarWar</span>
    </footer>

</body>

</html>