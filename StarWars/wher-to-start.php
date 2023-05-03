<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--==title=========================-->
    <title>Where To Start The Series - StarWar</title>
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
                    <?php if($_SESSION['logged'] == TRUE){ ?>
                        <!--user-->
                        <a href="login.php"  style="color: white; background:none;">
                            <i class="fa fa-user-circle fa-flip"></i><?php echo $_SESSION['username']; ?><i class="fa fa-user-circle fa-flip"></i>
                        </a>

                        <?php }else{ ?>

                        <!--user-->
                        <a href="login.php" class="user" title="login">
                            <i class="fa-solid fa-user"></i>
                        </a>
                    <?php } ?>
                </div>
            </nav>
        </header>
        <!--Header-end-->

        <!--==search-container===============-->
        <!-- <input type="checkbox" id="search-show">
        <div class="search-container">
            box
            <div class="search-box">
                <label for="search-show" class="close-search"><i class="fa-solid fa-xmark"></i></label>
                <form>
                    <input type="text" placeholder="Search Something Here..." required>
                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div> -->

        <!--==img=======================-->
        <div class="main-img">
            <img src="images/where_start_banner.jpg" alt="Where To Start?">
        </div>

        <!--==text======================-->
        <div class="main-text">
            <h1>Where To Start?<br>(Recommendation)</h1>
        </div>
    </section><!--main-end-->



    <!--==details============================-->
    <section id="s-details">
        <p>Star Wars may be hard to get into due to the vast amount of media the franchise has encompass in it's long
            history.</p>
        <p>With more than a dozen movies, television series, animated series, game, and comic books, knowing where to
            start can be very difficult as a newcomer to the franchise.</p>
        <p>We personally recommend this order first for new commers before diving into other media from the franchise.
        </p>
        <ul>
            <li>We Recomment starting from the first movie release with star wars episode IV: A New Hope until Episode
                VI before going back and watching Episode I. <a href="movies.php">Movies & TV Shows List.</a></li>
        </ul>
    </section>



    <!--==footer==============================-->
    <footer>
        <span>© StarWar</span>
        <span>Copyright 2023 - StarWar</span>
    </footer>

</body>

</html>