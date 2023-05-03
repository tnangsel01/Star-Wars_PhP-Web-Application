<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--==title=========================-->
    <title>Login - StarWar</title>
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
                    <a href="login.php"  style="color: white; ">
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



    <!--======LogIn======================================-->
    <section id="items" class="login">
        <!--**heading***********-->
        <?php if(isset($_SESSION['user_id']) && $_SESSION['logged'] == TRUE){ ?>  
                
            <form action="php/uploadScript.php" method="post" enctype="multipart/form-data">
                <div class="items-heading">
                    <h1>Upload Profile Picture</h1>
                </div>
                <input type="file" name="profile" style="padding: 1.5rem 1rem; margin-top: 1rem; border: none;">
                <button type="submit" name="upload" style="padding: 0.5rem 1rem; margin-top: 1rem; border: none; border-radius: 0.5rem; box-shadow: 0 0 0.5rem rgba(0, 0, 0, 0.1); background-color: #4CAF50; color: white; font-size: 1.2rem; cursor: pointer;"><i class="fas fa-upload mr-2"></i> Upload</button>
                <button type="submit" name="logout" style="padding: 0.5rem 1rem; margin-top: 1rem; border: none; border-radius: 0.5rem; box-shadow: 0 0 0.5rem rgba(0, 0, 0, 0.1); background-color: #FF4136; color: white; font-size: 1.2rem; cursor: pointer;"><i class="fas fa-sign-out-alt mr-2"></i> Logout</button>
            </form>

        <?php }else{ ?>

            <div class="items-heading">
                <h1>Login</h1>
            </div>

            <form action="php/loginScript.php" method="post">
                <input type="text" placeholder="Username" name="username" required>
                <input type="password" placeholder="Password" name="password" required>
                <button type="submit" name="login">Login</button>
                <a href="signup.php">Create An Account?</a>
            </form>
        <?php } ?>
    </section>


    <!--==footer==============================-->
    <footer>
        <span>© StarWar</span>
        <span>Copyright 2023 - StarWar</span>
    </footer>

</body>

</html>
