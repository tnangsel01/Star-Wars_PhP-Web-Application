<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
date_default_timezone_set('America/Chicago');

include ('db_connect.php');

if(isset($_POST['postAnswer'])){
    // Get the user_id from URL
    $post_id = $_POST['post_id'];
    $user_id = $_SESSION['user_id'];

    // Sanitize the answer input
    $answer = filter_var($_POST['answer'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    // Get the current date/time
    $date = date('Y-m-d H:i:s');

    if (empty($answer)) {
        echo "<script>
                    alert('Please write something to post.')
                    window.location.href='../forum-details.php?post_id=".$post_id."';
                </script>";
                exit();
    }
    if(!preg_match("/[a-zA-Z]/", $answer)){
        echo "<script>
                    alert('Only letters allowed.')
                    window.location.href='../forum-details.php?post_id=".$post_id."';
                </script>";
                exit();
    }
  
    $query = "INSERT INTO replies (user_id, post_id, reply, reply_date) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "iiss", $user_id, $post_id, $answer, $date);
    $result = mysqli_stmt_execute($stmt);
    // Execute the SQL statement
    if ($result > 0) {

        echo "<script>
                    alert('Reply added successfully.')
                    window.location.href='../forum-details.php?post_id=".$post_id."';
                </script>";
        exit();
    } else {
        echo "<script>
                    alert('Failed to add an answer.')
                    window.location.href='../forum-details.php?post_id=".$post_id."';
                </script>";
                exit();
    }

    // Close the prepared statement
    $stmt_close();

} 
?>