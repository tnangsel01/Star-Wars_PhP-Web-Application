<?php 
session_start(); 

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);



// Include the file with the database connection details
include('php/db_connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--==title=========================-->
    <title>Community - StarWar</title>
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
                    <li><a href="games.php" >Games</a></li>
                    <li><a href="community.php" class="active">Community</a></li>
                </ul>
                <!--**right-nav-(cart-like)*****-->
                <div class="right-nav">
    
                    <?php if($_SESSION['logged'] == TRUE){ ?>
                    <!--user-->
                    <a href="login.php"  style="color: white; background:none;">
                        <?php echo $_SESSION['username']; ?>
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
            <img src="images/forum_banner.webp" alt="Starwar Game Banner">
        </div>

        <!--==text======================-->
        <div class="main-text">
            <h1>Our Community</h1>
            <form class="community-search">
                <input type="search" placeholder="Search Something Here..." name="search">
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        
    </section><!--main-end-->



    <!--==movies======================================-->
    <section id="items">
        
        <input type="checkbox" id="question-form">
        <!--**heading***********-->
        <div class="items-heading">
            <h1>StarWars Forum</h1>
            <label for="question-form"><i class="fa-solid fa-plus"></i> Ask a Question</label>
        </div>


        <form class="forum-post-container" action="php/post.php" method="POST">
            <input type="text" name="question" placeholder="Write Your Question..." required>
            <button name="post">POST</button>
        </form>

        <!-- <form class="forum-post-container search-form" action="#" method="get">
            <input type="text" name="search" placeholder="Search...">
            <button type="submit" style="background-color: blue; border-radius: 5px;"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form> -->

<style>
.search-form {
  width: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 2px;
  background-color: yellow;
  padding: 2px;
}

.search-form input[type="text"] {
  width:70%;
  padding: 10px;
  border: none;
  border-radius: 5px;
  outline: none;
    background-color: lightgrey;
}

.search-form button[type="submit"] {
  background-color: blue;
  color: white;
  width: 30%;
  border: none;
  border-radius: 5px;
  padding: 10px;
  margin-left: 0px;
  cursor: pointer;
}
</style>

        <!--**container********-->
        <div class="forum-container">
            <?php

                // Set the number of posts to display per page
                $numPerPage = 5;

                // Determine the current page number
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

                // Prepare and execute the SQL statement to retrieve the post data
                $q = "SELECT COUNT(*) FROM posts";
                $stat = mysqli_prepare($conn, $q);
                mysqli_stmt_execute($stat);
                $totalPosts = mysqli_stmt_get_result($stat)->fetch_row()[0];
                $totalPages = ceil($totalPosts / $numPerPage);

                $offset = ($page - 1) * $numPerPage;
                // Prepare and execute the SQL statement to retrieve the post data
                $query = "SELECT p.post_id, u.user_id, u.username, p.post, p.date
                FROM posts p
                JOIN users u ON p.user_id = u.user_id
                ORDER BY date DESC
                LIMIT ?, ?";
                $stmt = mysqli_prepare($conn, $query);
                mysqli_stmt_bind_param($stmt, "ii", $offset, $numPerPage);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                while ($row = mysqli_fetch_assoc($result)) {
                    $post_id = $row['post_id'];
                    $user_ID = $row['user_id'];
                    $dateString =  $row['date'];
                    $dateTime = new DateTime($dateString);
                    $postDateTime = $dateTime->format('j F, Y g:ia'); 
                    $username = $row['username'];
                    ?>
                    <!--**box**-->
                    <div class="forum-box" style="color: white;">
                    <?php
                        $imageQ = "SELECT profiles.image, profiles.status FROM profiles JOIN users ON profiles.user_id = users.user_id JOIN posts ON posts.user_id = users.user_id WHERE posts.post_id = $post_id";
                        $resultImg = mysqli_query($conn, $imageQ);

                        if ($resultImg && mysqli_num_rows($resultImg) > 0) {
                            $Image = mysqli_fetch_assoc($resultImg);
                            if ($Image['status'] == 0) { ?>
                                <!-- Default image -->
                                <div class="forum-img">
                                    <img src="images/user.jpg" height="20px" width="20px" alt="default img">
                                </div>
                            <?php } else {
                                // Use the profile image
                                $profileImage = str_replace('../', '', $Image['image']); ?>
                                <div class="forum-img">
                                    <img src="<?php echo $profileImage; ?>" height="20px" width="20px" alt="profile img">
                                </div>
                            <?php }
                        } else {
                            // No image found
                            ?>
                            <div class="forum-img">
                                <img src="images/user.jpg" height="20px" width="20px" alt="default img">
                            </div>
                        <?php } ?>
                    
                        <!--text-->
                        <div class="forum-text">
                            <form method="GET">
                                <input type="hidden" name="post_ID" value="<?php echo $row['post_id']; ?>">
                                <a href="forum-details.php?post_id=<?php echo $row['post_id']; ?>" name="post"><?php echo $row['post']; ?></a>
                            </form>
                            <span><?php echo $username; ?>, <span><?php echo $postDateTime; ?></span></span>
                        </div>

                        <?php 
                        
                        $countQ = "SELECT COUNT(*) FROM replies WHERE post_id = ?";
                        $countS = mysqli_prepare($conn, $countQ);
                        mysqli_stmt_bind_param($countS, "i", $post_id);
                        mysqli_stmt_execute($countS);
                        $replyResult = mysqli_stmt_get_result($countS);
                        $replyRow = mysqli_fetch_row($replyResult);
                        $totalReply = $replyRow[0];
                        $_SESSION['TotalReply'] = $totalReply;
                        
                        ?>
                          
                        <!--replies-->
                        <div class="forum-replies">
                            <span>Replies: <b><?php echo $_SESSION['TotalReply']; ?></b></span>
                        </div>

                        
                        
                    </div>
                    <!--box-end-->
            <?php

                }
                // Close the prepared statement and the database connection
                $stmt->close();
                $conn->close();
            ?>

        </div><!--container-end-->


        <!--==page-number=====================-->
        <div class="page-number">
            <?php if($page > 1) { ?>
                <a href="?page=<?php echo $page - 1; ?>"><i class="fa-solid fa-chevron-left"></i> Previous</a>
            <?php } ?>
            <?php if($page < $totalPages) { ?>
                <a href="?page=<?php echo $page + 1; ?>">Next <i class="fa-solid fa-chevron-right"></i></a>
            <?php } ?>
        </div>


    </section>


    <!--==footer==============================-->
    <footer>
        <span>© StarWar</span>
        <span>Copyright 2023 - StarWar</span>
    </footer>

</body>
</html>
