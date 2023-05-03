<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--==title=========================-->
    <title>About - StarWar</title>
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

       

        <!--==img=======================-->
        <div class="main-img">
            <img src="images/about_banner.jpg" alt="What Is Star Wars?">
        </div>

        <!--==text======================-->
        <div class="main-text">
            <h1>What Is Star Wars?</h1>
        </div>
    </section><!--main-end-->


    <!--==details============================-->
    <section id="s-details">
        <p><b>Star Wars</b> is an American epic space opera[1] multimedia franchise created by George Lucas, which began
            with the eponymous 1977 film[b] and quickly became a worldwide pop culture phenomenon. The franchise has
            been expanded into various films and other media, including television series, video games, novels, comic
            books, theme park attractions, and themed areas, comprising an all-encompassing fictional universe.[c] Star
            Wars is one of the highest-grossing media franchises of all time.</p>
        <p>The original film (Star Wars), retroactively subtitled Episode IV: A New Hope (1977), was followed by the
            sequels Episode V: The Empire Strikes Back (1980) and Episode VI: Return of the Jedi (1983), forming the
            original Star Wars trilogy. Lucas later returned to the series to direct a prequel trilogy, consisting of
            Episode I: The Phantom Menace (1999), Episode II: Attack of the Clones (2002), and Episode III: Revenge of
            the Sith (2005). In 2012, Lucas sold his production company to Disney, relinquishing his ownership of the
            franchise. This led to a sequel trilogy, consisting of Episode VII: The Force Awakens (2015), Episode VIII:
            The Last Jedi (2017), and Episode IX: The Rise of Skywalker (2019). </p>
        <p>All nine films of the "Skywalker Saga" were nominated for Academy Awards, with wins going to the first two
            releases. Together with the theatrical live action "anthology" films Rogue One (2016) and Solo (2018), the
            combined box office revenue of the films equated to over US$10 billion, which makes it the
            second-highest-grossing film franchise of all time.</p>
    </section>




    <!--==footer==============================-->
    <footer>
        <span>© StarWar</span>
        <span>Copyright 2023 - StarWar</span>
    </footer>

</body>

</html>