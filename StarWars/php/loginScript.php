<?php
require_once('db_connect.php');
session_start();

// Check if the form has been submitted
if (isset($_POST['login'])) {
    
    // Get the username and password from the form data
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    // Query the database to see if the user exists
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
        
        // User exists, check the password
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            // Password is correct, log the user in
            $_SESSION['logged'] = TRUE;
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['name'] = $user['name'];

            echo "<script>
                    alert('Welcome StarWars member.')
                    window.location.href='../index.php';
                </script>";
            exit();
        } else {
            // Password is incorrect
            echo "<script>
                alert('Invalid Password')
                window.location.href='../login.php';
            </script>";
        }
        
    } else {
        
        // User does not exist
         echo "<script>
                alert('Invalid username')
                window.location.href='../login.php';
            </script>";
    }
}

mysqli_close($conn);

?>