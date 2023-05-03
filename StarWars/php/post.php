<?php
session_start();
date_default_timezone_set('America/Chicago');

// Include the file with the database connection details
include('db_connect.php');
if($_SESSION['logged'] == TRUE){ 
    // Check if the form was submitted
    if (isset($_POST['post'])) {
        // Sanitize and validate the user input
        $question = filter_var($_POST['question'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (empty($question)) {
            echo "<script>
                        alert('Please write something to post.')
                        window.location.href='../community.php';
                    </script>";
                    exit();
        }
        if(!preg_match("/[a-zA-Z]/", $question)){
            echo "<script>
                        alert('Only letters allowed.')
                        window.location.href='../community.php';
                    </script>";
                    exit();
        }

        // Get the current date/time
        $date = date('Y-m-d H:i:s');
        
        // Get the user ID from the session or form data
        $user_id = $_SESSION['user_id'];
        
        // Prepare and bind the SQL statement
        $stmt = mysqli_stmt_init($conn);
        $sql = "INSERT INTO posts (user_id, post, date) VALUES (?, ?, ?)";
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "iss", $user_id, $question, $date);
        $result = mysqli_stmt_execute($stmt);
        // Execute the SQL statement
        if ($result > 0) {
            echo "<script>
                        alert('Post created successfully.')
                        window.location.href='../community.php';
                    </script>";
                    exit();
        } else {
            echo "<script>
                        alert('Error creating post.')
                        window.location.href='../community.php';
                    </script>";
                    exit();
        }

        // Close the prepared statement
        $stmt_close();
    }

    // Close the database connection
    $conn_close();
}else{
    echo "<script>
                        alert('Please login to post any questions or to leave a response.')
                        window.location.href='../login.php';
                    </script>";
                    exit();
}
?>
