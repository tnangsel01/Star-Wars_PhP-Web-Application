<?php 
session_start(); 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include ('php/db_connect.php');


?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--==title=========================-->
        <title>Post Replies - StarWar</title>
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

        

    <?php if($_SESSION['logged'] == TRUE){ ?>

        <!--=============================forum======================================-->
        <section id="items">
            <input type="checkbox" id="answer-form">

                <?php 

                    if(isset($_GET['post_id'])){
                        $postID = $_GET['post_id'];
                        
                        // Set the number of posts to display per page
                        $numPerPage = 5;

                        // Determine the current page number
                        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

                        // Prepare and execute the SQL statement to retrieve the post data
                        $totalReplies = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM replies WHERE post_id = $postID"))[0];
                        $numPerPage = 5; // Or any other number you want
                        $totalPages = ceil($totalReplies / $numPerPage);

                        $offset = ($page - 1) * $numPerPage;

                        // Prepare and execute the SQL statement to retrieve the post data
                        $query = "SELECT p.post_id, u.username, p.post, p.date FROM posts p JOIN users u ON u.user_id = p.user_id WHERE post_id = $postID";
                        $stmt = mysqli_prepare($conn, $query);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt); 
                        
                        $row = mysqli_fetch_assoc($result); 
                        
                        ?>

                        <!--**heading***********-->
                        <div class="items-heading">
                            <h1><span><?php echo $row['username']; ?></span><br><?php echo $row['post']; ?></h1>
                            <label for="answer-form" style="margin-left: auto;"><i class="fa-solid fa-plus"></i> Add Answer</label>
                            <!-- <div class="owner-like-container">
                                <span>20 <a href="#" class="active"><i class="fa-solid fa-thumbs-up"></i></a></span>
                                <span>1 <a href="#"><i class="fa-solid fa-thumbs-down"></i></a></a></span>
                            </div> -->
                        </div>

                        <form class="forum-post-container" action="php/postAnswer.php" method="POST">
                            <input type="hidden" name="post_id" value="<?php echo $postID; ?>">
                            <input type="text" name="answer" placeholder="Write Your Answer..." required>
                            <button name="postAnswer">POST</button>
                        </form>
                        
                    
                        <?php 

                            //Query all the replies of the post
                            $replyQuery = "SELECT u.username, pr.image, pr.status, r.reply, r.reply_date 
                                        FROM replies r
                                        JOIN users u ON u.user_id = r.user_id
                                        LEFT JOIN profiles pr ON pr.user_id = u.user_id
                                        WHERE r.post_id = $postID
                                        ORDER BY r.reply_date ASC
                                        LIMIT ?, ?";
                            $replyStmt = mysqli_prepare($conn, $replyQuery);
                            mysqli_stmt_bind_param($replyStmt, "ii", $offset, $numPerPage);
                            mysqli_stmt_execute($replyStmt);
                            $result = mysqli_stmt_get_result($replyStmt);

                            while ($rowReply = mysqli_fetch_assoc($result)) { 
                                $username = $rowReply['username'];
                                $dateString =  $rowReply['reply_date'];
                                $dateTime = new DateTime($dateString);
                                $replyDateTime = $dateTime->format('j F, Y g:ia'); 
                                $replyPost = $rowReply['reply'];
                                $image = $rowReply['image'];
                                // $status = $rowReply['status'];
                                ?>

                            <!--**container********-->
                            <div class="forum-container">

                                <!--**box**-->
                                <div class="forum-box forum-box-answer" style="color: white;">

                                    <?php
                                    if (empty($image) || $rowReply['status'] == 0) { ?>
                                        <!-- Default image -->
                                        <div class="forum-img">
                                            <img src="images/user.jpg" height="20px" width="20px" alt="default img">
                                        </div>
                                    <?php } else {
                                        // Use the profile image
                                        $profileImage = str_replace('../', '', $image); ?>
                                        <div class="forum-img">
                                            <img src="<?php echo $profileImage; ?>" height="20px" width="20px" alt="profile img">
                                        </div>

                                    <?php } ?>

                                    <!--text-->
                                    <div class="forum-text">
                                        
                                        <strong><?php echo $replyPost; ?></strong>
                                        <div class="answer-like-container">
                                        <span><?php echo $username; ?>, <span><?php echo $replyDateTime; ?></span></span>
                                            <!-- <span>20 <a href="#"><i class="fa-solid fa-thumbs-up"></i></a></span>
                                            <span>1 <a href="#"><i class="fa-solid fa-thumbs-down"></i></a></a></span> -->
                                        </div>
                                    </div>

                                </div><!--box-end-->
                            </div><!--container-end-->
                        <?php } 
                    
                    ?>

            <!--==page-number=====================-->
            
            <div class="page-number">

                <?php if($page > 1) { ?>
                    
                    <a href="?post_id=<?php echo $postID; ?>&page=<?php echo $page - 1; ?>"><i class="fa-solid fa-chevron-left"></i> Previous</a>
                
                    <?php } ?>

                <?php if($page < $totalPages) { ?>

                    <a href="?post_id=<?php echo $postID; ?>&page=<?php echo $page + 1; ?>">Next <i class="fa-solid fa-chevron-right"></i></a>
                
                    <?php } ?>
            </div>

        </section>
    <?php   }       
        }else{
                    echo "<script>
                        alert('Unauthorized page. Please login.')
                        window.location.href='login.php';
                    </script>";
                    exit();
        } 
    ?>

        <!--==footer==============================-->
        <footer>
            <span>© StarWar</span>
            <span>Copyright 2023 - StarWar</span>
        </footer>

    </body>
</html>