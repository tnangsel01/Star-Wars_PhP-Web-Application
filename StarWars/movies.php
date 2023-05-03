<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--==title=========================-->
    <title>Movies And TV Shows - StarWar</title>
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
                    <li><a href="movies.php" class="active">Movies & TV Shows</a></li>
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
            <img src="images/movie banner 2.jpg" alt="Movie Banner">
        </div>

        <!--==text======================-->
        <div class="main-text">
            <h1>Movies And TV Shows</h1>
        </div>
    </section><!--main-end-->



    <!--==movies======================================-->
    <section id="items">

        <!--**heading***********-->
        <div class="items-heading">
            <h1><i class="fa-solid fa-film"></i> Movies & TV Shows</h1>
        </div>


        <!--**container********-->
        <div class="post-container">

            <!--==post1======-->
            <a href="starwarnewhope.php" class="post-box">
                <!--img-->
                <div class="post-img">
                    <img src="images/star-war-new-hope.jpg" alt="Star War New Hope" />
                </div>
                <!--text-->
                <div class="post-text">
                    <!--category-->
                    <span class="category">Movie</span>
                    <!--bottom-text-->
                    <div class="bottom-text">
                        <!--name----->
                        <div class="movie-name">
                            <span>1977</span>
                            <strong>Star War New Hope</strong>
                        </div>
                    </div>
                </div>
            </a><!--box-end-->


            <!--==post2======-->
            <a href="theempirestrikesback.php" class="post-box">
                <!--img-->
                <div class="post-img">
                    <img src="images/The_Empire_Strikes_Back.jpg" alt="The Empire Strikes Back" />
                </div>
                <!--text-->
                <div class="post-text">
                    <!--category-->
                    <span class="category">Movie</span>
                    <!--bottom-text-->
                    <div class="bottom-text">
                        <!--name----->
                        <div class="movie-name">
                            <span>1980</span>
                            <strong>The Empire Strikes Back</strong>
                        </div>
                    </div>
                </div>
            </a><!--box-end-->


            <!--==post3======-->
            <a href="starwarreturnofjedai.php" class="post-box">
                <!--img-->
                <div class="post-img">
                    <img src="images/star-war-return-of-jedai.jpg" alt="Star War Return Of Jedai" />
                </div>
                <!--text-->
                <div class="post-text">
                    <!--category-->
                    <span class="category">Movie</span>
                    <!--bottom-text-->
                    <div class="bottom-text">
                        <!--name----->
                        <div class="movie-name">
                            <span>1983</span>
                            <strong>Star War Return Of Jedai</strong>
                        </div>
                    </div>
                </div>
            </a><!--box-end-->


            <!--==post4======-->
            <a href="Starwarsaphantommenace.php" class="post-box">
                <!--img-->
                <div class="post-img">
                    <img src="images/star wars a phantom menace.jpg" alt="Star Wars a Phantom Menace" />
                </div>
                <!--text-->
                <div class="post-text">
                    <!--category-->
                    <span class="category">TV Show</span>
                    <!--bottom-text-->
                    <div class="bottom-text">
                        <!--name----->
                        <div class="movie-name">
                            <span>1999</span>
                            <strong>Star Wars A Phantom Menace</strong>
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