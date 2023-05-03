<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--==title=========================-->
    <title>Characters - StarWar</title>
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
                    <li><a href="characters.php" class="active">Characters</a></li>
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
            <img src="images/characters_banner.jpg" alt="Characters Banner">
        </div>

        <!--==text======================-->
        <div class="main-text">
            <h1>Characters</h1>
        </div>
    </section><!--main-end-->



    <!--==movies======================================-->
    <section id="items">

        <!--**heading***********-->
        <div class="items-heading">
            <h1>All Characters</h1>
        </div>


        <!--**container********-->
        <div class="post-container">

            <!--==post1======-->
            <a href="luke.php" class="post-box">
                <!--img-->
                <div class="post-img">
                    <img src="images/luke skywalker.jpg" alt="luke skywalker" />
                </div>
                <!--text-->
                <div class="post-text">
                    <!--category-->
                    <span class="category"></span>
                    <!--bottom-text-->
                    <div class="bottom-text">
                        <!--name----->
                        <div class="movie-name">
                            <span>Characters</span>
                            <strong>Luke Skywalker</strong>
                        </div>
                    </div>
                </div>
            </a><!--box-end-->


            <!--==post2======-->
            <a href="han solo.php" class="post-box">
                <!--img-->
                <div class="post-img">
                    <img src="images/han solo.webp" alt="Han Solo" />
                </div>
                <!--text-->
                <div class="post-text">
                    <!--category-->
                    <span class="category"></span>
                    <!--bottom-text-->
                    <div class="bottom-text">
                        <!--name----->
                        <div class="movie-name">
                            <span>Characters</span>
                            <strong>Han Solo</strong>
                        </div>
                    </div>
                </div>
            </a><!--box-end-->


            <!--==post3======-->
            <a href="darth.php" class="post-box">
                <!--img-->
                <div class="post-img">
                    <img src="images/darth-vader.jpg" alt="Darth Vader" />
                </div>
                <!--text-->
                <div class="post-text">
                    <!--category-->
                    <span class="category"></span>
                    <!--bottom-text-->
                    <div class="bottom-text">
                        <!--name----->
                        <div class="movie-name">
                            <span>Characters</span>
                            <strong>Darth Vader</strong>
                        </div>
                    </div>
                </div>
            </a><!--box-end-->


            <!--==post4======-->
            <a href="obiwan.php" class="post-box">
                <!--img-->
                <div class="post-img">
                    <img src="images/obi wan kenobi.webp" alt="obi wan kenobi" />
                </div>
                <!--text-->
                <div class="post-text">
                    <!--category-->
                    <span class="category"></span>
                    <!--bottom-text-->
                    <div class="bottom-text">
                        <!--name----->
                        <div class="movie-name">
                            <span>Characters</span>
                            <strong>Obi Wan Kenobi</strong>
                        </div>
                    </div>
                </div>
            </a><!--box-end-->

        </div><!--container-end-->




        <!--==page-number=====================-->
        <div class="page-number">
            <a href="#"><i class="fa-solid fa-chevron-left"></i> Next</a>
            <a href="#">Previous <i class="fa-solid fa-chevron-right"></i></a>
        </div>

    </section>


    <!--==footer==============================-->
    <footer>
        <span>© StarWar</span>
        <span>Copyright 2023 - StarWar</span>
    </footer>

</body>

</html>